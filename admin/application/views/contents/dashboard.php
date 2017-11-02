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
                                    <?php foreach ($completelistondashborad as $completeliston) { ?> 
                                        <tr>
                                            <td> <?php if (!empty($completeliston->username)) echo $completeliston->username; ?> </td>
                                            <td> <?php if (!empty($completeliston->quantity)) echo $completeliston->quantity; ?> </td>
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
                                    <?php foreach ($ongoingorderlistondashborad as $ongoingorderlist) { ?> 
                                        <tr>
                                            <td> <?php if (!empty($ongoingorderlist->username)) echo $ongoingorderlist->username; ?> </td>
                                            <td> <?php if (!empty($ongoingorderlist->quantity)) echo $ongoingorderlist->quantity; ?> </td>
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
                                    <?php foreach ($unassignorderlistondashborad as $unassignorderlist) { ?>        
                                        <tr>
                                            <td> <?php if (!empty($unassignorderlist->username)) echo $unassignorderlist->username; ?> </td>
                                            <td> <?php if (!empty($unassignorderlist->quantity)) echo $unassignorderlist->quantity; ?> </td>
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
                                    <?php foreach ($onlineriderlistondashborad as $onlineriderlist) { ?> 
                                        <tr>
                                            <td> <?php if (!empty($onlineriderlist->username)) echo $onlineriderlist->username; ?> </td>
                                            <td> <?php if (!empty($onlineriderlist->username)) echo $onlineriderlist->username; ?> </td>
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
                                    <?php foreach ($onlineriderlistondashborad as $onlineriderlist) { ?> 
                                        <tr>
                                            <td> <?php if (!empty($onlineriderlist->username)) echo $onlineriderlist->username; ?> </td>
                                            <td> <?php if (!empty($onlineriderlist->username)) echo $onlineriderlist->username; ?> </td>
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
                                    <?php foreach ($cancelorderlistondashborad as $cancelorderlist) { ?> 
                                        <tr>
                                            <td> <?php if (!empty($cancelorderlist->username)) echo $cancelorderlist->username; ?> </td>
                                            <td> <?php if (!empty($cancelorderlist->quantity)) echo $cancelorderlist->quantity; ?> </td>
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
