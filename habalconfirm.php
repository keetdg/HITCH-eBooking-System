<?php
include 'dbconnect.php';

$id = $_GET['cid'];

$sql = "UPDATE bookings SET status = 'Confirmed' WHERE bookid = '$id'";
$res = mysqli_query($conn, $sql);

header("location: driverpanel.php ");
?>