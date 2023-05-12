<?php
ob_start();
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['passenger'])) {
$userid = $_SESSION['id'];

}else{
    header("Location: index.php");
    exit();
}
include 'dbconnect.php';

// include 'book_model.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="bookstyle.css">
     
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <script src="https://api.tiles.mapbox.com/mapbox-gl-js/v2.9.2/mapbox-gl.js"></script>
    <link href="https://api.tiles.mapbox.com/mapbox-gl-js/v2.9.2/mapbox-gl.css" rel="stylesheet"/>
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.11.0/mapbox-gl.css" rel="stylesheet">
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.11.0/mapbox-gl.js"></script>

    <title>Booking</title> 
</head>

<body>

<div class="container" style="height: 670px">
        <header>Booking Information</header><hr>
        <div class="close-btn"><a href="rides.php">&times;</a></div>

        <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v0.48.0/mapbox-gl.js'></script>
        <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v0.48.0/mapbox-gl.css' rel='stylesheet' />
        <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.min.js"></script>
        <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.css" type="text/css">
        <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v0.48.0/mapbox-gl.js'></script>
        <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v0.48.0/mapbox-gl.css' rel='stylesheet' />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.1.0/mapbox-gl-directions.js"></script>
        <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.1.0/mapbox-gl-directions.css" type="text/css">

        <div class="form first">
            <div class="column" style="background-color:#dcd0ff; height: 560px">           
                <div id='map' style="height: 540px"></div>         
        </div>

        <pre id="coordinates" class="coordinates"></pre>

        <?php
            $id =$_GET['book'];
            $sql = "SELECT habalhabal.habalid, driver, motortype, station, route.route, fare, status FROM habalhabal LEFT JOIN route ON habalhabal.route = route.routeid where habalid = '$id'";
            $result=mysqli_query($conn,$sql);
            $row=mysqli_fetch_assoc($result);

            $motortype = $row['motortype'];
            $fare = $row['fare'];
            $driver = $row['driver'];
            $route = $row['route'];
            $sql1 = "SELECT * FROM user WHERE userid = '$userid'";
            $resultsql1 = mysqli_query($conn, $sql1);
            $row = mysqli_fetch_assoc($resultsql1);
           
            ?>
    

            <form action="" class="input-group-register" method="POST">
             
                 <div class="column" style="background-color:#fff; height: 560px">
                <h1 class="mb-3" style="text-transform: uppercase"><?php echo $motortype;?>
                <small class="position-absolute start-0 top-100 translate-middle-y bg-pri text-white rounded py-1 px-3 ms-4">₱<?php echo number_format($fare,2);?>/km</small></h1>
                <small class="border-end me-3 pe-3"><i class="uil uil-cog text me-2"></i> <?php echo $driver;?> </small><br>
                <small class="border-end me-3 pe-3"><i class="uil uil-location-pin-alt text me-2"></i> <?php echo $route; ?></small><hr>

                <form id="signupForm" method="post" class="row g-3">	
				    <div class="fields">
                        <div class="input-field"><br>
                            <label>Passenger Name</label>
                            <input type="text" id="name" name="passenger" value="<?php echo $row['ufullname'];?>" readonly>
                        </div>
                        <div class="input-field">
                            <label>Contact Number</label>
                            <input type="tel" id="num" name="number" value="<?php echo $row['unumber'];?>" pattern="[0-9]{3}-[0-9]{4}-[0-9]{4}" readonly>
                        </div>

                            <div class="input-field">
                                <label>Location</label>
                                <input type="text" id="loc" name="location" class="form-control" value="" readonly placeholder="Enter Location">
                                <input type="text" id="lat" name="lat" class="form-control" value="" hidden>
                                <input type="text" id="long" name="lng" class="form-control" value="" hidden>
                            </div>

                            <div class="input-field"><br>
                            <label>Destination</label>
                            <input type="text" id="dest" name="destination" class="form-control" value="" readonly placeholder="Enter Destination">
                            <input type="text" id="lat1" name="lat1" class="form-control" value="" hidden>
                            <input type="text" id="long1" name="lng1" class="form-control" value="" hidden>
                        </div>
                        <input type="text" id="dist" name="distance" class="form-control" value="" hidden>
                                  
                    </div>
                   
                    <div class="btns">
                            <button class="btnn" type="button">Cancel</button>&nbsp
                            <button class="btn" type="submit" name="submit">Book</button>
                        </div>
                </form>
               
            </div>
                    
               
            </div>
        </form>

  <?php
            $id = $_SESSION['id'];

            if(isset($_POST['submit']))
            {
            $bookid = $id;
            $passenger = $_POST['passenger'];
            $number = $_POST['number'];
            $location = $_POST['location'];
            $lat = $_POST['lat'];
            $lng = $_POST['lng'];
            $destination = $_POST['destination'];
            $lat1 = $_POST['lat1'];
            $lng1 = $_POST['lng1'];
            $myid = $_SESSION['id'];
            $distance=$_POST['distance'];
            $fdistance = $distance * 1.609;
            

            

            $sql = "SELECT habalhabal.habalid, driver,driverid, motortype, station, route.route, habalhabal.fare, status FROM habalhabal LEFT JOIN route ON habalhabal.route = route.routeid where habalid = '$bookid'";
            $result = mysqli_query($conn,$sql);
            $row=mysqli_fetch_assoc($result);

            $finaltariff = $fare * $fdistance;

            // echo "submitted";

        $driver = mysqli_query($conn, "SELECT driver, driverid FROM habalhabal ");
        $driverData = mysqli_fetch_assoc($driver);

        // $sql = "INSERT INTO bookings ( `passenger`, `number`, `location`, `lat`, `lng`, `destination`, `lat1`, `lng1`, `driver`, `driverid`, `userid`, `traveldistance`, `tariff`)
        //         VALUES ('$passenger', '$number', '$location', '$lat', '$lng', '$destination', '$lat1', '$lng1', '".$driverData['driver']."', '".$driverData['driverid']."', '$myid', '$fdistance', '$finaltariff')";

        $sql = "INSERT INTO bookings (`passenger`, `number`, `location`, `lat`, `lng`, `destination`, `lat1`, `lng1`, `driver`, `driverid`, `userid`, `traveldistance`, `tariff`)
                VALUES ('$passenger', '$number', '$location', '$lat', '$lng', '$destination', '$lat1', '$lng1', '".$driverData['driver']."', '".$driverData['driverid']."', '$myid', '$fdistance', '$finaltariff')";

            $upload = mysqli_query($conn,$sql);
            if($upload)
            {
                header('location:bookings.php');
            // echo "oks na";
            }
            else
            {
                die(mysqli_error($conn));
            }
            }

    ?>
 </div>

 <!-- <script>
        var sampvar;

        var saved_markers = ;
        var user_location = [124.00501251519512,11.0494449041867];
        

        mapboxgl.accessToken = 'pk.eyJ1IjoiZmFraHJhd3kiLCJhIjoiY2pscWs4OTNrMmd5ZTNra21iZmRvdTFkOCJ9.15TZ2NtGk_AtUvLd27-8xA';
        var map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/streets-v11',
        center: user_location,
        zoom: 10
        });
        //  geocoder here
         var geocoder = new MapboxGeocoder({
            accessToken: mapboxgl.accessToken,
           
        });

        // Add geolocate control to the map.
        map.addControl(
        new mapboxgl.GeolocateControl({
        positionOptions: {
        enableHighAccuracy: true
        },
        // When active the map will receive updates to the device's location as it changes.
        trackUserLocation: true,
        showUserHeading: true
        })
        );

        //add control to the map
        map.addControl(
            new MapboxGeocoder({
            accessToken: mapboxgl.accessToken,
            mapboxgl: mapboxgl
        })
        );

        var marker ;
        

        // source layer and default styling for a single point.
        map.on('load', function() {
            addMarker(user_location,'load');
            add_markers(saved_markers);

            // add a symbol that matches the result.
            geocoder.on('result', function(ev) {
                alert("Location Found");
                console.log(ev.result.center);

            });
        });
        map.on('click', function (e) {
            marker.remove();
            addMarker(e.lngLat,'click');
            //console.log(e.lngLat.lat);
            document.getElementById("lat").value = e.lngLat.lat;
            document.getElementById("lng").value = e.lngLat.lng;
            document.getElementById("lat1").value = e.lngLat.lat;
            document.getElementById("lng1").value = e.lngLat.lng;


        });

        function addMarker(ltlng,event) {

            if(event === 'click'){
                user_location = ltlng;
            }
            marker = new mapboxgl.Marker({draggable: true,color:"#d02922"})
                .setLngLat(user_location)
                .addTo(map)
                .on('dragend', onDragEnd);
            }

       
        // add markers to map
        function add_markers(coordinates) {

        var geojson = (saved_markers == coordinates ? saved_markers : '');

        console.log(geojson);
        // add markers to map
        geojson.forEach(function (marker) {
            console.log(marker);

            const el = document.createElement('div');
            el.className = 'marker';

        // make a marker add it to the map
        new mapboxgl.Marker(el)
            .setLngLat(marker)
            // .setPopup(popup) //popup
            .setPopup(
                        new mapboxgl.Popup({ offset: 25 }) // add popups
                        .setHTML(
                        `<h5>${marker}</h5><p>${marker}</p>`
                        )
                        )
            // .setHTML(`<h5>${marker}</h5><p>${marker}</p>` )
            
            // var popup = new mapboxgl.Popup({ offset: [0, -7] })
            // .setLngLat(feature.geometry.coordinates)
            // .setHTML('<h3>'+ feature.properties.title + '</h3><p>' + feature.properties.description + '</p>'  + feature.properties.title2
            // )
            .addTo(map);
        });

        const nav = new mapboxgl.NavigationControl();
        map.addControl(nav);
    }

    function onDragEnd() {
            var lngLat = marker.getLngLat();
            document.getElementById("lat").value = lngLat.lat;
            document.getElementById("lng").value = lngLat.lng;
            document.getElementById("lat1").value = lngLat.lat;
            document.getElementById("lng1").value = lngLat.lng;
            console.log('lng: ' + lngLat.lng + '<br />lat: ' + lngLat.lat + '<br />lng1: ' + lngLat.lat + '<br />lat1: ');
        }

        $('#signupForm').submit(function(event){
            event.preventDefault();
            var lat = $('#lat').val();
            var lng = $('#lng').val();
            var lat = $('#lat1').val();
            var lng = $('#lng1').val();
            var url = 'locations_model.php?add_location&lat=' + lat + '&lng=' + lng + '&lat1=' + lng + '&lng1=' + lng;
            $.ajax({
                url: url,
                method: 'GET',
                dataType: 'json',
                success: function(data){
                    alert(data);
                    location.reload();
                }
            });
        });

        document.getElementById('geocoder').appendChild(geocoder.onAdd(map));

</script> -->


<!-- <script>
    mapboxgl.accessToken = 'pk.eyJ1IjoiZmFraHJhd3kiLCJhIjoiY2pscWs4OTNrMmd5ZTNra21iZmRvdTFkOCJ9.15TZ2NtGk_AtUvLd27-8xA';
    const map = new mapboxgl.Map({
    container: 'map',
    style: 'mapbox://styles/mapbox/streets-v11',
    center: [124.00501251519512,11.0494449041867],
    zoom: 13
    });

    $(document).ready(function(){
    var autocomplete;
    var id = 'location';

    autocomplete = new mapboxgl.Map.AutoFill((document.getElementById(id)),{
    types: ['geocode'],
    })
    google.maps.event.addListener(autocomplete,'place_changed', function(){

    var place = autocomplete.getPlace();
    jQuery("#lat").val(place.geometry.location.lat());
    jQuery("#lng").val(place.geometry.location.lng());
})
});
</script> -->


    <script src="script.js"></script>
    <script src="scripts.js"></script>
</body>
</html>