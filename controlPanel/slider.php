<?php
include "master.php";
?>
<script>
    function myFunction() {
        var x = document.getElementById("snackbar");
        x.className = "show";
        setTimeout(function () {
            x.className = x.className.replace("show", "");
        }, 3000);
    }

    $(document).ready(function () {
        $('form').ajaxForm(function () {
            alert("Uploaded Successfully");
            location.reload();

        });
    });

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
<style>
    #image_preview {
        display: flex;
        justify-content: center;
    }

    #image_preview img {
        width: 200px;
        height: 150px;
    }
</style>
<?php
$id = 1;
$sql = "Select * from image_slide where id = $id";
$rs = $db->dbQuery($sql);
$row = $db->dbFetchRecord($rs);

if (isset($_POST['btnAdddd'])) {
    $url = $_POST['url'];
    if($_FILES['image']['name']){
        $image_name = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];
        $image_size = $_FILES['image']['size'];
        $image_type = $_FILES['image']['type'];
        $upload_dir = "../uploads/";
        $file_ext = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));
        $extensions = array("jpeg", "jpg", "png");
        move_uploaded_file($image_tmp, $upload_dir . $image_name);
    
        // Handle image upload
        // die(json_encode(($_POST)));
        
            $sql = "UPDATE `image_slide` SET `image`='$image_name'  ,`url`='$url'
            WHERE `id` = 1";
    
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
          echo "<meta http-equiv='refresh' content='3;URL=slider.php'>";
        
    }else{

    // Handle image upload
    // die(json_encode(($_POST)));
    
        $sql = "UPDATE `image_slide` SET   `url`='$url'
        WHERE `id` = 1";

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
      echo "<meta http-equiv='refresh' content='3;URL=slider.php'>";
    
    }
    
}
?>

<div class="row">
    <div class="col-sm-12">
        <div class="card-box">
            <h4 class="header-title m-t-0 m-b-30">تعديل الصورة</h4>
            <div id="snackbar" class="">تم التعديل بنجاح</div>
            <div class="row" style="display: flex;justify-content: center;">
                <div class="col-lg-6">
                    <form class="form-horizontal" action="slider.php" method="post" enctype="multipart/form-data" >
                    <div class="form-group">
                            <label class="" style="display: block;text-align: center;">ضع الصورة  </label>
                            <input type="file" class="form-control" id="images" name="image" onchange="preview_image();">
                            <img src="../uploads/<?= $row['image'] ?>" width="100px" alt="">
                        </div>
                        <div id="image_preview"></div>
                        <div class="form-group">
                            <label class="" style="display: block;text-align: center;">رابط الصورة   </label>
                            <input type="text" class="form-control"  name="url" value="<?=$row['url']?>">
                        </div>




                        <div class="form-group center">
                            <button type="submit" name="btnAdddd" id="success-alert"
                                    class="btn btn-success btn-bordred waves-effect w-md waves-light m-b-5">تعديل
                            </button>
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
