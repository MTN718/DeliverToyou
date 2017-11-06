
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
.icon-plus::before{ content: "\f067";}
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

                                                <?php include('vendor_tabs/vendor_map_tab.php') ?>

                                            </div>

                                            <div class="tab-pane fade1 tabs-container custom-width-style <?php if($data['profile_tab'] == "insert_order") echo "active"; ?>" id="insert_order">

                                                <?php include('vendor_tabs/vendor_insert_order_tab.php'); ?>

                                            </div>

                                            <div class="tab-pane fade1 tabs-container custom-width-style <?php if($data['profile_tab'] == "ongoing_order") echo "active"; ?>" id="ongoing_order">

                                                <?php include('vendor_tabs/vendor_ongoing_order_tab.php'); ?>

                                            </div>

                                            <div class="tab-pane fade1 tabs-container custom-width-style <?php if($data['profile_tab'] == "completed_order") echo "active"; ?>" id="completed_order">

                                                <?php include('vendor_tabs/vendor_complete_order_tab.php'); ?>

                                            </div>

                                            <div class="tab-pane fade1 tabs-container custom-width-style <?php if($data['profile_tab'] == "report") echo "active"; ?>" id="report">

                                                <?php include('vendor_tabs/vendor_report_tab.php'); ?>

                                            </div>


                                            <div class="tab-pane fade1 tabs-container <?php if($data['profile_tab'] == "change_password") echo "active"; ?>" id="change_password">

                                                <?php include('vendor_tabs/vendor_change_password_tab.php'); ?>

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


<?php include('vendor_tabs/vendor_modal.php'); ?>

