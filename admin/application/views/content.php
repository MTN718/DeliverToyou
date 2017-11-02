<?php
switch($pageName) {
  case "HOME":
  include('contents/home.php');
  break;
  case "MAPLOCATION":
  include('contents/map_locations.php');
  break;
  case "DASHBOARD":
  include('contents/dashboard.php');
  break;
  case "MANAGEORDERS":
  include('contents/manage_orders.php');
  break;
  case "GROUPORDERS":
  include('contents/group_orders.php');
  break;
  case "VENDOROVERVIEW":
  include('contents/vendor_overview.php');
  break;
  case "TASKLIST":
  include('contents/task_list.php');
  break;
  case "ONGOINGTASKS":
  include('contents/ongoing_tasks.php');
  break;
  case "COMPLETEDTASKS":
  include('contents/completed_tasks.php');
  break;
  case "RIDERREPORT":
  include('contents/rider_report.php');
  break;
  case "REPORTS":
  include('contents/reports.php');
  break;
  case "VENDORS":
  include('contents/vendors.php');
  break;
  case "RIDERS":
  include('contents/riders.php');
  break;
  case "EIDTRIDERS":
  include('contents/edit_riders.php');
  break;
  case "EIDTVENDOR":
  include('contents/edit_vendor.php');
  break;
  case "EIDTONGOINGTASK":
  include('contents/edit_ongoing_task.php');
  break;
  case "EIDTTASKLIST":
  include('contents/edit_task_list.php');
  break;
  
}
