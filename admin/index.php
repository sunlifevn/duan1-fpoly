<?php
  $path = "./";
  require_once $path.'../library/db.php';

  $countCateQr = "select count(*) as total from categories";
  $countCate = getQr($countCateQr);

  $countProductQr = "select count(*) as total from products";
  $countProduct = getQr($countProductQr);

  $countCommentQr = "select count(*) as total from comments";
  $countComment = getQr($countCommentQr);

  $countBrandQr = "select count(*) as total from brands";
  $countBrand = getQr($countBrandQr);

  $countAccountQr = "select count(*) as total from users";
  $countAccount = getQr($countAccountQr);

  $countContactQr = "select count(*) as total from contacts";
  $countContact = getQr($countContactQr);

  $countSlideQr = "select count(*) as total from contacts";
  $countSlide = getQr($countSlideQr);

  $sql = "select count(status) as total from invoices where status = 0";
  $countInv = getQr($sql);
 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Panel</title>
    <?php include_once './incfiles/header_assets.php';; ?>
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
        Admin
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Trang quản trị</li>
      </ol>
    </section>
    <div class="callout callout-danger">
                <h4><i class="fa fa-ban"></i> Thông báo</h4>

                <p>Bạn có <a href="<?php echo ADMIN_URL ?>invoice"><?php echo $countInv['total'] ?> đơn hàng chưa xử lý</p>
              </div>
    <!-- Main content -->
    <!-- <section class="content">
          <div class="row">
        <div class="col-lg-3 col-xs-6">
          
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $countCate['total'] ?></h3>
    
              <p>Danh mục</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="<?php echo ADMIN_URL ?>category" class="small-box-footer">Quản lý danh mục <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        
        <div class="col-lg-3 col-xs-6">
          
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $countProduct['total'] ?></h3>
    
              <p>Sản phẩm</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="<?php echo ADMIN_URL ?>product" class="small-box-footer">Quản lý sản phẩm <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        
        <div class="col-lg-3 col-xs-6">
          
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo $countAccount['total'] ?></h3>
    
              <p>Tài khoản</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="<?php echo ADMIN_URL ?>account" class="small-box-footer">Quản lý người dùng <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        
        <div class="col-lg-3 col-xs-6">
          
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo $countComment['total'] ?></h3>
    
              <p>Phản hồi</p>
            </div>
            <div class="icon">
              <i class="fa fa-commenting"></i>
            </div>
            <a href="<?php echo ADMIN_URL ?>comment" class="small-box-footer">Quản lý phản hồi <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        
        <div class="col-lg-3 col-xs-6">
          
          <div class="small-box bg-primary">
            <div class="inner">
              <h3><?php echo $countBrand['total'] ?></h3>
    
              <p>Brands</p>
            </div>
            <div class="icon">
              <i class="fa fa-hand-grab-o"></i>
            </div>
            <a href="<?php echo ADMIN_URL ?>brand" class="small-box-footer">Quản lý đối tác <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        
         <div class="col-lg-3 col-xs-6">
          
          <div class="small-box bg-danger">
            <div class="inner">
              <h3><?php echo $countContact['total'] ?></h3>
    
              <p>Contact</p>
            </div>
            <div class="icon">
              <i class="fa fa-envelope-o"></i>
            </div>
            <a href="<?php echo ADMIN_URL ?>brand" class="small-box-footer">Quản lý liên hệ <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        
        <div class="col-lg-3 col-xs-6">
          
          <div class="small-box bg-orange">
            <div class="inner">
              <h3><?php echo $countSlide['total'] ?></h3>
    
              <p>Slideshow</p>
            </div>
            <div class="icon">
              <i class="fa fa-picture-o"></i>
            </div>
            <a href="<?php echo ADMIN_URL ?>slideshow" class="small-box-footer">Quản lý slide <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        
      </div>
    </section> -->
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include_once $path.'incfiles/footer.php'; ?>

<!-- ./wrapper -->

<?php include_once $path.'incfiles/footer_assets.php'; ?>
</body>
</html>
