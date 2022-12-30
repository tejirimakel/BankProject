<?php 
session_start();
ob_start();
if($_SESSION['login'] != true)
{
    header('location:login.php');
}   
?>

<link href="https://fonts.googleapis.com/css?family=Arimo:400,400i,700,700i&display=swap" rel="stylesheet">
<!-- Stylesheets -->
<link rel="stylesheet" href="assets/css/stylesheet.css">
<link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" href="assets/css/responsive.css">
<link href="assets/css/flaticon.css" rel="stylesheet">
<link href="assets/css/color.css" rel="stylesheet">

<link rel="stylesheet" href="assets/currency-flags/css/currency-flags.css" />
<link rel="stylesheet" href="assets/daterangepicker/daterangepicker.css" />
<link rel="icon" type="image/png" href="assets/img/favicon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- font awesome -->
    <link rel="stylesheet" href="assets/css/all.css">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="assets/css/animate.css">
    <!-- Nice Select CSS -->
    <link rel="stylesheet" href="assets/css/nice-select.css">
    <!-- Swiper -->
    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">
    <!-- Magnific -->
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <!-- Mean menu -->
    <link rel="stylesheet" href="assets/css/meanmenu.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/sass/style.css">

    <!-- Preloader start -->
    <div class="theme-loader">
        <div class="spinner">
            <div class="double-bounce1"></div>
            <div class="double-bounce2"></div>
        </div>
    </div>

    <!-- main header -->
    <header class="main-header style-four">
        <div class="header-lower">
            <nav class="navbar navbar-expand-md navbar-light">
            <div class="container-fluid">
                <a class="navbar-brand"
                    href="#"><img src="assets/img/logo.png" alt="City First Bank">
                </a>

                        <!--Mobile Navigation Toggler-->
                        <div class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="mobile-nav-toggler">
                            <i class="icon-bar"></i>
                            <i class="icon-bar"></i>
                            <i class="icon-bar"></i>
                            </span>
                        </div>

                        
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav me-auto mb-2 mb-lg-0 navigation">
                                    <li><a href="dashboard.php">Account</a></li>
                                    <li><a href="transaction.php">Transactions</a></li>
                                    <li><a href="sendmoney.php">Send/Receive</a></li>
                                    <li><a href="loan.php">Loan</a></li>         
                                </ul>
                                
                            </div>
                            <div class="setting">
                                <a href="profile.php"><i style="color: #da2c47;" class="fas fa-cog"></i></a>
                            </div>
                            <div class="btn-box">
                                <a href="logout.php" class="theme-btn3">Sign Out</a>
                            </div>
                        </div>
                        </nav>
                            
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- main-header end -->

    