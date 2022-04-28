<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
* User: didikkurniawan
* Date: 10/1/16
* Time: 06:59
*/

class Api_inventaris_elektronik extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		session_start();
		$this->load->model('user_model');
		$grup	= $this->user_model->sesi_grup($_SESSION['sesi']);
		if($grup!=1 AND $grup!=2) {
			$_SESSION['request_uri'] = $_SERVER['REQUEST_URI'];
			redirect('siteman');
		}
		$this->load->model('inventaris_elektronik_model');
		$this->modul_ini = 16;
		$this->tab_ini = 2;
		$this->controller = 'inventaris_elektronik';
	}

	public function add()
	{
		$data = $this->inventaris_elektronik_model->add(array(
			'nama_barang' => $this->input->post('nama_barang_save'),
			'kode_barang' => $this->input->post('kode_barang'),
			'register' => $this->input->post('register'),
			'merk' => $this->input->post('merk'),
			'ukuran' => $this->input->post('ukuran'),
			'bahan' => $this->input->post('bahan'),
			'tahun_pengadaan' => $this->input->post('tahun_pengadaan'),
			'no_mesin' => $this->input->post('no_mesin'),
			'asal' => $this->input->post('asal'),
			'harga' => $this->input->post('harga'),
			'keterangan' => $this->input->post('keterangan'),
			'visible' => 1,
			'created_at' => date("Y-m-d H:i:s"),
			'created_by' => $this->session->userdata()['user']
		));
		if ($data) $_SESSION['success'] = 1;
		else $_SESSION['success'] = -1;
		redirect("inventaris_elektronik");
	}

	public function add_mutasi()
	{
		$data = $this->inventaris_elektronik_model->add_mutasi(array(
			'id_inventaris_elektronik' => $this->input->post('id_inventaris_elektronik'),
			'jenis_mutasi' => $this->input->post('mutasi'),
			'tahun_mutasi' => $this->input->post('tahun_mutasi'),
			'harga_jual' => $this->input->post('harga_jual'),
			'sumbangkan' => $this->input->post('sumbangkan'),
			'keterangan' => $this->input->post('keterangan'),
			'visible' => 1,
			'created_at' => date("Y-m-d H:i:s"),
			'created_by' => $this->session->userdata()['user']
		));
		if ($data) $_SESSION['success'] = 1;
		else $_SESSION['success'] = -1;
		redirect("inventaris_elektronik/mutasi");
	}

	public function update($id)
	{
		$data = $this->inventaris_elektronik_model->update($id, array(
			'nama_barang' => $this->input->post('nama_barang_save'),
			'kode_barang' => $this->input->post('kode_barang'),
			'register' => $this->input->post('register'),
			'merk' => $this->input->post('merk'),
			'ukuran' => $this->input->post('ukuran'),
			'bahan' => $this->input->post('bahan'),
			'tahun_pengadaan' => $this->input->post('tahun_pengadaan'),
			'no_mesin' => $this->input->post('no_mesin'),
			'asal' => $this->input->post('asal'),
			'harga' => $this->input->post('harga'),
			'keterangan' => $this->input->post('keterangan'),
			'updated_at' => date("Y-m-d H:i:s"),
			'updated_by' => $this->session->userdata()['user']
		));
		if ($data) $_SESSION['success'] = 1;
		else $_SESSION['success'] = -1;
		redirect("inventaris_elektronik");
	}

	public function update_mutasi($id)
	{
		$data = $this->inventaris_elektronik_model->update_mutasi($id, array(
			'jenis_mutasi' => $this->input->post('mutasi'),
			'tahun_mutasi' => $this->input->post('tahun_mutasi'),
			'harga_jual' => $this->input->post('harga_jual'),
			'sumbangkan' => $this->input->post('sumbangkan'),
			'keterangan' => $this->input->post('keterangan'),
			'updated_at' => date("Y-m-d H:i:s"),
			'updated_by' => $this->session->userdata()['user']
		));
		if ($data) $_SESSION['success'] = 1;
		else $_SESSION['success'] = -1;
		redirect("inventaris_elektronik/mutasi");
	}

	public function delete($id)
	{
		$data = $this->inventaris_elektronik_model->delete($id);
		if ($data) $_SESSION['success'] = 1;
		else $_SESSION['success'] = -1;
		redirect('inventaris_elektronik');
	}

	public function delete_mutasi($id)
	{
		$data = $this->inventaris_elektronik_model->delete_mutasi($id);
		if ($data) $_SESSION['success'] = 1;
		else $_SESSION['success'] = -1;
		redirect('inventaris_elektronik/mutasi');
	}
}