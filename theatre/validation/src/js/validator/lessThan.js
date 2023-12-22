(function($) {
    $.fn.bootstrapValidator.validators.lessThan = {
        /**
         * Trả về true nếu giá trị đầu vào nhỏ hơn hoặc bằng số đã cho
         *
         * @param {BootstrapValidator} validator Phiên bản plugin xác thực
         * @param {jQuery} $field Phần tử trường
         * @param {Object} options Có thể bao gồm các phím sau:
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
