<div id="main-content">
  <div class="page-title"> <i class="icon-custom-left"></i>
    <h3><strong>Group</strong> orders</h3>
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
                                        <th>Quantity</th>
                                    </tr>
                                </thead>
                                <tbody>
                                     <?php foreach ($orderdatalist as $orderdata) { 

                                        $this->db->select('*');
                                        $this->db->from('order');
                                        $this->db->where('order_status_id',1);
                                        $this->db->where('group_status','ungroup');
                                        $this->db->where('vendor_id',$orderdata->vendor_id);
                                        $orderquantity = $this->db->get()->num_rows();
                                        ?>
                                        <tr>
                                            <td><a href="<?php echo base_url(); ?>index.php/admin/vendor_overview?vendor_id=<?php echo $orderdata->vendor_id ?>"> <?php if (!empty($orderdata->username)) echo $orderdata->username; ?> </a></td>
                                            <td> <?php if (!empty($orderquantity)) echo $orderquantity; ?> </td>
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
