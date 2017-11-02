<?php $this->load->view('header'); ?>
<body class="login fade-in" data-page="signup">
    <!-- START SIGNUP BOX -->
    <div class="container" id="login-block">
        <div class="row">
            <div class="col-sm-6 col-md-4 col-sm-offset-3 col-md-offset-4">
                <div class="login-box clearfix animated flipInY">
                    <div class="page-icon animated bounceInDown">
                        <img src="<?php echo base_url();?>/assets/img/account/register-icon.png" alt="Register icon" />
                    </div>
                    <div class="login-logo">
                        <a href="#">
                            <img src="<?php echo base_url(); ?>/assets/img/logo_login.png" alt="Company Logo">

                        </a>
                    </div>
                    <hr>
                    <div class="login-form">
                        <!-- Start Error box -->
                        <div class="alert alert-danger hide">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <h4>Error!</h4>
                            Your Error Message goes here
                        </div>
                        <!-- End Error box -->
                        <form action="#" method="post">
                            <input type="text" placeholder="Name" class="input-field" required/>
                            <input type="email" placeholder="E-mail" class="input-field" required/>
                            <input type="password" placeholder="Password" class="input-field" required/>
                            <input type="password" placeholder="Confirm Password" class="input-field" required/>
                            <div class="div-login" style="margin:auto;text-align:center">
                                <a href="<?php echo site_url('admin/dashboard'); ?>" style="display: inline;" id="submit-form" class="btn btn-login ladda-button" data-style="expand-left"><span class="ladda-label">Sign Up</span></a>
                            </div>
                        </form>
                        <div class="login-links">
                            <a href="password_forgot.html">Forgot password?</a>
                            <br>
                            <a href="<?php echo site_url('admin');?>">Already have an account? <strong>Sign In</strong></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php $this->load->view('footer'); ?>
