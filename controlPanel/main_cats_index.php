<?php
include "master.php";
 ?>
 <div class="row">
     <div class="col-sm-12">
         <div class="card-box table-responsive">

       <h4 class="header-title m-t-0 m-b-30">القوائم الرئيسية</h4>
            <div>
            <a class="btn btn-info" href="hidden_links.php">الرجوع</a>

            </div>

            <a href="add_main_cat.php" class="btn btn-info">اضافة جديد</a>
             <table id="datatable" class="table table-striped table-bordered" style="text-align: center;">
                 <thead>
                     <tr>
                         <th style="text-align: center;">#</th>
                         <th style="text-align: center;">العنوان</th>
                         <th style="text-align: center;">الصورة</th>

                         <th style="text-align: center;">الإجراء</th>
                     </tr>
                 </thead>

                 <tbody>
                   <?php

                   $db = new Database();
                   $query = "SELECT * FROM `main_cat`";
                   $result = $db->dbQuery($query);
                   if($db->dbNumRows( $result)){
                   $rows = $db->dbFetchResult($result);
                   foreach($rows as $key =>$row){ ?>
                   <tr>
                     <th scope="row"> <?= $key ?></th>
                     <td> <?= $row[1]; ?></td>
                     <td> <img width="80" height="80" src="../uploads/<?= $row['image']; ?>"></td>

                     <td>


                         <a href="edit_main_cat.php?&id=<?= $row[0] ?>"><i class="fa fa-pencil-square-o"></i></a>
                         |  <a href="delete_main_cat.php?id=<?= $row[0] ?>" onclick="return confirm('هل انت متأكد !!');"><i class="fa fa-trash-o"></i></a>
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
