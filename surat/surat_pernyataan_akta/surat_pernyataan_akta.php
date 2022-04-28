<div class="content-wrapper">
	<section class="content-header">
		<h1>Surat Pernyataan Belum Memiliki Akte Lahir</h1>
		<?php if ($this->admin) { ?>
			<ol class="breadcrumb">
				<li><a href="<?= site_url('hom_desa/about') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
				<li><a href="<?= site_url('surat') ?>"> Daftar Cetak Surat</a></li>
				<li class="active">Surat Pernyataan Belum Memiliki Akte Lahir</li>
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
								<div class="form-group subtitle_head">
									<label class="col-sm-3 text-right"><strong>DATA KELAHIRAN :</strong></label>
								</div>
								<div class="form-group">
									<label for="nama" class="col-sm-3 control-label">Nama</label>
									<div class="col-sm-8">
										<input id="nama" class="form-control input-sm required" type="text" placeholder="Nama" name="nama">
									</div>
								</div>
								<div class="form-group">
									<label for="tempat_lahir" class="col-sm-3 control-label">Tempat Tanggal lahir</label>
									<div class="col-sm-4">
										<input id="tempatlahir" class="form-control input-sm required" type="text" placeholder="Tempat Lahir" name="tempatlahir">
									</div>
									<div class="col-sm-3 col-lg-2">
										<div class="input-group input-group-sm date">
											<div class="input-group-addon">
												<i class="fa fa-calendar"></i>
											</div>
											<input title="Pilih Tanggal" class="form-control input-sm datepicker required" name="tanggllahir" type="text" />
										</div>
									</div>
								</div>
								<div class="form-group">
									<label for="sex" class="col-sm-3 control-label">Jenis Kelamin</label>
									<div class="col-sm-4">
										<input id="sex" class="form-control input-sm required" type="text" placeholder="Jenis Kelamin" name="sex">
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