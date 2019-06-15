<?php

  $sql = "select * from products where status = 1 and page = 0 and cate_id = 1 order by id desc limit 6";
  $products = getQr($sql, true);
  // $sql2 = "select * from products where status = 1 and page = 0 order by id desc limit 3 ";
  // $products2 = getQr($sql2, true);
 ?>
<section class="ftco-section bg-light">
    	<div class="container">
				<div class="row justify-content-start mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate">
            <h2 class="mb-4"><strong>Món Ăn</strong> Mới</h2>
          </div>
        </div>    		
    	</div>
    	<div class="container-fluid">
    		<div class="row">
          <?php foreach ($products as $value) {
            
           ?>
    			<div class="col-sm col-md-4 ftco-animate xt-cart">
    				<div class="destination shadow-sm">
    					<a href="<?php echo SITE_URL . $value['slug'] . '-' . $value['id'] ?>.html" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(<?php echo $value['thumbnail'] ?>); height: 480px; width: 449.06px">
                
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
	    							<span class="price"><?php echo number_format($value['price'])  ?>đ</span>
    							</div>
    						</div>
    						<p><?php echo substr($value['detail_info'], 0, 49) ?></p>
    						<hr>
    						<p class="bottom-area d-flex">
    							<span><i class="icon-map-o"></i> Đồ ăn</span> 
    							<span class="ml-auto"><a href="javascript:" data-id="<?php echo $value['id'] ?>" class="xt-buy">Đặt ngay</a></span>
    						</p>
    					</div>
    				</div>
    			</div>
          <?php 
            }
           ?>
    			
    			
    		</div>
        <!-- <div class="row">
          <?php foreach ($products2 as $value) {
            
           ?>
          <div class="col-sm col-md-6 col-lg ftco-animate">
            <div class="destination shadow-sm">
              <a href="#" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(<?php echo $value['thumbnail'] ?>);">
                <div class="icon d-flex justify-content-center align-items-center">
                  <span class="icon-search2"></span>
                </div>
              </a>
              <div class="text p-3">
                <div class="d-flex">
                  <div class="one">
                    <h3><a href="http://localhost/duan1/<?php echo $value['slug'] . '-' . $value['id'] ?>.html"><?php echo $value['product_name'] ?></a></h3>
                    <p class="rate">
                      <i class="icon-star"></i>
                      <i class="icon-star"></i>
                      <i class="icon-star"></i>
                      <i class="icon-star"></i>
                      <i class="icon-star-o"></i>
                      <span>8 Rating</span>
                    </p>
                  </div>
                  <div class="two">
                    <span class="price">$<?php echo $value['price']  ?></span>
                  </div>
                </div>
                <p><?php echo substr($value['detail_info'], 0, 49) ?></p>
                <hr>
                <p class="bottom-area d-flex">
                  <span><i class="icon-map-o"></i>Món luộc</span> 
                  <span class="ml-auto"><a href="add_cart.php?id=<?php echo $value['id'] ?>" id="xt-buy">Đặt ngay</a></span>
                </p>
              </div>
            </div>
          </div>
          <?php 
            }
           ?>
        </div> -->
    	</div>
    </section>