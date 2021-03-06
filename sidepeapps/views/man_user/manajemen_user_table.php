<script>
	$(function()
	{
		var keyword = <?= $keyword?> ;
		$( "#cari" ).autocomplete(
		{
			source: keyword,
			maxShowItems: 10,
		});
	});
</script>
<div class="content-wrapper">
	<section class="content-header">
		<div class="title-header">Manajemen Pengguna</div>
		<ol class="breadcrumb">
			<li><a href="<?= site_url('hom_sid')?>"><i class="fa fa-home"></i> Home</a></li>
			<li class="active">Manajemen Pengguna</li>
		</ol>
	</section>
	<section class="content" id="maincontent">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-info">
					<div class="box-header with-border">
						<a href="<?= site_url('man_user/form')?>" class="btn btn-radius btn-uppercase btn-success btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block">Tambah Pengguna Baru</a>
						<a href="#confirm-delete" title="Hapus Data" onclick="deleteAllBox('mainform','<?=site_url("man_user/delete_all/$p/$o")?>')" class="btn btn-radius btn-uppercase btn-danger btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block hapus-terpilih">Hapus Data Terpilih</a>
					</div>
					<div class="box-body">
						<div class="row">
							<div class="col-sm-12">
								<div class="dataTables_wrapper form-inline dt-bootstrap no-footer">
									<form id="mainform" name="mainform" action="" method="post">
										<div class="row">
											<div class="col-sm-6">
												<select class="form-control input-sm" name="filter" onchange="formAction('mainform','<?=site_url('man_user/filter')?>')">
													<option value="">Semua</option>
													<option value="1" <?php if ($filter==1): ?>selected<?php endif ?>>Administrator</option>
													<option value="2" <?php if ($filter==2): ?>selected<?php endif ?>>Operator</option>
													<option value="3" <?php if ($filter==3): ?>selected<?php endif ?>>Redaksi</option>
													<option value="4" <?php if ($filter==4): ?>selected<?php endif ?>>Kontributor</option>
												</select>
											</div>
											<div class="col-sm-6">
												<div class="box-tools">
													<div class="input-group input-group-sm pull-right">
														<input name="cari" id="cari" class="form-control" placeholder="Cari..." type="text" value="<?=html_escape($cari)?>" onkeypress="if (event.keyCode == 13) {$('#'+'mainform').attr('action','<?=site_url('man_user/search')?>');$('#'+'mainform').submit();}">
														<div class="input-group-btn">
															<button type="submit" class="btn btn-default" onclick="$('#'+'mainform').attr('action','<?=site_url("man_user/search")?>');$('#'+'mainform').submit();" style="border-top-left-radius:0;border-bottom-left-radius:0"><i class="fa fa-search"></i></button>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-sm-12">
												<div class="table-responsive">
													<table  class="table table-bordered table-striped dataTable table-hover">
														<thead class="bg-gray disabled color-palette">
															<tr>
																<th class="text-center"><input type="checkbox" id="checkall"/></th>
																<th class="text-center uppercase">No</th>
																<th>Aksi</th>
																<?php if ($o==2): ?>
																	<th class="text-center uppercase" nowrap><a href="<?= site_url("man_user/index/$cat/$p/1")?>">Username <i class='fa fa-sort-asc fa-sm'></i></a></th>
																<?php elseif ($o==1): ?>
																	<th class="text-center uppercase" nowrap><a href="<?= site_url("man_user/index/$cat/$p/2")?>">Username <i class='fa fa-sort-desc fa-sm'></i></a></th>
																<?php else: ?>
																	<th class="text-center uppercase" nowrap><a href="<?= site_url("man_user/index/$cat/$p/1")?>">Username <i class='fa fa-sort fa-sm'></i></a></th>
																<?php endif; ?>

																<?php if ($o==4): ?>
																	<th class="text-center uppercase" width='50%'><a href="<?= site_url("man_user/index/$cat/$p/3")?>">Nama <i class='fa fa-sort-asc fa-sm'></i></a></th>
																<?php elseif ($o==3): ?>
																	<th class="text-center uppercase" width='50%'><a href="<?= site_url("man_user/index/$cat/$p/4")?>">Nama <i class='fa fa-sort-desc fa-sm'></i></a></th>
																<?php else: ?>
																	<th class="text-center uppercase" width='50%'><a href="<?= site_url("man_user/index/$cat/$p/3")?>">Nama <i class='fa fa-sort fa-sm'></i></a></th>
																<?php endif; ?>

																<?php if ($o==6): ?>
																	<th class="text-center uppercase"><a href="<?= site_url("man_user/index/$cat/$p/5")?>">Group <i class='fa fa-sort-asc fa-sm'></i></a></th>
																<?php elseif ($o==5): ?>
																	<th class="text-center uppercase"><a href="<?= site_url("man_user/index/$cat/$p/6")?>">Group <i class='fa fa-sort-desc fa-sm'></i></a></th>
																<?php else: ?>
																	<th class="text-center uppercase"><a href="<?= site_url("man_user/index/$cat/$p/5")?>">Group <i class='fa fa-sort fa-sm'></i></a></th>
																<?php endif; ?>
																<th class="text-center uppercase">Login Terakhir</th>
															</tr>
														</thead>
														<tbody>
															<?php foreach ($main as $data): ?>
																<tr>
																	<td class="text-center">
																		<?php if ($data['username']!='siteman'): ?>
																			<input type="checkbox" name="id_cb[]" value="<?=$data['id']?>" />
																		<?php endif; ?>
																	</td>
																	<td class="text-center"><?=$data['no']?></td>
																	<td nowrap>
																		<a href="<?=site_url("Man_user/form/$p/$o/$data[id]")?>" class="btn bg-orange btn-radius-sm"  title="Ubah"><i class="fa fa-edit" style="font-size:12px"></i></a>
																		<?php if ($data['username']!='admin'): ?>
																			<?php if ($data['active'] == '0'): ?>
																				<a href="<?=site_url('Man_user/user_unlock/'.$data['id'])?>" class="btn bg-navy btn-radius-sm" title="Aktifkan Pengguna"><i class="fa fa-lock" style="font-size:12px">&nbsp;</i></a>
																			<?php elseif ($data['active'] == '1'): ?>
																				<a href="<?=site_url('Man_user/user_lock/'.$data['id'])?>" class="btn bg-navy btn-radius-sm" title="Non Aktifkan Pengguna"><i class="fa fa-unlock" style="font-size:12px"></i></a>
																			<?php endif; ?>
																			<a href="#" data-href="<?=site_url("Man_user/delete/$p/$o/$data[id]")?>" class="btn bg-maroon btn-radius-sm"  title="Hapus" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-trash-o" style="font-size:12px"></i></a>
																		<?php endif; ?>
																	</td>
																	<td><?=$data['username']?></td>
																	<td><?=$data['nama']?></td>
																	<td><?=$data['grup']?></td>
																	<td><?=tgl_indo($data['last_login'])?></td>
																</tr>
															<?php endforeach; ?>
														</tbody>
													</table>
												</div>
											</div>
										</div>
									</form>
									<div class="row">
										<div class="col-sm-6">
											<div class="dataTables_length">
												<form id="paging" action="<?= site_url("man_user")?>" method="post" class="form-horizontal">
													<label>
														Tampilkan
														<select name="per_page" class="form-control input-sm" onchange="$('#paging').submit()">
															<option value="20" <?php selected($per_page,20); ?> >20</option>
															<option value="50" <?php selected($per_page,50); ?> >50</option>
															<option value="100" <?php selected($per_page,100); ?> >100</option>
														</select>
														Dari
														<strong><?= $paging->num_rows?></strong>
														Total Data
													</label>
												</form>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="dataTables_paginate paging_simple_numbers">
												<ul class="pagination">
													<?php if ($paging->start_link): ?>
														<li><a href="<?=site_url("man_user/index/$paging->start_link/$o")?>" aria-label="First"><span aria-hidden="true">Awal</span></a></li>
													<?php endif; ?>
													<?php if ($paging->prev): ?>
														<li><a href="<?=site_url("man_user/index/$paging->prev/$o")?>" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>
													<?php endif; ?>
													<?php for ($i=$paging->start_link;$i<=$paging->end_link;$i++): ?>
														<li><a href="<?= site_url("man_user/index/$cat/$i/$o")?>"><?= $i?></a></li>
													<?php endfor; ?>
													<?php if ($paging->next): ?>
														<li><a href="<?=site_url("man_user/index/$paging->next/$o")?>" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>
													<?php endif; ?>
													<?php if ($paging->end_link): ?>
														<li><a href="<?=site_url("man_user/index/$paging->end_link/$o")?>" aria-label="Last"><span aria-hidden="true">Akhir</span></a></li>
													<?php endif; ?>
												</ul>
											</div>
										</div>
									</div>
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
										<button type="button" class="btn btn-radius btn-uppercase btn-warning btn-sm" data-dismiss="modal"><i class='fa fa-sign-out'></i> Tutup</button>
										<a class='btn-ok'>
											<button type="button" class="btn btn-radius btn-uppercase btn-danger btn-sm" id="ok-delete"><i class='fa fa-trash-o'></i> Hapus</button>
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

