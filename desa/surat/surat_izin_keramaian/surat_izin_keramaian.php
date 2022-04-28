<div class="content-wrapper">
	<section class="content-header">
		<div class="title-header">Surat Pengantar Izin Keramaian</div>
		<?php if ($this->admin) : ?>
			<ol class="breadcrumb">
				<li><a href="<?= site_url('hom_desa/about') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
				<li><a href="<?= site_url('surat') ?>"> Daftar Cetak Surat</a></li>
				<li class="active">Surat Pengantar Izin Keramaian</li>
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
							<?php include("sidepeapps/views/surat/form/_cari_nik.php"); ?>
						</form>
						<form id="validasi" action="<?= $form_action ?>" method="POST" target="_blank" class="form-surat form-horizontal">
							<input type="hidden" id="url_surat" name="url_surat" value="<?= $url ?>">
							<input type="hidden" id="url_remote" name="url_remote" value="<?= site_url('surat/nomor_surat_duplikat') ?>">
							<div class="row jar_form">
								<label for="nomor" class="col-sm-3"></label>
								<div class="col-sm-8">
									<input class="required" type="hidden" name="nik" value="<?= $individu['id'] ?>">
								</div>
							</div>
							<?php if ($individu) : ?>
								<?php include("sidepeapps/views/surat/form/konfirmasi_pemohon.php"); ?>
							<?php endif; ?>
							<?php include("sidepeapps/views/surat/form/nomor_surat.php"); ?>
							<div class="form-group">
								<label for="jenis_keramaian" class="col-sm-3 control-label">Jenis Acara</label>
								<div class="col-sm-8">
									<input id="jenis_keramaian" class="form-control input-sm required" type="text" placeholder="Jenis Acara" name="jenis_keramaian">
								</div>
							</div>
							<div class="form-group">
								<label for="keperluan" class="col-sm-3 control-label">Keperluan</label>
								<div class="col-sm-8">
									<textarea name="keperluan" class="form-control input-sm required" placeholder="Keperluan"></textarea>
								</div>
							</div>
							<div class="form-group">
								<label for="berlaku_dari" class="col-sm-3 control-label">Berlaku Dari - Sampai</label>
								<div class="col-sm-3 col-lg-2">
									<div class="input-group input-group-sm date">
										<div class="input-group-addon">
											<i class="fa fa-calendar"></i>
										</div>
										<input title="Pilih Tanggal" id="tgljam_mulai" class="form-control input-sm required" name="berlaku_dari" type="text" />
									</div>
								</div>
								<div class="col-sm-3 col-lg-2">
									<div class="input-group input-group-sm date">
										<div class="input-group-addon">
											<i class="fa fa-calendar"></i>
										</div>
										<input title="Pilih Tanggal" id="tgljam_akhir" class="form-control input-sm" name="berlaku_sampai" type="text" />
									</div>
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