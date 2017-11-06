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
                                    <input type="text" data-lang="en" data-large-mode="true" placeholder="yyyy-mm-dd" id="fromdate" name="fromdate" required>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <label>To</label>
                                <div class="input-sec">
                                    <input type="text" data-lang="en" data-large-mode="true" required placeholder="yyyy-mm-dd" id="todate" name="todate">
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