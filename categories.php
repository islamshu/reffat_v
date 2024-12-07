<?php
include 'controlPanel/Database.php';
$db = new Database();
if (!isset($_SESSION["user"])) {
    $_SESSION["user"] = rand();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_SESSION["user"];
    if (!empty($_POST['product_id']) and !empty($user)){
        $product_id = $_POST["product_id"];

        $query = "SELECT * FROM cart WHERE product_id = $product_id AND user = '$user'";
        $result = $db->dbQuery($query);
        
        if ($db->dbNumRows($result) > 0) {
            $query = "UPDATE cart SET quantity=(quantity+1) WHERE product_id = $product_id AND user = '$user'";
            $result = $db->dbQuery($query);
            if ($result) {
                header("location:cart.php");
            }else{
                echo "no";
            }
        }else {
            $query = "INSERT INTO cart (product_id, quantity, user) VALUES ($product_id, 1, '$user')";
            $result = $db->dbQuery($query);
            if ($result) {
                header("location:cart.php");
            }else{
                echo "no1";
            }

        }
    }else{
        header("location:index.php");
        
    }
}

$category_id = $_GET['category_id'];
$query = "SELECT title FROM `subclasses` WHERE `id` = $category_id";
$result = $db->dbQuery($query);
                   
if($db->dbNumRows( $result)){
    $rows = $db->dbFetchResult($result);
    foreach($rows as $row){ 
        $title = $row['title'];
    }
}

?>

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
                margin-top: 2rem !important;
            }


        }
    </style>


</head>

<body style="overflow: auto;" data-new-gr-c-s-check-loaded="14.1125.0" data-gr-ext-installed="">
    <div class="loaderk d-flex justify-content-center align-items-center" style="display: none; height: 0px;"> 
    </div>
    <?php include "header.php"; ?>
    <main>
        <section class="mt-5 py-3">
</section>
<section class="container">

    <!-- <nav aria-label="breadcrumb" style="margin-top: 105px;">
        <ol class="breadcrumb pt-md-0 pt-2">
            <li class="breadcrumb-item"><a href="index.php" class=" text-dark">الرئيسية</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
        </ol>
    </nav> -->


    <nav aria-label="breadcrumb " style="margin-top: 105px;margin-bottom:40px;">
                    <ol class="breadcrumb mt-4">
                        <li class="breadcrumb-item text-info"><a href="#" class="text-info text-decoration-none" style="font-size: 14px;">الرئيسية</a></li>
                        <li class="breadcrumb-item active" aria-current="page" style="font-size: 14px;"><?= $title ?></li>
                    </ol>
                </nav>

    <h5 class="text-start text-secondary container">
        <?= $title ?>
    </h5>
    <!-- itmes -->
    <div class="container">
        <div class="row">
        <?php
            
                   $query = "SELECT * FROM `products` WHERE `category_id` = $category_id ORDER BY `product_id` DESC";
                   $result = $db->dbQuery($query);
                   
                   if($db->dbNumRows( $result)){
                   $rows = $db->dbFetchResult($result);
                   foreach($rows as $row){ ?>
                   <div class="col-md-3 col-6 mb-2">
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

                                                                <button type="submit" name="addCart" class="btn btn-sm btn-pro float-end loveBtn">
                                                                    <img src="assets/image/icons/heart.png" width="20" height="21" alt="">
                                                                </button>

                                                            </form>
                                                        </div>


                                                    </div>


                                                </div>
                                            </a>
                </div>
            <?php } } ?>
            </div>
    </div>
</section>


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