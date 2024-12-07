<?php
include "master.php";
 ?>


        
           <div class="row">

               <div class="col-lg-3 col-md-6">
               <div class="card-box center">
                 <h4 class="header-title m-t-0 m-b-30">المستخدمين</h4>
                           <div class="widget-detail-1">
                             <?php
                             $query2 = "SELECT * FROM `users` ";
                             $res2 = $db->dbQuery($query2);
                             $row2 = $db->dbFetchRecord($res2);
                              ?>
                               <h2 class="p-t-10 m-b-0"> <?= $db->dbNumRows( $res2) ?> </h2>
                               <p class="text-muted">عدد المستخدمين</p>
                           </div>
               </div>
               </div><!-- end col -->

               <div class="col-lg-3 col-md-6">
               <div class="card-box center">
                 <h4 class="header-title m-t-0 m-b-30">المنتجات</h4>
                           <div class="widget-detail-1">
                             <?php
                             $query2 = "SELECT * FROM `products` ";
                             $res2 = $db->dbQuery($query2);
                             $row2 = $db->dbFetchRecord($res2);
                              ?>
                               <h2 class="p-t-10 m-b-0"> <?= $db->dbNumRows( $res2) ?> </h2>
                               <p class="text-muted">عدد المنتجات</p>
                           </div>
               </div>
               </div><!-- end col -->

               <div class="col-lg-3 col-md-6">
               <div class="card-box center">
                 <h4 class="header-title m-t-0 m-b-30">السلايدر</h4>
                           <div class="widget-detail-1">
                             <?php
                             $query2 = "SELECT * FROM `images`";
                             $res2 = $db->dbQuery($query2);
                             $row2 = $db->dbFetchRecord($res2);
                              ?>
                               <h2 class="p-t-10 m-b-0"> <?= $db->dbNumRows( $res2) ?> </h2>
                               <p class="text-muted">عدد السلايدر</p>
                           </div>
               </div>
               </div><!-- end col -->

           </div>
           <!-- end row -->







 <?php
 include "footer.php";
  ?>
