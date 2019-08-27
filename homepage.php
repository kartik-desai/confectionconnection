<?php
  session_start();
  include("dbconnect.php");
  include("getName.php");
  require_once("deleteOrder.php");
  include "deleteOrder.php";
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
    <?php
      include("navigate.php");
    ?>
    <div class="container">
      <div class="row">
        <div class="col-lg-3">
          <h1 class="my-4"><img src="logo.png"></h1>
          <div class="list-group">
            <a href="cakes.php" class="list-group-item">Cakes</a>
            <a href="cupcakes.php" class="list-group-item">Cupcakes</a>
            <a href="donuts.php" class="list-group-item">Donuts</a>
          </div>
            <center style="margin-top: 20px;"><img src="images/laepi.png" height="400" width="250"><img src="images/ad1.png" height="400" width="250" style="margin-top: 20px;"></center>

        </div>
        <div class="col-lg-9">
          <div id="carouselExampleIndicators" class="carousel slide my-5" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
              <div class="carousel-item active">
                <img class="d-block img-fluid" src="images/piece of cake.jpeg" alt="First slide">
              </div>
              <div class="carousel-item">
                <img class="d-block img-fluid" src="images/donut.jpeg" alt="Second slide">
              </div>
              <div class="carousel-item">
                <img class="d-block img-fluid" src="images/c1.jpg" alt="Third slide">
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
          <h4 style="font-family: 'Pacifico', cursive;font-size: 30px;margin-top: 20px;margin-left: 0px; color: #ff4a83">Best Selling</h4><br>
          <hr style="color: #ff4a83"><br>
          <div class="row">
            <?php
              $sql3="select * from CakeData where PID in(1009,1012,1020)";
              $result=mysqli_query($conn,$sql3);
     		      while($row=mysqli_fetch_assoc($result)){echo("<div class='col-lg-4 col-md-6 mb-4' style=' height: 400px; '><div class='card h-100' style='border: 1px solid #d6cccc;'>");
                 echo("<a href='item.php?id=" . $row["PID"] ."'><img class='card-img-top' height=200 width=200 src=" . $row["ImgSrc"] . " alt=''></a>");
                 echo("<div class='card-body'><h4 class='card-title'><a href='item.php?id=" .$row["PID"] . "'>" . $row["Name"] . "</a></h4><h5>₹" . $row["Rate"] . " </h5>" . "</div><div class='card-footer'><small class='text-muted'>&#9733; &#9733; &#9733; &#9733; &#9734;</small></div></div></div>");
              }
            ?>
          </div>
          <h4 style="font-family: 'Pacifico', cursive;font-size: 30px;margin-top: 20px;margin-left: 0px; color: #ff4a83"> CC Special ♥</h4> <br>
          <hr style="color: #ff4a83"><br>
          <div class="row">
            <?php
              $sql3="select * from CakeData where PID in(1007  ,1014,1021)";
              $result=mysqli_query($conn,$sql3);
   		         while($row=mysqli_fetch_assoc($result)){
                 echo("<div class='col-lg-4 col-md-6 mb-4' style=' height: 400px; '><div class='card h-100' style='border: 1px solid #d6cccc;'>");
                 echo("<a href='item.php?id=" . $row["PID"] ."'><img class='card-img-top' height=200 width=200 src=" . $row["ImgSrc"] . " alt=''></a>");
                 echo("<div class='card-body'><h4 class='card-title'><a href='item.php?id=" .$row["PID"] . "'>" . $row["Name"] . "</a></h4><h5>₹" . $row["Rate"] . " </h5>" . "</div><div class='card-footer'><small class='text-muted'>&#9733; &#9733; &#9733; &#9733; &#9734;</small></div></div></div>");
               }
              ?>
          </div>
        </div>
      </div>
    </div><hr><br><br><br>
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white" style="font-family: 'Pacifico', cursive;font-size: 30px">Confection Connection©</p>
      </div>
    </footer>
  </body>
</html>
