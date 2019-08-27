<?php
  session_start();
  include("dbconnect.php");
  $name=null;
  $loc=null;
  $chk = 0;
  if (isset($_SESSION["name"])){
   	$pid=$_SESSION["pid"];
    $sql="select PID from UserCart where Email='".$_SESSION["name"]."';";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){
      while($row=mysqli_fetch_assoc($result)){
        if($pid-$row["PID"]==0)
          $chk = 1;
        }
      }
      if ($chk == 0) {
        $sql="insert into UserCart values('".$_SESSION["name"]."',".$pid.",1);";
        $result=mysqli_query($conn,$sql);
        if($pid<1010 || $pid=1010) {
          header("Location: homepage.php");
        }
        if($pid<1019){
          header("Location: homepage.php");
        }
        if($pid>1019 || $pid=1019){
          header("Location: homepage.php");
        }
      }
      else {
        header("Location:cart.php?err=2");
      }
    }
    else{
      $pid=$_SESSION["pid"];

      setcookie("UID",session_id(),(time()+(86400*365)));
      $sql="select PID from Cart where SessionID='".session_id()."';";
      $result=mysqli_query($conn,$sql);
      if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){
          if($pid-$row["PID"]==0) {
            $chk = 1;
          }
        }
      }
      if ($chk == 0) {
        $sql="insert into Cart values('".session_id()."',".$pid.",1);";
        $result=mysqli_query($conn,$sql);
        if($pid<1010 || $pid=1010) {
          header("Location: homepage.php");
        }
        else if($pid<1019){
          header("Location: homepage.php");
        }
        else if($pid>1019 || $pid=1019){
          header("Location: homepage.php");
        }
      }
      else {
        header("Location:cart.php?err=2");
      }
    }
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>

</body>
</html>
