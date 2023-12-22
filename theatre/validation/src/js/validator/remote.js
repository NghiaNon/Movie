(function($) {
    $.fn.bootstrapValidator.validators.remote = {
        /**
         * Yêu cầu máy chủ từ xa kiểm tra giá trị đầu vào
         *
         * Phiên bản plugin trình xác thực @param {BootstrapValidator}
         * @param {jQuery} validator tử trường $field
         * Tùy chọn @param {Object} $field thể bao gồm các khóa sau:
         * - địa chỉ
         * - data [tùy chọn]: Mặc định sẽ lấy giá trị
         * {
         * <fieldName>: <fieldValue>
         * }
         * - tin nhắn: Tin nhắn không hợp lệ
         * @returns {boolean}
         */
        validate: function(validator, $field, options) {
            var value = $field.val(), name = $field.attr('name'), data = options.data;
            if (data == null) {
                data = {};
            }
            data[name] = value;
            var xhr = $.ajax({
                type: 'POST',
                url: options.url,
                dataType: 'json',
                data: data
            }).success(function(response) {
                var isValid =  response.valid === true || response.valid === 'true';
                validator.completeRequest($field, 'remote', isValid);
            });
            validator.startRequest($field, 'remote', xhr);

            return 'pending';
        }
    };
}(window.jQuery));
