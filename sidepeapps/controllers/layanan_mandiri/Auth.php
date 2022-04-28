<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends Web_Controller {

	public function __construct()
	{
		parent::__construct();
		session_start();
		mandiri_timeout();
	}

	public function index()
	{
		if ($_SESSION['mandiri_wait'] != 1){
			$this->first_m->siteman();
		}

		if ($_SESSION['mandiri'] == 1) {
			redirect('home');
		} else {
            redirect('layanan_mandiri/masuk');
		}
	}

	public function logout()
	{
		$this->first_m->logout();

		redirect('home');
	}
}