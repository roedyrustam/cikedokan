<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Kategori_anggaran extends CI_Controller {

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
		$this->load->model('kategori_anggaran_model');
		$this->modul_ini = 201;
	}

	public function clear()
	{
		unset($_SESSION['cari']);
		unset($_SESSION['filter']);
		$_SESSION['per_page'] = 20;
		redirect('kategori_anggaran');
	}

	public function index($p=1,$o=0)
	{
		$data['p'] = $p;
		$data['o'] = $o;
		$data['tip'] = 2;

		if (isset($_SESSION['cari']))
			$data['cari'] = $_SESSION['cari'];
		else $data['cari'] = '';

		if (isset($_SESSION['filter']))
			$data['filter'] = $_SESSION['filter'];
		else $data['filter'] = '';

		if (isset($_POST['per_page']))
			$_SESSION['per_page']=$_POST['per_page'];
		$data['per_page'] = $_SESSION['per_page'];

		$data['paging']  = $this->kategori_anggaran_model->paging($p,$o);
		$data['main']    = $this->kategori_anggaran_model->list_data($o, $data['paging']->offset, $data['paging']->per_page);
		$data['keyword'] = $this->kategori_anggaran_model->autocomplete();

		$header = $this->header_model->get_data();
		$nav['act'] = 205;
		$nav['act_sub'] = 205;

		$this->load->view('header', $header);
		$this->load->view('nav', $nav);
		$this->load->view('kategori_anggaran2/table', $data);
		$this->load->view('footer');
	}

	public function form($id='')
	{
		$data['tip'] = 2;
		if ($id)
		{
			$data['kategori'] = $this->kategori_anggaran_model->get_kategori($id);
			$data['form_action'] = site_url("kategori_anggaran/update/$id");
		}
		else
		{
			$data['kategori'] = null;
			$data['form_action'] = site_url("kategori_anggaran/insert");
		}

		$header = $this->header_model->get_data();

		$nav['act'] = 205;
		$nav['act_sub'] = 205;
		$this->load->view('header', $header);
		$this->load->view('nav', $nav);
		$this->load->view('kategori_anggaran2/form', $data);
		$this->load->view('footer');
	}

	public function sub_kategori($kategori=1)
	{
		$data['tip'] = 2;
		$data['subkategori'] = $this->kategori_anggaran_model->list_sub_kategori($kategori);
		$data['kategori'] = $kategori;
		$header = $this->header_model->get_data();
		$nav['act'] = 205;
		$nav['act_sub'] = 205;

		$this->load->view('header', $header);
		$this->load->view('nav', $nav);
		$this->load->view('kategori_anggaran2/sub_kategori_table', $data);
		$this->load->view('footer');
	}

	public function ajax_add_sub_kategori($kategori='', $id='')
	{
		$data['kategori'] = $kategori;

		if ($id)
		{
			$data['subkategori'] = $this->kategori_anggaran_model->get_kategori($id);
			$data['form_action'] = site_url("kategori_anggaran/update_sub_kategori/$kategori/$id");
		}
		else
		{
			$data['subkategori'] = null;
			$data['form_action'] = site_url("kategori_anggaran/insert_sub_kategori/$kategori");
		}

		$this->load->view('kategori_anggaran2/ajax_add_sub_kategori_form', $data);
	}

	public function search()
	{
		$cari = $this->input->post('cari');
		if ($cari != '')
			$_SESSION['cari'] = $cari;
		else unset($_SESSION['cari']);
		redirect("kategori_anggaran/index");
	}

	public function filter()
	{
		$filter = $this->input->post('filter');
		if ($filter != 0)
			$_SESSION['filter']=$filter;
		else unset($_SESSION['filter']);
		redirect('kategori_anggaran');
	}

	public function insert()
	{
		$this->kategori_anggaran_model->insert($tip);
		redirect("kategori_anggaran");
	}

	public function update($id='')
	{
		$this->kategori_anggaran_model->update($id);
		redirect("kategori_anggaran");
	}

	public function delete($id='')
	{
		$this->kategori_anggaran_model->delete($id);
		redirect("kategori_anggaran");
	}

	public function delete_all($p=1, $o=0)
	{
		$this->kategori_anggaran_model->delete_all();
		redirect("kategori_anggaran/index/$p/$o");
	}

	public function kategori_lock($id='')
	{
		$this->kategori_anggaran_model->kategori_lock($id, 1);
		redirect("kategori_anggaran/index/$p/$o");
	}

	public function kategori_unlock($id='')
	{
		$this->kategori_anggaran_model->kategori_lock($id, 2);
		redirect("kategori_anggaran/index/$p/$o");
	}

	public function insert_sub_kategori($kategori='')
	{
		$this->kategori_anggaran_model->insert_sub_kategori($kategori);
		redirect("kategori_anggaran/sub_kategori/$kategori");
	}

	public function update_sub_kategori($kategori='', $id='')
	{
		$this->kategori_anggaran_model->update_sub_kategori($id);
		redirect("kategori_anggaran/sub_kategori/$kategori");
	}

	public function delete_sub_kategori($kategori='', $id=0)
	{
		$this->kategori_anggaran_model->delete($id);
		redirect("kategori_anggaran/sub_kategori/$kategori");
	}

	public function delete_all_sub_kategori($kategori='')
	{
		$this->kategori_anggaran_model->delete_all();
		redirect("kategori_anggaran/sub_kategori/$kategori");
	}

	public function kategori_lock_sub_kategori($kategori='', $id='')
	{
		$this->kategori_anggaran_model->kategori_lock($id, 1);
		redirect("kategori_anggaran/sub_kategori/$kategori");
	}

	public function kategori_unlock_sub_kategori($kategori='', $id='')
	{
		$this->kategori_anggaran_model->kategori_lock($id, 2);
		redirect("kategori_anggaran/sub_kategori/$kategori");
	}

	public function urut($id=0, $arah=0, $kategori='')
	{
		if ($_SESSION['grup'] != 1)
		{
			session_error("Anda tidak mempunyai akses pada fitur ini");
			redirect('kategori_anggaran'); // hanya untuk administrator
		}
		$this->kategori_anggaran_model->urut($id,$arah,$kategori);
		if ($kategori != '')
			redirect("kategori_anggaran/sub_kategori/$kategori");
		else
			redirect("kategori_anggaran");
	}

}
