<?php

include 'dbconnect.php';

if(isset($_POST['submit'])){

    $fullname = $_POST['fullname'];
    $birthdate = $_POST['birthdate'];
    $age = $_POST['age'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];
    $number = $_POST['number'];
    $idtype = $_POST['idtype'];
    $file = $_FILES['file']['name'];
    $file_image_tmp_name = $_FILES['file']['tmp_name'];
    $file_image_folder = 'img/'.$file;
   $email = $_POST['email'];
   $pass = $_POST['pass'];
   $conpass = $_POST['conpass'];

   $select = "SELECT * FROM driver WHERE demail = '$email' && dpass = '$pass'";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $error[] = 'User Already Exist';

   }else{

      if($pass != $conpass){
         $error[] = 'Password not Matched!';
      }else{
         $insert = "INSERT INTO driver(dfullname, dbirthdate, dage, daddress, dgender, dnumber, didtype, dimg, demail, dpass, dconpass) VALUES('$fullname','$birthdate','$age','$address','$gender','$number','$idtype','$file','$email','$pass','$conpass')";
         
         mysqli_query($conn, $insert);
         header('location: index.php');
      }
   }

};
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

    <title>Regisration Form</title> 
</head>
<body>
<div class="container">
        <header>Register Driver Account</header>
        <div class="close-btn"><a href="index.php">&times;</a></div>
        <form action="" method="POST" id="register" class="input-group-register" enctype="multipart/form-data">
            <div class="form first">
                
                    <div class="fields">
                        <div class="input-field">
                            <label>Full Name</label>
                            <input type="text" name="fullname" placeholder="Lastname, Fullname" required>
                        </div>

                        <div class="input-field">
                            <label>Date of Birth</label>
                            <input type="date" name="birthdate" placeholder="mm/dd/yy" required>
                        </div>
                        
                        <div class="input-field">
                            <label>Age</label>
                            <input type="number" name="age" placeholder="Age" required>
                        </div>

                        <div class="input-field">
                            <label>Address</label>
                            <input type="text" name="address" placeholder="Purok, Barangay, Municipality/City" required>
                        </div>

                        <div class="input-field">
                            <label>Gender</label>
                            <select name="gender" required>
                                <option disabled selected>Select gender</option>
                                <option>Male</option>
                                <option>Female</option>
                                <option>Others</option>
                            </select>
                        </div>

                        <div class="input-field">
                            <label>Mobile Number</label>
                            <input type="tel" name="number" placeholder="091-234-5678" pattern="[0-9]{3}-[0-9]{4}-[0-9]{4}" required>
                        </div>

                        <div class="input-field">     
                            <label>ID Type</label>
                            <select class="id" name="idtype" required>
                                <option disabled selected>Select Valid ID</option>
                                <option>National ID</option>
                                <option>Passport</option>
                                <option>Voter's ID</option>
                            </select>
                        </div>

                        <div class="attachment">
                            <label>Attach ID</label>
                            <input type="file" name="file" accept="image/png, image/jpeg, image/jpg" required>
                        </div>

                    </div>

                    <div class="details ID">
                        <span class="title"><b>Account Details</b></span>
    
                        <div class="fields">
                            <div class="input-field">
                                <label>Email Address</label>
                                <input type="email" name="email" placeholder="sample@gmail.com" required>
                            </div>
                    
                            <div class="input-field">
                                <label>Password</label>
                                <input type="password" name="pass" id="pass" placeholder="Enter Password" required>
                            </div>
    
                            <div class="input-field">
                                <label>Confirm Password</label>
                                <input type="password" name="conpass" id="conpass" placeholder="Enter password again" onkeyup="checkps()" required>
                                <span id='message1'></span>
                            </div>
                        </div>
                        
                        <div class="form-element">
                            <button type="submit" class="submit-btn" id="btnsub" name="submit">Sign Up</button>
                        </div>
                        <div class="form-element">
                            <a href="#">Forgot password?</a>
                          </div>
                        <div class="form-element">
                            <a href="driverlogin.php"><span style="color:black">Already have an Account? </span>Sign In</a>
                          </div>
                </div>
                  
               
            </div>
        </form>
    </div>

    <script src="script.js"></script>
</body>
</html>


<script>
    var checkps = function() {
    if ((document.getElementById('pass').value == document.getElementById('conpass').value)) {
        document.getElementById('message1').style.color = 'green';
        document.getElementById('message1').innerHTML = 'Passwords Match';
        document.getElementById('btnsub').removeAttribute('disabled');
    }
    if ((document.getElementById('pass').value != document.getElementById('conpass').value)) {
    document.getElementById('message1').style.color = 'red';
    document.getElementById('message1').innerHTML = 'Passwords do not Match';
    document.getElementById('btnsub ').setAttribute('disabled', true);
    }

}


</script>