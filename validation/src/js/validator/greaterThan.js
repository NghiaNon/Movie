(function($) {
    $.fn.bootstrapValidator.validators.greaterThan = {
       /**
         * Trả về true nếu giá trị đầu vào lớn hơn hoặc bằng số đã cho
         *
         * Trình xác thực @param {BootstrapValidator} Xác thực phiên bản plugin
         * @param {jQuery} Phần tử trường $field
         * Tùy chọn @param {Object} Có thể bao gồm các khóa sau:
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
