<div class="content-wrapper">
	<section class="content-header">
		<div class="title-header">Pengaturan Sub Menu Statis</div>
		<ol class="breadcrumb">
			<li><a href="<?= site_url('hom_sid')?>"><i class="fa fa-home"></i> Home</a></li>
			<li><a href="<?= site_url('menu')?>"><i class="fa fa-dashboard"></i> Daftar Menu</a></li>
			<li class="active">Pengaturan Sub Menu Statis</li>
		</ol>
	</section>
	<section class="content" id="maincontent">
		<form id="mainform" name="mainform" action="" method="post">
			<div class="row">
				<div class="col-md-3">
					<?php $this->load->view('kategori/menu_kiri.php')?>
				</div>
				<div class="col-md-9">
					<div class="box box-info">
						<div class="box-header with-border">
							<a href="<?= site_url("menu/ajax_add_sub_menu/$tip/$menu")?>" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Tambah Sub Menu"  class="btn btn-radius btn-uppercase btn-success btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block">Tambah Sub Menu</a>
							<a href="#confirm-delete" title="Hapus Data" onclick="deleteAllBox('mainform', '<?=site_url("menu/delete_all_sub_menu/$tip/$menu")?>')" class="btn btn-radius btn-uppercase btn-danger btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block hapus-terpilih">Hapus Data Terpilih</a>
							<a href="<?= site_url("menu")?>" class="btn btn-radius btn-uppercase btn-info btn-sm btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"  title="Tambah Artikel">Kembali ke Daftar Menu</a>
						</div>
						<div class="box-body">
							<div class="row">
								<div class="col-sm-12">
									<div class="dataTables_wrapper form-inline dt-bootstrap no-footer">
										<form id="mainform" name="mainform" action="" method="post">
											<div class="row">
												<div class="col-sm-12">
													<div class="table-responsive">
														<table class="table table-bordered table-striped dataTable table-hover">
															<thead class="bg-gray disabled color-palette">
																<tr>
																	<th class="text-center"><input type="checkbox" id="checkall"/></th>
																	<th class="text-center">No</th>
																	<th class="text-center">Aksi</th>
																	<th>Nama Sub Menu</th>
																	<th>Aktif</th>
																	<th>Link</th>
																	<th>Jenis Link</th>
																</tr>
															</thead>
															<tbody>
																<?php foreach ($submenu as $data): ?>
																	<tr>
																		<td class="text-center"><input type="checkbox" name="id_cb[]" value="<?=$data['id']?>" /></td>
																		<td class="text-center"><?=$data['no']?></td>
																		<td nowrap>
																			<?php if ($_SESSION['grup']==1): ?>
																				<a href="<?= site_url("menu/urut/$tip/$data[id]/1/$menu")?>" class="btn bg-olive btn-radius-sm btn-sm"  title="Pindah Posisi Ke Bawah"><i class="fa fa-arrow-down"></i></a>
																				<a href="<?= site_url("menu/urut/$tip/$data[id]/2/$menu")?>" class="btn bg-olive btn-radius-sm btn-sm"  title="Pindah Posisi Ke Atas"><i class="fa fa-arrow-up"></i></a>
																			<?php endif; ?>
																			<a href="<?=site_url("menu/ajax_add_sub_menu/$tip/$menu/$data[id]")?>" class="btn bg-orange btn-radius-sm btn-sm" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Ubah Data" title="Ubah Data"><i class="fa fa-edit"></i></a>
																			<?php if ($data['enabled'] == '2'): ?>
																				<a href="<?= site_url("menu/menu_lock_sub_menu/$tip/$menu/$data[id]")?>" class="btn bg-navy btn-radius-sm btn-sm"  title="Aktifkan"><i class="fa fa-lock">&nbsp;</i></a>
																				<?php elseif ($data['enabled'] == '1'): ?>
																					<a href="<?= site_url("menu/menu_unlock_sub_menu/$tip/$menu/$data[id]")?>" class="btn bg-navy btn-radius-sm btn-sm"  title="Non Aktifkan"><i class="fa fa-unlock"></i></a>
																				<?php endif ?>
																				<a href="#" data-href="<?= site_url("menu/delete_sub_menu/$tip/$menu/$data[id]")?>" class="btn bg-maroon btn-radius-sm btn-sm"  title="Hapus" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-trash-o"></i></a>
																			</td>
																			<td width="50%"><?= $data['nama']?></td>
																			<td><?= $data['aktif']?></td>
																			<td><?= $data['link']?></td>
																			<td>
																								<?php
																									$link_tipe = array(
																										1 => 'Artikel Statis',
																										2 => 'Statistik Penduduk',
																										3 => 'Statistik Keluarga',
																										4 => 'Program Bantuan',
																										5 => 'Statistik Lainnya',
																										99 => 'Eksternal',
																										45 => 'Internal'
																									);
																									echo $link_tipe[$data['link_tipe']];
																								?>
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
								</div>
								<div class='modal fade' id='confirm-delete' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
									<div class='modal-dialog'>
										<div class='modal-content'>
											<div class='modal-header'>
												<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
												<h4 class='modal-title' id='myModalLabel'><i class='fa fa-exclamation-triangle text-red'></i> Konfirmasi</h4>
											</div>
											<div class='modal-body btn-warning'>
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

