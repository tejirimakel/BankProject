<?php 

	session_start();
	
		include 'db_connect.php';
		// Update date & time
		
		$Customer_id=$_SESSION['customer_id'] ;
		$this_login=$_SESSION['this_login'];
		
		$sql="UPDATE customers SET  last_login='$this_login' WHERE Customers.customer_id=$Customer_id ";
		$conn->query($sql);
	
		session_destroy();
		session_unset();

	header('location:login.php');
	
	
?>