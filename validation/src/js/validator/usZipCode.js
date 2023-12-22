(function($) {
    $.fn.bootstrapValidator.validators.usZipCode = {
        /**
         *Trả về true khi và chỉ khi giá trị đầu vào là mã zip hợp lệ của Hoa Kỳ
         *
         * @param {BootstrapValidator} validator Phiên bản plugin xác thực
         * @param {jQuery} $field Phần tử trường
         * @param {Object} options
         * @returns {boolean}
         */
        validate: function(validateInstance, $field, options) {
            var value = $field.val();
            return /^\d{5}([\-]\d{4})?$/.test(value);
        }
    };
}(window.jQuery));
