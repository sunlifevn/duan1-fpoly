<?php session_start(); ?>
<?php require_once './library/db.php';
$pageNumber = isset($_GET['page']) == true ? $_GET['page'] : 1;
  $pageSize  = 8;
    $offset = ($pageNumber-1)*$pageSize;
    //
  $sql = "select id from products where page = 1";
  $sta = $pdo->prepare($sql);
  $sta->execute();
  $tong = $sta->rowCount();
  $sql = "select * from products where page = 1 and status = 1 order by id desc limit $offset, $pageSize";
  $pages = getQr($sql, true);
 ?>
<!DOCTYPE html>
<html lang="en">
  <?php include_once './incfiles/header-asset.php'; ?>
  <body>
    
  <?php include_once './incfiles/header.php'; ?>
    <!-- END nav -->
    
    <div class="hero-wrap js-fullheight" style="background-image: url('images/bg_1.jpg'); max-height: 90px">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-9 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
            <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="index.html">Home</a></span> <span>Blog</span></p>
            <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Tips &amp; Articles</h1>
          </div>
        </div>
      </div>
    </div>


    <section class="ftco-section bg-light">
      <div class="container">
        <div class="row d-flex">
          <?php 
            foreach ($pages as $value) {
           ?>
          <div class="col-md-3 d-flex ftco-animate">
            <div class="blog-entry align-self-stretch">
              <a href="<?php echo SITE_URL . 'tin-tuc/' . $value['slug'] . '-' . $value['id']?>.html" class="block-20" style="background-image: url('<?php echo $value['thumbnail'] ?>');">
              </a>
              <div class="text p-4 d-block">
              	<span class="tag">Tin tức</span>
                <h3 class="heading mt-3"><a href="<?php echo SITE_URL . 'tin-tuc/' . $value['slug'] . '-' . $value['id']?>.html"><?php echo $value['product_name'] ?></a></h3>
                <div class="meta mb-3">
                  <div><a href="#"><?php echo substr($value['created_date'], 0, 10) ?></a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                </div>
              </div>
            </div>
          </div>
          <?php 
            }
           ?>
          
        </div>
        <div class="row mt-5">
          <div class="col text-center">
            <div class="paginate"></div>

          </div>
        </div>
      </div>
    </section>

    <?php include_once './incfiles/footer.php'; ?>


  <?php include_once './incfiles/footer-asset.php'; ?>
  </body>
  <script>
    (function() {
        $('.paginate').pagination({
            items: <?php echo $tong ?>,
            itemsOnPage: <?php echo $pageSize?>,
            currentPage: <?php echo $pageNumber?>,
            cssStyle: 'compact-theme',
            onPageClick: function(page){
              var url = '<?php echo SITE_URL . 'tin-tuc?' ?>';
          url+= `&page=${page}`;
          window.location.href = url;      
            }
        });
   
    });
  </script>
</html>