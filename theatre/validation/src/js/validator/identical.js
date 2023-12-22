(function($) {
    $.fn.bootstrapValidator.validators.identical = {
        /**
         * Kiểm tra xem giá trị đầu vào có bằng giá trị cụ thể không
         *
         * @param {BootstrapValidator} validator Phiên bản plugin xác thực
         * @param {jQuery} $field Phần tử trường
         * @param {Object} options Gồm có khóa sau:
         * - field: Tên trường sẽ được sử dụng để so sánh với trường hiện tại
         * @returns {boolean}
         */
        validate: function(validator, $field, options) {
            var value        = $field.val(),
                $compareWith = validator.getFieldElement(options.field);
            if ($compareWith && value == $compareWith.val()) {
                validator.removeError($compareWith);
                return true;
            } else {
                return false;
            }
        }
    };
}(window.jQuery));
