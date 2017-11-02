
<style id="custom-candidate-style-inline-inline-css" type="text/css">
#id_confrmdiv
{
    display: none;
    background-color: #eee;
    border-radius: 5px;
    border: 1px solid #aaa;
    position: fixed;
    width: 300px;
    left: 50%;
    margin-left: -150px;
    padding: 6px 8px 8px;
    box-sizing: border-box;
    text-align: center;
}
#id_confrmdiv .button {
    background-color: #ccc;
    display: inline-block;
    border-radius: 3px;
    border: 1px solid #aaa;
    padding: 2px;
    text-align: center;
    width: 80px;
    cursor: pointer;
}
#id_confrmdiv .button:hover
{
    background-color: #ddd;
}
#confirmBox .message
{
    text-align: left;
    margin-bottom: 8px;
}
.report_info{
    margin: 5% 0%;
}
.content_border {

    border: 1px solid gray;

}
.heading{
    margin-bottom: 5%;
}
.padding4 { padding-right: 0px;float: right !important; }
.padding19 { padding-right: 19px;float: right !important;}

@media only screen and (max-width: 500px) {
    .padding4{ padding-right: 4px; }
    .padding19 { padding-right: 19px;}
}
.wp-jobhunt .select-holder::after{
    content: none;
}
.dataTables_wrapper .dt-buttons {
  float:right;  
  
}
.alert-warning {
    background-color: #f7ae07;
    border-color: #f7ae07;
    color: #000;
}
</style>



<div class="cs-subheader align-left  " style="background: url(<?php echo base_url(); ?>assets/images/Sub-Header-Candidate.jpg) center top  ; min-height:264px!important; padding-top:105px; padding-bottom:80px  ">
    <div class="container">
        <div class="cs-page-title">
            <h1 style="color:#ffffff !important">Vendor Dashboard</h1>
        </div>
    </div>
</div>
<div class="cs_alerts"></div>
<script>
    var autocomplete;
</script>



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

<div class="main-section">
    <div class="content-area" id="primary">
        <main class="site-main">
            <div class="post-1 post type-post status-publish format-standard hentry category-uncategorized">
                <div id="main">
                    <div class="main-section cs-jax-area">
                        <section class="dasborad">
                            <div class="container">
                                <div class="row">
                                    <div class="cs-content-holder">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                                            <div class="cs-tabs nav-position-left row">

                                                <aside class="section-sidebar col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                                    <ul class="account-menu">
                                                        <li class="<?php if($data['profile_tab'] == "home") echo "active"; ?>">
                                                            <a href="#home" data-toggle="tab" >
                                                                <i class="icon-home"></i>Home
                                                            </a>
                                                        </li>
                                                        <li class="<?php if($data['profile_tab'] == "insert_order") echo "active"; ?>">
                                                            <a href="#insert_order" data-toggle="tab" >
                                                                <i class="icon-cart"></i>Insert Order
                                                            </a>
                                                        </li>
                                                        <li class="<?php if($data['profile_tab'] == "ongoing_order") echo "active"; ?>">
                                                            <a href="#ongoing_order" data-toggle="tab" >
                                                                <i class="icon-cart"></i>Ongoing Order
                                                            </a>
                                                        </li>
                                                        <li class="<?php if($data['profile_tab'] == "completed_order") echo "active"; ?>">
                                                            <a href="#completed_order" data-toggle="tab" >
                                                                <i class="icon-cart"></i>Completed Order
                                                            </a>
                                                        </li>
                                                        <li class="<?php if($data['profile_tab'] == "report") echo "active"; ?>">
                                                            <a href="#report" data-toggle="tab" >
                                                             <i class="icon-graph"></i>Report
                                                            </a>
                                                        </li>
                                                        <li class="<?php if($data['profile_tab'] == "change_password") echo "active"; ?>">
                                                            <a href="#change_password" data-toggle="tab" >
                                                                <i class="icon-key4"></i>Change Password
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="<?php echo site_url('login/logout'); ?>">
                                                                <i class="icon-logout"></i>Logout
                                                            </a>
                                                        </li>
                                                    </ul>
                                                    <div class="skill-percent-main" style="background-color: #FDDC03;">
                                                        <div class="skills-percentage-bar">
                                                            <img src="<?php echo base_url(); ?>images/logo.png">
                                                        </div>
                                                    </div>
                                                </aside>

                                                <div class="tab-content col-lg-9 col-md-9 col-sm-12 col-xs-12" id="candidate-dashboard" data-validationmsg="Please ensure that all required fields are completed and formatted correctly">
                                                <!-- warning popup -->
                                                <div id="id_confrmdiv">
                                                    <div class="cs-confirm-container">
                                                        <i class="icon-exclamation2"></i>
                                                        <div class="message">Do you really want to delete?</div>
                                                        <a href="javascript:void(0);" id="id_truebtn">Yes Delete It</a>
                                                        <a href="javascript:void(0);" id="id_falsebtn">Cancel</a>
                                                    </div>
                                                </div>
                                                <!-- end warning popup -->
                                                <div class="main-cs-loader"></div>


                                                <style type="text/css">
                                                .collapsible {
                                                    width: 100%;
                                                    padding: 10px;
                                                    background: #FDDC03;
                                                    border: 0px;
                                                    margin-top: 0px;
                                                    color: #fff;
                                                }
                                                .icon-arrow-down{
                                                    content: "\f063";
                                                }
                                                </style>

                                                <div class="tab-pane fade1 tabs-container custom-width-style <?php if($data['profile_tab'] == "home") echo "active"; ?>" id="home">
                                                    <section class="cs-favorite-jobs">
                                                        <div class="panel panel-default ">
                                                            <div class="panel-heading" style="background:#F7AE07">
                                                                <h4>
                                                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" style="color: #fff;font-weight: 600;">
                                                                        Filter
                                                                    </a>
                                                                </h4>
                                                            </div>
                                                            <div id="collapseTwo" class="panel-collapse collapse in">
                                                                <div class="panel-body">
                                                                    <div class="col-md-12" style="background:#fff;">
                                                                        <form>
                                                                            <div class="row">
                                                                                <div class="col-md-3">
                                                                                    <label class="checkbox-inline"><input type="checkbox">Online Rider</label>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <label class="checkbox-inline"><input type="checkbox">Offline Rider</label>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <label class="checkbox-inline"><input type="checkbox">On Task Rider</label>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <label class="checkbox-inline"><input type="checkbox">Available Rider</label>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="scetion-title">
                                                            <h3>Map</h3>
                                                        </div>
                                                        <div class="row">
                                                           <!--  <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                                                <iframe id="map" src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d117763.67471091678!2d75.86384989999999!3d22.723972749999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1505988453405" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                                                            </div> -->

                                                            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12" >
                                                                <div id="map" style="width: 100%; height: 450px;"></div>
                                                            </div>

                                                            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                                                <div class="">
                                                                    <div class="margin10">
                                                                        <div class="">
                                                                            <img id="riderImg" src="<?php echo base_url();?>assets/images/billyReed.jpeg" style="border:2px solid black;width:100% ">
                                                                        </div>
                                                                        <div class="row vender_info" >
                                                                            <div class="col-md-12 col-lg-12 col-sm-12">
                                                                                <button class="collapsible" data-toggle="collapse" data-target="#demo">Rider Name <i class="icon-arrow-down"></i> </button>
                                                                                <div id="demo" class="collapse">
                                                                                    <ul>
                                                                                        <li style="padding: 0px;"> 
                                                                                          <a style="color: black;" href="javascript:voic(0);"><b> Rider Id </b></a>
                                                                                          <span id="rider_id"></span>
                                                                                        </li>
                                                                                        <li style="padding: 0px;"> 
                                                                                          <a style="color: black;" href="javascript:voic(0);"><b> Name :</b> </a>
                                                                                          <span id="rider_name"></span>
                                                                                        </li>
                                                                                        <li style="padding: 0px;"> 
                                                                                          <a style="color: black;" href="javascript:voic(0);"><b> Current Locations :</b></a> 
                                                                                          <span id="current_location"></span>
                                                                                        </li>
                                                                                        <li style="padding: 0px;"> 
                                                                                          <a style="color: black;" href="javascript:voic(0);"><b> ETA :</b> </a>
                                                                                          <span id="eta"></span> 
                                                                                        </li>
                                                                                        <li style="padding: 0px;"> 
                                                                                          <a style="color: black;" href="javascript:voic(0);"><b> Customer Name :</b></a> 
                                                                                          <span id="customer_name"></span>
                                                                                        </li>
                                                                                        <li style="padding: 0px;"> 
                                                                                          <a style="color: black;" href="javascript:voic(0);"><b> Customer Contact : </b></a> 
                                                                                          <span id="customer_contact"></span>
                                                                                        </li>
                                                                                        <li style="padding: 0px;"> 
                                                                                          <a style="color: black;" href="javascript:voic(0);"><b> Drop OFF Loc. </b></a> 
                                                                                          <span id="drop_off_loc"></span>
                                                                                        </li>
                                                                                        <li style="padding: 0px;"> 
                                                                                          <a style="color: black;" href="javascript:voic(0);"><b> Order Id : </b></a> 
                                                                                          <span id="order_id"></span>
                                                                                        </li>
                                                                                        <li style="padding: 0px;"> 
                                                                                          <a style="color: black;" href="javascript:voic(0);"><b> Group Id : </b></a> 
                                                                                          <span id="group_id"></span>
                                                                                        </li>
                                                                                        <li style="padding: 0px;"> 
                                                                                          <a style="color: black;" href="javascript:voic(0);"><b> Rider Nunber : </b></a> 
                                                                                          <span id="rider_number"></span>
                                                                                        </li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </section>
                                                        <script>
                                                            jQuery(document).ready(function () {
                                                                jQuery('[data-toggle="tooltip"]').tooltip();
                                                            });
                                                        </script>
                                                    </div>
                                                    <style type="text/css">
                                                    .icon-plus::before{
                                                        content: "\f067";
                                                    }
                                                    </style>

                                                    <div class="tab-pane fade1 tabs-container custom-width-style <?php if($data['profile_tab'] == "insert_order") echo "active"; ?>" id="insert_order">
                                                        <section class="cs-favorite-jobs">
                                                            <div class="scetion-title">
                                                                <div class="col-md-6" style="padding: 0px;"><h3>Insert Order</h3></div>
                                                                    <div class="col-md-6 padding4">
                                                                        <form action="<?php echo base_url();?>index.php/home/importorders" id="importordersform" enctype="multipart/form-data" method="POST">
                                                                            <input type="file" name="file-1" id="file-1" class="inputfile inputfile-1" data-multiple-caption="{count} files selected" multiple onchange="importordersform.submit();" style="display: none;"/>
                                                                            <label for="file-1" style="float: right;">
                                                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17" style="display: none;"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4  2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/>
                                                                                </svg> 
                                                                                <span class="btn btn-default">Order import&hellip;</span>
                                                                            </label>
                                                                        </form>
                                                                        <a data-toggle="modal" data-target="#addorderDialog"  class="btn btn-primary" style="margin-right:2%;float:right;"> <i class="icon-plus" aria-hidden="true"></i> </a>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12 table-responsive" style="padding:0px;">
                                                                    <table class="table">
                                                                        <thead>
                                                                            <th>Order No</th>
                                                                            <th>Contact</th>
                                                                            <th>Order Type</th>
                                                                            <th>Pickup Address Line 1</th>
                                                                            <th>Pickup Address Line 2</th>
                                                                            <th>Pickup Postcode</th>                                                           
                                                                            <th>Pickup State</th>
                                                                            <th>Pickup Time</th>
                                                                            <th>Customer Name</th>
                                                                            <th>Customer contact</th>
                                                                            <th>Drop off Address Line 1</th>
                                                                            <th>Drop off Address Line 2</th>
                                                                            <th>Drop off Postcode</th>
                                                                            <th>Drop off State</th>
                                                                            <th>Delivery Time</th>
                                                                            <th>Detail</th>
                                                                            <th>Instruction</th>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php foreach ($data['orderdatalist'] as $orderdata) { ?>
                                                                                <tr>
                                                                                    <td class="editable-col" contenteditable="true"> <?php echo $orderdata->order_no; ?> </td>
                                                                                    <td class="editable-col" contenteditable="true"> <?php echo $orderdata->contact; ?> </td>
                                                                                    <td class="editable-col" contenteditable="true"> <?php echo $orderdata->order_type_id; ?> </td>
                                                                                    <td class="editable-col" contenteditable="true"> <?php echo $orderdata->pickup_address_1; ?> </td>
                                                                                    <td class="editable-col" contenteditable="true"> <?php echo $orderdata->pickup_address_2; ?> </td>
                                                                                    <td class="editable-col" contenteditable="true"> <?php echo $orderdata->pickup_zip; ?> </td>
                                                                                    <td class="editable-col" contenteditable="true"> <?php echo $orderdata->pickup_state; ?> </td>
                                                                                    <td class="editable-col" contenteditable="true"> <?php echo $orderdata->pickup_datetime; ?> </td>
                                                                                    <td class="editable-col" contenteditable="true"> <?php echo $orderdata->customer_name; ?> </td>
                                                                                    <td class="editable-col" contenteditable="true"> <?php echo $orderdata->customer_contact; ?> </td>
                                                                                    <td class="editable-col" contenteditable="true"> <?php echo $orderdata->dropoff_address_line_1; ?> </td>
                                                                                    <td class="editable-col" contenteditable="true"> <?php echo $orderdata->dropoff_address_line_2; ?> </td>
                                                                                    <td class="editable-col" contenteditable="true"> <?php echo $orderdata->dropoff_zip; ?> </td>
                                                                                    <td class="editable-col" contenteditable="true"> <?php echo $orderdata->dropoff_state; ?> </td>
                                                                                    <td class="editable-col" contenteditable="true"> <?php echo $orderdata->dropoff_datetime; ?> </td>
                                                                                    <td class="editable-col" contenteditable="true"> <?php echo $orderdata->detail; ?> </td>
                                                                                    <td class="editable-col" contenteditable="true"> <?php echo $orderdata->instruction; ?> </td>
                                                                                </tr>
                                                                            <?php } ?>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-12 col-lg-12 coll-sm-12 padding19">
                                                                        <button type="submit" class="btn btn-default" style="float:right;">Send order</button>
                                                                        <span style="float: right;margin: 5px;"></span>
                                                                        <button type="submit" class="btn btn-default" style="float:right;">Estimate Cost</button>
                                                                    </div>
                                                                </div>
                                                            </section>
                                                            <script>
                                                                jQuery(document).ready(function () {
                                                                    jQuery('[data-toggle="tooltip"]').tooltip();
                                                                });
                                                            </script>
                                                        </div>

                                                        <div class="tab-pane fade1 tabs-container custom-width-style <?php if($data['profile_tab'] == "ongoing_order") echo "active"; ?>" id="ongoing_order"    >
                                                            <section class="cs-favorite-jobs">
                                                                <div class="scetion-title">
                                                                    <div class="col-md-6 col-lg-6 coll-sm-6" style="padding: 0px;"><h3>Ongoing Order</h3></div>
                                                                    <div class="col-md-6 col-lg-6 coll-sm-6 padding4"></div>
                                                                </div>
                                                                <div class="col-md-12 table-responsive" style="padding:0px;">
                                                                    <table class="table">
                                                                        <thead>
                                                                            <th>Order id</th>
                                                                            <th>Group id</th>
                                                                            <th>Order no</th>
                                                                            <th>Rider id</th>
                                                                            <th>Customer name</th>
                                                                            <th>Drop Off location</th>
                                                                            <th>Detail</th>
                                                                            <th>Pickup</th>
                                                                            <th>ETA</th>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php foreach ($data['ongoingorderlist'] as $ongoingorder) { 

                                                                                $this->db->select('*');
                                                                                $this->db->from('user_order');                                      
                                                                                $this->db->where('order_id',$ongoingorder->order_id);
                                                                                $groupid = $this->db->get()->row(); 

                                                                                ?>
                                                                                <tr>
                                                                                    <td> <?php if (!empty($ongoingorder->order_id)) echo $ongoingorder->order_id; ?> </td>
                                                                                    <td> <?php if (!empty($groupid->group_id)) echo $groupid->group_id; ?> </td>
                                                                                    <td> <?php if (!empty($ongoingorder->order_no)) echo $ongoingorder->order_no; ?> </td>
                                                                                    <td> <?php if (!empty($ongoingorder->user_id)) echo $ongoingorder->user_id; ?> </td>
                                                                                    <td>  <?php if (!empty($ongoingorder->customer_name)) echo $ongoingorder->customer_name; ?> </td>
                                                                                    <td> <?php if (!empty($ongoingorder->dropoff_address_line_1)) echo $ongoingorder->dropoff_address_line_1; ?> </td>
                                                                                    <td> <?php if (!empty($ongoingorder->detail)) echo $ongoingorder->detail; ?> </td>
                                                                                    <td> <?php if (!empty($ongoingorder->pickup_address_1)) echo $ongoingorder->pickup_address_1; ?> </td>
                                                                                    <td> XXX </td>
                                                                                </tr>
                                                                            <?php } ?>    
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </section>
                                                            <script>
                                                                jQuery(document).ready(function () {
                                                                    jQuery('[data-toggle="tooltip"]').tooltip();
                                                                });
                                                            </script>
                                                        </div>

                                                        <style type="text/css">
                                                        .icon-arrow-circle-left{
                                                            content: "\f0a8";
                                                        }
                                                        .icon-arrow-circle-right{
                                                            content: "\f0a9";
                                                        }
                                                        .text-margin{
                                                            margin-top: 10px;
                                                        }

                                                        </style>

                                                <div class="tab-pane fade1 tabs-container custom-width-style <?php if($data['profile_tab'] == "completed_order") echo "active"; ?>" id="completed_order">
                                                    <section class="cs-favorite-jobs">
                                                        <div class="scetion-title">
                                                            <div class="col-md-6 col-lg-6 coll-sm-6" style="padding: 0px;"><h3>Completed Order</h3></div>
                                                            <div class="col-md-6 col-lg-6 coll-sm-6 padding4">
                                                                <!-- <button id="download_pdf" style="cursor:pointer;" class="btn btn-default pull-right" style="float:right;">Export As PDF</button> -->
                                                            </div>
                                                        </div>
                                                        <div id="page_content" class="col-md-12 table-responsive" style="padding:0px;">
                                                        <div>
                                                            <table class="table" id="dataexample">
                                                                <thead>
                                                                    <th>Order id</th>
                                                                    <th>Group id</th>
                                                                    <th>Order no</th>
                                                                    <th>Rider id</th>
                                                                    <th>Customer name</th>
                                                                    <th>Drop off location</th>
                                                                    <th>Detail</th>
                                                                    <th>Pickup Time</th>
                                                                    <th>Drop off Time</th>
                                                                    <th>Proof off Delivery</th>
                                                                    <th>Drop off Delivery</th>
                                                                    <th>Distance (K.M.)</th>
                                                                </thead>
                                                                <tbody>
                                                                    <?php foreach ($data['completetaskorderlist'] as $completetaskorder) { 

                                                                        $this->db->select('*');
                                                                        $this->db->from('user_order');                                      
                                                                        $this->db->where('order_id',$completetaskorder->order_id);
                                                                        $groupid = $this->db->get()->row(); 

                                                                        ?>
                                                                        <tr>
                                                                            <td> <?php if (!empty($completetaskorder->order_id)) echo $completetaskorder->order_id; ?> </td>
                                                                            <td> <?php if (!empty($groupid->group_id)) echo $groupid->group_id; ?> </td>
                                                                            <td> <?php if (!empty($completetaskorder->order_no)) echo $completetaskorder->order_no; ?> </td>
                                                                            <td> <?php if (!empty($completetaskorder->user_id)) echo $completetaskorder->user_id; ?> </td>
                                                                            <td> <?php if (!empty($completetaskorder->customer_name)) echo $completetaskorder->customer_name; ?> </td>
                                                                            <td> <?php if (!empty($completetaskorder->dropoff_address_line_1)) echo $completetaskorder->dropoff_address_line_1; ?> </td>
                                                                            <td> <?php if (!empty($completetaskorder->detail)) echo $completetaskorder->detail; ?> </td>
                                                                            <td> <?php if (!empty($completetaskorder->pickup_time)) echo $completetaskorder->pickup_time; ?> </td>
                                                                            <td> <?php if (!empty($completetaskorder->dropoff_time)) echo $completetaskorder->dropoff_time; ?> </td>
                                                                            <td>  </td>
                                                                            <td>  </td>
                                                                            <td> <?php if (!empty($completetaskorder->distance)) echo $completetaskorder->distance; ?> </td>
                                                                        </tr>
                                                                    <?php } ?>
                                                                </tbody>
                                                            </table>
                                                            </div>
                                                        </div>

                                                                <script>
                                                                        $(document).ready(function() {
                                                                        $('#download_pdf').click(function () {
                                                                        var pdf = new jsPDF('p', 'pt', 'letter')
                                                                        , source = $('#page_content')[0]
                                                                        , specialElementHandlers = {
                                                                        '#bypassme': function(element, renderer)
                                                                        {      
                                                                            return true
                                                                        }
                                                                        }
                                                                        margins = {
                                                                            top: 20,
                                                                            bottom: 20,
                                                                            left: 10,
                                                                            width: 1043,
                                                                            size: 8
                                                                        };
                                                                        pdf.fromHTML(
                                                                            source
                                                                            , margins.left
                                                                            , margins.top 
                                                                            , {
                                                                                'font-size': margins.size 
                                                                                , 'width': margins.width 
                                                                                , 'elementHandlers': specialElementHandlers
                                                                            },
                                                                        function (dispose) {
                                                                            pdf.save('download_pdf.pdf');
                                                                        },
                                                                        margins
                                                                        )
                                                                    });
                                                                    });
                                                                </script>

                                                        <div class="row">
                                                            <div class="col-md-12 col-lg-12 coll-sm-12 padding19" style="margin-top: 10px;">
                                                                <div class="col-md-3">
                                                                    <button type="submit" class="btn btn-default"><i class="icon-arrow-circle-left"></i> Preveous Date </button>
                                                                </div>
                                                                <div class="col-md-6 text-center text-margin">
                                                                    <span> Current Date </span>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <button type="submit" class="btn btn-default" style="float:right;">Next Date <i class="icon-arrow-circle-right"></i></button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </section>
                                                    <script>
                                                        jQuery(document).ready(function () {
                                                            jQuery('[data-toggle="tooltip"]').tooltip();
                                                        });
                                                    </script>
                                                </div>

                                                <div class="tab-pane fade1 tabs-container custom-width-style <?php if($data['profile_tab'] == "report") echo "active"; ?>" id="report">
                                                    <div class="scetion-title">
                                                        <h3> Get Report </h3>
                                                        <p> Note* Select either period or date duration</p>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                                            <div class="dashboard-content-holder">
                                                                <div class="cs-post-job">
                                                                    <form action="<?php echo base_url(); ?>index.php/home/vendorreportfororderquality" method="post" >
                                                                        <div class="input-info">
                                                                            <div class="row">
                                                                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                                                    <label> Period </label>
                                                                                    <div class="select-holder">
                                                                                        <select  data-placeholder="Please Select" class="chosen-select form-control" name="period">
                                                                                            <option value="">Select Period</option>
                                                                                            <option value="Daily">Daily</option>
                                                                                            <option value="Weekly">Weekly</option>
                                                                                            <option value="Monthly">Monthly</option>
                                                                                            <option value="Yearly">Yearly</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>

                                                                                <hr>

                                                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                    <label>From</label>
                                                                                    <div class="input-sec">
                                                                                        <input type="text" data-lang="en" data-large-mode="true" placeholder="dd-mm-yyyy" id="fromdate" name="fromdate" required>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                    <label>To</label>
                                                                                    <div class="input-sec">
                                                                                        <input type="text" data-lang="en" data-large-mode="true" required placeholder="dd-mm-yyyy" id="todate" name="todate">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 20px;">
                                                                                     <button type="submit" name="button_action" class="acc-submit cs-section-update cs-color csborder-color">Update</button> 
                                                                                   <style type="text/css">
                                                                                   .wp-jobhunt .cs-downlod-sec{
                                                                                    top: 0px !important;
                                                                                    right: 0px !important;
                                                                                   }
                                                                                   ..wp-jobhunt .cs-tabs .tab-content .cs-downlod-sec:hover{
                                                                                    top:0px;
                                                                                   }
                                                                                   </style>

                                                                                   <!--  <div class="cs-downlod-sec">
                                                                                        <a>Actions</a>
                                                                                        <ul>
                                                                                            <li><a href="#"> View Report </a></li>
                                                                                            <li><a href="" id="content_pdf" >Export As PDf</a></li>
                                                                                        </ul>
                                                                                    </div> -->
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                     
                                                                </div>
                                                            </div>
                                                        </div>

                                                         <script>
                                                                        $(document).ready(function() {
                                                                        $('#content_pdf').click(function () {
                                                                        var pdf = new jsPDF('p', 'pt', 'letter')
                                                                        , source = $('#page_download')[0]
                                                                        , specialElementHandlers = {
                                                                        '#bypassme': function(element, renderer)
                                                                        {      
                                                                            return true
                                                                        }
                                                                        }
                                                                        margins = {
                                                                            top: 40,
                                                                            bottom: 40,
                                                                            left: 20,
                                                                            width: 1043
                                                                        };
                                                                        pdf.fromHTML(
                                                                            source
                                                                            , margins.left
                                                                            , margins.top 
                                                                            , {
                                                                                'width': margins.width 
                                                                                , 'elementHandlers': specialElementHandlers
                                                                            },
                                                                        function (dispose) {
                                                                            pdf.save('download_pdf.pdf');
                                                                        },
                                                                        margins
                                                                        )
                                                                    });
                                                                    });
                                                                </script>


                                                        <div id="page_download" class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                                            <button id="content_pdf" class="acc-submit cs-section-update cs-color csborder-color">Export As PDF</button>

                                                            <?php if ($this->session->flashdata('report_msg') != "") { ?>
                                                                <div class="alert alert-warning alert-dismissable" style="margin-top: 10px;">
                                                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                                    <strong>Warning!</strong> <?php echo $this->session->flashdata('report_msg'); ?>
                                                                </div>
                                                            <?php } ?>

                                                            <div class="report" style="border: 1px solid #d5d5d5;margin-top: 17px;">
                                                                
                                                                    <div class="row report_info">
                                                                        <?php if ($data['period'] != "Daily") { ?>
                                                                            <div class="col-md-6 col-lg-6 coll-sm-6">
                                                                                <b>From :  <?php if (!empty($data['fromdate'])) echo $data['fromdate']; ?></b>
                                                                            </div>
                                                                            <div class="col-md-6 col-lg-6 coll-sm-6">
                                                                                <b>To :  <?php if (!empty($data['todate'])) echo $data['todate']; ?></b>
                                                                            </div>
                                                                            <div class="col-md-6 col-lg-6 coll-sm-6"></div>
                                                                        <?php } else { ?>
                                                                            <div class="col-md-6 col-lg-6 coll-sm-6">
                                                                                <b>Today</b>
                                                                            </div>
                                                                            <div class="col-md-6 col-lg-6 coll-sm-6">
                                                                            </div>
                                                                            <div class="col-md-6 col-lg-6 coll-sm-6"></div>
                                                                        <?php } ?>
                                                                    </div>
                                                                
                                                                <div class="row report_info">
                                                                    <div class="col-md-6 col-lg-6 coll-sm-6">
                                                                        Order Quality :  <?php if (!empty($data['totalquatity'])) echo $data['totalquatity']; ?>
                                                                    </div>
                                                                    <div class="col-md-6 col-lg-6 coll-sm-6"></div>
                                                                </div>
                                                                <div class="row report_info">
                                                                    <div class="col-md-6 col-lg-6 coll-sm-6">
                                                                        Distance :  <?php if (!empty($data['totaldistance'])) echo $data['totaldistance']; ?>
                                                                    </div>
                                                                    <div class="col-md-6 col-lg-6 coll-sm-6"></div>
                                                                </div>
                                                                <div class="row report_info">
                                                                    <div class="col-md-6 col-lg-6 coll-sm-6">
                                                                        Cancelled Order :  <?php if (!empty($data['totalcancelled'])) echo $data['totalcancelled']; ?>
                                                                    </div>
                                                                    <div class="col-md-6 col-lg-6 coll-sm-6"></div>
                                                                </div>
                                                                <div class="row report_info">
                                                                    <div class="col-md-6 col-lg-6 coll-sm-6">
                                                                        Distance (K.M) :  <?php if (!empty($data['totalamount'])) echo $data['totalamount']; ?>
                                                                    </div>
                                                                    <div class="col-md-6 col-lg-6 coll-sm-6"></div>
                                                                </div>
                                                                <br>
                                                                <br>
                                                                <br>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                

                                                <div class="tab-pane fade1 tabs-container <?php if($data['profile_tab'] == "change_password") echo "active"; ?>" id="change_password">
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
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </section>
            </div>
        </div>
    </div>
</main>
</div>
</div>
<div class="clear"></div>




<!-- Modal for creating customer starts -->
<div class="modal fade" id="addorderDialog" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">                        
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Add Order</h4>
            </div>                        
            <form  method="post" action="<?php echo site_url();?>/home/addorder"> 
                <input type="hidden" name="vendorid" value="<?php if (!empty($data['vendordatainfo'])) echo $data['vendordatainfo']->user_id; ?>">
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-sm-12 col-md-12">
                            <label class="col-md-3 control-label asterisk"> Order No </label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="orderno" required="required">
                            </div>
                        </div>
                        <div class="form-group col-sm-12 col-md-12">
                            <label class="col-md-3 control-label asterisk"> Customer Name </label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="customername" required="required">
                            </div>
                        </div> 
                        <div class="form-group col-sm-12 col-md-12">
                            <label class="col-md-3 control-label asterisk"> Customer Contact </label>
                            <div class="col-md-9">
                                <input type="url" class="form-control" name="customercontact" required="required">
                            </div>
                        </div> 
                        <div class="form-group col-sm-12 col-md-12">
                            <label class="col-md-3 control-label asterisk"> Detail </label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="details" required="required">
                            </div>
                        </div>
                        <div class="form-group col-sm-12 col-md-12">
                            <label class="col-md-3 control-label asterisk"> Instruction </label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="instruction" required="required">
                            </div>
                        </div>
                        <div class="form-group col-sm-12 col-md-12">
                            <label class="col-md-3 control-label asterisk"> Contact </label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="contact" required="required">
                            </div>
                        </div> 
                        <div class="form-group col-sm-12 col-md-12">
                            <label class="col-md-3 control-label asterisk"> Pickup Address Line 1 </label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="pickupaddline1" required="required">
                            </div>
                        </div>
                        <div class="form-group col-sm-12 col-md-12">
                            <label class="col-md-3 control-label asterisk"> Pickup Address Line 2 </label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="pickupaddline2" required="required">
                            </div>
                        </div>
                        <div class="form-group col-sm-12 col-md-12">
                            <label class="col-md-3 control-label asterisk"> Pickup City </label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="pickupcity" required="required">
                            </div>
                        </div>
                        <div class="form-group col-sm-12 col-md-12">
                            <label class="col-md-3 control-label asterisk"> Pickup Postcode </label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="pickuppostcode" required="required">
                            </div>
                        </div>
                        <div class="form-group col-sm-12 col-md-12">
                            <label class="col-md-3 control-label asterisk"> Pickup State </label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="pickupstate" required="required">
                            </div>
                        </div>
                        <div class="form-group col-sm-12 col-md-12">
                            <label class="col-md-3 control-label asterisk"> Pickup Time </label>
                            <div class="col-md-9">
                                <input type="text" style="border: 1px solid rgb(228, 228, 228);" class="form-control" name="pickuptime" required="required">
                            </div>
                        </div>
                        <div class="form-group col-sm-12 col-md-12">
                            <label class="col-md-3 control-label asterisk"> Pickup Date </label>
                            <script>
                                jQuery(function(){
                                    jQuery("#datepicker3").datetimepicker({
                                         format:"Y-m-d",
                                        timepicker:false
                                    });
                                });
                            </script>
                            <div class="col-md-9">
                                <input type="text" id="datepicker3"  style="border: 1px solid rgb(228, 228, 228);" class="form-control" name="pickupdate" required="required">
                            </div>
                        </div>
                        <div class="form-group col-sm-12 col-md-12">
                            <label class="col-md-3 control-label asterisk"> Drop off Address Line 1</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="dropofaddline1" required="required">
                            </div>
                        </div>
                        <div class="form-group col-sm-12 col-md-12">
                            <label class="col-md-3 control-label asterisk"> Drop off Address Line2</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="dropofaddline2" required="required">
                            </div>
                        </div>
                        <div class="form-group col-sm-12 col-md-12">
                            <label class="col-md-3 control-label asterisk"> Drop City </label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="dropcity" required="required">
                            </div>
                        </div>
                        <div class="form-group col-sm-12 col-md-12">
                            <label class="col-md-3 control-label asterisk"> Drop off Postcode </label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="dropofpostcode" required="required">
                            </div>
                        </div>
                        <div class="form-group col-sm-12 col-md-12">
                            <label class="col-md-3 control-label asterisk"> Drop off State </label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="dropofstate" required="required">
                            </div>
                        </div>
                        <div class="form-group col-sm-12 col-md-12">
                            <label class="col-md-3 control-label asterisk"> Drop off Time </label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="dropoftime" required="required">
                            </div>
                        </div>
                        <div class="form-group col-sm-12 col-md-12">
                            <label class="col-md-3 control-label asterisk"> Drop off Date </label>
                             <script>
                                jQuery(function(){
                                    jQuery("#datepicker4").datetimepicker({
                                        format:"Y-m-d",
                                        timepicker:false
                                    });
                                });
                            </script>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="datepicker4" name="dropofdate" required="required">
                            </div>
                        </div>
                        <div class="form-group col-sm-12 col-md-12">
                            <label class="col-md-3 control-label asterisk"> Quanity </label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="quanity" required="required">
                            </div>
                        </div>
                        <div class="form-group col-sm-12 col-md-12">
                            <label class="col-md-3 control-label asterisk"> Oder Type </label>
                            <div class="col-md-9">
                                <select class="form-control" name="ordertype" required="required">
                                    <?php foreach ($data['ordertypedatalist'] as $ordertypedata) { ?>
                                        <option value="<?php echo $ordertypedata->title; ?>"> <?php echo $ordertypedata->title; ?>  </option>
                                    <?php } ?>    
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-sm-12 col-md-12">
                            <label class="col-md-3 control-label asterisk"> Delivery Time </label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="deliverytime" required="required">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" onclick='' class="btn btn-primary">Add</button>
                </div>
                
            </form>
        </div>
    </div>
</div>
<!-- create customer modal ends -->





<script>
      var customLabel = {
        restaurant: {
          label: 'R'
        },
        bar: {
          label: 'B'
        }
      };

        function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: new google.maps.LatLng(-33.863276, 151.207977),
          zoom: 8
        });
        var infoWindow = new google.maps.InfoWindow;

          // Change this depending on the name of your PHP or XML file    
          downloadUrl('<?php echo base_url(); ?>/index.php/home/maplocation', function(data) {
            var xml = data.responseXML;
            var markers = xml.documentElement.getElementsByTagName('marker');
            Array.prototype.forEach.call(markers, function(markerElem) {
              var id = markerElem.getAttribute('id');
              var name = markerElem.getAttribute('name');
              var address = markerElem.getAttribute('address');
              var type = markerElem.getAttribute('type');
              var point = new google.maps.LatLng(
                  parseFloat(markerElem.getAttribute('lat')),
                  parseFloat(markerElem.getAttribute('lng')));

              var infowincontent = document.createElement('div');
              var strong = document.createElement('strong');
              strong.textContent = name
              infowincontent.appendChild(strong);
              infowincontent.appendChild(document.createElement('br'));

              var text = document.createElement('text');
              text.textContent = address
              infowincontent.appendChild(text);
              var icon = customLabel[type] || {};
              var marker = new google.maps.Marker({
                id: id,
                text: text,
                map: map,
                position: point,
                label: icon.label
              });
              marker.addListener('click', function() {
                data = {};
                data['id'] = marker.id;

                $.ajax({   

                    type: "POST",  
                    url: "<?php echo base_url(); ?>index.php/home/getRiderCustomerData",  
                    cache:false,  
                    data: data,
                    dataType: "json",       
                    success: function(response)  
                    {  
                      $('#rider_id').text(response.location.rider_id);
                      $('#rider_name').text(response.location.name);
                      $('#current_location').text(response.address);
                      $('#eta').text(response.location.eta);
                      $('#customer_name').text(response.location.customer_name);
                      $('#customer_contact').text(response.location.customer_contact);
                      $('#drop_off_loc').text(response.location.dropoff_address_line_1);
                      $('#order_id').text(response.location.order_id);
                      $('#group_id').text(response.location.group_id);
                      $('#rider_number').text(response.location.mobile);
                      $("#riderImg").attr('src',"<?php echo base_url();?>admin/images/vendor/"+response.location.image_url) 
                    } 

                });


              });
            });
          });
        }



      function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;

        request.onreadystatechange = function() {
          if (request.readyState == 4) {
            request.onreadystatechange = doNothing;
            callback(request, request.status);
          }
        };

        request.open('GET', url, true);
        request.send(null);
      }

      function doNothing() {}



   

    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAnaHkFFR6tUuVZ-MjXB-0CjM9TieZiYnw&callback=initMap">
    </script>



