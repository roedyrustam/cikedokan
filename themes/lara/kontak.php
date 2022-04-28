<?php $this->load->view($folder_themes.'/breadcrumb');?>

<div class="content-wrapper">
  <div class="row">
      <!-- page content -->
      <div class="halaman-arsip">
        <div class="col-md-4 col-sm-12">
          <div class="box-header">
              <div class="box-title" style="color:#777"><?php echo ucwords($this->setting->sebutan_desa)." "?><?php echo ucwords($desa['nama_desa'])?></div>
          </div>
          <div class="box box-primary" style="border:0">            
            <div class="kontak-body" style="padding-top:20px;padding-bottom:20px"> 
              <div class="data-kontak-desa">
                <i class="fa fa-map-marker"></i> &nbsp;<?php echo $desa['alamat_kantor']?>
                <br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ucwords($this->setting->sebutan_kecamatan." ".$desa['nama_kecamatan'])?> <?php echo ucwords($this->setting->sebutan_kabupaten." ".$desa['nama_kabupaten'])?>
                <br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $desa['nama_propinsi']?>
                <br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kodepos <?php echo $desa['kode_pos']?>
              </div>
              <div class="data-kontak-desa">
                <i class="fa fa-phone"></i> &nbsp;Telepon : <a href="tel:<?php echo $desa['telepon']?>"><?php echo $desa['telepon']?></a>
              </div>
              <div class="data-kontak-desa">
                <i class="fa fa-envelope"></i> Email : <?php echo $desa['email_desa']?>
              </div>
              <div class="data-kontak-desa">
                <i class="fa fa-globe"></i> &nbsp;<a href="<?php echo $desa['website']?>"><?php echo $desa['website']?></a>
              </div>
              <div class="social-kontak-desa">
                <?php foreach ($sosmed As $data): ?>
                    <?php if (!empty($data["link"])): ?>
                      <a href="<?= $data['link']?>" target="_blank" class="scl-btn scl-crcl shadow <?= $data['icon'] ?>"></a>
                    <?php endif; ?>
                  <?php endforeach; ?>
              </div>
            </div>
          </div>

          <!-- Lokasi Kantor Desa -->
          <div class="box-header">
              <div class="box-title" style="color:#777">Kantor <?php echo ucwords($this->setting->sebutan_desa)." "?><?php echo ucwords($desa['nama_desa'])?></div>
            </div>
          <div class="box box-primary" style="border:0">            
            <div class="kontak-body" style="padding-top:20px;padding-bottom:20px">
            <?php $this->load->view($folder_themes.'/widgets/peta_wilayah_desa');?>
          </div>
          </div>
        </div>
        <div class="col-md-8 col-sm-12">
          <div class="page-content">
            <div class="box-header">
              <div class="box-title" style="color:#777">Formulir Kontak</div>
            </div>                    
            <div class="box" style="border:0">
              <div class="box-body">
              <?php if($_SESSION['sukses'] === 1): ?>
              <?php $_SESSION['sukses'] = 0 ?>
                <div class="block-success">
                  <div class="text-center"><i class="ti-check-box" style="color: #60ce44; font-size: 90px;"></i><br />
                  Terimakasih telah mengirim pesan.<br />
                  Kami akan segera membalas atau menindaklanjuti pesan anda.
                  </div>
                </div>
                
                <?php else: ?>
                <?php if($this->session->flashdata('flash_message')){ ?>
                  <?php echo $this->session->flashdata('flash_message'); ?>
                <?php } ?>
                <form action="<?=base_url('kontak/store') ?>" method="post">
                  <div class="form-group col-md-12">
                    <label for="InputName">NAMA LENGKAP :</label>
                    <input name="nama" type="text" class="form-control input-sm" id="InputName" placeholder="Rizky Fajar Prayoga">
                  </div>
                  <div class="form-group">
                    <div class="col-md-8">
                      <label for="InputEmail">ALAMAT EMAIL :</label>
                      <input name="email" type="email" class="form-control input-sm" id="InputEmail" placeholder="rizky.yoga@gmail.com">
                    </div>
                    <div class="col-md-4">
                      <label for="InputPhone">NOMOR TELEPON :</label>
                      <input name="no_hp" type="number" class="form-control" id="InputPhone" type="tel" pattern="^\d{4}-\d{4}-\d{4}$" required placeholder="081234567890">
                    </div>
                  </div>
                  <div class="form-group col-md-12" style="margin-top: 5px;">
                    <label for="InputSubject">PERIHAL :</label>
                    <select name="hal" class="form-control input-sm" id="InputSubject" >
                    <?php foreach ($kontak_hal as $kontak_hal_id => $kontak_hal_nama): ?>
                      <option value="<?=$kontak_hal_id ?>"><?=$kontak_hal_nama ?></option>
                    <?php endforeach ?>
                    </select>
                  </div>
                  <div class="form-group col-md-12">
                    <label for="InputTitle">JUDUL PESAN :</label>
                    <input name="judul" type="text" class="form-control" id="InputTitle" placeholder="Judul Pesan">
                  </div>
                  <div class="form-group col-md-12">
                    <label for="InputContent">ISI PESAN :</label>
                    <textarea name="isi" class="form-control" id="InputContent" rows="8"></textarea>
                  </div>
                  <div class="form-group col-md-8 col-xs-7">
                        <img id="captcha" src="<?= base_url().'securimage/securimage_show.php'?>" alt="CAPTCHA Image" style="max-width: 200px; max-height: 80px; border: 1px solid #ccc; border-radius: 3px;"/>
                        <a href="#"
                        onclick="document.getElementById('captcha').src = '<?= base_url()."securimage/securimage_show.php?"?>' + Math.random(); return false"><i class="fa fa-refresh fa-lg" style="padding: 10px; color: #0b7d33"></i></a>
                    </div>

                    <div class="form-group captcha_code col-md-4 col-xs-5">
                        <input autocomplete="off" type="text" class="form-control" name="captcha_code" maxlength="6"
                        value="<?= $_SESSION['post']['captcha_code']?>" placeholder="Tulis kode yg ada digambar"
                        required=""/>
                    </div>
                  <div class="form-group col-md-12">
                    <button class="btn btn-success comment-button" style="float:right">Kirim Pesan</button>
                  </div>
                </form>   
              <?php endif ?>  
              </div>
            </div>
          </div>
        </div>
        
        <!-- end content -->
      </div>
    </div>
</div>