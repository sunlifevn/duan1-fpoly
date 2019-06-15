<?php 
$path = "../";
require_once $path.$path.'library/db.php';
$id = $_GET['id'];


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
          Danh sách hoá đơn
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
              <br>
              <!-- /.box-header -->
              <form method="post" action="update_status.php">
              <p>Tình trạng hoá đơn <b>#<?php echo $id  ?></b></p>
              <input type="hidden" name="id" value="<?php echo $id ?>">
              <select name="status">
                <option value="0">Đang xử lí</option>
                <option value="1">Đang giao hàng</option>
                <option value="2">Đã thanh toán</option>
              </select>
              <button type="submit" class="btn btn-xs btn-danger">Lưu</button>
              <a href="<?php echo SITE_URL . 'admin/invoice' ?>">Quay lại</a>
            </form>
          </div>
        </div>
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include_once $path.'incfiles/footer.php'; ?>
  <?php include_once $path.'incfiles/footer_assets.php'; ?>

</body>
</html>
