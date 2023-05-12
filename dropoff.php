<?php
include 'dbconnect.php';
$bookingid = $_GET['id'];
$driverid = $_GET['driverid'];


$sql = "UPDATE bookings SET status = 'Dropped-Off' WHERE bookid = '$bookingid'";
$res = mysqli_query($conn, $sql);

$sql1 = "UPDATE habalhabal SET status = 'Available' WHERE driverid = '$driverid'";
$res1 = mysqli_query($conn, $sql1);

if($res && $res1){
    header('location:driverpanel.php');
}


?>