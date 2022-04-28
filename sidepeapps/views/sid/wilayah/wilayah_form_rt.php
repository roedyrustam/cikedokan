<div class="content-wrapper">
	<section class="content-header">
		<div class="title-header">Pengelolaan Data RT</div>
		<ol class="breadcrumb">
			<li><a href="<?= site_url('hom_sid')?>"><i class="fa fa-home"></i> Home</a></li>
			<li><a href="<?= site_url('sid_core')?>"> Daftar <?= ucwords($this->setting->sebutan_dusun)?></a></li>
			<li><a href="<?= site_url("sid_core/sub_rw/$id_dusun")?>"> Daftar RW</a></li>
			<li><a href="<?= site_url("sid_core/sub_rt/$id_dusun/$rw")?>"> Daftar RT</a></li>
			<li class="active">Data RT</li>
		</ol>
	</section>
	<section class="content" id="maincontent">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-info">
					<div class="box-header with-border">
						<a href="<?= site_url("sid_core/sub_rt/$id_dusun/$rw")?>" class="btn btn-uppercase btn-radius btn-info btn-sm btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Kembali Ke Daftar RT">Kembali ke Daftar RT</a>
					</div>
					<div class="box-body">
						<div class="row">
							<div class="col-sm-12">
							<form id="validasi" action="<?= $form_action?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
									<div class="box-body">
										<div class="row">
											<div class="col-sm-12">
												<div class="form-group">
													<label class="col-sm-3 control-label" for="rt">RT</label>
													<div class="col-sm-7">
														<input  id="rt" class="form-control input-sm digits required" type="text" placeholder="Nomor RT" name="rt" value="<?= $rt?>">
													</div>
												</div>
											</div>
											<?php if ($rt): ?>
												<div class="col-sm-12">
													<div class="form-group">
														<label class="col-sm-3 control-label" for="kepala_lama">Ketua RT Sebelumnya</label>
														<div class="col-sm-7">
															<p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
																<strong> <?= $individu['nama']?></strong>
																<br />NIK - <?= $individu['nik']?>
															</P>
														</div>
													</div>
												</div>
											<?php endif; ?>
											<div class="col-sm-12">
												<div class="form-group">
													<label class="col-sm-3 control-label" for="id_kepala">Ketua RT</label>
													<div class="col-sm-7">
														<select class="form-control select2 input-sm" style="width: 100%;" id="id_kepala" name="id_kepala">
															<option selected="selected">-- Silakan Masukan NIK / Nama--</option>
															<?php foreach ($penduduk as $data): ?>
																<option value="<?= $data['id']?>">NIK :<?= $data['nik']." - ".$data['nama']?></option>
															<?php endforeach; ?>
														</select>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="box-footer">
										<div class="row">
											<div class="col-xs-12">
												<button type="reset" class="btn btn-uppercase btn-radius btn-danger btn-sm">Batal</button>
												<button type="submit" class="btn btn-uppercase btn-radius btn-info btn-sm pull-right">Simpan</button>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

