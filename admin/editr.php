<?php
	session_start();
	include_once('dbconnect.php');

	if(isset($_POST['edit'])){
		$id = $_POST['routeid'];
		$route = $_POST['route1'];
		
		$sql = "UPDATE route SET route = '$route' WHERE routeid = '$id'";

		
		if($conn->query($sql)){
			$_SESSION['success'] = 'Route updated successfully';
		}

		
		else{
			$_SESSION['error'] = 'Something went wrong in updating route';
		}
	}
	else{
		$_SESSION['error'] = 'Select route to edit first';
	}

	header('location: route.php');

?>