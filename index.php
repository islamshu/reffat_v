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

        $query = "SELECT * FROM cart WHERE product_id = $product_id AND user = '$user'";
        $result = $db->dbQuery($query);

        if ($db->dbNumRows($result) > 0) {
            $query = "UPDATE cart SET quantity=(quantity+1) WHERE product_id = $product_id AND user = '$user'";
            $result = $db->dbQuery($query);
            if ($result) {
                header("location:cart.php");
            } else {
                echo "no";
            }
        } else {
            $query = "INSERT INTO cart (product_id, quantity, user) VALUES ($product_id, 1, '$user')";
            $result = $db->dbQuery($query);
            if ($result) {
                header("location:cart.php");
            } else {
                echo "no1";
            }
        }
    } else {
    }
}
?>


<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <?php include "head.php"; ?>


    <style>
        .comment-item {
            height: 257px;
            margin-bottom: 20px;
            text-align: right;
            position: relative;
            margin-top: 34px;
            padding-top: 50px !important;
            box-shadow: none !important;
            background-color: white !important;
            transition: all .5s;
        }

        .comment-item:hover {
            transform: translateY(-10px);
        }

        .quote {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            background-color: #00baf2;
            line-height: 24px;
            text-align: center;
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
            left: -25px;
            top: -60px !important;
        }

        [dir='rtl'] .slick-prev {
            right: auto;
            left: 18px;
            top: -60px !important;
        }

        .loveBtn {
            width: 22%;
            height: 42px;
        }

        .addTCartBtn {
            width: 75%;
            height: 42px;
        }


        .img-header{
            height: 500px;
        }

        @media (max-width:570px) {

            .loveBtn {
                width: 24%;
            }

            .loveBtn img {
                width: 18px;
                height: 18px;
            }

            .addTCartBtn{
                width: 72%;
            }

            [dir='rtl'] .slick-prev{
                right: auto;
                left: 34px;
                top: -33px !important;
            }

            [dir='rtl'] .slick-next{
                right: auto;
                left: -4px;
                top: -33px !important;
            }

            .img-header{
            height: 157px;
            }

           .sSm{
                margin-top: -2rem !important;
            }
            
                        .sSm2{
                margin-bottom: 0rem !important;
            }


        }
    </style>

</head>

<body>


    <div class="loaderk d-flex justify-content-center align-items-center">
    </div>
    <?php include "header.php"; ?>
    <main>
        <section class="mt-5 sSm" style="margin-top: 120px!important;">

            <div id="carouselExampleControls" class="carousel slide mt-5" data-bs-ride="carousel">
                <div class="carousel-inner pt-md-5 pt-3">
                    <?php

                    $query = "SELECT * FROM `images`";
                    $result = $db->dbQuery($query);

                    if ($db->dbNumRows($result)) {
                        $rows = $db->dbFetchResult($result);
                        foreach ($rows as $row) {
                            echo
                            '<div class="carousel-item ' . $row['active'] . '">
                            <img src="uploads/' . $row['image'] . '" class="d-block w-100 d-block d-md-none" height="200" alt="...">
                            <img src="uploads/' . $row['image'] . '" class="d-block w-100 d-none d-md-block" height="400" alt="...">
                            
                            </div>';
                        }
                    }

                    ?>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </section>
        <!-- /carousel -->
        <section class="container mt-4 mb-3 sSm" style="margin-top: 5rem;">


            <?php
            $db = new Database();
            $query = "SELECT * FROM `image_slide` ";
            $result = $db->dbQuery($query);

            if ($db->dbNumRows($result)) {
                $rows = $db->dbFetchResult($result);
                foreach ($rows as $row) { ?>
                    <a href="<?= $row['url'] ?>" class="text-decoration-none text-dark">
                        <img src="uploads/<?= $row['image'] ?>" height="600" class="w-100 img-header rounded shadow" alt="">
                    </a>
            <?php }
            } ?>
            <div class="container mt-5">
                <div class="slider" dir="ltr">
                    <?php
                    $db = new Database();
                    $query = "SELECT * FROM `main_cat` ";
                    $result = $db->dbQuery($query);

                    if ($db->dbNumRows($result)) {
                        $rows = $db->dbFetchResult($result);
                        foreach ($rows as $row) { ?>
                            <div class="text-center">
                                <a href="<?= $row['url'] ?>" class="text-decoration-none text-dark img-header">
                                    <img src="uploads/<?= $row['image'] ?>" style="max-width: 80%;border-radius: 50%;overflow: hidden;" class="border border-2 ms-auto me-auto shadow" width="" alt="">
                                    <p class="mt-2"> <?= $row['title'] ?></p>
                                </a>
                            </div>
                    <?php }
                    } ?>

                    <!-- <div class="text-center">
                <a href="categories.php?category_id=29" class="text-decoration-none text-dark">
                    <img src="assets/image/icons/tablet.webp" style="max-width: 80%;border-radius: 50%;overflow: hidden;" class="border border-2 ms-auto me-auto shadow" width="" alt="">
                    <p class="mt-2">أيباد</p>
                </a>
            </div>
            <div class="text-center">
                <a href="categories.php?category_id=33" class="text-decoration-none text-dark">
                    <img src="assets/image/icons/watch.webp" style="max-width: 80%;border-radius: 50%;overflow: hidden;" class="border border-2 ms-auto me-auto shadow" width="" alt="">
                    <p class="mt-2">ساعات</p>
                </a>
            </div>
            <div class="text-center">
                <a href="categories.php?category_id=16" class="text-decoration-none text-dark">
                    <img src="assets/image/icons/speaker.webp" style="max-width: 80%;border-radius: 50%;overflow: hidden;" class="border border-2 ms-auto me-auto shadow" width="" alt="">
                    <p class="mt-2">سماعات</p>
                </a>
            </div>
            <div class="text-center">
                <a href="categories.php?category_id=24" class="text-decoration-none text-dark">
                    <img src="assets/image/icons/labtob.webp" style="max-width: 80%;border-radius: 50%;overflow: hidden;" class="border border-2 ms-auto me-auto shadow" width="" alt="">
                    <p class="mt-2">لابتوبات</p>
                </a>
            </div>
            <div class="text-center">
                <a href="categories.php?category_id=19" class="text-decoration-none text-dark">
                    <img src="assets/image/icons/ax.webp" style="max-width: 80%;border-radius: 50%;overflow: hidden;" class="border border-2 ms-auto me-auto shadow" width="" alt="">
                    <p class="mt-2">إكسسوارات</p>
                </a>
            </div>
            <div class="text-center">
                <a href="categories.php?category_id=1" class="text-decoration-none text-dark">
                    <img src="assets/image/icons/iohone15.jpg" style="max-width: 80%;border-radius: 50%;overflow: hidden;" class="border border-2 ms-auto me-auto shadow" width="" alt="">
                    <p class="mt-2">أيفون 15</p>
                </a>
            </div> -->
                </div>
            </div>


            <?php
            $db = new Database();
            $query = "SELECT * FROM `subclasses` WHERE `statuss` = 1 ";
            $result = $db->dbQuery($query);

            if ($db->dbNumRows($result)) {
                $rows = $db->dbFetchResult($result);
                foreach ($rows as $row) { ?>
                    <section class=" mt-2 mb-3">
                        <img src="uploads/<?=$row['image']?>" class="w-100" alt="">
                        <div class="container">
                            <div class="d-flex align-items-center">
                                <h5 class="text-center my-md-5 my-4 mainColor" style=""><span class="me-2">|</span> <?= $row['title'] ?> </h5>
                                <a href="categories.php?category_id=<?= $row['id'] ?>" class="btn  btn-sm rounded-4 ms-auto" style="margin-left:65px">عرض الكل <i class="fa-solid fa-arrow-left-long"></i></a>
                            </div>
                            <div class="slick-carousel">
                                <?php
                                $db = new Database();
                                $id = $row['id'];
                                $query = "SELECT * FROM `products` WHERE `category_id` = $id ORDER BY `product_id` DESC LIMIT 8";
                                $result = $db->dbQuery($query);

                                if ($db->dbNumRows($result)) {
                                    $rows = $db->dbFetchResult($result);
                                    foreach ($rows as $row) { ?>
                                        <div class="">
                                            <a href="product.php?product_id=<?= $row['product_id']; ?>" class="text-decoration-none">
                                                <div class="product">
                                                <?php if($row['dec'] != 0){?>   
                                                <div class="promo">
                                                        <div class="promo-inner">
                                                        
                                                            <span> <?php  echo($row['dec']) ?>  <?= $db->get_setting('currancy') ?> </span>
                                                        <i class="fas fa-play"></i>
                                                        </div>
                                                    </div>
                                                    <?php } ?>


                                                    <div class="product-entry__image mb-2">
                                                        <img src="uploads/<?= $row['image']; ?>" class="d-block m-auto " style="object-fit:contain;width:100%;" alt="<?= $row['name']; ?>">

                                                    </div>
                                                    <div class="container position-relative">
                                                        <p class="productName my-0 mt-2 mb-1"><?= $row['name']; ?></p>
                                                        <p class="mb-4 text-secondary text-start">
                                                            <span class="text-danger fw-bold fs-6 fs-lg-5"><?= $row['dec'] == 0 ? $row['price'] : $row['price'] -$row['dec']; ?></span>
                                                            <span class="text-danger fw-bold fs-6 fs-lg-5"> <?= $db->get_setting('currancy') ?></span>
                                                            <?php if($row['dec'] != 0){?>   

                                                            <span class="text-decoration-line-through text-secondary ms-2"><?php  echo($row['price']) ?> <?= $db->get_setting('currancy') ?> </span>
                                                            <?php } ?>
 
                                                        </p>
                                                        <div>
                                                            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
                                                                <input type="hidden" name="qnt" value="1" id="">
                                                                <input type="hidden" name="product_id" value="<?= $row['product_id']; ?>" id="">
                                                                
                                                                <button type="submit" name="addCart" class="btn btn-sm btn-pro addTCartBtn">
                                                                    إضافة للسلة
                                                                </button>

                                                                <button type="submit" name="addCart" class="btn btn-sm btn-pro ms-1 ms-lg-2 float-end loveBtn">
                                                                    <img src="assets/image/icons/heart.png" width="20" height="21" alt="">
                                                                </button>

                                                            </form>
                                                        </div>


                                                    </div>


                                                </div>
                                            </a>
                                        </div>
                                <?php }
                                } ?>
                            </div>
                    </section>
            <?php }
            } ?>


            <!-- /card 1 -->
            <a href="https://wa.me/<?= $db->get_setting('whatsapp') ?>" class="contact p-1 rounded-circle text-center" style="background-color:#4dc247;width:50px;height:50px;">
                <i class="fab fa-whatsapp text-white my-1 fa-2x"></i>
            </a>


    </main>

    <div class="mt-4 pb-2" style="background-color: #f9fafb;padding-top:60px;">


        <div class="container">
            <div class="d-flex align-items-center mb-1">
                <h5 class="text-center my-md-2 my-3 mainColor fw-bolder fs-4">آراء العملاء</h5>
            </div>

            <div class="my-4">
                <div class="comment">

                    <div class="px-3">
                        <div class="p-3 border shadow rounded comment-item">
                            <div class="quote" style="position: absolute;top:-24px;right:20px">
                                <i class="fa-solid fa-quote-right fa-2x m-2"></i>
                            </div>
                            <div class=" mb-3">

                                <div class="text-warning">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-stroke"></i>
                                </div>
                            </div>
                            <div class="mb-4" style="font-size: 14px;">
                                اشكركم على المصداقيه تم وصول الطلب ونفس الطلب وجوده ممتازه واتمنالكم التوفيق
                            </div>

                            <div class="d-flex align-items-center mt-4" style="position: absolute; bottom:20px">
                                <img src="assets/image/icons/profile.png" class="me-2" width="40" height="40" alt="">
                                <h3 class="" style="font-size: 14px;">محمد الشمري</h3>
                            </div>
                        </div>
                    </div>




                    <div class="px-3">
                        <div class="p-3 border shadow rounded comment-item">
                            <div class="quote" style="position: absolute;top:-24px;right:20px">
                                <i class="fa-solid fa-quote-right fa-2x m-2"></i>
                            </div>
                            <div class=" mb-3">

                                <div class="text-warning">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-stroke"></i>
                                </div>
                            </div>
                            <div class="mb-4" style="font-size: 14px;">
                                شغل متميز وجبار ♥️ استمروا ♥️
                            </div>

                            <div class="d-flex align-items-center mt-4" style="position: absolute; bottom:20px">
                                <img src="assets/image/icons/profile.png" class="me-2" width="40" height="40" alt="">
                                <h3 class="" style="font-size: 14px;">عبدالله العنزي</h3>
                            </div>
                        </div>
                    </div>





                    <div class="px-3">
                        <div class="p-3 border shadow rounded comment-item">
                            <div class="quote" style="position: absolute;top:-24px;right:20px">
                                <i class="fa-solid fa-quote-right fa-2x m-2"></i>
                            </div>
                            <div class=" mb-3">

                                <div class="text-warning">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-stroke"></i>
                                </div>
                            </div>
                            <div class="mb-4" style="font-size: 14px;">
                                اهم شي الخدمه بعد البيع .. ابدعتوا بس لو تقللون هال١٤ يوم
                            </div>

                            <div class="d-flex align-items-center mt-4" style="position: absolute; bottom:20px">
                                <img src="assets/image/icons/profile.png" class="me-2" width="40" height="40" alt="">
                                <h3 class="" style="font-size: 14px;">يوسف محمد</h3>
                            </div>
                        </div>
                    </div>





                    <div class="px-3">
                        <div class="p-3 border shadow rounded comment-item">
                            <div class="quote" style="position: absolute;top:-24px;right:20px">
                                <i class="fa-solid fa-quote-right fa-2x m-2"></i>
                            </div>
                            <div class=" mb-3">

                                <div class="text-warning">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-stroke"></i>
                                </div>
                            </div>
                            <div class="mb-4" style="font-size: 14px;">
                                من جد خيارات اصلية المنتج يفرض نفسه
                            </div>

                            <div class="d-flex align-items-center mt-4" style="position: absolute; bottom:20px">
                                <img src="assets/image/icons/profile.png" class="me-2" width="40" height="40" alt="">
                                <h3 class="" style="font-size: 14px;">هنادي عبدالله</h3>
                            </div>
                        </div>
                    </div>






                    <div class="px-3">
                        <div class="p-3 border shadow rounded comment-item">
                            <div class="quote" style="position: absolute;top:-24px;right:20px">
                                <i class="fa-solid fa-quote-right fa-2x m-2"></i>
                            </div>
                            <div class=" mb-3">

                                <div class="text-warning">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-stroke"></i>
                                </div>
                            </div>
                            <div class="mb-4" style="font-size: 14px;">
                                هذه ثالث تجربه .. خدمتهم صراحه تسسكت اهنيكم
                            </div>

                            <div class="d-flex align-items-center mt-4" style="position: absolute; bottom:20px">
                                <img src="assets/image/icons/profile.png" class="me-2" width="40" height="40" alt="">
                                <h3 class="" style="font-size: 14px;">احمد العتيبي</h3>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>

    </div>
    <?php
    include "footer.php";
    include "script.php";
    ?>

</body>

</html>