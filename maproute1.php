<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['driver'])) {
$habalid = $_SESSION['id'];
$distance = $_SESSION['id'];
}else{
    header("Location: index.php");
    exit();
}
include 'dbconnect.php';

$id = $_GET['id'];
$sql = "SELECT * FROM bookings WHERE bookid = $id";
$result = mysqli_query($conn,$sql);
$row  = mysqli_fetch_assoc($result);

// inputs
$fname= $row['passenger'];
$number= $row['number'];
$loc= $row['location'];
$dest= $row['destination'];
$date= $row['datetime'];
$stat= $row['status'];
$distance= $row['traveldistance'];
?>

<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Map Route1</title>
    <link rel="stylesheet" href="maproute1.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <script src='https://api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.css' rel='stylesheet' />
    <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.1.0/mapbox-gl-directions.js"></script>
    <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.1.0/mapbox-gl-directions.css" type="text/css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
     
   </head>
<body>
  
  <div class="sidebar">
    <div class="logo-details">
      <div class="logo_name"> Booking Details</div>
   

  <div class="col-md-5 border-right">
    <div class="py-5" style="position: absolute; top: 30px; width: 650px">
    <form action="habalaccept.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
                <div class="col-md-6"><label class="labels" style="color:white">Passenger's Name</label>
                    <input type="text" name="fullname" id="fname" class="form-control" placeholder="Lastname, Firstname " value ="<?php echo $fname; ?>" readonly required>
            </div>
            <div class="col-md-6"><label class="labels" style="color:white">Contact Number</label>
                    <input type="tel" name="number" id="number" class="form-control" placeholder="091-2345-6789" pattern="[0-9]{3}-[0-9]{4}-[0-9]{4}" value ="<?php echo $number ?>" readonly required>
            </div>
            <div class="col-md-6"><label class="labels" style="color:white">Location</label>
                    <input type="text" name="loc" class="form-control" placeholder="From " value ="<?php echo $loc; ?>" id="location" readonly required>
            </div>
            <div class="col-md-6"><label class="labels" style="color:white">Destination</label>
                    <input type="text" name="dest" class="form-control" placeholder="To" value ="<?php echo $dest ?>" id="destination" readonly required>
            </div>
            <div class="col-md-6"><label class="labels" style="color:white">Date and Time</label>
                    <input type="text" name="date" class="form-control" value ="<?php echo $date ?>" readonly required>
            </div>
            <div class="col-md-6"><label class="labels" style="color:white">Status</label>
                    <input type="text" name="stat" class="form-control" value ="<?php echo $stat; ?>" readonly required>
            </div><hr>

            <div class="col-md-3"><label class="labels" style="color:white">Travel Distance</label>
                    <input type="text" name="distance" id="distance" class="form-control" value="<?php echo $distance; ?> km" required>
                    
            </div>
            <?php if(isset($res)) echo '<div class="result">'.$res.'</div>'; ?>
        </div>
        </div>
            <div class="mt-5 d-flex justify-content-between" style="margin-left:-10px; margin-bottom:-1300px">
                    <div class="mt-0 text-right bt"><a href="d_bookingcancel.php?bid=<?php echo $id; ?>"><button class="btn btn-danger profile-button" type="button" id="cancel" name="cancel">
                      <i class="uil uil-times"></i>Cancel Booking</button></a></div>
                    <!-- <div class="mt-0 text-left but"><button class="btn btn-success profile-button" id="save" type="submit" name="confirm"><i class="uil uil-check"></i>Confirm</button></div> -->
                </div>
                </form>
        </div>     
    </div>

    <?php
        $sql = "SELECT lat, lng, lat1, lng1 FROM bookings";
        $result = mysqli_query($conn, $sql);

        $coordinates = array();
        while ($row = mysqli_fetch_assoc($result)) {
        $coordinates[] = array($row["lat"], $row["lng"]);
}
?>
        <div class="map">
        <div id="map"></div>
        </div>

        <div id="map" style="width: 100%; height: 400px;"></div>

<script src='https://api.tiles.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.js'></script>
<link href='https://api.tiles.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.css' rel='stylesheet' />

<script>
var sampvar;

mapboxgl.accessToken =
  "pk.eyJ1IjoiZmFraHJhd3kiLCJhIjoiY2pscWs4OTNrMmd5ZTNra21iZmRvdTFkOCJ9.15TZ2NtGk_AtUvLd27-8xA"

navigator.geolocation.getCurrentPosition(successLocation, errorLocation, {
  enableHighAccuracy: true
})

function successLocation(position) {
  setupMap([position.coords.longitude, position.coords.latitude])
}

function errorLocation() {
  setupMap([-2.24, 53.48])
}

function setupMap(center) {
  const map = new mapboxgl.Map({
    container: "map",
    style: "mapbox://styles/mapbox/streets-v11",
    center: center,
    zoom: 15
  })

  const nav = new mapboxgl.NavigationControl()
  map.addControl(nav)

  var directions = new MapboxDirections({
    accessToken: mapboxgl.accessToken
  })

  map.addControl(directions, "top-left")
  let i = 0;
  map.on('click', (e) => {
    i++;
    // console.log("1");
    
    // sampvar = e;
    var p = new Promise(function(resolve, reject){
      $.ajax({
          url: "https://nominatim.openstreetmap.org/reverse?format=json&lat="+ e.lngLat.lat +"&lon=" + e.lngLat.lng,
          success: function (data) {
              resolve(data)
        
          },
          error: function (data) {
              reject(data)
          }
      });
    });

    p.then((data)=>{
      
      console.log(data);

      let location = document.getElementById("location");
      let dest = document.getElementById("destination");
      if(location.value.length == 0)
      {
        location.value = data.display_name;
      }
      else
      {
        dest.value = data.display_name;
      }

      sampvar = data;
    })
    .catch((err)=>{
        console.log(err);
    })
    ;
  });

  map.on('dragend', (e) => {
    console.log("3");

  });
}

var line = {
  "type": "Feature",
  "geometry": {
    "type": "LineString",
    "coordinates": <?php echo json_encode($coordinates); ?>
  }
};

map.on('load', function () {
  map.addLayer({
    "id": "route",
    "type": "line",
    "source": {
      "type": "geojson",
      "data": {
        "type": "Feature",
        "geometry": line.geometry
      }
    },
    "layout": {
      "line-join": "round",
      "line-cap": "round"
    },
    "paint": {
      "line-color": "#888",
      "line-width": 10
    }
  });
});
</script>


  <!-- <script src="maproute1.js" defer></script> -->
  </body>
</html>