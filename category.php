<?php
session_start();
 require_once './library/db.php';
$cateId = $_GET['id'];
settype($cateId, "int");
$pageNumber = isset($_GET['page']) == true ? $_GET['page'] : 1;
  $pageSize = 6; // số bv tên 1 trang
  
  // lây tên categories
  $sql = "select * from categories where id = $cateId";
  $sta = $pdo->prepare($sql);
  $sta->execute();
  $cate = $sta->fetch();
  // lấy tổng số products
  $sql = "select * from products where cate_id = $cateId and status = 1 and page = 0";
  $sta = $pdo->prepare($sql);
  $sta->execute();
  $tong = $sta->rowCount();

  if(!$tong){
    header("location: " . SITE_URL);
    die();
  }
  // tính trang tiếp theo
  $offset = ($pageNumber-1)*$pageSize;
  $sql = "select p.*, c.cate_name as catename from products p join categories c ON p.cate_id = c.id where cate_id = $cateId and status = 1 and page = 0  order by id desc limit $offset, $pageSize";
  $sta = $pdo->prepare($sql);
  $sta->execute();
  $products = $sta->fetchAll();
 ?>
<!DOCTYPE html>
<html lang="en">
  <?php include_once './incfiles/header-asset.php'; ?>
  <body>
    
  <?php include_once './incfiles/header.php'; ?>
    
    <div class="hero-wrap js-fullheight" style="background-image: url('images/bg_7.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-9 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
            <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="index.html">Home</a></span> <span><?php echo $cate['cate_name'] ?></span></p>
            <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><?php echo $cate['cate_name'] ?></h1>
          </div>
        </div>
      </div>
    </div>


    <section class="ftco-section ftco-degree-bg">
      <div class="container">
        <div class="row">
    
          <div class="col-lg-12">
          	<div class="row">
          		<?php foreach ($products as $value) {
          		
          		 ?>
          		<div class="col-md-4 ftco-animate xt-cart">
		    				<div class="destination">
		    					<a href="<?php echo SITE_URL . $value['slug'] . '-' . $value['id'] ?>.html" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(<?php echo $value['thumbnail'] ?>); height: 200px; width: 349.99px">
		    						<div class="icon d-flex justify-content-center align-items-center">
    							<span class="icon-search2"></span>
    						</div>
		    					</a>
		    					<div class="text p-3">
		    						<div class="d-flex">
		    							<div class="one">
				    						<h3><a href="<?php echo SITE_URL . $value['slug'] . '-' . $value['id'] ?>.html"><?php echo $value['product_name'] ?></a></h3>
				    						
			    						</div>
			    						<div class="two">
			    							<span class="price per-price"><?php echo $value['price'] ?></span>
		    							</div>
		    						</div>
		    						<p><?php echo $value['detail_info'] ?></p>
		    						<hr>
		    						<p class="bottom-area d-flex">
		    							<span><i class="icon-map-o"></i> <?php echo $value['catename'] ?></span> 
		    							<span class="ml-auto"><a href="javascript:" data-id="<?php echo $value['id'] ?>" class="xt-buy">Đặt ngay</a></span>
		    						</p>
		    					</div>
		    				</div>
		    			</div>
		    		<?php } ?>
		    			
		    			
		    			
		    			
		    			
          	</div>
          	<div class="row mt-5">
		          <div class="col text-center">
		            <div class="block-27">
		              <div class="paginate p-3"></div>
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
    $(function() {
        $('.paginate').pagination({
            items: <?php echo $tong ?>,
            itemsOnPage: <?php echo $pageSize?>,
            currentPage: <?php echo $pageNumber?>,
            cssStyle: 'compact-theme',
            onPageClick: function(page){
              var url = '<?php echo SITE_URL . 'category.php?id='. $cateId ?>';
          url+= `&page=${page}`;
          window.location.href = url;      
            }
        });
    });
    $(".xt-buy").click(function(){
      var idProduct = $(this).attr("data-id");
      $.post("add_cart.php", {idProduct: idProduct}, function(data){
        $(".cart-total").html(data);
      });
    });
    function flyToElement(flyer, flyingTo) {
      var $func = $(this);
      var flyerClone = $(flyer).clone();
      $(flyerClone).css({
        position: 'absolute',
        top: $(flyer).offset().top + "px",
        left: $(flyer).offset().left + "px",
        opacity: 1,
        'z-index': 1000
      }).appendTo($('body'));
      var gotoX = $(flyingTo).offset().left;
      var gotoY = $(flyingTo).offset().top;
      $(flyerClone).animate({
        opacity: 0.4,
        left: gotoX,
        top: gotoY,
        width: $(flyingTo).width(),
        height: $(flyingTo).height()
      }, 700,
      function () {
        $(flyingTo).effect("shake",function(){
          $(flyerClone).fadeOut('fast', function () {
            $(flyerClone).remove();
          });
        });
      });
    }
    $(function(){
      $('.xt-buy').click(function(){
        var $_this = $(this);
        var itemImg = $(this).closest('.xt-cart').find('.img').eq(0);
         flyToElement($(itemImg), $('.cart-total'));
      });
    });
  </script>
</html>