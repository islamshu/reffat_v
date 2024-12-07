<?php
include 'controlPanel/Database.php';
$db = new Database();
$user = $_GET['id'];

$query = "SELECT * FROM `orders` WHERE user = '$user'";
$result = $db->dbQuery($query);

if($db->dbNumRows( $result)){
    $rows = $db->dbFetchResult($result);
    foreach($rows as $row){
        $name = $row['name'];
        $phone = $row['phone'];
        $location = $row['location'] .'-'. $row['street'];
        $payment = $row['payment'];
        $first_batch = $row['first_batch'] != 'نقدا' ? $row['first_batch']: 'نقدا';
    }
}

$query = "SELECT * FROM users WHERE id = 2";
$result = $db->dbQuery($query);

if($db->dbNumRows( $result)){
    $rows = $db->dbFetchResult($result);
    foreach($rows as $row){
        $Whatsapp = $row['Whatsapp'];
        $email = $row['email'];
    }
}
 
$currentDate = date('Y/m/d');
?>

<html lang="ar" dir="rtl">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> طباعة الفاتورة </title>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
        <script>
            function pafD(){
                let filePDF = this.document.getElementById('main');
                html2pdf().from(filePDF).save();
            }
        </script>
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;700;800;900&display=swap');
            *{
                padding: 0;
                margin: 0;
                box-sizing: border-box;
                font-family: 'Tajawal', sans-serif;
                font-size: 10px;
            }
            :root 
            {
                --main-color:#643543
            }
            body 
            {
                padding: 20px;
                --main-color:#000
            }
            
            .table{
                width:100% !important;
            }
            .page_invoce
            {
                /* width: 550px; */
                margin: 0 auto;
                height: auto;
                background-color: #fff;
                padding: 10px 20px;
            }
            .Heading_info img 
            {
            width: 50px;
            }
            .flex 
            {
                display: flex;
                align-items: center;
                justify-content: space-between;
            }
            .center 
            {
                display: flex;
                align-items: center;
                gap: 10px;
            }
            .NameSite  , .Date
            {
                color: var(--main-color);
                font-weight: bold;
                font-size: 15px;
            }
            .info_customer 
            {
                margin-top: 20px;
                border: 1px solid #989898;
                padding: 15px 10px;
                border-radius: 10px;
            }
            .info_customer span  , .text_info_table span
            {

                color:#777;
                font-weight: bold;
            }
            .info_customer div  , .text_info_table div
            {
                color: var(--main-color);
                font-weight: bold;

            }
            .table table 
            {
                margin-top: 15px;
                border-collapse: collapse;
                width: 100%;
            }
            .table table thead tr 
            {
                background-color: var(--main-color);
                color: #fff;
            }
            .table table thead tr th 
            {
                padding: 7px;
            } 

            .table table thead tr th
            {
                background-color: #1fa2d8;
                color: #fff;
                height: 25px;
                padding: 0 5px;
            }
            tbody tr 
            {
                background-color: #e3e3e3;
                color: var(--main-color);
                font-size: 17px;
                border-top: 1px solid #fff;
            }
            tbody tr td 
            {
                padding: 7px;
                text-align: center;
            }
            tbody tr:nth-child(even)
            {
                background-color: #f2f2f2;
            } 

            footer 
            {
                padding: 10px;
                background-color: var(--main-color) !important;
                margin-top: 10px;
            }

            footer div 
            {
                color: #fff;
            }
        </style>
    </head>
    <body>
    <!-- <pre></pre> -->
        <!-- <button onclick="pafD()" style="width: 100px; height: 40px; background-color: #00a8ff; border: 1px solid; color: #ffffff; font-size: 15px;">تحميل</button> -->
        <div id="main" style="padding: 5px;max-width:80%;margin:auto;">
            <div class="page_invoce" style="border: 1px solid #000;border-radius: 10px;padding: 30px;">
                <div class="Heading_info flex">
                    <div class="Logo center"><span class="NameSite"><?= $db->get_setting('website_name')?>  </span> </div>
                    <div class="Logo center"><img style="width: 100px;" src="/uploads/<?= $db->get_setting('web_logo')?>"></div>
                    <div class="Logo center"><span class="NameSite"><?= $db->get_setting('website_name_en')?></span> </div>
                </div>
                <div class="info_customer flex" style="align-items: flex-start;">
                    <div class="info_cus">
                        <div style="color: #f00;"><span>رقم الفاتورة : </span> <?= $user?># </div>
                        <div><span>اسم العميل : </span> <?= $name ?> </div>
                        <div><span>رقم الهاتف : </span> <?= $phone ?> </div>
                    </div>
                    <div class="info_cus">
                        <div style="text-align: right;"><span>التاريخ : </span> <?= $currentDate ?></div>
                        <div style="text-align: right;"><span>العنوان : </span>  <?= $location ?> </div>
                    </div>
                </div>
                <hr style="margin-top: 10px;">
                <div class="table" style="margin-top: 10px;">
                    <h4 style="text-align: center;">تفاصيل الطلب</h4>
                    <div class="table_Res">
                        <table>
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>اسم المنتج </th>
                                    <th>الكمية</th>
                                    <th>السعر</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $totel_price = 0;
                                    $query = "SELECT product_id,quantity FROM `cart` WHERE user = $user";
                                    $result = $db->dbQuery($query);
                                    $count = 0;
                                    if($db->dbNumRows( $result)){
                                        $rows = $db->dbFetchResult($result);
                                        foreach($rows as $row){
                                            $product_id = $row['product_id'];
                                            $query = "SELECT * FROM `products` WHERE product_id = $product_id";
                                            $result = $db->dbQuery($query);

                                            if($db->dbNumRows($result)){
                                                $rows = $db->dbFetchResult($result);
                                                foreach($rows as $rowp){ 
                                                    $count += 1;
                                                    if ($rowp['dec'] == 0) {
                                                        $totel_price += $rowp['price'];
                                                    }else {
                                                        $totel_price += $rowp['dec'];
                                                    }
                                                    ?>
                                                    <tr>
                                                        <td><?= $count ?></td>
                                                        <td> <?= $rowp['name'] ?> </td>
                                                        <td> <?= $row['quantity'] ?> </td>
                                                        <td> <?= $rowp['dec'] == 0 ? $rowp['price'] : $rowp['dec']?> </td>
                                                    </tr>  
                                                <?php }
                                            }
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="table" style="margin-top: 10px;">
                    <div class="text_info_table flex" style="align-items: flex-start;">
                        <div>
                            <div style="text-align: right;"><span>مدة الأقساط : </span> <?= $first_batch ?>  </div>
                            <div style="text-align: right; color: #f00"><span>المبلغ الكلي  : </span> <?= $totel_price ?>  <?= $db->get_setting('currancy')?> </div>
                        </div>
                        <div>
                            <div style="text-align: right;"><span>الدفعة الأولى : </span> <?= $payment ?>  <?= $db->get_setting('currancy')?></div>
                            <div style="text-align: right;"><span>الختم : </span> </div>
                        </div>
                    </div>
                </div>
                <div class="table" style="margin-top: 10px;">
                    <div>
                        <div style="text-align: left;"><img style="width: 60px;margin: -24px 35px;transform: rotate(-20deg);" src="uploads/<?= $db->get_setting('segnature')?>"> </div>
                    </div>
                </div>
                <div class="info_customer flex" style="align-items: flex-start;">
                    <div class="info_cus" style="border-left: 1px solid #919191;width: 50%;">
                        <div><span>التوصيل من خلال شركة ارامكس خلال 24 ساعة من تاريخ الفاتورة</span></div>
                    </div>
                    <div class="info_cus" style="width: 50%;">
                        <div style="text-align: left;"><span>Ihave recived the above devive in good<br>
                            condition with all collected accessories
                        </span></div>
                    </div>
                </div>
            </div>
            <br>
            <hr>
            <footer class="flex">
                <div>
                    <span>  <?= $Whatsapp ?> </span>
                </div>
                <div>
                    <span>  <?= $email ?> </span>
                </div>
            </footer>
        <!-- <div> -->
    </div>
    <script>
            let  tbody   = document.querySelector(".Table_Tackset table tbody");
            let  ini     = document.getElementById("by").value;
            let firstpay = document.getElementById("firstpay").value;
            let toatl    = document.getElementById("toatl").value; 
            let cur   = document.getElementById("cur").value; 

            let Resultpay = parseFloat(toatl) - parseFloat(firstpay);
            let valFirstpay = Resultpay / ini;
            let numpay = 1;

            var Toatalpay = parseFloat(firstpay);

            var d = new Date();
            for(let x = 0 ; x <ini ; x++ )
            { 
                Toatalpay+=valFirstpay;
                d.setMonth(d.getMonth() + 1);
                var strDate = d.getFullYear() + "/" + (d.getMonth()+1) + "/" + d.getDate();
                let temp = `<tr>  <td>الدفعة ${x + 1}</td> <td>${strDate}</td> <td>${valFirstpay.toFixed(2)}</td> <td class = "Toatl">${Toatalpay.toFixed(2)}</td> </tr>`;
                tbody.innerHTML += temp;
                
            }
        </script>
    </body>
</html>