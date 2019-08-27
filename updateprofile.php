<?php
  include("dbconnect.php");
  session_start();
  $id = $_SESSION['name'];

  $sql = "select * from userinfo where Email in('".$_SESSION["name"]."');";
  $result=mysqli_query($conn,$sql);
  if($result->num_rows>0){
    while ($rss = mysqli_fetch_assoc($result)){
      $email = $rss["Email"];
      $name = $rss["Name"];
      $phone = $rss["Phone"];
      $add = $rss["Address"];
    }
  }

  if(!($_POST['Name']=="")){
    $name = $_POST['Name'];
    $sql = mysqli_query($conn,"UPDATE userinfo SET Name='$name' WHERE Email='$id';");
  }
  if (!($_POST['Phone']=="")) {
    $phone = $_POST['Phone'];
    $sql = mysqli_query($conn,"UPDATE userinfo SET Phone='$phone' WHERE Email='$id';");
  }
  if (!($_POST['Email']=="")) {
    $email = $_POST['Email'];
    $sql = mysqli_query($conn,"UPDATE userinfo SET Email='$email' WHERE Email='$id';");
    $sql2 = mysqli_query($conn,"UPDATE userlogin SET Email='$email' WHERE Email='$id'");
  }
  if (!($_POST['Address']=="")) {
    $add = $_POST['Address'];
    $sql = mysqli_query($conn,"UPDATE userinfo SET Address='$add' WHERE Email='$id';");
  }
  header("Location:editprofile.php");
?>
