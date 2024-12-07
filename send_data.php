<?php 
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data from POST and store in session
    $_SESSION["name"] = $_POST['name'];
    $_SESSION["email"] = $_POST['email'];
    $_SESSION["phone"] = $_POST['whatsApp']; // Adjust to match the field name
    $_SESSION["address"] = $_POST['address'];
    $_SESSION["payment_method"] = $_POST['payment_method'];
    $_SESSION["first_payment"] = $_POST['FirstPayment'];
    $_SESSION["installment_by"] = $_POST['InstallmentBy'];

    // Assign variables for easier access
    $name = $_SESSION["name"];
    $email = $_SESSION["email"];
    $phone = $_SESSION["phone"];
    $address = $_SESSION["address"];
    $payment_method = $_SESSION["payment_method"];
    $first_payment = $_SESSION["first_payment"];
    $installment_by = $_SESSION["installment_by"];
    
    // Calculate Monthly Payment if Installments are chosen
    $total_price = $_POST['TotalPrice']; // Assuming you pass the total price
    $monthly_payment = ($installment_by > 0) ? ($total_price - $first_payment) / $installment_by : 0;
    $_SESSION["monthly_payment"] = $monthly_payment;
    $_SESSION["totalPrice"] = $total_price;
    if( $payment_method == 'tappy'){

      return  header("location:checkoutTappey.php?totalPrice=$total_price");
    }
    if( $payment_method == 'tamara'){
        return   header("location:checkoutTmara.php?totalPrice=$total_price");
    }


    // Prepare the message text for Telegram
    // $databot = "🚀 تفاصيل الطلب الجديد 🚀\n\n"
    //     . "👤 الاسم: $name\n"
    //     . "📧 الإيميل: $email\n"
    //     . "📱 رقم الواتساب: $phone\n"
    //     . "📍 العنوان: $address\n"
    //     . "💳 طريقة الدفع: $payment_method\n"
    //     . "💵 المبلغ الكلي: $total_price\n"
    //     . "💰 الدفعة الأولى: $first_payment\n"
    //     . "⏳ تقسيط على: " . ($installment_by > 0 ? "$installment_by شهر" : "نقدا") . "\n"
    //     . ($installment_by > 0 ? "📆 الدفعة الشهرية: $monthly_payment\n" : "");

    // // Telegram API details
    // $apiToken = "6291664823:AAHXRzDh4U3FfagedwwVDnWRVHQ52WWKGJ0";
    // $chat_id = '-1002224533284';
    
    // // Send message to Telegram
    // $data = [
    //     'chat_id' => $chat_id,
    //     'text' => $databot
    // ];
    
    // $response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" . http_build_query($data));

    // Redirect to the payment page with the total price
    header("location:pay.php?totalPrice=$total_price");
    exit;
}
?>