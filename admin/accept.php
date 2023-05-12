<?php
    include('dbconnect.php');
    $id = $_GET['id'];
    $query = "UPDATE driver SET dstatus = 'Accepted' WHERE driverid = '$id'";
    $result = mysqli_query($conn, $query);
    if($result)
    {
        header('location: driver.php');
    }

    
?>
<br/><br/>
<a href="home.php">Back</a>