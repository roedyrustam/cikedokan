<?php


/**
 * Menghasilkan csv dari data tabel
 * Baris pertama berisi nama kolom
 * Saat ini pemisah menggunakan ','
 * Acuan: https://stackoverflow.com/questions/4249432/export-to-csv-via-php
 *
 * @access  public
 * @param	string	nama tabel yang akan diekspor
 * @return  string
 */

function get_kategori_anggaran_parent($id_parrent)
{
	$CI =& get_instance();

	$id_parrent = (int) $id_parrent;
	$data = $CI->db->where('id', $id_parrent)->get('apbdes_kategori')->row_array();
	if (count($data) > 0)
		return $data['kategori'];
	
	return "n/a";
}

function get_csv($table)
{
	$CI =& get_instance();
	$CI->load->database();

	$data = $CI->db->get($table)->result_array();
	if (count($data) == 0)
		return null;

	ob_start();
	$df = fopen("php://output", 'w');
	fputcsv($df, array_keys(reset($data)));
	foreach ($data as $row)
	{
		fputcsv($df, $row);
	}
	fclose($df);
	return ob_get_clean();
}

/**
 * Paksa download file
 *
 * @access  public
 * @param	string	nama file untuk didownload
 * @return  string
 */
function download_send_headers($filename)
{
	// disable caching
	$now = gmdate("D, d M Y H:i:s");
	header("Expires: Tue, 03 Jul 2001 06:00:00 GMT");
	header("Cache-Control: max-age=0, no-cache, must-revalidate, proxy-revalidate");
	header("Last-Modified: {$now} GMT");

	// force download
	header("Content-Type: application/force-download");
	header("Content-Type: application/octet-stream");
	header("Content-Type: application/download");

	// disposition / encoding on response body
	header("Content-Disposition: attachment;filename={$filename}");
	header("Content-Transfer-Encoding: binary");
}

?>