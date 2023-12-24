<?php
// Kiểm tra và đặt giá trị mặc định nếu biến không tồn tại
$name = isset($_POST['name']) ? $_POST['name'] : '';
$mobile = isset($_POST['mobile']) ? $_POST['mobile'] : '';
$subject = isset($_POST['subject']) ? $_POST['subject'] : '';

include('config.php');
extract($_POST);

$qry = mysqli_query($con, "INSERT INTO tbl_contact VALUES (NULL, '$name', '$email', '$mobile', '$subject')");

// Kiểm tra xem truy vấn đã thực hiện thành công hay không
if ($qry) {
    echo "Cảm ơn bạn đã liên hệ!";
} else {
    echo "Có lỗi xảy ra. Vui lòng thử lại sau.";
}
?>
