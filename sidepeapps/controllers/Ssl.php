<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Ssl extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		session_start();
		siteman_timeout();
		$this->load->model('header_model');
		$this->load->model('user_model');
	}

	public function index()
	{
		$header = $this->header_model->get_config();

		//Initialize Session ------------
		if (!isset($_SESSION['siteman'])) {
			$_SESSION['siteman'] = 0;
		}

		$_SESSION['success'] = 0;
		$_SESSION['sesi'] = "kosong";
		//-------------------------------

		$this->load->view('ssl_off', $header);
		$_SESSION['siteman'] = 0;
	}

	public function auth()
	{
		$this->user_model->siteman();

		if ($_SESSION['siteman'] == 1)
		{
		    //matikan ssl

		    $this->db->where('key', 'ssl')->update('setting_aplikasi', ['value' => 0]);

		    redirect('hom_sid');
		}

		else
		{
			redirect('ssl');
		}
	}
}

