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
 $id = 2;
 $sql = "Select * from users where id = $id";
 $rs = $db->dbQuery($sql);
 $row_r = $db->dbFetchRecord($rs);


   if(isset($_POST['btnAdd'])){

     $Change_maeruf = $_POST['maeruf'];


        $sql = "UPDATE users SET maeruf='$Change_maeruf' WHERE `users`.`id` = $id";
        $rs = $db->dbQuery($sql);
        $err = "تم الاضافة بنجاح";


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
        echo "<meta http-equiv='refresh' content='3;URL=maeruf.php'>";






   }

 ?>
<style media="screen">
  .img{
    background: #333;
    display: block;
    width: 300px;
    margin: 0 auto;
  }
</style>
 <div class="row">
  <div class="col-sm-12">
    <div class="card-box">



      <h4 class="header-title m-t-0 m-b-30">نعديل معروف </h4>
      <div id="snackbar" class="">تم التعديل بنجاح </div>

      <div class="row" style="display: flex;justify-content: center;">
        <div class="col-lg-6">
          <form class="form-horizontal" method="post" enctype="multipart/form-data">

                      <h1 style="display: block;text-align: center;">معروف</h1>
                      <div class="form-group">
                          <label class="" style="display: block;text-align: center;">معروف</label>
                          <input dir="ltr" type="text" class="form-control" value="<?= $row_r['maeruf'] ?>"  name="maeruf" >
                      </div>
                      <div class="form-group center" >
                        <button type="submit"  name="btnAdd" id="success-alert" class="btn btn-success btn-bordred waves-effect w-md waves-light m-b-5" >تعديل</button>

                      </div>
                  </form>
        </div><!-- end col -->


      </div><!-- end row -->
    </div>
  </div><!-- end col -->
 </div>
 <!-- end row -->
<?php
include "footer.php";
 ?>