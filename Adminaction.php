<?php
  include("dbconnect.php");
  $act = $_GET["act"];
?>
<!DOCTYPE html>
<html>
  <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
  <body>
    <?php
    $act = $_GET["act"];
    if($act==1){
      echo ("
        <table class='table table-bordered table-dark' border='4px'>
          <thead>
            <tr>
              <th scope='col'>Order No</th>
              <th scope='col'>Username</th>
              <th scope='col'>PID</th>
              <th scope='col'>Quantity</th>
            </tr>
          </thead>
        <tbody>
      ");
      $rss=mysqli_query($conn,"SELECT * FROM orderdetails");
      if($rss->num_rows>0){
        while ($row = mysqli_fetch_assoc($rss)){
          echo ("
            <tr>
              <th scope='row'>".$row['Orderno']."</th>
              <td>".$row['Username']."</td>
              <td>".$row['Pid']."</td>
              <td>".$row['Quantity']."</td>
            </tr>
          ");
        }
      }
      echo "</tbody></table>";
    }
    elseif($act==2){
      echo ("
        <table class='table table-bordered table-dark' border='4px'>
          <thead>
            <tr>
              <th scope='col'>Email</th>
              <th scope='col'>Name</th>
              <th scope='col'>Phone</th>
              <th scope='col'>Address</th>
            </tr>
          </thead>
        <tbody>
      ");
      $rss=mysqli_query($conn,"SELECT * FROM userinfo");
      if($rss->num_rows>0){
        while ($row = mysqli_fetch_assoc($rss)){
          echo ("
            <tr>
              <td>".$row['Email']."</td>
              <td>".$row['Name']."</td>
              <td>".$row['Phone']."</td>
              <td>".$row['Address']."</td>
            </tr>
          ");
        }
      }
      echo "</tbody></table>";
    }
    elseif($act==3) {
      echo("
        <br><center style='font-family: 'Pacifico', cursive;font-size: 28px; color:#ff4a83'>-----Add Item-----</center><hr>
        <center>
          <form method='POST' action='newcakedata.php'>
            <input type='text' name='pid' placeholder='PID'><br><br>
            <input type='text' name='name' placeholder='Name'><br><br>
            <input type='text' name='description' placeholder='Description'><br><br>
            <input type='text' name='rate' placeholder='Rate'><br><br>
            <input type='text' name='img' placeholder='ImgSrc'><br><br>
            <input type='text' name='type' placeholder='Type'><br><br>
            <input type='submit' value ='Add'>
          </form>
        </center>
      ");
    }
     ?>
  </body>
</html>
