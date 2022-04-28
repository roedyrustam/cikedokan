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

    function changeStatus() {
        var x = $('#data_status').val()
        console.log(x)
        window.location.href = '/web/warga/'+x
    }
</script>
<div class="content-wrapper">
	<section class="content-header">
		<h1>Artikel</h1>
		<ol class="breadcrumb">
			<li><a href="<?=site_url('hom_sid')?>"><i class="fa fa-home"></i> Home</a></li>
			<li class="active">Artikel</li>
		</ol>
	</section>
	<section class="content" id="maincontent">
		<form id="mainform" name="mainform" action="" method="post">
			<div class="row-bak">
				<div class="col-md-9-bak">
					<div class="box box-info">
						
						<div class="box-body">
							<div class="row">
								<div class="col-sm-12">
									<div class="dataTables_wrapper form-inline dt-bootstrap no-footer">
										<form id="mainform" name="mainform" action="" method="post">
											
											<div class="row">
												<div class="col-sm-12">
													<div class="table-responsive">

                                                    Status: 
                                                    <select id="data_status" onchange="window.location.href = '<?=site_url()?>/web/warga/'+ event.target.value">
                                                        <option>---</option>
                                                        <option value="0">Semua</option>
                                                        <option value="1">Aktif</option>
                                                        <option value="2">Tidak Aktif</option>
                                                    </select>

														<table class="table table-bordered table-striped dataTable table-hover">
															<thead class="bg-gray disabled color-palette">
																<tr>
																	<th>No</th>
																	<th>Aksi</th>
                                                                    <th>Judul</th>
																	<th>Aktif</th>
                                                                    <th>Diposting pada</th>					<th>Kategori</th>					
                                                                    <th nowrap>Penulis</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php $no = 1; foreach ($data_artikel as $data): ?>
                                                                        <tr <?=$data['enabled'] > 1 ? 'style="background-color:#ffeeaa;"' : ''?>>
                                                                            <td><?=$no++?></td>
                                                                            <td nowrap>
                                                                                <?php if ($_SESSION['grup'] == 1 or $_SESSION['user'] == $data['id_user']): ?>
                                                                                    <a href="<?=site_url("web/form/$data[id_kategori]/1/0/$data[id]")?>" class="btn bg-orange btn-flat btn-sm" title="Ubah Data"><i class="fa fa-edit"></i></a>
                                                                                    <a href="<?=site_url("web/ubah_kategori_form/$data[id]")?>" class="btn bg-purple btn-flat btn-sm" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Ubah Kategori" title="Ubah Kategori"><i class="fa fa-folder-open"></i></a>
                                                                                    <?php if ($data['boleh_komentar']): ?>
                                                                                        <a href="<?=site_url("web/komentar_lock/$data[id_kategori]/$data[id]")?>" class="btn bg-info btn-flat btn-sm" title="Tutup komentar artikel"><i class="fa fa-comment-o"></i></a>
                                                                                        <?php else: ?>
                                                                                            <a href="<?=site_url("web/komentar_unlock/$data[id_kategori]/$data[id]")?>" class="btn bg-info btn-flat btn-sm" title="Buka komentar artikel"><i class="fa fa-comment"></i></a>
                                                                                        <?php endif; ?>
                                                                                        <?php if ($_SESSION['grup']<4): ?>
                                                                                            <a href="#" data-href="<?=site_url("web/delete/$data[id_kategori]/1/0/$data[id]")?>" class="btn bg-maroon btn-flat btn-sm"  title="Hapus" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-trash-o"></i></a>
                                                                                            <?php if ($data['enabled'] == '2'): ?>
                                                                                                <a href="<?=site_url("web/artikel_lock/$data[id_kategori]/$data[id]")?>" class="btn bg-navy btn-flat btn-sm" title="Aktifkan Artikel"><i class="fa fa-lock">&nbsp;</i></a>
                                                                                                <?php elseif ($data['enabled'] == '1'): ?>
                                                                                                    <a href="<?=site_url("web/artikel_unlock/$data[id_kategori]/$data[id]")?>" class="btn bg-navy btn-flat btn-sm" title="Non Aktifkan Artikel"><i class="fa fa-unlock"></i></a>
                                                                                                    <a href="<?=site_url("web/headline/$data[id_kategori]/1/0/$data[id]")?>" class="btn bg-teal btn-flat btn-sm" title="Jadikan Headline"><i class="<?php if ($data['headline']==1): ?>fa fa-star-o <?php else: ?> fa fa-star <?php endif; ?>"></i></a>
                                                                                                    <a href="<?=site_url("web/slide/$data[id_kategori]/1/0/$data[id]")?>" class="btn bg-gray btn-flat btn-sm" title="<?php if ($data['headline']==3): ?>Keluarkan dari slide <?php else: ?>Masukkan ke dalam slide<?php endif ?>"><i class="<?php if ($data['headline']==3): ?>fa fa-pause <?php else: ?> fa fa-play  <?php endif; ?>"></i></a>
                                                                                                <?php endif; ?>
                                                                                            <?php endif; ?>
                                                                                        <?php endif; ?>
                                                                                    </td>
                                                                                    <td width="50%"><?= $data['judul']?></td>
                                                                                    <td><?= $data['enabled'] > 1 ? 'Tidak': 'Ya'?></td>
                                                                                    <td nowrap><?= tgl_indo2($data['tgl_upload'])?></td>
																					<td nowrap><a href="<?=site_url()?>web/index/<?=$data['id_kategori']?>"><?=$data['kategori']?></a></td>
                                                                                    <td nowrap><?= ucwords(strtolower($data['author'])) ?></td>
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