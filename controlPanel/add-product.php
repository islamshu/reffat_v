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



   if(isset($_POST['btnAdd'])){
     $name = $_POST['name'];
     $description = $_POST['description'];
     $price = $_POST['price'];
     $decPrice = isset($_POST['decPrice']) ? $_POST['decPrice']: 0;
     $category_id = $_POST['category_id'];

    $file_name = $_FILES['main_image']['name'];
    $file_tmp = $_FILES['main_image']['tmp_name'];
    $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        
    $file_new_name = strval(time() + rand(1, 1000000000)) . ".$file_ext";
    $upload_path = '../uploads/' . $file_new_name;
    move_uploaded_file($file_tmp, $upload_path);

    $main_image = str_replace('../uploads', '', $upload_path);
    $ProductNum = rand();



          $sql = "INSERT INTO `products` (`name`, `details`, `image`, `price`, `dec`, `category_id`,`ProductNum`) VALUES ('$name', '$description', '$main_image', $price, $decPrice, $category_id,$ProductNum)";
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
          echo "<meta http-equiv='refresh' content='3;URL=products.php'>";


   }

 ?>

 <div class="row">
  <div class="col-sm-12">
    <div class="card-box">



      <h4 class="header-title m-t-0 m-b-30">اضافة منتج جديد</h4>
      <div id="snackbar" class="">تم الاضافة بنجاح</div>

      <div class="row" style="display: flex;justify-content: center;">
        <div class="col-lg-6">
          <form class="form-horizontal" method="post" enctype="multipart/form-data">
                      <div class="form-group">
                          <label class="" style="display: block;text-align: center;"> اسم المنتج </label>
                          <input type="text" class="form-control"  name="name"  placeholder="اسم المنتج">
                      </div>
                      <div class="form-group">
                          <div class="custom-file">
                            <label class="custom-file-label" style="display: block;text-align: center;" for="customFile">اختر صورة المنتج</label>
                             <input type="file" class="form-control custom-file-input" id="images" name="main_image" onchange="preview_image();" >
                             
                           </div>
                           <div id="image_preview"></div>

                        </div>
                      <div class="form-group">
                          <label class="" style="display: block;text-align: center;">وصف المنتج</label>
                          <textarea class="form-control" placeholder="الوصف ..." name="description" id="description" rows="8" cols="80"></textarea>
                      </div>
                      <div class="form-group">
                          <label class="" style="display: block;text-align: center;">السعر</label>
                          <input type="text" class="form-control"  name="price" placeholder="السعر">
                      </div>
                      <div class="form-group">
                          <label class="" style="display: block;text-align: center;">الخصم</label>
                          <input type="text" class="form-control"  name="decPrice" placeholder="الخصم">
                      </div>
                       <div class="form-group">
                           <label class="" style="display: block;text-align: center;">اختيار التصنيف</label>
                           <select class="form-control input"  name="category_id">
                             <option value="" selected disabled>اختر التصنيف</option>
                             <?php
                              $query = "SELECT * FROM `maincategories`";
                              $result = $db->dbQuery($query);
                              if($db->dbNumRows( $result)){
                              $rows = $db->dbFetchResult($result);
                              foreach($rows as $row){ 
                                $id = $row[0];?>
                                <optgroup label="<?= $row[1] ?>">
                                <?php
                                  $query = "SELECT * FROM `subclasses` WHERE maincategories = $id";
                                  $result = $db->dbQuery($query);
                                  if($db->dbNumRows( $result)){
                                  $rows = $db->dbFetchResult($result);
                                  foreach($rows as $row){ ?>
                                    <option value="<?= $row[0] ?>"><?= $row[1] ?></option>
                                    <?php } } ?>
                                  </optgroup>
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
