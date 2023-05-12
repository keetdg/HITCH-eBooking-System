<?php
	session_start();
	include_once('dbconnect.php');


	if(isset($_POST['submit'])){
		$id = $_SESSION['id'];
		$name = $_POST['name'];
		$username = $_POST['username'];
		$pass = $_POST['pass'];
	
		
		$sql = "UPDATE users SET name= '$name', user_name = '$username', password='$pass' WHERE id = '$id'";
		
		
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