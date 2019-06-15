<?php 
  $path = "../";
  require_once $path.$path.'library/db.php';
  $userId = $_GET['id'];
  $sql = "select * from users where id = $userId";

  $user = getQr($sql);
  $sql = "select * from categories";
  $listCate = getQr($sql, true);
  if (!$user) {
    header('location: ' . ADMIN_URL . 'user');
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

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Sửa danh mục
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
         <form action="<?php echo ADMIN_URL ?>user/save-edit.php" method="post" id="addCategory">
          <input type="hidden" name="id" value="<?php echo $user['id'] ?>"> 
         <div class="col-md-6">
          <div class="box box-info">
            <div class="box-body">
           <div class="form-group">
             <label>Họ và tên</label>
             <input type="text" name="name" class="form-control" value="<?php echo $user['full_name'] ?>" id="nameCate">
           </div>
            <div class="form-group">
              <label>Quyền</label>
              <select name="role">
                <option value="1">Member</option>
                <option value="7">Moderator</option>
                <option value="9">Admin</option>
              </select>
            </div>

           <div class="text-rigt">
            <a href="<?php echo ADMIN_URL ?>user" class="btn btn-danger btn-xs">Huỷ</a>
            <button type="submit" class="btn btn-xs btn-primary">Lưu</button>
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

</html>
