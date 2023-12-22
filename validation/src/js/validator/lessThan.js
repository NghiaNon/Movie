(function($) {
    $.fn.bootstrapValidator.validators.lessThan = {
        /**
         * Trả về true nếu giá trị đầu vào nhỏ hơn hoặc bằng số đã cho
         *
         * Trình xác thực @param {BootstrapValidator} Phiên bản plugin của trình xác thực
         * @param {jQuery} Phần tử trường $field
         * Tùy chọn @param {Object} Có thể bao gồm các khóa sau:
         * - value: Số dùng để so sánh với
         * - bao gồm [tùy chọn]: Có thể đúng hoặc sai. Mặc định là đúng
         * - tin nhắn: Tin nhắn không hợp lệ
         * @returns {boolean}
         */
        validate: function(validator, $field, options) {
            var value = parseFloat($field.val());
            return (options.inclusive === true) ? (value < options.value) : (value <= options.value);
        }
    };
}(window.jQuery));
