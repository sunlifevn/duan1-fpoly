<?php 
$path = "../";
require_once $path.$path.'library/db.php';
$sql = "select * from categories";
$listCate = getQr($sql, true);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Dashboard</title>
  <?php include_once $path.'./incfiles/header_assets.php'; ?>
</head>
<script>
  //slug bài viết
    function ChangeToSlug()
{
    var title, slug;
 
    //Lấy text từ thẻ input title 
    title = document.getElementById("nameProduct").value;
 
    //Đổi chữ hoa thành chữ thường
    slug = title.toLowerCase();
 
    //Đổi ký tự có dấu thành không dấu
    slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
    slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
    slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
    slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
    slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
    slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
    slug = slug.replace(/đ/gi, 'd');
    //Xóa các ký tự đặt biệt
    slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
    //Đổi khoảng trắng thành ký tự gạch ngang
    slug = slug.replace(/ /gi, "-");
    //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
    //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
    slug = slug.replace(/\-\-\-\-\-/gi, '-');
    slug = slug.replace(/\-\-\-\-/gi, '-');
    slug = slug.replace(/\-\-\-/gi, '-');
    slug = slug.replace(/\-\-/gi, '-');
    //Xóa các ký tự gạch ngang ở đầu và cuối
    slug = '@' + slug + '@';
    slug = slug.replace(/\@\-|\-\@|\@/gi, '');
    //In slug ra textbox có id “slug”
    document.getElementById('slugProduct').value = slug;
}
</script>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
    <?php include_once $path.'incfiles/header.php'; ?>
    <?php include_once $path.'incfiles/sidebar.php'; ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Thêm món
          <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Dashboard</li>
        </ol>
      </section>
      <!-- Main content -->
      <section class="content">
       <form action="<?php echo ADMIN_URL ?>product/save-add.php" method="post" id="addProduct" enctype="multipart/form-data">
        <div class="box box-info">
            <div class="box-body">
        <div class="row">
         <div class="col-md-6">
           <div class="form-group">
             <label>Tên món</label>
             <input type="text" name="name" class="form-control" id="nameProduct" onkeyup="ChangeToSlug()">
            <?php 
              if(isset($_GET['errName'])){
                ?>
                <span class="text-danger"><?= $_GET['errName'] ?></span>
                <?php
              }
             ?>
           </div>
            
            <div class="form-group">
              <label>Đường dẫn</label>
              <div class="input-group">
              <input type="text" name="slug" class="form-control" id="slugProduct" readonly>
              <span class="input-group-addon">.html</span>
            </div>
            </div>

           <div class="form-group">
             <label>Chuyên mục</label>
              <select name="listCate" class="form-control">
            <?php foreach ($listCate as $value) {
            
            ?>
              <option value="<?php echo $value['id'] ?>"><?php echo $value['cate_name'] ?></option>
          <?php } ?>
        </select>

           </div>
            
            
           
            <div class="form-group">
             <label>Giá</label>
             <input type="number" name="listPrice" class="form-control">
           </div>
            
           <div class="form-group">
             <label>Giá KM</label>
             <input type="number" name="salePrice" class="form-control">
           </div>
            </div>
             <div class="col-md-6">
              <div class="row">
              <div class="col-md-6 col-md-offset-3">
                <div class="row">
                  <div class="col-md-4"> <img id="showImage"  alt="" class="img-responsive" width="100%"></div>
                 <div class="col-md-4"> <img id="showImage2"  alt="" class="img-responsive" width="100%"></div>
                 <div class="col-md-4"> <img id="showImage3"  alt="" class="img-responsive" width="100%"></div>
                
              </div>
            </div>
            </div>

              <div class="form-group">
                <label>Ảnh món ăn <small>(Ảnh đầu tiên sẽ được chọn làm thumbnail)</small></label>
                <input type="file" name="image" class="form-control">
                <input type="file" name="image2" class="form-control">
                <input type="file" name="image3" class="form-control">
              </div>
           <div class="form-group">
             <label>Tình trạng</label>
             <br>
             <input type="radio" value="1" name="status" checked> Active  
             <input type="radio" value="-1" name="status"> Inactive
           </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
             <label>Mô tả</label>
             <textarea name="desc" id="" cols="10" rows="5" class="form-control"></textarea>
           </div>
           <div class="text-center">
            <a href="<?php echo ADMIN_URL ?>product" class="btn btn-danger btn-xs">Huỷ</a>
            <button type="submit" class="btn btn-xs btn-primary">Tạo mới</button>
           </div>
         </div>
       </div>
     </div>
   </div>
       </form> 
     </section>
     <!-- /.content -->
   </div>
   <!-- /.content-wrapper -->
   <?php include_once $path.'incfiles/footer.php'; ?>

   <!-- ./wrapper -->

   <?php include_once $path.'incfiles/footer_assets.php'; ?>
 </body>
 <script>
  $(document).ready(function(){

    
    //bootstrap WYSIHTML5 - text editor
    $('[name="desc"]').wysihtml5();
    //im1
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
    //im2
    var img = document.querySelector('[name="image2"]');
    img.onchange = function(){
      var anh = this.files[0];
      if(anh == undefined){
        document.querySelector('#showImage2').src = "<?php echo SITE_URL ?>images/default/default-picture.jpg";
      }else{
        getBase64(anh, '#showImage2');
      }
      getBase64(anh, '#showImage2');
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
    //im3
    var img = document.querySelector('[name="image3"]');
    img.onchange = function(){
      var anh = this.files[0];
      if(anh == undefined){
        document.querySelector('#showImage3').src = "<?php echo SITE_URL ?>images/default/default-picture.jpg";
      }else{
        getBase64(anh, '#showImage3');
      }
      getBase64(anh, '#showImage3');
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

    $("#addProduct").validate({
            rules: {
                name: "required",
                listCate: "required",
                desc: "required",
                listPrice: "required",
                sellPrice: "required",
                image: "required",
            },
            messages: {
                name: "Vui lòng nhập tên sản phẩm",
                listCate: "Hãy chọn loại xe",
                desc: "Không được bỏ trống mô tả",
                listPrice: "Nhập giá",
                sellPrice: "Nhập giá",
                image: "Vui lòng nhập ảnh",
            }
        });
  
  });
  
 </script>
 </html>
