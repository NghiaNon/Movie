<div class="footer">
	<div class="wrap">
		<div class="footer-top">
			<div class="col_1_of_4 span_1_of_4">
				<div class="footer-nav">
					<ul>
						<li><a href="index.php" style="text-decoration:none;">Trang chủ</a></li>
						<li><a href="movies_events.php" style="text-decoration:none;">Danh sách phim</a></li>
						<li><a href="login.php" style="text-decoration:none;">Đăng nhập</a></li>
					</ul>
				</div>
			</div>
			<div class="col_1_of_4 span_1_of_4">
				<div class="textcontact">
					<p>Hỗ trợ<br>
						Hệ thống đặt vé xem phim trực tuyến<br>
						Ph: 012345678<br>
					</p>
				</div>
			</div>
			<div class="col_1_of_4 span_1_of_4">
				<div class="call_info">
					<p class="txt_3">Tư vấn miễn phí</p>
					<p class="txt_4">1900 000</p>
					<a href="contact.php" style="text-decoration: none; color:#fff;">Liên hệ</a>
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
</body>

</html>

<style>
	.content {
		padding-bottom: 0px !important;
	}

	#form111 {
		width: 500px;
		margin: 50px auto;
	}

	#search111 {
		padding: 8px 15px;
		background-color: #fff;
		border: 0px solid #dbdbdb;
	}

	#button111 {
		position: relative;
		padding: 6px 15px;
		left: -8px;
		border: 2px solid #db9603;
		background-color: #db9603;
		color: #f7f8f9;
	}

	#button111:hover {
		background-color: #dba303;
		color: white;
	}
	a{
		color:#666;
	}
</style>

<script src="js/auto-complete.js"></script>
<link rel="stylesheet" href="css/auto-complete.css">
<script>
	var demo1 = new autoComplete({
		selector: '#search111',
		minChars: 1,
		source: function(term, suggest) {
			term = term.toLowerCase();
			<?php
			$qry2 = mysqli_query($con, "select * from tbl_movie");
			?>
			var string = "";
			<?php $string = "";
			while ($ss = mysqli_fetch_array($qry2)) {

				$string .= "'" . strtoupper($ss['movie_name']) . "'" . ",";
				


			}
			?>
			//alert("<?php echo $string; ?>");
			var choices = [<?php echo $string; ?>];
			var suggestions = [];
			for (i = 0; i < choices.length; i++)
				if (~choices[i].toLowerCase().indexOf(term)) suggestions.push(choices[i]);
			suggest(suggestions);
		}
	});
</script>