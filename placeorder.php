<?php
  session_start();
  include("dbconnect.php");
  include("getName.php");
  include("navigate.php");
  require_once('deleteOrder.php');
  $num=0;
  if(isset($_SESSION["name"])){
  if(!isset($_SESSION["orderno"])){
  $max=99999;
    $min=999;
    $i=0;
    //Randomize
    $num=rand($min,$max);
    $date = date('d/m/Y', time());
    $sql = "select * from UserCart where Email in('".$_SESSION["name"]."');";
    $result=mysqli_query($conn,$sql);
    if($result->num_rows>0){
      while ($rss = mysqli_fetch_assoc($result)){
        $sql = "select * from CakeData where PID=".$rss["PID"].";";
        $result2=mysqli_query($conn,$sql);
        if($result2->num_rows>0){
  
                      while ($rs = mysqli_fetch_assoc($result2)){
                        $sql="insert into orderdetails values(".$num.",'".$date."','".$_SESSION["name"]."',".$rs["PID"].",".$rss["Quantity"].",'',0,'');";
        $result3=mysqli_query($conn,$sql);  
        $i++;
                      }
                    }
                  }
                } 
              $_SESSION["orderno"]=$num; 
  }
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
    .toolbar{
      border:1px solid #ff4a83;
      margin-bottom: 50px;
      width:600px;
      background-color: #ff4a83;
    }
  </style>
  <script src="js/jquery.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="addorder.js"></script>
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
          mysqli_query($conn,"UPDATE orderdetails SET Name='".$name."', Phone=".$phone.", Address='".$add."' WHERE Orderno=".$num.";");
        }
      }
      
    ?>
    <center> <h1 style="font-family: 'Pacifico', cursive;font-size: 60px;margin-top: 60px;margin-left: 65px; color: #ff4a83">------Place Order------ </h1>
    </center>
    <br>
    <div class="container">
    <div class="row">

  <div class="col-lg-7">
     <div class="row">
     <?php
              $count=0;
              //$name=null;
              $loc=null;
              $amt=0;
              if(isset($_SESSION["name"])){
                //$loc = strpos($_SESSION["name"], "@");
                //$name=substr($_SESSION["name"],$loc-1);
                $sql = "select * from UserCart where Email in('".$_SESSION["name"]."');";
                $result=mysqli_query($conn,$sql);
                $amt = 0;
                if($result->num_rows>0){
                  while ($rss = mysqli_fetch_assoc($result)){
                    $sql = "select * from CakeData where PID=".$rss["PID"].";";
                    $result2=mysqli_query($conn,$sql);
                    if($result2->num_rows>0){
                      while ($rs = mysqli_fetch_assoc($result2)){
                        echo ("<div class='col-lg-4 col-md-6 mb-4'><div class='card h-100' style='border: 1px solid #d6cccc;margin-top=10px;'>");
                        
                        $amt= $amt + ($rs["Rate"] * $rss["Quantity"]);
                        echo ("<div class='card-body'><h4 class='card-title'><a href='item.php?id=" .  $rs["PID"] . "'>" .  $rs["Name"] . "</a></h4><h5>₹" . $rs["Rate"] . "</h5>" . "</div><div class='card-footer'><h6>Quantity: ". $rss["Quantity"]."<br></h6></div></div></div>");
                        $count++;
                      }
                    }
                  }
                }
            }
            ?>
</div>
          <div class="toolbar">
            
            <div style="color:white;font-size: 20px;margin-left: 10px;padding-top:5px;margin-top: 3px;">
              Total Amt: ₹<?php echo($amt); ?>
            </div>
          
          </div>
  </div>
  <div class="col-md-5"> 
    <form class="form-horizontal" role="form" method="POST" action="https://digipaym.000webhostapp.com/LoginPage.php" onsubmit="<?php session_unset();?>">
      <div class="form-group">
        <label class="col-lg-3 control-label">Name:</label>
          <div class="col-lg-8">
            <input class="form-control" size="20" type="text" name="Name" value="<?php echo $name; ?>">
          </div>
        </div>
      <div class="form-group">
        <label class="col-md-3 control-label">Phone:</label>
        <div class="col-md-8">
          <input class="form-control" type="text" name="Phone" value="<?php echo $phone; ?>">
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-3 control-label">Address:</label>
        <div class="col-md-8">
          <input class="form-control" type="Address" name="Address" value="<?php echo $add; ?>">
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-3 control-label"></label>
        <div class="col-md-8">
          <!-- Amount: -->
<input type="hidden" name="amount" value="<?php echo ($amt);?>"> 

<!-- Merchant Username: -->
<input type="hidden" name="merchant" value="confectionconnection@gmail.com"> 
<!-- Merchant AccNo: -->
<input type="hidden" name="acc_no" value="5716479289581770"> 

          <input class="btn btn-primary" value="Confirm Order" type="submit" style="background-color: #ff4a83; border:#ff4a83;" >
        <br>
      </form>
        <a href="homepage.php?error=<?php echo $num;?>">
          <input class="btn btn-primary" type="button" style="background-color: #ff4a83; border:#ff4a83;margin-top:20px;" value="Cancel">
        </a>
        </div>
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
<?php
}
else
  echo '<meta http-equiv="refresh" content="0; URL=login.php" />';
?>