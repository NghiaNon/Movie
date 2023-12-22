(function($) {
    $.fn.bootstrapValidator.validators.greaterThan = {
        /**
         * Trả về true nếu giá trị đầu vào lớn hơn hoặc bằng số đã cho
         *
         * @param {BootstrapValidator} validator phiên bản plugin xác thực của anh ấy
         * @param {jQuery} $field Phần tử trường
         * @param {Object} options Có thể bao gồm các phím sau:
         * - value: Số dùng để so sánh với
         * - bao gồm [tùy chọn]: Có thể đúng hoặc sai. Mặc định là đúng
         * - tin nhắn: Tin nhắn không hợp lệ
         * @returns {boolean}
         */
        validate: function(validator, $field, options) {
            var value = parseFloat($field.val());
            return (options.inclusive === true) ? (value > options.value) : (value >= options.value);
        }
    }
}(window.jQuery));
