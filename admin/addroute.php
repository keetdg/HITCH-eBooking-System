<!-- Add New -->
<div class="modal fade" id="addnewroute" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <center><h4 class="modal-title" id="myModalLabel">Add Route</h4></center>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>

            <div class="modal-body">
			<div class="container-fluid">
			<form method="POST" action="addr.php">
			
				<div class="form-group ">
        <label id="lab">Route:</label>
        <input type="text" class="form-control" placeholder="Enter Route" name = "route1" required autocomplete="off">
     </div>
				
            </div> 
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <button type="submit" name="submit" id="sub" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Save</a>
			
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