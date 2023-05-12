<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['passenger'])) {
    $userid = $_SESSION['id'];
}else{
    header("Location: index.php");
    exit();
}
include 'dbconnect.php';


$sql = "SELECT * FROM bookings where bookid=$userid";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);

// inputs
$passenger = $row['passenger'];
$num = $row['number'];
$driver = $row['driver'];
$date = $row['datetime'];
$loc = $row['location'];
$destination = $row['destination'];
$distance = $row['traveldistance'];
$tariff = $row['tariff'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Passenger Profile</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
<!-- <link rel="stylesheet" type="text/css" href="datatable/dataTable.bootstrap.min.css"> -->

<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
<link href="bookstyle.css" rel="stylesheet">
</head>

<body class="body">

    
    <style>
    html .body{
        font-size: 62.5%;
        overflow-x: hidden;
        background: linear-gradient(to top, rgba(0,0,0,0.5)50%,rgba(0,0,0,0.5)50%), url(./img/pic2.png);
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
        height: 740px;
}
    h3{
        text-align: center;
        background:#9754CB;
        height: 40px;
        margin-top:0;
        padding: 7px;
        color: #fff;
    }
    td{
        text-align: left;
    }
    .b{
        font-size: 12px; 
        background: red;
    }
    .a{
        font-size: 12px; 
        background: black;
    }
   
    </style>

<div class="containers py-5" id="receipt<?php echo $tablerows['bookid']; ?>" style="width:500px; height:700px; font-size: 13px">
<div class="container-fluid">
<h3>Booking Receipt</h3><hr>
                <form method="post" action="proofofpayment.php">

                <h4 class="mt-3 theme-color mb-5 text-center">Thank you for riding HITCH!</h4>
                    <h5 class="text-uppercase">Passenger: <b><?php echo $passenger; ?></b></h5>
                    <h6 class="text-uppercase"><?php echo $num; ?></h6>
                    <br>

                    <h5 class="text-uppercase">Driver: <b><?php echo $driver; ?></b></h5>
                    <h6 class="text-uppercase"><?php echo $date; ?></h6>
                    
                    <br>
                    <span class="theme-color"><b>Payment Summary</b></span>
                    <div class="mb-5">
                  
                    </div>

                    <div class="d-flex justify-content-between">
                    <!-- <span class="font-weight-bold">PickUp Location</span> -->
                    <!-- <span class="text-muted"><?php echo $loc; ?></span> -->
                    <medium>PickUp Location </medium>
                    <small><b><?php echo $loc; ?></b></small>
                    </div>

                    <div class="d-flex justify-content-between">
                    <medium>Destination </medium>
                    <small><b> <?php echo $destination; ?></b></small>
                    </div>


                    <div class="d-flex justify-content-between">
                    <medium>Fare/km</medium>
                    <medium><b>₱5.00</b></medium>
                    </div>

                    <div class="d-flex justify-content-between">
                    <medium><b>Total Travel Distance </b></medium>
                    <medium><b><?php echo $distance; ?> km</b></medium>
                    </div>
                    <hr style="height: 2px; background:black;">
                    <div class="d-flex justify-content-between mt-3">
                    <span class="font-weight-bold"><b>Total Travel Tariff</b></span>
                    <span class="font-weight-bold theme-color"><b>₱<?php echo number_format($tariff,2);?></b></span>
                    </div>  
                       <hr>         
                    <div class="mb-3">
                        <label for="formFile" class="form-label" style="top:100px"><b>Proof of Payment</b></label><br>
                        <input class="form-control-sm" type="file" name="file" accept="image/png, image/jpeg, image/jpg">
                        </div><br>
             
            <div class="footer">
                <a href="passengerpanel.php" type="button" class="btn btn-success" name="submit" style="width: 270px; margin-left:170px"><span class="uil uil-google"></span> Send Proof of Payment</a> 
            
            </div>
            </form>
       </div>
</div>



<script src="jquery/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="datatable/jquery.dataTables.min.js"></script>
<script src="datatable/dataTable.bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
<script src="book.js"></script>
</body>
</html>

