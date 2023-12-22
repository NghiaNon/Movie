/**
* BootstrapValidator (https://github.com/nghuuphuoc/bootstrapvalidator)
 *
 * Một plugin jQuery để xác thực các trường biểu mẫu. Sử dụng với Bootstrap 3
 *
 * @author      Nguyen Huu Phuoc <phuoc@huuphuoc.me>
 * @copyright   (c) 2013 Nguyen Huu Phuoc
 * @license     MIT
 */

(function($) {
    var BootstrapValidator = function(form, options) {
        this.$form   = $(form);
        this.options = $.extend({}, BootstrapValidator.DEFAULT_OPTIONS, options);

        if ('disabled' == this.options.live) {
          // Không tắt các nút gửi nếu xác thực trực tiếp bị tắt
            this.options.submitButtons = null;
        }

        this.invalidFields      = {};
        this.xhrRequests        = {};
        this.numPendingRequests = null;
        this.formSubmited       = false;

        this._init();
    };

    // Các tùy chọn mặc định
    BootstrapValidator.DEFAULT_OPTIONS = {
        // Lớp CSS của biểu mẫu
        elementClass: 'bootstrap-validator-form',

        // Thông báo mặc định không hợp lệ
        message: 'This value is not valid',

        // Bộ chọn nút gửi
        // Các nút này sẽ bị tắt khi thông tin nhập vào biểu mẫu không hợp lệ
        submitButtons: 'button[type="submit"]',

       // Trình xử lý gửi tùy chỉnh
        // Nó sẽ ngăn việc gửi biểu mẫu mặc định
        //
        // submitHandler: function(validator, form) {
        // - trình xác thực là phiên bản BootstrapValidator
        // - form là đối tượng jQuery trình bày form hiện tại
        // }
        submitHandler: null,

        // Xác thực trực tiếp. Có thể là một trong 3 giá trị:
        // - đã bật: Plugin xác thực các trường ngay khi chúng được thay đổi
        // - bị vô hiệu hóa: Vô hiệu hóa xác thực trực tiếp. Thông báo lỗi chỉ được hiển thị sau khi biểu mẫu được gửi
        // - đã gửi: Xác thực trực tiếp được bật sau khi biểu mẫu được gửi
        live: 'enabled',

        // Ánh xạ tên trường với các quy tắc xác thực
        fields: null
    };

    BootstrapValidator.prototype = {
        constructor: BootstrapValidator,

        /**
         * Biểu mẫu ban đầu
         */
        _init: function() {
            if (this.options.fields == null) {
                return;
            }

            var that = this;
            this.$form
                // Vô hiệu hóa xác thực phía máy khách trong HTML 5
                .attr('novalidate', 'novalidate')
                .addClass(this.options.elementClass)
                .on('submit', function(e) {
                    that.formSubmited = true;
                    if (that.options.fields) {
                        for (var field in that.options.fields) {
                            if (that.numPendingRequests > 0 || that.numPendingRequests == null) {
                                // Kiểm tra xem trường có hợp lệ không
                                var $field = that.getFieldElement(field);
                                if ($field.data('bootstrapValidator.isValid') !== true) {
                                    that.validateField(field);
                                }
                            }
                        }
                        if (!that.isValid()) {
                            that.$form.find(that.options.submitButtons).attr('disabled', 'disabled');
                            if ('submitted' == that.options.live) {
                                that.options.live = 'enabled';
                                that._setLiveValidating();
                            }

                            e.preventDefault();
                        } else {
                            if (that.options.submitHandler && 'function' == typeof that.options.submitHandler) {
                                that.options.submitHandler.call(that, that, that.$form);
                                return false;
                            }
                        }
                    }
                });

            for (var field in this.options.fields) {
                this._initField(field);
            }

            this._setLiveValidating();
        },

        /**
         * Kích hoạt xác thực trực tiếp
         */
        _setLiveValidating: function() {
            if ('enabled' == this.options.live) {
                var that = this;
                // Vì cái này phải được gọi một lần nên tôi phải tắt chế độ xác thực trực tiếp
                this.options.live = 'disabled';

                for (var field in this.options.fields) {
                    (function(field) {
                        var $field = that.getFieldElement(field);
                        if ($field) {
                            var type  = $field.attr('type'),
                                event = ('checkbox' == type || 'radio' == type || 'SELECT' == $field.get(0).tagName) ? 'change' : 'keyup';
                            $field.on(event, function() {
                                that.formSubmited = false;
                                that.validateField(field);
                            });
                        }
                    })(field);
                }
            }
        },

        /**
         * Init field
         *
         * @param {String} field Tên trường
         */
        _initField: function(field) {
            if (this.options.fields[field] == null || this.options.fields[field].validators == null) {
                return;
            }

            var $field = this.getFieldElement(field);
            if (null == $field) {
                return;
            }

            // Tạo phần tử khối trợ giúp để hiển thị lỗi
            var that      = this,
                $parent   = $field.parents('.form-group'),
                helpBlock = $parent.find('.help-block');

            if (helpBlock.length == 0) {
                var $small = $('<small/>').addClass('help-block').css('display', 'none').appendTo($parent);
                $field.data('bootstrapValidator.error', $small);

                // Tính số cột của phần tử nhãn/trường
                // Sau đó đặt offset cho phần tử khối trợ giúp
                var label, cssClasses, offset, size;
                if (label = $parent.find('label').get(0)) {
                    cssClasses = $(label).attr('class').split(' ');
                    for (var i = 0; i < cssClasses.length; i++) {
                        if (/^col-(xs|sm|md|lg)-\d+$/.test(cssClasses[i])) {
                            offset = cssClasses[i].substr(7);
                            size   = cssClasses[i].substr(4, 2);
                            break;
                        }
                    }
                } else {
                    cssClasses = $parent.children().eq(0).attr('class').split(' ');
                    for (var i = 0; i < cssClasses.length; i++) {
                        if (/^col-(xs|sm|md|lg)-offset-\d+$/.test(cssClasses[i])) {
                            offset = cssClasses[i].substr(14);
                            size   = cssClasses[i].substr(4, 2);
                            break;
                        }
                    }
                }
                if (size && offset) {
                    $small.addClass(['col-', size, '-offset-', offset].join(''))
                          .addClass(['col-', size, '-', 12 - offset].join(''));
                }
            } else {
                $field.data('bootstrapValidator.error', helpBlock.eq(0));
            }
        },

        /**
         * Lấy phần tử trường
         *
         * @param {String} field Tên trường
         * @returns {jQuery}
         */
        getFieldElement: function(field) {
            var fields = this.$form.find('[name="' + field + '"]');
            return (fields.length == 0) ? null : $(fields[0]);
        },

        /**
         * Xác thực trường đã cho
         *
         * @param {String} field Tên trường
         */
        validateField: function(field) {
            var $field = this.getFieldElement(field);
            if (null == $field) {
                // Trả về nếu không tìm thấy trường có tên đã cho
                return;
            }
            var that       = this,
                validators = that.options.fields[field].validators;
            for (var validatorName in validators) {
                if (!$.fn.bootstrapValidator.validators[validatorName]) {
                    continue;
                }
                var isValid = $.fn.bootstrapValidator.validators[validatorName].validate(that, $field, validators[validatorName]);
                if (isValid === false) {
                    that.showError($field, validatorName);
                    break;
                } else if (isValid === true) {
                    that.removeError($field);
                }
            }
        },

        /**
         * Hiển thị lỗi trường
         *
         * @param {jQuery} $field Phần tử trường
         * @param {String} validatorName
         */
        showError: function($field, validatorName) {
            var field     = $field.attr('name'),
                validator = this.options.fields[field].validators[validatorName],
                message   = validator.message || this.options.message,
                $parent   = $field.parents('.form-group');

            this.invalidFields[field] = true;

           // Thêm lớp has-error vào phần tử cha
            $parent.removeClass('has-success').addClass('has-error');

            $field.data('bootstrapValidator.error').html(message).show();

            this.$form.find(this.options.submitButtons).attr('disabled', 'disabled');
        },

        /**
         *Xóa lỗi khỏi trường nhất định
         *
         * @param {jQuery} $field Phần tử trường
         */
        removeError: function($field) {
            delete this.invalidFields[$field.attr('name')];
            $field.parents('.form-group').removeClass('has-error').addClass('has-success');
            $field.data('bootstrapValidator.error').hide();
            this.$form.find(this.options.submitButtons).removeAttr('disabled');
        },

        /**
         * Bắt đầu kiểm tra từ xa
         *
         * @param {jQuery} $field Phần tử trường
         * @param {String} validatorName
         * @param {XMLHttpRequest} xhr
         */
        startRequest: function($field, validatorName, xhr) {
            var field = $field.attr('name');

            $field.data('bootstrapValidator.isValid', false);
            this.$form.find(this.options.submitButtons).attr('disabled', 'disabled');

            if(this.numPendingRequests == null){
                this.numPendingRequests = 0;
            }
            this.numPendingRequests++;
            // Abort the previous request
            if (!this.xhrRequests[field]) {
                this.xhrRequests[field] = {};
            }

            if (this.xhrRequests[field][validatorName]) {
                this.numPendingRequests--;
                this.xhrRequests[field][validatorName].abort();
            }
            this.xhrRequests[field][validatorName] = xhr;
        },

        /**
         * Hoàn thành kiểm tra từ xa
         *
         * @param {jQuery} $field Phần tử trường
         * @param {String} validatorName
         * @param {boolean} isValid
         */
        completeRequest: function($field, validatorName, isValid) {
            if (isValid === false) {
                this.showError($field, validatorName);
            } else if (isValid === true) {
                this.removeError($field);
                $field.data('bootstrapValidator.isValid', true);
            }

            var field = $field.attr('name');

            delete this.xhrRequests[field][validatorName];

            this.numPendingRequests--;
            if (this.numPendingRequests <= 0) {
                this.numPendingRequests = 0;
                if (this.formSubmited) {
                    if (this.options.submitHandler && 'function' == typeof this.options.submitHandler) {
                        this.options.submitHandler.call(this, this, this.$form);
                    } else {
                        this.$form.submit();
                    }
                }
            }
        },

        /**
         * Kiểm tra tính hợp lệ của biểu mẫu
         *
         * @returns {boolean}
         */
        isValid: function() {
            if (this.numPendingRequests > 0) {
                return false;
            }
            for (var field in this.invalidFields) {
                if (this.invalidFields[field]) {
                    return false;
                }
            }
            return true;
        }
    };

    // Định nghĩa plugin
    $.fn.bootstrapValidator = function(options) {
        return this.each(function() {
            var $this = $(this), data = $this.data('bootstrapValidator');
            if (!data) {
                $this.data('bootstrapValidator', (data = new BootstrapValidator(this, options)));
            }
        });
    };

    // Trình xác nhận có sẵn
    $.fn.bootstrapValidator.validators = {};

    $.fn.bootstrapValidator.Constructor = BootstrapValidator;
}(window.jQuery));
