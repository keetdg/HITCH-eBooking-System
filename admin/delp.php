<?php
include 'dbconnect.php';

if(isset($_GET['userid']))
{


$sql = "delete from user where userid='".$_GET['userid']."'";

if($conn->query($sql))
{
    $SESSION['success'] = 'Passenger deleted successfully';
}
else{
    $SESSION['error'] = 'Something went wrong';
}
}
else{
    die(mysqli_error($conn));
}
header('location:passenger.php');
?>