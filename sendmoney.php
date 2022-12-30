<html>
<head>
  <title>
    Customer Dashboard
  </title>
</head>
<body>
<?php 
ob_start();
include 'components/h_dashboard.php';
if($_SESSION['login'] != true){

  header('location:login.php');
  return 0;
  }
?>
<!-- Document Wrapper
============================================= -->
<div id="main-wrapper">
  
  <!-- Secondary menu
  ============================================= -->
  <div class="bg-dark">
    <div class="container d-flex justify-content-center">
      <ul class="nav nav-tabs secondary-nav" role="tablist">
        <li class="nav-item" role="presentation"> <a class="nav-link active" href="#send" aria-controls="profile" role="tab" data-bs-toggle="tab">Transfer Funds</a></li>
      </ul>
    </div>
  </div>
  <!-- Secondary menu end --> 
  <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="send">
  <!-- Content
  ============================================= -->
  <div id="content" class="py-4">
    <div class="container">
      <h2 class="font-weight-400 text-center my-3">Send Money</h2>
      <div class="row">
        <div class="col-md-8 col-lg-6 col-xl-5 mx-auto">
          <div class="bg-light shadow-sm rounded p-3 p-sm-4 mb-4">
            <form class="sendMoney" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <h3 class="text-5 font-weight-400 mb-3">Receipent Details</h3>
            <!-- Send Money Form
            ============================================= -->
            <div class="form-group mb-3">
                      <label for="custid">Customer ID</label>
                      <input type="text" class="form-control" data-bv-field="custid" id="custId" name="custid" required value="" placeholder="Enter Customer ID" maxlength="7" minlength="7">
                    </div>
            <div class="form-group mb-3">
                      <label for="BankName">Bank Name</label>
                      <select class="nice-select wide" id="BankName" name="bank_name" required>
                        <option value=""> Please Select </option>
                        <option value="HSBC">HSBC</option>
                        <option value="wema">Wema Bank</option>
                        <option value="UBA">UBA</option>
                        <option value="Chase">Chase</option>
                        <option value="CitiBank">Citi Bank</option>
                        <option value="Bank of America">Bank of America</option>
                        <option value="Credit Union">Credit Union</option>
                        <option value="Suntrust">Suntrust Bank</option>
                        <option value="Wells Fargo">Wells Fargo</option>
                        <option value="Fidelity">Fidelity Bank</option>
                        <option value="Access">Access Bank</option>
                        <option value="sterling">Sterling Bank</option>
                        <option value="PNR">PNR</option>
                        <option value="truist">Truist</option>
                        <option value="Goldman Sachs">Goldman Sachs</option>
                        <option value="TD Bank">TD Bank</option>
                        <option value="Capital One">Capital One</option>
                        <option value="Citizens Bank">Citizens Bank</option>
                        <option value="Fifth Third Bank">Fifth Third Bank</option>
                        <option value="First Republic Bank">First Republic Bank</option>
                        <option value="Key Bank">Key Bank</option>
                        <option value="BMO Harris Bank">BMO Harris Bank</option>
                        <option value="Ally Bank">Ally Bank</option>
                        <option value="American Express National Bank">American Express National Bank</option>
                        <option value="Regions Bank">Regions Bank</option>
                      </select>
                    </div>
                    <div class="form-group mb-3">
                      <label for="accountName">Account Name</label>
                      <input type="text" class="form-control" data-bv-field="accountName" id="accountName" name="accountname" required value="" placeholder="Enter Account Name">
                    </div>
                    <div class="form-group mb-3">
                      <label for="accountNumber">Account Number</label>
                      <input type="text" class="form-control" data-bv-field="accountNumber" id="accountNumber" name="accountnumber" required value="" placeholder="Enter Account Number" maxlength="10" minlength="10">
                    </div>
              <div class="form-group mb-3">
                <label for="amount">Amount</label>
                  <div class="input-group"> <span class="input-group-text">$</span>
                  <input type="text" class="form-control" data-bv-field="amount" id="amount" name="amount" value="" placeholder="Enter Amount" required>
              </div>
            </div>
            <div class="form-group mb-3">
                <label for="remarks">Remarks</label>
                  <textarea type="text" class="form-control" data-bv-field="remarks" id="remarks" name="remarks" value="" placeholder=""></textarea>
            </div>
              <div class="form-check custom-control custom-checkbox mb-3">
                      <input id="remember-me" name="remember" class="custom-control-input" type="checkbox" required>
                      <label class="custom-control-label" for="remember-me">I confirm the bank account details above</label>
                    </div>
              <button class="theme-btn3" style="margin-left: 8rem;" type="submit" name="send">Continue</button>
            </form>
            <!-- Send Money Form end --> 
          </div>
        </div>
      </div>
    </div>
    </div>
  </div>
         
  <!-- Content end --> 
  </div>    
</div>
<!-- Document Wrapper end --> 

<?php include'components/footer.php'; ?>
</body>
</html>

<?php

  if(isset($_POST['send'])) {


    if(!is_numeric($_POST['amount'])){

      echo '<script>alert("Invalid Amount")</script>';
   } 

                     //Session1

    else{ 

     $custid = $_POST['custid'];

      if($custid !== $_SESSION['customer_id']){
        
        echo '<script>alert("Invalid ID")</script>';

      }
      else{  

      
   $sender_ac_no = $_SESSION['acc_no'];  //Sender's Account_No

   $_SESSION['amount'] = $amount = $_POST['amount'];  

   include 'db_connect.php';

   //Receivers account number
   $_SESSION['accountnumber'] = $accountnumber = $_POST['accountnumber'];

   //Check Senders Minimum balance
   $sql = "SELECT * FROM customers WHERE acc_no = '$sender_ac_no' " ;
   $result = $conn->query($sql);
   $row = $result->fetch_assoc();
   $_SESSION['email'] = $sender_email = $row['email'];
   $sender_name = $row['username'];
   if($row['balance'] < $amount){

      echo '<script>alert("Insufficient Funds")
                  location="sendmoney.php";    
                  </script>';

   
   }else{


    $sql1 = "SELECT pin FROM customers WHERE acc_no = '$sender_ac_no' ";
    $result = $conn->query($sql1);
    $row = $result->fetch_assoc();
    if (($result->num_rows) == true) {

   $_SESSION['pin'] = $pin = $row['pin'];  
       // receive all input values from the form
   //you can session custid instead of inputing directly.
  $custid =$_POST['custid'];
  $bank_name = $_POST['bank_name'];
  $accountname = $_POST['accountname'];
  $accountnumber = $_POST['accountnumber'];
  $amount = $_POST['amount'];
  $remarks = $_POST['remarks'];

  date_default_timezone_set('America/Los_Angeles'); 
  $_date_added = date("d/m/y h:i:s A");

  $trans_id = mt_rand(100,999).mt_rand(1000,9999).mt_rand(10,99);

  $trans_description = $accountname ."/".$accountnumber."/".$bank_name;

  // Finally, register user if there are no errors in the form
    $sql = "INSERT INTO receivers_details (custid, bank_name, accountname, accountnumber, amount, remarks, trans_id, trans_description, date_added) 
          VALUES('$custid', '$bank_name', '$accountname', '$accountnumber', '$amount', '$remarks', '$trans_id', '$trans_description', '$_date_added')";

          $conn->query($sql);

    header('location:trans_confirmation.php');

  } else{
    echo '<script>alert("Transaction Error")</script>';
  }

 }
}
}
}
?>