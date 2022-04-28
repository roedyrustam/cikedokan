<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<div class="row">
  <div class="col-md-4 hidden-xs" data-aos="fade-right">
    <div class="row">
      <div class="blok-img-gambar-section">
      <img src="<?php echo base_url().$this->theme_folder.'/'.$this->theme; ?>/assets/images/details-1.png" class="img-responsive" alt="">
      </div>
    </div>
  </div>
  
  <div class="col-md-8 pt-5" data-aos="fade-up">
      <div class="blok-list-panduan-layanan">
        <ul class="breadcrumb-layanan">
              <li><a href="<?php echo base_url(); ?>"><span class="breadicon"><i class="fa fa-home"></i></span></a></li>
              <li><a href="<?php echo base_url(); ?>layanan">Panduan Layanan</a></li>
        </ul>
        <div class="head-blok hidden-xs">
          Untuk mendapatkan layanan publik <?php echo ucwords($this->setting->sebutan_desa)." "?><?php echo ucwords($desa['nama_desa'])?>, masyarakat wajib terdaftar dan terdata dalam sistem aplikasi Portal Desa Digital dan setiap akan meminta pelayanan publik wajib menyertakan dokumen pendukung seperti Kartu Keluarga dan Kartu Tanda Penduduk
        </div>
        
        <div class="list-layanan">
        <?php foreach ($data_layanan as $data) { ?>
          <div class="list-item-layanan">
            <div class="judul-layanan">
              <span class="before-icon"><i class="ti-check"></i></span>
              <a href="<?php echo get_artikel_url( $data['id'], $data['id_kategori'] ); ?>" class="link-judul"><?php echo ucwords(character_limiter( $data['judul'], 80 )); ?></a>
            </div>
          </div>
        <?php } ?>
          <a href="<?php echo base_url(); ?>layanan" class="btn btn-info btn-panduan" style="font-size:12px;border-radius:25px;">SEMUA PANDUAN LAYANAN <i class="ti-arrow-right"></i></a>
        </div>
      </div>
  </div>
</div>