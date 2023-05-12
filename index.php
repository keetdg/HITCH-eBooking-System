<?php
session_start();

include 'dbconnect.php'; 

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE-edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Registration</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

  <link rel="stylesheet" href="index1.css">
</head>

<body> 
  

<nav class="navbar bg-light">
  <form class="container-fluid justify-content-start b">
  <label id ="show-login" class="btn btn-outline-success me-2 sign" type="button">Sign In</label>
    <button class="btn btn-sm btn-outline-secondary reg" type="button">
      <a href="regformdriver.php">Become a Driver</a>
    </button>
  </form>
</nav>

<div class="index">
        <div class="background-text" style="margin-left: 10px;">
            <h2><span>HITCH: </span>E-BOOKING SYSTEM</h2>
        </div>

        <div class="text">
        <p>Integrate Modern Technologies through Online Booking.</p>
        </div>
        <div class="text2">
        <p>Book your trip with us!</p>
        </div>

        <button id ="show-reg" class="signup"><a href="regform.php">BOOK NOW</a></button>
</div>

<!----LOGIN FORM---->
<div class="popup" id="plogin">
  <div class="close-btn">&times;</div>
  <div class="form">
  <form action="login.php" method="POST">
    <h2>Sign In Account</h2>
    <div class="form-element">
      <label for="email">Email</label>
      <input type="text" id="email" name="email" placeholder="Enter email">
    </div>
    <div class="form-element">
      <label for="password">Password</label>
      <input type="password" id="password" name="pass" placeholder="Enter password">
    </div>
    <div class="form-element">
      <input type="checkbox" id="remember-me">
      <label for="remember-me">Remember me</label>
    </div>
    <div class="form-element">
      <button type="submit" name="btnlogin">Sign in</button>
    </div>
    <div class="form-element">
    <a href="driverlogin.php">Sign in as Driver</a>
      <a href="#">Forgot password?</a>
    </div>
    <div id="show-register" class="form-element">
      <a href="regform.php"><span style="color:black">Don't have an Account?</span><u> Register Here</u></a>
      </form>
    </div>
  </div>
</div> 

        

<script src="script.js"></script>
</body>
</html>