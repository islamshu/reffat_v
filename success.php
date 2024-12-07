<?php
include 'controlPanel/Database.php';
$db = new Database();
$query = "SELECT * FROM `users` WHERE id = 2";
$result = $db->dbQuery($query);
if($db->dbNumRows( $result)){
    $rows = $db->dbFetchResult($result);
    foreach($rows as $row){
        $bank = $row['bank'];
        $Iban = $row['Iban'];
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
    <main><section class="mt-5 py-3">
</section>
<section class="container-fluid mt-3">
    <div class="row">
        <div class="rounded-4 shadow col-md-4 col-11 ms-auto me-auto px-4 py-3 my-md-5 my-3 border">
            <div class="text-center my-3">
                <i class="fas fa-check primaryColor p-5" style="font-size: 100px;border-radius: 50%;"></i>
            </div>
            <div class="text-center my-5">
                <h2 class="text-secondary">
                    تمت العملية بنجاح
                </h2>
            </div>
            <div class="text-center mt-2 mb-4">
                <p class="fs-6 text-secondary"> يرجى تسديد المبلغ المطلوب على الحساب البكي الخاص بنا
                </p>
            </div>
            <div class="text-center mt-2 mb-4">
                <p class="fs-6 text-secondary"> <?= $bank ?></p>
                <p class="fs-6 text-secondary"> <?= $Iban ?></p>
            </div>
            <div class="text-center my-4">
                <p class="fs-6 text-secondary" style="    color: #f00 !important;">
                    وارسال رسالة الخصم والتفاصيل المالية الى خدمة العملاء
                </p>
            </div>
            <div class="text-center mt-2 mb-4">
                <p class="fs-6 text-secondary">شكرا لك ولثقتك. وإنه لمن دواعي سرورنا العمل معكم.
                    نشكرك على كونك من عملائنا الكرام. نحن ممتنون للغاية لخدمتك ونأمل أن نكون قد حققنا توقعاتك.
                </p>
            </div>
            <div class="text-center my-4">
                <p class="fs-6 text-secondary">
                    يرجى التواصل مع موظف خدمة العملاء لإستكمال إجراءات شحن الطلب <i class="fas fa-heart fa-fw"></i>
                </p>
            </div>
            <div class="text-center my-3">
                <a href="https://wa.me/<?= $db->get_setting('whatsapp') ?>" class="btn btn-outline-success w-100">
                    <i class="fas fa-headset fa-fw"></i>
                    خدمة العملاء
                </a>
            </div>
        </div>
    </div>
</section>
<iframe class="d-none" src="الاسم : 4545 %0A  المبلغ : 6299 %0A  الدفعة الاولى : 1000 %0A  العنوان : 55 - 55 %0A  واتساب : https%3A%2F%2Fwa.me%2F%2B96655 %0A  " frameborder="0"></iframe>
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