<?php

include 'db_connect.php';

if (isset($_POST['savepd'])) {

  $dob = $_POST['dob'];
  $home_addr = $_POST['home_addr'];
  $state = $_POST['state'];
  $city = $_POST['city'];
  $zip = $_POST['zip'];
  $country = $_POST['country'];

  $sql = "INSERT INTO customers (dob, home_addr, state, city, zip, country) VALUES('$dob','$home_addr', '$state', '$city', '$zip', '$country')  WHERE customer_id ='".$_SESSION['customer_id']."'";
  		$conn->query($sql);


  $sql = "UPDATE customers SET dob='$dob', home_addr='$home_addr', state='$state', city='$city', zip='$zip', country='$country' WHERE customer_id ='".$_SESSION['customer_id']."'";
 		$conn->query($sql);

  header('location: profile.php');
 }

?>