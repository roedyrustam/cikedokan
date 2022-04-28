<?php class Potensi_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function insert($data)
	{
		$outp = $this->db->insert('potensi', $data);
		return $outp;
	}

	public function get(&$artikel)
	{

	    $artikel['potensi'] = $this->db->query('select * from potensi where id_artikel = '.$artikel['id'])->row_array();
	}

	public function update($id, $data)
	{
		$this->db->where('id_potensi', $id);
		$outp = $this->db->update('potensi', $data);
		return $outp;
	}

}
?>