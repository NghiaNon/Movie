(function($) {
    $.fn.bootstrapValidator.validators.regexp = {
        /**
         * Kiểm tra xem giá trị phần tử có khớp với biểu thức chính quy không
         *
         * Trình xác thực @param {BootstrapValidator} Phiên bản plugin của trình xác thực
         * @param {jQuery} Phần tử trường $field
         * Tùy chọn @param {Object} Bao gồm khóa sau:
         * - regrec: Biểu thức chính quy bạn cần kiểm tra
         * @returns {boolean}
         */
        validate: function(validator, $field, options) {
            var value = $field.val();
            return options.regexp.test(value);
        }
    };
}(window.jQuery));
