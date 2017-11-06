<div id="main-content">
    <div class="page-title"> <i class="icon-custom-left"></i>
        <h3><strong>Ongoing</strong> Tasks</h3>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading bg-red">
                    <h3 class="panel-title"><strong>Tasks</strong></h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 table-responsive table-red filter-right">
                            <table class="table table-striped table-hover table-dynamic">
                                <thead>
                                    <tr>
                                        <th>Group Id</th>
                                        <th>Rider Id</th>
                                        <th>Vendor Name</th>
                                        <th>Customer Name</th>
                                        <th>Customer Contact</th>
                                        <th>Drop Off Location</th>
                                        <th>Details</th>
                                        <th>Pick Up Time</th>
                                        <th>Instructions</th>
                                        <th>Quantity</th>
                                        <th>Status</th>
                                        <th>Reassign Task</th>
                                    </tr>
                                </thead>
                                <tbody>
                                     <?php foreach ($ongoingorderlist as $ongoingorder) { 
        
                                        $this->db->select('*');
                                        $this->db->from('group_order');                                      
                                        $this->db->where('group_order_id',$ongoingorder->group_order_id);
                                        $riderid = $this->db->get()->row(); 

                                        $this->db->select('*');
                                        $this->db->from('group_order_conn');                                      
                                        $this->db->where('group_order_id',$ongoingorder->group_order_id);
                                        $orderquantity = $this->db->get()->num_rows();



                                        ?>
                                        <tr>
                                           <!--  <td>  <a href="javascript:void(0);" class="open-ongoingtaskinfo" data-id="<?php echo $ongoingorder->order_id;?>" data-toggle="modal" data-target="#ongoing-task-info"> xxxx</a></td> -->
                                            <td><a href="<?php echo base_url(); ?>index.php/admin/edit_ongoing_task?group_order_id=<?php echo $ongoingorder->group_order_id ?>" class="btn" > <?php if (!empty($ongoingorder->group_order_id)) echo $ongoingorder->group_order_id; ?> </a></td>
                                            <td> <?php if (!empty($riderid->rider_id)) echo $riderid->rider_id; ?> </td>
                                            <td> <?php if (!empty($ongoingorder->username)) echo $ongoingorder->username; ?> </td>
                                            <td> <?php if (!empty($ongoingorder->customer_name)) echo $ongoingorder->customer_name; ?> </td>
                                            <td> <?php if (!empty($ongoingorder->customer_contact)) echo $ongoingorder->customer_contact; ?> </td>
                                            <td> <?php if (!empty($ongoingorder->dropoff_address_line_1)) echo $ongoingorder->dropoff_address_line_1; ?> </td>
                                            <td> <?php if (!empty($ongoingorder->detail)) echo $ongoingorder->detail; ?> </td>
                                              <td> <?php if (!empty($ongoingorder->pickup_time)) echo $ongoingorder->pickup_time; ?> </td>
                                            <td> <?php if (!empty($ongoingorder->instruction)) echo $ongoingorder->instruction; ?> </td>
                                            <td> <?php if (!empty($orderquantity)) echo $orderquantity; ?> </td>
                                            <td> XXX </td>
                                           <!--  <td><button class="btn btn-primary"><i class="fa fa-user" aria-hidden="true"></i></button></td> -->
                                           <td> <a href="javascript:void(0)" class="btn btn-primary open-reassigntorider" data-id="<?php echo $ongoingorder->group_order_id;?>" data-toggle="modal" data-target="#assign-to-rider"><i class="fa fa-user" aria-hidden="true"></i></a> </td>
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


    <div class="modal fade" id="reassigntorider" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #FCDD11;">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> &times; </button>
                    <h4 class="modal-title" id="exampleModalLabel"><strong> Reassign Task </strong> to rider</h4>
                </div>
                <form  method="post" action="<?php echo site_url();?>/admin/reassigngroupordertorider">
                    <div class="modal-body">
                        <input type="hidden" name="group_id" id="group_id" value=""/>
                        <div class="row">
                            <div class="col-md-12 m-b-20">
                                <select class="form-control" name="rider_id" data-style="input-sm btn-default">
                                    <?php foreach ($riderdatalist as $riderdata) { ?>
                                        <option value="<?php if (!empty($riderdata->user_id)) echo $riderdata->user_id; ?>"> <?php if (!empty($riderdata->username)) echo $riderdata->username; ?> </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Reassign Task</button>
                    </div>
                </form>      
            </div>
        </div>
    </div>


 <!--  <div class="modal fade" id="ongoingtaskinfo" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #F7AE07;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><strong>Order</strong> List</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" name="order_id" id="order_id" value=""/>

                <script language="javascript" >
                  var id = $('#order_id').val();
                </script>

                <?php
                   $order_id = 'id';
                 ?>

                <table class="table table-striped table-hover table-dynamic">
                    <thead>
                        <tr>
                            <th>Order Id</th>
                            <th>Order No.</th>
                            <th>Vendor Name</th>
                            <th>Vendor Contact</th>
                            <th>Customer Name</th>
                            <th>Drop Off Location</th>
                            <th>Details</th>
                            <th>Pick Up Time</th>
                            <th>Instructions</th>
                            <th>Cancel Order</th>
                            <th>Reassign Order</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php 
                        $this->db->select('*');
                        $this->db->from('order');
                        $this->db->where('order_status_id',2);
                        $this->db->where('order_id',$order_id);
                        $this->db->join('users', 'users.user_id = order.vendor_id');
                        $ongoingorderlistsindividual = $this->db->get()->result();
                    ?>
                        <?php foreach ($ongoingorderlistsindividual as $ongoingorderlists) { ?>
                            <tr>
                                <td> <?php if (!empty($ongoingorderlists->username)) echo $ongoingorderlists->username; ?> </td>
                                <td> <?php if (!empty($ongoingorderlists->username)) echo $ongoingorderlists->username; ?> </td>
                                <td> <?php if (!empty($ongoingorderlists->username)) echo $ongoingorderlists->username; ?> </td>
                                <td> <?php if (!empty($ongoingorderlists->username)) echo $ongoingorderlists->username; ?> </td>
                                <td> <?php if (!empty($ongoingorderlists->username)) echo $ongoingorderlists->username; ?> </td>
                                <td> <?php if (!empty($ongoingorderlists->username)) echo $ongoingorderlists->username; ?> </td>
                                <td> <?php if (!empty($ongoingorderlists->username)) echo $ongoingorderlists->username; ?> </td>
                                <td> <?php if (!empty($ongoingorderlists->username)) echo $ongoingorderlists->username; ?> </td>
                                <td> <?php if (!empty($ongoingorderlists->username)) echo $ongoingorderlists->username; ?> </td>
                                <td><button class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i></button></td>
                                <td><button class="btn btn-primary"><i class="fa fa-user" aria-hidden="true"></i></button></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>  -->