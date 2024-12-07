<?php
include "master.php";
 ?>
 <div class="row">
     <div class="col-sm-12">
         <div class="card-box table-responsive">

       <h4 class="header-title m-t-0 m-b-30">الصور في الفوتر </h4>
            <a href="add_image_footer.php" class="btn btn-info">اضافة جديد</a>
            <div>
            <a class="btn btn-info" href="hidden_links.php">الرجوع</a>

            </div>
             <table id="datatable" class="table table-striped table-bordered" style="text-align: center;">
                 <thead>
                     <tr>
                         <th style="text-align: center;">#</th>
                         <th style="text-align: center;">الصورة</th>
                         <th style="text-align: center;">الإجراء</th>
                     </tr>
                 </thead>

                 <tbody>
                   <?php

                   $db = new Database();
                   $query = "SELECT * FROM `footer`";
                   $result = $db->dbQuery($query);
                   if($db->dbNumRows( $result)){
                   $rows = $db->dbFetchResult($result);
                   foreach($rows as $row){ ?>
                   <tr>
                     <th scope="row"> <?= $row[0]; ?></th>

                     <td> <img width="80" height="80" src="../uploads/<?= $row['image']; ?>"></td>
                     <td>


                    <a href="edit_image_footer.php?id=<?= $row[0] ?>"><i class="fa fa-pencil-square-o"></i></a>
                         |  <a href="delete_footer.php?id=<?= $row[0] ?>" onclick="return confirm('هل انت متأكد !!');"><i class="fa fa-trash-o"></i></a>
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
