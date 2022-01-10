<!DOCTYPE html>
<html>
    <head>
      <title>Reports</title>
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
				<input type="submit" id="rep1" class="submitBtn" value="Report (search by date)" style="float:center" onclick="window.location.href='reports.php';">
			</div>
			<div class="inputContainer">
				<input type="submit" id="rep2" class="submitBtn" value="Report (search by car)" style="float:center" onclick="window.location.href='reports1.php';">
			</div>
			<div class="inputContainer">
				<input type="submit" id="rep3" class="submitBtn" value="Report (search by customer)" style="float:center" onclick="window.location.href='reports2.php';">
			</div>
			
		  <input type="submit" id="back" class="submitBtn" value="Back" style="float:right" onclick="window.location.href='home.php';">
			
        </div>
      </div>

    </body>
</html>
