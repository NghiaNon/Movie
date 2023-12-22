(function($) {
    $.fn.bootstrapValidator.validators.uri = {
        /**
         * Trả về true nếu giá trị đầu vào là URL hợp lệ
         *
         * @param {BootstrapValidator} validator Phiên bản plugin xác thực
         * @param {jQuery} $field Phần tử trường
         * @param {Object} options
         * @returns {boolean}
         */
        validate: function(validator, $field, options) {
            // Thanh toán cho https://gist.github.com/dperini/729294
            //
            // Biểu thức chính quy để xác thực URL
            //
            // Tác giả: Diego Perini
            // Cập nhật: 2010/12/05
            //
            // biểu thức chính quy được soạn và nhận xét
            // có thể dễ dàng điều chỉnh để tuân thủ RFC,
            // nó đã được sửa đổi rõ ràng để phù hợp và đáp ứng
            // những thử nghiệm này cho trình rút ngắn URL:
            //
            // http://mathiasbynens.be/demo/url-regex
            //
            // Lưu ý về những khác biệt có thể có so với xác thực tiêu chuẩn/chung:
            //
            // - lớp char utf-8 xem xét phạm vi Unicode đầy đủ
            // - TLD đã được đặt thành bắt buộc nên các tên đơn lẻ như "localhost" không thành công
            // - các giao thức chỉ được giới hạn ở ftp, http và https theo yêu cầu
            //
            // Thay đổi:
            //
            // - Xác thực ký hiệu chấm địa chỉ IP, phạm vi: 1.0.0.0 - 223.255.255.255
            // địa chỉ IP đầu tiên và cuối cùng của mỗi lớp được coi là không hợp lệ
            // (vì chúng là địa chỉ quảng bá/mạng)
            //
            // - Đã thêm loại trừ các phạm vi mạng riêng, dành riêng và/hoặc cục bộ
            //
            // Phiên bản một dòng được nén:
            //
            // Phiên bản Javascript
            //
            // /^(?:(?:https?|ftp):\/\/)(?:\S+(?::\S*)?@)?(?:(?!10(?:\. \d{1,3}){3})(?!127(?:\.\d{1,3}){3})(?!169\.254(?:\.\d{1, 3}){2})(?!192\.168(?:\.\d{1,3}){2})(?!172\.(?:1[6-9]|2\d |3[0-1])(?:\.\d{1,3}){2})(?:[1-9]\d?|1\d\d|2[01]\d| 22[0-3])(?:\.(?:1?\d{1,2}|2[0-4]\d|25[0-5])){2}(?:\. (?:[1-9]\d?|1\d\d|2[0-4]\d|25[0-4]))|(?:(?:[a-z\u00a1-\uffff0- 9]+-?)*[a-z\u00a1-\uffff0-9]+)(?:\.(?:[a-z\u00a1-\uffff0-9]+-?)*[a-z\u00a1-\uffff0- 9]+)*(?:\.(?:[a-z\u00a1-\uffff]{2,})))(?::\d{2,5})?(?:\/[^\s ]*)?$/tôi
            //
            // Phiên bản PHP
            //
            // _^(?:(?:https?|ftp)://)(?:\S+(?::\S*)?@)?(?:(?!10(?:\.\d{1,3}){3})(?!127(?:\.\d{1,3}){3})(?!169\.254(?:\.\d{1,3}){2})(?!192\.168(?:\.\d{1,3}){2})(?!172\.(?:1[6-9]|2\d|3[0-1])(?:\.\d{1,3}){2})(?:[1-9]\d?|1\d\d|2[01]\d|22[0-3])(?:\.(?:1?\d{1,2}|2[0-4]\d|25[0-5])){2}(?:\.(?:[1-9]\d?|1\d\d|2[0-4]\d|25[0-4]))|(?:(?:[a-z\x{00a1}-\x{ffff}0-9]+-?)*[a-z\x{00a1}-\x{ffff}0-9]+)(?:\.(?:[a-z\x{00a1}-\x{ffff}0-9]+-?)*[a-z\x{00a1}-\x{ffff}0-9]+)*(?:\.(?:[a-z\x{00a1}-\x{ffff}]{2,})))(?::\d{2,5})?(?:/[^\s]*)?$_iuS
            var urlExp = new RegExp(
                "^" +
               // định danh giao thức
                "(?:(?:https?|ftp)://)" +
                // người dùng: vượt qua xác thực
                "(?:\\S+(?::\\S*)?@)?" +
                "(?:" +
               // loại trừ địa chỉ IP
                // mạng riêng & mạng cục bộ
                "(?!10(?:\\.\\d{1,3}){3})" +
                "(?!127(?:\\.\\d{1,3}){3})" +
                "(?!169\\.254(?:\\.\\d{1,3}){2})" +
                "(?!192\\.168(?:\\.\\d{1,3}){2})" +
                "(?!172\\.(?:1[6-9]|2\\d|3[0-1])(?:\\.\\d{1,3}){2})" +
               // Địa chỉ IP ký hiệu chấm chấm
                // loại trừ mạng loopback 0.0.0.0
                // loại trừ không gian dành riêng >= 224.0.0.0
                // loại trừ địa chỉ mạng và quảng bá
                // (địa chỉ IP đầu tiên và cuối cùng của mỗi lớp)
                "(?:[1-9]\\d?|1\\d\\d|2[01]\\d|22[0-3])" +
                "(?:\\.(?:1?\\d{1,2}|2[0-4]\\d|25[0-5])){2}" +
                "(?:\\.(?:[1-9]\\d?|1\\d\\d|2[0-4]\\d|25[0-4]))" +
                "|" +
                // host name
                "(?:(?:[a-z\\u00a1-\\uffff0-9]+-?)*[a-z\\u00a1-\\uffff0-9]+)" +
                // domain name
                "(?:\\.(?:[a-z\\u00a1-\\uffff0-9]+-?)*[a-z\\u00a1-\\uffff0-9]+)*" +
                // TLD identifier
                "(?:\\.(?:[a-z\\u00a1-\\uffff]{2,}))" +
                ")" +
                // port number
                "(?::\\d{2,5})?" +
                // resource path
                "(?:/[^\\s]*)?" +
                "$", "i"
            );
            return urlExp.test($field.val());
        }
    };
}(window.jQuery));
