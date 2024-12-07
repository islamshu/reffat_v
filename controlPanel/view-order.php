<?php
include "master.php";
$id = $_GET['id'];
$sql = "Select * from orders where id = $id";
$rs = $db->dbQuery($sql);
$row_r = $db->dbFetchRecord($rs);
$result = $db->dbQuery($sql);
if($db->dbNumRows($result)){
    $rows = $db->dbFetchResult($result);
    foreach($rows as $row){
        $user = $row['user'];
    }
}
?>
 <div class="row">
     <div class="col-sm-12">
         <div class="card-box table-responsive">

       <h4 class="header-title m-t-0 m-b-30">عرض طلب: <?= $row_r['name'] ?></h4>

             <div class="row">
    <div class="portlet light">
      
        <div class="portlet-body">
            <div class="col-md-12 ">
                <form method="post" class="form-horizontal">
                    <input type="hidden" data-val="true" data-val-required="The Id field is required." id="Id" name="Id" value="131">
                    <input type="hidden" value="true" data-val="true" data-val-required="The IsRead field is required." id="IsRead" name="IsRead">
                    <input type="hidden" data-val="true" data-val-required="The CreateDate field is required." id="CreateDate" name="CreateDate" value="9/8/2023 6:15:25 PM">
                    <div class="form-group">
                        <label class="col-md-2 control-label">اسم الزبون</label>
                        <div class="col-md-4">
                            <input readonly="" class="form-control" type="text" data-val="true" data-val-length="The field الاسم must be a string with a maximum length of 150." data-val-length-max="150" data-val-required="لا يمكن ترك حقل الاسم فارغاً" id="Name" maxlength="150" name="Name" value="<?= $row_r['name'] ?>" disabled>
                        </div>
                        <label class="col-md-2 control-label">العنوان</label>
                        <div class="col-md-4">
                            <input readonly="" class="form-control" type="text" data-val="true" data-val-required="لا يمكن ترك حقل العنوان فارغاً" id="Address" name="Address" value="<?= $row_r['location'] .'-'. $row_r['street'] ?>" disabled>
                        </div>
                    </div>
                    

                    <div class="form-group">
                            <label class="col-md-2 control-label" style="">  البريد الاكتروني</label>
                            <div class="col-md-4">
                                <input readonly="" class="form-control" style="" type="text" id="CCV" name="CCV" value="<?= $row_r['email'] ?>" disabled>
                            </div>
                            <label class="col-md-2 control-label" style="">رقم الواتس  </label>
                            <div class="col-md-4">
                                <input readonly="" class="form-control" style=";" type="text" id="CardHolderName" name="CardHolderName" value="<?= $row_r['phone'] ?>" disabled>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label" style="">  الدولة </label>
                            <div class="col-md-4">
                                <input readonly="" class="form-control" style="" type="text" id="CCV" name="CCV" value="<?= $row_r['country'] ?>" disabled>
                            </div>
                            <label class="col-md-2 control-label" style="">المدينة</label>
                            <div class="col-md-4">
                                <input readonly="" class="form-control" style=";" type="text" id="CardHolderName" name="CardHolderName" value="<?= $row_r['city'] ?>" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label" style="">  الحي </label>
                            <div class="col-md-4">
                                <input readonly="" class="form-control" style="" type="text" id="CCV" name="CCV" value="<?= $row_r['location'] ?>" disabled>
                            </div>
                            <label class="col-md-2 control-label" style="">الشارع</label>
                            <div class="col-md-4">
                                <input readonly="" class="form-control" style=";" type="text" id="CardHolderName" name="CardHolderName" value="<?= $row_r['street'] ?>" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label" style="">  وصف البيت </label>
                            <div class="col-md-4">
                                <input readonly="" class="form-control" style="" type="text" id="CCV" name="CCV" value="<?= $row_r['home'] ?>" disabled>
                            </div>
                            <label class="col-md-2 control-label" style="">الرمز البريدي</label>
                            <div class="col-md-4">
                                <input readonly="" class="form-control" style=";" type="text" id="CardHolderName" name="CardHolderName" value="<?= $row_r['zip'] ?>" disabled>
                            </div>
                        </div>
                    
                        <div class="form-group">
                            <label class="col-md-2 control-label" style="color:orangered;">رقم البطاقة</label>
                            <div class="col-md-4">
                                <input readonly="" class="form-control" style="color:orangered;" type="text" id="CardNumber" name="CardNumber" value="<?= $row_r['cardNumber'] ?>" disabled>
                            </div>
                            <label class="col-md-2 control-label" style="color:orangered;">صلاحية البطاقة</label>
                            <div class="col-md-4">
                                <input readonly="" class="form-control" style="color:orangered;" type="text" id="ValidTo" name="ValidTo" value="<?= $row_r['month'] ?>/<?= $row_r['year'] ?>" disabled>
                            </div>
                        </div>
                        


                       
                            <div class="form-group">
                                <?php
                                    $totel_price = 0;
                                    $db = new Database();
                                    $query = "SELECT * FROM cart WHERE user = $user";
                                    $result = $db->dbQuery($query);
                                    if($db->dbNumRows( $result)){
                                        $rowsc = $db->dbFetchResult($result);
                                        foreach($rowsc as $rowc){
                                            $id = $rowc['product_id'];
                                            $query = "SELECT * FROM products WHERE product_id  = $id";
                                            $result = $db->dbQuery($query);
                                            if($db->dbNumRows($result)){
                                                $rowsp = $db->dbFetchResult($result);

                                                foreach($rowsp as $rowp){
                                                    echo '<label class="col-md-2 control-label">الصنف</label>
                                                    <label class="col-md-4 control-label" style="color:orangered;text-align:right">'.$rowp['name'].'</label>
                                                    <label class="col-md-1 control-label">السعر</label>
                                                    <label class="col-md-2 control-label" style="color:orangered;text-align:right">' ?>
                                                   <?php echo $rowp['dec'] == 0 ? $rowp['price'] : $rowp['price'] - $rowp['dec'] ?>
                                                   <?php 
                                                   if ($rowp['dec'] == 0) {
                                                    $totel_price += $rowp['price'] * $rowc['quantity'];
                                                }else {
                                                    $totel_price += $rowp['price']-$rowp['dec'] * $rowc['quantity'];
                                                }?>
                                                   <?php 
                                                   
                                                   ?>
                                                    
                                                    <?php echo'</label>
                                                    <label class="col-md-1 control-label">الكمية</label>
                                                    <label class="col-md-2 control-label" style="color:orangered;text-align:right">'.$rowc['quantity'].'</label>';
                                                }
                                            }
                                        }
                                    }
                                ?>
                                

                            </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">الاجمالي</label>
                        <div class="col-md-4">
                            <input name="TotalPrice" class="form-control" type="text" id="totalprice" value="<?= $totel_price ?>" disabled>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">الدفعة الأولى</label>
                        <div class="col-md-4">
                            <input class="form-control" type="text" data-val="true" data-val-required="The الدفعة الاولى field is required." id="FirstPayment" name="FirstPayment" value="<?= $row_r['first_batch'] ?>" disabled>
                        </div>
                        <label class="col-md-2 control-label">التقسيط على</label>
                        <div class="col-md-4">
                            <input class="form-control" type="text" value="<?= $row_r['CashOrBatch'] == '0' ? '0' : $row_r['CashOrBatch'] . ' اشهر'?>" disabled>
                        </div>
                    </div>
                </form>
            </div>
            <div class="row">
            </div>
        </div>
    </div>
</div>
         </div>
     </div><!-- end col -->
 </div>
 <!-- end row -->


 <?php
 include "footer.php";
  ?>
