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
                                        <th><strong> PickUp Loc. </strong></th>
                                        <th><strong> Customer Name </strong></th>
                                        <th><strong> Customer Contact </strong></th>
                                        <th><strong> Drop OF Loc. </strong></th>
                                        <th><strong> PickUp Time </strong></th>
                                        <th><strong> Drop Of Time </strong></th>
                                        <th><strong> Proof OF Deliver </strong></th>
                                        <th><strong> Time Taken To Deliver </strong></th>
                                        <th><strong> Distance Travel (KM) </strong></th>
                                      <!--   <th class="text-center"><strong>Actions</strong></th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($completetaskorderlist as $completetaskorder) { 

                                        $this->db->select('*');
                                        $this->db->from('user_order');                                      
                                        $this->db->where('order_id',$completetaskorder->order_id);
                                        $groupid = $this->db->get()->row();

                                        ?>
                                        <tr>
                                            <td> <?php if (!empty($completetaskorder->order_id)) echo $completetaskorder->order_id; ?> </td>
                                            <td> <?php if (!empty($groupid->group_id)) echo $groupid->group_id; ?> </td>
                                            <td> <?php if (!empty($completetaskorder->order_name)) echo $completetaskorder->order_name; ?>  </td>
                                            <td> <?php if (!empty($completetaskorder->user_id)) echo $completetaskorder->user_id; ?> </td>
                                            <td> <?php if (!empty($completetaskorder->pickup_address_1)) echo $completetaskorder->pickup_address_1; ?> </td>
                                            <td> <?php if (!empty($completetaskorder->customer_name)) echo $completetaskorder->customer_name; ?> </td>
                                            <td> <?php if (!empty($completetaskorder->customer_contact)) echo $completetaskorder->customer_contact; ?> </td>
                                            <td> <?php if (!empty($completetaskorder->dropoff_address_line_1)) echo $completetaskorder->dropoff_address_line_1; ?> </td>
                                            <td> <?php if (!empty($completetaskorder->pickup_datetime)) echo $completetaskorder->pickup_datetime; ?> </td>
                                            <td> <?php if (!empty($completetaskorder->dropoff_datetime)) echo $completetaskorder->dropoff_datetime; ?> </td>
                                            <td> xxx </td>
                                            <td> xxx </td>
                                            <td> <?php if (!empty($completetaskorder->distance)) echo $completetaskorder->distance; ?> </td>
                                          <!--   <td class="text-center"><a href="#" class="view btn btn-sm btn-default"><i class="fa fa-search"></i> View</a></td> -->
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
