<!-- Cancel -->
<div class="modal fade" id="cancel<?php echo $row['bookid']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <center><h4 class="modal-title" id="myModalLabel">Cancel Booking</h4></center>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">	
            	<p class="text-center">Are you sure you want to Cancel your booking?</p>
			
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default a" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Back</button>
                <a href="cancelbooking.php?bookid=<?php echo $row['bookid']; ?>" class="btn btn-danger b"><span class="glyphicon glyphicon-trash"></span> Yes</a>
            </div>

        </div>
    </div>
</div>