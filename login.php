<?php  include "controlPanel/Database.php";
    $db = new Database();
    $errMessage = "";
    if(isset($_POST['signin']))
    {
        $result = $db->doLogin();

        if($result != '')
            $errMessage = $result;
    }



?>
<!DOCTYPE html>
<html lang="en" dir="rtl">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <!-- App Favicon -->
        <link rel="shortcut icon" href="controlPanel/assets/images/favicon.ico">

        <!-- App title -->
        <title>تسجيل دخول</title>

        <!-- App CSS -->
        <link href="controlPanel/assets/css/bootstrap-rtl.min.css" rel="stylesheet" type="text/css" />
        <link href="controlPanel/assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="controlPanel/assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="controlPanel/assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="controlPanel/assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="controlPanel/assets/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="controlPanel/assets/css/responsive.css" rel="stylesheet" type="text/css" />

        <!-- google font -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300&display=swap" rel="stylesheet">

        <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="controlPanel/assets/js/modernizr.min.js"></script>
        <style media="screen">
          *{
            font-family: 'Cairo', sans-serif !important;
          }
          .red{
            color: red;
          }
        </style>
    </head>
    <body>

        <div class="account-pages"></div>
        <div class="clearfix"></div>
        <div class="wrapper-page">
            <div class="text-center">
                <a href="index.html" class="logo"><span>ميتا <span>ستور </span></span></a>
                <!-- <h5 class="text-muted m-t-0 font-600">Responsive Admin Dashboard</h5> -->
            </div>
        	<div class="m-t-40 card-box">
                <div class="text-center">
                    <h4 class="text-uppercase font-bold m-b-0">تسجيل دخول</h4>
                    <h4 class="text-uppercase font-bold m-b-0 red"><?=  $errMessage ?></h4>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal m-t-20" method="post" >

                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input class="form-control" name="txtUserName" type="text" required="" placeholder="اسم المستخدم">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control " name="txtPassword" type="password" required="" placeholder="كلمة المرور">
                            </div>
                        </div>

                        <!-- <div class="form-group ">
                            <div class="col-xs-12">
                                <div class="checkbox checkbox-custom">
                                    <input id="checkbox-signup" type="checkbox">
                                    <label for="checkbox-signup">
                                        Remember me
                                    </label>
                                </div>

                            </div>
                        </div> -->

                        <div class="form-group text-center m-t-30">
                            <div class="col-xs-12">
                                <button name="signin" class="btn btn-custom btn-bordred btn-block waves-effect waves-light" type="submit">دخول</button>
                            </div>
                        </div>

                        <!-- <div class="form-group m-t-30 m-b-0">
                            <div class="col-sm-12">
                                <a href="page-recoverpw.html" class="text-muted"><i class="fa fa-lock m-r-5"></i> Forgot your password?</a>
                            </div>
                        </div> -->
                    </form>

                </div>
            </div>
            <!-- end card-box-->

            <!-- <div class="row">
                <div class="col-sm-12 text-center">
                    <p class="text-muted">Don't have an account? <a href="page-register.html" class="text-primary m-l-5"><b>Sign Up</b></a></p>
                </div>
            </div> -->

        </div>
        <!-- end wrapper page -->



    	<script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="controlPanel/assets/js/jquery.min.js"></script>
        <script src="controlPanel/assets/js/bootstrap-rtl.min.js"></script>
        <script src="controlPanel/assets/js/detect.js"></script>
        <script src="controlPanel/assets/js/fastclick.js"></script>
        <script src="controlPanel/assets/js/jquery.slimscroll.js"></script>
        <script src="controlPanel/assets/js/jquery.blockUI.js"></script>
        <script src="controlPanel/assets/js/waves.js"></script>
        <script src="controlPanel/assets/js/wow.min.js"></script>
        <script src="controlPanel/assets/js/jquery.nicescroll.js"></script>
        <script src="controlPanel/assets/js/jquery.scrollTo.min.js"></script>

        <!-- App js -->
        <script src="controlPanel/assets/js/jquery.core.js"></script>
        <script src="controlPanel/assets/js/jquery.app.js"></script>

	</body>
</html>
