<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Anggaran_model extends CI_Model
{

	private $tahun;

	function __construct()
	{
		$this->tahun = date('Y');
	}

	function get_all()
	{
		$this->db->select('a.*, b.kategori, c.judul, c.slug');
		$this->db->from('apbdes as a');
		$this->db->join('apbdes_kategori as b', 'b.id=a.id_kategori', 'LEFT');
		$this->db->join('artikel as c', 'c.id=a.id_artikel', 'LEFT');
		$this->db->group_by('a.id');
		$data = $this->db->get();

		return $data;
	}

	function get($param = NULL, $group = 'a.id', $order = 'nama_anggaran DESC, tahun DESC, tahap ASC')
	{
		$this->db->select('a.*, b.kategori, b.parrent, c.judul, c.slug, c.id_kategori as id_kategori_artikel');
		$this->db->from('apbdes as a');
		$this->db->join('apbdes_kategori as b', 'b.id=a.id_kategori', 'LEFT');
		$this->db->join('artikel as c', 'c.id=a.id_artikel', 'LEFT');
		if (!is_null($param)) $this->db->where($param);
		$this->db->group_by($group);
		$this->db->order_by($order);
		$data = $this->db->get();

		return $data;
	}

	function get_dana_masuk($param = NULL, $order = 'tahun DESC, tahap ASC')
	{
		$this->db->select('SUM( a.jumlah ) AS total');
		$this->db->from('apbdes as a');
		$this->db->where('type', 1);
		if (!is_null($param)) $this->db->where($param);
		$data = $this->db->get();
		if ($data && $data->num_rows() > 0) {
			return $data->row()->total;
		}

		return 0;
	}

	function get_dana_keluar($param = NULL, $order = 'tahun DESC, tahap ASC')
	{
		$this->db->select('SUM( a.jumlah ) AS total');
		$this->db->from('apbdes as a');
		$this->db->join('apbdes_kategori as b', 'b.id=a.id_kategori', 'LEFT');
		$this->db->where('type', 2);
		if (!is_null($param)) $this->db->where($param);
		$this->db->group_by('a.type');
		$this->db->order_by($order);
		$data = $this->db->get();
		if ($data && $data->num_rows() > 0) {
			return $data->row()->total;
		}

		return 0;
	}

	function get_data_apbdes($param = NULL)
	{
		$data = array();
		$this->db->select('a.*, SUM(a.jumlah) as total, b.kategori, b.parrent, c.judul, c.slug');
		$this->db->from('apbdes as a');
		$this->db->join('apbdes_kategori as b', 'b.id=a.id_kategori', 'LEFT');
		$this->db->join('artikel as c', 'c.id=a.id_artikel', 'LEFT');
		if (!is_null($param)) $this->db->where($param);
		$this->db->group_by('b.parrent');
		$query = $this->db->get();

		if ($query && $query->num_rows() > 0) {
			foreach ($query->result() as $key => $row) {
				$data[$key]['id'] = $row->id;
				$data[$key]['id_kategori'] = $row->id_kategori;
				$data[$key]['id_artikel'] = $row->id_artikel;
				$data[$key]['link'] = get_artikel_url($row->slug, $row->id_kategori_artikel);
				$data[$key]['tahun'] = $row->tahun;
				$data[$key]['tahap'] = $row->tahap;
				$data[$key]['jumlah'] = $row->total;
				$data[$key]['warna_bar'] = $row->warna_bar;
				$data[$key]['parent'] = $this->get_parent_kategori($row->parrent)['kategori'];
			}
		}

		return $data;
	}

	public function get_parent_kategori($id = 0)
	{
		$sql = "SELECT * FROM apbdes_kategori WHERE id = ?";
		$query = $this->db->query($sql, $id);
		$data  = $query->row_array();

		return $data;
	}

	function total_apbdes($param = NULL)
	{
		$this->db->select('SUM(a.jumlah) as total');
		$this->db->from('apbdes as a');
		$this->db->join('apbdes_kategori as b', 'b.id=a.id_kategori', 'LEFT');
		if (!is_null($param)) $this->db->where($param);
		$this->db->group_by('type, tahun');
		$res = $this->db->get();

		if ($res && $res->num_rows() > 0) {
			return $res->row()->total;
		}
		return 0;
	}

	function get_tahun($param = NULL)
	{
		if (!is_null($param)) $this->db->where($param);

		$this->db->select('tahun');
		$this->db->from('apbdes as a');
		$this->db->join('apbdes_kategori as b', 'b.id=a.id_kategori', 'LEFT');
		$this->db->group_by('tahun');
		$this->db->order_by('tahun DESC');
		$data = $this->db->get();

		return $data;
	}

	function insert()
	{
		$id_kategori = $this->input->post('id_kategori');
		$id_artikel = $this->input->post('id_artikel');
		$nama = $this->input->post('nama_anggaran');
		$tahun = $this->input->post('tahun');
		$tahap = $this->input->post('tahap');
		$jumlah = $this->input->post('jumlah');
		$koordinator = $this->input->post('koordinator');
		$warna_bar = $this->input->post('warna_bar');
		$type = $this->input->post('type');

		/*
		* TYPE 1 = DANA MASUK
		* TYPE 2 = DANA KELUAR
		*/

		$data = array(
			'id_kategori' => $id_kategori,
			'id_artikel' => $id_artikel,
			'nama_anggaran' => $nama,
			'jumlah' => $jumlah,
			'koordinator' => $koordinator,
			'tahun' => $tahun,
			'tahap' => $tahap,
			'warna_bar' => $warna_bar,
			'type' => $type
		);

		return $this->db->insert('apbdes', $data);
	}

	function update()
	{
		$id = $this->input->post('id');
		$id_kategori = $this->input->post('id_kategori');
		$id_artikel = $this->input->post('id_artikel');
		$nama = $this->input->post('nama_anggaran');
		$tahun = $this->input->post('tahun');
		$tahap = $this->input->post('tahap');
		$jumlah = $this->input->post('jumlah');
		$koordinator = $this->input->post('koordinator');
		$warna_bar = $this->input->post('warna_bar');
		$type = $this->input->post('type');

		/*
		* TYPE 1 = DANA MASUK
		* TYPE 2 = DANA KELUAR
		*/

		$data = array(
			'id_kategori' => $id_kategori,
			'id_artikel' => $id_artikel,
			'nama_anggaran' => $nama,
			'jumlah' => $jumlah,
			'koordinator' => $koordinator,
			'tahun' => $tahun,
			'tahap' => $tahap,
			'warna_bar' => $warna_bar,
			'type' => $type
		);

		return $this->db->update('apbdes', $data, array('id' => $id));
	}
}

/* End of file Anggaran_model.php */
/* Location: .//C/xampp/htdocs/opensid/sidepeapps/models/Anggaran_model.php */