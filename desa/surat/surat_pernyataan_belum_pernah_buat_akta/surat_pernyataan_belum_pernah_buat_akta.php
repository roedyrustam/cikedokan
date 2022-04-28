<style>
	.error {
		color: #dd4b39;
	}
</style>
<div class="content-wrapper">
	<section class="content-header">
		<div class="title-header">Surat Pernyataan Belum Pernah Membuat Akta</div>
		<?php if ($this->admin) : ?>
			<ol class="breadcrumb">
				<li><a href="<?= site_url('hom_desa/about') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
				<li><a href="<?= site_url('surat') ?>"> Daftar Cetak Surat</a></li>
				<li class="active">Surat Keterangan</li>
			<?php endif ?>
			</ol>
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
								<label for="hdk" class="col-sm-3 control-label">Hubungan Dalam Keluarga</label>
								<div class="col-sm-6 col-lg-3">
									<input name="hdk" class="form-control input-sm required" placeholder="Hubungan Dalam Keluarga">
								</div>
							</div>
							<?php include("sidepeapps/views/surat/form/nomor_surat.php"); ?>
							<h4>DATA ANAK</h4>
							<div class="form-group">
								<label for="nama_anak" class="col-sm-3 control-label">Nama Anak</label>
								<div class="col-sm-6 col-lg-3">
									<input name="nama_anak" class="form-control input-sm required" placeholder="Nama Anak">
								</div>
							</div>
							<div class="form-group">
								<label for="keterangan" class="col-sm-3 control-label">Tempat Lahir</label>
								<div class="col-sm-6 col-lg-3">
									<input name="tempat_lahir_anak" class="form-control input-sm required" placeholder="Tempat Lahir">
								</div>
							</div>
							<div class="form-group">
								<label for="berlaku_dari" class="col-sm-3 control-label">Tanggal Lahir</label>
								<div class="col-sm-3 col-lg-2">
									<div class="input-group input-group-sm date">
										<div class="input-group-addon">
											<i class="fa fa-calendar"></i>
										</div>
										<input title="Pilih Tanggal" id="tanggal_lahir_anak" class="form-control input-sm required" name="tanggal_lahir_anak" type="text" />
									</div>
								</div>
							</div>
							<h4>DATA SAKSI 1</h4>
							<div class="form-group">
								<label for="nama_anak" class="col-sm-3 control-label">Nama Saksi</label>
								<div class="col-sm-6 col-lg-3">
									<input name="nama_saksi_1" class="form-control input-sm required" placeholder="Nama Saksi 1">
								</div>
							</div>
							<div class="form-group">
								<label for="keterangan" class="col-sm-3 control-label">Alamat (sesuai KTP)</label>
								<div class="col-sm-8">
									<textarea name="alamat_saksi_1" class="form-control input-sm required" placeholder="Alamat"></textarea>
								</div>
							</div>
							<h4>DATA SAKSI 2</h4>
							<div class="form-group">
								<label for="nama_anak" class="col-sm-3 control-label">Nama Saksi</label>
								<div class="col-sm-6 col-lg-3">
									<input name="nama_saksi_2" class="form-control input-sm required" placeholder="Nama Saksi 1">
								</div>
							</div>
							<div class="form-group">
								<label for="keterangan" class="col-sm-3 control-label">Alamat (sesuai KTP)</label>
								<div class="col-sm-8">
									<textarea name="alamat_saksi_2" class="form-control input-sm required" placeholder="Alamat"></textarea>
								</div>
							</div>
							<div class="form-group">
								<label for="nama_pemohon" class="col-sm-3 control-label">Nama Pemohon</label>
								<div class="col-sm-6 col-lg-3">
									<input name="nama_pemohon" class="form-control input-sm required" placeholder="Nama Pemohon">
								</div>
							</div>
						</form>
					</div>
					<?php include("sidepeapps/views/surat/form/tombol_cetak.php"); ?>
				</div>
			</div>
		</div>
	</section>
</div>