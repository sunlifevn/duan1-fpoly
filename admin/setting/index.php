<?php 
$path = "../";
  require_once $path.$path.'library/db.php';
  $sql = "select * from web_settings";
  $setting = getQr($sql);
  if (!$setting) {
    header('location: ' . ADMIN_URL . 'setting');
    die();
  }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Dashboard</title>
  <?php include_once $path.'./incfiles/header_assets.php';; ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
    <?php include_once $path.'incfiles/header.php'; ?>
    <?php include_once $path.'incfiles/sidebar.php'; ?>

    <div class="content-wrapper">
      <section class="content-header">
        <h1>
          Web Setting
          <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Dashboard</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
       <form action="<?php echo ADMIN_URL ?>setting/save-setting.php" method="post" id="addBrand">
        <div class="row">
         <div class="col-md-6">
          <div class="box box-info">
            <div class="box-body">
              <div class="form-group">
                <label>Logo text</label>
                <input type="text" name="logo" value="<?php echo $setting['logo'] ?>" class="form-control">
              </div>
              <div class="form-group">
                <label>Title web</label>
                <input type="text" name="name" value="<?php echo $setting['web_name'] ?>" class="form-control">
              </div>
              <div class="form-group">
                <label>Mô tả</label>
                <input type="text" class="form-control" name="info" value="<?php echo $setting['web_info'] ?>">
              </div>
              <div class="form-group">
            <label>Phone</label>
         <div class="input-group">
                <span class="input-group-addon">(+84)</span>
                <input type="text" name="phone" class="form-control" value="<?php echo $setting['phone_number'] ?>">
              </div>
          </div>
          <div class="form-group">
            <label>Hotline</label>
         <div class="input-group">
                <span class="input-group-addon">(+84)</span>
                <input type="text" name="hotline" class="form-control" value="<?php echo $setting['hotline'] ?>">
              </div>
          </div>

       <div class="form-group">
         <label>Google Map</label>
          <br><center><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.0019897819266!2d105.79639251488348!3d21.03260638599624!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab46d8b20bb9%3A0x65363e65ceb46493!2zQsawdSDEkGnhu4duIEPhuqd1IEdp4bqleQ!5e0!3m2!1svi!2s!4v1539152004558" width="300" height="150" frameborder="0" style="border:0" allowfullscreen></iframe></center><br>
         <textarea name="map" cols="5" rows="5" class="form-control"><?php echo $setting['map_embed'] ?></textarea>

       </div>
        <div class="form-group">
          <label>Email 1</label>
          <input type="text" name="email1" value="<?php echo $setting['email1'] ?>" class="form-control">
        </div>
        <div class="form-group">
          <label>Email 2</label>
          <input type="text" name="email2" value="<?php echo $setting['email2'] ?>" class="form-control">
        </div>
         <div class="form-group">
          <label>Địa chỉ</label>
          <input type="text" name="address" value="<?php echo $setting['address'] ?>" class="form-control">
        </div>
        <div class="form-group">
          <label>Facebook</label>
          <input type="text" name="fb" value="<?php echo $setting['fb_url'] ?>" class="form-control">
        </div>
        <div class="form-group">
          <label>Twitter</label>
          <input type="text" name="tt" value="<?php echo $setting['twitter_url'] ?>" class="form-control">
        </div>
        <div class="form-group">
          <label>Facebook</label>
          <input type="text" name="ins" value="<?php echo $setting['instagram_url'] ?>" class="form-control">
        </div>
         <div class="text-rigt">
          <a href="<?php echo ADMIN_URL ?>setting" class="btn btn-danger btn-xs">Huỷ</a>
          <button type="submit" class="btn btn-xs btn-primary">Cập nhật</button>
        </div>
      </div>
      </div>
    </div>

    </div>
    </form>
  </section>
  <!-- /.content -->
</div>
<?php include_once $path.'incfiles/footer.php'; ?>
<?php include_once $path.'incfiles/footer_assets.php'; ?>
<script>
 $(document).ready(function(){
  
     $('[name="desc"]').wysihtml5();

      
 });
</script>
</body>
</html>
