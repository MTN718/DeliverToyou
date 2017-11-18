<!-- Modal for creating customer starts -->
<div class="modal fade" id="addorderDialog" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">                        
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="exampleModalLabel"> Add Order </h4>
            </div>                        
            <form  method="post" action="<?php echo site_url();?>/home/addorder"> 
                <input type="hidden" name="vendorid" value="<?php if (!empty($data['vendordatainfo'])) echo $data['vendordatainfo']->user_id; ?>"/>
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-sm-6 col-md-6">
                            <div class="col-md-12">
                                <input type="text" class="form-control" placeholder="Order No" name="orderno" required="required"/>
                            </div>
                        </div>
                        <div class="form-group col-sm-6 col-md-6">
                            <div class="col-md-12">
                                <input type="text" class="form-control" placeholder="Order Name" name="ordername" required="required"/>
                            </div>
                        </div>
                        <div class="form-group col-sm-6 col-md-6">
                            <div class="col-md-12">
                                <input type="text" class="form-control" placeholder="Customer Name" name="customername" required="required"/>
                            </div>
                        </div> 
                        <div class="form-group col-sm-6 col-md-6">
                            <div class="col-md-12">
                                <input type="text" class="form-control" placeholder="Customer Contact" name="customercontact" required="required"/>
                            </div>
                        </div> 
                        <div class="form-group col-sm-6 col-md-6">
                            <div class="col-md-12">
                                <input type="text" class="form-control" placeholder="Detail" name="details" required="required">
                            </div>
                        </div>
                        <div class="form-group col-sm-6 col-md-6">
                            <div class="col-md-12">
                                <input type="text" class="form-control" placeholder="Instruction" name="instruction" required="required">
                            </div>
                        </div>
                        <div class="form-group col-sm-6 col-md-6">
                            <div class="col-md-12">
                                <input type="text" class="form-control" placeholder="Contact" name="contact" required="required">
                            </div>
                        </div> 
                        <div class="form-group col-sm-6 col-md-6">
                            <div class="col-md-12">
                                <input type="text" class="form-control" placeholder="Amount" name="amount" required="required">
                            </div>
                        </div> 
                    <br>
                        <div id="locationField" class="form-group col-sm-6 col-md-6">
                            <div class="col-md-12">
                                <input type="text"  id="autocomplete" onFocus="geolocate()" class="form-control" placeholder="Pickup Address Line 1" name="pickupaddline1" required="required">
                            </div>
                        </div>
                        <div class="form-group col-sm-6 col-md-6">
                            <div class="col-md-12">
                                <input type="text" class="form-control" placeholder="Pickup Address Line 2" name="pickupaddline2" required="required">
                            </div>
                        </div>
                        <div class="form-group col-sm-6 col-md-6">
                            <div class="col-md-12">
                                <input type="text" class="form-control" placeholder="Pickup City" name="pickupcity" required="required">
                            </div>
                        </div>
                        <div class="form-group col-sm-6 col-md-6">
                            <div class="col-md-12">
                                <input type="text" class="form-control" placeholder="Pickup Postcode" name="pickuppostcode" required="required">
                            </div>
                        </div>
                        <div class="form-group col-sm-6 col-md-6">
                            <div class="col-md-12">
                                <input type="text" class="form-control" placeholder="Pickup State" name="pickupstate" required="required">
                            </div>
                        </div>
                        <div class="form-group col-sm-6 col-md-6">
                            <div class="col-md-12">
                                <input type="text" style="border: 1px solid rgb(228, 228, 228);" placeholder="Pickup Time" class="form-control" name="pickuptime" required="required">
                            </div>
                        </div>
                        <div class="form-group col-sm-6 col-md-6">
                            <div class="col-md-12">
                                <input type="text" id="pickup" data-min-year="1800" data-max-year="2020" data-formate="Y-m-d"  data-lang="en" data-large-mode="true" placeholder="Pickup Date" class="form-control" name="pickupdate" required="required">
                            </div>
                        </div>
                        <div class="form-group col-sm-6 col-md-6">
                            <div class="col-md-12">
                                <input type="text" class="form-control" placeholder="Drop off Address Line 1" name="dropofaddline1" required="required">
                            </div>
                        </div>
                        <div class="form-group col-sm-6 col-md-6">
                            <div class="col-md-12">
                                <input type="text" class="form-control" placeholder="Drop off Address Line 2" name="dropofaddline2" required="required">
                            </div>
                        </div>
                        <div class="form-group col-sm-6 col-md-6">
                            <div class="col-md-12">
                                <input type="text" class="form-control" placeholder="Drop City" name="dropcity" required="required">
                            </div>
                        </div>
                        <div class="form-group col-sm-6 col-md-6">
                            <div class="col-md-12">
                                <input type="text" class="form-control" placeholder="Drop off Postcode" name="dropofpostcode" required="required">
                            </div>
                        </div>
                        <div class="form-group col-sm-6 col-md-6">
                            <div class="col-md-12">
                                <input type="text" class="form-control" placeholder="Drop off State" name="dropofstate" required="required">
                            </div>
                        </div>
                        <div class="form-group col-sm-6 col-md-6">
                            <div class="col-md-12">
                                <input type="text" class="form-control" placeholder="Drop off Time" name="dropoftime" required="required">
                            </div>
                        </div>
                        <div class="form-group col-sm-6 col-md-6">
                         <div class="col-md-12">
                            <input type="text" id="dropoff" data-min-year="1800" data-max-year="2020" data-formate="Y-m-d"  data-lang="en" data-large-mode="true" class="form-control" placeholder="Drop off Date" name="dropofdate" required="required">
                        </div>
                    </div>
                    <div class="form-group col-sm-6 col-md-6">
                     <div class="col-md-12">
                        <select class="form-control" name="ordertype" required="required">

                            <option value=""> Select Order Type </option>
                            <option value="Current"> Current </option>
                            <option value="Backdated"> Backdated </option>

                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" onclick='' class="btn btn-primary">Add</button>
        </div>

    </form>
</div>
</div>
</div>
<!-- create customer modal ends -->

