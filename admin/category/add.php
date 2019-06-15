<?php 
$path = "../";
require_once $path.$path.'library/db.php';
$sql = "select * from categories where parent_id = 0";
$listCate = getQr($sql, true);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Dashboard</title>
  <?php include_once $path.'./incfiles/header_assets.php';; ?>
</head>
<script>
    //slug bài viết
    function ChangeToSlug()
{
    var title, slug;
 
    //Lấy text từ thẻ input title 
    title = document.getElementById("nameCate").value;
 
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
    document.getElementById('slugCate').value = slug;
}
</script>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
    <?php include_once $path.'incfiles/header.php'; ?>
    <?php include_once $path.'incfiles/sidebar.php'; ?>

    <div class="content-wrapper">
      <section class="content-header">
        <h1>
          Thêm chuyên mục
          <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Dashboard</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
       <form action="<?php echo ADMIN_URL ?>category/save-add.php" method="post" id="addCategory">
         <div class="col-md-6">
          <div class="box box-info">
            <div class="box-body">
           <div class="form-group">
             <label>Tên chuyên mục</label>
             <input type="text" name="name" class="form-control" id="nameCate" onkeyup="ChangeToSlug()">
             <?php 
             if (isset($_GET['errName'])) {
              ?>
              <span class="text-danger"><?php echo $_GET['errName'] ?></span>
              <?php
            }
            ?>
          </div>
          <div class="form-group">
              <label>Đường dẫn</label>
              <div class="input-group">
              <input type="text" name="slug" class="form-control" id="slugCate" readonly>
              <span class="input-group-addon">.html</span>
            </div>
            </div>
          <div class="form-group">
            <label>Chuyên mục con của</label>
            <select name="parent_id">
              <option value="0"></option>
              <?php 
                foreach ($listCate as $value) { ?>
                <option value="<?php echo $value['id'] ?>"><?php echo $value['cate_name'] ?></option>
             <?php } ?>
            </select>
          </div>
          <div class="form-group">
           <label>Mô tả</label>
           <textarea name="desc" cols="5" class="form-control"></textarea>
         </div>

         <div class="text-rigt">
          <a href="<?php echo ADMIN_URL ?>category" class="btn btn-danger btn-xs">Huỷ</a>
          <button type="submit" class="btn btn-xs btn-primary">Tạo mới</button>
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
 $("#addCategory").validate({
  rules: {
    name: "required",
  },
  messages: {
    name: "Vui lòng nhập tên danh mục",
  }
});
     $('[name="desc"]').wysihtml5();
</script>
</body>
</html>
