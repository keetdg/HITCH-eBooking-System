
var sampvar;

var saved_markers =  get_saved_locations();
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

