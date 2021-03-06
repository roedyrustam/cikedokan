<div class="content-wrapper">
	<section class="content-header">
		<div class="title-header">Surat Pengantar Permohonan Duplikat Surat Nikah</div>
		<?php if ($this->admin) : ?>
			<ol class="breadcrumb">
				<li><a href="<?= site_url('hom_desa/about') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
				<li><a href="<?= site_url('surat') ?>"> Cetak Surat</a></li>
				<li class="active">Surat Pengantar Permohonan Duplikat Surat Nikah</li>
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
								<label for="kua" class="col-sm-3 control-label"><?= ucwords($this->setting->sebutan_kecamatan) ?> KUA</label>
								<div class="col-sm-8">
									<input id="kecamatan_kua" class="form-control input-sm required" type="text" placeholder="Kecamatan KUA" name="kecamatan_kua">
								</div>
							</div>
							<div class="form-group">
								<label for="tgl_nikah" class="col-sm-3 control-label">Tanggal Nikah</label>
								<div class="col-sm-3 col-lg-2">
									<div class="input-group input-group-sm date">
										<div class="input-group-addon">
											<i class="fa fa-calendar"></i>
										</div>
										<input title="Pilih Tanggal" class="form-control input-sm datepicker required" name="tgl_nikah" type="text" />
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="nama_pasangan" class="col-sm-3 control-label">Nama Pasangan</label>
								<div class="col-sm-8">
									<input id="nama_pasangan" class="form-control input-sm required" type="text" placeholder="Nama Pasangan" name="nama_pasangan">
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