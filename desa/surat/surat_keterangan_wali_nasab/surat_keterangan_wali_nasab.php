<style>
	.error {
		color: #dd4b39;
	}
</style>
<div class="content-wrapper">
	<section class="content-header">
		<div class="title-header">Surat Keterangan</div>
		<?php if ($this->admin) : ?>
			<ol class="breadcrumb">
				<li><a href="<?= site_url('hom_desa/about') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
				<li><a href="<?= site_url('surat') ?>"> Daftar Cetak Surat</a></li>
				<li class="active">Surat Keterangan</li>
			</ol>
		<?php endif ?>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-info">
					<div class="box-header with-border">
						<a href="<?= site_url($aksi . "surat") ?>" class="btn btn-radius btn-uppercase btn-info btn-sm btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Kembali Ke Daftar Wilayah">
							<i class="fa fa-arrow-circle-left "></i>Kembali Ke Daftar Cetak Surat
						</a>
					</div>
					<div class="box-body">
						<form action="" id="main" name="main" method="POST" class="form-horizontal">
							<div class="form-group">
								<label for="nik" class="col-sm-3 control-label">NIK / Nama</label>
								<div class="col-sm-6 col-lg-4">
									<select class="form-control required input-sm select2" id="nik" name="nik" style="width:100%;" onchange="formAction('main')">
										<option value="">-- Cari NIK / Nama Penduduk --</option>
										<?php foreach ($penduduk as $data) : ?>
											<option value="<?= $data['id'] ?>" <?php if ($individu['nik'] == $data['nik']) : ?>selected<?php endif; ?>>NIK : <?= $data['nik'] . " - " . $data['nama'] ?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
						</form>
						<form id="validasi" action="<?= $form_action ?>" method="POST" target="_blank" class="form-surat form-horizontal">
							<input type="hidden" id="url_surat" name="url_surat" value="<?= $url ?>">
							<input type="hidden" id="url_remote" name="url_remote" value="<?= site_url('surat/nomor_surat_duplikat') ?>">
							<?php if ($individu) : ?>
								<?php include("sidepeapps/views/surat/form/konfirmasi_pemohon.php"); ?>
							<?php endif; ?>
							<div class="row jar_form">
								<label for="nomor" class="col-sm-3"></label>
								<div class="col-sm-8">
									<input class="required" type="hidden" name="nik" value="<?= $individu['id'] ?>">
								</div>
							</div>
							<div class="form-group">
								<label for="nomor" class="col-sm-3 control-label">Nomor Surat</label>
								<div class="col-sm-8">
									<input id="nomor" class="form-control input-sm required" type="text" placeholder="Nomor Surat" name="nomor" value="<?= $surat_terakhir['no_surat_berikutnya']; ?>">
									<p class="help-block text-red small"><?= $surat_terakhir['ket_nomor'] ?><strong><?= $surat_terakhir['no_surat']; ?></strong> (tgl: <?= $surat_terakhir['tanggal'] ?>)</p>
								</div>
							</div>
							<div class="form-group">
								<label for="nama_wali" class="col-sm-3 control-label">Nama Wali</label>
								<div class="col-sm-4">
									<input id="nama_wali" class="form-control input-sm required" type="text" size="40" placeholder="Nama Wali" name="nama_wali">
								</div>
							</div>
							<div class="form-group">
								<label for="bin_wali" class="col-sm-3 control-label">Bin Wali</label>
								<div class="col-sm-4">
									<input id="bin_wali" class="form-control input-sm required" type="text" size="40" placeholder="Bin Wali" name="bin_wali">
								</div>
							</div>
							<div class="form-group">
								<label for="tempatlahir_wali" class="col-sm-3 control-label">Tempat, Tanggal Lahir Wali </label>
								<div class="col-sm-3 col-lg-2">
									<div class="input-group input-group-sm">
										<input title="Tempat Lahir" id="tempatlahir_wali" size="40" placeholder="Tempat Lahir Wali" class="form-control input-sm required" name="tempatlahir_wali" type="text" />
									</div>
								</div>
								<div class="col-sm-3 col-lg-2">
									<div class="input-group input-group-sm">
										<input title="Pilih Tanggal" id="tgllahir_wali" class="form-control input-sm required" placeholder="Tanggal Lahir Wali" name="tgllahir_wali" type="text" />
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="pekerjaan_wali" class="col-sm-3 control-label">Pekerjaan Wali</label>
								<div class="col-sm-4">
									<input id="pekerjaan_wali" class="form-control input-sm required" type="text" size="40" placeholder="Pekerjaan Wali" name="pekerjaan_wali">
								</div>
							</div>
							<div class="form-group">
								<label for="agama_wali" class="col-sm-3 control-label">Agama Wali</label>
								<div class="col-sm-4">
									<input id="agama_wali" class="form-control input-sm required" type="text" size="40" placeholder="Agama Wali" name="agama_wali">
								</div>
							</div>
							<div class="form-group">
								<label for="alamat_wali" class="col-sm-3 control-label">Alamat Wali</label>
								<div class="col-sm-8">
									<textarea id="alamat_wali" class="form-control input-sm" placeholder="Alamat Wali" name="alamat_wali"></textarea>
								</div>
							</div>


							<div class="form-group">
								<label for="sebab" class="col-sm-3 control-label">Jika Bukan Wali Ayah Sebab</label>
								<div class="col-sm-8">
									<textarea id="sebab" class="form-control input-sm" placeholder="Sebab" name="sebab"></textarea>
								</div>
							</div>

							<?php include("sidepeapps/views/surat/form/_pamong.php"); ?>
						</form>
					</div>
					<?php include("sidepeapps/views/surat/form/tombol_cetak.php"); ?>
				</div>
			</div>
		</div>
	</section>
</div>