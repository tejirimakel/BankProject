<?php 
include'components/header.php';
?>
<html>
    <head>
        <title>Accounts | City First</title>
    </head>
    <!-- Page Header Start End -->
    <div class="page__banner" data-background="assets/img/page2.jpg">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="page__banner-content">
                        <span class="subtitle-two">City First</span>
                        <ul>
                            <li><a href="index.php">Home</a><span>|</span></li>
                            <li>Accounts</li>
                        </ul>
                        <h2>Account Opening <br> Form</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header Area End -->
        
        <!-- Start Open Account Banner -->
        <section class="open-account-area pt-50 pb-100">
            <div class="container">
                <div class="open-account-form">
                    <form action="acc_confirmation.php" method="post">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>Full name</label>
                                    <input type="text" class="form-control" name="fullName" placeholder="Full name">
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>Account type</label>
                                    <select>
                                        <option value="">Please select</option>
                                        <option value="savings">Savings</option>
                                        <option value="checking">Checking</option>
                                    </select>	
                                </div>
                            </div>
                            
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>Date of birth</label>
                                    <input type="text" class="form-control" name="dob" placeholder="dd/mm/yy">
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>Gender</label>
                                    <select>
                                        <option value="m">Male</option>
                                        <option value="f">Female</option>
                                    </select>	
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>Marital Status</label>
                                    <select>
                                        <option value="S">Single</option>
                                        <option value="M">Married</option>
                                        <option value="D">Divorced</option>
                                    </select>   
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>Nationality</label>
                                    <input type="text" class="form-control" name="nationality" placeholder="Nationality">
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>Occupation</label>
                                    <input type="text" class="form-control" name="occupation" placeholder="Occupation">
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>Mobile number</label>
                                    <input type="text" class="form-control" name="mobile" placeholder="Mobile number">
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>Email address</label>
                                    <input type="text" class="form-control" name="email" placeholder="Email address">
                                </div>
                            </div>
                            
                            <div class="col-lg-12">
                                <h3>Address</h3>
                                
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="street" placeholder="Street address">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="city" placeholder="City">
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="state" placeholder="State / Province">
                                        </div>
                                    </div>
        
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="zip" placeholder="Postal / Zip code">
                                        </div>
                                    </div>
        
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <select>
                                                <option value="">Country</option>
                                                <option value="">England</option>
                                                <option value="">Australia</option>
                                            </select>	
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="banner-form-btn">
                                    <button type="submit" name="account" class="theme-btn3">
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <!-- End Open Account Banner -->
        <?php include'components/footer.php'; ?>
</html>