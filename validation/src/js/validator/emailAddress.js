(function($) {
    $.fn.bootstrapValidator.validators.emailAddress = {
        /**
         * Trả về true khi và chỉ khi giá trị đầu vào là địa chỉ email hợp lệ
         *
         * Trình xác thực @param {BootstrapValidator} Xác thực phiên bản plugin
         * @param {jQuery} Phần tử trường $field
         * Tùy chọn @param {Object}
         * @returns {boolean}
         */
        validate: function(validator, $field, options) {
            var value = $field.val(),
                // Biểu thức chính quy của địa chỉ email
                // http://stackoverflow.com/questions/46155/validate-email-address-in-javascript
                emailRegExp = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return emailRegExp.test(value);
        }
    }
}(window.jQuery));
