<?php 
$path = "../";
require_once $path.$path.'library/db.php';
$search1 = $_POST['data1'];
$search2 = $_POST['data2'];
$search3 = $_POST['data3'];
$sql = "select * from invoices where id like '%$search1%' and created_date like '$search2%' and status like '$search3'";

$inv = getQr($sql, true);
$i =1;
foreach ($inv as $value) {
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
                      <?php echo $value['total_price'] ?>
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