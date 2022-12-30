<?php 
include'components/header.php';
?>
<html>
<head>
        <title>About | City First</title>
        <link rel="stylesheet" type="text/css" href="assets/css/elegant-icons.min.css" media="all" />
    <link rel="stylesheet" type="text/css" href="assets/css/jquery-editable-select.css" media="all" />
    <link rel="stylesheet" type="text/css" href="assets/css/jquery.fancybox.min.css" media="all" />
    <link rel="stylesheet" type="text/css" href="assets/css/nouislider.min.css" media="all" />
    <link rel="stylesheet" type="text/css" href="assets/css/default.css" media="all" />
    <link rel="stylesheet" type="text/css" href="assets/css/styles.css" media="all" />
    </head>
<!-- Page Header Start End -->
	<div class="page__banner" data-background="assets/img/page.jpg">
		<div class="container">
			<div class="row">
				<div class="col-xl-12">
					<div class="page__banner-content">
                        <span class="subtitle-two">City First</span>
						<ul>
							<li><a href="index.php">Home</a><span>|</span></li>
							<li>About us</li>
						</ul>
						<h2>About us</h2>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Page Header Area End -->       
	<!-- About Area Start -->
	<div class="about__area section-padding">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-xl-6 col-lg-6 lg-mb-30">
					<div class="about__area-left">
						<div class="about__area-left-image">
							<img src="assets/img/about/about.jpg" alt="">
							<div class="about__area-left-image-content">
								<div class="about__area-left-image-content-icon">
									<img src="assets/img/icon/award.png" alt="">
								</div>
								<h2 class="counter">30</h2>
								<span>Years Experience</span>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-6 col-lg-6">
					<div class="about__area-right">
						<div class="about__area-right-title">
							<span class="subtitle-two">About</span>
							<span class="subtitle-one">About Us</span>
							<h2>The Misson Statement</h2>
							<p>We are driven to explore new solutions and bring the best products and services available to all our Members</p>
						</div>
						<div class="about__area-right-list">
							<h5><i class="fal fa-check"></i>Earn 3% CashBack</h5>
							<h5><i class="fal fa-check"></i>Financial Advices</h5>
							<h5><i class="fal fa-check"></i>Manage Investment</h5>
							<h5><i class="fal fa-check"></i>Personal Loan</h5>
							<h5><i class="fal fa-check"></i>Business Loan</h5>
						</div>
						<div class="about__area-right-bottom">
							<div class="about__area-right-bottom-item">
								<a class="theme-btn1" href="contact.php">Get In Touch<i class="fal fa-long-arrow-right"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- About Area End -->
	<!-- Call To Action start -->
        <section class="cta-3 pt-90 pb-75">
            <div class="img-shapes">
                <div class="shape" data-parallax='{"x": 0, "y": 0, "rotateZ":20}'>
                    <img src="assets/img/card/right-arrow.png" alt="img">
                </div>

                <div class="shape" data-parallax='{"x": 200, "y": 90, "rotateZ":0}'>
                    <div class="fly-msg">
                        <img src="assets/img/card/mail.png" alt="">
                        <img src="assets/img/card/wings-1.png" alt="">
                        <img src="assets/img/card/wings-2.png" alt="">
                    </div>
                </div>
                <div class="shape" data-parallax='{"x": 0, "y": 0, "rotateZ":-6}'>
                    <img class="wow fadeInRight" src="assets/img/card/postbox.png" alt="img">
                </div>
                <div class="shape" data-parallax='{"x": -200, "y": 0, "rotateZ":0}'>
                    <img src="assets/img/card/cloud.png" alt="img">
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="cta-content text-black wow fadeInLeft">
                            <h5>Want to know about our offers first?</h5>
                            <h2>Subscribe our newsletter</h2>

                            <div class="input-group mt-40">
                                <input type="email" class="form-control" placeholder="Your  email address">
                                <a href="#" class="input-append theme-btn theme-btn-lg">Subscribe</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Call To Action end -->
	 <?php include'components/footer.php'; ?>
	</html>