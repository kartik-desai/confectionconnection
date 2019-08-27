<?php
  include("dbconnect.php");
  include("getName.php");
  session_start();
  $t="Search Result";
  $q=$_POST["search"];
  if(strpos($q,'script')==true){
    Header("Location:homepage.php");
  }
?>
<html lang="en">
  <head>
    <title><?php echo($t);?> </title>
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
        <div class="col-lg-9">
          <div class="row" style="margin-top: 40px;">
            <h4 style="color: #ff4a83;">Search Results for "<?php echo($_POST["search"]);?>"</h4>
          </div>
          <div class="row" style="margin-top: 20px;">
            <?php
              if (isset($_POST["search"])) {

                $query = $_POST["search"];
                $sql = mysqli_query ($conn,"SELECT * from CakeData WHERE Name LIKE '%{$query}%'");
                while ($row = mysqli_fetch_array($sql)) {
                  echo ("<div class='col-lg-4 col-md-6 mb-4' style=' height: 400px; '><div class='card h-100' style='border: 1px solid #d6cccc;'><a href='item.php?id=" . $row["PID"] ."'><img class='card-img-top' height=200 width=200 src=" . $row["ImgSrc"] . " alt=''></a>");
                  echo ("<div class='card-body'><h4 class='card-title'><a href='item.php?id=" . $row["PID"] . "'>" . $row["Name"] . "</a></h4><h5>₹" . $row["Rate"] . " </h5>" . "</div><div class='card-footer'><small class='text-muted'>&#9733; &#9733; &#9733; &#9733; &#9734;</small></div></div></div>");

                }
              }
            ?>
          </div>
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
