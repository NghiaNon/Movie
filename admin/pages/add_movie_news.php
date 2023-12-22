<?php
include('header.php');
?>
<link rel="stylesheet" href="../../validation/dist/css/bootstrapValidator.css" />

<script type="text/javascript" src="../../validation/dist/js/bootstrapValidator.js"></script>
<!-- =============================================== -->
<?php
include('../../form.php');
$frm = new formBuilder;
?>
<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Thêm phim mới sắp ra mắt
    </h1>

    <ol class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-home"></i> Trang chủ</a></li>
      <li class="active">Phim sắp ra mắt</li>
    </ol>
  </section>

  <!-- Main -->
  <section class="content">

    <!-- Default -->
    <div class="box">
      <div class="box-body">
        <form action="process_add_news.php" method="post" enctype="multipart/form-data" id="form1">
          <div class="form-group">
            <label class="control-label">Tên phim</label>
            <input type="text" name="name" class="form-control" />
            <?php $frm->validate("name", array("required", "label" => "Movie Name")); 
            ?>
          </div>
          <div class="form-group">
            <label class="control-label">Các diễn viên có trong phim</label>
            <input type="text" name="cast" class="form-control">
            <?php $frm->validate("cast", array("required", "label" => "Cast", "regexp" => "text")); 
            ?>
          </div>

          <div class="form-group">
            <label class="control-label">Ngày ra mắt</label>
            <input type="date" name="date" class="form-control" />
            <?php $frm->validate("date", array("required", "label" => "Release Date")); 
            ?>
          </div>

          <div class="form-group">
            <label class="control-label">Miêu tả</label>
            <input type="text" name="description" class="form-control">
            <?php $frm->validate("description", array("required", "label" => "Description")); 
            ?>
          </div>
          <div class="form-group">
            <label class="control-label">Hình ảnh</label>
            <input type="file" name="attachment" class="form-control" placeholder="Images">
            <?php $frm->validate("attachment", array("required", "label" => "Image"));
            ?>
          </div>
          <div class="form-group">
            <button class="btn btn-success">Thêm phim mới</button>
          </div>
        </form>
      </div>
      <!-- /.box-footer-->
    </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->
</div>
<?php
include('footer.php');
?>
<script>
  <?php $frm->applyvalidations("form1"); ?>
</script>