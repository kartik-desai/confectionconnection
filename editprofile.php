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
      $asd = mysqli_query($conn,"SELECT Password FROM userlogin WHERE Email in('".$_SESSION["name"]."');");
      if($asd->num_rows>0){
        while($qq = mysqli_fetch_assoc($asd)){
          $pass = $qq['Password'];
        }
      }
    ?>
    <center> <h1 style="font-family: 'Pacifico', cursive;font-size: 60px;margin-top: 60px;margin-left: 65px; color: #ff4a83">------Edit Profile------ </h1>
    <br>
    <form class="form-horizontal" role="form" method="POST" action="updateprofile.php">
      <div class="form-group">
        <label class="col-lg-3 control-label">Name:</label>
          <div class="col-lg-8">
            <input class="form-control" type="text" name="Name" placeholder="<?php echo $name; ?>">
          </div>
        </div>
      <div class="form-group">
        <label class="col-md-3 control-label">Phone:</label>
        <div class="col-md-8">
          <input class="form-control" type="text" name="Phone" placeholder="<?php echo $phone; ?>">
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-3 control-label">Address:</label>
        <div class="col-md-8">
          <input class="form-control" type="Address" name="Address" placeholder="<?php echo $add; ?>">
        </div>
      </div>
      <div class="form-group">
        <label class="col-lg-3 control-label">Email:</label>
        <div class="col-lg-8">
          <input class="form-control" type="text" name="Email" placeholder="<?php echo $email; ?>" disabled>
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-3 control-label">Password:</label>
        <div class="col-md-8">
          <input class="form-control" type="password" name="Pass" placeholder="<?php echo $pass ?>" disabled>
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-3 control-label"></label>
        <div class="col-md-8">
          <input class="btn btn-primary" value="Save" type="submit" style="background-color: #ff4a83; border:#ff4a83;">
          <span></span>
          <input class="btn btn-default" value="Cancel">
        </div>
      </div>
    </form>
    </center>
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white" style="font-family: 'Pacifico', cursive;font-size: 30px">Confection Connection©</p>
      </div>
    </footer>
  </body>
</html>
