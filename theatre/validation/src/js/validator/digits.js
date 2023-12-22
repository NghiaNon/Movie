(function($) {
    $.fn.bootstrapValidator.validators.digits = {
        /**
         * Trả về true nếu giá trị đầu vào chỉ chứa các chữ số
         *
         * @param {BootstrapValidator} validator Xác thực phiên bản plugin
         * @param {jQuery} $field Phần tử trường
         * @param {Object} options
         * @returns {boolean}
         */
        validate: function(validator, $field, options) {
            return /^\d+$/.test($field.val());
        }
    }
}(window.jQuery));
