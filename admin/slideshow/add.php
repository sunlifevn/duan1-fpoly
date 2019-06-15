<?php 
$path = "../";
require_once $path.$path.'library/db.php';

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
          Thêm Slide
          <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Dashboard</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">
       <form action="<?php echo ADMIN_URL ?>slideshow/save-add.php" method="post" id="addSlide" enctype="multipart/form-data">
         <div class="col-md-6">
          <div class="box box-info">
            <div class="box-body">
         
          <div class="form-group">
            <div class="row">
              <div class="col-md-6 col-md-offset-3 text-left">
                <img id="showImage" src="<?php echo SITE_URL ?>images/default/default-picture.jpg" alt="" class="img-responsive" width="100%">
              </div>
            </div>
            <label>Ảnh</label>
            <input type="file" class="form-control" name="image">
          </div>
          <div class="form-group">
            <label>Tiêu đề</label>
            <input type="text" class="form-control" name="title">
          </div>
          <div class="form-group">
            <label>Link bài viết</label>
            <input type="text" class="form-control" name="linkurl">
          </div>
          <div class="form-group">
            <label>Mô tả (50 kí tự)</label>
            <textarea name="content" cols="10" rows="5" class="form-control" size="50"></textarea>
          </div>
        <div class="form-group">
          <label>Tình trạng</label><br>
          <input type="radio" name="status" value="1" checked> Bật
          <input type="radio" name="status" value="-1"> Tắt
        </div>
        <div class="form-group">
          <label>Thứ tự hiển thị</label>
          <input type="number" name="order" class="form-control" value="0">
        </div>
         <div class="text-rigt">
          <a href="<?php echo ADMIN_URL ?>slideshow" class="btn btn-danger btn-xs">Huỷ</a>
          <button type="submit" class="btn btn-xs btn-primary">Tạo mới</button>
        </div>
      </div>
    </div>
  </div>
    </form>
  </div>
  </section>
  <!-- /.content -->
</div>
<?php include_once $path.'incfiles/footer.php'; ?>
<?php include_once $path.'incfiles/footer_assets.php'; ?>
<script>
 $(document).ready(function(){

  $('[name="content"]').wysihtml5();

  $("#addSlide").validate({
  rules: {
    image: "required",
  },
  messages: {
    image: "Vui lòng tải slide",
  }
});

      var img = document.querySelector('[name="image"]');
    img.onchange = function(){
      var anh = this.files[0];
      if(anh == undefined){
        document.querySelector('#showImage').src = "<?php echo SITE_URL ?>images/default/default-picture.jpg";
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
 });
</script>
</body>
</html>
