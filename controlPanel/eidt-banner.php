<?php
include "master.php";
 ?>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>

    <script>
        $(document).ready(function()
        {
        $('form').ajaxForm(function()
        {
        alert("Uploaded SuccessFully");
        });
        });
        function preview_image()
        {
        var total_file=document.getElementById("images").files.length;
        for(var i=0;i<total_file;i++)
        {
        var img = $('#image_preview').append("<img src='"+URL.createObjectURL(event.target.files[i])+"' height='300px' width=' 540px'><br><br>");
        $(".btnsave").click(function(){
            $("img").addClass('d_none');
        });
        }
        }
        function preview_image2()
        {
        var total_file=document.getElementById("images2").files.length;
        for(var i=0;i<total_file;i++)
        {
        var img = $('#image_preview2').append("<img src='"+URL.createObjectURL(event.target.files[i])+"' height='300px' width=' 540px'><br><br>");
        $(".btnsave").click(function(){
            $("img").addClass('d_none');
        });
        }
        }
        </script>
 <script>
 function myFunction() {
 var x = document.getElementById("snackbar");
 // x.classList.add("show");
 x.className = "show";
 setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
 }
 </script>
 <style>
     .d_none{
         display: none;
     }
     #image_preview2{
       display: flex;
justify-content: center;
     }
     #image_preview2 img{
       width: 200px;
       height:150px;
     }
 </style>
 <?php


 $id = $_GET['id'];
 $sql = "Select * from images where id = $id";
 $rs = $db->dbQuery($sql);
 $row = $db->dbFetchRecord($rs);
   if(isset($_POST['btnAdd'])){

    $file_name = $_FILES['image_out']['name'];
    $file_tmp = $_FILES['image_out']['tmp_name'];
    $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        
    $file_new_name = strval(time() + rand(1, 1000000000)) . ".$file_ext";
    $upload_path = '../assets/image/new/' . $file_new_name;
    move_uploaded_file($file_tmp, $upload_path);

    $image_in = str_replace('../assets/image/new/', '', $upload_path);

     if ($image_in != '') {
      $image_in = str_replace('../assets/image/new/', '', $upload_path);

       $sql = "UPDATE `images` SET `image` = '$image_in' WHERE `images`.`id` = $id";
       $rs = $db->dbQuery($sql);

     }
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
          echo "<meta http-equiv='refresh' content='3;URL=main_cats_index.php'>";


   }

 ?>

 <div class="row">
  <div class="col-sm-12">
    <div class="card-box">



      <h4 class="header-title m-t-0 m-b-30">تعديل البنر</h4>
      <div id="snackbar" class="">تم التعديل بنجاح</div>

      <div class="row" style="display: flex;justify-content: center;">
        <div class="col-lg-6">
          <form class="form-horizontal" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                          <div class="custom-file">
                            <label style="display: block;text-align: center;" for="customFile">اختر صورة البنر</label>
                             <input type="file" class="form-control" id="images" name="image_out" onchange="preview_image();" >
                             <img src="./uploads/<?= $row['image'] ?>" width="100px" alt="">
                           </div>
                           <div id="image_preview"></div>

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
 <script>
$(document).ready(function() {

});
// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>
<?php
include "footer.php";
 ?>
