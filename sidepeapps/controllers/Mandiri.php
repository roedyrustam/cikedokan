<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Mandiri extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		session_start();
		$this->load->model('user_model');
		$this->load->model('mandiri_model');
		$grup = $this->user_model->sesi_grup($_SESSION['sesi']);
		if ($grup != 1 AND $grup != 2)
		{
			if (empty($grup))
				$_SESSION['request_uri'] = $_SERVER['REQUEST_URI'];
			else
				unset($_SESSION['request_uri']);
			redirect('siteman');
		}
		$this->load->model('header_model');
		$this->modul_ini = 14;
	}

	public function clear()
	{
		unset($_SESSION['cari']);
		unset($_SESSION['filter']);
		redirect('mandiri');
	}

	public function index($p = 1, $o = 0)
	{
		$data['p'] = $p;
		$data['o'] = $o;

		if (isset($_SESSION['cari']))
			$data['cari'] = $_SESSION['cari'];
		else $data['cari'] = '';

		if (isset($_SESSION['filter']))
			$data['filter'] = $_SESSION['filter'];
		else $data['filter'] = '';

		if (isset($_POST['per_page']))
			$_SESSION['per_page'] = $_POST['per_page'];
		$data['per_page'] = $_SESSION['per_page'];

		$data['paging'] = $this->mandiri_model->paging($p, $o);
		$data['main'] = $this->mandiri_model->list_data($o, $data['paging']->offset, $data['paging']->per_page);
		$data['keyword'] = $this->mandiri_model->autocomplete();

		$header = $this->header_model->get_data();

		$nav['act'] = 14;
		$nav['act_sub'] = 56;

		$this->load->view('header', $header);
		$this->load->view('nav', $nav);
		$this->load->view('mandiri/mandiri', $data);
		$this->load->view('footer');
	}

	public function search()
	{
		$cari = $this->input->post('cari');
		if ($cari != '')
			$_SESSION['cari']=$cari;
		else unset($_SESSION['cari']);
		redirect('mandiri');
	}

	public function ajax_pin($p = 1, $o = 0, $id = 0)
	{
		$data['penduduk'] = $this->mandiri_model->list_penduduk();
		$data['form_action'] = site_url("mandiri/insert/$id");
		$this->load->view('mandiri/ajax_pin', $data);
	}

	public function insert()
	{
		$pin = $this->mandiri_model->insert();
		if ($pin)
		{
			$_SESSION['success'] = 1;
		}
		else
		{
			$_SESSION['success'] = -1;
		}

		$_SESSION['pin'] = $pin;
		redirect('mandiri');
	}

	public function pin_generator()
	{
		$data['penduduk'] = $this->mandiri_model->list_penduduk();

		$penduduk = $this->db->where('id_pend', $pen['id_penduduk'])
		->from('tweb_penduduk AS a')
		->join('tweb_penduduk_mandiri AS b', 'b.id_pend=a.id', 'LEFT')
		->where("status = 1 AND nik <> '' AND nik <> 0")
		->get();
		
		$data['jml_penduduk'] = $penduduk->num_rows();
		$data['form_action'] = site_url("mandiri/generate_pin");
		$this->load->view('mandiri/pin_generator', $data);
	}

	public function generate_pin()
	{
		$messages = array();
		$data_penduduk = $this->mandiri_model->list_penduduk();

		foreach ($data_penduduk as $pen) {
			if( $this->db->where('id_pend', $pen['id_penduduk'])->get('tweb_penduduk_mandiri')->num_rows() === 0 ) {
				$data['id'] = $pen['id_penduduk'];
				$data['nik'] = $pen['nik'];
				$data['pin'] = substr($pen['nik'],-6);

				if($this->mandiri_model->insert_generator($data)){
					$messages[] = '<p class="bg-success">'.$pen['nama'].' - BERHASIL</p>';
				}else{
					$messages[] = '<p class="bg-danger">'.$pen['nama'].' - GAGAL</p>';
				}
			}
		}

		echo json_encode($messages);
	}

	public function delete($id = '')
	{
		$outp = $this->mandiri_model->delete($id);
		if ($outp) $_SESSION['success'] = 1;
		else $_SESSION['success'] = -1;
		redirect("mandiri");
	}

	public function delete_all()
	{
		$outp = $this->mandiri_model->delete_all();
		if ($outp) $_SESSION['success'] = 1;
		else $_SESSION['success'] = -1;
		redirect("mandiri");
	}
}
