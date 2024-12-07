<?php
include "master.php";
 ?>
 <div class="row">
     <div class="col-sm-12">
         <div class="card-box table-responsive">

       <h4 class="header-title m-t-0 m-b-30">الأقسام</h4>
            <a class="btn btn-info" href="add-categories.php">اضافة</a>
             <table id="datatable" class="table table-striped table-bordered" style="text-align: center;">
                 <thead>
                     <tr>
                         <th style="text-align: center;">#</th>
                         <th style="text-align: center;">الأسم</th>
                         <th style="text-align: center;">الإجراء</th>
                     </tr>
                 </thead>

                 <tbody>
                   <?php

                   $db = new Database();
                   $query = "SELECT * FROM `maincategories`";
                   $result = $db->dbQuery($query);
                   if($db->dbNumRows( $result)){
                   $rows = $db->dbFetchResult($result);
                   foreach($rows as $row){ ?>
                   <tr>
                     <th scope="row"> <?= $row[0]; ?></th>
                     <td> <?= $row['title']; ?></td>

                     <td>


                         <a href="eidt-categories.php?&id=<?= $row[0] ?>"><i class="fa fa-pencil-square-o"></i></a>
                         |  <a href="delete-categories.php?id=<?= $row[0] ?>" onclick="return confirm('هل انت متأكد !!');"><i class="fa fa-trash-o"></i></a>
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
