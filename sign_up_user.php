<?php
  include "config_database.php";

  $email = mysqli_real_escape_string($con, $_POST['email']);

  $sql_query = "SELECT COUNT(*) as number_of_emails FROM `Account` WHERE Email='{$email}'";
  $result = mysqli_query($con,$sql_query);
  $row = mysqli_fetch_array($result);

  $count = $row['number_of_emails'];

  if($count == 0) {
      $encrypted_password = md5($_POST["password"]);
      $password = mysqli_real_escape_string($con, $encrypted_password);

      $sql_query = "INSERT INTO `Account` VALUES ('".$email."', '".$password."', DEFAULT)";
      $result = mysqli_query($con, $sql_query);

      $decrypted_password = mysqli_real_escape_string($con, $_POST["password"]);
      $sql_query = "INSERT INTO `Decrypted_Account` VALUES ('".$email."', '".$decrypted_password."', DEFAULT)";
      $result = mysqli_query($con, $sql_query);

      $_SESSION['email'] = $email;
      echo 1;

  } else {
      echo 0;
  }

?>
