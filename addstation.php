<?php
	session_start();
	include_once('dbconnect.php');

	if(isset($_POST['edit']))
{  
   $add =$_POST['add'];

  $sql = "insert into locations (address) values('$add')";
   
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