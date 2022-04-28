<div class="content-wrapper">
	<section class="content-header">
		<h1>Daftar Inventaris Elektronik</h1>
		<ol class="breadcrumb">
			<li><a href="<?= site_url('hom_sid')?>"><i class="fa fa-home"></i> Home</a></li>
			<li><a href="<?= site_url() ?>inventaris_elektronik"><i class="fa fa-dashboard"></i>Daftar Inventaris Elektronik</a></li>
			<li class="active">Isi Data</li>
		</ol>
	</section>
	<section class="content" id="maincontent">
		<form class="form-horizontal" id="validasi" name="form_peralatan" method="post" action="<?= site_url("api_inventaris_elektronik/add"); ?>">
			<div class="row">
				<div class="col-md-3">
					<?php	$this->load->view('inventaris/menu_kiri.php')?>
				</div>
				<div class="col-md-9">
					<div class="box box-info">
						<div class="box-header with-border">
							<a href="<?= site_url() ?>inventaris_elektronik" class="btn btn-social btn-flat btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Inventaris Elektronik</a>
						</div>
						<?php
							$reg = ($last_reg->kode + 1);
							$hasil = sprintf("%06s",$reg);
						?>
						<div class="box-body">
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label class="col-sm-3 control-label" style="text-align:left;" for="nama_barang">Nama Barang / Jenis Barang</label>
										<div class="col-sm-8">
											<select class="form-control input-sm select2" id="nama_barang" name="nama_barang" style ="width:100%;" onchange="formAction('main')">
												<?php foreach ($aset as $data): ?>
													<option value="<?=  $data['nama']."_".$data['golongan'].".".$data['bidang'].".".$data['kelompok'].".".$data['sub_kelompok'].".".$data['sub_sub_kelompok'].".".$hasil?>">Kode Reg : <?= $data['golongan'].".".$data['bidang'].".".$data['kelompok'].".".$data['sub_kelompok'].".".$data['sub_sub_kelompok']." - ".$data['nama']?></option>
												<?php endforeach; ?>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label" style="text-align:left;" for="kode_barang">Kode Barang</label>
										<div class="col-sm-6">
											<input type="hidden" name="nama_barang_save" id="nama_barang_save">
											<input type="hidden" name="kode_propinsi" id="kode_propinsi" value="<?=$main["kode_propinsi"]?>">
											<input type="hidden" name="kode_kabupaten" id="kode_kabupaten" value="<?=$main["kode_kabupaten"]?>">
											<input type="hidden" name="kode_kecamatan" id="kode_kecamatan" value="<?=$main["kode_kecamatan"]?>">
											<input type="hidden" name="kode_desa" id="kode_desa" value="<?=$main["kode_desa"]?>">
											<input maxlength="50" class="form-control input-sm required" name="kode_barang" id="kode_barang" type="text"/>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label" style="text-align:left;" for="register">Nomor Register</label>
										<div class="col-sm-6">
											<input maxlength="50" class="form-control input-sm required" name="register" id="register" type="text"/>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label" style="text-align:left;" for="merk">Merk/Type</label>
										<div class="col-sm-8">
											<input type="text" class="form-control input-sm required" id="merk" name="merk" type="text"/>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label" style="text-align:left;" for="ukuran">Ukuran </label>
										<div class="col-sm-8">
											<input maxlength="50" class="form-control input-sm required" name="ukuran" id="ukuran" type="text"/>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label" style="text-align:left;" for="bahan">Bahan</label>
										<div class="col-sm-8">
											<input maxlength="50" class="form-control input-sm required" name="bahan" id="bahan" type="text"/>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label" style="text-align:left;" for="tahun_pengadaan">Tahun Pembelian</label>
										<div class="col-sm-4">
											<select name="tahun_pengadaan" id="tahun_pengadaan" class="form-control input-sm select2 required">
												<?php for ($i=date("Y"); $i>=1980; $i--): ?>
													<option value="<?= $i ?>"><?= $i ?></option>
												<?php endfor; ?>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label" style="text-align:left;" for="no_mesin">Nomor Seri/IMEI</label>
										<div class="col-sm-8">
											<input maxlength="50" class="form-control input-sm required" name="no_mesin" id="no_mesin" type="text"/>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label required" style="text-align:left;" for="penggunaan_barang">Penggunaan Barang </label>
										<div class="col-sm-4">
											<select name="penggunaan_barang" id="penggunaan_barang" class="form-control input-sm required" placeholder="Hak Tanah">
												<option value="01">Pemerintah Desa</option>
												<option value="02">Badan Permusyawaratan Daerah</option>
												<option value="03">PKK</option>
												<option value="04">LKMD</option>
												<option value="05">Karang Taruna</option>
												<option value="06">RW</option>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label" style="text-align:left;" for="asal_usul">Asal Usul </label>
										<div class="col-sm-4">
											<select name="asal" id="asal" class="form-control input-sm required">
												<option value="">-- Pilih Asal Usul Barang --</option>
												<option value="Bantuan Kabupaten">Bantuan Kabupaten</option>
												<option value="Bantuan Pemerintah">Bantuan Pemerintah</option>
												<option value="Bantuan Provinsi">Bantuan Provinsi</option>
												<option value="Pembelian Sendiri">Pembelian Sendiri</option>
												<option value="Sumbangan">Sumbangan</option>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label" style="text-align:left;" for="harga">Harga</label>
										<div class="col-sm-4">
											<div class="input-group">
												<span class="input-group-addon input-sm" id="koefisien_dasar_bangunan-addon">Rp</span>
												<input class="form-control input-sm number required" id="harga" name="harga" type="text" />
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label" style="text-align:left;" for="keterangan">Keterangan</label>
										<div class="col-sm-8">
											<textarea rows="5" class="form-control input-sm required" name="keterangan" id="keterangan"></textarea>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="box-footer">
							<div class="col-xs-12">
								<button type="reset" class="btn btn-social btn-flat btn-danger btn-sm"><i class="fa fa-times"></i> Batal</button>
								<button type="submit" class="btn btn-social btn-flat btn-info btn-sm pull-right"><i class="fa fa-check"></i> Simpan</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
	</section>
</div>

<script>
	$( document ).ready(function() {
		$('#kode_barang').val($('#kode_propinsi').val()+"."+$('#kode_kabupaten').val()+"."+$('#kode_kecamatan').val()+"."+
		$('#kode_desa').val()+"."+$('#penggunaan_barang').val()+"."+$('#tahun_pengadaan').val());

		$("#tahun_pengadaan").change(function(){
			$('#kode_barang').val($('#kode_propinsi').val()+"."+$('#kode_kabupaten').val()+"."+$('#kode_kecamatan').val()+"."+
			$('#kode_desa').val()+"."+$('#penggunaan_barang').val()+"."+$('#tahun_pengadaan').val());
		});

		$("#penggunaan_barang").change(function(){
			$('#kode_barang').val($('#kode_propinsi').val()+"."+$('#kode_kabupaten').val()+"."+$('#kode_kecamatan').val()+"."+
			$('#kode_desa').val()+"."+$('#penggunaan_barang').val()+"."+$('#tahun_pengadaan').val());
		});

		$("#nama_barang").change(function(){
			$('#register').val($('#nama_barang').val().split("_",2).pop());
			$('#nama_barang_save').val($('#nama_barang').val().split("_",1).pop());
		});

		$("#tahun_pengadaan").change();	
		$("#penggunaan_barang").change();
		$("#nama_barang").change();
	});
</script>