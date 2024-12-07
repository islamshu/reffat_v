<?php
include "master.php";
 ?>
 <div class="row">
     <div class="col-sm-12">
         <div class="card-box table-responsive">

       <h4 class="header-title m-t-0 m-b-30">الأقسام</h4>
       <a href="add-Subcategory.php" class="btn btn-info">اضافة تصنيف جديد</a>
             <table id="datatable" class="table table-striped table-bordered" style="text-align: center;">
                 <thead>
                     <tr>
                         <th style="text-align: center;">#</th>
                         <th style="text-align: center;">الأسم</th>
                         <th style="text-align: center;">اظهار بالصفحة الرئيسية</th>
                         <th style="text-align: center;">صورة القسم  </th>

                         <th style="text-align: center;">الإجراء</th>
                     </tr>
                 </thead>

                 <tbody>
                   <?php

                   $db = new Database();
                   $query = "SELECT * FROM `subclasses`";
                   $result = $db->dbQuery($query);
                   if($db->dbNumRows( $result)){
                   $rows = $db->dbFetchResult($result);
                   foreach($rows as $row){ ?>
                   <tr>
                     <th scope="row"> <?= $row[0]; ?></th>
                     <td> <?= $row[1]; ?></td>
                     <td>
                        <input type="checkbox" data-id="<?= $row['id'] ?>" name="in_home" class="js-switch status-btn" <?= $row['statuss']  == 1 ? 'checked' : '' ?>>
                    </td>
                    <td><img src="../uploads/<?= $row['image']?>" width="60" height="60" alt=""></td>


                     <td>


                         <a href="eidt-Subcategory.php?&id=<?= $row[0] ?>"><i class="fa fa-pencil-square-o"></i></a>
                         |  <a href="delete-Subcategory.php?id=<?= $row[0] ?>" onclick="return confirm('هل انت متأكد !!');"><i class="fa fa-trash-o"></i></a>
                     </td>
                     </tr>
                   <?php } } ?>


                 </tbody>
             </table>
         </div>
     </div><!-- end col -->
 </div>
 <!-- end row -->


 <?php
 include "footer.php";
  ?>
  <script>
    $(document).ready(function() {
        $("#datatable").on("change", ".js-switch", function() {
            let status = $(this).prop('checked') === true ? 1 : 0;
            let cat_id = $(this).data('id');
            // alert(cat_id);
            $.ajax({
                type: "post",
                dataType: "json",
                url: 'update_status.php',
                data: {
                    'status': status,
                    'cat_id': cat_id
                },
                success: function(data) {
                    console.log(data.message);
                }
            });
        });
    });
</script>
