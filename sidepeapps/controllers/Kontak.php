<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Kontak extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		session_start();

		$this->load->model('user_model');
		$grup	= $this->user_model->sesi_grup($_SESSION['sesi']);
		if ($grup != 1 AND $grup != 2 AND $grup != 3)
		{
			if (empty($grup))
				$_SESSION['request_uri'] = $_SERVER['REQUEST_URI'];
			else
				unset($_SESSION['request_uri']);
			redirect('siteman');
		}
		$this->load->model('header_model');
		$this->load->model('kontak_model'); 
	}

	private function kontak_email($destination, $token, $subject)
	{
		$this->load->helper('pddmail_helper');

		$body .= '<p>Kami Telah Membaca pesan anda, berikut adalah balasan dari kami.</p>';
		$body .= '<div>'.$this->input->post('isi').'</div>';
		$body .= "<p>";
		$body .= "Buka link dibawah ini untuk memeriksa balasan dari laporan anda";
		$body .= "</p><p>";
		$body .= "http://".$_SERVER['HTTP_HOST']."/kontak/periksa/$token";
		$body .= "</p>";
		$subject = 'Laporan '.$subject;

		pdd_gmail_send($destination, $subject, $body, $attachment = null);
	}

	public function filter()
	{
		$filter = $this->input->post('filter');
		if ($filter != 0)
			$_SESSION['filter'] = $filter;
		else unset($_SESSION['filter']);
		redirect('kontak/kelola');
	}

	public function search()
	{
		$cari = $this->input->post('cari');
		if ($cari != '')
			$_SESSION['cari'] = $cari;
		else unset($_SESSION['cari']);
		redirect('kontak/kelola');
	}

	public function kelola($p=1, $o=0)
	{
		$this->load->helper('pdd');
		$data['p'] = $p;
		$data['o'] = $o;
	
		if (isset($_SESSION['cari']))
			$data['cari'] = $_SESSION['cari'];
		else $data['cari'] = '';

		if (isset($_SESSION['filter']))
			$data['filter'] = $_SESSION['filter'];
		else $data['filter'] = '';

		if (isset($_POST['per_page']))
			$_SESSION['per_page']=$_POST['per_page'];
		$data['per_page'] = $_SESSION['per_page'];

		$data['paging'] = $this->kontak_model->paging($p,$o);
		$data['main'] = $this->kontak_model->list($o, $data['paging']->offset, $data['paging']->per_page);
		$data['keyword'] = $this->kontak_model->autocomplete();

		$header = $this->header_model->get_data();
		$nav['act'] = 13;
		$nav['act_sub'] = 50;

		$this->load->view('header', $header);
		$this->load->view('nav', $nav);
		$this->load->view('kontak/table', $data);
		$this->load->view('footer');
	}

	public function delete($p = null, $o = null, $id = null)
	{
		$this->kontak_model->delete((int) $id);

		redirect("kontak/kelola/$p/$o");
	}

	public function delete_all($p=1, $o=0)
	{
		$this->kontak_model->delete_all();
		redirect("kontak/kelola/$p/$o");
	}

	public function read($p = null, $o = null, $id = null)
	{
		$data['p'] = $p;
		$data['o'] = $o;

		$header = $this->header_model->get_data();
		$nav['act'] = 13;
		$nav['act_sub'] = 50;

		$data['chat'] = $this->kontak_model->view(intval($id));

		$this->load->view('header', $header);
		$this->load->view('nav', $nav);
		$this->load->view('kontak/view', $data);
		$this->load->view('footer');
	}

	public function replay($p, $o, $id)
	{
		$data = $this->input->post();
		$data['nama'] = 'Admin';
		$data['admin'] = 1;
		$this->kontak_model->replay($id, $data);

		$data = $this->kontak_model->view($id);

		$this->kontak_email($data['email'], $data['token'], $data['judul'], $id);

		redirect("kontak/read/$p/$o/$id");
	}
}
