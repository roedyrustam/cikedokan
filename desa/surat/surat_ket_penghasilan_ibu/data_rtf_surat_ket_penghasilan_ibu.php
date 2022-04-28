<?php if (!defined('BASEPATH')) exit ('No direct script access allowed');

$this->load->helper('terbilang_helper');

	// -- penghasilan ibu
	if (isset($input['hasil_ibu']))
		$hasil_ibu = preg_replace("/[^0-9]/", "", $input['hasil_ibu']);
	$buffer = str_replace("[hasil_ibu]", Rupiah($hasil_ibu), $buffer);
	$buffer = str_replace("[tbl_hasil_ibu]", ucwords(terbilang($hasil_ibu)), $buffer);
?>