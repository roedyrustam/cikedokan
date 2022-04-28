<div class="content-wrapper" style="min-height: 598px;">
	<section class="content-header">
		<h1>Lapak Desa</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url(); ?>hom_sid"><i class="fa fa-home"></i> Home</a></li>
			<li class="active">Lapak Desa</li>
		</ol>
	</section>
	<section class="content" id="maincontent">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-info">
					<div class="box-body">
						<div class="col-sm-12">
							<div class="dataTables_wrapper form-inline dt-bootstrap no-footer">
								<form id="mainform" name="mainform" action="" method="post">
									<div class="row">
										<div class="col-sm-9">
											<div class="row">
												<select class="form-control input-sm" name="kategori_barang" onchange="formAction('mainform', '<?php echo base_url(); ?>lapak_sid/filter')">
													<option value="">Semua Barang</option>

													<?php foreach ($kategori_barang as $item): ?>
														<option value="<?php echo($item['id']); ?>" <?php if ($item['id'] == $_SESSION['lapak_kategori']) { echo " selected";} ?>>
																<?php echo($item['nama']); ?>
														</option>
													<?php endforeach ?>
												</select>
												<select class="form-control input-sm" name="status_barang" onchange="formAction('mainform', '<?php echo base_url(); ?>lapak_sid/filter')">
													<option value="">Semua Status</option>
													<option value="1" <?php if (1 == $_SESSION['lapak_status']) { echo " selected";} ?>>Pending</option>
													<option value="2" <?php if (2 == $_SESSION['lapak_status']) { echo " selected";} ?>>Publik</option>
													<option value="3" <?php if (!empty($_SESSION['lapak_status']) && 1 != $_SESSION['lapak_status'] && 2 != $_SESSION['lapak_status']) { echo " selected";} ?>>Ditolak</option>
												</select>
												<select class="form-control input-sm " name="dusun" onchange="formAction('mainform','<?php echo base_url(); ?>/keluarga/dusun')">
													<option value="">Pilih Dusun</option>
													<option value="1">1</option>
													<option value="2">2</option>
													<option value="3">3</option>
													<option value="4">4</option>
													<option value="5">5</option>
													<option value="6">6</option>
												</select>
											</div>
										</div>
										<div class="col-sm-3">
											<div class="row">
												<div class="input-group input-group-sm pull-right">
													<input name="cari" id="cari" class="form-control ui-autocomplete-input" placeholder="Cari..." type="text" value="" onkeypress="if (event.keyCode == 13){$('#'+'mainform').attr('action', '<?php echo base_url(); ?>keluarga/search');$('#'+'mainform').submit();}" autocomplete="off">
													<div class="input-group-btn">
														<button type="submit" class="btn btn-default" onclick="$('#'+'mainform').attr('action', '<?php echo base_url(); ?>keluarga/search');$('#'+'mainform').submit();"><i class="fa fa-search"></i>
														</button>
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
																<th class="text-center" width="2%"><input type="checkbox" id="checkall"></th>
																<th class="text-center" width="2%">No</th>
																<th>Aksi</th>
																<th>Foto</th>
																<th>Waktu</th>
																<th>Nama</th>
																<th>Kategori</th>
																<th class="text-center">Status</th>
															</tr>
														</thead>
														<tbody>

															<?php $urut = 0; ?>

															<?php foreach ($barang as $item): ?>
																<tr>
																	<td class="text-center" width="2%">
																		<input type="checkbox" name="id_cb[]" value="529">
																	</td>
																	<td class="text-center" width="2%"><?php echo intval($urut -=- 1); ?></td>
																	<td nowrap="">
																		<?php if ($item['status'] != 2): ?>
																			<a href="<?php echo base_url('lapak_sid/tampilkan/'.$item['id']); ?>" class="btn bg-green">
																				<i class="fa fa-eye"></i>
																			</a>
																		<?php endif ?>
																		<?php if ($item['status'] == 1 || $item['status'] == 2): ?>
																			<a href="<?php echo base_url('lapak_sid/sembunyikan/'.$item['id']); ?>" class="btn bg-orange">
																				<i class="fa fa-eye-slash"></i>
																			</a>
																		<?php endif ?>
																		 <a href="<?php echo base_url('lapak_sid/hapus/'.$item['id']); ?>" class="btn bg-red">
																				<i class="fa fa-trash"></i>
																			</a>
																	</td>
																	<td nowrap="" class="text-center">
																		<div class="user-panel">
																			<div class="image2">
																				<img src="<?php echo base_url(); ?>assets/files/user_pict/kuser.png" class="img-circle" alt="Foto Kepala Keluarga">
																			</div>
																		</div>
																	</td>
																	<td><?php echo tgl_indo2 ($item['ditambahkan_pada']); ?></td>
																	<td>
																		<?php echo $item['nama']; ?>
																	</td>
																	<td>
																		<?php echo $item['kategori']['nama']; ?>
																	</td>
																	<td class="text-center">
																		<?php if ($item['status'] == 1): ?>
																			<span class="fa fa-times-circle" style="color:orange;font-size:13px"></span>
																		<?php elseif ($item['status'] == 2): ?>
																			<span class="fa fa-check" style="color:green;font-size:13px"></span>
																		<?php else: ?>
																			<span class="fa fa-ban" style="color:red;font-size:13px"></span>
																		<?php endif ?>
																	</td>
																</tr>

															<?php endforeach ?>

														</tbody>
														</table>
													</div>
												</div>
											</div>
										</div>
									</form>
									<div class="row">
										<div class="col-sm-6">
											<div class="dataTables_length">
												<form id="paging" action="<?php echo base_url(); ?>keluarga" method="post" class="form-horizontal">
													<label>
														Tampilkan
														<select name="per_page" class="form-control input-sm" onchange="$('#paging').submit()">
															<option value="50" selected="selected">50</option>
															<option value="100">100</option>
															<option value="200">200</option>
														</select>
														Dari
														<strong>218</strong>
														Total Data
													</label>
												</form>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="dataTables_paginate paging_simple_numbers">
												<ul class="pagination">
													<li><a href="<?php echo base_url(); ?>keluarga/index/1/0" aria-label="First"><span aria-hidden="true">Awal</span></a></li>
													<li class="active"><a href="<?php echo base_url(); ?>keluarga/index/1/0">1</a></li>
                                                     <li><a href="<?php echo base_url(); ?>keluarga/index/2/0">2</a>
                                                    </li>
                                         	        <li><a href="<?php echo base_url(); ?>keluarga/index/3/0">3</a>
                                         	        </li>
                                         	        <li>
                                         	        	<a href="<?php echo base_url(); ?>keluarga/index/4/0">4</a>
                                         	        </li>
                                         	        <li>
                                         	        	<a href="<?php echo base_url(); ?>keluarga/index/5/0">5</a>
                                         	       	</li>
                                         	        <li>
                                         	        	<a href="<?php echo base_url(); ?>keluarga/index/2/0" aria-label="Next"><span aria-hidden="true">»</span></a></li>
                                         	        <li>
                                         	        	<a href="<?php echo base_url(); ?>keluarga/index/5/0" aria-label="Last"><span aria-hidden="true">Akhir</span></a>
                                         	        </li>
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
	</section>
</div>