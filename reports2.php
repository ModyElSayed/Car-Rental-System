<!DOCTYPE html>
  <head>
      <title>Search For Reservations</title>
      <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>"> 
  </head>
  <body>
	<div class="signFrm">
      <div class="form">

        <h1 class="title">Report (search by customer)</h1>
		<form action="reportcode2.php" method="post">
		
			<div class="inputContainer">
				<label for="plateid">Customer SSN:</label>
				<input type="input" id="ssn" name="ssn">
			</div>		
			
			<div class="submitContainer">
				<input type="submit" id="submit" name="submit" class="submitBtn" value="Search" style="float:right">
			</div>
		</form>
		<input type="submit" class="submitIn" value="Back" style="float:left" onClick="window.location.href='reporthub.php';">
      </div>
    </div>

		

  </body>
</html>
