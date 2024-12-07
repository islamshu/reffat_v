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
                        <li class="breadcrumb-item active" aria-current="page" style="font-size: 14px;">شروط و سياسة الاستبدال والاسترجاع

</li>
                    </ol>
                </nav>
                <div class="flex justify-center">
                <div class="content content--single-page col-md-8 p-4 m-auto w-full lg:w-9/12 bg-white border rounded p-6 lg:p-8 mt-4 lg:mt-12">
                    <h1 class="font-bold text-2xl mb-6">شروط و سياسة الاستبدال والاسترجاع</h1>
                    <div class="content-entry">
                    <?= $db->get_pages('return') ?>

                    </div>
                    <!-- <div class="s-comments s-comments-page user-cant-comment">
                        <div class="comments-list-wrap">
                            <salla-infinite-scroll next-page="">
                                <div class="border-b last:border-0 mb-8 pb-8 border-gray-200 list-block">
                                    <div class=" comment  flex text-sm rtl:space-x-reverse space-x-3 comment_id_13027156">
                                        <div class="flex-none">
                                            <img data-src="https://cdn.assets.salla.network/stores/themes/default/assets/images/avatar_male.png" alt="إسماعيل البرداوي" src="https://cdn.assets.salla.network/themes/392563753/1.72.0/images/s-empty.png" class="w-10 h-10 bg-gray-100 object-cover rounded-full lazy">
                                        </div>
                                        <div class="flex-1">
                                            <div class="flex flex-wrap md:items-center justify-between mb-2 md:mb-0">
                                                <div class="flex items-center mb-1">
                                                    <h3 class="font-bold text-base rtl:ml-10 ltr:mr-10 fix-align">إسماعيل البرداوي</h3>
                                                </div>
                                                <p class="text-gray-400 text-sm">منذ 11 شهر</p>
                                            </div>
                                            <div class="prose prose-sm max-w-none text-gray-500">
                                                <p>خدمه مره ممتاز</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="border-b last:border-0 mb-8 pb-8 border-gray-200 list-block">
                                    <div class=" comment  flex text-sm rtl:space-x-reverse space-x-3 comment_id_12920703">
                                        <div class="flex-none">
                                            <img data-src="https://cdn.assets.salla.network/stores/themes/default/assets/images/avatar_male.png" alt="عبدالملك الزهراني" src="https://cdn.assets.salla.network/themes/392563753/1.72.0/images/s-empty.png" class="w-10 h-10 bg-gray-100 object-cover rounded-full lazy">
                                        </div>
                                        <div class="flex-1">
                                            <div class="flex flex-wrap md:items-center justify-between mb-2 md:mb-0">
                                                <div class="flex items-center mb-1">
                                                    <h3 class="font-bold text-base rtl:ml-10 ltr:mr-10 fix-align">عبدالملك الزهراني</h3>
                                                </div>
                                                <p class="text-gray-400 text-sm">منذ 11 شهر</p>
                                            </div>
                                            <div class="prose prose-sm max-w-none text-gray-500">
                                                <p>ممتاز جداً</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="border-b last:border-0 mb-8 pb-8 border-gray-200 list-block">
                                    <div class=" comment  flex text-sm rtl:space-x-reverse space-x-3 comment_id_12870686">
                                        <div class="flex-none">
                                            <img data-src="https://cdn.assets.salla.network/stores/themes/default/assets/images/avatar_female.png" alt="وفاء الغامدي" src="https://cdn.assets.salla.network/themes/392563753/1.72.0/images/s-empty.png" class="w-10 h-10 bg-gray-100 object-cover rounded-full lazy">
                                        </div>
                                        <div class="flex-1">
                                            <div class="flex flex-wrap md:items-center justify-between mb-2 md:mb-0">
                                                <div class="flex items-center mb-1">
                                                    <h3 class="font-bold text-base rtl:ml-10 ltr:mr-10 fix-align">وفاء الغامدي</h3>
                                                </div>
                                                <p class="text-gray-400 text-sm">منذ 11 شهر</p>
                                            </div>
                                            <div class="prose prose-sm max-w-none text-gray-500">
                                                <p>شكرآ سعر مناسب</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="border-b last:border-0 mb-8 pb-8 border-gray-200 list-block">
                                    <div class=" comment  flex text-sm rtl:space-x-reverse space-x-3 comment_id_12857824">
                                        <div class="flex-none">
                                            <img data-src="https://cdn.assets.salla.network/stores/themes/default/assets/images/avatar_male.png" alt="عبدالله علي القحطاني" src="https://cdn.assets.salla.network/themes/392563753/1.72.0/images/s-empty.png" class="w-10 h-10 bg-gray-100 object-cover rounded-full lazy">
                                        </div>
                                        <div class="flex-1">
                                            <div class="flex flex-wrap md:items-center justify-between mb-2 md:mb-0">
                                                <div class="flex items-center mb-1">
                                                    <h3 class="font-bold text-base rtl:ml-10 ltr:mr-10 fix-align">عبدالله علي القحطاني</h3>
                                                </div>
                                                <p class="text-gray-400 text-sm">منذ 11 شهر</p>
                                            </div>
                                            <div class="prose prose-sm max-w-none text-gray-500">
                                                <p>شكرا </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="border-b last:border-0 mb-8 pb-8 border-gray-200 list-block">
                                    <div class=" comment  flex text-sm rtl:space-x-reverse space-x-3 comment_id_12822994">
                                        <div class="flex-none">
                                            <img data-src="https://cdn.assets.salla.network/stores/themes/default/assets/images/avatar_male.png" alt="احمد الزبيدي" src="https://cdn.assets.salla.network/themes/392563753/1.72.0/images/s-empty.png" class="w-10 h-10 bg-gray-100 object-cover rounded-full lazy">
                                        </div>
                                        <div class="flex-1">
                                            <div class="flex flex-wrap md:items-center justify-between mb-2 md:mb-0">
                                                <div class="flex items-center mb-1">
                                                    <h3 class="font-bold text-base rtl:ml-10 ltr:mr-10 fix-align">احمد الزبيدي</h3>
                                                </div>
                                                <p class="text-gray-400 text-sm">منذ 11 شهر</p>
                                            </div>
                                            <div class="prose prose-sm max-w-none text-gray-500">
                                                <p>موافق </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </salla-infinite-scroll>
                        </div>
                    </div> -->
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
<a href="https://wa.me/<?= $db->get_setting('whatsapp') ?>" class="contact p-1 rounded-circle text-center" style="background-color:#4dc247;width:50px;height:50px;" >
                <i class="fab fa-whatsapp text-white my-1 fa-2x"></i>
            </a>
</main>
<?php 
include "footer.php"; 
include "script.php"; 
?>

</body>
</html>