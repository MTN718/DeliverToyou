<style type="text/css">
    .login-middle{
        width: 50%;
        margin: auto;
    }
</style>






<div class="cs-subheader align-left  " style="background: url(<?php echo base_url(); ?>assets/images/subheader-image-jobline.jpg) center top  #313540; min-height:140px!important; padding-top:45px; padding-bottom:30px;  ">
    <div class="container">
        <div class="cs-page-title">
            <h1 style="color:#ffffff !important">My Account</h1>
        </div>
    </div>
</div>

<div class="main-section">
    <div class="container">
      <!-- Row Start -->
        <div class="row">
            
            <div class="col-md-12">
                <div class="rich-text-editor">
                    <div class="woocommerce login-middle">
                        <div class="text-center">
                            <img src="<?php echo base_url(); ?>images/logo.png" style="padding: 20px;background: ;background-color: #FEC503;border-radius: 15px;">
                        </div>    
                        <h2 class="text-center">Login</h2>

                        <form class="woocomerce-form woocommerce-form-login login" action="<?php echo site_url(); ?>/home/vendor_dashboard?profile_tab=home" method="post">
                            <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide" style="margin-bottom: 20px;">
                               <!--  <label for="username">Username or email address 
                                    <span class="required">*</span>
                                </label> -->    
                                <input type="text" re class="woocommerce-Input woocommerce-Input--text input-text" onblur="if (this.value == '') {this.value = 'Username';}"  onfocus="if (this.value == 'Username') {this.value = '';}" value="Username" name="username" id="username"  required/>
                            </p>
                            <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide" style="margin-bottom: 20px;">
                               <!--  <label for="password">Password 
                                    <span class="required">*</span>
                                </label> -->
                                <input class="woocommerce-Input woocommerce-Input--text input-text" type="password"  onblur="if (this.value == '') {this.value = 'Password';}"  onfocus="if (this.value == 'Password') {this.value = '';}" value="Password" name="password" id="password" required/>
                            </p>
                            <p class="form-row text-center" style="margin-bottom: 20px;">
                                <input type="submit" class="woocommerce-Button button" name="login" value="Login" />
                                <label class="woocommerce-form__label woocommerce-form__label-for-checkbox inline">
                                    <input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" /> 
                                    <span>Remember me</span>
                                </label>
                            </p>
                            <p class="woocommerce-LostPassword text-center lost_password">
                                <a href="<?php echo site_url(); ?>home/lostPassword">Lost your password?</a>
                            </p>
                        </form>
                    </div>
                </div>
                <div id="comment" class="comment-form">
                    <div id="respond-comment"></div>                       
                </div>
            </div>
        </div>
    </div>
</div>
<div class="clear"></div>