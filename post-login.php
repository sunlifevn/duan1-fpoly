<?php 
session_start();
require_once './library/db.php';
if($_SERVER['REQUEST_METHOD'] != 'POST'){
	header('location: '. SITE_URL);
	die;
}
$email = $_POST['email'];
$password = $_POST['password'];
$sql = "select * 
		from users 
		where email = '$email'
			";

$user = getQr($sql);
if(!$user || password_verify($password, $user['password']) == false){
	echo "<i>Tài khoản hoặc mật khẩu không chính xác!</i>";
	die;
}
$_SESSION['login'] = $user;


 ?>
  <script type="text/javascript">
 		window.location.href = '<?= SITE_URL ?>';
 </script>
