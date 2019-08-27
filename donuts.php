<?php
  include("dbconnect.php");
  include("getName.php");
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <script type="text/javascript">
      if (!!window.performance && window.performance.navigation.type === 2) {
        console.log('Reloading');
        window.location.reload();
      }
    </script>
    <title>Donuts</title>
    <link rel="icon" sizes="300*300" href="logo.png">
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="css/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="css/homepage.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
  </head>
  <style>
{
      background-color: #edeff3;
    }
  </style>
  <script src="js/jquery.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
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
            <a href="donuts.php" class="list-group-item"><div>Donuts</div><div style="text-align: right;margin-top: -25px;">></div></a>
          </div>
        </div>
        <div class="col-lg-9">
          <div class="row" style="margin-top: 50px;">
            <?php
              $sql3="select * from CakeData where Item in('Donut');";
              $result=mysqli_query($conn,$sql3);
              if($result->num_rows>0){
                while ($row = mysqli_fetch_assoc($result)){
                  echo ("<div class='col-lg-4 col-md-6 mb-4'><div class='card h-100' style='border: 1px solid #d6cccc;'><a href='item.php?id=" . $row["PID"] ."'><img class='card-img-top' height=200 width=200 src=" . $row["ImgSrc"] . " alt=''></a>");
                  echo ("<div class='card-body'><h4 class='card-title'><a href='item.php?id=" . $row["PID"] . "'>" . $row["Name"] . "</a></h4><h5>₹" . $row["Rate"] . " </h5>" . "</div><div class='card-footer'><small class='text-muted'>&#9733; &#9733; &#9733; &#9733; &#9734;</small></div></div></div>");
                }
              }
            ?>
          </div>
        </div>
      </div>
    </div><hr><br><br><br>
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white" style="font-family: 'Pacifico', cursive; font-size: 30px">Confection Connection©</p>
      </div>
    </footer>
  </body>
</html>
