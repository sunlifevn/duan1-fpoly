<section class="ftco-section ftco-destination">
      <div class="container">
        <div class="row justify-content-start mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate">
            <h2 class="mb-4"><strong>Cẩm nang</strong> Food</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="destination-slider owl-carousel ftco-animate">
              <?php 
                $sql = "select * from products where page = 1 and status = 1 order by id desc limit 7";
                $pages = getQr($sql, true);
                foreach ($pages as $value) {
                
               ?>
              <div class="item">
                <div class="destination">
                  <a href="<?php echo SITE_URL . 'tin-tuc/' . $value['slug'] . '-' . $value['id'] ?>.html" class="img d-flex justify-content-center align-items-center" style="background-image: url(<?php echo $value['thumbnail'] ?>);">
                    <div class="icon d-flex justify-content-center align-items-center">
                      <span class="icon-search2"></span>
                    </div>
                  </a>
                  <div class="text p-3">
                    <h3><a href="<?php echo SITE_URL . 'tin-tuc/' . $value['slug'] . '-' . $value['id'] ?>.html"><?php echo $value['product_name'] ?></a></h3>
                    <span class="listing"><?php echo $value['views'] ?> Lượt xem</span>
                  </div>
                </div>
              </div>
              
              <?php } ?>
             
            </div>
          </div>
        </div>
      </div>
    </section>