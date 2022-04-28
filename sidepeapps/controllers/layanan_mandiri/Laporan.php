<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Laporan extends Web_Controller
{

	public function __construct()
	{
		parent::__construct();
		session_start();
		if ($_SESSION['mandiri'] != 1) redirect('layanan_mandiri/masuk');
		mandiri_timeout();

		$this->set_template('fullwidth');

		$this->load->model('lapor_model');
	}

	public function index()
	{
		return $this->arsip();
	}

	public function arsip()
	{
		$this->set_title('Arsip Laporan');
		$nik = $_SESSION['id'];

		$data = $this->includes;

		$this->db->where('id', $_SESSION['id'])->select('nik');

		$penduduk = $this->db->get("tweb_penduduk")->row_array();

		$this->_get_common_data($data);

		$laporan = $this->db->query('select * from komentar where id_artikel = 775 and email = ?', $_SESSION['nik'])->result_array();

		$data['laporan'] = $laporan;

		foreach ($data['laporan'] as &$value) {
			
			$value['jawaban'] = $this->lapor_model->jawaban($value['id']);
		}

		$data['page_content'] = $this->load->view($this->theme_path . 'layanan_mandiri/arsip_laporan', $data, TRUE);
		$this->set_template('fullwidth');
		$this->load->view($this->template, $data);
	}

	public function read($id = null)
	{
		$this->set_title('Arsip Laporan');

		$data = $this->includes;

		$this->db->where('id', $_SESSION['id'])->select('nik');

		$penduduk = $this->db->get("tweb_penduduk")->row_array();

		$this->_get_common_data($data);

		$data['laporan'] = $this->lapor_model->read((int)$id);
		$data['jawaban'] = $this->lapor_model->jawaban((int)$id);

		$data['page_content'] = $this->load->view($this->theme_path . 'layanan_mandiri/read_laporan', $data, TRUE);
		$this->set_template('fullwidth');
		$this->load->view($this->template, $data);
	}


	public function balas($id = 0)
	{
		// load library form_validation
		$this->load->library('form_validation');
		$this->form_validation->set_rules('isi', 'Isi Jawaban', 'required');
		if ($this->form_validation->run() == TRUE) {

			$data = array(
				'admin'			=> 0,
				'tgl'			=> time(),
				'pesan'			=> $_POST['isi'],
				'id_komentar'	=> $id
			);

			$outp = $this->db->insert('komentar_reply', $data);

		} else {
			$_SESSION['validation_error'] = 'Form tidak terisi dengan benar';
			$_SESSION['success'] = -1;
		}
		if (!$outp) $_SESSION['success'] = -1;

		$_SESSION['success'] == 1;

		return redirect("/layanan_mandiri/laporan/read/$id");
	}
}
