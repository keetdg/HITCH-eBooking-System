<?php
include_once ('dbconnect.php');

if(isset($_POST['submit']))
{
   $route2 =$_POST['route1'];
   
   $sql = "insert into route (route) values('$route2')";
   
   $result = mysqli_query($conn,$sql);
   if($result)
   {
      header('location:route.php');
   } 
   else
   {
   die(mysqli_error($conn));
   }
}
?>