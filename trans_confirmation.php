<?php
ob_start(); 
include 'components/h_dashboard.php';
?>

<html>
<?php 

        
        include 'db_connect.php';
        $cust_id = $_SESSION['customer_id']; 
        $sql="SELECT * FROM receivers_details ORDER BY id DESC ";
        $result = $conn->query($sql);
        $row2 = $result->fetch_assoc();
    
      

?>
<div id="main-wrapper"> 
  <!-- Content
  ============================================= -->
  <div id="content" class="py-4">
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-lg-6 col-xl-5 mx-auto">
          <div class="bg-light shadow-sm rounded p-3 p-sm-4 mb-4">
            <h3 class="text-5 text-center font-weight-400 mb-3">Confirm Transaction Details</h3>

            <!-- Send Money Confirm
            ============================================= -->
            <form id="form-send-money" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
              <div class="alert alert-info rounded shadow-sm py-3 px-4 px-sm-2 mb-4">
                <div class="row">
                  <p class="col-sm-5 opacity-7 text-sm-right mb-0 mb-sm-3">Account Name:</p>
                  <p class="col-sm-7"><?php echo $row2['accountname']; ?></p>
                </div>
                <div class="row">
                  <p class="col-sm-5 opacity-7 text-sm-right mb-0 mb-sm-3">Account Number:</p>
                  <p class="col-sm-7"><?php echo $row2['accountnumber']; ?></p>
                </div>
                <div class="row">
                  <p class="col-sm-5 opacity-7 text-sm-right mb-0">Bank Name:</p>
                  <p class="col-sm-7 mb-0"><?php echo $row2['bank_name']; ?></p>
                </div>
              </div>
              <h3 class="text-4 font-weight-400 mb-2">Transaction Amount</h3>
              <p class="mb-1 font-weight-400">Amount<span class="text-3 ms-1">$<?php echo $row2['amount']; ?></span></p>
              <p class="mb-1 font-weight-400">Fees <span class="text-3 ms-auto">Free</span></p>
              <hr>
              <p id="total" class="text-4 font-weight-500 mb-2">Total<span class="text-3 ms-1">$<?php echo $row2['amount']; ?></span></p>
              <a class="theme-btn3" style="margin-left: 8.5rem;" href="#" data-bs-target="#enter_pin" data-bs-toggle="modal">Confirm</a>
            </form>
            <!-- Send Money Confirm end --> 
          </div>
          <div id="enter_pin" class="modal fade" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title font-weight-400">Enter Pin</h5>
                  <button type="button" class="close font-weight-400" data-bs-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                </div>
                <div class="modal-body p-4">
                  <form id="enterPin" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                     <div class="form-group mb-3">
              <input type="password" id="pin" name="pin_no" required placeholder="e.g 1234" maxlength="4">
            </div>
            <button class="theme-btn3" style="margin-left: 8.5rem;" type="submit" name="enterpin">Confirm</button>
                  </form>
               </div>
            </div>
         </div>
      </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include'components/footer.php'; ?> 
</html> 

<?php


if(isset($_POST['enterpin'])){

   $pin_no = $_POST['pin_no'];


    if($pin_no == $_SESSION['pin']){                       //Session1

     $sender_ac_no = $_SESSION['acc_no'];   //Sender's Account_No     //SESSION2
     
     $amount = $_SESSION['amount'];  //Transfer Amount        //SESSION3
    

     //Receivers details require_onced for transaction
    $accountnumber = $_SESSION['accountnumber'];                   //SESSION4

    
    include 'db_connect.php';
   // $cust_id = $_SESSION['customer_Id']; 
  
   //Receivers details require_onced for transaction
   $accountnumber = $_POST['accountnumber'];
   $cust_id = $_SESSION['customer_id'];
   $sql = "SELECT * FROM receivers_details ";
   $result = $conn->query($sql);
   $row = $result->fetch_assoc();
   $receiver_ac_no = $row['accountnumber'];
   $receiver_name = $row['accountname'];
   
   
   //Senders Details require_onced for transaction 
   $sql = "SELECT * FROM customers WHERE acc_no = '$sender_ac_no' " ;
   $result = $conn->query($sql);
   $row = $result->fetch_assoc();
   $sender_custmr_id = $row['customer_id'];
   $sender_name = $row['username'];
   $sender_ac_no = $row['acc_no'];
   $sender_netbal = $row['balance'] - $amount;


      // Set autocommit to off
   $conn->autocommit(FALSE);
   
   //Subtract transferring amount from sender's available balance
   $sql1 = "Update customers SET balance ='$sender_netbal'  WHERE customers.acc_no = '$sender_ac_no' ";
   

   if($conn->query($sql1) == TRUE){
            
         $conn->commit();

            unset($_SESSION['pin']);
            unset($_SESSION['amount']);
            unset($_SESSION['accountnumber']);
            
         header('location:t_success.php');
                     
      }  

      else{
         
         
         echo "Transaction failed!\nPlease contact bank<br>".$conn->error;
         $conn->rollback();
      
         
        }
        
    }

    else{

        echo '<script>alert("Incorrect Pin\n\nPlease try again")</script>';
    }



}
?>