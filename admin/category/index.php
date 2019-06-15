<?php 
$path = "../";
require_once $path.$path.'library/db.php';
$listCateQr = "select c.*, (select count(*) from products where cate_id = c.id) as total_product from categories c";
$cates = getQr($listCateQr, true);


?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Dashboard</title>
  <?php include_once $path.'incfiles/header_assets.php'; ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
    <?php include_once $path.'incfiles/header.php'; ?>
    <?php include_once $path.'incfiles/sidebar.php'; ?>

    <div class="content-wrapper">
      <section class="content-header">
        <h1>
          Dashboard
          <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Dashboard</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <!-- Write code here -->
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Danh mục</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <table class="table table-bordered">
                  <tbody><tr>
                    <th>#</th>
                    <th>Tên</th>
                    <th>Món</th>
                    <th>Mô tả</th>
                    <th>
                      <a class="btn btn-xs btn-success"
                      href="<?php echo ADMIN_URL?>category/add.php"><i class="fa fa-plus"></i> Thêm</a> 
                    </th>
                  </tr>
                  <?php 
                  foreach ($cates as $value) {
                   ?>
                   <tr>
                    <td><?php echo $value['id'] ?></td>
                    <td><?php echo $value['cate_name'] ?></td>
                    <td>
                      <?php echo $value['total_product']?>
                    </td>
                    <td>
                      <?php echo $value['detail_cate']?>
                    </td>
                    <td>
                      <a href="<?php echo ADMIN_URL?>category/edit.php?id=<?php echo $value['id']?>"
                        class="btn btn-xs btn-info"
                        >
                        <i class="fa fa-pencil"></i>
                      </a>
                      <a href="javascript:;" linkurl="<?php echo ADMIN_URL?>category/remove.php?id=<?php echo $value['id'] ?>"
                        class="btn btn-xs btn-danger btn-removeCate"
                        >
                        <i class="fa fa-trash-o"></i>
                      </a>
                    </td>
                  </tr>
                  <?php 
                }
                ?>
              </tbody></table>
            </div>
            <!-- /.box-body -->
            
          </div>
        </div>
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include_once $path.'incfiles/footer.php'; ?>
  <?php include_once $path.'incfiles/footer_assets.php'; ?>

  <script>
    <?php 

    if (isset($_GET['success']) && $_GET['success'] == true) {
      ?>
      swal('thêm thành công');
      <?php
    }
    ?>

    $('.btn-removeCate').click(function(){
      swal({
        title: "Bạn có chắc muốn xoá?",
        text: "Sau khi xoá bạn sẽ không thể khôi phục lại?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          swal("Bạn đã xoá thành công!", {
            icon: "success",
          });
          window.location.href = $(this).attr('linkurl'); 
        } else {
          swal("Bạn đã huỷ xoá thành công!");
        }
      });
    });
    $("#addCategory").validate({
      rules: {
        name: "required",

      },
      messages: {
        name: "Vui lòng nhập tên danh mục",


      }
    });

  </script>
</body>
</html>
