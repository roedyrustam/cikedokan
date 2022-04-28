<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Surat extends Web_Controller {

	public function __construct()
	{
		parent::__construct();
		session_start();
		if ($_SESSION['mandiri'] != 1) redirect('layanan_mandiri/masuk');
		mandiri_timeout();

		$this->load->model('surat_model');
		$this->load->model('keluar_model');
		$this->load->model('referensi_model');

		$this->set_template('fullwidth');
	}

	public function index()
	{
		$data = $this->includes;
		$data['menu_surat'] = $this->surat_model->list_surat();
		$data['menu_surat2'] = $this->surat_model->list_surat2();
		$data['surat_favorit'] = $this->surat_model->list_surat_fav();
		$data['surat_keluar'] = $this->keluar_model->list_data_perorangan($_SESSION['id']);

		$data['page_content'] = $this->load->view($this->theme_path . 'layanan_mandiri/surat/format_surat', $data, TRUE);
		$this->_get_common_data($data);
		$this->set_template('fullwidth');
		$this->load->view($this->template, $data);
	}

	public function panduan()
	{
		$data = $this->includes;
		$data['page_content'] = $this->load->view($this->theme_path . 'layanan_mandiri/surat/panduan', $data, TRUE);
		$this->_get_common_data($data);
		$this->load->view($this->template, $data);
	}

	public function form($url = '', $clear = '')
	{
		$this->layanan_mandiri = true;

		$data = $this->includes;
		$data['url'] = $url;
		$data['anchor'] = $this->input->post('anchor');
		
		$data['individu'] = $this->surat_model->get_penduduk($_SESSION['id']);
		$data['anggota'] = $this->keluarga_model->list_anggota($data['individu']['id_kk']);
		$data['list_dokumen'] = $this->penduduk_model->list_dokumen($_SESSION['id']);

		if (!empty($_SESSION['id']))
		{
			$data['individu'] = $this->surat_model->get_penduduk($_SESSION['id']);
			$data['anggota'] = $this->keluarga_model->list_anggota($data['individu']['id_kk']);
		}
		else
		{
			$data['individu'] = NULL;
			$data['anggota'] = NULL;
		}

		$this->get_data_untuk_form($url, $data);
		$data['surat_url'] = rtrim($_SERVER['REQUEST_URI'], "/clear");
		$data['form_action'] = site_url("layanan_mandiri/surat/cetak/$url");
		$data['form_action2'] = site_url("layanan_mandiri/surat/doc/$url");
		$data['aksi'] = $this->admin ? '' : 'layanan_mandiri/';

		$this->_get_common_data($data);
		$data['page_content'] = $this->load->view('surat/form_surat', $data, TRUE);
		$this->load->view($this->template, $data);
	}

	public function cetak($url = '')
	{
		$log_surat['url_surat'] = $url;
		$log_surat['pamong_nama'] = $_POST['pamong'];
		$log_surat['id_user'] = 0;
		$log_surat['no_surat'] = $_POST['nomor'];

		$id = $_SESSION['id'];
		$log_surat['id_pend'] = $id;
		$data['input'] = $_POST;
		$data['tanggal_sekarang'] = tgl_indo(date("Y m d"));

		$data['data'] = $this->surat_model->get_data_surat($id);

		$data['pribadi'] = $this->surat_model->get_data_pribadi($id);
		$data['kk'] = $this->surat_model->get_data_kk($id);
		$data['ayah'] = $this->surat_model->get_data_ayah($id);
		$data['ibu'] = $this->surat_model->get_data_ibu($id);

		$data['desa'] = $this->surat_model->get_data_desa();
		$data['pamong'] = $this->surat_model->get_pamong($_POST['pamong']);

		$data['pengikut'] = $this->surat_model->pengikut();
		$data['anggota'] = $this->keluarga_model->list_anggota($data['kk']['id_kk']);
		$this->keluar_model->log_surat($log_surat);

		$data['url'] = $url;
		$this->load->view("surat/print_surat", $data);
	}

	public function doc($url = '')
	{
		$format = $this->surat_model->get_surat($url);
		$log_surat['url_surat'] = $format['id'];
		$log_surat['id_pamong'] = $_POST['pamong_id'];
		$log_surat['id_user'] = 0;
		$log_surat['no_surat'] = $_POST['nomor'];
		$id = $_POST['nik'];
		switch ($url)
		{
			case 'surat_ket_kelahiran':
				// surat_ket_kelahiran id-nya ibu atau bayi
			if (!$id) $id = $_SESSION['id_ibu'];
			if (!$id) $id = $_SESSION['id_bayi'];
			break;
			case 'surat_ket_nikah':
				// id-nya calon pasangan pria atau wanita
			if (!$id) $id = $_POST['id_pria'];
			if (!$id) $id = $_POST['id_wanita'];
			break;
			default:
				# code...
			break;
		}

		if ($id)
		{
			$log_surat['id_pend'] = $id;
			$nik = $this->db->select('nik')->where('id', $id)->get('tweb_penduduk')
			->row()->nik;
		}
		else
		{
			// Surat untuk non-warga
			$log_surat['nama_non_warga'] = $_POST['nama_non_warga'];
			$log_surat['nik_non_warga'] = $_POST['nik_non_warga'];
			$nik = $log_surat['nik_non_warga'];
		}

		$nama_surat = $this->keluar_model->nama_surat_arsip($url, $nik, $_POST['nomor']);
		$lampiran = '';
		$this->surat_model->buat_surat($url, $nama_surat, $lampiran);
		$log_surat['nama_surat'] = $nama_surat;
		$log_surat['lampiran'] = $lampiran;
		$this->keluar_model->log_surat($log_surat);

		header("location:".base_url(LOKASI_ARSIP.$nama_surat));
	}

	public function nomor_surat_duplikat()
	{
		$hasil = $this->penomoran_surat_model->nomor_surat_duplikat('log_surat', $_POST['nomor'], $_POST['url']);
		echo $hasil ? 'false' : 'true';
	}

	public function search()
	{
		$cari = $this->input->post('nik');
		if ($cari != '') {
			redirect("layanan_mandiri/surat/form/$cari");
		} else {
			redirect('layanan_mandiri/surat/surat');
		}
	}

	public function favorit($id = 0, $k = 0)
	{
		$this->load->model('surat_master_model');
		$this->surat_master_model->favorit($id, $k);
		redirect("layanan_mandiri/surat");
	}

	private function get_data_untuk_form($url, &$data)
	{
		$data['surat_terakhir'] = $this->surat_model->get_last_nosurat_log($url);
		$data['lokasi'] = $this->config_model->get_data();
		$data['penduduk'] = $this->surat_model->list_penduduk();
		$data['pamong'] = $this->surat_model->list_pamong();
		$data['perempuan'] = $this->surat_model->list_penduduk_perempuan();

		$data_form = $this->surat_model->get_data_form($url);
		$pamong_ttd = $this->pamong_model->get_ttd();
		$pamong_ub = $this->pamong_model->get_ub();
		$data['perempuan'] = $this->surat_model->list_penduduk_perempuan();
		if ($pamong_ttd)
		{
			$str_ttd = ucwords($pamong_ttd['jabatan'].' '.$data['lokasi']['nama_desa']);
			$data['atas_nama'][] = "a.n {$str_ttd}";
			if ($pamong_ub)
				$data['atas_nama'][] = "u.b {$pamong_ub['jabatan']}";
		}


		if (is_file($data_form)) include($data_form);
	}

	/* SUARAT KELUAR */
	public function arsip()
	{
		$this->set_title('Arsip Layanan Surat');

		if ($_SESSION['mandiri'] != 1) redirect('home');

		$nik = $_SESSION['id'];

		if (isset($_SESSION['cari']))
			$data['cari'] = $_SESSION['cari'];
		else $data['cari'] = '';

		if (isset($_SESSION['filter']))
			$data['filter'] = $_SESSION['filter'];
		else $data['filter'] = '';

		if (isset($_SESSION['jenis']))
			$data['jenis'] = $_SESSION['jenis'];
		else $data['jenis'] = '';

		if (isset($_POST['per_page']))
			$_SESSION['per_page'] = $_POST['per_page'];
		$data['per_page'] = $_SESSION['per_page'];

		$data = $this->includes;
		$data['paging'] = $this->keluar_model->paging_perorangan($nik,$p,$o);
		$data['main'] = $this->keluar_model->list_data_perorangan($nik, 6, $data['paging']->offset, $data['paging']->per_page);
		$data['keyword'] = $this->keluar_model->autocomplete();
		$data['tahun_surat'] = $this->keluar_model->list_tahun_surat();
		$data['jenis_surat'] = $this->keluar_model->list_jenis_surat();
		$this->_get_common_data($data);

		$data['page_content'] = $this->load->view($this->theme_path . 'layanan_mandiri/surat/arsip', $data, TRUE);
		$this->set_template('fullwidth');
		$this->load->view($this->template, $data);
	}

	public function delete_arsip($p=1, $o=0, $id='')
	{
		session_error_clear();
		if ($this->grup != 1)
		{
			session_error('Anda tidak mempunyai izin melakukan ini');
			redirect("layanan_mandiri/surat/arsip");
		}
		$this->keluar_model->delete($id);
		redirect("layanan_mandiri/surat/arsip");
	}

}
