<?php
  $error=0;
  if(isset($_GET["err"]))
    $error=$_GET["err"];
?>
<html>
  <head>
    <title>Register Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="css/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" sizes="200x200" href="logo.png">
    <meta charset="utf-8">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
  </head>
  <style>
  body{
    background-image: url("images/register.jpg");
    background-position: center;
    background-repeat: no-repeat;
          background-size: cover;
          -webkit-background-size: cover;
          -moz-background-size: cover;
          -o-background-size: cover;
  }
  .txt{
    color: white;
    font-family: sans-serif;
    font-size: 25;
  }

  image{
    width: 100%;
    height: auto;
  }

  .mbtn{
    width: 150px;
    height: 37px;
    background-color: rgb(255, 74, 116);
      border-radius: 5px;
      border-width: 2px;
      border-color: white;
    color: aliceblue;
    font-size: 21;
  }
  .mbtn:hover{
    border-width: 2px;
    border-color: rgb(255, 74, 116);
  }
  .mydialog{
        width: 250;
      background: rgba(255, 0, 0, 0.42);
      height: 26px;
      border: 1px solid rgba(255, 74, 131, 0.44);
      padding-top: 4px;
      margin-left: 50px;
      margin-bottom: 10px;
      margin-top: -19px;
      color: white;
      border-radius: 5px;
      font-family: sans-serif;
  }
  .box{
    width: 350px;
    height: 525px;
    margin-left: 15px;
    text-align: center;
    background-color: rgba(255, 255, 255,0.15);
  }
  .jumbotron{
    width: 350px;
    height: 500px;
    margin-left: 350px;
    background-color:
  }

  .container{
    width: 400px;
    height: 400px;
    margin-top: 50px;
  }
  .new{
    text-align: right;
        color: white;
  }
  .new:hover{
    color: white;
    text-decoration: underline;
  }
  input{
     height: 35px;
     width: 280px;
     font-size: 18px;
     margin-bottom: 5px;
     margin-top: 2px;
    border-radius: 4px;
   }

  </style>

	<body style="body{background-image: url("images/bgImage.jpg");}">
		<div class="container">
			<div class="row">
				<form method="post" action="validate.php">
					<div class="box">
						<img src="logo.png" width=100 height=100>
            <div class="txt">Create Account </div>
            <div class="form-input">
							<br>  <input type="text" name="name" placeholder="Name"> <br>
              <?php if ($error==1){?>
							  <div class="mydialog"><h6>Incorrect Name!</h6></div>
			 				<?php }?>
						</div>
						<div class="form-input">
							<br>  <input type="email" name="uname" placeholder="Email"> <br> <br>
              <?php if ($error==2) {?>
							  <div class="mydialog"><h6>Incorrect Email ID !</h6></div>
							<?php }?>
						</div>
            <div class="form-input">
							<input type="text" name="phone" placeholder="Phone"> <br> <br>
              <?php if ($error==3){?>
							  <div class="mydialog"><h6>Incorrect Phone number !</h6></div>
			 				<?php } ?>
						</div>
            <div class="form-input">
							<input type="text" name="address" placeholder="Address"> <br><br>
						</div>
            <div class="form-input">
                Note: An OTP is sent to your Email. <br><br>
						</div>
						<input type="submit" class="mbtn" value="Register">
					</div>
				</form>
			</div>
		</div>
	</body>

</html>
