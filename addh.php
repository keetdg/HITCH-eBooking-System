<?php
	session_start();
	include_once('dbconnect.php');

	if(isset($_POST['submit']))
{  
   $driver2 =$_POST['driver1'];
   $idforitem = $_SESSION['id'];
   $motortype2 =$_POST['motortype1'];
   $station2 =$_POST['station1'];
   $route2 =$_POST['routes'];
   $fare2 =$_POST['fare1'];

   $sqlgetrotid = "select routeid from route where route= '$route2'";
   $resultofid = mysqli_query($conn,$sqlgetrotid);
   $rowid=mysqli_fetch_assoc($resultofid);


   $route3 = $rowid['routeid'];

  $sql = "insert into habalhabal (driver, driverid, motortype, station, route, fare) values('$driver2','$idforitem','$motortype2','$station2','$route3','$fare2')";
   
  $result = mysqli_query($conn,$sql);
  if($result)
   {
     header('location:driverpanel.php');
   } 
   else
  {
  die(mysqli_error($conn));
   }

}
?>