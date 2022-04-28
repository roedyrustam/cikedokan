
<div class="content-wrapper">
	<section class="content-header">
		<div class="title-header">Form Data Suplemen</div>
		<ol class="breadcrumb">
			<li><a href="<?= site_url('hom_sid')?>"><i class="fa fa-home"></i> Home</a></li>
			<li><a href="<?= site_url('suplemen')?>"> Data Suplemen</a></li>
			<li class="active">Form Data Suplemen</li>
		</ol>
	</section>
	<section class="content" id="maincontent">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-info">
					<div class="box-header with-border">
						<a href="<?= site_url('suplemen')?>" class="btn btn-radius btn-uppercase btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block">Kembali Ke Daftar Suplemen</a>
					</div>

					<form id="validasi" action="<?= $form_action?>" method="POST" class="form-horizontal">
						<div class="box-body">
							<div class="form-group">
								<label  class="col-sm-3 control-label" for="id_master">Sasaran Data</label>
								<div class="col-sm-7">
									<select class="form-control input-sm required" name="cid" id="cid">
										<option value="">-- Pilih Sasaran Data Suplemen --</option>
										<option value="1" <?php if ($cid == 1 OR $suplemen['sasaran'] == 1): ?>selected<?php endif ?>>Penduduk Perorangan</option>
										<option value="2" <?php if ($cid == 2 OR $suplemen['sasaran'] == 2): ?>selected<?php endif ?>>Keluarga - KK</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label  class="col-sm-3 control-label" for="nama">Nama Data Suplemen</label>
								<div class="col-sm-7">
									<input  class="form-control input-sm required" type="text" placeholder="Nama Data Suplemen" name="nama" id="nama" value="<?= $suplemen['nama']?>">
								</div>
							</div>
							<div class="form-group">
								<label  class="col-sm-3 control-label" for="keterangan">Keterangan</label>
								<div class="col-sm-7">
									 <textarea name="keterangan" id="keterangan" class="form-control input-sm" placeholder="Keterangan"  rows="3"><?= $suplemen['keterangan']?></textarea>
								 </div>
							</div>
						</div>
						<div class="box-footer">
							<div class="row">
								<div class="col-xs-12">
									<button type="reset" class="btn btn-radius btn-uppercase btn-danger btn-sm">Batal</button>
									<button type="submit" class="btn btn-radius btn-uppercase btn-info btn-sm pull-right">Simpan</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
</div>
