<div class="content-wrapper">
	<section class="content-header">
		<?php if ($tampil == 0): ?>
			<div class="title-header">Data Suplemen</div>
		<?php else: ?>
			<div class="title-header">Data Suplemen Dengan Sasaran <?=$sasaran[$tampil]?></div>
		<?php endif; ?>
		<ol class="breadcrumb">
			<li><a href="<?=site_url('hom_sid')?>"><i class="fa fa-home"></i> Home</a></li>
			<li class="active">Data Suplemen</li>
		</ol>
	</section>
	<section class="content" id="maincontent">
		<form id="mainform" name="mainform" action="" method="post">
			<div class="row">
				<div class="col-md-12">
					<div class="box box-info">
						<div class="box-header with-border">
							<a href="<?=site_url('suplemen/create')?>" class="btn btn-radius btn-uppercase bg-olive btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Tambah Suplemen Baru">Tambah Suplemen Baru</a>
							<a href="<?=site_url('suplemen/panduan')?>" class="btn btn-radius btn-uppercase btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Tambah Program Bantuan Baru">Panduan</a>
						</div>
						<div class="box-body">
							<div class="row">
								<div class="col-sm-12">
									<div class="dataTables_wrapper form-inline dt-bootstrap no-footer">
										<form id="mainform" name="mainform" action="" method="post">
											<div class="row">
												<div class="col-sm-12">
													<div class="table-responsive">
														<table class="table table-bordered table-striped dataTable table-hover nowrap">
															<thead class="bg-gray disabled color-palette">
																<tr>
																	<th class="text-center">No.</th>
																	<th class="text-center">Aksi</th>
																	<th>Nama Data</th>
																	<th>Sasaran</th>
																</tr>
															</thead>
																<tbody>
																	<?php
																		$nomer = 0;
																		foreach ($suplemen as $item):
																		$nomer++;
																	?>
																	<tr>
																		<td class="text-center"><?= $nomer; ?></td>
																		<td nowrap>
																			<a href="<?= site_url('suplemen/rincian/1/'.$item["id"].'/'); ?>" class="btn bg-purple btn-radius-sm btn-sm"  title="Rincian Data"><i class="fa fa-list-ol"></i></a>
																			<a href="<?= site_url('suplemen/edit/'.$item["id"].'/'); ?>" class="btn bg-orange btn-radius-sm btn-sm"  title="Ubah Data"><i class='fa fa-edit'></i></a>
																			<a href="#" data-href="<?= site_url('suplemen/hapus/'.$item["id"].'/'); ?>" class="btn bg-maroon btn-radius-sm btn-sm"  title="Hapus Data" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-trash-o"></i></a>
																		</td>
																		<td width="70%"><a href="<?= site_url('suplemen/rincian/1/'.$item["id"].'/')?>"><?= $item["nama"] ?></a></td>
																		<td><a href="<?= site_url('suplemen/sasaran/'.$item["sasaran"])?>"><?= $sasaran[$item["sasaran"]]?></a></td>
																	</tr>
																	<?php endforeach; ?>
															</tbody>
														</table>
													</div>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
							<div class='modal fade' id='confirm-delete' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
								<div class='modal-dialog'>
									<div class='modal-content'>
										<div class='modal-header'>
											<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
											<h4 class='modal-title' id='myModalLabel'><i class='fa fa-exclamation-triangle text-red'></i> Konfirmasi</h4>
										</div>
										<div class='modal-body btn-warning'>
											Apakah Anda yakin ingin menghapus data ini?
										</div>
										<div class='modal-footer'>
											<button type="button" class="btn btn-radius btn-uppercase btn-warning btn-sm" data-dismiss="modal">Tutup</button>
											<a class='btn-ok'>
												<button type="button" class="btn btn-radius btn-uppercase btn-danger btn-sm" id="ok-delete">Hapus</button>
											</a>
										</div>
									</div>
								</div>
							</div>
							<div class='modal fade' id='confirm-status' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
								<div class='modal-dialog'>
									<div class='modal-content'>
										<div class='modal-header'>
											<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
											<h4 class='modal-title' id='myModalLabel'><i class='fa fa-exclamation-triangle text-red'></i> Konfirmasi</h4>
										</div>
										<div class='modal-body btn-warning'>
											Apakah Anda yakin ingin mengembalikan status data penduduk ini?
										</div>
										<div class='modal-footer'>
											<button type="button" class="btn btn-radius btn-uppercase btn-danger btn-sm" data-dismiss="modal">Tutup</button>
											<a class='btn-ok'>
												<button type="button" class="btn btn-radius btn-uppercase btn-info btn-sm" id="ok-status">Ya</button>
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
	</section>
</div>

