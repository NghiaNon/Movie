(function($) {
    $.fn.bootstrapValidator.validators.creditCard = {
        /**
         * Trả về true nếu giá trị đầu vào là số thẻ tín dụng hợp lệ
         * Dựa trên https://Gist.github.com/DiegoSalazar/4075533
         *
         * Trình xác thực @param {BootstrapValidator} Phiên bản plugin của trình xác thực
         * @param {jQuery} Phần tử trường $field
         * Tùy chọn @param {Object} Có thể bao gồm khóa sau:
         * - tin nhắn: Tin nhắn không hợp lệ
         * @returns {boolean}
         */
        validate: function(validator, $field, options) {
            var value = $field.val();

            // Accept only digits, dashes or spaces
            if (/[^0-9-\s]+/.test(value)) {
                return false;
            }

            // The Luhn Algorithm
            // http://en.wikipedia.org/wiki/Luhn
            value = value.replace(/\D/g, '');
            var check = 0, digit = 0, even = false, length = value.length;

            for (var n = length - 1; n >= 0; n--) {
                digit = parseInt(value.charAt(n), 10);

                if (even) {
                    if ((digit *= 2) > 9) {
                        digit -= 9;
                    }
                }

                check += digit;
                even = !even;
            }

            return (check % 10) == 0;
        }
    };
}(window.jQuery));
