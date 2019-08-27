<?php
session_start();
include 'dbconnect.php';
$otp=$_POST['otp'];
$p=$_POST["password"];
$cp=$_POST["Cpassword"];
$otpS=$_SESSION["otpS"];
if (($otp-$otpS)==0){ 
	if (strcmp($cp,$p)==0){ 
		if(mysqli_query($conn,"insert into userlogin values('".$_SESSION["email"]."','".$cp."');"))
		header("Location: login.php");
	}
	else{
		header("Location: setpass.php?err=2");
	}	
}	
else{
	header("Location: setpass.php?err=1");
}

?>