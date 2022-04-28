<?php

class Notif_model extends CI_Model {

	public function artikel_baru()
	{
		$num_rows = $this->db->where('by_warga', 1)
			->where('enabled', 2)
			->get('artikel')->num_rows();
		return $num_rows;
	}
	
	public function komentar_baru()
	{
		$num_rows = $this->db->where('id_artikel !=', LAPORAN_MANDIRI)
			->where('enabled', 2)
			->get('komentar')->num_rows();
		return $num_rows;
	}

	public function lapor_baru()
	{
		$num_rows = $this->db->where("id_artikel", LAPORAN_MANDIRI)
			->where('enabled', 2)
			->get('komentar')->num_rows();
		return $num_rows;
	}

}

?>