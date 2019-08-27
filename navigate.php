<?php
  include("dbconnect.php");
  include("getName.php");
  require_once("deleteOrder.php");
  include "deleteOrder.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="icon" sizes="300*300" href="logo.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="css/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="css/homepage.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <style>
    .mylink:hover{
      background-color: #edeff3;
    }
    .mybtn{
      background-color: #ffffff;
      border-radius: 6px;
      border-color: #ff4a83;
    }
    .mybtn:hover{
      border-color: #f7f3f3;
    }
    .topnav {
      overflow: hidden;
      background-color: #e9e9e9;
    }
    .topnav .search-container {
      float: right;
    }
    .topnav input[type=text] {
      padding: 6px;
      margin-top: 8px;
      font-size: 17px;
      border: none;
    }
    .topnav .search-container button {
      float: right;
      padding: 6px 10px;
      margin-top: 8px;
      margin-right: 16px;
      background: #ddd;
      font-size: 17px;
      border: none;
      cursor: pointer;
    }
    .topnav .search-container button:hover {
      background: #ccc;
    }
    @media screen and (max-width: 600px) {}
    .topnav .search-container {
      float: none;
    }
    .topnav a, .topnav input[type=text], .topnav .search-container button {
      float: none;
      display: block;
      text-align: left;
      width: 100%;
      margin: 0;
      padding: 14px;
    }
    .topnav input[type=text] {
      border: 1px solid #ccc;
    }
    .show {display:block;}
  </style>
  <script src="js/jquery.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script type="text/javascript">
    function myFunction() {
        document.getElementById("dropdown-menu").classList.toggle("show");
    }
    window.onclick = function(e) {
      var myDropdown = document.getElementById("dropdown-menu");
        if (myDropdown.classList.contains('show')) {
          myDropdown.classList.remove('show');
        }
    }
  </script>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="homepage.php" style="font-family: 'Pacifico', cursive;font-size: 28px">Confection Connection</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <div class="search-container" style="margin-top: 5px;margin-right: 6px;">
                <form action="search.php" method="POST">
                  <input type="text" placeholder="Search..." name="search" class="search" style="border-radius: 5px;border: 2px solid; border-color: #ffffff">
                  <button type="submit" class="mybtn" style=" height: 33px; "><i class="fa fa-search"></i></button>
                </form>
              </div>
            </li>
            <li class="nav-item">
              <?php
                $q=0;
                if (!$conn) {
                  echo("Connection failed: " . mysqli_connect_error());
                }
                if (isset($_SESSION["name"])) {
                  $sql="select Quantity from UserCart where Email in('".$_SESSION["name"]."')";//.$_SESSION["name"]."');";
                  $result=mysqli_query($conn,$sql);
                  if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                      $q += $row["Quantity"];
                    }
                  }
                }
                else{
                  if(isset($_COOKIE["UID"])){
                    $cookie=$_COOKIE["UID"];
                    $sql1="select Quantity from Cart where SessionID in ('".$cookie."');";
                    $result=mysqli_query($conn,$sql1);
                    if ($result->num_rows > 0) {
                      while($row = $result->fetch_assoc()){
                        $q += $row["Quantity"];
                      }
                    }
                  }
                  else{
                    $q=0; //setcookie($cookie_name,$cookie_value,time()+(86400*30*365));
                  }
                }
              ?>
              <a class="nav-link" href="cart.php"><i class="material-icons">shopping_cart</i><span>(<?php echo $q;?>)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="aboutus.php">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="homepage.php">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <div class="dropdown">
                <?php
                  if (isset($_SESSION["name"])) {
                ?>
                <a class="nav-link" class="dropdown-toggle" data-toggle="dropdown" href="#" onclick="myFunction();">Hello, <?php echo $name; ?></a>
                <ul class="dropdown-menu" id="dropdown-menu">
                <a style="text-decoration: none;" href="editProfile.php">
                  <li class="mylink">&nbsp&nbspEdit Profile</li>
                </a>
                <a style="text-decoration: none;" href="order.php">
                  <li class="mylink">&nbsp&nbspOrders</li>
                </a>
                <a style="text-decoration: none;" href="logout.php">
                  <li class="mylink">&nbsp&nbspLogout</li>
                </a>
                </ul>
                </div>
              <?php } else{ ?>
                <a class="nav-link" href="login.php">Login Or Sign Up </a>
              <?php }?>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </body>
 
</html>
