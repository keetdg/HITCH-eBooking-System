<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['passenger'])) {
    $userid = $_SESSION['id'];
}else{
    header("Location: index.php");
    exit();
}
include 'dbconnect.php';

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

<div class="containers py-5" style="width:1200px; height:600px; font-size: 13px">
<div class="close-btn"><a href="rides.php">&times;</a></div>
    <h3>Booking Details</h3><hr>
    <div class="row">

    <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>PASSENGER</th>
                <th>NUMBER</th>
                <th>LOCATION</th>
                <th>DESTINATION</th>
                <th>DRIVER</th>
                <th>DATE&TIME</th>
                <th>STATUS</th>
                <th>ACTION</th>
            </tr>
        </thead>
        <tbody>
            <?php
                // $id = $_SESSION['id'];

                // $sqlgetrotid = "select dfullname from driver where dfullname= '$id'";
                // $resultofid = mysqli_query($conn,$sqlgetrotid);
                // $rowid=mysqli_fetch_assoc($resultofid);


                // $driver3 = $rowid['driverid'];
                // $sql = "insert into bookings (driver) values ('$driver2') SELECTbookings.bookid, passenger, number, location, destination, datetime, driver, status FROM bookings";
                // $sql = "SELECT bookings.bookid, passenger, number, location, destination, datetime, driver, status FROM bookings where bookings.bookid=$id";
                $sql = "SELECT * FROM bookings where userid = $userid";
                $query=$conn->query($sql);
                while($row=$query->fetch_assoc())
                    {
                    echo "<tr style='text-align: center'>
                        <td>".$row['bookid']."</td>
                        <td>".$row['passenger']."</td>
                        <td>".$row['number']."</td>
                        <td>".$row['location']."</td>
                        <td>".$row['destination']."</td>
                        <td>".$row['driver']."</td>
                        <td>".$row['datetime']."</td>
                        <td>".$row['status']."</td>

                        <td>
                        <a href='#cancel".$row['bookid']."' class='btn btn-danger btn-sm b' data-toggle='modal' style='width:100px'>Cancel Booking</a>
                        
                        </td>
                      </tr>";
                      include('cancel_modal.php');
                        }

                      ?>
           
        </tbody>
      
    </table>        
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