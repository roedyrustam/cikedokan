<div class="content-wrapper">
	<section class="content-header">
		<div class="title-header">Pengelolaan Data <?= ucwords($this->setting->sebutan_dusun)?></div>
		<ol class="breadcrumb">
			<li><a href="<?= site_url('hom_sid')?>"><i class="fa fa-home"></i> Home</a></li>
			<li><a href="<?= site_url('sid_core')?>"> Daftar <?= ucwords($this->setting->sebutan_dusun)?></a></li>
			<li class="active">Data <?= ucwords($this->setting->sebutan_dusun)?></li>
		</ol>
	</section>
	<section class="content" id="maincontent">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-info">
					<div class="box-header with-border">
						<a href="<?= site_url("sid_core")?>" class="btn btn-uppercase btn-radius btn-info btn-sm btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Kembali Ke Daftar Wilayah">Kembali ke Daftar <?= ucwords($this->setting->sebutan_dusun)?></a>
					</div>
					<div class="box-body">
						<div class="row">
							<div class="col-sm-12">
								<form id="validasi" action="<?= $form_action?>" method="POST" enctype="multipart/form-data"  class="form-horizontal">
									<div class="box-body">
										<div class="row">
											<div class="col-sm-12">
												<div class="form-group">
													<label class="col-sm-3 control-label" for="dusun">Nama  <?= ucwords($this->setting->sebutan_dusun)?></label>
													<div class="col-sm-7">
														<input  id="dusun" class="form-control input-sm required" type="text" placeholder="Nama  <?= ucwords($this->setting->sebutan_dusun)?>" name="dusun" value="<?= $dusun?>">
													</div>
												</div>
											</div>
											<?php if ($dusun): ?>
												<div class="col-sm-12">
													<div class="form-group">
														<label class="col-sm-3 control-label" for="kepala_lama">Kepala  <?= ucwords($this->setting->sebutan_dusun)?> Sebelumnya</label>
														<div class="col-sm-7">
															<p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
																<strong><?= $individu["nama"]?></strong>
																<br/>NIK - <?= $individu["nik"]?>
															</P>
														</div>
													</div>
												</div>
											<?php endif; ?>
											<div class="col-sm-12">
												<div class="form-group">
													<label class="col-sm-3 control-label" for="id_kepala">NIK / Nama Kepala  <?= ucwords($this->setting->sebutan_dusun)?></label>
													<div class="col-sm-7">
														<select class="form-control select2" style="width: 100%;" id="id_kepala" name="id_kepala">
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

