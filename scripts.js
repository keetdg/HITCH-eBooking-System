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

  map.on('click', (e) => {
    // console.log(e);
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

    let location = document.getElementById("loc");
    let dest =  document.getElementById("dest");
    let latval = document.getElementById("lat");
    let longval = document.getElementById("long");
    let latval1 = document.getElementById("lat1");
    let longval1 = document.getElementById("long1");

    p.then((data)=>{
      // console.log(data);


      if(location.value.length == 0)
      {
        location.value = data.display_name;
        latval.value = data.lat;
        longval.value = data.lon;
      }
      else
      {

        dest.value = data.display_name;
        latval1.value = data.lat;
        longval1.value = data.lon;


        var timesRun = 0;
        var interval = setInterval(function () 
        {
          timesRun += 1;
          if(timesRun === 5){
          clearInterval(interval);
        }
        let text = document.querySelector(".mapbox-directions-route-summary").getElementsByTagName("h1");         
        console.log(text[0].innerText);

        let measurement = text[0].innerText;
        let newmeasurement = measurement.replace(/mi|ft/gi, "");

        console.log(newmeasurement);
        document.getElementById("dist").value = newmeasurement;
        }, 1000);

        // console.log(text[0].innerText);
      }

      // marker = L.marker(e.lngLat).addTo(myMap);  
      //   displayName = data.display_name;
      // $('#Latitude').val(e.lngLat.lat);
      // $('#Longitude').val(e.lngLat.lng);
      //   locationLatLng = e.lngLat;
      //   mapLocationDisplayPopup.setLatLng(e.lngLat).setContent(displayName).openOn(myMap);
      sampvar = data;
    })
    .catch((err)=>{
        console.log(err);
    })
    ;
  });

  map.on('dragend', (e) => {
    console.log(e);

  });
}
