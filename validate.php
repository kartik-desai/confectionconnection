<?php
	//require 'PHPMailerAutoload.php';
	include("dbconnect.php");
	session_start();
	$name=$_POST["name"];
	$number=$_POST["number"];
	$email=$_POST["email"];
	$address=$_POST["address"];
	echo $name.$number.$email.$address;
	if(strlen($name)<2){
		header("Location: register.php?err=1");
	}
	else if(stripos($email,"@")==0 || strrpos($email,".")==strlen($email)-1){
		
		header("Location: register.php?err=2");
	}
	else if(strlen($number)>10 || strlen($number)<10){
		header("Location: register.php?err=3");
	}
	else{
		$_SESSION["email"]=$email;
		
		$max=99999;
		$min=999;
		//Randomize
		$num=rand($min,$max);
		//PHPMailer Object
		$_SESSION["otpS"]=$num;
		$headers = 'From: Confection Connection' . "\r\n" .
    					'Reply-To: No-Reply' . "\r\n" ;
    		$headers .=  'MIME-Version: 1.0' . "\r\n"; 
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$subject = "OTP to set password.";
		$body = "Your one-time-password is ".$num."!";

		if(mail($email,$subject,$body,$headers)){
			$sql="insert into UserInfo values('".$email."','".$name."','".$number."','".$address."');";
			if(mysqli_query($conn,$sql)){
				header("Location: setpass.php");
			}
		}else
		{
			header("Location: register.php");
		}
		//$_SESSION("session_id")=session_id();
			
		//Response.Write(Session.SessionID&"<br>")
		
	}
?>
