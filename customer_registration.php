<?php
  include "config_database.php";

  $sql_query = "SELECT Country_Name FROM `Office` ORDER BY `Office`.`Country_Name` ASC";

  $result = mysqli_query($con, $sql_query);
  $select_class = "";

  if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_array($result)) {
        $select_class .= "<option value={$row['Country_Name']}>{$row['Country_Name']}</option>";
      }
  } else {
      $select_class = "Select Country";
  }

?>

<!DOCTYPE html>
<html>
  <head>
      <title>Registration Personal Information</title>
      <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">

      <script src="jquery-3.6.0.js" type="text/javascript"></script>
      <script src="cus-registration-validation.js" type="text/javascript"></script>

      <script type="text/javascript">

        $(document).ready(function(){
            $('#ssn').on('keypress', function(event) {
            // trap keypress
              var character = String.fromCharCode(event.which);
              if (!isInteger(character)) {
                return false;
              }
            });

            $('#zip').on('keypress', function(event) {
            // trap keypress
              var character = String.fromCharCode(event.which);
              if (!isInteger(character)) {
                return false;
              }
            });

            // checks that an input string is an integer, with an optional +/- sign character
            function isInteger(s) {
              if (s === '-') return true;
              var isInteger_re = /^\s*(\+|-)?\d+\s*$/;
              return String(s).search(isInteger_re) != -1
            }

            $("#reserve").click(function(){
                var fname = $("#fname").val().trim();
                var lname = $("#lname").val().trim();
                var ssn = $("#ssn").val().trim();
                var dob = $("#dob").val().trim();
                var address = $("#address").val().trim();
                var city = $("#city").val().trim();
                var zip = $("#zip").val().trim();
                var country = $("#country").val().trim();

                if(customer_registration()){
                    $.ajax({
                        url:'record_customer.php',
                        type:'post',
                        data:{fname:fname, lname:lname, ssn:ssn, dob:dob, zip:zip, address:address, city:city, country:country},
                        success:function(response) {
                            var msg = "";
                            if (response == 1) {
                              window.location = "home.php";
                            } else {
                              msg = "Session expired. Please sign in";
                              clearFuncForRegistration();
                            }
                            $("#message").html(msg);
                        }
                    });
                }
            });
        });
      </script>

  </head>

  <body>

    <div class="signFrm">
      <div class="form">

        <h1 class="title">Registration</h1>

        <div class = "errorContainer">
          <label class="invalid" id="message"></label>
        </div>

        <div class="inputContainer">
          <input type="text" name="fname" class="input" id="fname" placeholder="First Name">
          <label class="label">First Name</label>
        </div>

        <div class="inputContainer">
          <input type="text" name="lname" class="input" id="lname" placeholder="Last Name">
          <label class="label">Last Name</label>
        </div>

        <div class="inputContainer">
          <input type="text" name="ssn" class="input" id="ssn" placeholder="SSN" maxlength="9">
          <label class="label">SSN</label>
        </div>

        <div class="inputContainer">
          <input type="date" name="dob" class="input" id="dob" placeholder="Date of Birth">
          <label class="label">Date of Birth</label>
        </div>

        <div class="inputContainer">
          <input type="text" name="address" class="input" id="address" placeholder="Address">
          <label class="label">Address</label>
        </div>

        <div class="inputContainer">
          <input type="text" name="city" class="input" id="city" placeholder="City/State">
          <label class="label">City/State</label>
        </div>

        <div class="inputContainer">
          <input type="text" name="zip" class="input" id="zip" placeholder="ZIP" maxlength="5">
          <label class="label">ZIP</label>
        </div>

        <div class="center">
          <select id="country" name="custom-select sources" placeholder="Select Color">
            <option value="Select Country">Select Country</option>
            <?php print $select_class; ?>
          </select>
        </div>

        <div class="submitContainer">
          <input type="button" class="submitIn" value="Select different car" style="float:left" onClick="window.location.href='index.php';">
          <input type="submit" id="reserve" name="Reserve" class="submitBtn" value="Reserve" style="float:right">
        </div>

      </div>
    </div>

    <script>
      var password = document.getElementById("country");
      password.addEventListener("keyup", function(event) {
        if (event.keyCode === 13) {
         event.preventDefault();
         document.getElementById("reserve").click();
        }
      });
    </script>

  </body>
</html>
