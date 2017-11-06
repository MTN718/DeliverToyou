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
                                    </tr>
                                </thead>
                                <tbody>
                                     <?php if(isset($riderreportlist) and !empty($riderreportlist)) foreach ($riderreportlist as $riderreport) { ?>
                                        <tr>

                                            <td>  <?php if (!empty($riderreport->rider_id)) echo $riderreport->rider_id; ?> </td>
                                            <?php 
                                                $this->db->select_sum('distance');
                                                $this->db->from('group_order');
                                                $this->db->where('group_order.rider_id',$riderreport->rider_id);
                                                $this->db->join('group_order_conn', 'group_order_conn.group_order_id = group_order.group_order_id');
                                                $this->db->join('order', 'order.order_id = group_order_conn.order_id');
                                                $totaldistance = $this->db->get()->row()->distance;
                                            ?>
                                            <td>  <?php if (!empty($totaldistance)) echo $totaldistance; ?> </td>
                                            <?php 
                                                $this->db->select('*');
                                                $this->db->from('group_order');
                                                $this->db->where('group_order.rider_id',$riderreport->rider_id);
                                                $this->db->join('group_order_conn', 'group_order_conn.group_order_id = group_order.group_order_id');
                                                $this->db->join('order', 'order.order_id = group_order_conn.order_id');
                                                $this->db->where('order_status_id',4);
                                                $completeordercount = $this->db->get()->num_rows();
                                            ?>
                                            <td>  <?php if (!empty($completeordercount)) echo $completeordercount; ?> </td>
                                            <?php 
                                                $this->db->select('*');
                                                $this->db->from('group_order');
                                                $this->db->where('group_order.rider_id',$riderreport->rider_id);
                                                $this->db->join('group_order_conn', 'group_order_conn.group_order_id = group_order.group_order_id');
                                                $this->db->join('order', 'order.order_id = group_order_conn.order_id');
                                                $this->db->where('order_status_id',2);
                                                $orderstatus = $this->db->get()->num_rows();
                                            ?>
                                            <td>  <?php if (!empty($orderstatus)) echo $orderstatus; ?> </td>
                                       
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
