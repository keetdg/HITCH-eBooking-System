<?php
	session_start();
	include_once('dbconnect.php');

    if(isset($_GET['bid']))
    {
		
		$sql = "UPDATE habalhabal SET status ='Unavailable' WHERE driverid = '".$_GET['bid']."'";
        $res = mysqli_query($conn, $sql);

        $sql1 = "UPDATE bookings SET status = 'Cancelled' WHERE bookid = '".$_GET['bid']."'";
        $res1 = mysqli_query($conn, $sql1);
    }

    if($res && $res1){
        header('location:driverpanel.php');
    }

    //     if($conn->query($sql)){
	// 		$_SESSION['success'] = 'Booking cancelled successfully';
	// 	}

		
	// 	else{
	// 		$_SESSION['error'] = 'Something went wrong in cancelling booking';
	// 	}
   
	// else{
	// 	$_SESSION['error'] = 'Select booking to cancel';
	// }

	// header('location: driverpanel.php');

?>