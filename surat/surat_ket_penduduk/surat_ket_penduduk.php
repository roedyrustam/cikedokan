<div class="content-wrapper">
	<section class="content-header">
		<h1>Surat Keterangan Penduduk</h1>
		<?php if ($this->admin) { ?>
			<ol class="breadcrumb">
				<li><a href="<?= site_url('hom_desa/about') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
				<li><a href="<?= site_url('surat') ?>"> Daftar Cetak Surat</a></li>
				<li class="active">Surat Keterangan Penduduk</li>
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
								<div class="form-group">
									<label for="nik" class="col-sm-3 control-label">NIK / Nama</label>
									<div class="col-sm-6 col-lg-4">
										<select class="form-control  input-sm select2-nik" id="cari_nik" name="nik" style="width:100%;" onchange="formAction('main')">
											<option value="">-- Cari NIK / Nama Penduduk--</option>
											<?php foreach ($penduduk as $data) : ?>
												<option value="<?= $data['id'] ?>" <?php selected($individu['nik'], $data['nik']); ?>><?= $data['info_pilihan_penduduk'] ?></option>
											<?php endforeach; ?>
										</select>
									</div>
								</div>
							</form>
						<?php } ?>
						<form id="validasi" action="<?= $form_action ?>" method="POST" target="_blank" class="form-surat form-horizontal">
							<input type="hidden" id="url_surat" name="url_surat" value="<?= $url ?>">
							<input type="hidden" id="url_remote" name="url_remote" value="<?= site_url($aksi . 'surat/nomor_surat_duplikat') ?>">
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
								<label for="keterangan" class="col-sm-3 control-label">Keterangan</label>
								<div class="col-sm-8">
									<textarea id="keterangan" class="form-control input-sm required" placeholder="Keterangan" name="keterangan"></textarea>
								</div>
							</div>
							<?php include("sidepeapps/views/surat/form/tgl_berlaku.php"); ?>
							<?php include("sidepeapps/views/surat/form/_pamong.php"); ?>
					</div>
					<?php include("sidepeapps/views/surat/form/tombol_cetak.php"); ?>
					</form>
				</div>
			</div>
		</div>
	</section>
</div>