<div class="content-wrapper">
	<section class="content-header">
		<h1>Ubah Data Inventaris Jalan, Irigasi dan Jaringan</h1>
		<ol class="breadcrumb">
			<li><a href="<?= site_url('hom_sid')?>"><i class="fa fa-home"></i> Home</a></li>
			<li><a href="<?= site_url() ?>inventaris_jalan"><i class="fa fa-dashboard"></i>Daftar Inventaris Jalan, Irigasi dan Jaringan</a></li>
			<li class="active">Ubah Data</li>
		</ol>
	</section>
	<section class="content" id="maincontent">
		<form class="form-horizontal" id="validasi" name="form_jalan" method="post" action="<?= site_url("api_inventaris_jalan/update/$main->id"); ?>">
			<div class="row">
				<div class="col-md-3">
					<?php	$this->load->view('inventaris/menu_kiri.php')?>
				</div>
				<div class="col-md-9">
					<div class="box box-info">
						<div class="box-header with-border">
							<a href="<?= site_url() ?>inventaris_jalan" class="btn btn-social btn-flat btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Inventaris Jalan, Irigasi dan Jaringan</a>
						</div>
						<?php
							$kd_jns_barang = substr($last_reg->register, 0, -7);
							$kd_penggunaan = substr($main->kode_barang, 12, -5);
							$th_pengadaan = substr($main->kode_barang, -4);
							$reg = $last_reg->kode;
							$hasil = sprintf("%06s",$reg);
						?>
						<div class="box-body">
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label class="col-sm-3 control-label " style="text-align:left;" for="nama_barang">Nama Barang / Jenis Barang</label>
										<div class="col-sm-8">
											<input type="hidden" id="id" name="id" value="<?= $main->id; ?>">
											<select class="form-control input-sm select2" id="nama_barang" name="nama_barang" style ="width:100%;" onchange="formAction('main')">
											 	<option value="<?=$main->nama_barang.'_'.$main->register?>">Kode Reg : <?= $kd_jns_barang.' - '.$main->nama_barang; ?></option>
												<?php foreach ($aset as $data): ?>
													<?php if($data['nama'] != $main->nama_barang){ ?>
													<option value="<?=  $data['nama']."_".$data['golongan'].".".$data['bidang'].".".$data['kelompok'].".".$data['sub_kelompok'].".".$data['sub_sub_kelompok'].".".$hasil?>">Kode Reg : <?= $data['golongan'].".".$data['bidang'].".".$data['kelompok'].".".$data['sub_kelompok'].".".$data['sub_sub_kelompok']." - ".$data['nama']?></option>
													<?php } ?>
												<?php endforeach; ?>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label" style="text-align:left;" for="kode_barang">Kode Barang</label>
										<div class="col-sm-8">
											<input type="hidden" name="nama_barang_save" id="nama_barang_save" value="<?=$main->nama_barang?>">
											<input type="hidden" name="kode_propinsi" id="kode_propinsi" value="<?=$get_kode['kode_propinsi']?>">
											<input type="hidden" name="kode_kabupaten" id="kode_kabupaten" value="<?=$get_kode['kode_kabupaten']?>">
											<input type="hidden" name="kode_kecamatan" id="kode_kecamatan" value="<?=$get_kode['kode_kecamatan']?>">
											<input type="hidden" name="kode_desa" id="kode_desa" value="<?=$get_kode['kode_desa']?>">
											<input maxlength="50" value="<?= $main->kode_barang; ?>" class="form-control input-sm required" name="kode_barang" id="kode_barang" type="text"/>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label" style="text-align:left;" for="register">Nomor Register</label>
										<div class="col-sm-8">
											<input maxlength="50" value="<?= $main->register; ?>" class="form-control input-sm required" name="register" id="register" type="text" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label" style="text-align:left;" for="kondisi">Kondisi Bangunan</label>
										<div class="col-sm-4">
											<select name="kondisi" id="kondisi" class="form-control input-sm required" >
												<option value="<?= $main->kondisi; ?>"> <?= $main->kondisi; ?> </option>
												<option value="Baik">Baik</option>
												<option value="Rusak Ringan">Rusak Ringan</option>
												<option value="Rusak Sedang">Rusak Sedang</option>
												<option value="Rusak Berat">Rusak Berat</option>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label" style="text-align:left;" for="kontruksi">Kontruksi</label>
										<div class="col-sm-8">
											<textarea class="form-control input-sm required" name="kontruksi" id="kontruksi" ><?= $main->kontruksi; ?></textarea>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label " style="text-align:left;" for="panjang">Panjang</label>
										<div class="col-sm-4">
											<div class="input-group">
												<input value="<?= (!empty($main->panjang) ? $main->panjang : '0'); ?>" class="form-control input-sm number required" id="panjang" name="panjang" type="text"/>
												<span class="input-group-addon input-sm" id="koefisien_dasar_bangunan-addon">Km</span>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label" style="text-align:left;" for="lebar">Lebar</label>
										<div class="col-sm-4">
											<div class="input-group">
												<input value="<?= (!empty($main->lebar) ? $main->lebar : '0'); ?>"  class="form-control input-sm number required" id="lebar" name="lebar" type="text"/>
												<span class="input-group-addon input-sm" id="koefisien_dasar_bangunan-addon">M</span>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label " style="text-align:left;" for="luas">Luas</label>
										<div class="col-sm-4">
											<div class="input-group">
												<input value="<?= (!empty($main->luas) ? $main->luas : '0'); ?>"  class="form-control input-sm number required" id="luas" name="luas" type="text"/>
												<span class="input-group-addon input-sm" id="koefisien_dasar_bangunan-addon">M<sup>2</sup></span>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label" style="text-align:left;" for="alamat">Letak / Lokasi </label>
										<div class="col-sm-8">
											<textarea class="form-control input-sm required" name="alamat" id="alamat" ><?= $main->letak; ?></textarea>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label " style="text-align:left;" for="no_bangunan">Nomor Kepemilikan</label>
										<div class="col-sm-8">
											<input maxlength="50" value="<?= (!empty($main->no_dokument) ? $main->no_dokument : '-'); ?>" class="form-control input-sm required" name="no_bangunan" id="no_bangunan" type="text"/>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label " style="text-align:left;" for="tanggal_bangunan">Tanggal Dokumen Kepemilikan</label>
										<div class="col-sm-4">
											<input maxlength="50" type="date" value="<?= $main->tanggal_dokument;?>" class="form-control input-sm required" name="tanggal_bangunan" id="tanggal_bangunan" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label " style="text-align:left;" for="status_tanah">Status Tanah</label>
										<div class="col-sm-8">
											<select name="status_tanah" id="status_tanah" class="form-control input-sm required">
												<option value="<?= $main->status_tanah; ?>"> <?= $main->status_tanah; ?> </option>
												<option value="Tanah milik Pemda">Tanah milik Pemda</option>
												<option value="Tanah Negara">Tanah Negara (Tanah yang dikuasai langsung oleh Negara)</option>
												<option value="Tanah Hak Ulayat">Tanah Hak Ulayat (Tanah masyarakat Hukum Adat)</option>
												<option value="Tanah Hak">Tanah Hak (Tanah kepunyaan perorangan atau Badan Hukum)</option>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label" style="text-align:left;" for="tahun_pengadaan">Tahun Pembelian</label>
										<div class="col-sm-4">
											<select name="tahun_pengadaan" id="tahun_pengadaan" class="form-control input-sm required">
												<?php for ($i=date("Y"); $i>=1980; $i--): ?>
													<option value="<?= $i ?>" <?php echo $th_pengadaan == $i ? 'selected' : '' ?>><?= $i ?></option>
												<?php endfor; ?>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label " style="text-align:left;" for="kode_tanah">Nomor Kode Tanah</label>
										<div class="col-sm-8">
											<input maxlength="50"value="<?= (!empty($main->kode_tanah) ? $main->kode_tanah : '-'); ?>"  class="form-control input-sm required" name="kode_tanah" id="kode_tanah" type="text"/>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label required" style="text-align:left;" for="penggunaan_barang">Penggunaan</label>
										<div class="col-sm-4">
											<select name="penggunaan_barang" id="penggunaan_barang" class="form-control input-sm required" placeholder="Hak Tanah">
												<option value="01" <?php echo $kd_penggunaan == '01' ? 'selected' : '' ?>>Pemerintah Desa</option>
												<option value="02" <?php echo $kd_penggunaan == '02' ? 'selected' : '' ?>>Badan Permusyawaratan Daerah</option>
												<option value="03" <?php echo $kd_penggunaan == '03' ? 'selected' : '' ?>>PKK</option>
												<option value="04" <?php echo $kd_penggunaan == '04' ? 'selected' : '' ?>>LKMD</option>
												<option value="05" <?php echo $kd_penggunaan == '05' ? 'selected' : '' ?>>Karang Taruna</option>
												<option value="06" <?php echo $kd_penggunaan == '06' ? 'selected' : '' ?>>RW</option>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label " style="text-align:left;" for="asal">Asal Usul </label>
										<div class="col-sm-8">
											<select name="asal" id="asal" class="form-control input-sm required" >
												<option value="<?= $main->asal; ?>"> <?= $main->asal; ?> </option>
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
												<input type="text"  value="<?= $main->harga; ?>" class="form-control input-sm number required" id="harga" name="harga" />
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label" style="text-align:left;" for="keterangan">Keterangan</label>
										<div class="col-sm-8">
											<textarea rows="5" class="form-control input-sm required" name="keterangan" id="keterangan" ><?= $main->keterangan; ?></textarea>
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
	});
</script>