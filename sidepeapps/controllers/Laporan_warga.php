<?php if(!defined('BASEPATH')) exit('No direct script access allowed');



class Laporan_Warga extends Web_Controller {



	public function __construct()

	{

		parent::__construct();
		$this->load->model('lapor_model');

	}



    // halaman utama laporan

	public function index()

	{
		$this->set_title("Laporan Warga");

		$this->set_page_header("Arsip Laporan Warga");


		$data = $this->includes;

		// $data['datas'] = $this->first_artikel_m->berita_show(0, $data['paging']->offset, $data['paging']->per_page, $where);

		$data['limit'] = 8;
		$data['total'] = $this->lapor_model->lapor_total();

		$data['datas'] = $this->lapor_model->list_laporan($offset = 0, $data['limit']);

		$data['headline'] = $this->first_artikel_m->get_headline(1);

		$data['data_agenda'] = $this->first_artikel_m->agenda_show();

		$this->_get_common_data($data);

		$this->set_template('laporan');

		$this->load->view($this->template, $data);

	}
	


	public function load_more()
	{
		$offset = (int)$this->input->get('offset');
		$limit = (int)$this->input->get('limit');

		$data['datas'] = $this->lapor_model->list_laporan($offset, $limit);

		$this->load->view($this->theme_path.'template-parts/laporan_load.php', $data);
  }
  


  public function read($id = null)
	{
		$this->set_title('Arsip Laporan');

		$data = $this->includes;

		$this->_get_common_data($data);

		$data['laporan'] = $this->lapor_model->read($id);

		$data['page_content'] = $this->load->view($this->theme_path . 'read_laporan', $data, TRUE);
		$this->set_template('fullwidth');
		$this->load->view($this->template, $data);
	}
    

}