<?php
include 'controlPanel/Database.php';
$db = new Database();
$totalPrice = $_GET['totalPrice'];
$query = "SELECT * FROM `users` WHERE id = 2";
$result = $db->dbQuery($query);

if ($db->dbNumRows($result)) {
    $rows = $db->dbFetchResult($result);
    foreach ($rows as $row) {
        $token = $row['token'];
        $tokenID = $row['tokenID'];
    }
}

if (!isset($_SESSION["user"])) {
    header("location:index.php");
}
// Access the session variables
$name = isset($_SESSION["name"]) ? $_SESSION["name"] : "Not set";
$email = isset($_SESSION["email"]) ? $_SESSION["email"] : "Not set";
$phone = isset($_SESSION["phone"]) ? $_SESSION["phone"] : "Not set";
$address = isset($_SESSION["address"]) ? $_SESSION["address"] : "Not set";
$payment_method = isset($_SESSION["payment_method"]) ? $_SESSION["payment_method"] : "Not set";
$first_payment = isset($_SESSION["first_payment"]) ? $_SESSION["first_payment"] : "Not set";
$installment_by = isset($_SESSION["installment_by"]) ? $_SESSION["installment_by"] : "Not set";



?>
<html lang="ar" dir="rtl">

<head>
 <?php include "head.php";
    $userrr = $_SESSION["user"];
    $carts = "SELECT * FROM `cart` WHERE `user` = $userrr";
    $result_cart = $db->dbQuery($carts);

    $cart_count = $db->dbNumRows($result_cart);
    if($db->dbNumRows( $result)){
        $quantity = 0;
        $rows = $db->dbFetchResult($result);
        foreach($rows as $row){ 
            $quantity = $quantity+ $row["quantity"];
        }
    }
    $cart_count = $quantity;
    
    ?>
</head>

<body style="overflow: auto;background-color:#f3f3f3" data-new-gr-c-s-check-loaded="14.1125.0" data-gr-ext-installed="">


    <div class="loaderk d-flex justify-content-center align-items-center" style="display: none; height: 0px;">
    </div>
    <main>
        <section class="mt-5 py-3">
        </section>
        <div class="container col-md-7 " style="border-radius:5px;">
            <div class="mt-3 pb-3 border-bottom pay-header">
               

            <div class="hide">
            <div class="d-flex " style="padding: 15px;">
            <div class="store-info__logo me-3">
                    <img src="uploads/<?= $db->get_setting('web_logo')?>" class="" style="display: inline-block;" width="60" alt="">

                </div>
                <div class="">
                    <h6>مرحباً بك</h6>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb pt-md-0 pt-2">
                            <li class="breadcrumb-item"><a href="index.php" class="text-decoration text-black-50">الرئيسية</a></li>
                            <li class="breadcrumb-item"><a href="order.php" class="text-decoration text-black-50">سلة المشتريات</a></li>
                            <li class="breadcrumb-item active text-black" aria-current="page">انهاء الطلب</li>
                        </ol>
                    </nav>
                </div>
            </div>


                <div class="d-none" id="bill-box" style="padding: 15px;">
                    <div  class="d-flex justify-content-between mt-4">
                        <span>ملخص السلة</span>
                        <span><?= $totalPrice?> <span><?php $db->get_setting('currancy') ?></span></span>
                    </div>
                </div>



                <div class="line">

                </div>


                <div class="d-flex justify-content-between mt-4 " style="padding: 15px;">
                    <span>اجمالي الطلب</span>
                    <div class="">
                    <span class="d-block text-end"> <?= $totalPrice?> <span><?php $db->get_setting('currancy') ?></span>
                    <a href="" class="text-danger d-block" style="font-size: 12px;">لديك كوبون تخفيض ؟</a>
                    </div>
                </div>
            </div>



                <div class="btn-box">
                <a href="" id="bill-btn" class="text-black btn m-auto pill-btn">  <i class="fa-solid fa-chevron-down d-none" id='down'></i>  <i class="fa-solid fa-chevron-up" id="up"></i> تفاصيل الفاتورة </a>

                </div>



            </div>
            <div class="sections-wrapper">
            
                <div class="container mb-5">
                    <!--  ****************************form*****************************S -->
                    <form action="send_pay.php?totalPrice=<?= $totalPrice ?>" method="POST" class="pb-2">

                        <div class="row">














                            <!--Moo-->

                            <div class="d-flex justify-content-start  mb-3 mt-3">

                                <div class="d-flex ">
                                    <span class="me-2" style="width:43px;height:43px;border-radius:50%;background-color:#00a8ff;color:white;display:flex;justify-content:center;align-items:center"><i class="fa-solid fa-money-bill"></i></span>
                                    <!-- <img src="assets/image/icons/truck.png" class="mx-3 me-2" width="40" alt=""> -->
                                    <div class="">
                                    <h6 style="margin-bottom: 0;">طريقة الدفع</h6>
                                    <span class="pay-name">فيزا</span>
                                    </div>
                                </div>
                               
                                <!-- <hr class="mx-2 w-100"> -->
                            </div>

                            <div class="form-floating mb-10">
                                <!-- <i class="fas fa-circle fa-fw text-success fa-xl opacity-75"></i> -->
                                <!-- <img src="assets/image/icons/step-payment.svg" class="mx-3" alt=""> -->
                                <!-- <span>طريقة الدفع</span> -->
                                <!-- <hr class="mx-2" style="width: 60%;"> -->

                                <!-- <div class="row align-items-center mb-4">
                        <div class="col-6 mb-2">
                            <button class="btn btn-light py-2 border bg-white w-100 btn-lg shadow-sm">
                                <img src="assets/image/icons/mada.webp" class="w-50 mx-auto" height="50" alt="">
                            </button>
                        </div>
                        <div class="col-6 mb-2">
                            <button class="btn btn-light py-2 border bg-white w-100 btn-lg shadow-sm">
                                <img src="assets/image/icons/visa.png" class="w-50 mx-auto" height="50" alt="">
                            </button>
                        </div>
                        <div class="col-12">
                            <a href="success.php" class="btn btn-light bg-white py-2 border w-100 btn-lg shadow-sm">
                                <span class="bg-danger rounded-circle p-1">
                                    <i class="fa-solid fa-building-columns fa-fw "></i>
                                </span>
                                <h6 class="text-dark" style="font-size: 14px;">تحويل بنكي</h6>
                            </a>
                        </div>
                    </div>
                    <h3 class="my-3 text-center">
                        الدفعة المستحقة : <span class="text-danger"><?= $totalPrice ?> <?= $db->get_setting('currancy') ?></span>
                    </h3> -->
                            </div>
                        </div>







                        <div class="mb-3 pay-ways">
                            <!-- <label class="mb-3 mx-1">طريقة الدفع</label> -->
                            <?php  if($payment_method == 'installment' || $payment_method == 'all' ) { ?> 

                            <div class="row px-3 justify-content-center justify-content-lg-start">
                                <div class="form-check col-6 col-lg-2 col-md-3   border rounded  py-1 m-1 p-1 d-flex align-items-center justify-content-center">
                                    <input class="form-check-input me-2" required type="radio" value="visa" name="paymentWay" id="visa">
                                    <label class="form-check-label  text-center  " for="visa">
                                        <img src="assets/image/icons/visa.png" width="65" height="35" class="mx-1" alt="">
                                    </label>
                                </div>

                                <div class="form-check col-6 col-lg-2 col-md-3   border rounded  py-1 m-1 p-1 d-flex align-items-center justify-content-center">
                                    <input class="form-check-input me-2" required type="radio" value="mastercard" name="paymentWay" id="mastercard">
                                    <label class="form-check-label  text-center  " for="mastercard">
                                        <img src="assets/image/icons/mastercard.png" width="65" height="35" class="mx-1" alt="">
                                    </label>
                                </div>
                                <?php } ?>

                                <?php  if($payment_method == 'tappy' || $payment_method == 'tamara') { ?> 
                                
                                                                <div class="form-check col-6 col-lg-2 col-md-3   border rounded  py-1 m-1 p-1 d-flex align-items-center justify-content-center">
                                    <input class="form-check-input me-2" required type="radio" value="tabby" name="paymentWay" id="tabby">
                                    <label class="form-check-label  text-center  " for="tabby">
                                        <img src="assets/image/icons/pay-option-tabby_en.png" width="65" height="30" class="mx-1" alt="">
                                    </label>
                                </div>

                                <div class="form-check col-6 col-lg-2 col-md-3   border rounded  py-1 m-1 p-1 d-flex align-items-center justify-content-center">
                                    <input class="form-check-input me-2" required type="radio" value="tmara" name="paymentWay" id="tmara">
                                    <label class="form-check-label  text-center  " for="tmara">
                                        <img src="assets/image/icons/tmara.png" width="65" height="35" class="mx-1" alt="">
                                    </label>
                                </div>
                                <?php } ?>

                                <input type="hidden" name="paymentt" id="paymentt" >




                                <!-- <div class="form-check col-4">
                                    <input class="form-check-input mt-3" type="radio" value="direct" name="paymentWay" id="flexRadioDefault2">
                                    <label class="form-check-label w-100 border text-center rounded py-2" for="flexRadioDefault2">
                                        <img src="assets/image/icons/trans.png" width="35" class="mx-1" alt="">
                                    </label>
                                </div> -->
                            </div>
                        </div>




                        <div class="" id="pay">

                        <p style="font-size: 14px;">في حالة اردت الشراء بالاقساط والاصناف المختارة تدعم الاقساط يرجى تحديد على كم قسط تريد التقسيط قبل تغيير الدفعة الاولى

                            </p>
                            <div class="row ">

                            
                            <div class="col-lg-12">
                                <input type="hidden" value="<?=$totalPrice?>" id="totalPrice">
                    <span class="mb-1 d-inline-block spanlable">الدفع/التقسيط على</span>
                    <select name="CashOrBatch" id="CashOrBatch" class="form-control rounded mb-3" id="">
                        <option value="0">نقدا</option>
                        <?php  if($payment_method == 'installment') { ?> 
                            <?php  
if ($payment_method == 'installment') { 
    for ($i = 1; $i <= 24; $i++) {
        // Check if the current value matches the session value
        $selected = ($i == $_SESSION["installment_by"]) ? 'selected' : '';
        echo "<option value=\"$i\" $selected>$i شهر</option>";
    }
}
?>
                        <?php } ?>

                    </select>


                    </div>

                    <?php  if($payment_method == 'installment') { ?> 
                    <div class="col-lg-12">
                    <span class="mb-1 d-inline-block spanlable">الدفعة الاولى</span>
                                        <input type="hidden" name="cart_count" id="cart_count" value="<?= $cart_count ?>">


                                        <?php
$firstBatchValue = ($payment_method == 'installment') ? $_SESSION["first_payment"] : $totalPrice;
?>

<input 
    type="text" 
    name="first_batch" 
    id="first_batch" 
    readonly 
    class="form-control rounded mb-3" 
    value="<?= htmlspecialchars($firstBatchValue, ENT_QUOTES, 'UTF-8') ?>" 
    autocomplete="off" 
    required 
    placeholder="الدفعة الأولى" 
    maxlength="16">
                    </div>
                    <div class="col-lg-12">
                    <span class="mb-1 d-inline-block spanlable">قيمة كل قسط </span>

                    <input type="text"  id="all_batch" readonly class="form-control rounded mb-3" value="<?php echo($_SESSION["monthly_payment"])?>"  autocomplete="off" required="" placeholder="قيمة كل قسط" maxlength="16">

                    </div>
                    <?php } ?>


                        <div class="col-lg-6">
                    <span class="mb-1 d-inline-block spanlable">الاسم على البطاقة</span>
                    <input type="text" class="form-control mb-3" name="card_name" id="name" autocomplete="off" placeholder="الأسم  على البطاقة">

                    <!-- <div class="form-floating mb-3">
                        <label for="cardname text-secondary">
                            <i class="fas fa-user fa-fw text-secondary mx-2"></i>
                            <span class="text-secondary">اسم حامل البطاقة</span>
                        </label>
                    </div> -->
                    </div> 


                                <div class="col-lg-6">
                    <span class="mb-1 d-inline-block spanlable">رقم البطاقة</span>

                    <input type="text" name="card_number"  class="form-control rounded mb-3" id="cardNumber" autocomplete="off"  placeholder="رقم البطاقة" maxlength="16">

     
                    </div>
                                <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="container">
                                <span class="mb-1 d-inline-block spanlable">تاريخ الانتهاء</span>

                                    <div class="row border rounded" style="overflow: hidden;">

                                        <div class="col-6 px-0 mx-0">
                                        <input type="text" class="form-control border-0" maxlength="2" name="month"  id="month" placeholder="الشهر">

                                            <!-- <div class="form-floating">
                                                <label for="floatingInput text-secondary">
                                                    <span class="text-secondary">الشهر</span>
                                                </label>
                                            </div> -->
                                        </div>
                                        <div class="col-6  px-0 mx-0">
                                        <input type="text" class="form-control border border-right-0 border-top-0 border-left border-bottom-0 rounded-0" maxlength="2" name="year" id="year" placeholder="السنة">

                                            <!-- <div class="form-floating">
                                                <label for="year text-secondary">
                                                    <span class="text-secondary">السنة</span>
                                                </label>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6">

                            <span class="mb-1 d-inline-block spanlable">رمز التحقق (cvc)</span>
                            <input type="text" class="form-control" maxlength="3" name="cvc" id="cvc" placeholder="رمز التحقق (cvc)">

                                <!-- <div class="form-floating mb-3">
                                    <label for="cvc text-secondary">
                                        <span class="text-secondary">رمز التحقق (CVV)</span>
                                    </label>
                                </div> -->
                            </div> 


                             



                            
                            </div>
                        </div>



                       <div class="d-none" id="pay2">

                       <div class="p-3" style="border: 20px solid #f5f5f5;border-radius:5px;">
                                <span class="mb-2 text-center fw-light d-block">تقبل جميع البطاقات</span>
                                <?php $pay = $totalPrice /4 ?>
                               <?php for($i=0;$i <4 ; $i++) { ?> 
                                <div class="d-flex justify-content-between mb-3">
                                    <img src="assets/image/icons/img-<?php echo($i+1) ?>.png" width="40" alt="">
                                    <span>
                                    <?php if($i==0){
                                    echo('اليوم');
                                }elseif($i==1){
                                    echo('بعد شهر');
                                }elseif($i==2){
                                    echo('بعد شهرين');
                                }elseif($i==3){
                                    echo('بعد 3 اشهر');
                                }
                                ?>
                                    </span>
                                    <p class="fw-bold"><?php echo($pay) ?> <span> <?php $db->get_setting('currancy') ?>  </span></p>
                                </div>  
                                <?php } ?>                           
                            </div>



                        <div class="row mt-3">
                        <div class="col-lg-12">
                    <span class="mb-2 d-inline-block">اختر طريقة الدفع</span>

                    <input type="text" readonly  value="قسط عملية الدفع" class="form-control rounded mb-3"  autocomplete="off" required="" placeholder="اختر طريقة الدفع" maxlength="16">

                    </div>
                        </div>


                        <div class="d-flex justify-content-start mt-2">
                            <img src="assets/image/icons/like.png" wwidth="25" height="20" class="me-2" alt="">
                            <span>ادفع 25% اليوم والباقي قسمه على 3 أشهر</span>
                        </div>

                        <div class="d-flex justify-content-start mt-2">
                            <img src="assets/image/icons/like.png" width="25" height="20" class="me-2" alt="">
                            <span>بدون فوائد أو رسوم</span>
                        </div>

                        <div class="d-flex justify-content-start mt-2 mb-4">
                            <img src="assets/image/icons/like.png" width="25" height="20" class="me-2" alt="">
                            <span>نقبل أي بطاقة بنكية أو ائتمانية</span>
                        </div>



                       </div>
                        



                        <div class="mt-4">
                            <button type="submit" name="confirm" id="CardBtn" class="btn btn-dark w-100">
                                <span>إكمال الدفع</span>
                                <!-- <i class="fa-solid fa-angle-left fa-fade fa-fw"></i> -->
                            </button>
                        </div>

                        <div class="container text-secondary mt-2 mb-4">

                            <p style="font-size: 14px;">تسوق إلكتروني آمن 100%
                                <i class="fab fa-cc-amazon-pay fa-fw mx-1"></i>
                                <i class="fab fa-cc-apple-pay fa-fw"></i>
                                <i class="fas fa-shield fa-fw mx-1"></i>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
        <a href="https://wa.me/<?= $db->get_setting('whatsapp') ?>" class="contact py-2 px-3 bg-success rounded-circle">
            <i class="fab fa-whatsapp text-white my-1 fa-2x"></i>
        </a>
    </main>
    <?php
    include "script.php";
    ?>
    <script>
        $('#CashOrBatch').change(function(event) {
            var total = $('#totalPrice').val();
           var cart_count =  $('#cart_count').val() ;

            var batch = <?php $db->get_setting('batch')?> * cart_count;
            var ee = total -batch;
            var bb = $('#CashOrBatch').val();
         
            
            var all_batch = ee/bb;

            if($(this).val() != 0){
                // var first_batch =total/($(this).val());
            $('#first_batch').val(batch);
            $('#all_batch').val(all_batch);
            } else{
                $('#first_batch').val(total);
                $('#all_batch').val('-');
            }
            
            // alert(total/$(this).val());
            
        });
        $('input[paymentWay]').change(function(event) {
            alert('ff');
        });
    </script>

</body>

</html>