(function($) {
    $.fn.bootstrapValidator.validators.between = {
       /**
         * Trả về true nếu giá trị đầu vào nằm giữa (đúng hoặc không) hai số đã cho
         *
         * Trình xác thực @param {BootstrapValidator} Phiên bản plugin của trình xác thực
         * @param {jQuery} Phần tử trường $field
         * Tùy chọn @param {Object} Có thể bao gồm các khóa sau:
         * - phút
         * - tối đa
         * - bao gồm [tùy chọn]: Có thể đúng hoặc sai. Mặc định là đúng
         * - tin nhắn: Tin nhắn không hợp lệ
         * @returns {boolean}
         */
        validate: function(validator, $field, options) {
            var value = parseFloat($field.val());
            return (options.inclusive === true)
                        ? (value > options.min && value < options.max)
                        : (value >= options.min && value <= options.max);
        }
    };
}(window.jQuery));
