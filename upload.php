<?php
include 'db_connect.php';

// Initialize message variable
  $msg = "";

  // If upload button is clicked ...
  if (isset($_POST['upload'])) {
    // Get image name
    $photo = $_FILES['photo']['name'];
    // image file directory
    $target = "assets/images/".basename($photo);

    $sql = "INSERT INTO customers (photo) 
          VALUES('$photo') WHERE customer_id ='".$_SESSION['customer_id']."'";
          $conn->query($sql);

    $sql = "UPDATE customers SET photo='$photo' WHERE customer_id ='".$_SESSION['customer_id']."'";
    // execute query
    $conn->query($sql);

    if($_FILES['photo']['size'] > 1000000) {
      $msg = "Image size should not be greated than 1mb";
      $msg_class = "alert-danger";
    } else{
        $msg = "Failed to upload image";
    }

    if (move_uploaded_file($_FILES['photo']['tmp_name'], $target)) {
        $msg = "Image uploaded successfully";
    }else{
        $msg = "Failed to upload image";
    }
  }
  $result = $conn->query($sql);
  ("SELECT * FROM customers WHERE customer_id ='".$_SESSION['customer_id']."'");

?> 