<!-- Add New -->
<div class="modal fade" id="addnewstation" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Add Station Address</h4></center>
            </div>

            <div class="modal-body">
			<div class="container-fluid">
			<form action="user-map.php" id="signupForm">

			<!-- <div class="form-group ">
                    <label for="lat">Location:</label>
                    <input type="text" id="location" name="loc" class="form-control" placeholder="Enter location" required autocomplete="off">
                </div> -->
                <div class="form-group ">
                <label for="lat">Location:</label>
                <div class="geocoder input-group form-outline">
                    <div id="geocoder" ></div>
                </div>
            </div>

				<div class="form-group ">
                    <label for="lat">Latitude:</label>
                    <input type="text" id="lat" name="lat" class="form-control" placeholder="Enter Latitude" required autocomplete="off">
                </div>

                <div class="form-group ">
                    <label for="lng">Longitude:</label>
                    <input type="text" id="lng" name="lng" class="form-control" placeholder="Enter Longitude" required autocomplete="off">
                </div>
				
            </div> 
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>
			
            </div>
         </form>

        </div>
    </div>
</div>
<script type = "text/javascript">
   function numberonly(input)
   {
      var num = /[^0-9]/gi;
      input.value = input.value.replace(num, "");
   }


</script>

<!-- <script type="text/javascript">
    $(document).ready(function(){

        var autocomplete;
        var id = 'location'

        autocomplete = new mapboxgl.Map.Autocomplete((document.getElementByid(id)),{
            types:['geocode'],
        })

        map.on(autocomplete, 'place_changed', (e) => {
        console.log(e);
        var place = autocomplete.getPlace();
        jQuery("#lat").val(place.geometry.location.lat());
        jQuery("#lng").val(place.geometry.location.lat());
        })
    });
</script> -->