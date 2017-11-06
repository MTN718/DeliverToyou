<section class="cs-favorite-jobs">
    <div class="scetion-title">
        <div class="col-md-6 col-lg-6 coll-sm-6" style="padding: 0px;"><h3> Ongoing Order </h3></div>
        <div class="col-md-6 col-lg-6 coll-sm-6 padding4"></div>
    </div>
    <div class="col-md-12 table-responsive" style="padding:0px;">
        <table class="table">
            <thead>
                <th>Order id</th>
                <th>Group id</th>
                <th>Order no</th>
                <th>Rider id</th>
                <th>Customer name</th>
                <th>Drop Off location</th>
                <th>Detail</th>
                <th>Pickup</th>
                <th>ETA</th>
            </thead>
            <tbody>
                <?php foreach ($data['ongoingorderlist'] as $ongoingorder) { ?>
                <tr>
                    <td> <?php if (!empty($ongoingorder->order_id)) echo $ongoingorder->order_id; ?> </td>
                    <td> <?php if (!empty($ongoingorder->group_order_id)) echo $ongoingorder->group_order_id; ?> </td>
                    <td> <?php if (!empty($ongoingorder->order_no)) echo $ongoingorder->order_no; ?> </td>
                    <td> <?php if (!empty($ongoingorder->user_id)) echo $ongoingorder->user_id; ?> </td>
                    <td>  <?php if (!empty($ongoingorder->customer_name)) echo $ongoingorder->customer_name; ?> </td>
                    <td> <?php if (!empty($ongoingorder->dropoff_address_line_1)) echo $ongoingorder->dropoff_address_line_1; ?> </td>
                    <td> <?php if (!empty($ongoingorder->detail)) echo $ongoingorder->detail; ?> </td>
                    <td> <?php if (!empty($ongoingorder->pickup_address_1)) echo $ongoingorder->pickup_address_1; ?> </td>
                    <td> XXX </td>
                </tr>
                <?php } ?>    
            </tbody>
        </table>
    </div>
</section>
<script>
    jQuery(document).ready(function () {
        jQuery('[data-toggle="tooltip"]').tooltip();
    });
</script>