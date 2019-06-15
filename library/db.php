<?php 
	date_default_timezone_set('Asia/Ho_Chi_Minh');
	$host = "localhost";
	$db_name = "xuantienfoody";
	$db_username = "root";
	$db_pwd = "";
	try {
		$pdo = new PDO("mysql:host=$host;dbname=$db_name",$db_username,$db_pwd);
		$pdo->query("set names utf8");
		//echo "Kết nối thành công";
	} catch (Exception $e) {
		echo "Kết nối thất bại" . $e->getMessage();
	}
	define('SITE_URL', 'http://localhost/duan1/');
	define('SITE_URL_STYLE', 'http://localhost/duan1/styles/');
	define('ADMIN_URL', 'http://localhost/duan1/admin/');
	define('ADMIN_ASSET_URL', 'http://localhost/duan1/admin/adminlte/');

	const USER_ROLE = [
		"Admin" => 9,
		"Moderator" => 7,
		"Member" => 1
	];

	function getQr($sql, $issAll = false){
		global $pdo;
		$sta = $pdo->prepare($sql);
		$sta->execute();
		if($issAll){
			return $sta->fetchAll();
		}
		return $sta->fetch();
	}
	function getSubcategory($parentId){
        $sql = "SELECT * FROM categories WHERE parent_id = $parentId";
        $getCate = getQr($sql);   
        foreach ($getCate as $value) {        
            echo '<ul>';
            echo '<li><a href="#" >'.$getCate['cate_name'].'</a></li>';
            getSubcategory($getCate['id']);         // *
            echo '</ul>';
        }   
    }

 ?>