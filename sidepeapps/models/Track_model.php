<?php class Track_model extends CI_Model {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('penduduk_model');
    $this->load->model('web_artikel_model');
    $this->load->model('keluar_model');

    session_start();
  }

  public function track_desa($dari=null)
  {
    //if ($this->setting->enable_track == FALSE) return;
    // Track web dan admin masing2 maksimum sekali sehari
    if(isset( $_SESSION['last_track'] ) AND $_SESSION['last_track'] == date( "Y-m-d" ) ) return;

    $this->db->where('id', 1);
    $query = $this->db->get('config');
    $config = $query->row_array();

    $desa = array(
      "domain" => $_SERVER['HTTP_HOST'],
      "kode_desa" => $config['kode_desa'],
      "nama_desa" => $config['nama_desa'],
      "nama_kecamatan" => $config['nama_kecamatan'],
      "nama_kabupaten" => $config['nama_kabupaten'],
      "nama_propinsi" => $config['nama_propinsi'],
      "email_desa" => $config['email_desa'],
      "no_telepon" => $config['telepon'],
      "alamat_kantor" => $config['alamat_kantor'],
      "logo" => base_url().'desa/logo/'.$config['logo'],
      "lat" => $config['lat'],
      "lng" => $config['lng'],
      "ip_address" => $_SERVER['SERVER_ADDR'],
      "external_ip" => get_external_ip(),
      "user_agent" => $_SERVER['HTTP_USER_AGENT'],
      "software" => $_SERVER['SERVER_SOFTWARE'],
      "version" => AmbilVersi(),
      "jml_penduduk" => $this->penduduk_model->jml_penduduk(),
      "jml_artikel" => $this->web_artikel_model->jml_artikel(),
      "jml_surat_keluar" => $this->keluar_model->jml_surat_keluar(),
      "created_at" => date( 'Y-m-d H:i:s' ),
      "akses_terakhir_by" => date( 'Y-m-d H:i:s' )
    );

    //if ( $this->abaikan($desa) ) return;

    // echo "httppost =========== ".$tracker;
    // echo httpPost("http://".$tracker."/index.php/track/desa",$desa);
    //httpPost("http://track.portaldesadigital.id/track/desa", $desa);
    httpPost("https://www.portaldesadigital.id/track/store", $desa);
    
    $_SESSION['last_track'] = date( "Y-m-d" );

  }

  /*
    Jangan rekam, jika:
    - ada kolom nama wilayah kurang dari 4 karakter, kecuali desa boleh 3 karakter
    - ada kolom wilayah yang masih merupakan contoh (berisi karakter non-alpha atau tulisan 'contoh', 'demo' atau 'sampel')
  */
  public function abaikan($data)
  {
    $regex = '/[^\.a-zA-Z\s:-]|contoh|uji\Scoba|limbang\Smulya|demo\s+|sampel\s+/i';
    $abaikan = false;
    $desa = trim($data['nama_desa']);
    $kec = trim($data['nama_kecamatan']);
    $kab = trim($data['nama_kabupaten']);
    $prov = trim($data['nama_provinsi']);
    if ( strlen($desa)<3 OR strlen($kec)<4 OR strlen($kab)<4 OR strlen($prov)<4 )
    {
      $abaikan = true;
    }
    elseif (preg_match($regex, $desa) OR
        preg_match($regex, $kec) OR
        preg_match($regex, $kab) OR
        preg_match($regex, $prov) 
       )
    {
      $abaikan = true;
    }
    return $abaikan;
  }

}
?>
