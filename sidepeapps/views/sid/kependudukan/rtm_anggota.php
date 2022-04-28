<style>
.input-sm
{
  padding: 4px 4px;
}
</style>
<div class="content-wrapper">
	<section class="content-header">
		<div class="title-header">Daftar Anggota Rumah Tangga</div>
		<ol class="breadcrumb">
			<li><a href="<?= site_url('hom_sid')?>"><i class="fa fa-home"></i> Home</a></li>
			<li><a href="<?= site_url('rtm/clear')?>"> Daftar Rumah Tangga</a></li>
			<li class="active">Daftar Anggota Rumah Tangga</li>
		</ol>
	</section>
	<section class="content" id="maincontent">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-info">
					<div class="box-header with-border">
						<a href="<?= site_url("rtm/ajax_add_anggota/$p/$o/$kk")?>" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Tambah Anggota Rumah Tangga" title="Tambah Anggota Dari Penduduk Yang Sudah Ada" class="btn btn-uppercase btn-radius btn-success btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block">Tambah Anggota</a>
						<a href="#confirm-delete" title="Hapus Data" onclick="deleteAllBox('mainform','<?= site_url("rtm/delete_all_anggota/$p/$o/$kk")?>')" class="btn btn-uppercase btn-radius btn-danger btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block hapus-terpilih">Hapus Data Terpilih</a>
						<a href="<?= site_url("rtm/kartu_rtm/$p/$o/$kk")?>" class="btn btn-uppercase btn-radius bg-purple btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block">Kartu Rumah Tangga</a>
						<a href="<?= site_url("rtm/clear")?>" class="btn btn-uppercase btn-radius btn-info btn-sm btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"  title="Kembali Ke Daftar Rumah Tangga">Kembali ke Daftar Rumah Tangga</a>
					</div>
					<div class="box-body">
						<div class="row">
							<div class="col-sm-12">
								<div class="table-responsive">
									<table class="table table-bordered table-striped table-hover">
										<tbody>
											<tr>
												<td nowrap style="padding-top : 10px;padding-bottom : 10px; width:15%;" >Nomor Rumah Tangga (KK)</td>
												<td nowrap > : <?= $kepala_kk['no_kk']?></td>
											</tr>
											<tr>
												<td nowrap style="padding-top : 10px;padding-bottom : 10px;" >Kepala Rumah Tangga</td>
												<td nowrap > :  <?= unpenetration($kepala_kk['nama'])?></td>
											</tr>
											<tr>
												<td nowrap style="padding-top : 10px;padding-bottom : 10px;" >Alamat</td>
												<td nowrap > : <?= $kepala_kk['alamat_wilayah']?></td>
											</tr>
										</tbody>
									</table>
								</div>
								<div class="dataTables_wrapper form-inline dt-bootstrap no-footer">
									<form id="mainform" name="mainform" action="" method="post">
										<div class="row">
											<div class="col-sm-12">
												<div class="table-responsive">
													<table id="tabel2" class="table table-bordered dataTable table-hover nowrap">
														<thead class="bg-gray disabled color-palette">
															<tr>
																<th class="text-center"><input type="checkbox" class="checkall"/></th>
																<th class="text-center">No</th>
																<th class="text-center">Aksi</th>
																<th class="text-center">NIK</th>
																<th class="text-center">Nomor KK</th>
																<th>Nama</th>
																<th>Jenis Kelamin</th>
																<th>Hubungan</th>
																<th>Alamat</th>
															</tr>
														</thead>
														<tbody>
															<?php foreach ($main as $key => $data): ?>
																<tr>
																	<td class="text-center"><input type="checkbox" name="id_cb[]" value="<?= $data['id']?>" /></td>
																	<td class="text-center"><?= $key+1;?></td>
																	<td nowrap>
																		<a href="<?= site_url("rtm/edit_anggota/$p/$o/$kk/$data[id]")?>" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Ubah Hubungan Rumah Tangga" title="Ubah Hubungan Rumah Tangga" class="btn bg-navy btn-radius-sm btn-sm"><i class="fa fa-link"></i></a>
																		<a href="#" data-href="<?= site_url("rtm/delete_anggota/$p/$o/$kk/$data[id]")?>" class="btn bg-maroon btn-radius-sm btn-sm"  title="Hapus Data" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-trash-o"></i></a>
																	</td>
																	<td><?= $data['nik']?></td>
																	<td><?= $data['no_kk']?></td>
																	<td nowrap width="25%"><?= strtoupper(unpenetration($data['nama']))?></td>
																	<td><?= $data['sex']?></td>
																	<td nowrap><?= $data['hubungan']?></td>
																	<td width="35%"><?= unpenetration($data['alamat'])?></td>
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
									<div class='modal-body btn-info'>
										Apakah Anda yakin ingin menghapus data ini?
									</div>
									<div class='modal-footer'>
										<button type="button" class="btn btn-social btn-flat btn-warning btn-sm" data-dismiss="modal"><i class='fa fa-sign-out'></i> Tutup</button>
										<a class='btn-ok'>
											<button type="button" class="btn btn-social btn-flat btn-danger btn-sm" id="ok-delete"><i class='fa fa-trash-o'></i> Hapus</button>
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
									<div class='modal-body btn-info'>
										Apakah Anda yakin ingin memecah Data Keluarga ini?
									</div>
									<div class='modal-footer'>
										<button type="button" class="btn btn-social btn-flat btn-danger btn-sm" data-dismiss="modal"><i class='fa fa-sign-out'></i> Tutup</button>
										<a class='btn-ok'>
											<button type="button" class="btn btn-social btn-flat btn-info btn-sm" id="ok-delete"><i class='fa fa-check'></i> Simpan</button>
										</a>
									</div>
								</div>
							</div>
						</div>
						<div  class="modal fade" id="modalBox" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							<div class='modal-dialog'>
								<div class='modal-content'>
									<div class='modal-header'>
										<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
										<h4 class='modal-title' id='myModalLabel'></h4>
									</div>
									<div class="fetched-data"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

