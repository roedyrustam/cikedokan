<div class="footer-title">Kontak <?php echo ucwords($this->setting->sebutan_desa)." "?><?php echo ucwords($desa['nama_desa'])?></div>
<div class="desa-contact">
<?php echo $desa['alamat_kantor']?><br/>
<?php echo ucwords($this->setting->sebutan_kecamatan." ".$desa['nama_kecamatan'])?> <?php echo ucwords($this->setting->sebutan_kabupaten." ".$desa['nama_kabupaten'])?><br />
<?php echo $desa['nama_propinsi']?><br />
Kodepos <?php echo $desa['kode_pos']?><br />
Telepon : <?php echo $desa['telepon']?><br />
Email : <?php echo $desa['email_desa']?>
</div>
<div class="itentang">
    <div class="row">
        <div class="col-md-2">
            <a href="<?php echo base_url()?>siteman" target="_blank"><img src="<?php echo base_url().'desa/logo/'.$desa['logo']; ?>" class="desa-logo" alt="Logo Desa" width="100"></a>
        </div>
        <div class="col-md-10">
            <div class="tentang-footer">
                <?php echo $desa ['tentang'] ?>
            </div>
        </div>
    </div>
</div>