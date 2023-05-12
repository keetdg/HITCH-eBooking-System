<?php
include 'dbconnect.php';

if(isset($_GET['habalid']))
{


$sql = "delete from habalhabal where  habalid='".$_GET['habalid']."'";

if($conn->query($sql))
{
    $SESSION['success'] = 'Habal-habal deleted successfully';
}
else{
    $SESSION['error'] = 'Something went wrong';
}
}
else{
    die(mysqli_error($conn));
}
header('location:habalhabal.php');
?>
