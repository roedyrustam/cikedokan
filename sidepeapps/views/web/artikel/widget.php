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
		<div class="title-header">Pengaturan Widget</div>
		<ol class="breadcrumb">
			<li><a href="<?=site_url('hom_sid')?>"><i class="fa fa-home"></i> Home</a></li>
			<li class="active">Pengaturan Widget</li>
		</ol>
	</section>
	<section class="content" id="maincontent">
		<form id="mainform" name="mainform" action="" method="post">
			<div class="row">
				<div class="col-md-12">
					<div class="box box-info">
            			<div class="box-header with-border">
							<a href="<?=site_url("web_widget/form")?>" class="btn btn-radius btn-uppercase btn-success btn-sm btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"  title="Tambah Artikel">Tambah Widget</a>
							<?php if ($_SESSION['grup']<4): ?>
								<a href="#confirm-delete" title="Hapus Data" onclick="deleteAllBox('mainform', '<?=site_url("web_widget/delete_all/$p/$o")?>')" class="btn btn-radius btn-uppercase btn-danger btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block hapus-terpilih">Hapus Data Terpilih</a>
							<?php endif; ?>
						</div>
						<div class="box-body">
							<div class="row">
								<div class="col-sm-12">
									<div class="dataTables_wrapper form-inline dt-bootstrap no-footer">
										<form id="mainform" name="mainform" action="" method="post">
											<div class="row">
												<div class="col-sm-6">
													<select class="form-control input-sm " name="filter" onchange="formAction('mainform', '<?=site_url('web_widget/filter')?>')">
														<option value="">Semua</option>
														<option value="1" <?php if ($filter==1): ?>selected<?php endif ?>>Aktif</option>
														<option value="2" <?php if ($filter==2): ?>selected<?php endif ?>>Tidak Aktif</option>
													</select>
												</div>
												<div class="col-sm-6">
													<div class="box-tools">
														<div class="input-group input-group-sm pull-right">
															<input name="cari" id="cari" class="form-control" placeholder="Cari..." type="text" value="<?=html_escape($cari)?>" onkeypress="if (event.keyCode == 13):$('#'+'mainform').attr('action', '<?=site_url('web_widget/search')?>');$('#'+'mainform').submit();endif">
															<div class="input-group-btn">
																<button type="submit" class="btn btn-default" onclick="$('#'+'mainform').attr('action', '<?=site_url("web_widget/search")?>');$('#'+'mainform').submit();"><i class="fa fa-search"></i></button>
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
																	<th class="text-center"><input type="checkbox" id="checkall"/></th>
																	<th class="text-center">No</th>
																	<th class="text-center" width="20%">Aksi</th>
																	<th class="text-center" nowrap>Judul</th>
																	<th class="text-center" width="10%" nowrap>Jenis Widget</th>
																	<th class="text-center" width="5%">Aktif</th>
																	<th class="text-center">Isi</th>
																	<th class="text-center">Icon</th>
																	<th class="text-center">Warna Header</th>
																</tr>
															</thead>
															<tbody>
																<?php foreach ($main as $data): ?>
																	<tr <?php if ($data['jenis_widget']!=1): ?>style='background-color:#f8deb5 !important;'<?php endif; ?>>
																		<td class="text-center"><input type="checkbox" name="id_cb[]" value="<?=$data['id']?>" /></td>
																		<td class="text-center"><?=$data['no']?></td>
																		<td nowrap>
									                                    	<a href="<?=site_url("web_widget/urut/$data[id]/1")?>" class="btn bg-olive btn-radius-sm btn-sm"  title="Pindah Posisi Ke Bawah"><i class="fa fa-arrow-down"></i></a>
									                                      	<a href="<?=site_url("web_widget/urut/$data[id]/2")?>" class="btn bg-olive btn-radius-sm btn-sm"  title="Pindah Posisi Ke Atas"><i class="fa fa-arrow-up"></i></a>
									                                    <?php if ($data['jenis_widget']!=1): ?>
									                                        <a href="<?=site_url("web_widget/form/$p/$o/$data[id]")?>" class="btn bg-orange btn-radius-sm btn-sm"  title="Ubah"><i class="fa fa-edit"></i></a>
																		<?php endif; ?>
									                                    <?php if ($data['form_admin']): ?>
									                                        <a href="<?=site_url("$data[form_admin]")?>" class="btn btn-info btn-radius-sm btn-sm"  title="Form Admin"><i class="fa fa-sliders"></i></a>
									                                    <?php endif; ?>
									                                    <?php if ($_SESSION['grup']<4): ?>
									                                        <?php if ($data['enabled'] == '2'): ?>
									                                        	<a href="<?=site_url("web_widget/lock/$data[id]")?>" class="btn bg-navy btn-radius-sm btn-sm"  title="Aktifkan Widget"><i class="fa fa-lock">&nbsp;</i></a>
									                                        <?php elseif ($data['enabled'] == '1'): ?>
									                                        	<a href="<?=site_url("web_widget/unlock/$data[id]")?>" class="btn bg-navy btn-radius-sm btn-sm"  title="Non Aktifkan Widget"><i class="fa fa-unlock"></i></a>
																			<?php endif; ?>
									                                        <?php if ($data['jenis_widget']!=1): ?>
									                                        	<a href="#" data-href="<?=site_url("web_widget/delete/$p/$o/$data[id]")?>" class="btn bg-maroon btn-radius-sm btn-sm"  title="Hapus" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-trash-o"></i></a>
									                                        <?php endif; ?>
									                                    <?php endif; ?>
									                                    </td>
									                                    <td><?=$data['judul']?></td>
									                                    <td>
									                                    <?php if ($data['jenis_widget'] == 1): ?>
									                                        Sistem
									                                    <?php elseif ($data['jenis_widget'] == 2): ?>
									                                        Statis
									                                    <?php else: ?>
									                                        Dinamis
									                                    <?php endif ?>
									                                    </td>
									                                    <td class="text-center"><?=$data['aktif']?></td>
									                                    <td><?=$data['isi']?></td>
																		<td class="text-center"><i class="fa <?=$data['favicon']?>"></i></td>
																		<td class="text-center"><div style="background-color:<?= $data['warna_header']?>">&nbsp;<div></td>
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
					                          <form id="paging" action="<?= site_url("web_widget/pager")?>" method="post" class="form-horizontal">
					                            <label>
					                              Tampilkan
					                              <select name="per_page" class="form-control input-sm" onchange="$('#paging').submit()">
					                                <option value="20" <?php selected($per_page, 20); ?> >20</option>
					                                <option value="50" <?php selected($per_page, 50); ?> >50</option>
					                                <option value="100" <?php selected($per_page, 100); ?> >100</option>
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
					                              <li><a href="<?=site_url("web_widget/index/$paging->start_link/$o")?>" aria-label="First"><span aria-hidden="true">Awal</span></a></li>
					                            <?php endif; ?>
					                            <?php if ($paging->prev): ?>
					                              <li><a href="<?=site_url("web_widget/index//$paging->prev/$o")?>" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>
					                            <?php endif; ?>
					                            <?php for ($i=$paging->start_link;$i<=$paging->end_link;$i++): ?>
					                              <li <?=jecho($p, $i, "class='active'")?>><a href="<?= site_url("web_widget/index/$i/$o")?>"><?= $i?></a></li>
					                            <?php endfor; ?>
					                            <?php if ($paging->next): ?>
					                              <li><a href="<?=site_url("web_widget/index/$paging->next/$o")?>" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>
					                            <?php endif; ?>
					                            <?php if ($paging->end_link): ?>
					                              <li><a href="<?=site_url("web_widget/index/$paging->end_link/$o")?>" aria-label="Last"><span aria-hidden="true">Akhir</span></a></li>
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
										<div class='modal-body btn-danger'>
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
						</div>
					</div>
				</div>
			</div>
		</form>
	</section>
</div>

