<?php 
include 'components/h_dashboard.php';


if($_SESSION['login'] == FALSE)
{
   header('location:login.php');

}

?>

<html>
    <head>
        <title>loan | City First</title>
        <link rel="stylesheet" type="text/css" href="assets/css/elegant-icons.min.css" media="all" />
    <link rel="stylesheet" type="text/css" href="assets/css/jquery-editable-select.css" media="all" />
    <link rel="stylesheet" type="text/css" href="assets/css/jquery.fancybox.min.css" media="all" />
    <link rel="stylesheet" type="text/css" href="assets/css/nouislider.min.css" media="all" />
    <link rel="stylesheet" type="text/css" href="assets/css/default.css" media="all" />
    <link rel="stylesheet" type="text/css" href="assets/css/styles.css" media="all" />
    </head>
    <main>
    <section class="banner-area-2 loan-banner pt-145" style="background-image: url(assets/img/mapbg.jpg)">
            <div class="container">
                <div class="row align-items-center  pt-165 pb-200">
                    <div class="col-lg-7 mx-auto">
                        <div class="banner-content text-center">
                            <div class="section-title">
                                <h1 class="wow fadeInUp">Get your loan approved in 3 steps</h1>
                            </div>
                            <a class="theme-btn3 mt-4" data-wow-delay='0.2s'
                                href="loan-details.php">
                                Get started <i class="arrow_right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="row position-relative pt-70 d-lg-block d-none">
                    <div class="col-md-12">
                        <div class="floated-widget">
                            <div class="row gy-4 gy-lg-0 gx-5">
                                <div class="col-lg-4 border-end">
                                    <div class="steps-widget pr-30 pl-30 wow fadeInUp" data-wow-delay="0.1s">
                                        <img src="assets/img/steps/icon-1.png" alt="icon">
                                        <h4><a href="#">Check Eligibility</a></h4>
                                        <p>Select your loan amount, answer a few questions and get instant loan amount
                                        </p>
                                    </div>
                                </div>
                                <div class="col-lg-4  border-end">
                                    <div class="steps-widget pr-30 pl-30 wow fadeInUp" data-wow-delay="0.3s">
                                        <img src="assets/img/steps/icon-2.png" alt="icon">
                                        <h4><a href="#">Submit Documents</a></h4>
                                        <p>Share required documents with our representative hassle-free
                                        </p>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="steps-widget pr-30 pl-30 wow fadeInUp" data-wow-delay="0.5s">
                                        <img src="assets/img/steps/icon-3.png" alt="icon">
                                        <h4><a href="#">Approval in Principle</a></h4>
                                        <p>Choose the final sanctioned loan offer with the terms that work best for you
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Banner end -->

        <!-- Emi Calculator start -->
        <section class="pt-140 pb-140 bg_white">
            <div class="container">
                <div class="row ">
                    <div class="col-lg-6 mx-auto">
                        <div class="section-title">
                            <h2 class="wow fadeInUp">Calculator</h2>
                            <p class="wow fadeInUp" data-wow-delay="0.3s">Get an approximate figure for the total
                                monthly instalment payments along with a complete
                                break-up of the home loan.</p>
                        </div>
                    </div>
                </div>
                <div class="calculator-widget mt-50">
                    <div class="row  gy-lg-0 gy-3">
                        <div class="col-lg-7">
                            <div class="single-calculator-widget wow fadeInUp" data-wow-delay="0.1s">
                                <div class="single-range">
                                    <div class="range-header d-flex justify-content-between align-items-center mb-25">
                                        <h6>Loan Amount</h6>

                                        <input type="text" id="SetRange">
                                    </div>
                                    <div id="RangeSlider"></div>
                                </div>
                                <div class="single-range mt-85 mb-95">
                                    <div
                                        class="range-header d-flex flex-wrap justify-content-between align-items-center mb-25">
                                        <h6>Loan Duration</h6>


                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                            <li><span class="active_bar"></span></li>
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link active month-tab" id="monthTab" data-bs-toggle="tab"
                                                    href="#monthTabId" role="tab" aria-controls="monthTabId"
                                                    aria-selected="true">Month</a>
                                            </li>
                                            <li class="nav-item " role="presentation">
                                                <a class="nav-link year-tab" id="yearTab" data-bs-toggle="tab"
                                                    href="#yearTabId" role="tab" aria-controls="yearTabId"
                                                    aria-selected="false">Year</a>
                                            </li>

                                        </ul>

                                        <input type="text" id="SetMonthRange">
                                    </div>


                                    <div class="tab-content">
                                        <div class="tab-pane fade show active" id="monthTabId" role="tabpanel"
                                            aria-labelledby="monthTab">

                                            <div id="MonthRangeSlider"></div>
                                        </div>
                                        <div class="tab-pane fade" id="yearTabId" role="tabpanel"
                                            aria-labelledby="yearTab">

                                            <div id="YearRangeSlider"></div>
                                        </div>

                                    </div>
                                </div>

                                <div class="bg_disable px-4 py-2 mb-5 interestBox">
                                    <p>Rate of Interest</p>
                                    <span id="InterestAmount"></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-5 pl-lg-35">
                            <div class="calculator-result-widget bg_disable wow fadeInUp" data-wow-delay="0.3s">

                                <div class="row align-items-center">
                                    <div class="col-lg-7 col-md-8 col-sm-7">
                                        <div class="emi-amount">
                                            <h6>EMI Amount</h6>
                                            <span>Principal + Interest</span>
                                            <p class="mt-10" id="TotalAmount"></p>
                                        </div>
                                        <div class="interest-payable mt-20">
                                            <h6>Interest Payable</h6>
                                            <p class="mt-10" id="InterestPayable"></p>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-md-4 col-sm-5 col-7 mx-auto">
                                        <svg class="radial-progress" id="LoanGraph" viewBox="0 0 80 80">
                                            <circle class="incomplete" cx="40" cy="40" r="35"></circle>
                                            <circle class="complete" cx="40" cy="40" r="30"></circle>
                                        </svg>
                                    </div>
                                </div>
                                <div class="row mt-lg-60 mt-25 text-center">
                                    <div class="col-12">
                                        <h4 class="mb-1">Your EMI Amount</h4>
                                        <h1 class="m-0" id="emiAmount">$ 3,495*</h1>

                                        <a href="personal-details.php" class="theme-btn3 theme-btn-lg mt-40">Apply Now
                                            <i class="arrow_right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
        <!-- Emi Calculator end -->
        <?php include'components/footer.php'; ?>
</html>