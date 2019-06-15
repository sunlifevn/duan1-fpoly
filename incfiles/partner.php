<?php 
	$sql = "select * from partner";
	$partner = getQr($sql,true);
 ?>
 <section class="ftco-section">
 	<div class="container">
 		<div class="row justify-content-start">
 			<div class="col-md-7 heading-section ftco-animate fadeInUp ftco-animated">
				<h2 class="mb-4">Đối tác</h2>
 			</div>
 			<div class="owl-carousel owl-theme ftco-animated">
          <?php 
            foreach ($partner as $value) {
           ?>
        <div class="item"><a href="<?php echo $value['site_url'] ?>" target="_blank"><img src="<?php echo $value['image_url'] ?>" alt="" width="100px"></a></div>
        <?php 
          }
         ?>
        </div>
 		</div>
 	</div>
 </section>