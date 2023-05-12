<?php
	include_once('dbconnect.php');

	// $id =$_GET['submit'];
 	// $sql = "SELECT tbltrike.trikeid, trikecode, tblroute.route, fares, trikenum, dname, dcontact, daddress, img FROM tbltrike LEFT JOIN tblroute ON tbltrike.routes = tblroute.routeid where tbltrike.trikeid=$id";
	// $sql = "SELECT habalhabal.habalid, driver, motortype, station, route.route, fare, status FROM habalhabal LEFT JOIN route ON habalhabal.route = route.routeid where habalhabal.habalid=$id";
	// $result=mysqli_query($conn,$sql);
	// $row=mysqli_fetch_assoc($result);
	
	if(isset($_POST['submit'])){
		$driver = $_POST['driver'];
		$motortype = $_POST['motortype'];
		$station = $_POST['station'];
		$route = $_POST['routes'];
		$fare = $_POST['fare'];
		$status = $_POST['status'];

		$sqlgetrotid = "select routeid from route where route= '$route'";
		$resultofid = mysqli_query($conn,$sqlgetrotid);
		$rowid=mysqli_fetch_assoc($resultofid);
	 
		$route3 = $rowid['routeid'];
		
		$sql = "UPDATE habalhabal SET driver= '$driver', motortype = '$motortype', station='$station', route='$route3', fare= '$fare', status= '$status'";
		
		
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