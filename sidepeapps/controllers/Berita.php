<?php if(!defined('BASEPATH')) exit('No direct script access allowed');



class Berita extends Web_Controller {



	public function __construct()

	{

		parent::__construct();

	}



    // halaman utama blog / berita

	public function index()

	{

        // initialize pagination

		$page = !is_null( $this->input->get('page') ) ? $_GET['page'] : 1;



		$this->set_title("Berita");

		$this->set_page_header("Index Berita");



		$where = NULL;

		

		$data = $this->includes;

		$data['page'] = $page;

		$data['paging'] = $this->first_artikel_m->paging($page, $where);

		$data['paging_page'] = 'berita/index';

		$data['paging_range'] = 3;

		$data['start_paging'] = max($data['paging']->start_link, $page - $data['paging_range']);

		$data['end_paging'] = min($data['paging']->end_link, $page + $data['paging_range']);

		$data['pages'] = range($data['start_paging'], $data['end_paging']);



		$data['datas'] = $this->first_artikel_m->berita_show(0, $data['paging']->offset, $data['paging']->per_page, $where);

		$data['headline'] = $this->first_artikel_m->get_headline(1);



		$cari = trim($this->input->get('cari'));

		if ( ! empty($cari)) {

			// Judul artikel bisa digunakan untuk serangan XSS

			$data["judul_kategori"] = html_escape("Hasil pencarian:". substr($cari, 0, 50));

		}

		$data['data_agenda'] = $this->first_artikel_m->agenda_show();

		$this->_get_common_data($data);

		$this->set_template('archive');

		$this->load->view($this->template, $data);

	}



    // detail berita

	public function detail($kat, $slug)

	{

		if(is_null($slug) OR is_null($kat)) show_404();



		$artikel = $this->first_artikel_m->get_detail_berita($slug, $kat);



        // initialize pagination

		$page = !is_null( $this->input->get('page') ) ? $_GET['page'] : 1;



		$this->set_title($artikel['judul']);



		$data = $this->includes;



		$data['page'] = $page;

		$data['paging']  = $this->first_artikel_m->paging($page);

		$data['artikel'] = $this->first_artikel_m->list_artikel(0, $data['paging']->offset, $data['paging']->per_page);

		$data['content'] = $artikel;

		$data['komentar'] = $this->first_artikel_m->list_komentar($artikel['id']);

		$data['data_agenda'] = $this->first_artikel_m->agenda_show();

		$this->_get_common_data($data);



		// Validasi pengisian komentar di add_comment()

		// Kalau tidak ada error atau artikel pertama kali ditampilkan, kosongkan data sebelumnya

		if (empty($_SESSION['validation_error']))

		{

			$_SESSION['post']['owner'] = '';

			$_SESSION['post']['email'] = '';

			$_SESSION['post']['no_hp'] = '';

			$_SESSION['post']['komentar'] = '';

			$_SESSION['post']['captcha_code'] = '';

		}



		$data['page_content'] = $this->load->view($this->theme_path.'single', $data, TRUE);

		$this->load->view($this->template, $data);

	}



	public function kategori($kategori)

	{

		if(is_null($kategori)) show_404();



		$title = ucwords($kategori);

		$id_kategori = $this->first_artikel_m->get_kategori($kategori)['id'];



        // initialize pagination

		$page = !is_null( $this->input->get('page') ) ? $_GET['page'] : 1;



		$this->set_title('Arsip '.$title);



		$data = $this->includes;



		$data['page'] = $page;

		$data['paging']  = $this->first_artikel_m->paging_kat($page, $id_kategori);

		$data['paging_page']  = 'berita/kategori/'.$kategori;

		$data['paging_range'] = 3;

		$data['start_paging'] = max($data['paging']->start_link, $page - $data['paging_range']);

		$data['end_paging'] = min($data['paging']->end_link, $page + $data['paging_range']);

		$data['pages'] = range($data['start_paging'], $data['end_paging']);



		$data['datas'] = $this->first_artikel_m->list_artikel($data['paging']->offset, $data['paging']->per_page, $id_kategori);

		$data['headline'] = $this->first_artikel_m->get_headline();

		$data['data_agenda'] = $this->first_artikel_m->agenda_show();



		$this->_get_common_data($data);



		$this->set_template('archive');

		$this->load->view($this->template, $data);

	}

	

	// detail berita

	public function agenda($slug=NULL)

	{

		if(is_null($slug)) show_404();



		$artikel = $this->first_artikel_m->get_artikel($slug, 1000);



        // initialize pagination

		$page = !is_null( $this->input->get('page') ) ? $_GET['page'] : 1;



		$this->set_title($artikel['judul']);



		$data = $this->includes;



		$data['page'] = $page;

		$data['paging']  = $this->first_artikel_m->paging($page);

		$data['content'] = $artikel;

		$data['komentar'] = $this->first_artikel_m->list_komentar($artikel['id']);

		$data['data_agenda'] = $this->first_artikel_m->agenda_show();

		$this->_get_common_data($data);



		// Validasi pengisian komentar di add_comment()

		// Kalau tidak ada error atau artikel pertama kali ditampilkan, kosongkan data sebelumnya

		if (empty($_SESSION['validation_error']))

		{

			$_SESSION['post']['owner'] = '';

			$_SESSION['post']['email'] = '';

			$_SESSION['post']['no_hp'] = '';

			$_SESSION['post']['komentar'] = '';

			$_SESSION['post']['captcha_code'] = '';

		}



		$data['page_content'] = $this->load->view($this->theme_path.'single', $data, TRUE);

		$this->load->view($this->template, $data);

	}



	public function tambah_komentar($id_kat=0, $id=0) {

		// Periksa isian captcha

		include FCPATH . 'securimage/securimage.php';

		$securimage = new Securimage();

		$_SESSION['validation_error'] = false;



		$id = (int) $id;

		$id_kat = (int) $id_kat;



		$artikel = $this->first_artikel_m->get_artikel($id, $id_kat);



		if ($securimage->check($_POST['captcha_code']) == false)

		{

			$this->session->set_flashdata('flash_message', '<p class="alert alert-warning">Kode anda salah. Silakan ulangi lagi.</p>');

			$_SESSION['post'] = $_POST;

			$_SESSION['validation_error'] = true;

			redirect("berita/detail/".url_title($artikel['kategori'], '-', TRUE)."/".url_title($artikel['judul'], '-', TRUE));

		}



		$res = $this->first_artikel_m->insert_comment($id);

		$data['data_config'] = $this->config_model->get_data();

		// cek kalau berhasil disimpan dalam database

		if ($res)

		{

			$this->session->set_flashdata('flash_message', '<p class="sticky-alert" style="background:green;color:#fff">Komentar anda telah berhasil dikirim dan perlu dimoderasi untuk ditampilkan.</p>');

		}

		else

		{

			$_SESSION['post'] = $_POST;

			if (!empty($_SESSION['validation_error']))

				$this->session->set_flashdata( 'flash_message', '<p class="sticky-alert" style="background:red;color:#fff">'.validation_errors().'</p>' );

			else

				$this->session->set_flashdata( 'flash_message', '<p class="sticky-alert" style="background:red;color:#fff">Komentar anda gagal dikirim. Silakan ulangi lagi.</p>' );

		}



		$_SESSION['sukses'] = 1;

		redirect( get_artikel_url( $id, $id_kat ) );

	}



}