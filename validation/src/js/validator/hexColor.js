(function($) {
    $.fn.bootstrapValidator.validators.hexColor = {
        /**
         * Trả về true nếu giá trị đầu vào là màu hex hợp lệ
         *
         * Trình xác thực @param {BootstrapValidator} Phiên bản plugin của trình xác thực
         * @param {jQuery} Phần tử trường $field
         * Tùy chọn @param {Object} Có thể bao gồm các khóa sau:
         * - tin nhắn: Tin nhắn không hợp lệ
         * @returns {boolean}
         */
        validate: function(validator, $field, options) {
            var value = $field.val();
            return /(^#[0-9A-F]{6}$)|(^#[0-9A-F]{3}$)/i.test(value);
        }
    };
}(window.jQuery));
