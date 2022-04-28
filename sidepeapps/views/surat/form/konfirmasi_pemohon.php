<?php $aksi = $this->admin ? 'penduduk' : 'layanan_mandiri/penduduk'; ?>

<?php if(!$this->admin){ ?>
	<div class="form-group">
		<label for="nik" class="col-sm-3 control-label"><?php echo !$this->admin ? "NIK / Nama" : ""; ?></label>
		<div class="col-sm-8">
			<input disabled="" class="required form-control input-sm" type="text" value="<?= $individu['nik'].' - '.$individu['nama']?>">
		</div>
	</div>
<?php } ?>

<?php if($url != 'surat_ket_kematian'){ ?>
<input class="required form-control" type="hidden" name="nik" value="<?= $individu['id']?>">
<?php } ?>
<div class="form-group konfirmasi">
	<label for="keperluan"  class="col-sm-3 control-label">Tempat  / Tanggal Lahir / Umur</label>
	<div class="col-sm-4">
		<input class="form-control input-sm" type="text" value="<?= strtoupper($individu['tempatlahir']);?> " disabled="">
	</div>
	<div class="col-sm-2">
		<input class="form-control input-sm" type="text" value="<?= strtoupper(tgl_indo ($individu['tanggallahir']));?> " disabled="">
	</div>
	<div class="col-sm-2">
		<input class="form-control input-sm" type="text" value="<?= strtoupper($individu['umur']);?> TAHUN" disabled="">
	</div>
</div>
<div class="form-group konfirmasi">
	<label for="keperluan"  class="col-sm-3 control-label">Alamat</label>
	<div class="col-sm-8">
		<input class="form-control input-sm" type="text" value="<?= strtoupper($individu['alamat_wilayah']); ?>" disabled="">
	</div>
</div>
<div class="form-group konfirmasi">
	<label for="keperluan"  class="col-sm-3 control-label">Pendidikan / Warga Negara /Agama</label>
	<div class="col-sm-4">
		<input class="form-control input-sm" type="text" value="<?= strtoupper($individu['pendidikan']);?>" disabled="">
	</div>
	<div class="col-sm-2 col-xs-6">
		<input class="form-control input-sm" type="text" value="<?= strtoupper($individu['warganegara']);?>" disabled="">
	</div>
	<div class="col-sm-2 col-x-6">
		<input class="form-control input-sm" type="text" value=" <?= strtoupper($individu['agama']);?>" disabled="">
	</div>
</div>
<div class="form-group konfirmasi">
	<label for="persyaratan"  class="col-sm-3 control-label">Dokumen Kelengkapan/Syarat</label>
	<div class="col-sm-8">
		<a href="<?= site_url($aksi."/dokumen_list/$individu[id]")?>" class="btn btn-social btn-flat btn-info btn-sm btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Daftar Dokumen">
			<i class='fa fa-book'></i> Daftar Dokumen
		</a>
		<a href="<?= site_url($aksi."/dokumen/$individu[id]")?>" class="btn btn-social btn-flat btn-success btn-sm btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block">
			<i class="fa fa-gears"></i> Manajemen Dokumen
		</a>
	</div>
</div>
