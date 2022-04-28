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
<style>
.input-sm
{
  padding: 4px 4px;
}
</style>
<div class="content-wrapper">
	<section class="content-header">
		<div class="title-header">Pengelompokan Rumah Tangga</div>
		<ol class="breadcrumb">
			<li><a href="<?=site_url('hom_sid')?>"><i class="fa fa-home"></i> Home</a></li>
			<li class="active">Daftar Rumah Tangga</li>
		</ol>
	</section>
	<section class="content" id="maincontent">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-info">
					<div class="box-header with-border">
            			<a href="<?= site_url('rtm/form_old')?>" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Tambah Data Rumah Tangga Per Penduduk" title="Tambah Dari Data Penduduk" class="btn btn-uppercase btn-radius btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" style="background-color: #00ca6d;">Tambah Rumah Tangga</a>
						<?php if ($grup==1): ?>
						  <a href="#confirm-delete" title="Hapus Data" onclick="deleteAllBox('mainform','<?= site_url("rtm/delete_all/$p/$o")?>')" class="btn btn-uppercase btn-radius btn-danger btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block hapus-terpilih">Hapus Data Terpilih</a>
						<?php endif; ?>
						<a href="<?= site_url("rtm/cetak/$o")?>" class="btn btn-uppercase btn-radius bg-purple btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" target="_blank">Cetak Data</a>
						<a href="<?= site_url("rtm/excel/$o")?>" class="btn btn-uppercase btn-radius bg-orange btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" target="_blank">Unduh Data</a>
					</div>
					<div class="box-body">
						<div class="row">
							<div class="col-sm-12">
								<div class="dataTables_wrapper form-inline dt-bootstrap no-footer">
									<form id="mainform" name="mainform" action="" method="post">
										<div class="row">
											<div class="col-sm-8">
												<select class="form-control input-sm " name="dusun" onchange="formAction('mainform','<?= site_url('rtm/dusun')?>')">
													<option value="">Pilih <?= ucwords($this->setting->sebutan_dusun)?></option>
													<?php foreach ($list_dusun AS $data): ?>
														<option value="<?= $data['dusun']?>" <?php if ($dusun == $data['dusun']): ?>selected<?php endif ?>><?= strtoupper(unpenetration(ununderscore($data['dusun'])))?></option>
													<?php endforeach; ?>
												</select>
												<?php if ($dusun): ?>
													<select class="form-control input-sm" name="rw" onchange="formAction('mainform','<?= site_url('rtm/rw')?>')" >
														<option value="">RW</option>
														<?php foreach ($list_rw AS $data): ?>
															<option value="<?= $data['rw']?>" <?php if ($rw == $data['rw']): ?>selected<?php endif ?>><?= $data['rw']?></option>
														<?php endforeach; ?>
													</select>
												<?php endif; ?>
												<?php if ($rw): ?>
													<select class="form-control input-sm" name="rt" onchange="formAction('mainform','<?= site_url('rtm/rt')?>')">
														<option value="">RT</option>
														<?php foreach ($list_rt AS $data): ?>
															<option value="<?= $data['rt']?>" <?php if ($rt == $data['rt']): ?>selected<?php endif ?>><?= $data['rt']?></option>
														<?php endforeach; ?>
													</select>
												<?php endif; ?>
											</div>
											<div class="col-sm-4">
												<div class="input-group input-group-sm pull-right">
													<input name="cari" id="cari" class="form-control" placeholder="Cari..." type="text" value="<?=html_escape($cari)?>" onkeypress="if (event.keyCode == 13){$('#'+'mainform').attr('action', '<?=site_url("rtm/search")?>');$('#'+'mainform').submit();}" style="border-top-right-radius:10px;border-bottom-right-radius:10px">
													<div class="input-group-btn">
														<button type="submit" class="btn btn-default" onclick="$('#'+'mainform').attr('action', '<?=site_url("rtm/search")?>');$('#'+'mainform').submit();" style="margin-left:5px;"><i class="fa fa-search"></i></button>
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-sm-12">
												<div class="table-responsive">
													<table class="table table-bordered table-striped dataTable table-hover nowrap">
														<thead class="bg-gray disabled color-palette">
															<tr>
																<th class="text-center"><input type="checkbox" id="checkall"/></th>
																<th class="text-center">No</th>
																<th >Aksi</th>
																<?php if ($o==2): ?>
								                                  <th><a href="<?= site_url("rtm/index/$p/1")?>">Nomor Rumah Tangga <i class='fa fa-sort-asc fa-sm'></i></a></th>
								                                 <?php elseif ($o==1): ?>
								                                  <th><a href="<?= site_url("rtm/index/$p/2")?>">Nomor Rumah Tangga <i class='fa fa-sort-desc fa-sm'></i></a></th>
								                                <?php else: ?>
								                                  <th><a href="<?= site_url("rtm/index/$p/1")?>">Nomor Rumah Tangga <i class='fa fa-sort fa-sm'></i></a></th>
								                                <?php endif; ?>
								                                <?php if ($o==4): ?>
								                                  <th nowrap><a href="<?= site_url("rtm/index/$p/3")?>">Kepala Rumah Tangga <i class='fa fa-sort-asc fa-sm'></i></a></th>
								                                <?php elseif ($o==3): ?>
								                                  <th nowrap><a href="<?= site_url("rtm/index/$p/4")?>">Kepala Rumah Tangga <i class='fa fa-sort-desc fa-sm'></i></a></th>
								                                <?php else: ?>
								                                  <th nowrap><a href="<?= site_url("rtm/index/$p/3")?>">Kepala Rumah Tangga <i class='fa fa-sort fa-sm'></i></a></th>
								                                <?php endif; ?>
																								<th>NIK</th>
								                                <th>Jumlah Anggota</th>
								                                <th>Alamat</th>
								                                <th><?= ucwords($this->setting->sebutan_dusun)?></th>
								                                <th>RW</th>
								                                <th>RT</th>
								                                <th nowrap>Tanggal Terdaftar</th>
															</tr>
														</thead>
														<tbody>
							                              <?php foreach ($main as $data): ?>
							                                <tr>
							                                  <td class="text-center"><input type="checkbox" name="id_cb[]" value="<?= $data['id']?>" /></td>
							                                  <td class="text-center"><?= $data['no']?></td>
							                                  <td nowrap>
							                                    <a href="<?= site_url("rtm/anggota/$p/$o/$data[id]")?>" class="btn bg-purple btn-radius-sm btn-sm"  title="Rincian Anggota Rumah Tangga"><i class="fa fa-list-ol"></i></a>
							                                    <a href="<?= site_url("rtm/ajax_add_anggota/$p/$o/$data[id]")?>" title="Tambah Anggota Rumah Tangga" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Tambah Anggota Rumah Tangga" class="btn btn-success btn-radius-sm btn-sm"><i class="fa fa-plus"></i></a>
							                                    <?php if ($grup==1): ?>
							                                      <a href="<?= site_url("rtm/edit_nokk/$p/$o/$data[id]")?>" title="Ubah Data" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Ubah Rumah Tangga" class="btn bg-orange btn-radius-sm btn-sm"><i class='fa fa-edit'></i></a>
							                                      <a href="#" data-href="<?= site_url("rtm/delete/$p/$o/$data[id]")?>" class="btn bg-maroon btn-radius-sm btn-sm"  title="Hapus Data" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-trash-o"></i></a>
							                                    <?php endif; ?>
							                                  </td>
							                                  <td>
							                                    <label> <?= $data['no_kk']?> </label>
							                                  </td>
							                                  <td nowrap width="40%"><?= strtoupper($data['kepala_kk'])?></td>
							                                  <td><?= strtoupper($data['nik'])?></td>
							                                  <td>
							                                    <a href="<?= site_url("rtm/anggota/$p/$o/$data[id]")?>"><?= $data['jumlah_anggota']?></a>
							                                  </td>
							                                  <td><?= strtoupper($data['alamat'])?></td>
							                                  <td><?= strtoupper(ununderscore($data['dusun']))?></td>
							                                  <td><?= strtoupper($data['rw'])?></td>
							                                  <td><?= strtoupper($data['rt'])?></td>
							                                  <td nowrap><?= tgl_indo($data['tgl_daftar'])?></td>
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
												<form id="paging" action="<?= site_url("rtm")?>" method="post" class="form-horizontal">
													<label>
														Tampilkan
														<select name="per_page" class="form-control input-sm" onchange="$('#paging').submit()">
															<option value="50" <?php selected($per_page,50); ?> >50</option>
															<option value="100" <?php selected($per_page,100); ?> >100</option>
															<option value="200" <?php selected($per_page,200); ?> >200</option>
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
					                            <li><a href="<?=site_url("rtm/index/$paging->start_link/$o")?>" aria-label="First"><span aria-hidden="true">Awal</span></a></li>
					                          <?php endif; ?>
					                          <?php if ($paging->prev): ?>
					                            <li><a href="<?=site_url("rtm/index/$paging->prev/$o")?>" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>
					                          <?php endif; ?>
					                          <?php for ($i=$paging->start_link;$i<=$paging->end_link;$i++): ?>
					               	            <li <?=jecho($p, $i, "class='active'")?>><a href="<?= site_url("rtm/index/$i/$o")?>"><?= $i?></a></li>
					                          <?php endfor; ?>
					                          <?php if ($paging->next): ?>
					                            <li><a href="<?=site_url("rtm/index/$paging->next/$o")?>" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>
					                          <?php endif; ?>
					                          <?php if ($paging->end_link): ?>
					                            <li><a href="<?=site_url("rtm/index/$paging->end_link/$o")?>" aria-label="Last"><span aria-hidden="true">Akhir</span></a></li>
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
										<button type="button" class="btn btn-radius-sm btn-warning btn-sm" data-dismiss="modal">Tutup</button>
										<a class='btn-ok'>
											<button type="button" class="btn btn-radius-sm btn-danger btn-sm" id="ok-delete">Hapus</button>
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
										Apakah Anda yakin ingin mengembalikan status data penduduk ini?
									</div>
									<div class='modal-footer'>
										<button type="button" class="btn btn-radius-sm btn-danger btn-sm" data-dismiss="modal">Tutup</button>
										<a class='btn-ok'>
											<button type="button" class="btn btn-radius-sm btn-info btn-sm" id="ok-status">Ya</button>
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

