<?php class Agenda_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function insert($data)
	{
		$outp = $this->db->insert('agenda', $data);
		return $outp;
	}

	public function get(&$artikel)
	{

	    $artikel['agenda'] = $this->db->query('select * from agenda where id_artikel = '.$artikel['id'])->row_array();
	}

	public function update($id, $data)
	{
		$this->db->where('id', $id);
		$outp = $this->db->update('agenda', $data);
		return $outp;
	}

}
?>