<?php
	session_start();
	include 'dbconnect.php';

  include 'addroute.php';
?>

<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> HITCH | Admin Panel </title>
    <link rel="stylesheet" href="adminstyles.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
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
          <a href="route.php" class="active">
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
          <h4>Admin Account</h4>
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
 
      <div class="overview-boxes">
       
        <div class="con">          
                <i class="uil uil-sign-alt"></i>
                <h3>Manage Route</h3> 
                <a href="#addnewroute" data-toggle="modal" class="btnadd"><i class="uil uil-plus"> New</i></a>
           
                </div>
                

                <style>
                  .con a i{
                    width: 75px;
                    text-decoration: none;
                  }
                </style>
            <!-- <div class="addbtn" style="margin-left: 75%; margin-bottom:25px ">
            <a href="#addnewroute" data-toggle="modal" class="btnadd"><i class="uil uil-plus"></i>  New</a>
          </div>
        </div><br> -->

    <div class="containers py-5" style="width:1300px; height:550px; font-size: 13px; overflow-y: scroll; overflow-x:scroll; max-height:100vh">
    <div class="row">

    <table id="example" class="table table-striped" style="width:100%">
        <thead style="color: black; background: #6237A0; font-weight:1000px;">
            <tr>
                <th style="text-align: center"><b>ID</b></th>
                <th style="text-align: center"><b>ROUTE</b></th>
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
                    $sql = "Select * from route";
                    $query=$conn->query($sql);
                        while($row=$query->fetch_assoc())
                        {
                        echo "<tr>
                        <td>".$row['routeid']."</td>
                        <td>".$row['route']."</td>

                        <td>
                        <a href='#editroute".$row['routeid']."' class='btn btn-success btn-sm' data-toggle='modal'><span class='glyphicon glyphicon-edit'></span>Edit</a> |
                        <a href='#deleteroute".$row['routeid']."' class='btn btn-danger btn-sm' data-toggle='modal'><span class='glyphicon glyphicon-trash'></span>Delete</a>
                        </td>
                    </tr>";
                    include('editdelroute.php');
                        }
                    ?>
           
        </tbody>
      
    </table>        
    </div>
</div> 
  </section>

  <script src="jquery/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="datatable/jquery.dataTables.min.js"></script>
<script src="datatable/dataTable.bootstrap.min.js"></script>
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
