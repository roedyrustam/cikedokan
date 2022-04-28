<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Layanan extends Web_Controller {

	public function __construct()
	{
		parent::__construct();
		session_start();
		if ($_SESSION['mandiri'] != 1) redirect('layanan_mandiri/masuk');

		mandiri_timeout();
		$this->load->model('header_model');
		$this->load->model('penduduk_model');
		$this->load->model('surat_model');
		$this->load->model('keluar_model');
		$this->load->model('first_artikel_m');
	}

	public function index()
	{
		redirect('layanan_mandiri/profil');
	}

	public function artikel()
	{
		$this->set_title('Artikel');
		$id = $_SESSION['id'];

		$data = $this->includes;
		$this->_get_common_data($data);
		$data['penduduk'] = $this->penduduk_model->get_penduduk($id);

		$data['artikel'] = null;
		$data['list_artikel_warga'] = $this->first_artikel_m->list_artikel_warga($data['penduduk']['id']);
		$data['form_action'] = site_url("web_warga/insert");

		$data['page_content'] = $this->load->view($this->theme_path.'layanan_mandiri/artikel', $data, TRUE);
		$this->set_template('fullwidth');
		$this->load->view($this->template, $data);
	}

	public function profil()
	{
		$this->set_title('Profil Penduduk');
		$id = $_SESSION['id'];

		$data = $this->includes;
		$data['menu_surat2'] = $this->surat_model->list_surat2();
		$this->_get_common_data($data);
		$data['penduduk'] = $this->penduduk_model->get_penduduk($id);
		$data['list_kelompok'] = $this->penduduk_model->list_kelompok($id);
		$data['list_dokumen'] = $this->penduduk_model->list_dokumen($id);
		$id_penduduk = $data['penduduk']['id'];
		$data['list_surat_keluar'] = $this->keluar_model->list_data_perorangan($id_penduduk);
		$data['data_agenda'] = $this->first_artikel_m->agenda_show();

		$data['page_content'] = $this->load->view($this->theme_path.'layanan_mandiri/profil', $data, TRUE);
		
		$this->set_template('fullwidth');
		$this->load->view($this->template, $data);
	}

	public function cetak_kk($id='')
	{
		// Hanya boleh mencetak data pengguna yang login
		$id = $_SESSION['id'];
		// $id adalah id penduduk. Cari id_kk dulu
		$id_kk = $this->penduduk_model->get_id_kk($id);
		$data = $this->keluarga_model->get_data_cetak_kk($id_kk);
		$this->load->view("sid/kependudukan/cetak_kk_all", $data);
	}

	public function cetak_biodata($id='')
	{
		// Hanya boleh mencetak data pengguna yang login
		$id = $_SESSION['id'];

		$header = $this->header_model->get_data();
		$data['desa'] = $header['desa'];
		$data['penduduk'] = $this->penduduk_model->get_penduduk($id);
		$this->load->view('sid/kependudukan/cetak_biodata',$data);
	}

	public function kartu_peserta($id=0)
	{
		$data['sasaran'] = unserialize(SASARAN);
	
		$this->load->model('program_bantuan_model');

		$peserta = $this->program_bantuan_model->get_program_peserta_by_id($id);
		$detail = $this->db->where('id', $peserta['program_id'])->get('program')->row_array();
		$individu = $this->db->where('nik', $_SESSION['nik'])->select('id')->get('tweb_penduduk')->row_array();
		$individu = $this->penduduk_model->get_penduduk($id);

		$data['individu'] = $individu;
		$data['detail'] = $detail;
		$data['peserta'] = $peserta;
		
		// Hanya boleh menampilkan data pengguna yang login
		// ** Bagi program sasaran pendududk **
		
		// if ($data['peserta'] == $_SESSION['nik'])
			$this->load->view('program_bantuan/data_peserta', $data);
			
	}

	public function kartu_peserta_pdf_html($id=0)
	{
		$data['sasaran'] = unserialize(SASARAN);
	
		$this->load->model('program_bantuan_model');

		$peserta = $this->program_bantuan_model->get_program_peserta_by_id($id);
		$detail = $this->db->where('id', $peserta['program_id'])->get('program')->row_array();
		$individu = $this->db->where('nik', $_SESSION['nik'])->select('id')->get('tweb_penduduk')->row_array();
		$individu = $this->penduduk_model->get_penduduk($id);

		$data['individu'] = $individu;
		$data['detail'] = $detail;
		$data['peserta'] = $peserta;
		
		// Hanya boleh menampilkan data pengguna yang login
		// ** Bagi program sasaran pendududk **
		
		// if ($data['peserta'] == $_SESSION['nik'])

		$this->_get_common_data($data);



			$this->load->view('program_bantuan/data_peserta_pdf', $data);
	}

	public function kartu_peserta_pdf($id=0)
	{

		$data['sasaran'] = unserialize(SASARAN);
	
		$this->load->model('program_bantuan_model');

		$peserta = $this->program_bantuan_model->get_program_peserta_by_id($id);
		$detail = $this->db->where('id', $peserta['program_id'])->get('program')->row_array();
		$individu = $this->db->where('nik', $_SESSION['nik'])->select('id')->get('tweb_penduduk')->row_array();
		$individu = $this->penduduk_model->get_penduduk($id);

		$data['individu'] = $individu;
		$data['detail'] = $detail;
		$data['peserta'] = $peserta;
		
		// Hanya boleh menampilkan data pengguna yang login
		// ** Bagi program sasaran pendududk **
		
		// if ($data['peserta'] == $_SESSION['nik'])

		$this->_get_common_data($data);


		ob_start();

		$this->load->view('program_bantuan/data_peserta_pdf', $data);

		$content = ob_get_contents();

		ob_end_clean();

		// instantiate and use the dompdf class
		$dompdf = new Dompdf\Dompdf();



		$dompdf->loadHtml($content);

		// (Optional) Setup the paper size and orientation
		$dompdf->setPaper('A4', 'protait');

		// Render the HTML as PDF
		$dompdf->render();

		$output = $dompdf->output();

		$lokasi = LOKASI_DOKUMEN.sprintf('kartu_bantuan_%s_%s.pdf', $detail['nama'], $peserta['no_id_kartu']);
    	
    	file_put_contents($lokasi, $output);


		header('Content-Type: application/pdf');
		

		header(sprintf('Content-Disposition: attachment; filename="kartu_bantuan_%s_%s.pdf"', $detail['nama'], $peserta['no_id_kartu']));

    	@readfile($lokasi);
	}

	
	public function lampiran($data, $nama_surat, &$lampiran)
	{
		$surat = $data['surat'];
		if (!$surat['lampiran']) return;

		$config = $data['config'];
		$individu = $data['individu'];
		$input = $data['input'];
		// $lampiran_surat dalam bentuk seperti "f-1.08.php,f-1.25.php"
		$daftar_lampiran = explode(",", $surat['lampiran']);
    include($this->get_file_data_lampiran($surat['url_surat'], $surat['lokasi_rtf']));
		$lampiran = pathinfo($nama_surat, PATHINFO_FILENAME)."_lampiran.pdf";

    // get the HTML using output buffer
    ob_start();
    foreach($daftar_lampiran as $format_lampiran)
    {
	    include($this->get_file_lampiran($surat['url_surat'], $surat['lokasi_rtf'], $format_lampiran));
    }
    $content = ob_get_clean();

    // convert in PDF

	}

	public function lapor()
	{
		$this->set_title('Lapor');
		$this->load->model('program_bantuan_model','pb');

		$data = $this->includes;
		$data['menu_surat2'] = $this->surat_model->list_surat2();
		$this->_get_common_data($data);
		$data['daftar_bantuan'] = $this->pb->daftar_bantuan_yang_diterima($_SESSION['nik']);
		$data['data_agenda'] = $this->first_artikel_m->agenda_show();

		$data['page_content'] = $this->load->view($this->theme_path.'layanan_mandiri/lapor', $data, TRUE);

		$this->load->view($this->template, $data);
	}

	public function simpan_laporan()
	{
		$this->load->model('lapor_model');
		$_SESSION['success'] = 1;
		$res = $this->lapor_model->insert();
		$data['data_config'] = $this->config_model->get_data();
		// cek kalau berhasil disimpan dalam database
		if ($res)
		{
			$this->session->set_flashdata('flash_message', '<p class="alert alert-success">Terimakasih Telah Mengirim Pesan ke Kami. Kami akan segera membalas atau menindaklanjuti pesan anda</p>');
		}
		else
		{
			$_SESSION['post'] = $_POST;
			if (!empty($_SESSION['validation_error']))
				$this->session->set_flashdata('flash_message', '<p class="alert alert-danger">'.validation_errors().'</p>');
			else
				$this->session->set_flashdata('flash_message', '<p class="alert alert-danger">Laporan anda gagal dikirim. Silakan ulangi lagi</p>');
		}

		redirect("layanan_mandiri/lapor");
	}

	public function bantuan()
	{
		$this->set_title('Program Bantuan');
		$this->load->model('program_bantuan_model', 'pb');

		$data = $this->includes;
		$this->_get_common_data($data);

		$data['daftar_bantuan'] = $this->pb->daftar_bantuan_yang_diterima($_SESSION['nik']);
		$data['page_content'] = $this->load->view($this->theme_path.'layanan_mandiri/bantuan', $data, TRUE);

		$this->set_template('fullwidth');
		$this->load->view($this->template, $data);
	}

	public function ubah_biodata($type="")
	{
		if($type === 'clear') 
		{
			unset($_SESSION['cari']);
			unset($_SESSION['filter']);
			unset($_SESSION['status_dasar']);
			unset($_SESSION['sex']);
			unset($_SESSION['warganegara']);
			unset($_SESSION['cacat']);
			unset($_SESSION['menahun']);
			unset($_SESSION['golongan_darah']);
			unset($_SESSION['dusun']);
			unset($_SESSION['rw']);
			unset($_SESSION['rt']);
			unset($_SESSION['agama']);
			unset($_SESSION['umur_min']);
			unset($_SESSION['umur_max']);
			unset($_SESSION['pekerjaan_id']);
			unset($_SESSION['status']);
			unset($_SESSION['pendidikan_sedang_id']);
			unset($_SESSION['pendidikan_kk_id']);
			unset($_SESSION['umurx']);
			unset($_SESSION['status_penduduk']);
			unset($_SESSION['judul_statistik']);
			unset($_SESSION['hamil']);
			unset($_SESSION['cara_kb_id']);
			unset($_SESSION['akta_kelahiran']);
			unset($_SESSION['status_ktp']);
			$_SESSION['per_page'] = 50;

			redirect('layanan_mandiri/profil');
		}
		else
		{
			$this->load->model('referensi_model');
			$id = $_SESSION['id'];
			// Reset kalau dipanggil dari luar pertama kali ($_POST kosong)
			if (empty($_POST) AND (!isset($_SESSION['dari_internal']) OR !$_SESSION['dari_internal']))
				unset($_SESSION['validation_error']);

			$data = $this->includes;
			$this->_get_common_data($data);

			if (isset($_POST['dusun']))
				$data['dus_sel'] = $_POST['dusun'];
			else
				$data['dus_sel'] = '';

			if (isset($_POST['rw']))
				$data['rw_sel'] = $_POST['rw'];
			else
				$data['rw_sel'] = '';

			if (isset($_POST['rt']))
				$data['rt_sel'] = $_POST['rt'];
			else
				$data['rt_sel'] = '';

			if ($id)
			{
				$data['id'] = $id;
				// Validasi dilakukan di penduduk_model sewaktu insert dan update
				if (isset($_SESSION['validation_error']) AND $_SESSION['validation_error'])
				{
					// Kalau dipanggil internal pakai data yang disimpan di $_SESSION
					if ($_SESSION['dari_internal'])
					{
						$data['penduduk'] = $_SESSION['post'];
					}
					else
					{
						$data['penduduk'] = $_POST;
					}
					// penduduk_model->get_penduduk mengambil sebagai 'id_sex',
					// tapi di penduduk_form memakai 'sex' sesuai dengan nama kolom
					$data['penduduk']['id_sex'] = $data['penduduk']['sex'];
				}
				else
				{
					$data['penduduk'] = $this->penduduk_model->get_penduduk($id);
					$_SESSION['nik_lama'] = $data['penduduk']['nik'];
				}
				$data['form_action'] = site_url("layanan_mandiri/penduduk/update_penduduk");
			}

			$header = $this->header_model->get_data();

			$data['dusun'] = $this->penduduk_model->list_dusun();
			$data['rw'] = $this->penduduk_model->list_rw($data['dus_sel']);
			$data['rt'] = $this->penduduk_model->list_rt($data['dus_sel'], $data['rw_sel']);
			$data['agama'] = $this->penduduk_model->list_agama();
			$data['pendidikan_sedang'] = $this->penduduk_model->list_pendidikan_sedang();
			$data['pendidikan_kk'] = $this->penduduk_model->list_pendidikan_kk();
			$data['pekerjaan'] = $this->penduduk_model->list_pekerjaan();
			$data['warganegara'] = $this->penduduk_model->list_warganegara();
			$data['hubungan'] = $this->penduduk_model->list_hubungan();
			$data['kawin'] = $this->penduduk_model->list_status_kawin();
			$data['golongan_darah'] = $this->penduduk_model->list_golongan_darah();
			$data['cacat'] = $this->penduduk_model->list_cacat();
			$data['sakit_menahun'] = $this->referensi_model->list_data('tweb_sakit_menahun');
			$data['cara_kb'] = $this->penduduk_model->list_cara_kb($data['penduduk']['id_sex']);
			$data['wajib_ktp'] = $this->referensi_model->list_wajib_ktp();
			$data['ktp_el'] = $this->referensi_model->list_ktp_el();
			$data['status_rekam'] = $this->referensi_model->list_status_rekam();
			$data['tempat_dilahirkan'] = $this->referensi_model->list_kode_array(TEMPAT_DILAHIRKAN);
			$data['jenis_kelahiran'] = $this->referensi_model->list_kode_array(JENIS_KELAHIRAN);
			$data['penolong_kelahiran'] = $this->referensi_model->list_kode_array(PENOLONG_KELAHIRAN);

			unset($_SESSION['dari_internal']);
			$data['page_content'] = $this->load->view('sid/kependudukan/penduduk_form', $data, TRUE);
			$this->set_template('fullwidth');
			$this->load->view($this->template, $data);
		}
	}

}