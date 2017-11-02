<div id="wrapper">
        <!-- BEGIN MAIN SIDEBAR -->
        <nav id="sidebar">
            <div id="main-menu">
                <ul class="sidebar-nav">

                    <?php
                        if ($pageName == "HOME")
                            echo "<li class='current'>";
                        else
                            echo "<li>";
                    ?>         
                        <a href="<?php echo site_url('admin/home'); ?>"><i class="fa fa-home"></i><span class="sidebar-text">Home</span></a>
                    </li>
                    <?php
                        if ($pageName == "MANAGEORDERS")
                            echo "<li class='current'>";
                        else
                            echo "<li>";
                    ?>    
                        <a href="<?php echo site_url('admin/manage_orders'); ?>"><i class="fa fa-shopping-cart"></i><span class="sidebar-text">Manage Orders</span></a>
                    </li>
                    <?php
                        if ($pageName == "GROUPORDERS")
                            echo "<li class='current'>";
                        else
                            echo "<li>";
                    ?>   
                        <a href="<?php echo site_url('admin/group_orders'); ?>"><i class="glyph-icon flaticon-frontend"></i><span class="sidebar-text">Group Orders</span></a>
                    </li>
                    <?php
                        if ($pageName == "TASKLIST")
                            echo "<li class='current'>";
                        else
                            echo "<li>";
                    ?>   
                        <a href="<?php echo site_url('admin/task_list'); ?>"><i class="fa fa-list"></i><span class="sidebar-text">Task List</span></a>
                    </li>
                    <?php
                        if ($pageName == "ONGOINGTASKS")
                            echo "<li class='current'>";
                        else
                            echo "<li>";
                    ?>   
                        <a href="<?php echo site_url('admin/ongoing_tasks'); ?>"><i class="fa fa-angle-right"></i><span class="sidebar-text">Ongoing Tasks</span></a>
                    </li>
                    <?php
                        if ($pageName == "COMPLETEDTASKS")
                            echo "<li class='current'>";
                        else
                            echo "<li>";
                    ?>   
                        <a href="<?php echo site_url('admin/completed_tasks'); ?>"><i class="fa fa-check"></i><span class="sidebar-text">Completed Tasks</span></a>
                    </li>
                    <?php
                        if ($pageName == "RIDERREPORT")
                            echo "<li class='current'>";
                        else
                            echo "<li>";
                    ?>   
                        <a href="<?php echo site_url('admin/rider_report'); ?>"><i class="glyph-icon flaticon-frontend"></i><span class="sidebar-text">Rider Report</span></a>
                    </li>
                   <?php
                        if ($pageName == "DASHBOARD")
                            echo "<li class='current'>";
                        else
                            echo "<li>";
                    ?>   
                        <a href="<?php echo site_url('admin/dashboard'); ?>"><i class="fa fa-dashboard"></i><span class="sidebar-text">Dashboard</span></a>
                    </li>
                    <?php
                        if ($pageName == "REPORTS")
                            echo "<li class='current'>";
                        else
                            echo "<li>";
                    ?>
                        <a href="<?php echo site_url('admin/reports'); ?>"><i class="glyph-icon flaticon-frontend"></i><span class="sidebar-text">Reports</span></a>
                    </li>
                     <?php
                        if ($pageName == "VENDORS")
                            echo "<li class='current'>";
                        else
                            echo "<li>";
                    ?>
                        <a href="<?php echo site_url('admin/vendors'); ?>"><i class="fa fa-users"></i><span class="sidebar-text">Vendors</span></a>
                    </li>
                    <?php
                        if ($pageName == "RIDERS")
                            echo "<li class='current'>";
                        else
                            echo "<li>";
                    ?>
                        <a href="<?php echo site_url('admin/riders'); ?>"><i class="glyph-icon flaticon-frontend"></i><span class="sidebar-text">Riders</span></a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- END MAIN SIDEBAR -->
