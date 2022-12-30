<?php
ob_start();
session_start();
if(isset($_SESSION['login'])){
  
  header('location:dashboard.php') ;
  
}


 ?>
 <html>
<head>
<title>Login Page</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <!-- font awesome -->
  <link rel="stylesheet" href="assets/css/all.css">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="assets/sass/style.css">
  <link rel="stylesheet" href="assets/css/login.css">
</head>
  <section style="margin-top: 5rem; margin-bottom: 10rem;">
  <div class="container">
   
    <!-- Login Form
    ============================================= -->
    <div class="row no-gutters">
      <div class="col-11 col-sm-9 col-md-7 col-lg-5 col-xl-4 m-auto">
        <div class="logo mb-4 text-center"> <a href="index.php" title="City First"><img src="assets/img/logo.png" alt="City First Bank"></a> </div>
        <?php include'errors.php'; ?>
        <form id="loginForm" action="login.php" method="post">
          <div class="col d-flex">
            <div class="input-group mb-3 justify-content-center ">
              <span class="input-group-text"><i class="fas fa-user"></i></span>
            <div class="form-group">  
              <input type="text" id="loginId" name="customerId" placeholder="Customer ID No." required="">
            </div>
            </div>
           </div> 
           <div class="col d-flex">
            <div class="input-group mb-3 justify-content-center">
              <span class="input-group-text"><i class="fas fa-key"></i></span>
            <div class="form-group">
              <input type="password" id="loginPass" name="password" required placeholder="Password">
            </div>
          </div>
        </div>
          <div class="form-group mx-auto d-flex justify-content-center">
          <button class="theme-btn3" type="submit" name="login_btn">Login</button>
          </div>
        </form>
        <p class="text-center"><a href="forgetPassword.php">Forgot Password?</a></p>
      </div>
    </div>
  </div>
</section>
<?php include'components/footer1.php';?>
</html>
<?php include 'login_process.php'?>

