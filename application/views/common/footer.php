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


<?php }
foreach ($scripts['foot'] as $file) {
    echo "<script src='$file'></script>";
}
?>

    <link href="<?php echo base_url('admin/assets/datetime/datedropper.css');?>" rel="stylesheet" type="text/css"> 
    <script src="<?php echo base_url('admin/assets/datetime/datedropper.js');?>"></script>

    <script>$('#fromdate').dateDropper();</script>
    <script>$('#todate').dateDropper();</script>
    <script>$('#pickup').dateDropper();</script>
    <script>$('#dropoff').dateDropper();</script>


    
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
        "paging":   true,
        "info":     false,
        "filter":     true,
        buttons: [
            { extend: 'excel', text: 'Export As EXCEl' },
            { extend: 'pdf', text: 'Export As PDF' },
            { extend: 'print', text: 'Print' }
        ]
    });
} );


// $(document).ready(function() {
//     $('#dataexample1').DataTable( {
//         dom: 'Bfrtip',
//         "paging":   true,
//         "info":     false,
//         "filter":     true,
//         buttons: [
//         ]
//     });
// } );

</script>



</html>
