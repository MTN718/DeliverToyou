<style type="text/css">
  .panel-heading .accordion-toggle::after{
    font-family: 'Glyphicons Halflings';
    content: "\e114"!important;
    float: right;
    color: white;
}
</style>


<?php $vendor_id = $this->input->get('vendor_id');?>
<div id="main-content">
    <div class="page-title">
        <h3><strong>Filter</strong></h3>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
        <div class="panel-heading" style="background:#F7AE07">
            <h4>
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" style="color: #fff;font-weight: 600;">
                    Filter <i class="fa fa-arrow" ></i>
                </a>
            </h4>
        </div>
      
        <div id="collapseTwo" class="panel-collapse collapse in">
            <div class="panel-body">
                <div class="col-md-12" style="background:#fff;">
                    <form>
                        <div class="row">
                            <div class="col-md-4">
                                <input type="text" name="v_name" placeholder="Vendor Name" class="input-field form-control ">
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="order" placeholder="Order" class="input-field form-control ">
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="postcode" placeholder="Postcode" class="input-field form-control ">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <button class="btn filtr_btn" style="margin-top:2%; background-color:#F7AE07">Filter</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="page-title"> <i class="icon-custom-left"></i>
        <h3><strong>Vendor</strong> Overview</h3>
    </div>
    <div class="row">
        <div class="col-md-12">
        <form method="post" action="<?php echo site_url('admin/create_group'); ?>">
        <input type="hidden" name="vendor_id" value="<?php if (!empty($vendor_id)) echo $vendor_id; ?>">
            <div class="panel panel-default">
                <div class="panel-heading bg-red">
                    <h3 class="panel-title"><strong>Individual </strong> Orders</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 table-responsive table-red filter-right">
                            <table class="table table-striped table-hover table-dynamic">
                                <thead>
                                    <tr>
                                        <th>Vendor Name</th>
                                        <th>Vendor Contact</th>
                                        <th>Order No</th>
                                        <th>Contact</th>
                                        <th>Order Type</th>
                                        <th>Pickup Address Line 1</th>
                                        <th>Pickup Address Line 2</th>
                                        <th>Pickup Postcode</th>
                                        <th>Pickup State</th>
                                        <th>Pickup Time</th>
                                        <th>Customer Name</th>
                                        <th>Customer contact</th>
                                        <th>Drop off Address Line 1</th>
                                        <th>Drop off Address Line 2</th>
                                        <th>Drop off Postcode</th>
                                        <th>Drop off State</th>
                                        <th>Delivery Time</th>
                                        <th>Detail</th>
                                        <th>Instruction</th>
                                        <th>Select Order</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($vendororderlist as $vendororder) { ?>
                                        <tr>
                                            <td>  <?php if (!empty($vendororder->username)) echo $vendororder->username; ?> </td>
                                            <td>  <?php if (!empty($vendororder->mobile)) echo $vendororder->mobile; ?> </td>
                                            <td>  <?php if (!empty($vendororder->order_no)) echo $vendororder->order_no; ?> </td>
                                            <td>  <?php if (!empty($vendororder->contact)) echo $vendororder->contact; ?> </td>
                                            <td>  <?php if (!empty($vendororder->order_type_id)) echo $vendororder->order_type_id; ?> </td>
                                            <td>  <?php if (!empty($vendororder->pickup_address_1)) echo $vendororder->pickup_address_1; ?> </td>
                                            <td>  <?php if (!empty($vendororder->pickup_address_2)) echo $vendororder->pickup_address_2; ?> </td>
                                            <td>  <?php if (!empty($vendororder->pickup_zip)) echo $vendororder->pickup_zip; ?> </td>
                                            <td>  <?php if (!empty($vendororder->pickup_state)) echo $vendororder->pickup_state; ?> </td>
                                            <td>  <?php if (!empty($vendororder->pickup_time)) echo $vendororder->pickup_time; ?> </td>

                                            <td>   <?php if (!empty($vendororder->customer_name)) echo $vendororder->customer_name; ?> </td>
                                            <td>   <?php if (!empty($vendororder->customer_contact)) echo $vendororder->customer_contact; ?> </td>

                                            <td>  <?php if (!empty($vendororder->dropoff_address_line_1)) echo $vendororder->dropoff_address_line_1; ?> </td>
                                            <td>  <?php if (!empty($vendororder->dropoff_address_line_2)) echo $vendororder->dropoff_address_line_2; ?> </td>
                                            <td>  <?php if (!empty($vendororder->dropoff_zip)) echo $vendororder->dropoff_zip; ?> </td>
                                            <td>  <?php if (!empty($vendororder->dropoff_state)) echo $vendororder->dropoff_state; ?> </td>
                                            <td>  <?php if (!empty($vendororder->dropoff_time)) echo $vendororder->dropoff_time; ?> </td>
                                            <td>  <?php if (!empty($vendororder->detail)) echo $vendororder->detail; ?> </td>
                                            <td>  <?php if (!empty($vendororder->instruction)) echo $vendororder->instruction; ?> </td>
                                            <td><input name="group[]" type="checkbox" value="<?php if (!empty($vendororder->order_id)) echo $vendororder->order_id; ?>" />  </td>
                                        </tr> 
                                    <?php } ?>   
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                <div class="panel-footer text-centere">
                    <a href="<?php echo site_url('admin/group_orders'); ?>" class="btn "><i class="fa fa-reply"></i> Back</a>
                    <button class="btn pull-right" type="submit" ><i class="fa fa-users"></i> Group </button> 
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
