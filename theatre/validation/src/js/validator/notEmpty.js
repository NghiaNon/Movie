(function($) {
    $.fn.bootstrapValidator.validators.notEmpty = {
        /**
         * Kiểm tra xem giá trị đầu vào có trống hay không
         *
         * @param {BootstrapValidator} validator Phiên bản plugin xác thực
         * @param {jQuery} $field Phần tử trường
         * @param {Object} options
         * @returns {boolean}
         */
        validate: function(validator, $field, options) {
            var type = $field.attr('type');
            return ('checkbox' == type || 'radio' == type) ? $field.is(':checked') : ($.trim($field.val()) != '');
        }
    };
}(window.jQuery));
