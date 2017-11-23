  <!-- BEGIN MAIN CONTENT -->
        <div id="main-content">
            <div class="page-title">
                <i class="icon-custom-left"></i>
                <?php if (isset($riderdata)) { ?>
                     <h3><strong>Rider</strong> <small>update Rider Info</small></h3>
                <?php } else { ?>    
                     <h3><strong>Rider</strong> <small>Add Rider Info</small></h3>
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

                                     <?php if (isset($riderdata)) { ?>
                                        <form id="form1" class="form-horizontal" action="<?php echo base_url(); ?>index.php/admin/updateriderInfo" method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="id" value="<?php if (!empty($riderdata)) echo $riderdata->user_id; ?>">
                                            <input type="hidden" name="user_type_id" value="rider">

                                    <?php } else { ?>
                                        <form id="form1" class="form-horizontal" action="<?php echo base_url(); ?>index.php/admin/addrider" method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="id" value="<?php if (!empty($riderdata)) echo $riderdata->user_id; ?>">
                                            <input type="hidden" name="user_type_id" value="rider">
                                            <input type="hidden" name="status" value="avaliable">
                                    <?php } ?>        

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label"> User Name <span class="asterisk">*</span></label>
                                            <div class="col-sm-7">
                                                <?php if (isset($riderdata->username)) { ?>
                                                    <input type="text" placeholder="User Name" name="username" class="form-control" value="<?php if (!empty($riderdata->username)) echo $riderdata->username; ?>">
                                                <?php } else { ?>    
                                                    <input type="text" placeholder="User Name" name="username"  class="form-control" required/>
                                                <?php } ?>
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label class="col-sm-2 control-label">Full Name <span class="asterisk">*</span></label>
                                            <div class="col-sm-7">
                                                <?php if (isset($riderdata->name)) { ?>
                                                    <input type="text" placeholder="Full Name" name="name" class="form-control" value="<?php if (!empty($riderdata->name)) echo $riderdata->name; ?>">
                                                <?php } else { ?>    
                                                    <input type="text" placeholder="Full Name" name="name"  class="form-control" required/>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Id Proof <span class="asterisk">*</span></label>
                                            <div class="col-sm-7">
                                                <?php if (isset($riderdata->id_proof)) { ?>
                                                    <input type="text" placeholder=" Id Proof" name="id_proof" class="form-control" value="<?php if (!empty($riderdata->id_proof)) echo $riderdata->id_proof; ?>">
                                                <?php } else { ?>    
                                                    <input type="text" placeholder=" Id Proof" name="id_proof"  class="form-control" required/>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Email <span class="asterisk">*</span> </label>
                                            <div class="col-sm-7">
                                                <?php if (isset($riderdata->email)) { ?>
                                                    <input type="text" placeholder="Email " name="email" class="form-control" value="<?php if (!empty($riderdata->email)) echo $riderdata->email; ?>">
                                                <?php } else { ?>    
                                                    <input type="text" placeholder="Email " name="email"  class="form-control" required/>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">License Details <span class="asterisk">*</span></label>
                                            <div class="col-sm-7">
                                                <?php if (isset($riderdata->license_no)) { ?>
                                                    <input type="text" placeholder="License Details" name="license_no" class="form-control" value="<?php if (!empty($riderdata->license_no)) echo $riderdata->license_no; ?>">
                                                <?php } else { ?>    
                                                    <input type="text" placeholder="License Details" name="license_no"  class="form-control" required/>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Contact Number <span class="asterisk">*</span></label>
                                            <div class="col-sm-7">
                                                <?php if (isset($riderdata->mobile)) { ?>
                                                    <input type="number" placeholder="Contact Number" name="number" class="form-control" value="<?php if (!empty($riderdata->mobile)) echo $riderdata->mobile; ?>">
                                                <?php } else { ?>    
                                                    <input type="number" placeholder="Contact Number" name="number"  class="form-control" required/>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label"> Emergency Contact Number <span class="asterisk">*</span></label>
                                            <div class="col-sm-7">
                                                <?php if (isset($riderdata->emergency_contact_no)) { ?>
                                                    <input type="number" placeholder="Emergency Contact Number" name="emergency_contact_no" class="form-control" value="<?php if (!empty($riderdata->emergency_contact_no)) echo $riderdata->emergency_contact_no; ?>">
                                                <?php } else { ?>    
                                                    <input type="number" placeholder="Emergency Contact Number" name="emergency_contact_no"  class="form-control" required/>
                                                <?php } ?>
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label class="col-sm-2 control-label">Password <span class="asterisk">*</span></label>
                                            <div class="col-sm-7">
                                                <?php if (isset($riderdata->password)) { ?>
                                                    <input type="password"  class="cs-form-text cs-input form-control" id="password" name="password" pattern="^\S{6,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Must have at least 6 characters' : ''); if(this.checkValidity()) form.newpassword.pattern = this.value;"  placeholder="Password"/>
                                                <?php } else { ?>  
                                                    <input type="password"  class="cs-form-text cs-input form-control" id="password" name="password" pattern="^\S{6,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Must have at least 6 characters' : ''); if(this.checkValidity()) form.newpassword.pattern = this.value;"  placeholder="Password" required/>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <?php if (isset($riderdata)) { ?>
                                        <?php } else { ?> 
                                         <div class="form-group">
                                            <label class="col-sm-2 control-label">Confrim Password <span class="asterisk">*</span></label>
                                            <div class="col-sm-7">
                                                <input type="password"  class="cs-form-text cs-input form-control" id="newpassword" name="newpassword"  placeholder="Confrim Password" pattern="^\S{6,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Please enter the same Password as above' : '');" required/>
                                            </div>
                                        </div>
                                        <?php } ?>    
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Address</label>
                                            <div class="col-sm-7">
                                            <?php if (isset($riderdata)) { ?>
                                                    <textarea rows="4" class="form-control" name="address" placeholder="Address"><?php if (!empty($riderdata->address)) echo $riderdata->address; ?></textarea>
                                                <?php } else { ?>      
                                                     <textarea rows="4" class="form-control" name="address" placeholder="Address" required></textarea>
                                                <?php } ?>  
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label class="col-sm-2 control-label">Image</label>
                                            <div class="col-sm-7">
                                                <?php if (isset($riderdata->image_url)) { ?>
                                                    <div class="col-sm-6">
                                                        <input type="file" class="form-control m-t-10" value="<?php if (!empty($riderdata->image_url)) echo $riderdata->image_url; ?>" name="image">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <img src="<?php echo base_url(); ?>images/rider/<?php if (!empty($riderdata->image_url)) echo $riderdata->image_url; ?>" alt="Vendor Image" class="img-responsive">
                                                    </div>    
                                                <?php } else { ?>  
                                                   <input type="file" class="form-control m-t-10" name="image">
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 m-t-20 m-b-40 align-center">
                                                <a href="<?php echo site_url('admin/riders'); ?>" class="btn btn-default m-r-10 m-t-10"><i class="fa fa-reply"></i> Cancel</a>
                                                <?php if (isset($riderdata)) { ?>
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
    <!-- END WRAPPER -->