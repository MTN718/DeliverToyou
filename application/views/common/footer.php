<!-- this footer will not be shown on login page -->
<?php if ($inner_view != 'common/login') { ?>

	<footer id="footer">
		<div class="cs-footer footer-v1 default-footer">
			<div style="background-color:#FEC503;" class="cs-copyright">
				<div class="container">
					<div class="cs-copyright-area">
						<div class="row">
							<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">

								<span class="footer-logo">								
									<a href="<?php echo base_url(); ?>home" style="margin:0px;">    
										<p style="margin:0px; color: white !important;"><b>My Hive Sdn Bhd Lot G-15 Metia Commercial Section 13 Shah Alam 40100 Selangor</b></p>
									</a>
								</span>                    
								<div class="footer-links">
									                               
								</div>
							</div>
							<div class="col-md-3">
								<div class="back-to-top">
									<a href="javascript:void(0);" style="color: #000 !important;">Back to top<i class="icon-arrow-up7"></i></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>        
		</div>
	</footer>
	<!-- Wrapper End -->   
</div>








<script type='text/javascript'>
	/* <![CDATA[ 
	var jobhunt_functions_vars = {"select_file":"Select File","add_file":"Add File","geolocation_error_msg":"Geolocation is not supported by this browser.","title":"Title","plugin_options_replace":"Current Plugin options will be replaced with the default options.","delete_backup_file":"This action will delete your selected Backup File. Are you want to continue?","valid_email_error":"Please Enter valid Email address.","shortlist":"Shortlist","shortlisted":"Shortlisted","are_you_sure":"Are you sure to do this?","cancel":"Cancel","delete":"Delete","drag_marker":"Drag this Marker","couldnt_find_coords":"Couldn't find coordinates for this place","active":"Active","inactive":"Inactive"};
	 ]]> */
</script>
<script type='text/javascript' src='<?php echo base_url(); ?>/assets/front/js/jobhunt_functionsa288.js'></script>
<script type='text/javascript'>
	/* <![CDATA[ 
	var cs_vars = {"currency_sign":"$","currency_position":"left","there_is_prob":"There is some Problem.","oops_nothing_found":"Oops, nothing found!","title":"Title"};
	 ]]> */
</script>
<script type='text/javascript' src='<?php echo base_url(); ?>/assets/front/js/extra_functionsa288.js'></script>
<script type='text/javascript'>
	/* <![CDATA[ */
	var cs_func_vars = {"more":"More","name_error":"Please Fill in Name.","email_error":"Please Enter Email.","valid_email_error":"Please Enter valid Email address.","subject_error":"Please Fill in Subject.","msg_error":"Please Fill in Message."};
	/* ]]> */
</script>
<script type='text/javascript' src='<?php echo base_url(); ?>/assets/front/js/job3/functionsa288.js'></script>
<script type='text/javascript' src='<?php echo base_url(); ?>/assets/js/job3/jquery_datetimepickera288.js?ver=4.8.1'></script>
<script type='text/javascript' src='<?php echo base_url(); ?>/assets/front/js/job3/custom-resolutiona288.js?ver=4.8.1'></script>
<script type='text/javascript'>
	/* <![CDATA[ */
	var wpcf7 = {"apiSettings":{"root":"http:\/\/jobcareer.chimpgroup.com\/wp-json\/","namespace":"contact-form-7\/v1"},"recaptcha":{"messages":{"empty":"Please verify that you are not a robot."}}};
	/* ]]> */
</script>
<script type='text/javascript' src='<?php echo base_url(); ?>/assets/front/js/job3/scriptsef15.js?ver=4.8'></script>
<script type='text/javascript'>
	/* <![CDATA[ */
	var wc_add_to_cart_params = {"ajax_url":"\/wp-admin\/admin-ajax.php","wc_ajax_url":"\/register\/?wc-ajax=%%endpoint%%","i18n_view_cart":"View cart","cart_url":"http:\/\/jobcareer.chimpgroup.com\/cart\/","is_cart":"","cart_redirect_after_add":"no"};
	/* ]]> */
</script>
<script type='text/javascript' src='<?php echo base_url(); ?>/assets/front/js/job3/add-to-cart.min6173.js?ver=3.0.8'></script>
<script type='text/javascript' src='<?php echo base_url(); ?>/assets/front/js/job3/jquery.blockUI.min44fd.js?ver=2.70'></script>
<script type='text/javascript' src='<?php echo base_url(); ?>/assets/front/js/job3/js.cookie.min6b25.js?ver=2.1.4'></script>
<script type='text/javascript'>
	/* <![CDATA[ */
	var woocommerce_params = {"ajax_url":"\/wp-admin\/admin-ajax.php","wc_ajax_url":"\/register\/?wc-ajax=%%endpoint%%"};
	/* ]]> */
</script>
<script type='text/javascript' src='<?php echo base_url(); ?>/assets/front/js/job3/woocommerce.min6173.js?ver=3.0.8'></script>
<script type='text/javascript'>
	/* <![CDATA[ */
	var jobhunt_notifications = {"ajax_url":"http:\/\/jobcareer.chimpgroup.com\/wp-admin\/admin-ajax.php","security":"c046f49fa3"};
	/* ]]> */
</script>
<script type='text/javascript' src='<?php echo base_url(); ?>/assets/front/js/job3/jobhunt-notifications5152.js?ver=1.0'></script>
<script type='text/javascript' src='<?php echo base_url(); ?>/assets/front/js/job3/wp-embed.mina288.js?ver=4.8.1'></script>
<script type='text/javascript' src='<?php echo base_url(); ?>/assets/front/js/job3/cs-connecta288.js?ver=4.8.1'></script>
<script type='text/javascript' src='<?php echo base_url(); ?>/assets/front/js/job3/uiMorphingButton_fixeda288.js?ver=4.8.1'></script>

<script type='text/javascript'>
	/* <![CDATA[ */
	var jobcareer_page_style = {"css":".cs-page-sec-446337{margin-top: 100px;margin-bottom: 80px;border-top: 0px #e0e0e0 solid;border-bottom: 0px #e0e0e0 solid;}"};
	/* ]]> */
</script>
<script type='text/javascript' src='<?php echo base_url(); ?>/assets/front/js/job3/cs_inline_scripts_functionsa288.js?ver=4.8.1'></script>


<script type='text/javascript' src="<?php echo base_url(); ?>/assets/jspdf.debug.js"></script>




<?php } ?>

</body>
<!-- getting this scripts from karyon_config.php file which is under application > config folder -->
<?php
foreach ($scripts['foot'] as $file) {
    echo "<script src='$file'></script>";
}
?>




		




    <link href="<?php echo base_url('admin/assets/datetime/datedropper.css');?>" rel="stylesheet" type="text/css"> 
    <script src="<?php echo base_url('admin/assets/datetime/datedropper.js');?>"></script>

    <script>$('#fromdate').dateDropper();</script>
    <script>$('#todate').dateDropper();</script>



    
  <script src="//code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.4.2/js/dataTables.buttons.min.js"></script>
  <script src="//cdn.datatables.net/buttons/1.4.2/js/buttons.flash.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
  <script src="//cdn.datatables.net/buttons/1.4.2/js/buttons.html5.min.js"></script>
  <script src="//cdn.datatables.net/buttons/1.4.2/js/buttons.print.min.js"></script>
    

<script type="text/javascript">

$(document).ready(function() {
    $('#dataexample').DataTable( {
        dom: 'Bfrtip',
        "paging":   false,
        "info":     false,
        "filter":     false,
        buttons: [
            { extend: 'excel', text: 'Export As EXCEl' },
            { extend: 'pdf', text: 'Export As PDF' },
            { extend: 'print', text: 'Print' }
        ]
    } );
} );

</script>

  
</html>
