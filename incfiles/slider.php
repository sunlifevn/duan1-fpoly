 <?php 
  // lấy dữ liệu slide show
  $slideQr = "select * from sliders where status = 1 order by order_number";
  $slides = getQr($slideQr, true);
  ?>
 <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <?php 
            for ($i=0; $i < count($slides) ; $i++) { 
            $act = $i === 0 ? "active" : "";
          }
           ?>

        <div class="carousel-inner" role="listbox">
    <?php 
          $count = 0;
            foreach ($slides as $value) {
            $act = $count === 0 ? "active" : "";
           ?>
    <div class="carousel-item <?php echo $act ?>">
            <img src="<?php echo $value['image_url'] ?>" width="100%" height="600px">
            <div class="carousel-caption ftco-animate">
        <h3 class="text-white"><a href="<?php echo $value['link_url'] ?>" class="text-white"><?php echo $value['title'] ?></a></h3>
        <p><?php echo $value['content'] ?></p>
      </div> 
           
          </div>
          <?php
              $count++; 
            }
           ?>
            
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>

                  </div>
      </div>
