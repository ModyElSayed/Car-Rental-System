<!DOCTYPE html>
  <head>
      <title>Sign up</title>
      <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">

      <script src="jquery-3.6.0.js" type="text/javascript"></script>
      <script src="registration-validation.js" type="text/javascript"></script>

      <script type="text/javascript">
        $(document).ready(function(){

            $("#signup").click(function(){
                var email = $("#email").val().trim();
                var password = $("#password").val().trim();

                if(registration()){
                    $.ajax({
                        url:'sign_up_user.php',
                        type:'post',
                        data:{email:email, password:password},
                        success:function(response){
                            var msg = "";
                            if(response == 1) {
                                window.location = "customer_registration.php";
                            } else {
                                msg = "This email already exits.";
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

        <h1 class="title">Sign up</h1>

        <div class = "errorContainer">
          <label class="invalid" id="message"></label>
        </div>

        <div class="inputContainer">
          <input type="text" name="email" class="input" id="email" placeholder="Email">
          <label class="label">Email</label>
        </div>

        <div class="inputContainer">
          <input type="password" name="password" class="input" id="password" placeholder="Password" maxlength="19">
          <label class="label">Password</label>
        </div>

        <div class="inputContainer">
          <input type="password" name="pass_confirm" class="input" id="pass_confirm" placeholder="Confirm" maxlength="19">
          <label class="label">Confirm Password</label>
        </div>

        <div class="submitContainer">
          <input type="button" class="submitIn" value="Sign in instead" style="float:left" onClick="window.location.href='index.php';">
          <input type="submit" id="signup" name="signup" class="submitBtn" value="Sign up" style="float:right">
        </div>

      </div>
    </div>

    <script type="text/javascript">
      var password = document.getElementById("pass_confirm");
      password.addEventListener("keyup", function(event) {
        if (event.keyCode === 13) {
         event.preventDefault();
         document.getElementById("signup").click();
        }
      });
    </script>

  </body>
</html>
