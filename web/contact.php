
<!DOCTYPE HTML>
<html>

<head>
	<title>Mẫu trang web rạp chiếu phim miễn phí</title>
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
						<li><a href="about.php">Về</a></li>
						<li><a href="movies_events.php">Phim & Sự kiện</a></li>
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
							<label>Tìm một bộ phim:</label>
							<select class="select2">
								<option>Danh sách phim</option>
							</select>
						</div>
						<div class="field1">
							<label>Tìm kiếm</label>
							<select class="select1">
								<option>Phim hoặc Diễn viên</option>
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
							<h3>Contact Us</h3>
							<form action="process_contact.php" method="post" name="form11">
								<div>
									<span><label>Tên<nav></nav></label></span>
									<span><input type="text" value="" required name="name"></span>
								</div>
								<div>
									<span><label>E-MAIL</label></span>
									<span><input type="text" value="" required name="email"></span>
								</div>
								<div>
									<span><label>Số điện thoại</label></span>
									<span><input type="number" value="" required name="mobile"></span>
								</div>
								<div>
									<span><label>Mô Tả</label></span>
									<span><textarea required name="subect"> </textarea></span>
								</div>
								<div>
									<span><input type="submit">Gửi</span>
								</div>
							</form>
						</div>
					</div>
					<div class="col span_1_of_3">
						<div class="contact_info">
							<h3>Tìm chúng tôi ở đây</h3>
							<div class="map">
								<iframe width="100%" height="175" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.co.in/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Lighthouse+Point,+FL,+United+States&amp;aq=4&amp;oq=light&amp;sll=26.275636,-80.087265&amp;sspn=0.04941,0.104628&amp;ie=UTF8&amp;hq=&amp;hnear=Lighthouse+Point,+Broward,+Florida,+United+States&amp;t=m&amp;z=14&amp;ll=26.275636,-80.087265&amp;output=embed"></iframe><br><small><a href="https://maps.google.co.in/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=Lighthouse+Point,+FL,+United+States&amp;aq=4&amp;oq=light&amp;sll=26.275636,-80.087265&amp;sspn=0.04941,0.104628&amp;ie=UTF8&amp;hq=&amp;hnear=Lighthouse+Point,+Broward,+Florida,+United+States&amp;t=m&amp;z=14&amp;ll=26.275636,-80.087265" style="color:#666;text-align:left;font-size:12px">View Larger Map</a></small>
							</div>
						</div>
						<div class="company_address">
							<h3>Thông Tin Rạp:</h3>
							<p>334 Nguyễn Trãi,</p>
							<p>Thanh Xuân, Hà Nội</p>
							<p>Phone:(00) 111 333 555</p>
							<p>Fax: (000) 000 00 00 0</p>
							<p>Email: <span>thongtin@congty.com</span></p>
							<p>Theo dõi chúng tôi: <span>Facebook</span>, <span>Twitter</span></p>
						</div>
					</div>
				</div>
				<div class="clear"></div>
			</div>
		</div>
	</div>
	<div class="footer">
		<div class="wrap">
			<div class="footer-top">
				<div class="col_1_of_4 span_1_of_4">
					<div class="footer-nav">
						
					</div>
				</div>
				<div class="col_1_of_4 span_1_of_4">
					<div class="textcontact">
						<p>Cộng Tác viên,<br>
							Tổng đài viên<br>
							SĐT: +1-125-234-456789.<br>
							Email:hotro(at)hanoi.com<br>
						</p>
					</div>
				</div>
				<div class="col_1_of_4 span_1_of_4">
					<div class="call_info">
						<p class="txt_3">Tư Vấn miễn phí:</p>
						<p class="txt_4">1 800 234 23456</p>
					</div>
				</div>
				<div class="col_1_of_4 span_1_of_4">
					<div class=social>
						<a href="https://www.facebook.com/"><img src="images/fb.png" alt="" /></a>
						<a href="https://twitter.com/"><img src="images/tw.png" alt="" /></a>
					</div>
				</div>
				<div class="clear"></div>
			</div>
		</div>
	</div>
	<div class="footer-bottom">
		<div class="wrap">
		</div>
	</div>
</body>

</html>