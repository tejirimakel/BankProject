<?php 
include 'components/h_dashboard2.php';
if($_SESSION['login'] == FALSE ){

header("location:login.php");

}
?>

<html>
<?php 

        
        include 'db_connect.php'; 
        $sql="SELECT * FROM receivers_details ORDER BY id DESC ";
        $result = $conn->query($sql);
        $row2 = $result->fetch_assoc();
    
      

?>

<!-- Preloader -->
<div class="loader-wrap">
        <span class="logo-preloader">Transaction in progress</span>       
    </div>
<!-- Preloader End --> 
<style>

  .logo-preloader{
    text-align: center;
  font-size: 20pt;
  position: absolute;
  top: 60%;
  left: 42%;
  color: #fff;
}

@media(max-width: 991px){
  .logo-preloader {
    font-size: 17pt;
    left:30%;
    top:40%;
    position: absolute;

  }
}
  .logo-preloader{
  -webkit-animation: fadeimg 1s infinite linear;
  animation: fadeimg 1s infinite linear;
  }
@-webkit-keyframes fadeimg{
  0% {opacity:1;}
  50% {opacity:0;}
  100% {opacity:1;}
  }
@keyframes fadeimg{
  0% {opacity:1;}
  50% {opacity:0;}
  100% {opacity:1;}
  }
</style>

<div id="content" class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-lg-6 col-xl-5 mx-auto">
          <!-- Send Money Success
          ============================================= -->
		  <div class="bg-light shadow-sm rounded p-3 p-sm-4 mb-4">
          <div class="text-center my-5">
          <p class="text-center text-success text-20 line-height-07 mb-2"><i class="fas fa-check-circle"></i></p>
          <p class="text-center text-success text-8 line-height-07 mb-3">Success!</p>
          <p class="text-center text-4">Transactions Complete</p>
          </div>
          <p class="text-center text-3 mb-4">You've Succesfully sent <span class="text-3 font-weight-500">$<?php echo $row2['amount'];?></span> to <span class="font-weight-500"><?php echo $row2['accountname'];?></span><br><span class="font-weight-500"></span><?php echo $row2['bank_name'];?>/<span class="font-weight-500"></span><?php echo $row2['accountnumber']; ?></p>
            <button class="theme-btn3" style="margin-left: 6.3rem;"><a style="color:#fff;" href="sendmoney.php">Send Money Again</a></button> 
          </div>
        </div>
      </div>
    </div>
  </div>
<?php include'components/footer2.php'; ?> 

</html> 