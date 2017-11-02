<?php $this->load->view('header'); ?>
<body class="login fade-in" data-page="login">


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









    <!-- BEGIN LOGIN BOX -->
    <div class="container" id="login-block">
        <div class="row">
            <div class="col-sm-6 col-md-4 col-sm-offset-3 col-md-offset-4">
                <div class="login-box clearfix animated flipInY">
                    <div class="page-icon animated bounceInDown">
                        <img src="<?php echo base_url(); ?>/assets/img/account/user-icon.png" alt="Key icon">
                    </div>
                    <div class="login-logo">
                        <a href="#?login-theme-3">
                            <img src="<?php echo base_url(); ?>/assets/img/logo_login.png" alt="Company Logo">
                        </a>
                    </div>
                    <hr>
                    <div class="login-form">
                        <!-- BEGIN ERROR BOX -->
                        <div class="alert alert-danger hide">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <h4>Error!</h4>
                            Your Error Message goes here
                        </div>
                        <!-- END ERROR BOX -->
                        <form action="<?php echo site_url('admin/login'); ?>" method="post">
                            <input type="text" placeholder="Username" name="username" class="input-field form-control user" />
                            <input type="password" placeholder="Password" name="password" class="input-field form-control password" />
                            <div class="div-login" style="margin:auto;text-align:center">
                                <button type="submit" style="display: inline;" class="btn btn-login ladda-button"  data-style="expand-left">
                                    <span class="ladda-label">login</span></button>
                            </div>
                        </form>
                       <!--  <div class="login-links">
                            <a href="<?php echo site_url('admin/forgot_password'); ?>">Forgot password?</a>
                            <br>
                            <a href="<?php echo site_url('admin/signup'); ?>">Do not have an account? <strong>Sign Up</strong></a>
                        </div> -->
                    </div>
                </div>
          <!--       <div class="social-login row">
                    <div class="fb-login col-lg-6 col-md-12 animated flipInX">
                        <a href="#" class="btn btn-facebook btn-block">Connect with <strong>Facebook</strong></a>
                    </div>
                    <div class="twit-login col-lg-6 col-md-12 animated flipInX">
                        <a href="#" class="btn btn-twitter btn-block">Connect with <strong>Twitter</strong></a>
                    </div>
                </div> -->
            </div>
        </div>
  <?php $this->load->view('footer'); ?>
