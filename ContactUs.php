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
    <main><section class="mt-4 py-3" style="margin-bottom: 120px;" >
</section>
<!-- <section class="container">
    <h4 style="color: #17a3a1;" class="my-4">سياسة الضمان والاستبدال</h4>
    <div class="bg-white rounded">
        <div class="container p-4">
        <?= $db->get_pages('confirm') ?>
            
           
        </div>
    </div>
</section> -->





    <div class="container page-container">
    <nav aria-label="breadcrumb ">
                    <ol class="breadcrumb mt-4" style="margin-top:2.5rem !important;">
                        <li class="breadcrumb-item text-info"><a href="#" class="text-info text-decoration-none" style="font-size: 14px;">الرئيسية</a></li>
                        <li class="breadcrumb-item active" aria-current="page" style="font-size: 14px;">تواصل معنا

</li>
                    </ol>
                </nav>
                <div class="flex justify-center">
                <div class="content content--single-page col-md-8 p-4 m-auto w-full lg:w-9/12 bg-white border rounded p-6 lg:p-8 mt-4 lg:mt-12">
                    <h1 class="font-bold text-2xl mb-6">تواصل معنا</h1>
                    <div class="content-entry">
                        <p><strong>تواصل معنا - <?= $db->get_setting('website_name')?></strong></p>
                        <p><br></p>
                        <p>يسعدنا التواصل معكم وتقديم المساعدة في <?= $db->get_setting('website_name')?>.</p>
                        <p>يمكنكم التواصل معنا عبر معلومات الاتصال الموجودة أدناه أو عبر مواقع التواصل الاجتماعي.</p>
                        <p><br></p>
                        <p><strong>اتصل بنا:</strong></p>
                        <p>معلومات التواصل:</p>
                        <p>الإمارات, ابو ظبي </p>
                        <p>UAE, Abu Dhabi</p>
                    <span class="fw-normal"><?= $db->get_setting('whatsapp') ?></span>
                        <p>البريد الإلكتروني:&nbsp;<a href="<?= $db->get_setting('email') ?>" target="_blank" style="color: var(--text-primary-purple);"><span class="__cf_email__" data-cfemail="9ddeceddf8f1f8fee9eff2f2f3b3eefc"><?= $db->get_setting('email') ?></span></a></p>
                        <p><br></p>
                        <p><strong>روابط مواقع التواصل الاجتماعي:</strong></p>
                        <p>تابعوا أحدث العروض وجديد متجرنا على صفحاتنا في مواقع التواصل الاجتماعي:</p>
                        <p><br></p>
                        <ul>
                            <li><strong>انستقرام :</strong>&nbsp;<a href="<?php $db->get_setting('instagram') ?>" target="_blank"><?php $db->get_setting('instagram') ?></a></li>
                            <li><strong>واتس اب :</strong><a href="https://wa.me/<?= $db->get_setting('whatsapp') ?>" target="_blank">https://wa.me/<?= $db->get_setting('whatsapp') ?></a></li>
                        </ul>
                        <p><br></p>
                        <p><br></p>
                    </div>
                    <div class="s-comments s-comments-page user-cant-comment">
                        <div class="comments-list-wrap">
                            <div class="no-content-placeholder--comments">
                                <i class="sicon-chat-bubbles text-5xl block mb-5 text-gray-400"></i>
                                <p class="text-sm">لا توجد تعليقات حتى الآن .. قم بإضافة أول تعليق</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



      <style>
   
        .breadcrumb-item+.breadcrumb-item::before {
            font-family: 'Font Awesome 6 Free';
            content: '\f053' !important;
            font-weight: 600;
            font-size: 12px;
            margin-top: 5px;
        }

        .rounded{
            border-radius: 4px !important;
        }


  </style>




<iframe class="d-none" src="" frameborder="0"></iframe>
<a href="https://wa.me/<?= $Whatsapp ?>" class="contact p-1 rounded-circle text-center" style="background-color:#4dc247;width:50px;height:50px;" >
                <i class="fab fa-whatsapp text-white my-1 fa-2x"></i>
            </a>
</main>
<?php 
include "footer.php"; 
include "script.php"; 
?>

</body>
</html>