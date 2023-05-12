<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
    $userid = $_SESSION['id'];
}else{
    header("Location: index.php");
    exit();
}
include 'dbconnect.php';

$id = $_GET['profile'];
$sql = "SELECT id, user_name, password, name FROM users where users.id=$id";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);

// inputs
$username3 = $row['user_name'];
$pass3 = $row['password'];
$name3 = $row['name'];

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
        <span class="dashboard">Administrator Profile</span>
      </div>


      <div class="profile-details">

        <i class="uil uil-user-circle"></i>
        <i class="bx bx-chevron-down" onclick="toggleMenu()"></i>

      <div class="sub-menu-wrap" id="subMenu">
        <div class="sub-menu">
          <div class="user-info">
          <i class="uil uil-user-circle user"></i> 
          <h4>Admin Account</h4>
          <hr>
          </div>
        

          <a href="#" class="sub-menu-link">
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
                <h3>Update Profile</h3>      
        </div>

        <form method ="POST" action="profileupdate.php" enctype="multipart/form-data">
        <div class="modal-body">
			<div class="container-fluid">   
              
      <div class="row form-group ">
             <label class="control-label modal-label">Name:</label>
                <input type="text" id = "name" class="form-control" name="name" value="<?php echo $name3; ?>" required autocomplete="off">               
                </div> 

      <div class="row form-group">					
             <label class="control-label modal-label">Username:</label>
             <input type="text" id = "username" class="form-control" name = "username" value ="<?php echo $username3; ?>" required autocomplete="off">              
            </div>

       <div class="row form-group">					
             <label class="control-label modal-label">Password:</label>
             <input type="password" id = "pass" class="form-control" name = "pass" value = "<?php echo $pass3; ?>" required autocomplete="off">              
            </div>
          
            <div class="row form-group">					
             <label class="control-label modal-label">New Password:</label>
             <input type="password" id = "pass" class="form-control" name = "pass" value = "" required autocomplete="off">              
            </div>

    <div class="but">
      <button class = "btn btn-danger" style="background: white; text-decoration: none;"><a href="index.php">Back</a></button>
     <button type="submit" class = "btn btn-success" name ="submit" id="sub">Update</button>
   </div>

    </div>
    </div>
</form>




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
