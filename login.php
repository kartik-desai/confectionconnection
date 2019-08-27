<?php
	$error=0;
	if(isset($_GET["err"]))
	$error =$_GET["err"];
	$i =0;
?>
<html>
  <head>
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="css/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" sizes="200x200" href="logo.png">
    <meta charset="utf-8">
    <link rel="stylesheet" href="styleLogin.css"> </link>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
  </head>
	<body >
		<div class="container">
			<div class="row">
				<form method="post" action="log.php">
					<div class="box">
						<img src="logo.png" width=200 height=200>
						<div class="txt">Login</div>
						<div class="form-input">
							<br>  <input type="text" name="uname" placeholder="Enter Username"> <br> <br>
						</div>
						<?php if($error==1){?>
							<div class="mydialog"><h6>Incorrect Username or Password !</h6></div>
						<?php }?>
						<div class="form-input">
							<input type="password" name="password" placeholder="Enter Password"> <br>
						</div>
						<div> <a class="new" href="register.php">New to this Connection?</a></div><br>
						<input type="submit" class="mbtn" value="Login">
					</div>
				</form>
			</div>
		</div>
	</body>
</html>
