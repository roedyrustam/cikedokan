<?php class Sambutan_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function insert($data)
	{
		if (empty($data["foto_sambutan"] = $this->uploadFoto('foto_sambutan'))) {
			$data["foto_sambutan"] = 'default_foto.png';
		}

		$outp = $this->db->insert('sambutan', $data);
		return $outp;
	}

	public function get(&$artikel)
	{
	    $artikel['sambutan'] = $this->db->query('select * from sambutan where id_artikel = '.$artikel['id'])->row_array();
	}

	public function update($id, $data)
	{		
		if (!empty($foto_sambutan = $this->uploadFoto('foto_sambutan'))) {
			$data["foto_sambutan"] = $foto_sambutan;
		}

		$this->db->where('id_sambutan', $id);
		$outp = $this->db->update('sambutan', $data);
		return $outp;
	}

	protected function uploadFoto($nama)
	{
		if (!file_exists($dir = FCPATH.'desa/upload/sambutan')) {
			mkdir($dir);
		}

		$this->load->library('upload');
		
		$this->uploadConfig = array(
			'upload_path' => $dir,
			'allowed_types' => 'gif|jpg|jpeg|png',
			'max_size' => max_upload() * 1024,
		);
		
		// Adakah berkas yang disertakan?
		$adaBerkas = !empty($_FILES[$nama]['name']);
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
}
?>