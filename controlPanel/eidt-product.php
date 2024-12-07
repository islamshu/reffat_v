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
$id = $_GET['id'];
$sql = "Select * from products where product_id = $id";
$rs = $db->dbQuery($sql);
$row = $db->dbFetchRecord($rs);

if (isset($_POST['btnAdd'])) {
    $name = $_POST["name"];
    $description = $_POST["description"];
    $price = $_POST["price"];
    $decPrice = $_POST["decPrice"];
    $category_id = $_POST["category_id"];

    // Handle image upload
    if ($_FILES['image']['name']) {
        $image_name = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];
        $image_size = $_FILES['image']['size'];
        $image_type = $_FILES['image']['type'];
        $upload_dir = "../uploads/";
        $file_ext = strtolower(end(explode('.', $_FILES['image']['name'])));
        $extensions = array("jpeg", "jpg", "png");

        if (in_array($file_ext, $extensions) === false) {
            $err = "Extension not allowed, please choose a JPEG or PNG file.";
        } elseif ($image_size > 2097152) {
            $err = "File size must be less than 2 MB";
        } else {
            move_uploaded_file($image_tmp, $upload_dir . $image_name);
            $sql = "UPDATE `products` SET `name`='$name' ,`details`='$description' ,`price`=$price ,`dec`=$decPrice ,`image`='$image_name' ,`category_id`='$category_id' WHERE `product_id` = $id";
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
            echo "<meta http-equiv='refresh' content='3;URL=products.php'>";
        }
    } else {
        $sql = "UPDATE `products` SET `name`='$name' ,`details`='$description' ,`price`=$price ,`dec`=$decPrice ,`category_id`='$category_id' WHERE `product_id` = $id";
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
        echo "<meta http-equiv='refresh' content='3;URL=products.php'>";
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
                    <form class="form-horizontal" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="" style="display: block;text-align: center;">اسم المنتج </label>
                            <input type="text" class="form-control" name="name" value="<?= $row['name'] ?>"
                                   placeholder="اسم المنتج ">
                        </div>
                        <div class="form-group">
                            <label class="" style="display: block;text-align: center;">وصف المنتج</label>
                            <textarea class="form-control" name="description" id="description"
                                      rows="8" cols="80"><?= $row['details'] ?></textarea>
                        </div>
                        <div class="form-group">
                            <label class="" style="display: block;text-align: center;">اختر صورة المنتج</label>
                            <input type="file" class="form-control" id="images" name="image" onchange="preview_image();">
                            <img src="../uploads/<?= $row['image'] ?>" width="100px" alt="">
                        </div>
                        <div id="image_preview"></div>
                        <div class="form-group">
                            <label class="" style="display: block;text-align: center;">السعر</label>
                            <input type="text" class="form-control" name="price" value="<?= $row['price'] ?>"
                                   placeholder="السعر">
                        </div>
                        <div class="form-group">
                            <label class="" style="display: block;text-align: center;">الخصم</label>
                            <input type="text" class="form-control" name="decPrice" value="<?= $row['dec'] ?>"
                                   placeholder="السعر">
                        </div>
                        <div class="form-group">
                            <label class="" style="display: block;text-align: center;">اختيار التصنيف</label>
                            <select class="form-control input" name="category_id">
                                <option selected disabled>اختر التنصيف</option>
                                <?php
                                $query = "SELECT * FROM `maincategories`";
                                $result = $db->dbQuery($query);
                                if ($db->dbNumRows($result)) {
                                    $rows = $db->dbFetchResult($result);
                                    foreach ($rows as $rowg) {
                                        $id = $rowg[0]; ?>
                                        <optgroup label="<?= $rowg[1] ?>">
                                            <?php
                                            $query = "SELECT * FROM `subclasses` WHERE maincategories = $id";
                                            $result = $db->dbQuery($query);
                                            if ($db->dbNumRows($result)) {
                                                $rows = $db->dbFetchResult($result);
                                                foreach ($rows as $ro) { ?>
                                                    <option value="<?= $ro[0] ?>" <?php if ($row['category_id'] == $ro['id']) {
                                                        ?> selected
                                                    <?php } ?>><?= $ro[1] ?></option>
                                                <?php }
                                            } ?>
                                        </optgroup>
                                    <?php }
                                } ?>
                            </select>
                        </div>
                        <div class="form-group center">
                            <button type="submit" name="btnAdd" id="success-alert"
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
