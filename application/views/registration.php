<style type="text/css">
	.logo{
		margin-bottom: 20px;
	}
</style>

<div class="cs-subheader align-left  " style="background: url(<?php echo base_url(); ?>assets/images/subheader-image-jobline.jpg) center top  #313540; min-height:140px!important; padding-top:45px; padding-bottom:30px;  ">
    <div class="container">
        <div class="cs-page-title">
            <h1 style="color:#ffffff !important">ACCOUNT</h1>
        </div>
    </div>
</div>

<div class="main-section">


<?php if ($this->session->flashdata('success_msg') != "") { ?>
    <div class="alert alert-success alert-dismissable">
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


	<div  class="page-section cs-page-sec-446337 ">
		<div class="container "> 
			<div class="row">
				<div class="section-fullwidth col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<div class="logo text-center">
								<img src="<?php echo base_url(); ?>images/logo.png" style="background: #FCDD11;padding: 1%;">
							</div>
							<div class="cs-heading">
								<h3 class="cs-fancy" style="font-size: 20px !important; text-align:Center;">
									Signup here
								</h3>
								<div style="color: !important; text-align: Center; font-style:normal;">
									Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod 
									tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, 
									quis nostrud exercitation ullamco laborisnim id est laborum...
								</div>
							</div>
						</div>

						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
							<div  style="background-image:url(); color:; background-color:; margin-left:0px; margin-right:0px; " class=" ">
								<div class="signup-form">
									<ul class="nav">
										<li  class="active">
											<a href="#" style="border:1px solid #eeeeee;text-align:center; margin-bottom:2%">
												<i class="icon-briefcase4"></i>Business
											</a>
										<li>
									</ul>

									<div class="input-info login-box login-from login-form-id-88088">
										<div class="scetion-title">
											<h2>User Login</h2>
										</div>
											<form method="post" class="wp-user-form webkit" action="<?php echo site_url('login'); ?>">
											<div class="row">
												<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
													<label>Username</label>
													<input type="text" size="20" onfocus="if (this.value == 'Username') { this.value = '';}" onblur="if (this.value == '') { this.value = 'Username' ;}" class="cs-form-text cs-input form-control"  name="username" placeholder="Username" />
												</div>
												<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
													<label>Password</label>
													<input type="password" class="cs-form-text cs-input form-control" size="20" name="password" placeholder="Password"/>
												</div>
												<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
													<div class="row">
														<div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
															<input type="submit" class="cs-bgcolor user-submit backcolr acc-submit" name="user-submit" value="Login" />				            								
															<a class="user-forgot-password-page" href="#"> Forgot Password?</a>
														</div>

														<div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 login-section">
															<i class="icon-user-add"></i>New to Us?
															<a class="register-link-page" href="#">Register Here</a>
														</div>
														<span class="status status-message" style="display:none"></span>
													</div>
												</div>
											</div>
										</form>
									</div>

									<div class="input-info forgot-box login-from login-form-id-7430232" style="display:none;">
										<div class="scetion-title">
											<h4>Forgot Password</h4>
										</div>
										<div class="status status-message"></div>
										<form class="user_form" action="<?php echo site_url('home/forgotpassword'); ?>"  method="post">		
											<div class="row">
												<div class="col-md-12">
													<label>Enter Email</label>	
													<input type="text"  onfocus="if (this.value == 'Enter email address...') { this.value = '';}" onblur="if (this.value == '') { this.value = 'Enter email address...' ;}"  class="form-control"  name="email" />
												</div>
												<div class="col-md-12">
													<div class="row">
														<div class="col-md-5">
															<input type="submit" class="reset_password backcolr cs-bgcolor"  name="submit" value="Send Email" />
														</div>
														<div class="col-md-7 login-section">
															<a class="login-link-page" href="#">Login Here</a>
														</div>
													</div>
												</div>
											</div>
										</form>

										<script type="text/javascript">
											var $ = jQuery;
											$("#wp_pass_lost_33593503").submit(function () {
												$('#cs-result-33593503').html('<i class="icon-spinner8 icon-spin"></i>').fadeIn();
												var input_data = $('#wp_pass_lost_33593503').serialize() + '&action=cs_recover_pass';
												$.ajax({
													type: "POST",
													url: "",
													data: input_data,
													success: function (msg) {
													}
												});
												return false;
											});
											$(document).on('click', '.cs-forgot-switch', function () {
												$('.cs-login-pbox').hide();
												$('.cs-forgot-pbox').show();
											});
											$(document).on('click', '.cs-login-switch', function () {
												$('.cs-forgot-pbox').hide();
												$('.cs-login-pbox').show();
											});
										</script>
									</div> 



									<div class="tab-content tab-content-page">
										<div role="tabpanel" id="candidate78492" class="tab-pane">
											<div class="input-info">
												<div class="row">
													<form method="post" action="<?php echo site_url();?>/home/vendorregistration" class="wp-user-form " enctype="multipart/form-data">
													<input type="hidden" name="user_type_id" value="vendor">

														<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
															<input type="text" placeholder="Business Name" name="username"  class="form-control" required/>
														</div>
														<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
															<input type="text"  class="cs-form-text cs-input form-control"  name="email" placeholder="Email" required/>
														</div>
														<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
															<input type="number"  class="cs-form-text cs-input form-control" name="number"  placeholder="Phone Number" />
														</div>
														<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
															<input type="password"  class="cs-form-text cs-input form-control" id="password" name="password" pattern="^\S{6,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Must have at least 6 characters' : ''); if(this.checkValidity()) form.newpassword.pattern = this.value;"  placeholder="Password" required/>
														</div>
														<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
															<input type="password"  class="cs-form-text cs-input form-control" id="newpassword" name="newpassword"  placeholder="Confrim Password" pattern="^\S{6,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Please enter the same Password as above' : '');" required/> 
														</div>
														<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
															<div class="select-holder">
																<select required data-placeholder="Please Select Nature of Business"  class="chosen-select form-control"  id="cs_candidate_specialisms53583" name="business_nature"  style="height:110px !important;">
																	<?php foreach ($data['businessdatalist'] as $businessdata) { ?>
																		<option value="<?php echo $businessdata->title; ?>"> <?php echo $businessdata->title; ?> </option>
																	<?php } ?> 	

																</select>
															</div>
														</div>
														<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
													      <textarea rows="4" class="form-control" name="address" placeholder="Address"></textarea>
														</div>
														<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
															<input type="file" class="form-control m-t-10" name="image">
														</div>

														<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12" style="margin-top: 20px;">
															<div class="row">
																<div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
																	<input type="submit" class="cs-bgcolor user-submit acc-submit" name="user-submit" value="Create Account" />
																</div>
																<div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 login-section">
																	<i class="icon-user-add"></i> Already have an account? 
																	<a href="javascript:void(0);" class="login-link-page">Login Now</a>

																</div>
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
				</div>                            
			</div>
		</div>
	</div>
</div>
<div class="clear"></div>