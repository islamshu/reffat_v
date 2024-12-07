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
$sql = "Select * from pages where id = $id";
$rs = $db->dbQuery($sql);
$row = $db->dbFetchRecord($rs);

if (isset($_POST['btnAdddd'])) {
    $confirm = $_POST["confirm"];
    $about_us = $_POST["about_us"];
    $return = $_POST["return"];
    $term = $_POST["term"];
    $ship = $_POST["ship"];
    $pay = $_POST["pay"];
    $safe = $_POST['safe'];

    // Handle image upload
    // die(json_encode(($_POST)));
    
        $sql = "UPDATE `pages` SET `confirm`='$confirm' ,`about_us`='$about_us',`term`='$term' ,`ship`='$ship',`pay`='$pay',`safe`='$safe'
        ,`return`='$return' 
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
      echo "<meta http-equiv='refresh' content='3;URL=pages.php'>";
    
}
?>

<div class="row">
    <div class="col-sm-12">
        <div class="card-box">
            <h4 class="header-title m-t-0 m-b-30">تعديل المنتج</h4>
            <div id="snackbar" class="">تم التعديل بنجاح</div>
            <div class="row" style="display: flex;justify-content: center;">
                <div class="col-lg-8">
                    <form class="form-horizontal" action="pages.php" method="post" >
                        
                        <div class="form-group">
                            <label class="" style="display: block;text-align: ;">صفحة الضمان والاستبدال</label>
                            
                        <textarea name="confirm" class="form-control ckeditor" id="" cols="30" rows="10"><?= $row['confirm'] ?></textarea>

                        </div>

                        <div class="form-group">
                            <label class="" style="display: block;text-align: ;">صفحة استرجاع الطلبات        </label>
                            
                        <textarea name="return" class="form-control ckeditor" id="elm1" cols="30" rows="10"><?= $row['return'] ?></textarea>

                        </div>


                        <div class="form-group">
                            <label class="" style="display: block;text-align: ;">صفحة من نحن        </label>
                            
                        <textarea name="about_us" class="form-control ckeditor" id="elm1" cols="30" rows="10"><?= $row['about_us'] ?></textarea>

                        </div>
                        <div class="form-group">
                            <label class="" style="display: block;text-align: ;">الشروط والاحكام          </label>
                            
                        <textarea name="term" class="form-control ckeditor" id="elm1" cols="30" rows="10"><?= $row['term'] ?></textarea>

                        </div>
                        <div class="form-group">
                            <label class="" style="display: block;text-align: ;">الشحن والتوصيل           </label>
                            
                        <textarea name="ship" class="form-control ckeditor" id="elm1" cols="30" rows="10"><?= $row['ship'] ?></textarea>

                        </div>
                        <div class="form-group">
                            <label class="" style="display: block;text-align: ;">طرق الدفع            </label>
                            
                        <textarea name="pay" class="form-control ckeditor" id="elm1" cols="30" rows="10"><?= $row['pay'] ?></textarea>

                        </div>
                        <div class="form-group">
                            <label class="" style="display: block;text-align: ;">خدمة الحماية الشاملة             </label>
                            
                        <textarea name="safe" class="form-control ckeditor" id="elm1" cols="30" rows="10"><?= $row['safe'] ?></textarea>

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
