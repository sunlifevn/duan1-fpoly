<?php 
	require_once '../../library/db.php';

	if ($_SERVER['REQUEST_METHOD'] != 'POST') {
		header('location: ' . ADMIN_URL . 'product');
		die();
	}
	
	$cate = $_POST['listCate'];
	$name = trim($_POST['name']);
	$slug = trim($_POST['slug']);
	$image = $_FILES['image'];
	$image2 = $_FILES['image2'];
	$image3 = $_FILES['image3'];
	$listPrice = $_POST['listPrice'];
	$salePrice = $_POST['salePrice'];
	$desc = $_POST['desc'];
	$created_date = date('d-m-Y H:i:s');
	$page = 0;
	$view = 0;
	$status = $_POST['status'];

	// kiểm tra tên có bị trùng hay ko
	$sql = "select * from products where product_name = '$name'";
	$rs = getQr($sql);

	if ($rs != false) {
		header('location: ' . ADMIN_URL . 'product/add.php?errName=Tên sản phẩm đã tồn tại, vui lòng chọn tên khác');
		die();
	}
	
	//lưu file vào thư mục trên server
	//lấy đuôi file
	$path = $image['name'];
	$ext = pathinfo($path, PATHINFO_EXTENSION);
	//tạo file mới
	$imageName = "images/products/" . uniqid() . "." . $ext;
	//Lưu file vào thư mục
	move_uploaded_file($image['tmp_name'], '../../' . $imageName);
	//lấy đuôi file
	$path2 = $image2['name'];
	$ext2 = pathinfo($path2, PATHINFO_EXTENSION);
	//tạo file mới
	$imageName2 = "images/products/" . uniqid() . "." . $ext2;
	//Lưu file vào thư mục
	move_uploaded_file($image2['tmp_name'], '../../' . $imageName2);
	//lấy đuôi file
	$path3 = $image3['name'];
	$ext3 = pathinfo($path3, PATHINFO_EXTENSION);
	//tạo file mới
	$imageName3 = "images/products/" . uniqid() . "." . $ext3;
	//Lưu file vào thư mục
	move_uploaded_file($image3['tmp_name'], '../../' . $imageName3);

	$sql = "insert into products (cate_id, product_name, slug, thumbnail, price, sale_price, detail_info, created_date, views, page, status
			) values (?,?,?,?,?,?,?,?,?,?,?)";

		$param = array($cate, $name, $slug, $imageName, $listPrice, $salePrice, $desc, $created_date, $view, $page, $status);
	$sta = $pdo->prepare($sql);
	$sta->execute($param);
        $sql2 = "select max(id) from products";
        $maxid = getQr($sql2);
        $idProGall = $maxid['max(id)'];
         $sql5 = "insert into product_galleries (product_id, image_url) values($idProGall, '$imageName')";
        getQr($sql5);
        $sql3 = "insert into product_galleries (product_id, image_url) values($idProGall, '$imageName2')";
        getQr($sql3);
        $sql4 = "insert into product_galleries (product_id, image_url) values($idProGall, '$imageName3')";
        getQr($sql4);

	header('location: ' . ADMIN_URL . 'product?success=true');
	die();

 ?>