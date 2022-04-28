<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Masuk extends Web_Controller {

  public function index()
  {
    if ($_SESSION['mandiri'] == 1) {
      redirect('layanan_mandiri/profil');
    } else {
        $this->homepage = TRUE;
        $this->set_title('Layanan Mandiri');

        $data = $this->includes;

        $this->_get_common_data($data);
        $this->set_template('layanan_mandiri/login');
        $this->load->view($this->template, $data);
    }
  }

  protected function generate_kode($id)
  {
    $kolom_kode = $this->db->query("SHOW COLUMNS FROM `tweb_penduduk_mandiri` LIKE 'kode'")->row_array();

    if(!$kolom_kode)
    {
        $this->db->query("ALTER TABLE `tweb_penduduk_mandiri` ADD `kode` VARCHAR(8) NULL DEFAULT NULL AFTER `id_pend`");
    }
      $kode = rand(100000, 999999);

      $this->db->where('kode', $kode);

      if(!$this->db->get('tweb_penduduk_mandiri')->row_array())
      {
        $this->db->where('id_pend', $id);

        $this->db->update('tweb_penduduk_mandiri', ['kode'=>$kode]);

          return $kode;
      }

      return $this->generate_kode($id);
  }

  protected function kirim_kode($kode)
  {

      $pesan = 'Selamat, Anda berhasil melakukan Reset Sandi. Silakan buka tautan ini http://'.$_SERVER['HTTP_HOST'].'/layanan_mandiri/masuk/reset/password/'.$kode.' untuk mendapatkan pin baru anda. http://'.$_SERVER['HTTP_HOST'].'';

      $this->load->helper('pdd_helper');

      kirim_sms($_SESSION['resethp'], $pesan);

  }

  public function reset($mode = null, $kode = null)
  {
    $data = $this->includes;
    $data['form'] = 'nik';
      if($mode == 'password')
      {
        $this->db->where('kode', intval($kode));

        if($this->db->get('tweb_penduduk_mandiri')->row_array())
        {
            $data['form'] = 'password';
            $data['kode'] = $kode;

            if ($_POST['pin']) {
              if($_POST['pin'] != $_POST['pinc'])
              {
                $data['error'] = 'PIN Tidak sama, ulangi.';
              }

              else
              {
                $this->db->where('kode', $kode)->update('tweb_penduduk_mandiri', [
                  'pin' => hash_pin($_POST['pin']),
                  'kode' => null
                ]);

                return redirect('layanan_mandiri/masuk');
              }
            }
        }
        else
        {
          $data['error'] = 'url reset pin tidak sah';
        }
      }
      elseif($mode == 'nohp')
      {
          if($_SESSION['resethp'])
          {
              $data['nohpbintang'] =  preg_replace_callback('/^([0-9\+]{2})([0-9]{8})([0-9]+)/', function($match)
                {
                  return $match[1].str_repeat('*', strlen($match[2])).$match[3];
                }, $_SESSION['resethp']);

              if($_POST['nohp'])
              {
                if(trim($_POST['nohp']) == trim($_SESSION['resethp']))
                {
                    $this->kirim_kode($this->generate_kode($_SESSION['resetid']));

                    $data['error'] = 'Klik tautan yang kami kirimkan ke ponsel anda';
                }

                else
                {
                  $data['error'] = 'Nomor telepon yang anda masukan salah, masukkan dengan benar atau hubungi admin untuk mendapatkan bantuan';
                }
              }

              $data['form'] = 'nohp';
          }

          else
          {
            $data['error'] = 'Kami tidak menemukan nomor telepon anda, silahkan meminta bantuan admin.';
          }
      }

      else
      {
          if($_POST['nik'])
          {
            $this->db->where('nik', $_POST['nik'])->select('id, telepon');

            $id = $this->db->get('tweb_penduduk')->row_array();

            if($id)
            {
                $_SESSION['resetid'] = $id['id'];
                $_SESSION['resethp'] = $id['telepon'];
              return redirect('layanan_mandiri/masuk/reset/nohp');
            }

            else
            {
              $data['error'] = 'NIK yang anda masukkan tidak ditemukan, pastikan anda sudah memasukkan NIK dengan benar dan sudah terdaftar sebagai warga desa.';
            }
          }
      }

      $this->set_title('Layanan Mandiri Reset PIN');

        

        $this->_get_common_data($data);
        $this->set_template('layanan_mandiri/login');
        $this->load->view($this->template, $data);
  }
}
