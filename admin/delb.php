<?php
include 'dbconnect.php';

if(isset($_GET['bookid']))
{


$sql = "delete from bookings where bookid='".$_GET['bookid']."'";

if($conn->query($sql))
{
    $SESSION['success'] = 'Booking deleted successfully';
}
else{
    $SESSION['error'] = 'Something went wrong';
}
}
else{
    die(mysqli_error($conn));
}
header('location:bookings.php');
?>