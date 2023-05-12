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
    <title>HITCH | Passenger Panel</title>

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
        <a href="#footer">Contact Us</a>

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
        <p>| Passenger Panel |</p>
       
    </div>

</section>

<!-- home section ends -->

<!-- features section starts  -->

<section class="features" id="pdashboard">

    <!-- <h1 class="heading"> Passenger <span>Dashboard</span> </h1> -->

    <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6">
                        <h1 class="mb-4">Passenger<span style="color:#6237A0"> Dashboard</span></h1>
                        <div class="row g-3 pb-4">
                            <div class="col-sm-4 wow fadeIn">
                                <div class="border rounded p-1" style="background:#fff">
                                    <div class="border rounded text-center p-4" style="border-color:#6237A0; border-style: solid 10px">
                                        <i class="uil uil-map-marker-shield fa-2x icon mb-2" style="color:#6237A0; font-size:25px"></i>
                                        <?php
                                            $dash_rides = "SELECT * FROM habalhabal";
                                            $dash_rides_run = mysqli_query($conn, $dash_rides);

                                            if($rides_total = mysqli_num_rows($dash_rides_run)){
                                                echo '<h2 class="mb-1" data-toggle="counter-up">'.$rides_total.'</h2>';
                                            }
                                            else{
                                                echo '<h2 class="mb-1" data-toggle="counter-up">0</h2>';
                                            }
                                        ?>
                                        <p class="mb-0" style="color:#000; font-size:20px">Rides</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 wow fadeIn">
                                <div class="border rounded p-1" style="background:#fff">
                                    <div class="border rounded text-center p-4">
                                        <i class="uil uil-setting fa-2x icon mb-2" style="color:#6237A0; font-size:25px"></i>
                                        <?php
                                            $dash_drivers = "SELECT * FROM driver";
                                            $dash_drivers_run = mysqli_query($conn, $dash_drivers);

                                            if($drivers_total = mysqli_num_rows($dash_drivers_run)){
                                                echo '<h2 class="mb-1" data-toggle="counter-up">'.$drivers_total.'</h2>';
                                            }
                                            else{
                                                echo '<h2 class="mb-1" data-toggle="counter-up">0</h2>';
                                            }
                                        ?>
                    
                                        
                                        <p class="mb-0" style="color:#000; font-size:20px">Drivers</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 wow fadeIn" data-wow-delay="0.5s">
                                <div class="border rounded p-1" style="background:#fff">
                                    <div class="border rounded text-center p-4">
                                    <i class="uil uil-notebooks fa-2x icon mb-2" style="color:#6237A0; font-size:25px"></i>
                                    <?php
                                            $dash_bookings = "SELECT * FROM bookings WHERE userid = '$userid'";
                                            $dash_bookings_run = mysqli_query($conn,$dash_bookings);

                                            if($dash_bookings_run){
                                                $bookings_total=mysqli_num_rows($dash_bookings_run);
                                                echo '<h2 class="mb-1" data-toggle="counter-up">'.$bookings_total.'</h2>';
                                                
                                            }
                                            else{
                                                echo '<h2 class="mb-1" data-toggle="counter-up">0</h2>';
                                            }
                                        ?>
                                        <p class="mb-0" style="color:#000; font-size:20px">Bookings</p>
                                    </div>
                                </div>
                            </div>
                        </div>
    
                    </div>
                    <div class="col-lg-6">
                        <div class="row g-3">
                            <div class="col-6 text-end">
                                <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.3s" src="img/ride2.jpg">
                            </div>
                            <div class="col-6 text-start">
                                <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.3s" src="img/ride3.jpg">
                            </div>
                            <div class="col-6 text-end">
                                <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.5s" src="img/ride7.jpg">
                            </div>
                            <div class="col-6 text-start">
                                <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.7s" src="img/ride5.jpg">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</section>

<!-- About End -->

<!-- products section starts  -->

<section class="products" id="map">

    <div class="container-fluid text-light book" style="height: 500px;  background: #fff">
            <div class="container-fluid pb-5">
            <div id='map' style="width: 80vw" class="container-fluid"></div>
            </div>
        </div>
   
</section>

<!-- products section ends -->

<!-- categories section starts  -->

<section class="categories" id="categories">

    <h1 class="heading"> Explore our<span>Services</span> </h1>

    <div class="box-container">

        <div class="box">
            <img src="img/logoicon.png" alt="">
            <h3>Available HITCH</h3>
            <p>Search available HITCH.</p>
            <a href="availablestation.php" class="btn">Click Here</a>
        </div>

        <div class="box">
            <img src="img/icon1.png" alt="">
            <h3>Book HITCH</h3>
            <p>Book with us.</p>
            <a href="rides.php" class="btn">Click Here</a>
        </div>

        <div class="box">
            <img src="img/loc.png" alt="">
            <h3>See Location</h3>
            <p>See nearest HITCH.</p>
            <a href="availablestation.php" class="btn">Click Here</a>
        </div>

    </div>

</section><br>

<!-- categories section ends -->

<!-- review section starts  -->

<!-- <section class="review" id="review">

    <h1 class="heading"> customer's <span>review</span> </h1>

    <div class="swiper review-slider">

        <div class="swiper-wrapper">

            <div class="swiper-slide box">
                <img src="image/pic-1.png" alt="">
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Unde sunt fugiat dolore ipsum id est maxime ad tempore quasi tenetur.</p>
                <h3>john deo</h3>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
            </div>

            <div class="swiper-slide box">
                <img src="image/pic-2.png" alt="">
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Unde sunt fugiat dolore ipsum id est maxime ad tempore quasi tenetur.</p>
                <h3>john deo</h3>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
            </div>

            <div class="swiper-slide box">
                <img src="image/pic-3.png" alt="">
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Unde sunt fugiat dolore ipsum id est maxime ad tempore quasi tenetur.</p>
                <h3>john deo</h3>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
            </div>

            <div class="swiper-slide box">
                <img src="image/pic-4.png" alt="">
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Unde sunt fugiat dolore ipsum id est maxime ad tempore quasi tenetur.</p>
                <h3>john deo</h3>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
            </div>

        </div>

    </div>

</section> -->

<!-- review section ends -->

<!-- blogs section starts  -->

<!-- <section class="blogs" id="blogs">

    <h1 class="heading"> our <span>blogs</span> </h1>

    <div class="box-container">

        <div class="box">
            <img src="image/blog-1.jpg" alt="">
            <div class="content">
                <div class="icons">
                    <a href="#"> <i class="fas fa-user"></i> by user </a>
                    <a href="#"> <i class="fas fa-calendar"></i> 1st may, 2021 </a>
                </div>
                <h3>fresh and organic vegitables and fruits</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam, expedita.</p>
                <a href="#" class="btn">read more</a>
            </div>
        </div>

        <div class="box">
            <img src="image/blog-2.jpg" alt="">
            <div class="content">
                <div class="icons">
                    <a href="#"> <i class="fas fa-user"></i> by user </a>
                    <a href="#"> <i class="fas fa-calendar"></i> 1st may, 2021 </a>
                </div>
                <h3>fresh and organic vegitables and fruits</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam, expedita.</p>
                <a href="#" class="btn">read more</a>
            </div>
        </div>

        <div class="box">
            <img src="image/blog-3.jpg" alt="">
            <div class="content">
                <div class="icons">
                    <a href="#"> <i class="fas fa-user"></i> by user </a>
                    <a href="#"> <i class="fas fa-calendar"></i> 1st may, 2021 </a>
                </div>
                <h3>fresh and organic vegitables and fruits</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam, expedita.</p>
                <a href="#" class="btn">read more</a>
            </div>
        </div>

    </div>

</section> -->

<!-- blogs section ends -->

<!-- footer section starts  -->

<section class="footer" id="footer">

    <div class="box-container">

        <div class="box">
            <h3> HITCH: E-BOOKING SYSTEM</h3>
            <p>Provides the needs of commuters of Habal-Habal in Bogo City, Cebu Philippines.</p>
            <div class="share">
                <a href="#" class="fab fa-facebook-f"></a>
                <a href="#" class="fab fa-twitter"></a>
                <a href="#" class="fab fa-instagram"></a>
                <a href="#" class="fab fa-linkedin"></a>
            </div>
        </div>

        <div class="box">
            <h3>Contact Info</h3>
            <a href="#" class="links"> <i class="fas fa-phone"></i> +6312-3456-7890 </a>
            <a href="#" class="links"> <i class="fas fa-phone"></i> +6390-8263-5936 </a>
            <a href="#" class="links"> <i class="fas fa-envelope"></i> hitchsystem@gmail.com </a>
            <a href="#" class="links"> <i class="fas fa-map-marker-alt"></i> Bogo City, Cebu, 6010 </a>
        </div>

        <div class="box">
            <h3>Quick Links</h3>
            <a href="#" class="links"> <i class="fas fa-arrow-right"></i> Home </a>
            <a href="#" class="links"> <i class="fas fa-arrow-right"></i> Rides </a>
            <a href="#" class="links"> <i class="fas fa-arrow-right"></i> Bookings </a>
            <a href="#" class="links"> <i class="fas fa-arrow-right"></i> Contact Us </a>
        </div>

    </div>

    <div class="credit"> Developed by: <span> Capstone Research Team [6] </span> | All Rights Reserved 2022 </div>

</section>

<!-- footer section ends -->















<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>