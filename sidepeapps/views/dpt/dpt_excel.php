<?php
  header("Content-type: application/octet-stream");
  header("Content-Disposition: attachment; filename=DPT_".$_SESSION['tanggal_pemilihan'].".xls");
  header("Pragma: no-cache");
  header("Expires: 0");

  include("sidepeapps/views/dpt/dpt_print.php");
