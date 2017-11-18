<div id="main-content">
    <div class="page-title"> <i class="icon-custom-left"></i>
        <h3><strong> Edit Task</strong> List</h3>
    </div>

    <?php $group_order_id = $this->input->get('group_order_id');?>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading bg-red">
                    <h3 class="panel-title"><strong>List </strong> </h3>
                    <a href="<?php echo site_url('admin/task_list'); ?>" class="btn btn-default m-r-10" style="float: right;margin-top: -7px;"><i class="fa fa-reply"></i></a>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 table-responsive table-red filter-right">
                            <table id="products-table" class="table table-tools table-striped table-hover table-dynamic">
                                <thead>
                                    <tr>
                                        <th>Order Id</th>
                                        <th>Order No</th>
                                        <th>Vendor Name</th>
                                        <th>Vendor Contact</th>
                                        <th>Customer Name</th>
                                        <th>Customer Contact</th>
                                        <th>Drop Off Location</th>
                                        <th>Details</th>
                                        <th>Pick Up Time</th>
                                        <th>Instructions</th>
                                        <th>Cancel Order</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($taskorderlistsindividual as $taskorderlists) { 

                                        // $this->db->select('*');
                                        // $this->db->from('order');                                      
                                        // $this->db->where('order_id',$taskorderlists->order_id);
                                        // $this->db->join('users', 'users.user_id = order.vendor_id');
                                        // $vendorid = $this->db->get()->row();
                                        ?>  

                                        <?php if ($taskorderlists->order_status_id == 3) {  ?>
                                            <tr style="background-color: #993333;">
                                        <?php } else { ?> 
                                            <tr>
                                        <?php } ?>

                                            <td> <?php if (!empty($taskorderlists->order_id)) echo $taskorderlists->order_id; ?> </td>
                                            <td> <?php if (!empty($taskorderlists->order_no)) echo $taskorderlists->order_no; ?> </td>
                                            <td> <?php if (!empty($taskorderlists->username)) echo $taskorderlists->username; ?> </td>
                                            <td> <?php if (!empty($taskorderlists->mobile)) echo $taskorderlists->mobile; ?> </td>
                                            <td> <?php if (!empty($taskorderlists->customer_name)) echo $taskorderlists->customer_name; ?> </td>
                                            <td> <?php if (!empty($taskorderlists->customer_contact)) echo $taskorderlists->customer_contact; ?> </td>
                                            <td> <?php if (!empty($taskorderlists->dropoff_address_line_1)) echo $taskorderlists->dropoff_address_line_1; ?> </td>
                                            <td> <?php if (!empty($taskorderlists->detail)) echo $taskorderlists->detail; ?> </td>
                                            <td> <?php if (!empty($taskorderlists->pickup_time)) echo $taskorderlists->pickup_time; ?> </td>
                                            <td> <?php if (!empty($taskorderlists->instruction)) echo $taskorderlists->instruction; ?> </td>
                                            <?php if ($taskorderlists->order_status_id == 3) {  ?>
                                                <td><a href="#" class="btn btn-danger disabled">
                                                    <i class="fa fa-times" aria-hidden="true"></i></a>
                                                </td>
                                            <?php } else { ?>     
                                                <td>
                                                    <a href="<?php echo base_url(); ?>index.php/admin/canceltaskorder?order_id=<?php echo $taskorderlists->order_id ?>&group_order_id=<?php echo $group_order_id ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to Cancel this Order?');">
                                                    <i class="fa fa-times" aria-hidden="true"></i></a>
                                                </td>
                                            <?php } ?>
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