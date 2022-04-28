<?php


	if(!function_exists('terbilang_penyebut'))
	{
		function terbilang_penyebut($nilai) {
		$nilai = abs($nilai);
		$huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
		$temp = "";
		if ($nilai < 12) {
			$temp = " ". $huruf[$nilai];
		} else if ($nilai <20) {
			$temp = terbilang_penyebut($nilai - 10). " belas";
		} else if ($nilai < 100) {
			$temp = terbilang_penyebut($nilai/10)." puluh". terbilang_penyebut($nilai % 10);
		} else if ($nilai < 200) {
			$temp = " seratus" . terbilang_penyebut($nilai - 100);
		} else if ($nilai < 1000) {
			$temp = terbilang_penyebut($nilai/100) . " ratus" . terbilang_penyebut($nilai % 100);
		} else if ($nilai < 2000) {
			$temp = " seribu" . terbilang_penyebut($nilai - 1000);
		} else if ($nilai < 1000000) {
			$temp = terbilang_penyebut($nilai/1000) . " ribu" . terbilang_penyebut($nilai % 1000);
		} else if ($nilai < 1000000000) {
			$temp = terbilang_penyebut($nilai/1000000) . " juta" . terbilang_penyebut($nilai % 1000000);
		} else if ($nilai < 1000000000000) {
			$temp = terbilang_penyebut($nilai/1000000000) . " milyar" . terbilang_penyebut(fmod($nilai,1000000000));
		} else if ($nilai < 1000000000000000) {
			$temp = terbilang_penyebut($nilai/1000000000000) . " trilyun" . terbilang_penyebut(fmod($nilai,1000000000000));
		}     
		return $temp;
	}
	}

	if(!function_exists('terbilang'))
	{

	function terbilang($nilai) {
		if($nilai<0) {
			$hasil = "minus ". trim(terbilang_penyebut($nilai));
		} else {
			$hasil = trim(terbilang_penyebut($nilai));
		}     		
		return $hasil;
	}
	}
