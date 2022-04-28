<?php



class First_artikel_m extends CI_Model {



	public function __construct()

	{

		parent::__construct();

	}



	public function get_headline($id_kat=0)

	{

		$sql   = "SELECT a.*, u.nama AS owner, k.kategori FROM artikel a 

		LEFT JOIN user u ON a.id_user = u.id

		LEFT JOIN kategori k ON a.id_kategori = k.id

		WHERE headline = 1 AND a.tgl_upload < NOW() AND id_kategori NOT IN(999,22,25)";

		if ($id_kat != 0) $sql .= " AND k.id = $id_kat OR k.parrent = $id_kat";

		$sql .= " ORDER BY tgl_upload DESC LIMIT 4";

		$query = $this->db->query($sql);

		$data  = $query->result_array();

		if (empty($data))

			$data = null;

		else

		{

			$id = $data['id'];

			//$panjang=str_split($data['isi'],800);

			//$data['isi'] = "<label>".strip_tags($panjang[0])."...</label><a href='".site_url("first/artikel/$id")."'>Baca Selengkapnya</a>";

		}

		return $data;

	}



	public function get_teks_berjalan()

	{

    //update text berjalan yang kategori dan artikelnya enable

		$sql = "SELECT a.isi

		FROM artikel a

		LEFT JOIN kategori k ON a.id_kategori = k.id

		WHERE k.kategori = 'teks_berjalan' AND k.enabled = 1 AND a.tgl_upload < NOW() AND a.enabled = 1";

		$query = $this->db->query($sql);

		$data = $query->result_array();

		return $data;

	}



	public function get_widget()

	{

		$sql = "SELECT * FROM widget LIMIT 1 ";

		$query = $this->db->query($sql);

		$data = $query->result_array();

		return $data;

	}



	public function paging($p=1, $where=NULL)

	{

		$sql = "SELECT COUNT(a.id) AS id FROM artikel a

		LEFT JOIN kategori k ON a.id_kategori = k.id

		WHERE ((a.enabled=1) AND (headline <> 1)) AND a.tgl_upload < NOW() AND id_kategori NOT IN(999, 998, 997, 996, 995, 994, 993, 992, 991, 990,22,25)";

		$cari = trim($this->input->get('cari'));

		if ( ! empty($cari))

		{

			$cari = $this->db->escape_like_str($cari);

			$sql .= "AND (a.judul like '%$cari%' or a.isi like '%$cari%') ";

			$cfg['suffix'] = "?cari=$cari";

		}

		$sql .= "ORDER BY a.tgl_upload DESC";

		$query = $this->db->query($sql);

		$row = $query->row_array();

		$jml_data = $row['id'];



		$this->load->library('paging');

		$cfg['page'] = $p;

		$cfg['per_page'] = $this->setting->web_artikel_per_page;

		$cfg['num_rows'] = $jml_data;

		$this->paging->init($cfg);



		return $this->paging;

	}



	public function paging_kat($p=1, $id=0)

	{

		$sql = "SELECT COUNT(a.id) AS id FROM artikel a 

		LEFT JOIN user u ON a.id_user = u.id 

		LEFT JOIN kategori k ON a.id_kategori = k.id 

		WHERE 1 AND id_kategori NOT IN(22)";

		if ($id!=0)

			$sql .= "AND ((id_kategori = ".$id.") OR (parrent = ".$id."))";

		$query = $this->db->query($sql);

		$row = $query->row_array();

		$jml_data = $row['id'];



		$this->load->library('paging');

		$cfg['page'] = $p;

		$cfg['per_page'] = $this->setting->web_artikel_per_page;

		$cfg['num_rows'] = $jml_data;

		$this->paging->init($cfg);



		return $this->paging;

	}



	public function artikel_show($id='0', $offset, $limit, $where=NULL)

	{

		if ($id > 0)

		{

			$sql = "SELECT a.*,u.nama AS owner, k.kategori AS kategori, k.kategori_slug FROM artikel a

			LEFT JOIN user u ON a.id_user = u.id

			LEFT JOIN kategori k ON a.id_kategori = k.id 

			WHERE id_kategori NOT IN(999,1000,22) AND a.enabled=1 AND headline <> 1 AND a.id = ".$id." ".$where;

		}

		else

		{

			// Penampilan daftar artikel di halaman depan tidak terbatas pada artikel dinamis saja

			$sql = "SELECT a.*,u.nama AS owner,k.kategori AS kategori, k.kategori_slug FROM artikel a

			LEFT JOIN user u ON a.id_user = u.id

			LEFT JOIN kategori k ON a.id_kategori = k.id 

			WHERE id_kategori NOT IN(999,1000,22) AND a.enabled=1 $where";

			$cari = trim($this->input->get('cari'));

			if ( ! empty($cari))

			{

				$cari = $this->db->escape_like_str($cari);

				$sql .= " AND (a.judul like '%$cari%' or a.isi like '%$cari%') ";

			}

			$sql .= " AND a.tgl_upload < NOW()";

			$sql .= " ORDER BY a.tgl_upload DESC LIMIT ".$offset.", ".$limit;

		}

		$query = $this->db->query($sql);

		$data  = $query->result_array();

		for ($i=0; $i < count($data); $i++)

		{

			$data[$i]['judul'] = $this->security->xss_clean($data[$i]['judul']);

			if (empty($this->setting->user_admin) or $data[$i]['id_user'] != $this->setting->user_admin)

				$data[$i]['isi'] = $this->security->xss_clean($data[$i]['isi']);

		}

		return $data;

	}

	public function berita_show($id='0', $offset, $limit, $where=NULL)

	{

		if ($id > 0)

		{

			$sql = "SELECT a.*, u.nama AS owner, p.nama AS author, k.kategori AS kategori, k.kategori_slug FROM artikel a

			LEFT JOIN user u ON a.id_user = u.id

			LEFT JOIN kategori k ON a.id_kategori = k.id

			LEFT JOIN tweb_penduduk p ON a.id_user = p.id AND a.by_warga = 1

			WHERE id_kategori NOT IN(999, 998, 997, 996, 995, 994, 993, 992, 991, 990,1000,22) AND a.enabled=1 AND headline <> 1 AND a.id = ".$id." ".$where;

		}

		else

		{

			// Penampilan daftar artikel di halaman depan tidak terbatas pada artikel dinamis saja

			$sql = "SELECT a.*, u.nama AS owner, p.nama AS author, k.kategori AS kategori, k.kategori_slug FROM artikel a

			LEFT JOIN user u ON a.id_user = u.id

			LEFT JOIN kategori k ON a.id_kategori = k.id 

			LEFT JOIN tweb_penduduk p ON a.id_user = p.id AND a.by_warga = 1

			WHERE id_kategori NOT IN(999, 998, 997, 996, 995, 994, 993, 992, 991, 990,1000,22) AND a.enabled=1 $where";

			$cari = trim($this->input->get('cari'));

			if ( ! empty($cari))

			{

				$cari = $this->db->escape_like_str($cari);

				$sql .= " AND (a.judul like '%$cari%' or a.isi like '%$cari%') ";

			}

			$sql .= " AND a.tgl_upload < NOW()";

			$sql .= " ORDER BY a.tgl_upload DESC LIMIT ".$offset.", ".$limit;

		}

		$query = $this->db->query($sql);

		$data  = $query->result_array();

		for ($i=0; $i < count($data); $i++)

		{

			$data[$i]['judul'] = $this->security->xss_clean($data[$i]['judul']);

			if (empty($this->setting->user_admin) or $data[$i]['id_user'] != $this->setting->user_admin)

				$data[$i]['isi'] = $this->security->xss_clean($data[$i]['isi']);

		}

		return $data;

	}


	public function arsip_show()

	{

		$sql = "SELECT a.*,u.nama AS owner,k.kategori AS kategori, k.kategori_slug FROM 

		artikel a LEFT JOIN user u ON a.id_user = u.id 

		LEFT JOIN kategori k ON a.id_kategori = k.id 

		WHERE a.enabled=? AND a.tgl_upload < NOW() AND id_kategori NOT IN(999,22,25)

		ORDER BY a.tgl_upload DESC LIMIT 6 ";



		$query = $this->db->query($sql, 1);

		$data = $query->result_array();



		for ($i=0; $i<count($data); $i++)

		{

			$id = $data[$i]['id'];

			$pendek = str_split($data[$i]['isi'], 100);

			$pendek2 = str_split($pendek[0], 90);

			$data[$i]['isi_short'] = $pendek2[0]."...";

			$panjang = str_split($data[$i]['isi'], 150);

			$data[$i]['isi'] = "<label>".$panjang[0]."...</label><a href='".site_url("first/artikel/$id")."'>baca selengkapnya</a>";

		}

		return $data;

	}

	public function paging_arsip($p=1)

	{

		$sql = "SELECT COUNT(a.id) AS id FROM artikel a 

		LEFT JOIN user u ON a.id_user = u.id 

		LEFT JOIN kategori k ON a.id_kategori = k.id 

		WHERE a.enabled=1 AND a.tgl_upload < NOW() AND id_kategori NOT IN(999,22,25)";

		$query = $this->db->query($sql);

		$row = $query->row_array();

		$jml_data = $row['id'];



		$this->load->library('paging');

		$cfg['page'] = $p;

		$cfg['per_page'] = 20;

		$cfg['num_rows'] = $jml_data;

		$this->paging->init($cfg);



		return $this->paging;

	}



	public function full_arsip($offset=0, $limit=50)

	{

		$paging_sql = ' LIMIT ' .$offset. ',' .$limit;

		$sql = "SELECT a.*,u.nama AS owner,k.kategori AS kategori, k.kategori_slug FROM 

		artikel a LEFT JOIN user u ON a.id_user = u.id 

		LEFT JOIN kategori k ON a.id_kategori = k.id 

		WHERE a.enabled=? AND a.tgl_upload < NOW() AND id_kategori NOT IN(999,22,25)

		ORDER BY a.tgl_upload DESC";



		$sql .= $paging_sql;



		$query = $this->db->query($sql,1);

		$data  = $query->result_array();

		if ($query->num_rows()>0)

		{

			for ($i=0; $i<count($data); $i++)

			{

				$nomer = $offset + $i+1;

				$id = $data[$i]['id'];

				$tgl = date("d/m/Y",strtotime($data[$i]['tgl_upload']));

				$data[$i]['no'] = $nomer;

				$data[$i]['tgl'] = $tgl;

				$data[$i]['isi'] = "<a href='".site_url("first/artikel/$id")."'>".$data[$i]['judul']."</a>, <i class=\"fa fa-user\"></i> ".$data[$i]['owner'];

			}

		}

		else

		{

			$data  = false;

		}

		return $data;

	}



	// Jika $gambar_utama, hanya tampilkan gambar utama masing2 artikel terbaru

	public function slide_show($gambar_utama=FALSE)

	{

		$sql = "SELECT id,judul,gambar FROM artikel WHERE id_kategori NOT IN(999,1000) AND (enabled=1 AND headline=3 AND tgl_upload < NOW())";

		if (!$gambar_utama) $sql .= "

		UNION SELECT id,judul,gambar1 FROM artikel WHERE (enabled=1 AND headline=3 AND tgl_upload < NOW())

		UNION SELECT id,judul,gambar2 FROM artikel WHERE (enabled=1 AND headline=3 AND tgl_upload < NOW())

		UNION SELECT id,judul,gambar3 FROM artikel WHERE (enabled=1 AND headline=3 AND tgl_upload < NOW())

		";

		$sql .= ($gambar_utama) ? "ORDER BY tgl_upload DESC LIMIT 10" : "ORDER BY RAND() LIMIT 10";

		$query = $this->db->query($sql);

		if ($query->num_rows()>0)

		{

			$data = $query->result_array();

		}

		else

		{

			$data = false;

		}

		return $data;

	}



	// Ambil gambar slider besar tergantung dari settingnya.

	public function slider_gambar()

	{

		$slider_gambar = array();

		switch ($this->setting->sumber_gambar_slider)

		{

			case '1':

				# 10 gambar utama semua artikel terbaru

			$slider_gambar['gambar'] = $this->db->select('a.id,a.judul,a.gambar,k.kategori, k.kategori_slug')

			->from('artikel as a')

			->join('kategori as k', 'k.id=a.id_kategori', "LEFT")

			->where('a.enabled', 1)

			->where('a.gambar !=','')

			->where_not_in('id_kategori', array('999', '1000'))

			->where('a.tgl_upload < NOW()')

			->order_by('a.tgl_upload DESC')

			->limit(10)->get()->result_array();

			$slider_gambar['lokasi'] = LOKASI_FOTO_ARTIKEL;

			break;

			case '2':

				# 10 gambar utama artikel terbaru yang masuk ke slider atas

			$slider_gambar['gambar'] = $this->slide_show(true);

			$slider_gambar['lokasi'] = LOKASI_FOTO_ARTIKEL;

			break;

			case '3':

				# 10 gambar dari galeri yang masuk ke slider besar

			$this->load->model('web_gallery_model');

			$slider_gambar['gambar'] = $this->web_gallery_model->list_slide_galeri();

			$slider_gambar['lokasi'] = LOKASI_GALERI;

			break;

			default:

				# code...

			break;

		}

		return $slider_gambar;

	}

	public function agenda_show()

	{

		$hari_ini = date('Y-m-d', time());

		$sql = "SELECT a.*, u.nama AS owner, k.kategori AS kategori, k.kategori_slug, ag.tgl_agenda, ag.lokasi_kegiatan, ag.koordinator_kegiatan

		FROM artikel a

		LEFT JOIN agenda ag ON ag.id_artikel = a.id

		LEFT JOIN user u ON a.id_user = u.id

		LEFT JOIN kategori k ON a.id_kategori = k.id 

		WHERE id_kategori=1000 AND a.enabled=1 AND a.tgl_upload < NOW() AND ag.tgl_agenda >= NOW() ORDER BY ag.tgl_agenda ASC";

		$query = $this->db->query($sql);

		$data = $query->result_array();

		return $data;

	}



	public function komentar_show()

	{

		$sql = "SELECT k.*, a.id_kategori as id_kategori_artikel 

		FROM komentar k LEFT JOIN artikel a ON a.id=id_artikel 

		WHERE k.enabled=? AND k.id_artikel <> 775 ORDER BY k.tgl_upload DESC limit 10";

		$query = $this->db->query($sql,1);

		$data = $query->result_array();



		for ($i=0; $i<count($data); $i++)

		{

			$id = $data[$i]['id_artikel'];

			$id_kategori_artikel = $data[$i]['id_kategori_artikel'];

			$pendek = str_split($data[$i]['komentar'], 25);

			$pendek2 = str_split($pendek[0], 90);

			$data[$i]['komentar_short'] = $pendek2[0]."...";

			$panjang = str_split($data[$i]['komentar'], 50);

			$data[$i]['komentar'] = "".$panjang[0]."...<a href='".get_artikel_url( $id, $id_kategori_artikel )."/#kom-".$data[$i]['id']."'>baca selengkapnya</a>";

		}

		return $data;

	}

	public function get_kategori($kat=0)

	{

		if( is_string($kat) )

			$sql = "SELECT id, kategori, kategori_slug FROM kategori a WHERE kategori_slug=?";

		else

			$sql = "SELECT id, kategori, kategori_slug FROM kategori a WHERE id=?";



		$query = $this->db->query($sql, $kat);

		if ($query->num_rows()>0)

		{

			$data  = $query->row_array();

		}

		else if (!empty($id))

		{

			// untuk artikel jenis statis = "AGENDA"

			$judul = array(999 => "Profil Desa",

				987	=> "Sambutan & Himbauan",
				1001	=> "Potensi & Produk Desa",
				1002	=> "Kegiatan Desa",
				1006	=> "Konten Video",
				1004	=> "Pembangunan",
				1004	=> "Panduan Layanan",
				1005	=> "Pengumuman",
				1007	=> "Kegiatan Pemerintah Desa",
				1000	=> "Agenda Desa");

			$data = $judul[$id];

		}

		else

		{

			$data = false;

		}

		return $data;

	}



	public function get_artikel($id=0)

	{

		if( is_string($id) ) {

			$sql = "SELECT a.*,u.nama AS owner,k.kategori, k.kategori_slug FROM artikel a 

			LEFT JOIN user u ON a.id_user = u.id 

			LEFT JOIN kategori k ON a.id_kategori = k.id

			WHERE a.slug=? AND a.tgl_upload < NOW() $where";

		}

		else 

		{

			$sql = "SELECT a.*,u.nama AS owner,k.kategori, k.kategori_slug FROM artikel a 

			LEFT JOIN user u ON a.id_user = u.id 

			LEFT JOIN kategori k ON a.id_kategori = k.id

			WHERE a.id=? AND a.tgl_upload < NOW() $where";

		}



		$query = $this->db->query($sql, $id);

		if ($query->num_rows()>0)

		{

			$data = $query->row_array();

			$data['judul'] = $this->security->xss_clean($data['judul']);

			if (empty($this->setting->user_admin) or $data['id_user'] != $this->setting->user_admin)

				$data['isi'] = $this->security->xss_clean($data['isi']);

		}

		else

		{

			$data = false;

		}

		return $data;
	}



	public function get_detail_berita($judul='none', $kategori='none')

	{

		$sql = "SELECT a.*, u.nama AS owner, p.nama AS author, k.kategori, k.kategori_slug FROM artikel a 

		LEFT JOIN user u ON a.id_user = u.id 

		LEFT JOIN tweb_penduduk p ON a.id_user = p.id AND a.by_warga = 1

		LEFT JOIN kategori k ON a.id_kategori = k.id

		WHERE a.slug='$judul' AND k.kategori_slug='$kategori' AND a.tgl_upload < NOW()";



		$query = $this->db->query($sql);

		if ($query->num_rows()>0)

		{

			$data = $query->row_array();

			$data['judul'] = $this->security->xss_clean($data['judul']);

			if (empty($this->setting->user_admin) or $data['id_user'] != $this->setting->user_admin)

				$data['isi'] = $this->security->xss_clean($data['isi']);

		}

		else

		{

			$data = false;

		}

		return $data;

	}



	public function get_detail_page($judul='none')

	{

		$sql = "SELECT a.*,u.nama AS owner,k.kategori, k.kategori_slug FROM artikel a 

		LEFT JOIN user u ON a.id_user = u.id 

		LEFT JOIN kategori k ON a.id_kategori = k.id

		WHERE a.judul='$judul' AND a.tgl_upload < NOW()";



		$query = $this->db->query($sql);

		if ($query->num_rows()>0)

		{

			$data = $query->row_array();

			$data['judul'] = $this->security->xss_clean($data['judul']);

			if (empty($this->setting->user_admin) or $data['id_user'] != $this->setting->user_admin)

				$data['isi'] = $this->security->xss_clean($data['isi']);

		}

		else

		{

			$data = false;

		}

		return $data;

	}


	public function list_artikel_warga($id_warga = 0, $status = 0, $offset=0, $limit=10)
	{
		$paging_sql = ' LIMIT ' .$offset. ',' .$limit;

		$status = $status > 0 ? $status > 1 ? " AND a.enabled = 2 " : " AND a.enabled = 1 " : "";

		if (!$id_warga) {
			$sql = "SELECT a.*, p.nama AS author, k.kategori AS kategori FROM artikel a
			LEFT JOIN kategori k ON a.id_kategori = k.id
			LEFT JOIN tweb_penduduk p ON a.id_user = p.id
			WHERE a.by_warga = 1 ".$status."
			ORDER BY tgl_upload DESC
			";
		} else {
			$sql = "SELECT a.*, k.kategori AS kategori FROM artikel a
			LEFT JOIN kategori k ON a.id_kategori = k.id
			WHERE a.by_warga = 1 AND a.id_user = ? ".$status."
			ORDER BY tgl_upload DESC
			";
		}


		$sql .= $paging_sql;
	
		$query = !$id_warga ? $this->db->query($sql) : $this->db->query($sql, $id_warga);

		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}

	}
	
	// view video widget
	public function count_artikel_kategori($kategori)
	{
		$sql = "SELECT * FROM artikel WHERE enabled = 1 AND id_kategori = ".$kategori;
	
		$count = $this->db->query($sql)->num_rows();
		return $count;
	}
	
	// view video widget
	public function count_komentar()
	{
		$sql = "SELECT * FROM komentar WHERE enabled = 1 AND no_hp IS NOT NULL";
	
		$count = $this->db->query($sql)->num_rows();
		return $count;
	}
	
	public function list_artikel($offset=0, $limit=50, $id=0, $dynamic_only = 0)

	{

		$paging_sql = ' LIMIT ' .$offset. ',' .$limit;

		$sql = "SELECT a.* , u.nama AS owner, p.nama AS author , k.kategori AS kategori, k.kategori_slug FROM artikel a

		LEFT JOIN user u ON a.id_user = u.id

		LEFT JOIN tweb_penduduk p ON a.id_user = p.id AND a.by_warga = 1

		LEFT JOIN kategori k ON a.id_kategori = k.id

		WHERE a.enabled=1 AND a.tgl_upload < NOW() AND id_kategori NOT IN(22,1000)";

		if ($id!=0) {
			$sql .= " AND ((id_kategori = ".$id.") OR (parrent = ".$id."))";
		}

		if ($dynamic_only) {
			$sql .= " AND k.tipe = 1";
		}

		$sql .= " ORDER BY a.tgl_upload DESC ";

		$sql .= $paging_sql;

		$query = $this->db->query($sql);

		if ($query->num_rows()>0)

		{

			$data = $query->result_array();

			for ($i=0; $i < count($data); $i++)

			{

				$data[$i]['judul'] = $this->security->xss_clean($data[$i]['judul']);

				if (empty($this->setting->user_admin) or $data[$i]['id_user'] != $this->setting->user_admin)

					$data[$i]['isi'] = strip_tags($this->security->xss_clean($data[$i]['isi']));

				}

			}

			else

			{

				$data = false;

				}

		return $data;

	}



	public function list_berita($offset=0, $limit=50, $id=0)

	{

		$paging_sql = ' LIMIT ' .$offset. ',' .$limit;

		$sql = "SELECT a.*,u.nama AS owner,k.kategori AS kategori, k.kategori_slug FROM artikel a

		LEFT JOIN user u ON a.id_user = u.id

		LEFT JOIN kategori k ON a.id_kategori = k.id

		WHERE a.enabled=1 AND a.tgl_upload < NOW() AND id_kategori NOT IN(22,999,1000)";

		if ($id!=0)

			$sql .= " AND ((id_kategori = ".$id.") OR (parrent = ".$id."))";

		$sql .= " ORDER BY a.tgl_upload DESC ";

		$sql .= $paging_sql;

		$query = $this->db->query($sql);

		if ($query->num_rows()>0)

		{

			$data = $query->result_array();

			for ($i=0; $i < count($data); $i++)

			{

				$data[$i]['judul'] = $this->security->xss_clean($data[$i]['judul']);

				if (empty($this->setting->user_admin) or $data[$i]['id_user'] != $this->setting->user_admin)

					$data[$i]['isi'] = $this->security->xss_clean($data[$i]['isi']);

				}

			}

			else

			{

				$data = false;

				}

		return $data;

	}




	/**

	 * Simpan komentar yang dikirim oleh pengunjung

	 */

	public function insert_comment($id=0)

	{

		$data['komentar'] = strip_tags($_POST["komentar"]);

		$data['owner'] = strip_tags($_POST["owner"]);

		$data['no_hp'] = strip_tags($_POST["no_hp"]);

		$data['email'] = strip_tags($_POST["email"]);



		// load library form_validation

		$this->load->library('form_validation');

		$this->form_validation->set_rules('komentar', 'Komentar', 'required');

		$this->form_validation->set_rules('owner', 'Nama', 'required');

		$this->form_validation->set_rules('no_hp', 'No HP', 'required');

		$this->form_validation->set_rules('email', 'Email', 'valid_email');



		if ($this->form_validation->run() == TRUE)

		{

			$data['enabled'] = 2;

			$data['id_artikel'] = $id;

			$outp = $this->db->insert('komentar',$data);

		}

		else

		{

			$_SESSION['validation_error'] = 'Form tidak terisi dengan benar';

		}

		if ($outp)

		{

			$_SESSION['success'] = 1;

			return true;

		}



		$_SESSION['success'] = -1;

		return false;

	}



	public function list_komentar($id=0)

	{

		$sql = "SELECT * FROM komentar WHERE id_artikel = ? AND enabled=1 ORDER BY tgl_upload DESC";

		$query = $this->db->query($sql,$id);

		if ($query->num_rows()>0)

		{

			$data = $query->result_array();

		}

		else

		{

			$data = false;

		}

		return $data;

	}



	public function list_sosmed()

	{

		$sql = "SELECT * FROM media_sosial WHERE enabled=1";

		$query = $this->db->query($sql);

		if ($query->num_rows()>0)

		{

			$data  = $query->result_array();

		}

		else

		{

			$data = false;

		}

		return $data;

	}



}