<script type="text/javascript" src="<?= base_url()?>assets/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?= base_url()?>assets/js/validasi.js"></script>
<script>
 	//File Upload
	$('#file_browser').click(function(e)
	{
		e.preventDefault();
		$('#file').click();
	});
	$('#file').change(function()
	{
		$('#file_path').val($(this).val());
	});
	$('#file_path').click(function()
	{
		$('#file_browser').click();
  });
  //Fortmat Tanggal
	$('#tgl_1').datetimepicker(
	{
    format: 'DD-MM-YYYY'
	});

</script>
<form id="validasi" action="<?= $form_action?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
	<div class='modal-body'>
		<div class="row">
			<div class="col-sm-12">
				<div class="box box-danger">
        			<div class="box-body">
						<div class="row">
							<div class="col-sm-12">
								<div class="row">
									<div class="col-sm-12">
										<div class="box-header with-border">
											<h3 class="box-title">Rincian Program</h3>
										</div>
										<div class="box-body">
											<table class="table table-bordered  table-striped table-hover" >
												<tbody>
													<tr>
														<td style="padding-top : 5px;padding-bottom : 5px; width:30%;" ><?= $judul_peserta?></td>
														<td> : <?= $peserta_nama?></td>
													</tr>
													<tr>
														<td style="padding-top : 5px;padding-bottom : 5px;" ><?= $judul_peserta_info?></td>
														<td> : <?= $peserta_info?></td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
									<div class="col-sm-12">
										<div class="box-header with-border">
											<h3 class="box-title">Identitas Pada Kartu Peserta</h3>
										</div>
					                    <div class="box-body">
					                        <input type="hidden" name="program_id" value="<?= $program_id?>"/>
											<div class="form-group">
												<label for="no_id_kartu" class="col-sm-4 control-label">Nomor Kartu Peserta</label>
												<div class="col-sm-7">
								  					<input  id="no_id_kartu" class="form-control input-sm" type="text" placeholder="Nomor Kartu Peserta" name="no_id_kartu" value="<?= $no_id_kartu?>" >
					        	                  </div>
											</div>
					                        <?php if ($kartu_peserta): ?>
					                          <div class="form-group">
					                            <label class="control-label col-sm-4" for="nama"></label>
					                            <div class="col-sm-6">
					                              <input type="hidden" name="old_gambar" value="<?= $kartu_peserta?>">
					                              <img class="attachment-img img-responsive" src="<?= AmbilDokumen($kartu_peserta)?>" alt="Gambar" style="border-radius: 10px">
					                              <p><label class="control-label"><input type="checkbox" name="gambar_hapus" value="<?= $kartu_peserta?>" /> Hapus Gambar</label></p>
					                           </div>
					                          </div>
					                        <?php endif; ?>
											<div class="form-group">
												<label for="gambar_peserta" class="col-sm-4 control-label">Gambar Kartu Peserta</label>
												<div class="col-sm-7">
													<div class="input-group input-group-sm ">
														<input type="text" class="form-control" id="file_path">
														<input type="file" class="hidden" id="file" name="satuan">
															<span class="input-group-btn">
																<button type="button" class="btn btn-info btn-flat" id="file_browser" style="border-top-left-radius:0;border-bottom-left-radius:0"><i class="fa fa-search"></i> Browse</button>
															</span>
													</div>
													<p class="help-block">Kosongkan jika tidak ingin mengunggah gambar.</p>
												</div>
											</div>
											<div class="form-group">
												<label for="kartu_nik"  class="col-sm-4 control-label">NIK</label>
												<div class="col-sm-7">
													<input  id="kartu_nik" class="form-control input-sm" type="text" placeholder="Nomor NIK Penduduk" name="kartu_nik" value="<?= $kartu_nik?>" >
												</div>
											</div>
											<div class="form-group">
												<label for="kartu_nama"  class="col-sm-4 control-label">Nama</label>
												<div class="col-sm-7">
													<input  id="kartu_nama" class="form-control input-sm" type="text" placeholder="Nama Penduduk" name="kartu_nama" value="<?= $kartu_nama?>">
												</div>
											</div>
											<div class="form-group">
												<label for="kartu_tempat_lahir"  class="col-sm-4 control-label">Tempat Lahir</label>
												<div class="col-sm-7">
													<input  id="kartu_tempat_lahir" class="form-control input-sm" type="text" placeholder="Tempat Lahir" name="kartu_tempat_lahir" value="<?= $kartu_tempat_lahir?>">
												</div>
											</div>
											<div class="form-group">
												<label for="kartu_tanggal_lahir"  class="col-sm-4 control-label">Tanggal Lahir</label>
												<div class="col-sm-7">
													<div class="input-group input-group-sm date">
														<div class="input-group-addon" style="border-top-right-radius:0;border-bottom-right-radius:0">
															<i class="fa fa-calendar"></i>
														</div>
														<input class="form-control input-sm pull-right" id="tgl_1" name="kartu_tanggal_lahir" placeholder="Tgl. Lahir" type="text" value="<?= date_format(date_create($kartu_tanggal_lahir),"d-m-Y")?>">
													</div>
												</div>
											</div>
											<div class="form-group">
												<label for="kartu_alamat"  class="col-sm-4 control-label">Alamat</label>
												<div class="col-sm-7">
											  		<input  id="kartu_alamat" class="form-control input-sm" type="text" placeholder="Alamat" name="kartu_alamat" value="<?= $kartu_alamat?>">
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
		</div>
		<div class="modal-footer">
			<button type="reset" class="btn btn-radius btn-uppercase btn-danger btn-sm" data-dismiss="modal">Tutup</button>
			<button type="submit" class="btn btn-radius btn-uppercase btn-info btn-sm" id="ok">Simpan</button>
		</div>
	</div>
</form>