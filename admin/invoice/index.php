<?php 
$path = "../";
require_once $path.$path.'library/db.php';
$invoicesQr = "select * from invoices order by id desc ";
$invoices = getQr($invoicesQr, true);


?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Dashboard</title>
  <?php include_once $path.'incfiles/header_assets.php'; ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
    <?php include_once $path.'incfiles/header.php'; ?>
    <?php include_once $path.'incfiles/sidebar.php'; ?>

    <div class="content-wrapper">
      <section class="content-header">
        <h1>
          Danh sách hoá đơn
          <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Dashboard</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <!-- Write code here -->
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <br>
              <div class="row">
                <div class="col-md-12 text-center">
                <form action="#" class="form-inline">
                  <div class="input-group date">
                  <div class="input-group-addon">
                    #
                  </div>
                      <input type="text" class="form-control xt-search" name="a" placeholder="Tìm theo mã hoá đơn">
                    </div>
                      <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right xt-search" name="b" placeholder="11-11-2011">
                </div>
                 <div class="input-group date">

                      <select name="stt" id="stt" class="form-control xt-search">
                        <option value="0">Đang xử lý</option>
                        <option value="1">Đang giao hàng</option>
                        <option value="2">Đã thanh toán</option>
                      </select>
                    </div>
                    <div class="input-group date">

                     <a class="btn btn-success">Tìm kiếm</a>
                    </div>
                </form>
              </div>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <table class="table table-bordered">
                  <thead><tr>
                    <th>STT</th>
                    <th>ID đơn hàng</th>
                    <th>Họ và tên</th>
                    <th>Số điện thoại</th>
                    <th>Email</th>
                    <th>Địa chỉ</th>
                    <th>Ghi chú</th>
                    <th>Ngày đặt hàng</th>
                    <th>Trạng thái</th>
                  </tr>
                    </thead>
                    <tbody class="xt-innvoice">
                  
                  <?php
                  $i = 1; 
                  foreach ($invoices as $value) {
                   ?>
                   <tr>
                    <td><?php echo $i ?></td>
                    <td>#<?php echo $value['id'] ?></td>
                    <td><?php echo $value['customer_name'] ?></td>
                    <td>
                      <?php echo $value['customer_phone']?>
                    </td>
                    <td>
                      <?php echo $value['customer_email']?>
                    </td>
                    <td>
                      <?php echo $value['address'] ?>
                    </td>
                    <td>
                      <?php echo $value['note'] ?>
                    </td>
                    <td>
                      <?php echo $value['created_date'] ?>
                    </td>
                    <td>
                       <?php if ($value['status'] == 0) { ?>
                       <span class="bg-success">Đang xử lý</span>
                       <?php } else if($value['status'] == 1){ ?>
                       <span class="bg-danger">Đang giao hàng</span>
                       <?php } else { ?>
                       <span class="bg-primary">Đã thanh toán</span>
                       <?php } ?>
                         <a href="<?php echo ADMIN_URL?>invoice/edit_status.php?id=<?php echo $value['id']?>"
                    
                        >
                        <i class="fa fa-pencil"></i>
                      </a>                      
                    </td>
                    <td>
                      <a href="<?php echo ADMIN_URL?>invoice/detail_invoice.php?id=<?php echo $value['id']?>"
                        class="btn btn-xs btn-info"
                        >
                        Xem chi tiết
                      </a>
                    </td>
                  </tr>

                  <?php
                  $i++; 
                }
                ?>
                
              </tbody></table>

              <div id="loadMore"><div>
              
              
            </div>
            <!-- /.box-body -->
            
          </div>
        </div>
      </div>
<!-- <button class="btn btn-default mt-2" id="more">Xem thêm</button>
 -->    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include_once $path.'incfiles/footer.php'; ?>
  <?php include_once $path.'incfiles/footer_assets.php'; ?>

  <script>
      var dem = 1;
      $("#more").click(function(){
        dem += 1;
        $.get("paginate-ajax.php", {page: dem}, function(data){
          $("#loadMore").append(data);
        });
      });

      $('.btn-removeCate').click(function(){
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

    $(".xt-search").change(function(){
      $value1 = $('input[name="a"]').val();
      $value2 = $('input[name="b"]').val();
      $value3 = $("#stt").val();
      $.post("search.php", {data1: $value1, data2: $value2, data3: $value3}, function(data){
          $(".xt-innvoice").html(data);
      });
    });
    

  </script>
</body>
</html>
