<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	/**
     * Common data
     */
	public $user;
	public $settings;
	public $includes;
	public $current_uri;
	public $theme;
	public $template;
	public $template_file;
	public $error;
	public $admin;
	public $homepage;


    /**
     * Constructor
     */
    function __construct()
    {
    	parent::__construct();
    	/* set default theme if not exist */
    	if (empty($this->setting->web_theme) || $this->uri->segment(1) == 'first') {
    		$this->theme = 'default';
    		$this->theme_folder = 'themes';
    	} else {
    		$this->theme = preg_replace("/desa\//","",strtolower($this->setting->web_theme)) ;
    		$this->theme_folder = preg_match("/desa\//", strtolower($this->setting->web_theme)) ? "desa/themes" : "themes";
    	}

        // declare main template
    	$this->template = is_file(FCPATH . $this->theme_folder.'/'.$this->theme.'/template.php') ? "../../{$this->theme_folder}/{$this->theme}/template.php" : "../../{$this->theme_folder}/{$this->theme}/index.php";
    	$this->theme_path = "../../{$this->theme_folder}/{$this->theme}/";
    	$this->folder_surat = $this->theme_folder.'/'.$this->theme.'/surat/';

    	$this->admin = TRUE;
    }

	// --------------------------------------------------------------------

    function set_title( $page_title )
    {
    	$this->includes[ 'page_title' ] = $page_title;

		/* check wether page_header has been set or has a value
		* if not, then set page_title as page_header
		*/
		$this->includes[ 'page_header' ] = isset( $this->includes[ 'page_header' ] ) ? $this->includes[ 'page_header' ] : $page_title;
		return $this;
	}

	function set_page_header( $page_header )
	{
		$this->includes[ 'page_header' ] = $page_header;
		return $this;
	}

	function set_layout( $layout = 'index.php' )
	{
		// make sure that $template_file has .php extension
		$this->template = "../../{$this->theme_folder}/{$this->theme}/{$layout}.php";
	}

	function set_template( $template_file = 'index.php' )
	{
		// make sure that $template_file has .php extension
		$template_file = substr( $template_file, -4 ) == '.php' ? $template_file : ( $template_file . ".php" );

		$template_file_path = FCPATH . $this->theme_folder . '/' . $this->theme . "/" . $template_file;
		if (is_file($template_file_path))
			$this->template = "../../{$this->theme_folder}/{$this->theme}/{$template_file}";
		else
			$this->template = is_file('../../themes/default/' . $template_file) ? '../../themes/default/' . $template_file : '../../themes/default/index.php';
	}

	function get_template_parts( $template_file = 'template.php' )
	{
		// make sure that $template_file has .php extension
		$template_file = substr( $template_file, -4 ) == '.php' ? $template_file : ( $template_file . ".php" );

		$template_file_path = FCPATH . $this->theme_folder . '/' . $this->theme . "/template-parts/" . $template_file;
		if (is_file($template_file_path))
			$this->load->view($this->theme_path."template-parts/{$template_file}");
		else
			echo "Template parts file {$template_file} tidak ditemukan";
	}
}

class Web_Controller extends MY_Controller
{
	/**
	 * Constructor
	 */

	public function __construct()
	{
		parent::__construct();
		$this->includes['folder_themes'] = '../../'.$this->theme_folder.'/'.$this->theme;

		$this->admin = FALSE;

		$this->load->helper('text');
		$this->load->helper('theme');
		$this->load->model('config_model');
		$this->load->model('first_m');
		$this->load->model('first_artikel_m');
		$this->load->model('first_gallery_m');
		$this->load->model('first_menu_m');
		$this->load->model('first_penduduk_m');
		$this->load->model('web_dokumen_model');
		$this->load->model('penduduk_model');
		$this->load->model('web_widget_model');
		$this->load->model('web_gallery_model');
		$this->load->model('anggaran_model', 'anggaran');
		$this->load->model('kategori_anggaran_model', 'kategori_anggaran');
		$this->load->model('polling_model', 'poll');
		$this->load->model('idm_model');
		$this->load->model('header_model');
	}

	// Jika file theme/view tidak ada, gunakan file default/view
	// Supaya tidak semua layout atau partials harus diulangi untuk setiap tema
	public static function fallback_default($theme, $view)
	{
		$view = trim($view, '/');
		$theme_folder = self::get_instance()->theme_folder;
		$theme_view = "../../$theme_folder/$theme/$view";

		if (!is_file(APPPATH .'views/'. $theme_view))
		{
			$theme_view = "../../themes/default/$view";
		}

		return $theme_view;
	}

	public function _get_common_data(&$data)
	{
		$th = date('Y')-1;
		$th = (String) $th;

		$tahun = date('Y');
		$tahun = (String) $tahun;

		$data['desa'] = $this->first_m->get_data();
		$data['menu_atas'] = $this->first_menu_m->list_menu_atas();
		$data['menu_kiri'] = $this->first_menu_m->list_menu_kiri();
		$data['teks_berjalan'] = $this->first_artikel_m->get_teks_berjalan();
		$data['slide_artikel'] = $this->first_artikel_m->slide_show();
		$data['slider_gambar'] = $this->first_artikel_m->slider_gambar();
		$data['w_cos']  = $this->web_widget_model->get_widget_aktif();
		$data['downloads'] = $this->web_dokumen_model->list_data(3,0,0,5);
		$this->web_widget_model->get_widget_data($data);
		$data['data_config'] = $this->config_model->get_data();
		$data['flash_message'] = $this->session->flashdata('flash_message');

		if ($_SESSION['mandiri'] == 1) {
			$id = $_SESSION['id'];
			$data['penduduk'] = $this->penduduk_model->get_penduduk($id);
		}

		$header = $this->header_model->get_data();

		$kode_desa = $header['desa']['kode_propinsi'].$header['desa']['kode_kabupaten'].$header['desa']['kode_kecamatan'].$header['desa']['kode_desa'];

		$data['idm_data'] = $this->idm_model->decode($kode_desa, $this->input->get('tahun') ?? date('Y'));

		$data['idm_skor'] = [];

		foreach ($data['idm_data']['mapData']['ROW'] as $value) {
			
			if (empty($value['NO'])) {

				$data['idm_skor'][] = $value['SKOR']; 
			}
		}


		// Hitung total APBDes
		// Di aktifkan apabila daba apbdes level 3
		$data['total_apbdes'] = array();

		/* VERSI APBDES TRANSPARAN */
		$kategori_anggaran = $this->kategori_anggaran->list_data();
		$id_kategori = array();
		foreach ($kategori_anggaran as $row) {
			$list_sub_kategori = $this->kategori_anggaran->list_sub_kategori($row['id']);

			foreach ($list_sub_kategori as $sub) {
				$id_kategori[] = $sub['id'];
			}
		}
		$id_kategori = ( sizeof( $id_kategori ) > 0 ) ? implode(',', $id_kategori) : 0;
		// Tambahkan ke parameter where where a.id_kategori IN ($id_kategori)
		$where = "a.id_kategori IN ($id_kategori) AND ";

		$data['data_apbdes'] = $this->anggaran->get_data_apbdes("$where a.type=1 AND a.tahun=$tahun");
		$data['data_apbdes_prev'] = $this->anggaran->get_data_apbdes("$where a.type=1 AND a.tahun=$th");
		$data['data_reapbdes'] = $this->anggaran->get_data_apbdes("$where a.type=2 AND a.tahun=$th");

		$data['total_apbdes'] = $this->anggaran->total_apbdes("$where type=1 AND tahun=$tahun");
		$data['total_apbdes_prev'] = $this->anggaran->total_apbdes("$where type=1 AND tahun=$th");
		$data['total_reapbdes'] = $this->anggaran->total_apbdes("$where type=2 AND tahun=$th");
		/* END VERSI APBDES TRANSPARAN */

		/* APBDES VERSI BIASA */
		// $data['data_apbdes'] = $this->anggaran->get_data_apbdes("a.type=1 AND a.tahun=$tahun");
		// $data['data_apbdes_prev'] = $this->anggaran->get_data_apbdes("a.type=1 AND a.tahun=$th");
		// $data['data_reapbdes'] = $this->anggaran->get_data_apbdes("a.type=2 AND a.tahun=$th");

		// $data['total_apbdes'] = $this->anggaran->total_apbdes("type=1 AND tahun=$tahun");
		// $data['total_apbdes_prev'] = $this->anggaran->total_apbdes("type=1 AND tahun=$th");
		// $data['total_reapbdes'] = $this->anggaran->total_apbdes("type=2 AND tahun=$th");
		/* END APBDES VERSI BIASA */

		// get data polling
		$data['warnabar'] = array( 'primary', 'info', 'warning', 'success', 'danger' );
		$data['polling'] = $this->poll->get_polling_widget();
		$data['total_vote'] = $this->poll->total_vote( $data['polling']['id'] );
		$data['data_pilihan'] = $this->poll->list_pilihan( $data['polling']['id'] );


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
}
