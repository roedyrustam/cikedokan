<div class="content-wrapper">
	<section class="content-header">
		<h1>Rincian Inventaris Elektronik</h1>
		<ol class="breadcrumb">
			<li><a href="<?= site_url('hom_sid')?>"><i class="fa fa-home"></i> Home</a></li>
			<li><a href="<?= site_url() ?>inventaris_elektronik"><i class="fa fa-dashboard"></i>Daftar Inventaris Elektronik</a></li>
			<li class="active">Rincian Data</li>
		</ol>
	</section>
	<section class="content" id="maincontent">
		<form class="form-horizontal" id="validasi" name="form_tanah" method="post" action="<?= $form_action?>">
			<div class="row">
				<div class="col-md-3">
					<?php $this->load->view('inventaris/menu_kiri.php')?>
				</div>
				<div class="col-md-9">
					<?php $this->load->view('inventaris/penyusutan.php')?>
					
					<div class="box box-info">
						<div class="box-header with-border">
							<a href="<?= site_url() ?>inventaris_elektronik" class="btn btn-social btn-flat btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Inventaris Elektronik</a>
						</div>
						<div class="box-body">
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label class="col-sm-3 control-label " style="text-align:left;" for="nama_barang">Nama Barang</label>
										<div class="col-sm-8">
											<input maxlength="50" value="<?= $main->nama_barang; ?>" class="form-control input-sm" name="nama_barang" id="nama_barang" type="text" disabled/>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label " style="text-align:left;" for="jenis_barang">Jenis Barang</label>
										<div class="col-sm-4">
											<input maxlength="50" value="<?= $main->jenis_barang; ?>" class="form-control input-sm" name="jenis_barang" id="jenis_barang" type="text" disabled/>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label" style="text-align:left;" for="kode_barang">Kode Barang</label>
										<div class="col-sm-8">
											<input maxlength="50" value="<?= $main->kode_barang; ?>" class="form-control input-sm" name="kode_barang" id="kode_barang" type="text" disabled/>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label" style="text-align:left;" for="nomor_register">Nomor Register</label>
										<div class="col-sm-8">
											<input maxlength="50" value="<?= $main->register; ?>" class="form-control input-sm" name="nomor_register" id="nomor_register" type="text" disabled/>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label" style="text-align:left;" for="merk">Merk/Type</label>
										<div class="col-sm-8">
											<input type="text" value="<?= $main->merk; ?>" class="form-control input-sm" id="merk" name="merk" type="text" disabled/>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label " style="text-align:left;" for="ukuran">Ukuran </label>
										<div class="col-sm-8">
											<textarea class="form-control input-sm" name="ukuran" id="ukuran" disabled><?= $main->ukuran; ?></textarea>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label" style="text-align:left;" for="bahan">Bahan</label>
										<div class="col-sm-8">
											<textarea class="form-control input-sm" name="bahan" id="bahan" disabled><?= $main->bahan; ?></textarea>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label" style="text-align:left;" for="tahun">Tahun Pembelian</label>
										<div class="col-sm-4">
											<select name="tahun" id="tahun" class="form-control input-sm" disabled>
												<option value="<?= $main->tahun_pengadaan; ?>"><?= $main->tahun_pengadaan; ?></option>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label " style="text-align:left;" for="no_mesin">Nomor Seri / IME</label>
										<div class="col-sm-8">
											<input maxlength="50" value="<?= (!empty($main->no_mesin) ? $main->no_mesin : '-'); ?>" class="form-control input-sm" name="no_mesin" id="no_mesin" type="text" disabled/>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label " style="text-align:left;" for="asal_usul">Asal Usul </label>
										<div class="col-sm-4">
											<select name="asal_usul" id="asal_usul" class="form-control input-sm" disabled>
												<option value="<?= $main->asal; ?>"><?= $main->asal; ?></option>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label" style="text-align:left;" for="harga">Harga</label>
										<div class="col-sm-4">
											<div class="input-group">
												<span class="input-group-addon input-sm" id="koefisien_dasar_bangunan-addon">Rp</span>
												<input type="number" value="<?= $main->harga; ?>" class="form-control input-sm" id="harga" name="harga" type="text" disabled/>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label" style="text-align:left;" for="keterangan">Keterangan</label>
										<div class="col-sm-8">
											<textarea rows="5" class="form-control input-sm" name="keterangan" id="keterangan" disabled><?= $main->keterangan; ?></textarea>
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
