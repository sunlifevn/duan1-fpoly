<?php
	session_start(); 
  $path = "./";
  require_once $path.'../library/db.php';
   if(!isset($_SESSION['login'])|| $_SESSION['login'] == null){
  header('location: '. SITE_URL);
  die;
}  
$id = $_SESSION['login']['id'];
$sql  = "select * from invoices where user_id = $id order by id desc";
$invoices = getQr($sql, true);
   ?>

<!DOCTYPE html>
<html lang="en">
  <?php include_once $path.'../incfiles/header-asset.php'; ?>
  <body>
	<?php  include_once $path.'../incfiles/header.php'; ?>
    <!-- END nav -->
    <div class="hero-wrap js-fullheight" style="background: url(./../images/bg_7.jpg); max-height: 90px; opacity: 0.7">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-9 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
            <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="index.html">Home</a></span> <span class="mr-2"><a href="hotel.html">Trong ngày</a></span> <span>Món ăn</span></p>
            <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Thanh toán</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section ftco-degree-bg">
      <div class="container ftco-animate">
    <div class="row">
  		<div class="col-sm-10"><h3>Lịch sử mua hàng</h3></div>
    </div>
    <div class="row">
  		<div class="col-12">
      <table class="table table-bordered">
                  <thead>
                    <tr>
                    <th>STT</th>
                    <th>ID đơn hàng</th>
                    <th>Họ và tên</th>
                    <th>Số điện thoại</th>
                    <th>Email</th>
                    <th>Địa chỉ</th>
                    <th>Ghi chú</th>
                    <th>Ngày đặt hàng</th>
                    <th>Trạng thái</th>
                  </tr>
                    </thead>
                    <tbody>
                      <?php
                  $i = 1; 
                  foreach ($invoices as $value) {
                   ?>
                   <tr>
                    <td><?php echo $i ?></td>
                    <td>#<?php echo $value['id'] ?></td>
                    <td><?php echo $value['customer_name'] ?></td>
                    <td>
                      <?php echo $value['customer_phone']?>
                    </td>
                    <td>
                      <?php echo $value['customer_email']?>
                    </td>
                    <td>
                      <?php echo $value['address'] ?>
                    </td>
                    <td>
                      <?php echo $value['note'] ?>
                    </td>
                    <td>
                      <?php echo $value['created_date'] ?>
                    </td>
                    <td>
                       <?php if ($value['status'] == 0) { ?>
                       <span class="btn btn-success"><i class="fa fa-refresh"></i> Đang xử lý</span>
                       <?php } else if($value['status'] == 1){ ?>
                       <span class="btn btn-danger"><i class="fa fa-truck"></i> Đang giao hàng</span>
                       <?php } else { ?>
                       <span class="btn btn-info"><i class="fa fa-check-square-o"></i> Đã thanh toán</span>
                       <?php } ?>
                    </td>
                    <td>
                      <a href="<?php echo SITE_URL?>user/detail_invoice.php?id=<?php echo $value['id']?>"
                        class="btn btn-xs btn-default"
                        >
                        Xem chi tiết
                      </a>
                    </td>
                  </tr>
                  <?php
                  $i++; 
                }
                ?>
                 
              </tbody></table>
      </div>
    	
    </div><!--/row-->
    </section> <!-- .section -->

    <?php include_once $path.'../incfiles/footer.php'; ?>


  <?php include_once $path.'../incfiles/footer-asset.php'; ?>

  </body>
  
</html>