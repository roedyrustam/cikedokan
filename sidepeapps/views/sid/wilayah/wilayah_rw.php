<div class="content-wrapper">
	<section class="content-header">
		<div class="title-header">Wilayah Administratif RW</div>
		<ol class="breadcrumb">
			<li><a href="<?= site_url('hom_sid')?>"><i class="fa fa-home"></i> Home</a></li>
			<li><a href="<?= site_url('sid_core')?>"> Daftar <?= ucwords($this->setting->sebutan_dusun)?></a></li>
			<li class="active">Daftar RW</li>
		</ol>
	</section>
	<section class="content" id="maincontent">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-info">
					<div class="box-header with-border">
						<a href="<?= site_url("sid_core/form_rw/$id_dusun")?>" class="btn btn-uppercase btn-radius btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Tambah Data" style="background-color: #00ca6d;">Tambah RW</a>
						<a href="<?= site_url("sid_core/cetak_rw/$id_dusun")?>" class="btn btn-uppercase btn-radius bg-purple btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Cetak Data" target="_blank">Cetak Data</a>
						<a href="<?= site_url("sid_core/excel_rw/$id_dusun")?>" class="btn btn-uppercase btn-radius bg-orange btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Unduh Data" target="_blank">Unduh Data</a>
						<a href="<?= site_url("sid_core")?>" class="btn btn-uppercase btn-radius  btn-info btn-sm btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"  title="Kembali Ke Daftar RW">Kembali ke Daftar <?= ucwords($this->setting->sebutan_dusun)?></a>
					</div>
					<div class="box-header with-border">
						<strong><?= ucwords($this->setting->sebutan_dusun)?> <?= $dusun?></strong>
					</div>
					<div class="box-body">
						<div class="row">
							<div class="col-sm-12">
								<div class="dataTables_wrapper form-inline dt-bootstrap no-footer">
									<form id="mainform" name="mainform" action="" method="post">
										<div class="row">
											<div class="col-sm-12">
												<div class="table-responsive">
													<table class="table table-bordered table-striped dataTable table-hover" >
														<thead class="bg-gray disabled color-palette">
															<tr >
																<th class="text-center"><input type="checkbox" id="checkall"></th>
																<th class="text-center">No</th>
																<th class="text-center">Aksi</th>
																<th class="text-center"> RW</th>
																<th>Ketua RW</th>
																<th>NIK Ketua RW</th>
																<th class="text-center">RT</th>
																<th class="text-center">KK</th>
																<th class="text-center">L+P</th>
																<th class="text-center">L</th>
																<th class="text-center">P</th>

															</tr>
														</thead>
														<tbody>
															<?php foreach ($main as $data): ?>
																<tr>
																	<td class="text-center"><input type="checkbox" name="id_cb[]" value="<?= $data['id']?>" ></td>
																	<td class="text-center"><?= $data['no']?></td>
																	<td nowrap>
																		<a href="<?= site_url("sid_core/sub_rt/$id_dusun/$data[rw]")?>" class="btn bg-purple btn-radius-sm btn-sm"  title="Rincian Sub Wilayah RW"><i class="fa fa-list"></i></a>
																		<?php if ($data['rw']!="-"): ?>
																			<a href="<?= site_url("sid_core/form_rw/$id_dusun/$data[rw]")?>" class="btn bg-orange btn-radius-sm btn-sm" title="Ubah"><i class="fa fa-edit"></i></a>
																		<?php endif; ?>
																		<?php if ($data['rw']!="-"): ?>
																			<a href="#" data-href="<?= site_url("sid_core/delete_rw/$id_dusun/$data[id]")?>" class="btn bg-maroon btn-radius-sm btn-sm"  title="Hapus" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-trash-o"></i></a>
																		<?php endif; ?>
																	</td>
																	<td class="text-center"><?= $data['rw']?></td>
																	<?php if ($data['rw']=="-"): ?>
																		<td colspan="2">
																			Pergunakan RW ini apabila RT berada langsung di bawah <?= ucwords($this->setting->sebutan_dusun)?>, yaitu tidak ada RW
																		</td>
																	<?php else: ?>
																		<td nowrap><strong><?= $data['nama_ketua']?></strong></td>
																		<td><?= $data['nik_ketua']?></td>
																	<?php endif; ?>
																	<td class="text-center"><a href="<?= site_url("sid_core/sub_rt/$id_dusun/$data[rw]")?>" title="Rincian Sub Wilayah"><?= $data['jumlah_rt']?></a></td>
																	<td class="text-center"><?= $data['jumlah_kk']?></td>
																	<td class="text-center"><?= $data['jumlah_warga']?></td>
																	<td class="text-center"><?= $data['jumlah_warga_l']?></td>
																	<td class="text-center"><?= $data['jumlah_warga_p']?></td>
																</tr>
																<?php endforeach; ?>
															</tbody>
														<tfoot>
															<tr>
																<th class="text-center" colspan="6"><label>TOTAL</label></th>
																<th class="text-center"><?= $total['jmlrt']?></th>
																<th class="text-center"><?= $total['jmlkk']?></th>
																<th class="text-center"><?= $total['jmlwarga']?></th>
																<th class="text-center"><?= $total['jmlwargal']?></th>
																<th class="text-center"><?= $total['jmlwargap']?></th>
															</tr>
														</tfoot>
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
									<div class='modal-body btn-danger'>
										Apakah Anda yakin ingin menghapus data ini?
									</div>
									<div class='modal-footer'>
										<button type="button" class="btn btn-radius-sm btn-warning btn-sm" data-dismiss="modal">Tutup</button>
										<a class='btn-ok'>
											<button type="button" class="btn btn-radius-sm btn-danger btn-sm" id="ok-delete">Hapus</button>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

