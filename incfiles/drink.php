<?php 
    $sql = "select * from products where status = 1 and page = 0 and cate_id = 2 order by id desc limit 5";
  $drinks = getQr($sql, true);
 ?>
<section class="ftco-section">
    	<div class="container">
				<div class="row justify-content-start mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate">
            <h2 class="mb-4"><strong>Top</strong> Đồ Uống</h2>
          </div>
        </div>    		
    	</div>
    	<div class="container-fluid">
    		<div class="row">
                <?php foreach ($drinks as $value) {
            
           ?>
    			<div class="col-sm col-md-6 col-lg ftco-animate xt-cart">
    				<div class="destination">
    					<a href="<?php echo SITE_URL . $value['slug'] . '-' . $value['id'] ?>.html" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(<?php echo $value['thumbnail'] ?>); height: 200px; width: 257.44px">
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
	    							<span class="price per-price"><?php echo number_format($value['price'])  ?>đ<br></span>
    							</div>
    						</div>
    						<p><?php echo substr($value['detail_info'], 0, 49) ?></p>
    						<hr>
    						<p class="bottom-area d-flex">
    							<span><i class="icon-map-o"></i> Đồ uống</span> 
    							<span class="ml-auto"><a href="javascript:" data-id="<?php echo $value['id'] ?>" class="xt-buy">Đặt ngay</a></span>
    						</p>
    					</div>
    				</div>
    			</div>
    			<?php 
            }
           ?>
    			
    			
    			
    		</div>
    	</div>
    </section>