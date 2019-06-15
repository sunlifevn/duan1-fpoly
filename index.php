<?php session_start(); ?>
<?php require_once './library/db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<?php include_once './incfiles/header-asset.php'; ?>

<body>
	<?php include_once './incfiles/header.php'; ?>
	
	<!-- The Modal -->
	<?php include_once 'login.php'; ?>
	<!-- login website -->
	<?php include_once './incfiles/slider.php'; ?>
	<!-- Các dịch vụ điều hướng nhanh -->
	<?php include_once './incfiles/services.php'; ?>
	<!-- Top món yêu thích -->
	<?php include_once './incfiles/favorite.php'; ?>
	<!-- Các món mới -->
	<?php include_once './incfiles/newmenu.php'; ?>
	<!-- Đồ uống -->
	<?php include_once './incfiles/drink.php'; ?>
	<!-- Phản hồi của khách hàng -->
	<?php include_once './incfiles/feedback.php'; ?>
	<?php include_once './incfiles/partner.php'; ?>
	<?php include_once './incfiles/footer.php'; ?>
	<?php include_once './incfiles/footer-asset.php'; ?>
</body>
<script>
	$(document).ready(function(){
		$('.owl-carousel').owlCarousel({
          loop:false,
          margin:10,
          nav:false,
          responsive:{
          0:{
          items:5
          },
          600:{
          items:5
          },
          1000:{
          items:5
          }
          }
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
		$('#valueSearch').keyup(function(){
          var valueS = $('#valueSearch').val();
          $.post("ajax-search.php", {search: valueS}, function(data){
            $('#resultSearch').html(data);
          });
        });
		<?php 

    if (isset($_GET['success']) && $_GET['success'] == true) {
      ?>
      swal('Bạn đã đặt đơn hàng thành công<br>Hệ thống sẽ liên lạc cho bạn để xác nhận đơn hàng');
      <?php
    }
    ?>
	});
</script>

</html>