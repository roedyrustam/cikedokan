<?php class Pembangunan_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function insert($data)
	{
		$outp = $this->db->insert('pembangunan', $data);
		return $outp;
	}

	public function get(&$artikel)
	{

	    $artikel['pembangunan'] = $this->db->query('select * from pembangunan where id_artikel = '.$artikel['id'])->row_array();
	}

	public function update($id, $data)
	{
		$this->db->where('id_pembangunan', $id);
		$outp = $this->db->update('pembangunan', $data);
		return $outp;
	}

}
?>