<?php
include 'dbconnect.php';

if(isset($_GET['routeid']))
{


$sql = "delete from route where  routeid='".$_GET['routeid']."'";

if($conn->query($sql))
{
    $SESSION['success'] = 'Route deleted successfully';
}
else{
    $SESSION['error'] = 'Something went wrong';
}
}
else{
    die(mysqli_error($conn));
}
header('location:route.php');
?>