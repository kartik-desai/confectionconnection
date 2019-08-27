<?php
  $name=null;
  $loc=null;
  if(isset($_SESSION['name'])) {
    $loc = strpos($_SESSION["name"], "@");
    $name=substr($_SESSION["name"],0,$loc);
  }
  else{
    $name="";
  }
?>
