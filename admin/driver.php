<?php
	session_start();
	include 'dbconnect.php';
?>
<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> HITCH | Admin Panel </title>
    <link rel="stylesheet" href="adminstyles.css">

    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    
     <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" type="text/css" href="datatable/dataTable.bootstrap.min.css"> -->
   </head>
<body>
  <div class="sidebar">
    <div class="logo-details">
    <div class="logo"><img src="images/logoicon.png"></div> 
      <span class="logo_name"> HITCH</span>
    </div>
      <ul class="nav-links" style="margin-left: 12px;">
        <li>
          <a href="index.php">
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
          <a href="driver.php" class="active">
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
<!-- -------------------ADMIN PROFILE---------------------------------- -->
        <i class="uil uil-user-circle"></i>
        <i class="bx bx-chevron-down" onclick="toggleMenu()"></i>
      <div class="sub-menu-wrap" id="subMenu">
        <div class="sub-menu">
          <div class="user-info">
          <i class="uil uil-user-circle user"></i> 
          <h4>Admin Account</h4>
          <hr>
          </div>
       

          <a href="profile.php?profile=<?php echo $_SESSION['id']; ?>" class="sub-menu-link">
          <i class="uil uil-user-square usermenu"></i>
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
 
 <div class="overview-boxes">
  
   <div class="con">          
           <i class="uil uil-sign-alt"></i>
           <h3>Manage Drivers</h3>
           </div>

            <div class="containers py-5" style="width:1300px; height:400px; font-size: 13px; overflow-y: scroll; overflow-x:scroll; max-height:100vh">
            <div class="row">

          <table id="example" class="table table-striped" style="width:100%">
          <thead style="color: black">
            <tr>
              <th scope="col " style="text-align: center"><b>ID</b></th>
              <th scope="col " style="text-align: center"><b>Driver</b></th>
              <th scope="col " style="text-align: center"><b>Email Address</b></th>
              <th scope="col" style="text-align: center"><b>Contact</b></th>
              <th scope="col" style="text-align: center"><b>Date Created</b></th>
              <th scope="col" style="text-align: center"><b>Status</b></th>
              <th scope="col" style="text-align: center"><b>Action</b></th>
            </tr>
        
          </thead>
							<tbody>
							 
                <?php
                $sql = "SELECT * FROM driver";
                $query=$conn->query($sql);
                while($row=$query->fetch_assoc())
                    {
                    echo "<tr style='text-align: center'>
                        <td>".$row['driverid']."</td>
                        <td>".$row['dfullname']."</td>
                        <td>".$row['demail']."</td>
                        <td>".$row['dnumber']."</td>
                        <td>".$row['ddate']."</td>
                        <td>".$row['dstatus']."</td>

                        <td>
                        <a href='accept.php?id=".$row['driverid']."' class='btn btn-success btn-sm b' data-toggle='modal'><i class='uil uil-check' style='color:white; font-size:15px; text-align: center'></i>Accept</a> |
                        <a href='#reject".$row['driverid']."' class='btn btn-danger btn-sm b' data-toggle='modal'><i class='uil uil-ban' style='color:white; font-size:15px; text-align: center'></i>Reject</a>
                        
                        </td>
                      </tr>";
                      // include('cancel_modal.php');
                        }

                      ?>
							</tbody>
					  </table>
				  </div>
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


<script>
  let notifMenu = document.getElementById("notifMenu");
  function toggleNotif(){
    notifMenu.classList.toggle("open-notifmenu");
  }
</script>

</body>
</html>
