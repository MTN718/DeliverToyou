<div id="main-content" class="dashboard">
    <div class="row">
        <div class="col-lg-4 col-md-6">
            <div class="panel bd-0">
                <div class="panel-heading no-bd bg-red">
                    <h3 class="panel-title"><strong> Completed </strong> Orders </h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-striped table-hover table-dynamic">
                                <thead>
                                    <tr>
                                        <th>Vendor Name</th>
                                        <th>Order Quantity</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($completelistondashborad as $completeliston) { 
                                        $this->db->select('*');
                                        $this->db->from('order');
                                        $this->db->where('order_status_id',4);
                                        $this->db->where('order.vendor_id',$completeliston->vendor_id);
                                        $completeordercount = $this->db->get()->num_rows();
                                        ?> 
                                        <tr>
                                            <td> <?php if (!empty($completeliston->username)) echo $completeliston->username; ?> </td>
                                            <td> <?php if (!empty($completeordercount)) echo $completeordercount; ?> </td>
                                        </tr>
                                    <?php } ?>         
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6">
            <div class="panel bd-0">
                <div class="panel-heading no-bd bg-red">
                    <h3 class="panel-title"><strong>Ongoing</strong> Orders</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-striped table-hover table-dynamic">
                                <thead>
                                    <tr>
                                        <th>Vendor Name</th>
                                        <th>Order Quantity</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($ongoingorderlistondashborad as $ongoingorderlist) { 
                                        $this->db->select('*');
                                        $this->db->from('order');
                                        $this->db->where('order_status_id',2);
                                        $this->db->where('order.vendor_id',$ongoingorderlist->vendor_id);
                                        $ongoingordercount = $this->db->get()->num_rows();
                                        ?> 
                                        <tr>
                                            <td> <?php if (!empty($ongoingorderlist->username)) echo $ongoingorderlist->username; ?> </td>
                                            <td> <?php if (!empty($ongoingordercount)) echo $ongoingordercount; ?> </td>
                                        </tr>
                                    <?php } ?> 
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6">
            <div class="panel bd-0">
                <div class="panel-heading no-bd bg-red">
                    <h3 class="panel-title"><strong>Unassigned</strong> Orders</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-striped table-hover table-dynamic">
                                <thead>
                                    <tr>
                                        <th>Vendor Name</th>
                                        <th>Order Quantity</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($unassignorderlistondashborad as $unassignorderlist) { 
                                        $this->db->select('*');
                                        $this->db->from('order');
                                        $this->db->where('order_status_id',1);
                                        $this->db->where('order.vendor_id',$unassignorderlist->vendor_id);
                                        $unassignordercount = $this->db->get()->num_rows();
                                        ?>        
                                        <tr>
                                            <td> <?php if (!empty($unassignorderlist->username)) echo $unassignorderlist->username; ?> </td>
                                            <td> <?php if (!empty($unassignordercount)) echo $unassignordercount; ?> </td>
                                        </tr>
                                    <?php } ?>            
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 col-md-6">
            <div class="panel bd-0">
                <div class="panel-heading no-bd bg-red">
                    <h3 class="panel-title"><strong>Online</strong> Riders</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-striped table-hover table-dynamic">
                                <thead>
                                    <tr>
                                        <th>Rider Id</th>
                                        <th>Location</th>
                                    </tr>
                                </thead>
                                <tbody>   
                                    <?php if(isset($onlineriderlistondashborad) and !empty($onlineriderlistondashborad)) foreach ($onlineriderlistondashborad as $onlineriderlist) { ?>
                                        <tr>
                                            <td> <?php if (!empty($onlineriderlist->user_id)) echo $onlineriderlist->user_id; ?> </td>
                                            <td> <?php if (!empty($onlineriderlist->address)) echo $onlineriderlist->address; ?> </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6">
            <div class="panel bd-0">
                <div class="panel-heading no-bd bg-red">
                    <h3 class="panel-title"><strong> Available </strong> Riders</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-striped table-hover table-dynamic">
                                <thead>
                                    <tr>
                                        <th>Rider Id</th>
                                        <th>Location</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($avaliableriderlistondashborad as $avaliableriderlist) { ?> 
                                        <tr>
                                            <td> <?php if (!empty($avaliableriderlist->user_id)) echo $avaliableriderlist->user_id; ?> </td>
                                            <td> <?php if (!empty($avaliableriderlist->address)) echo $avaliableriderlist->address; ?> </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6">
            <div class="panel bd-0">
                <div class="panel-heading no-bd bg-red">
                    <h3 class="panel-title"><strong>Cancelled</strong> Orders</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-striped table-hover table-dynamic">
                                <thead>
                                    <tr>
                                        <th>Vendor Name</th>
                                        <th>Order Quantity</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($cancelorderlistondashborad as $cancelorderlist) { 
                                        $this->db->select('*');
                                        $this->db->from('order');
                                        $this->db->where('order_status_id',3);
                                        $this->db->where('order.vendor_id',$cancelorderlist->vendor_id);
                                        $cancelordercount = $this->db->get()->num_rows();
                                        ?> 
                                        <tr>
                                            <td> <?php if (!empty($cancelorderlist->username)) echo $cancelorderlist->username; ?> </td>
                                            <td> <?php if (!empty($cancelordercount)) echo $cancelordercount; ?> </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
