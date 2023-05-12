<?php
include_once ('dbconnect.php');

if(isset($_POST['submit']))
{
    $file = $_FILES['file']['name'];
    $file_image_tmp_name = $_FILES['file']['tmp_name'];
    $file_image_folder = 'img/'.$file;
   
   $sql = "insert into bookings (proof) values('$file')";
   
   $result = mysqli_query($conn,$sql);
   if($result)
   {
      header('location:passengerprofile.php');
   } 
   else
   {
   die(mysqli_error($conn));
   }
}
?>