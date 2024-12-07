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
     #image_preview{
       display: flex;
justify-content: center;
     }
     #image_preview img{
       width: 200px;
       height:150px;
     }
 </style>
 <?php


 $id = $_GET['id'];
 $sql = "Select * from subclasses where id = $id";
 $rs = $db->dbQuery($sql);
 $row = $db->dbFetchRecord($rs);
   if(isset($_POST['btnAdd'])){
     $title = $_POST['title'];
     $maincategories = $_POST['maincategories'];
     if ($_FILES['image']['name']) {
      $image_name = $_FILES['image']['name'];
      $image_tmp = $_FILES['image']['tmp_name'];
      $image_size = $_FILES['image']['size'];
      $image_type = $_FILES['image']['type'];
      $upload_dir = "../uploads/";
      $extensions = array("jpeg", "jpg", "png");
      move_uploaded_file($image_tmp, $upload_dir . $image_name);
      $sql = "UPDATE `subclasses` SET `title` = '$title', `maincategories` = '$maincategories',`image`='$image_name' WHERE `subclasses`.`id` = $id";
      $rs = $db->dbQuery($sql);

      $err = "تم التعديل بنجاح";

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
      echo "<meta http-equiv='refresh' content='3;URL=Subcategory.php'>";
  } else {
     
       $sql = "UPDATE `subclasses` SET `title` = '$title', `maincategories` = '$maincategories' WHERE `subclasses`.`id` = $id";
       $rs = $db->dbQuery($sql);

          $err = "تم التعديل بنجاح";


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
          echo "<meta http-equiv='refresh' content='3;URL=Subcategory.php'>";


   }
  }

 ?>

 <div class="row">
  <div class="col-sm-12">
    <div class="card-box">



      <h4 class="header-title m-t-0 m-b-30">تعديل منتج </h4>
      <div id="snackbar" class="">تم التعديل بنجاح</div>

      <div class="row" style="display: flex;justify-content: center;">
        <div class="col-lg-6">
          <form class="form-horizontal" method="post" enctype="multipart/form-data">
          <div class="form-group">
                            <label class="" style="display: block;text-align: center;">اختر صورة القسم</label>
                            <input type="file" class="form-control" id="images" name="image" onchange="preview_image();">
                            <img src="../uploads/<?= $row['image'] ?>" width="100px" alt="">
                        </div>
                        <div id="image_preview"></div>
                      <div class="form-group">
                          <label class="" style="display: block;text-align: center;">اسم التصنيف الفرعي</label>
                          <input type="text" class="form-control" value="<?= $row['title'] ?>"  name="title"  placeholder="اسم التصنيف الفرعي">
                      </div>
                       <div class="form-group">
                        <label class="" style="display: block;text-align: center;">اختيار التصنيف الرئيسي</label>
                          <select class="form-control input"  name="maincategories">
                            <option selected disabled>اختر التنصيف</option>
                            <?php

                            $query = "SELECT * FROM `maincategories`";
                            $result = $db->dbQuery($query);
                            if($db->dbNumRows( $result)){
                            $rows = $db->dbFetchResult($result);
                            foreach($rows as $ro){ ?>
                              <option value="<?= $ro[0] ?>" <?php if($row['maincategories'] == $ro['id']){ ?> selected style="background:red;" <?php }  ?>><?= $ro[1] ?></option>

                          <?php } } ?>
                         </select>
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
