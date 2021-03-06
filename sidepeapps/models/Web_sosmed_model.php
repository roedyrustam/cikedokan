<?php

class Web_sosmed_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function get_sosmed($id=0)
	{
		$sql = "SELECT * FROM media_sosial WHERE id = ?";
		$query = $this->db->query($sql, $id);
		$data = $query->row_array();
		return $data;
	}

	public function list_sosmed()
	{
		$sql = "SELECT * FROM media_sosial WHERE 1";
		$query = $this->db->query($sql);
		$data = $query->result_array();
		return $data;
	}

	public function update($id=0)
	{
		$data = $_POST;

		$sql = "SELECT * FROM media_sosial WHERE id = ? ";
		$query = $this->db->query($sql, $id);
		$hasil = $query->result_array();

		if ($hasil)
		{
			$this->db->where('id', $id);
			$outp = $this->db->update('media_sosial', $data);
		}
		else
		{
			$outp = $this->db->insert('media_sosial', $data);
		}

		if ($outp) $_SESSION['success'] = 1;
		else $_SESSION['success'] = -1;
	}

	public function link_sosmed($id, $link)
	{
		if (empty($link)) return $link;

		switch ($id) {
			case '6':
				// Whatsapp. $link adalah nomor telpon WA seperti +6281234567890
				$link = "https://api.whatsapp.com/send?phone=" . preg_replace('/[^0-9]/', '', $link);
				break;
			default:
				break;
		}
		return $link;
	}

}
?>
