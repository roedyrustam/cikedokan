<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Hom_sid extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		session_start();
		$this->load->model('user_model');
		$grup	= $this->user_model->sesi_grup($_SESSION['sesi']);
		if ($grup != 1 AND $grup != 2)
		{
			if (empty($grup))
				$_SESSION['request_uri'] = $_SERVER['REQUEST_URI'];
			else
				unset($_SESSION['request_uri']);
			redirect('siteman');
		}
		$this->load->model('header_model');
		$this->load->model('config_model');
		$this->load->model('program_bantuan_model');
		$this->load->model('surat_model');
		$this->load->model('kontak_model');
		$this->load->model('lapor_model');
		$this->load->model('polling_model', 'poll');
		$this->modul_ini = 1;
		$this->controller = 'hom_sid';
	}

	public function index()
	{
	    $this->load->model('first_m');
	    $this->load->model('user_model');

		// Pengambilan data penduduk untuk ditampilkan widget Halaman Dashboard (modul Home SID)
	    $data['last_login'] = $this->first_m->last_login();
	    $data['last_login_operator'] = $this->user_model->list_data(7, 0, 4);
		$data['penduduk'] = $this->header_model->penduduk_total();
		$data['keluarga'] = $this->header_model->keluarga_total();
		$data['miskin'] = $this->header_model->miskin_total();
		$data['kelompok'] = $this->header_model->kelompok_total();
		$data['rtm'] = $this->header_model->rtm_total();
		$data['dusun'] = $this->header_model->dusun_total();
		$data['jumlah_surat'] = $this->surat_model->surat_total();
		$data['lapor'] = $this->lapor_model->lapor_total();
		$data['kontak'] = $this->kontak_model->belum_dibaca();

		$this->load->model('web_komentar_model');

		$data['komentar'] = $this->web_komentar_model->total();

		$polling = $this->poll->get_polling_widget();
		$data['total_vote'] = $this->poll->total_vote( $polling['id'] );
		$data['pilihan'] = $this->poll->list_pilihan( $polling['id'] );
		$data['datas'] = $this->poll->list_vote( $polling['id'] );
		$data['polling'] = $polling;
		
		//$data['main'] = $this->lapor_model->list_inventaris();
		
		// Menampilkan menu dan sub menu aktif
		$nav['act'] = 1;
		$nav['act_sub'] = 16;
		$header = $this->header_model->get_data();

		//var_dump($nav); return;

		$this->load->view('header', $header);
		$this->load->view('nav', $nav);
		$this->load->view('home/desa', $data);
		$this->load->view('footer');
	}

	public function donasi()
	{
		// Menampilkan menu dan sub menu aktif
		$nav['act'] = 1;
		$nav['act_sub'] = 19;
		$header = $this->header_model->get_data();

		$this->load->view('header', $header);
		$this->load->view('nav', $nav);
		$this->load->view('home/donasi');
		$this->load->view('footer');
	}

	public function dialog_pengaturan()
	{
		$data['list_program_bantuan'] = $this->program_bantuan_model->list_program();
		$data['sasaran'] = unserialize(SASARAN);
		$data['form_action'] = site_url("hom_sid/ubah_program_bantuan");
		$this->load->view('home/pengaturan_form', $data);
	}

	public function ubah_program_bantuan()
	{
		if ($_SESSION['grup'] != 1 )
			session_error("Anda tidak mempunyai akses pada fitur ini");
		else
			$this->db->where('key','dashboard_program_bantuan')->update('setting_aplikasi', array('value'=>$this->input->post('program_bantuan')));
		redirect('hom_sid');
	}
}
