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

    $facebook = $_POST["facebook"];
    $instagram = $_POST["instagram"];
    $snapchat = $_POST["snapchat"];
    $tiktok = $_POST["tiktok"];
    $twitter = $_POST["twitter"];
    $whatsapp = $_POST["whatsapp"];

    $youtube = $_POST["youtube"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];

    

    
        $sql = "UPDATE `setting` SET `facebook`='$facebook'  
        ,`instagram`='$instagram' ,`twitter`='$twitter' ,`snapchat`='$snapchat' ,
        `youtube`='$youtube' ,`email`='$email' ,`phone`='$phone' , `tiktok`='$tiktok', `whatsapp`='$whatsapp'
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
      echo "<meta http-equiv='refresh' content='3;URL=soucal.php'>";
    
}
?>

<div class="row">
    <div class="col-sm-12">
        <div class="card-box">
            <h4 class="header-title m-t-0 m-b-30">تعديل المنتج</h4>
            <div id="snackbar" class="">تم التعديل بنجاح</div>
            <div class="row" style="display: flex;justify-content: center;">
                <div class="col-lg-6">
                    <form class="form-horizontal" action="soucal.php" method="post" enctype="multipart/form-data">
                        
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
