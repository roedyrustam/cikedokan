<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class New_menu extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		session_start();
		$this->load->model('user_model');
		$grup = $this->user_model->sesi_grup($_SESSION['sesi']);
		if ($grup != 1 AND $grup != 2 AND $grup != 3)
		{
			if (empty($grup))
				$_SESSION['request_uri'] = $_SERVER['REQUEST_URI'];
			else
				unset($_SESSION['request_uri']);
			redirect('siteman');
		}
		$this->load->model('header_model');
		$this->load->model('web_new_menu_model');
		$this->load->model('laporan_penduduk_model');
		$this->modul_ini = 13;
	}

	public function clear()
	{
		unset($_SESSION['cari']);
		unset($_SESSION['filter']);
		redirect('new_menu');
	}

	public function index($tip = 1, $p = 1, $o = 0)
	{
		if (isset($_POST['tambah_menu_baru'])) {
			$menu = $this->input->post('menu');

			$q = $this->db->insert('menu_kategori', array('menu'=>$menu));
			if(!$q) {
				$this->session->set_flashdata('error', 'Gagal tambah menu');
			}
			redirect('new_menu');
		}

		$data['p'] = $p;
		$data['o'] = $o;
		$data['tip'] = $tip;

		if (isset($_SESSION['cari']))
			$data['cari'] = $_SESSION['cari'];
		else $data['cari'] = '';

		if (isset($_SESSION['filter']))
			$data['filter'] = $_SESSION['filter'];
		else $data['filter'] = '';

		if (isset($_POST['per_page']))
			$_SESSION['per_page'] = $_POST['per_page'];
		$data['per_page'] = $_SESSION['per_page'];

		$data['paging'] = $this->web_new_menu_model->paging($tip, $p, $o);
		$data['main'] = $this->web_new_menu_model->list_data($tip, $o, $data['paging']->offset, $data['paging']->per_page);
		$data['keyword'] = $this->web_new_menu_model->autocomplete();
		$data['list_kategori_menu'] = $this->web_new_menu_model->get_kategori_menu();

		$header = $this->header_model->get_data();
		$nav['act'] = 13;
		$nav['act_sub'] = 49;

		$this->load->view('header', $header);
		$this->load->view('nav', $nav);
		$this->load->view('new_menu/table', $data);
		$this->load->view('footer');
	}

	public function form($tip = 1, $id = '')
	{
		$this->load->model('program_bantuan_model');
		$data['tip'] = $tip;
		$data['statis'] = $this->web_new_menu_model->list_statis();
		$data['main_menu'] = $this->web_new_menu_model->list_parent_menu($tip);
		$data['statistik_penduduk'] = $this->laporan_penduduk_model->link_statistik_penduduk();
		$data['statistik_keluarga'] = $this->laporan_penduduk_model->link_statistik_keluarga();
		$data['statistik_program_bantuan'] = $this->program_bantuan_model->link_statistik_program_bantuan();
		$data['statistik_lainnya'] = $this->laporan_penduduk_model->link_statistik_lainnya();

		if ($id)
		{
			$data['menu'] = $this->web_new_menu_model->get_menu($id);
			$data['form_action'] = site_url("new_menu/update/$tip/$id");
		}
		else
		{
			$data['menu'] = NULL;
			$data['form_action'] = site_url("new_menu/insert/$tip");
		}

		$header = $this->header_model->get_data();
		$data['tip'] = $tip;

		$nav['act'] = 13;
		$nav['act_sub'] = 49;
		$this->load->view('header', $header);
		$this->load->view('nav', $nav);
		$this->load->view('new_menu/form', $data);
		$this->load->view('footer');
	}

	public function sub_menu($tip = 1, $menu = 1)
	{
		$data['submenu'] = $this->web_new_menu_model->list_sub_menu($menu);
		$data['tip'] = $tip;
		$data['menu'] = $menu;
		$header = $this->header_model->get_data();
		$nav['act'] = 13;
		$nav['act_sub'] = 49;

		$this->load->view('header', $header);
		$this->load->view('nav', $nav);
		$this->load->view('new_menu/sub_menu_table', $data);
		$this->load->view('footer');
	}

	public function ajax_add_sub_menu($tip = 1, $menu = '', $id = '')
	{
		$this->load->model('program_bantuan_model');
		$data['menu'] = $menu;
		$data['tip'] = $tip;

		$data['link'] = $this->web_new_menu_model->list_link();
		$data['statistik_penduduk'] = $this->laporan_penduduk_model->link_statistik_penduduk();
		$data['statistik_keluarga'] = $this->laporan_penduduk_model->link_statistik_keluarga();
		$data['statistik_program_bantuan'] = $this->program_bantuan_model->link_statistik_program_bantuan();
		$data['statistik_lainnya'] = $this->laporan_penduduk_model->link_statistik_lainnya();

		if ($id)
		{
			$data['submenu'] = $this->web_new_menu_model->get_menu($id);
			$data['form_action'] = site_url("new_menu/update_sub_menu/$tip/$menu/$id");
		}
		else
		{
			$data['submenu'] = NULL;
			$data['form_action'] = site_url("new_menu/insert_sub_menu/$tip/$menu");
		}

		$this->load->view('new_menu/ajax_add_sub_menu_form', $data);
	}

	public function search($tip = 1)
	{
		$cari = $this->input->post('cari');
		if ($cari != '')
			$_SESSION['cari'] = $cari;
		else unset($_SESSION['cari']);
		redirect("new_menu/index/$tip");
	}

	public function filter()
	{
		$filter = $this->input->post('filter');
		if ($filter != 0)
			$_SESSION['filter'] = $filter;
		else unset($_SESSION['filter']);
		redirect('new_menu');
	}

	public function insert($tip = 1)
	{
		$this->web_new_menu_model->insert($tip);
		redirect("new_menu/index/$tip");
	}

	public function update($tip = 1, $id = '')
	{
		$this->web_new_menu_model->update($id);
		redirect("new_menu/index/$tip");
	}

	public function delete($tip = 1, $id = '')
	{
		$_SESSION['success'] = 1;
		$this->web_new_menu_model->delete($id);
		redirect("new_menu/index/$tip");
	}

	public function delete_all($tip = 1, $p = 1, $o = 0)
	{
		$_SESSION['success'] = 1;
		$this->web_new_menu_model->delete_all();
		redirect("new_menu/index/$tip/$p/$o");
	}

	public function menu_lock($tip = 1, $id = '')
	{
		$this->web_new_menu_model->menu_lock($id, 1);
		redirect("new_menu/index/$tip/$p/$o");
	}

	public function menu_unlock($tip = 1, $id = '')
	{
		$this->web_new_menu_model->menu_lock($id, 2);
		redirect("new_menu/index/$tip/$p/$o");
	}

	public function insert_sub_menu($tip = 1, $menu = '')
	{
		$this->web_new_menu_model->insert_sub_menu($menu);
		redirect("new_menu/sub_menu/$tip/$menu");
	}

	public function update_sub_menu($tip = 1, $menu = '', $id = '')
	{
		$this->web_new_menu_model->update_sub_menu($id);
		redirect("new_menu/sub_menu/$tip/$menu");
	}

	public function delete_sub_menu($tip = '', $menu = '', $id = 0)
	{
		$this->web_new_menu_model->delete($id);
		redirect("new_menu/sub_menu/$tip/$menu");
	}

	public function delete_all_sub_menu($tip = 1, $menu = '')
	{
		$this->web_new_menu_model->delete_all();
		redirect("new_menu/sub_menu/$tip/$menu");
	}

	public function menu_lock_sub_menu($tip = 1, $menu = '', $id = '')
	{
		$this->web_new_menu_model->menu_lock($id, 1);
		redirect("new_menu/sub_menu/$tip/$menu");
	}

	public function menu_unlock_sub_menu($tip = 1, $menu = '', $id = '')
	{
		$this->web_new_menu_model->menu_lock($id, 2);
		redirect("new_menu/sub_menu/$tip/$menu");
	}

	public function urut($tip = 1, $id = 0, $arah = 0, $menu = '')
	{
		if ($_SESSION['grup'] != 1)
		{
			session_error("Anda tidak mempunyai akses pada fitur ini");
			redirect('new_menu');
		}
		$this->web_new_menu_model->urut($id, $arah, $tip, $menu);
		if ($menu != '')
			redirect("new_menu/sub_menu/$tip/$menu");
		else
			redirect("new_menu/index/$tip");
	}
}
