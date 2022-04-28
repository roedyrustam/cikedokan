<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Anggaran extends MY_Controller
{

	public $header;

	public function __construct()
	{
		parent::__construct();
		session_start();
		$this->load->model('user_model');
		$grup = $this->user_model->sesi_grup($_SESSION['sesi']);
		if ($grup != 1 and $grup != 2 and $grup != 3) {
			if (empty($grup))
				$_SESSION['request_uri'] = $_SERVER['REQUEST_URI'];
			else
				unset($_SESSION['request_uri']);
			redirect('siteman');
		}
		$this->load->helper('theme');
		$this->load->model('header_model');
		$this->load->model('penduduk_model');
		$this->load->model('keluarga_model');
		$this->load->model('surat_model');
		$this->load->model('keluar_model');
		$this->load->model('config_model');
		$this->load->model('referensi_model');
		$this->load->model('penomoran_surat_model');
		$this->load->model('pamong_model');
		$this->load->model('anggaran_model', 'anggaran');
		$this->load->model('kategori_anggaran_model', 'kategori_anggaran');
		$this->load->model('web_artikel_model');
		$this->modul_ini = 201;
		$this->header = $this->header_model->get_data();
	}

	public function index()
	{
		$data['tahun'] = (isset($_GET['tahun']) && $_GET['tahun'] !== '') ? $_GET['tahun'] : date('Y');
		$data['type'] = (isset($_GET['type']) && $_GET['type'] !== '') ? $_GET['type'] : 1;

		$data['data_anggaran'] = $this->anggaran->get(array('tahun' => $data['tahun'], 'type' => $data['type']));
		$data['data_tahun'] = $this->anggaran->get_tahun(array('type' => $data['type']));

		$nav['act'] = 201;
		$nav['act_sub'] = $data['type'] == 1 ? 202 : 203;
		$this->load->view('header', $this->header);
		$this->load->view('nav', $nav);
		$this->load->view('anggaran/index', $data);
		$this->load->view('footer');
	}

	public function tambah()
	{
		$data['tahun'] = (isset($_GET['tahun']) && $_GET['tahun'] !== '') ? $_GET['tahun'] : date('Y');
		$data['type'] = (isset($_GET['type']) && $_GET['type'] !== '') ? $_GET['type'] : 1;
		$data['id_kat'] = (isset($_GET['id_kat']) && $_GET['id_kat'] !== '') ? $_GET['id_kat'] : 0;

		$data['anggaran'] = array();
		$data['data_pamong'] = $this->pamong_model->list_data();
		$data['kategori_anggaran'] = $this->kategori_anggaran->list_data();
		$data['artikel_anggaran'] = $this->web_artikel_model->list_data(25);
		$data['data_anggaran_apbdes'] = $this->anggaran->get("type=1 AND tahun=" . $data['tahun'] . " AND a.id_kategori=" . $data['id_kat']);
		$data['aksi'] = 'insert';
		$nav['act'] = 201;
		$nav['act_sub'] = $data['type'] == 1 ? 202 : 203;
		$this->load->view('header', $this->header);
		$this->load->view('nav', $nav);
		$this->load->view('anggaran/form', $data);
		$this->load->view('footer');
	}

	public function edit($id = NULL)
	{
		if (is_null($id)) show_404();
		$th = (string) date('Y');
		$data['anggaran'] = $this->anggaran->get(array('a.id' => $id))->row_array();
		$data['tahun'] = (isset($_GET['tahun']) && $_GET['tahun'] !== '') ? $_GET['tahun'] : $data['anggaran']['tahun'];
		$data['type'] = (isset($_GET['type']) && $_GET['type'] !== '') ? $_GET['type'] : $data['anggaran']['type'];

		$data['id_kat'] = (isset($_GET['id_kat']) && $_GET['id_kat'] !== '') ? $_GET['id_kat'] : $data['anggaran']['id_kategori'];
		$data['data_pamong'] = $this->pamong_model->list_data();
		$data['kategori_anggaran'] = $this->kategori_anggaran->list_data();
		$data['artikel_anggaran'] = $this->web_artikel_model->list_data(25);
		$data['data_anggaran_apbdes'] = $this->anggaran->get("type=1 AND tahun=" . $data['tahun'] . " AND a.id_kategori=" . $data['id_kat']);
		$data['aksi'] = 'update';

		$nav['act'] = 201;
		$nav['act_sub'] = $data['type'] == 1 ? 202 : 203;
		$this->load->view('header', $this->header);
		$this->load->view('nav', $nav);
		$this->load->view('anggaran/form', $data);
		$this->load->view('footer');
	}

	function total()
	{
		$data = $this->anggaran->total_apbdes(array('tahun' => 2019));
		$this->load->helper('theme');
		echo uang_indo($data);
	}

	public function simpan($aksi = 'insert')
	{
		if ($aksi == 'update') $aksi = $this->anggaran->update();
		else $aksi = $this->anggaran->insert();

		if ($aksi) {
			$this->session->set_flashdata('message', '<p class="alert alert-success">Data anggaran berhasil diinput</p>');
		} else {
			$this->session->set_flashdata('message', '<p class="alert alert-danger">Data anggaran gagal diinput</p>');
		}

		redirect('anggaran/?type=' . $_POST['type'] . '&tahun=' . $_POST['tahun']);
	}

	public function hapus($id = NULL)
	{
		if (is_null($id)) show_404();

		$aksi = $this->db->delete('apbdes', array('id' => $id));

		if ($aksi) {
			$this->session->set_flashdata('message', '<p class="alert alert-success">Data anggaran berhasil dihapus</p>');
		} else {
			$this->session->set_flashdata('message', '<p class="alert alert-danger">Data anggaran gagal dihapus</p>');
		}

		redirect('anggaran?type=' . $_GET['type'] . '&tahun=' . $_GET['tahun']);
	}
}

/* End of file Anggaran.php */
/* Location: .//C/xampp/htdocs/opensid/sidepeapps/controllers/Anggaran.php */