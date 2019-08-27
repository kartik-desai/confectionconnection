<?php
  include("dbconnect.php");
  $pid = $_GET["pid"];
  session_start();
  $name = $_SESSION["name"];
  if (isset($_SESSION["name"])){
    $sql2="delete from UserCart where Email = '$name' and PID = '$pid';";
    $rs=mysqli_query($conn,$sql2);
    header("Location: cart.php");
  }else{
  	$sql2="delete from Cart where SessionID= '".$_COOKIE["UID"]."' and PID = '$pid';";
    $rs=mysqli_query($conn,$sql2);
    header("Location: cart.php");
 
  }

?>
