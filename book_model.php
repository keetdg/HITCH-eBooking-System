<?php
require("dbconnect.php");

// Gets data from URL parameters.
if(isset($_GET['add_location'])) {
    add_location();
}

$id = $_SESSION['id'];
function add_location(){
    $conn=mysqli_connect ("localhost", 'root', '','capstonedb1');
    if (!$conn) {
        die('Not connected : ' . mysqli_connect_error());
    }
    $bookid = $id;
    $name = $_GET['name'];
    $num = $_GET['num'];
    $loc = $_GET['loc'];
    $lat = $_GET['lat'];
    $lng = $_GET['lng'];
    $dest = $_GET['dest'];
    $lat1 = $_GET['lat1'];
    $lng1 = $_GET['lng1'];
    // Ma insert ug new row with place data.
    $query = sprintf("INSERT INTO bookings (bookid, passenger, number, location, lat, lng, destination, lat1, lng1, datetime, driver, driverid, userid) VALUES ('$bookid','$name','$num','$loc', '%s', '%s','$dest','%s','%s', CURRENT_TIMESTAMP,(select driver from habalhabal),(select driverid from habalhabal),'$id');",
        mysqli_real_escape_string($conn,$lat),
        mysqli_real_escape_string($conn,$lng),
        mysqli_real_escape_string($conn,$lat1),
        mysqli_real_escape_string($conn,$lng1));

    $result = mysqli_query($conn,$query);
    echo json_encode("Inserted Successfully");
    if (!$result) {
        die('Invalid query: ' . mysqli_error($conn));
    }
}
function get_saved_locations(){
    $conn=mysqli_connect ("localhost", 'root', '','capstonedb1');
    if (!$conn) {
        die('Not connected : ' . mysqli_connect_error());
    }
    // update location with location_status if admin location_status.
    $sqldata = mysqli_query($conn,"select lat, lng, lat1, lng1 from bookings ");

    $rows = array();
    while($r = mysqli_fetch_assoc($sqldata)) {
        $rows[] = $r;

    }
    $indexed = array_map('array_values', $rows);

    //  $array = array_filter($indexed);

    echo json_encode($indexed);
    if (!$rows) {
        return null;
    }
}

?>