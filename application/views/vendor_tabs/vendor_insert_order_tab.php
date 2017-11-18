<section class="cs-favorite-jobs">
    <div class="scetion-title">
        <div class="col-md-6" style="padding: 0px;"><h3>Insert Order</h3></div>
        <div class="col-md-6 padding4">
            <form action="<?php echo base_url();?>index.php/home/importorders" id="importordersform" enctype="multipart/form-data" method="POST">
                <input type="file" name="file-1" id="file-1" class="inputfile inputfile-1" data-multiple-caption="{count} files selected" multiple onchange="importordersform.submit();" style="display: none;"/>
                <label for="file-1" style="float: right;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17" style="display: none;"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4  2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/>
                    </svg> 
                    <span class="btn btn-default">Order import&hellip;</span>
                </label>
            </form>
            <a href="#add_order" data-toggle="tab"  class="btn btn-primary" style="margin-right:2%;float:right;"> <i class="icon-plus" aria-hidden="true"></i> </a>
        </div>
    </div>
    <div class="col-md-12 table-responsive" style="padding:0px;">
        <table class="table">
            <thead>
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
            </thead>
            <tbody>
                <?php foreach ($data['orderdatalist'] as $orderdata) { ?>
                <tr>
                    <td class="editable-col" contenteditable="true"> <?php echo $orderdata->order_no; ?> </td>
                    <td class="editable-col" contenteditable="true"> <?php echo $orderdata->contact; ?> </td>
                    <td class="editable-col" contenteditable="true"> <?php echo $orderdata->order_type; ?> </td>
                    <td class="editable-col" contenteditable="true"> <?php echo $orderdata->pickup_address_1; ?> </td>
                    <td class="editable-col" contenteditable="true"> <?php echo $orderdata->pickup_address_2; ?> </td>
                    <td class="editable-col" contenteditable="true"> <?php echo $orderdata->pickup_zip; ?> </td>
                    <td class="editable-col" contenteditable="true"> <?php echo $orderdata->pickup_state; ?> </td>
                    <td class="editable-col" contenteditable="true"> <?php echo $orderdata->pickup_time; ?> </td>
                    <td class="editable-col" contenteditable="true"> <?php echo $orderdata->customer_name; ?> </td>
                    <td class="editable-col" contenteditable="true"> <?php echo $orderdata->customer_contact; ?> </td>
                    <td class="editable-col" contenteditable="true"> <?php echo $orderdata->dropoff_address_line_1; ?> </td>
                    <td class="editable-col" contenteditable="true"> <?php echo $orderdata->dropoff_address_line_2; ?> </td>
                    <td class="editable-col" contenteditable="true"> <?php echo $orderdata->dropoff_zip; ?> </td>
                    <td class="editable-col" contenteditable="true"> <?php echo $orderdata->dropoff_state; ?> </td>
                    <td class="editable-col" contenteditable="true"> <?php echo $orderdata->dropoff_time; ?> </td>
                    <td class="editable-col" contenteditable="true"> <?php echo $orderdata->detail; ?> </td>
                    <td class="editable-col" contenteditable="true"> <?php echo $orderdata->instruction; ?> </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <div class="row">
        <div class="col-md-12 col-lg-12 coll-sm-12 padding19">
            <button type="submit" class="btn btn-default" style="float:right;">Send order</button>
            <span style="float: right;margin: 5px;"></span>
            <button type="submit" class="btn btn-default" style="float:right;">Estimate Cost</button>
        </div>
    </div>
</section>
<script>
    jQuery(document).ready(function () {
        jQuery('[data-toggle="tooltip"]').tooltip();
    });
</script>