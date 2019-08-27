<?php
  include("dbconnect.php");
  include("getName.php");
  session_start();
  if(isset($_GET["id"]))
    $pid=$_GET["id"];
	if (($pid < 1011)) {
	  $t="Cake";
	}
	if (($pid > 1010 && $pid < 1019)) {
  	$t="Cupcake";
	}
	if (($pid >= 1019)) {
  	$t="Donut";
	}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title><?php echo($t); ?></title>
    <link rel="icon" sizes="300*300" href="logo.png">
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="css/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="css/homepage.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
  </head>
  <style>
    .mylink:hover{
      background-color: #edeff3;
      }
    .btnMy{
      margin-left: 150px;
      width: 150px;
      background: rgba(202, 202, 202, 0.48);
      text-align: center;
      height: 35px;
      margin-bottom: 10px;
      padding-top: 4px;
    }
    .btnMy:hover{
      box-shadow: 1px 1px 5px 1px #989696;
    }
    .linkMy:hover{
      text-decoration: none;
    }
    .card{
      border:0px;
      border-radius: 2px;
    }
  </style>
  <script src="js/jquery.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <body>
  <?php include("navigate.php");?>
      <?php
      	$pid=$_GET["id"];
      	$_SESSION["pid"]=$pid;
      	$sql="select * from CakeData where PID=".$pid;
          $result=mysqli_query($conn,$sql);
          $row=mysqli_fetch_assoc($result);
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
          </div>
          <div class="col-lg-7">
            <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
              <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              </ol>
              <div class="card h-100" style="margin-top: -35px; border-radius: 10px;">
                <div class="carousel-inner" role="listbox">
                  <img class="d-block img-fluid"  width=600 src=<?php echo($row["ImgSrc"]);?> alt="First slide" style="border-radius: 10px;">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-10 col-md-6 mb-4">
                <div class="card-body" style="width: 550px;">
                  <h4 class="card-title" style="color: #ff4a83;">
                    <?php
                      echo($row["Name"]);
                      if($row["PID"]<1011){
                        echo("&nbsp&nbsp&nbsp&nbsp(500gm)");
                      }
                    ?>
                  </h4>
                  <h5>₹<?php echo($row["Rate"]); ?></h5>
                    <p class="card-text"><?php echo($row["Description"]) ?> </p>
                </div>
                <a class="linkMy" href="addCart.php"><div class="btnMy">Add To Cart</div></a>
                <div class="card-footer" >
                  <small class="text-muted" style="font-size: 18px;">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white" style="font-family: 'Pacifico', cursive; font-size: 30px">Confection Connection©</p>
      </div>
    </footer>
  </body>
</html>
