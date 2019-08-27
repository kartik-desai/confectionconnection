<?php
  include("dbconnect.php");
  session_start();
  $q=0;
  $pid=$_GET["id"];
  if (isset($_SESSION["name"])){
    echo $pid;
    $sql="select * from UserCart where Email in('".$_SESSION["name"]."') AND PID=".$pid.";";
    $rss=mysqli_query($conn,$sql);
    if($rss->num_rows>0){
      while ($row = mysqli_fetch_assoc($rss)){
        $q=$row["Quantity"];
      }
    }
    $q++;
    $sql2="update UserCart set Quantity=".$q." where PID=".$pid.";";
    $rs=mysqli_query($conn,$sql2);
    header("Location: cart.php");
  }
  else{
    $cookie=$_COOKIE["UID"];
    echo $q;
    $sql1="select * from Cart where SessionID in ('".$cookie."') AND PID=".$pid.";";
    $rss=mysqli_query($conn,$sql1);
    if($rss->num_rows>0){
      while ($row = mysqli_fetch_assoc($rss)){
        $q=$row["Quantity"];
      }
    }
    $q++;
    $sql2="update Cart set Quantity=".$q." where PID=".$pid.";";
    $rs=mysqli_query($conn,$sql2);
    header("Location: cart.php");
}
?>
