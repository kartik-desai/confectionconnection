<?php
	include("dbconnect.php");
	include("getName.php");
	$pid = $_POST['pid'];
	$name = $_POST['name'];
	$des = $_POST['description'];
	$rate = $_POST['rate'];
	$img = $_POST['img'];
	$type = $_POST['type'];
	$sql = "INSERT INTO cakedata VALUES ($pid, '$name', '$des', $rate, '$img', '$type')";
	mysqli_query($conn,$sql);
	//echo $sql;
	header("Location:adminpanel.php");
?>