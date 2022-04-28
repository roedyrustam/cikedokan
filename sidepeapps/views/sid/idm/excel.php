<?php
  header("Content-type: application/octet-stream");
  header("Content-Disposition: attachment; filename=data_idm".date('Y-m-d').".xls");
  header("Pragma: no-cache");
  header("Expires: 0");

  include("sidepeapps/views/sid/idm/cetak.php");
