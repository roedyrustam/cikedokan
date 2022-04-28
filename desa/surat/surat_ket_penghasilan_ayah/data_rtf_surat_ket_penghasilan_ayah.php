<?php if (!defined('BASEPATH')) exit ('No direct script access allowed');

$this->load->helper('terbilang_helper');

	// -- penghasilan ayah
	if (isset($input['hasil_ayah']))
		$hasil_ayah = preg_replace("/[^0-9,]/", "", $input['hasil_ayah']);
	$buffer = str_replace("[hasil_ayah]", Rupiah($hasil_ayah), $buffer);
	$buffer = str_replace("[tbl_hasil_ayah]", ucwords(terbilang($hasil_ayah)), $buffer);
?>