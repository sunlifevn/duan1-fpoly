<?php 
  $path = "../";
  require_once $path.$path.'library/db.php';
  $pageNumber = isset($_GET['page']) == true ? $_GET['page'] : 1;
  $pageSize  = 5;
    $offset = ($pageNumber-1)*$pageSize;
    //
  $sql = "select id from products";
  $sta = $pdo->prepare($sql);
  $sta->execute();
  $tong = $sta->rowCount();
  $listProductQr = "select p.*, c.cate_name as catename from products p JOIN categories c ON p.cate_id = c.id order by p.id desc limit $offset, $pageSize";
  $listProduct = getQr($listProductQr, true);
 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Dashboard</title>
    <?php include_once $path.'./incfiles/header_assets.php';; ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <?php include_once $path.'incfiles/header.php'; ?>
    <?php include_once $path.'incfiles/sidebar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
  <div class="row">
            <div class="col-xs-12">
              <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Sản phẩm</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tbody>
                  <tr class="bg-primary">
                  <th>#</th>
                  <th>Tên món</th>
                  <th>Chuyên mục</th>
                  <th>Giá bán</th>
                  <th>Giá km</th>
                  <th style="width: 240px">Ảnh</th>
                  <th>Tình trạng</th>
                  <th>Created date</th>
                  <th>Lượt xem</th>
                  <th>
                    <a href="<?= ADMIN_URL ?>product/add.php"
                      class="btn btn-xs btn-success"
                      >
                      <i class="fa fa-plus"></i> Thêm
                    </a>
                  </th>
                </tr>
                <?php 
                  foreach ($listProduct as $value) {
                 ?>
                <tr>
                  <td><?php echo $value['id'] ?></td>
                  <td><?php echo $value['product_name'] ?></td>
                  <td>
                      <?php echo $value['catename']?>
                    </td>
                   
                    <td>
                      <?php echo number_format($value['price']) ?>
                    </td>
                    <td>
                      <?php echo number_format($value['sale_price']) ?>
                    </td>
                    <td>
                      <img src="<?php echo SITE_URL . $value['thumbnail'] ?>" alt="" class="img-thumbnail" width="100%">
                    </td>
                    <td>
                      <?php if ($value['status'] == 1) {
                        echo "Bật";
                      } else {
                        echo "Tắt";
                      } ?>
                    </td>
                    <td>
                      <?php echo $value['created_date'] ?>
                    </td>
                    <td>
                      <?php echo $value['views'] ?>
                    </td>
                  <td>
                      <a href="<?php echo ADMIN_URL?>product/edit.php?id=<?php echo $value['id']?>"
                      class="btn btn-xs btn-info"
                      >
                        <i class="fa fa-pencil"></i>
                      </a>
                      <a href="javascript:;" linkurl="<?php echo ADMIN_URL?>product/remove.php?id=<?php echo $value['id']?>"
                      class="btn btn-xs btn-danger btn-removeProduct"
                      >
                        <i class="fa fa-trash-o"></i>
                      </a>
                    </td>
                </tr>
                <?php 
                  }
                 ?>
              </tbody></table>
            </div>
            <div class="paginate p-3"></div>
            
            <!-- /.box-body -->
            
          </div>
            </div>
          </div>          
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include_once $path.'incfiles/footer.php'; ?>

<!-- ./wrapper -->

<?php include_once $path.'incfiles/footer_assets.php'; ?>
<script type="text/javascript">
  <?php 
  
  if (isset($_GET['success']) && $_GET['success'] == true) {
    ?>
      swal('thêm thành công');
    <?php
  }
 ?>
    $(function() {
        $('.paginate').pagination({
            items: <?php echo $tong ?>,
            itemsOnPage: <?php echo $pageSize?>,
            currentPage: <?php echo $pageNumber?>,
            cssStyle: 'compact-theme',
            onPageClick: function(page){
              var url = '<?php echo SITE_URL . 'admin/product/index.php?' ?>';
          url+= `&page=${page}`;
          window.location.href = url;      
            }
        });
    });

    $('.btn-removeProduct').click(function(){
    swal({
  title: "Bạn có chắc muốn xoá?",
  text: "Sau khi xoá bạn sẽ không thể khôi phục lại?",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
    swal("Bạn đã xoá thành công!", {
      icon: "success",
    });
    window.location.href = $(this).attr('linkurl'); 
  } else {
    swal("Bạn đã huỷ xoá thành công!");
  }
});
  });
   </script>
</body>
</html>
