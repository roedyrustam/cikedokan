<?php $aksi = $this->admin ? '' : 'layanan_mandiri/'; ?>

<div class="content-wrapper">
	<section class="content-header">
		<div class="title-header">Dokumen/Kelengkapan Penduduk</div>
		<?php if($this->admin): ?>
			<ol class="breadcrumb">
				<li><a href="<?= site_url('hom_sid')?>"><i class="fa fa-home"></i> Home</a></li>
				<li><a href="<?= site_url('penduduk/clear')?>"> Daftar Penduduk</a></li>
				<li class="active">Dokumen/Kelengkapan Penduduk</li>
			</ol>
		<?php endif; ?>
	</section>
	<section class="content" id="maincontent">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-info">
					<div class="box-header with-border">
						<?php if($this->admin): ?>
							<a href="<?= site_url($aksi."penduduk/detail/1/0/$penduduk[id]")?>" class="btn btn-radius btn-uppercase btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block">Kembali Ke Biodata Penduduk</a>
							<a href="#confirm-delete" title="Hapus Data" onclick="deleteAllBox('mainform','<?= site_url($aksi."penduduk/delete_all_dokumen/$penduduk[id]")?>')" class="btn btn-radius btn-uppercase btn-danger btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block hapus-terpilih">Hapus Data Terpilih</a>
						<?php endif ?>
						
						<?php if(!$this->admin){ ?>
							<a href="#" onclick="window.close()" class="btn btn-radius btn-uppercase btn-default btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block">Kembali Ke Form Surat</a>
						<?php } ?>

						<a href="<?= site_url($aksi."penduduk/dokumen_form/$penduduk[id]")?>" title="Tambah Dokumen" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Tambah Dokumen" class="btn btn-success btn-radius btn-uppercase bg-olive btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block">Tambah Dokumen</a>
					</div>
					<div class="box-body ">
						<div class="table-responsive">
							<table class="table table-bordered table-striped table-hover" style="margin-bottom: 0">
								<tbody>
									<tr>
										<td nowrap style="padding-top : 10px;padding-bottom : 10px; width:15%;" >Nama Penduduk</td><td nowrap > : <?= $penduduk['nama']?></td>
									</tr>
									<tr>
										<td nowrap style="padding-top : 10px;padding-bottom : 10px;" >NIK</td><td nowrap > :  <?= $penduduk['nik']?></td>
									</tr>
									<tr>
										<td nowrap style="padding-top : 10px;padding-bottom : 10px;" >Alamat</td><td nowrap > : <?= $penduduk['alamat']?> RT/RW :  <?= $penduduk['rt']?>/<?= $penduduk['rw']?> <?= strtoupper($this->setting->sebutan_dusun)?> :  <?= $penduduk['dusun']?> </td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<div class="box-body">
						<div class="row">
							<div class="col-sm-12">
								<div class="dataTables_wrapper form-inline dt-bootstrap no-footer">
									<form id="mainform" name="mainform" action="" method="post">
										<div class="row">
											<div class="col-sm-12">
												<div class="table-responsive">
													<table class="table table-bordered table-hover ">
														<thead class="bg-gray disabled color-palette">
															<tr>
																<th><input type="checkbox" id="checkall"></th>
																<th>No</th>
																<th >Aksi</th>
																<th>Nama Dokumen</th>
																<th>File</th>
																<th>Tanggal Upload</th>
															</tr>
														</thead>
														<tbody>
															<?php foreach ($list_dokumen as $data): ?>
																<tr>
																	<td><input type="checkbox" name="id_cb[]" value="<?= $data['id']?>" ></td>
																	<td><?= $key+1?></td>
																	<td nowrap>
																		<a href="<?= site_url($aksi."penduduk/dokumen_form/$penduduk[id]/$data[id]")?>" class="btn bg-orange btn-flat btn-sm" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Ubah Data" title="Ubah Data"  title="Ubah Data"><i class="fa fa-edit"></i></a>
																		<a href="#" data-href="<?= site_url($aksi."penduduk/delete_dokumen/$penduduk[id]/$data[id]")?>" class="btn bg-maroon btn-flat btn-sm"  title="Hapus Data" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-trash-o"></i></a>
																	</td>
																	<td width="40%"><?= $data['nama']?></td>
																	<td width="30%"><a href="<?= base_url().LOKASI_DOKUMEN?><?= urlencode($data['satuan'])?>" ><?= $data['satuan']?></a></td>
																	<td nowrap><?= tgl_indo2($data['tgl_upload'])?></td>
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
					</div>
				</div>
			</div>
		</div>
	</section>
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
