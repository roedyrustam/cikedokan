<?php
class PDD_checker {

    protected $CI;

    public function __construct() {
        $this->CI =& get_instance();
    }

    public function cek_migrasi() 
    {
        $this->CI->load->database();

        $db = $this->CI->db;



        if (!$db->table_exists('tweb_kontak') )
                        {
                            $query = "CREATE TABLE `tweb_kontak` (
                              `id` int(11) NOT NULL,
                              `parent` int(11) DEFAULT NULL,
                              `nama` varchar(60) NOT NULL,
                              `email` varchar(62) DEFAULT NULL,
                              `no_hp` varchar(16) DEFAULT NULL,
                              `hal` tinyint(4) DEFAULT NULL,
                              `isi` text NOT NULL,
                              `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
                              `baca` timestamp NULL DEFAULT NULL,
                              `judul` varchar(256) DEFAULT NULL,
                              `admin` tinyint(4) DEFAULT NULL,
                              `ip4` varchar(16) NOT NULL,
                              `ua` varchar(128) NOT NULL,
                              `token` varchar(13) DEFAULT NULL
                            ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
                            ";
                            $db->query($query);
                        }







        // check connection
        if (mysqli_connect_errno()) {
            exit('Koneksi database error: '. mysqli_connect_error());
        }

        // perform the query and store the result
        if( $db->query("SHOW TABLES LIKE 'polling'")->num_rows() == 0 )
        {
            $tb = "polling";
            require(APPPATH.'views/migrasi_notice.php');
        }
        else if( $db->query("SHOW TABLES LIKE 'apbdes'")->num_rows() == 0 )
        {
            $tb = "apbdes";
            require(APPPATH.'views/migrasi_notice.php');
        }
        else if( $db->query("SHOW TABLES LIKE 'apbdes_kategori'")->num_rows() == 0 )
        {
            $tb = "apbdes_kategori";
            require(APPPATH.'views/migrasi_notice.php');
        }
        else if( $db->query("SHOW TABLES LIKE 'inventaris_elektronik'")->num_rows() == 0 )
        {
            $tb = "inventaris_elektronik";
            require(APPPATH.'views/migrasi_notice.php');
            
        }
        else if( $db->query("SHOW TABLES LIKE 'agenda'")->num_rows() == 0 )
        {
            $tb = "agenda";
            require(APPPATH.'views/migrasi_notice.php');
            
        }
    }
}