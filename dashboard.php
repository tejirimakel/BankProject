<?php 
include 'components/h_dashboard.php';

if($_SESSION['login'] == FALSE)
{
	 header('location:login.php');

}

?>

<html>
<head>
	<title>
		Customer Dashboard
	</title>

</head>
<body>


<?php 
        $cust_id= $_SESSION['customer_id'];
        include 'db_connect.php'; 
        $sql="SELECT * FROM customers where customer_id= '$cust_id' ";
		$result = $conn->query($sql);
        $row1 = $result->fetch_assoc();
        $bal = $row1['balance'];
?>
<!-- Document Wrapper   
============================================= -->
<div id="main-wrapper"> 
 
  <!-- Header End -->
  
  <!-- Content
  ============================================= -->
  <div id="content" class="pt-4">
    <div class="container">
      <div class="row">
        <!-- Left Panel
        ============================================= -->
        <aside class="col-lg-3">
          
          <!-- Profile Details
          =============================== -->

            <div class="bg-light shadow-sm rounded text-center p-3 mb-4">
           <?php echo  "<div class='profile-thumb mt-3 mb-4'> <img class='rounded-circle' width='100' height='100' src='assets/images/".$row1['photo']."' alt='".$row1['username']."'>"; ?>  
            </div>
            <p class="text-4 font-weight-500 mt-3 mb-2">Hello, <?php echo $row1['username'];?>&nbsp;<?php echo $row1['lastname']; ?></p>
          </div>
          
          <!-- Profile Details End -->
    
          <!-- Available Balance
          =============================== -->
          <div class="bg-light shadow-sm rounded text-center p-3 mb-4">
            <div class="text-17 text-wallet my-3"><i class="fas fa-wallet"></i></div>
            <h3 class="text-6 font-weight-400">$<?php echo ($bal); ?></h3>
            <p class="mb-2 text-muted opacity-8">Available Balance</p>
            <hr class="mx-n3">
            <div class="d-flex justify-content-center"><a href="sendmoney.php">Send Money</a></div>
          </div>
          <!-- Available Balance End -->
          
          <!-- Need Help?
          =============================== -->
          <div class="bg-light shadow-sm rounded text-center p-3 mb-4">
            <div class="text-17 text-wallet my-3"><i class="fas fa-comments"></i></div>
            <h3 class="text-3 font-weight-400 my-4">Need Help?</h3>
            <p class="text-muted opacity-8 mb-4">Have questions or concerns regrading your account?<br>
              Our experts are here to help!.</p>
            <a href="#" class="theme-btn3">Chat with Us</a> 
          </div>
          <!-- Need Help? End -->
          
        </aside>
        <!-- Left Panel End -->
        
       <!-- Middle Panel
        ============================================= -->
        <div class="col-lg-9">
          
          <!-- Credit or Debit Cards
          ============================================= -->
          <div class="bg-light shadow-sm rounded p-4 mb-4">
            <h3 class="text-5 font-weight-400 mb-4">Credit Cards</h3>
            <div class="row">
              <div class="col-12 col-sm-6 col-lg-4">
                <div class="account-card account-card-primary whiteColor rounded p-3 mb-4 mb-lg-0">
                	<div class="py-2">
                  <p class="text-4">XXXX-XXXX-XXXX-4151</p>
                  <p class="d-flex align-items-center py-2"> <span class="account-card-expire text-uppercase d-inline-block opacity-6 pe-2 ">Valid<br>
                    thru<br>
                    </span> <span class="text-4 opacity-9">03/22</span> <span class="bg-light text-0 text-body font-weight-500 rounded-pill d-inline-block px-2 line-height-4 opacity-8 ms-auto">Primary</span> </p>
                  <p class="d-flex align-items-center m-0"> <span class="text-uppercase font-weight-500"><?php echo $row1['username']; ?>&nbsp;<?php echo $row1['lastname']; ?></span> <img class="ms-auto" src="assets/images/payment/visa.png" alt="visa" title=""> </p>
                  <div class="account-card-overlay rounded"> <a href="#" data-bs-target="#edit-visa" data-bs-toggle="modal" class="text-light btn-link mx-2"><span class="me-1"><i class="fas fa-edit "></i></span>Edit</a> <a href="#" class="text-light btn-link mx-2"><span class="me-1"><i class="fas fa-minus-circle"></i></span>Delete</a> </div>
                </div>
            </div>
              </div>
              <div class="col-12 col-sm-6 col-lg-4">
                <div class="account-card text-white rounded whiteColor p-3 mb-4 mb-lg-0">
                	<div class="py-2">
                  <p class="text-4">XXXX-XXXX-XXXX-6296</p>
                  <p class="d-flex align-items-center py-2"> <span class="account-card-expire text-uppercase d-inline-block opacity-6 pe-2">Valid<br>
                    thru<br>
                    </span> <span class="text-4 opacity-9">07/25</span> </p>
                  <p class="d-flex align-items-center m-0"> <span class="text-uppercase font-weight-500"><?php echo $row1['username'];?>&nbsp;<?php echo $row1['lastname']; ?></span> <img class="ms-auto" src="assets/images/payment/mastercard.png" alt="mastercard" title=""> </p>
                  <div class="account-card-overlay rounded"> <a href="#" data-bs-target="#edit-master" data-bs-toggle="modal" class="text-light btn-link mx-2"><span class="me-1"><i class="fas fa-edit"></i></span>Edit</a> <a href="#" class="text-light btn-link mx-2"><span class="me-1"><i class="fas fa-minus-circle"></i></span>Delete</a> </div>
              </div>
                </div>
              </div>
              <div class="col-12 col-sm-6 col-lg-4"> <a href="" data-bs-target="#add-new-card-details" data-bs-toggle="modal" class="account-card-new d-flex align-items-center rounded h-100 p-3 mb-4 mb-lg-0">
                <p class="w-100 text-center line-height-4 m-0"> <span class="text-3"><i class="fas fa-plus-circle"></i></span> <span class="d-block text-body text-3">Add New Card</span> </p>
                </a> </div>
            </div>
          </div>
          <!-- Edit Card Details Modal
          ================================== -->
          <div id="edit-visa" class="modal fade" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title font-weight-400">Update Card</h5>
                  <button type="button" class="close font-weight-400" data-bs-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                </div>
                <div class="modal-body p-4">
                  <form id="updateCard" method="post">
                    <div class="form-group">
                      <label for="editcardNumber">Card Number</label>
                      
                        <div class="input-group mb-3"> <span class="input-group-text"><img class="me-auto" src="assets/images/payment/visa.png" alt="visa" title=""></span>
                        <input type="text" class="form-control" data-bv-field="editcardNumber" id="editcardNumber" name="cardnumber" placeholder="Card Number" required value="<?php echo $row1['debit_c_no'];?>">
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label for="editexpiryDate">Expiry Date</label>
                          <input id="editexpiryDate" type="text" class="form-control mb-3" data-bv-field="editexpiryDate" name="exdate"required value="" placeholder="MM/YY">
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label for="editcvvNumber">CVV <span class="text-info ms-1" data-bs-toggle="tooltip" data-bs-title="For Visa/Mastercard, the three-digit CVV number is printed on the signature panel on the back of the card immediately after the card's account number. For American Express, the four-digit CVV number is printed on the front of the card above the card account number."><i class="fas fa-question-circle"></i></span></label>
                          <input id="editcvvNumber" type="password" class="form-control mb-3" data-bv-field="editcvvNumber" name="cvv" required value="<?php echo $row1['cvv'];?>" placeholder="CVV (3 digits)">
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="editcardHolderName">Card Holder Name</label>
                      <input type="text" class="form-control mb-3" data-bv-field="editcardHolderName" id="editcardHolderName" name="cardholdername" required value="<?php echo $row1['username']; ?>&nbsp;<?php echo $row1['lastname']; ?>" placeholder="Card Holder Name">
                    </div>
                    <button class="theme-btn3 justify-content-center mt-4 w-100" type="submit" name="updatecard">Update Card</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <div id="edit-master" class="modal fade" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title font-weight-400">Update Card</h5>
                  <button type="button" class="close font-weight-400" data-bs-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                </div>
                <div class="modal-body p-4">
                  <form id="updateCard" method="post">
                    <div class="form-group">
                      <label for="editcardNumber">Card Number</label>
                      
                        <div class="input-group mb-3"> <span class="input-group-text"><img class="me-auto" src="assets/images/payment/mastercard.png" alt="mastercard" title=""></span>
                        <input type="text" class="form-control" data-bv-field="edircardNumber" id="edircardNumber" placeholder="Card Number">
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label for="editexpiryDate">Expiry Date</label>
                          <input id="editexpiryDate" type="text" class="form-control mb-3" data-bv-field="editexpiryDate" required value="07/23" placeholder="MM/YY">
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label for="editcvvNumber">CVV <span class="text-info ml-1" data-bs-toggle="tooltip" data-bs-title="For Visa/Mastercard, the three-digit CVV number is printed on the signature panel on the back of the card immediately after the card's account number. For American Express, the four-digit CVV number is printed on the front of the card above the card account number."><i class="fas fa-question-circle"></i></span></label>
                          <input id="editcvvNumber" type="password" class="form-control mb-3" data-bv-field="editcvvNumber" required value="***" placeholder="CVV (3 digits)">
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="editcardHolderName">Card Holder Name</label>
                      <input type="text" class="form-control mb-3" data-bv-field="editcardHolderName" id="editcardHolderName" required value="<?php echo $row1['username']; ?>&nbsp;<?php echo $row1['lastname']; ?>" placeholder="Card Holder Name">
                    </div>
                    <button class="theme-btn3 justify-content-center mt-4 w-100" type="submit">Update Card</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- Add New Card Details Modal
          ================================== -->
          <div id="add-new-card-details" class="modal fade" role="dialog" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title font-weight-400">Add a Card</h5>
                  <button type="button" class="close font-weight-400" data-bs-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                </div>
                <div class="modal-body p-4">
                  <form id="addCard" method="post">
                    <div class="form-group mb-4">
                      <label for="cardType">Card Type</label>
                      <select id="cardType" class="nice-select wide">
                        <option selected>Visa</option>
                        <option value="1">MasterCard</option>
                        <option value="2">American Express</option>
                        <option value="3">Discover</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="cardNumber">Card Number</label>
                      <input type="text" class="form-control mb-3" data-bv-field="cardnumber" id="cardNumber" required value="" placeholder="Card Number" name="cardno">
                    </div>
                    <div class="form-row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label for="expiryDate">Expiry Date</label>
                          <input id="expiryDate" type="text" class="form-control mb-3" data-bv-field="expiryDate" required value="" placeholder="MM/YY" name="exdate">
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label for="cvvNumber">CVV <span class="text-info ml-1" data-toggle="tooltip" data-original-title="For Visa/Mastercard, the three-digit CVV number is printed on the signature panel on the back of the card immediately after the card's account number. For American Express, the four-digit CVV number is printed on the front of the card above the card account number."><i class="fas fa-question-circle"></i></span></label>
                          <input id="cvvNumber" type="password" class="form-control mb-3" data-bv-field="cvvnumber" required value="" placeholder="CVV (3 digits)" name="cvvno">
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="cardHolderName">Card Holder Name</label>
                      <input type="text" class="form-control mb-3" data-bv-field="cardholdername" id="cardHolderName" required value="" placeholder="Card Holder Name" name="cardname">
                    </div>
                    <button class="theme-btn3 justify-content-center mt-4 w-100" type="submit" name="addcard">Add Card</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- Credit or Debit Cards End -->

          <!-- Bank Accounts
          ============================================= -->
          <div class="bg-light shadow-sm rounded p-4 mb-4">
            <h3 class="text-5 font-weight-400 mb-4">Bank Accounts</h3>
            <div class="row">
              <div class="col-10 col-sm-6">
                <div class="account-card account-card-primary whiteColor rounded mb-4 mb-lg-0">
                  <div class="row no-gutters">
                    <div class="col-3 d-flex justify-content-center p-3">
                      <div class="my-auto text-center text-13 ps-2 darkBlue"> <i class="fas fa-university"></i>
                        <p class="bg-dark text-0 text-body font-weight-500 rounded-pill d-inline-block px-2 line-height-4 opacity-8 mb-0">Savings</p>
                      </div>
                    </div>
                    <div class="col-9 border-left">
                      <div class="py-4 my-2 pe-4">
                        <p class="text-4 font-weight-500 mb-1">Savings Account</p>
                        <p class="text-4 opacity-9 mb-1">XXXXXXXXXXXX-9025</p>
                        <p class="m-0">Approved <span class="text-3"><i class="fas fa-check-circle"></i></span></p>
                      </div>
                    </div>
                  </div>
                  <div class="account-card-overlay rounded"> <a href="#" data-bs-target="#savings-bank-account-details" data-bs-toggle="modal" class="text-light btn-link mx-2"><span class="me-1"><i class="fas fa-share"></i></span>More Details</a> <a href="#" class="text-light btn-link mx-2"><span class="me-1"><i class="fas fa-minus-circle"></i></span>Delete</a> </div>
                </div>
              </div>
              
            <div class="col-10 col-sm-6">
                <div class="account-card account-card-sec whiteColor rounded mb-4 mb-lg-0">
                  <div class="row no-gutters">
                    <div class="col-3 d-flex justify-content-center p-3">
                      <div class="my-auto text-center text-13 ps-2 maroon"> <i class="fas fa-university"></i>
                        <p class="bg-dark text-0 text-body font-weight-500 rounded-pill d-inline-block px-2 line-height-4 opacity-8 mb-0">Checkings</p>
                      </div>
                    </div>
                    <div class="col-9 border-left">
                      <div class="py-4 my-2 pe-4">
                        <p class="text-4 font-weight-500 mb-1">Checkings Account</p>
                        <p class="text-4 opacity-9 mb-1">XXXXXXXXXXXX-7435</p>
                        <p class="m-0">Approved <span class="text-3"><i class="fas fa-check-circle"></i></span></p>
                      </div>
                    </div>
                  </div>
                  <div class="account-card-overlay rounded"> <a href="#" data-bs-target="#checkings-bank-account-details" data-bs-toggle="modal" class="text-light btn-link mx-2"><span class="me-1"><i class="fas fa-share"></i></span>More Details</a> <a href="#" class="text-light btn-link mx-2"><span class="me-1"><i class="fas fa-minus-circle"></i></span>Delete</a> </div>
                </div>
              </div>
            </div>
        </div>
        
          <!-- Edit Bank Account Details Modal
          ======================================== -->
          <div id="savings-bank-account-details" class="modal fade" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered transaction-details" role="document">
              <div class="modal-content">
                <div class="modal-body">
                  <div class="row no-gutters">
                    <div class="col-sm-5 d-flex justify-content-center bg-danger rounded-left py-4">
                      <div class="my-auto text-center">
                        <div style="color: whitesmoke !important;" class="text-17 text-white mb-3"><i class="fas fa-university"></i></div>
                        <h3 class="text-6 text-white my-3">City First Bank</h3>
                        <div class="text-4 text-white my-4">XXX-9027 | USD</div>
                        <p style="color: #000 !important;" class="bg-light text-0 text-body font-weight-500 rounded-pill d-inline-block px-2 line-height-4 mb-0">Savings</p>
                      </div>
                    </div>
                    <div class="col-sm-7">
                      <h5 class="text-5 font-weight-400 m-3">Bank Account Details
                        <button type="button" class="close font-weight-400 ms-5" data-bs-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                      </h5>
                      <hr>
                      <div class="p-4">
                        <ul class="list-unstyled">
                          <li class="font-weight-500">Account Type:</li>
                          <li class="text-muted">Savings</li>
                        </ul>
                        <ul class="list-unstyled">
                          <li class="font-weight-500">Account Name:</li>
                          <li class="text-muted"><?php echo $row1['username']; ?>&nbsp;<?php echo $row1['lastname']; ?></li>
                        </ul>
                        <ul class="list-unstyled">
                          <li class="font-weight-500">Account Number:</li>
                          <li class="text-muted">XXXXXXXXXXXX-9025</li>
                        </ul>
                        <ul class="list-unstyled">
                          <li class="font-weight-500">Bank Country:</li>
                          <li class="text-muted">United States</li>
                        </ul>
                        <ul class="list-unstyled">
                          <li class="font-weight-500">Status:</li>
                          <li class="text-muted">Approved <span class="text-success text-3"><i class="fas fa-check-circle"></i></span></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div id="checkings-bank-account-details" class="modal fade" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered transaction-details" role="document">
              <div class="modal-content">
                <div class="modal-body">
                  <div class="row no-gutters">
                    <div class="col-sm-5 d-flex justify-content-center bg-danger rounded-left py-4">
                      <div class="my-auto text-center">
                        <div style="color: whitesmoke !important;" class="text-17 text-white mb-3"><i class="fas fa-university"></i></div>
                        <h3 class="text-6 text-white my-3">City First Bank</h3>
                        <div class="text-4 text-white my-4">XXX-7435 | USD</div>
                        <p style="color: #000 !important;" class="bg-light text-0 text-body font-weight-500 rounded-pill d-inline-block px-2 line-height-4 mb-0">Checking</p>
                      </div>
                    </div>
                    <div class="col-sm-7">
                      <h5 class="text-5 font-weight-400 m-3">Bank Account Details
                        <button type="button" class="close font-weight-400 ms-5" data-bs-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                      </h5>
                      <hr>
                      <div class="p-4">
                        <ul class="list-unstyled">
                          <li class="font-weight-500">Account Type:</li>
                          <li class="text-muted">Checking</li>
                        </ul>
                        <ul class="list-unstyled">
                          <li class="font-weight-500">Account Name:</li>
                          <li class="text-muted"><?php echo $row1['username']; ?>&nbsp;<?php echo $row1['lastname']; ?></li>
                        </ul>
                        <ul class="list-unstyled">
                          <li class="font-weight-500">Account Number:</li>
                          <li class="text-muted">XXXXXXXXXXXX-7435</li>
                        </ul>
                        <ul class="list-unstyled">
                          <li class="font-weight-500">Bank Country:</li>
                          <li class="text-muted">United States</li>
                        </ul>
                        <ul class="list-unstyled">
                          <li class="font-weight-500">Status:</li>
                          <li class="text-muted">Approved <span class="text-success text-3"><i class="fas fa-check-circle"></i></span></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Bank Accounts End -->
          
          <!-- Recent Activity
          =============================== -->
          <div class="bg-light shadow-sm rounded py-4 mb-4">
            <h3 class="text-5 font-weight-400 d-flex align-items-center px-4 mb-3">Recent Activity</h3>
            
            <!-- Title
            =============================== -->
            <div class="transaction-title py-2 px-4">
              <div class="row">
                <div class="col-2 col-sm-1 text-center"><span class="">Date</span></div>
                <div class="col col-sm-7">Description</div>
                <div class="col-auto col-sm-2 d-none d-sm-block text-center">Remark</div>
                <div class="col-3 col-sm-2 text-right">Amount</div>
              </div>
            </div>
            <!-- Title End -->
            <?php 
          $custid = $_SESSION['customer_id'];
        $sql="SELECT * FROM receivers_details WHERE custid='$custid' ORDER BY id DESC LIMIT 5";
        $result = $conn->query($sql);     
    // output data of each row
    while($row1 = $result->fetch_assoc()) { ?>
            <!-- Transaction List
            =============================== -->
             <div class='transaction-list'> 
                  <div class='transaction-item px-4 py-3' data-bs-toggle='modal' data-bs-target='#transaction-detail<?php echo $row1['id'];?>'>
                  <div class='row align-items-center flex-row'>
                  <div class='col-2 col-sm-1 text-center'><span class='d-block text-2 font-weight-300'><?php echo $row1['date_added']; ?></span></div>
                  <div class='col col-sm-7'><span class='d-block text-3'><?php echo $row1['trans_description']; ?></span></div>
                  <div class='col-auto col-sm-2 d-none d-sm-block text-center text-3'> <span class="text-nowrap"><?php echo $row1['remarks']; ?></span> </div>
                  <div class='col-3 col-sm-2 text-right text-3'> <span class='text-nowrap'>$<?php echo $row1['amount']; ?></span></div>
                </div>
              </div>

 <!-- Transaction Item Details Modal
            =========================================== -->
            <div id='transaction-detail<?php echo $row1['id'];?>' class='modal fade' role='dialog' aria-hidden='true'>
              <div class='modal-dialog modal-dialog-centered transaction-details' role='document'>
                <div class='modal-content'>
                  <div class='modal-body'>
                    <div class='row no-gutters'>
                      <div class='col-sm-5 d-flex justify-content-center bg-danger rounded-left py-4'>
                        <div class='my-auto text-center'>
                          <div class='text-17 text-white my-3'><i class='fas fa-building'></i></div>
                          <h3 class='text-4 text-white font-weight-400 my-3'><?php echo $row1['bank_name']; ?></h3>
                          <div class='text-8 font-weight-500 text-white my-4'>$<?php echo $row1['amount']; ?></div>
                          <p class='text-white'><?php echo $row1['date_added'];?></p>
                        </div>
                      </div>
                      <div class='col-sm-7'>
                        <h5 class='text-5 font-weight-400 m-3'>Transaction Details
                          <button type='button' class='close font-weight-400 ms-5' data-bs-dismiss='modal' aria-label='Close'> <span aria-hidden='true'>&times;</span> </button>
                        </h5>
                        <hr>
                        <div class='p-4'>
                          <ul class='list-unstyled'>
                            <li class='font-weight-500'>Transaction ID:</li>
                            <li class='text-muted'><?php echo $row1['trans_id']; ?></li>
                          </ul>
                          <ul class='list-unstyled'>
                            <li class='font-weight-500'>Description:</li>
                            <li class='text-muted'><?php echo $row1['trans_description']; ?></li>
                          </ul>
                          <ul class='list-unstyled'>
                            <li class='font-weight-500'>Status:</li>
                            <li class='text-muted'><?php echo $row1['remarks']; ?></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div><?php } ?>
          </div>
        </div>
            <!-- Transaction Item Details Modal End -->
            
            <!-- View all Link
            =============================== -->
            <div class="text-center mt-4"><a href="transaction.php" class=" text-3">View all<i class="fas fa-chevron-right text-2 ms-2"></i></a></div>
            <!-- View all Link End -->
            
          </div>
        </div>
          <!-- Recent Activity End -->
        </div>
        <!-- Middle Panel End -->
      </div>
    </div>
  </div>
  <!-- Content end --> 
</body>

<?php include'./components/footer.php'; ?>
</html>