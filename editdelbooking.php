<!-- Edit -->
<div class="modal fade" id="editbooking_<?php echo $row['bookid']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Edit Booking</h4></center>
            </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form method="POST" action="editd.php">
				<input type="hidden" class="form-control" name="id" value="<?php echo $row['bookid']; ?>">
				
				<div class="form-group">
                <label id="lab">Passenger's Name:</label>
                <input type="text" class="form-control" name="passenger" value="<?php echo $row['passenger']; ?>" readonly>	
				</div>
                <div class="form-group">	
                <label id="lab">Contact Number:</label>
				<input type="text" class="form-control" name="number" value="<?php echo $row['number']; ?>" readonly>
				</div>
                <div class="form-group">
                <label id="lab">Location:</label>
                <input type="text" class="form-control" name="location" value="<?php echo $row['location']; ?>" readonly>	
				</div>
                <div class="form-group">	
                <label id="lab">Destination:</label>
				<input type="text" class="form-control" name="destination" value="<?php echo $row['destination']; ?>" readonly>
				</div>
                <div class="form-group">	
                <label id="lab">Date&Time:</label>
				<input type="text" class="form-control" name="datetime" value="<?php echo $row['datetime']; ?>" readonly>
				</div>
                <div class="form-group">
                <label id="lab">Status:</label>
                <input type="text" class="form-control" name="status" value="<?php echo $row['status']; ?>" readonly>	
				</div>
                
					
            </div> 
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <button type="submit" name="edit" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Confirm</a>
			</form>
            </div>

        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="deletebooking_<?php echo $row['bookid']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Delete Booking</h4></center>
            </div>
            <div class="modal-body">	
            	<p class="text-center">Are you sure you want to Delete</p>
			
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <a href="deld.php?id=<?php echo $row['bookid']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Yes</a>
            </div>

        </div>
    </div>
</div>