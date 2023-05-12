<?php
include 'dbconnect.php';
$bookid = $_GET['id'];
$sql = "UPDATE bookings SET status = 'Pickedup' WHERE bookid = '$bookid'";
$result = mysqli_query($conn, $sql);

header("location: driverpanel.php ");

?>