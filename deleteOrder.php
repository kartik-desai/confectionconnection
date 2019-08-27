<?php
include("dbconnect.php");
 if(isset($_SESSION["orderno"])){
 mysqli_query($conn,"delete from orderdetails where Orderno=".$_SESSION["orderno"].";");
	unset($_SESSION["orderno"]);
}

?>