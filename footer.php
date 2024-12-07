

<style>

    @media(max-width:570px){
        .fs{
        text-align: center;
        }

    }

</style>

<footer class=" mt-3" style="padding-top: 50px;">
    <!-- <div class="d-flex justify-content-center w-100 py-3">
        <a href="index.php">
            <img class="ms-auto me-auto" src="uploads/<?= $db->get_setting('web_logo') ?>" width="180" alt="">
        </a>
    </div> -->
    <div class="container text-dark fw-bold">
        <div class="row">

            <div class="col-lg-3 col-md-4 col-12 mb-3">
                <div class="d-flex  justify-content-start w-100 py-3">
                    <a href="index.php">
                        <img class="ms-auto me-auto" src="uploads/<?= $db->get_setting('web_logo') ?>" width="180" alt="">
                    </a>
                </div>

                <!-- <h5 class="pb-3 text-center mb-3" style="color: #00395e;">من نحن</h5> -->
                <p class="text-start text-secondary  ps-2 sSm2" style="font-size: 12px;">
                    <?= $db->get_pages('about_us') ?>
                </p>
            </div>


            <div class="col-lg-3 col-md-4 col-12 mb-3">
                <div class="w-100">
                    <h5 class="pb-3 text-start mb-3" style="color: #00395e;">روابط مهمة</h5>
                    <div class="container text-start" style="font-size: 12px;">
                        <div class="mb-3">
                            <i class="fa-solid fa-angles-left"></i> <a class="text-decoration-none mainColor" href="termsConditions.php">سياسة الخصوصية والشروط والاحكام</a>
                        </div>
                        <div class="mb-3">
                            <i class="fa-solid fa-angles-left"></i> <a class="text-decoration-none mainColor" href="PaymentMethodsInstallments.php">طرق الدفع والأقساط</a>
                        </div>

                        <div class="mb-3">
                            <i class="fa-solid fa-angles-left"></i> <a class="text-decoration-none mainColor" href="Shipping&Delivery.php">الشحن والتوصيل</a>
                        </div>

                        <div class="mb-3">
                            <i class="fa-solid fa-angles-left"></i> <a class="text-decoration-none mainColor" href="WarrantyMechanism.php">ألية الضمان</a>
                        </div>

                        <div class="mb-3">
                            <i class="fa-solid fa-angles-left"></i> <a class="text-decoration-none mainColor" href="TermsAndConditionsForExchangeAndReturn.php">شروط و سياسة الاستبدال والاسترجاع</a>
                        </div>
                        <div class="mb-3">
                            <i class="fa-solid fa-angles-left"></i> <a class="text-decoration-none mainColor" href="ContactUs.php">تواصل معنا
                            </a>
                        </div>
                        <div class="mb-3">
                            <i class="fa-solid fa-angles-left"></i> <a class="text-decoration-none mainColor" href="ComprehensiveProtectionService.php">خدمة الحماية الشاملة
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-12 mb-3">
                <h5 class="pb-3 text-start mb-3" style="color: #00395e;">تواصل معنا</h5>

                <div class="d-flex align-items-center mb-2">
                    <i class="fa-brands fa-whatsapp me-2" style="color: gray;width:20px;"></i>
                    <span class="fw-normal"><?= $db->get_setting('whatsapp') ?></span>
                </div>

                <!-- <div class="d-flex align-items-center mb-2">
                    <i class="fa-solid fa-mobile-screen me-2" style="color: gray;width:20px"></i>
                    <span class="fw-normal">966582010097</span>
                </div> -->


                <div class="d-flex align-items-center mb-2">
                    <i class="fa-solid fa-phone me-2" style="color: gray;width:20px"></i>
                    <span class="fw-normal"><?= $db->get_setting('phone') ?></span>
                </div>


                <div class="d-flex align-items-center mb-2">
                    <i class="fa-solid fa-envelope me-2" style="color: gray;width:20px"></i>
                    <span class="fw-normal"><?= $db->get_setting('email') ?></span>
                </div>


                <!-- <div class="w-100">
                    <h5 class="pb-3 text-center mb-3" style="color: #00395e;">من نحن</h5>
                    <p class="text-center text-secondary px-5" style="font-size: 12px;">
                    <?= $db->get_pages('about_us') ?>
                </p>
                    <div class="container text-center mb-3 d-flex justify-content-center">
                    <?php if ($db->check('whatsapp') == 'yes') { ?>

                        <a href="https://wa.me/<?= $db->get_setting('whatsapp') ?>" class="text-decoration-none">
                            <div class="text-dark px-2 rounded" style="background-color: #ECEDEF;">
                                <i class="fab fa-whatsapp fa-fw fs-5 mt-2"></i>
                                <p class="pb-2" style="font-size: 12px;">واتساب</p>
                            </div>
                        </a>
                        <?php } ?>
                        <?php if ($db->check('phone') == 'yes') { ?>

                        <a href="https://wa.me/<?= $db->get_setting('phone') ?>" class="text-decoration-none mx-2">
                            <div class="text-dark px-3 rounded" style="background-color: #ECEDEF;">
                                <i class="fas fa-mobile-screen fa-fw fs-5 mt-2"></i>
                                <p class="pb-2" style="font-size: 12px;">جوال</p>
                            </div>
                        </a>
                        <?php } ?>

                        <?php if ($db->check('email') == 'yes') { ?>

                        <a href="mailto:<?= $db->get_setting('email') ?>" class="text-decoration-none">
                            <div class="text-dark px-3 rounded" style="background-color: #ECEDEF;">
                                <i class="fas fa-envelope fa-fw fs-5 mt-2"></i>
                                <p class="pb-2" style="font-size: 12px;">إيميل</p>
                            </div>
                        </a>
                        <?php } ?>

                    </div>

                </div> -->
            </div>
            <div class="col-lg-3 col-md-4 col-12 mb-5">
                <div class="w-100 text-secondary">
                    <h5 class="pb-3 text-start mb-4" style="color: #00395e;">تابعنا على</h5>
                    <div class="d-flex">
                        <?php if ($db->check('instagram') == 'yes') { ?>

                            <span style="    border-radius: 50%;
                                            border: 1px solid gray;
                                            padding: 5px;
                                            display:flex;justify-content:center;align-items:center;margin:3px;
                                            width: 45px;
                                            height: 45px;
                                            line-height: 32px;">

                                <a class="text-black-50" href="<?php $db->get_setting('instagram') ?>">
                                    <i class="fab fa-instagram fa-fw fa-xl"></i>
                                </a>
                            </span>

                        <?php } ?>

                        <?php if ($db->check('twitter') == 'yes') { ?>

                            <span style="    border-radius: 50%;
                                            border: 1px solid gray;
                                            padding: 5px;
                                            display:flex;justify-content:center;align-items:center;margin:3px;
                                            width: 45px;
                                            height: 45px;
                                            line-height: 32px;">

                                <a class="text-black-50" href="<?php $db->get_setting('twitter') ?>">
                                    <i class="fab fa-twitter fa-fw fa-xl"></i>
                                </a>
                            </span>

                        <?php } ?>
                        <?php if ($db->check('snapchat') == 'yes') { ?>

                            <span style="    border-radius: 50%;
                                            border: 1px solid gray;
                                            padding: 5px;
                                            display:flex;justify-content:center;align-items:center;margin:3px;
                                            width: 45px;
                                            height: 45px;
                                            line-height: 32px;">

                                <a class="text-black-50" href="<?php $db->get_setting('snapchat') ?>">
                                    <i class="fab fa-snapchat fa-fw fa-xl"></i>
                                </a>
                            </span>

                        <?php } ?>


                        <?php if ($db->check('tiktok') == 'yes') { ?>

                            <span style="    border-radius: 50%;
                                            border: 1px solid gray;
                                            padding: 5px;
                                            display:flex;justify-content:center;align-items:center;margin:3px;
                                            width: 45px;
                                            height: 45px;
                                            line-height: 32px;">

                                <a class="text-black-50" href="<?php $db->get_setting('tiktok') ?>">
                                    <i class="fab fa-tiktok fa-fw fa-xl"></i>
                                </a>
                            </span>

                        <?php } ?>

                        <?php if ($db->check('youtube') == 'yes') { ?>

                            <span style="    border-radius: 50%;
                                            border: 1px solid gray;
                                            padding: 5px;
                                            display:flex;justify-content:center;align-items:center;margin:3px;
                                            width: 45px;
                                            height: 45px;
                                            line-height: 32px;">

                                <a class="text-black" href="<?php $db->get_setting('youtube') ?>">
                                    <i class="fab fa-youtube fa-fw fa-xl"></i>
                                </a>
                            </span>

                        <?php } ?>

                        <?php if ($db->check('facebook') == 'yes') { ?>

                            <span style="    border-radius: 50%;
                                            border: 1px solid gray;
                                            padding: 5px;
                                            display:flex;justify-content:center;align-items:center;margin:3px;
                                            width: 45px;
                                            height: 45px;
                                            line-height: 32px;">

                                <a class="text-black-50" href="<?php $db->get_setting('facebook') ?>">
                                    <i class="fab fa-facebook fa-fw fa-xl"></i>
                                </a>
                            </span>

                        <?php } ?>

















                    </div>
                </div>
            </div>
            <!-- <div class="col-md-4 col-12 mb-5">
                <div class="w-100 text-secondary">
                    <h5 class="pb-3 text-center mb-4" style="color: #00395e;">تطبيقات متجر Saudi STORE</h5>
                    <div class="container text-center">
                        <div class="d-flex justify-content-center">
                            <div class="me-2">
                                <img src="assets/image/icons/appstore.webp" class="w-100" alt="">
                            </div>
                            <div>
                                <img src="assets/image/icons/googleplay.webp" class="w-100" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center mt-5 ffo">
                <?php
                $query = "SELECT * FROM `footer`";
                $result = $db->dbQuery($query);
                if ($db->dbNumRows($result)) {
                    $rows = $db->dbFetchResult($result);
                    foreach ($rows as $row) { ?>
                    <a href="<?= $row['url'] ?>" class="text-light p-0 border-0 text-decoration-none">
                        <img src="uploads/<?= $row['image'] ?>" width="50" alt="">
                    </a>
                    <?php }
                } ?>
                    
                </div>
            </div> -->
        </div>
    </div>
    <div style="background-color: <?= $db->get_setting('primary_color') ?>; color:white;">
        <div class="container-fluid text-white py-3 px-3" style="font-size: 14px;">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-12 text-sm-center d-none d-lg-block">
                    الحقوق محفوظة | 2024  <?= $db->get_setting('website_name')?></div>
                    <div class="col-md-6 col-12  d-flex text-center align-items-center justify-content-center justify-content-lg-end ">
                        <span style="font-size: 13px; " class="me-2 d-none d-lg-block">الرقم الضريبي : <?php $db->get_setting('number_dareba')?></span>
                        <?php
                $query = "SELECT * FROM `footer`";
                $result = $db->dbQuery($query);
                if ($db->dbNumRows($result)) {
                    $rows = $db->dbFetchResult($result);
                    foreach ($rows as $row) { ?>
                        <a href="<?= $row['url'] ?>">
                        <span class="me-1" style="width:55px;height:30px; background-color: white;padding:2px 10px;border-radius:4px;display:flex;justify-content:center;align-items:center;">
                            <img src="uploads/<?= $row['image'] ?>" width="35" height="20" alt=""> 
                        </span>
                        <?php }
                } ?>
                      
                    </div>
                    <span style="font-size: 13px; " class="me-2 fs d-block d-lg-none mb-3 mt-2">الرقم الضريبي : 2147483647￼</span>
                    <div class="col-md-6 col-12 text-center d-block d-lg-none">
                    الحقوق محفوظة | 2024 <?= $db->get_setting('website_name')?></div>
                </div>
            </div>
        </div>
    </div>
</footer>