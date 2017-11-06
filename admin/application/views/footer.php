</div>
<!-- BEGIN MANDATORY SCRIPTS -->
    <script src="<?php echo base_url('assets/plugins/jquery-1.11.1.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/jquery-migrate-1.2.1.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/jquery-ui/jquery-ui-1.11.2.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/jquery-mobile/jquery.mobile-1.4.2.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/bootstrap/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/bootstrap-dropdown/bootstrap-hover-dropdown.min.js'); ?>"></script>
 <!--   <script src="<?php echo base_url('assets/plugins/bootstrap-select/bootstrap-select.js'); ?>"></script>  -->
    <script src="<?php echo base_url('assets/plugins/mcustom-scrollbar/jquery.mCustomScrollbar.concat.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/mmenu/js/jquery.mmenu.min.all.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/nprogress/nprogress.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/charts-sparkline/sparkline.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/breakpoints/breakpoints.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/numerator/jquery-numerator.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/jquery.cookie.min.js'); ?>" type="text/javascript"></script>
    <!-- END MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL SCRIPTS  
    <script src="<?php echo base_url('assets/plugins/metrojs/metrojs.min.js'); ?>"></script>
    <script src='<?php echo base_url('assets/plugins/fullcalendar/moment.min.js'); ?>'></script>
    <script src='<?php echo base_url('assets/plugins/fullcalendar/fullcalendar.min.js'); ?>'></script>
    <script src="<?php echo base_url('assets/plugins/google-maps/markerclusterer.js'); ?>"></script>
    <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <script src="<?php echo base_url('assets/plugins/google-maps/gmaps.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/charts-flot/jquery.flot.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/charts-flot/jquery.flot.animator.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/charts-flot/jquery.flot.resize.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/charts-flot/jquery.flot.time.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/charts-morris/raphael.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/charts-morris/morris.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/calendar.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/dashboard.js'); ?>"></script>
   <!--  END  PAGE LEVEL SCRIPTS -->
    <script src="<?php echo base_url('assets/js/application.js'); ?>"></script>


     <link href="<?php echo base_url('assets/datetime/datedropper.css');?>" rel="stylesheet" type="text/css"> 
    <script src="<?php echo base_url('assets/datetime/datedropper.js');?>"></script>

    <script>$('#fromdate').dateDropper();</script>
    <script>$('#todate').dateDropper();</script>
    <script>$('#backdatedrider').dateDropper();</script>







    <script src="<?php echo base_url('assets/datetime/timedropper.js');?>"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/datetime/timedropper.css');?>"> 

    <script>
      this.$('#starttime').timeDropper({
        setCurrentTime: false,
        meridians: true,
        primaryColor: "#f2642a",
        borderColor: "#f2642a",
        minutesInterval: '15'
      });

      var $clocks = $('.td-input');
        _.each($clocks, function(clock){
        clock.value = null;
      });
    </script> 
    <script>
      this.$('#finishtime').timeDropper({
        setCurrentTime: false,
        meridians: true,
        primaryColor: "#f2642a",
        borderColor: "#f2642a",
        minutesInterval: '15'
      }); 

      var $clocks = $('.td-input');
        _.each($clocks, function(clock){
        clock.value = null;
      });
    </script> 

    <script type="text/javascript">
          $(document).on("click", ".open-assignbackdated", function () {
             var myBookId = $(this).data('id');
             $(".modal-body #group_id").val( myBookId );
             $("#assignbackdated").modal("show")
          });
    </script>  
    <script type="text/javascript">
          $(document).on("click", ".open-assigntorider", function () {
             var myBookId = $(this).data('id');
             $(".modal-body #group_id").val( myBookId );
             $("#assigntorider").modal("show")
          });
    </script> 
    <script type="text/javascript">
          $(document).on("click", ".open-ongoingtaskinfo", function () {
             var myBookId = $(this).data('id');
             $(".modal-body #order_id").val( myBookId );
             $("#ongoingtaskinfo").modal("show")
          });
    </script>
    <script type="text/javascript">
          $(document).on("click", ".open-reassigntorider", function () {
             var myBookId = $(this).data('id');
             $(".modal-body #group_id").val( myBookId );
             $("#reassigntorider").modal("show")
          });
    </script>
          
    
    <script type="text/javascript">   
      $(document).on('click','.editable-action', function() {
        data = {};
        data['val'] = $(this).attr('data');
        data['id'] = $(this).parent('td').parent('tr').attr('data-row-id');
        data['index'] = $(this).attr('col-index');
        
        $.ajax({   

            type: "POST",  
            url: "<?php echo base_url(); ?>/index.php/admin/updateInline/riderdelete",  
            cache:false,  
            data: data,
            dataType: "json",       
            success: function(response)  
            {   
              if(data['index'] == 2)
                  location.reload();
              else
                  $("#riderAction"+data['id']).load(location.href + " #riderAction"+data['id']);   
            }   
        });
      });
    </script>      


    <script type="text/javascript">   
      $(document).on('click','.editable-col', function() {
        data = {};
        data['val'] = $(this).attr('data');
        data['id'] = $(this).parent('td').parent('tr').attr('data-row-id');
        data['index'] = $(this).attr('col-index');
        
        $.ajax({   

            type: "POST",  
            url: "<?php echo base_url(); ?>/index.php/admin/updateInline/vendordelete",  
            cache:false,  
            data: data,
            dataType: "json",       
            success: function(response)  
            {   
              if(data['index'] == 2)
                  location.reload();
              else
                  $("#vendorAction"+data['id']).load(location.href + " #vendorAction"+data['id']);
            }   
        });
      });
    </script>   

    


</body>
</html>
