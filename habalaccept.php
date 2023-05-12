<?php

include 'dbconnect.php';

$id = $_GET['id'];

if (isset($_POST['cancel'])){
  $driverid = $id
  $fname= $_POST['fullname'];
  $number= $_POST['number'];
  $loc= $_POST['loc'];
  $dest= $_POST['dest'];
  $date= $_POST['date'];
  $stat= $_POST['stat'];
  $distance= $_POST['distance'];

$sql1 = "UPDATE habalhabal SET status = 'Unavailable' WHERE driverid = $driverid";
$res1 = mysqli_query($conn, $sql1);

echo '<script>alert("Booking Cancelled")</script>';
}
if($res && $res1){
    header('location:driverpanel.php');
}


// $distance = $_POST['distance'];
// $unit = $_POST['unit'];

// if($units=='km'){
//     $miles = $distance * 1.60934;
//     ech0 'The distance you have entered is equivalent to '.round('$miles').'
//     km.'
// }
// else{
//     echo 'Invalid Distance';
// }


if(isset($_POST['submit'])) {
    $num = $_POST['distance'];
    $rad = $_POST['unit'];

    $passenger =$_POST['fullname'];
    $loc =$_POST['loc'];
    $dest =$_POST['dest'];
    $stat =$_POST['stat'];

    switch ($rad) {
        case "Kilometer":
            $res2 = $num * 1.609344;
            $res2 .= " km";
            break;
    }
}

$sql2 = "insert into receipt (`passenger`, `location`, `destination`, `driver`, `distance`, `fare`) values('$passenger','$loc','$dest',(select driver from habalhabal),'$num','$res2')";
$result = mysqli_query($conn,$sql);
  if($result)
   {
     header('location:maproute1.php');
   } 
   else
  {
  die(mysqli_error($conn));
   }
 ?>