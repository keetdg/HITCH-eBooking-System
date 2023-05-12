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

      
      // console.log(data.display_name);
      // document.getElementById("location").value = data.display_name;
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
    console.log("3");

  });
}
