<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		session_start();
	}

	public function index()
	{
		if (isset($_SESSION['siteman']) AND $_SESSION['siteman'] == 1)
		{
			$this->load->model('user_model');
			$grup = $this->user_model->sesi_grup($_SESSION['sesi']);
			$grup = (int) $grup;
			if ( $grup == 1 || $grup == 2 ) 
			{
				redirect('hom_sid');
			}
			else if ( $grup == 3 )
			{
				redirect('web');
			}
			else if ( $grup == 33 )
			{
				redirect('web/index/5');
			}
			else if ( $grup == 44 )
			{
				redirect('web/index/5');
			}
			else
			{
				if ($this->setting->offline_mode > 0)
				{
					redirect('siteman');
				}
				else
				{
					redirect('home');
				}
			}
		}
		// Jika offline_mode aktif, tidak perlu menampilkan halaman website
		else if ($this->setting->offline_mode > 0)
		{
			redirect('siteman');
		}
		else
		{
			redirect('home');
		}
	}
}
