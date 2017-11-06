<section class="cs-favorite-jobs">
    <div class="scetion-title">
        <div class="col-md-6 col-lg-6 coll-sm-6" style="padding: 0px;"><h3>Completed Order</h3></div>
        <div class="col-md-6 col-lg-6 coll-sm-6 padding4">
            <!-- <button id="download_pdf" style="cursor:pointer;" class="btn btn-default pull-right" style="float:right;">Export As PDF</button> -->
        </div>
    </div>
    <div id="page_content" class="col-md-12 table-responsive" style="padding:0px;">
        <div>
            <table class="table" id="dataexample">
                <thead>
                    <th>Order id</th>
                    <th>Group id</th>
                    <th>Order no</th>
                    <th>Rider id</th>
                    <th>Customer name</th>
                    <th>Drop off location</th>
                    <th>Detail</th>
                    <th>Pickup Time</th>
                    <th>Drop off Time</th>
                    <th>Proof off Delivery</th>
                    <th>Drop off Delivery</th>
                    <th>Distance (K.M.)</th>
                </thead>
                <tbody>
                    <?php foreach ($data['completetaskorderlist'] as $completetaskorder) { ?>
                    <tr>
                        <td> <?php if (!empty($completetaskorder->order_id)) echo $completetaskorder->order_id; ?> </td>
                        <td> <?php if (!empty($completetaskorder->group_order_id)) echo $completetaskorder->group_order_id; ?> </td>
                        <td> <?php if (!empty($completetaskorder->order_no)) echo $completetaskorder->order_no; ?> </td>
                        <td> <?php if (!empty($completetaskorder->user_id)) echo $completetaskorder->user_id; ?> </td>
                        <td> <?php if (!empty($completetaskorder->customer_name)) echo $completetaskorder->customer_name; ?> </td>
                        <td> <?php if (!empty($completetaskorder->dropoff_address_line_1)) echo $completetaskorder->dropoff_address_line_1; ?> </td>
                        <td> <?php if (!empty($completetaskorder->detail)) echo $completetaskorder->detail; ?> </td>
                        <td> <?php if (!empty($completetaskorder->pickup_time)) echo $completetaskorder->pickup_time; ?> </td>
                        <td> <?php if (!empty($completetaskorder->dropoff_time)) echo $completetaskorder->dropoff_time; ?> </td>
                        <td>  </td>
                        <td>  </td>
                        <td> <?php if (!empty($completetaskorder->distance)) echo $completetaskorder->distance; ?> </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#download_pdf').click(function () {
                var pdf = new jsPDF('p', 'pt', 'letter')
                , source = $('#page_content')[0]
                , specialElementHandlers = {
                    '#bypassme': function(element, renderer)
                    {      
                        return true
                    }
                }
                margins = {
                    top: 20,
                    bottom: 20,
                    left: 10,
                    width: 1043,
                    size: 8
                };
                pdf.fromHTML(
                    source
                    , margins.left
                    , margins.top 
                    , {
                        'font-size': margins.size 
                        , 'width': margins.width 
                        , 'elementHandlers': specialElementHandlers
                    },
                    function (dispose) {
                        pdf.save('download_pdf.pdf');
                    },
                    margins
                    )
            });
        });
    </script>

    <div class="row">
        <div class="col-md-12 col-lg-12 coll-sm-12 padding19" style="margin-top: 10px;">
            <div class="col-md-3">
                <button type="submit" class="btn btn-default"><i class="icon-arrow-circle-left"></i> Preveous Date </button>
            </div>
            <div class="col-md-6 text-center text-margin">
                <span> Current Date </span>
            </div>
            <div class="col-md-3">
                <button type="submit" class="btn btn-default" style="float:right;">Next Date <i class="icon-arrow-circle-right"></i></button>
            </div>
        </div>
    </div>
</section>
<script>
    jQuery(document).ready(function () {
        jQuery('[data-toggle="tooltip"]').tooltip();
    });
</script>