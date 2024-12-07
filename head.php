<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<meta name="generator" content="Odoo">
<meta name="facebook-domain-verification" content="b5l8edofe72hrd12a9tnexduz31hbm">
<meta name="keywords" content="a store, astore, astore, electronic store">
<meta property="og:type" content="website">
<meta property="og:title" content="<?= $db->get_setting('website_name_en')?> STORE | Online Shopping | <?= $db->get_setting('website_name_en')?> STORE">
<meta property="og:site_name" content="<?= $db->get_setting('website_name_en')?> STORE">
<meta property="og:image" content="uploads/<?= $db->get_setting('web_logo')?>" />


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bxslider/4.2.15/jquery.bxslider.css" integrity="sha512-rV4fiystTwIvs71MLqeLbKbzosmgDS7VU5Xqk1IwFitAM+Aa9x/8Xil4CW+9DjOvVle2iqg4Ncagsbgu2MWxKQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />


<title> <?= $db->get_setting('website_name') ?> | <?= $db->get_setting('website_name_en') ?></title>
<link rel="icon" type="image/x-icon" class="w-100" href="uploads/<?= $db->get_setting('web_logo')?>">
<link rel="stylesheet" href="ajax/libs/slick-carousel/1.8.1/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="ajax/libs/slick-carousel/1.8.1/slick-theme.css" integrity="sha512-6lLUdeQ5uheMFbWm3CP271l14RsX1xtx+J5x2yeIDkkiBpeVTNhTqijME7GgRKKi6hCqovwCoBTlRBEC20M8Mg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="assets/css/all.css" />
<link rel="stylesheet" href="assets/css/bootstrap.rtl.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

<link rel="stylesheet" href="myStyle.css" />
<style>
    .primaryColor {
    color: white;
    background-color: <?= $db->get_setting('primary_color') ?> !important;
    }
    .btn-pro:hover {
    background-color: <?= $db->get_setting('forgin_color') ?>;
    color: white;
}
.quote {
    width: 48px;
    height: 48px;
    border-radius: 50%;
    background-color: <?= $db->get_setting('forgin_color') ?> !important;
    line-height: 24px;
    text-align: center;
}
.btn-dark {
    background-color: <?= $db->get_setting('forgin_color') ?> !important;
    border-color: <?= $db->get_setting('forgin_color') ?> !important;
}

    .btn-dark {
    --bs-btn-color: #fff;
    --bs-btn-bg: <?= $db->get_setting('forgin_color') ?>;
    --bs-btn-border-color: <?= $db->get_setting('forgin_color') ?>;
    --bs-btn-hover-color: #fff;
    --bs-btn-hover-bg: #424649;
    --bs-btn-hover-border-color: #373b3e;
    --bs-btn-focus-shadow-rgb: 66, 70, 73;
    --bs-btn-active-color: #fff;
    --bs-btn-active-bg: #4d5154;
    --bs-btn-active-border-color: #373b3e;
    --bs-btn-active-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
    --bs-btn-disabled-color: #fff;
    --bs-btn-disabled-bg: #212529;
    --bs-btn-disabled-border-color: #212529;
}

</style>