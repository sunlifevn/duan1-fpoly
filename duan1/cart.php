<?php 
session_start();
$flag = null;
$totalPrice = 0;
require_once './library/db.php';

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
            <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Thanh toán</h1>
          </div>
        </div>
      </div>
    </div>
	<?php include_once 'login.php'; ?>

    <section class="ftco-section ftco-degree-bg">
      <div class="container">
        <div class="row">
        	<div class="col-lg-3 sidebar">
        		<div class="sidebar-wrap bg-light ftco-animate">
        			<h3 class="heading mb-4">Tìm món</h3>
        			
        		</div>
        		
          </div>
          <div class="col-lg-9">
          	<div class="row" id="detailInv">
          		
          		<div class="col-md-12 hotel-single mt-4 mb-5 ftco-animate">
          			<h3 class="heading mb-4">Chi tiết giỏ hàng</h3>
          			<form method="post" action="customer.php">
				  <table class="table">
				    <thead class="thead-light">
				      <tr>
				        <th>STT</th>
				        <th>Sản phẩm</th>
				        <th>Ảnh</th>
				        <th>Đơn giá</th>
				        <th>Số lượng</th>
				        <th>Thành tiền</th>
				      </tr>
				    </thead>
				    <tbody>
				    	<?php 
				    		if (!isset($_SESSION['cart'])) {
				    			$flag = false;
				    		} else {
				    			foreach ($_SESSION['cart'] as $idProduct => $quanlity) {
				    				if(isset($idProduct)){
				    				$flag = true;
				    				} else {
				    				$flag = false;
				    				}
				    			}
				    			
				    		}

				    		if ($flag==false) {
				    			echo "<tr><td>Bạn chưa mua món nào!</td></tr>";
				    		} else {
				    	 
					    	 $i =1;
					    	foreach ($_SESSION['cart'] as $idProduct => $quanlity) {
					    		$arr[] = "'" .$idProduct. "'";
					    	} 
					    	 $strIdProduct = implode(",", $arr);
					    	
					    	 $sql = "select * from products where id in ($strIdProduct)";
					    		$product = getQr($sql, true);
					    	
							 foreach ($product as $value) {
								
							 ?>
					      <tr>
					        <td><?php echo $i ?></td>
					        <td><?php echo $value['product_name'] ?></td>
					        <td><img src="<?php echo $value['thumbnail'] ?>" alt="" width="100px"></td>
					        <td><?php echo number_format($value['price']) ?></td>
					        <td><input type="number" min="1" max="20" value="<?php echo $_SESSION['cart'][$value['id']] ?>" name="quanlity" class="quanlity" data-id="<?php echo $value['id'] ?>" data-price="<?php echo $value['price'] ?>"></td>
					        <td id="quanlity<?php echo $value['id'] ?>"><?php
					        	$quanlity = $_SESSION['cart'][$value['id']];
					        	$pricePerfect = $quanlity*$value['price'];
					        	echo number_format($pricePerfect);
					        	?>
					        </td>
					        <td>
								<a href="del_cart.php?id=<?php echo $value['id'] ?>"><i class="fa fa-trash-o" style="color: #c83030"></i></a>
					        </td>
					      </tr>
					      <?php
					      $i++;
					      $totalPrice +=$pricePerfect;

					      }
					  		}
					       ?>
					       
					       	<tr>
					       		<td colspan="3">Tổng thanh toán: <?php echo number_format($totalPrice) ?> <a href="javascript:" class="btn btn-danger btn-xs" id="refresh">Cập nhật <i class="fa fa-refresh"></i></a></td>
					       		<td><input type="hidden" name="total" value="<?php echo number_format($totalPrice) ?>"></td>
					       	</tr>
				    </tbody>
				  </table>
    						
          		</div>
          		
          		
          		<div class="col-md-12 hotel-single ftco-animate mb-5 mt-4">
          			<div class="fields">
          				<div class="row">
				            <div class="col-md-12">
				              <div class="form-group">
				              	<?php 
				              		if ($flag==false) {
				    			echo " ";
				    		} else {
				              	 ?>
				                <span class="btn btn-primary py-3" data-toggle="modal" data-target="#myInvoices">Đặt hàng</span>
				            <?php } ?>
				              </div>
			              </div>
		              </div>
		            </div>
          		</div>
          		<?php 
          		if (isset($_SESSION['login'])) {
          			
          		 ?>
          		<div id="myInvoices"  class="modal fade" tabindex="-1" role="dialog">
          			<div class="modal-dialog modal-lg" role="document">
          				<div class="modal-content">
          					<div class="modal-header">
          						<h4 class="modal-title">Thông tin đặt hàng</h4>
          						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          					</div>
          					<div class="modal-body">
							
          						<div class="row">
          						<div class="col-md-6">
				              <div class="form-group">
				                <input type="text" class="form-control" name="name" placeholder="Họ và tên" value="<?php echo $_SESSION['login']['full_name'] ?>">
				              </div>
			              </div>
			              <div class="col-md-6">
				              <div class="form-group">
				                <input type="text" class="form-control" name="phone" placeholder="Số điện thoại" value="<?php echo $_SESSION['login']['phone'] ?>">
				              </div>
			              </div>
			              <div class="col-md-6">
				              <div class="form-group">
				                <input type="text" class="form-control" name="email" placeholder="Email" value="<?php echo $_SESSION['login']['email'] ?>">
				              </div>
			              </div>
			              <div class="col-md-6">
				              <div class="form-group">
				                <input type="text" class="form-control" name="address" placeholder="Địa chỉ" value="<?php echo $_SESSION['login']['address'] ?>">
				              </div>
			              </div>
			              <div class="col-md-12">
			              	<div class="form-group">
			              		<textarea cols="30" rows="5" name="note" class="form-control" placeholder="Ghi chú"></textarea>
			              	</div>
			              </div>
			              <div class="col-md-6">
			              	<label>Phương thức thanh toán</label>
			              	<div class="form-group">
			              	<select class="form-control">
			              		<option value="">Nhận hàng rồi thanh toán (COD)</option>
			              	</select>
			              </div>
			          </div>
			              <div class="col-md-12">
			              <div class="form-group">
			              	<label>Tổng thanh toán: <?php echo number_format($totalPrice) ?></label>
			              </div>
			          </div>
			              
          					</div>
          				</div>
          					<div class="modal-footer">

          						<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
          						<input type="submit" class="btn btn-primary" value="Xác nhận đặt hàng" />
          					</div>
          				</div><!-- /.modal-content -->
          			</div><!-- /.modal-dialog -->
          		</div>
          		<?php } else { ?><!-- /.modal -->
          		<div id="myInvoices"  class="modal fade" tabindex="-1" role="dialog">
          			<div class="modal-dialog modal-lg" role="document">
          				<div class="modal-content">
          					<div class="modal-header">
          						<h4 class="modal-title">Thông tin đặt hàng</h4>
          						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          					</div>
          					<div class="modal-body">
							
          						<div class="row">
          						<div class="col-md-6">
				              <div class="form-group">
				                <input type="text" class="form-control" name="name" placeholder="Họ và tên" required>
				              </div>
			              </div>
			              <div class="col-md-6">
				              <div class="form-group">
				                <input type="text" class="form-control" name="phone" placeholder="Số điện thoại" required>
				              </div>
			              </div>
			              <div class="col-md-6">
				              <div class="form-group">
				                <input type="text" class="form-control" name="email" placeholder="Email" required>
				              </div>
			              </div>
			              <div class="col-md-6">
				              <div class="form-group">
				                <input type="text" class="form-control" name="address" placeholder="Địa chỉ nhận món" required>
				              </div>
			              </div>
			              <div class="col-md-12">
			              	<div class="form-group">
			              		<textarea cols="30" rows="5" name="note" class="form-control" placeholder="Ghi chú"></textarea>
			              	</div>
			              </div>
			              <div class="col-md-6">
			              	<label>Phương thức thanh toán</label>
			              	<div class="form-group">
			              	<select class="form-control">
			              		<option value="">Nhận hàng rồi thanh toán (COD)</option>
			              	</select>
			              </div>
			          </div>
			              <div class="col-md-12">
			              <div class="form-group">
			              	<label>Tổng thanh toán: <?php echo number_format($totalPrice) ?></label>
			              </div>
			          </div>
			              
          					</div>
          				</div>
          					<div class="modal-footer">

          						<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
          						<input type="submit" class="btn btn-primary" value="Xác nhận đặt hàng" />
          					</div>
          				</div><!-- /.modal-content -->
          			</div><!-- /.modal-dialog -->
          		</div><!-- /.modal -->
          	<?php } ?>
          		</form>
          		
          	</div>
          </div> <!-- .col-md-8 -->
        </div>
      </div>
    </section> <!-- .section -->

    <?php include_once './incfiles/footer.php'; ?>


  <?php include_once './incfiles/footer-asset.php'; ?>
	<script>
		$(document).ready(function(){
    		$(".quanlity").change(function(){
    			var newQuanlity = $(this).val();
    			var idProduct = $(this).attr("data-id");
    			var price = $(this).attr("data-price");
    			$.post("process_quanlity.php", {newQuanlity:newQuanlity, idProduct: idProduct, price: price}, function(data){
    				$("#quanlity"+idProduct).html(data);
    			});
    		});

    		$("#refresh").click(function(){
    			window.location.reload();
    		});

    		$("#xt-login").click(function(){
			var email = $('input[name="email"]').val();
			var password = $('input[name="password"]').val();
			$.post("post-login.php", {email: email, password: password}, function(data){
				$("#errLogin").html(data);
			});
		});
		$("#xt-signup").click(function(){
			var email = $('input[name="email2"]').val();
			var password = $('input[name="password2"]').val();
			var fullname = $('input[name="fullname2"]').val();
			$.post("post-signup.php", {email: email, password: password, fullname: fullname}, function(data){
				$("#errSignup").html(data);
			});
		});
    	});
	</script>
  </body>
</html>