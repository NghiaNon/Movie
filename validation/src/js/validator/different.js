(function($) {
    $.fn.bootstrapValidator.validators.different = {
        /**
         * Trả về true nếu giá trị đầu vào khác với giá trị của trường đã cho
         *
         * Trình xác thực @param {BootstrapValidator} Phiên bản plugin của trình xác thực
         * @param {jQuery} Phần tử trường $field
         * Tùy chọn @param {Object} Bao gồm khóa sau:
         * - field: Tên trường sẽ được sử dụng để so sánh với trường hiện tại
         * @returns {boolean}
         */
        validate: function(validator, $field, options) {
            var value        = $field.val(),
                $compareWith = validator.getFieldElement(options.field);
            if ($compareWith && value != $compareWith.val()) {
                validator.removeError($compareWith);
                return true;
            } else {
                return false;
            }
        }
    };
}(window.jQuery));
