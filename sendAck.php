<?php
include("dbconnect.php");
$date = date('d/m/Y', time());;
$result=mysqli_query($conn,"select * from orderdetails where Date='".$date."';");
$headers = 'From: Confection Connection' . "\r\n" .
    					'Reply-To: No-Reply' . "\r\n" ;
    		$headers .=  'MIME-Version: 1.0' . "\r\n"; 
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$subject="Order Details.";
$body="";
if($result->num_rows>0){

	while($row=mysqli_fetch_assoc($result)){
		$result2=mysqli_query($conn,"select * from CakeData where PID=".$row["Pid"].";");
		if($result2->num_rows>0){
			while($rowss=mysqli_fetch_assoc($result2)){
		
		$body="Your order has been placed successfully !<br><br><b>ORDER NO: ".$row["Orderno"]."</b><br><br><i>Details:</i><br>Name: ".$rowss["Name"]."<br>Quantity: ".$row["Quantity"]."";

	}
}
$email=$row["Username"];
if(mail($email, $subject, $body,$headers))
{
	header("Location: adminpanel.php");

}
else
{
	echo "not send";
}
$body="";
}
}
?>