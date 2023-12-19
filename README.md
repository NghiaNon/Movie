# Hệ thống đặt vé xem phim

Một dự án nâng cao dựa trên Hệ thống đặt vé xem phim trực tuyến sử dụng Ngôn ngữ PHP. Dự án PHP sau chứa tất cả các tính năng quan trọng có thể được sử dụng cho sinh viên CNTT năm thứ nhất, năm thứ hai cũng như năm cuối cho các dự án đại học của họ. Nó có các tính năng quan trọng cho phép tất cả người dùng tương tác theo cách mà hệ thống bán vé trực tuyến tương tác với khách hàng của họ về cách xử lý các khoản thanh toán, đặt chỗ và những nội dung khác của họ. Hệ thống này cũng như khái niệm của ứng dụng web đều rõ ràng, nó giống với các tình huống thực tế và được triển khai tốt trên đó. Để tải xuống dự án hệ thống đặt vé xem phim trực tuyến miễn phí bằng PHP với các tệp mã nguồn, vui lòng cuộn xuống cuối bài đăng này để tìm nút Tải xuống.


# Giới thiệu dự án Hệ thống đặt vé xem phim
Tiếp tục, dự án hệ thống đặt vé xem phim bằng PHP này tập trung chủ yếu vào việc giao dịch với khách hàng, quản lý rạp liên quan đến việc đặt vé của họ và các bộ phận khác của phía quản lý. Ngoài ra, hệ thống cho phép khách hàng đăng nhập hoặc đăng ký nếu chưa có tài khoản để đặt đồ. Dự án được chia thành ba loại: Phía khách hàng, Bảng quản trị và Bảng điều khiển rạp hát. Trong phần tổng quan của trang web này (tham khảo phía khách hàng), khách hàng có thể xem số lượng phim hiện có, phim sắp ra mắt và đoạn giới thiệu phim hay nhất của mỗi trang. Nói thêm về dự án, hệ thống hiển thị chi tiết từng dự án nếu có, sau đó khách hàng chỉ cần chọn thời gian chiếu và số lượng vé để đến phần thanh toán. Sau tất cả quá trình này, khách hàng có thể xem lịch sử đặt vé của mình bằng ID đặt chỗ, tên phim, số lượng vé và tổng số tiền vé.


# Quản trị viên
Nói về bảng quản trị, quản trị viên có thể xem tất cả các phim có sẵn tại rạp và xóa nó. Anh ấy/cô ấy có thể đăng thông tin chi tiết về việc phát hành phim bằng cách điền các thông tin chi tiết như tên phim, dàn diễn viên, ngày phát hành, mô tả phim (tóm tắt cốt truyện), đoạn giới thiệu cụ thể và áp phích phim. Ngoài ra, quản trị viên có quyền truy cập để duy trì danh sách phát hành phim sắp tới. Để làm điều này, anh ấy/cô ấy phải điền tên bộ phim sắp ra mắt, ngày phát hành, mô tả, thông tin diễn viên và hình ảnh áp phích (nếu có). Đối với hệ thống đặt vé xem phim trực tuyến này, bảng quản trị có các tính năng hạn chế trong khi vai trò chính thuộc về phía quản lý rạp chiếu được trình bày ngắn gọn dưới đây.


# Hệ thống quản lý 
Mặt khác, hệ thống này không chỉ có chức năng đặt phim và thanh toán. Nó cũng chứa phần quản lý rạp hát để quản lý tất cả các chi tiết bên trong trang web. Sau khi đăng nhập vào bảng điều khiển rạp hát, người dùng có một số lượng lớn các tính năng để vận hành trong hệ thống. Tại đây, người dùng có thể quản lý chi tiết phim, chương trình, danh sách đặt chỗ, màn hình, thời gian và chi tiết rạp chiếu phim. Để quản lý các chương trình, người dùng phải chọn phim, màn hình, lịch chiếu và ngày bắt đầu. Sau đó, người dùng có thể chỉ cần thay đổi trạng thái chiếu phim thành đang chạy và có thể dừng chiếu nếu muốn. Trang bảng điều khiển chính cũng hiển thị số lượng phim đang chiếu dưới dạng bảng kèm theo thời gian chiếu, tiêu đề và màn hình của từng phim. Trong phần đặt chỗ, anh ấy/cô ấy có thể liệt kê tất cả các lượt đặt chỗ của một chương trình và màn hình cụ thể.


# Hiển thị thời gian và chi tiết màn hình
Ngoài ra, người dùng có thể thêm màn hình bằng cách nhập tên màn hình, tổng số ghế và tổng phí cho mỗi ghế. Đây sau này sẽ là một yếu tố quan trọng khi đặt phim vì hệ thống sử dụng số tiền để tính phí cho khách hàng theo sở thích chọn màn hình này. Không chỉ vậy, hệ thống còn cho phép người dùng thêm thông tin chi tiết về thời gian hiển thị của từng màn hình có sẵn. Để thêm thời gian của chương trình, trước tiên anh ấy/cô ấy phải chọn một màn hình, sau đó thêm thời gian bắt đầu bao nhiêu tùy thích. Một rạp hát có nhiều giờ chiếu nên nó cũng cho phép nhập nhiều giờ chiếu. Tất cả thông tin này được tham chiếu đến phía khách hàng trong khi kiểm tra một số chi tiết phim nhất định trong các chương trình có sẵn.


Cuối cùng nhưng không kém phần quan trọng, một bảng điều khiển đơn giản và gọn gàng được trình bày bằng mẫu Bootstrap Admin LTE miễn phí với các kết hợp màu đơn giản để mang lại trải nghiệm người dùng tốt hơn khi sử dụng dự án hệ thống quản lý rạp chiếu phim và dự án hệ thống vé xem phim trực tuyến này bằng PHP. Đối với các thành phần giao diện người dùng, khung CSS nguồn mở miễn phí; Bootstrap với Vanilla CSS đã có sẵn. Trình bày một dự án hệ thống đặt vé xem phim mới bằng PHP bao gồm bảng điều khiển phía khách hàng, bảng quản trị và bảng điều khiển rạp chiếu phim chứa tất cả các tính năng cần thiết để theo dõi và nguồn tài nguyên am hiểu cho mục đích học tập.



# Các tính năng có sẵn:


- Phía khách hàng
- bảng quản trị
- Bảng điều khiển rạp hát
- Đăng ký khách hàng
- Phim, trailer sắp chiếu, đang chiếu
- Đặt chỗ
- Thanh toán
- Lịch sử đặt chỗ
- Sắp xếp phim
- Liệt kê chi tiết phim sắp tới
- Hiển thị quản lý
- Sắp xếp màn hình phim và thời gian chiếu
- Bắt đầu và dừng chương trình đang chạy


# Cách chạy chương trình
- Cài đặt máy chủ Apache. (khuyên dùng XAMPP)
- Cài đặt máy chủ MySQL.
- Lưu dự án về máy chủ (nếu dùng XAMPP thì lưu vào thư mục htdocs trên XAMPP).
- Chạy máy chủ Apache và MySQL.
- Sử dụng Phpmyadmin được tích hợp từ XAMPP, tạo cơ sở dữ liệu với tên như file sql trong thư mục DATABASE FILE và import file sql trên vào cơ sở dữ liệu này.
- Mở trình duyệt của bạn và nhập url cho thư mục vừa tạo.
- Theo mặc định, điều này sẽ mở ra Index.php và bạn có thể điều hướng từ đây bằng giao diện dựa trên web.
- Đảm bảo đăng ký làm người dùng và đăng nhập để bắt đầu đặt vé.
