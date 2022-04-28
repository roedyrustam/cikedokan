<?php

require __dir__.'/Home.php';

class Idm extends Home {

	public function __construct () {

		parent::__construct();

		$this->load->model('idm_model');
	}

	public function index ()
	{	
		$this->set_title('Indeks Desa Membangun');
		
		$data = $this->includes;

		$this->load->model('header_model');

		$header = $this->header_model->get_data();

		$this->_get_common_data($data);

		$data['page_content'] = $this->load->view($this->theme_path . 'idm', $data, TRUE);
		$this->set_template('fullwidth');
		$this->load->view($this->template, $data);
	}

	public function cetak($tahun = "")
	{
		$header = $this->header_model->get_data();

		$data['idm_data'] = $this->idm_model->decode($header['desa']['kode_propinsi'].$header['desa']['kode_kabupaten'].$header['desa']['kode_kecamatan'].$header['desa']['kode_desa'], $tahun);


		$data['desa'] = $header['desa'];

		$this->load->view('sid/idm/cetak', $data);
	}

	public function excel($tahun = "")
	{
		$data['idm_data'] = $this->idm_model->decode($header['desa']['kode_propinsi'].$header['desa']['kode_kabupaten'].$header['desa']['kode_kecamatan'].$header['desa']['kode_desa'], $tahun);

		$data['idm_skor'] = [];

		foreach ($data['idm_data']['mapData']['ROW'] as $value) {
			
			if (empty($value['NO'])) {

				$data['idm_skor'][] = $value['SKOR']; 
			}
		}

		$this->load->view('sid/idm/excel', $data);
	}
}
