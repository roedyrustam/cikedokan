<style type="text/css">
	.nowrap { white-space: nowrap; }
</style>
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
		<div class="title-header">Klasifikasi Surat</div>
		<ol class="breadcrumb">
			<li><a href="<?= site_url('hom_sid')?>"><i class="fa fa-home"></i> Home</a></li>
			<li class="active">Klasifikasi Surat</li>
		</ol>
	</section>
	<section class="content" id="maincontent">
		<form id="mainform" name="mainform" action="" method="post">
			<div class="row">
				<div class="<?php if ($this->modul_ini <> 15): ?>col-md-9<?php else: ?>col-md-12<?php endif; ?>">
					<div class="box box-info">
            			<div class="box-header with-border">
							<?php if ($_SESSION['grup'] == '1'): ?>
								<a href="<?= site_url("{$this->controller}/form")?>" class="btn btn-radius btn-uppercase btn-success btn-sm btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"  title="Tambah Klasifikasi Baru">Tambah Klasifikasi Baru</a>
								<a href="#confirm-delete" title="Hapus Data" onclick="deleteAllBox('mainform', '<?= site_url("{$this->controller}/delete_all/$p/$o")?>')" class="btn btn-radius btn-uppercase btn-danger btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block hapus-terpilih">Hapus Data Terpilih</a>
								<a href="<?= site_url("{$this->controller}/impor")?>" class="btn btn-radius btn-uppercase bg-black btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Impor Klasifikasi" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Impor Klasifikasi">Impor</a>
								<a href="<?= site_url("{$this->controller}/ekspor")?>" class="btn btn-radius btn-uppercase bg-purple btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Ekspor Klasifikasi">Unduh</a>
							<?php endif; ?>
						</div>
						<div class="box-body">
							<div class="row">
								<div class="col-sm-12">
									<div class="dataTables_wrapper form-inline dt-bootstrap no-footer">
										<form id="mainform" name="mainform" action="" method="post">
											<input name="kategori" type="hidden" value="<?= $kat?>">
											<div class="row">
												<div class="col-sm-6">
													<select class="form-control input-sm " name="filter" onchange="formAction('mainform','<?= site_url($this->controller.'/filter')?>')">
														<option value="">Semua</option>
														<option value="1" <?php selected($filter, "1") ?>>Aktif</option>
														<option value="0" <?php selected($filter, "0") ?>>Tidak Aktif</option>
													</select>
												</div>
												<div class="col-sm-6">
													<div class="box-tools">
														<div class="input-group input-group-sm pull-right">
															<input name="cari" id="cari" class="form-control" placeholder="Cari..." type="text" value="<?=html_escape($cari)?>" onkeypress="if (event.keyCode == 13){$('#'+'mainform').attr('action', '<?= site_url("{$this->controller}/search")?>');$('#'+'mainform').submit();}">
															<div class="input-group-btn">
																<button type="submit" class="btn btn-default" onclick="$('#'+'mainform').attr('action', '<?= site_url("{$this->controller}/search")?>');$('#'+'mainform').submit();"><i class="fa fa-search"></i></button>
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
																	<th><input type="checkbox" id="checkall"/></th>
																	<th>No</th>
																	<th>Aksi</th>
																	<?php if ($o==2): ?>
								                                    <th class="nowrap"><a href="<?= site_url("{$this->controller}/index/$p/1")?>">Kode <i class='fa fa-sort-asc fa-sm'></i></a></th>
								                                  <?php elseif ($o==1): ?>
								                                    <th class="nowrap"><a href="<?= site_url("{$this->controller}/index/$p/2")?>">Kode <i class='fa fa-sort-desc fa-sm'></i></a></th>
								                                  <?php else: ?>
								                                    <th class="nowrap"><a href="<?= site_url("{$this->controller}/index/$p/1")?>">Kode <i class='fa fa-sort fa-sm'></i></a></th>
								                                  <?php endif; ?>
																									<?php if ($o==4): ?>
								                                    <th><a href="<?= site_url("{$this->controller}/index/$p/3")?>">Nama <i class='fa fa-sort-asc fa-sm'></i></a></th>
								                                  <?php elseif ($o==3): ?>
								                                    <th><a href="<?= site_url("{$this->controller}/index/$p/4")?>">Nama <i class='fa fa-sort-desc fa-sm'></i></a></th>
								                                  <?php else: ?>
								                                    <th><a href="<?= site_url("{$this->controller}/index/$p/3")?>">Nama <i class='fa fa-sort fa-sm'></i></a></th>
								                                  <?php endif; ?>
								                                  <th>Keterangan</th>
																</tr>
															</thead>
															<tbody>
																<?php foreach ($main as $data): ?>
																	<tr>
																		<td><input type="checkbox" name="id_cb[]" value="<?=$data['id']?>" /></td>
																		<td><?=$data['no']?></td>
																		<td class='nowrap'>
																			<?php if ($_SESSION['grup'] == '1'): ?>
																				<a href="<?= site_url("{$this->controller}/form/$p/$o/$data[id]")?>" class="btn btn-warning btn-radius-sm btn-sm"  title="Ubah"><i class="fa fa-edit"></i></a>
																			<?php endif; ?>
																			<?php if ($data['enabled'] == '1'): ?>
																				<a href="<?= site_url("{$this->controller}/lock/$p/$o/$data[id]")?>" class="btn bg-navy btn-radius-sm btn-sm"  title="Non Aktifkan"><i class="fa fa-unlock">&nbsp;</i></a>
																			<?php else: ?>
																				<a href="<?= site_url("{$this->controller}/unlock/$p/$o/$data[id]")?>" class="btn bg-navy btn-radius-sm btn-sm"  title="Aktifkan"><i class="fa fa-lock"></i></a>
                                      										<?php endif ?>
																			<?php if ($_SESSION['grup'] == '1'): ?>
																				<a href="#" data-href="<?= site_url("{$this->controller}/delete/$p/$o/$data[id]")?>" class="btn bg-maroon btn-radius-sm btn-sm"  title="Hapus" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-trash-o"></i></a>
																			<?php endif; ?>
																	  </td>
																	  <td><?= $data['kode']?></td>
																		<td width="30%"><?= $data['nama']?></td>
																		<td><?= $data['uraian']?></td>
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
					                          <form id="paging" action="<?= site_url($this->controller.'/')?>" method="post" class="form-horizontal">
					                            <label>
					                              Tampilkan
					                              <select name="per_page" class="form-control input-sm" onchange="$('#paging').submit()">
					                                <option value="50" <?php selected($per_page, 50); ?> >50</option>
					                                <option value="100" <?php selected($per_page, 100); ?> >100</option>
					                                <option value="200" <?php selected($per_page, 200); ?> >200</option>
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
					                              <li><a href="<?= site_url("{$this->controller}/index/$paging->start_link/$o")?>" aria-label="First"><span aria-hidden="true">Awal</span></a></li>
					                            <?php endif; ?>
					                            <?php if ($paging->prev): ?>
					                              <li><a href="<?= site_url("{$this->controller}/index/$paging->prev/$o")?>" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>
					                            <?php endif; ?>
					                            <?php for ($i=$paging->start_link;$i<=$paging->end_link;$i++): ?>
					                              <li <?=jecho($p, $i, "class='active'")?>><a href="<?= site_url("{$this->controller}/index/$i/$o")?>"><?= $i?></a></li>
					                            <?php endfor; ?>
					                            <?php if ($paging->next): ?>
					                              <li><a href="<?= site_url("{$this->controller}/index/$paging->next/$o")?>" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>
					                            <?php endif; ?>
					                            <?php if ($paging->end_link): ?>
					                              <li><a href="<?= site_url("{$this->controller}/index/$paging->end_link/$o")?>" aria-label="Last"><span aria-hidden="true">Akhir</span></a></li>
					                            <?php endif; ?>
					                          </ul>
					                        </div>
					                      </div>
					                    </div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
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
	</section>
</div>

