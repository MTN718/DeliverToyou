<div class="cs-subheader align-left  " style="background: url(<?php echo base_url(); ?>assets/front/images/subheader-image-jobline.jpg) center top  #313540; min-height:140px!important; padding-top:45px; padding-bottom:30px;  ">
   <div class="container">
      <div class="cs-page-title">
         <h1 style="color:#ffffff !important">My Account</h1>
      </div>
   </div>
</div>
<!-- Main Content Section -->
<div class="main-section">
   <div class="container">

      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
         <div class="logo text-center">
            <img src="<?php echo base_url(); ?>images/logo.png" style="background: #FCDD11;padding: 1%;">
         </div>
         <div class="cs-heading">
            <h3 class="cs-fancy" style=" font-size: 20px !important; margin-top: 20px; text-align:Center; font-style:normal;">
                Reset Password
            </h3>
         </div>
      </div>
      <!-- Row Start -->
      <div class="row">
         <div class="col-md-12 text-center" style=" margin-bottom: 20px; ">
            <div class="rich-text-editor">
               <div class="woocommerce">
                  <form method="post" class="woocommerce-ResetPassword " action="<?php echo site_url();?>/home/resetpassword">
                     <input type="hidden" name="token" value="<?php echo $data['token']; ?>">
                     <p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
                       <!--  <label for="user_login"> Password </label> -->
                        <input class="woocommerce-Input woocommerce-Input--text input-text" type="password" name="password" id="password" pattern="^\S{6,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Must have at least 6 characters' : ''); if(this.checkValidity()) form.newpassword.pattern = this.value;"  placeholder="Password" required />
                     </p>

                     <p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
                       <!--  <label for="user_login">Confrim  Password </label> -->
                        <input class="woocommerce-Input woocommerce-Input--text input-text" placeholder="Confrim Password" type="password" id="newpassword" name="newpassword" pattern="^\S{6,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Please enter the same Password as above' : '');" required />
                     </p>

                     <div class="clear"></div>
                     <p class="woocommerce-form-row form-row">
                        <input type="submit" class="woocommerce-Button button" value="Reset password" />
                     </p>
                  </form>
               </div>
            </div>
           <!--  <div id="comment" class="comment-form">
               <div id="respond-comment">
               </div>
               <!-- Col Start                      
            </div> -->
         </div>
      </div>
   </div>
</div>
<div class="clear"></div>