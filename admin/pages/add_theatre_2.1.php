<?php
include('header.php');
?>
<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Chi tết rạp chiếu phim
    </h1>
    <ol class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-home"></i> Trang chủ</a></li>
      <li><a href="add_theater.php">Thêm rạp</a></li>
      <li class="active">Thêm chi tiết rạp chiếu phim</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Chi tiếp chung</h3>
      </div>
      <div class="box-body">
        <?php
        $th = mysqli_query($con, "select * from tbl_theatre where id='" . $_GET['id'] . "'");
        $theatre = mysqli_fetch_array($th);
        ?>
        <table class="table table-bordered table-hover">
          <tr>
            <td class="col-md-6">Tên rạp</td>
            <td class="col-md-6"><?php echo $theatre['name']; ?></td>
          </tr>
          <tr>
            <td>Đại chỉ rạp chiếu phim</td>
            <td><?php echo $theatre['address']; ?></td>
          </tr>
          <tr>
            <td>Đường</td>
            <td><?php echo $theatre['place']; ?></td>
          </tr>
          <tr>
            <td>Thành phố</td>
            <td><?php echo $theatre['state']; ?></td>
          </tr>
          <tr>
            <td>Pin</td>
            <td><?php echo $theatre['pin']; ?></td>
          </tr>
        </table>
      </div>
      <!-- /.box-footer-->
    </div>
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Chi tiếp phòng chiếu phim</h3>
      </div>
      <div class="box-body" id="screendtls">
        <?php
        $sr = mysqli_query($con, "select * from tbl_screens where t_id='" . $_GET['id'] . "'");
        if (mysqli_num_rows($sr)) {
        ?>
          <table class="table table-bordered table-hover">
            <th class="col-md-1">Số thứ tự</th>
            <th class="col-md-3">Tên rạp</th>
            <th class="col-md-1">Chỗ ngồi</th>
            <th class="col-md-1">Giá vé</th>
            <th class="col-md-3">Thời gian chiếu</th>
            <th class="text-right col-md-3"><button data-toggle="modal" data-target="#view-modal" id="getUser" class="btn btn-sm btn-info"><i class="fa fa-plus"></i> Thêm phòng</button></th>
            <?php
            $sl = 1;
            while ($screen = mysqli_fetch_array($sr)) {
            ?>
              <tr>
                <td><?php echo $sl; ?></td>
                <td><?php echo $screen['screen_name']; ?></td>
                <td><?php echo $screen['seats']; ?></td>
                <td><?php echo $screen['charge']; ?></td>
                <?php
                $st = mysqli_query($con, "select * from tbl_show_time where screen_id='" . $screen['screen_id'] . "'");
                ?>
                <td><?php if (mysqli_num_rows($st)) {
                      while ($stm = mysqli_fetch_array($st)) {
                        echo date('h:i a', strtotime($stm['start_time'])) . " ,";
                      }
                    } else {
                      echo "No Show Time Added";
                    }
                    ?></td>
                <td class="text-right"><button data-toggle="modal" data-id="<?php echo $screen['screen_id']; ?>" data-target="#view-modal2" id="getUser2" class="btn btn-sm btn-warning"><i class="fa fa-plus"></i> Thêm giờ chiếu</button></td>
              </tr>
            <?php
              $sl++;
            }
            ?>
          </table>
        <?php
        } else {
        ?>
          <button data-toggle="modal" data-target="#view-modal" id="getUser" class="btn btn-sm btn-info"><i class="fa fa-plus"></i> Thêm phòng</button>

        <?php
        }
        ?>
      </div>
      <!-- /.box-footer-->
    </div>
    <div id="view-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
      <div class="modal-dialog">
        <div class="modal-content">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">
              <i class="fa fa-plus"></i> Thêm phòng
            </h4>
          </div>
          <div class="modal-body">

            <div id="modal-loader" style="display: none; text-align: center;">
              <img src="ajax-loader.gif">
            </div>

            <!-- content will be load here -->
            <div id="dynamic-content"></div>

          </div>
          <div class="modal-footer">

          </div>

        </div>
      </div>
    </div>
    <div id="view-modal2" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
      <div class="modal-dialog">
        <div class="modal-content">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">
              <i class="fa fa-plus"></i> Thêm giờ chiếu
            </h4>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label class="control-label">Chọn giờ chiếu</label>
              <select name="s_name" id="s_name" class="form-control">
                <option value="0">Chọn giờ</option>
                <option>Trưa</option>
                <option>Chiều</option>
                <option>Tối</option>
                <option>Đêm</option>
                <option>Khác</option>
              </select>
            </div>
            <div class="form-group">
              <label class="control-label">Thời gian bắt đầu</label>
              <input type="time" id="s_time" class="form-control" />
            </div>
            <div class="form-group">
              <button class="btn btn-success" id="savetime">Lưu</button>
            </div>
          </div>
          <div class="modal-footer">

          </div>

        </div>
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>
<?php
include('footer.php');
?>
<script type="text/javascript">
  var screenid;

  function loadScreendtls() {
    $.ajax({
        url: 'get_screen_dtls.php',
        type: 'POST',
        data: 'id=' + <?php echo $_GET['id']; ?>,
        dataType: 'html'
      })
      .done(function(data) {
        //console.log(data);	
        $('#screendtls').html(data);
      })
      .fail(function() {
        $('#screendtls').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
      });
  }
  $(document).ready(function() { // tải mô hình bootstrap động

    $(document).on('click', '#getUser', function(e) {

      e.preventDefault();

      $('#dynamic-content').html(''); // để trống trước cuộc gọi ajax
      $('#modal-loader').show(); // tải trình tải ajax

      $.ajax({
          url: 'add_screen_form.php',
          type: 'POST',
          data: 'id=' + <?php echo $_GET['id']; ?>,
          dataType: 'html'
        })
        .done(function(data) {
          console.log(data);
          $('#dynamic-content').html('');
          $('#dynamic-content').html(data); // phản ứng tải
          $('#modal-loader').hide(); // ẩn trình tải ajax
        })
        .fail(function() {
          $('#dynamic-content').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
          $('#modal-loader').hide();
        });

    });

  });
  $(document).on('click', '#savescreen', function() {
    name = $('#sname').val();
    seats = $('#sseats').val();
    charge = $('#scharge').val();
    if (name == "" && seats == "" && charge == "") {
      alert("Enter Correct Details");
    } else if (seats == "" && name == "") {
      alert("Enter Correct Details");
    } else if (charge == "" && name == "") {
      alert("Enter Correct Details");
    } else if (charge == "" && seats == "") {
      alert("Enter Correct Details");
    } else if (charge == "") {
      alert("Enter Correct Details");
    } else if (seats == "") {
      alert("Enter Correct Details");
    } else if (name == "") {
      alert("Enter Correct Details");
    } else {
      $.ajax({
          url: 'save_screen.php',
          type: 'POST',
          data: 'theatre=' + <?php echo $_GET['id']; ?> + '&name=' + name + '&charge=' + charge + '&seats=' + seats,
          dataType: 'html'
        })
        .done(function(data) {
          loadScreendtls();
          $('#view-modal').modal('toggle');
        })
        .fail(function() {
          loadScreendtls();
          $('#view-modal').modal('toggle');
        });
    }

  });

  $(document).on('click', '#getUser2', function(e) {

    screenid = $(this).data("id"); //screen id
  });
  $('#savetime').click(function() {
    s_time = $('#s_time').val();
    s_name = $('#s_name').val();
    if (s_time == "" && s_name == "0") {
      alert("Enter valid details");
    } else if (s_time == "") {
      alert("Enter valid details");
    } else if (s_name == "0") {
      alert("Enter valid details");
    } else {
      $.ajax({
          url: 'save_time.php',
          type: 'POST',
          data: 'screen=' + screenid + '&time=' + s_time + '&sname=' + s_name,
          dataType: 'html'
        })
        .done(function(data) {
          loadScreendtls();
          $('#s_time').val('');
          $('#s_name').val('0');
          $('#view-modal2').modal('toggle');
        })
        .fail(function() {
          loadScreendtls();
          $('#view-modal2').modal('toggle');
        });
    }

  });
</script>