<?php

	include("dbconnect.php");
	session_start();

	$uname="";
	$pwd="";
	$uname=$_POST["uname"];
	$pwd=$_POST["password"];
	if(strcmp($uname, "admin")==0){
		if(strcmp($pwd, "ccAdmin")==0){
			header('Location: adminpanel.php');
		}else{
			header('Location: login.php?err=1');
		}
	}
	else{
	$sql="select * from userlogin where Email='".$uname."'";
	$result=mysqli_query($conn,$sql);

	if(mysqli_num_rows($result) > 0){
		$row = mysqli_fetch_assoc($result);
		if ($row["Email"]==$uname && $row["Password"]==$pwd){
			$_SESSION["name"]=$uname;
			header('Location: homepage.php');
		}
		else{
			header('Location: login.php?err=1');
		}
	}
	else{
		header('Location: login.php?err=1');
	}
}
?>
