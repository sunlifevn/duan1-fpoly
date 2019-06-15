<?php 
  $path = "../";
  require_once $path.$path.'library/db.php';
  $sql = "select * from sliders order by order_number";
  $listSlideshow = getQr($sql, true);

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

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
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
              <h3 class="box-title">Quản lý slide</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tbody><tr>
                  <th style="width: 240px">Ảnh</th>
                  <th style="width: 240px">Tiêu đề</th>
                  <th style="width: 240px">Link</th>
                  <th style="width: 240px">Nội dung</th>
                  <th style="width: 240px">Thứ tự hiển thị</th>
                  <th style="width: 240px">Status</th>
                  <th style="width: 1120px">
                    <a href="<?= ADMIN_URL ?>slideshow/add.php"
                      class="btn btn-xs btn-success"
                      >
                      <i class="fa fa-plus"></i> Thêm
                    </a>
                  </th>
                </tr>
                <?php 
                  foreach ($listSlideshow as $value) {
                 ?>
                <tr>
                  <td>
                      <img src="<?php echo SITE_URL . $value['image_url']?>" alt="" width="100%">
                    </td>
                    <td>
                      <?php echo $value['title'] ?>
                    </td>
                    <td>
                      <?php echo $value['link_url']?>
                    </td>
                    <td>
                      <?php echo $value['content'] ?>
                    </td>
                    <td>
                      <?php echo $value['order_number'] ?>
                    </td>
                    <td>
                      <?php if ($value['status']==1) {
                        echo "Bật";
                      } else {
                        echo "Tắt";
                      } ?>
                    </td>
                  <td>
                      <a href="<?php echo ADMIN_URL?>slideshow/edit.php?id=<?php echo $value['id']?>"
                      class="btn btn-xs btn-info"
                      >
                        <i class="fa fa-pencil"></i>
                      </a>
                      <a href="javascript:;" linkurl="<?php echo ADMIN_URL?>slideshow/remove.php?id=<?php echo $value['id'] ?>"
                      class="btn btn-xs btn-danger btn-removeSlide"
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

<!-- ./wrapper -->

<?php include_once $path.'incfiles/footer_assets.php'; ?>

<script>
  <?php 
  
  if (isset($_GET['success']) && $_GET['success'] == true) {
    ?>
      swal('thêm thành công');
    <?php
  }
 ?>
  // $('.btn-remove').click(function(){
  //   var conf = confirm('Ban co xac nhan muon xoa hay ko?'); 
  //   alert(conf);
  //   if (conf) {
  //     window.location.href = $(this).attr('linkurl');
  //   }
  // });
  ////////////////////////////
  $('.btn-removeSlide').click(function(){
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
</script>
</body>
</html>
