<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Home extends Web_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('penduduk_model');
		$this->load->model('inventaris_gedung_model');
	}

	public function kontak($mode = null, $token = null)
	{
		$this->load->helper('pdd');

		if ($mode == 'store') {
			return $this->kontak_store();
		}

		$this->load->model('plan_lokasi_model');
		$this->load->model('plan_area_model');
		$this->load->model('plan_garis_model');
		$this->load->model('header_model');

		$this->set_title('Kontak Desa');
		$data = $this->includes;

		$data['filter'] = '';
		$data['layer_desa'] = 1;
		$data['layer_wilayah'] = 1;
		$data['layer_lokasi'] = 1;
		$data['layer_area'] = 1;
		$data['wilayah'] = $this->penduduk_model->list_wil();
		$data['desa'] = $this->penduduk_model->get_desa();
		$data['lokasi'] = $this->plan_lokasi_model->list_data();
		$data['garis'] = $this->plan_garis_model->list_data();
		$data['area'] = $this->plan_area_model->list_data();
		$data['penduduk'] = $this->penduduk_model->list_data_map();
		$data['keyword'] = $this->penduduk_model->autocomplete();
		$data['kontak_hal'] = pdd_kontak_hal();

		$header = $this->header_model->get_data();

		$this->_get_common_data($data);
		$this->set_template('fullwidth');

		if ($mode == 'periksa') {
			return $this->kontak_periksa($token, $data);
		} elseif ($mode == 'balas') {
			return $this->kontak_replay($token, $data);
		}

		$data['page_content'] = $this->load->view($this->theme_path . 'kontak', $data, TRUE);
		$this->load->view($this->template, $data);
	}

	public function kontak_replay($token, $data)
	{
		if (!empty($token)) {
			$this->db->where('token', $token)->select('id');

			$data['chat'] = $this->db->get('tweb_kontak')->row_array();

			if ($data['chat']) {
				$this->load->model('kontak_model');

				$data['page_content'] = $this->load->view($this->theme_path . 'kontak_periksa', $data, TRUE);
				$this->load->view($this->template, $data);

				$this->kontak_model->replay($data['chat']['id'], $this->input->post());

				redirect("kontak/periksa/$token");
			}
		}

		show_404();
	}

	public function kontak_periksa($token = null, $data)
	{
		if (!empty($token)) {
			$this->db->where('token', $token);

			$data['chat'] = $this->db->get('tweb_kontak')->row_array();

			if ($data) {
				$this->db->where('parent', $data['chat']['id']);
				$data['chat']['balasan'] = $this->db->get('tweb_kontak')->result_array();

				$header = $this->header_model->get_data();

				$data['page_content'] = $this->load->view($this->theme_path . 'kontak_periksa', $data, TRUE);
				$this->load->view($this->template, $data);

				return 1;
			}
		}

		show_404();
	}

	private function kontak_email($destination, $token, $subject)
	{
		$this->load->helper('pddmail_helper');

		$body .= '<p>Terimakasih telah mengirim pesan, Kami akan segera membalas atau menindaklanjuti pesan anda.</p>';
		$body .= '<div>' . $this->input->post('isi') . '</div>';
		$body .= "<p>";
		$body .= "Buka link dibawah ini untuk memeriksa balasan dari laporan anda";
		$body .= "</p><p>";
		$body .= "http://" . $_SERVER['HTTP_HOST'] . "/kontak/periksa/$token";
		$body .= "</p>";
		$subject = 'Laporan ' . $subject;

		pdd_gmail_send($destination, $subject, $body, $attachment = null);
	}

	public function kontak_store()
	{
		$this->load->model('kontak_model');

		// Periksa isian captcha

		include FCPATH . 'securimage/securimage.php';

		$securimage = new Securimage();

		$_SESSION['validation_error'] = false;

		if ($securimage->check($_POST['captcha_code']) == false) {
			$this->session->set_flashdata('flash_message', '<p class="alert alert-warning">Kode anda salah. Silakan ulangi lagi.</p>');

			$_SESSION['post'] = $_POST;
			$_SESSION['validation_error'] = true;
			redirect("kontak");
		}

		if ($this->kontak_model->store($this->input->post(), $token)) {
			$this->kontak_email($this->input->post('email'), $token, $this->input->post('judul'));
			$this->session->set_flashdata('flash_message', '<p class="alert alert-success">Terimakasih Telah Mengirim Pesan ke Kami. Kami akan segera membalas atau menindaklanjuti pesan anda</p>');

			$this->session->set_flashdata('success', true);

			$_SESSION['sukses'] = 1;

			return redirect("kontak");
		} else {
			$_SESSION['post'] = $_POST;

			if (!empty($_SESSION['validation_error'])) {
				$this->session->set_flashdata('flash_message', '<p class="alert alert-danger">' . validation_errors() . '</p>');
			} else {
				$this->session->set_flashdata('flash_message', '<p class="alert alert-danger">Pesan anda gagal dikirim. Silakan ulangi lagi.</p>');
			}

			return redirect("kontak");
		}
	}

	public function index()

	{
		$this->load->model('header_model');
		$this->load->model('lapor_model');
		$this->load->model('surat_model');
		$this->load->model('kontak_model');
		$this->load->model('first_artikel_m');
		$this->load->model('first_gallery_m');
		$this->load->model('lapor_model');
		
		$this->homepage = TRUE;
		$this->set_title('Beranda');
		$data = $this->includes;

		$data['pendudukx'] = 'sip';
		$data['keluarga'] = $this->header_model->keluarga_total();
		$data['miskin'] = $this->header_model->miskin_total();
		$data['kelompok'] = $this->header_model->kelompok_total();
		$data['rtm'] = $this->header_model->rtm_total();
		$data['dusun'] = $this->header_model->dusun_total();
		$data['jumlah_surat'] = $this->surat_model->surat_total();
		$data['lapor'] = $this->lapor_model->lapor_total();
		$data['kontak'] = $this->kontak_model->belum_dibaca();
		
		// Artikel Statik		
		$data['data_kolom_kades']	= $this->first_artikel_m->list_artikel(0, 1, 987);
		$data['count_kolom_kades']	= $this->first_artikel_m->count_artikel_kategori('987');

		//Agenda
		$data['data_agenda']	= $this->first_artikel_m->agenda_show(0, 3, 1000);
		$data['count_agenda']	= $this->first_artikel_m->count_artikel_kategori('1000');

		//Berita
		$data['data_berita']     = $this->first_artikel_m->list_berita(0, $this->setting->web_artikel_per_page);

		//Semua Artikel Kecuali Teks Berjalan dan Profil Desa
		$data['data_artikels']     = $this->first_artikel_m->list_artikel(0, $this->setting->web_artikel_per_page);

		//Galeri
		$data['data_galeri']     = $this->first_gallery_m->view_gallery_widget()->result_array();
		$data['count_galeri']     = $this->first_gallery_m->view_gallery_widget()->num_rows();

		//Laporan Warga
		$data['data_lapor']     = $this->lapor_model->view_lapor_widget()->result_array();
		$data['count_lapor']     = $this->lapor_model->view_lapor_widget()->num_rows();

		//Video
		$data['data_video']     = $this->first_artikel_m->list_artikel(0, 5, 1006);
		$data['count_video']    = $this->first_artikel_m->count_artikel_kategori('1006');

		//Pengumuman
		$data['data_pengumuman'] = $this->first_artikel_m->list_artikel(0, 5, 1005);
		$data['count_pengumuman']     = $this->first_artikel_m->count_artikel_kategori('1005');		

		//Panduan 
		$data['data_layanan']   = $this->first_artikel_m->list_artikel(0, 3, 1004);
		$data['count_layanan']  = $this->first_artikel_m->count_artikel_kategori('1004');

		//Pembangunan 
		$data['data_pembangunan'] = $this->first_artikel_m->list_artikel(0, 4, 1003);
		$data['count_pembangunan']  = $this->first_artikel_m->count_artikel_kategori('1003');

		//Kegiatan Desa
		$data['data_kegiatan'] = $this->first_artikel_m->list_artikel(0, 4, 1002);
		$data['count_kegiatan']  = $this->first_artikel_m->count_artikel_kategori('1002');

		//Potensi
		$data['data_potensi'] = $this->first_artikel_m->list_artikel(0, 3, 1001);
		$data['count_potensi']     = $this->first_artikel_m->count_artikel_kategori('1001');

		//Komentar 
		$data['count_komentar']  = $this->first_artikel_m->count_komentar();
		
		$this->_get_common_data($data);
		$this->set_template('homepage');
		$this->load->view($this->template, $data);
	}
	
	private function get_data_stat(&$data, $lap)

	{
		$data['stat'] = $this->laporan_penduduk_model->judul_statistik($lap);
		$data['list_bantuan'] = $this->program_bantuan_model->list_program(0);

		if ($lap > 50) {
			// Untuk program bantuan, $lap berbentuk '50<program_id>'
			$program_id = preg_replace('/^50/', '', $lap);
			$data['program'] = $this->program_bantuan_model->get_sasaran($program_id);
			$data['judul_kelompok'] = $data['program']['judul_sasaran'];
			$data['kategori'] = 'bantuan';
		} elseif ($lap > 20 or "$lap" == 'kelas_sosial') {

			$data['kategori'] = 'keluarga';
		} else {

			$data['kategori'] = 'penduduk';
		}
	}

	// Halaman arsip album galeri
	public function albums($p = 1)

	{

		$this->set_title('Album Galeri');

		$data = $this->includes;
		$data['p'] = $p;
		$data['paging'] = $this->first_gallery_m->paging($p);
		$data['paging_range'] = 3;
		$data['start_paging'] = max($data['paging']->start_link, $p - $data['paging_range']);
		$data['end_paging'] = min($data['paging']->end_link, $p + $data['paging_range']);
		$data['pages'] = range($data['start_paging'], $data['end_paging']);
		$data['albums'] = $this->web_gallery_model->list_data(1, 0, 500);
		$data['gallery'] = $this->first_gallery_m->gallery_show($data['paging']->offset, $data['paging']->per_page);

		$this->_get_common_data($data);

		$data['page_content'] = $this->load->view($this->theme_path . 'template-parts/album', $data, TRUE);
		$this->set_template('fullwidth');
		$this->load->view($this->template, $data);
	}

	// halaman rincian tiap album galeri
	public function galeri($gal = 0, $p = 1)

	{

		$this->set_title('Foto Galeri');

		$data = $this->includes;
		$data['p'] = $p;
		$data['gal'] = $gal;
		$data['paging'] = $this->first_gallery_m->paging2($gal, $p);
		$data['paging_range'] = 3;
		$data['start_paging'] = max($data['paging']->start_link, $p - $data['paging_range']);
		$data['end_paging'] = min($data['paging']->end_link, $p + $data['paging_range']);
		$data['pages'] = range($data['start_paging'], $data['end_paging']);


		$data['gallery'] = $this->first_gallery_m->sub_gallery_show($gal, $data['paging']->offset, $data['paging']->per_page);
		$data['parrent'] = $this->first_gallery_m->get_parrent($gal);
		$data['mode'] = 1;

		$this->_get_common_data($data);

		$data['page_content'] = $this->load->view($this->theme_path . 'template-parts/galeri', $data, TRUE);
		$this->set_template('fullwidth');
		$this->load->view($this->template, $data);
	}

	// Page Statistik
	public function statistik($stat = 0, $tipe = 0)

	{

		$data = $this->includes;

		if ($stat == 'list') {
			$data['heading'] = "Statistik Kependudukan";
			$data['datas'] = $this->laporan_penduduk_model->list_data();
			$this->set_title($data['heading']);
			$data['page_content'] = $this->load->view($this->theme_path . 'list-statistik', $data, TRUE);

		} else {
			$data['heading'] = $this->laporan_penduduk_model->judul_statistik($stat);
			$this->set_title($data['heading']);
			$data['jenis_laporan'] = $this->laporan_penduduk_model->jenis_laporan($stat);

			if (!$data['stat'] = $this->laporan_penduduk_model->list_data($stat)) {
				show_404();
			}
			$data['tipe'] = $tipe;
			$data['st'] = $stat;

			if ($tipe == 2) {
				if ($tipe == 1) {
					$page = 'statistik_sos';
				}
			} elseif ($tipe == 3) {
				$page = 'wilayah';

			} elseif ($tipe == 4) {
				$page = 'dpt';

			} else {
				$page = 'statistik';

			}
			$data['page_content'] = $this->load->view($this->theme_path . 'statistik/' . $page, $data, TRUE);
		}

		$this->_get_common_data($data);

		$this->set_template('fullwidth');
		$this->load->view($this->template, $data);
	}

	public function data_analisis($stat = "", $sb = 0, $per = 0)
	{

		$data = $this->includes;

		if ($stat == "") {

			$data['list_indikator'] = $this->first_penduduk_m->list_indikator();

			$data['list_jawab'] = null;

			$data['indikator'] = null;
		} else {

			$data['list_indikator'] = "";

			$data['list_jawab'] = $this->first_penduduk_m->list_jawab($stat, $sb, $per);

			$data['indikator'] = $this->first_penduduk_m->get_indikator($stat);
		}



		$this->_get_common_data($data);



		$data['page_content'] = $this->load->view($this->theme_path . 'statistik/analisis', $data, TRUE);

		$this->set_template('analisis');

		$this->load->view($this->template, $data);
	}



	public function dpt()

	{

		$this->set_title('Daftar Pemilih Tetap');



		$this->load->model('dpt_model');



		$data = $this->includes;

		$data['main'] = $this->dpt_model->statistik_wilayah();

		$data['total'] = $this->dpt_model->statistik_total();

		$data['tanggal_pemilihan'] = $this->dpt_model->tanggal_pemilihan();

		$this->_get_common_data($data);

		$data['tipe'] = 4;



		$data['page_content'] = $this->load->view($this->theme_path . 'statistik/dpt', $data, TRUE);

		//$this->set_template('fullwidth');

		$this->load->view($this->template, $data);
	}



	public function wilayah()

	{

		$this->set_title('Data Demografi Wilayah');

		$this->set_page_header('Data Demografi Berdasar Populasi per Wilayah');



		$this->load->model('wilayah_model');

		$data = $this->includes;

		$data['main']    = $this->first_penduduk_m->wilayah();

		$data['heading'] = "Populasi Per Wilayah";

		$data['tipe'] = 3;

		$data['total'] = $this->wilayah_model->total();

		$data['st'] = 1;

		$this->_get_common_data($data);

		$data['data_agenda'] = $this->first_artikel_m->agenda_show();

		$data['page_content'] = $this->load->view($this->theme_path . 'statistik/wilayah', $data, TRUE);

		$this->set_template('fullwidth');

		$this->load->view($this->template, $data);
	}



	public function page($page = NULL)

	{

		$data = $this->includes;
		if (is_null($page)) {
			$page = !is_null($this->input->get('page')) ? $_GET['page'] : 1;

			$this->set_title($data['heading'] = 'Profil Desa');

			$data = $this->includes;
			$data['page'] = $page;
			$data['paging']  = $this->first_artikel_m->paging_kat($page, 999);
			$data['paging_page']  = 'page';
			$data['paging_range'] = 3;
			$data['start_paging'] = max($data['paging']->start_link, $page - $data['paging_range']);
			$data['end_paging'] = min($data['paging']->end_link, $page + $data['paging_range']);
			$data['pages'] = range($data['start_paging'], $data['end_paging']);
			$data['datas'] = $this->first_artikel_m->list_artikel($data['paging']->offset, $data['paging']->per_page, 999);
			$data['headline'] = $this->first_artikel_m->get_headline();

			$this->_get_common_data($data);
			$this->set_template('profile');
		} else {
			$judul = str_replace('-', ' ', $page);
			$artikel = $this->first_artikel_m->get_detail_page($judul);

			// initialize pagination
			$page = !is_null($this->input->get('page')) ? $_GET['page'] : 1;
			$this->set_title($artikel['judul']);
			$data['page'] = $page;
			$data['paging']  = $this->first_artikel_m->paging($page);
			$data['artikel'] = $this->first_artikel_m->list_artikel(0, $data['paging']->offset, $data['paging']->per_page);
			$data['content'] = $artikel;
			$data['komentar'] = $this->first_artikel_m->list_komentar($artikel['id']);
			$this->_get_common_data($data);

			// Validasi pengisian komentar di add_comment()
			// Kalau tidak ada error atau artikel pertama kali ditampilkan, kosongkan data sebelumnya
			if (empty($_SESSION['validation_error'])) {
				$_SESSION['post']['owner'] = '';
				$_SESSION['post']['email'] = '';
				$_SESSION['post']['no_hp'] = '';
				$_SESSION['post']['komentar'] = '';
				$_SESSION['post']['captcha_code'] = '';
			}

			$this->set_template('profile');
			$data['page_content'] = $this->load->view($this->theme_path . 'template-parts/content-page', $data, TRUE);
		}
		$this->load->view($this->template, $data);
	}

	//detail kades
	public function kades($page = NULL)

	{
		$data = $this->includes;
		if (is_null($page)) {
			$page = !is_null($this->input->get('page')) ? $_GET['page'] : 1;
			$this->set_title($data['heading'] = 'Sambutan & Himbauan');
			$data = $this->includes;
			$data['page'] = $page;
			$data['paging']  = $this->first_artikel_m->paging_kat($page, 998);
			$data['paging_page']  = 'page';
			$data['paging_range'] = 3;
			$data['start_paging'] = max($data['paging']->start_link, $page - $data['paging_range']);
			$data['end_paging'] = min($data['paging']->end_link, $page + $data['paging_range']);
			$data['pages'] = range($data['start_paging'], $data['end_paging']);
			$data['datas'] = $this->first_artikel_m->list_artikel($data['paging']->offset, $data['paging']->per_page, 998);
			$data['headline'] = $this->first_artikel_m->get_headline();
			$this->_get_common_data($data);
			$this->set_template('kades');
		} else {
			$this->load->model('first_artikel_m');
			$judul = str_replace('-', ' ', $page);
			$artikel = $this->first_artikel_m->get_detail_page($judul);

			if (!$artikel) show_404();
			// initialize pagination
			$page = !is_null($this->input->get('page')) ? $_GET['page'] : 1;
			$this->set_title($artikel['judul']);
			$data['page'] = $page;
			$data['paging']  = $this->first_artikel_m->paging($page);
			$data['artikel'] = $this->first_artikel_m->list_artikel(0, $data['paging']->offset, $data['paging']->per_page);
			$data['content'] = $artikel;
			$data['komentar'] = $this->first_artikel_m->list_komentar($artikel['id']);
			$this->_get_common_data($data);

			// Validasi pengisian komentar di add_comment()
			// Kalau tidak ada error atau artikel pertama kali ditampilkan, kosongkan data sebelumnya
			if (empty($_SESSION['validation_error'])) {
				$_SESSION['post']['owner'] = '';
				$_SESSION['post']['email'] = '';
				$_SESSION['post']['no_hp'] = '';
				$_SESSION['post']['komentar'] = '';
				$_SESSION['post']['captcha_code'] = '';
			}

			$this->set_template('page');
			$data['page_content'] = $this->load->view($this->theme_path . 'template-parts/content-kades', $data, TRUE);
		}

		$this->load->view($this->template, $data);
	}

	//detail video
	public function video($page = NULL)

	{
		$data = $this->includes;
		if (is_null($page)) {
			$page = !is_null($this->input->get('page')) ? $_GET['page'] : 1;


			$this->set_title($data['heading'] = 'Konten Video');
			$data = $this->includes;
			$data['page'] = $page;
			$data['paging']  = $this->first_artikel_m->paging_kat($page, 992);
			$data['paging_page']  = 'page';
			$data['paging_range'] = 3;
			$data['start_paging'] = max($data['paging']->start_link, $page - $data['paging_range']);
			$data['end_paging'] = min($data['paging']->end_link, $page + $data['paging_range']);
			$data['pages'] = range($data['start_paging'], $data['end_paging']);
			$data['datas'] = $this->first_artikel_m->list_artikel($data['paging']->offset, $data['paging']->per_page, 992);
			$data['headline'] = $this->first_artikel_m->get_headline();

			$this->_get_common_data($data);
			$this->set_template('video');
		} else {
			$this->load->model('first_artikel_m');
			$judul = str_replace('-', ' ', $page);
			$artikel = $this->first_artikel_m->get_detail_page($judul);

			if (!$artikel) show_404();

			// initialize pagination
			$page = !is_null($this->input->get('page')) ? $_GET['page'] : 1;
			$this->set_title($artikel['judul']);
			$data['page'] = $page;
			$data['paging']  = $this->first_artikel_m->paging($page);
			$data['artikel'] = $this->first_artikel_m->list_artikel(0, $data['paging']->offset, $data['paging']->per_page);
			$data['content'] = $artikel;
			$data['komentar'] = $this->first_artikel_m->list_komentar($artikel['id']);

			$this->_get_common_data($data);

			// Validasi pengisian komentar di add_comment()
			// Kalau tidak ada error atau artikel pertama kali ditampilkan, kosongkan data sebelumnya
			if (empty($_SESSION['validation_error'])) {
				$_SESSION['post']['owner'] = '';
				$_SESSION['post']['email'] = '';
				$_SESSION['post']['no_hp'] = '';
				$_SESSION['post']['komentar'] = '';
				$_SESSION['post']['captcha_code'] = '';
			}

			$this->set_template('page');
			$data['page_content'] = $this->load->view($this->theme_path . 'template-parts/content-video', $data, TRUE);
		}
		$this->load->view($this->template, $data);
	}

	//detail video

	public function berita($page = NULL)

	{
		$data = $this->includes;

		if (!is_null($page)) {

			$page = !is_null($this->input->get('page')) ? $_GET['page'] : 1;
			$this->set_title($data['heading'] = 'Berita');
			$data = $this->includes;

			$data['page'] = $page;
			$data['paging']  = $this->first_artikel_m->paging($page);
			$data['paging_page']  = 'berita/page';
			$data['paging_range'] = 3;
			$data['start_paging'] = max($data['paging']->start_link, $page - $data['paging_range']);
			$data['end_paging'] = min($data['paging']->end_link, $page + $data['paging_range']);
			$data['pages'] = range($data['start_paging'], $data['end_paging']);

			$data['datas'] = $this->first_artikel_m->list_berita($data['paging']->offset, $data['paging']->per_page);
			$data['headline'] = $this->first_artikel_m->get_headline();

			$this->_get_common_data($data);
			$this->set_template('archive');

		} else {

			$this->load->model('first_artikel_m');

			$judul = str_replace('-', ' ', $page);
			$artikel = $this->first_artikel_m->get_detail_page($judul);

			if (!$artikel) show_404();

			// initialize pagination
			$page = !is_null($this->input->get('page')) ? $_GET['page'] : 1;

			$this->set_title($artikel['judul']);
			$data['page'] = $page;
			$data['paging']  = $this->first_artikel_m->paging($page);
			$data['artikel'] = $this->first_artikel_m->list_berita(0, $data['paging']->offset, $data['paging']->per_page);
			$data['content'] = $artikel;
			$data['komentar'] = $this->first_artikel_m->list_komentar($artikel['id']);

			$this->_get_common_data($data);

			// Validasi pengisian komentar di add_comment()
			// Kalau tidak ada error atau artikel pertama kali ditampilkan, kosongkan data sebelumnya
			if (empty($_SESSION['validation_error'])) {
				$_SESSION['post']['owner'] = '';
				$_SESSION['post']['email'] = '';
				$_SESSION['post']['no_hp'] = '';
				$_SESSION['post']['komentar'] = '';
				$_SESSION['post']['captcha_code'] = '';
			}

			$this->set_template('page');
			$data['page_content'] = $this->load->view($this->theme_path . 'template-parts/content-archive', $data, TRUE);
		}

		$this->load->view($this->template, $data);
	}

	//detail potensi

	public function potensi($page = NULL)

	{
		$data = $this->includes;
		if (is_null($page)) {
			$page = !is_null($this->input->get('page')) ? $_GET['page'] : 1;

			$this->set_title($data['heading'] = 'Potensi & Produk Desa');
			$data = $this->includes;
			$data['page'] = $page;
			$data['paging']  = $this->first_artikel_m->paging_kat($page, 1001);
			$data['paging_page']  = 'page';
			$data['paging_range'] = 3;
			$data['start_paging'] = max($data['paging']->start_link, $page - $data['paging_range']);
			$data['end_paging'] = min($data['paging']->end_link, $page + $data['paging_range']);
			$data['pages'] = range($data['start_paging'], $data['end_paging']);
			$data['datas'] = $this->first_artikel_m->list_artikel($data['paging']->offset, $data['paging']->per_page, 1001);
			$data['headline'] = $this->first_artikel_m->get_headline();

			$this->_get_common_data($data);
			$this->set_template('potensi-list');
		} else {
			$this->load->model('first_artikel_m');
			$judul = str_replace('-', ' ', $page);
			$artikel = $this->first_artikel_m->get_detail_page($judul);

			if (!$artikel) show_404();

			// initialize pagination
			$page = !is_null($this->input->get('page')) ? $_GET['page'] : 1;

			$this->set_title($artikel['judul']);
			$data['page'] = $page;
			$data['paging']  = $this->first_artikel_m->paging($page);
			$data['artikel'] = $this->first_artikel_m->list_artikel(0, $data['paging']->offset, $data['paging']->per_page);
			$data['content'] = $artikel;
			$data['komentar'] = $this->first_artikel_m->list_komentar($artikel['id']);
			$this->_get_common_data($data);

			// Validasi pengisian komentar di add_comment()
			// Kalau tidak ada error atau artikel pertama kali ditampilkan, kosongkan data sebelumnya
			if (empty($_SESSION['validation_error'])) {
				$_SESSION['post']['owner'] = '';
				$_SESSION['post']['email'] = '';
				$_SESSION['post']['no_hp'] = '';
				$_SESSION['post']['komentar'] = '';
				$_SESSION['post']['captcha_code'] = '';
			}

			$this->set_template('page');
			$data['page_content'] = $this->load->view($this->theme_path . 'template-parts/content-archive', $data, TRUE);
		}

		$this->load->view($this->template, $data);
	}

	//detail pembangunan

	public function pembangunan($page = NULL)

	{
		$data = $this->includes;
		if (is_null($page)) {
			$page = !is_null($this->input->get('page')) ? $_GET['page'] : 1;
			$this->set_title($data['heading'] = 'Pembangunan');
			$data = $this->includes;
			$data['page'] = $page;
			$data['paging']  = $this->first_artikel_m->paging_kat($page, 995);
			$data['paging_page']  = 'page';
			$data['paging_range'] = 3;
			$data['start_paging'] = max($data['paging']->start_link, $page - $data['paging_range']);
			$data['end_paging'] = min($data['paging']->end_link, $page + $data['paging_range']);
			$data['pages'] = range($data['start_paging'], $data['end_paging']);
			$data['datas'] = $this->first_artikel_m->list_artikel($data['paging']->offset, $data['paging']->per_page, 995);
			$data['headline'] = $this->first_artikel_m->get_headline();

			$this->_get_common_data($data);
			$this->set_template('pembangunan');
		} else {
			$this->load->model('first_artikel_m');
			$judul = str_replace('-', ' ', $page);
			$artikel = $this->first_artikel_m->get_detail_page($judul);

			if (!$artikel) show_404();
			// initialize pagination
			$page = !is_null($this->input->get('page')) ? $_GET['page'] : 1;
			$this->set_title($artikel['judul']);
			$data['page'] = $page;
			$data['paging']  = $this->first_artikel_m->paging($page);
			$data['artikel'] = $this->first_artikel_m->list_artikel(0, $data['paging']->offset, $data['paging']->per_page);
			$data['content'] = $artikel;
			$data['komentar'] = $this->first_artikel_m->list_komentar($artikel['id']);
			$this->_get_common_data($data);
			// Validasi pengisian komentar di add_comment()
			// Kalau tidak ada error atau artikel pertama kali ditampilkan, kosongkan data sebelumnya
			if (empty($_SESSION['validation_error'])) {
				$_SESSION['post']['owner'] = '';
				$_SESSION['post']['email'] = '';
				$_SESSION['post']['no_hp'] = '';
				$_SESSION['post']['komentar'] = '';
				$_SESSION['post']['captcha_code'] = '';
			}
			$this->set_template('page');
			$data['page_content'] = $this->load->view($this->theme_path . 'template-parts/content-pembangunan', $data, TRUE);
		}
		$this->load->view($this->template, $data);
	}

	//detail panduan layanan
	public function layanan($page = NULL)

	{
		$data = $this->includes;
		if (is_null($page)) {
			$page = !is_null($this->input->get('page')) ? $_GET['page'] : 1;

			$this->set_title($data['heading'] = 'Panduan Layanan');

			$data = $this->includes;
			$data['page'] = $page;
			$data['paging']  = $this->first_artikel_m->paging_kat($page, 1004);
			$data['paging_page']  = 'page';
			$data['paging_range'] = 3;
			$data['start_paging'] = max($data['paging']->start_link, $page - $data['paging_range']);
			$data['end_paging'] = min($data['paging']->end_link, $page + $data['paging_range']);
			$data['pages'] = range($data['start_paging'], $data['end_paging']);
			$data['datas'] = $this->first_artikel_m->list_artikel($data['paging']->offset, $data['paging']->per_page, 1004);
			$data['headline'] = $this->first_artikel_m->get_headline();

			$this->_get_common_data($data);
			$this->set_template('panduan');

		} else {

			$this->load->model('first_artikel_m');

			$judul = str_replace('-', ' ', $page);
			$artikel = $this->first_artikel_m->get_detail_page($judul);

			if (!$artikel) show_404();

			// initialize pagination
			$page = !is_null($this->input->get('page')) ? $_GET['page'] : 1;
			$this->set_title($artikel['judul']);

			$data['page'] = $page;
			$data['paging']  = $this->first_artikel_m->paging($page);
			$data['artikel'] = $this->first_artikel_m->list_artikel(0, $data['paging']->offset, $data['paging']->per_page);
			$data['content'] = $artikel;
			$data['komentar'] = $this->first_artikel_m->list_komentar($artikel['id']);
			$this->_get_common_data($data);

			// Validasi pengisian komentar di add_comment()
			// Kalau tidak ada error atau artikel pertama kali ditampilkan, kosongkan data sebelumnya
			if (empty($_SESSION['validation_error'])) {
				$_SESSION['post']['owner'] = '';
				$_SESSION['post']['email'] = '';
				$_SESSION['post']['no_hp'] = '';
				$_SESSION['post']['komentar'] = '';
				$_SESSION['post']['captcha_code'] = '';
			}

			$this->set_template('page');
			$data['page_content'] = $this->load->view($this->theme_path . 'template-parts/content-panduan', $data, TRUE);
		}



		$this->load->view($this->template, $data);
	}



	//detail kegiatan

	public function kegiatan($page = NULL)

	{
		$data = $this->includes;
		if (is_null($page)) {
			$page = !is_null($this->input->get('page')) ? $_GET['page'] : 1;

			$this->set_title($data['heading'] = 'Kegiatan Desa');

			$data = $this->includes;
			$data['page'] = $page;
			$data['paging']  = $this->first_artikel_m->paging_kat($page, 1002);
			$data['paging_page']  = 'page';
			$data['paging_range'] = 3;
			$data['start_paging'] = max($data['paging']->start_link, $page - $data['paging_range']);
			$data['end_paging'] = min($data['paging']->end_link, $page + $data['paging_range']);
			$data['pages'] = range($data['start_paging'], $data['end_paging']);
			$data['datas'] = $this->first_artikel_m->list_artikel($data['paging']->offset, $data['paging']->per_page, 1002);
			$data['headline'] = $this->first_artikel_m->get_headline();

			$this->_get_common_data($data);

			$this->set_template('template-parts/kegiatan');
		} else {

			$this->load->model('first_artikel_m');
			$judul = str_replace('-', ' ', $page);
			$artikel = $this->first_artikel_m->get_detail_page($judul);

			if (!$artikel) show_404();

			// initialize pagination
			$page = !is_null($this->input->get('page')) ? $_GET['page'] : 1;
			$this->set_title($artikel['judul']);

			$data['page'] = $page;
			$data['paging']  = $this->first_artikel_m->paging($page);
			$data['artikel'] = $this->first_artikel_m->list_artikel(0, $data['paging']->offset, $data['paging']->per_page);
			$data['content'] = $artikel;
			$data['komentar'] = $this->first_artikel_m->list_komentar($artikel['id']);
			$this->_get_common_data($data);

			// Validasi pengisian komentar di add_comment()
			// Kalau tidak ada error atau artikel pertama kali ditampilkan, kosongkan data sebelumnya
			if (empty($_SESSION['validation_error'])) {
				$_SESSION['post']['owner'] = '';
				$_SESSION['post']['email'] = '';
				$_SESSION['post']['no_hp'] = '';
				$_SESSION['post']['komentar'] = '';
				$_SESSION['post']['captcha_code'] = '';
			}

			$this->set_template('page');
			$data['page_content'] = $this->load->view($this->theme_path . 'template-parts/content-kegiatan', $data, TRUE);
		}

		$this->load->view($this->template, $data);
	}



	//detail pengumuman
	public function pengumuman($page = NULL)

	{
		$data = $this->includes;
		if (is_null($page)) {
			$page = !is_null($this->input->get('page')) ? $_GET['page'] : 1;
			$this->set_title($data['heading'] = 'Pengumuman');

			$data = $this->includes;
			$data['page'] = $page;
			$data['paging']  = $this->first_artikel_m->paging_kat($page, 993);
			$data['paging_page']  = 'page';
			$data['paging_range'] = 3;
			$data['start_paging'] = max($data['paging']->start_link, $page - $data['paging_range']);
			$data['end_paging'] = min($data['paging']->end_link, $page + $data['paging_range']);
			$data['pages'] = range($data['start_paging'], $data['end_paging']);
			$data['datas'] = $this->first_artikel_m->list_artikel($data['paging']->offset, $data['paging']->per_page, 993);
			$data['headline'] = $this->first_artikel_m->get_headline();
			$this->_get_common_data($data);
			$this->set_template('pengumuman');
		} else {
			$this->load->model('first_artikel_m');
			$judul = str_replace('-', ' ', $page);
			$artikel = $this->first_artikel_m->get_detail_page($judul);

			if (!$artikel) show_404();
			// initialize pagination
			$page = !is_null($this->input->get('page')) ? $_GET['page'] : 1;
			$this->set_title($artikel['judul']);
			$data['page'] = $page;
			$data['paging']  = $this->first_artikel_m->paging($page);
			$data['artikel'] = $this->first_artikel_m->list_artikel(0, $data['paging']->offset, $data['paging']->per_page);
			$data['content'] = $artikel;
			$data['komentar'] = $this->first_artikel_m->list_komentar($artikel['id']);
			$this->_get_common_data($data);

			// Validasi pengisian komentar di add_comment()
			// Kalau tidak ada error atau artikel pertama kali ditampilkan, kosongkan data sebelumnya
			if (empty($_SESSION['validation_error'])) {
				$_SESSION['post']['owner'] = '';
				$_SESSION['post']['email'] = '';
				$_SESSION['post']['no_hp'] = '';
				$_SESSION['post']['komentar'] = '';
				$_SESSION['post']['captcha_code'] = '';
			}

			$this->set_template('page');
			$data['page_content'] = $this->load->view($this->theme_path . 'template-parts/content-pengumuman', $data, TRUE);
		}
		$this->load->view($this->template, $data);
	}


	public function agenda($page = NULL)

	{

		$data = $this->includes;

		if (is_null($page)) {
			$page = !is_null($this->input->get('page')) ? $_GET['page'] : 1;

			$this->set_title($data['heading'] = 'Agenda Desa');

			$data = $this->includes;
			$data['page'] = $page;
			$data['paging']  = $this->first_artikel_m->paging_kat($page, 1000);
			$data['paging_page']  = 'page';
			$data['paging_range'] = 3;
			$data['start_paging'] = max($data['paging']->start_link, $page - $data['paging_range']);
			$data['end_paging'] = min($data['paging']->end_link, $page + $data['paging_range']);
			$data['pages'] = range($data['start_paging'], $data['end_paging']);
			$data['datas'] = $this->first_artikel_m->list_artikel($data['paging']->offset, $data['paging']->per_page, 1000);
			$data['headline'] = $this->first_artikel_m->get_headline();

			$this->_get_common_data($data);

			$this->set_template('agendas');
		} else {

			$this->load->model('agenda_model');
			$judul = str_replace('-', ' ', $page);
			$artikel = $this->first_artikel_m->get_detail_page($judul);

			if (!$artikel) show_404();
			$this->agenda_model->get($artikel);

			// initialize pagination
			$page = !is_null($this->input->get('page')) ? $_GET['page'] : 1;

			$this->set_title($artikel['judul']);
			$data['page'] = $page;
			$data['paging']  = $this->first_artikel_m->paging($page);
			$data['artikel'] = $this->first_artikel_m->list_artikel(0, $data['paging']->offset, $data['paging']->per_page);
			$data['content'] = $artikel;
			$data['komentar'] = $this->first_artikel_m->list_komentar($artikel['id']);
			$this->_get_common_data($data);

			// Validasi pengisian komentar di add_comment()
			// Kalau tidak ada error atau artikel pertama kali ditampilkan, kosongkan data sebelumnya
			if (empty($_SESSION['validation_error'])) {
				$_SESSION['post']['owner'] = '';
				$_SESSION['post']['email'] = '';
				$_SESSION['post']['no_hp'] = '';
				$_SESSION['post']['komentar'] = '';
				$_SESSION['post']['captcha_code'] = '';
			}

			$this->set_template('page');
			$data['page_content'] = $this->load->view($this->theme_path . 'template-parts/content-agenda', $data, TRUE);
		}

		$this->load->view($this->template, $data);
	}

	// Transparansi Keuangan Desa //
	public function apbdes($tahun = NULL)

	{

		$tahun = !is_null($tahun) ? $tahun : 0;

		$this->set_title($data['heading'] = 'APBDes Tahun Anggaran');



		$data = $this->includes;

		$data['data_kategori'] = $this->kategori_anggaran->list_data();

		$data['data_tahun'] = $this->anggaran->get_tahun("enabled=1");

		$data['tahun'] = $tahun;



		$this->_get_common_data($data);

		$data['page_content'] = $this->load->view($this->theme_path . 'page-anggaran', $data, TRUE);

		$this->set_template('fullwidth');

		$this->load->view($this->template, $data);
	}

	public function downloads($p = 1)
	{
		// ID kategori yang ingin ditampilkan
		$kat = array(2, 3);
		// Batas item per halaman
		$per_page = 10;

		$this->set_title('Regulasi & Dokumen Publik');



		$data = $this->includes;

		$data['p'] = $p;
		$data['paging'] = $this->web_dokumen_model->paging($kat, $p);
		$data['main'] = $this->web_dokumen_model->list_data($kat, 0, $data['paging']->offset, $per_page);

		$this->_get_common_data($data);

		$data['page_content'] = $this->load->view($this->theme_path . 'template-parts/download', $data, TRUE);

		$this->set_template('fullwidth');

		$this->load->view($this->template, $data);
	}



	public function vote()

	{

		$this->load->helper('cookie');

		$res['status'] = 0;

		$res['pesan'] = '<p class="alert alert-danger">Maaf, Tidak dapat menyimpan polling.</p>';



		// cek apakah cookie sudah ada

		if ($this->input->cookie('ci_sess_pol')) {

			$res['pesan'] = '<p class="alert alert-danger">Maaf, Anda sudah pernah melakukan polling sebelumnya.</p>';
		} else {

			if ($this->poll->insert_vote()) {

				// simpan cookie agar tidak bisa vote berulang kali

				setcookie('ci_sess_pol', '1', strtotime('+7 day'), '/', $_SERVER['SERVER_NAME']);



				$res['status'] = 1;

				$res['pesan'] = '<p class="alert alert-success">Terima kasih, polling Anda sudah tersimpan.</p>';
			}
		}



		$this->output

			->set_content_type('application/json')

			->set_output(json_encode($res));
	}



	public function get_hasil_vote()

	{

		$data = $this->includes;

		$this->_get_common_data($data);

		$this->load->view($this->theme_path . 'widgets/polling-hasil', $data);
	}



	public function pemerintah()

	{

		$this->set_title('Pemerintah Desa');

		$this->load->model('pamong_model');

		$data = $this->includes;

		$data['main'] = $this->pamong_model->list_data();

		$this->_get_common_data($data);

		$data['data_agenda'] = $this->first_artikel_m->agenda_show();

		$data['page_content'] = $this->load->view($this->theme_path . 'template-parts/perangkat', $data, TRUE);

		$this->set_template('page');

		$this->load->view($this->template, $data);
	}

	public function tupoksi($id)
	{
		$data = $this->pamong_model->get_pamong_by_id($id);

		echo '<div class="modal-body">';
		echo $data['tupoksi'];
		echo '</div>';
	}



	public function inventaris()

	{
		$this->load->model('inventaris_asset_model');
		$this->load->model('inventaris_elektronik_model');
		$this->load->model('inventaris_gedung_model');
		$this->load->model('inventaris_kontruksi_model');
		$this->load->model('inventaris_mesin_model');
		$this->load->model('inventaris_tanah_model');

		$this->set_title($data['heading'] = 'Inventaris');

		$data = $this->includes;
		$data['asset'] = $this->inventaris_asset_model->list_inventaris();
		$data['elektronik'] = $this->inventaris_elektronik_model->list_inventaris();
		$data['gedung'] = $this->inventaris_gedung_model->list_inventaris();
		$data['kontruksi'] = $this->inventaris_kontruksi_model->list_inventaris();
		$data['mesin'] = $this->inventaris_mesin_model->list_inventaris();
		$data['tanah'] = $this->inventaris_tanah_model->list_inventaris();

		$this->_get_common_data($data);
		$data['data_agenda'] = $this->first_artikel_m->agenda_show();
		$data['page_content'] = $this->load->view($this->theme_path . 'template-parts/inventaris', $data, TRUE);
		$this->set_template('fullwidth');

		$this->load->view($this->template, $data);
	}

	public function gedung()

	{
		$this->load->model('inventaris_gedung_model');

		$data = $this->includes;

		$data['main'] = $this->inventaris_gedung_model->list_inventaris();

		$this->_get_common_data($gedung);

		$data['page_content'] = $this->load->view($this->theme_path . 'template-parts/inventaris', $gedung, TRUE);

		$this->load->view($this->template, $gedung);
	}



	public function maps()

	{

		$this->set_title($data['heading'] = 'Wilayah Desa');
		
		$this->load->model('plan_lokasi_model');
		$this->load->model('plan_area_model');
		$this->load->model('plan_garis_model');
		$this->load->model('header_model');
		
		$data = $this->includes;

		$data['list_dusun'] = $this->penduduk_model->list_dusun();
		$data['wilayah'] = $this->penduduk_model->list_wil();
		$data['list_agama'] = $this->penduduk_model->list_agama();
		$data['list_pendidikan_kk'] = $this->penduduk_model->list_pendidikan_kk();
		$data['desa'] = $this->penduduk_model->get_desa();
		$data['lokasi'] = $this->plan_lokasi_model->list_data();
		$data['garis'] = $this->plan_garis_model->list_data();
		$data['area'] = $this->plan_area_model->list_data();
		$data['penduduk'] = $this->penduduk_model->list_data_map();
		$data['keyword'] = $this->penduduk_model->autocomplete();

		$header = $this->header_model->get_data();

		$this->_get_common_data($data);

		$data['page_content'] = $this->load->view($this->theme_path . 'template-parts/peta', $data, TRUE);

		$this->load->view($this->template, $data);
	}
}
