<div class="scetion-title"><h3>Change Password</h3></div>
<div class="change-pass-content-holder">
    <div class="input-info">
        <form method="post" action="<?php echo site_url();?>/home/vendorchangepassword">
            <input type="hidden" name="id" value="<?php if (!empty($data['vendordatainfo'])) echo $data['vendordatainfo']->user_id; ?>">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <label>New Password</label>
                    <input type="password"  class="cs-form-text cs-input form-control" id="password" name="password" pattern="^\S{5,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Must have at least 6 characters' : ''); if(this.checkValidity()) form.newpassword.pattern = this.value;"  placeholder="Password" required/>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <label>Confirm Password</label>
                    <input type="password"  class="cs-form-text cs-input form-control" id="newpassword" name="newpassword"  placeholder="Confrim Password" pattern="^\S{5,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Please enter the same Password as above' : '');" required/> 
                </div>
                <div class="col-md-12 col-md-12 col-sm-12 col-xs-12">
                    <input type="submit" value="Update" class="acc-submit cs-section-update cs-color csborder-color" >
                </div>
            </div>
        </form>    
    </div>
</div>