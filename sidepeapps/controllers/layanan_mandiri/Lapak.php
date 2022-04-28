<?php


class Lapak extends Web_Controller
{

	public function __construct()
	{
		parent::__construct();
		session_start();
		if ($_SESSION['mandiri'] != 1) redirect('layanan_mandiri/masuk');
		mandiri_timeout();

		$this->set_template('fullwidth');

		$this->load->model('lapak_model');

		foreach ($this->lapak_model->listKategori() as $kategori) {
			

			$this->includes['kategorilist'][$kategori['id']] = $kategori;
		}

		foreach ($this->lapak_model->listKondisi() as $kondisi) {
			

			$this->includes['kondisilist'][$kondisi['id']] = $kondisi;
		}

	}
	private function _lapak () {

		if (!$this->lapak = $this->lapak_model->userToko($_SESSION['id']))
		{

			redirect('layanan_mandiri/lapak/buat');

			exit();
		}

		$this->includes['lapak'] = $this->lapak;
	}

	public function index () {

		$this->_lapak();
		$this->set_title($data['heading'] = 'Lapak Warga');
		$data = $this->includes;

		$data['lapak'] = $this->lapak;

		$data['page_content'] = $this->load->view($this->theme_path . 'layanan_mandiri/lapak/lapak', $data, TRUE);

		$this->set_template('fullwidth');

		$this->_get_common_data($data);
			
		$this->load->view($this->template, $data);
	}

	public function categories () {

		$this->_lapak();

		$data = $this->includes;

		$data['lapak'] = $this->lapak;

		$data['page_content'] = $this->load->view($this->theme_path . '/layanan_mandiri/lapak/categories', $data, TRUE);

		$this->set_template('fullwidth');

		$this->_get_common_data($data);
			
		$this->load->view($this->template, $data);
	}

	public function pending () {

		//
	}
	
	public function tolak () {

		//
	}
	
	public function terima () {

		//
	}


	public function hapus () {

		//
	}


	public function buat () {
		
		$this->_lapak();
		$this->set_title($data['heading'] = 'Atur Lapak');
		$data = $this->includes;

		$data['lapak'] = $this->lapak;

		if (!empty($this->input->post('nama')) &&
			!empty($this->input->post('wa')) &&
			!empty($this->input->post('alamat')) &&
			!empty($this->input->post('deskripsi'))) {

			if ($this->lapak_model->buatToko($_SESSION['id'])) {

				redirect('layanan_mandiri/lapak');
			}
		}

		else {

			$data['validation_error'] = 'Form tidak terisi dengan benar';
		}

		$data['page_content'] = $this->load->view($this->theme_path . 'layanan_mandiri/lapak/buat', $data, TRUE);

		$this->set_template('fullwidth');

		$this->_get_common_data($data);
			
		$this->load->view($this->template, $data);
	}


	public function update_barang ($barang = null) {

		$this->_lapak();

		$data = $this->includes;
		$this->set_title($data['heading'] = 'Lapak Jualan');

		if (!empty($this->input->post('nama')) &&
			!empty($this->input->post('keterangan')) &&
			!empty($this->input->post('harga')) &&
			!empty($this->input->post('stok')) &&
			!empty($this->input->post('kondisi')) &&
			!empty($this->input->post('kategori'))) {

			if ($this->lapak_model->updateBarang($this->lapak['id'], intval($barang))) {

				$_SESSION['success'] = 'Berhasil diupdate';

				redirect('layanan_mandiri/lapak/show/'.$barang);
			}
		}

		else {

			$data['error'] = 'Form tidak terisi dengan benar';
		}

		$data['barang'] = $this->lapak_model->getBarangToko($this->lapak['id'], intval($barang));

		$data['page_content'] = $this->load->view($this->theme_path . 'layanan_mandiri/lapak/update_barang', $data, TRUE);

		$this->set_template('fullwidth');

		$this->_get_common_data($data);
			
		$this->load->view($this->template, $data);
	}

	public function input () {

		$this->_lapak();
		$this->set_title($data['heading'] = 'Lapak Jualan');
		$data = $this->includes;

		if (!empty($this->input->post('nama')) &&
			!empty($this->input->post('keterangan')) &&
			!empty($this->input->post('harga')) &&
			!empty($this->input->post('stok')) &&
			!empty($this->input->post('kondisi')) &&
			!empty($this->input->post('kategori'))) {

			if ($this->lapak_model->uploadBarang($this->lapak['id'])) {

				$_SESSION['success'] = 'Berhasil diupload';

				redirect('layanan_mandiri/lapak');
			}
		}

		else {

			$data['error'] = 'Form tidak terisi dengan benar';
		}

		$data['page_content'] = $this->load->view($this->theme_path . 'layanan_mandiri/lapak/input_barang', $data, TRUE);

		$this->set_template('fullwidth');

		$this->_get_common_data($data);
			
		$this->load->view($this->template, $data);
	}

	public function barang ($id = null) {

		$this->_lapak();

		$data = $this->includes;

		$data['barang'] = $this->lapak_model->getBarangToko($this->lapak['id'], intval($id));

		$data['page_content'] = $this->load->view($this->theme_path . 'layanan_mandiri/lapak/barang', $data, TRUE);

		$this->set_template('fullwidth');

		$this->_get_common_data($data);
			
		$this->load->view($this->template, $data);
	}

	public function kategori ($kategori = null) {

		$this->_lapak();

		$data = $this->includes;

		if ($data['kategori'] = $this->lapak_model->getKategoriId(intval($kategori))) {

			$data['barang'] = $this->lapak_model->barang_toko_kategori($this->lapak['id'], intval($kategori));
		}

		else {

			redirect(site_url('layanan_mandiri/lapak'));

			exit();
		}

		$data['page_content'] = $this
			
			->load
			->view($this->theme_path . 'layanan_mandiri/lapak/kategori', $data, TRUE);

		$this->set_template('fullwidth');

		$this->_get_common_data($data);
			
		$this->load->view($this->template, $data);
	}

	public function show ($barang = null) {

		$this->_lapak();

		$data = $this->includes;

		$data['barang'] = $this->lapak_model->getBarangToko($this->lapak['id'], intval($barang));

		$data['page_content'] = $this
			
			->load
			->view($this->theme_path . 'layanan_mandiri/lapak/barang', $data, TRUE);

		$this->set_template('fullwidth');

		$this->_get_common_data($data);
			
		$this->load->view($this->template, $data);
	}

	public function create () {

	}

	public function update ($barang = null) {

		$this->_lapak();


		$data = $this->includes;


		if (empty($barang))
		{

		if (!empty($this->input->post('nama')) &&
			!empty($this->input->post('wa')) &&
			!empty($this->input->post('deskripsi'))) {

			if ($this->lapak_model->updateToko($this->lapak['id'])) {

				redirect('layanan_mandiri/lapak');
			}
		}

		else {

			$data['validation_error'] = 'Form tidak terisi dengan benar';
		}


		$data['page_content'] = $this
			
			->load
			->view($this->theme_path . 'layanan_mandiri/lapak/update_lapak', $data, TRUE);
		}

		else {
			
			if (!empty($this->input->post('nama')) &&
			!empty($this->input->post('keterangan')) &&
			!empty($this->input->post('harga')) &&
			!empty($this->input->post('stok')) &&
			!empty($this->input->post('kondisi')) &&
			!empty($this->input->post('kategori'))) {

			if ($this->lapak_model->updateBarang($this->lapak['id'], $barang)) {

				$_SESSION['success'] = 'Berhasil diupdate';

				redirect('layanan_mandiri/lapak/show/' . $barang);
			}
		}

		else {

			$data['error'] = 'Form tidak terisi dengan benar';
		}

			$data['barang'] = $this->lapak_model->getBarangToko($this->lapak['id'], intval($barang));


		$data['page_content'] = $this
			
			->load
			->view($this->theme_path . 'layanan_mandiri/lapak/update_barang', $data, TRUE);
		}


		$this->set_template('fullwidth');

		$this->_get_common_data($data);
			
		$this->load->view($this->template, $data);
	}

	public function patch ($barang = null) {

		echo 'Menyimpan update barang '.$barang;
	}

	public function delete ($barang = null) {

		echo 'Menghapus barang '.$barang;
	}
}
