<div id="main-content">
    <div class="page-title"> <i class="icon-custom-left"></i>
        <h3><strong>Manage</strong> orders</h3>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading bg-red">
                    <h3 class="panel-title"><strong>Orders </strong> List</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 table-responsive table-red filter-right">
                            <table class="table table-striped table-hover table-dynamic">
                                <thead>
                                    <tr>
                                        <th>Vendor Name</th>
                                        <th>Time</th>
                                        <th>Total Orders</th>
                                        <th></th>
                                        <th>Type</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($manageorderdatalist as $orderdata) { 
                                        $this->db->select('*');
                                        $this->db->from('order');
                                        $this->db->where('pickup_time',$orderdata->pickup_time);
                                        $this->db->where('order_status_id',1);
                                        $this->db->where('group_status','ungroup');
                                        $this->db->where('vendor_id',$orderdata->vendor_id);
                                        $ordercount = $this->db->get()->num_rows();
                                        ?>
                                        <tr>
                                            <td> <?php if (!empty($orderdata->username)) echo $orderdata->username; ?> </td>
                                            <td> <?php if (!empty($orderdata->pickup_time)) echo $orderdata->pickup_time; ?> </td>
                                            <td> <?php if (!empty($ordercount)) echo $ordercount; ?> </td>
                                            <td class="text-center"><a href="<?php echo site_url('admin/group_orders'); ?>" class="btn ">Manage</a></td>
                                            <td> <?php if (!empty($orderdata->order_type)) echo $orderdata->order_type; ?> </td>
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
