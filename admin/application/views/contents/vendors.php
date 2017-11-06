  <!-- BEGIN MAIN CONTENT -->
        <div id="main-content">
            <div class="m-b-20 clearfix">
                <div class="page-title pull-left">
                    <h3 class="pull-left"><strong>Vendors</strong></h3>
                </div>
                 <div class="pull-right">
                    <a href="<?php echo site_url('admin/edit_vendor'); ?>" class="btn btn-success m-t-10"><i class="fa fa-plus p-r-10"></i> Add Vendor</a>
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
                                                <th><strong>Business Name</strong>
                                                </th>
                                                <th><strong>Email</strong>
                                                </th>
                                                <th><strong>Phone Number</strong>
                                                </th>
                                                <th><strong>Nature OF Business</strong>
                                                </th>
                                                <th><strong>Business Address </strong>
                                                </th>
                                                <th class="text-center"><strong>Actions</strong>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($vendordatalist as $vendordata) { ?>
                                                <tr data-row-id="<?php echo $vendordata->user_id;?>"  id="vendorAction<?php echo $vendordata->user_id;?>">
                                                    <td> <?php if (!empty($vendordata->username)) echo $vendordata->username; ?> </td>
                                                    <td> <?php if (!empty($vendordata->email)) echo $vendordata->email; ?> </td>
                                                    <td> <?php if (!empty($vendordata->mobile)) echo $vendordata->mobile; ?> </td>
                                                    <td> <?php if (!empty($vendordata->business_nature)) echo $vendordata->business_nature; ?> </td>
                                                    <td> <?php if (!empty($vendordata->address)) echo $vendordata->address; ?> </td>
                                                    <td class="text-center">
                                                        <a href="<?php echo base_url(); ?>index.php/admin/edit_vendor?vendor_id=<?php echo $vendordata->user_id ?>" class="edit btn btn-sm btn-default"><i class="fa fa-pencil"></i> Edit</a>
                                                        <a href="javascript:void(0)" class="btn btn-sm btn-default editable-col" col-index='1' data="0"><i class="fa fa-times-circle"></i> Remove</a>
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
        <!-- END MAIN CONTENT -->
    </div>
