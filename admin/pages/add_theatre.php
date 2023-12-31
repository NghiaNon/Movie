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

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Thêm phim mới
    </h1>
    <ol class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-home"></i> Trang chủ</a></li>
      <li class="active">Thêm rạp</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-body">
        <form action="process_add_theater.php" method="post" id="form1">
          <div class="form-group">
            <label class="control-label">Tên phim</label>
            <input type="text" name="name" class="form-control" />
            <?php $frm->validate("name", array("required", "label" => "Theatre Name")); 
            ?>
          </div>
          <div class="form-group">
            <label class="control-label">Địa chỉ rạp phim</label>
            <input type="text" name="address" class="form-control" />
            <?php $frm->validate("address", array("required", "label" => "Theatre Address"));  
            ?>
          </div>
          <div class="form-group">
            <label class="control-label">Vị trí</label>
            <!-- <input type="text" name="place" id="autocomplete" class="form-control"> -->
            <input type="text" name="place" class="form-control">
            <?php $frm->validate("place", array("required", "label" => "Place")); 
            ?>
          </div>
          <div class="form-group">
            <label class="control-label">Trạng thái</label>
            <input type="text" name="state" id="administrative_area_level_1" s placeholder="2D/3D/4D" class="form-control">
            <?php $frm->validate("state", array("required", "label" => "State"));  
            ?>
          </div>
          <div class="form-group">
            <label class="control-label">Mã Pin</label>
            <input type="text" name="pin" id="postal_code" s placeholder="6 số" class="form-control">
            <?php $frm->validate("pin", array("required", "label" => "Pin Code", "regexp" => "pin")); 
            ?>
          </div>
          <?php
          start:
          $username = "THR" . rand(123456, 999999);
          $u = mysqli_query($con, "select * from tbl_login where username='$username'");
          if (mysqli_num_rows($u)) {
            goto start;
          }
          ?>
          <?php echo $username ?>">
          <?php $frm->validate("username", array("required", "label" => "Username"));  
          ?>
          <?php echo "PWD" . rand(123456, 999999); ?>
          <?php $frm->validate("password", array("required", "label" => "Password"));  
          ?>

          <div class="form-group">
            <button class="btn btn-success" style="background-color: blue">Thêm phim</button>
          </div>
          <input type="hidden" name="country" class="form-control" id="country">
          <input type="hidden" class="field" id="route" disabled="true">
          <input type="hidden" class="field" id="street_number" disabled="true">
          <input type="hidden" class="field" id="locality" disabled="true">
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
  // google auto complete API
  var placeSearch, autocomplete;
  var componentForm = {
    street_number: 'short_name',
    route: 'long_name',
    locality: 'long_name',
    administrative_area_level_1: 'long_name',
    country: 'long_name',
    postal_code: 'short_name'
  };

  function initAutocomplete() {

    autocomplete = new google.maps.places.Autocomplete(
      /** @type {!HTMLInputElement} */
      (document.getElementById('autocomplete')), {
        types: ['geocode']
      });


    autocomplete.addListener('place_changed', fillInAddress);
  }

  function fillInAddress() {
    var place = autocomplete.getPlace();

    for (var component in componentForm) {
      document.getElementById(component).value = '';
      document.getElementById(component).disabled = false;
    }

    for (var i = 0; i < place.address_components.length; i++) {
      var addressType = place.address_components[i].types[0];
      if (componentForm[addressType]) {
        var val = place.address_components[i][componentForm[addressType]];
        document.getElementById(addressType).value = val;
      }
    }
  }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDfO40iueprTDv0WCf0BCIlbj56JO-HylA&libraries=places&callback=initAutocomplete" async defer></script>
<script>
  <?php $frm->applyvalidations("form1"); ?>
</script>