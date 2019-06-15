<?php
	session_start(); 
  $path = "./";
  require_once $path.'../library/db.php';
   if(!isset($_SESSION['login'])|| $_SESSION['login'] == null){
  header('location: '. SITE_URL);
  die;
}  
$id = $_SESSION['login']['id'];
$sql  = "select * from users where id = $id";
$users = getQr($sql);
   ?>

<!DOCTYPE html>
<html lang="en">
  <?php include_once $path.'../incfiles/header-asset.php'; ?>
  <body>
	<?php  include_once $path.'../incfiles/header.php'; ?>
    <!-- END nav -->
    <div class="hero-wrap js-fullheight" style="background: url(./../images/bg_7.jpg); max-height: 90px; opacity: 0.7">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-9 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
            <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="index.html">Home</a></span> <span class="mr-2"><a href="hotel.html">Trong ngày</a></span> <span>Món ăn</span></p>
            <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Thanh toán</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section ftco-degree-bg">
      <div class="container ftco-animate">
    <div class="row">
  		<div class="col-sm-10"><h3>Tài khoản của tôi</h3></div>
    </div>
    <div class="row">
  		<div class="col-sm-3"><!--left col-->

      <div class="text-center">
      <img id="showImage" src="<?php echo SITE_URL ?><?php echo $users['avatar'] ?>" alt="" class="img-responsive" width="200px">
        <form method="post" action="save-avatar.php" enctype="multipart/form-data">
          <input type="hidden" name="id" value="<?php echo $id ?>">
            <input type="file" name="image" class="form-control"><br> 
          <button type="submit" class="btn btn-primary">Cập nhật</button>
        </form>
      </div></hr><br>


        </div><!--/col-3-->
    	<div class="col-sm-9">
            <ul class="nav">
                <li class="active mr-3"><a data-toggle="tab" href="#home">Cá nhân</a></li>
                <li><a data-toggle="tab" href="#settings">Đổi mật khẩu</a></li>
              </ul>

              
          <div class="tab-content">
            <div class="tab-pane active" id="home">
                <hr>
                <form action="update.php" method="post">
                  <input type="hidden" value="<?php echo $id ?>" name="id">
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label><h6>Họ và tên</h6></label>
                              <input type="text" class="form-control" name="name" value="<?php echo $users['full_name'] ?>">
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="col-xs-6">
                              <label><h6>Số điện thoại</h6></label>
                              <input type="text" class="form-control" name="phone" value="<?php echo $users['phone'] ?>">
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="col-xs-6">
                              <label><h6>Địa chỉ</h6></label>
                              <input type="text" class="form-control" name="address" value="<?php echo $users['address'] ?>">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label><h6>Email</h6></label>
                              <input type="text" class="form-control" name="email" value="<?php echo $users['email'] ?>" readonly>
                          </div>
                      </div>
          
						<div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="last_name"><h6>Thông tin đặt món</h6></label>
                              <p>Khi đặt món, bạn sẽ nhận được thông báo xác nhận đơn hàng, tin nhắn cập nhật trạng thái đơn hàng và yêu cầu để lại nhận xét nhà hàng thông qua email hoặc cách khác (chẳng hạn tin nhắn thông báo).</p>
                          </div>
                      </div>
                      <div class="form-group">
                           <div class="col-xs-12">
                                <br>
                              	<button class="btn btn-lg btn-success" type="submit"><i class="fa fa-check-circle"></i> Lưu</button>
                               	<button class="btn btn-lg" type="reset"><i class="fa fa-refresh"></i> Reset</button>
                            </div>
                      </div>
              
              <hr>
              </form>
             </div><!--/tab-pane-->
             
             <div class="tab-pane" id="settings">
            		
               	
                  <hr>
                      <input type="hidden" value="<?php echo $id ?>" name="id">
                      <div id="errPass"></div>
                      <div class="form-group">
                          
                          <div class="col-md-6">
                            <label><h6>Mật khẩu cũ</h6></label>
                              <input type="password" class="form-control" name="password" id="password">
                              
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-md-6">
                            <label><h6>Mật khẩu mới</h6></label>
                              <input type="password" class="form-control" name="password2" id="password2">
                          </div>
                      </div>
                      <div class="form-group">
                           <div class="col-xs-12">
                                <br>
                              	<button class="btn btn-lg btn-success pull-left" id="checkPass"><i class="fa fa-check-circle"></i> Save</button>
                            </div>
                      </div>
              </div>
               
              </div><!--/tab-pane-->
          </div><!--/tab-content-->

        </div><!--/col-9-->
    </div><!--/row-->
    </section> <!-- .section -->

    <?php include_once $path.'../incfiles/footer.php'; ?>


  <?php include_once $path.'../incfiles/footer-asset.php'; ?>

  </body>
  <script>
      $("#checkPass").click(function(){
        var id = <?php echo $id ?>;
        var pass = $("#password").val();
        var pass2 = $('#password2').val();
        $.post("pass.php", {id: id, pass: pass, pass2: pass2}, function(data){
          $("#errPass").html(data);
        });
      });
     <?php 

    if (isset($_GET['success']) && $_GET['success'] == true) {
      ?>
      swal('Thay đổi thành công!');
      <?php
    }
    ?>
      var img = document.querySelector('[name="image"]');
    img.onchange = function(){
      var anh = this.files[0];
      if(anh == undefined){
        document.querySelector('#showImage').src = "<?php echo SITE_URL ?>images/default/default-picture.jpg";
      }else{
        getBase64(anh, '#showImage');
      }
      getBase64(anh, '#showImage');
    }
    function getBase64(file, selector) {
       var reader = new FileReader();
       reader.readAsDataURL(file);
       reader.onload = function () {
         document.querySelector(selector).src = reader.result;
       };
       reader.onerror = function (error) {
         console.log('Error: ', error);
       };
    }

    $("#validatePass").validate({
            rules: {
                password: "required",
                
            },
            messages: {
                password: "Không được để trống",
              }
                
            });
  </script>
</html>