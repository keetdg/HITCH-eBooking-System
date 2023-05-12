<?php
	session_start();
	include_once('dbconnect.php');

    if(isset($_GET['bookid']))
    {
		
		$sql = "UPDATE bookings SET status ='CANCELLED' WHERE bookid = '".$_GET['bookid']."'";

        // $sql = "delete from bookings where bookid='".$_GET['bookid']."'";
        if($conn->query($sql)){
			$_SESSION['success'] = 'Booking cancelled successfully';
		}

		
		else{
			$_SESSION['error'] = 'Something went wrong in cancelling booking';
		}
    }
	else{
		$_SESSION['error'] = 'Select booking to cancel';
	}

	header('location: bookings.php');

?>
