<?php 
include 'components/h_dashboard.php';

if($_SESSION['login'] == FALSE)
{
   header('location:login.php');

}

?>
<html>
<?php 
        $cust_id= $_SESSION['customer_id'];
        include 'db_connect.php'; 
        $sql="SELECT * FROM customers where customer_id= '$cust_id' ";
    $result = $conn->query($sql);
        $row1 = $result->fetch_assoc();
?>
<div id="main-wrapper">

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
            <?php echo  "<div class='profile-thumb mt-3 mb-4'> <img class='rounded-circle' width='100' height='100'src='assets/images/".$row1['photo']."' alt='".$row1['username']."'>"; ?>
            </div>
            <p class="text-3 font-weight-500 mt-3 mb-2">Hello, <?php echo $row1['username']; ?>&nbsp;<?php echo $row1['lastname']; ?></p>
        </div>
          <!-- Profile Details End --> 
          
          <!-- Available Balance
          =============================== -->
          <div class="bg-light shadow-sm rounded text-center p-3 mb-4">
            <div class="text-17 text-wallet my-3"><i class="fas fa-wallet"></i></div>
            <h3 class="text-7 font-weight-400">$<?php echo $row1['balance']; ?></h3>
            <p class="mb-2 text-muted opacity-8">Available Balance</p>
            <hr class="mx-n3">
            <div class="d-flex justify-content-center"><a href="sendmoney.php">Send Money</a></div>
          </div>

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
          
          <h2 class="font-weight-400 mb-3">Transactions</h2>
          
          <!-- Filter
          ============================================= -->
          <div class="row">
            <div class="col mb-2">
              <form id="filterTransactions" method="post">
                <div class="form-row">
                  <!-- Date Range
                  ========================= -->
                  <div class="col-sm-6 col-md-5 form-group">
                  <div class="input-group"><span class="icon-inside"><i class="fas fa-calendar-alt"></i></span>
                    <input id="dateRange" type="text" class="form-control" placeholder="Date Range"> 
                  </div>
                </div>
                  <!-- All Filters Link
                  ========================= -->
                  <div class="col-auto d-flex align-items-center me-auto form-group my-3" data-bs-toggle="collapse"> <a class="" data-bs-toggle="collapse" href="#allFilters" aria-expanded="false" aria-controls="allFilters">All Filters<i class="fas fa-sliders-h text-3" style="margin-left: 16.2rem;"></i></a> </div>
                  <!-- Statements Link
                  ========================= -->
                  <div class="col-auto d-flex align-items-center ms-auto form-group mb-3">
                    <div class="dropdown "> <a class="text-muted btn-link dropdown-toggle " href="#" role="button" id="statements" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-file-download text-3 me-3"></i>Statements</a>
                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="statements"> <a class="dropdown-item" href="#">CSV</a> <a class="dropdown-item" href="#">PDF</a> </div>
                    </div>
                  </div>
                  
                  <!-- All Filters collapse
                  ================================ -->
                  <div class="col-12 collapse mb-3" id="allFilters">
                    <div class="custom-control custom-radio custom-control-inline">
                      <input type="radio" id="allTransactions" name="allFilters" class="custom-control-input" checked>
                      <label class="custom-control-label" for="allTransactions">All Transactions</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                      <input type="radio" id="paymentsSend" name="allFilters" class="custom-control-input">
                      <label class="custom-control-label" for="paymentsSend">Payments Send</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                      <input type="radio" id="paymentsReceived" name="allFilters" class="custom-control-input">
                      <label class="custom-control-label" for="paymentsReceived">Payments Received</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                      <input type="radio" id="refunds" name="allFilters" class="custom-control-input">
                      <label class="custom-control-label" for="refunds">Refunds</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                      <input type="radio" id="withdrawal" name="allFilters" class="custom-control-input">
                      <label class="custom-control-label" for="withdrawal">Withdrawal</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                      <input type="radio" id="deposit" name="allFilters" class="custom-control-input">
                      <label class="custom-control-label" for="deposit">Deposit</label>
                    </div>
                  </div>
                  <!-- All Filters collapse End -->
                </div>
              </form>
            </div>
          </div>
          <!-- Filter End -->

          <!-- All Transactions
          ============================================= -->
          <div class="bg-light shadow-sm rounded py-4 mb-4">
            <h3 class="text-5 font-weight-400 d-flex align-items-center px-4 mb-3">All Transactions</h3>
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
        $sql="SELECT * FROM receivers_details WHERE custid='$custid' ORDER BY id DESC LIMIT 20";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {     
        $Sl_no = 1; 
    // output data of each row
    while($row1 = $result->fetch_assoc()) { ?>

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
            </div>
          </div><?php }} ?>


            <!-- Transaction Item Details Modal End -->

            
          </div> 
          <!-- All Transactions End --> 
        </div>
        <!-- Middle End --> 
      </div>
    </div>
  </div>
  <!-- Content end --> 
</div>

 <?php include "components/footer.php"; ?>
 </html>