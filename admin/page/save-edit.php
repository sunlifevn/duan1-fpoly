<?php 
require_once '../../library/db.php';

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
	header('loation: ' . ADMIN_URL . 'page');
	die();
}
	$id = $_POST['id'];
	$name = trim($_POST['name']);
	$slug = trim($_POST['slug']);
	$desc = $_POST['desc'];
	$status = $_POST['status'];
	$updated_date = date('d-m-Y H:i:s');
	$image = $_FILES['image'];
	$page = 1;
	// kiểm tra tên có bị trùng hay ko
$sql = "select * from products where product_name = '$name'and id != $id";
$rs = getQr($sql);

if ($rs != false) {
	header('location: ' . ADMIN_URL . 'page/edit.php?id'.$id.'&errName=Tên sản phẩm đã tồn tại, vui lòng chọn tên khác');
	die();
}

	$sql = "update products
		set
			product_name = '$name',
 			slug = '$slug',
 			detail_info = '$desc',
 			updated_date = '$updated_date',
 			status = '$status',
 			page = '$page'
			";

 	if($image['size'] > 0){
	$path = $image['name'];
	$ext = pathinfo($path, PATHINFO_EXTENSION);
	// 2. tao filename moi
	$imageName = "images/pages/" . uniqid() . "." . $ext;
	// 3. luu file vao thu muc
	move_uploaded_file($image['tmp_name'], '../../' . $imageName);
	$sql .= ", thumbnail = '$imageName'";
}
$sql .= " where id = $id";
// echo $sql;
// die();
$sta = $pdo->prepare($sql);
// $sta->bindParam(':cate_id', $cate);
// $sta->bindParam(':page_name', $name);
// $sta->bindParam(':slug', $slug);
// $sta->bindParam(':desc', $desc);
// $sta->bindParam(':list_price', $listPrice);
// $sta->bindParam(':sell_price', $sellPrice);
// $sta->bindParam(':updated_date', $updated_date);
// $sta->bindParam(':status', $status);
// $sta->bindParam(':views', $view);
// $sta->bindParam(':id',$id);

// if ($image['size'] != 0) {
// 	$sta->bindParam(':image', $imageName);
// }
$sta->execute();
header('location: ' . ADMIN_URL . 'page');
die();
?>
