<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Layanan_mandiri_lama extends Web_Controller {

	public function __construct()
	{
		parent::__construct();
		session_start();

		// Jika offline_mode dalam level yang menyembunyikan website,
		// tidak perlu menampilkan halaman website
		if ($this->setting->offline_mode >= 2)
		{
			redirect('siteman');
			exit;
		}
		elseif ($this->setting->offline_mode == 1)
		{
			// Jangan tampilkan website jika bukan admin/operator/redaksi
			$this->load->model('user_model');
			$grup	= $this->user_model->sesi_grup($_SESSION['sesi']);
			if ($grup != 1 AND $grup != 2 AND $grup != 3)
			{
				if (empty($grup))
					$_SESSION['request_uri'] = $_SERVER['REQUEST_URI'];
				else
					unset($_SESSION['request_uri']);
				redirect('siteman');
			}
		}

		mandiri_timeout();
		$this->load->helper('text');
		$this->load->helper($this->theme);
		$this->load->model('header_model');
		$this->load->model('config_model');
		$this->load->model('first_m');
		$this->load->model('first_artikel_m');
		$this->load->model('first_gallery_m');
		$this->load->model('first_menu_m');
		$this->load->model('first_penduduk_m');
		$this->load->model('penduduk_model');
		$this->load->model('surat_model');
		$this->load->model('keluarga_model');
		$this->load->model('web_widget_model');
		$this->load->model('web_gallery_model');
		$this->load->model('laporan_penduduk_model');
		$this->load->model('track_model');
		$this->load->model('keluar_model');
	}

	public function auth()
	{
		if ($_SESSION['mandiri_wait'] != 1)
		{
			$this->first_m->siteman();
		}
		if ($_SESSION['mandiri'] == 1) {
			//redirect('home/mandiri/1/1');
			redirect('layanan_mandiri');
		} else {
			redirect('home');
		}

	}

	public function logout()
	{
		$this->first_m->logout();
		redirect('home');
	}

	public function ganti()
	{
		$this->first_m->ganti();
		redirect('home');
	}

	public function index()
	{
		redirect('layanan_mandiri/profil');
	}

	public function profil()
	{
		$this->set_title('Profil Penduduk');

		if ($_SESSION['mandiri'] != 1)
		{
			redirect('home');
		}
		$id = $_SESSION['id'];

		$data = $this->includes;
		$data['menu_surat2'] = $this->surat_model->list_surat2();
		$this->_get_common_data($data);
		$data['penduduk'] = $this->penduduk_model->get_penduduk($id);
		$data['list_kelompok'] = $this->penduduk_model->list_kelompok($id);
		$data['list_dokumen'] = $this->penduduk_model->list_dokumen($id);
		$id_penduduk = $data['penduduk']['id'];
		$data['list_surat_keluar'] = $this->keluar_model->list_data_perorangan($id_penduduk);

		$data['page_content'] = $this->load->view($this->theme_path.'layanan_mandiri/profil', $data, TRUE);

		$this->load->view($this->template, $data);
	}

	public function surat()
	{
		$this->set_title('Daftar Cetak Surat');

		if ($_SESSION['mandiri'] != 1)
		{
			redirect('home');
		}
		$data = $this->includes;

		$data['menu_surat'] = $this->surat_model->list_surat();
		$data['menu_surat2'] = $this->surat_model->list_surat2();
		$data['surat_favorit'] = $this->surat_model->list_surat_fav();
		$data['surat_keluar'] = $this->keluar_model->list_data_perorangan($_SESSION['id']);
		$data['page_content'] = $this->load->view('surat/format_surat', $data, TRUE);

		$this->_get_common_data($data);
		//$this->set_template('fullwidth');
		$this->load->view($this->template, $data);
	}

	public function panduan()
	{
		$header = $this->header_model->get_data();

		$this->load->view('header', $header);
		$this->load->view('nav', $nav);
		$this->load->view('surat/panduan');
		$this->load->view('footer');
	}

	public function form($url = '', $clear = '')
	{
		$this->set_title( title($url) );

		if ($_SESSION['mandiri'] != 1) redirect('home');

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
		$data['form_action'] = site_url("layanan_mandiri/cetak/$url");
		$data['form_action2'] = site_url("layanan_mandiri/doc/$url");

		$this->_get_common_data($data);
		
		$data['page_content'] = $this->load->view('surat/form_surat', $data, TRUE);
		//$this->set_template('fullwidth');

		$this->load->view($this->template, $data);
	}

	public function arsip_surat()
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
		$data['main'] = $this->keluar_model->list_data($nik, $data['paging']->offset, $data['paging']->per_page);
		$data['keyword'] = $this->keluar_model->autocomplete();
		$data['tahun_surat'] = $this->keluar_model->list_tahun_surat();
		$data['jenis_surat'] = $this->keluar_model->list_jenis_surat();
		$this->_get_common_data($data);

		$data['page_content'] = $this->load->view('surat/surat_keluar', $data, TRUE);
		$this->set_template('fullwidth');
		$this->load->view($this->template, $data);
	}

	public function cetak($url = '')
	{
		if ($_SESSION['mandiri'] != 1) redirect('home');

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
		if ($_SESSION['mandiri'] != 1) redirect('home');

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

	public function download($url = '')
	{
		$this->load->library('pdf');

		$log_surat['url_surat'] = $url;
		$log_surat['id_pamong'] = $_POST['pamong_id'];
		$log_surat['id_user'] = $_SESSION['id'];
		$log_surat['no_surat'] = $_POST['nomor'];

		$id = $_POST['nik'];
		$log_surat['id_pend'] = $id;
		$data['input'] = $_POST;
		$data['tanggal_sekarang'] = tgl_indo(date("Y m d"));
		$data['url'] = $url;

		$data['data'] = $this->surat_model->get_data_surat($id);

		$data['pribadi'] = $this->surat_model->get_data_pribadi($id);
		$data['kk'] = $this->surat_model->get_data_kk($id);
		$data['ayah'] = $this->surat_model->get_data_ayah($id);
		$data['ibu'] = $this->surat_model->get_data_ibu($id);

		$data['desa'] = $this->surat_model->get_data_desa();
		$data['pamong'] = $this->surat_model->get_pamong($_POST['pamong']);

		$data['pengikut'] = $this->surat_model->pengikut();
		$data['anggota'] = $this->keluarga_model->list_anggota($data['kk']['id_kk']);

		// $this->load->view("surat/print_surat", $data);
		// return;

		$nama_surat = $this->keluar_model->nama_surat_arsip($url, $id, $_POST['nomor'], 'pdf');
		$lampiran = '';
		$this->surat_model->buat_surat($url, $nama_surat, $lampiran);
		$log_surat['nama_surat'] = $nama_surat;
		$log_surat['lampiran'] = $lampiran;
		$this->keluar_model->log_surat($log_surat);

		//create pdf
		$html = $this->load->view("surat/print_surat", $data, TRUE);
		$this->pdf->generate(FCPATH.LOKASI_ARSIP.$nama_surat, $html);

		redirect(base_url().LOKASI_ARSIP.$nama_surat);
	}

	public function hapus_surat_keluar($id='')
	{
		session_error_clear();
		$this->keluar_model->delete($id);

		redirect("layanan_mandiri/surat_keluar");
	}

	/**
	 * Cari surat berdasarkan judul
	 * 
	 */
	public function search()
	{
		$cari = $this->input->post('nik');
		if ($cari != '') {
			redirect("layanan_mandiri/form/$cari");
		} else {
			redirect('layanan_mandiri/surat');
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

		if (is_file($data_form)) include($data_form);
	}

	public function nomor_surat_duplikat()
	{
		$hasil = $this->penomoran_surat_model->nomor_surat_duplikat('log_surat', $_POST['nomor'], $_POST['url']);
		echo $hasil ? 'false' : 'true';
	}

	public function lapor()
	{
		$this->set_title('Lapor');

		if ($_SESSION['mandiri'] != 1)
		{
			redirect('home');
		}

		$this->load->model('program_bantuan_model','pb');

		$data = $this->includes;
		$data['menu_surat2'] = $this->surat_model->list_surat2();
		$this->_get_common_data($data);
		$data['daftar_bantuan'] = $this->pb->daftar_bantuan_yang_diterima($_SESSION['nik']);

		$data['page_content'] = $this->load->view($this->theme_path.'layanan_mandiri/lapor', $data, TRUE);

		$this->load->view($this->template, $data);
	}

	public function simpan_laporan()
	{
		$this->load->model('lapor_model');
		if ($_SESSION['mandiri'] != 1)
		{
			redirect('home');
		}

		$_SESSION['success'] = 1;
		$res = $this->lapor_model->insert();
		$data['data_config'] = $this->config_model->get_data();
		// cek kalau berhasil disimpan dalam database
		if ($res)
		{
			$this->session->set_flashdata('flash_message', 'Laporan anda telah berhasil dikirim dan akan segera diproses.');
		}
		else
		{
			$_SESSION['post'] = $_POST;
			if (!empty($_SESSION['validation_error']))
				$this->session->set_flashdata('flash_message', validation_errors());
			else
				$this->session->set_flashdata('flash_message', 'Laporan anda gagal dikirim. Silakan ulangi lagi.');
		}

		redirect("layanan_mandiri/lapor");
	}

	public function bantuan()
	{
		$this->set_title('Bantuan');

		if ($_SESSION['mandiri'] != 1)
		{
			redirect('home');
		}

		$this->load->model('program_bantuan_model','pb');

		$data = $this->includes;
		$this->_get_common_data($data);

		$data['page_content'] = $this->load->view($this->theme_path.'layanan_mandiri/bantuan', $data, TRUE);

		$this->load->view($this->template, $data);
	}

	private function _get_common_data(&$data)
	{
		$data['desa'] = $this->first_m->get_data();
		$data['menu_atas'] = $this->first_menu_m->list_menu_atas();
		$data['menu_kiri'] = $this->first_menu_m->list_menu_kiri();
		$data['teks_berjalan'] = $this->first_artikel_m->get_teks_berjalan();
		$data['slide_artikel'] = $this->first_artikel_m->slide_show();
		$data['slider_gambar'] = $this->first_artikel_m->slider_gambar();
		$data['w_cos']  = $this->web_widget_model->get_widget_aktif();
		$this->web_widget_model->get_widget_data($data);
		$data['data_config'] = $this->config_model->get_data();
		$data['flash_message'] = $this->session->flashdata('flash_message');

		// Pembersihan tidak dilakukan global, karena artikel yang dibuat oleh
		// petugas terpecaya diperbolehkan menampilkan <iframe> dsbnya..
		$list_kolom = array(
			'arsip',
			'w_cos'
		);

		foreach ($list_kolom as $kolom)
		{
			$data[$kolom] = $this->security->xss_clean($data[$kolom]);
		}
	}

	public function createPDF($fileName, $html) {
		ob_start(); 
            // Include the main TCPDF library (search for installation path).
		$this->load->library('Pdf');
            // create new PDF document
		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
            // set document information
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('TechArise');
		$pdf->SetTitle('TechArise');
		$pdf->SetSubject('TechArise');
		$pdf->SetKeywords('TechArise');

            // set default header data
		$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

            // set header and footer fonts
		$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

		$pdf->SetPrintHeader(false);
		$pdf->SetPrintFooter(false);

            // set default monospaced font
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

            // set margins
		$pdf->SetMargins(PDF_MARGIN_LEFT, 0, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(0);
		$pdf->SetFooterMargin(0);

            // set auto page breaks
            //$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
		$pdf->SetAutoPageBreak(TRUE, 0);

            // set image scale factor
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

            // set some language-dependent strings (optional)
		if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
			require_once(dirname(__FILE__).'/lang/eng.php');
			$pdf->setLanguageArray($l);
		}       

            // set font
		$pdf->SetFont('dejavusans', '', 10);

            // add a page
		$pdf->AddPage();

            // output the HTML content
		$pdf->writeHTML($html, true, false, true, false, '');

            // reset pointer to the last page
		$pdf->lastPage();       
		ob_end_clean();
            //Close and output PDF document
		$pdf->Output($fileName, 'F');        
	}

}