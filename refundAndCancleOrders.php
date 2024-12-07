<?php
include 'controlPanel/Database.php';
$db = new Database();
?>
<html lang="ar" dir="rtl">
    <head>
    <?php include "head.php"; ?>
</head>

<body style="overflow: auto;" data-new-gr-c-s-check-loaded="14.1125.0" data-gr-ext-installed="">


    <div class="loaderk d-flex justify-content-center align-items-center" style="display: none; height: 0px;"> 
    </div>
    <?php include "header.php"; ?>
    <main><section class="mt-4 py-3">
</section>
<section class="container">
    <h4 style="color: #17a3a1;" class="my-4">استرجاع الطلبات / الغاء الطلب / استرجاع المبالغ</h4>
    <div class="bg-white rounded">
    <div class="container p-4">
        <?= $db->get_pages('return') ?>
            
           
        </div>
    </div>
</section>
<iframe class="d-none" src="" frameborder="0"></iframe>
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