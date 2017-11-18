<div id="main-content">
    <div class="page-title"> <i class="icon-custom-left"></i>
        <h3><strong>Task</strong> List</h3>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading bg-red">
                    <h3 class="panel-title"><strong>List </strong> </h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 table-responsive table-red filter-right">
                            <table id="products-table" class="table table-tools table-striped table-hover table-dynamic">
                                <thead>
                                    <tr>
                                        <th>Group Id</th>
                                        <th>Vendor Name</th>
                                        <th>Pick up Location</th>
                                        <th>Customer Name</th>
                                        <th>Drop Off Location</th>
                                        <th>Details</th>
                                        <th>Pick Up Time</th>
                                        <th>Instructions</th>
                                        <th>Quantity</th>
                                        <th>Nearest Rider</th>
                                        <th>Assign to Rider</th>
                                        <th>Ungroup</th>
                                        <th>Assign Backdated</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($taskorderlist as $taskorder) { 

                                        $this->db->select('*');
                                        $this->db->from('order');                                      
                                        $this->db->where('order_id',$taskorder->order_id);
                                        $this->db->join('users', 'users.user_id = order.vendor_id');
                                        $vendorid = $this->db->get()->row(); 

                                        $this->db->select('*');
                                        $this->db->from('group_order_conn');                                      
                                        $this->db->where('group_order_id',$taskorder->group_order_id);
                                        $orderquantity = $this->db->get()->num_rows();


                                        ?>
                                        <tr data-row-id="<?php echo $taskorder->group_order_id;?>"> 
                                            <td>  <a href="javascript:void(0);" class="task_list_popup" col-index='1' data="0" > <?php if (!empty($taskorder->group_order_id)) echo $taskorder->group_order_id; ?> </a></td> 
                                            <!-- <td><a href="javascript:void(0);" data-toggle="modal" data-target="#task-info"> <?php if (!empty($taskorder->group_order_id)) echo $taskorder->group_order_id; ?> </a></td> -->
                                           <!-- <td><a href="<?php echo base_url(); ?>index.php/admin/edit_task_list?group_order_id=<?php echo $taskorder->group_order_id ?>"> <?php if (!empty($taskorder->group_order_id)) echo $taskorder->group_order_id; ?> </a></td> -->
                                            <td> <?php if (!empty($vendorid->username)) echo $vendorid->username; ?> </td>
                                            <td> <?php if (!empty($taskorder->pickup_address_1)) echo $taskorder->pickup_address_1; ?> </td>
                                            <td> <?php if (!empty($taskorder->customer_name)) echo $taskorder->customer_name; ?> </td>
                                            <td> <?php if (!empty($taskorder->dropoff_address_line_1)) echo $taskorder->dropoff_address_line_1; ?> </td>
                                            <td> <?php if (!empty($taskorder->detail)) echo $taskorder->detail; ?> </td>
                                            <td> <?php if (!empty($taskorder->pickup_time)) echo $taskorder->pickup_time; ?> </td>
                                            <td> <?php if (!empty($taskorder->instruction)) echo $taskorder->instruction; ?> </td>
                                            <td> <?php if (!empty($orderquantity)) echo $orderquantity; ?> </td>
                                            <td> R1 </td>
                                            <td><a href="javascript:void(0)" class="btn btn-primary open-assigntorider" data-id="<?php echo $taskorder->group_order_id;?>" data-toggle="modal" data-target="#assign-to-rider"><i class="fa fa-user" aria-hidden="true"></i></a></td>
                                            <td><a href="<?php echo base_url(); ?>index.php/admin/ungroup?group_order_id=<?php echo $taskorder->group_order_id ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to Ungroup this Group?');"><i class="fa fa-times" aria-hidden="true"></i></a></td>
                                            <td><a href="javascript:void(0)" class="btn btn-primary open-assignbackdated" data-id="<?php echo $taskorder->group_order_id;?>" data-toggle="modal" data-target="#assign-backdated"><i class="fa fa-check" aria-hidden="true"></i></a></td>

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

  

    <div class="modal fade" id="assigntorider" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #FCDD11;">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> &times; </button>
                    <h4 class="modal-title" id="exampleModalLabel"><strong> Assign </strong> to Rider</h4>
                </div>
                <form  method="post" action="<?php echo site_url();?>/admin/assigngroupordertorider">
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
                        <button type="submit" class="btn btn-success">Assign</button>
                    </div>
                </form>      
            </div>
        </div>
    </div>

    <div class="modal fade" id="assignbackdated" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="exampleModalLabel"><strong> Assign Backdated </strong> to Rider </h4>
                </div>
                <form  method="post" action="<?php echo site_url();?>/admin/assignbackdateordertorider">
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
                        <div class="row">
                            <div class="col-md-12 m-b-20">
                                <input class="form-control input-sm" data-lang="en" id="backdatedrider" data-large-mode="true" data-min-year="1800" data-max-year="2020" type="text" name="date" placeholder="mm-dd-yyyy" style="width: 100%;">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Assign Backdated</button>
                    </div>
                </form>    
            </div>
        </div>
    </div>
</div>




<div class="modal fade" id="tasklistinfomodel" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #F7AE07;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><strong> Order </strong> List </h4>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-responsive table-striped table-hover table-dynamic">
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
                    <tbody id="taskorderdata">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div> 






<script type="text/javascript">
    $(document).ready(function(){      
        $(document).on('click','.task_list_popup', function() {
            data = {};
            data['val'] = $(this).attr('data');
            data['id'] = $(this).parent('td').parent('tr').attr('data-row-id');
            data['index'] = $(this).attr('col-index');
            
            $.ajax({   

                type: "POST",  
                url: "<?php echo base_url(); ?>/index.php/admin/edit_task_list",  
                cache:false,  
                data: data,
                success: function(data1)  
                {   

                    console.log(data1);

                    $('#taskorderdata').html(data1);
                    $('#tasklistinfomodel').modal('show');
                    
                }   
            
            });
        });
    });
</script> 