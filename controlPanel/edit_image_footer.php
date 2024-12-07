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
 
 function preview_image() {
        var total_file = document.getElementById("images").files.length;
        for (var i = 0; i < total_file; i++) {
            var img = $('#image_preview').append("<img src='" + URL.createObjectURL(event.target.files[i]) + "' height='300px' width=' 540px'><br><br>");
            $(".btnsave").click(function () {
                $("img").addClass('d_none');
            });
        }
    }
 </script>

 <?php



$id = $_GET['id'];
$sql = "Select * from footer where id = $id";
$rs = $db->dbQuery($sql);
$row = $db->dbFetchRecord($rs);


   if(isset($_POST['btnAdd'])){
    $url = $_POST['url'];
    
     $image_name = '';
     if ($_FILES['image']['name']) {
     $image_name = $_FILES['image']['name'];
     $image_tmp = $_FILES['image']['tmp_name'];
     $image_size = $_FILES['image']['size'];
     $image_type = $_FILES['image']['type'];
     $upload_dir = "../uploads/";
     $file_ext = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));
     $extensions = array("jpeg", "jpg", "png"); 
     move_uploaded_file($image_tmp, $upload_dir . $image_name);
     
    $sql = "UPDATE `footer` SET `url`='$url',`image`='$image_name'  WHERE `id` = $id";
    $rs = $db->dbQuery($sql);
          $err = "تم الاضافة بنجاح";


    }
     




    $sql = "UPDATE `footer` SET `url`='$url'  WHERE `id` = $id";
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
          echo "<meta http-equiv='refresh' content='3;URL=images_index.php'>";


   }

 ?>

 <div class="row">
  <div class="col-sm-12">
    <div class="card-box">



      <h4 class="header-title m-t-0 m-b-30">اضافة صورة جديدة</h4>
      <div id="snackbar" class="">تم الاضافة بنجاح</div>

      <div class="row" style="display: flex;justify-content: center;">
        <div class="col-lg-6">
          <form class="form-horizontal" method="post" enctype="multipart/form-data">
                      
                      <div class="form-group">
                            <label class="" style="display: block;text-align: center;">اختر صورة </label>
                            <input type="file" class="form-control" required id="images" name="image" onchange="preview_image();">
                        </div>
                        <img src="../uploads/<?=$row['image']?>" width="60" height="60">
                        <div id="image_preview"></div>
                        <div class="form-group">
                            <label class="" style="display: block;text-align: center;">الرابط  </label>
                            <input type="text" class="form-control"  id="" value="<?=$row['url']?>" name="url" >
                        </div>
                     
                      <div class="form-group center" >
                        <button type="submit"  name="btnAdd" id="success-alert" class="btn btn-success btn-bordred waves-effect w-md waves-light m-b-5" >إضافة</button>

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
