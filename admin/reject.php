<?php
    include('functions.php');
    $id = $_GET['id'];
    
    $query = "DELETE FROM `driver_request` WHERE `driver_request`.`id` = '$id';";
        if(performQuery($query)){
            echo "Account has been rejected.";
        }else{
            echo "Unknown error occured. Please try again.";
        }

?>
<br/><br/>
<a href="home.php">Back</a>