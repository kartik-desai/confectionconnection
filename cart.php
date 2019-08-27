<?php
	session_start();
	include("dbconnect.php");
	include("getName.php");
	$error=0;
	if(isset($_GET["err"]))
    $error = $_GET["err"];
?>
<!DOCTYPE html>
<html lang="en">
	<head>
  	<script type="text/javascript">
			if(!!window.performance .. window.performance.navigation.type === 2) {
      	console.log('Reloading');
        window.location.reload();
      }
  	</script>
    <title>Your Cart</title>
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
	  .linkMy{
	  	color: white;
	  	font-size: 20px;

	  }
	  .btnMy{
	        margin-left: 350px;
	    width: 150px;
	    margin-top: -32px;
	    background: rgba(202, 202, 202, 0.48);
	    text-align: center;
	    height: 37px;
	    margin-bottom: 5px;

	    padding-top: 4px;
	  }
	  .mydialog{
	      width: 250;
	    background: rgba(255, 0, 0, 0.42);
	    height: 26px;
	    border: 1px solid rgba(255, 74, 131, 0.44);
	    padding-top: 4px;
	    margin-left: 50px;
	    margin-bottom: 10px;
	    margin-top: -19px;
	    color: white;
	    border-radius: 5px;
	    font-family: sans-serif;
	}
	  .btnMy:hover{
	    box-shadow: 1px 1px 10px 1px rgba(230, 228, 228, 0.37);
	  }
	  .linkMy:hover{
	    text-decoration: none;
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
  <body>
		<?php include("navigate.php"); ?>
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
	      	<div class="row" style="margin-top: 50px;">
	       		<?php if ($error==1) { ?>
	        	<div class="mydialog">
	        		<h6>&nbsp&nbsp&nbspTry to Order once we legally open the company !&nbsp&nbsp&nbsp</h6>
	        	</div>
	       		<?php } ?>
	          <?php if ($error==2){ ?>
	          <div class="mydialog">
	          	<h6>&nbsp&nbsp&nbspItem Already added !&nbsp&nbsp&nbsp</h6>
	          </div>
	          <?php } ?>
	        </div>
	       	<div class="row" style="margin-top: 20px;width: 800px;">
						<?php
							$name=null;
							$loc=null;
							$amt=0;
	  					if(isset($_SESSION["name"])){
	  						$loc = strpos($_SESSION["name"], "@");
	    					$name=substr($_SESSION["name"],$loc-1);
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
							          echo ("<a href='item.php?id=" . $rs["PID"] ."'><img class='card-img-top' height=200 width=200 src=" . $rs["ImgSrc"] . " alt=''></a>");
							          $amt= $amt + ($rs["Rate"] * $rss["Quantity"]);
							          echo ("<div class='card-body'><h4 class='card-title'><a href='item.php?id=" .  $rs["PID"] . "'>" .  $rs["Name"] . "</a></h4><h5>₹" . $rs["Rate"] . "</h5>" . "<br><h6>Quantity: ". $rss["Quantity"]."<a href='add.php?id=" . $rs["PID"] . "' style='border: 1px solid;border-radius:10px;margin-left:45px;padding: 4px;text-decoration:none;'>+</a>&nbsp&nbsp&nbsp&nbsp<a href='subtract.php?id=" . $rs["PID"] . "' style='    border: 1px solid;border-radius: 10px;margin-left: 5px;padding: 5px; text-decoration:none;'>-</a><br></h6></div><div class='card-footer'><small class='text-muted'>&#9733; &#9733; &#9733; &#9733; &#9734;</small><a href='remove.php?pid=". $rs["PID"] ."''><h6 style='padding-top:2px;margin-left:130px;margin-top:-20px;'>Remove</h6></a></div></div></div>");
											}
										}
									}
								}
	  				}
						else{
	        		if(isset($_COOKIE["UID"])){
	        			$cookie = $_COOKIE["UID"];
	        			$sql1="select * from Cart where SessionID in ('".$cookie."');";
								$result=mysqli_query($conn,$sql1);
								if($result->num_rows>0){
	           			while ($rss = mysqli_fetch_assoc($result)){
	        					$sql = "select * from CakeData where PID=".$rss["PID"].";";
	        					$result2=mysqli_query($conn,$sql);
										if($result2->num_rows>0){
	          					while ($rs = mysqli_fetch_assoc($result2)){
							          echo ("<div class='col-lg-4 col-md-6 mb-4'><div class='card h-100' style='border: 1px solid #d6cccc;margin-top=10px;'>");
							          echo ("<a href='item.php?id=" . $rs["PID"] ."'><img class='card-img-top' height=200 width=200 src=" . $rs["ImgSrc"] . " alt=''></a>");
							          $amt= $amt + ($rs["Rate"] * $rss["Quantity"]);
							          echo ("<div class='card-body'><h4 class='card-title'><a href='item.php?id=" .  $rs["PID"] . "'>" .  $rs["Name"] . "</a></h4><h5>₹" . $rs["Rate"] . "</h5>" . "<br><h6>Quantity: ". $rss["Quantity"]."<a href='add.php?id=" . $rs["PID"] . "' style='border: 1px solid;border-radius:10px;margin-left:45px;padding: 4px;text-decoration:none;'>+</a>&nbsp&nbsp&nbsp&nbsp<a href='subtract.php?id=" . $rs["PID"] . "' style='    border: 1px solid;border-radius: 10px;margin-left: 5px;padding: 5px; text-decoration:none;'>-</a><br></h6></div><div class='card-footer'><small class='text-muted'>&#9733; &#9733; &#9733; &#9733; &#9734;</small><a href='remove.php?pid=". $rs["PID"] ."''><h6 style='padding-top:2px;margin-left:130px;margin-top:-20px;'>Remove</h6></a></div></div></div>");
											}
										}
									}
								}
	    				}
						}
	       	 ?>
				 </div>
	       	<div class="toolbar">
						<!--<div class="card">
							<div class="card-body">
								<input type="checkbox" onchange="">&nbsp Same Day Delivery (₹50)</input>
							</div>
						</div>-->
	       		<div style="color:white;font-size: 20px;margin-left: 10px;padding-top:5px;margin-top: 3px;">
	      			Total Amt: ₹<?php echo($amt); ?>
	       		</div>
	       		<div class="btnMy">
	       			<a class="linkMy" href="placeorder.php"> Place Order </a>
	       		</div>
	       	</div>
	     	</div>
	    </div>
		</div>
		<footer class="py-5 bg-dark" st>
	  	<div class="container">
	    	<p class="m-0 text-center text-white" style="font-family: 'Pacifico', cursive;font-size: 30px">Confection Connection©</p>
	    </div>
	  </footer>
	</body>
</html>
