<?php
session_start();
    include 'dbconnect.php';
    $max=99999;
    $min=999;
    $i=0;
    //Randomize
    $num=rand($min,$max);
    $sql = "select * from UserCart where Email in('".$_SESSION["name"]."');";
    $result=mysqli_query($conn,$sql);
    $amt = 0;
    if($result->num_rows>0){
      while ($rss = mysqli_fetch_assoc($result)){
        $sql = "select * from CakeData where PID=".$rss["PID"].";";
        $result2=mysqli_query($conn,$sql);
        if($result2->num_rows>0){
  
                      while ($rs = mysqli_fetch_assoc($result2)){
                        $sql="insert into orderdetails values(".$num.",'".$_SESSION["name"]."',".$rs["PID"].",".$rss["Quantity"].");";
        $result3=mysqli_query($conn,$sql);  
        $i++;
                      }
                    }
                  }
                }
      ?>