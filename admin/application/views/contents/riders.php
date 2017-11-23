<style type="text/css">
    .rider-inactive-status {
        background-color: #D8534F;
        border-color: #D8534F;
        font-size: 12px;
    }
    .rider-status {
        background-color: #049600;
        border-color: #049600;
        font-size: 12px;
    }
    .rider-status-icon {
        border: 1px solid;
        color: #fff;
        text-align: center;
        padding-top: 4px;
        padding-bottom: 4px;
        padding-left: 10px;
        padding-right: 10px;
    }
</style>

<!-- BEGIN MAIN CONTENT -->
<div id="main-content">
    <?php if ($this->session->flashdata('success_msg') != "") { ?>
        <div class="alert alert-success alert-dismissable" style="width: 100%;background-color: #F7AE07;color: #000;">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Successfully</strong> <?php echo $this->session->flashdata('success_msg'); ?>
        </div>
    <?php } ?>
    <?php if ($this->session->flashdata('error_msg') != "") { ?>
        <div class="alert alert-warning alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Warning!</strong> <?php echo $this->session->flashdata('error_msg'); ?>
        </div>
    <?php } ?>

    <div id="div1" class="alert alert-success alert-dismissable" style="display: none;width: 100%;background-color: #F7AE07;color: #000;">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Successfully</strong> Rider Delete Successfully
    </div>

     <div id="div2" class="alert alert-warning alert-dismissable" style="display: none; width: 100%;">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Warning</strong> Rider Is On Task 
    </div>


    <div class="m-b-20 clearfix">
        <div class="page-title pull-left">
            <h3 class="pull-left"><strong>Riders</strong></h3>
        </div>
        <div class="pull-right">
            <a href="<?php echo site_url('admin/edit_riders'); ?>" class="btn btn-success m-t-10"><i class="fa fa-plus p-r-10"></i> Add Riders</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading bg-red">
                    <h3 class="panel-title"><strong>List</strong></h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 table-responsive">
                            <table id="products-table" class="table table-tools table-hover">
                                <thead>
                                    <tr>
                                        <th><strong> Username </strong> </th>
                                        <th><strong> Rider Id </strong> </th>
                                        <th><strong> Full Name </strong> </th>
                                        <th><strong> Id Proof </strong> </th>
                                        <th><strong> Email </strong> </th>
                                        <th><strong> License Details </strong> </th>
                                        <th><strong> Address </strong> </th>
                                        <th><strong> Emergy Contact Number </strong></th>
                                        <th><strong> Status </strong></th>
                                        <th class="text-center"><strong> Actions </strong> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($allriderdatalist as $riderdata) { ?>
                                        <tr data-row-id="<?php echo $riderdata->user_id;?>"  id="riderAction<?php echo $riderdata->user_id;?>">
                                            <td> <?php if (!empty($riderdata->username)) echo $riderdata->username; ?> </td>
                                            <td> <?php if (!empty($riderdata->user_id)) echo $riderdata->user_id; ?> </td>
                                            <td> <?php if (!empty($riderdata->name)) echo $riderdata->name; ?> </td>
                                            <td> <?php if (!empty($riderdata->id_proof)) echo $riderdata->id_proof; ?> </td>
                                            <td> <?php if (!empty($riderdata->email)) echo $riderdata->email; ?> </td>
                                            <td> <?php if (!empty($riderdata->license_no)) echo $riderdata->license_no; ?> </td>
                                            <td> <?php if (!empty($riderdata->address)) echo $riderdata->address; ?> </td>
                                            <td> <?php if (!empty($riderdata->emergency_contact_no)) echo $riderdata->emergency_contact_no; ?> </td>
                                            <td> 
                                            <?php if ($riderdata->status == 'ontask') { ?>
                                               <span class="rider-inactive-status rider-status-icon"> OnTask </span> 
                                            <?php } else { ?>
                                                <span class="rider-status rider-status-icon"> Avaliable </span> 
                                            <?php } ?>   
                                            </td>
                                            <td class="text-center">
                                                <a href="<?php echo base_url(); ?>index.php/admin/edit_riders?rider_id=<?php echo $riderdata->user_id ?>" class="edit btn btn-sm btn-default"><i class="fa fa-pencil"></i> Edit</a>
                                                <a href="javascript:void(0)" class="btn btn-sm btn-default editable-action" col-index='1' data="0"><i class="fa fa-times-circle"></i> Remove</a>
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



