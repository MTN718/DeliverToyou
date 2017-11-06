<!--BEGIN MAIN CONTENT -->
<div id="main-content">
    <div class="page-title">
        <i class="icon-custom-left"></i>
        <?php if (isset($vendordata)) { ?>
            <h3><strong>Vendor</strong> <small>update Vendor Info</small></h3>
        <?php } else { ?>    
             <h3><strong>Vendor</strong> <small>Add Vendor Info</small></h3>
        <?php } ?>      
        <br>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tabcordion">
                <ul id="myTab" class="nav nav-tabs">
                    <li class="active"><a href="#eidt_rider_general_info" data-toggle="tab">General Info</a></li>
                </ul>

                <div id="myTabContent" class="tab-content">
                    <div class="tab-pane fade active in" id="eidt_rider_general_info">
                        <div class="row">
                            <div class="col-md-12">
                                <?php if (isset($vendordata)) { ?>
                                    <form id="form1" class="form-horizontal" action="<?php echo base_url(); ?>index.php/admin/updatevendorInfo" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="id" value="<?php if (!empty($vendordata)) echo $vendordata->user_id; ?>">
                                        <input type="hidden" name="user_type_id" value="vendor">

                                <?php } else { ?>
                                    <form id="form1" class="form-horizontal" action="<?php echo base_url(); ?>index.php/admin/addvendor" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="id" value="<?php if (!empty($vendordata)) echo $vendordata->user_id; ?>">
                                        <input type="hidden" name="user_type_id" value="vendor">
                                <?php } ?>        
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label"> Username <span class="asterisk">*</span></label>
                                            <div class="col-sm-7">
                                                <?php if (isset($vendordata->username)) { ?>
                                                    <input type="text" placeholder="Username" name="username" class="form-control" value="<?php if (!empty($vendordata->username)) echo $vendordata->username; ?>">
                                                <?php } else { ?>    
                                                    <input type="text" placeholder="Username" name="username"  class="form-control" required/>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Business Name <span class="asterisk">*</span></label>
                                            <div class="col-sm-7">
                                                <?php if (isset($vendordata->name)) { ?>
                                                    <input type="text" placeholder="Business Name" name="businessname" class="form-control" value="<?php if (!empty($vendordata->name)) echo $vendordata->name; ?>">
                                                <?php } else { ?>    
                                                    <input type="text" placeholder="Business Name" name="businessname"  class="form-control" required/>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Email <span class="asterisk">*</span></label>
                                            <div class="col-sm-7">
                                                <?php if (isset($vendordata->email)) { ?>
                                                    <input type="email" name="email" class="form-control" value="<?php if (!empty($vendordata->email)) echo $vendordata->email; ?>">
                                                <?php } else { ?>  
                                                    <input type="enail"  class="form-control"  name="email" placeholder="Email" required/>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Phone Number <span class="asterisk">*</span></label>
                                            <div class="col-sm-7">
                                                <?php if (isset($vendordata->mobile)) { ?>
                                                    <input type="number" name="number" placeholder="Phone Number" class="form-control" value="<?php if (!empty($vendordata->mobile)) echo $vendordata->mobile; ?>">
                                                <?php } else { ?>  
                                                    <input type="number"  class="form-control" name="number"  placeholder="Phone Number" required/>
                                                <?php } ?>
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label class="col-sm-2 control-label">Password <span class="asterisk">*</span></label>
                                            <div class="col-sm-7">
                                                <?php if (isset($vendordata->password)) { ?>
                                                    <input type="password"  class="cs-form-text cs-input form-control" id="password" name="password" pattern="^\S{6,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Must have at least 6 characters' : ''); if(this.checkValidity()) form.newpassword.pattern = this.value;"  placeholder="Password"/>
                                                <?php } else { ?>  
                                                    <input type="password"  class="cs-form-text cs-input form-control" id="password" name="password" pattern="^\S{6,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Must have at least 6 characters' : ''); if(this.checkValidity()) form.newpassword.pattern = this.value;"  placeholder="Password" required/>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <?php if (isset($vendordata->password)) { ?>
                                         <?php } else { ?> 

                                         <div class="form-group">
                                            <label class="col-sm-2 control-label">Confrim Password <span class="asterisk">*</span></label>
                                            <div class="col-sm-7">
                                                <input type="password"  class="cs-form-text cs-input form-control" id="newpassword" name="newpassword"  placeholder="Confrim Password" pattern="^\S{6,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Please enter the same Password as above' : '');" required/>
                                            </div>
                                        </div>
                                        <?php } ?>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Nature of Business </label>
                                            <div class="col-sm-7">
                                                 <?php if (isset($vendordata->mobile)) { ?>
                                                <input type="text"  class="form-control" name="business_nature" value="<?php if (!empty($vendordata->business_nature)) echo $vendordata->business_nature; ?>"  placeholder="Nature of Business" required/>
                                                <?php } else { ?> 
                                                 <input type="text"  class="form-control" name="business_nature"  placeholder="Nature of Business" required/>
                                                <?php } ?>
                                        
                                            </div>
                                        </div>    
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Address</label>
                                            <div class="col-sm-7">
                                                <?php if (isset($vendordata->address)) { ?>
                                                    <textarea rows="4" class="form-control" name="address" placeholder="Address"><?php if (!empty($vendordata->address)) echo $vendordata->address; ?></textarea>
                                                <?php } else { ?>  
                                                    <textarea rows="4" class="form-control" name="address" placeholder="Address" required></textarea>
                                                <?php } ?>
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label class="col-sm-2 control-label">Image</label>
                                            <div class="col-sm-7">
                                                <?php if (isset($vendordata->image_url)) { ?>
                                                    <div class="col-sm-6">
                                                        <input type="file" class="form-control m-t-10" value="<?php if (!empty($vendordata->image_url)) echo $vendordata->image_url; ?>" name="image">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <img src="<?php echo base_url(); ?>images/vendor/<?php if (!empty($vendordata->image_url)) echo $vendordata->image_url; ?>" alt="Vendor Image" class="img-responsive">
                                                    </div>    
                                                <?php } else { ?>  
                                                   <input type="file" class="form-control m-t-10" name="image">
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 m-t-20 m-b-40 align-center">
                                                <a href="<?php echo site_url('admin/vendors'); ?>" class="btn btn-default m-r-10 m-t-10"><i class="fa fa-reply"></i> Cancel</a>
                                                <?php if (isset($vendordata)) { ?>
                                                    <button type="submit" class="btn btn-success m-t-10"><i class="fa fa-check"></i>  Update </button>
                                                <?php } else { ?> 
                                                    <button type="submit" class="btn btn-success m-t-10"><i class="fa fa-check"></i>  Add </button>
                                                 <?php } ?>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>


                </div>
            </div>
        </div>
    </div>
    
</div>
<!-- END MAIN CONTENT -->
</div>
<!-- END WRAPPER