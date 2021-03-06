<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
* User: didikkurniawan
* Date: 10/1/16
* Time: 06:59
*/

class Api_inventaris_jalan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		session_start();
		$this->load->model('user_model');
		$grup	= $this->user_model->sesi_grup($_SESSION['sesi']);
		if($grup != 1 AND $grup != 2) {
			$_SESSION['request_uri'] = $_SERVER['REQUEST_URI'];
			redirect('siteman');
		}
		$this->load->model('inventaris_jalan_model');
		$this->modul_ini = 16;
		$this->tab_ini = 4;
		$this->controller = 'inventaris_jalan';
	}

	public function add()
	{
		$data = $this->inventaris_jalan_model->add(array(
			'nama_barang' => $this->input->post('nama_barang_save'),
			'kode_barang' => $this->input->post('kode_barang'),
			'register' => $this->input->post('register'),
			'kondisi' => $this->input->post('kondisi'),
			'kontruksi' => $this->input->post('kontruksi'),
			'panjang' => $this->input->post('panjang'),
			'lebar' => $this->input->post('lebar'),
			'luas' => $this->input->post('luas'),
			'letak' => $this->input->post('alamat'),
			'no_dokument' => $this->input->post('no_bangunan'),
			'tanggal_dokument' => $this->input->post('tanggal_bangunan'),
			'status_tanah' => $this->input->post('status_tanah'),
			'kode_tanah' => $this->input->post('kode_tanah'),
			'asal' => $this->input->post('asal'),
			'harga' => $this->input->post('harga'),
			'keterangan' => $this->input->post('keterangan'),
			'visible' => 1,
			'created_at' => date("Y-m-d H:i:s"),
			'created_by' => $this->session->userdata()['user']
			));
		if ($data) $_SESSION['success'] = 1;
		else $_SESSION['success'] = -1;
		redirect("inventaris_jalan");
	}

	public function add_mutasi()
	{
		$data = $this->inventaris_jalan_model->add_mutasi(array(
			'id_inventaris_jalan' => $this->input->post('id_inventaris_jalan'),
			'jenis_mutasi' => $this->input->post('mutasi'),
			'tahun_mutasi' => $this->input->post('tahun_mutasi'),
			'harga_jual' => $this->input->post('harga_jual'),
			'sumbangkan' => $this->input->post('sumbangkan'),
			'keterangan' => $this->input->post('keterangan'),
			'visible' => 1
			));
		if ($data) $_SESSION['success'] = 1;
		else $_SESSION['success'] = -1;
		redirect("inventaris_jalan/mutasi");
	}

	public function update($id)
	{
		$data = $this->inventaris_jalan_model->update($id,array(
			'nama_barang' => $this->input->post('nama_barang_save'),
			'kode_barang' => $this->input->post('kode_barang'),
			'register' => $this->input->post('register'),
			'kondisi' => $this->input->post('kondisi'),
			'kontruksi' => $this->input->post('kontruksi'),
			'panjang' => $this->input->post('panjang'),
			'lebar' => $this->input->post('lebar'),
			'luas' => $this->input->post('luas'),
			'letak' => $this->input->post('alamat'),
			'no_dokument' => $this->input->post('no_bangunan'),
			'tanggal_dokument' => $this->input->post('tanggal_bangunan'),
			'status_tanah' => $this->input->post('status_tanah'),
			'kode_tanah' => $this->input->post('kode_tanah'),
			'asal' => $this->input->post('asal'),
			'harga' => $this->input->post('harga'),
			'keterangan' => $this->input->post('keterangan'),
			'updated_at' => date("Y-m-d H:i:s"),
			'updated_by' => $this->session->userdata()['user']
			));
		if ($data) $_SESSION['success'] = 1;
		else $_SESSION['success'] = -1;
		redirect("inventaris_jalan");
	}

	public function update_mutasi($id)
	{
		$data = $this->inventaris_jalan_model->update_mutasi($id, array(
			'jenis_mutasi' => $this->input->post('mutasi'),
			'tahun_mutasi' => $this->input->post('tahun_mutasi'),
			'harga_jual' => $this->input->post('harga_jual'),
			'sumbangkan' => $this->input->post('sumbangkan'),
			'keterangan' => $this->input->post('keterangan'),
			'updated_at' => date("m/d/Y")
			));
		if ($data) $_SESSION['success'] = 1;
		else $_SESSION['success'] = -1;
		redirect("inventaris_jalan/mutasi");
	}

	public function delete($id)
	{
		$data = $this->inventaris_jalan_model->delete($id);
		if ($data) $_SESSION['success'] = 1;
		else $_SESSION['success'] = -1;
		redirect('inventaris_jalan');
	}

	public function delete_mutasi($id)
	{
		$data = $this->inventaris_jalan_model->delete_mutasi($id);
		if ($data) $_SESSION['success'] = 1;
		else $_SESSION['success'] = -1;
		redirect('inventaris_jalan/mutasi');
	}
}