<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['passenger'])) {
    $userid = $_SESSION['id'];
}
else{
    header("Location: index.php");
    exit();
}
include 'dbconnect.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HITCH | Rides</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">  

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <link href="bootstrap/css/css1/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap/css/css1/tempusdominus-bootstrap-4.min.css" rel="stylesheet" >

    <script src='https://api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.css' rel='stylesheet' />
    <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.1.0/mapbox-gl-directions.js"></script>
    <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.1.0/mapbox-gl-directions.css" type="text/css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="scripts.js" defer></script>

    <!-- custom css file link  -->
    <link rel="stylesheet" href="style.css">

</head>
<body>
    
<!-- header section starts  -->
<header class="header">

    <a href="#" class="logo"> H I T C H </a>

    <nav class="navbar">
        <a href="passengerpanel.php">Home</a>
        <a href="rides.php">Rides</a>
        <a href="bookings.php">Bookings</a>
        <a href="passengerpanel.php?#footer">Contact Us</a>

    </nav>

    <div class="icons">
        <div class="fas fa-bars" id="menu-btn"></div>
        <div class="fas fa-search" id="search-btn"></div>
        <div class="fas fa-map" id="cart-btn"></div>
        <div class="fas fa-user" id="login-btn"></div>
    </div>

    <form action="" class="search-form">
        <input type="search" id="search-box" placeholder="search here...">
        <label for="search-box" class="fas fa-search"></label>
    </form>

    <div class="shopping-cart">
       
    </div>

    <form action="" class="login-form">
        <h4>Welcome, <?php echo $_SESSION['passenger'] ?></h4><br><hr><br>
       <p><a href="passengerprofile.php?update=<?php echo $_SESSION['id']; ?>"><i class="uil uil-user-square prof"></i> Profile</a></p> <br>
       <p><a href="logout.php"><i class="uil uil-signout prof"></i>Logout</a></p> 
  
    </form>

</header>

<!-- header section ends -->

<!-- home section starts  -->

<section class="home" id="home">

    <div class="content">
        <h3> <span>HITCH:</span> E-Booking for everyone!</h3>
        <p>| Available Rides |</p>
       
    </div>

</section>

<!-- home section ends -->

<!-- categories section starts  -->
<section class="categories" id="rides">

<div class="row g-4">

    <?php
        $sql = "SELECT habalhabal.habalid, driver, motortype, station, route.route, fare, status FROM habalhabal LEFT JOIN route ON habalhabal.route = route.routeid WHERE habalhabal.status != 'Unavailable'";
        $result = mysqli_query($conn,$sql);
        if($result)
        {
            while($row=mysqli_fetch_assoc($result))
            {
        $driver3 = $row['driver'];
        $motortype3 = $row['motortype'];
        $station3 = $row['station'];
        $route3 = $row['route'];
        $fare3 = $row['fare'];
        $status3 = $row['status'];
        $id3 =  $row['habalid'];

        echo '<div class="col-lg-3 col-md-6 wow fadeInUp">
            <div class="room-item shadow rounded overflow-hidden">
                <div class="position-relative">
                    <img class="img-fluid" src="img/icon2.png" alt="Hitch">
                    <small class="position-absolute start-0 top-100 translate-middle-y text-white rounded py-1 px-3 ms-4" style="font-size:13px; color:#fff; background:#6237A0">₱5.00/km</small>
                </div>
                <div class="p-4 mt-2">
                    <div class="d-flex justify-content-between mb-3">
                        <h2 class="mb-0">'.$motortype3.'</h2>
                           
                    </div>
                        <div class="d-flex mb-3">
                            <small class="border-end me-3 pe-3" style="font-size:12px"><i class="uil uil-location-pin-alt text me-2"></i>'.$route3.'</small>
                            <small class="border-end me-3 pe-3" style="font-size:12px"><i class="fa fa-users-cog text me-2"></i>'.$driver3.'</small>
                        </div><br>
                            <p class="text-body mb-3" style="font-size:14px">'.$status3.'</p>
                                <div class="d-flex justify-content-between ">
                                    <a class="btn btn-sm btn-primary rounded py-2 px-4" href="mapstation.php" style="background:#0F172B; border:none">See Station</a>
                                    <a class="btn btn-sm btn-dk rounded py-2 px-4" href="book.php?book='.$id3.'">Book Now</a>
                                </div>
                </div>
            </div>
        </div>';
    
        }
        
        }
        ?>

    </div>

</section>


<!-- footer section starts  -->

<section class="footer" id="footer">

    <div class="credit"> Developed by: <span> Capstone Research Team [6] </span> | All Rights Reserved 2022 </div>

</section>

<!-- footer section ends -->














<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/wow/wow.min.js"></script>
    <script src="js/easing/easing.min.js"></script>
    <script src="js/waypoints/waypoints.min.js"></script>
    <script src="js/counterup/counterup.min.js"></script>
    <script src="js/owlcarousel/owl.carousel.min.js"></script>
    <script src="js/tempusdominus/js/moment.min.js"></script>
    <script src="js/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="js/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>