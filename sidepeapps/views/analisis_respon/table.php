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
<?php
	$subjek = $_SESSION['subjek_tipe'];
	switch ($subjek):
		case 1: $sql = $nama="Nama"; $nomor="NIK";$asubjek="Penduduk"; break;
		case 2: $sql = $nama="Kepala Keluarga"; $nomor="Nomor KK";$asubjek="Keluarga"; break;
		case 3: $sql = $nama="Kepala Rumah Tangga"; $nomor="Nomor Rumah Tangga";$asubjek="Rumah Tangga"; break;
		case 4: $sql = $nama="Nama Kelompok"; $nomor="ID Kelompok";$asubjek="Kelompok"; break;
		default: return null;
	endswitch;
?>
<div class="content-wrapper">
	<section class="content-header">
		<h1>Data Sensus - <?= $analisis_master['nama']?></h1>
		<ol class="breadcrumb">
			<li><a href="<?= site_url('hom_sid')?>"><i class="fa fa-home"></i> Home</a></li>
			<li><a href="<?= site_url('analisis_master')?>"> Master Analisis</a></li>
			<li><a href="<?= site_url()?>analisis_respon/leave"><?= $analisis_master['nama']?></a></li>
			<li class="active">Data Sensus</li>
		</ol>
	</section>
	</section>
	<section class="content" id="maincontent">
		<div class="row">
			<div class="col-md-4 col-lg-3">
				<?php $this->load->view('analisis_master/left',$data);?>
			</div>
			<div class="col-md-8 col-lg-9">
				<div class="box box-info">
          <div class="box-header with-border">
						<a href="<?= site_url("analisis_respon/data_ajax")?>" class="btn btn-social btn-flat bg-purple btn-sm btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Unduh data respon" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Unduh Data Respon">
							<i class="fa fa-download"></i>Unduh
          	</a>
					  <a href="<?= site_url("analisis_respon/import")?>" class="btn btn-social btn-flat bg-navy btn-sm btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Impor Data Respon" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Impor Data Respon">
							<i class="fa fa-upload"></i>Impor
						</a>
						<?php if ($analisis_master['format_impor'] == 1): ?>
							<a href="<?= site_url("analisis_respon/form_impor_bdt")?>" class="btn btn-social btn-flat bg-olive btn-sm btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Impor Data BDT 2015" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Impor Data BDT 2015">
								<i class="fa fa-upload"></i>Impor BDT 2015
							</a>
						<?php endif; ?>
						<a href="<?= site_url()?>analisis_respon/leave" class="btn btn-social btn-flat btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left "></i> Kembali Ke <?= $analisis_master['nama']?></a>
					</div>
					<div class="box-header with-border">
						<div class="table-responsive">
							<table class="table table-bordered table-striped table-hover" >
								<tr>
									<td width="220" class="uppercase">Nama Analisis</td>
									<td width="1">:</td>
									<td class="uppercase"><a href="<?= site_url()?>analisis_master/menu/<?= $_SESSION['analisis_master']?>"><?= $analisis_master['nama']?></a></td>
								</tr>
								<tr>
									<td width="220" class="uppercase">Subjek Analisis</td>
									<td>:</td>
									<td class="uppercase"><?= $asubjek?></td>
								</tr>
								<tr>
									<td width="220" class="uppercase">Petugas/Kelompok Sensus</td>
									<td width="1">:</td>
									<td class="uppercase"><?= $analisis_master['petugas']?></td>
								</tr>
								<tr>
									<td width="220" class="uppercase">Periode</td>
									<td>:</td>
									<td class="uppercase"><?= $analisis_periode?></td>
								</tr>
							</table>
						</div>
					</div>
					<div class="box-body">
						<div class="row">
							<div class="col-sm-12">
								<div class="dataTables_wrapper form-inline dt-bootstrap no-footer">
									<form id="mainform" name="mainform" action="" method="post">

										<div class="row">
											<div class="col-sm-8">
												<select class="form-control input-sm " name="dusun" onchange="formAction('mainform','<?= site_url('analisis_respon/dusun')?>')">
													<option value="">Pilih <?= ucwords($this->setting->sebutan_dusun)?></option>
													<?php foreach ($list_dusun AS $data): ?>
														<option value="<?= $data['dusun']?>" <?php if ($dusun == $data['dusun']): ?>selected<?php endif ?>><?= strtoupper(unpenetration(ununderscore($data['dusun'])))?></option>
													<?php endforeach;?>
												</select>
												<?php if ($dusun): ?>
													<select class="form-control input-sm" name="rw" onchange="formAction('mainform','<?= site_url('analisis_respon/rw')?>')" >
														<option value="">RW</option>
														<?php foreach ($list_rw AS $data): ?>
															<option value="<?= $data['rw']?>" <?php if ($rw == $data['rw']): ?>selected<?php endif ?>><?= $data['rw']?></option>
														<?php endforeach;?>
													</select>
												<?php endif; ?>
												<?php if ($rw): ?>
													<select class="form-control input-sm" name="rt" onchange="formAction('mainform','<?= site_url('analisis_respon/rt')?>')">
														<option value="">RT</option>
														<?php foreach ($list_rt AS $data): ?>
															<option value="<?= $data['rt']?>" <?php if ($rt == $data['rt']): ?>selected<?php endif ?>><?= $data['rt']?></option>
														<?php endforeach;?>
													</select>
												<?php endif; ?>
												<select class="form-control input-sm" name="isi" onchange="formAction('mainform', '<?= site_url('analisis_respon/isi')?>')">
													<option value=""> --- Semua --- </option>
													<option value="1" <?php if ($isi == 1): ?>selected<?php endif ?>>Sudah Terinput</option>
													<option value="2" <?php if ($isi == 2): ?>selected<?php endif ?>>Belum Terinput</option>
												</select>
											</div>
											<div class="col-sm-4">
												<div class="input-group input-group-sm pull-right">
													<input name="cari" id="cari" class="form-control" placeholder="Cari..." type="text" value="<?=html_escape($cari)?>" onkeypress="if (event.keyCode == 13):$('#'+'mainform').attr('action', '<?= site_url("analisis_respon/search")?>');$('#'+'mainform').submit();endif">
													<div class="input-group-btn">
														<button type="submit" class="btn btn-default" onclick="$('#'+'mainform').attr('action', '<?= site_url("analisis_respon/search")?>');$('#'+'mainform').submit();"><i class="fa fa-search"></i></button>
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
																<th width="2%" class="text-center uppercase">No</th>
																<th width="3%" class="text-center uppercase">Aksi</th>
																<?php if ($o==2): ?>
																	<th class="text-center uppercase" width="10%"><a href="<?= site_url("analisis_respon/index/$p/1")?>"><?= $nomor?> <i class='fa fa-sort-asc fa-sm'></i></a></th>
																<?php elseif ($o==1): ?>
																	<th class="text-center uppercase" width="10%"><a href="<?= site_url("analisis_respon/index/$p/2")?>"><?= $nomor?> <i class='fa fa-sort-desc fa-sm'></i></a></th>
																<?php else: ?>
																	<th class="text-center uppercase" width="10%"><a href="<?= site_url("analisis_respon/index/$p/1")?>"><?= $nomor?> <i class='fa fa-sort fa-sm'></i></a></th>
																<?php endif; ?>
																<?php if ($o==4): ?>
																	<th class="text-center uppercase"><a href="<?= site_url("analisis_respon/index/$p/3")?>"><?= $nama?> <i class='fa fa-sort-asc fa-sm'></i></a></th>
																<?php elseif ($o==3): ?>
																	<th class="text-center uppercase"><a href="<?= site_url("analisis_respon/index/$p/4")?>"><?= $nama?> <i class='fa fa-sort-desc fa-sm'></i></a></th>
																<?php else: ?>
																	<th class="text-center uppercase"><a href="<?= site_url("analisis_respon/index/$p/3")?>"><?= $nama?> <i class='fa fa-sort fa-sm'></i></a></th>
																<?php endif; ?>
																<th class="text-center uppercase" width="3%">L/P</th>
																<th class="text-center uppercase">Dusun</th>
																<th class="text-center uppercase">RW</th>
																<th class="text-center uppercase">RT</th>
																<th width="2%" class="text-center uppercase">Status</th>
															</tr>
														</thead>
														<tbody>
															<?php foreach ($main as $data): ?>
																<tr>
																	<td class="text-center"><input type="checkbox" name="id_cb[]" value="<?= $data['id']?>" /></td>
																	<td class="text-center"><?= $data['no']?></td>
																	<td nowrap class="text-center">
																		<a href="<?= site_url("analisis_respon/kuisioner/$p/$o/$data[id]")?>" class="btn bg-purple btn-flat btn-sm"  title="Input Data"><i class='fa fa-check-square-o'></i></a>
																		<?php if ($data['bukti_pengesahan']): ?>
																			<a href="<?= base_url(LOKASI_PENGESAHAN.$data['bukti_pengesahan'])?>" class="btn bg-olive btn-flat btn-sm"  title="Unduh Bukti Pengesahan" target="_blank"><i class="fa fa-paperclip"></i></a>
																		<?php endif; ?>
																	</td>
																	<td><?= $data['nid']?></td>
																	<td nowrap><?= $data['nama']?></td>
																	<td class="text-center"><?= $data['jk']?></td>
																	<td><?= $data['dusun']?></td>
																	<td class="text-center"><?= $data['rw']?></td>
																	<td class="text-center"><?= $data['rt']?></td>
																	<td class="text-center"><?= $data['set']?></td>
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
												<form id="paging" action="<?= site_url("analisis_respon")?>" method="post" class="form-horizontal">
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
														<li><a href="<?= site_url("analisis_respon/index/$paging->start_link/$o")?>" aria-label="First"><span aria-hidden="true">Awal</span></a></li>
													<?php endif; ?>
													<?php if ($paging->prev): ?>
														<li><a href="<?= site_url("analisis_respon/index/$paging->prev/$o")?>" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>
													<?php endif; ?>
													<?php for ($i=$paging->start_link;$i<=$paging->end_link;$i++): ?>
														<li <?=jecho($p, $i, "class='active'")?>><a href="<?= site_url("analisis_respon/index/$i/$o")?>"><?= $i?></a></li>
													<?php endfor; ?>
													<?php if ($paging->next): ?>
														<li><a href="<?= site_url("analisis_respon/index/$paging->next/$o")?>" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>
													<?php endif; ?>
													<?php if ($paging->end_link): ?>
														<li><a href="<?= site_url("analisis_respon/index/$paging->end_link/$o")?>" aria-label="Last"><span aria-hidden="true">Akhir</span></a></li>
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
										Apakah Anda yakin ingin mengembalikan status data penduduk ini?
									</div>
									<div class='modal-footer'>
										<button type="button" class="btn btn-social btn-flat btn-danger btn-sm" data-dismiss="modal"><i class='fa fa-sign-out'></i> Tutup</button>
										<a class='btn-ok'>
											<button type="button" class="btn btn-social btn-flat btn-info btn-sm" id="ok-status"><i class='fa fa-check'></i> Ya</button>
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

