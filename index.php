<!DOCTYPE html>
  <head>
      <title>Login</title>
      <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">

      <!-- Using jQuery library -->
      <script src="jquery-3.6.0.js" type="text/javascript"></script>

      <!-- JS file for input validation -->
      <script src="sign-in-validation.js" type="text/javascript"></script>

      <script type="text/javascript">
        $(document).ready(function(){

            $("#signin").click(function(){
                var email = $("#email").val().trim();
                var password = $("#password").val().trim();

                // Validate the inputs for signin form.
                if(signin()){

                    // AJAX is about loading data in the background and transport
                    // to checkUser.php if success  succeeds
                    $.ajax({
                        url:'check_user.php',
                        type:'post',
                        data:{email:email,password:password},
                        success:function(response){
                            var msg = "";
                            if(response == 'Admin'){
                                window.location = "home.php";
                            } else if (response == 'Customer') {
                                window.location = "customer_registration.php";
                            } else {
                                msg = "Invalid email or password!";
                                clearFuncForSignIn();
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

    <!-- div is just a container for HTML elements - which is styled with CSS -->
    <div class="signFrm">
      <div class="form">

        <h1 class="title">Sign in</h1>

        <div class = "errorContainer">
          <label class="invalid" id="message"></label>
        </div>

        <div class="inputContainer">
          <input type="text" class="input" id="email" name="email" placeholder="Email">
          <label class="label">Email</label>
        </div>

        <div class="inputContainer">
          <input type="password" class="input" id="password" name="password" placeholder="Password" maxlength="19">
          <label class="label">Password</label>
        </div>

        <div>
            <input type="submit" class="submitIn" value="Create Account" style="float:left" onClick="window.location.href='sign_up.php';">
            <input type="submit" id="signin" name="signin" class="submitBtn" value="Sign in" style="float:right">
        </div>

      </div>
    </div>

    <!-- A script to be able to press Enter key for sign in -->
    <script>
      var password = document.getElementById("password");
      password.addEventListener("keyup", function(event) {
        if (event.keyCode === 13) {
         event.preventDefault();
         document.getElementById("signin").click();
        }
      });
    </script>
  </body>
</html>
