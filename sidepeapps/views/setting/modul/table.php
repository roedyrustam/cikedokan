<div class="content-wrapper">
	<section class="content-header">
		<div class="title-header">Manajemen modul</div>
		<ol class="breadcrumb">
			<li><a href="<?= site_url('hom_sid')?>"><i class="fa fa-home"></i> Home</a></li>
			<li class="active">Manajemen Modul</li>
		</ol>
	</section>
	<section class="content" id="maincontent">
		<form id="mainform" name="mainform" action="" method="post">
			<div class="row">
				<div class="col-md-12">
					<div class="box box-info">
						<div class="box-body">
							<div class="row">
								<div class="col-sm-12">
									<div class="dataTables_wrapper form-inline dt-bootstrap no-footer">
										<form id="mainform" name="mainform" action="" method="post">
											<div class="row">
												<div class="col-sm-6">
													<select class="form-control input-sm " name="filter" onchange="formAction('mainform','<?=site_url('modul/filter')?>')">
														<option value="">Semua</option>
														<option value="1" <?php if ($filter==1): ?>selected<?php endif ?>>Aktif</option>
														<option value="2" <?php if ($filter==2): ?>selected<?php endif ?>>Tidak Aktif</option>
													</select>
												</div>
												<div class="col-sm-6">
													<div class="box-tools">
														<div class="input-group input-group-sm pull-right">
															<input name="cari" id="cari" class="form-control" placeholder="Cari..." type="text" value="<?=html_escape($cari)?>" onkeypress="if (event.keyCode == 13):$('#'+'mainform').attr('action','<?=site_url('modul/search')?>');$('#'+'mainform').submit();endif;">
															<div class="input-group-btn">
																<button type="submit" class="btn btn-default" onclick="$('#'+'mainform').attr('action','<?= site_url("modul/search")?>');$('#'+'mainform').submit();" style="border-top-left-radius:0;border-bottom-left-radius:0;"><i class="fa fa-search"></i></button>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-sm-12">
													<div class="table-responsive">
														<table class="table table-bordered table-striped dataTable table-hover">
															<thead class="bg-gray disabled color-palette">
																<tr>
																	<th class="text-center" width="5%"><input type="checkbox" id="checkall"/></th>
																	<th class="text-center uppercase" width="5%">No</th>
																	<th class="text-center uppercase" width="10%">Aksi</th>
																	<th class="text-center uppercase" width="70%">Nama Modul</th>
																	<th class="text-center uppercase">Status</th>
																</tr>
															</thead>
															<tbody>
																<?php foreach ($main as $data): ?>
																	<tr>
																		<td class="text-center"><input type="checkbox" name="id_cb[]" value="<?=$data['id']?>" /></td>
																		<td class="text-center"><?=$data['no']?></td>
																		<td nowrap>
																			<a href="<?=site_url("modul/form/$data[id]")?>" class="btn bg-orange btn-radius-sm" title="Ubah Data" ><i class="fa fa-edit"style="font-size:12px"></i></a>
																			<?php if (count($data['submodul'])>0): ?>
																				<a href="<?=site_url("modul/sub_modul/$data[id]")?>" class="btn bg-olive btn-radius-sm" title="Lihat Sub Modul" ><i class="fa fa-list" style="font-size:12px"></i></a>
																			<?php endif; ?>
																		</td>
																		<td><?=$data['modul']?></td>
																		<td class="text-center">
																			<?php	if ($data['aktif']==1): ?><i class="fa fa-unlock" style="color:green;font-size:14px"></i><?php else: ?><i class="fa fa-lock" style="color:red;font-size:14px"> <?php endif; ?>
																		</td>
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
								</form>
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
						</div>
					</div>
				</div>
			</div>
		</form>
	</section>
</div>

