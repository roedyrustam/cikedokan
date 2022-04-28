<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<?php class Lapak_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function listKategori () {

		return [

			[
				'nama' => 'Elektronik',
				'id' => 1,
				'link' => 'kategori-1',
				'deskripsi' => 'contoh kategori'
			],

			[
				'nama' => 'Mobil',
				'id' => 2,
				'link' => 'kategori-2',
				'deskripsi' => 'contoh kategori'
			],

			[
				'nama' => 'Motor',
				'id' => 3,
				'link' => 'kategori-3',
				'deskripsi' => 'contoh kategori'
			]
			
		];
	}

	public function listKondisi () {

		return [

			[
				'nama' => 'Baru',
				'id' => 1,
				'link' => 'kondisi-1',
				'deskripsi' => 'Kondisi Barang Baru'
			],

			[
				'nama' => 'Bekas',
				'id' => 2,
				'link' => 'kondisi-2',
				'deskripsi' => 'Kondisi Barang Bekas'
			]
		];
	}

	public function userToko ($id_user) {

		$this->db->where('id_penduduk', intval($id_user));

		if($toko = $this->db->get('lapak_toko')->row_array())
		{
			$barang['all'] = $this->db->where('pemilik', $toko['id'])->get('lapak_barang')->result_array();
			
			$barang['pending'] = $this->db
				->where('pemilik', $toko['id'])
				->where('status', 1)
				->get('lapak_barang')
				->result_array();
			
			$barang['tolak'] = $this->db
				->where('pemilik', $toko['id'])
				->where('status', 'NOT', 1)
				->where('status', 'NOT', 2)
				->get('lapak_barang')
				->result_array();

			$barang['terbit'] = $this->db
				->where('pemilik', $toko['id'])
				->where('status', 2)
				->get('lapak_barang')
				->result_array();

			foreach ($this->listKategori() as $kategori) {
				
				$barang['kategori'][$kategori['id']]['all'] = $this->db
					->where('pemilik', $toko['id'])
					->where('kategori', $kategori['id'])
					->get('lapak_barang')
					->result_array();

				$barang['kategori'][$kategori['id']]['pending'] = $this->db
					->where('pemilik', $toko['id'])
					->where('kategori', $kategori['id'])
					->where('status', 1)
					->get('lapak_barang')
					->result_array();

				$barang['kategori'][$kategori['id']]['tolak'] = $this->db
					->where('pemilik', $toko['id'])
					->where('kategori', $kategori['id'])
					->where('status', 'NOT', 1)
					->where('status', 'NOT', 2)
					->get('lapak_barang')
					->result_array();

				$barang['kategori'][$kategori['id']]['terbit'] = $this->db
					->where('pemilik', $toko['id'])
					->where('kategori', $kategori['id'])
					->where('status', 2)
					->get('lapak_barang')
					->result_array();
			}

			$toko['barang'] = $barang;

			return $toko;
		}

		return null;
	}

	public function buatToko ($id_user) {

		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$deskripsi = $this->input->post('deskripsi');
		$wa = $this->input->post('wa');

		$this->db->where('nama', $nama);

		if($toko = $this->db->get('lapak_toko')->row_array())
		{
			return;
		}

		return $this->db->insert('lapak_toko', [
			'nama' => $nama,
			'id_penduduk' => intval($id_user),
			'alamat' => $alamat,
			'wa' => $wa,
			'deskripsi' => $deskripsi
		]);
	}

	public function updateToko ($id) {

		$nama = $this->input->post('nama');
		$deskripsi = $this->input->post('deskripsi');
		$wa = $this->input->post('wa');

		$this->db->where('nama', $nama);

		if($toko = $this->db->get('lapak_toko')->row_array())
		{
			return;
		}

		return $this->db->where('id', intval($id))->update('lapak_toko', [
			'nama' => $nama,
			'wa' => $wa,
			'deskripsi' => $deskripsi
		]);
	}

	public function uploadBarang ($id_toko) {

		$nama = $this->input->post('nama');
		$keterangan = $this->input->post('keterangan');
		$harga = $this->input->post('harga');
		$kategori = $this->input->post('kategori');
		$kondisi = $this->input->post('kondisi');
		$stok = $this->input->post('stok');

		return $this->db->insert('lapak_barang', [
			'nama' => $nama,
			'pemilik' => intval($id_toko),
			'kategori' => $kategori,
			'keterangan' => $keterangan,
			'harga' => $harga,
			'stok' => $stok,
			'kondisi' => $kondisi,
		]);
	}

	public function updateBarang ($id_toko, $barang) {

		$nama = $this->input->post('nama');
		$keterangan = $this->input->post('keterangan');
		$harga = $this->input->post('harga');
		$kategori = $this->input->post('kategori');
		$kondisi = $this->input->post('kondisi');
		$stok = $this->input->post('stok');

		$this->db->where('pemilik', intval($id_toko));
		$this->db->where('id', intval($barang));

		return $this->db->update('lapak_barang', [
			'nama' => $nama,
			'kategori' => $kategori,
			'keterangan' => $keterangan,
			'harga' => $harga,
			'stok' => $stok,
			'kondisi' => $kondisi,
		]);
	}

	public function getToko($id) {

		$this->db->where('id', intval($id));

		$toko = $this->db->get('lapak_toko')->result_array();

		return $toko;
	}


	public function listToko ($limit = 0, $offset = 0) {

		$this->db->limit(intval($limit))->offset(intval($offset));

		$data = $this->db->get('lapak_toko')->result_array();

		return $data;
	}

	public function getKategoriId ($id) {

		foreach ($this->listKategori() as $value) {
			
			if ($value['id'] == $id) 
			{
				return $value;
			}
		}

		return null;
	}

	public function getKondisiId ($id) {

		foreach ($this->listKondisi() as $value) {
			
			if ($value['id'] == $id) 
			{
				return $value;
			}
		}

		return null;
	}

	public function getBarangToko($toko, $id)
	{
			$data = $this->db

			->where('pemilik', $toko)
			->where('id', intval($id))
			->get('lapak_barang')
			->row_array();

		$data = [$data];

		$this->_injectKategori($data);
		$this->_injectFoto($data);

		return $data[0];
	}

	public function getKategoriLink ($link) {

		foreach ($this->listKategori() as $value) {
			
			if ($value['link'] == $link) 
			{
				return $value;
			}

			return null;
		}
	}

	public function getKondisiLink ($link) {

		foreach ($this->listKondisi() as $value) {
			
			if ($value['link'] == $link) 
			{
				return $value;
			}

			return null;
		}

	}

	private function _injectKategori(&$barang) {


		foreach ($barang as &$item) {

			$item['kategori'] = $this->getKategoriId($item['kategori']);
		}
	}

	private function _injectKondisi(&$barang) {


		foreach ($barang as &$item) {

			$item['kondisi'] = $this->getKondisiId($item['kondisi']);
		}
	}

	public function barang_toko ($toko, $limit = 0, $offset = 0) {

		$this->db->where('pemilik', intval($toko))->limit(intval($limit))->offset(intval($offset));

		$data = $this->db->get('lapak_barang')->result_array();

		$this->_injectFoto($data);
		$this->_injectKategori($data);
		$this->_injectKondisi($data);

		return $data;
	}

	public function barang_toko_kategori ($toko, $kategori, $limit = 0, $offset = 0) {
				
				$barang['all'] = $this->db
					->where('pemilik', $toko)
					->where('kategori', $kategori)
					->get('lapak_barang')
					->result_array();

				$barang['pending'] = $this->db
					->where('pemilik', $toko)
					->where('kategori', $kategori)
					->where('kondisi', $kondisi)
					->where('status', 1)
					->get('lapak_barang')
					->result_array();

				$barang['tolak'] = $this->db
					->where('pemilik', $toko)
					->where('kategori', $kategori)
					->where('kondisi', $kondisi)
					->where('status', 'NOT', 1)
					->where('status', 'NOT', 2)
					->get('lapak_barang')
					->result_array();

				$barang['terbit'] = $this->db
					->where('pemilik', $toko)
					->where('kategori', $kategori)
					->where('kondisi', $kondisi)
					->where('status', 2)
					->get('lapak_barang')
					->result_array();

		$this->_injectFoto($barang['terbit']);
		$this->_injectKategori($barang['terbit']);
		$this->_injectKondisi($barang['terbit']);

		$this->_injectFoto($barang['all']);
		$this->_injectKategori($barang['all']);
		$this->_injectKondisi($barang['all']);

		$this->_injectFoto($barang['pending']);
		$this->_injectKategori($barang['pending']);
		$this->_injectKondisi($barang['pending']);

		$this->_injectFoto($barang['tolak']);
		$this->_injectKategori($barang['tolak']);
		$this->_injectKondisi($barang['tolak']);

		return $barang;
	}

	private function _injectFoto(&$barang) {


		foreach ($barang as &$item) {

			$item['foto'] = $this->barang_gallery_get($item['id']);
		}
	}

	private function _filter () {

		if (!empty($_SESSION['lapak_kategori'])) {

			$this->db->where('kategori', intval($_SESSION['lapak_kategori']));
		}

		if (!empty($_SESSION['lapak_status'])) {

			if ($_SESSION['lapak_status'] != 1 && $_SESSION['lapak_status'] != 2) {

				$this->db->where('status', 'not', 1);
				$this->db->where('status', 'not', 2);
			}

				else

			$this->db->where('status', intval($_SESSION['lapak_status']));
		}
	}


	public function barang_kategori ($kategori, $limit = 0, $offset = 0) {

		$data = $this->db->get('lapak_barang')->result_array();

		$this->_injectFoto($data);
		$this->_injectKategori($data);
		$this->_injectKondisi($data);

		return $data;
	}

	public function barangGet () {

		$this->_filter();

		$data = $this->db->get('lapak_barang')->result_array();

		$this->_injectFoto($data);
		$this->_injectKategori($data);
		$this->_injectKondisi($data);

		return $data;
	}
	
	public function barangUpdate ($id, $data = []) {

		$this->db->where('id', intval($id))->update('lapak_barang', $data);
	}

	public function barang_show ($barang) {

		$this->db->where('id', intval($barang));

		$data = $this->db->get('lapak_barang')->row_array();

		if (!$data) {

			return null;
		}

		$data = [$data];

		$this->_injectFoto($data);
		$this->_injectKategori($data);
		$this->_injectKondisi($data);

		return $data[0];
	}

	public function barang_gallery_get($barang, $limit = 5)
	{

		$this->db->where('barang', intval($barang))->limit(intval($limit));

		return $this->db->get('lapak_gallery')->result_array();
	}

}
