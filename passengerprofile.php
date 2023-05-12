<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['passenger'])) {
    $userid = $_SESSION['id'];
}else{
    header("Location: index.php");
    exit();
}
include 'dbconnect.php';

$id = $_GET['update'];
$sql = "SELECT userid, ufullname, ubirthdate, uage, uaddress, ugender, unumber, uemail FROM user where user.userid=$id";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);

// inputs
$fullname3 = $row['ufullname'];
$birthdate3 = $row['ubirthdate'];
$age3 = $row['uage'];
$address3 = $row['uaddress'];
$gender3 = $row['ugender'];
$number3 = $row['unumber'];
$email3 = $row['uemail'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Passenger Profile</title>
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
    <div class="row">
        <div class="col-md-3 border-right bg">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="img/profile.png">
                <br><span class="font-weight-bold">Passenger</span>
                <span class="text-white-50"><?php echo $_SESSION['passenger'] ?></span>
                <div class="mt-2 text-right upd"><button class="btn btn-primary profile-button" id="edit" onclick="edit()"><i class="uil uil-edit"></i> Edit Profile</button></div>
                <div class="mt-0.1 text-left bck"><button class="btn btn-primary profile-button" id="back" type="button"><a href="passengerpanel.php"><i class="uil uil-corner-up-left-alt"></i>Back</a></button></div> 
            </div>
        </div>

        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
            
                <div class="d-flex justify-content-between align-items-center mb-3">

                <form method="POST" action="passengerupdate.php">
                    <h4 class="text-right">Profile Settings</h4>
                </div>

                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">Full Name</label>
                        <input type="text" name="fullname" id="fname" class="form-control" placeholder="Enter Fullname" value = "<?php echo $fullname3; ?>" disabled required>
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
                                    > <?php echo $row['ugender'];?> </option>

                                    <?php
                                            }
                                        echo'</select>';
                                    }               
                                ?>
                            </select>
                    </div>
                    <div class="col-md-12"><label class="labels">Contact Number</label>
                        <input type="text" class="form-control" id="conum" name="number" placeholder="Enter Contact Number" value="<?php echo $number3 ?>" disabled required>
                    </div>
                    <div class="col-md-12"><label class="labels">Email Address</label>
                        <input type="text" class="form-control" id="emails" name="email" placeholder="Enter Email Address" value="<?php echo $email3 ?>" disabled required>
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
                <div class="d-flex justify-content-between align-items-center experience"><span>Booking History</span></div><br>
                <table class="table table">
                <thead style="background: #9754CB; color: white">
                    <tr>
                        <th>ID</th>
                        <th>Driver</th>
                        <th>Location</th>
                        <th>Destination</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $tablesql = "SELECT * FROM bookings WHERE userid = $userid";
                    $tableresult = mysqli_query($conn, $tablesql);
                    if($tableresult)
                    {
                        while($tablerows = mysqli_fetch_assoc($tableresult))
                        {
                            $date = $tablerows['datetime'];
                            $dt = new DateTime($date);

                    ?>
                    <tr>
                        <td ><?php echo $tablerows['bookid']; ?></td>
                        <td ><?php echo $tablerows['driver']; ?></td>
                        <td><?php echo $tablerows['location']; ?></td>
                        <td><?php echo $tablerows['destination']; ?></td>
                        <td><?php echo $dt->format('Y-m-d');  ?></td>
                        <td><?php echo $tablerows['status']; ?></td>
                        <td>
                            <a href="receipt1.php"><i class="uil uil-ellipsis-v"></i></a>
                        </td>
                    </tr>                 
                   
<?php
 
                        }
                    }
?>


                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</body>


</html>