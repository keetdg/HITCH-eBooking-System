<?php
session_start();

include 'dbconnect.php'; 
$error = "";
if(!empty($_GET['error']))
{
    $error = $_GET['error'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="reg1.css">

    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title>Sign In Driver</title> 
</head>
<body>


                <div class="driverpopup">
                <div class="close-btn"><a href="index.php">&times;</a></div>
                <div class="form">
                <form action="driverlog.php" method="POST">
                    <h2>Sign In Driver Account</h2>

                    <div class="form-element">
                    <label for="email">Email</label>
                    <input type="text" id="email" name="email" placeholder="Enter email" required>
                    </div>
                    <div class="form-element">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="pass" placeholder="Enter password" required >
                    </div>
                    <span style="color:red;"><?php echo $error;?></span>
                    <div class="form-element">
                    <input type="checkbox" id="remember-me">
                    <label for="remember-me">Remember me</label>
                    </div>
                    <div class="form-element">
                    <button type="submit" name="btnlogin">Sign in</button><br><br>
                    </div>
                    <div class="form-element">
                    <a href="#">Forgot password?</a>
                    </div>
                    <div id="show-register" class="form-element">
                    <a href="regformdriver.php"><span style="color:black">Don't have an Account?</span><u> Register Here</u></a>
                    </form>
                    </div>
                </div>
                </div> 

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>
</html>

