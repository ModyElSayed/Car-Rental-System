<!DOCTYPE html>
<html>
    <head>
      <title>Homepage</title>
      <link rel="stylesheet" href="style.css">
	  
	  <?php
			session_start();
			$email = $_SESSION['email'];
			if($email != "admin@admin.com"){
				header('Location: index.php');
				exit;
			}
	  ?>
    </head>
    <body>
      <div class="signFrm">
        <div class="form">
          <h1>Welcome</h1>
			<div class="inputContainer">
				<input type="submit" id="res" class="submitBtn" value="View Reservations" style="float:center" onclick="window.location.href='view_reservations.php';">
			</div>
			<div class="inputContainer">
				<input type="submit" id="asearch" class="submitBtn" value="Advanced Search" style="float:center">
			</div>
			<div class="inputContainer">
				<input type="submit" id="acar" class="submitBtn" value="Add Car" style="float:center" onclick="window.location.href='register_vehicle.php';">
			</div>
			<div class="inputContainer">
				<input type="submit" id="rep" class="submitBtn" value="View Reports" style="float:center" onclick="window.location.href='reporthub.php';">
			</div>
			
		  <input type="submit" id="logout" class="submitBtn" value="Logout" style="float:right" onclick="window.location.href='logout.php';">
			
        </div>
      </div>

    </body>
</html>
