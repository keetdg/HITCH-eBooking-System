<?php
	session_start();
	include_once('dbconnect.php');

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		
		$sql = "UPDATE bookings SET status = 'CONFIRMED' WHERE bookid = '$id'";

		
		if($conn->query($sql)){
			$_SESSION['success'] = 'Booking Confirmed';
		}

		
		else{
			$_SESSION['error'] = 'Something went wrong in confirming booking';
		}
	}
	else{
		$_SESSION['error'] = 'Select booking to confirm first';
	}

	header('location: driverpanel.php');

?>