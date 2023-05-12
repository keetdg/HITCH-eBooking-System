<!-- Edit -->
<div class="modal fade" id="receipt<?php echo $row['bookid']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Booking Receipt</h4></center>
            </div>
            <div class="modal-body">
            <div class="container-fluid">
                <form method="post" action="">

                <div class="px-4 py-5">

                <h4 class="mt-5 theme-color mb-5 text-center">Thank your for riding HITCH!</h4>
                    <h5 class="text-uppercase"><?php echo $row['passenger']; ?></h5>
                    <h6 class="text-uppercase"><?php echo $row['number']; ?></h6>
                    <br>

                    <h5 class="text-uppercase"><?php echo $row['driver']; ?></h5>
                    <h6 class="text-uppercase"><?php echo $row['datetime']; ?></h6>
                    <hr>

                    <span class="theme-color">Payment Summary</span>
                    <div class="mb-3">
                    <hr class="new1">
                    </div>

                    <div class="d-flex justify-content-between">
                    <span class="font-weight-bold">PickUp Location</span>
                    <span class="text-muted"><?php echo $row['location']; ?></span>
                    </div>

                    <div class="d-flex justify-content-between">
                    <small>Destination</small>
                    <small><?php echo $row['destination']; ?></small>
                    </div>


                    <div class="d-flex justify-content-between">
                    <small>Fare/km</small>
                    <small>₱5.00</small>
                    </div>

                    <div class="d-flex justify-content-between">
                    <small>Total Travel Distance</small>
                    <small><?php echo $row['traveldistance']; ?> km</small>
                    </div>

                    <div class="d-flex justify-content-between mt-3">
                    <span class="font-weight-bold">Total Travel Tariff</span>
                    <span class="font-weight-bold theme-color">₱<?php echo $row['tariff']; ?>.00</span>
                    </div>  
                                    
                    </div>
                				
            </div> 
			</div>
             
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="uil uil-paypal"></span> Paid</button>
                <a type="button" name="pay" class="btn btn-success" data-toggle="modal" data-dismiss="modal" data-target="#payment"><span class="uil uil-google"></span> Pay thru Gcash</a> 
            </form>
            </div>
           
       </div>
    </div>
</div>

<div class="modal fade" id="payment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <!-- w-100 class so that header
                div covers 100% width of parent div -->
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">GCASH PAYMENT</h4></center>
                </div>
                <!--Modal body with image-->
                <div class="modal-body">
                <div class="container-fluid">
                <form method="post" action="">

                <div class="mb-3">
                    <label>Please scan the QR Code below for your payment.</label>
                    <img src="./img/qrcode.png" />
                </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
