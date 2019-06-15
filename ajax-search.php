<?php 
  require_once 'library/db.php';

	  $search = trim($_POST['search']);
    $search = htmlspecialchars($search);

    if (!empty($search)) {
      
    $sql = "select id, product_name, thumbnail from products where product_name like '$search%' and status = 1 and page = 0 limit 10";
    $result = getQr($sql, true);
 
    if($result){
    foreach ($result as $value) {
      echo '<hr><p><img src="'. SITE_URL . $value['thumbnail'] . '" width="20%"> <a class="text-dark" href="' . SITE_URL . 'product.php?id='. $value['id'] . '" target=_blank>' . $value['product_name'] . '</a></p>';
  }
} else {
  echo '<i class="text-danger">Món ăn không tồn tại!</i>';
}
} else {
  echo "";
}
?>

