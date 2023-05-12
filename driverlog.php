<?php 
session_start(); 
include "dbconnect.php";

if (isset($_POST['email']) && isset($_POST['pass'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$email = validate($_POST['email']);
	$pass = validate($_POST['pass']);

        
		$sql = "SELECT * FROM driver WHERE demail='$email' AND dpass='$pass'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['dstatus'] == 'Accepted') {
            	$_SESSION['driver'] = $row['demail'];
            	$_SESSION['name'] = $row['dfullname'];
            	$_SESSION['id'] = $row['driverid'];
            	header("Location: driverpanel.php");
		        exit();
            }else{
				header("Location: driverlogin.php?error=Your Account is Pending");
		        exit();
			}
		}else{
			header("Location: driverlogin.php?error=Incorrect User name or password");
	        exit();
		}
	}


?>