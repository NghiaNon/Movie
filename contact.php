
<!DOCTYPE HTML>
<html>
	
<head>
	<title>Liên hệ</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js'></script>
	<script src='js/jquery.color-RGBa-patch.js'></script>
	<script src='js/example.js'></script>
</head>

<body>
	<div class="header">
		<div class="header-top">
			<div class="wrap">
				<div class="h-logo">
					<a href="index.php"><img src="images/logo.png" alt="" /></a>
				</div>
				<div class="nav-wrap">
					<ul class="group" id="example-one">
						<li><a href="index.php">Trang chủ</a></li>
						<li><a href="about.php">Thông Tin</a></li>
						<li><a href="movies_events.php">Phim và sự kiện</a></li>
						<li class="current_page_item"><a href="contact.php">Liên hệ</a></li>
					</ul>
				</div>
				<div class="clear"></div>
			</div>
		</div>
		<div class="block">
			<div class="wrap">

				<form action="#" id="reservation-form" method="post">
					<fieldset>
						<div class="field">
							<label>Tìm phim:</label>
							<select class="select2">
								<option>Danh sách phim</option>
							</select>
						</div>
						<div class="field1">
							<label>Tìm kiếm</label>
							<select class="select1">
								<option>Phim hoặc diễn viên</option>
							</select>
						</div>
					</fieldset>
				</form>
				<div class="clear"></div>
			</div>
		</div>
	</div>
	<div class="content">
		<div class="wrap">
			<div class="content-top">
				<div class="section group">
					<div class="col span_2_of_3">
						<div class="contact-form">
							<h3>Liên hệ chúng tôi</h3>
							<form action="process_contact.php" method="post" name="form11">
								<div>
									<span><label>Họ và tên</label></span>
									<span><input type="text" value="" required name="tên"></span>
								</div>
								<div>
									<span><label>E-MAIL</label></span>
									<span><input type="text" value="" required name="email"></span>
								</div>
								<div>
									<span><label for="phone">Số điện thoại</label></span>
									<span><input type="tel" value="" required name="phone" id="phone"></span>
								</div>

								<div>
									<span><label>Mô tả</label></span>
									<span><textarea required name="subect"> </textarea></span>
								</div>
								<div>
									<span><input type="submit" value="Gửi" style="background-color:green;"></span>
								</div>
							</form>
						</div>
					</div>
					<div class="col span_1_of_3">
						<div class="contact_info">
							<h3>Tìm thêm thông tin về chúng tôi</h3>
							<div class="map">
								<iframe width="100%" height="175" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.9229048098523!2d105.80550057476837!3d20.995727288913272!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135add3018563bb%3A0x70bf956e9956d3f0!2zMzM0IE5ndXnhu4VuIFRyw6NpLCBUaGFuaCBYdcOibiBUcnVuZywgVGhhbmggWHXDom4sIEjDoCBO4buZaSwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1702995394971!5m2!1svi!2s"></iframe><br><small><a href="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.9229048098523!2d105.80550057476837!3d20.995727288913272!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135add3018563bb%3A0x70bf956e9956d3f0!2zMzM0IE5ndXnhu4VuIFRyw6NpLCBUaGFuaCBYdcOibiBUcnVuZywgVGhhbmggWHXDom4sIEjDoCBO4buZaSwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1702995394971!5m2!1svi!2s" style="color:#666;text-align:left;font-size:12px">Xem bản đồ lớn hơn</a></small>
							</div>
						</div>
						<div class="company_address">
							<h3>Thông tin rạp :</h3>
							<p>334 Nguyễn Trãi,</p>
							<p>Thanh Xuân, Hà Nội,</p>
							<p>Phone:(00) 111 333 555</p>
							<p>Fax: (000) 123 45 45 1</p>
							<p>Email: <span>thongtin@congty.com</span></p>
							<p>Theo dõi chúng tôi: <span>Facebook</span>, <span>Twitter</span></p>
						</div>
					</div>
				</div>
				<div class="clear"></div>
			</div>
		</div>
	</div>
	
	<?php include('footer.php'); ?>
	<div class="footer-bottom">
		<div class="wrap">
		
		</div>
	</div>
</body>

</html>