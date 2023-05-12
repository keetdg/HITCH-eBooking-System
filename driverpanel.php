<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['driver'])) {
$driverid = $_SESSION['id'];
}else{
  header("Location: index.php");
  exit();
}
include 'dbconnect.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE-edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>HITCH | Driver Panel</title>
  <link rel="stylesheet" href="driver1.css">
  <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="bootstrap/css/css1/owl.carousel.min.css" rel="stylesheet">
    <link href="bootstrap/css/css1/tempusdominus-bootstrap-4.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	  <link rel="stylesheet" type="text/css" href="datatable/dataTable.bootstrap.min.css">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"> -->
</head>

<body>
  <div class="main-content">

    <!-- Top navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">

        <!-- Title -->
        <a class="h4 mb-0 text-white text-uppercase d-lg-inline-block"> HITCH | Driver Profile</a>

        <!-- Form -->
        <form action="POST" class="navbar-search navbar-search-dark form-inline mr-3 d-md-flex ml-lg-auto">
        <!-- <div class="search-box" id="search">
        <input type="text" placeholder="Search...">
        <label for="navbar-search" class="uil uil-search"></label>
      </div> -->
        </form> 

        <!-- User -->
      
        <i class="uil uil-user-circle user" onclick="toggleMenu()"></i>

      <div class="sub-menu-wrap" id="subMenu">
        <div class="sub-menu">
          <a href="logout.php" class="sub-menu-link">
          
          <p><b>Log Out</b></p>
          </a>
        </div>
      </div>

      </div>
    </nav>

    <!-- Header -->
    <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="min-height: 400px; background-image: url(img/logoicon.png); background-size: cover; background-position: center top;">
      
    <!-- Mask -->
      <span class="mask bg-gradient-default opacity-8"></span>
     
      <!-- Header container -->
      <div class="container-fluid d-flex align-items-center">
        <div class="row">
          <div class="col-lg-7 col-md-10">
            <h1 class="display-2 text-white" style="font-size: 40px">Hello Driver</h1>
            <p class="text-white mt-0 mb-5" style="font-size: 15px">This is your profile page. You can see the progress you've made with your work and manage your inquiries</p>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <div class="row">
        <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
          <div class="card card-profile shadow">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                  <a href="#">
                    <img src="img/profile.png" class="rounded-circle">
                  </a>
                </div>
              </div>
            </div>
            <div class="card-body pt-0 pt-md-4">
              <div class="row">
                <div class="col">
                  <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                    
                  </div>
                </div>
              </div>
              <div class="text-center">

              <?php
                $query = "select * from driver ";
                $result = mysqli_query($conn, $query);
                if(count(mysqli_fetch_all($result))>0){
                  foreach(mysqli_fetch_all($result) as $row){
                 ?>
              <h3><?php echo $row['dfullname']; ?></h3>
              <?php
                    }
                }else{
                    echo "No name.";
                }
                $sql1 = "SELECT * FROM habalhabal WHERE driverid='$driverid'";
                $res = mysqli_query($conn, $sql1);
                $hide="";
                if($res)
                {
                  $row = mysqli_num_rows($res);
                  if($row > 0)
                  {
                    $hide="hidden";
                  }
                }

            ?>
                <h3>Driver</h3>
                <div class="h5 font-weight-300">
                  <i class="ni location_pin mr-2"></i><?php echo $_SESSION['driver'] ?>
                </div>
              </div>
                <hr>
              <div class="profile-content">
                <a href="driverprofile.php?update=<?php echo $_SESSION['id']; ?>" class="content">
                <i class="uil uil-edit profilecon one"></i>
                <h4>Edit Profile</h4></a>

              
                <a href="#addhabalhabal" data-toggle="modal" class="content" <?php echo $hide; ?>>
                <i class="uil uil-create-dashboard profilecon two"></i>
                <h4>Add Habal-Habal </h4></a>
                
                <a href="mapstation.php" class="content">
                <i class="uil uil-history profilecon three"></i>
                <h4>Save Station Address </h4></a>

                <a href="history.php" class="content">
                <i class="uil uil-history profilecon three"></i>
                <h4>Booking History </h4></a>
              </div>

            </div>
          </div>
        </div>

        <div class="col-xl-8 order-xl-1">
          <div class="card bg-secondary shadow" style="height:60vh">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Manage Inquiries</h3>
                </div>
                <div class="col-4 text-right">
                  <a href="maproute.php" class="btn btn-sm btn-primary">See Location</a>
                </div>

              </div>
            </div>
            <div class="card-body" style="overflow-y: scroll; overflow-x:scroll; max-height:400px">
            <table class="table table-bordered">
                <thead style="background: #9754CB; color: white; text-align: center; padding: 15px; position:sticky; top:-15px; z-index:2;">
                    <tr>
                        <th>ID</th>
                        <th>Passenger</th>
                        <th>Contact Number</th>
                        <th>Location</th>
                        <th>Destination</th>
                        <th>Date&Time</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <!-- <tr style="text-align: center">
                        <td>1</td>
                        <td>Dakit</td>
                        <td>Bungtod</td>
                        <td>Keet</td>
                        <td>Pending</td>
                        <td><i class="uil uil-eye ii" style="font-size: 19px; padding-left:15px"></i></td>
                    </tr>   -->
                    
                    <?php
                    $sql = "Select * from bookings WHERE driverid = '$driverid' AND status !='Dropped-off'";
                    $query=$conn->query($sql);
                        while($row=$query->fetch_assoc())
                        {
                        echo "<tr style='text-align: center'>
                        <td>".$row['bookid']."</td>
                        <td>".$row['passenger']."</td>
                        <td>".$row['number']."</td>
                        <td>".$row['location']."</td>
                        <td>".$row['destination']."</td>
                        <td>".$row['datetime']."</td>
                        <td>".$row['status']."</td>

                        <td>
                        
                        <div class='dropdown'>
                            <button class='btn btn-primary dropdown-toggle' type='button' data-toggle='dropdown'>Actions
                            <span class='caret'></span></button>
                            <ul class='dropdown-menu'>
                              <li><a href='maproute1.php?id=".$row['bookid']."'>View</a></li>
                              <li><a href='habalconfirm.php?cid=".$row['bookid']."'>Confirm</a></li>
                              <li><a href='pickup.php?id=".$row['bookid']."'>Pick-Up</a></li>
                              <li><a href='dropoff.php?id=".$row['bookid']."&driverid=".$driverid."'>Drop-Off</a></li>
                              <li><a href='#receipt".$row['bookid']."' data-toggle='modal'>Receipt</a></li>
                            </ul>
                          </div>
                        </td>
                      </tr>";
                      include('receipt.php');
                        }

                      ?>
                </tbody>
            </table>
    </div>  
    
    <section class="edit-form-container">
              <?php

              if(isset($_GET['edit'])){
                $edit_id = $_GET['edit'];
                $edit_query = mysqli_query($conn, "SELECT * FROM `bookings` WHERE id = $edit_id");
                if(mysqli_num_rows($edit_query) > 0){
                    while($fetch_edit = mysqli_fetch_assoc($edit_query)){
              ?>


              <?php
                      };
                    };
                    echo "<script>document.querySelector('.edit-form-container').style.display = 'flex';</script>";
                };
              ?>

</section>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <br><br><br>
  <br><br><br>
  <br><br><br>
  <br><br><br>

   <div class="container-fluid bg-dark text-light footer wow fadeIn" data-wow-delay="0.1s">
           <!-- <div class="container pb-5">
                <div class="row g-5">
                    <div class="col-md-6 col-lg-4">
                        <div class="bg-pri rounded p-4">
                            <a href="#"><h1 class="text-white text-uppercase mb-3">HITCH</h1></a>
                            <p class="text-white mb-0">
								Experience <a class="text-dark fw-medium" href="">HITCH - E-Booking System</a>, provides the needs of commuters of Habal-Habal in Bogo City, Cebu Philippines.
							</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <h6 class="section-title text-start text text-uppercase mb-4">Contact</h6>
                        <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Bogo City, Cebu</p>
                        <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+63 908 263 5936</p>
                        <p class="mb-2"><i class="fa fa-envelope me-3"></i>hitchsystem@gmail.com</p>
                        <div class="d-flex pt-2">
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-12">
                        <div class="row gy-5 g-4">
                            <div class="col-md-6">
                                <h6 class="section-title text-start text text-uppercase mb-4">Group</h6>
                                <a class="btn btn-link" href="">About Us</a>
                                <a class="btn btn-link" href="">Contact Us</a>
                                <a class="btn btn-link" href="">Privacy Policy</a>
                                <a class="btn btn-link" href="">Terms & Condition</a>
                                <a class="btn btn-link" href="">Support</a>
                            </div>
                            <div class="col-md-6">
                                <h6 class="section-title text-start text text-uppercase mb-4">Services</h6>
                                <a class="btn btn-link" href="">Available Habal-Habal</a>
                                <a class="btn btn-link" href="">Online Booking</a>
                                <a class="btn btn-link" href="">See Location</a>
                        </div>
                    </div>
                </div>
            </div> -->
            <div class="container">
                <div class="copyright">
                    <div class="row">
                        <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                            &copy; <a class="border-bottom" href="#">HITCH: E-Booking System</a>, All Right Reserved. 
							
                            <br>
							                  Developed By: <a class="border-bottom" href="">Capstone Research Team 6</a>
                        </div>
                        <!-- <div class="col-md-6 text-center text-md-end">
                            <div class="footer-menu">
                                <a href="">Home</a>
                                <a href="">Cookies</a>
                                <a href="">Help</a>
                                <a href="">FQAs</a>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
        </div>

        <?php include('addhabalhabal.php') ?>
  <script>
  let subMenu = document.getElementById("subMenu");
  function toggleMenu(){
    subMenu.classList.toggle("open-menu");
  }
</script>
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
<script src="jquery/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="datatable/jquery.dataTables.min.js"></script>
<script src="datatable/dataTable.bootstrap.min.js"></script>

<script src="bootstrap/js/main.js"></script>

</body>
</html>