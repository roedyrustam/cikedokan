	<script>
		$(function() {
			$('#showData').click(function() {
				$("#kel").removeClass('hide');
				$('#showData').hide();
				$('#hideData').show();
			});

			$('#hideData').click(function() {
				$('#kel').addClass('hide');
				$('#hideData').hide();
				$('#showData').show();
			});
			$('#hideData').hide();
		});
	</script>
	<div class="content-wrapper">
		<section class="content-header">
			<h1>Surat Keterangan Tidak Mampu</h1>
			<?php if ($this->admin) { ?>
				<ol class="breadcrumb">
					<li><a href="<?= site_url('hom_desa/about') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
					<li><a href="<?= site_url('surat') ?>"> Daftar Cetak Surat</a></li>
					<li class="active">Surat Keterangan Tidak Mampu</li>
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
									<?php include("sidepeapps/views/surat/form/_cari_nik.php"); ?>
								</form>
							<?php } ?>
							<form id="validasi" action="<?= $form_action ?>" method="POST" target="_blank" class="form-surat form-horizontal">
								<input type="hidden" id="url_surat" name="url_surat" value="<?= $url ?>">
								<input type="hidden" id="url_remote" name="url_remote" value="<?= site_url($aksi . 'surat/nomor_surat_duplikat') ?>">
								<?php if ($individu) : ?>
									<?php include("sidepeapps/views/surat/form/konfirmasi_pemohon.php"); ?>
									<div class="form-group">
										<label for="keperluan" class="col-sm-3 control-label">Data Keluarga / KK</label>
										<div class="col-sm-8">
											<a id="showData" class="btn btn-social btn-flat btn-danger btn-sm"><i class="fa fa-search-plus"></i> Tampilkan</a>
											<a id="hideData" class="btn btn-social btn-flat btn-danger btn-sm"><i class="fa fa-search-minus"></i> Sembunyikan</a>
										</div>
									</div>
									<div id="kel" class="form-group hide">
										<label for="pengikut" class="col-sm-3 control-label">Keluarga</label>
										<div class="col-sm-8">
											<div class="table-responsive">
												<table class="table table-bordered dataTable table-hover nowrap">
													<thead class="bg-gray disabled color-palette">
														<tr>
															<th>No</th>
															<th>NIK</th>
															<th>Nama</th>
															<th>Jenis Kelamin</th>
															<th>Tempat Tanggal Lahir</th>
															<th>Hubungan</th>
															<th>Status Kawin</th>
														</tr>
													</thead>
													<tbody>
														<?php if ($anggota != NULL) :
															$i = 0; ?>
															<?php foreach ($anggota as $data) : $i++; ?>
																<tr>
																	<td><?= $i ?></td>
																	<td><?= $data['nik'] ?></td>
																	<td><?= unpenetration($data['nama']) ?></td>
																	<td><?= $data['sex'] ?></td>
																	<td><?= $data['tempatlahir'] ?>, <?= tgl_indo($data['tanggallahir']) ?></td>
																	<td><?= $data['hubungan'] ?></td>
																	<td><?= $data['status_kawin'] ?></td>
																</tr>
															<?php endforeach; ?>
														<?php endif; ?>
													</tbody>
												</table>
											</div>
										</div>
									</div>
								<?php endif; ?>
								<div class="form-group">
									<label for="nomor" class="col-sm-3 control-label">Nomor Surat</label>
									<div class="col-sm-8">
										<input id="nomor" class="form-control input-sm required" type="text" placeholder="Nomor Surat" name="nomor" value="<?= $surat_terakhir['no_surat_berikutnya']; ?>">
										<p class="help-block text-red small"><?= $surat_terakhir['ket_nomor'] ?><strong><?= $surat_terakhir['no_surat']; ?></strong> (tgl: <?= $surat_terakhir['tanggal'] ?>)</p>
									</div>
								</div>
								<div class="form-group">
									<label for="keperluan" class="col-sm-3 control-label">Keperluan</label>
									<div class="col-sm-8">
										<textarea name="keperluan" class="form-control input-sm required" placeholder="Keperluan"></textarea>
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