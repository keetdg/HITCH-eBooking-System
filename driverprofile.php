<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['driver'])) {

}else{
    header("Location: index.php");
    exit();
}
include 'dbconnect.php';

$id = $_GET['update'];
$sql = "SELECT driverid, dfullname, dbirthdate, dage, daddress, dgender, dnumber, demail FROM driver where driver.driverid=$id";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);

// inputs
$fullname3 = $row['dfullname'];
$birthdate3 = $row['dbirthdate'];
$age3 = $row['dage'];
$address3 = $row['daddress'];
$gender3 = $row['dgender'];
$number3 = $row['dnumber'];
$email3 = $row['demail'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Driver Profile</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">  
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js" rel="stylesheet">  
<link href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" rel="stylesheet">  

<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

<link href="passengerstyle.css" rel="stylesheet">
</head>

<body class="body">

<div class="container rounded bg-white mt-5 mb-5">
    <div class="row" style="margin-right:100px">
        <div class="col-md-3 border-right bg">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="img/profile.png">
                <br><span class="font-weight-bold">Driver</span>
                <span class="text-white-50"><?php echo $_SESSION['driver'] ?></span>
                <div class="mt-2 text-right upd"><button class="btn btn-primary profile-button" id="edit" onclick="edit()"><i class="uil uil-edit"></i> Edit Profile</button></div>
                <div class="mt-0.1 text-left bck" style="margin-right:-30px"><button class="btn btn-primary profile-button" id="back" type="button"><a href="driverpanel.php"><i class="uil uil-corner-up-left-alt"></i>Back</a></button></div> 
            </div>
        </div>

        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
            
                <div class="d-flex justify-content-between align-items-center mb-3">

                <form method="POST" action="driverupdate.php">
                    <h4 class="text-right">Profile Settings</h4>
                </div>

                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">Full Name</label>
                        <input type="text" name="fullname" id="fname" class="form-control" placeholder="Enter Fullname" value ="<?php echo $fullname3; ?>" disabled required>
                    </div>
                    <div class="col-md-6"><label class="labels">Age</label>
                        <input type="number" name="age" id="age" class="form-control" value="<?php echo $age3; ?>"  disabled placeholder="Enter Age">
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Birthdate</label>
                        <input type="date" name="birthdate" id="bd" class="form-control" placeholder="Enter Birthdate" value="<?php echo $birthdate3; ?>" disabled required>
                    </div>
                    <div class="col-md-12"><label class="labels">Address</label>
                        <input type="text" name="address" id="address" class="form-control" placeholder="Enter Address" value="<?php echo $address3; ?>" disabled required>
                    </div>
                    <div class="col-md-12"><label class="labels">Gender</label>
                    <select name="gender" id="gender" class="form-control" disabled required>
                                <option disabled selected>Select gender</option>
                                <?php
                                    $sql = "Select * from user";
                                    $result = mysqli_query($conn,$sql);

                                    if($result)
                                    {
                                        while($row=mysqli_fetch_assoc($result))
                                        {
                                        
                                        ?>
                                    <option
                                            value="<?php echo $row['ugender'];?>"
                                            <?php
                                                if($gender3 == $row['ugender']){
                                                        echo ' selected = "selected"';
                                                }
                                            ?>
                                     ><?php echo $row['ugender'];?> </option>

                                    <?php
                                            }
                                        echo'</select>';
                                    }               
                                ?>
                            </select>
                    </div>
                    <div class="col-md-12"><label class="labels">Contact Number</label>
                        <input type="tel" pattern="[0-9]{3}-[0-9]{4}-[0-9]{4}" class="form-control" id="conum" name="number" placeholder="Enter Contact Number" value="<?php echo $number3; ?>" disabled required>
                    </div>
                    <div class="col-md-12"><label class="labels">Email Address</label>
                        <input type="email" class="form-control" id="emails" name="email" placeholder="Enter Email Address" value="<?php echo $email3; ?>" disabled required>
                    </div>
                </div>
                <div class="mt-5 d-flex justify-content-between">
                    <div class="mt-0 text-right bt"><button class="btn btn-dark profile-button" type="button" id="cancel"  name="edit" hidden>Cancel</button></div>
                    <div class="mt-0 text-left but"><button class="btn btn-primary profile-button" id="save" type="submit" name="edit" hidden><i class="uil uil-check"></i>Save</button></div>
                </div>
                </form>
                
                
                
                
            </div>
        </div>
        <script src="form.js"></script>
    

        <div class="col-md-4">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center experience"><span>Habal-Habal Information</span></div><br>
                
                    <div class="text-center">
                    <img src="./img/ride.png" class="rounded mx-auto d-block" alt="Picture" style="width:150px; height:150px; position:absolute; left:970px">
                    </div>

                    <br><br><br>
                    <br><br><br>
                    <br><br><br>
                    <br><br>

                    <?php
                     $id = $_SESSION['id'];
                    //  $sql = "SELECT * from habalhabal where habalid = $id";
                     $sql = "SELECT habalhabal.habalid, driver, motortype, station, route, fare, status FROM habalhabal WHERE driverid = '$id'";
                     $query=$conn->query($sql);
                         while($row=$query->fetch_assoc())
                         {
                  ?>

                    <form method="POST" action="habalhabalupdate.php" class="row g-3">
                    
                        <div class="col-md-6">
                            <label for="inputEmail4" class="form-label">Driver:</label>
                            <input type="text" class="form-control" id="inputDriver4" name="driver" value="<?php echo $row['driver']; ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label for="inputMotortype4" class="form-label">Motor Brand:</label>
                            <input type="text" class="form-control" id="inputMotortype4" name="motortype" value="<?php echo $row['motortype']; ?>" required>
                        </div>
                        <div class="col-12">
                            <label for="inputStation" class="form-label">Station Address:</label>
                            <input type="text" class="form-control" id="inputStation" name="station" value="<?php echo $row['station']; ?>" required>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="inputRoute" class="form-label">Route:</label>
                            <select name="routes" class="form-control" aria-label="Default select example" id="routes">
                                <option value= "">None</option>

                                <?php
                                    $sql = "Select * from route";
                                    $result = mysqli_query($conn,$sql);

                                    if($result)
                                    {
                                        while($row=mysqli_fetch_assoc($result))
                                        {
                                    ?>

                                    <option
                                            value="<?php echo $row['route'];?>"
                                            <?php
                                                if($route3 = $row['route']){
                                                        echo ' selected = "selected"';
                                                }
                                            ?>
                                     ><?php echo $row['route'];?> </option>

                                    <?php
                                            }
                                        echo'</select>';
                                    }               
                                ?>

                        </div>
                        <div class="col-md-6">
                            <label for="inputFare" class="form-label">Fare:</label>
                            <input type="text" class="form-control" id="inputFare" value="₱5.00/km" name ="fare" readonly>
                        </div>
                        <div class="col-md-6">
                            <label for="inputStatus" class="form-label">Status:</label>
                            <input type="text" class="form-control" id="inputStatus" name="status" value="Available" readonly>
                        </div>
                        </div>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <!-- <button class="btn btn-danger me-md-2" type="button">Cancel</button>&nbsp -->
                            <button class="btn btn-primary" type="submit" name="submit"> Edit Information</button>
                        </div>
                        </form>
                        <?php


                        include('habalhabalupdate.php');
                        }
                    ?>	
                
            </div>
        </div>
    </div>
</div>
</div>
</div>

</body>


</html>


