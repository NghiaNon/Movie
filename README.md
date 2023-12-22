# Hệ thống đặt vé xem phim

Đây là một dự án tạo web đặt vé xem phim cơ bản với PHP của chúng tôi. Dự án này là một ứng dụng Web giúp người dùng dễ dàng đặt vé và theo dõi thông tin chi tiết về các bộ phim và suất chiếu. Cùng với đó, chúng tôi còn có thêm giao diện của admin, giao diện quản lý rạp phim cho nhà quản lý. Với giao diện thân thiện người dùng thân thiện, dễ sử dụng, dự án cung cấp các trải nghiệm đặt vé trực tuyến thuận lợi và linh hoạt.

# Giới thiệu dự án Hệ thống đặt vé xem phim
Dự án hệ thống này tập trung chủ yếu vào việc giao dịch với khách hàng, quản lý rạp liên quan đến việc đặt vé của họ và các bộ phận khác của phía quản lý. Ngoài ra, hệ thống cho phép khách hàng đăng nhập hoặc đăng ký nếu chưa có tài khoản để đặt đồ. Dự án được chia thành ba loại: Phía khách hàng, Bảng quản trị và Bảng điều khiển rạp phim. Trong phần tổng quan của trang web này (tham khảo phía khách hàng), khách hàng có thể xem số lượng phim hiện có, phim sắp ra mắt và đoạn giới thiệu phim hay nhất của mỗi trang. Hệ thống hiển thị chi tiết từng phim hiện có, sau đó khách hàng chỉ cần chọn thời gian chiếu và số lượng vé để đến phần thanh toán. Sau tất cả quá trình này, khách hàng có thể xem lịch sử đặt vé của mình bằng ID đặt chỗ, tên phim, số lượng vé và tổng số tiền vé.

# Các tính năng có sẵn:
- Phía khách hàng
- Bảng quản trị
- Bảng điều khiển rạp phim
- Đăng ký khách hàng
- Phim, trailer sắp chiếu, đang chiếu
- Đặt chỗ
- Thanh toán
- Lịch sử đặt chỗ
- Sắp xếp phim
- Liệt kê chi tiết phim sắp tới
- Hiển thị quản lý
- Sắp xếp màn hình phim và thời gian chiếu
- Liên hệ với quản lý nếu có vấn đề
- Bắt đầu và dừng chương trình đang chạy

# Cách chạy chương trình
- Cài đặt máy chủ Apache (Khuyên dùng XAMPP).
- Đề xuất phiên bản PHP sử dụng là bản 5.6.3.
- Cài đặt máy chủ MySQL (Nếu dùng XAMPP thì đã có sẵn Phpmyadmin).
- Lưu dự án về máy chủ (Nếu dùng XAMPP thì lưu vào thư mục htdocs trên XAMPP).
- Chạy máy chủ Apache và MySQL.
- Sử dụng Phpmyadmin được tích hợp từ XAMPP, tạo cơ sở dữ liệu với tên như file sql trong thư mục DATABASE FILE và import file sql trên vào cơ sở dữ liệu này.
- Mở trình duyệt của bạn và nhập url cho thư mục vừa tạo.
- Theo mặc định, điều này sẽ mở ra Index.php và bạn có thể điều hướng từ đây bằng giao diện dựa trên web.
- Đảm bảo đăng ký làm người dùng và đăng nhập để bắt đầu đặt vé.
