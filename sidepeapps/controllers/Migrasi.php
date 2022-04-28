<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
ini_set('max_execution_time', 0); 
ini_set('memory_limit','2048M');

class Migrasi extends CI_Controller
{   
	function __construct()
	{
		parent::__construct();
	}

	/* SISTEM PERUBAHAN MASSAL DB TABEL PENGELUARAN */
	public function fixed_kategori_slug()
	{
		$query = $this->db->get('kategori');
		foreach ($query->result() as $key => $row) {
			$name 		= $row->kategori;
			$slug 	= url_title($name, '-', TRUE);

			$data 	= array('kategori_slug' => $slug);

			$query 	= $this->db->update('kategori', $data, array('id'=>$row->id));
		}

		if($query) echo "Berhasil";
		else echo 'Gagal';
	}

	/* SISTEM PERUBAHAN MASSAL DB TABEL PENGELUARAN */
	public function fixed_artikel_slug()
	{
		$query = $this->db->get('artikel');
		foreach ($query->result() as $key => $row) {
			$name 		= $row->judul;
			$slug 	= url_title($name, '-', TRUE);

			$data 	= array('slug' => $slug);

			$query 	= $this->db->update('artikel', $data, array('id'=>$row->id));
		}

		if($query) echo "Berhasil";
		else echo 'Gagal';
	}
}