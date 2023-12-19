<?php
include('config.php');
session_start();
date_default_timezone_set('Asia/Kathmandu');
?>

<!DOCTYPE HTML>
<html>

<head>
	<title>Đặt vé xem phim ngay</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="all" />
	<link type="text/css" rel="stylesheet" href="http://www.dreamtemplate.com/dreamcodes/tabs/css/tsc_tabs.css" />
	<link rel="stylesheet" href="css/tsc_tabs.css" type="text/css" media="all" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src='js/jquery.color-RGBa-patch.js'></script>
	<script src='js/example.js'></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
	<div class="header">
		<div class="header-top">
			<div class="wrap">
				<div class="h-logo">
					<a href="index.php"><img src="images/logo.png" alt="Logo Image Here" width="100" height="100" /></a>
				</div>
				<div class="nav-wrap">
					<ul class="group" id="example-one">
						<li><a href="index.php">Trang chủ</a></li>
						<li><a href="movies_events.php">Danh sách phim</a></li>
						<li><?php if (isset($_SESSION['user'])) {
								$us = mysqli_query($con, "select * from tbl_registration where user_id='" . $_SESSION['user'] . "'");
								$user = mysqli_fetch_array($us); ?><a href="profile.php"><?php echo $user['name']; ?></a><a href="logout.php">Đăng xuất</a><?php } else { ?><a href="login.php">Đăng nhập</a> <a href="registration.php">Đăng ký</a><?php } ?></li>
					</ul>
				</div>
				<div class="clear"></div>

			</div>

		</div>
		<div class="clear"></div>

		<div class="block">
			<div class="wrap">

				<form action="process_search.php" id="reservation-form" method="post" onsubmit="myFunction()">
					<fieldset>
						<div class="field">


							<input type="text" placeholder="Nhập tên phim mà bạn muốn tìm" style="height:30px;width:300px" required id="search111" name="search">

							<input type="submit" value="Search" style="height:34px;padding-top:3px" id="button111">
						</div>

					</fieldset>
				</form>
				<div class="clear"></div>
			</div>
		</div>
		<script>
			function myFunction() {
				if ($('#hero-demo').val() == "") {
					alert("Please enter movie name...");
					return false;
				} else {
					return true;
				}
			}
		</script>

	</div>
</body>

</html>