<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
  <meta name="author" content="Coderthemes">

  <link rel="shortcut icon" href="assets/images/favicon.ico">

  <title>لوحة التحكم</title>

  <!--Morris Chart CSS -->
  <link rel="stylesheet" href="assets/plugins/morris/morris.css">
  <!-- DataTables -->
  <link href="assets/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
  <link href="assets/plugins/datatables/buttons.bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="assets/plugins/datatables/fixedHeader.bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="assets/plugins/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="assets/plugins/datatables/scroller.bootstrap.min.css" rel="stylesheet" type="text/css" />

  <!-- App css -->
  <link href="assets/css/bootstrap-rtl.min.css" rel="stylesheet" type="text/css" />
  <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
  <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
  <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
  <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
  <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
  <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />

  <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
  <!-- google fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300&display=swap" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.js"></script>

  <script src="assets/js/modernizr.min.js"></script>

  <!-- Chart -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
  <style media="screen">
  *,
  h4 {
    font-family: 'Cairo', sans-serif;
  }

  .center {
    text-align: center;
  }

  #snackbar {
    visibility: hidden;
    min-width: 250px;
    margin-left: -125px;
    background-color: #13a802;
    color: #fff;
    text-align: center;
    border-radius: 2px;
    padding: 16px;
    position: fixed;
    z-index: 1;
    left: 50%;
    bottom: 30px;
    font-size: 17px;
  }

  #snackbar.show {
    visibility: visible;
    -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
    animation: fadein 0.5s, fadeout 0.5s 2.5s;
  }

  @-webkit-keyframes fadein {
    from {
      bottom: 0;
      opacity: 0;
    }

    to {
      bottom: 30px;
      opacity: 1;
    }
  }

  @keyframes fadein {
    from {
      bottom: 0;
      opacity: 0;
    }

    to {
      bottom: 30px;
      opacity: 1;
    }
  }

  @-webkit-keyframes fadeout {
    from {
      bottom: 30px;
      opacity: 1;
    }

    to {
      bottom: 0;
      opacity: 0;
    }
  }

  @keyframes fadeout {
    from {
      bottom: 30px;
      opacity: 1;
    }

    to {
      bottom: 0;
      opacity: 0;
    }
  }
  </style>
</head>
<?php
include 'Database.php';
$db = new Database();
$SESSION = $_SESSION['name'];
if (isset($_SESSION['id'])) { ?>

<?php } else { ?>
<meta http-equiv="refresh" content="0;URL='login.php'" />
<?php }
?>

<body class="fixed-left">

  <!-- Begin page -->
  <div id="wrapper">

    <!-- Top Bar Start -->
    <div class="topbar">

      <!-- LOGO -->
      <div class="topbar-left">
        <a href="dashboard.php" class="logo"><span> ميتا <span> ستور </span></span><i class="zmdi zmdi-layers"></i></a>
      </div>

      <!-- Button mobile view to collapse sidebar menu -->
      <div class="navbar navbar-default" role="navigation">
        <div class="container">

          <!-- Page title -->
          <ul class="nav navbar-nav navbar-left">
            <li>
              <button class="button-menu-mobile open-left">
                <i class="zmdi zmdi-menu"></i>
              </button>
            </li>
            <li>
              <h4 class="page-title">الرئيسية</h4>
            </li>
          </ul>

          <!-- Right(Notification and Searchbox -->
          <!--  -->

        </div><!-- end container -->
      </div><!-- end navbar -->
    </div>
    <!-- Top Bar End -->


    <!-- ========== Left Sidebar Start ========== -->
    <div class="left side-menu">
      <div class="sidebar-inner slimscrollleft">

        <!-- User -->
        <div class="user-box">
          <div class="user-img">
            <img src="assets/images/users/avatar-1.jpg" alt="user-img" title="Mat Helme"
              class="img-circle img-thumbnail img-responsive">
            <div class="user-status offline"><i class="zmdi zmdi-dot-circle"></i></div>
          </div>
          <h5><a href="#"><?= $SESSION ?></a> </h5>
          <ul class="list-inline">
            <li>
              <a href="#">
                <i class="zmdi zmdi-settings"></i>
              </a>
            </li>

            <li>
              <a href="../logoutPage.php" class="text-custom">
                <i class="zmdi zmdi-power"></i>
              </a>
            </li>
          </ul>
        </div>
        <!-- End User -->

        <!--- Sidemenu -->
        <div id="sidebar-menu">
          <ul>
            <li class="text-muted menu-title">القائمة</li>

            <li>
              <a href="dashboard.php" class="waves-effect"><i class="zmdi zmdi-view-dashboard"></i> <span> الرئيسية
                </span> </a>
            </li>
            <li>
              <a href="categories.php" class="waves-effect"><i class="ti-folder"></i> <span> التصنيفات الرئيسية
                </span> </a>
            </li>
            <li>
              <a href="Subcategory.php" class="waves-effect"><i class="ti-folder"></i> <span> التصنيفات الفرعية
                </span> </a>
            </li>
            <li>
              <a href="products.php" class="waves-effect"><i class="ti-folder"></i> <span> المنتجات 
                </span> </a>
            </li>
            <li>
              <a href="order.php" class="waves-effect"><i class="ti-folder"></i> <span> عروض الطلبات 
                </span> </a>
            </li>
            <li>
              <a href="banners.php" class="waves-effect"><i class="ti-folder"></i> <span> البنرات  
                </span> </a>
            </li>
            
           
            <li>
              <a href="users.php" class="waves-effect"><i class="ti-user"></i> <span> المستخدمين  
                </span> </a>
            </li>            
           
            <li>
              <a href="bank.php" class="waves-effect"><i class="ti-control-record"></i><span>بيانات البنك</span></a>
            </li>
            <li>
              <a href="soucal.php" class="waves-effect"><i class="ti-control-record"></i><span>بيانات السوشل ميديا</span></a>
            </li>
            <!-- <li>
              <a href="email.php" class="waves-effect"><i class="ti-control-record"></i><span>ايميل</span></a>
            </li>
            <li>
              <a href="maeruf.php" class="waves-effect"><i class="ti-control-record"></i><span> معروف
                </span></a>
            </li>
            <li>
              <a href="eidt-aldariba.php" class="waves-effect"><i class="ti-control-record"></i><span>الضريبة </span></a>
            </li> -->
            <li>
              <a href="bots.php" class="waves-effect"><i class="ti-control-record"></i><span> بيانات الارسال (تلجرام) </span></a>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <!-- Sidebar -->
        <div class="clearfix"></div>

      </div>

    </div>
    <!-- Left Sidebar End -->
    <div class="content-page">
      <!-- Start content -->
      <div class="content">
        <div class="container">