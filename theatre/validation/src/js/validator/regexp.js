(function($) {
    $.fn.bootstrapValidator.validators.regexp = {
        /**
         * Kiểm tra xem giá trị phần tử có khớp với biểu thức chính quy không
         *
         * @param {BootstrapValidator}  validator bản plugin của trình xác thực
         * @param {jQuery} $field tử trường $field
         * @param {Object} options gồm khóa sau:
         * - regrec: Biểu thức chính quy bạn cần kiểm tra
         * @returns {boolean}
         */
        validate: function(validator, $field, options) {
            var value = $field.val();
            return options.regexp.test(value);
        }
    };
}(window.jQuery));
