<?php
require("dbconnect.php");

include 'locations_model.php';
include('station.php');
?>

<!DOCTYPE html>
<html>
<head>
    <title>Station Address</title>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="datatable/dataTable.bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://api.tiles.mapbox.com/mapbox-gl-js/v2.9.2/mapbox-gl.js"></script>
    <link href="https://api.tiles.mapbox.com/mapbox-gl-js/v2.9.2/mapbox-gl.css" rel="stylesheet"/>
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.11.0/mapbox-gl.css" rel="stylesheet">
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.11.0/mapbox-gl.js"></script>
    <link rel="stylesheet" href="map.css">
    
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
   <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="datatable/dataTable.bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

        <style>
            body {
            margin: 0;
            padding: 0;
            }
            #map {
            position: absolute;
            top: 0;
            bottom: 0;
            width: 100%;
            height: 100%;
            }
            .marker {
            background-image: url('./img/icon1.png');
            background-size: cover;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            cursor: pointer;
            }
            .mapboxgl-popup {
            max-width: 200px;
            }
            .mapboxgl-popup-content {
            text-align: center;
            font-family: 'Open Sans', sans-serif;
            }
            .geocoder{
                position: absolute;
                top: 10px;
                right: 10px;
            }
            .dropdown button{
                margin-top: 10px;
                margin-left: 10px;
                color: black;
                height: 45px;
                width: 30px;
                font-size: 30px;
                background: none;
                border: none;
            }
            li i{
                font-size: 18px;
                color: #9754CB;
            }
            .dropdown ul li a:hover{
                background: #E5E4E2;
            }
            /* .marker {
            background-image: url('./img/icon1.png');
            background-size: cover;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            cursor: pointer;
            }
            .mapboxgl-popup {
            max-width: 200px;
            }
            .mapboxgl-popup-content {
            text-align: center;
            font-family: 'Open Sans', sans-serif;
            } */
        </style>
<body>

    <!-- <h3>Habal-Habal Station Address</h3> -->

    <!-- <div class="container">
        <form action="" id="signupForm">
            <label for="lat">lat</label>
            <input type="text" id="lat" name="lat" placeholder="Your lat..">

            <label for="lng">lng</label>
            <input type="text" id="lng" name="lng" placeholder="Your lng..">

            <input type="submit" value="Submit" >
        </form>
    </div> -->
   
    <div id="map"></div>

    <div class="dropdown">
        <button class="dropdown-toggle" type="button" data-toggle="dropdown"><i class="uil uil-ellipsis-v"></i></button>
        <ul class="dropdown-menu">
            <li><a href="#addnewstation" data-toggle="modal"><i class="uil uil-plus-circle"></i> Add New Station</a></li>
            <li><a href="driverpanel.php"><i class="uil uil-step-backward-circle"></i> Back</a></li>
        </ul>
        </div>

            
        </div>
    </nav>

    <div class="geocoder">
        <div id="geocoder" ></div>
    </div>


    <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v0.48.0/mapbox-gl.js'></script>
    <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v0.48.0/mapbox-gl.css' rel='stylesheet' />
    <script src='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v2.3.0/mapbox-gl-geocoder.min.js'></script>
    <link rel='stylesheet' href='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v2.3.0/mapbox-gl-geocoder.css' type='text/css' />


    
    <script>

        var saved_markers = <?= get_saved_locations() ?>;
        // var user_location = [77.216721,28.644800];
        var user_location = [124.00501251519512,11.0494449041867];
        mapboxgl.accessToken = 'pk.eyJ1IjoiZmFraHJhd3kiLCJhIjoiY2pscWs4OTNrMmd5ZTNra21iZmRvdTFkOCJ9.15TZ2NtGk_AtUvLd27-8xA';
        var map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/streets-v11',
            center: user_location,
            zoom: 10
        });

       
        //  geocoder 
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
            // Draw an arrow next to the location dot to indicate which direction the device is heading.
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
        

        // After the map style has loaded on the page, add a source layer and default
        // styling for a single point.
        map.on('load', function() {
            addMarker(user_location,'load');
            add_markers(saved_markers);

            // Listen for the `result` event from the MapboxGeocoder that is triggered when a user
            // makes a selection and add a symbol that matches the result.
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

        });

        function addMarker(ltlng,event) {

            if(event === 'click'){
                user_location = ltlng;
            }
            marker = new mapboxgl.Marker({draggable: true})
                .setLngLat(user_location)
                .addTo(map)
                .on('dragend', onDragEnd);
        }
        function add_markers(coordinates) {

            var geojson = (saved_markers == coordinates ? saved_markers : '');

            const el = document.createElement('div');
                el.className = 'marker';

            console.log(geojson);
            // add markers to map
            geojson.forEach(function (marker) {
                console.log(marker);
                // make a marker for each feature and add to the map
                new mapboxgl.Marker(el)
                    .setLngLat(marker)
                    .setPopup(
                        new mapboxgl.Popup({ offset: 25 }) // add popups
                        .setHTML(
                        `<h5>${marker}</h5><p>${marker}</p>`
                        )
                        )
                    .addTo(map);
            });
            const nav = new mapboxgl.NavigationControl();
                map.addControl(nav);
        }

        function onDragEnd() {
            var lngLat = marker.getLngLat();
            document.getElementById("lat").value = lngLat.lat;
            document.getElementById("lng").value = lngLat.lng;
            console.log('lng: ' + lngLat.lng + '<br />lat: ' + lngLat.lat);
        }

        $('#signupForm').submit(function(event){
            event.preventDefault();
            var lat = $('#lat').val();
            var lng = $('#lng').val();
            var url = 'locations_model.php?add_location&lat=' + lat + '&lng=' + lng;
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

    </script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="jquery/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="datatable/jquery.dataTables.min.js"></script>
<script src="datatable/dataTable.bootstrap.min.js"></script>

</body>
</html>