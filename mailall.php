<?php
  include("dbconnect.php");
  $sql="SELECT Email FROM userinfo";
  $body = " <center><h3>We invite you to our bake sale!!To know more about our Sale Please do visit our website!!
  <a href ='http://localhost/ecomm/homepage.php'>Click here!!
  </a></h3> </center>";
 $headers = 'From: Confection Connection' . "\r\n" .
              'Reply-To: No-Reply' . "\r\n" ;
        $headers .=  'MIME-Version: 1.0' . "\r\n"; 
      $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
  $result = mysqli_query($conn,$sql);
  if($result->num_rows>0){
    while ($rss = mysqli_fetch_assoc($result)) {
      $mailTo = $rss['Email'];
      mail("$mailTo","Bake Sale", $body ,$headers);
    }
  }
 ?>
