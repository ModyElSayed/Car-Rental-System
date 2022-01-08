<?php
  include "config_database.php";

  if(empty($_SESSION['email'])) {
    echo 0;

  } else {

    $ssn = mysqli_real_escape_string($con, $_POST['ssn']);

    $sql_query = "SELECT COUNT(*) as available FROM `Customer` WHERE SSN = '{$ssn}'";
    $result = mysqli_query($con,$sql_query);
    $row = mysqli_fetch_array($result);

    $count = $row['available'];

    if($count == 0) {

        $fname = mysqli_real_escape_string($con, $_POST['fname']);
        $lname = mysqli_real_escape_string($con, $_POST['lname']);
        $dob = mysqli_real_escape_string($con, $_POST['dob']);

        $sql_query = "INSERT INTO `Customer` VALUES (DEFAULT, '".$fname."', '".$lname."', '".$ssn."', '".$dob."', '".$_SESSION['email']."')";
        $result = mysqli_query($con, $sql_query);
    }

    $zip = mysqli_real_escape_string($con, $_POST['zip']);
    $address   = mysqli_real_escape_string($con, $_POST['address']);
    $city  = mysqli_real_escape_string($con, $_POST['city']);
    $country  = mysqli_real_escape_string($con, $_POST['country']);

    $sql_query = "INSERT INTO `Address` VALUES ('".$zip."', '".$address."', '".$city."', '".$country."')";
    $result = mysqli_query($con, $sql_query);

    $sql_query = "SELECT Cus_Id FROM `Customer` WHERE SSN = '{$ssn}'";
    $result = mysqli_query($con,$sql_query);
    $row = mysqli_fetch_array($result);

    $cus_id = $row['Cus_Id'];

    $sql_query = "INSERT INTO `Cus_Address` VALUES ('".$cus_id."', '".$zip."')";
    $result = mysqli_query($con, $sql_query);

    echo 1;
  }
?>
