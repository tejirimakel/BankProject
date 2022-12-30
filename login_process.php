<?php  ob_start();  ?>
<?php
include 'db_connect.php';

$errors = array();

if(isset($_POST['login_btn'])){
	
	if(isset($_POST['customerId'])){

	  //with hashing
		// $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

		$password = $_POST['password'];
		$customer_id = $_POST['customerId'];
		
	}
    
    if (count((array)$errors) == 0) {
   
    $sql = "SELECT * FROM customers WHERE customer_id='$customer_id' AND password='$password'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    if (($result->num_rows) > 0) {

    	$_SESSION['login'] = true;
	    $_SESSION['balance'] = $row['balance'];
			$_SESSION['username'] = $row['username'];
			$_SESSION['acc_no'] = $row['acc_no'];
			$_SESSION['acc_type'] = $row['acc_type'];
			$_SESSION['photo'] = $row['photo'];
			$_SESSION['mobile']	= $row['mobile'];
			$_SESSION['iban'] = $row['iban'];
			$_SESSION['email']= $row['email'];
			$_SESSION['customer_id'] = $customer_id;
			$_SESSION['Debit_c_no'] =$row['Debit_c_no'];
			date_default_timezone_set('America/Los_Angeles'); 
			$_SESSION['this_login'] = date("d/m/y h:i:s A");


			header('location:dashboard.php');
      
    }
    else {
      
    	array_push($errors, "Wrong Username or Password Combination");
      
    }
  }
}
		

?>