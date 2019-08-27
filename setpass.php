<?php
  $error=0;
  if(isset($_GET["err"])){
    $error=$_GET["err"];
  }
?>

<html>

<head>
    <title>Set Password</title>
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
      <form method="post" name="form" action="valpass.php">
        <div class="box">
          <img src="logo.png" width=200 height=200>
          <div class="txt">Set Password</div>
          <div class="form-input">
            <input type="text" style="margin-left: 28px;" name="otp" placeholder="Enter OTP"> <br>
            <?php if($error==1){?>
              <div class="mydialog"><h6>Incorrect OTP !</h6> </div>
            <?php }?>
            <i class="material-icons">vpn_key</i>
            <input type="Password" name="password" placeholder="Set Password"><br>
            <i class="material-icons">vpn_key</i>
            <input type="Password" name="Cpassword" placeholder="Confirm Password"><br>
            <?php if($error==2){?>
              <div class="mydialog"> <h6>Incorrect Password !</h6> </div>
            <?php }?>
          </div>
          <input type="submit" class="mbtn" value="Submit">
        </div>
      </form>
    </div>
  </div>
</body>
</html>
