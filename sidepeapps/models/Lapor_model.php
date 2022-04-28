<?php class Lapor_model extends CI_Model {

	/**
	 * Gunakan model ini untuk memindahkan semua method terkait laporan layanan mandiri.
	 * Saat ini laporan layanan mandiri masih bercampur dengan komentar artikel, dan
	 * seharusnya dipisah.
	 */
	public function __construct()
	{
		parent::__construct();
	}

	// view lapor widget
	public function view_lapor_widget()
	{
		$lapor = $this->db->query("SELECT * FROM `komentar` WHERE `id_artikel` = 775 AND enabled = 1 ORDER BY `tgl_upload` DESC LIMIT 0,3");
		return $lapor;
	}
	
	public function get_jenis($id = null)
	{
		$jenis = [
			'Adminsistrasi',
			'Keamanan',
			'Ganggunan',
			'Infrastruktur',
			'Bencana',
			'Lainnya'
		];

		return @$jenis[$id];
	}


	public function list_laporan($offset = 0, $limit = 8)
	{
		$komentar = $this->db
					->order_by('tgl_upload','desc')
					->get('komentar', $limit, $offset)
					->result_array();
		
		foreach ($komentar as $key => $item) {
			$komentar[$key]['reply_count'] = $this->reply_total($item['id']);
		}

		return $komentar;
	}


	/**
	 * Simpan laporan yang dikirim oleh pengguna layanan mandiri
	 */
	public function insert()
	{
		$data['judul'] = strip_tags($_POST["judul"]);
		$data['komentar'] = strip_tags($_POST["komentar"]);

		/** ambil dari data session saja */
		$data['owner'] = $_SESSION['nama'];
		$data['email'] = $_SESSION['nik'];

		// load library form_validation
		$this->load->library('form_validation');
		$this->form_validation->set_rules('judul', 'Judul Laporan', 'required');
		$this->form_validation->set_rules('komentar', 'Laporan', 'required');
		$this->form_validation->set_rules('owner', 'Nama', 'required');
		$this->form_validation->set_rules('email', 'NIK', 'required');

		if ($this->form_validation->run() == TRUE)
		{
			$_SESSION['success'] = 1;
			
			unset($_SESSION['validation_error']);
			$data['enabled'] = 2;
			$data['id_artikel'] = 775; //id_artikel untuk laporan layanan mandiri
        	
        	if($gambaru = $this->uploadLampiran('lampiran'))
			{
				$data['gambar1'] = $gambaru;
			}

			if($gambaru = $this->uploadLampiran('lampiran2'))
			{
				$data['gambar2'] = $gambaru;
			}

			if($gambaru = $this->uploadLampiran('lampiran3'))
			{
				$data['gambar3'] = $gambaru;
			}

			$data['jenis'] = strip_tags($_POST["jenis"]);

			$outp = $this->db->insert('komentar', $data);
		}
		else
		{
			$_SESSION['validation_error'] = 'Form tidak terisi dengan benar';
			$_SESSION['success'] = -1;
		}
		if (!$outp) $_SESSION['success'] = -1;
		
		return ($_SESSION['success'] == 1);
	}
	
					
	public function lapor_total()
		{
		$jml = $this->db->select('COUNT(id) as jml')
			->where('id_artikel', 775)
			->get('komentar')
			->row()->jml;
		return $jml;
	}


	public function reply_total($id_komentar)
		{
		$jml = $this->db->select('COUNT(id) as jml')
			->where('id_komentar', $id_komentar)
			->get('komentar_reply')
			->row()->jml;
		return $jml;
	}


	private function uploadLampiran(string $nama)
	{
		$this->load->library('upload');
		$this->uploadConfig = array(
			'upload_path' => 'desa/upload/laporan',
			'allowed_types' => 'gif|jpg|jpeg|png',
			'max_size' => max_upload() * 1024,
			'encrypt_name' => TRUE
		);
		// Adakah berkas yang disertakan?
		$adaBerkas = $_FILES[$nama]['error'] == 0;
		if ($adaBerkas !== TRUE)
		{
			return NULL;
		}
		// Tes tidak berisi script PHP
		if (isPHP($_FILES[$nama]['tmp_name'], $_FILES[$nama]['name']))
		{
			$_SESSION['error_msg'] .= " -> Jenis file ini tidak diperbolehkan ";
			$_SESSION['success'] = -1;
		}

		$uploadData = NULL;
		// Inisialisasi library 'upload'
		$this->upload->initialize($this->uploadConfig);
		// Upload sukses
		if ($this->upload->do_upload($nama))
		{
			$uploadData = $this->upload->data();
		}
		// Upload gagal
		else
		{
			$_SESSION['success'] = -1;
			$_SESSION['error_msg'] = $this->upload->display_errors(NULL, NULL);
		}
		return (!empty($uploadData)) ? $uploadData['file_name'] : NULL;
	}


	public function read($id)
	{
		$query = 'select * from komentar where id = ?';
		$data = $this->db->query($query, intval($id))->row_array();

		for ($i = 1; $i <= 3; $i++) {
			if (!empty($data['gambar'.$i])) $data['gambar'][] = $data['gambar'.$i];
		}

		return $data;
	}


	public function jawaban($id = 0)
	{
		return $this->db
				->where('id_komentar', $id)
				->from('komentar_reply')
				->get()
				->result_array();
	}

}
?>
