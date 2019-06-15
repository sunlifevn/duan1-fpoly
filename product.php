<?php
session_start();
 require_once './library/db.php';
$productId = $_GET['id'];
settype($productId, "int");
if (!isset($_GET['id'])) {
	header('location: ' . SITE_URL);
}
$sql = "select * from products where id=$productId";
$products = getQr($sql);
// update lượt xem
$sql = "UPDATE products SET views = views + 1 WHERE id = $productId";
$pdo->query($sql);
 ?>

<!DOCTYPE html>
<html lang="en">
  <?php include_once './incfiles/header-asset.php'; ?>
  <body>
    
  <?php include_once './incfiles/header.php'; ?>
    <!-- END nav -->
    
    <div class="hero-wrap js-fullheight" style="background-image: url('images/bg_7.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-9 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
            <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="index.html">Home</a></span> <span class="mr-2"><a href="hotel.html">Trong ngày</a></span> <span>Món ăn</span></p>
            <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><?php echo $products['product_name'] ?></h1>
          </div>
        </div>
      </div>
    </div>


    <section class="ftco-section ftco-degree-bg">
      <div class="container">
        <div class="row">
        	<div class="col-lg-3 sidebar">
        		<div class="sidebar-wrap bg-light ftco-animate">
		              
		              <div class="form-group">
		                <a href="javascript:" class="btn btn-primary py-3 px-5 xt-buy" data-id="<?php echo $products['id'] ?>"><i class="fa fa-cart-plus"></i>   ĐẶT NGAY</a>
		              </div>
		              <div class="form-group">
		              	<p class="small" style="font-size: 12px"><i><i class="fa fa-truck" style="color: green"></i> Miễn phí vận chuyển cho thực đơn có giá trị trên 20.000.000đ</i></p>
		              </div>
		              <div class="form-group">
		              	<p class="small" style="font-size: 12px"><i><i class="fa fa-commenting" style="color: yellow"></i> Sử dụng Voucher tháng 12 <a href="#">Chi tiết tại đây</a> </i></p>
		              </div>
        		</div>
        		
          </div>
          <div class="col-lg-9">
          	<div class="row">
          		<div class="col-md-12 ftco-animate">
          			<div class="single-slider owl-carousel">
          				<?php 
          					$sql = "select * from product_galleries where product_id = $productId";
          					$galleryProduct = getQr($sql, true);
          					foreach ($galleryProduct as $value) {
          					          				 ?>
          				<div class="item">
          					<div class="hotel-img" style="background-image: url(<?php echo $value['image_url'] ?>);"></div>
          				</div>
          			<?php } ?>
          			</div>
          		</div>
          		<div class="col-md-12 hotel-single mt-4 mb-5 ftco-animate">
          			<h2><?php echo $products['product_name'] ?></h2>
          			<p class="rate mb-5">
          				<span class="loc"><a href="#"><i class="fa fa-eye"></i> <?php echo $products['views'] ?> Lượt xem</a></span>
          				
    						</p>
    						<p><?php echo $products['detail_info'] ?></p>
    						
    						
          		</div>
          		
          		<div class="col-md-12 hotel-single ftco-animate mb-5 mt-4">
          			<h4 class="mb-4">Có thể bạn thích?</h4>
          			<div class="row">
          				<?php 
          					$sql = "select * from products where id != $productId and page = 0 order by id desc limit 3";
          					$productsMore = getQr($sql, true);
          					foreach ($productsMore as $value) {
          				 ?>
          				<div class="col-md-4">
				    				<div class="destination">
				    					<a href="http://localhost/duan1/<?php echo $value['slug'] . '-' . $value['id'] ?>.html" class="img img-2" style="background-image: url(<?php echo $value['thumbnail'] ?>);"></a>
				    					<div class="text p-3">
				    						<div class="d-flex">
				    							<div class="one">
						    						<h3><a href="<?php echo SITE_URL . $value['slug'] . '-' . $value['id'] ?>.html"><?php echo $value['product_name'] ?></a></h3>
						    					
					    						</div>
					    						
				    						</div>
				    						<p><?php echo substr($value['detail_info'], 0, 15) ?></p>
				    						<hr>
				    						<p class="bottom-area d-flex">
				    							<span class="ml-auto"><a href="<?php echo SITE_URL . $value['slug'] . '-' . $value['id'] ?>.html">Chi tiết</a></span>
				    						</p>
				    					</div>
				    				</div>
				    			</div>
				    		<?php 
				    			}
				    		 ?>
				    			
          			</div>
          		</div>
          		
          		

          	</div>
          </div> <!-- .col-md-8 -->
        </div>
      </div>
    </section> <!-- .section -->

    <?php include_once './incfiles/footer.php'; ?>


  <?php include_once './incfiles/footer-asset.php'; ?>
    
  </body>
  <script>
    $(".xt-buy").click(function(){
      var idProduct = $(this).attr("data-id");
      $.post("add_cart.php", {idProduct: idProduct}, function(data){
        $(".cart-total").html(data);
      });
    });
  </script>
</html>