<div class="content-wrapper">
	<section class="content-header">
		<h1>Surat Keterangan Lahir Mati</h1>
		<?php if ($this->admin) { ?>
			<ol class="breadcrumb">
				<li><a href="<?= site_url('hom_desa/about') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
				<li><a href="<?= site_url('surat') ?>"> Daftar Cetak Surat</a></li>
				<li class="active">Surat Keterangan Lahir Mati</li>
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
						<form action="" id="main" name="main" method="POST" class="form-horizontal">
							<?php if ($this->admin) { ?>
								<div class="col-md-12">
									<?php include("sidepeapps/views/surat/form/_cari_nik.php"); ?>
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
							<label for="ttl" class="col-sm-3 control-label">Hari / Tanggal Mati</label>
							<div class="col-sm-3 col-lg-4">
								<input id="hari" class="form-control input-sm" type="text" placeholder="Hari Mati" name="hari">
							</div>
							<div class="col-sm-3 col-lg-2">
								<div class="input-group input-group-sm date">
									<div class="input-group-addon">
										<i class="fa fa-calendar"></i>
									</div>
									<input title="Pilih Tanggal" class="form-control input-sm datepicker required" name="tanggal_mati" type="text" />
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="tempat_mati" class="col-sm-3 control-label">Tempat Mati</label>
							<div class="col-sm-8">
								<input type="text" name="tempat_mati" class="form-control input-sm required" placeholder="Tempat Mati"></input>
							</div>
						</div>
						<div class="form-group">
							<label for="kandungan" class="col-sm-3 control-label">Lama di Kandungan (Bulan)</label>
							<div class="col-sm-2">
								<input id="input_group" type="text" name="lama_kandungan" class="form-control input-sm required" placeholder="Lama Di Kandungan (Bulan)"></input>
							</div>
						</div>
						<div class="form-group subtitle_head">
							<label class="col-sm-3 text-right"><strong>IDENTITAS PELAPOR :</strong></label>
						</div>
						<div class="form-group">
							<label for="nama_pelapor" class="col-sm-3 control-label">Nama Pelapor</label>
							<div class="col-sm-8">
								<input type="text" name="pelapor" class="form-control input-sm required" placeholder="Nama Pelapor"></input>
							</div>
						</div>
						<div class="form-group">
							<label for="hubungan" class="col-sm-3 control-label">Hubungan dengan yang Lahir Mati</label>
							<div class="col-sm-8">
								<input type="text" name="hubungan" class="form-control input-sm required" placeholder="Hubungan dengan yang Lahir Mati"></input>
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