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
    
    function preview_image2() {
        var total_file = document.getElementById("images2").files.length;
        for (var i = 0; i < total_file; i++) {
            var img = $('#image_preview2').append("<img src='" + URL.createObjectURL(event.target.files[i]) + "' height='300px' width=' 540px'><br><br>");
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
$sql = "Select * from setting where id = $id";
$rs = $db->dbQuery($sql);
$row = $db->dbFetchRecord($rs);

if (isset($_POST['btnAdddd'])) {
    $website_name = $_POST["website_name"];
    $website_name_en = $_POST["website_name_en"];

    $primary_color = $_POST["primary_color"];
    $forgin_color = $_POST["forgin_color"];

    $facebook = $_POST["facebook"];
    $instagram = $_POST["instagram"];
    $snapchat = $_POST["snapchat"];
    $tiktok = $_POST["tiktok"];
    $twitter = $_POST["twitter"];
    $whatsapp = $_POST["whatsapp"];

    $youtube = $_POST["youtube"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $currancy = $_POST["currancy"];
    $batch = $_POST["batch"];
    $number_dareba = $_POST['number_dareba'];

    

    // Handle image upload
    // die(json_encode(($_POST)));
    if ($_FILES['image']['name'] && $_FILES['segnature']['name'] ) {
        $image_name = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];
        $image_size = $_FILES['image']['size'];
        $image_type = $_FILES['image']['type'];
        $upload_dir = "../uploads/";
        $file_ext = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));
        $extensions = array("jpeg", "jpg", "png");
        move_uploaded_file($image_tmp, $upload_dir . $image_name);


        $seg_name = $_FILES['segnature']['name'];
        $seg_tmp = $_FILES['segnature']['tmp_name'];
        $seg_size = $_FILES['segnature']['size'];
        $seg_type = $_FILES['segnature']['type'];
        $upload_dir_seg = "../uploads/";
        $file_ext_seg = strtolower(pathinfo($seg_name, PATHINFO_EXTENSION));
        $extensions_seg = array("jpeg", "jpg", "png");
        move_uploaded_file($seg_tmp, $upload_dir_seg . $seg_name);


        $sql = "UPDATE `setting` SET `website_name`='$website_name',`website_name_en`='$website_name_en' ,`primary_color`='$primary_color' 
        ,`forgin_color`='$forgin_color' ,`facebook`='$facebook' ,`web_logo`='$image_name',`segnature`='$seg_name' 
        ,`instagram`='$instagram' ,`twitter`='$twitter' ,`snapchat`='$snapchat' , `whatsapp`='$whatsapp' ,
        `youtube`='$youtube' ,`email`='$email' ,`phone`='$phone' , `tiktok`='$tiktok' ,`currancy`='$currancy',`batch`='$batch',`number_dareba`='$number_dareba'
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
        echo "<meta http-equiv='refresh' content='3;URL=setting.php'>";
    }elseif($_FILES['image']['name'] && !$_FILES['segnature']['name'] ){
        $image_name = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];
        $image_size = $_FILES['image']['size'];
        $image_type = $_FILES['image']['type'];
        $upload_dir = "../uploads/";
        $file_ext = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));
        $extensions = array("jpeg", "jpg", "png");
        move_uploaded_file($image_tmp, $upload_dir . $image_name);

        $sql = "UPDATE `setting` SET `website_name`='$website_name' ,`website_name_en`='$website_name_en',`primary_color`='$primary_color' 
        ,`forgin_color`='$forgin_color' ,`facebook`='$facebook' ,`web_logo`='$image_name' 
        ,`instagram`='$instagram' ,`twitter`='$twitter' ,`snapchat`='$snapchat' ,`whatsapp`='$whatsapp' ,
        `youtube`='$youtube' ,`email`='$email' ,`phone`='$phone' , `tiktok`='$tiktok' ,`currancy`='$currancy',`batch`='$batch',`number_dareba`='$number_dareba'
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
        echo "<meta http-equiv='refresh' content='3;URL=setting.php'>";
    
}elseif(!$_FILES['image']['name'] && $_FILES['segnature']['name'] ){
    $seg_name = $_FILES['segnature']['name'];
        $seg_tmp = $_FILES['segnature']['tmp_name'];
        $seg_size = $_FILES['segnature']['size'];
        $seg_type = $_FILES['segnature']['type'];
        $upload_dir_seg = "../uploads/";
        $file_ext_seg = strtolower(pathinfo($seg_name, PATHINFO_EXTENSION));
        $extensions_seg = array("jpeg", "jpg", "png");
        move_uploaded_file($seg_tmp, $upload_dir_seg . $seg_name);


    $sql = "UPDATE `setting` SET `website_name`='$website_name',`website_name_en`='$website_name_en' ,`primary_color`='$primary_color' 
    ,`forgin_color`='$forgin_color' ,`facebook`='$facebook' ,`segnature`='$seg_name' 
    ,`instagram`='$instagram' ,`twitter`='$twitter' ,`snapchat`='$snapchat' ,`whatsapp`='$whatsapp' ,
    `youtube`='$youtube' ,`email`='$email' ,`phone`='$phone' , `tiktok`='$tiktok' ,`currancy`='$currancy',`batch`='$batch',`number_dareba`='$number_dareba'
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
    echo "<meta http-equiv='refresh' content='3;URL=setting.php'>";
}
     else {
        $sql = "UPDATE `setting` SET `website_name`='$website_name' ,`website_name_en`='$website_name_en' ,`primary_color`='$primary_color' 
        ,`forgin_color`='$forgin_color' ,`facebook`='$facebook'  
        ,`instagram`='$instagram' ,`twitter`='$twitter' ,`snapchat`='$snapchat' ,`whatsapp`='$whatsapp' ,
        `youtube`='$youtube' ,`email`='$email' ,`phone`='$phone' , `tiktok`='$tiktok',`currancy`='$currancy',`batch`='$batch',`number_dareba`='$number_dareba'
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
      echo "<meta http-equiv='refresh' content='3;URL=setting.php'>";
    }
}
?>

<div class="row">
    <div class="col-sm-12">
        <div class="card-box">
            <h4 class="header-title m-t-0 m-b-30">تعديل المنتج</h4>
            <div id="snackbar" class="">تم التعديل بنجاح</div>
            <div class="row" style="display: flex;justify-content: center;">
                <div class="col-lg-6">
                    <form class="form-horizontal" action="setting.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="" style="display: block;text-align: center;">اسم الموقع بالعربية </label>
                            <input type="text" class="form-control" name="website_name" value="<?= $row['website_name'] ?>"
                                   placeholder="اسم الموقع">
                        </div>
                        <div class="form-group">
                            <label class="" style="display: block;text-align: center;">اسم الموقع بالانجليزية </label>
                            <input type="text" class="form-control" name="website_name_en" value="<?= $row['website_name_en'] ?>"
                                   placeholder="اسم الموقع">
                        </div>
                        <div class="form-group">
                            <label class="" style="display: block;text-align: center;">اختر صورة الموقع</label>
                            <input type="file" class="form-control" id="images" name="image" onchange="preview_image();">
                            <img src="../uploads/<?= $row['web_logo'] ?>" width="100px" alt="">
                        </div>
                        <div id="image_preview"></div>

                        <div class="form-group">
                            <label class="" style="display: block;text-align: center;">اختر صورة الختم</label>
                            <input type="file" class="form-control" id="images2" name="segnature" onchange="preview_image2();">
                            <img src="../uploads/<?= $row['segnature'] ?>" width="100px" alt="">
                        </div>
                        <div id="image_preview2"></div>
                        <div class="form-group">
                            <label class="" style="display: block;text-align: center;">اللون الاساسي</label>
                            <input type="color" class="form-control" name="primary_color" value="<?= $row['primary_color'] ?>"
                                   placeholder="primary_color">
                        </div>
                        <div class="form-group">
                            <label class="" style="display: block;text-align: center;">اللون الفرعي</label>
                            <input type="color" class="form-control" name="forgin_color" value="<?= $row['forgin_color'] ?>"
                                   placeholder="primary_color">
                        </div>
                        <div class="form-group">
                            <label class="" style="display: block;text-align: center;">ٌقيمة الدفعة الاولى </label>
                            <input type="text" class="form-control" name="batch" value="<?= $row['batch'] ?>"
                                   placeholder="batch">
                        </div>
                        <div class="form-group">
                            <label class="" style="display: block;text-align: center;">رابط الفيسبوك</label>
                            <input type="text" class="form-control" name="facebook" value="<?= $row['facebook'] ?>"
                                   placeholder="الفيس بوك">
                        </div>

                        <div class="form-group">
                            <label class="" style="display: block;text-align: center;">رابط تويتر</label>
                            <input type="text" class="form-control" name="twitter" value="<?= $row['twitter'] ?>"
                                   placeholder="تويتر ">
                        </div>
                        <div class="form-group">
                            <label class="" style="display: block;text-align: center;">الرقم الضريبي </label>
                            <input type="text" class="form-control" name="number_dareba" value="<?= $row['number_dareba'] ?>"
                                   placeholder="الرقم الضريبي">
                        </div>

                        

                        <div class="form-group">
                            <label class="" style="display: block;text-align: center;">العملة </label>
                            <select name="currancy" class="form-control" id="">
                                <option value="ر.س" <?php if($row['currancy'] == 'ر.س') { ?> selected <?php  } ?> >ريال سعودي</option>
                                <option value="$" <?php if($row['currancy'] == '$') { ?> selected <?php } ?>>دولار امريكي</option>
                                <option value="د.إ" <?php if($row['currancy'] == 'د.إ') { ?> selected <?php } ?>>درهم إماراتي</option>
                            
                            </select>
                            
                        </div>
                        <div class="form-group">
                            <label class="" style="display: block;text-align: center;">رابط سناب شات</label>
                            <input type="text" class="form-control" name="snapchat" value="<?= $row['snapchat'] ?>"
                                   placeholder="سناب شات ">
                        </div>
                        <div class="form-group">
                            <label class="" style="display: block;text-align: center;">رابط يوتيوب</label>
                            <input type="text" class="form-control" name="youtube" value="<?= $row['youtube'] ?>"
                                   placeholder="يوتيوب ">
                        </div>
                        <div class="form-group">
                            <label class="" style="display: block;text-align: center;">رابط انستقرام</label>
                            <input type="text" class="form-control" name="instagram" value="<?= $row['instagram'] ?>"
                                   placeholder="انستقرام">
                        </div>
                        <div class="form-group">
                            <label class="" style="display: block;text-align: center;">رابط نيك توك</label>
                            <input type="text" class="form-control" name="tiktok" value="<?= $row['tiktok'] ?>"
                                   placeholder="تيك توك ">
                        </div>

                        <div class="form-group">
                            <label class="" style="display: block;text-align: center;">رقم الواتس اب  </label>
                            <input type="text" class="form-control" name="whatsapp" value="<?= $row['whatsapp'] ?>"
                                   placeholder="الواتس اب">
                        </div>

                        <div class="form-group">
                            <label class="" style="display: block;text-align: center;">البريد الاكتروني الخاص بالموقع    </label>
                            <input type="text" class="form-control" name="email" value="<?= $row['email'] ?>"
                                   placeholder="البريد الاكتورني">
                        </div>

                        <div class="form-group">
                            <label class="" style="display: block;text-align: center;">رقم الهاتف  الخاص بالموقع    </label>
                            <input type="text" class="form-control" name="phone" value="<?= $row['phone'] ?>"
                                   placeholder="رقم الهاتف ">
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