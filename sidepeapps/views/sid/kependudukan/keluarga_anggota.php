<style>
.input-sm
{
  padding: 4px 4px;
}
</style>
<div class="content-wrapper">
	<section class="content-header">
		<div class="title-header">Daftar Anggota Keluarga</div>
		<ol class="breadcrumb">
			<li><a href="<?=site_url('hom_sid')?>"><i class="fa fa-home"></i> Home</a></li>
			<li><a href="<?= site_url('keluarga/clear')?>"> Daftar Keluarga</a></li>
			<li class="active">Daftar Anggota Keluarga</li>
		</ol>
	</section>
	<section class="content" id="maincontent">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-info">
					<div class="box-header with-border">
						<a href="<?= site_url("keluarga/ajax_add_anggota/$p/$o/$kk")?>" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Tambah Anggota Keluarga" title="Tambah Anggota Dari Penduduk Yang Sudah Ada" class="btn btn-radius btn-uppercase btn-success btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block">Tambah Anggota</a>
						<a href="#confirm-delete" title="Hapus Data" onclick="deleteAllBox('mainform','<?= site_url("keluarga/delete_all_anggota/$p/$o/$kk")?>')" class="btn btn-radius btn-uppercase btn-danger btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block hapus-terpilih">Hapus Data Terpilih</a>
						<a href="<?= site_url("keluarga/kartu_keluarga/$p/$o/$kk")?>" class="btn btn-radius btn-uppercase bg-purple btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block">Kartu Keluarga</a>
						<a href="<?=site_url("keluarga/index/$p/$o")?>" class="btn btn-radius btn-uppercase btn-info btn-sm btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Kembali Ke Daftar Keluarga">Kembali Ke Daftar Keluarga</a>
					</div>
					<div class="box-body">
						<div class="row">
							<div class="col-sm-12">
								<div class="table-responsive">
									<table class="table table-bordered table-striped table-hover">
										<tbody>
											<tr>
												<td nowrap style="padding-top : 10px;padding-bottom : 10px; width:15%;" >Nomor Kartu Keluarga (KK)</td>
												<td nowrap > : <?= $kepala_kk['no_kk']?></td>
											</tr>
											<tr>
												<td nowrap style="padding-top : 10px;padding-bottom : 10px;" >Kepala Keluarga</td>
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
																<th><input type="checkbox" class="checkall"/></th>
																<th>No</th>
																<th>Aksi</th>
																<th>NIK</th>
																<th>Nama</th>
																<th>Tanggal Lahir</th>
																<th>Jenis Kelamin</th>
																<th>Hubungan</th>
															</tr>
														</thead>
														<tbody>
															<?php foreach ($main as $key => $data): ?>
																<tr>
																	<td><input type="checkbox" name="id_cb[]" value="<?= $data['id']?>" /></td>
																	<td><?= $key+1;?></td>
																	<td nowrap>
																		<a href="<?= site_url("penduduk/form/$p/$o/$data[id]")?>" class="btn bg-orange btn-radius-sm btn-sm"  title="Ubah Biodata Penduduk"><i class="fa fa-edit"></i></a>
																		<a href="#" data-href="<?= site_url("keluarga/delete_anggota/$p/$o/$kk/$data[id]")?>" class="btn bg-purple btn-radius-sm btn-sm"  title="Pecah KK" data-toggle="modal" data-target="#confirm-status"><i class="fa fa-cut"></i></a>
																		<?php if ($data['kk_level']!=0): ?>
																			<a href="<?= site_url("keluarga/edit_anggota/$p/$o/$kk/$data[id]")?>" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Ubah Hubungan Keluarga" title="Ubah Hubungan Keluarga" class="btn bg-navy btn-radius-sm btn-sm"><i class='fa fa-link'></i></a>
																		<?php endif; ?>
																	</td>
																	<td><?= $data['nik']?></td>
																	<td nowrap width="45%"><?= strtoupper(unpenetration($data['nama']))?></td>
																	<td nowrap><?= tgl_indo($data['tanggallahir'])?></td>
																	<td><?= $data['sex']?></td>
																	<td nowrap><?= $data['hubungan']?></td>
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
									<div class='modal-body btn-danger'>
										Apakah Anda yakin ingin menghapus data ini?
									</div>
									<div class='modal-footer'>
										<button type="button" class="btn btn-radius btn-warning btn-sm" data-dismiss="modal">Tutup</button>
										<a class='btn-ok'>
											<button type="button" class="btn btn-radius btn-danger btn-sm" id="ok-delete">Hapus</button>
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
									<div class='modal-body btn-danger'>
										Apakah Anda yakin ingin memecah Data Keluarga ini?
									</div>
									<div class='modal-footer'>
										<button type="button" class="btn btn-radius btn-danger btn-sm" data-dismiss="modal">Tutup</button>
										<a class='btn-ok'>
											<button type="button" class="btn btn-radius btn-info btn-sm" id="ok-delete">Simpan</button>
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

