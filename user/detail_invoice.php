<?php
	session_start(); 
  $path = "./";
  require_once $path.'../library/db.php';
   if(!isset($_SESSION['login'])|| $_SESSION['login'] == null){
  header('location: '. SITE_URL);
  die;
}  
$idProduct = $_GET['id'];
$sql = "select * from invoices where id='$idProduct'";
$invoices = getQr($sql);
$totalPrice = 0;
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
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-globe"></i> Hoá đơn đặt hàng | 
            <small class="text-right">Hôm nay: <?php echo date('d/m/Y') ?></small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          <i>From</i>
          <address>
            <strong>XuanTien Foody</strong><br>
            16, Quan Hoa, Cau Giay, Ha Noi<br>
            Phone: (+84) 904 587 340<br>
            Email:  contact@xuantienfoody.com
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <i>To</i>
          <address>
            <strong><?php echo $invoices['customer_name'] ?></strong><br>
            <?php echo $invoices['address'] ?><br>
            Phone: <?php echo $invoices['customer_phone'] ?><br>
            Email: <?php echo $invoices['customer_email'] ?>
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <b>Mã hoá đơn #<?php echo $invoices['id'] ?></b><br>
          <br>
          <b>Voucher:</b> Không voucher!<br>
        </div>
        <!-- /.col -->
      </div>
      <?php 
        $sql = "select * from order_details where id = '$idProduct'";
        $detailInvoices = getQr($sql, true);
       ?>
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
              <th>Tên món</th>
              <th>Hình ảnh</th>
              <th>Đơn giá</th>
              <th>Số lượng</th>
              <th>Thành tiền</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($detailInvoices as $value) {
              $sql2 = "select product_name, thumbnail from products where id=" . $value['product_id'];
              $pr = getQr($sql2);
             ?>
            <tr>
              <td><?php echo $pr['product_name'] ?></td>
              <td><img src="<?php echo SITE_URL . $pr['thumbnail'] ?>" alt="" width="70px"></td>
              <td><?php echo number_format($value['price']) ?></td>
              <td><?php echo $value['quanlity'] ?></td>
              <td><?php 
              $total = $value['price']*$value['quanlity'];
              echo number_format($total);
               ?></td>
            </tr>
            <?php 
              $totalPrice += $total;
              }
             ?>
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <div class="row">
        <!-- accepted payments column -->
        <div class="col-sm-6">
          <p class="lead">Phương thức thanh toán</p>
          <img src="<?php echo SITE_URL ?>images/credit/visa.png" alt="Visa">
          <img src="<?php echo SITE_URL ?>images/credit/mastercard.png" alt="Mastercard">
          <img src="<?php echo SITE_URL ?>images/credit/american-express.png" alt="American Express">
          <img src="<?php echo SITE_URL ?>images/credit/paypal2.png" alt="Paypal">

          <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
           Nhận hàng rồi thanh toán
          </p>
        </div>
        <!-- /.col -->
        <div class="col-sm-6">
          <p class="lead">Đặt ngày <?php echo $invoices['created_date'] ?></p>

          <div class="table-responsive">
            <table class="table">
              <tbody><tr>
                <th style="width:50%">Tổng:</th>
                <td><?php echo number_format($totalPrice) ?></td>
              </tr>
              <tr>
                <th>Phí vận chuyển:</th>
                <td>50,000</td>
              </tr>
              <tr>
                <th>Toàn bộ:</th>
                <td><?php echo number_format($totalPrice+50000) ?></td>
              </tr>
            </tbody></table>
          </div>
        </div>
        <!-- /.col -->
      </div>
       <div class="row no-print">
        <div class="col-xs-12">
          <button type="button" onclick="window.print()" class="btn btn-success pull-right" style="margin-right: 5px;">
            <i class="fa fa-print"></i> In hoá đơn
          </button>
        </div>
      </div>
    </div>
    </section> <!-- .section -->

    <?php include_once $path.'../incfiles/footer.php'; ?>


  <?php include_once $path.'../incfiles/footer-asset.php'; ?>

  </body>
  
</html>