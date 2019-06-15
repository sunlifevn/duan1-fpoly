<?php
 $flag= null;
 $sql = "select * from web_settings";
 $setting = getQr($sql);
  ?>
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="<?php echo SITE_URL ?>"><?php echo $setting['logo'] ?></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active"><a href="<?php echo SITE_URL ?>" class="nav-link">Trang chủ</a></li>
          <li class="nav-item"><a href="<?php echo SITE_URL . 'gioi-thieu' ?>" class="nav-link">Giới thiệu</a></li>
          <li class="nav-item"><a href="do-an-1" class="nav-link">Đồ ăn</a></li>
          <li class="nav-item"><a href="do-uong-2" class="nav-link">Đồ uống</a></li>
          <li class="nav-item"><a href="<?php echo SITE_URL . 'tin-tuc' ?>" class="nav-link">Tin tức</a></li>
          
          <?php 
              if(!isset($_SESSION['login']) || $_SESSION['login'] == null){
  echo '<li class="nav-item cta"><a href="javascript:" class="nav-link" data-toggle="modal" data-target="#myLogin"><span>Đăng nhập</span></a></li>';
} else {
  ?>
  <li class="dropdown nav-item cta">
    <a href="javascript:" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span><i class="fa fa-user"></i> <b></b><?php echo $_SESSION['login']['full_name'] ?></b></span></a>

           <ul class="dropdown-menu">
            <?php if($_SESSION['login']['role'] == 9){ ?>
    <li style="padding-left: 10px; padding-right: 10px"><a href="<?php echo SITE_URL . 'admin' ?>" target="_blank"><i class="fa fa-lock"> Quản trị</i></a></li><hr>
    
  <?php } ?>
    <li style="padding-left: 10px; padding-right: 10px"><a href="<?php echo SITE_URL . 'user' ?>"><i class="fa fa-user"></i> Cá nhân</a></li>
    <li style="padding-left: 10px; padding-right: 10px"><a href="<?php echo SITE_URL . 'user/fl_invoice.php' ?>"><i class="fa fa-truck"></i> Tình trạng đơn hàng</a></li>
    <li style="padding-left: 10px; padding-right: 10px"><a href="<?php echo SITE_URL . 'logout.php' ?>"><i class="fa fa-sign-out"></i> Đăng xuất</a></li>
  </ul>
</li>
  <?php
}
           ?>
        </ul>
      </div>
      <?php 
        if (!isset($_SESSION['cart'])) {
                  $flag = false;
                } else {
                  foreach ($_SESSION['cart'] as $idProduct => $quanlity) {
                    if(isset($idProduct)){
                    $flag = true;
                    } else {
                    $flag = false;
                    }
                  }
                  
                }
            if ($flag==false) {
              echo '<a href="http://localhost/duan1/gio-hang#detailInv" class="cart-total"><i class="fa fa-shopping-cart"></i> <span class="cart-quanlity">0</span></a>';
            } else {
              $cart = $_SESSION['cart'];
              echo '<a href="http://localhost/duan1/gio-hang#detailInv" class="cart-total"><i class="fa fa-shopping-cart"></i> <span class="cart-quanlity">' . count($cart) . '</span></a>';
            }
       ?>
          
    </div>
  </nav>
