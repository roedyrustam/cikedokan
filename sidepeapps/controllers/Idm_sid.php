<?php

require __dir__.'/Hom_sid.php';

class Idm_sid extends Hom_sid {

	public function __construct () {

		parent::__construct();

		$this->load->model('idm_model');
	}

	public function index ()
	{
		if(empty($tahun)) $tahun = date('Y');
		$header = $this->header_model->get_data();

		$data['kode_desa'] = $header['desa']['kode_propinsi'].$header['desa']['kode_kabupaten'].$header['desa']['kode_kecamatan'].$header['desa']['kode_desa'];

		$data['idm_data'] = $this->idm_model->decode($data['kode_desa'], $tahun);

		$data['idm_skor'] = [];

		foreach ($data['idm_data']['mapData']['ROW'] as $value) {
			
			if (empty($value['NO'])) {

				$data['idm_skor'][] = $value['SKOR']; 
			}
		}

		// Menampilkan menu dan sub menu aktif
		$nav['act'] = 1;
		$nav['act_sub'] = 16;
		$header = $this->header_model->get_data();

		//var_dump($nav); return;

		$this->load->view('header', $header);
		$this->load->view('nav', $nav);
		$this->load->view('sid/idm/index', $data);
		$this->load->view('footer');
	}

	public function cetak($tahun = "")
	{
		if(empty($tahun)) $tahun = date('Y');
		$header = $this->header_model->get_data();

		$data['kode_desa'] = $header['desa']['kode_propinsi'].$header['desa']['kode_kabupaten'].$header['desa']['kode_kecamatan'].$header['desa']['kode_desa'];

		$data['idm_data'] = $this->idm_model->decode($data['kode_desa'], $tahun);

		$data['idm_skor'] = [];

		foreach ($data['idm_data']['mapData']['ROW'] as $value) {
			
			if (empty($value['NO'])) {

				$data['idm_skor'][] = $value['SKOR']; 
			}
		}

		$data['desa'] = $header['desa'];

		$this->load->view('sid/idm/cetak', $data);
	}

	public function excel($tahun = "")
	{
		if(empty($tahun)) $tahun = date('Y');
		$header = $this->header_model->get_data();

		$data['kode_desa'] = $header['desa']['kode_propinsi'].$header['desa']['kode_kabupaten'].$header['desa']['kode_kecamatan'].$header['desa']['kode_desa'];

		$data['idm_data'] = $this->idm_model->decode($data['kode_desa'], $tahun);

		$data['idm_skor'] = [];

		foreach ($data['idm_data']['mapData']['ROW'] as $value) {
			
			if (empty($value['NO'])) {

				$data['idm_skor'][] = $value['SKOR']; 
			}
		}

		$this->load->view('sid/idm/excel', $data);
	}
}
