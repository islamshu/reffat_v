<?php
include "master.php";
 ?>
 <script>
 function myFunction() {
 var x = document.getElementById("snackbar");
 // x.classList.add("show");
 x.className = "show";
 setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
 }
 </script>

 <?php


 $id = $_GET['id'];
 $sql = "DELETE FROM `products` WHERE product_id = $id";
 $rs = $db->dbQuery($sql);
$err = "تم الحذف بنجاح";


          echo '
              <script>
              $(document).ready(function(){
                $("#snackbar").addClass("show");
                      setTimeout(function(){
                       $("#snackbar").removeClass("show");
                         }, 3000);
            });
              </script>
          ';
          echo "<meta http-equiv='refresh' content='3;URL=products.php'>";



 ?>
<div id="snackbar" class="">تم الحذف بنجاح</div>