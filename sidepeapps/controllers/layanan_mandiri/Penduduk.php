<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Penduduk extends Web_Controller {

	public function __construct()
	{
		parent::__construct();
		session_start();
		if ($_SESSION['mandiri'] != 1) redirect('layanan_mandiri/masuk');

		mandiri_timeout();
		$this->load->model('penduduk_model');
		$this->load->model('referensi_model');

		$this->set_template('fullwidth');
	}

	public function detail($p = 1, $o = 0, $id = '')
	{
		$data = $this->includes;
		$data['list_dokumen'] = $this->penduduk_model->list_dokumen($id);
		$data['penduduk'] = $this->penduduk_model->get_penduduk($id);
		$data['page_content'] = $this->load->view('sid/kependudukan/penduduk_detail', $data, TRUE);
		$this->_get_common_data($data);
		$this->load->view($this->template, $data);
	}

	public function dokumen($id = '')
	{
		$data = $this->includes;
		$data['list_dokumen'] = $this->penduduk_model->list_dokumen($id);
		$data['penduduk'] = $this->penduduk_model->get_penduduk($id);

		$data['page_content'] = $this->load->view('sid/kependudukan/penduduk_dokumen', $data, TRUE);
		$this->_get_common_data($data);
		$this->load->view($this->template, $data);
	}

	public function dokumen_form($id = 0, $id_dokumen = 0)
	{
		$data = $this->includes;
		$data['penduduk'] = $this->penduduk_model->get_penduduk($id);
		if ($id_dokumen)
		{
			$data['dokumen'] = $this->web_dokumen_model->get_dokumen($id_dokumen);
			$data['form_action'] = site_url("layanan_mandiri/penduduk/dokumen_update/$id_dokumen");
		}
		else
		{
			$data['dokumen'] = NULL;
			$data['form_action'] = site_url("layanan_mandiri/penduduk/dokumen_insert");
		}
		$this->load->view('sid/kependudukan/dokumen_form', $data);
	}

	public function dokumen_list($id = 0)
	{
		$data['list_dokumen'] = $this->penduduk_model->list_dokumen($id);
		$data['penduduk'] = $this->penduduk_model->get_penduduk($id);
		$this->load->view('sid/kependudukan/dokumen_ajax', $data);
	}

	public function dokumen_insert()
	{
		$this->web_dokumen_model->insert();
		$id = $_POST['id_pend'];
		redirect("layanan_mandiri/penduduk/dokumen/$id");
	}

	public function dokumen_update($id = '')
	{
		$this->web_dokumen_model->update($id);
		$id = $_POST['id_pend'];
		redirect("layanan_mandiri/penduduk/dokumen/$id");
	}

	public function delete_dokumen($id_pend = 0, $id = '')
	{
		$_SESSION['success'] = 1;
		$this->web_dokumen_model->delete($id);
		redirect("layanan_mandiri/penduduk/dokumen/$id_pend");
	}

	public function delete_all_dokumen($id_pend = 0)
	{
		$_SESSION['success'] = 1;
		$this->web_dokumen_model->delete_all();
		redirect("layanan_penduduk/dokumen/$id_pend");
	}

	public function cetak_biodata($id = '')
	{
		$header = $this->header_model->get_data();
		$data['desa'] = $header['desa'];
		$data['penduduk'] = $this->penduduk_model->get_penduduk($id);
		$this->load->view('sid/kependudukan/cetak_biodata', $data);
	}

	public function update_penduduk()
	{
		$id = $_SESSION['id'];
		$this->penduduk_model->update($id);

		if ($_SESSION['success'] == 1) {
			//$this->session->set_flashdata('flash_message', '<p class="alert alert-success">Data perubahan akan di verifikasi terlebih dahulu oleh Admin. Data Anda akan berubah setelah Admin menyetujui perubahan data yang sudah Anda masukkan.</p>');
			$this->session->set_flashdata('flash_message', '<p class="alert alert-success">Data perubahan sudah tersimpan</p>');
		}else{
			$this->session->set_flashdata('flash_message', '<p class="alert alert-danger">Terjadi kesalahan ketika menyimpan perubahan data, silahakn mencoba lagi.</p>');
		}

		redirect("layanan_mandiri/ubah_biodata");
	}

	public function ajax_penduduk_maps($p = 1, $o = 0, $id = '')
	{
		$data['p'] = $p;
		$data['o'] = $o;

		$data['penduduk'] = $this->penduduk_model->get_penduduk_map($id);
		$data['desa'] = $this->penduduk_model->get_desa();

		$data['form_action'] = site_url("layanan_mandiri/penduduk/update_maps/$p/$o/$id");

		$this->load->view('sid/kependudukan/maps', $data);
	}

	public function update_maps($p = 1, $o = 0, $id = '')
	{
		$this->penduduk_model->update_position($id);
	}

	public function search()
	{
		$cari = $this->input->post('cari');
		if ($cari != '')
			$_SESSION['cari'] = $cari;
		else unset($_SESSION['cari']);
		redirect('layanan_mandiri/penduduk');
	}

	public function filter()
	{
		$filter = $this->input->post('filter');
		if ($filter != "")
			$_SESSION['filter'] = $filter;
		else unset($_SESSION['filter']);
		redirect('layanan_mandiri/penduduk');
	}

	public function cetak($o = 0)
	{
		$data['main'] = $this->penduduk_model->list_data($o, 0, 10000);
		$this->load->view('sid/kependudukan/penduduk_print', $data);
	}

	public function excel($o = 0)
	{
		$data['main'] = $this->penduduk_model->list_data($o, 0, 10000);
		$this->load->view('sid/kependudukan/penduduk_excel', $data);
	}

	public function statistik($tipe = 0, $nomor = 0, $sex = NULL)
	{
		$_SESSION['per_page'] = 50;
		unset($_SESSION['log']);
		unset($_SESSION['cari']);
		unset($_SESSION['filter']);
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
		unset($_SESSION['status_penduduk']);
		unset($_SESSION['umurx']);
		unset($_SESSION['cara_kb_id']);
		unset($_SESSION['akta_kelahiran']);
		unset($_SESSION['status_ktp']);
		// Untuk tautan TOTAL di laporan statistik, di mana arg-2 = sex dan arg-3 kosong
		// kecuali untuk laporan wajib KTP
		if ($sex == NULL AND $tipe <> 18)
		{
			if ($nomor != 0) $_SESSION['sex'] = $nomor;
			else unset($_SESSION['sex']);
			unset($_SESSION['judul_statistik']);
			redirect('penduduk');
		}

		if ($sex == 0)
			unset($_SESSION['sex']);
		else
			$_SESSION['sex'] = $sex;

		switch ($tipe)
		{
			case 0: $_SESSION['pendidikan_kk_id'] = $nomor; $pre = "PENDIDIKAN DALAM KK : "; break;
			case 1: $_SESSION['pekerjaan_id'] = $nomor; $pre = "PEKERJAAN : "; break;
			case 2: $_SESSION['status'] = $nomor; $pre = "STATUS PERKAWINAN : "; break;
			case 3: $_SESSION['agama'] = $nomor; $pre = "AGAMA : "; break;
			case 4: $_SESSION['sex'] = $nomor; $pre = "JENIS KELAMIN : "; break;
			case 5: $_SESSION['warganegara'] = $nomor;  $pre = "WARGANEGARA : "; break;
			case 6: $_SESSION['status_penduduk'] = $nomor; $pre = "STATUS PENDUDUK : "; break;
			case 7: $_SESSION['golongan_darah'] = $nomor; $pre = "GOLONGAN DARAH : "; break;
			case 9: $_SESSION['cacat'] = $nomor; $pre = "CACAT : "; break;
			case 10: $_SESSION['menahun'] = $nomor;  $pre = "SAKIT MENAHUN : "; break;
			case 13: $_SESSION['umurx'] = $nomor;  $pre = "UMUR "; break;
			case 14: $_SESSION['pendidikan_sedang_id'] = $nomor; $pre = "PENDIDIKAN SEDANG DITEMPUH : "; break;
			case 16: $_SESSION['cara_kb_id'] = $nomor; $pre = "CARA KB : "; break;
			case 17:
			$_SESSION['akta_kelahiran'] = $nomor;
			if ($nomor <> BELUM_MENGISI) $_SESSION['umurx'] = $nomor;
			$pre = "AKTA KELAHIRAN : ";
			break;
			case 18:
			if ($sex == NULL)
			{
				$_SESSION['status_ktp'] = 0;
				$_SESSION['sex'] = ($nomor == 0) ? NULL : $nomor;
				$sex = $_SESSION['sex'];
				unset($nomor);
			}
			else
				$_SESSION['status_ktp'] = $nomor;
			$pre = "KEPEMILIKAN WAJIB KTP : ";
			break;
		}
		$judul = $this->penduduk_model->get_judul_statistik($tipe, $nomor, $sex);
		// Laporan wajib KTP berbeda - menampilkan sebagian dari penduduk, jadi selalu perlu judul
		if ($judul['nama'] or $tipe = 18)
		{
			$_SESSION['judul_statistik'] = $pre.$judul['nama'];
		}
		else
		{
			unset($_SESSION['judul_statistik']);
		}
		redirect('layanan_mandiri/penduduk');
	}

	public function lap_statistik($id_cluster = 0, $tipe = 0, $nomor = 0)
	{
		unset($_SESSION['sex']);
		unset($_SESSION['cacat']);
		unset($_SESSION['menahun']);
		unset($_SESSION['dusun']);
		unset($_SESSION['rw']);
		unset($_SESSION['rt']);
		unset($_SESSION['umur_min']);
		unset($_SESSION['umur_max']);
		unset($_SESSION['hamil']);
		unset($_SESSION['status']);
		unset($_SESSION['warganegara']);
		$cluster = $this->penduduk_model->get_cluster($id_cluster);
		switch ($tipe)
		{
			case 1:
			$_SESSION['sex'] = '1';
			$_SESSION['dusun'] = $cluster['dusun'];
			$_SESSION['rw'] = $cluster['rw'];
			$_SESSION['rt'] = $cluster['rt'];
			$pre = "JENIS KELAMIN LAKI-LAKI  ";
			break;
			case 2:
			$_SESSION['sex'] = '2';
			$_SESSION['dusun'] = $cluster['dusun'];
			$_SESSION['rw'] = $cluster['rw'];
			$_SESSION['rt'] = $cluster['rt'];
			$pre = "JENIS KELAMIN PEREMPUAN ";
			break;
			case 3:
			$_SESSION['umur_min'] = '0';
			$_SESSION['umur_max'] = '0';
			$_SESSION['dusun'] = $cluster['dusun'];
			$_SESSION['rw'] = $cluster['rw'];
			$_SESSION['rt'] = $cluster['rt'];
			$pre = "BERUMUR <1 ";
			break;
			case 4:
			$_SESSION['umur_min'] = '1';
			$_SESSION['umur_max'] = '5';
			$_SESSION['dusun'] = $cluster['dusun'];
			$_SESSION['rw'] = $cluster['rw'];
			$_SESSION['rt'] = $cluster['rt'];
			$pre = "BERUMUR 1-5 ";
			break;
			case 5:
			$_SESSION['umur_min'] = '6';
			$_SESSION['umur_max'] = '12';
			$_SESSION['dusun'] = $cluster['dusun'];
			$_SESSION['rw'] = $cluster['rw'];
			$_SESSION['rt'] = $cluster['rt'];
			$pre = "BERUMUR 6-12 ";
			break;
			case 6:
			$_SESSION['umur_min'] = '13';
			$_SESSION['umur_max'] = '15';
			$_SESSION['dusun'] = $cluster['dusun'];
			$_SESSION['rw'] = $cluster['rw'];
			$_SESSION['rt'] = $cluster['rt'];
			$pre = "BERUMUR 13-16 ";
			break;
			case 7:
			$_SESSION['umur_min'] = '16';
			$_SESSION['umur_max'] = '18';
			$_SESSION['dusun'] = $cluster['dusun'];
			$_SESSION['rw'] = $cluster['rw'];
			$_SESSION['rt'] = $cluster['rt'];
			$pre = "BERUMUR 16-18 ";
			break;
			case 8:
			$_SESSION['umur_min'] = '61';
			$_SESSION['dusun'] = $cluster['dusun'];
			$_SESSION['rw'] = $cluster['rw'];
			$_SESSION['rt'] = $cluster['rt'];
			$pre = "BERUMUR >60";
			break;
			case 91: case 92: case 93: case 94:
			case 95: case 96: case 97:
			$kode_cacat = $tipe - 90;
			$_SESSION['cacat'] = $kode_cacat;
			$_SESSION['dusun'] = $cluster['dusun'];
			$_SESSION['rw'] = $cluster['rw'];
			$_SESSION['rt'] = $cluster['rt'];
			$stat = $this->penduduk_model->get_judul_statistik(9, $kode_cacat, NULL);
			$pre = $stat['nama'];
			break;
			case 10:
			$_SESSION['menahun'] = '14';
			$_SESSION['sex'] = '1';
			$_SESSION['dusun'] = $cluster['dusun'];
			$_SESSION['rw'] = $cluster['rw'];
			$_SESSION['rt'] = $cluster['rt'];
			$pre = "SAKIT MENAHUN LAKI-LAKI ";
			break;
			case 11:
			$_SESSION['menahun'] = '14';
			$_SESSION['sex'] = '2';
			$_SESSION['dusun'] = $cluster['dusun'];
			$_SESSION['rw'] = $cluster['rw'];
			$_SESSION['rt'] = $cluster['rt'];
			$pre = "SAKIT MENAHUN PEREMPUAN ";
			break;
			case 12:
			$_SESSION['hamil'] = '1';
			$_SESSION['dusun'] = $cluster['dusun'];
			$_SESSION['rw'] = $cluster['rw'];
			$_SESSION['rt'] = $cluster['rt'];
			$pre = "HAMIL ";
			break;
		}

		if ($pre)
		{
			$_SESSION['judul_statistik'] = $pre;
		}
		else
		{
			unset($_SESSION['judul_statistik']);
		}
		redirect("layanan_mandiri/penduduk");
	}
}
