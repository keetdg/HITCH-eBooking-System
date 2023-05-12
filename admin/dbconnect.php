<?php
$conn = new mysqli('localhost','root','','capstonedb1');

if($conn->connect_error){
    die("Connection failed".$conn->connect_error);
}
//echo "Connected";
?>
