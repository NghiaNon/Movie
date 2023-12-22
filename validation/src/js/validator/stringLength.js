(function($) {
    $.fn.bootstrapValidator.validators.stringLength = {
        /**
         * Kiểm tra xem độ dài của giá trị phần tử có nhỏ hơn hoặc nhiều hơn số đã cho không
         *
         * Trình xác thực @param {BootstrapValidator} Phiên bản plugin của trình xác thực
         * @param {jQuery} Phần tử trường $field
         * Tùy chọn @param {Object} Bao gồm các khóa sau:
         * - phút
         * - tối đa
         * Cần có ít nhất một trong hai phím
         * @returns {boolean}
         */
        validate: function(validator, $field, options) {
            var value = $.trim($field.val()), length = value.length;
            if ((options.min && length < options.min) || (options.max && length > options.max)) {
                return false;
            }

            return true;
        }
    };
}(window.jQuery));
