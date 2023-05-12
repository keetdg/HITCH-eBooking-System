<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

}else{
  header("Location: login_admin.php");
  exit();
}
include 'dbconnect.php';

?>

<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> HITCH | Admin Panel </title>
    <link rel="stylesheet" href="adminstyles.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  
  <div class="sidebar">
    <div class="logo-details">
    <div class="logo"><img src="images/logoicon.png"></div> 
      <span class="logo_name"> HITCH</span>
    </div>
      <ul class="nav-links">
        <li>
          <a href="index.php" class="active">
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="route.php">
          <i class="uil uil-directions"></i>
            <span class="links_name">Route</span>
          </a>
        </li>
        <li>
          <a href="habalhabal.php">
          <i class="uil uil-create-dashboard"></i>
            <span class="links_name">Habal-Habals</span>
          </a>
        </li>
        <li>
          <a href="driver.php">
            <i class='bx bx-list-ul' ></i>
            <span class="links_name">Drivers</span>
          </a>
        </li>
        <li>
          <a href="passenger.php">
          <i class="uil uil-notebooks"></i>
            <span class="links_name">Passengers</span>
          </a>
        </li>
        <li>
          <a href="bookings.php">
          <i class="uil uil-users-alt"></i>
            <span class="links_name">Bookings</span>
          </a>
        </li>
      </ul>
  </div>

  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='il uil-arrow-circle-left sidebarBtn'></i>
        <span class="dashboard">Administrator</span>
      </div>

      <!-- <div class="search-box">
        <input type="text" placeholder="Search...">
        <i class='bx bx-search'></i>
      </div> -->

      <div class="profile-details">
        <!-- <div class="notif"><i class="uil uil-bell" onclick="toggleNotif()"></i></div>
        <div class="notif-wrap" id="notifMenu"></div> -->

        <i class="uil uil-user-circle"></i>
        <i class="bx bx-chevron-down" onclick="toggleMenu()"></i>

      <div class="sub-menu-wrap" id="subMenu">
        <div class="sub-menu">
          <div class="user-info">
          <i class="uil uil-user-circle user"></i> 
          <h6>Admin Account</h6>
          <hr>
          </div>
       

          <a href="profile.php?profile=<?php echo $_SESSION['id']; ?>" class="sub-menu-link">
          <i class="il uil-user-square usermenu"></i>
          <p>Profile</p>
          </a>
          <a href="logout.php" class="sub-menu-link">
          <i class="uil uil-signout usermenu"></i>
          <p>Log Out</p>
          </a>

        </div>
      </div>

      </div> 
    </nav>

  

    <div class="home-content">
    <div class="dashboard">
      <br>
      <h5><b><u>Dashboard</u>/ Admin Panel</b></h5>
      </div>
      <br><br>
    <!-- <div class="search-box">
        <input type="text" placeholder="Search...">
        <i class='bx bx-search' ></i>
      </div>       -->

      <div class="overview-boxes">
        <div class="box">
        <i class="uil uil-create-dashboard cart"></i>
          <div class="right-side">          
            <div class="box-topic">Habal-Habals</div>

                  <?php
                      $dash_habalhabal = "SELECT * FROM habalhabal";
                      $dash_habalhabal_run = mysqli_query($conn, $dash_habalhabal);

                      if($habalhabal_total = mysqli_num_rows($dash_habalhabal_run)){
                        echo '<div class="number">'.$habalhabal_total.'</div>';
                      }
                      else{
                        echo '<div class="number"> 0 </div>';
                      }
                  ?>
            
            <div class="indicator">
              <i class='bx bx-up-arrow-alt'></i>
              <span class="text"><a href="habalhabal.php">Full Details</a></span>
            </div>
          </div>
         
        </div>
        <div class="box">
        <i class='uil uil-search-plus cart two' ></i>
          <div class="right-side">
            <div class="box-topic">Drivers</div>

                  <?php
                      $dash_driver = "SELECT * FROM driver";
                      $dash_driver_run = mysqli_query($conn, $dash_driver);

                      if($driver_total = mysqli_num_rows($dash_driver_run)){
                        echo '<div class="number">'.$driver_total.'</div>';
                      }
                      else{
                        echo '<div class="number"> 0 </div>';
                      }
                  ?>
            <div class="indicator">
              <i class='bx bx-up-arrow-alt'></i>
              <span class="text"><a href="driver.php">Full Details</a></span>
            </div>
          </div>
         
        </div>
        <div class="box">
        <i class='uil uil-user-plus cart three' ></i>
          <div class="right-side">
            <div class="box-topic">  Passengers</div>
          
                  <?php
                      $dash_user = "SELECT * FROM user";
                      $dash_user_run = mysqli_query($conn, $dash_user);

                      if($user_total = mysqli_num_rows($dash_user_run)){
                        echo '<div class="number">'.$user_total.'</div>';
                      }
                      else{
                        echo '<div class="number"> 0 </div>';
                      }
                  ?>
            <div class="indicator">
              <i class='bx bx-up-arrow-alt'></i>
              <span class="text"><a href="passenger.php">Full Details</a></span>
            </div>
          </div>
          
        </div>

        <div class="box">
        <i class='uil uil-map-marker-plus cart four' ></i>
          <div class="right-side">
            <div class="box-topic">  Bookings</div>
          
                <?php
                      $dash_bookings = "SELECT * FROM bookings";
                      $dash_bookings_run = mysqli_query($conn, $dash_bookings);

                      if($bookings_total = mysqli_num_rows($dash_bookings_run)){
                        echo '<div class="number">'.$bookings_total.'</div>';
                      }
                      else{
                        echo '<div class="number"> 0 </div>';
                      }
                  ?>
                    

            <div class="indicator">
              <i class='bx bx-up-arrow-alt'></i>
              <span class="text"><a href="bookings.php">Full Details</a></span>
            </div>
          </div>
          
        </div>
          
        <!-- <div class="box">
        <i class='uil uil-map-marker-plus cart three' ></i>
          <div class="right-side">
            <div class="box-topic">  Subcribers</div>
          
            <div class="indicator">
              <i class='bx bx-up-arrow-alt'></i>
              <span class="text"><a href="route.php">Full Details</a></span>
            </div>
          </div>
          
        </div> -->
      
        <div class="con">          
                <i class="uil uil-sign-alt"></i>
                <h3>Recent Bookings</h3>
                </div>
   
    <div class="containers py-5" style="width:1300px; height:400px; font-size: 13px; overflow-y: scroll; overflow-x:scroll; max-height:100vh">
    <div class="row">

    <table id="example" class="table table-striped" style="width:100%">
        <thead style="color: black; background: #6237A0; font-weight:1000px;">
            <tr>
                <th style="text-align: center"><b>ID</b></th>
                <th style="text-align: center"><b>PASSENGER</b></th>
                <th style="text-align: center"><b>NUMBER</b></th>
                <th style="text-align: center"><b>LOCATION</b></th>
                <th style="text-align: center"><b>DESTINATION</b></th>
                <th style="text-align: center"><b>DRIVER</b></th>
                <th style="text-align: center"><b>DATE&TIME</b></th>
                <th style="text-align: center"><b>STATUS</b></th>
                <th style="text-align: center"><b>ACTION</b></th>
            </tr>
        </thead>
        <tbody>
          <style>
            td{
              text-align: left;
            }
          </style>
            <?php
                $sql = "SELECT * FROM bookings";
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
                        <a href='#cancel".$row['bookid']."' class='btn btn-danger btn-sm b' data-toggle='modal'>View</a>
                        
                        </td>
                      </tr>";
                      // include('cancel_modal.php');
                        }

                      ?>
           
        </tbody>
      
    </table>        
    </div>
</div> 
  </section>


<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
<script src="script.js"></script>

  <script>
   let sidebar = document.querySelector(".sidebar");
    let sidebarBtn = document.querySelector(".sidebarBtn");
    sidebarBtn.onclick = function() {
  sidebar.classList.toggle("active");
  if(sidebar.classList.contains("active")){
  sidebarBtn.classList.replace("uil uil-angle-right");
}else
  sidebarBtn.classList.replace("uil uil-angle-right");
}
 </script>

<script>
  let subMenu = document.getElementById("subMenu");
  function toggleMenu(){
    subMenu.classList.toggle("open-menu");
  }
</script>

</body>
</html>
