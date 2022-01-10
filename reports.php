<!DOCTYPE html>
  <head>
      <title>Search For Reservations</title>
      <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>"> 
  </head>
  <body>
	<div class="signFrm">
      <div class="form">

        <h1 class="title">Report (search by date)</h1>
		<form action="reportcode.php" method="post">
			<div class="inputContainer">
				<label for="datemin">Min Date:</label>
				<input type="date" id="datemin" name="datemin">
			</div>
			<div class="inputContainer">
				<label for="date">Max Date:</label>
				<input type="date" id="datemax" name="datemax">
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
