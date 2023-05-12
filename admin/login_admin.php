<?php
session_start();

include 'dbconnect.php';

?>
<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> HITCH | Admin Login </title>
    <link rel="stylesheet" href="adminstyle.css">

    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>

  <div class="sidebar">
     <!-- <div class="sideimg"> 
        <img src="images/ride6.jpg" alt="Image">
     </div> -->
     <div class="logo-details">
     <div class="logo"><img src="images/logoicon.png"></div> 
      <span class="logo_name"> HITCH</span>
    </div>
    </div>
  </div>

  <section class="log-section">
   
  <form action="alogin.php" method="post">
     	<h3>Admin Accessed...</h3>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
     	<label>Username</label>
     	<input type="text" name="uname" placeholder="Username"><br>

     	<label>Password</label>
     	<input type="password" name="password" placeholder="Password"><br>

     	<button type="submit">LogIn</button>
          <a href="signup.php" class="ca">Create an account</a>
     </form>
            
</section>  
  

</body>
</html>
