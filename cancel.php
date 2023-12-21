<?php
session_start();
include('config.php');
mysqli_query($con, "delete from tbl_bookings where book_id='" . $_GET['id'] . "'");
$_SESSION['success'] = "Đã hủy đặt chỗ thành công";
header('location:profile.php');
