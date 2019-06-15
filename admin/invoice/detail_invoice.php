<?php 
$path = "../";
require_once $path.$path.'library/db.php';
$idProduct = $_GET['id'];
$sql = "select * from invoices where id='$idProduct'";
$invoices = getQr($sql);
$totalPrice = 0;
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
       <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-globe"></i> Hoá đơn đặt hàng
            <small class="pull-right">Hôm nay: <?php echo date('d/m/Y') ?></small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          From
          <address>
            <strong>XuanTien Foody</strong><br>
            16, Quan Hoa, Cau Giay, Ha Noi<br>
            Phone: (+84) 904 587 340<br>
            Email:  contact@xuantienfoody.com
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          To
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
      <!-- /.row -->

      <!-- Table row -->
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
      <!-- /.row -->

      <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-6">
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
        <div class="col-xs-6">
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
      <!-- /.row -->

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
          <button type="button" onclick="window.print()" class="btn btn-success pull-right" style="margin-right: 5px;">
            <i class="fa fa-print"></i> In hoá đơn
          </button>
        </div>
      </div>
    </section>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include_once $path.'incfiles/footer.php'; ?>
  <?php include_once $path.'incfiles/footer_assets.php'; ?>
</body>
</html>
