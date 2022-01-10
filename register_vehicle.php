<!DOCTYPE html>
  <head>
      <title>Vehicle Registration</title>
      <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">

      <script src="jquery-3.6.0.js" type="text/javascript"></script>
      <script src="car-validation.js" type="text/javascript"></script>
	  

      <script type="text/javascript">
        $(document).ready(function(){

            $("#submit").click(function(){
				
				

                if(registration()){
					var plateid = $("#plateid").val().trim();
					var brand = $("#brand").val().trim();
					var model = $("#model").val().trim();
					var year = $("#year").val().trim();
					var price = $("#price").val().trim();
					var status = $("#status").val().trim();
                    $.ajax({
                        url:'car_registeration_php.php',
                        type:'post',
                        data:{plateid:plateid, brand:brand, model:model, year:year, price:price, status:status},
                        
						success:function(response){
                            var msg = "";
                            if(response == 1) {
                                window.location = "customer_registration.php";
                            } else {
                                msg = "This plate id already exits.";
                                clearFuncForRegistration();
                            }
							$("#message").html(msg);
                            
                        }
                    });
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

    <div class="signFrm">
      <div class="form">

        <h1 class="title">Register Vehicle</h1>

        <div class = "errorContainer">
          <label class="invalid" id="message"></label>
        </div>

        <div class="inputContainer">
          <input type="text" name="brand" class="input" id="brand" placeholder="Brand" maxlength="32">
          <label class="label">Brand</label>
        </div>

        <div class="inputContainer">
          <input type="text" name="model" class="input" id="model" placeholder="Model" maxlength="32">
          <label class="label">Model</label>
        </div>

        <div class="inputContainer">
			<select name="year" class="select" id="year" required>
				<option value = "" disabled selected hidden ></option>
				<!--don't forget to validate for a choice-->
				<?php
					for($i = 2000; $i <= date("Y") ; $i++){
						echo "<option value=\"$i\">$i</option>";
					}
				?>
			</select>
			<label class="label">Year</label>
        </div>
		
		<div class="inputContainer">
			<select name="status" class="select" id="status" required>
				<option value = "" disabled selected hidden ></option>
				<option value="Active">Active</option>
				<option vlaue="OOS">Out Of Service</option>
			</select>
			<label class="label">Status</label>
        </div>

        <div class="inputContainer">
          <input type="text" name="plateid" class="input" id="plateid" placeholder="Plate ID" maxlength="32">
          <label class="label">Plate ID</label>
        </div>
		
		<div class="inputContainer">
          <input type="number" name="price" class="input" id="price" placeholder="Price">
          <label class="label">Price (in USD)</label>
        </div>

        <div class="submitContainer">
			<input type="submit" class="submitIn" value="Back" style="float:left" onClick="window.location.href='home.php';">
			<input type="submit" id="submit" name="submit" class="submitBtn" value="Register" style="float:right">
        </div>

      </div>
    </div>
    <!-- A script to be able to press Enter key for sign in -->
    <script>
      var price = document.getElementById("price");
      price.addEventListener("keyup", function(event) {
        if (event.keyCode === 13) {
         event.preventDefault();
         document.getElementById("submit").click();
        }
      });
    </script>
  </body>
</html>
