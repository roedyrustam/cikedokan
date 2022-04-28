<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Web_Warga extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		session_start();

		// Jika offline_mode dalam level yang menyembunyikan website,
		// tidak perlu menampilkan halaman website
		if ($this->setting->offline_mode >= 2)
		{
			redirect('hom_desa');
			exit;
		}

		$this->load->model('header_model');
		$this->load->model('web_artikel_model');
		$this->load->model('web_kategori_model');
		$this->modul_ini = 13;
    }
    

    public function insert()
	{
		$cat = $_POST['kategori'] == 0 ? 1001 : 1;
		$this->web_artikel_model->insert_byWarga($cat);
		setcookie('success', 1, time()+60, '/');
		redirect("layanan_mandiri/artikel");
	}


}