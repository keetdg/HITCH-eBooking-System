<?php
	session_start();
	include_once('dbconnect.php');


	if(isset($_POST['edit'])){
		$id = $_SESSION['id'];
		$fullname = $_POST['fullname'];
		$birthdate = $_POST['birthdate'];
		$age = $_POST['age'];
		$address = $_POST['address'];
		$gender = $_POST['gender'];
		$number = $_POST['number'];
		$email = $_POST['email'];
		
		$sql = "UPDATE driver SET dfullname= '$fullname', dbirthdate = '$birthdate', dage='$age', daddress= '$address', dgender= '$gender', dnumber= '$number', demail='$email' WHERE driverid = '$id'";
		
		
		$result = mysqli_query($conn,$sql);
		if($result)
		{
		header('Location: ' . $_SERVER["HTTP_REFERER"] );
		} 
		else
		{
		die(mysqli_error($conn));
		}
	}
	?>