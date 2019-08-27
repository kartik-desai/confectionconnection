<?php
  session_start();
  include("dbconnect.php");
  include("getName.php");
  include("navigate.php");
?>
<html lang="en">
  <head>
    <title>Confection Connection</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="icon" sizes="300*300" href="logo.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="css/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="css/homepage.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
  </head>
  <style>
    .mylink:hover{
      background-color: #edeff3;
    }
  </style>
  <script src="js/jquery.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script type="text/javascript">
    if (!!window.performance && window.performance.navigation.type === 2) {
      console.log('Reloading');
      window.location.reload();
    }
  </script>
  <body>
    <center> <h1 style="font-family: 'Pacifico', cursive;font-size: 60px;margin-top: 60px;margin-left: 65px; color: #ff4a83">------Orders------ </h1><br></center>
    <div class="container">
    <div class="row">
    <?php 
      //$email=$_SESSION["name"];
      if(isset($_SESSION["name"])){
                $loc = strpos($_SESSION["name"], "@");
                $name=substr($_SESSION["name"],$loc-1);
                $sql = "select * from Orderdetails where Username ='".$_SESSION["name"]."';";
                //echo $sql;
                $result=mysqli_query($conn,$sql);
                $amt = 0;

                if($result->num_rows>0){
                  
                  while ($rss = mysqli_fetch_assoc($result)){
                    $sql = "select * from CakeData where PID=".$rss["Pid"].";";
                    $result2=mysqli_query($conn,$sql);
                    if($result2->num_rows>0){
                      while ($rs = mysqli_fetch_assoc($result2)){
                        //echo $rs["PID"];
                       echo ("<div class='col-lg-4 col-md-6 mb-4'><div class='card h-100' style='border: 1px solid #d6cccc;'><div class='card-title'><center><b style='color:#ff4a83;'>Order No:  ".$rss["Orderno"]."</b></center></div><a href='item.php?id=". $rs["PID"] ."'><img class='card-img-top' height=200 width=200 src=" . $rs["ImgSrc"] . " alt=''></a>");
                      
                        $amt= $amt + ($rs["Rate"] * $rss["Quantity"]);
                        echo ("<div class='card-body'><h4 class='card-title'><a href='item.php?id=" .  $rs["PID"] . "'>" .  $rs["Name"] . "</a></h4><h5>₹" . $rs["Rate"] . "</h5>" . "<br><h6>Quantity: ". $rss["Quantity"]."</div><div class='card-footer'><small class='text-muted'>PENDING  </small>
        </div></div></div>");
                      }
                    }
                  }
                }
            }
          
    ?>

    <!--<div class='col-lg-4 col-md-6 mb-4'>
      <div class='card h-100' style='border: 1px solid #d6cccc;'>
          <a href='item.php?id='>
          <img class='card-img-top' height=200 width=200 src=" . $row["ImgSrc"] . " alt=''>
        </a>
        <div class='card-body'>
          <a href='item.php?id'>
          <h4 class='card-title'> Name Of Cake </h4>
          <h5> Quantity </h5>
          <h6> Total Amount $$$$$</h6>
        </div>
        <div class='card-footer'>
          <small class='text-muted'> DELIVERED/PENDING</small>
        </div>
      </div>
    </div>
--></div>
  </div>
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white" style="font-family: 'Pacifico', cursive;font-size: 30px">Confection Connection©</p>
      </div>
    </footer>

  </body>
</html>
