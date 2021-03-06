<div class="content-wrapper">
	<section class="content-header">
		<h1>Surat Keterangan Pengantar Rujuk/Cerai</h1>
		<?php if ($this->admin) { ?>
			<ol class="breadcrumb">
				<li><a href="<?= site_url('hom_desa/about') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
				<li><a href="<?= site_url('surat') ?>"> Daftar Cetak Surat</a></li>
				<li class="active">Surat Keterangan Pengantar Rujuk/Cerai</li>
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
									<label class="col-sm-3 text-right"><strong>DATA PASANGAN :</strong></label>
								</div>
								<div class="form-group">
									<label for="nama_pasangan" class="col-sm-3 control-label">Nama Lengkap</label>
									<div class="col-sm-8">
										<input type="text" name="nama_pasangan" class="form-control input-sm required" placeholder="Nama Lengkap Pasangan"></input>
									</div>
								</div>
								<div class="form-group ibu_luar_desa">
									<label for="tempatlahir_pasangan" class="col-sm-3 control-label">Tempat / Tanggal Lahir </label>
									<div class="col-sm-4">
										<input class="form-control input-sm" type="text" name="tempatlahir_pasangan" id="tempatlahir_pasanganu" placeholder="Tempat Lahir Pasangan">
									</div>
									<div class="col-sm-3 col-lg-2">
										<div class="input-group input-group-sm date">
											<div class="input-group-addon">
												<i class="fa fa-calendar"></i>
											</div>
											<input title="Pilih Tanggal" class="form-control input-sm datepicker required" name="tanggallahir_pasangan" type="text" placeholder="Tgl. Lahir">
										</div>
									</div>
								</div>
								<div class="form-group">
									<label for="wn_pasangan" class="col-sm-3 control-label">Warganegara</label>
									<div class="col-sm-8">
										<input type="text" name="wn_pasangan" class="form-control input-sm required" placeholder="Warganegara Pasangan"></input>
									</div>
								</div>
								<div class="form-group">
									<label for="nama_ayah_pasangan" class="col-sm-3 control-label">Nama Ayah</label>
									<div class="col-sm-8">
										<input type="text" name="nama_ayah_pasangan" class="form-control input-sm required" placeholder="Nama Ayah Pasangan"></input>
									</div>
								</div>
								<div class="form-group">
									<label for="agama_pasangan" class="col-sm-3 control-label">Agama</label>
									<div class="col-sm-8">
										<input type="text" name="agama_pasangan" class="form-control input-sm required" placeholder="Agama Pasangan"></input>
									</div>
								</div>
								<div class="form-group">
									<label for="pekerjaan_pasangan" class="col-sm-3 control-label">Pekerjaan</label>
									<div class="col-sm-8">
										<input type="text" name="pekerjaan_pasangan" class="form-control input-sm required" placeholder="Pekerjaan Pasangan"></input>
									</div>
								</div>
								<div class="form-group">
									<label for="alamat_pasangan" class="col-sm-3 control-label">Tempat Tinggal</label>
									<div class="col-sm-8">
										<input type="text" name="alamat_pasangan" class="form-control input-sm required" placeholder="Tempat Tinggal Pasangan"></input>
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