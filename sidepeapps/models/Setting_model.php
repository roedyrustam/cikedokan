<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Setting_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$pre = array();
		$CI = &get_instance();

		if ($this->setting) return;
		if ($this->config->item("useDatabaseConfig"))
		{
			// Terpaksa menjalankan migrasi, karena apabila tabel setting_aplikasi
			// belum ada, aplikasi tidak bisa di-load, karena model ini di-autoload
			if (!$this->db->table_exists('setting_aplikasi') )
			{
				$this->load->model('database_model');
				$this->database_model->migrasi_db_cri();
			}

			$pr = $this->db->order_by('key')->get("setting_aplikasi")->result();
			foreach($pr as $p)
			{
				$pre[addslashes($p->key)] = addslashes($p->value);
			}
		}
		else
		{
			$pre = (object) $CI->config->config;
		}
		$CI->setting = (object) $pre;
		$CI->list_setting = $pr; // Untuk tampilan daftar setting
		$this->apply_setting();
	}


	private function uploadBG(string $theme, string $nama)
	{
		$this->load->library('upload');
		$this->uploadConfig = array(
			'upload_path' => 'themes/'.$theme.'/assets/images/',
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
			redirect('hom_desa/konfigurasi');
		}

		$uploadData = NULL;
		// Inisialisasi library 'upload'
		$this->upload->initialize($this->uploadConfig);
		// Upload sukses
		if ($this->upload->do_upload($nama))
		{
			$uploadData = $this->upload->data();
			// Ganti nama file asli dengan nama unik untuk mencegah akses langsung dari browser
			$fileRenamed = rename(
				$this->uploadConfig['upload_path'].$uploadData['file_name'],
				$this->uploadConfig['upload_path'].$nama.'.png'
			);
			// Ganti nama di array upload jika file berhasil di-rename --
			// jika rename gagal, fallback ke nama asli
			$uploadData['file_name'] = $fileRenamed ? $nama.'.png' : $uploadData['file_name'];
		}
		// Upload gagal
		else
		{
			$_SESSION['success'] = -1;
			$_SESSION['error_msg'] = $this->upload->display_errors(NULL, NULL);
		}
		return (!empty($uploadData)) ? $uploadData['file_name'] : NULL;
	}



	// Setting untuk PHP
	private function apply_setting()
	{
		//  https://stackoverflow.com/questions/16765158/date-it-is-not-safe-to-rely-on-the-systems-timezone-settings
		date_default_timezone_set($this->setting->timezone);//ganti ke timezone lokal
		// Ambil google api key dari desa/config/config.php kalau tidak ada di database
		if (empty($this->setting->google_key))
		{
			$this->setting->google_key = config_item('google_key');
		}
		// Ambil dev_tracker dari desa/config/config.php kalau tidak ada di database
		if (empty($this->setting->dev_tracker))
		{
			$this->setting->dev_tracker = config_item('dev_tracker');
		}
		$this->setting->user_admin = config_item('user_admin');
		// Kalau folder tema ubahan tidak ditemukan, ganti dengan tema default
		$pos = strpos($this->setting->web_theme, 'desa/');
		if ($pos !== false)
		{
			$folder = FCPATH . '/desa/themes/' . substr($this->setting->web_theme, $pos + strlen('desa/'));
			if (!file_exists($folder))
			{
				$this->setting->web_theme = "default";
			}
		}
	}

	public function update($data)
	{
		$_SESSION['success'] = 1;
		$_SESSION['error_msg'] = '';

        $this->uploadBG($data['web_theme'], 'bg_i');
        $this->uploadBG($data['web_theme'], 'bg_ii');

		foreach ($data as $key => $value)
		{
			// Update setting yang diubah
			if ($this->setting->$key != $value)
			{
				$value = strip_tags($value);
				$outp = $this->db->where('key', $key)->update('setting_aplikasi', array('key'=>$key, 'value'=>$value));
				$this->setting->$key = $value;
				if (!$outp) $_SESSION['success'] = -1;
			}
		}
		$this->apply_setting();
	}

	public function update_slider()
	{
		$_SESSION['success'] = 1;
		$this->setting->sumber_gambar_slider = $this->input->post('pilihan_sumber');
		$outp = $this->db->where('key','sumber_gambar_slider')->update('setting_aplikasi', array('value'=>$this->input->post('pilihan_sumber')));
		if (!$outp) $_SESSION['success'] = -1;
	}

	public function load_options()
	{
		foreach ($this->list_setting as $i => $set)
		{
			if ($set->jenis == 'option')
			{
				$this->list_setting[$i]->options = $this->get_options($set->id);
			}
		}

	}

	private function get_options($id)
	{
		$result = array();
		$rows = $this->db->select('id,value')
		                 ->where('id_setting', $id)
		                 ->get('setting_aplikasi_options')
		                 ->result();

		foreach ($rows as $row)
		{
			$result[$row->id] = $row->value;
		}

		return $result;
	}
}
