(function($) {
    $.fn.bootstrapValidator.validators.hexColor = {
        /**
         * Trả về true nếu giá trị đầu vào là màu hex hợp lệ
         *
         * @param {BootstrapValidator} validator phiên bản plugin xác thực của anh ấy
         * @param {jQuery} $field Phần tử trường
         * @param {Object} options Có thể bao gồm các phím sau:
         * - tin nhắn: Tin nhắn không hợp lệ
         * @returns {boolean}
         */
        validate: function(validator, $field, options) {
            var value = $field.val();
            return /(^#[0-9A-F]{6}$)|(^#[0-9A-F]{3}$)/i.test(value);
        }
    };
}(window.jQuery));
