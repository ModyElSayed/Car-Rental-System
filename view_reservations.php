<!DOCTYPE html>
  <head>
      <title>Reservations</title>
      <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">

      <script src="jquery-3.6.0.js" type="text/javascript"></script>
      <script src="car-validation.js" type="text/javascript"></script>
	  

      <script type="text/javascript">
        $(document).ready(function(){
            $.ajax({
                url:'get_reservations.php',
                type:'get',
                datatype: 'html',
				success:function(response){  
                    $("#table").html(response); 
				}
            });


        });
      </script>
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
  
		<div id="table" align="center">
			
		</div>
		<input type="submit" class="submitIn" value="Back" style="float:left" onClick="window.location.href='home.php';">
  </body>
</html>
