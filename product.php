<?php
include 'controlPanel/Database.php';
$db = new Database();
if (!isset($_SESSION["user"])) {
    $_SESSION["user"] = rand();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_SESSION["user"];
    if (!empty($_POST['product_id']) and !empty($user)) {
        $product_id = $_POST["product_id"];
        $quantity = $_POST["qnt"];
        $query = "SELECT * FROM cart WHERE product_id = $product_id AND user = '$user'";
        $result = $db->dbQuery($query);

        if ($db->dbNumRows($result) > 0) {
            $query = "UPDATE cart SET quantity=(quantity+$quantity) WHERE product_id = $product_id AND user = '$user'";
            $result = $db->dbQuery($query);
            if ($result) {
                header("location:cart.php");
            } else {
                echo "no";
            }
        } else {
            $query = "INSERT INTO cart (product_id, quantity, user) VALUES ($product_id, $quantity, '$user')";
            $result = $db->dbQuery($query);
            if ($result) {
                header("location:cart.php");
            } else {
                echo "no1";
            }
        }
    } else {
        header("location:index.php");
    }
}
$product_id = $_GET['product_id'];
$query = "SELECT * FROM `products` WHERE `product_id` = $product_id";
$result = $db->dbQuery($query);

if ($db->dbNumRows($result)) {
    $rows = $db->dbFetchResult($result);
    foreach ($rows as $row) {
        $name = $row['name'];
        $image = $row['image'];
        $ProductNum = $row['ProductNum'];
        $price = $row['price'];
        $dec = $row['dec'];
        $color = $row['color'];
        $details = $row['details'];
        $category_id = $row['category_id'];
    }
}

$query = "SELECT title FROM `subclasses` WHERE `id` = $category_id";
$result = $db->dbQuery($query);

if ($db->dbNumRows($result)) {
    $rows = $db->dbFetchResult($result);
    foreach ($rows as $row) {
        $title = $row['title'];
    }
}


?>
<html lang="ar" dir="rtl">

<head>
    <?php include "head.php"; ?>


    <style>
        .breadcrumb-item+.breadcrumb-item::before {
            font-family: 'Font Awesome 6 Free';
            content: '\f053' !important;
            font-weight: 600;
            font-size: 12px;
            margin-top: 5px;
        }

        .rounded {
            border-radius: 4px !important;
        }

        .product-comment.div:last-of-type {
            border-bottom: unset !important;
        }


        .slick-prev,
        .slick-next {
            font-size: 0;
            line-height: 0;
            position: absolute;
            top: 50%;
            display: block;
            width: 32px;
            height: 32px;
            padding: 0;
            -webkit-transform: translate(0, -50%);
            -ms-transform: translate(0, -50%);
            transform: translate(0, -50%);
            cursor: pointer;
            border: 1px solid #e5e7eb !important;
            outline: none;
            background: transparent;
            border-radius: 50% !important;
        }

        .slick-prev:before,
        .slick-next:before {
            color: #333 !important;
            font-size: 15px;
        }

        [dir='rtl'] .slick-next:before {
            font-family: 'Font Awesome 6 Free';
            content: '\f053' !important;

            font-weight: 600;

        }

        [dir='rtl'] .slick-prev:before {
            font-family: 'Font Awesome 6 Free';
            content: '\f054' !important;

            font-weight: 600;

        }

        [dir='rtl'] .slick-next {
            right: auto;
            left: 8px;
            top: -30px !important;
        }

        [dir='rtl'] .slick-prev {
            right: auto;
            left: 50px;
            top: -30px !important;
        }




        .swiper {
            width: 80%;
            height: 80%;
        }

        .swiper-slide {
            text-align: center;
            font-size: 18px;
            background: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .swiper-slide img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .swiper {
            width: 100%;
            height: 300px;
            margin-left: auto;
            margin-right: auto;
        }

        .swiper-slide {
            background-size: cover;
            background-position: center;
            border: 1px solid #e5e7eb;
            border-radius: 4px;
        }

        .mySwiper2 {
            height: 62%;
            width: 100%;
        }

        .mySwiper2 .swiper-slide {
            padding: 10px !important;
        }

        .mySwiper2 .swiper-slide img {
            object-fit: contain !important;
            max-height: unset !important;
        }

        .mySwiper {
            height: 20%;
            box-sizing: border-box;
            padding: 10px 0;
        }

        .mySwiper .swiper-slide {
            width: 100% !important;
            /* height: 100%; */
            opacity: 0.4;
            border: 1px solid #e5e7eb;
            border-radius: 4px;
            padding: 4px 0px;
            margin-bottom: 10px;
        }

        .mySwiper .swiper-slide-thumb-active {
            opacity: 1;
            border: 2px solid #00baf2;
        }

        .swiper-slide img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        .swiper-button-prev,
        .swiper-rtl .swiper-button-next {
            left: var(--swiper-navigation-sides-offset, 10px);
            right: auto;
            border: 1px solid #c8c8c8;
            color: #777777;
            padding: 4px;
            border-radius: 50%;
            height: 30px;
            width: 30px;
        }

        .swiper-button-next:after,
        .swiper-button-prev:after {
            font-size: 13px;
            font-weight: 700;
        }

        .swiper-button-next:after {
            margin-right: 2px;
        }

        .swiper-button-prev:after {
            margin-left: 2px;
        }

        @media (max-width:570px) {
            .minH {
                height: 330px;
            }

            .minH2 {
                height: 880px;
            }

            .breadcrumb {
                font-size: 14px;
            }

            .fa-star {
                font-size: 14px;
            }

            .fa-star-half-stroke {
                font-size: 14px;
            }

            .fs-sm {
                font-size: 13px !important;
            }
            
                        .sSm{
                margin-top: -1rem !important;
            }
        }
    </style>

</head>

<body style="overflow: auto;" data-new-gr-c-s-check-loaded="14.1125.0" data-gr-ext-installed="">


    <div class="loaderk d-flex justify-content-center align-items-center" style="display: none; height: 0px;">
    </div>
    <?php include "header.php"; ?>
    <main>
        <section class="mt-5 py-3 sSm" style="margin-bottom: 90px !important;">
        </section>
        <section class="container">


            <h5 class="text-start text-secondary d-md-none  container-fluid">
                <?= $name ?> </h5>
            <!-- details -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 minH">
                        <div class="row">


                            <div class="col-3">
                                <div thumbsSlider="" class="swiper mySwiper" style="overflow:visible !important">
                                    <div class="swiper-wrapper d-flex flex-column" style="height: 80% !important;">
                                        <div class="swiper-slide">
                                            <img src="uploads/<?= $image ?>" class="itemImage ms-auto me-auto" alt="<?= $name ?>">
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="uploads/<?= $image ?>" class="itemImage ms-auto me-auto" alt="<?= $name ?>">
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="uploads/<?= $image ?>" class="itemImage ms-auto me-auto" alt="<?= $name ?>">
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="uploads/<?= $image ?>" class="itemImage ms-auto me-auto" alt="<?= $name ?>">
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="col-9">
                                <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff;" class="swiper mySwiper2">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <img src="uploads/<?= $image ?>" class="itemImage ms-auto me-auto" alt="<?= $name ?>">
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="uploads/<?= $image ?>" class="itemImage ms-auto me-auto" alt="<?= $name ?>">
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="uploads/<?= $image ?>" class="itemImage ms-auto me-auto" alt="<?= $name ?>">
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="uploads/<?= $image ?>" class="itemImage ms-auto me-auto" alt="<?= $name ?>">
                                        </div>

                                    </div>
                                    <div class="swiper-button-next"></div>
                                    <div class="swiper-button-prev"></div>
                                </div>
                            </div>
                        </div>


                        <!-- <div class="slider-for slick-initialized slick-slider">
                            <div class="slick-list draggable">
                                <div class="slick-track" style="opacity: 1; width: 326px;">
                                    <div class="border slick-slide slick-current slick-active" data-slick-index="0" aria-hidden="false" style="width: 326px; position: relative; right: 0px; top: 0px; z-index: 999; opacity: 1;" tabindex="0">
                                        <img src="uploads<?= $image ?>" class="itemImage ms-auto me-auto" alt="<?= $name ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="slider-nav mt-1 rounded slick-initialized slick-slider">
                            <div class="slick-list draggable" style="padding: 0px 50px;">
                                <div class="slick-track" style="opacity: 1; width: 0px; transform: translate3d(-262px, 0px, 0px);"></div>
                            </div>
                        </div> -->

                    </div>
                    <div class="col-md-6 minH2 mt-md-0 mt-2 py-3">



                        <nav aria-label="breadcrumb ">
                            <ol class="breadcrumb mt-4">
                                <li class="breadcrumb-item text-info"><a href="#" class="text-info text-decoration-none" style="font-size: 14px;">الرئيسية</a></li>
                                <li class="breadcrumb-item"><a href="categories.php?category_id=103" class=" text-info text-decoration-none"><?= $title ?></a></li>
                                <li class="breadcrumb-item active" aria-current="page"><?= $name ?></li>

                            </ol>
                        </nav>


                        <h2 class="d-md-block d-none fw-bold mb-3"><?= $name ?></h2>
                        <span class="mb-3 d-inline-block fw-bold text-body-secondary" style="font-size: 15px;color:gray">ضمان سنتين حاسبات العرب</span>
                        <p class="text-success fw-bold"> <span class="text-body fw-normal">الحالة:</span> متوفر في المخزون 14 منتجات
                        </p>
                        <div class="row">

                            <div class="col-5 col-lg-6 d-flex">
                                <div class="text-start text-warning">
                                    <i class="fas fa-star-half-stroke"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <span class="fs-6 fs-sm">(55 تقييم)</span>
                            </div>
                            <div class="col-6 col-lg-5">
                                <i class="fa-solid fa-heart me-2"></i>
                                <a href="#" class="text-secondary fs-sm">أضافة لقائمة الامنيات </a>
                            </div>

                            <div class="col-1 col-lg-1">
                                <i class="fa-solid fa-share-nodes"></i>
                            </div>
                        </div>

                        <div class="mt-2 mb-2">
                            <p>يوفر متجر <?php $db->get_setting('website_name') ?> <?= $name ?> مع إمكانية تقسيط تابي أو تقسيط تمارا بالإضافة إلى خطط دفع سهلة وميسرة من بنوك أخري
                            </p>
                        </div>

                        <!-- <div class="row mt-3">
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-6">رقم المنتج :</div>
                                    <div class="col-6"><?= $ProductNum ?></div>
                                </div>
                            </div>
                            <div class="col-6">
                                <p class="text-secondary text-end">
                                    <i class="fas fa-share-nodes fa-fw mx-1"></i>
                                    مشاركة
                                </p>
                            </div>
                        </div> -->
                        <div class="row">
                            <!-- <div class="col-6">
                                <div class="row">
                                    <div class="col-5">السعر :</div>
                                    <div class="col-7">
                                        <?= $dec == 0 ? $price : $dec ?> <?php $db->get_setting('currancy') ?>
                                    </div>
                                </div>
                            </div> -->
                            <?= $dec == 0 ? '' : '<div class="col-6 text-end text-danger">
                            <del>' . $price . $db->get_setting('currancy') . ' </del>
                        </div>
                    </div>' ?>
                            <div class="row my-3">
                                <div class="col-6">
                                    <input type="text" class="form-control" style="border-radius: 0;" placeholder="ادخل اللون المطلوب">
                                </div>
                            </div>
                            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST" style="width: 100%; padding:0 !important">
                                            <input type="hidden" name="qnt" value="1" id="">
                                            <input type="hidden" name="product_id" value="<?= $product_id ?>" id="">                                <div class="row">
                                    <div class="col-6 d-flex">

                                        <!-- <input type="hidden" name="product_id" value="<?= $product_id ?>" id="">
                                                <input type="number" value="1" class="text-center form-control w-50" min="1" max="99" name="qnt" id=""> -->

                                        


                                    </div>

                                    <div class="col-6 text-end">
                                        <span class="text-danger fw-bold fs-4"> <?= $dec == 0 ? $price : $price-$dec ?> <?php $db->get_setting('currancy') ?>
                                        </span>

                                       <?php if($dec != 0){ ?>  <span class="text-decoration-line-through text-secondary ms-2"><?php echo($price) ?> <?= $db->get_setting('currancy') ?> </span> <?php }?>

                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <!-- <div class="col-2">
                                        <button class="btn btn-outline-warning w-100">
                                            <i class="fas fa-heart "></i>
                                        </button>
                                    </div> -->
                                    <div class="col-12">
                                        <button type="submit" name="addCart" class="btn primaryColor w-100">أضف إلى السلة</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>



                    <div class="product-comments pt-4 border" style="margin-top: -155px;border-top:2px solid #00baf2 !important;position:relative">
                        <span style="position: absolute;top:-41px;right:-1px;background-color:#00baf2;color:white;padding:8px 26px;border-top-left-radius:5px;border-top-right-radius:5px;">تقيمات المنتج</span>
                        <div class="product-comment mb-3 pb-4">
                            <div class="row">
                                <div class="col-10 d-flex text-start">
                                    <img src="assets/image/icons/profile.png" width="50" height="50" alt="">
                                    <div class="d-flex flex-column ms-2">
                                        <div class="">
                                        <span class="mb-3 fw-bold">حسن اليامي</span>
                                        <span class="ms-4"><i class="fa-solid fa-check" style="width: 25px;height:25px;border-radius:50%;background-color:gold;text-align:center;line-height:15px;padding-top:5px;"></i> قام بالشراء,
                                        تم التقييم</span>
                                        </div>
                                        <div class="d-flex mb-3">
                                            <i class="fa-solid fa-star" style="color: gold;"></i>
                                            <i class="fa-solid fa-star" style="color: gold;"></i>
                                            <i class="fa-solid fa-star" style="color: gold;"></i>
                                            <i class="fa-solid fa-star" style="color: gold;"></i>
                                            <i class="fa-solid fa-star" style="color: gold;"></i>
                                        </div>
                                        <p class="text-body" style="font-size: 14px;">كل شي فيه حلو</p>
                                    </div>
                                  
                                </div>

                                <div class="col-2">
                                    <span class="text-body" style="font-size: 13px;">منذ 1 أيام</span>
                                </div>
                            </div>

                            <hr class="ps-2 pe-2">

                        </div>


                        <div class="product-comment mb-3 pb-4">
                            <div class="row">
                                <div class="col-10 d-flex text-start">
                                    <img src="assets/image/icons/profile.png" width="50" height="50" alt="">
                                    <div class="d-flex flex-column ms-2">
                                        <div class="d-flex">
                                        <span class="mb-3 fw-bold">فيصل صالح المالكي
                                        </span>
                                        <span class="ms-4"><i class="fa-solid fa-check" style="width: 25px;height:25px;border-radius:50%;background-color:gold;text-align:center;line-height:15px;padding-top:5px;"></i> قام بالشراء,
                                        تم التقييم</span>
                                        </div>
                                        <div class="d-flex mb-3">
                                            <i class="fa-solid fa-star" style="color: gold;"></i>
                                            <i class="fa-solid fa-star" style="color: gold;"></i>
                                            <i class="fa-solid fa-star" style="color: gold;"></i>
                                            <i class="fa-solid fa-star" style="color: gold;"></i>
                                            <i class="fa-solid fa-star" style="color: gold;"></i>
                                        </div>
                                        <p class="text-body" style="font-size: 14px;">المنتج ممتاز واصلي وتوصيلهم ماشاء الله بالضبط اخذ تقريبا 40 ساعة وهو عندي ماشاء الله</p>
                                    </div>
                                 
                                </div>

                                <div class="col-2">
                                    <span class="text-body" style="font-size: 13px;">منذ 1 أيام</span>
                                </div>
                            </div>

                            <hr class="ps-2 pe-2">

                        </div>


                        <div class="product-comment mb-3 pb-4">
                            <div class="row">
                                <div class="col-10 d-flex text-start">
                                    <img src="assets/image/icons/profile.png" width="50" height="50" alt="">
                                    <div class="d-flex flex-column ms-2">
                                       <div class="d-flex">
                                       <span class="mb-3 fw-bold">مها عبدالله
                                        </span>

                                        <span class="ms-4"><i class="fa-solid fa-check" style="width: 25px;height:25px;border-radius:50%;background-color:gold;text-align:center;line-height:15px;padding-top:5px;"></i> قام بالشراء,
                                        تم التقييم</span>
                                       </div>
                                        <div class="d-flex mb-3">
                                            <i class="fa-solid fa-star" style="color: gold;"></i>
                                            <i class="fa-solid fa-star" style="color: gold;"></i>
                                            <i class="fa-solid fa-star" style="color: gold;"></i>
                                            <i class="fa-solid fa-star" style="color: gold;"></i>
                                            <i class="fa-solid fa-star" style="color: gold;"></i>
                                        </div>
                                        <p class="text-body" style="font-size: 14px;">مرة حلو

                                        </p>
                                    </div>
                                 
                                </div>

                                <div class="col-2">
                                    <span class="text-body" style="font-size: 13px;">منذ 2 أيام</span>
                                </div>
                            </div>

                            <hr class="ps-2 pe-2">

                        </div>


                        <div class="product-comment mb-3 pb-4">
                            <div class="row">
                                <div class="col-10 d-flex text-start">
                                    <img src="assets/image/icons/profile.png" width="50" height="50" alt="">
                                    <div class="d-flex flex-column ms-2">
                                        <div class="d-flex">
                                            <span class="mb-3 fw-bold">بداح القارح
                                            </span>

                                            <span class=" ms-4"><i class="fa-solid fa-check" style="width: 25px;height:25px;border-radius:50%;background-color:gold;text-align:center;line-height:15px;padding-top:5px;"></i> قام بالشراء,
                                                تم التقييم</span>
                                        </div>
                                        <div class="d-flex mb-3">
                                            <i class="fa-solid fa-star" style="color: gold;"></i>
                                            <i class="fa-solid fa-star" style="color: gold;"></i>
                                            <i class="fa-solid fa-star" style="color: gold;"></i>
                                            <i class="fa-solid fa-star" style="color: gold;"></i>
                                            <i class="fa-solid fa-star" style="color: gold;"></i>
                                        </div>
                                        <p class="text-body" style="font-size: 14px;">من افضل المتاجر اللي تعاملت معاها

                                        </p>
                                    </div>

                                </div>

                                <div class="col-2">
                                    <span class="text-body" style="font-size: 13px;">منذ 2 أيام</span>
                                </div>
                            </div>

                            <hr class="ps-2 pe-2">

                        </div>





                    </div>




                    <!-- navs -->
                    <!-- <ul class="nav nav-tabs my-3" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active text-secondary" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="true">التقييم</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link text-secondary" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="false" tabindex="-1">الوصف</button>
                        </li>
                    </ul>
                    <div class="tab-content border-bottom" id="myTabContent">
                        <div class="tab-pane fade " id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                            <div class="pt-2 pb-4"><?= $details ?></div>
                        </div>
                        <div class="tab-pane fade show active" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">

                            <div class="container p-4">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <div class="px-5 text-center text-secondary">
                                            <p class="fs-1">4</p>
                                            <p class="text-warning fs-3">
                                                <i class="fas fa-star-half-stroke fa-fw"></i>
                                                <i class="fas fa-star fa-fw"></i>
                                                <i class="fas fa-star fa-fw"></i>
                                                <i class="fas fa-star fa-fw"></i>
                                                <i class="fas fa-star fa-fw"></i>
                                            </p>
                                            <p class="fs-5">لا يوجد ملاحظات حتى الان</p>
                                        </div>

                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="container text-secondary">
                                            <div class="row align-items-center mb-3">
                                                <div class="col-3">
                                                    Star 1
                                                </div>
                                                <div class="col-8">
                                                    <div class="progress" dir="ltr">
                                                        <div class="progress-bar progress-bar-striped progress-bar-animated primaryColor" role="progressbar" aria-label="Animated striped example" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%"></div>
                                                    </div>
                                                </div>
                                                <div class="col-1">
                                                    20%
                                                </div>
                                            </div>
                                            <div class="row align-items-center mb-3">
                                                <div class="col-3">
                                                    Star 2
                                                </div>
                                                <div class="col-8">
                                                    <div class="progress" dir="ltr">
                                                        <div class="progress-bar progress-bar-striped progress-bar-animated primaryColor" role="progressbar" aria-label="Animated striped example" aria-valuenow="46" aria-valuemin="0" aria-valuemax="100" style="width: 46%"></div>
                                                    </div>
                                                </div>
                                                <div class="col-1">
                                                    46%
                                                </div>
                                            </div>
                                            <div class="row align-items-center mb-3">
                                                <div class="col-3">
                                                    Star 3
                                                </div>
                                                <div class="col-8">
                                                    <div class="progress" dir="ltr">
                                                        <div class="progress-bar progress-bar-striped progress-bar-animated primaryColor" role="progressbar" aria-label="Animated striped example" aria-valuenow="59" aria-valuemin="0" aria-valuemax="100" style="width: 59%"></div>
                                                    </div>
                                                </div>
                                                <div class="col-1">
                                                    59%
                                                </div>
                                            </div>
                                            <div class="row align-items-center mb-3">
                                                <div class="col-3">
                                                    Star 4
                                                </div>
                                                <div class="col-8">
                                                    <div class="progress" dir="ltr">
                                                        <div class="progress-bar progress-bar-striped progress-bar-animated primaryColor" role="progressbar" aria-label="Animated striped example" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100" style="width: 72%"></div>
                                                    </div>
                                                </div>
                                                <div class="col-1">
                                                    72%
                                                </div>
                                            </div>
                                            <div class="row align-items-center mb-3">
                                                <div class="col-3">
                                                    Star 5
                                                </div>
                                                <div class="col-8">
                                                    <div class="progress" dir="ltr">
                                                        <div class="progress-bar progress-bar-striped progress-bar-animated primaryColor" role="progressbar" aria-label="Animated striped example" aria-valuenow="34" aria-valuemin="0" aria-valuemax="100" style="width: 34%"></div>
                                                    </div>
                                                </div>
                                                <div class="col-1">
                                                    34%
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>

        </section>

        <!-- /navs -->

        <section class="container">
            <h3 class="text-start my-md-4 mt-4 fw-bold ">منتجات قد تعجبك


            </h3>
            <div class="slider" dir="ltr">
                <?php
                $query = "SELECT * FROM products ORDER BY RAND() LIMIT 15";
                $result = $db->dbQuery($query);

                if ($db->dbNumRows($result)) {
                    $rows = $db->dbFetchResult($result);
                    foreach ($rows as $row) { ?>
                        <a href="product.php?product_id=<?= $row['product_id']; ?>" class="text-decoration-none">
                            <div class="product text-start">
                            <?php if($row['dec'] != 0) { ?>

                                <div class="promo">
                                    <div class="promo-inner">
                                    <span><?php $row['dec'] ?> <?= $db->get_setting('currancy') ?> </span>
                                        <i class="fas fa-play"></i>
                                    </div>
                                </div>
                            <?php } ?>
                                <div class="product-entry__image mb-2">
                                    <img src="uploads/<?= $row['image']; ?>" class="d-block m-auto " style="object-fit:contain;width:100%;height:40%" alt="<?= $row['name']; ?>">

                                </div>
                                <div class="container position-relative" style="direction:rtl;">
                                    <p class="productName my-0 mt-2 mb-1 text-start"><?= $row['name']; ?></p>
                                    <p class="mb-4 text-secondary text-start">
                                        <span class="text-danger fw-bold fs-5"><?= $row['dec'] == 0 ? $row['price'] : $row['price']-$row['dec']; ?></span>
                                        <span class="text-danger fw-bold fs-5"> <?= $db->get_setting('currancy') ?></span>

                                      <?php if($row['dec'] !=0 ){?>  <span class="text-decoration-line-through text-secondary ms-2"><?php echo($row['price'])?> <?= $db->get_setting('currancy') ?> </span> <?php } ?>

                                    </p>
                                    <div>
                                        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST" style="width: 100%; padding:0 !important">
                                            <input type="hidden" name="qnt" value="1" id="">
                                            <input type="hidden" name="product_id" value="<?= $row['product_id']; ?>" id="">
                                            <button type="submit" name="addCart" class="btn btn-sm btn-pro w-75">
                                                إضافة للسلة
                                            </button>

                                            <button type="submit"  class="btn btn-sm btn-pro ms-2 float-end" style="width: 20%;">
                                                <img src="assets/image/icons/heart.png" width="20" height="21" alt="">
                                            </button>

                                        </form>
                                    </div>


                                </div>


                            </div>
                        </a>
                <?php }
                } ?>
            </div>
        </section>










        <a href="https://wa.me/<?= $db->get_setting('whatsapp') ?>" class="contact p-1 rounded-circle text-center" style="background-color:#4dc247;width:50px;height:50px;">
            <i class="fab fa-whatsapp text-white my-1 fa-2x"></i>
        </a>
    </main>
    <?php
    include "footer.php";
    include "script.php";
    ?>
    <script>
        $('.slider-for').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            fade: true,
            rtl: true,
            asNavFor: '.slider-nav'
        });
        $('.slider-nav').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            asNavFor: '.slider-for',

            dots: false,
            rtl: true,
            centerMode: true,
            focusOnSelect: true
        });
    </script>
</body>

</html>