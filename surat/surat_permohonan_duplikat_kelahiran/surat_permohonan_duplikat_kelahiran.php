<div class="content-wrapper">
	<section class="content-header">
		<h1>Surat Pengantar Permohonan Duplikat Kelahiran</h1>
		<?php if ($this->admin) { ?>
			<ol class="breadcrumb">
				<li><a href="<?= site_url('hom_desa/about') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
				<li><a href="<?= site_url('surat') ?>"> Daftar Cetak Surat</a></li>
				<li class="active">Surat Pengantar Permohonan Duplikat Kelahiran</li>
			</ol>
		<?php } ?>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-info">
					<div class="box-header with-border">
						<a href="<?= site_url($aksi . "surat") ?>" class="btn btn-social btn-flat btn-default btn-sm btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Kembali Ke Daftar Wilayah">
							<i class="fa fa-arrow-circle-left "></i> Kembali Ke Daftar Cetak Surat
						</a>
					</div>
					<div class="box-body">
						<?php if ($this->admin) { ?>
							<form action="" id="main" name="main" method="POST" class="form-horizontal">
								<div class="col-md-12">
									<?php include("sidepeapps/views/surat/form/_cari_nik.php"); ?>
								</div>
							</form>
						<?php } ?>
						<form id="validasi" action="<?= $form_action ?>" method="POST" target="_blank" class="form-surat form-horizontal">
							<input type="hidden" id="url_surat" name="url_surat" value="<?= $url ?>">
							<input type="hidden" id="url_remote" name="url_remote" value="<?= site_url($aksi . 'surat/nomor_surat_duplikat') ?>">
							<div class="col-md-12">
								<?php if ($individu) : ?>
									<?php include("sidepeapps/views/surat/form/konfirmasi_pemohon.php"); ?>
								<?php endif; ?>
								<div class="form-group">
									<label for="nomor" class="col-sm-3 control-label">Nomor Surat</label>
									<div class="col-sm-8">
										<input id="nomor" class="form-control input-sm required" type="text" placeholder="Nomor Surat" name="nomor" value="<?= $surat_terakhir['no_surat_berikutnya']; ?>">
										<p class="help-block text-red small"><?= $surat_terakhir['ket_nomor'] ?><strong><?= $surat_terakhir['no_surat']; ?></strong> (tgl: <?= $surat_terakhir['tanggal'] ?>)</p>
									</div>
								</div>
								<div class="form-group">
									<label for="ttl" class="col-sm-3 control-label">Hari / Jam Lahir</label>
									<div class="col-sm-4">
										<input id="hari_bayi" class="form-control input-sm" type="text" placeholder="Hari Lahir" name="hari_bayi">
									</div>
									<div class="col-sm-2">
										<div class="input-group input-group-sm date">
											<div class="input-group-addon">
												<i class="fa fa-clock-o"></i>
											</div>
											<input class="form-control input-sm required" name="jam_bayi" id="jammenit_1" type="text" />
										</div>
									</div>
								</div>
								<div class="form-group">
									<label for="tempatlahir_bayi" class="col-sm-3 control-label">Tempat Lahir</label>
									<div class="col-sm-8">
										<input type="text" name="tempatlahir_bayi" class="form-control input-sm required" placeholder="Tempat Lahir"></input>
									</div>
								</div>
								<div class="form-group subtitle_head">
									<label class="col-sm-3 text-right"><strong>IDENTITAS PELAPOR :</strong></label>
								</div>
								<div class="form-group">
									<label for="nama_pelapor" class="col-sm-3 control-label">Nama Pelapor</label>
									<div class="col-sm-8">
										<input type="text" name="nama_pelapor" class="form-control input-sm required" placeholder="Nama Pelapor"></input>
									</div>
								</div>
								<div class="form-group">
									<label for="nik_pelapor" class="col-sm-3 control-label">NIK Pelapor</label>
									<div class="col-sm-8">
										<input type="text" name="nik_pelapor" class="form-control input-sm required" placeholder="NIK Pelapor"></input>
									</div>
								</div>
								<div class="form-group">
									<label for="sex_pelapor" class="col-sm-3 control-label">Jenis Kelamin Pelapor</label>
									<div class="col-sm-4">
										<input type="text" name="sex_pelapor" class="form-control input-sm required" placeholder="Jenis Kelamin Pelapor"></input>
									</div>
								</div>
								<div class="form-group">
									<label for="lahir" class="col-sm-3 control-label">Tempat / Tanggal Lahir Pelapor</label>
									<div class="col-sm-4">
										<input type="text" name="tempatlahir_pelapor" class="form-control input-sm required" placeholder="Tempat Lahir Pelapor"></input>
									</div>
									<div class="col-sm-3 col-lg-2">
										<div class="input-group input-group-sm date">
											<div class="input-group-addon">
												<i class="fa fa-calendar"></i>
											</div>
											<input title="Pilih Tanggal" class="form-control input-sm datepicker required" name="tanggallahir_pelapor" type="text" />
										</div>
									</div>
								</div>
								<div class="form-group">
									<label for="pek_pelapor" class="col-sm-3 control-label">Pekerjaan Pelapor</label>
									<div class="col-sm-8">
										<input type="text" name="pek_pelapor" class="form-control input-sm required" placeholder="Pekerjaan Pelapor"></input>
									</div>
								</div>
								<div class="form-group">
									<label for="alamat_pelapor" class="col-sm-3 control-label">Alamat Pelapor</label>
									<div class="col-sm-8">
										<textarea id="alamat_pelapor" class="form-control input-sm required" placeholder="Alamat Pelapor" name="alamat_pelapor"></textarea>
									</div>
								</div>
								<?php include("sidepeapps/views/surat/form/_pamong.php"); ?>
							</div>
						</form>
					</div>
					<?php include("sidepeapps/views/surat/form/tombol_cetak.php"); ?>
				</div>
			</div>
		</div>
	</section>
</div>