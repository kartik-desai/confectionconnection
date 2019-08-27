<?php
  include("dbconnect.php");
  include("getName.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="css/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>
    <div class="container">
      <br><center style="font-family: 'Pacifico', cursive;font-size: 28px; color:#ff4a83">Admin Panel</center><hr>

      <div class="row">
      <a href="Adminaction.php?act=1" style="font-family: 'Pacifico', cursive;font-size: 20px">
        <div class='card h-100' style='border: 3px solid #d6cccc; width: 200px;margin-left: 20px;'>
            <img class='card-img-top' height=200 width=200 src="999.png">
            <div class='card-body'>
              <center><h4 class='card-title' style="font-family: 'Pacifico', cursive;font-size: 30px"> Orders </h4></center>
            </div>
        </div>
      </a>
      <a href="Adminaction.php?act=2" style="font-family: 'Pacifico', cursive;font-size: 20px">
        <div class='card h-100' style='border: 3px solid #d6cccc; width: 200px;margin-left: 20px;'>
            <img class='card-img-top' height=200 width=200 src="111.jpg">
            <div class='card-body'>
              <center><h4 class='card-title' style="font-family: 'Pacifico', cursive;font-size: 30px"> Customers</h4></center>
            </div>
        </div>
      </a>

      <a href="Adminaction.php?act=3" style="font-family: 'Pacifico', cursive;font-size: 20px">
        <div class='card h-100' style='border: 3px solid #d6cccc;width: 200px;margin-left: 20px;'>
            <img class='card-img-top' height=200 width=200 src="222.png">
            <div class='card-body'>
              <center><h4 class='card-title' style="font-family: 'Pacifico', cursive;font-size: 30px"> Add Item</h4></center>
            </div>
        </div>
      </a>

      <a href="sendAck.php" style="font-family: 'Pacifico', cursive;font-size: 20px">
        <div class='card h-100' style='border: 3px solid #d6cccc;width: 200px;margin-left: 20px;'>
            <img class='card-img-top' height=200 width=200 src="456.png">
            <div class='card-body'>
              <center><h4 class='card-title' style="font-family: 'Pacifico', cursive;font-size: 30px"> Send Ack</h4></center>
            </div>
        </div>
      </a>

      <a href="mailall.php" style="font-family: 'Pacifico', cursive;font-size: 20px">
        <div class='card h-100' style='border: 3px solid #d6cccc;width: 200px;margin-left: 20px;'>
            <img class='card-img-top' height=200 width=200 src="888.jpg">
            <div class='card-body'>
              <center><h4 class='card-title' style="font-family: 'Pacifico', cursive;font-size: 30px">Mail</h4></center>
            </div>
          </div>
      </a>
</div>
    </div>
  </body>
</html>
