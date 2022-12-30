<?php 
include'components/header.php';
?>
<html>
	<head>
        <title>Contact | City First</title>
    </head>
	<!-- Page Header Start End -->
	<div class="page__banner" data-background="assets/img/page1.jpg">
		<div class="container">
			<div class="row">
				<div class="col-xl-12">
					<div class="page__banner-content">
                        <span class="subtitle-two">City First</span>
						<ul>
							<li><a href="index.php">Home</a><span>|</span></li>
							<li>Contact</li>
						</ul>
						<h2>Get In Touch</h2>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Page Header Area End -->
	<!-- Contact Area Start -->
    <div class="contact__area section-padding">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6 xl-mb-30">
                    <div class="contact__area-left">
                        <div class="contact__area-title">
                            <span class="subtitle-two">Contact</span>
                            <span class="subtitle-one">Catch Us Here</span>
                            <h2>Find us here. Make real results happen.</h2>                        
                        </div>
                        <div class="row align-items-center mt-50">
                            <div class="col-sm-6 sm-mb-30">
                                <div class="contact__area-left-list">
                                    <div class="contact__area-left-list-item">
                                        <div class="contact__area-left-list-item-content">
                                            <p><a href="#">27 Division St, New York,<br>NY 10002, USA</a></p>
                                        </div>
                                        <div class="contact__area-left-list-item-icon">
                                            <i class="fal fa-map"></i>
                                        </div>
                                    </div>
                                    <div class="contact__area-left-list-item">
                                        <div class="contact__area-left-list-item-content">
                                            <p><a href="mailto:support@cityfirst.com">support@cityfirst.com</a></p>
                                        </div>
                                        <div class="contact__area-left-list-item-icon">
                                            <i class="fal fa-mail-bulk"></i>
                                        </div>
                                    </div>
                                    <div class="contact__area-left-list-item">
                                        <div class="contact__area-left-list-item-content">
                                            <p><a href="tel:1-888-351-3230">+1-888-351-3230</a></p>
                                            
                                        </div>
                                        <div class="contact__area-left-list-item-icon">
                                            <i class="fal fa-phone-alt"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="contact__area-left-hours" data-background="assets/img/bg/hours.jpg">
                                    <h4>Opening Hours</h4>
                                    <h6>Sat - Mon<span>10 AM - 8 PM</span></h6>
                                    <h6>Tus - Thu<span>11 AM - 7 PM</span></h6>
                                    <h6>Friday<span>Off - Day</span></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="contact__area-right">
                        <h4 class="mb-20">Ask Question</h4>
                        <form action="#">	
                            <div class="row">
                                <div class="col-sm-6 mb-25"> 
                                    <div class="contact__area-right-form-item">
                                        <i class="fal fa-user"></i>
                                        <input type="text" name="name" placeholder="Full Name" required="required">
                                    </div>										
                                </div>
                                <div class="col-sm-6 sm-mb-30">
                                    <div class="contact__area-right-form-item">
                                        <i class="fal fa-envelope"></i>
                                        <input type="text" name="email" placeholder="Email Address" required="required">											
                                    </div>									
                                </div>
                                <div class="col-sm-6 mb-25"> 
                                    <div class="contact__area-right-form-item">
                                        <i class="fal fa-phone-alt"></i>
                                        <input type="text" name="number" placeholder="Phone Number" required="required">
                                    </div>										
                                </div>
                                <div class="col-sm-6 sm-mb-30">
                                    <div class="contact__area-right-form-item">									
                                        <select name="select">
                                            <option value="1">General</option>
                                            <option value="2">Investment</option>
                                            <option value="3">Account</option>
                                            <option value="4">Card</option>
                                            <option value="5">Loan</option>
                                        </select>
                                    </div>	
                                </div>
                                <div class="col-sm-12 mb-25"> 
                                    <div class="contact__area-right-form-item">
                                        <i class="fal fa-pen"></i>
                                        <textarea name="message" placeholder="Question"></textarea>
                                    </div>										
                                </div>
                                <div class="col-sm-12">										
                                    <div class="contact__area-right-form-item">
                                        <button class="theme-btn3" type="submit" name="button">Submit<i class="fal fa-long-arrow-right"></i></button>
                                    </div>										
                                </div>
                            </div>							
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<!-- Contact Area End -->
	<?php include'components/footer.php'; ?>
</html>