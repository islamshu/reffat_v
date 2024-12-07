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
    <main><section class="mt-4 py-3" style="margin-bottom: 120px;">
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
                        <li class="breadcrumb-item active" aria-current="page" style="font-size: 14px;"> ألية الضمان

</li>
                    </ol>
                </nav>
                <div class="flex justify-center">
                <div class="content content--single-page col-md-8 p-4 m-auto w-full lg:w-9/12 bg-white border rounded p-6 lg:p-8 mt-4 lg:mt-12">
                    <h1 class="font-bold text-2xl mb-6">ألية الضمان</h1>
                    <div class="content-entry">
                <?php $db->get_pages('confirm')?>     
                </div>
                    <!-- <div class="s-comments s-comments-page user-cant-comment">
                        <div class="comments-list-wrap">
                            <salla-infinite-scroll next-page="">
                                <div class="border-b last:border-0 mb-8 pb-8 border-gray-200 list-block">
                                    <div class=" comment  flex text-sm rtl:space-x-reverse space-x-3 comment_id_17341384">
                                        <div class="flex-none">
                                            <img data-src="https://cdn.assets.salla.network/stores/themes/default/assets/images/avatar_male.png" alt="عمار الشمري" src="https://cdn.assets.salla.network/themes/392563753/1.72.0/images/s-empty.png" class="w-10 h-10 bg-gray-100 object-cover rounded-full lazy">
                                        </div>
                                        <div class="flex-1">
                                            <div class="flex flex-wrap md:items-center justify-between mb-2 md:mb-0">
                                                <div class="flex items-center mb-1">
                                                    <h3 class="font-bold text-base rtl:ml-10 ltr:mr-10 fix-align">عمار الشمري</h3>
                                                </div>
                                                <p class="text-gray-400 text-sm">منذ شهر</p>
                                            </div>
                                            <div class="prose prose-sm max-w-none text-gray-500">
                                                <p>ايش هو الضمان الذهبي</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class=" nested-comment reply rtl:pr-8 ltr:pl-8 rtl:md:pr-16 ltr:md:pl-16 mt-8 admin  flex text-sm rtl:space-x-reverse space-x-3 comment_id_17342262">
                                        <i class="sicon-reply text-lg text-gray-400"></i> 
                                        <div class="flex-none">
                                            <img data-src="../BEqq/27wZa7eCnAaKT5xDBxnsUbfVONHyM6dEAurIMwre2.png" alt="BTECH STORE" src="../themes/392563753/1.72.0/images/s-empty.png" class="w-10 h-10 bg-gray-100 object-cover rounded-full lazy">
                                        </div>
                                        <div class="flex-1">
                                            <div class="flex flex-wrap md:items-center justify-between mb-2 md:mb-0">
                                                <div class="flex items-center mb-1">
                                                    <h3 class="font-bold text-base rtl:ml-10 ltr:mr-10 fix-align">BTECH STORE</h3>
                                                </div>
                                                <p class="text-gray-400 text-sm">منذ شهر</p>
                                            </div>
                                            <div class="prose prose-sm max-w-none text-gray-500">
                                                <p>الضمان الذهبي <br/>
                                                هو خدمة فريدة يقدمها متجر متجر بي تك <br/>
                                                تمنح العملاء القدرة على إرجاع المنتجات التي لم تنل إعجابهم خلال 72 ساعة من تاريخ استلام المنتج.<br/>
                                                الشرط الرئيسي هو أن يكون المنتج خاليًا من أي آثار استخدام أو تلف، وبأن يكون الكرتون المستخدم للتغليف في حالة جيدة.<br/>
                                                كما يتم خصم تكاليف الشحن فقط من وإلى العميل في حالة الإرجاع. <br/>
                                                يجب الإشارة إلى أن هذا الضمان ينطبق فقط على منتجات مختارة، <br/>
                                                <br/>
                                                شاكرين تواصلكم <br/>
                                                عناية العملاء</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="border-b last:border-0 mb-8 pb-8 border-gray-200 list-block">
                                    <div class=" comment  flex text-sm rtl:space-x-reverse space-x-3 comment_id_17100156">
                                        <div class="flex-none">
                                            <img data-src="https://cdn.assets.salla.network/stores/themes/default/assets/images/avatar_male.png" alt="حمزة العطاب" src="https://cdn.assets.salla.network/themes/392563753/1.72.0/images/s-empty.png" class="w-10 h-10 bg-gray-100 object-cover rounded-full lazy">
                                        </div>
                                        <div class="flex-1">
                                            <div class="flex flex-wrap md:items-center justify-between mb-2 md:mb-0">
                                                <div class="flex items-center mb-1">
                                                    <h3 class="font-bold text-base rtl:ml-10 ltr:mr-10 fix-align">حمزة العطاب</h3>
                                                </div>
                                                <p class="text-gray-400 text-sm">منذ شهر</p>
                                            </div>
                                            <div class="prose prose-sm max-w-none text-gray-500">
                                                <p>هونر سماعة أذن رياضية AM61 مضادة للماء - أحمر<br/>
                                                هل هي اصليه او مقلده</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class=" nested-comment reply rtl:pr-8 ltr:pl-8 rtl:md:pr-16 ltr:md:pl-16 mt-8 admin  flex text-sm rtl:space-x-reverse space-x-3 comment_id_17105651">
                                        <i class="sicon-reply text-lg text-gray-400"></i> 
                                        <div class="flex-none">
                                            <img data-src="../BEqq/27wZa7eCnAaKT5xDBxnsUbfVONHyM6dEAurIMwre2.png" alt="BTECH STORE" src="../themes/392563753/1.72.0/images/s-empty.png" class="w-10 h-10 bg-gray-100 object-cover rounded-full lazy">
                                        </div>
                                        <div class="flex-1">
                                            <div class="flex flex-wrap md:items-center justify-between mb-2 md:mb-0">
                                                <div class="flex items-center mb-1">
                                                    <h3 class="font-bold text-base rtl:ml-10 ltr:mr-10 fix-align">BTECH STORE</h3>
                                                </div>
                                                <p class="text-gray-400 text-sm">منذ شهر</p>
                                            </div>
                                            <div class="prose prose-sm max-w-none text-gray-500">
                                                <p>المنتج اصلي وبضمان 24 شهر</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="border-b last:border-0 mb-8 pb-8 border-gray-200 list-block">
                                    <div class=" comment  flex text-sm rtl:space-x-reverse space-x-3 comment_id_14812230">
                                        <div class="flex-none">
                                            <img data-src="https://cdn.assets.salla.network/stores/themes/default/assets/images/avatar_male.png" alt="هادي صلاح" src="https://cdn.assets.salla.network/themes/392563753/1.72.0/images/s-empty.png" class="w-10 h-10 bg-gray-100 object-cover rounded-full lazy">
                                        </div>
                                        <div class="flex-1">
                                            <div class="flex flex-wrap md:items-center justify-between mb-2 md:mb-0">
                                                <div class="flex items-center mb-1">
                                                    <h3 class="font-bold text-base rtl:ml-10 ltr:mr-10 fix-align">هادي صلاح</h3>
                                                </div>
                                                <p class="text-gray-400 text-sm">منذ 6 أشهر</p>
                                            </div>
                                            <div class="prose prose-sm max-w-none text-gray-500">
                                                <p>جميل</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="border-b last:border-0 mb-8 pb-8 border-gray-200 list-block">
                                    <div class=" comment  flex text-sm rtl:space-x-reverse space-x-3 comment_id_14519635">
                                        <div class="flex-none">
                                            <img data-src="https://cdn.assets.salla.network/stores/themes/default/assets/images/avatar_female.png" alt="ناجيه الجحدلي" src="https://cdn.assets.salla.network/themes/392563753/1.72.0/images/s-empty.png" class="w-10 h-10 bg-gray-100 object-cover rounded-full lazy">
                                        </div>
                                        <div class="flex-1">
                                            <div class="flex flex-wrap md:items-center justify-between mb-2 md:mb-0">
                                                <div class="flex items-center mb-1">
                                                    <h3 class="font-bold text-base rtl:ml-10 ltr:mr-10 fix-align">ناجيه الجحدلي</h3>
                                                </div>
                                                <p class="text-gray-400 text-sm">منذ 6 أشهر</p>
                                            </div>
                                            <div class="prose prose-sm max-w-none text-gray-500">
                                                <p>متجر ممتاز جدا</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="border-b last:border-0 mb-8 pb-8 border-gray-200 list-block">
                                    <div class=" comment  flex text-sm rtl:space-x-reverse space-x-3 comment_id_13801224">
                                        <div class="flex-none">
                                            <img data-src="https://cdn.assets.salla.network/stores/themes/default/assets/images/avatar_male.png" alt="محمد البارقي" src="https://cdn.assets.salla.network/themes/392563753/1.72.0/images/s-empty.png" class="w-10 h-10 bg-gray-100 object-cover rounded-full lazy">
                                        </div>
                                        <div class="flex-1">
                                            <div class="flex flex-wrap md:items-center justify-between mb-2 md:mb-0">
                                                <div class="flex items-center mb-1">
                                                    <h3 class="font-bold text-base rtl:ml-10 ltr:mr-10 fix-align">محمد البارقي</h3>
                                                </div>
                                                <p class="text-gray-400 text-sm">منذ 8 أشهر</p>
                                            </div>
                                            <div class="prose prose-sm max-w-none text-gray-500">
                                                <p>والله متجر فخم الاسعار جميل جدا</p>
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