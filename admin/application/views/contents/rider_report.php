<div id="main-content">
    <div class="page-title">
        <h3><strong>Rider Report</strong></h3>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading bg-red">
                    <h3 class="panel-title"><strong> Rider </strong> Report </h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 table-responsive">
                            <table id="products-table" class="table table-tools table-hover">
                                <thead>
                                    <tr>
                                        <th><strong>Rider ID</strong></th>
                                        <th><strong>Distance Coverd</strong></th>
                                        <th><strong> Total Complete Order </strong></th>
                                        <th><strong>Ongoing ORders</strong></th>
                                        <th class="text-center"><strong>Status</strong></th>
                                        <th class="text-center"><strong>Actions</strong></th>
                                    </tr>
                                </thead>
                                <tbody>
                                     <?php if(isset($riderreportlist) and !empty($riderreportlist)) foreach ($riderreportlist as $riderreport) { 
                                        $this->db->select('*');
                                        $this->db->from('order');
                                        $this->db->where('vendor_id',$riderreport->vendor_id);
                                        $this->db->where('order_status_id',5);
                                        $ordercount = $this->db->get()->num_rows();
                                        ?>
                                        <tr>
                                            <?php 
                                                $this->db->select('*');
                                                $this->db->from('order');
                                                $this->db->where('order.vendor_id',$riderreport->vendor_id); 
                                                $this->db->join('vendor_rider', 'vendor_rider.vendor_id = order.vendor_id'); 
                                                $riderid = $this->db->get()->row();                                            
                                            ?>
                                            <td>  <?php if (!empty($riderid->rider_id)) echo $riderid->rider_id; ?> </td>
                                            <td>  <?php if (!empty($riderreport->distance)) echo $riderreport->distance; ?> (K.M.) </td>
                                            <td>  <?php if (!empty($ordercount)) echo $ordercount; ?> </td>
                                            <?php 
                                                $this->db->select('*');
                                                $this->db->from('order');
                                                $this->db->where('order.vendor_id',$riderreport->vendor_id);
                                                $this->db->where('vendor_id',$riderreport->vendor_id);
                                                $this->db->where('order_status_id',2);
                                                $orderstatus = $this->db->get()->num_rows();
                                            ?>
                                            <td>  <?php if (!empty($orderstatus)) echo $orderstatus; ?> </td>
                                            <td class="text-center"><span class="label label-success w-300"> Complete </span></td>
                                            <td class="text-center">
                                                <a href="" class="view btn btn-sm btn-default"><i class="fa fa-search"></i> View</a>
                                            </td>
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
