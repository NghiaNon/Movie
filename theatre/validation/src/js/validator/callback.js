(function($) {
    $.fn.bootstrapValidator.validators.callback = {
        /**
         * Trả về kết quả từ phương thức gọi lại
         *
         * @param {BootstrapValidator} validator Phiên bản plugin xác thực
         * @param {jQuery} $field Phần tử trường
         * @param {Object} options Có thể bao gồm các phím sau:
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
