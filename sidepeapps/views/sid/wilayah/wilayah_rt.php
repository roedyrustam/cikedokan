<div class="content-wrapper">
	<section class="content-header">
		<div class="title-header">Wilayah Administratif RT</div>
		<ol class="breadcrumb">
			<li><a href="<?= site_url('hom_sid')?>"><i class="fa fa-home"></i> Home</a></li>
			<li><a href="<?= site_url('sid_core')?>"> Daftar Wilayah <?= ucwords($this->setting->sebutan_dusun)?></a></li>
			<li><a href="<?= site_url("sid_core/sub_rw/$id_dusun")?>"> Daftar Wilayah RW</a></li>
			<li class="active">Daftar Wilayah RT</li>
		</ol>
	</section>
	<section class="content" id="maincontent">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-info">
					<div class="box-header with-border">
						<a href="<?= site_url("sid_core/form_rt/$id_dusun/$rw")?>" class="btn btn-radius btn-uppercase btn-success btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Tambah Data">Tambah RT</a>
						<a href="<?= site_url("sid_core/cetak_rt/$id_dusun/$rw")?>" class="btn btn-radius btn-uppercase bg-purple btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Cetak Data" target="_blank">Cetak Data</a>
						<a href="<?= site_url("sid_core/excel_rt/$id_dusun/$rw")?>" class="btn btn-radius btn-uppercase bg-orange btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Unduh Data" target="_blank">Unduh Data</a>
						<a href="<?= site_url("sid_core/sub_rw/$id_dusun")?>" class="btn btn-radius btn-uppercase  btn-info btn-sm btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"  title="Kembali Ke Daftar RW">Kembali ke Daftar RW</a>
					</div>
					<div class="box-header with-border">
						<strong>RW <?= $rw?> / <?= ucwords($this->setting->sebutan_dusun)?> <?= unpenetration(ununderscore($dusun))?>  </strong>
					</div>
					<div class="box-body">
						<div class="row">
							<div class="col-sm-12">
								<div class="dataTables_wrapper form-inline dt-bootstrap no-footer">
									<form id="mainform" name="mainform" action="" method="post">
										<div class="row">
											<div class="col-sm-12">
												<div class="table-responsive">
													<table class="table table-bordered table-striped dataTable table-hover">
														<thead class="bg-gray disabled color-palette">
															<tr>
																<th width="2%"><input type="checkbox" id="checkall"/></th>
																<th width="2%">No</th>
																<th width="9%">Aksi</th>
																<th>RT</th>
																<th width="30%">Ketua RT</th>
																<th>NIK Ketua RT</th>
																<th>KK</th>
																<th>L+P</th>
																<th>L</th>
																<th>P</th>
															</tr>
														</thead>
														<tbody>
															<?php foreach ($main as $data): ?>
																<tr>
																	<td><input type="checkbox" name="id_cb[]" value="<?= $data['id']?>" /></td>
																	<td><?= $data['no']?></td>
																	<td nowrap>
																		<?php if ($data['rt']!="-"): ?>
																			<a href="<?= site_url("sid_core/form_rt/$id_dusun/$rw/$data[id]")?>" class="btn bg-orange btn-radius-sm btn-sm" title="Ubah"><i class="fa fa-edit"></i></a>
																			<a href="#" data-href="<?= site_url("sid_core/delete_rt/$data[id]")?>" class="btn bg-maroon btn-radius-sm btn-sm"  title="Hapus" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-trash-o"></i></a>
																		<?php endif; ?>
																	</td>
																	<td><?= $data['rt']?></td>
																	<td nowrap><strong><?= unpenetration($data['nama_ketua'])?></strong></td>
																	<td nowrap><?= $data['nik_ketua']?></td>
																	<td><?= $data['jumlah_kk']?></td>
																	<td><?= $data['jumlah_warga']?></td>
																	<td><?= $data['jumlah_warga_l']?></td>
																	<td><?= $data['jumlah_warga_p']?></td>
																</tr>
															<?php endforeach; ?>
														</tbody>
														<tfoot>
															<tr>
																<th colspan="6"><label>TOTAL</label></th>
																<th><?= $total['jmlkk']?></th>
																<th><?= $total['jmlwarga']?></th>
																<th><?= $total['jmlwargal']?></th>
																<th><?= $total['jmlwargap']?></th>
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
										<button type="button" class="btn btn-uppercase btn-radius btn-warning btn-sm" data-dismiss="modal">Tutup</button>
										<a class='btn-ok'>
											<button type="button" class="btn btn-uppercase btn-radius btn-danger btn-sm" id="ok-delete">Hapus</button>
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

