<?php
  $error=0;
  if(isset($_GET["err"]))
    $error=$_GET["err"];
?>
<html>
	<head>
	   <title>Register</title>
		 <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
		 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		 <link href="css/bootstrap/bootstrap.min.css" rel="stylesheet">
		 <link rel="icon" sizes="300*300" href="logo.png">
		 <meta charset="utf-8">
		 <link rel="stylesheet" href="styleR.css"> </link>
	</head>
  <body>
	  <div class="container">
		  <div class="row">
			  <form method="post" name="form" action="validate.php">
			    <div class="box">
				    <img src="logo.png" width=120 height=120>
					  <div class="txt">Create Account</div>
						<div class="form-input">
						  <i class="material-icons">perm_identity</i>
							<input type="text" name="name" placeholder="Your Name"><br>
							<?php if ($error==1){?>
							  <div class="mydialog"><h6>Incorrect Name!</h6></div>
			 				<?php }?>
							<i class="material-icons">email</i>
							<input type="text" name="email" placeholder="Email Id"><br>
							<?php if ($error==2) {?>
							  <div class="mydialog"><h6>Incorrect Email ID !</h6></div>
							<?php }?>
							<i class="material-icons">call</i>
							<input type="text" name="number" placeholder="Phone Number">
							<?php if ($error==3){?>
							  <div class="mydialog"><h6>Incorrect Phone number !</h6></div>
			 				<?php }?><br>
							<i class="material-icons" style="position: fixed; margin-top: 10px;">home</i>
							<textarea name="address" placeholder="Address" cols="26" rows="4" style="margin-left: 30px;font-family: sans-serif;font-size: 20px;margin-top: 10px;"></textarea><br>
							<div height="100" width="50" style="width: 400;text-align: center;padding-left: 100px;">
									Note: An OTP will be sent to your mail to set your Password once you sign up.
              </div>
						</div>
				    <input type="submit" class="mbtn" value="Sign Up">
					</div>
				</form>
		  </div>
	  </div>
  </body>
</html>
