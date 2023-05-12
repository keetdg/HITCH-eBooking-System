<?php
require("dbconnect.php");

include 'locations_model.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Map Station Address</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet"/>
    <script src="https://api.tiles.mapbox.com/mapbox-gl-js/v2.9.2/mapbox-gl.js"></script>
    <link href="https://api.tiles.mapbox.com/mapbox-gl-js/v2.9.2/mapbox-gl.css" rel="stylesheet"/>
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.11.0/mapbox-gl.css" rel="stylesheet">
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.11.0/mapbox-gl.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
   <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="datatable/dataTable.bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<style>
    /* Googlefont Poppins CDN Link */
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
    *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
    }
   
    .map {
    background: white;
    }

    #map {
      height: 100vh;
      width: 100vw;
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
        left: 100px;
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


</style>
</head>

<body>

    <div class="map">
        <div id="map"></div>


    </div>

    <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v0.48.0/mapbox-gl.js'></script>
    <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v0.48.0/mapbox-gl.css' rel='stylesheet' />
    <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.min.js"></script>
    <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.css" type="text/css">
    <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v0.48.0/mapbox-gl.js'></script>
    <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v0.48.0/mapbox-gl.css' rel='stylesheet' />

<script>
        var sampvar;

        var saved_markers = <?= get_saved_locations() ?>;
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

         
        
                // .setText(
                // 'Construction on the Washington Monument began in 1848.'
                // );
        
       
        // add markers to map
        function add_markers(coordinates) {

        var geojson = (saved_markers == coordinates ? saved_markers : '');

        console.log(geojson);
        // add markers to map
        geojson.forEach(function (marker) {
            console.log(marker);

            const el = document.createElement('div');
            el.className = 'marker';

            // map.on('click', function(e){
            //     var features = map.queryRenderedFeatures(e.point, {
            //         layers: ['test']
            //     });
            //     if (!features.length){
            //         return;
            //     }
            //     var features = features[0];

          
            // var popup = new mapboxgl.Popup({ offset: 20 })
            //     .setLngLat(feature.geometry.coordinates)
            //     .setHTML('<h3>'+ feature.properties.title + '</h3><p>' + feature.properties.description + '</p>'  + feature.properties.title2
            //     )
            //     .addTo(map);
            // });

                // map.on('click', (e) => {
                //     console.log(e);
                //     // sampvar = e;
                //     var p = new Promise(function(resolve, reject){
                //     $.ajax({
                //         url: "https://nominatim.openstreetmap.org/reverse?format=json&lat="+ e.lngLat.lat +"&lon=" + e.lngLat.lng,
                //         success: function (data) {
                //             resolve(data)
                //         },
                //         error: function (data) {
                //             reject(data)
                //         }
                //     });
                //     });

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