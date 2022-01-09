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
        <form action="logout.php" class="form">
          <h1>Welcome</h1>
          <input type="submit" id="logout" class="submitBtn" value="Logout" style="float:right">

        </div>
      </div>

    </body>
</html>
