<?php
include 'controlPanel/Database.php';
$db = new Database();
if (isset($_SESSION["user"])) {
    $user = $_SESSION["user"];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["submit"])) {

            $submit = $_POST["submit"];
            $id = $_POST["id"];
            if ($submit == "plus") {

                $query = "UPDATE cart SET quantity = (quantity + 1) WHERE id = $id";
                $result = $db->dbQuery($query);
                if ($result) {
                    header("location:cart.php");
                }
            } elseif ($submit == "minus") {

                $query = "SELECT quantity FROM cart WHERE id = $id";
                $result = $db->dbQuery($query);
                if ($db->dbNumRows($result)) {
                    $rows = $db->dbFetchResult($result);
                    foreach ($rows as $row) {
                        $quantity = $row["quantity"];
                    }
                }

                if ($quantity > 1) {
                    $query = "UPDATE cart SET quantity = (quantity - 1) WHERE id = $id";
                    $result = $db->dbQuery($query);
                    if ($result) {
                        header("location:cart.php");
                    }
                } else {
                    $query = "DELETE FROM cart WHERE id = $id";
                    $result = $db->dbQuery($query);
                }
            }
        } elseif (isset($_POST["itemKey"])) {
            $itemKey = $_POST["itemKey"];

            $query = "DELETE FROM cart WHERE id = $itemKey";
            $result = $db->dbQuery($query);
            if ($result) {
                header("location:cart.php");
            }
        }
    }
}


?>
<html lang="ar" dir="rtl">

<head>
    <?php include "head.php";
    $query = "SELECT * FROM `users` WHERE id = 2";
    $result = $db->dbQuery($query);
    
    $userrr = $_SESSION["user"];
    $carts = "SELECT * FROM `cart` WHERE `user` = $userrr";
    $result_cart = $db->dbQuery($carts);

    $cart_count = $db->dbNumRows($result_cart);
    if($db->dbNumRows( $result)){
        $quantity = 0;
        $rows = $db->dbFetchResult($result);
        foreach($rows as $row){ 
            $quantity = $quantity+ $row["quantity"];
        }
    }

    $sql_te = "Select * from setting where id = 1";
    $rs = $db->dbQuery($sql_te);
    $row_tb = $db->dbFetchRecord($rs);  
    $batch = $row_tb['batch'];
      $cart_count = $quantity * $batch;
    ?>

    <style>
        .floating-box {
        position: fixed;
        bottom: 20px;
        left: 20px;
        color: white;
        background-color: #2c4fba;
        border: 1px solid #e5e7eb;
        border-radius: 8px;
        padding: 20px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        z-index: 1000;
        width: 200px;
    }

    .floating-box h5,
    .floating-box h6,
    .floating-box p {
        margin: 0;
        margin-bottom: 10px;
        font-size: 14px;
    }

    .floating-box p {
        font-weight: bold;
    }
        .installment {
            display: none;
        }

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

        .product-options {
            background-color: #fff;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            padding: 20px;
            margin-top: 20px;
        }

        .product-options h5 {
            font-size: 16px;
            margin-bottom: 20px;
            color: #121f41;
        }

        .product-options label {
            font-size: 14px;
            font-weight: 500;
            margin-bottom: 8px;
            display: block;
        }

        .product-options .form-control {
            height: 40px;
            border: 1px solid #ced4da;
            border-radius: 4px;
            padding: 8px 12px;
            text-align: right;
            /* لجعل النصوص على اليمين */
        }

        .product-options .form-group {
            margin-bottom: 20px;
        }

        /* إزالة أي نمط خاص بالنقاط */
        .product-options ul.list--vertical {
            list-style: none;
            padding: 0;
            margin: 0;
        }
    </style>
</head>

<body style="overflow: auto;" data-new-gr-c-s-check-loaded="14.1125.0" data-gr-ext-installed="">


    <div class="loaderk d-flex justify-content-center align-items-center" style="display: none; height: 0px;">
    </div>
    <?php include "header.php"; ?>
    <main>
        <main>
            <section class="mt-5 py-3" style="margin-bottom: 90px !important;">
            </section>
            <section class="container mt-3">
                <!-- <div class="d-flex align-items-center justify-content-center">
            <h6 class="text-start text-secondary">
                مراجعة الطلب
            </h6>
            <h6 class="text-start text-secondary mx-2">
                .......
            </h6>
            <h6 class="text-start text-secondary">
                عنوان
            </h6>
            <h6 class="text-start text-secondary mx-2">
                .......
            </h6>
            <h6 class="text-start text-secondary">
                الدفع
            </h6>
        </div> -->

                <nav aria-label="breadcrumb ">
                    <ol class="breadcrumb mt-4">
                        <li class="breadcrumb-item text-info"><a href="#" class="text-info text-decoration-none" style="font-size: 14px;">الرئيسية</a></li>
                        <li class="breadcrumb-item active" aria-current="page" style="font-size: 14px;">سلة المشتريات</li>
                    </ol>
                </nav>
                <div class="">

                    <?php
                    $db = new Database();
                    $price = 0;
                    $query = "SELECT * FROM `cart` WHERE `user` = $user";
                    $result = $db->dbQuery($query);
                    if (isset($_SESSION["user"])) {
                        if ($db->dbNumRows($result)) {
                            echo
                            '<div class="row my-2">
                    <div class="col-md-12 my-2">';
                            $rows = $db->dbFetchResult($result);
                            foreach ($rows as $row) {
                                $product_id = $row['product_id'];
                                $query = "SELECT * FROM products WHERE product_id = $product_id";
                                $result = $db->dbQuery($query);
                                if ($db->dbNumRows($result)) {
                                    $rows = $db->dbFetchResult($result);
                                    foreach ($rows as $rowp) {
                    ?>
                                        <div class="container rounded border bg-white " style="margin-bottom: 20px;">
                                            <div class="row align-items-center py-2">
                                                <div class="col-3 col-lg-2">
                                                    <div class="rounded border m-3">
                                                        <img class="ms-auto me-auto d-md-block d-none w-100" src="uploads/<?= $rowp['image']; ?>" alt="<?= $rowp['name']; ?>">
                                                        <div class="row">
                                                            <img class="ms-auto me-auto d-md-none w-100" src="uploads/<?= $rowp['image']; ?>" alt="<?= $rowp['name']; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-7  col-lg-4 mt-md-0 mt-3 px-0 mx-0">
                                                    <a href="product.php?product_id=<?= $rowp['product_id']; ?>" class=" text-decoration-none h6 d-block text-dark text-start">
                                                        <?= $rowp['name']; ?>
                                                    </a>

                                                    <span class="text-black-50"> <?= $rowp['dec'] == 0 ? $rowp['price'] * $row['quantity'] : ($rowp['price'] - $rowp['dec']) * $row['quantity'] ?> <?= $db->get_setting('currancy') ?>
                                                    </span>


                                                </div>

                                                <div class="col-2 col-lg-1 mt-md-0 my-2 d-block d-lg-none">
                                                    <form action="cart.php" method="POST">
                                                        <input type="hidden" name="itemKey" value="<?= $row['id']; ?>" id="">
                                                        <div>
                                                            <button name="deleteItem" style="background-color: transparent; border:none;"> <i class="fa-solid fa-circle-xmark" name="deleteItem" style="color: #ff6a79;cursor:pointer;font-size:25px;"></i>
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>

                                                <div class="col-12 col-lg-5 my-3 px-0">
                                                    <div class="container">
                                                        <div class="row align-items-center ">
                                                            <div class="col-7 ps-3 ps-lg-0">
                                                                <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST" class="row align-items-center justify-content-center justify-content-lg-start">
                                                                    <input type="hidden" name="id" value="<?= $row['id']; ?>" id="">
                                                                    <button value="plus" name="submit" class="text-center form-control" style="width: 50px !important;height:40px !important;border-radius:0 !important;border-color:#e5e7eb !important ;border-top-right-radius: 5px !important;border-bottom-right-radius: 5px !important;">
                                                                        <i class="fa fa-plus text-black-50" aria-hidden="true"></i>
                                                                    </button>

                                                                    <input type="text" class="text-center form-control" style="width: 50px;height:40px !important;border-radius:0 !important;border-color:#e5e7eb !important ;" value="<?= $row['quantity']; ?>" name="" id="quantity">
                                                                    <button value="minus" name="submit" class="text-center form-control" style="width: 50px !important;height:40px !important;border-radius:0 !important;border-top-left-radius: 5px !important;border-color:#e5e7eb !important ;border-bottom-left-radius: 5px !important;">
                                                                        <i class="fa fa-minus text-black-50" aria-hidden="true"></i>
                                                                    </button>
                                                                </form>
                                                            </div>
                                                            <div class="col-5 text-end fs-6 fw-bold">
                                                                المجموع:
                                                                <?php

                                                                echo ($rowp['dec'] == 0 ? $rowp['price'] * $row['quantity'] : ($rowp['price'] - $rowp['dec']) * $row['quantity']);
                                                                ?>
                                                                <?= $db->get_setting('currancy') ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-1 col-lg-1 mt-md-0 my-2 d-none d-lg-block">
                                                    <form action="cart.php" method="POST">
                                                        <input type="hidden" name="itemKey" value="<?= $row['id']; ?>" id="">
                                                        <div>
                                                            <button name="deleteItem" style="background-color: transparent; border:none;"> <i class="fa-solid fa-circle-xmark" name="deleteItem" style="color: #ff6a79;cursor:pointer;font-size:25px;"></i>
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>


                                        </div>
                            <?php
                                        $price += $rowp['dec'] == 0 ? $rowp['price'] * $row['quantity'] : ($rowp['price'] - $rowp['dec']) * $row['quantity'];
                                    }
                                }
                            } ?>
                </div>0

                <div class="container mt-4 rounded bg-white border py-4">
                    <h5 class="fw-bold text-black mb-3">مجموع السلة</h5>

                    <div class="row">
                        <div class="col-6">الإجمالي:</div>
                        <div class="col-6 text-end fw-bold"><?= $price; ?> <?= $db->get_setting('currancy'); ?></div>
                    </div>

                </div>
                <form action="send_data.php" method="POST" class="row align-items-center justify-content-center justify-content-lg-start">
    <div class="product-options mt-4 rounded bg-white border py-4 px-4">
        <h5 class="fw-bold text-black mb-3">تفاصيل الطلب</h5>

        <!-- Full Name -->
        <div class="form-group mb-3">
            <label class="product-option-name required">الاسم كاملا</label>
            <input type="text" id="fullName" name="name" class="form-control" placeholder="الاسم كاملا" required>
        </div>

        <!-- Email -->
        <div class="form-group mb-3">
            <label class="product-option-name required">الايميل</label>
            <input type="email" id="email" name="email" class="form-control" placeholder="الايميل" required>
        </div>

        <!-- WhatsApp Number -->
        <div class="form-group mb-3">
            <label class="product-option-name required">رقم الواتس</label>
            <input type="text" id="WhatsApp" name="whatsApp" class="form-control" placeholder="رقم الواتس" required>
        </div>

        <!-- Full Address -->
        <div class="form-group mb-3">
            <label class="product-option-name required">العنوان كاملا</label>
            <input type="text" id="address" name="address" class="form-control" placeholder="العنوان كاملا" required>
        </div>

        <!-- Payment Method -->
        <div class="form-group mb-3">
            <label class="product-option-name required">طريقة الدفع</label>
            <select class="form-control" id="installment" name="payment_method" required>
                <option value="" selected disabled>اختر</option>
                <option value="all">كامل</option>
                <option value="installment">تقسيط</option>
                <option value="tappy">تابي</option>
                <option value="tamara">تمارا</option>
                <!-- <option value="k-net">كي نت</option> -->

            </select>
        </div>

        <!-- Total Price -->
        <div class="form-group mb-3 installment">
            <label class="product-option-name required">المجموع الكلي</label>
            <input value="<?php echo ($price); ?>" id="TotalPrice" name="TotalPrice" class="form-control" type="number" readonly>
        </div>

        <!-- First Payment -->
        <div class="form-group mb-3 installment">
            <label class="product-option-name required">الدفعة الاولى</label>
            <input value="<?php echo ($cart_count); ?>" min="0" readonly id="FirstPayment" name="FirstPayment" class="form-control" type="number">
        </div>

        <!-- Installment By -->
        <div class="form-group mb-3 installment">
            <label class="product-option-name required">الرجاء تحديد عدد شهور التقسيط </label>
            <select name="InstallmentBy" id="InstallmentBy" class="form-control">
                <?php
                for ($i = 0; $i <= 24; $i++) {
                    if ($i === 0) {
                        continue;
                    } else {
                        echo '<option value="' . $i . '">' . $i . ' شهر</option>';
                    }
                }
                ?>
            </select>
        </div>

        <!-- Monthly Payment -->
        <div class="form-group mb-3 installment" id="MonthlyPaymentLi" style="display:none;">
            <label class="product-option-name required">الدفعة الشهرية</label>
            <input value="0" readonly id="MonthlyPayment" name="MonthlyPayment" class="form-control">
        </div>

        <!-- Submit Button -->
        <div class="form-group text-end">
            <button type="submit" class="btn btn-primary w-100">إتمام الطلب</button>
        </div>
    </div>
</form>


                </div>
        <?php } else {
                            echo '<div class="row my-2">
                            <!-- itmes -->
                            <div class="col-md-12 my-2">
                                
                                <div class="container rounded  bg-white p-5 text-center " style="color: #121f41;">
                                    <div class="mt-3" style="width:8rem;height:8rem;border-radius:50%;padding:10px;text-align:center;background-color:#f3f4f6;margin:auto;line-height:4rem">
                                    <i class="fa-solid fa-bag-shopping" style="font-size: 50px;color:gray;margin-top:25px;"></i>
                                    </div>
                                    <div class="my-4 fs-5">
                                    السلة فارغة
                                    </div>
                                    <div class="">
                                        <a href="index.php" class="btn btn-outline-secondary">عودة للرئيسية</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 text-secondary d-none">
                                <div class="container rounded bg-white shadow border my-2 px-3 py-2">
                                    <h5 class="border-bottom py-3 mb-3 fw-normal">تفاصيل الفاتورة</h5>
                                    <div class="row my-2">
                                        <div class="col-6">قيمة المنتجات :</div>
                                        <div class="col-6 text-end">0 ' . $db->get_setting('currancy') . '</div>
                                    </div>
                                    <div class="row my-2">
                                        <div class="col-6">التوصيل:</div>
                                        <div class="col-6 text-end">00.00 ' . $db->get_setting('currancy') . '</div>
                                    </div>
                                    <div class="row my-2 border-top pt-2 text-dark fw-semibold">
                                        <div class="col-6">المجموع الكلي :</div>
                                        <div class="col-6 text-end text-success">0 ' . $db->get_setting('currancy') . '</div>
                                    </div>
                                    <div class="row mt-5 mb-3">
                                        <div class="col-12">
                                            <a href="index.php" class="btn w-100 btn-outline-dark">
                                                <i class="fas fa-angle-right fa-fw"></i>
                                                متابعة التسوق
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>';
                        }
                    } else {
                        echo '<div class="row my-2">
                            <!-- itmes -->
                            <div class="col-md-8 my-2">
                                
                                <div class="container rounded border bg-white shadow p-5 text-center " style="color: #121f41;">
                                    <div class="mt-3">
                                        <i class="fas fa-cart-plus fa-5x"></i>
                                    </div>
                                    <div class="my-4 fs-5">
                                        يبدو أنك لم تشتري شئ !!
                                    </div>
                                    <div class="">
                                        <a href="index.php" class="btn btn-outline-secondary w-75">تسوق الأن</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 text-secondary">
                                <div class="container rounded bg-white shadow border my-2 px-3 py-2">
                                    <h5 class="border-bottom py-3 mb-3 fw-normal">تفاصيل الفاتورة</h5>
                                    <div class="row my-2">
                                        <div class="col-6">قيمة المنتجات :</div>
                                        <div class="col-6 text-end">0 ' . $db->get_setting('currancy') . '</div>
                                    </div>
                                    <div class="row my-2">
                                        <div class="col-6">التوصيل:</div>
                                        <div class="col-6 text-end">00.00 ' . $db->get_setting('currancy') . '</div>
                                    </div>
                                    <div class="row my-2 border-top pt-2 text-dark fw-semibold">
                                        <div class="col-6">المجموع الكلي :</div>
                                        <div class="col-6 text-end text-success">0 ' . $db->get_setting('currancy') . '</div>
                                    </div>
                                    <div class="row mt-5 mb-3">
                                        <div class="col-12">
                                            <a href="index.php" class="btn w-100 btn-outline-dark">
                                                <i class="fas fa-angle-right fa-fw"></i>
                                                متابعة التسوق
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>';
                    } ?>

        </div>
            </section>
            <div class="floating-box">
    <h5>السعر الإجمالي</h5>
    <p id="floatingTotal"><?php echo ($price); ?> <?= $db->get_setting('currancy'); ?></p>
    
</div>

            <a href="https://wa.me/<?= $db->get_setting('whatsapp') ?>" class="contact p-1 rounded-circle text-center" style="background-color:#4dc247;width:50px;height:50px;">
                <i class="fab fa-whatsapp text-white my-1 fa-2x"></i>
            </a>
        </main>
        <?php
        include "footer.php";
        include "script.php";
        ?>
        <script>
            document.getElementById('InstallmentBy').addEventListener('change', function() {
                var monthlyPaymentLi = document.getElementById('MonthlyPaymentLi');
                if (this.value > 0) {
                    monthlyPaymentLi.style.display = 'block';
                } else {
                    monthlyPaymentLi.style.display = 'none';
                }
            });
        </script>
        <script>
            document.getElementById('installment').addEventListener('change', function() {
                const installmentElements = document.querySelectorAll('.installment');
                if (this.value === 'installment') {
                    installmentElements.forEach(element => {
                        element.style.display = 'block'; // Hide all elements with class 'installment'
                    });
                } else {
                    installmentElements.forEach(element => {
                        element.style.display = 'none'; // Show them if the condition is not met
                    });
                }
            });
        </script>
<script>
    // تحديد الحقول المطلوبة
    const installmentSelect = document.getElementById('InstallmentBy');
    const firstPaymentInput = document.getElementById('FirstPayment');
    const monthlyPaymentInput = document.getElementById('MonthlyPayment');
    const monthlyPaymentLi = document.getElementById('MonthlyPaymentLi');
    const totalPriceInput = document.getElementById('TotalPrice');

    // دالة لحساب القسط الشهري
    function updateMonthlyPayment() {
        const selectedMonths = parseInt(installmentSelect.value); // القيمة المختارة لعدد الشهور
        const firstPaymentValue = parseFloat(firstPaymentInput.value) || 0; // قيمة الدفعة الأولى
        const totalPriceValue = parseFloat(totalPriceInput.value) || 0; // المجموع الكلي

        if (selectedMonths > 0) {
            const remainingAmount = totalPriceValue - firstPaymentValue; // المبلغ المتبقي بعد الدفعة الأولى
            if (remainingAmount >= 0) {
                const monthlyPayment = (remainingAmount / selectedMonths).toFixed(2); // حساب القسط الشهري
                monthlyPaymentLi.style.display = 'block'; // عرض حقل الدفعة الشهرية
                monthlyPaymentInput.value = monthlyPayment; // تحديث قيمة القسط الشهري
            } else {
                alert("الدفعة الأولى أكبر من المجموع الكلي!"); // تحذير عند تجاوز الدفعة الأولى للمجموع
                firstPaymentInput.value = totalPriceValue; // إعادة الدفعة الأولى إلى الحد الأقصى
                monthlyPaymentLi.style.display = 'none';
                monthlyPaymentInput.value = 0;
            }
        } else {
            monthlyPaymentLi.style.display = 'none'; // إخفاء حقل الدفعة الشهرية إذا لم يتم اختيار عدد الأشهر
            monthlyPaymentInput.value = 0;
        }
    }

    // إضافة أحداث عند تغيير القيم
    installmentSelect.addEventListener('change', updateMonthlyPayment);
    firstPaymentInput.addEventListener('input', updateMonthlyPayment);

    // عرض الحقول عند اختيار "تقسيط"
    document.getElementById('installment').addEventListener('change', function () {
        const installmentElements = document.querySelectorAll('.installment');
        if (this.value === 'installment') {
            installmentElements.forEach(element => {
                element.style.display = 'block'; // عرض الحقول المرتبطة بالتقسيط
            });
            updateMonthlyPayment(); // تحديث القسط الشهري مباشرة
        } else {
            installmentElements.forEach(element => {
                element.style.display = 'none'; // إخفاء الحقول إذا تم اختيار طريقة دفع أخرى
            });
            monthlyPaymentLi.style.display = 'none';
            monthlyPaymentInput.value = 0;
        }
    });
</script>



    </main>
</body>

</html>