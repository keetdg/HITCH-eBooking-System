<!-- Add Habal-Habal -->
  <div class="modal fade" id="addhabalhabal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="close-btn"><a href="driverpanel.php">&times;</a></div>
                    <center><h4 class="modal-title" id="myModalLabel">Habal-Habal Information</h4></center>
                </div>

                <div class="modal-body">
                <div class="container-fluid">                 
                <form method="POST" action="addh.php" class="row g-3" id="newCategoryForm" name="blahblahblah">


                <div class="form-group col-md-12">
                    <label id="lab">Driver:</label>
                    <input type="text" class="form-control" placeholder="Lastname, Firstname" name ="driver1" value="" required>
                </div>

                <div class="form-group col-md-12">
                    <label id="lab">Motor Brand:</label>
                    <input type="text" class="form-control" placeholder="Motor Brand" name ="motortype1" required autocomplete="off">
                </div>

                <div class="form-group col-md-12">
                    <label id="lab">Station Address:</label>
                    <input type="text" class="form-control" placeholder="Purok, Barangay, Municipality/City" name ="station1" required autocomplete="off">
                </div>

                <div class="form-group col-md-12">
                    <label id="lab">Route:</label>
                    <select name="routes" id="routes" class="form-control" aria-label="Default select example">
                        <option>Select Route</option>
                            <?php
                            $sql = "Select * from route";
                            $result = mysqli_query($conn,$sql);
                            if($result)       
                  {
                      while($row=mysqli_fetch_assoc($result))
                      {
                      $route3 = $row['route'];
                           
                      echo"<option>". $route3."</option>";
                      }
                      echo'</select>';
                  }

               ?>
                </div>

                <div class="form-group col-md-12">
                    <label id="lab">Fare:</label>
                    <input type="text" class="form-control" value="5" name ="fare1" readonly>
                </div>


                    
                </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="submit" class="btn btn-primary">Save</button>
                </div>
                </form>
            </div>
            </div>
        </div>

        <style>
            .close-btn {
                position:absolute;
                top:10px;
                right:10px;
                width:15px;
                height:15px;
                background:#888;
                color:rgb(255, 242, 242);
                text-align:center;
                line-height:15px;
                border-radius:15px;
                cursor:pointer;
            }
            .close-btn a{
                text-decoration: none;
                color:rgb(255, 242, 242);
            }
                        
        </style>