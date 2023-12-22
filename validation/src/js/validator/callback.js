(function($) {
    $.fn.bootstrapValidator.validators.callback = {
        /**
         * Trả về kết quả từ phương thức gọi lại
         *
         * Trình xác thực @param {BootstrapValidator} Phiên bản plugin của trình xác thực
         * @param {jQuery} Phần tử trường $field
         * Tùy chọn @param {Object} Có thể bao gồm các khóa sau:
         * - callback: Phương thức gọi lại truyền 2 tham số:
         * gọi lại: function(fieldValue, validator) {
         * // fieldValue là giá trị của trường
         * // trình xác thực là phiên bản của BootstrapValidator
         * }
         * - tin nhắn: Tin nhắn không hợp lệ
         * @returns {boolean}
         */
        validate: function(validator, $field, options) {
            var value = $field.val();
            if (options.callback && 'function' == typeof options.callback) {
                return options.callback.call(this, value, this);
            }
            return true;
        }
    };
}(window.jQuery));
