<div class="form-group">
                                        <label>Renter Image</label><br>
                                        <img src="{{($renter->r_image)}}" alt="no image"  width="200px" height="150px" >
                                        
                                    </div>


                                    <div class="form-group">
                                        <label>Renter Name</label>
                                        <input type="text" class="form-control" name="r_name" value="{{$renter->r_name}}">
                                        <input type="hidden" class="form-control" name="r_id" value="{{$renter->r_id}}">
                                    </div>


                                    <div class="form-group">
                                        <label>Renter Phone Number</label>
                                        <input type="number" class="form-control" name="r_phone" value="{{$renter->r_phone}}">
                                        <input type="hidden" class="form-control" name="r_id" value="{{$renter->r_id}}">
                                    </div>



                                    <div class="form-group">
                                        <label>Renter Email</label>
                                        <input type="email" class="form-control" name="r_email" value="{{$renter->r_email}}">
                                    </div>



                                    <div class="form-group">
                                        <label>Renter Permanent Address</label>
                                        <input type="text" class="form-control" name="per_address" value="{{$renter->per_address}}">
                                        <input type="hidden" class="form-control" name="r_id" value="{{$renter->r_id}}">
                                    </div>


                                    <div class="form-group">
                                        <label>Renter NID Number</label>
                                        <input type="number" class="form-control" name="r_nid" value="{{$renter->r_nid}}">
                                       
                                    </div>

                                    <div class="form-group">
                                        <label>Update Image</label>
                                        <input type="file" class="form-control-file" name="r_image">
                                       
                                    </div>