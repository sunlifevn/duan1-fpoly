<?php session_start(); ?>
<?php require_once './library/db.php';
$pageId = $_GET['id'];
settype($pageId, "int");
if (!isset($_GET['id'])) {
  header('location: ' . SITE_URL);
}
$sql = "select * from products where id=$pageId and page = 1";
$pages = getQr($sql);
// update lượt xem
$sql = "UPDATE products SET views = views + 1 WHERE id = $pageId and page=1";
$pdo->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
   <?php include_once './incfiles/header-asset.php'; ?>
  <body>
    
  <?php include_once './incfiles/header.php'; ?>
    <!-- END nav -->
    
    <div class="hero-wrap js-fullheight" style="background: #f44336; max-height: 90px;">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-9 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
            <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="index.html">Home</a></span> <span class="mr-2"><a href="blog.html">Blog</a></span> <span>Blog Single</span></p>
            <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Tips &amp; Articles</h1>
          </div>
        </div>
      </div>
    </div>


    <section class="ftco-section ftco-degree-bg">
      <div class="container">
        <div class="row">
          <div class="col-md-8 ftco-animate">
            <h2 class="mb-3"><?php echo $pages['product_name'] ?></h2>
            <p><i class="fa fa-eye"></i> <?php echo $pages['views'] ?> Lượt xem</p>
            <p>
              <img src="<?php echo SITE_URL . $pages['thumbnail'] ?>" alt="" class="img-fluid" width="100%">
            </p>
            <p><?php echo $pages['detail_info'] ?></p>

            
            <!-- <div class="tag-widget post-tag-container mb-5 mt-5">
              <div class="tagcloud">
                <a href="#" class="tag-cloud-link">Life</a>
                <a href="#" class="tag-cloud-link">Sport</a>
                <a href="#" class="tag-cloud-link">Tech</a>
                <a href="#" class="tag-cloud-link">Travel</a>
              </div>
            </div> -->
            
           <!--  <div class="about-author d-flex p-5 bg-light">
              <div class="bio align-self-md-center mr-5">
                <img src="images/person_1.jpg" alt="Image placeholder" class="img-fluid mb-4">
              </div>
              <div class="desc align-self-md-center">
                <h3>xUÂN TIẾN</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur similique, inventore eos fugit cupiditate numquam!</p>
              </div>
            </div> -->


            
          </div> <!-- .col-md-8 -->
          <div class="col-md-4 sidebar ftco-animate">



            <div class="sidebar-box ftco-animate">
              <h3>TIN GẦN ĐÂY</h3>
              <?php $sql = "select * from products where id != $pageId and page = 1 order by id desc limit 4";
                $pageMore = getQr($sql, true);
                foreach ($pageMore as $value) {
                
               ?>
              <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url(<?php echo SITE_URL .  $value['thumbnail']  ?>);"></a>
                <div class="text">
                  <h3 class="heading"><a href="<?php echo SITE_URL . 'tin-tuc/' . $value['slug'] . '-' . $value['id']?>.html"><?php echo $value['product_name'] ?></a></h3>
                  <div class="meta">
                    <div><a href="#"><span class="icon-calendar"></span> <?php echo substr($value['created_date'], 0, 10) ?> </a></div>
                    <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                  </div>
                </div>
              </div>
              <?php 
                }
               ?>
              
            </div>

            <!-- <div class="sidebar-box ftco-animate">
              <h3>Tag Cloud</h3>
              <div class="tagcloud">
                <a href="#" class="tag-cloud-link">dish</a>
                <a href="#" class="tag-cloud-link">menu</a>
                <a href="#" class="tag-cloud-link">food</a>
                <a href="#" class="tag-cloud-link">sweet</a>
                <a href="#" class="tag-cloud-link">tasty</a>
                <a href="#" class="tag-cloud-link">delicious</a>
                <a href="#" class="tag-cloud-link">desserts</a>
                <a href="#" class="tag-cloud-link">drinks</a>
              </div>
            </div> -->

          </div>

        </div>
      </div>
    </section> <!-- .section -->

     <?php include_once './incfiles/footer.php'; ?>


  <?php include_once './incfiles/footer-asset.php'; ?>
  </body>
</html>