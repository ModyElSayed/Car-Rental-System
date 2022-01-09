<?php
  include "config_database.php";

  // mysqli_real_escape_string() function is used to escape all special
  // characters for use in an SQL query, it removes any special characters
  // that may interfere with the query operations.

  $email = mysqli_real_escape_string($con, $_POST['email']);

  // md5 is an encryption function.
  $encrypted_password = md5($_POST["password"]);
  $password = mysqli_real_escape_string($con, $encrypted_password);

  $sql_query = "SELECT COUNT(*) as number_of_emails FROM Account WHERE Email='{$email}' AND Password='{$password}'";

  // performing the query.
  $result = mysqli_query($con,$sql_query);

  // fetches the result row.
  $row = mysqli_fetch_array($result);
  $count = $row['number_of_emails'];

  if($count == 1 && $email == "admin@admin.com") {
    echo 'Admin';
  } else if ($count == 1) {
    $_SESSION['email'] = $email;
    echo 'Customer';
  } else {
    echo 'Invalid';
  }
