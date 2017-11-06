<div id="main-content">
    <div class="page-title">
        <h3><strong>Completed Tasks</strong></h3>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading bg-red">
                    <h3 class="panel-title"><strong>Tasks</strong></h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 table-responsive">
                            <table id="products-table" class="table table-tools table-hover">
                                <thead>
                                    <tr>
                                        <th><strong> Order ID </strong></th>
                                        <th><strong> Group ID </strong></th>
                                        <th><strong> Order Name </strong> </th>
                                        <th><strong> Rider ID </strong></th>
                                        <th><strong> Vendor Name </strong></th>
                                        <th><strong> PickUp Loc. </strong></th>
                                        <th><strong> Customer Name </strong></th>
                                        <th><strong> Customer Contact </strong></th>
                                        <th><strong> Drop OF Loc. </strong></th>
                                        <th><strong> PickUp Time </strong></th>
                                        <th><strong> Drop Of Time </strong></th>
                                        <th><strong> Proof OF Deliver </strong></th>
                                        <th><strong> Time Taken To Deliver </strong></th>
                                        <th><strong> Distance Travel (KM) </strong></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($completetaskorderlist as $completetaskorder) { ?>
                                        <tr>
                                            <td> <?php if (!empty($completetaskorder->order_id)) echo $completetaskorder->order_id; ?> </td>
                                            <td> <?php if (!empty($completetaskorder->group_order_id)) echo $completetaskorder->group_order_id; ?> </td>
                                            <td> <?php if (!empty($completetaskorder->order_name)) echo $completetaskorder->order_name; ?>  </td>
                                            <td> <?php if (!empty($completetaskorder->rider_id)) echo $completetaskorder->rider_id; ?> </td>
                                            <td> <?php if (!empty($completetaskorder->username)) echo $completetaskorder->username; ?> </td>
                                            <td> <?php if (!empty($completetaskorder->pickup_address_1)) echo $completetaskorder->pickup_address_1; ?> </td>
                                            <td> <?php if (!empty($completetaskorder->customer_name)) echo $completetaskorder->customer_name; ?> </td>
                                            <td> <?php if (!empty($completetaskorder->customer_contact)) echo $completetaskorder->customer_contact; ?> </td>
                                            <td> <?php if (!empty($completetaskorder->dropoff_address_line_1)) echo $completetaskorder->dropoff_address_line_1; ?> </td>
                                            <td> <?php if (!empty($completetaskorder->pickup_time)) echo $completetaskorder->pickup_time; ?> </td>
                                            <td> <?php if (!empty($completetaskorder->dropoff_time)) echo $completetaskorder->dropoff_time; ?> </td>
                                            <td> xxx </td>
                                            <td> xxx </td>
                                            <td> <?php if (!empty($completetaskorder->distance)) echo $completetaskorder->distance; ?> </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END MAIN CONTENT -->
</div>
<!-- END WRAPPER -->
