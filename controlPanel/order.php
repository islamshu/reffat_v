<?php
include "master.php";
 ?>
 <div class="row">
     <div class="col-sm-12">
         <div class="card-box table-responsive">
         <div class="col-md-2 pull-right">
            <a href="delete-all-order.php" onclick="return confirm('هل انت متأكد !!');" class="btn btn-danger form-control text-white">حذف جميع الطلبات</a>
        </div>
       <h4 class="header-title m-t-0 m-b-30">الطلبات</h4>

             <table id="datatable" class="table table-striped table-bordered" style="text-align: center;">
                 <thead>
                     <tr>
                         <th style="text-align: center;">#</th>
                         <th style="text-align: center;">رقم الطلب</th>
                         <th style="text-align: center;">الأسم</th>
                         <th style="text-align: center;">واتساب</th>

                         <th style="text-align: center;">الاقساط</th>
                         <th style="text-align: center;">الدفعة</th>
                         <th style="text-align: center;">الحالة</th>
                     </tr>
                 </thead>

                 <tbody>
                   <?php

                   $db = new Database();
                   $query = "SELECT * FROM `orders`";
                   $result = $db->dbQuery($query);
                   if($db->dbNumRows( $result)){
                   $rows = $db->dbFetchResult($result);
                   foreach($rows as $row){ ?>
                   <tr>
                     <th scope="row"> <?= $row[0]; ?></th>
                     <td> <?= $row['user']; ?> </td>
                     <td> <?= $row['name']; ?> </td>
                     <td> <?= $row['phone']; ?> </td>
                     <td> <?= $row['CashOrBatch'] == 0 ? 'نقدا' : $row['CashOrBatch']; ?></td>
                     <td> <?= $row['first_batch'] ?></td>
                     <td>
                        <a class="btn btn-xs btn-success text-white" href="view-order.php?&id=<?= $row[0] ?>"><i class="fa fa-eye fa-fw"></i> عرض الطلب</a>
                        <a class="btn btn-xs btn-warning text-white" href="invoice.php?&id=<?= $row['user'] ?>"><i class="fa fa-eye fa-fw"></i> فاتورة </a>
                        <a class="btn btn-xs btn-warning text-white" href="Installment.php?&id=<?= $row['user'] ?>"><i class="fa fa-eye fa-fw"></i> عقد التقسيط </a>
                        <a class="btn btn-xs btn-danger text-white" href="delete-order.php?id=<?= $row[0] ?>" onclick="return confirm('هل انت متأكد !!');"><i class="fa fa-trash-o"></i></a>
                        </td>
                     </tr>
                   <?php } } ?>


                 </tbody>
             </table>
         </div>
     </div><!-- end col -->
 </div>
 <!-- end row -->


 <?php
 include "footer.php";
  ?>
