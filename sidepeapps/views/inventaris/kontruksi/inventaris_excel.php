<?php
  $tgl =  date('d_m_Y');
  header("Content-type: application/octet-stream");
  header("Content-Disposition: attachment; filename=Inventaris_kontruksi_".$tgl.".xls");
  header("Pragma: no-cache");
  header("Expires: 0");

  include("sidepeapps/views/inventaris/kontruksi/inventaris_print.php");
