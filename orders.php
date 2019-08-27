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
    <?php
      //$sql = "select * from userinfo where Email in('".$_SESSION["name"]."');";
      //$result=mysqli_query($conn,$sql);
    ?>
    <center> <h1 style="font-family: 'Pacifico', cursive;font-size: 60px;margin-top: 60px;margin-left: 65px; color: #ff4a83">------Orders------ </h1><br></center>

    <div class='col-lg-4 col-md-6 mb-4'>
      <div class='card h-100' style='border: 1px solid #d6cccc;'>
          <img class='card-img-top' height=200 width=200 src=" . $row["ImgSrc"] . " alt=''>
        <div class='card-body'>
          <h4 class='card-title'> Name Of Cake </h4>
          <h5> Quantity </h5>
          <h6> Total Amount $$$$$</h6>
        </div>
        <div class='card-footer'>
          <small class='text-muted'> DELIVERED/PENDING  </small>
        </div>
      </div>
    </div>

    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white" style="font-family: 'Pacifico', cursive;font-size: 30px">Confection Connection©</p>
      </div>
    </footer>
  </body>
</html>
