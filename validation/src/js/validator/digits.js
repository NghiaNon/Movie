(function($) {
    $.fn.bootstrapValidator.validators.digits = {
        /**
         * Trả về true nếu giá trị đầu vào chỉ chứa các chữ số
         *
         * Trình xác thực @param {BootstrapValidator} Xác thực phiên bản plugin
         * @param {jQuery} Phần tử trường $field
         * Tùy chọn @param {Object}
         * @returns {boolean}
         */
        validate: function(validator, $field, options) {
            return /^\d+$/.test($field.val());
        }
    }
}(window.jQuery));
