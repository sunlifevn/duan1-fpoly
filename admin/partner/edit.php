<?php 
$path = "../";
require_once $path.$path.'library/db.php';
$brandId = $_GET['id'];
  $sql = "select * from partner where id = $brandId";
  $brand = getQr($sql);
  if (!$brand) {
    header('location: ' . ADMIN_URL . 'partner');
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
          Sửa đối tác
          <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Dashboard</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
       <form action="<?php echo ADMIN_URL ?>partner/save-edit.php" method="post" id="addBrand" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $brand['id'] ?>">
         <div class="col-md-6">
          <div class="box box-info">
            <div class="box-body">
           <div class="form-group">
             <label>Tên đối tác</label>
             <input type="text" name="name" class="form-control" value="<?php echo $brand['name'] ?>">
             <?php 
             if (isset($_GET['errName'])) {
              ?>
              <span class="text-danger"><?php echo $_GET['errName'] ?></span>
              <?php
            }
            ?>
          </div>
          <div class="form-group">
            <label>Site Url</label>
            <input type="text" name="siteUrl" class="form-control" value="<?php echo $brand['site_url'] ?>">
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-md-6 col-md-offset-3 text-left">
                <img id="showImage" src="<?php echo SITE_URL . $brand['image_url'] ?>" alt="" class="img-responsive" width="30%">
              </div>
            </div>
            <label>Ảnh</label>
            <input type="file" class="form-control" name="image">
          </div>
         
         <div class="text-rigt">
          <a href="<?php echo ADMIN_URL ?>partner" class="btn btn-danger btn-xs">Huỷ</a>
          <button type="submit" class="btn btn-xs btn-primary">Cập nhật</button>
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
    $("#addBrand").validate({
  rules: {
    name: "required",
    siteUrl: "required",
    image: "required",
  },
  messages: {
    name: "Vui lòng nhập tên đối tác",
    image: "Vui lòng tải logo đối tác",
    siteUrl: "Vui lòng nhập link đối tác",
  }
});
     $('[name="desc"]').wysihtml5();

      var img = document.querySelector('[name="image"]');
    img.onchange = function(){
      var anh = this.files[0];
      if(anh == undefined){
        document.querySelector('#showImage').src = "<?php echo SITE_URL . $brand['image'] ?>";
      }else{
        getBase64(anh, '#showImage');
      }
      getBase64(anh, '#showImage');
    }
    function getBase64(file, selector) {
       var reader = new FileReader();
       reader.readAsDataURL(file);
       reader.onload = function () {
         document.querySelector(selector).src = reader.result;
       };
       reader.onerror = function (error) {
         console.log('Error: ', error);
       };
    }
</script>
</body>
</html>
