<div id="main-content">

<?php if ($this->session->flashdata('error_msg') != "") { ?>
    <div class="alert alert-warning alert-dismissable" style="width: 100%;background-color: #F7AE07;border-color: #F7AE07;color: #000;">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Warning!</strong> <?php echo $this->session->flashdata('error_msg'); ?>
    </div>
<?php } ?>


    <div class="page-title">
        <h3><strong>Get Report</strong></h3>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading bg-red">
                    <h3 class="panel-title"><strong>Report </strong>(Note* Select either period or date duration)</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                <div class="tabcordion">
                    <ul id="myTab" class="nav nav-tabs nav-dark"  style="border:none;">
                        <li class="<?php if($profile_tab == "report") echo "active"; ?> " ><a href="#products" data-toggle="tab" style="display: none;"> Reports</a></li>
                        <li class="<?php if($profile_tab == "viewreport") echo "active"; ?>" ><a href="#orders" data-toggle="tab" style="display: none;"> View Report</a></li>
                    </ul>
                    <div id="myTabContent" class="tab-content">
                        <div class="tab-pane fade <?php if($profile_tab == "report") echo "active"; ?> in" id="products">
                            <div class="row p-20">
                                <div class="col-md-12 col-sm-12 col-xs-12 table-responsive">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <form id="form1" class="form-horizontal" method="post" action="<?php echo base_url(); ?>index.php/admin/vendorandriderreport">
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label"> Vendor / Rider Name <span class="asterisk">*</span></label>
                                                    <div class="col-sm-7">
                                                        <select class="form-control" name="vendorandriderid" required="required">
                                                            <option value="">Select an Vendor / Rider </option>
                                                            <?php  foreach ($vendorandriderdatalist as $vendorandriderdata) { ?>
                                                                <option value="<?php if (!empty($vendorandriderdata->user_id)) echo $vendorandriderdata->user_id; ?>"> 
                                                                    <?php if (!empty($vendorandriderdata->username)) echo $vendorandriderdata->username; ?> 
                                                                    ( <?php if (!empty($vendorandriderdata->user_type)) echo $vendorandriderdata->user_type; ?> )
                                                                </option>
                                                              <?php } ?>    
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label"> Period </label>
                                                    <div class="col-md-7">
                                                        <select class="form-control" name="period">
                                                            <option class="no-option" value="">Select an Period </option>
                                                            <option value="Daliy">Daliy</option>
                                                            <option value="Weekly">Weekly</option>
                                                            <option value="Monthly">Monthly</option>
                                                            <option value="Yearly">Yearly</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label"> </label>
                                                    <div class="col-md-7">
                                                    OR
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label"> From Date </label>
                                                    <div class="col-sm-7">
                                                        <input type="text"  name="fromdate" id="fromdate" data-lang="en" data-large-mode="true" data-min-year="1800" data-max-year="2020" class="form-control" placeholder="mm-dd-yyyy">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">To Date </label>
                                                    <div class="col-sm-7">
                                                        <input type="text" name="todate" id="todate" data-lang="en" data-formate="d-m-y" data-large-mode="true" data-min-year="1800" data-max-year="2020" class="form-control" placeholder="mm-dd-yyyy">
                                                    </div>
                                                </div>
                                                <div class="col-sm-9 col-sm-offset-3">
                                                    <div class="pull-right">
                                                        <button type="submit" class="btn m-b-10">Submit</button>
                                                        <button type="reset" class="btn m-b-10">Cancel</button>
                                                    </div>
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade <?php if($profile_tab == "viewreport") echo "active"; ?> in" id="orders">
                            <div class="row p-20">
                                <div class="col-md-12 col-sm-12 col-xs-12 table-responsive">
                                    <table class="table table-tools table-hover">
                                        <thead>
                                            <tr>
                                                <th style="min-width:70px"><strong>Order ID</strong></th>
                                                <th><strong>Order Quantity</strong></th>
                                                <th><strong>Deliver Quantity</strong></th>
                                                <th><strong>Distance (Km)</strong></th>
                                                <th><strong>Cancel Order</strong></th>
                                                <th><strong>Total Working days</strong></th>
                                                <th class="text-center"><strong>Status</strong></th>
                                                <th class="text-center"><strong>Actions</strong></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php if(isset($riderreport) and !empty($riderreport)) foreach ($riderreport as $report) { ?>
                                            <tr>
                                                <td> <?php if (!empty($report->order_id)) echo $report->order_id; ?> </td>
                                                <td> <?php if (!empty($report->quantity)) echo $report->quantity; ?> </td>
                                                <td> <?php if (!empty($report->quantity)) echo $report->quantity; ?> </td>
                                                <td> <?php if (!empty($report->distance)) echo $report->distance; ?> </td>
                                                <td> <?php if (!empty($report->username)) echo $report->username; ?> </td>
                                                <td> <?php if (!empty($report->username)) echo $report->username; ?> </td>
                                                <td class="text-center">
                                                    <span class="label label-success w-300"> Complete </span>
                                                </td>
                                                <td class="text-center">
                                                    <a href="" class="view btn btn-sm btn-default"><i class="fa fa-search"></i> View</a>
                                                </td>
                                            </tr>
                                        <?php } ?>    
                                        </tbody>
                                    </table>
                                </div>
                                <a href="<?php echo site_url('admin/reports'); ?>" class="btn btn-default m-r-10" style="float: right;margin-top: -7px;"><i class="fa fa-reply"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT -->
</div>
</div>
</div>
