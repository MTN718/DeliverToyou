<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <base href="<?php echo base_url(); ?>"/>
  <!-- <link rel="icon" href="<?php echo base_url('assets/images/logo.png'); ?>" type="image/png" sizes="16x16"> -->
  <!-- <title><?php echo $page_title; ?></title> -->
  <script src="https://code.jquery.com/jquery-1.11.1.min.js" integrity="sha256-VAvG3sHdS5LqTT+5A/aeq/bZGa/Uj04xKxY8KM/w9EE=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <?php
    /* getting this meta data from karyon_config.php file which is under application > config folder */
    foreach ($meta_data as $name => $content) {
        if (!empty($content))
            echo "<meta name='$name' content='$content'>";
    }

    /* getting this stylesheets from karyon_config.php file which is under application > config folder */
    foreach ($stylesheets as $media => $files) {
        foreach ($files as $file) {
            echo "<link href='$file' rel='stylesheet'>";
        }
    }

    /* getting this scripts from karyon_config.php file which is under application > config folder */
    foreach ($scripts['head'] as $file) {
        echo "<script src='$file'></script>";
    }
    ?>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.4.2/css/buttons.dataTables.min.css">

  <style type="text/css">
    .modal-dialog {
      width: 760px;
      margin: 30px auto;
    }
  </style>
</head>
