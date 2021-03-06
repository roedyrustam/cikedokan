surat/surat_domisili_usaha_non_warga/surat_domisili_usaha_non_warga.php                             0000750 0023632 0023415 00000017021 13526507272 027322  0                                                                                                    ustar   u0_a138                         everybody                                                                                                                                                                                                              <div class="content-wrapper">
	<section class="content-header">
		<h1>Surat Domisili Usaha Non Warga</h1>
		<?php if($this->admin){ ?>
			<ol class="breadcrumb">
				<li><a href="<?= site_url('hom_desa/about')?>"><i class="fa fa-dashboard"></i> Home</a></li>
				<li><a href="<?= site_url('surat')?>"> Daftar Cetak Surat</a></li>
				<li class="active">Surat Domisili Usaha Non Warga</li>
			</ol>
		<?php } ?>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-info">
					<div class="box-header with-border">
						<a href="<?=site_url($aksi.'surat')?>" class="btn btn-social btn-flat btn-default btn-sm btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"  title="Kembali Ke Daftar Wilayah">
							<i class="fa fa-arrow-circle-left "></i> Kembali Ke Daftar Cetak Surat
						</a>
					</div>
					<div class="box-body">
						<form id="validasi" action="<?= $form_action?>" method="POST" target="_blank" class="form-surat form-horizontal">
							<input type="hidden" id="url_surat" name="url_surat" value="<?= $url ?>">
							<input type="hidden" id="url_remote" name="url_remote" value="<?= site_url($aksi.'surat/nomor_surat_duplikat')?>">
							<div class="form-group">
								<label for="nomor"  class="col-sm-3 control-label">Nomor Surat</label>
								<div class="col-sm-8">
									<input  id="nomor" class="form-control input-sm required" type="text" placeholder="Nomor Surat" name="nomor" value="<?= $surat_terakhir['no_surat_berikutnya'];?>">
									<p class="help-block text-red small"><?= $surat_terakhir['ket_nomor']?><strong><?= $surat_terakhir['no_surat'];?></strong> (tgl: <?= $surat_terakhir['tanggal']?>)</p>
								</div>
							</div>
							<div class="form-group">
								<label for="nama_non_warga"  class="col-sm-3 control-label">Nama</label>
								<div class="col-sm-8">
									<input  id="nama_non_warga" class="form-control input-sm required" type="text" placeholder="Nama" name="nama_non_warga">
								</div>
							</div>
							<div class="form-group">
								<label for="nik_non_warga"  class="col-sm-3 control-label">Identitas (KTP / KK)</label>
								<div class="col-sm-4">
									<input class="form-control input-sm required" placeholder="Nomor KTP" name="nik_non_warga" type="text"/>
								</div>
								<div class="col-sm-4">
									<input class="form-control input-sm required" placeholder="Nomor KK" name="kk_non_warga"  type="text"/>
								</div>
							</div>
							<div class="form-group">
								<label for="lahir"  class="col-sm-3 control-label">Tempat / Tanggal Lahir</label>
								<div class="col-sm-5 col-lg-4">
									<input type="text"  name="tempatlahir" class="form-control input-sm required" placeholder="Tempat Lahir"></input>
								</div>
								<div class="col-sm-3 col-lg-2">
									<div class="input-group input-group-sm date">
										<div class="input-group-addon">
											<i class="fa fa-calendar"></i>
										</div>
										<input title="Pilih Tanggal" class="form-control input-sm datepicker required" name="tanggallahir" type="text"/>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="sex" class="col-sm-3 control-label" >Jenis Kelamin / Warga Negara / Agama</label>
								<div class="col-sm-3">
									<select class="form-control input-sm" name="sex" id="sex">
										<option value="">Pilih Jenis Kelamin</option>
										<?php foreach ($sex as $data): ?>
											<option value="<?= ucwords(strtolower($data['nama']))?>"><?= $data['nama']?></option>
										<?php endforeach;?>
									</select>
								</div>
								<div class="col-sm-2">
									<select class="form-control input-sm" name="warga_negara" id="warga_negara">
										<option value="">Pilih Warganegara</option>
										<?php foreach ($warganegara as $data): ?>
											<option value="<?= $data['id']=='3' ? ucwords(strtolower($data['nama'])): strtoupper($data['nama'])?>"><?= $data['nama']?></option>
										<?php endforeach;?>
									</select>
								</div>
								<div class="col-sm-3">
									<select class="form-control input-sm" name="agama" id="agama">
										<option value="">Pilih Agama</option>
										<?php foreach ($agama as $data): ?>
											<option value="<?= $data['id']=='7' ? $data['nama'] : ucwords(strtolower($data['nama']))?>"><?= $data['nama']?></option>
										<?php endforeach;?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="pekerjaan" class="col-sm-3 control-label" >Pekerjaan</label>
								<div class="col-sm-4">
									<select class="form-control input-sm" name="pekerjaan" id="pekerjaan">
										<option value="">Pilih Pekerjaan</option>
										<?php foreach ($pekerjaan as $data): ?>
											<option value="<?= $data['nama']?>"><?= $data['nama']?></option>
										<?php endforeach;?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="alamat"  class="col-sm-3 control-label">Tempat Tinggal</label>
								<div class="col-sm-8">
									<input  id="alamat" class="form-control input-sm required" type="text" placeholder="Tempat Tinggal" name="alamat">
								</div>
							</div>
							<div class="form-group">
								<label for="nama_usaha"  class="col-sm-3 control-label">Nama Usaha / Jenis Usaha</label>
								<div class="col-sm-4">
									<input id="nama_usaha" class="form-control input-sm required" type="text" placeholder="Nama Usaha" name="nama_usaha">
								</div>
								<div class="col-sm-4">
									<input id="usaha" class="form-control input-sm required" type="text" placeholder="Jenis Usaha" name="usaha">
								</div>
							</div>
							<div class="form-group">
								<label for="akta_usaha"  class="col-sm-3 control-label">Nomor Akta / Tahun / Notaris</label>
								<div class="col-sm-3">
									<input id="akta_usaha" class="form-control input-sm required" type="text" placeholder="Nomor Akta" name="akta_usaha">
								</div>
								<div class="col-sm-2">
									<input id="akta_tahun" class="form-control input-sm required" type="text" placeholder="Tahun" name="akta_tahun">
								</div>
								<div class="col-sm-3">
									<input id="notaris" class="form-control input-sm required" type="text" placeholder="Notaris" name="notaris">
								</div>
							</div>
							<div class="form-group">
								<label for="bangunan"  class="col-sm-3 control-label">Jenis Bangunan / Peruntukan Bangunan / Status Bangunan</label>
								<div class="col-sm-3">
									<input id="bangunan" class="form-control input-sm required" type="text" placeholder="Jenis Bangunan" name="bangunan">
								</div>
								<div class="col-sm-3">
									<input id="peruntukan_bangunan" class="form-control input-sm required" type="text" placeholder="Peruntukan Bangunan" name="peruntukan_bangunan">
								</div>
								<div class="col-sm-2">
									<input id="status_bangunan" class="form-control input-sm required" type="text" placeholder="Status Bangunan" name="status_bangunan">
								</div>
							</div>
							<div class="form-group">
								<label for="alamat_usaha"  class="col-sm-3 control-label">Alamat Usaha</label>
								<div class="col-sm-8">
									<input  id="alamat_usaha" class="form-control input-sm required" type="text" placeholder="Alamat Usaha" name="alamat_usaha">
								</div>
							</div>
							<?php include("donjo-app/views/surat/form/_pamong.php"); ?>
						</form>
					</div>
					<?php include("donjo-app/views/surat/form/tombol_cetak.php"); ?>
				</div>
			</div>
		</div>
	</section>
</div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               surat/surat_izin_keramaian/surat_izin_keramaian.php                                                 0000750 0023632 0023415 00000007314 13526507272 023216  0                                                                                                    ustar   u0_a138                         everybody                                                                                                                                                                                                              <div class="content-wrapper">
	<section class="content-header">
		<h1>Surat Pengantar Izin Keramaian</h1>
		<?php if($this->admin){ ?>
			<ol class="breadcrumb">
				<li><a href="<?= site_url('hom_desa/about')?>"><i class="fa fa-dashboard"></i> Home</a></li>
				<li><a href="<?= site_url('surat')?>"> Daftar Cetak Surat</a></li>
				<li class="active">Surat Pengantar Izin Keramaian</li>
			</ol>
		<?php } ?>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-info">
					<div class="box-header with-border">
						<a href="<?=site_url($aksi.'surat')?>" class="btn btn-social btn-flat btn-default btn-sm btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"  title="Kembali Ke Daftar Wilayah">
							<i class="fa fa-arrow-circle-left "></i> Kembali Ke Daftar Cetak Surat
						</a>
					</div>
					<div class="box-body">
						<?php if($this->admin){ ?>
							<form action="" id="main" name="main" method="POST" class="form-horizontal">
								<?php include("donjo-app/views/surat/form/_cari_nik.php"); ?>
							</form>
						<?php } ?>
						<form id="validasi" action="<?= $form_action?>" method="POST" target="_blank" class="form-surat form-horizontal">
							<input type="hidden" id="url_surat" name="url_surat" value="<?= $url ?>">
							<input type="hidden" id="url_remote" name="url_remote" value="<?= site_url($aksi.'surat/nomor_surat_duplikat')?>">
							<?php if ($individu): ?>
								<?php include("donjo-app/views/surat/form/konfirmasi_pemohon.php"); ?>
							<?php	endif; ?>
							<div class="form-group">
								<label for="nomor"  class="col-sm-3 control-label">Nomor Surat</label>
								<div class="col-sm-8">
									<input  id="nomor" class="form-control input-sm required" type="text" placeholder="Nomor Surat" name="nomor" value="<?= $surat_terakhir['no_surat_berikutnya'];?>">
									<p class="help-block text-red small"><?= $surat_terakhir['ket_nomor']?><strong><?= $surat_terakhir['no_surat'];?></strong> (tgl: <?= $surat_terakhir['tanggal']?>)</p>
								</div>
							</div>
							<div class="form-group">
								<label for="jenis_keramaian"  class="col-sm-3 control-label">Jenis Acara</label>
								<div class="col-sm-8">
									<input  id="jenis_keramaian" class="form-control input-sm required" type="text" placeholder="Jenis Acara" name="jenis_keramaian">
								</div>
							</div>
							<div class="form-group">
								<label for="keperluan"  class="col-sm-3 control-label">Keperluan</label>
								<div class="col-sm-8">
									<textarea name="keperluan" class="form-control input-sm required" placeholder="Keperluan"></textarea>
								</div>
							</div>
							<div class="form-group">
								<label for="berlaku_dari"  class="col-sm-3 control-label">Berlaku Dari - Sampai</label>
								<div class="col-sm-3 col-lg-2">
									<div class="input-group input-group-sm date">
										<div class="input-group-addon">
											<i class="fa fa-calendar"></i>
										</div>
										<input title="Pilih Tanggal" id="tgljam_mulai" class="form-control input-sm required" name="berlaku_dari" type="text"/>
									</div>
								</div>
								<div class="col-sm-3 col-lg-2">
									<div class="input-group input-group-sm date">
										<div class="input-group-addon">
											<i class="fa fa-calendar"></i>
										</div>
										<input title="Pilih Tanggal" id="tgljam_akhir" class="form-control input-sm" name="berlaku_sampai" type="text"/>
									</div>
								</div>
							</div>
							<?php include("donjo-app/views/surat/form/_pamong.php"); ?>
						</form>
					</div>
					<?php include("donjo-app/views/surat/form/tombol_cetak.php"); ?>
				</div>
			</div>
		</div>
	</section>
</div>
                                                                                                                                                                                                                                                                                                                    surat/surat_izin_orangtua_suami_istri/surat_izin_orangtua_suami_istri.php                           0000750 0023632 0023415 00000020320 13526507272 030006  0                                                                                                    ustar   u0_a138                         everybody                                                                                                                                                                                                              <script>
	function submit_form_ambil_data()
	{
		$('input').removeClass('required');
		$('select').removeClass('required');
		$('#'+'validasi').attr('action','');
		$('#'+'validasi').attr('target','');
		$('#'+'validasi').submit();
	}

	function pemberi_izin(selaku)
	{
		var yang_diizinkan;
		if (selaku == 'Orang Tua')
		{
			yang_diizinkan = 'Anak';
		}
		else if (selaku == "Suami")
		{
			yang_diizinkan = 'Istri';
		}
		else if (selaku == "Istri")
		{
			yang_diizinkan = 'Suami';
		}
		else if (selaku == "Keluarga")
		{
			yang_diizinkan = 'Keluarga';
		}
		$('#mengizinkan').val(yang_diizinkan);
		$('#mengizinkan_show').val(yang_diizinkan);
		submit_form_ambil_data();
	}
</script>
<div class="content-wrapper">
	<section class="content-header">
		<h1>Surat Keterangan Izin Orang Tua /Suami/Istri</h1>
		<?php if($this->admin){ ?>
			<ol class="breadcrumb">
				<li><a href="<?= site_url('hom_desa/about')?>"><i class="fa fa-dashboard"></i> Home</a></li>
				<li><a href="<?= site_url('surat')?>"> Daftar Cetak Surat</a></li>
				<li class="active">Surat Keterangan Izin Orang Tua /Suami/Istri</li>
			</ol>
		<?php } ?>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-info">
					<div class="box-header with-border">
						<a href="<?=site_url($aksi.'surat')?>" class="btn btn-social btn-flat btn-default btn-sm btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"  title="Kembali Ke Daftar Wilayah">
							<i class="fa fa-arrow-circle-left "></i> Kembali Ke Daftar Cetak Surat
						</a>
					</div>
					<div class="box-body">
						<?php if($this->admin){ ?>
							<form action="" id="main" name="main" method="POST" class="form-horizontal">
								<div class="col-md-12">
									<div class="form-group subtitle_head">
										<label class="col-sm-3 text-right"><strong>PIHAK YANG MEMBERI IZIN</strong></label>
									</div>
									<?php include("donjo-app/views/surat/form/_cari_nik.php"); ?>
								</div>
							</form>
						<?php } ?>
						<form id="validasi" action="<?= $form_action?>" method="POST" target="_blank" class="form-surat form-horizontal">
							<input type="hidden" id="url_surat" name="url_surat" value="<?= $url ?>">
							<input type="hidden" id="url_remote" name="url_remote" value="<?= site_url($aksi.'surat/nomor_surat_duplikat')?>">
							<div class="col-md-12">
								<input id="id_diberi_izin_validasi" name="id_diberi_izin" type="hidden" value="<?= $_SESSION['id_diberi_izin']?>"/>
								<?php if ($individu): ?>
									<?php include("donjo-app/views/surat/form/konfirmasi_pemohon.php"); ?>
								<?php	endif; ?>
								<div class="form-group">
									<label for="nik"  class="col-sm-3 control-label">Memberi Izin Selaku</label>
									<div class="col-sm-6 col-lg-4">
										<select class="form-control input-sm select2" name="selaku" id="selaku" onchange="pemberi_izin($(this).val());" style ="width:100%;">
											<option value="">Pilih Selaku</option>
											<?php foreach ($selaku as $data): ?>
												<option value="<?= $data?>" <?php if ($data==$_SESSION['post']['selaku']): ?>selected<?php endif; ?>><?= $data?></option>
											<?php endforeach;?>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label for="nomor"  class="col-sm-3 control-label">Nomor Surat</label>
									<div class="col-sm-8">
										<input  id="nomor" class="form-control input-sm required" type="text" placeholder="Nomor Surat" name="nomor" value="<?= $_SESSION['post']['nomor']; ?>">
										<p class="help-block text-red small"><?= $surat_terakhir['ket_nomor']?><strong><?= $surat_terakhir['no_surat'];?></strong> (tgl: <?= $surat_terakhir['tanggal']?>)</p>
									</div>
								</div>
								<div class="form-group subtitle_head">
									<label class="col-sm-3 text-right"><strong>PIHAK YANG DIBERI IZIN</strong></label>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">Hubungan Dengan Pemberi Izin</label>
									<div class="col-sm-6 col-lg-4">
										<input id='mengizinkan' type="hidden" name="mengizinkan" value="<?= $_SESSION['post']['mengizinkan']?>"/>
										<select class="form-control input-sm" id="mengizinkan_show" disabled="disabled">
											<option value="">Pilih Hubungan</option>
											<?php foreach ($yang_diberi_izin as $data): ?>
												<option value="<?= $data?>" <?php if ($data==$_SESSION['post']['mengizinkan']): ?>selected<?php endif; ?>><?= $data?></option>
											<?php endforeach;?>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label for="nik"  class="col-sm-3 control-label">NIK / Nama Yang Diberi Izin</label>
									<div class="col-sm-6 col-lg-4">
										<select class="form-control input-sm select2-nik" id="id_diberi_izin" name="id_diberi_izin" style ="width:100%;" onchange="submit_form_ambil_data(this.id);">
											<option value="">--  Cari NIK / Nama Penduduk--</option>
											<?php foreach ($penduduk_diberi_izin as $data): ?>
												<option value="<?= $data['id']?>" <?php selected($diberi_izin['nik'], $data['nik']); ?>><?= $data['info_pilihan_penduduk']?></option>
											<?php endforeach;?>
										</select>
									</div>
								</div>
								<?php if ($diberi_izin): ?>
									<?php //bagian info setelah terpilih
									$individu = $diberi_izin;
									include("donjo-app/views/surat/form/konfirmasi_pemohon.php");
									?>
								<?php endif; ?>
								<div class="form-group">
									<label for="negara_tujuan"  class="col-sm-3 control-label">Negara Tujuan</label>
									<div class="col-sm-8">
										<input  id="negara_tujuan" class="form-control input-sm required" type="text" placeholder="Negara Tujuan" name="negara_tujuan" value="<?= $_SESSION['post']['negara_tujuan']?>">
										<p class="help-block">Diisi dengan Negara yang dituju sprt: Malaysia, Korea, dll</p>
									</div>
								</div>
								<div class="form-group">
									<label for="nama_pptkis"  class="col-sm-3 control-label">Nama PPTKIS</label>
									<div class="col-sm-8">
										<input  id="nama_pptkis" class="form-control input-sm required" type="text" placeholder="Nama PPTKIS" name="nama_pptkis" value="<?= $_SESSION['post']['nama_pptkis']?>">
										<p class="help-block">*) Nama PT atau Perusahaan</p>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">Status Pekerjaan/ TKI/ TKW</label>
									<div class="col-sm-6 col-lg-4">
										<select class="form-control input-sm" id="pekerja_show" disabled="disabled">
											<option value="">Pilih Status Pekerjaan/ TKI/ TKW</option>
											<?php foreach ($status_pekerjaan as $data): ?>
												<option value="<?= $data?>" <?php if ($data==$status_diberi_izin): ?>selected<?php endif; ?>><?= $data?></option>
											<?php endforeach;?>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label for="masa_kontrak"  class="col-sm-3 control-label">Masa Kontrak (Tahun)</label>
									<div class="col-sm-8">
										<input  id="masa_kontrak" class="form-control input-sm required" type="text" placeholder="Masa Kontrak" name="masa_kontrak" value="<?= $_SESSION['post']['masa_kontrak']?>">
									</div>
								</div>
								<div class="form-group subtitle_head">
									<label class="col-sm-3 text-right"><strong>PENANDA TANGAN</strong></label>
								</div>
								<div class="form-group">
									<label for="nik"  class="col-sm-3 control-label">Tertanda Atas Nama</label>
									<div class="col-sm-6 col-lg-4">
										<select class="form-control input-sm select2" id="atas_nama" name="atas_nama" style ="width:100%;">
											<option value="">-- Atas Nama --</option>
											<?php foreach ($atas_nama as $data): ?>
												<option value="<?= $data?>" <?php if ($data==$_SESSION['post']['atas_nama']): ?>selected<?php endif; ?>><?= $data?></option>
											<?php endforeach;?>
										</select>
									</div>
								</div>
								<?php include("donjo-app/views/surat/form/_pamong.php"); ?>
							</div>
						</form>
					</div>
					<?php include("donjo-app/views/surat/form/tombol_cetak.php"); ?>
				</div>
			</div>
		</div>
	</section>
</div>
                                                                                                                                                                                                                                                                                                                surat/surat_jalan/surat_jalan.php                                                                   0000750 0023632 0023415 00000005211 13526507272 017420  0                                                                                                    ustar   u0_a138                         everybody                                                                                                                                                                                                              <div class="content-wrapper">
	<section class="content-header">
		<h1>Surat Bepergian / Jalan</h1>
		<?php if($this->admin){ ?>
			<ol class="breadcrumb">
				<li><a href="<?= site_url('hom_desa/about')?>"><i class="fa fa-dashboard"></i> Home</a></li>
				<li><a href="<?= site_url('surat')?>"> Daftar Cetak Surat</a></li>
				<li class="active">Surat Bepergian / Jalan</li>
			</ol>
		<?php } ?>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-info">
					<div class="box-header with-border">
						<a href="<?=site_url($aksi.'surat')?>" class="btn btn-social btn-flat btn-default btn-sm btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"  title="Kembali Ke Daftar Wilayah">
							<i class="fa fa-arrow-circle-left "></i> Kembali Ke Daftar Cetak Surat
						</a>
					</div>
					<div class="box-body">
						<?php if($this->admin){ ?>
							<form action="" id="main" name="main" method="POST" class="form-horizontal">
								<?php include("donjo-app/views/surat/form/_cari_nik.php"); ?>
							</form>
						<?php } ?>
						<form id="validasi" action="<?= $form_action?>" method="POST" target="_blank" class="form-surat form-horizontal">
							<input type="hidden" id="url_surat" name="url_surat" value="<?= $url ?>">
							<input type="hidden" id="url_remote" name="url_remote" value="<?= site_url($aksi.'surat/nomor_surat_duplikat')?>">
							<?php if ($individu): ?>
								<?php include("donjo-app/views/surat/form/konfirmasi_pemohon.php"); ?>
							<?php	endif; ?>
							<div class="form-group">
								<label for="nomor"  class="col-sm-3 control-label">Nomor Surat</label>
								<div class="col-sm-8">
									<input  id="nomor" class="form-control input-sm required" type="text" placeholder="Nomor Surat" name="nomor" value="<?= $surat_terakhir['no_surat_berikutnya'];?>">
									<p class="help-block text-red small"><?= $surat_terakhir['ket_nomor']?><strong><?= $surat_terakhir['no_surat'];?></strong> (tgl: <?= $surat_terakhir['tanggal']?>)</p>
								</div>
							</div>
							<div class="form-group">
								<label for="keterangan"  class="col-sm-3 control-label">Keterangan</label>
								<div class="col-sm-8">
									<textarea  id="keterangan" class="form-control input-sm required" placeholder="Keterangan" name="keterangan"></textarea>
								</div>
							</div>
							<?php include("donjo-app/views/surat/form/tgl_berlaku.php"); ?>
							<?php include("donjo-app/views/surat/form/_pamong.php"); ?>
						</form>
					</div>
					<?php include("donjo-app/views/surat/form/tombol_cetak.php"); ?>
				</div>
			</div>
		</div>
	</section>
</div>
                                                                                                                                                                                                                                                                                                                                                                                       surat/surat_ket_beda_identitas_kis/surat_ket_beda_identitas_kis.php                                 0000750 0023632 0023415 00000020246 13526507272 026373  0                                                                                                    ustar   u0_a138                         everybody                                                                                                                                                                                                              <script>
	function submit_form_doc()
	{
		$('#'+'validasi').attr('action','<?= $form_action2?>');
		$('#'+'validasi').submit();
	}

	function change_all(total)
	{
		for (var i=1; i < total+1; i++) {
			$('#check'+i).change();
		}
	}

	function pilih_anggota(pilih, no_anggota)
	{
		var kolom = [
		'input[name=kartu'+no_anggota+']',
		'input[name=nama'+no_anggota+']',
		'input[name=nik'+no_anggota+']',
		'input[name=alamat'+no_anggota+']',
		'input[name=tanggallahir'+no_anggota+']',
		'input[name=faskes'+no_anggota+']'
		];
		if (pilih.is(':checked'))
		{
			$('input[name=nomor'+no_anggota+']').removeAttr("disabled");
			for (var i=0; i < kolom.length; i++)
			{
				$(kolom[i]).removeClass("non-aktif");
				$(kolom[i]).removeAttr("disabled");
				$(kolom[i]).attr("style","background-color: white;");
			}
		}
		else
		{
			$('input[name=nomor'+no_anggota+']').attr("disabled",'disabled');
			for (var i=0; i < kolom.length; i++)
			{
				$(kolom[i]).val('');
				$(kolom[i]).attr("disabled",'disabled');
				$(kolom[i]).addClass("non-aktif");
				$(kolom[i]).attr("style","background-color: lightgrey;");
			}
		}
	}

</script>
<div class="content-wrapper">
	<section class="content-header">
		<h1>Surat Keterangan Beda Identitas KIS</h1>
		<?php if($this->admin){ ?>
			<ol class="breadcrumb">
				<li><a href="<?= site_url('hom_desa/about')?>"><i class="fa fa-dashboard"></i> Home</a></li>
				<li><a href="<?= site_url($aksi.'surat')?>"> Daftar Cetak Surat</a></li>
				<li class="active">Surat Keterangan Beda Identitas KIS</li>
			</ol>
		<?php } ?>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-info">
					<div class="box-header with-border">
						<a href="<?=site_url($aksi.'surat')?>" class="btn btn-social btn-flat btn-default btn-sm btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"  title="Kembali Ke Daftar Wilayah">
							<i class="fa fa-arrow-circle-left "></i> Kembali Ke Daftar Cetak Surat
						</a>
					</div>
					<div class="box-body">
						<?php if($this->admin){ ?>
							<form action="" id="main" name="main" method="POST" class="form-horizontal">
								<div class="col-md-12">
									<?php include("donjo-app/views/surat/form/_cari_nik.php"); ?>
								</div>
							</form>
						<?php } ?>
						<form id="validasi" action="<?= $form_action?>" method="POST" target="_blank" class="form-surat form-horizontal">
							<input type="hidden" id="url_surat" name="url_surat" value="<?= $url ?>">
							<input type="hidden" id="url_remote" name="url_remote" value="<?= site_url($aksi.'surat/nomor_surat_duplikat')?>">
							<div class="col-md-12">
								<?php if ($individu): ?>
									<?php include("donjo-app/views/surat/form/konfirmasi_pemohon.php"); ?>
								<?php	endif; ?>
								<div class="form-group pria_luar_desa subtitle_head">
									<label class="col-sm-3 text-right"><strong>DATA KELUARGA / KK</strong></label>
								</div>
								<div class="form-group">
									<label for="nomor"  class="col-sm-3 control-label">Keluarga</label>
									<div class="col-sm-8">
										<div class="table-responsive">
											<table class="table table-bordered dataTable table-hover">
												<thead class="bg-gray disabled color-palette">
													<tr>
														<th>No</th>
														<th><input type="checkbox" class="checkall" onchange="change_all(<?= count($anggota);?>);"/></th>
														<th>NIK</th>
														<th>Nama</th>
														<th>Jenis Kelamin</th>
														<th>Tempat Tanggal Lahir</th>
														<th>Hubungan</th>
													</tr>
												</thead>
												<tbody>
													<?php foreach ($anggota AS $key => $data): ?>
														<tr>
															<td align="center" width="2"><?= $key+1?></td>
															<td align="center" width="5">
																<input id="check<?= $key+1?>" type="checkbox" name="id_cb[]" value="'<?= $data['nik']?>'" onchange="pilih_anggota($(this), <?= $key+1?>);" />
															</td>
															<td><?= $data['nik']?></td>
															<td><?= unpenetration($data['nama'])?></td>
															<td><?= $data['sex']?></td>
															<td><?= $data['tempatlahir']?>, <?= tgl_indo($data['tanggallahir'])?></td>
															<td><?= $data['hubungan']?></td>
														</tr>
													<?php endforeach;?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
								<div class="form-group pria_luar_desa subtitle_head">
									<label class="col-sm-3 text-right"><strong>DATA KELUARGA DI KARTU KIS</strong></label>
								</div>
								<div class="form-group">
									<label for="nomor"  class="col-sm-3 control-label">Keluarga</label>
									<div class="col-sm-8">
										<div class="table-responsive">
											<table class="table table-bordered dataTable table-hover">
												<thead class="bg-gray disabled color-palette">
													<tr>
														<th>No</th>
														<th>No. Kartu</th>
														<th>Nama di Kartu</th>
														<th>NIK</th>
														<th>Alamat di Kartu</th>
														<th>Tanggal Lahir</th>
														<th>Faskes Tingkat I</th>
													</tr>
												</thead>
												<tbody>
													<?php for ($i=1; $i<MAX_ANGGOTA+1; $i++): ?>
														<tr>
															<td width="7%"> <input name="nomor<?= $i?>" type="text" class="form-control input-sm" value="<?= $i?>" readonly disabled="disabled"/></td>
															<td> <input name="kartu<?= $i?>" type="text" class="form-control input-sm" disabled="disabled" style="background-color: lightgrey;"/></td>
															<td> <input name="nama<?= $i?>" type="text" class="form-control input-sm" disabled="disabled" style="background-color: lightgrey;"/></td>
															<td> <input name="nik<?= $i?>" type="text" class="form-control input-sm" disabled="disabled" style="background-color: lightgrey;"/></td>
															<td> <input name="alamat<?= $i?>" type="text" class="form-control input-sm" disabled="disabled" style="background-color: lightgrey;"/></td>
															<td>
																<input class="form-control input-sm datepicker" name="tanggallahir<?= $i?>" type="text" disabled="disabled" style="background-color: lightgrey;"/>
															</td>
															<td> <input name="faskes<?= $i?>" type="text" class="form-control input-sm" disabled="disabled" style="background-color: lightgrey;"/></td>
														</tr>
													<?php endfor; ?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label for="nomor"  class="col-sm-3 control-label">Nomor Surat</label>
									<div class="col-sm-8">
										<input  id="nomor" class="form-control input-sm required" type="text" placeholder="Nomor Surat" name="nomor" value="<?= $surat_terakhir['no_surat_berikutnya'];?>">
										<p class="help-block text-red small"><?= $surat_terakhir['ket_nomor']?><strong><?= $surat_terakhir['no_surat'];?></strong> (tgl: <?= $surat_terakhir['tanggal']?>)</p>
									</div>
								</div>
								<div class="form-group">
									<label for="keperluan"  class="col-sm-3 control-label">Keperluan</label>
									<div class="col-sm-8">
										<textarea name="keperluan" class="form-control input-sm required" placeholder="Keperluan"></textarea>
									</div>
								</div>
								<div class="form-group">
									<label for="atas_nama"  class="col-sm-3 control-label">Tertanda Atas Nama</label>
									<div class="col-sm-6 col-lg-4">
										<select class="form-control  input-sm select2" id="atas_nama" name="atas_nama" style ="width:100%;">
											<option value="">--  Atas Nama --</option>
											<option value="An. Kepala Desa <?= unpenetration($desa['nama_desa'])?>"> An. Kepala Desa <?= unpenetration($desa['nama_desa'])?> </option>
											<option value="Ub. Kepala Desa <?= unpenetration($desa['nama_desa'])?>"> Ub. Kepala Desa <?= unpenetration($desa['nama_desa'])?> </option>
										</select>
									</div>
								</div>
								<?php include("donjo-app/views/surat/form/_pamong.php"); ?>
							</div>
						</form>
					</div>
					<?php include("donjo-app/views/surat/form/tombol_cetak.php"); ?>
				</div>
			</div>
		</div>
	</section>
</div>
                                                                                                                                                                                                                                                                                                                                                          surat/surat_ket_beda_nama/surat_ket_beda_nama.php                                                   0000750 0023632 0023415 00000013461 13526507272 022540  0                                                                                                    ustar   u0_a138                         everybody                                                                                                                                                                                                              <div class="content-wrapper">
	<section class="content-header">
		<h1>Surat Keterangan Beda Identitas</h1>
		<?php if($this->admin){ ?>
			<ol class="breadcrumb">
				<li><a href="<?= site_url('hom_desa/about')?>"><i class="fa fa-dashboard"></i> Home</a></li>
				<li><a href="<?= site_url('surat')?>"> Daftar Cetak Surat</a></li>
				<li class="active">Surat Keterangan Beda Identitas</li>
			</ol>
		<?php } ?>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-info">
					<div class="box-header with-border">
						<a href="<?=site_url($aksi.'surat')?>" class="btn btn-social btn-flat btn-default btn-sm btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"  title="Kembali Ke Daftar Wilayah">
							<i class="fa fa-arrow-circle-left "></i> Kembali Ke Daftar Cetak Surat
						</a>
					</div>
					<div class="box-body">
						<?php if($this->admin){ ?>
							<form action="" id="main" name="main" method="POST" class="form-horizontal">
								<div class="col-md-12">
									<?php include("donjo-app/views/surat/form/_cari_nik.php"); ?>
								</div>
							</form>
						<?php } ?>
						<form id="validasi" action="<?= $form_action?>" method="POST" target="_blank" class="form-surat form-horizontal">
							<input type="hidden" id="url_surat" name="url_surat" value="<?= $url ?>">
							<input type="hidden" id="url_remote" name="url_remote" value="<?= site_url($aksi.'surat/nomor_surat_duplikat')?>">
							<div class="col-md-12">
								<?php if ($individu): ?>
									<?php include("donjo-app/views/surat/form/konfirmasi_pemohon.php"); ?>
								<?php	endif; ?>
								<div class="form-group">
									<label for="nomor"  class="col-sm-3 control-label">Nomor Surat</label>
									<div class="col-sm-8">
										<input  id="nomor" class="form-control input-sm required" type="text" placeholder="Nomor Surat" name="nomor" value="<?= $surat_terakhir['no_surat_berikutnya'];?>">
										<p class="help-block text-red small"><?= $surat_terakhir['ket_nomor']?><strong><?= $surat_terakhir['no_surat'];?></strong> (tgl: <?= $surat_terakhir['tanggal']?>)</p>
									</div>
								</div>
								<div class="form-group subtitle_head">
									<label class="col-sm-3 text-right"><strong>IDENTITAS KEDUA</strong></label>
								</div>
								<div class="form-group">
									<label for="kartu"  class="col-sm-3 control-label">Identitas dalam (nama kartu)</label>
									<div class="col-sm-8">
										<input type="text" name="kartu" class="form-control input-sm required" placeholder="Nama Kartu Identitas"></input>
									</div>
								</div>
								<div class="form-group">
									<label for="identitas"  class="col-sm-3 control-label">Nomor Identitas</label>
									<div class="col-sm-4">
										<input  id="identitas" class="form-control input-sm required" type="text" placeholder="Nomor Identitas" name="identitas">
									</div>
								</div>
								<div class="form-group">
									<label for="nama"  class="col-sm-3 control-label">Nama</label>
									<div class="col-sm-8">
										<input type="text" name="nama" class="form-control input-sm required" placeholder="Nama"></input>
									</div>
								</div>
								<div class="form-group">
									<label for="ttl"  class="col-sm-3 control-label">Tempat Tanggal Lahir</label>
									<div class="col-sm-4">
										<input  id="tempatlahir" class="form-control input-sm required" type="text" placeholder="Tempat Lahir" name="tempatlahir" >
									</div>
									<div class="col-sm-4 col-lg-2">
										<div class="input-group input-group-sm date">
											<div class="input-group-addon">
												<i class="fa fa-calendar"></i>
											</div>
											<input title="Pilih Tanggal" title="Pilih Tanggal"  class="form-control input-sm datepicker required" name="tanggallahir" type="text"/>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label for="sex"  class="col-sm-3 control-label">Jenis Kelamin</label>
									<div class="col-sm-8">
										<input type="text"  name="sex" class="form-control input-sm required" placeholder="Jenis Kelamin" ></input>
									</div>
								</div>
								<div class="form-group">
									<label for="alamat"  class="col-sm-3 control-label">Alamat</label>
									<div class="col-sm-8">
										<textarea name="alamat" class="form-control input-sm required" placeholder="Alamat" ></textarea>
									</div>
								</div>
								<div class="form-group">
									<label for="agama"  class="col-sm-3 control-label">Agama</label>
									<div class="col-sm-8">
										<input type="text" name="agama" class="form-control input-sm required" placeholder="Agama"></input>
									</div>
								</div>
								<div class="form-group">
									<label for="pekerjaan"  class="col-sm-3 control-label">Pekerjaan</label>
									<div class="col-sm-8">
										<input type="text"  name="pekerjaan" class="form-control input-sm required" placeholder="Pekerjaan"></input>
									</div>
								</div>
								<div class="form-group">
									<label for="keterangan"  class="col-sm-3 control-label">Keterangan</label>
									<div class="col-sm-8">
										<textarea name="keterangan" class="form-control input-sm required" placeholder="Keterangan"></textarea>
									</div>
								</div>
								<div class="form-group">
									<label for="perbedaan"  class="col-sm-3 control-label">Perbedaan</label>
									<div class="col-sm-8">
										<input type="text"  name="perbedaan" class="form-control input-sm required" placeholder="Perbedaan"></input>
									</div>
								</div>
								<?php include("donjo-app/views/surat/form/_pamong.php"); ?>
							</div>
						</form>
					</div>
					<?php include("donjo-app/views/surat/form/tombol_cetak.php"); ?>
				</div>
			</div>
		</div>
	</section>
</div>
                                                                                                                                                                                                               surat/surat_ket_catatan_kriminal/surat_ket_catatan_kriminal.php                                     0000750 0023632 0023415 00000005072 13526507272 025563  0                                                                                                    ustar   u0_a138                         everybody                                                                                                                                                                                                              <div class="content-wrapper">
	<section class="content-header">
		<h1>Surat Pengantar SKCK</h1>
		<?php if($this->admin){ ?>
			<ol class="breadcrumb">
				<li><a href="<?= site_url('hom_desa/about')?>"><i class="fa fa-dashboard"></i> Home</a></li>
				<li><a href="<?= site_url('surat')?>"> Daftar Cetak Surat</a></li>
				<li class="active">Surat Pengantar SKCK</li>
			</ol>
		<?php } ?>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-info">
					<div class="box-header with-border">
						<a href="<?=site_url($aksi.'surat')?>" class="btn btn-social btn-flat btn-default btn-sm btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"  title="Kembali Ke Daftar Wilayah">
							<i class="fa fa-arrow-circle-left "></i> Kembali Ke Daftar Cetak Surat
						</a>
					</div>
					<div class="box-body">
						<?php if($this->admin){ ?>
							<form action="" id="main" name="main" method="POST" class="form-horizontal">
								<?php include("donjo-app/views/surat/form/_cari_nik.php"); ?>
							</form>
						<?php } ?>
						<form id="validasi" action="<?= $form_action?>" method="POST" target="_blank" class="form-surat form-horizontal">
							<input type="hidden" id="url_surat" name="url_surat" value="<?= $url ?>">
							<input type="hidden" id="url_remote" name="url_remote" value="<?= site_url($aksi.'surat/nomor_surat_duplikat')?>">
							<?php if ($individu): ?>
								<?php include("donjo-app/views/surat/form/konfirmasi_pemohon.php"); ?>
							<?php	endif; ?>
							<div class="form-group">
								<label for="nomor"  class="col-sm-3 control-label">Nomor Surat</label>
								<div class="col-sm-8">
									<input  id="nomor" class="form-control input-sm required" type="text" placeholder="Nomor Surat" name="nomor" value="<?= $surat_terakhir['no_surat_berikutnya'];?>">
									<p class="help-block text-red small"><?= $surat_terakhir['ket_nomor']?><strong><?= $surat_terakhir['no_surat'];?></strong> (tgl: <?= $surat_terakhir['tanggal']?>)</p>
								</div>
							</div>
							<div class="form-group">
								<label for="keterangan"  class="col-sm-3 control-label">Keperluan</label>
								<div class="col-sm-8">
									<textarea  id="keterangan" class="form-control input-sm required" placeholder="Keperluan" name="keterangan"></textarea>
								</div>
							</div>
							<?php include("donjo-app/views/surat/form/_pamong.php"); ?>
						</form>
					</div>
					<?php include("donjo-app/views/surat/form/tombol_cetak.php"); ?>
				</div>
			</div>
		</div>
	</section>
</div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                      surat/surat_ket_domisili/surat_ket_domisili.php                                                     0000750 0023632 0023415 00000006212 13526507272 022400  0                                                                                                    ustar   u0_a138                         everybody                                                                                                                                                                                                              <div class="content-wrapper">
	<section class="content-header">
		<h1>Surat Keterangan Domisili</h1>
		<?php if($this->admin){ ?>
			<ol class="breadcrumb">
				<li><a href="<?= site_url('hom_desa/about')?>"><i class="fa fa-dashboard"></i> Home</a></li>
				<li><a href="<?= site_url('surat')?>"> Daftar Cetak Surat</a></li>
				<li class="active">Surat Keterangan Domisili</li>
			</ol>
		<?php } ?>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-info">
					<div class="box-header with-border">
						<a href="<?=site_url($aksi."surat")?>" class="btn btn-social btn-flat btn-default btn-sm btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"  title="Kembali Ke Daftar Wilayah">
							<i class="fa fa-arrow-circle-left "></i> Kembali Ke Daftar Cetak Surat
						</a>
					</div>
					<div class="box-body">
						<?php if($this->admin){ ?>
							<form action="" id="main" name="main" method="POST" class="form-horizontal">
								<?php include("donjo-app/views/surat/form/_cari_nik.php"); ?>
							</form>
						<?php } ?>
						<form id="validasi" action="<?= $form_action?>" method="POST" target="_blank" class="form-surat form-horizontal">
							<input type="hidden" id="url_surat" name="url_surat" value="<?= $url ?>">
							<input type="hidden" id="url_remote" name="url_remote" value="<?= site_url($aksi.'surat/nomor_surat_duplikat')?>">
							<?php if ($individu): ?>
								<?php include("donjo-app/views/surat/form/konfirmasi_pemohon.php"); ?>
							<?php	endif; ?>
							<div class="form-group">
								<label for="nomor"  class="col-sm-3 control-label">Nomor Surat</label>
								<div class="col-sm-8">
									<input  id="nomor" class="form-control input-sm required" type="text" placeholder="Nomor Surat" name="nomor" value="<?= $surat_terakhir['no_surat_berikutnya'];?>">
									<p class="help-block text-red small"><?= $surat_terakhir['ket_nomor']?><strong><?= $surat_terakhir['no_surat'];?></strong> (tgl: <?= $surat_terakhir['tanggal']?>)</p>
								</div>
							</div>
							<div class="form-group">
								<label for="keperluan"  class="col-sm-3 control-label">Keperluan</label>
								<div class="col-sm-8">
									<textarea name="keperluan" class="form-control input-sm required" placeholder="Keperluan"></textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Tertanda Atas Nama</label>
								<div class="col-sm-6 col-lg-4">
									<select class="form-control input-sm" name="atas_nama">
										<option value="">Atas Nama</option>
										<option value="An. Kepala Desa <?= unpenetration($desa['nama_desa'])?>"> An. Kepala Desa <?= unpenetration($desa['nama_desa'])?> </option>
										<option value="Ub. Kepala Desa <?= unpenetration($desa['nama_desa'])?>"> Ub. Kepala Desa <?= unpenetration($desa['nama_desa'])?> </option>
									</select>
								</div>
							</div>
							<?php include("donjo-app/views/surat/form/_pamong.php"); ?>
						</form>
					</div>
					<?php include("donjo-app/views/surat/form/tombol_cetak.php"); ?>
				</div>
			</div>
		</div>
	</section>
</div>                                                                                                                                                                                                                                                                                                                                                                                      surat/surat_ket_domisili_usaha/surat_ket_domisili_usaha.php                                         0000750 0023632 0023415 00000005475 13526507272 024754  0                                                                                                    ustar   u0_a138                         everybody                                                                                                                                                                                                              <div class="content-wrapper">
	<section class="content-header">
		<h1>Surat Keterangan Domisili Usaha</h1>
		<?php if($this->admin){ ?>
			<ol class="breadcrumb">
				<li><a href="<?= site_url('hom_desa/about')?>"><i class="fa fa-dashboard"></i> Home</a></li>
				<li><a href="<?= site_url('surat')?>"> Daftar Cetak Surat</a></li>
				<li class="active">Surat Keterangan Domisili Usaha</li>
			</ol>
		<?php } ?>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-info">
					<div class="box-header with-border">
						<a href="<?=site_url($aksi."surat")?>" class="btn btn-social btn-flat btn-default btn-sm btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"  title="Kembali Ke Daftar Wilayah">
							<i class="fa fa-arrow-circle-left "></i> Kembali Ke Daftar Cetak Surat
						</a>
					</div>
					<div class="box-body">
						<?php if($this->admin){ ?>
							<form action="" id="main" name="main" method="POST" class="form-horizontal">
								<?php include("donjo-app/views/surat/form/_cari_nik.php"); ?>
							</form>
						<?php } ?>
						<form id="validasi" action="<?= $form_action?>" method="POST" target="_blank" class="form-surat form-horizontal">
							<input type="hidden" id="url_surat" name="url_surat" value="<?= $url ?>">
							<input type="hidden" id="url_remote" name="url_remote" value="<?= site_url($aksi.'surat/nomor_surat_duplikat')?>">
							<div class="row jar_form">
								<label for="nomor" class="col-sm-3"></label>
								<div class="col-sm-8">
									<input class="required" type="hidden" name="nik" value="<?= $individu['id']?>">
								</div>
							</div>
							<?php if ($individu): ?>
								<?php include("donjo-app/views/surat/form/konfirmasi_pemohon.php"); ?>
							<?php	endif; ?>
							<div class="form-group">
								<label for="nomor"  class="col-sm-3 control-label">Nomor Surat</label>
								<div class="col-sm-8">
									<input  id="nomor" class="form-control input-sm required" type="text" placeholder="Nomor Surat" name="nomor" value="<?= $surat_terakhir['no_surat_berikutnya'];?>">
									<p class="help-block text-red small"><?= $surat_terakhir['ket_nomor']?><strong><?= $surat_terakhir['no_surat'];?></strong> (tgl: <?= $surat_terakhir['tanggal']?>)</p>
								</div>
							</div>
							<div class="form-group">
								<label for="usaha"  class="col-sm-3 control-label">Nama / Jenis Usaha</label>
								<div class="col-sm-8">
									<input  id="usaha" class="form-control input-sm required" type="text" placeholder="Nama / Jenis Usaha" name="usaha">
								</div>
							</div>
							<?php include("donjo-app/views/surat/form/_pamong.php"); ?>
						</form>
					</div>
					<?php include("donjo-app/views/surat/form/tombol_cetak.php"); ?>
				</div>
			</div>
		</div>
	</section>
</div>
                                                                                                                                                                                                   surat/surat_ket_jamkesos/surat_ket_jamkesos.php                                                     0000750 0023632 0023415 00000005671 13526507272 022416  0                                                                                                    ustar   u0_a138                         everybody                                                                                                                                                                                                              <div class="content-wrapper">
	<section class="content-header">
		<h1>Surat Keterangan Jamkesos</h1>
		<?php if($this->admin){ ?>
			<ol class="breadcrumb">
				<li><a href="<?= site_url('hom_desa/about')?>"><i class="fa fa-dashboard"></i> Home</a></li>
				<li><a href="<?= site_url('surat')?>"> Daftar Cetak Surat</a></li>
				<li class="active">Surat Keterangan Jamkesos</li>
			</ol>
		<?php } ?>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-info">
					<div class="box-header with-border">
						<a href="<?=site_url($aksi."surat")?>" class="btn btn-social btn-flat btn-default btn-sm btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"  title="Kembali Ke Daftar Wilayah">
							<i class="fa fa-arrow-circle-left "></i> Kembali Ke Daftar Cetak Surat
						</a>
					</div>
					<div class="box-body">
						<?php if($this->admin){ ?>
							<form action="" id="main" name="main" method="POST" class="form-horizontal">
								<?php include("donjo-app/views/surat/form/_cari_nik.php"); ?>
							</form>
						<?php } ?>
						<form id="validasi" action="<?= $form_action?>" method="POST" target="_blank" class="form-surat form-horizontal">
							<input type="hidden" id="url_surat" name="url_surat" value="<?= $url ?>">
							<input type="hidden" id="url_remote" name="url_remote" value="<?= site_url($aksi.'surat/nomor_surat_duplikat')?>">
							<?php if ($individu): ?>
								<?php include("donjo-app/views/surat/form/konfirmasi_pemohon.php"); ?>
							<?php	endif; ?>
							<div class="form-group">
								<label for="nomor"  class="col-sm-3 control-label">Nomor Surat</label>
								<div class="col-sm-8">
									<input  id="nomor" class="form-control input-sm required" type="text" placeholder="Nomor Surat" name="nomor" value="<?= $surat_terakhir['no_surat_berikutnya'];?>">
									<p class="help-block text-red small"><?= $surat_terakhir['ket_nomor']?><strong><?= $surat_terakhir['no_surat'];?></strong> (tgl: <?= $surat_terakhir['tanggal']?>)</p>
								</div>
							</div>
							<div class="form-group">
								<label for="no_jamkesos"  class="col-sm-3 control-label">No Kartu JAMKESOS</label>
								<div class="col-sm-8">
									<input  id="no_jamkesos" class="form-control input-sm required" type="text" placeholder="No Kartu JAMKESOS" name="no_jamkesos">
								</div>
							</div>
							<div class="form-group">
								<label for="keperluan"  class="col-sm-3 control-label">Keperluan</label>
								<div class="col-sm-8">
									<textarea name="keterangan" class="form-control input-sm required" placeholder="Keperluan"></textarea>
								</div>
							</div>
							<?php include("donjo-app/views/surat/form/tgl_berlaku.php"); ?>
							<?php include("donjo-app/views/surat/form/_pamong.php"); ?>
						</form>
					</div>
					<?php include("donjo-app/views/surat/form/tombol_cetak.php"); ?>
				</div>
			</div>
		</div>
	</section>
</div>
                                                                       surat/surat_ket_jual_beli/surat_ket_jual_beli.php                                                   0000750 0023632 0023415 00000014366 13526507272 022643  0                                                                                                    ustar   u0_a138                         everybody                                                                                                                                                                                                              <div class="content-wrapper">
	<section class="content-header">
		<h1>Surat Keterangan Jual Beli</h1>
		<?php if($this->admin){ ?>
			<ol class="breadcrumb">
				<li><a href="<?= site_url('hom_desa/about')?>"><i class="fa fa-dashboard"></i> Home</a></li>
				<li><a href="<?= site_url('surat')?>"> Daftar Cetak Surat</a></li>
				<li class="active">Surat Keterangan Jual Beli</li>
			</ol>
		<?php } ?>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-info">
					<div class="box-header with-border">
						<a href="<?=site_url($aksi."surat")?>" class="btn btn-social btn-flat btn-default btn-sm btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"  title="Kembali Ke Daftar Wilayah">
							<i class="fa fa-arrow-circle-left "></i> Kembali Ke Daftar Cetak Surat
						</a>
					</div>
					<div class="box-body">
						<?php if($this->admin){ ?>
							<form action="" id="main" name="main" method="POST" class="form-horizontal">
								<div class="col-sm-12">
									<div class="row">
										<?php include("donjo-app/views/surat/form/_cari_nik.php"); ?>
									</div>
								</div>
							</form>
						<?php } ?>
						<form id="validasi" action="<?= $form_action?>" method="POST" target="_blank" class="form-surat form-horizontal">
							<input type="hidden" id="url_surat" name="url_surat" value="<?= $url ?>">
							<input type="hidden" id="url_remote" name="url_remote" value="<?= site_url($aksi.'surat/nomor_surat_duplikat')?>">
							<div class="col-sm-12">
								<div class="row">
									<?php if ($individu): ?>
										<?php include("donjo-app/views/surat/form/konfirmasi_pemohon.php"); ?>
									<?php	endif; ?>
									<div class="form-group">
										<label for="nomor"  class="col-sm-3 control-label">Nomor Surat</label>
										<div class="col-sm-8">
											<input  id="nomor" class="form-control input-sm required" type="text" placeholder="Nomor Surat" name="nomor" value="<?= $surat_terakhir['no_surat_berikutnya'];?>">
											<p class="help-block text-red small"><?= $surat_terakhir['ket_nomor']?><strong><?= $surat_terakhir['no_surat'];?></strong> (tgl: <?= $surat_terakhir['tanggal']?>)</p>
										</div>
									</div>
								</div>
								<div class="form-group subtitle_head">
									<label class="col-sm-3 text-right"><strong>BARANG JUAL BELI</strong></label>
								</div>
								<div class="row">
									<div class="form-group">
										<label for="jenis"  class="col-sm-3 control-label">Jenis Barang</label>
										<div class="col-sm-8">
											<input type="text" name="jenis" class="form-control input-sm required" placeholder="Jenis Barang"></input>
										</div>
									</div>
									<div class="form-group">
										<label for="barang"  class="col-sm-3 control-label">Rincian Barang</label>
										<div class="col-sm-8">
											<input type="text" name="barang" class="form-control input-sm required" placeholder="Rincian Barang"></input>
										</div>
									</div>
								</div>
								<div class="form-group subtitle_head">
									<label class="col-sm-3 text-right"><strong>IDENTITAS PEMBELI</strong></label>
								</div>
								<div class="row">
									<div class="form-group">
										<label for="identitas"  class="col-sm-3 control-label">Nomor Identitas Pembeli</label>
										<div class="col-sm-8">
											<input type="text"  name="identitas" class="form-control input-sm required" placeholder="Nomor Identitas Pembeli"></input>
										</div>
									</div>
									<div class="form-group">
										<label for="nama"  class="col-sm-3 control-label">Nama Pembeli</label>
										<div class="col-sm-8">
											<input type="text"  name="nama" class="form-control input-sm required" placeholder="Nama Pembeli"></input>
										</div>
									</div>
									<div class="form-group">
										<label for="ttl"  class="col-sm-3 control-label">Tempat Tanggal Lahir Pembeli</label>
										<div class="col-sm-4">
											<input  id="tempatlahir" class="form-control input-sm required" type="text" placeholder="Tempat Lahir" name="tempatlahir">
										</div>
										<div class="col-sm-3 col-lg-2">
											<div class="input-group input-group-sm date">
												<div class="input-group-addon">
													<i class="fa fa-calendar"></i>
												</div>
												<input title="Pilih Tanggal" class="form-control input-sm datepicker required" name="tanggallahir" type="text"/>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label for="sex"  class="col-sm-3 control-label">Jenis Kelamin Pembeli</label>
										<div class="col-sm-4">
											<input type="text"  name="sex" class="form-control input-sm required" placeholder="Jenis Kelamin"></input>
										</div>
									</div>
									<div class="form-group">
										<label for="alamat"  class="col-sm-3 control-label">Alamat Pembeli</label>
										<div class="col-sm-8">
											<textarea name="alamat" class="form-control input-sm required" placeholder="Alamat Pembeli"></textarea>
										</div>
									</div>
									<div class="form-group">
										<label for="pekerjaan"  class="col-sm-3 control-label">Pekerjaan Pembeli</label>
										<div class="col-sm-8">
											<input type="text"  name="pekerjaan" class="form-control input-sm required" placeholder="Pekerjaan Pembeli"></input>
										</div>
									</div>
									<div class="form-group">
										<label for="keterangan"  class="col-sm-3 control-label">Keterangan</label>
										<div class="col-sm-8">
											<textarea  id="keterangan" class="form-control input-sm required"  placeholder="Keterangan" name="keterangan"></textarea>
										</div>
									</div>
									<div class="form-group">
										<label for="ketua_adat"  class="col-sm-3 control-label">Nama Ketua Adat</label>
										<div class="col-sm-8">
											<input type="text" name="ketua_adat" class="form-control input-sm" placeholder="Nama Ketua Adat" ></input>
										</div>
									</div>
									<?php include("donjo-app/views/surat/form/_pamong.php"); ?>
								</div>
							</div>
						</form>
					</div>
					<?php include("donjo-app/views/surat/form/tombol_cetak.php"); ?>
				</div>
			</div>
		</div>
	</section>
</div>
                                                                                                                                                                                                                                                                          surat/surat_ket_kehilangan/surat_ket_kehilangan.php                                                 0000750 0023632 0023415 00000006300 13526507272 023156  0                                                                                                    ustar   u0_a138                         everybody                                                                                                                                                                                                              <div class="content-wrapper">
	<section class="content-header">
		<h1>Surat Pengantar Laporan Kehilangan</h1>
		<?php if($this->admin){ ?>
			<ol class="breadcrumb">
				<li><a href="<?= site_url('hom_desa/about')?>"><i class="fa fa-dashboard"></i> Home</a></li>
				<li><a href="<?= site_url('surat')?>"> Daftar Cetak Surat</a></li>
				<li class="active">Surat Pengantar Laporan Kehilangan</li>
			</ol>
		<?php } ?>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-info">
					<div class="box-header with-border">
						<a href="<?=site_url($aksi."surat")?>" class="btn btn-social btn-flat btn-default btn-sm btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"  title="Kembali Ke Daftar Wilayah">
							<i class="fa fa-arrow-circle-left "></i> Kembali Ke Daftar Cetak Surat
						</a>
					</div>
					<div class="box-body">
						<?php if($this->admin){ ?>
							<form action="" id="main" name="main" method="POST" class="form-horizontal">
								<?php include("donjo-app/views/surat/form/_cari_nik.php"); ?>
							</form>
						<?php } ?>
						<form id="validasi" action="<?= $form_action?>" method="POST" target="_blank" class="form-surat form-horizontal">
							<input type="hidden" id="url_surat" name="url_surat" value="<?= $url ?>">
							<input type="hidden" id="url_remote" name="url_remote" value="<?= site_url($surat.'surat/nomor_surat_duplikat')?>">
							<?php if ($individu): ?>
								<?php include("donjo-app/views/surat/form/konfirmasi_pemohon.php"); ?>
							<?php	endif; ?>
							<div class="form-group">
								<label for="nomor"  class="col-sm-3 control-label">Nomor Surat</label>
								<div class="col-sm-8">
									<input  id="nomor" class="form-control input-sm required" type="text" placeholder="Nomor Surat" name="nomor" value="<?= $surat_terakhir['no_surat_berikutnya'];?>">
									<p class="help-block text-red small"><?= $surat_terakhir['ket_nomor']?><strong><?= $surat_terakhir['no_surat'];?></strong> (tgl: <?= $surat_terakhir['tanggal']?>)</p>
								</div>
							</div>
							<div class="form-group">
								<label for="barang"  class="col-sm-3 control-label">Barang Yang Hilang</label>
								<div class="col-sm-8">
									<input  id="barang" class="form-control input-sm required" type="text" placeholder="Barang Yang Hilang" name="barang">
								</div>
							</div>
							<div class="form-group">
								<label for="rincian"  class="col-sm-3 control-label">Rincian</label>
								<div class="col-sm-8">
									<input  id="rincian" class="form-control input-sm required" type="text" placeholder="Rincian Barang Yang Hilang" name="rincian">
								</div>
							</div>
							<div class="form-group">
								<label for="keterangan"  class="col-sm-3 control-label">Keterangan Kejadian</label>
								<div class="col-sm-8">
									<textarea name="keterangan" class="form-control input-sm required" placeholder="Keterangan Kejadian"></textarea>
								</div>
							</div>
							<?php include("donjo-app/views/surat/form/_pamong.php"); ?>
						</form>
					</div>
					<?php include("donjo-app/views/surat/form/tombol_cetak.php"); ?>
				</div>
			</div>
		</div>
	</section>
</div>
                                                                                                                                                                                                                                                                                                                                surat/surat_ket_kelahiran/surat_ket_kelahiran.php                                                   0000750 0023632 0023415 00000154120 13526507272 022654  0                                                                                                    ustar   u0_a138                         everybody                                                                                                                                                                                                              <?php if (!defined('BASEPATH')) exit('No direct script access allowed');?>
<script language="javascript" type="text/javascript">
	function ubah_saksi1(asal)
	{
		$('#saksi1').val(asal);
		if (asal == 1)
		{
			$('.saksi1_desa').show();
			$('.saksi1_luar_desa').hide();
		}
		else
		{
			$('.saksi1_desa').hide();
			$('.saksi1_luar_desa').show();
			$('#id_saksi1').val('*'); // Hapus $id_wanita
			submit_form_ambil_data();
		}
		$('input[name=anchor').val('saksi1');
	}

	function ubah_saksi2(asal)
	{
		$('#saksi2').val(asal);
		if (asal == 1)
		{
			$('.saksi2_desa').show();
			$('.saksi2_luar_desa').hide();
		}
		else
		{
			$('.saksi2_desa').hide();
			$('.saksi2_luar_desa').show();
			$('#id_saksi2').val('*'); // Hapus $id_wanita
			submit_form_ambil_data();
		}
		$('input[name=anchor').val('saksi2');
	}

	function ubah_pelapor(asal)
	{
		$('#pelapor').val(asal);
		if (asal == 1)
		{
			$('.pelapor_desa').show();
			$('.pelapor_luar_desa').hide();
		}
		else
		{
			$('.pelapor_desa').hide();
			$('.pelapor_luar_desa').show();
			$('#id_pelapor').val('*'); // Hapus $id_wanita
			submit_form_ambil_data();
		}
		$('input[name=anchor').val('pelapor');
	}

	function ubah_bayi(asal)
	{
		$('#bayi').val(asal);
		if (asal == 1)
		{
			$('.bayi_desa').show();
			$('.bayi_luar_desa').hide();
		}
		else
		{
			$('.bayi_desa').hide();
			$('.bayi_luar_desa').show();
			$('#id_bayi').val('*'); // Hapus $id_bayi
			// Hapus data kelahiran
			$('.data_lahir').val('');
			submit_form_ambil_data();
		}
		$('input[name=anchor').val('bayi');
	}

	function ubah_ibu(asal)
	{
		$('#ibu').val(asal);
		if (asal == 1)
		{
			$('.ibu_desa').show();
			$('.ibu_luar_desa').hide();
		}
		else
		{
			$('.ibu_desa').hide();
			$('.ibu_luar_desa').show();
			$('#id_ibu').val('*'); // Hapus $id_wanita
			submit_form_ambil_data();
		}
		$('input[name=anchor').val('ibu');
	}

	function nomor_surat(nomor){
		$('#nomor').val(nomor);
	}

	function _calculateAge(birthday)
	{
		// birthday is a date (dd-mm-yyyy)
		var parts = birthday.split('-');
		// Ubah menjadi format ISO yyyy-mm-dd
		// please put attention to the month (parts[0]), Javascript counts months from 0:
		// January - 0, February - 1, etc
		// https://stackoverflow.com/questions/5619202/converting-string-to-date-in-js
		var birthdate = new Date(parts[2],parts[1]-1,parts[0]);
		var ageDifMs = (new Date()).getTime() - birthdate.getTime();
		var ageDate = new Date(ageDifMs); // miliseconds from epoch
		return Math.abs(ageDate.getUTCFullYear() - 1970);
	}

	function submit_form_ambil_data()
	{
		$('input').removeClass('required');
		$('select').removeClass('required');
		$('#'+'validasi').attr('action','');
		$('#'+'validasi').attr('target','');
		$('#'+'validasi').submit();
	}

	function buat_penduduk_baru()
	{
		$('input[name=penduduk_baru]').val('1');
		$('input').removeClass('required');
		$('select').removeClass('required');
		$('.data_lahir').addClass('required');
		$('.data_lahir').addClass('required');
		$('#'+'validasi').attr('action','');
		$('#'+'validasi').attr('target','');
		$('#'+'validasi').submit();
	}

	$('document').ready(function()
	{

		/* pergi ke bagian halaman sesudah mengisi warga desa */
		location.hash = "#" + $('input[name=anchor]').val();

		/* set otomatis hari */
		$('input[name=tanggallahir]').change(function()
		{
			var hari = {
				0 : 'Minggu', 1 : 'Senin', 2 : 'Selasa', 3 : 'Rabu', 4 : 'Kamis', 5 : 'Jumat', 6 : 'Sabtu'
			};
			var t = $(this).datepicker('getDate');
			var i = t.getDay();
			$(this).closest('.form-group').find('[name=hari]').val(hari[i]);
		});

		/* set nama_sex dari pilihan */
		$('input[name=nama_sex]').val($('#sex').find(':selected').text())

	});
</script>
<div class="content-wrapper">
	<section class="content-header">
		<h1>Surat Keterangan Kelahiran</h1>
		<?php if($this->admin){ ?>
			<ol class="breadcrumb">
				<li><a href="<?= site_url('hom_desa/about')?>"><i class="fa fa-dashboard"></i> Home</a></li>
				<li><a href="<?= site_url('surat')?>"> Daftar Cetak Surat</a></li>
				<li class="active">Surat Keterangan Kelahiran</li>
			</ol>
		<?php } ?>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-info">
					<div class="box-header with-border">
						<a href="<?=site_url($aksi."surat")?>" class="btn btn-social btn-flat btn-default btn-sm btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"  title="Kembali Ke Daftar Wilayah">
							<i class="fa fa-arrow-circle-left "></i> Kembali Ke Daftar Cetak Surat
						</a>
						<a href="#" class="btn btn-social btn-flat btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Lihat Info Isian Surat"  data-toggle="modal" data-target="#infoBox" data-title="Lihat Info Isian Surat">
							<i class="fa fa-info-circle"></i> Info Isian Surat
						</a>
					</div>
					<div class="box-body">
						<form id="validasi" action="<?= $form_action?>" method="POST" target="_blank" class="form-surat form-horizontal">
							<input type="hidden" id="url_surat" name="url_surat" value="<?= $url ?>">
							<input type="hidden" id="url_remote" name="url_remote" value="<?= site_url($aksi.'surat/nomor_surat_duplikat')?>">
							<div class="col-md-12">
								<input name="anchor" type="hidden" value="<?= $anchor; ?>"/>
								<?php if ($individu): ?>
									<?php include("donjo-app/views/surat/form/konfirmasi_pemohon.php"); ?>
								<?php	endif; ?>
								<div class="form-group">
									<label for="nomor"  class="col-sm-3 control-label">Nomor Surat</label>
									<div class="col-sm-8">
										<input  id="nomor" class="form-control input-sm required" type="text" placeholder="Nomor Surat" name="nomor" value="<?= $_SESSION['post']['nomor']; ?>">
										<p class="help-block text-red small"><?= $surat_terakhir['ket_nomor']?><strong><?= $surat_terakhir['no_surat'];?></strong> (tgl: <?= $surat_terakhir['tanggal']?>)</p>
									</div>
								</div>
								<div class="form-group subtitle_head">
									<label class="col-sm-3 control-label" for="status">DATA IBU KANDUNG</label>
									<div class="btn-group col-sm-8" data-toggle="buttons">
										<label class="btn btn-info btn-flat btn-sm col-sm-4 col-sm-4 col-md-4 col-lg-3 form-check-label <?php if (!empty($ibu)): ?>active<?php endif ?>">
											<input id="ibu_1" type="radio" name="ibu" class="form-check-input" type="radio" value="1" <?php if (!empty($ibu)): ?>checked<?php endif; ?> autocomplete="off" onchange="ubah_ibu(this.value);"> Dari Database Penduduk
										</label>
										<label id="label_ibu_2" class="btn btn-info btn-flat btn-sm col-sm-4 col-md-4 col-lg-3 form-check-label <?php if (empty($ibu)): ?>active<?php endif; ?>">
											<input id="ibu_2" type="radio" name="ibu" class="form-check-input" type="radio" value="2" <?php if (empty($ibu)): ?>checked<?php endif; ?> autocomplete="off" onchange="ubah_ibu(this.value);"> Tidak Terdata
										</label>
									</div>
								</div>
								<div class="form-group ibu_desa" <?php if (empty($ibu)): ?>style="display: none;"<?php endif; ?>>
									<label for="ibu_desa"  class="col-xs-12 col-sm-3 col-lg-3 control-label bg-maroon" style="margin-top:-10px;padding-top:10px;padding-bottom:10px"><strong>DATA IBU DARI DATABASE </strong></label>
								</div>
								<div class="form-group ibu_desa" <?php if (empty($ibu)): ?>style="display: none;"<?php endif; ?>>
									<label for="ibu_desa" class="col-sm-3 control-label" ><strong>NIK / Nama Ibu</strong></label>
									<div class="col-sm-6 col-lg-4">
										<select class="form-control  input-sm select2-nik" id="id_ibu" name="id_ibu" style ="width:100%;"  onchange="submit_form_ambil_data(this.id);">
											<option value="">--  Cari NIK / Nama Ibu--</option>
											<?php foreach ($perempuan as $data): ?>
												<option value="<?= $data['id']?>" <?php selected($ibu['nik'], $data['nik']); ?>><?= $data['info_pilihan_penduduk']?></option>
											<?php endforeach;?>
										</select>
									</div>
								</div>
								<?php if ($ibu): ?>
									<?php //bagian info setelah terpilih
									$individu = $ibu;
									include("donjo-app/views/surat/form/konfirmasi_pemohon.php");
									?>
									<?php if (!empty($ayah)): ?>
										<div class="form-group" >
											<label for="ayah_desa"  class="col-xs-12 col-sm-3 col-lg-3 control-label bg-maroon" style="padding-top:10px;padding-bottom:10px"><strong>DATA AYAH DARI DATABASE </strong></label>
										</div>
										<div class="form-group">
											<label for="ayah_desa" class="col-sm-3 control-label" ><strong>NIK / Nama Ayah </strong></label>
											<div class="col-sm-8">
												<input  class="form-control input-sm" type="text" placeholder="NIK / Nama Ayah" value="<?= $ayah['nik'].' / '.$ayah['nama'] ?>" disabled>
											</div>
										</div>
										<?php
										$individu = $ayah;
										include("donjo-app/views/surat/form/konfirmasi_pemohon.php");
										?>
									<?php endif; ?>
								<?php endif; ?>
								<?php if (empty($ibu)): ?>
									<div class="form-group ibu_luar_desa" >
										<label for="ayah_desa"  class="col-xs-12 col-sm-3 col-lg-3 control-label bg-maroon" style="margin-top:-10px;padding-top:10px;padding-bottom:10px"><strong>DATA IBU TIDAK TERDATA </strong></label>
									</div>
									<div class="form-group ibu_luar_desa">
										<label for="nama_ibu"  class="col-sm-3 control-label">Nama Ibu</label>
										<div class="col-sm-8">
											<input  class="form-control input-sm required" type="text" placeholder="Nama Ibu" name="nama_ibu" value="<?= $_SESSION['post']['nama_ibu']?>">
										</div>
									</div>
									<div class="form-group ibu_luar_desa">
										<label for="nik_ibu"  class="col-sm-3 control-label">NIK Ibu</label>
										<div class="col-sm-8">
											<input  class="form-control input-sm required" type="text" placeholder="NIK Ibu" name="nik_ibu" value="<?= $_SESSION['post']['nik_ibu']?>">
										</div>
									</div>
									<div class="form-group ibu_luar_desa">
										<label for="tempat_lahir_ibu"  class="col-sm-3 control-label">Tempat  / Tanggal Lahir / Umur</label>
										<div class="col-sm-3 col-lg-4">
											<input class="form-control input-sm" type="text" name="tempat_lahir_ibu" id="tempat_lahir_ibu" placeholder="Tempat Lahir Ibu" value="<?= $_SESSION['post']['tempat_lahir_ibu']?>">
										</div>
										<div class="col-sm-3 col-lg-2">
											<div class="input-group input-group-sm date">
												<div class="input-group-addon">
													<i class="fa fa-calendar"></i>
												</div>
												<input title="Pilih Tanggal"  class="form-control input-sm required datepicker" name="tanggal_lahir_ibu" type="text" placeholder="Tgl. Lahir" value="<?= $_SESSION['post']['tanggal_lahir_ibu']?>" onchange="$('input[name=umur_ibu]').val(_calculateAge($(this).val()));"/>
											</div>
										</div>
										<div class="col-sm-2">
											<input class="form-control input-sm" name="umur_ibu" readonly="readonly" placeholder="Umur (Tahun)" type="text" value="<?= $_SESSION['post']['umur_ibu']?>">
										</div>
									</div>
									<div class="form-group ibu_luar_desa">
										<input type="hidden" name="pekerjaanid_ibu">
										<label for="pekerjaanibu" class="col-sm-3 control-label" ><strong>Pekerjaan</strong></label>
										<div class="col-sm-4">
											<select class="form-control input-sm" name="pekerjaanibu" id="pekerjaanibu" onchange="$('input[name=pekerjaanid_ibu]').val($(this).find(':selected').data('pekerjaanid'));">
												<option value="">-- Pekerjaan --</option>
												<?php foreach ($pekerjaan as $data): ?>
													<option value="<?= $data['nama']?>" data-pekerjaanid="<?= $data['id']?>" <?php if ($data['nama']==$_SESSION['post']['pekerjaanibu']): ?>selected<?php endif; ?>><?= $data['nama']?></option>
												<?php endforeach;?>
											</select>
										</div>
									</div>
									<div class="form-group ibu_luar_desa">
										<label for="ttl"  class="col-sm-3 control-label">Tanggal Perkawinan</label>
										<div class="col-sm-3 col-lg-2">
											<div class="input-group input-group-sm date">
												<div class="input-group-addon">
													<i class="fa fa-calendar"></i>
												</div>
												<input title="Pilih Tanggal" class="form-control input-sm required datepicker" name="tanggalperkawinan_ibu" type="text" value="<?= $_SESSION['post']['tanggalperkawinan_ibu']?>"/>
											</div>
										</div>
									</div>
									<div class="form-group ibu_luar_desa">
										<label for="alamat_ibu"  class="col-sm-3 control-label">Alamat / RT / RW</label>
										<div class="col-sm-4">
											<input class="form-control input-sm" type="text" name="alamat_ibu" id="alamat_ibu" placeholder="Alamat Ibu" value="<?= $_SESSION['post']['alamat_ibu']?>">
										</div>
										<div class="col-sm-2">
											<input class="form-control input-sm" type="text" name="rt_ibu" id="rt_ibu" placeholder="RT" value="<?= $_SESSION['post']['rt_ibu']?>">
										</div>
										<div class="col-sm-2">
											<input class="form-control input-sm" name="rw_ibu" id="rw_ibu"  type="text" placeholder="RW" value="<?= $_SESSION['post']['rw_ibu']?>">
										</div>
									</div>
									<div class="form-group ibu_luar_desa">
										<label for="alamat_ibu"  class="col-sm-3 control-label">Desa / Kecamatan</label>
										<div class="col-sm-4">
											<input class="form-control input-sm" type="text" name="desaibu" id="desaibu" placeholder="Desa" value="<?= $_SESSION['post']['desaibu']?>">
										</div>
										<div class="col-sm-4">
											<input class="form-control input-sm" type="text" name="kecibu" id="kecibu" placeholder="Kecamatan" value="<?= $_SESSION['post']['kecibu']?>">
										</div>
									</div>
									<div class="form-group ibu_luar_desa">
										<label for="alamat_ibu"  class="col-sm-3 control-label">Kabupaten / Provinsi</label>
										<div class="col-sm-4">
											<input class="form-control input-sm" type="text" name="kabibu" id="kabibu" placeholder="Kabupaten" value="<?= $_SESSION['post']['kabibu']?>">
										</div>
										<div class="col-sm-4">
											<input class="form-control input-sm" type="text" name="provinsiibu" id="provinsiibu" placeholder="Provinsi" value="<?= $_SESSION['post']['provinsiibu']?>">
										</div>
									</div>
								<?php endif; ?>
								<?php if (empty($ibu) or ($ibu and empty($ayah))): ?>
								<div class="form-group ibu_luar_desa" >
									<label for="ayah_desa"  class="col-xs-12 col-sm-3 col-lg-3 control-label bg-maroon" style="margin-top:10px;padding-top:10px;padding-bottom:10px"><strong>DATA AYAH TIDAK TERDATA </strong></label>
								</div>
								<div class="form-group ibu_luar_desa">
									<label for="nama_ayah"  class="col-sm-3 control-label">Nama Ayah</label>
									<div class="col-sm-8">
										<input  class="form-control input-sm required" type="text" placeholder="Nama Ayah" name="nama_ayah" value="<?= $_SESSION['post']['nama_ayah']?>">
									</div>
								</div>
								<div class="form-group ibu_luar_desa">
									<label for="nik_ayah"  class="col-sm-3 control-label">NIK Ayah</label>
									<div class="col-sm-8">
										<input  class="form-control input-sm required" type="text" placeholder="NIK Ayah" name="nik_ayah" value="<?= $_SESSION['post']['nik_ayah']?>">
									</div>
								</div>
								<div class="form-group ibu_luar_desa">
									<label for="tempat_lahir_ayah"  class="col-sm-3 control-label">Tempat  / Tanggal Lahir / Umur</label>
									<div class="col-sm-3 col-lg-4">
										<input class="form-control input-sm required" type="text" name="tempat_lahir_ayah" id="tempat_lahir_ayah" placeholder="Tempat Lahir" value="<?= $_SESSION['post']['tempat_lahir_ayah']?>">
									</div>
									<div class="col-sm-3 col-lg-2">
										<div class="input-group input-group-sm date">
											<div class="input-group-addon">
												<i class="fa fa-calendar"></i>
											</div>
											<input title="Pilih Tanggal" class="form-control input-sm required datepicker" name="tanggal_lahir_ayah" type="text" placeholder="Tgl. Lahir" value="<?= $_SESSION['post']['tempat_lahir_ayah']?>" onchange="$('input[name=umur_ayah]').val(_calculateAge($(this).val()));"/>
										</div>
									</div>
									<div class="col-sm-2">
										<input class="form-control input-sm required" name="umur_ayah" readonly="readonly" placeholder="Umur (Tahun)"  type="text" value="<?= $_SESSION['post']['umur_ayah']?>">
									</div>
								</div>
								<div class="form-group ibu_luar_desa">
									<input type="hidden" name="pekerjaanid_ayah">
									<label for="pekerjaanayah" class="col-sm-3 control-label" ><strong>Pekerjaan</strong></label>
									<div class="col-sm-4">
										<select class="form-control input-sm select2" name="pekerjaanayah" id="pekerjaanayah" style ="width:100%;"  onchange="$('input[name=pekerjaanid_ayah').val($(this).find(':selected').data('pekerjaanid'));">
											<option value="">-- Pekerjaan --</option>
											<?php foreach ($pekerjaan as $data): ?>
												<option value="<?= $data['nama']?>" data-pekerjaanid="<?= $data['id']?>" <?php if ($data['nama']==$_SESSION['post']['pekerjaanayah']): ?>selected<?php endif; ?>><?= $data['nama']?></option>
											<?php endforeach;?>
										</select>
									</div>
								</div>
								<div class="form-group ibu_luar_desa">
									<label for="alamat_ayah"  class="col-sm-3 control-label">Alamat / RT / RW</label>
									<div class="col-sm-4">
										<input class="form-control input-sm" type="text" name="alamat_ayah" id="alamat_ayah" placeholder="Alamat" value="<?= $_SESSION['post']['alamat_ayah']?>">
									</div>
									<div class="col-sm-2">
										<input class="form-control input-sm" type="text" name="rt_ayah" id="rt_ayah" placeholder="RT" value="<?= $_SESSION['post']['rt_ayah']?>">
									</div>
									<div class="col-sm-2">
										<input class="form-control input-sm" name="rw_ayah" id="rw_ayah"  type="text" placeholder="RW" value="<?= $_SESSION['post']['rw_ayah']?>">
									</div>
								</div>
								<div class="form-group ibu_luar_desa">
									<label for="alamat_ayah"  class="col-sm-3 control-label">Desa / Kecamatan</label>
									<div class="col-sm-4">
										<input class="form-control input-sm" type="text" name="desaayah" id="desaayah" placeholder="Desa" value="<?= $_SESSION['post']['desaayah']?>">
									</div>
									<div class="col-sm-4">
										<input class="form-control input-sm" type="text" name="kecayah" id="kecayah" placeholder="Kecamatan" value="<?= $_SESSION['post']['kecayah']?>">
									</div>
								</div>
								<div class="form-group ibu_luar_desa">
									<label for="alamat_ayah"  class="col-sm-3 control-label">Kabupaten / Provinsi</label>
									<div class="col-sm-4">
										<input class="form-control input-sm" type="text" name="kabayah" id="kabayah" placeholder="Kabupaten" value="<?= $_SESSION['post']['kabayah']?>">
									</div>
									<div class="col-sm-4">
										<input class="form-control input-sm" type="text" name="provinsiayah" id="provinsiayah" placeholder="Provinsi" value="<?= $_SESSION['post']['provinsiayah']?>">
									</div>
								</div>
							<?php endif; ?>
							<div class="form-group subtitle_head">
								<label class="col-sm-3 control-label" for="status">DATA KELAHIRAN </label>
								<div class="btn-group col-sm-8" data-toggle="buttons">
									<label class="btn btn-info btn-flat btn-sm col-sm-4 col-sm-4 col-md-4 col-lg-3 form-check-label <?php if (!empty($bayi)): ?>active<?php endif ?>">
										<input id="bayi_1" type="radio" name="bayi" class="form-check-input" type="radio" value="1" <?php if (!empty($bayi)): ?>checked<?php endif; ?> autocomplete="off" onchange="ubah_bayi(this.value);"> Dari Database Penduduk
									</label>
									<label id="label_bayi_2" class="btn btn-info btn-flat btn-sm col-sm-4 col-md-4 col-lg-3 form-check-label <?php if (empty($bayi)): ?>active<?php endif; ?>">
										<input id="bayi_2" type="radio" name="bayi" class="form-check-input" type="radio" value="2" <?php if (empty($bayi)): ?>checked<?php endif; ?> autocomplete="off" onchange="ubah_bayi(this.value);"> Belum Terdata
									</label>
								</div>
							</div>
							<div class="form-group bayi_desa" <?php if (empty($bayi)): ?>style="display: none;"<?php endif; ?>>
								<label class="col-xs-12 col-sm-3 col-lg-3 control-label bg-maroon" style="margin-top:-10px;padding-top:10px;padding-bottom:10px"><strong>DATA KELAHIRAN DARI DATABASE</strong></label>
							</div>
							<div class="form-group bayi_desa" <?php if (empty($bayi)): ?>style="display: none;"<?php endif; ?>>
								<label for="ibu_desa" class="col-sm-3 control-label" ><strong>NIK / Nama</strong></label>
								<div class="col-sm-6 col-lg-4">
									<select class="form-control  input-sm select2" id="id_bayi" name="id_bayi" style ="width:100%;"  onchange="submit_form_ambil_data(this.id);">
										<option value=""><?php if($bayi): ?>NIK : <?= $bayi['nik']?> - <?= $bayi['nama']?><?php else: ?>-- Cari NIK / Nama Penduduk --<?php endif; ?></option>
										<?php foreach ($anak as $data): ?>
											<option value="<?= $data['id']?>" >NIK : <?= $data['nik']." - ".$data['nama']?></option>
										<?php endforeach;?>
									</select>
								</div>
							</div>
							<?php if ($bayi): ?>
								<?php $individu = $bayi;?>
								<?php include("donjo-app/views/surat/form/konfirmasi_pemohon.php"); ?>
							<?php	endif; ?>
							<?php if (empty($bayi)): ?>
								<div class="form-group bayi_luar_desa">
									<label class="col-xs-12 col-sm-3 col-lg-3 control-label bg-maroon" style="margin-top:-10px;padding-top:10px;padding-bottom:10px"><strong>DATA KELAHIRAN BELUM TERDATA</strong></label>
								</div>
								<div class="form-group bayi_luar_desa">
									<label for="nama_bayi"  class="col-sm-3 control-label">Nama Yang Lahir</label>
									<div class="col-sm-8">
										<input type="text" name="nama_bayi" class="form-control input-sm required" placeholder="Nama Yang Lahir" value="<?= $_SESSION['post']['nama_bayi']?>"></input>
									</div>
								</div>
								<div class="form-group bayi_luar_desa">
									<label for="nik_bayi"  class="col-sm-3 control-label">NIK Yang Lahir</label>
									<div class="col-sm-8">
										<input type="text" name="nik_bayi" class="form-control input-sm required" placeholder="NIK Yang Lahir" value="<?= $_SESSION['post']['nik_bayi']?>"></input>
										<p class="help-block small">*isi tanda - jika belum memiliki NIK</p>
									</div>
								</div>
								<div class="form-group bayi_luar_desa">
									<input type="hidden" name="nama_sex">
									<label for="nama_sex"  class="col-sm-3 control-label">Jenis Kelamin</label>
									<div class="col-sm-4">
										<select name="sex" class="form-control input-sm required data_lahir" id="sex" onchange="$('input[name=nama_sex]').val($(this).find(':selected').text());">
											<option value="">Pilih Jenis Kelamin</option>
											<?php foreach ($sex as $data): ?>
												<option value="<?= $data['id']?>" <?php if ($data['id']==$_SESSION['post']['sex']): ?>selected<?php endif; ?>><?= $data['nama']?></option>
											<?php endforeach;?>
										</select>
									</div>
								</div>
							<?php	endif; ?>
							<div class="form-group">
								<label for="ttl"  class="col-sm-3 control-label">Hari / Tanggal / Jam</label>
								<div class="col-sm-3 col-lg-4">
									<input id="hari" readonly="readonly" class="form-control input-sm data_lahir" type="text" placeholder="Hari Lahir" name="hari" value="<?= $_SESSION['post']['hari']?>">
								</div>
								<div class="col-sm-3 col-lg-2">
									<div class="input-group input-group-sm date">
										<div class="input-group-addon">
											<i class="fa fa-calendar"></i>
										</div>
										<input title="Pilih Tanggal" class="form-control input-sm data_lahir required datepicker" placeholder="Tgl. Lahir" name="tanggallahir" type="text" value="<?= $_SESSION['post']['tanggallahir']?>"/>
									</div>
								</div>
								<div class="col-sm-2">
									<div class="input-group input-group-sm date">
										<div class="input-group-addon">
											<i class="fa fa-clock-o"></i>
										</div>
										<input class="form-control input-sm data_lahir required" placeholder="Jam Lahir" name="waktu_lahir" id="jammenit_1" type="text"  value="<?= $_SESSION['post']['waktu_lahir']?>"/>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="nama_sex"  class="col-sm-3 control-label">Tempat Dilahirkan</label>
								<div class="col-sm-4">
									<select name="tempat_dilahirkan" class="form-control input-sm required data_lahir" id="tempat_dilahirkan">
										<option value="">Pilih Tempat Dilahirkan</option>
										<?php foreach ($tempat_dilahirkan as $id => $nama): ?>
											<option value="<?= $id?>" <?php if ($_SESSION['post']['tempat_dilahirkan']==$id): ?>selected<?php endif; ?>><?= $nama?></option>
										<?php endforeach;?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="tempatlahir"  class="col-sm-3 control-label">Tempat Kelahiran</label>
								<div class="col-sm-8">
									<input name="tempatlahir" type="text" class="form-control input-sm required data_lahir" id="tempatlahir" placeholder="Tempat kelahiran" value="<?= $_SESSION['post']['tempatlahir']?>"/>
									<p class="help-block small">*(Nama Kota/Kabupaten)</p>
								</div>
							</div>
							<div class="form-group">
								<label for="jenis_kelahiran"  class="col-sm-3 control-label">Jenis Kelahiran</label>
								<div class="col-sm-4">
									<select name="jenis_kelahiran" class="form-control input-sm required data_lahir" id="jenis_kelahiran">
										<option value="">Pilih Jenis Kelahiran</option>
										<?php foreach ($jenis_kelahiran as $id => $nama): ?>
											<option value="<?= $id?>" <?php if ($_SESSION['post']['jenis_kelahiran']==$id): ?>selected<?php endif; ?>><?= $nama?></option>
										<?php endforeach;?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="kelahiran_anak_ke"  class="col-sm-3 control-label">Kelahiran Anak Ke</label>
								<div class="col-sm-2">
									<input type="text" name="kelahiran_anak_ke" class="form-control input-sm data_lahir required" placeholder="Anak Ke" value="<?= $_SESSION['post']['kelahiran_anak_ke']?>"></input>
								</div>
							</div>
							<div class="form-group">
								<label for="penolong_kelahiran"  class="col-sm-3 control-label">Penolong Kelahiran</label>
								<div class="col-sm-4">
									<select name="penolong_kelahiran" class="form-control input-sm required data_lahir" id="jenis_kelahiran">
										<option value="">Pilih Penolong Kelahiran</option>
										<?php foreach ($penolong_kelahiran as $id => $nama): ?>
											<option value="<?= $id?>" <?php if ($_SESSION['post']['penolong_kelahiran']==$id): ?>selected<?php endif; ?>><?= $nama?></option>
										<?php endforeach;?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="berat_lahir"  class="col-sm-3 control-label">Berat Bayi</label>
								<div class="col-sm-2">
									<div class="input-group input-group-sm">
										<input class="form-control input-sm data_lahir" placeholder="Berat Bayi" name="berat_lahir" id="input_group" type="text"  value="<?= $_SESSION['post']['berat_lahir']?>"/>
										<div class="input-group-addon" style="width:40px;">Kg</div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="panjang_lahir"  class="col-sm-3 control-label">Panjang Bayi</label>
								<div class="col-sm-2">
									<div class="input-group input-group-sm">
										<input class="form-control input-sm data_lahir" placeholder="Panjang Bayi" name="panjang_lahir" id="input_group" type="text"  value="<?= $_SESSION['post']['panjang_lahir']?>"/>
										<div class="input-group-addon" style="width:40px;">cm</div>
									</div>
								</div>
							</div>
							<?php if ($ibu and !$bayi): ?>
								<div class="form-group">
									<label class="col-sm-3 control-label">&nbsp;</label>
									<input name="penduduk_baru" type="hidden" value="">
									<div class="col-sm-2">
										<button type="button" onclick="buat_penduduk_baru();" class="btn btn-social btn-flat btn-danger btn-sm"><span class="fa fa-download">&nbsp;</span> Buat Penduduk Baru</button>
									</div>
								</div>
							<?php endif; ?>
							<div class="form-group subtitle_head">
								<label class="col-sm-3 control-label" for="status">PELAPOR </label>
								<div class="btn-group col-sm-8" data-toggle="buttons">
									<label class="btn btn-info btn-flat btn-sm col-sm-4 col-sm-4 col-md-4 col-lg-3 form-check-label <?php if (!empty($pelapor)): ?>active<?php endif ?>">
										<input id="pelapor_1" type="radio" name="pelapor" class="form-check-input" type="radio" value="1" <?php if (!empty($pelapor)): ?>checked<?php endif; ?> autocomplete="off" onchange="ubah_pelapor(this.value);"> Warga Desa
									</label>
									<label id="label_pelapor_2"  class="btn btn-info btn-flat btn-sm col-sm-4 col-md-4 col-lg-3 form-check-label <?php if (empty($pelapor)): ?>active<?php endif; ?>">
										<input id="pelapor_2" type="radio" name="pelapor" class="form-check-input" type="radio" value="2" <?php if (empty($pelapor)): ?>checked<?php endif; ?> autocomplete="off" onchange="ubah_pelapor(this.value);"> Warga Luar Desa
									</label>
								</div>
							</div>
							<div class="form-group pelapor_desa" <?php if (empty($pelapor)): ?>style="display: none;"<?php endif; ?>>
								<label class="col-xs-12 col-sm-3 col-lg-3 control-label bg-maroon" style="margin-top:-10px;padding-top:10px;padding-bottom:10px"><strong>DATA PELAPOR DARI DATABASE</strong></label>
							</div>
							<div class="form-group pelapor_desa" <?php if (empty($pelapor)): ?>style="display: none;"<?php endif; ?>>
								<label for="ibu_desa" class="col-sm-3 control-label" ><strong>NIK / Nama</strong></label>
								<div class="col-sm-6 col-lg-4">
									<select class="form-control  input-sm select2-nik" id="id_pelapor" name="id_pelapor" style ="width:100%;"  onchange="submit_form_ambil_data(this.id);">
										<option value="">--  Cari NIK / Nama Penduduk--</option>
										<?php foreach ($penduduk as $data): ?>
											<option value="<?= $data['id']?>" <?php selected($pelapor['nik'], $data['nik']); ?>><?= $data['info_pilihan_penduduk']?></option>
										<?php endforeach;?>
									</select>
								</div>
							</div>
							<?php if ($pelapor): ?>
								<?php $individu = $pelapor;?>
								<?php include("donjo-app/views/surat/form/konfirmasi_pemohon.php"); ?>
							<?php	endif; ?>
							<?php if (empty($pelapor)): ?>
								<div class="form-group pelapor_luar_desa" >
									<label for="ayah_desa"  class="col-xs-12 col-sm-3 col-lg-3 control-label bg-maroon" style="margin-top:-10px;padding-top:10px;padding-bottom:10px"><strong>DATA PELAPOR LUAR DESA </strong></label>
								</div>
								<div class="form-group pelapor_luar_desa">
									<label for="nama_pelapor"  class="col-sm-3 control-label">Nama Pelapor</label>
									<div class="col-sm-8">
										<input  class="form-control input-sm required" type="text" placeholder="Nama Pelapor" name="nama_pelapor" value="<?= $_SESSION['post']['nama_pelapor']?>">
									</div>
								</div>
								<div class="form-group pelapor_luar_desa">
									<label for="nik_pelapor"  class="col-sm-3 control-label">NIK Pelapor</label>
									<div class="col-sm-8">
										<input  class="form-control input-sm required" type="text" placeholder="NIK Pelapor" name="nik_pelapor" value="<?= $_SESSION['post']['nik_pelapor']?>">
									</div>
								</div>
								<div class="form-group pelapor_luar_desa">
									<label for="tempat_lahir_pelapor"  class="col-sm-3 control-label">Tempat  / Tanggal Lahir / Umur</label>
									<div class="col-sm-3 col-lg-4">
										<input class="form-control input-sm" type="text" name="tempat_lahir_pelapor" id="tempat_lahir_pelapor" placeholder="Tempat Lahir Pelapor" value="<?= $_SESSION['post']['tempat_lahir_pelapor']?>">
									</div>
									<div class="col-sm-3 col-lg-2">
										<div class="input-group input-group-sm date">
											<div class="input-group-addon">
												<i class="fa fa-calendar"></i>
											</div>
											<input title="Pilih Tanggal" class="form-control input-sm required datepicker" name="tanggal_lahir_pelapor" type="text" placeholder="Tgl. Lahir" value="<?= $_SESSION['post']['tanggal_lahir_pelapor']?>" onchange="$('input[name=umur_pelapor]').val(_calculateAge($(this).val()));"/>
										</div>
									</div>
									<div class="col-sm-2">
										<input class="form-control input-sm" name="umur_pelapor" readonly="readonly" placeholder="Umur (Tahun)" type="text" value="<?= $_SESSION['post']['umur_pelapor']?>">
									</div>
								</div>
								<div class="form-group pelapor_luar_desa">
									<label for="pekerjaanpelapor" class="col-sm-3 control-label" ><strong>Jenis Kelamin </strong></label>
									<div class="col-sm-4">
										<select class="form-control input-sm" name="jkpelapor" id="jkpelapor">
											<option value="">-- Jenis Kelamin --</option>
											<?php foreach ($sex as $data): ?>
												<option value="<?= $data['id']?>" <?php if ($data['id']==$_SESSION['post']['jkpelapor']): ?>selected<?php endif; ?>><?= $data['nama']?></option>
											<?php endforeach;?>
										</select>
									</div>
								</div>
								<div class="form-group pelapor_luar_desa">
									<input type="hidden" name="pekerjaanid_pelapor">
									<label for="pekerjaanpelapor" class="col-sm-3 control-label" ><strong>Pekerjaan </strong></label>
									<div class="col-sm-4">
										<select class="form-control input-sm" name="pekerjaanpelapor" id="pekerjaanpelapor" onchange="$('input[name=pekerjaanid_pelapor]').val($(this).find(':selected').data('pekerjaanid'));">
											<option value="">-- Pekerjaan --</option>
											<?php foreach ($pekerjaan as $data): ?>
												<option value="<?= $data['nama']?>" data-pekerjaanid="<?= $data['id']?>" <?php if ($data['nama']==$_SESSION['post']['pekerjaanpelapor']): ?>selected<?php endif; ?>><?= $data['nama']?></option>
											<?php endforeach;?>
										</select>
									</div>
								</div>
								<div class="form-group pelapor_luar_desa">
									<label for="alamat_pelapor"  class="col-sm-3 control-label">Alamat / RT / RW </label>
									<div class="col-sm-4">
										<input class="form-control input-sm" type="text" name="alamat_pelapor" id="alamat_pelapor" placeholder="Alamat Pelapor" value="<?= $_SESSION['post']['alamat_pelapor']?>">
									</div>
									<div class="col-sm-2">
										<input class="form-control input-sm" type="text" name="rt_pelapor" id="rt_pelapor" placeholder="RT" value="<?= $_SESSION['post']['rt_pelapor']?>">
									</div>
									<div class="col-sm-2">
										<input class="form-control input-sm" name="rw_pelapor" id="rw_pelapor"  type="text" placeholder="RW" value="<?= $_SESSION['post']['rw_pelapor']?>">
									</div>
								</div>
								<div class="form-group pelapor_luar_desa">
									<label for="alamat_pelapor"  class="col-sm-3 control-label">Desa / Kecamatan </label>
									<div class="col-sm-4">
										<input class="form-control input-sm" type="text" name="desapelapor" id="desapelapor" placeholder="Desa" value="<?= $_SESSION['post']['desapelapor']?>">
									</div>
									<div class="col-sm-4">
										<input class="form-control input-sm" type="text" name="kecpelapor" id="kecpelapor" placeholder="Kecamatan" value="<?= $_SESSION['post']['kecpelapor']?>">
									</div>
								</div>
								<div class="form-group pelapor_luar_desa">
									<label for="alamat_pelapor"  class="col-sm-3 control-label">Kabupaten / Provinsi </label>
									<div class="col-sm-4">
										<input class="form-control input-sm" type="text" name="kabpelapor" id="kabpelapor" placeholder="Kabupaten" value="<?= $_SESSION['post']['kabpelapor']?>">
									</div>
									<div class="col-sm-4">
										<input class="form-control input-sm" type="text" name="provinsipelapor" id="provinsipelapor" placeholder="Provinsi" value="<?= $_SESSION['post']['provinsipelapor']?>">
									</div>
								</div>
							<?php endif; ?>
							<div class="form-group">
								<label for="hubungan_pelapor" class="col-sm-3 control-label">Hubungan Pelapor dengan Bayi</label>
								<div class="col-sm-8">
									<input class="form-control input-sm required" type="text" placeholder="Hubungan Pelapor dengan Bayi" name="hubungan_pelapor" value="<?= $_SESSION['post']['hubungan_pelapor']?>">
								</div>
							</div>
							<div class="form-group subtitle_head">
								<label class="col-sm-3 control-label" for="status">SAKSI 1 </label>
								<div class="btn-group col-sm-8" data-toggle="buttons">
									<label class="btn btn-info btn-flat btn-sm col-sm-4 col-sm-4 col-md-4 col-lg-3 form-check-label <?php if (!empty($saksi1)): ?>active<?php endif ?>">
										<input id="saksi1_1" type="radio" name="saksi1" class="form-check-input" type="radio" value="1" <?php if (!empty($saksi1)): ?>checked<?php endif; ?> autocomplete="off" onchange="ubah_saksi1(this.value);"> Warga Desa
									</label>
									<label id="label_saksi1_2"  class="btn btn-info btn-flat btn-sm col-sm-4 col-md-4 col-lg-3 form-check-label <?php if (empty($saksi1)): ?>active<?php endif; ?>">
										<input id="saksi1_2" type="radio" name="saksi1" class="form-check-input" type="radio" value="2" <?php if (empty($saksi1)): ?>checked<?php endif; ?> autocomplete="off" onchange="ubah_saksi1(this.value);"> Warga Luar Desa
									</label>
								</div>
							</div>
							<div class="form-group saksi1_desa" <?php if (empty($saksi1)): ?>style="display: none;"<?php endif; ?>>
								<label class="col-xs-12 col-sm-3 col-lg-3 control-label bg-maroon" style="margin-top:-10px;padding-top:10px;padding-bottom:10px"><strong>DATA SAKSI 1 DARI DATABASE</strong></label>
							</div>
							<div class="form-group saksi1_desa" <?php if (empty($saksi1)): ?>style="display: none;"<?php endif; ?>>
								<label for="saksi1_desa" class="col-sm-3 control-label" ><strong>NIK / Nama</strong></label>
								<div class="col-sm-6 col-lg-4">
									<select class="form-control input-sm select2-nik" id="id_saksi1" name="id_saksi1" style ="width:100%;"  onchange="submit_form_ambil_data(this.id);">
										<option value="">--  Cari NIK / Nama Penduduk--</option>
										<?php foreach ($penduduk as $data): ?>
											<option value="<?= $data['id']?>" <?php selected($saksi1['nik'], $data['nik']); ?>><?= $data['info_pilihan_penduduk']?></option>
										<?php endforeach;?>
									</select>
								</div>
							</div>
							<?php if ($saksi1): ?>
								<?php $individu = $saksi1;?>
								<?php include("donjo-app/views/surat/form/konfirmasi_pemohon.php"); ?>
							<?php	endif; ?>
							<?php if (empty($saksi1)): ?>
								<div class="form-group saksi1_luar_desa" >
									<label for="ayah_desa"  class="col-xs-12 col-sm-3 col-lg-3 control-label bg-maroon" style="margin-top:-10px;padding-top:10px;padding-bottom:10px"><strong>DATA SAKSI 1 LUAR DESA </strong></label>
								</div>
								<div class="form-group saksi1_luar_desa">
									<label for="nama_saksi1"  class="col-sm-3 control-label">Nama Saksi</label>
									<div class="col-sm-8">
										<input  class="form-control input-sm required" type="text" placeholder="Nama Saksi" name="nama_saksi1" value="<?= $_SESSION['post']['nama_saksi1']?>">
									</div>
								</div>
								<div class="form-group saksi1_luar_desa">
									<label for="nik_saksi1"  class="col-sm-3 control-label">NIK Saksi</label>
									<div class="col-sm-8">
										<input  class="form-control input-sm required" type="text" placeholder="NIK Saksi" name="nik_saksi1" value="<?= $_SESSION['post']['nik_saksi1']?>">
									</div>
								</div>
								<div class="form-group saksi1_luar_desa">
									<label for="tempat_lahir_saksi1"  class="col-sm-3 control-label">Tempat  / Tanggal Lahir / Umur</label>
									<div class="col-sm-3 col-lg-4">
										<input class="form-control input-sm" type="text" name="tempat_lahir_saksi1" id="tempat_lahir_saksi1" placeholder="Tempat Lahir Saksi" value="<?= $_SESSION['post']['tempat_lahir_saksi1']?>">
									</div>
									<div class="col-sm-3 col-lg-2">
										<div class="input-group input-group-sm date">
											<div class="input-group-addon">
												<i class="fa fa-calendar"></i>
											</div>
											<input title="Pilih Tanggal" class="form-control input-sm required datepicker" name="tanggal_lahir_saksi1" type="text" placeholder="Tgl. Lahir" value="<?= $_SESSION['post']['tanggal_lahir_saksi1']?>" onchange="$('input[name=umur_saksi1]').val(_calculateAge($(this).val()));"/>
										</div>
									</div>
									<div class="col-sm-2">
										<input class="form-control input-sm" name="umur_saksi1" readonly="readonly" placeholder="Umur (Tahun)" type="text" value="<?= $_SESSION['post']['umur_saksi1']?>">
									</div>
								</div>
								<div class="form-group saksi1_luar_desa">
									<label for="pekerjaanpelapor" class="col-sm-3 control-label" ><strong>Jenis Kelamin </strong></label>
									<div class="col-sm-4">
										<select class="form-control input-sm" name="jksaksi1" id="jksaksi1">
											<option value="">-- Jenis Kelamin --</option>
											<?php foreach ($sex as $data): ?>
												<option value="<?= $data['id']?>" <?php if ($data['id']==$_SESSION['post']['jksaksi1']): ?>selected<?php endif; ?>><?= $data['nama']?></option>
											<?php endforeach;?>
										</select>
									</div>
								</div>
								<div class="form-group saksi1_luar_desa">
									<input type="hidden" name="pekerjaanid_saksi1">
									<label for="pekerjaansaksi1" class="col-sm-3 control-label" ><strong>Pekerjaan </strong></label>
									<div class="col-sm-4">
										<select class="form-control input-sm" name="pekerjaansaksi1" id="pekerjaansaksi1" onchange="$('input[name=pekerjaanid_saksi1]').val($(this).find(':selected').data('pekerjaanid'));">
											<option value="">-- Pekerjaan --</option>
											<?php foreach ($pekerjaan as $data): ?>
												<option value="<?= $data['nama']?>" data-pekerjaanid="<?= $data['id']?>" <?php if ($data['nama']==$_SESSION['post']['pekerjaansaksi1']): ?>selected<?php endif; ?>><?= $data['nama']?></option>
											<?php endforeach;?>
										</select>
									</div>
								</div>
								<div class="form-group saksi1_luar_desa">
									<label for="alamat_saksi1"  class="col-sm-3 control-label">Alamat / RT / RW </label>
									<div class="col-sm-4">
										<input class="form-control input-sm" type="text" name="alamat_saksi1" id="alamat_saksi1" placeholder="Alamat Saksi" value="<?= $_SESSION['post']['alamat_saksi1']?>">
									</div>
									<div class="col-sm-2">
										<input class="form-control input-sm" type="text" name="rt_saksi1" id="rt_saksi1" placeholder="RT" value="<?= $_SESSION['post']['rt_saksi1']?>">
									</div>
									<div class="col-sm-2">
										<input class="form-control input-sm" name="rw_saksi1" id="rw_saksi1"  type="text" placeholder="RW" value="<?= $_SESSION['post']['rw_saksi1']?>">
									</div>
								</div>
								<div class="form-group saksi1_luar_desa">
									<label for="alamat_saksi1"  class="col-sm-3 control-label">Desa / Kecamatan </label>
									<div class="col-sm-4">
										<input class="form-control input-sm" type="text" name="desasaksi1" id="desasaksi1" placeholder="Desa" value="<?= $_SESSION['post']['desasaksi1']?>">
									</div>
									<div class="col-sm-4">
										<input class="form-control input-sm" type="text" name="kecsaksi1" id="kecsaksi1" placeholder="Kecamatan" value="<?= $_SESSION['post']['kecsaksi1']?>">
									</div>
								</div>
								<div class="form-group saksi1_luar_desa">
									<label for="alamat_saksi1"  class="col-sm-3 control-label">Kabupaten / Provinsi </label>
									<div class="col-sm-4">
										<input class="form-control input-sm" type="text" name="kabsaksi1" id="kabsaksi1" placeholder="Kabupaten" value="<?= $_SESSION['post']['kabsaksi1']?>">
									</div>
									<div class="col-sm-4">
										<input class="form-control input-sm" type="text" name="provinsisaksi1" id="provinsisaksi1" placeholder="Provinsi" value="<?= $_SESSION['post']['provinsisaksi1']?>">
									</div>
								</div>
							<?php endif; ?>
							<div class="form-group subtitle_head">
								<label class="col-sm-3 control-label" for="status">SAKSI 2 </label>
								<div class="btn-group col-sm-8" data-toggle="buttons">
									<label class="btn btn-info btn-flat btn-sm col-sm-4 col-sm-4 col-md-4 col-lg-3 form-check-label <?php if (!empty($saksi2)): ?>active<?php endif ?>">
										<input id="saksi2_1" type="radio" name="saksi2" class="form-check-input" type="radio" value="1" <?php if (!empty($saksi2)): ?>checked<?php endif; ?> autocomplete="off" onchange="ubah_saksi2(this.value);"> Warga Desa
									</label>
									<label id="label_saksi2_2"  class="btn btn-info btn-flat btn-sm col-sm-4 col-md-4 col-lg-3 form-check-label <?php if (empty($saksi2)): ?>active<?php endif; ?>">
										<input id="saksi2_2" type="radio" name="saksi2" class="form-check-input" type="radio" value="2" <?php if (empty($saksi2)): ?>checked<?php endif; ?> autocomplete="off" onchange="ubah_saksi2(this.value);"> Warga Luar Desa
									</label>
								</div>
							</div>
							<div class="form-group saksi2_desa" <?php if (empty($saksi2)): ?>style="display: none;"<?php endif; ?>>
								<label class="col-xs-12 col-sm-3 col-lg-3 control-label bg-maroon" style="margin-top:-10px;padding-top:10px;padding-bottom:10px"><strong>DATA SAKSI 2 DARI DATABASE</strong></label>
							</div>
							<div class="form-group saksi2_desa" <?php if (empty($saksi2)): ?>style="display: none;"<?php endif; ?>>
								<label for="saksi2_desa" class="col-sm-3 control-label" ><strong>NIK / Nama</strong></label>
								<div class="col-sm-6 col-lg-4">
									<select class="form-control input-sm select2-nik" id="id_saksi2" name="id_saksi2" style ="width:100%;"  onchange="submit_form_ambil_data(this.id);">
										<option value="">--  Cari NIK / Nama Penduduk--</option>
										<?php foreach ($penduduk as $data): ?>
											<option value="<?= $data['id']?>" <?php selected($saksi2['nik'], $data['nik']); ?>><?= $data['info_pilihan_penduduk']?></option>
										<?php endforeach;?>
									</select>
								</div>
							</div>
							<?php if ($saksi2): ?>
								<?php $individu = $saksi2;?>
								<?php include("donjo-app/views/surat/form/konfirmasi_pemohon.php"); ?>
							<?php	endif; ?>
							<?php if (empty($saksi2)): ?>
								<div class="form-group saksi2_luar_desa" >
									<label for="ayah_desa"  class="col-xs-12 col-sm-3 col-lg-3 control-label bg-maroon" style="margin-top:-10px;padding-top:10px;padding-bottom:10px"><strong>DATA SAKSI 2 LUAR DESA </strong></label>
								</div>
								<div class="form-group saksi2_luar_desa">
									<label for="nama_saksi2"  class="col-sm-3 control-label">Nama Saksi</label>
									<div class="col-sm-8">
										<input  class="form-control input-sm required" type="text" placeholder="Nama Saksi" name="nama_saksi2" value="<?= $_SESSION['post']['nama_saksi2']?>">
									</div>
								</div>
								<div class="form-group saksi2_luar_desa">
									<label for="nik_saksi2"  class="col-sm-3 control-label">NIK Saksi</label>
									<div class="col-sm-8">
										<input  class="form-control input-sm required" type="text" placeholder="NIK Saksi" name="nik_saksi2" value="<?= $_SESSION['post']['nik_saksi2']?>">
									</div>
								</div>
								<div class="form-group saksi2_luar_desa">
									<label for="tempat_lahir_saksi2"  class="col-sm-3 control-label">Tempat  / Tanggal Lahir / Umur</label>
									<div class="col-sm-3 col-lg-4">
										<input class="form-control input-sm" type="text" name="tempat_lahir_saksi2" id="tempat_lahir_saksi2" placeholder="Tempat Lahir Saksi" value="<?= $_SESSION['post']['tempat_lahir_saksi2']?>">
									</div>
									<div class="col-sm-3 col-lg-2">
										<div class="input-group input-group-sm date">
											<div class="input-group-addon">
												<i class="fa fa-calendar"></i>
											</div>
											<input title="Pilih Tanggal" class="form-control input-sm datepicker required" name="tanggal_lahir_saksi2" type="text" placeholder="Tgl. Lahir" value="<?= $_SESSION['post']['tanggal_lahir_saksi2']?>" onchange="$('input[name=umur_saksi2]').val(_calculateAge($(this).val()));"/>
										</div>
									</div>
									<div class="col-sm-2">
										<input class="form-control input-sm" name="umur_saksi2" readonly="readonly" placeholder="Umur (Tahun)" type="text" value="<?= $_SESSION['post']['umur_saksi2']?>">
									</div>
								</div>
								<div class="form-group saksi2_luar_desa">
									<label for="pekerjaanpelapor" class="col-sm-3 control-label" ><strong>Jenis Kelamin </strong></label>
									<div class="col-sm-4">
										<select class="form-control input-sm" name="jksaksi2" id="jksaksi2">
											<option value="">-- Jenis Kelamin --</option>
											<?php foreach ($sex as $data): ?>
												<option value="<?= $data['id']?>" <?php if ($data['id']==$_SESSION['post']['jksaksi2']): ?>selected<?php endif; ?>><?= $data['nama']?></option>
											<?php endforeach;?>
										</select>
									</div>
								</div>
								<div class="form-group saksi2_luar_desa">
									<input type="hidden" name="pekerjaanid_saksi2">
									<label for="pekerjaansaksi2" class="col-sm-3 control-label" ><strong>Pekerjaan </strong></label>
									<div class="col-sm-4">
										<select class="form-control input-sm" name="pekerjaansaksi2" id="pekerjaansaksi2" onchange="$('input[name=pekerjaanid_saksi2]').val($(this).find(':selected').data('pekerjaanid'));">
											<option value="">-- Pekerjaan --</option>
											<?php foreach ($pekerjaan as $data): ?>
												<option value="<?= $data['nama']?>" data-pekerjaanid="<?= $data['id']?>" <?php if ($data['nama']==$_SESSION['post']['pekerjaansaksi2']): ?>selected<?php endif; ?>><?= $data['nama']?></option>
											<?php endforeach;?>
										</select>
									</div>
								</div>
								<div class="form-group saksi2_luar_desa">
									<label for="alamat_saksi2"  class="col-sm-3 control-label">Alamat / RT / RW </label>
									<div class="col-sm-4">
										<input class="form-control input-sm" type="text" name="alamat_saksi2" id="alamat_saksi2" placeholder="Alamat Saksi" value="<?= $_SESSION['post']['alamat_saksi2']?>">
									</div>
									<div class="col-sm-2">
										<input class="form-control input-sm" type="text" name="rt_saksi2" id="rt_saksi2" placeholder="RT" value="<?= $_SESSION['post']['rt_saksi2']?>">
									</div>
									<div class="col-sm-2">
										<input class="form-control input-sm" name="rw_saksi2" id="rw_saksi2"  type="text" placeholder="RW" value="<?= $_SESSION['post']['rw_saksi2']?>">
									</div>
								</div>
								<div class="form-group saksi2_luar_desa">
									<label for="alamat_saksi2"  class="col-sm-3 control-label">Desa / Kecamatan </label>
									<div class="col-sm-4">
										<input class="form-control input-sm" type="text" name="desasaksi2" id="desasaksi2" placeholder="Desa" value="<?= $_SESSION['post']['desasaksi2']?>">
									</div>
									<div class="col-sm-4">
										<input class="form-control input-sm" type="text" name="kecsaksi2" id="kecsaksi2" placeholder="Kecamatan" value="<?= $_SESSION['post']['kecsaksi2']?>">
									</div>
								</div>
								<div class="form-group saksi2_luar_desa">
									<label for="alamat_saksi2"  class="col-sm-3 control-label">Kabupaten / Provinsi </label>
									<div class="col-sm-4">
										<input class="form-control input-sm" type="text" name="kabsaksi2" id="kabsaksi2" placeholder="Kabupaten" value="<?= $_SESSION['post']['kabsaksi2']?>">
									</div>
									<div class="col-sm-4">
										<input class="form-control input-sm" type="text" name="provinsisaksi2" id="provinsisaksi2" placeholder="Provinsi" value="<?= $_SESSION['post']['provinsisaksi2']?>">
									</div>
								</div>
							<?php endif; ?>
							<div class="form-group">
								<label class="col-xs-12 col-sm-3 col-lg-3 control-label bg-maroon" style="margin-top:10px;padding-top:10px;padding-bottom:10px"><strong>PENANDA TANGAN</strong></label>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Lokasi Disdukcapil <?= ucwords($this->setting->sebutan_kabupaten)?></label>
								<div class="col-sm-8">
									<input class="form-control input-sm required" type="text" name="lokasi_disdukcapil" id="lokasi_disdukcapil" placeholder="Lokasi Disdukcapil" value="<?= $_SESSION['post']['lokasi_disdukcapil']?>">
								</div>
							</div>
							<?php include("donjo-app/views/surat/form/_pamong.php"); ?>
						</div>
					</form>
				</div>
				<?php include("donjo-app/views/surat/form/tombol_cetak.php"); ?>
			</div>
			<div class='modal fade' id='infoBox' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
				<div class='modal-dialog'>
					<div class='modal-content'>
						<div class='modal-header btn-default'>
							<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
							<h4 class='modal-title' id='myModalLabel'><i class='fa fa-info-circle'></i>&nbsp;&nbsp;Info Isian Surat</h4>
						</div>
						<div class='modal-body small'>
							<h5><strong>Form ini menghasilkan:</strong></h5>
							<ol>
								<li>Surat Keterangan Kelahiran</li>
								<li>Permohonan Penyelesaian Akta Kelahiran</li>
								<li>Lampiran F-2.01 SURAT KETERANGAN KELAHIRAN bagi warga yang akan dibuatkan akta kelahiran</li>
							</ol>
							<p>Pastikan semua biodata orang tua warga yang lahir, pelapor dan saksi-saksi sudah lengkap sebelum mencetak surat dan lampiran. </p>
							<p>Untuk melengkapi data itu, ubah data warga yang bersangkutan di form isian penduduk di modul Penduduk.</p>
							<p>PERHATIAN: setelah Export Doc, pengisian/perubahan data kelahiran akan direkam ke database penduduk.</p>
						</div>
						<div class='modal-footer btn-default'>
							<button type="button" class="btn btn-social btn-flat btn-danger btn-sm" data-dismiss="modal"><i class='fa fa-sign-out'></i> Tutup</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
</div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                surat/surat_ket_kematian/surat_ket_kematian.php                                                     0000750 0023632 0023415 00000134360 13526507272 022346  0                                                                                                    ustar   u0_a138                         everybody                                                                                                                                                                                                              <?php if (!defined('BASEPATH')) exit('No direct script access allowed');?>
<script language="javascript" type="text/javascript">
	function ubah_saksi1(asal)
	{
		if (asal == 1)
		{
			$('.saksi1_desa').show();
			$('.saksi1_luar_desa').hide();
			$('input[name=anchor').val('a_saksi1');
		}
		else
		{
			$('.saksi1_desa').hide();
			$('.saksi1_luar_desa').show();
			$('#id_saksi1').val('*'); // Hapus $id_saksi1
			submit_form_ambil_data('a_saksi1');
		}
	}

	function ubah_saksi2(asal)
	{
		if (asal == 1)
		{
			$('.saksi2_desa').show();
			$('.saksi2_luar_desa').hide();
			$('input[name=anchor').val('a_saksi2');
		}
		else
		{
			$('.saksi2_desa').hide();
			$('.saksi2_luar_desa').show();
			$('#id_saksi2').val('*'); // Hapus $id_saksi2
			submit_form_ambil_data('a_saksi2');
		}
	}

	function ubah_pelapor(asal){
		if (asal == 1)
		{
			$('.pelapor_desa').show();
			$('.pelapor_luar_desa').hide();
			$('input[name=anchor').val('a_pelapor');
		}
		else
		{
			$('.pelapor_desa').hide();
			$('.pelapor_luar_desa').show();
			$('#id_pelapor').val('*'); // Hapus $id_pelapor
			submit_form_ambil_data('a_pelapor');
		}
	}

	function _calculateAge(birthday)
	{ // birthday is a date (dd-mm-yyyy)
		if (birthday)
		{
			var parts = birthday.split('-');
			// Ubah menjadi format ISO yyyy-mm-dd
			// please put attention to the month (parts[0]), Javascript counts months from 0:
			// January - 0, February - 1, etc
			// https://stackoverflow.com/questions/5619202/converting-string-to-date-in-js
			var birthdate = new Date(parts[2],parts[1]-1,parts[0]);
			var ageDifMs = (new Date()).getTime() - birthdate.getTime();
			var ageDate = new Date(ageDifMs); // miliseconds from epoch
			return Math.abs(ageDate.getUTCFullYear() - 1970);
		}
	}

	function submit_form_ambil_data(jenis)
	{
		$('input[name=anchor').val(jenis);
		$('input').removeClass('required');
		$('select').removeClass('required');
		$('#'+'validasi').attr('action','');
		$('#'+'validasi').attr('target','');
		$('#'+'validasi').submit();
	}

	$('document').ready(function()
	{
		/* set otomatis hari */
		$('input[name=tanggal_mati]').change(function(){
			var hari = {
				0 : 'Minggu', 1 : 'Senin', 2 : 'Selasa', 3 : 'Rabu', 4 : 'Kamis', 5 : 'Jumat', 6 : 'Sabtu'
			};
			var t = $(this).datepicker('getDate');
			var i = t.getDay();
			$(this).closest('.form-group').find('[name=hari]').val(hari[i]);
		});
		/* pergi ke bagian halaman sesudah mengisi warga desa */
		setTimeout(function() {location.hash = "#" + $('input[name=anchor]').val();}, 500);
	});
</script>
<div class="content-wrapper">
	<section class="content-header">
		<h1>Surat Keterangan Kematian</h1>
		<?php if($this->admin){ ?>
			<ol class="breadcrumb">
				<li><a href="<?= site_url('hom_desa/about')?>"><i class="fa fa-dashboard"></i> Home</a></li>
				<li><a href="<?= site_url('surat')?>"> Daftar Cetak Surat</a></li>
				<li class="active">Surat Keterangan Kematian</li>
			</ol>
		<?php } ?>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-info">
					<div class="box-header with-border">
						<a href="<?=site_url($aksi."surat")?>" class="btn btn-social btn-flat btn-default btn-sm btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"  title="Kembali Ke Daftar Wilayah">
							<i class="fa fa-arrow-circle-left "></i> Kembali Ke Daftar Cetak Surat
						</a>
						<a href="#" class="btn btn-social btn-flat btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Lihat Info Isian Surat"  data-toggle="modal" data-target="#infoBox" data-title="Lihat Info Isian Surat">
							<i class="fa fa-info-circle"></i> Info Isian Surat
						</a>
					</div>
					<div class="box-body">
						<?php if($this->admin){ ?>
							<form action="" id="main" name="main" method="POST" class="form-horizontal">
								<div class="col-md-12">
									<div class="form-group">
										<label for="nik"  class="col-sm-3 control-label">NIK / Nama Yang Meninggal</label>
										<div class="col-sm-6 col-lg-4">
											<select class="form-control  input-sm select2-nik" id="nik" name="nik" style ="width:100%;" onchange="formAction('main')">
												<option value="">--  Cari NIK / Nama Penduduk Berstatus Dasar 'MATI' --</option>
												<?php foreach ($mati as $data): ?>
													<option value="<?= $data['id']?>" <?php selected($individu['nik'], $data['nik']); ?>><?= $data['info_pilihan_penduduk']?></option>
												<?php endforeach;?>
											</select>
										</div>
									</div>
								</div>
							</form>
						<?php } ?>
						<form id="validasi" action="<?= $form_action?>" method="POST" target="_blank" class="form-surat form-horizontal">
							<input type="hidden" id="url_surat" name="url_surat" value="<?= $url ?>">
							<input type="hidden" id="url_remote" name="url_remote" value="<?= site_url($aksi.'surat/nomor_surat_duplikat')?>">
							<div class="col-md-12">
								<input name="anchor" type="hidden" value="<?= $anchor; ?>"/>
								<?php if ($individu): ?>
									<?php include("donjo-app/views/surat/form/konfirmasi_pemohon.php"); ?>
								<?php	endif; ?>
								<div class="form-group">
									<label for="nomor"  class="col-sm-3 control-label">Nomor Surat</label>
									<div class="col-sm-8">
										<input  id="nomor" class="form-control input-sm required" type="text" placeholder="Nomor Surat" name="nomor" value="<?= $_SESSION['post']['nomor']; ?>">
										<p class="help-block text-red small"><?= $surat_terakhir['ket_nomor']?><strong><?= $surat_terakhir['no_surat'];?></strong> (tgl: <?= $surat_terakhir['tanggal']?>)</p>
									</div>
								</div>
								<div class="form-group">
									<label for="ttl"  class="col-sm-3 control-label">Hari / Tanggal / Jam Kematian</label>
									<div class="col-sm-3 col-lg-4">
										<input  id="hari" readonly="readonly" class="form-control input-sm" type="text" placeholder="Hari Kematian" name="hari" value="<?= $_SESSION['post']['hari']?>">
									</div>
									<div class="col-sm-3 col-lg-2">
										<div class="input-group input-group-sm date">
											<div class="input-group-addon">
												<i class="fa fa-calendar"></i>
											</div>
											<input title="Pilih Tanggal" class="form-control input-sm required datepicker" name="tanggal_mati" type="text" value="<?= $_SESSION['post']['tanggal_mati']?>"/>
										</div>
									</div>
									<div class="col-sm-2">
										<div class="input-group input-group-sm date">
											<div class="input-group-addon">
												<i class="fa fa-clock-o"></i>
											</div>
											<input class="form-control input-sm required" name="jam" id="jammenit_1" type="text" value="<?= $_SESSION['post']['jam']?>"/>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label for="tempat_mati"  class="col-sm-3 control-label">Tempat Meninggal</label>
									<div class="col-sm-8">
										<input type="text" name="tempat_mati" class="form-control input-sm required" placeholder="Tempat Meninggal" value="<?= $_SESSION['post']['tempat_mati']?>"></input>
									</div>
								</div>
								<div class="form-group">
									<label for="sebab" class="col-sm-3 control-label" >Penyebab Kematian</label>
									<div class="col-sm-4">
										<input name="sebab_nama" type="hidden" value="<?= $sebab[$_SESSION['post']['sebab']] ?>">
										<select class="form-control input-sm required" name="sebab" onchange="$('input[name=sebab_nama]').val($(this).find(':selected').data('sebabnama'));">
											<option value="">Pilih Sebab</option>
											<?php foreach ($sebab as $id => $nama): ?>
												<option value="<?= $id?>" data-sebabnama="<?= $nama; ?>" <?php if ($id==$_SESSION['post']['sebab']): ?>selected<?php endif; ?>><?= $nama; ?></option>
											<?php endforeach;?>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label for="sebab" class="col-sm-3 control-label"> Yang Menerangkan</label>
									<div class="col-sm-4">
										<select class="form-control input-sm required" name="penolong_mati">
											<option value="">Pilih Penolong mati</option>
											<?php foreach ($penolong_mati as $id => $nama): ?>
												<option value="<?= $id?>" <?php if ($id==$_SESSION['post']['penolong_mati']): ?>selected<?php endif; ?>><?= $nama; ?></option>
											<?php endforeach;?>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label for="anakke"  class="col-sm-3 control-label">Anak Ke</label>
									<div class="col-sm-2">
										<input type="text" name="anakke" class="form-control input-sm data_lahir required" placeholder="Anak Ke" value="<?= $_SESSION['post']['anakke']?>"></input>
									</div>
								</div>
								<!-- AYAH -->
								<?php if ($ayah): ?>
									<div class="form-group ibu_desa">
										<label class="col-sm-3 control-label text-red" ><strong>DATA AYAH DARI DATABASE</strong></label>
									</div>
									<div class="form-group ibu_desa">
										<label class="col-sm-3 control-label">NIK</label>
										<div class="col-sm-8">
											<input type="text" class="form-control input-sm" value="<?= $ayah['nik']?>" disabled></input>
										</div>
									</div>
									<div class="form-group ibu_desa">
										<label class="col-sm-3 control-label">Nama</label>
										<div class="col-sm-8">
											<input type="text" class="form-control input-sm" value="<?= $ayah['nama']?>" disabled></input>
										</div>
									</div>
									<?php //bagian info setelah terpilih
									$individu = $ayah;
									include("donjo-app/views/surat/form/konfirmasi_pemohon.php");
									?>
								<?php endif; ?>
								<?php if ($jenazah and empty($ayah)): ?>
									<div class="form-group ibu_luar_desa" >
										<label for="ayah_desa"  class="col-sm-3 control-label text-red" ><strong>DATA AYAH TIDAK TERDATA</strong></label>
									</div>
									<div class="form-group ibu_luar_desa">
										<label for="nama_ayah"  class="col-sm-3 control-label">Nama Ayah</label>
										<div class="col-sm-8">
											<input  class="form-control input-sm required" type="text" placeholder="Nama Ayah" name="nama_ayah" value="<?= $_SESSION['post']['nama_ayah']?>">
										</div>
									</div>
									<div class="form-group ibu_luar_desa">
										<label for="nik_ayah"  class="col-sm-3 control-label">NIK Ayah</label>
										<div class="col-sm-8">
											<input  class="form-control input-sm" type="text" placeholder="NIK Ayah" name="nik_ayah" value="<?= $_SESSION['post']['nik_ayah']?>">
										</div>
									</div>
									<div class="form-group ibu_luar_desa">
										<label for="tempat_lahir_ayah"  class="col-sm-3 control-label">Tempat  / Tanggal Lahir / Umur</label>
										<div class="col-sm-3 col-lg-4">
											<input class="form-control input-sm" type="text" name="tempat_lahir_ayah" id="tempat_lahir_ayah" placeholder="Tempat Lahir" value="<?= $_SESSION['post']['tempat_lahir_ayah']?>">
										</div>
										<div class="col-sm-3 col-lg-2">
											<div class="input-group input-group-sm date">
												<div class="input-group-addon">
													<i class="fa fa-calendar"></i>
												</div>
												<input title="Pilih Tanggal" class="form-control input-sm datepicker" name="tanggal_lahir_ayah" type="text" placeholder="Tgl. Lahir" value="<?= $_SESSION['post']['tempat_lahir_ayah']?>" onchange="$('input[name=umur_ayah]').val(_calculateAge($(this).val()));"/>
											</div>
										</div>
										<div class="col-sm-2">
											<input class="form-control input-sm" name="umur_ayah" readonly="readonly" placeholder="Umur (Tahun)"  type="text" value="<?= $_SESSION['post']['umur_ayah']?>">
										</div>
									</div>
									<div class="form-group ibu_luar_desa">
										<label for="pekerjaanayah" class="col-sm-3 control-label" ><strong>Pekerjaan</strong></label>
										<div class="col-sm-4">
											<select class="form-control input-sm select2" name="pekerjaanayah" id="pekerjaanayah" style ="width:100%;"  onchange="$('input[name=pekerjaanid_ayah').val($(this).find(':selected').data('pekerjaanid'));">
												<option value="">-- Pekerjaan --</option>
												<?php foreach ($pekerjaan as $data): ?>
													<option value="<?= $data['nama']?>" data-pekerjaanid="<?= $data['id']?>" <?php if ($data['nama']==$_SESSION['post']['pekerjaanayah']): ?>selected<?php endif; ?>><?= $data['nama']?></option>
												<?php endforeach;?>
											</select>
										</div>
									</div>
									<div class="form-group ibu_luar_desa">
										<label for="alamat_ayah"  class="col-sm-3 control-label">Alamat / RT / RW</label>
										<div class="col-sm-4">
											<input class="form-control input-sm" type="text" name="alamat_ayah" id="alamat_ayah" placeholder="Alamat" value="<?= $_SESSION['post']['alamat_ayah']?>">
										</div>
										<div class="col-sm-2">
											<input class="form-control input-sm" type="text" name="rt_ayah" id="rt_ayah" placeholder="RT" value="<?= $_SESSION['post']['rt_ayah']?>">
										</div>
										<div class="col-sm-2">
											<input class="form-control input-sm" name="rw_ayah" id="rw_ayah"  type="text" placeholder="RW" value="<?= $_SESSION['post']['rw_ayah']?>">
										</div>
									</div>
									<div class="form-group ibu_luar_desa">
										<label for="alamat_ayah"  class="col-sm-3 control-label">Desa / Kecamatan</label>
										<div class="col-sm-4">
											<input class="form-control input-sm" type="text" name="desaayah" id="desaayah" placeholder="Desa" value="<?= $_SESSION['post']['desaayah']?>">
										</div>
										<div class="col-sm-4">
											<input class="form-control input-sm" type="text" name="kecayah" id="kecayah" placeholder="Kecamatan" value="<?= $_SESSION['post']['kecayah']?>">
										</div>
									</div>
									<div class="form-group ibu_luar_desa">
										<label for="alamat_ayah"  class="col-sm-3 control-label">Kabupaten / Provinsi</label>
										<div class="col-sm-4">
											<input class="form-control input-sm" type="text" name="kabayah" id="kabayah" placeholder="Kabupaten" value="<?= $_SESSION['post']['kabayah']?>">
										</div>
										<div class="col-sm-4">
											<input class="form-control input-sm" type="text" name="provinsiayah" id="provinsiayah" placeholder="Provinsi" value="<?= $_SESSION['post']['provinsiayah']?>">
										</div>
									</div>
								<?php endif; ?>
								<?php if ($ibu): ?>
									<div class="form-group ibu_desa">
										<label class="col-sm-3 control-label text-red" ><strong>DATA IBU DARI DATABASE</strong></label>
									</div>
									<div class="form-group ibu_desa">
										<label class="col-sm-3 control-label">NIK</label>
										<div class="col-sm-8">
											<input type="text" class="form-control input-sm" value="<?= $ibu['nik']?>" disabled></input>
										</div>
									</div>
									<div class="form-group ibu_desa">
										<label class="col-sm-3 control-label">Nama</label>
										<div class="col-sm-8">
											<input type="text" class="form-control input-sm" value="<?= $ibu['nama']?>" disabled></input>
										</div>
									</div>
									<?php //bagian info setelah terpilih
									$individu = $ibu;
									include("donjo-app/views/surat/form/konfirmasi_pemohon.php");
									?>
								<?php endif; ?>
								<?php if ($jenazah and empty($ibu)): ?>
									<div class="form-group ibu_luar_desa" >
										<label class="col-sm-3 control-label text-red" ><strong>DATA IBU TIDAK TERDATA</strong></label>
									</div>
									<div class="form-group ibu_luar_desa">
										<label for="nama_ibu"  class="col-sm-3 control-label">Nama Ibu</label>
										<div class="col-sm-8">
											<input  class="form-control input-sm required" type="text" placeholder="Nama Ibu" name="nama_ibu" value="<?= $_SESSION['post']['nama_ibu']?>">
										</div>
									</div>
									<div class="form-group ibu_luar_desa">
										<label for="nik_ibu"  class="col-sm-3 control-label">NIK Ibu</label>
										<div class="col-sm-8">
											<input  class="form-control input-sm" type="text" placeholder="NIK Ibu" name="nik_ibu" value="<?= $_SESSION['post']['nik_ibu']?>">
										</div>
									</div>
									<div class="form-group ibu_luar_desa">
										<label for="tempat_lahir_ibu"  class="col-sm-3 control-label">Tempat  / Tanggal Lahir / Umur</label>
										<div class="col-sm-3 col-lg-4">
											<input class="form-control input-sm" type="text" name="tempat_lahir_ibu" id="tempat_lahir_ibu" placeholder="Tempat Lahir Ibu" value="<?= $_SESSION['post']['tempat_lahir_ibu']?>">
										</div>
										<div class="col-sm-3 col-lg-2">
											<div class="input-group input-group-sm date">
												<div class="input-group-addon">
													<i class="fa fa-calendar"></i>
												</div>
												<input title="Pilih Tanggal" class="form-control input-sm datepicker" name="tanggal_lahir_ibu" type="text" placeholder="Tgl. Lahir" value="<?= $_SESSION['post']['tanggal_lahir_ibu']?>" onchange="$('input[name=umur_ibu]').val(_calculateAge($(this).val()));"/>
											</div>
										</div>
										<div class="col-sm-2">
											<input class="form-control input-sm" name="umur_ibu" readonly="readonly" placeholder="Umur (Tahun)" type="text" value="<?= $_SESSION['post']['umur_ibu']?>">
										</div>
									</div>
									<div class="form-group ibu_luar_desa">
										<label for="pekerjaanibu" class="col-sm-3 control-label" ><strong>Pekerjaan</strong></label>
										<div class="col-sm-4">
											<select class="form-control input-sm" name="pekerjaanibu" id="pekerjaanibu" onchange="$('input[name=pekerjaanid_ibu]').val($(this).find(':selected').data('pekerjaanid'));">
												<option value="">-- Pekerjaan --</option>
												<?php foreach ($pekerjaan as $data): ?>
													<option value="<?= $data['nama']?>" data-pekerjaanid="<?= $data['id']?>" <?php if ($data['nama']==$_SESSION['post']['pekerjaanibu']): ?>selected<?php endif; ?>><?= $data['nama']?></option>
												<?php endforeach;?>
											</select>
										</div>
									</div>
									<div class="form-group ibu_luar_desa">
										<label for="ttl"  class="col-sm-3 control-label">Tanggal Perkawinan</label>
										<div class="col-sm-3">
											<div class="input-group input-group-sm date">
												<div class="input-group-addon">
													<i class="fa fa-calendar"></i>
												</div>
												<input title="Pilih Tanggal" class="form-control input-sm datepicker" name="tanggalperkawinan_ibu" type="text" value="<?= $_SESSION['post']['tanggalperkawinan_ibu']?>"/>
											</div>
										</div>
									</div>
									<div class="form-group ibu_luar_desa">
										<label for="alamat_ibu"  class="col-sm-3 control-label">Alamat / RT / RW</label>
										<div class="col-sm-4">
											<input class="form-control input-sm" type="text" name="alamat_ibu" id="alamat_ibu" placeholder="Alamat" value="<?= $_SESSION['post']['alamat_ibu']?>">
										</div>
										<div class="col-sm-2">
											<input class="form-control input-sm" type="text" name="rt_ibu" id="rt_ibu" placeholder="RT" value="<?= $_SESSION['post']['rt_ibu']?>">
										</div>
										<div class="col-sm-2">
											<input class="form-control input-sm" name="rw_ibu" id="rw_ibu"  type="text" placeholder="RW" value="<?= $_SESSION['post']['rw_ibu']?>">
										</div>
									</div>
									<div class="form-group ibu_luar_desa">
										<label for="alamat_ibu"  class="col-sm-3 control-label">Desa / Kecamatan</label>
										<div class="col-sm-4">
											<input class="form-control input-sm" type="text" name="desaibu" id="desaibu" placeholder="Desa" value="<?= $_SESSION['post']['desaibu']?>">
										</div>
										<div class="col-sm-4">
											<input class="form-control input-sm" type="text" name="kecibu" id="kecibu" placeholder="Kecamatan" value="<?= $_SESSION['post']['kecibu']?>">
										</div>
									</div>
									<div class="form-group ibu_luar_desa">
										<label for="alamat_ibu"  class="col-sm-3 control-label">Kabupaten / Provinsi</label>
										<div class="col-sm-4">
											<input class="form-control input-sm" type="text" name="kabibu" id="kabibu" placeholder="Kabupaten" value="<?= $_SESSION['post']['kabibu']?>">
										</div>
										<div class="col-sm-4">
											<input class="form-control input-sm" type="text" name="provinsiibu" id="provinsiibu" placeholder="Provinsi" value="<?= $_SESSION['post']['provinsiibu']?>">
										</div>
									</div>
								<?php endif; ?>
								<div class="form-group subtitle_head" id="a_pelapor">
									<label class="col-sm-3 control-label" >PELAPOR</label>
									<div class="btn-group col-sm-8" data-toggle="buttons">
										<label class="btn btn-info btn-flat btn-sm col-sm-4 col-sm-4 col-md-4 col-lg-3 form-check-label <?php if (!empty($pelapor)): ?>active<?php endif ?>">
											<input id="pelapor_1" type="radio" name="pelapor" class="form-check-input" type="radio" value="1" <?php if (!empty($pelapor)): ?>checked<?php endif; ?> autocomplete="off" onchange="ubah_pelapor(this.value);"> Warga Desa
										</label>
										<label id="label_pelapor_2" class="btn btn-info btn-flat btn-sm col-sm-4 col-md-4 col-lg-3 form-check-label <?php if (empty($pelapor)): ?>active<?php endif; ?>">
											<input id="pelapor_2" type="radio" name="pelapor" class="form-check-input" type="radio" value="2" <?php if (empty($pelapor)): ?>checked<?php endif; ?> autocomplete="off" onchange="ubah_pelapor(this.value);"> Warga Luar Desa
										</label>
									</div>
								</div>
								<div class="form-group pelapor_desa" <?php if (empty($pelapor)): ?>style="display: none;"<?php endif; ?>>
									<label class="col-xs-12 col-sm-3 col-lg-3 control-label bg-maroon" style="margin-top:-10px;padding-top:10px;padding-bottom:10px"><strong>DATA PELAPOR WARGA DESA</strong></label>
								</div>
								<div class="form-group pelapor_desa" <?php if (empty($pelapor)): ?>style="display: none;"<?php endif; ?>>
									<label for="id_pelapor" class="col-sm-3 control-label" ><strong>NIK / Nama</strong></label>
									<div class="col-sm-5">
										<select class="form-control  input-sm select2-nik" id="id_pelapor" name="id_pelapor" style ="width:100%;"  onchange="submit_form_ambil_data('a_pelapor');">
											<option value="">--  Cari NIK / Nama Penduduk--</option>
											<?php foreach ($penduduk as $data): ?>
												<option value="<?= $data['id']?>" <?php selected($pelapor['nik'], $data['nik']); ?>><?= $data['info_pilihan_penduduk']?></option>
											<?php endforeach;?>
										</select>
									</div>
								</div>
								<?php if ($pelapor): ?>
									<?php $individu = $pelapor;?>
									<?php include("donjo-app/views/surat/form/konfirmasi_pemohon.php"); ?>
								<?php	endif; ?>
								<?php if (empty($pelapor)): ?>
									<div class="form-group pelapor_luar_desa" >
										<label class="col-xs-12 col-sm-3 col-lg-3 control-label bg-maroon" style="margin-top:-10px;padding-top:10px;padding-bottom:10px"><strong>DATA PELAPOR LUAR DESA</strong></label>
									</div>
									<div class="form-group pelapor_luar_desa">
										<label for="nama_pelapor" class="col-sm-3 control-label">Nama Pelapor</label>
										<div class="col-sm-8">
											<input  class="form-control input-sm required" type="text" placeholder="Nama Pelapor" name="nama_pelapor" value="<?= $_SESSION['post']['nama_pelapor']?>">
										</div>
									</div>
									<div class="form-group pelapor_luar_desa">
										<label for="nik_pelapor"  class="col-sm-3 control-label">NIK Pelapor</label>
										<div class="col-sm-8">
											<input class="form-control input-sm required" type="text" placeholder="NIK Pelapor" name="nik_pelapor" value="<?= $_SESSION['post']['nik_pelapor']?>">
										</div>
									</div>
									<div class="form-group pelapor_luar_desa">
										<label for="tempat_lahir_pelapor"  class="col-sm-3 control-label">Tempat  / Tanggal Lahir / Umur</label>
										<div class="col-sm-3 col-lg-4">
											<input class="form-control input-sm" type="text" name="tempat_lahir_pelapor" id="tempat_lahir_pelapor" placeholder="Tempat Lahir Pelapor" value="<?= $_SESSION['post']['tempat_lahir_pelapor']?>">
										</div>
										<div class="col-sm-3 col-lg-2">
											<div class="input-group input-group-sm date">
												<div class="input-group-addon">
													<i class="fa fa-calendar"></i>
												</div>
												<input title="Pilih Tanggal" class="form-control input-sm required datepicker" name="tanggal_lahir_pelapor" type="text" placeholder="Tgl. Lahir" value="<?= $_SESSION['post']['tanggal_lahir_pelapor']?>" onchange="$('input[name=umur_pelapor]').val(_calculateAge($(this).val()));"/>
											</div>
										</div>
										<div class="col-sm-2">
											<input class="form-control input-sm" name="umur_pelapor" readonly="readonly" placeholder="Umur (Tahun)" type="text" value="<?= $_SESSION['post']['umur_pelapor']?>">
										</div>
									</div>
									<div class="form-group pelapor_luar_desa">
										<label for="pekerjaanpelapor" class="col-sm-3 control-label" ><strong>Jenis Kelamin / Pekerjaan</strong></label>
										<div class="col-sm-4">
											<select class="form-control input-sm required" name="jkpelapor" id="jkpelapor">
												<option value="">-- Jenis Kelamin --</option>
												<?php foreach ($sex as $data): ?>
													<option value="<?= $data['id']?>" <?php if($data['id']==$_SESSION['post']['jkpelapor']): ?>selected<?php endif; ?>><?= $data['nama']?></option>
												<?php endforeach;?>
											</select>
										</div>
										<div class="col-sm-4">
											<input type="hidden" name="pekerjaanid_pelapor">
											<select class="form-control input-sm required" name="pekerjaanpelapor" id="pekerjaanpelapor" onchange="$('input[name=pekerjaanid_pelapor]').val($(this).find(':selected').data('pekerjaanid'));">
												<option value="">-- Pekerjaan --</option>
												<?php foreach ($pekerjaan as $data): ?>
													<option value="<?= $data['nama']?>" data-pekerjaanid="<?= $data['id']?>" <?php if ($data['nama']==$_SESSION['post']['pekerjaanpelapor']): ?>selected<?php endif; ?>><?= $data['nama']?></option>
												<?php endforeach;?>
											</select>
										</div>
									</div>
									<div class="form-group pelapor_luar_desa">
										<label for="alamat_pelapor"  class="col-sm-3 control-label">Alamat / RT / RW</label>
										<div class="col-sm-4">
											<input class="form-control input-sm required" type="text" name="alamat_pelapor" id="alamat_pelapor" placeholder="Alamat" value="<?= $_SESSION['post']['alamat_pelapor']?>">
										</div>
										<div class="col-sm-2">
											<input class="form-control input-sm required" type="text" name="rt_pelapor" id="rt_pelapor" placeholder="RT" value="<?= $_SESSION['post']['rt_pelapor']?>">
										</div>
										<div class="col-sm-2">
											<input class="form-control input-sm required" name="rw_pelapor" id="rw_pelapor"  type="text" placeholder="RW" value="<?= $_SESSION['post']['rw_pelapor']?>">
										</div>
									</div>
									<div class="form-group pelapor_luar_desa">
										<label for="alamat_pelapor"  class="col-sm-3 control-label">Desa / Kecamatan</label>
										<div class="col-sm-4">
											<input class="form-control input-sm required" type="text" name="desapelapor" id="desapelapor" placeholder="Desa" value="<?= $_SESSION['post']['desapelapor']?>">
										</div>
										<div class="col-sm-4">
											<input class="form-control input-sm required" type="text" name="kecpelapor" id="kecpelapor" placeholder="Kecamatan" value="<?= $_SESSION['post']['kecpelapor']?>">
										</div>
									</div>
									<div class="form-group pelapor_luar_desa">
										<label for="alamat_pelapor"  class="col-sm-3 control-label">Kabupaten / Provinsi</label>
										<div class="col-sm-4">
											<input class="form-control input-sm required" type="text" name="kabpelapor" id="kabpelapor" placeholder="Kabupaten" value="<?= $_SESSION['post']['kabpelapor']?>">
										</div>
										<div class="col-sm-4">
											<input class="form-control input-sm required" type="text" name="provinsipelapor" id="provinsipelapor" placeholder="Provinsi" value="<?= $_SESSION['post']['provinsipelapor']?>">
										</div>
									</div>
								<?php endif; ?>
								<div class="form-group">
									<label for="hubungan_pelapor" class="col-sm-3 control-label">Hubungan pelapor dengan yang mati</label>
									<div class="col-sm-8">
										<input class="form-control input-sm required" type="text" placeholder="Hubungan pelapor dengan yang mati" name="hubungan_pelapor" value="<?= $_SESSION['post']['hubungan_pelapor']?>">
									</div>
								</div>
								<div class="form-group subtitle_head" id="a_saksi1">
									<label class="col-sm-3 control-label" for="status">SAKSI 1</label>
									<div class="btn-group col-sm-8" data-toggle="buttons">
										<label class="btn btn-info btn-flat btn-sm col-sm-4 col-sm-4 col-md-4 col-lg-3 form-check-label <?php if (!empty($saksi1)): ?>active<?php endif ?>">
											<input id="saksi1_1" type="radio" name="saksi1" class="form-check-input" type="radio" value="1" <?php if (!empty($saksi1)): ?>checked<?php endif; ?> autocomplete="off" onchange="ubah_saksi1(this.value);"> Warga Desa
										</label>
										<label id="label_saksi1_2"  class="btn btn-info btn-flat btn-sm col-sm-4 col-md-4 col-lg-3 form-check-label <?php if (empty($saksi1)): ?>active<?php endif; ?>">
											<input id="saksi1_2" type="radio" name="saksi1" class="form-check-input" type="radio" value="2" <?php if (empty($saksi1)): ?>checked<?php endif; ?> autocomplete="off" onchange="ubah_saksi1(this.value);"> Warga Luar Desa
										</label>
									</div>
								</div>
								<div class="form-group saksi1_desa" <?php if (empty($saksi1)): ?>style="display: none;"<?php endif; ?>>
									<label class="col-xs-12 col-sm-3 col-lg-3 control-label bg-maroon" style="margin-top:-10px;padding-top:10px;padding-bottom:10px"><strong>DATA SAKSI 1 DARI DATABASE</strong></label>
								</div>
								<div class="form-group saksi1_desa" <?php if (empty($saksi1)): ?>style="display: none;"<?php endif; ?>>
									<label for="saksi1_desa" class="col-sm-3 control-label" ><strong>NIK / Nama</strong></label>
									<div class="col-sm-5">
										<select class="form-control input-sm select2-nik" id="id_saksi1" name="id_saksi1" style ="width:100%;"  onchange="submit_form_ambil_data('a_saksi1');">
											<option value="">--  Cari NIK / Nama Penduduk--</option>
											<?php foreach ($penduduk as $data): ?>
												<option value="<?= $data['id']?>" <?php selected($saksi1['nik'], $data['nik']); ?>><?= $data['info_pilihan_penduduk']?></option>
											<?php endforeach;?>
										</select>
									</div>
								</div>
								<?php if ($saksi1): ?>
									<?php $individu = $saksi1;?>
									<?php include("donjo-app/views/surat/form/konfirmasi_pemohon.php"); ?>
								<?php	endif; ?>
								<?php if (empty($saksi1)): ?>
									<div class="form-group saksi1_luar_desa" >
										<label class="col-xs-12 col-sm-3 col-lg-3 control-label bg-maroon" style="margin-top:-10px;padding-top:10px;padding-bottom:10px"><strong>DATA SAKSI 1 LUAR DESA</strong></label>
									</div>
									<div class="form-group saksi1_luar_desa">
										<label for="nama_saksi1" class="col-sm-3 control-label">Nama Saksi</label>
										<div class="col-sm-8">
											<input  class="form-control input-sm required" type="text" placeholder="Nama Saksi" name="nama_saksi1" value="<?= $_SESSION['post']['nama_saksi1']?>">
										</div>
									</div>
									<div class="form-group saksi1_luar_desa">
										<label for="nik_saksi1"  class="col-sm-3 control-label">NIK Saksi</label>
										<div class="col-sm-8">
											<input  class="form-control input-sm required" type="text" placeholder="NIK Saksi" name="nik_saksi1" value="<?= $_SESSION['post']['nik_saksi1']?>">
										</div>
									</div>
									<div class="form-group saksi1_luar_desa">
										<label for="tempat_lahir_saksi1"  class="col-sm-3 control-label">Tempat  / Tanggal Lahir / Umur</label>
										<div class="col-sm-3 col-lg-4">
											<input class="form-control input-sm required" type="text" name="tempat_lahir_saksi1" id="tempat_lahir_saksi1" placeholder="Tempat Lahir Saksi" value="<?= $_SESSION['post']['tempat_lahir_saksi1']?>">
										</div>
										<div class="col-sm-3 col-lg-2">
											<div class="input-group input-group-sm date">
												<div class="input-group-addon">
													<i class="fa fa-calendar"></i>
												</div>
												<input title="Pilih Tanggal" class="form-control input-sm required datepicker" name="tanggal_lahir_saksi1" type="text" placeholder="Tgl. Lahir" value="<?= $_SESSION['post']['tanggal_lahir_saksi1']?>" onchange="$('input[name=umur_saksi1]').val(_calculateAge($(this).val()));"/>
											</div>
										</div>
										<div class="col-sm-2">
											<input class="form-control input-sm required" name="umur_saksi1" readonly="readonly" placeholder="Umur (Tahun)" type="text" value="<?= $_SESSION['post']['umur_saksi1']?>">
										</div>
									</div>
									<div class="form-group saksi1_luar_desa">
										<label for="pekerjaansaksi1" class="col-sm-3 control-label" ><strong>Jenis Kelamin / Pekerjaan</strong></label>
										<div class="col-sm-4">
											<select class="form-control input-sm required" name="jksaksi1" id="jksaksi1">
												<option value="">-- Jenis Kelamin --</option>
												<?php foreach ($sex as $data): ?>
													<option value="<?= $data['id']?>" <?php if($data['id']==$_SESSION['post']['jksaksi1']): ?>selected<?php endif; ?>><?= $data['nama']?></option>
												<?php endforeach;?>
											</select>
										</div>
										<div class="col-sm-4">
											<input type="hidden" name="pekerjaanid_saksi1">
											<select class="form-control input-sm required" name="pekerjaansaksi1" id="pekerjaansaksi1" onchange="$('input[name=pekerjaanid_saksi1]').val($(this).find(':selected').data('pekerjaanid'));">
												<option value="">-- Pekerjaan --</option>
												<?php foreach ($pekerjaan as $data): ?>
													<option value="<?= $data['nama']?>" data-pekerjaanid="<?= $data['id']?>" <?php if ($data['nama']==$_SESSION['post']['pekerjaansaksi1']): ?>selected<?php endif; ?>><?= $data['nama']?></option>
												<?php endforeach;?>
											</select>
										</div>
									</div>
									<div class="form-group saksi1_luar_desa">
										<label for="alamat_saksi1"  class="col-sm-3 control-label">Alamat / RT / RW</label>
										<div class="col-sm-4">
											<input class="form-control input-sm required" type="text" name="alamat_saksi1" id="alamat_saksi1" placeholder="Alamat" value="<?= $_SESSION['post']['alamat_saksi1']?>">
										</div>
										<div class="col-sm-2">
											<input class="form-control input-sm required" type="text" name="rt_saksi1" id="rt_saksi1" placeholder="RT" value="<?= $_SESSION['post']['rt_saksi1']?>">
										</div>
										<div class="col-sm-2">
											<input class="form-control input-sm required" name="rw_saksi1" id="rw_saksi1"  type="text" placeholder="RW" value="<?= $_SESSION['post']['rw_saksi1']?>">
										</div>
									</div>
									<div class="form-group saksi1_luar_desa">
										<label for="alamat_saksi1"  class="col-sm-3 control-label">Desa / Kecamatan</label>
										<div class="col-sm-4">
											<input class="form-control input-sm required" type="text" name="desasaksi1" id="desasaksi1" placeholder="Desa" value="<?= $_SESSION['post']['desasaksi1']?>">
										</div>
										<div class="col-sm-4">
											<input class="form-control input-sm required" type="text" name="kecsaksi1" id="kecsaksi1" placeholder="Kecamatan" value="<?= $_SESSION['post']['kecsaksi1']?>">
										</div>
									</div>
									<div class="form-group saksi1_luar_desa">
										<label for="alamat_saksi1"  class="col-sm-3 control-label">Kabupaten / Provinsi</label>
										<div class="col-sm-4">
											<input class="form-control input-sm required" type="text" name="kabsaksi1" id="kabsaksi1" placeholder="Kabupaten" value="<?= $_SESSION['post']['kabsaksi1']?>">
										</div>
										<div class="col-sm-4">
											<input class="form-control input-sm required" type="text" name="provinsisaksi1" id="provinsisaksi1" placeholder="Provinsi" value="<?= $_SESSION['post']['provinsisaksi1']?>">
										</div>
									</div>
								<?php endif; ?>
								<div class="form-group subtitle_head" id="a_saksi2">
									<label class="col-sm-3 control-label" for="status">SAKSI 2</label>
									<div class="btn-group col-sm-8" data-toggle="buttons">
										<label class="btn btn-info btn-flat btn-sm col-sm-4 col-sm-4 col-md-4 col-lg-3 form-check-label <?php if (!empty($saksi2)): ?>active<?php endif ?>">
											<input id="saksi2_1" type="radio" name="saksi2" class="form-check-input" type="radio" value="1" <?php if (!empty($saksi2)): ?>checked<?php endif; ?> autocomplete="off" onchange="ubah_saksi2(this.value);"> Warga Desa
										</label>
										<label id="label_saksi2_2"  class="btn btn-info btn-flat btn-sm col-sm-4 col-md-4 col-lg-3 form-check-label <?php if (empty($saksi2)): ?>active<?php endif; ?>">
											<input id="saksi2_2" type="radio" name="saksi2" class="form-check-input" type="radio" value="2" <?php if (empty($saksi2)): ?>checked<?php endif; ?> autocomplete="off" onchange="ubah_saksi2(this.value);"> Warga Luar Desa
										</label>
									</div>
								</div>
								<div class="form-group saksi2_desa" <?php if (empty($saksi2)): ?>style="display: none;"<?php endif; ?>>
									<label class="col-xs-12 col-sm-3 col-lg-3 control-label bg-maroon" style="margin-top:-10px;padding-top:10px;padding-bottom:10px"><strong>DATA SAKSI 2 DARI DATABASE</strong></label>
								</div>
								<div class="form-group saksi2_desa" <?php if (empty($saksi2)): ?>style="display: none;"<?php endif; ?>>
									<label for="saksi2_desa" class="col-sm-3 control-label" ><strong>NIK / Nama</strong></label>
									<div class="col-sm-5">
										<select class="form-control input-sm select2-nik" id="id_saksi2" name="id_saksi2" style ="width:100%;"  onchange="submit_form_ambil_data('a_saksi2');">
											<option value="">--  Cari NIK / Nama Penduduk--</option>
											<?php foreach ($penduduk as $data): ?>
												<option value="<?= $data['id']?>" <?php selected($saksi2['nik'], $data['nik']); ?>><?= $data['info_pilihan_penduduk']?></option>
											<?php endforeach;?>
										</select>
									</div>
								</div>
								<?php if ($saksi2): ?>
									<?php $individu = $saksi2;?>
									<?php include("donjo-app/views/surat/form/konfirmasi_pemohon.php"); ?>
								<?php	endif; ?>
								<?php if (empty($saksi2)): ?>
									<div class="form-group saksi2_luar_desa" >
										<label class="col-xs-12 col-sm-3 col-lg-3 control-label bg-maroon" style="margin-top:-10px;padding-top:10px;padding-bottom:10px"><strong>DATA SAKSI 2 LUAR DESA</strong></label>
									</div>
									<div class="form-group saksi2_luar_desa">
										<label for="nama_saksi2"  class="col-sm-3 control-label">Nama Saksi</label>
										<div class="col-sm-8">
											<input  class="form-control input-sm required" type="text" placeholder="Nama Saksi" name="nama_saksi2" value="<?= $_SESSION['post']['nama_saksi2']?>">
										</div>
									</div>
									<div class="form-group saksi2_luar_desa">
										<label for="nik_saksi2"  class="col-sm-3 control-label">NIK Saksi</label>
										<div class="col-sm-8">
											<input  class="form-control input-sm required" type="text" placeholder="NIK Saksi" name="nik_saksi2" value="<?= $_SESSION['post']['nik_saksi2']?>">
										</div>
									</div>
									<div class="form-group saksi2_luar_desa">
										<label for="tempat_lahir_saksi2"  class="col-sm-3 control-label">Tempat  / Tanggal Lahir / Umur</label>
										<div class="col-sm-3 col-lg-4">
											<input class="form-control input-sm required" type="text" name="tempat_lahir_saksi2" id="tempat_lahir_saksi2" placeholder="Tempat Lahir Saksi" value="<?= $_SESSION['post']['tempat_lahir_saksi2']?>">
										</div>
										<div class="col-sm-3 col-lg-2">
											<div class="input-group input-group-sm date">
												<div class="input-group-addon">
													<i class="fa fa-calendar"></i>
												</div>
												<input title="Pilih Tanggal" class="form-control input-sm required datepicker" name="tanggal_lahir_saksi2" type="text" placeholder="Tgl. Lahir" value="<?= $_SESSION['post']['tanggal_lahir_saksi2']?>" onchange="$('input[name=umur_saksi2]').val(_calculateAge($(this).val()));"/>
											</div>
										</div>
										<div class="col-sm-2">
											<input class="form-control input-sm required" name="umur_saksi2" readonly="readonly" placeholder="Umur (Tahun)" type="text" value="<?= $_SESSION['post']['umur_saksi2']?>">
										</div>
									</div>
									<div class="form-group saksi2_luar_desa">
										<label for="pekerjaansaksi2" class="col-sm-3 control-label" ><strong>Jenis Kelamin / Pekerjaan</strong></label>
										<div class="col-sm-4">
											<select class="form-control input-sm required" name="jksaksi2" id="jksaksi2">
												<option value="">-- Jenis Kelamin --</option>
												<?php foreach ($sex as $data): ?>
													<option value="<?= $data['id']?>" <?php if($data['id']==$_SESSION['post']['jksaksi2']): ?>selected<?php endif; ?>><?= $data['nama']?></option>
												<?php endforeach;?>
											</select>
										</div>
										<div class="col-sm-4">
											<input type="hidden" name="pekerjaanid_saksi2">
											<select class="form-control input-sm required" name="pekerjaansaksi2" id="pekerjaansaksi2" onchange="$('input[name=pekerjaanid_saksi2]').val($(this).find(':selected').data('pekerjaanid'));">
												<option value="">-- Pekerjaan --</option>
												<?php foreach ($pekerjaan as $data): ?>
													<option value="<?= $data['nama']?>" data-pekerjaanid="<?= $data['id']?>" <?php if ($data['nama']==$_SESSION['post']['pekerjaansaksi2']): ?>selected<?php endif; ?>><?= $data['nama']?></option>
												<?php endforeach;?>
											</select>
										</div>
									</div>
									<div class="form-group saksi2_luar_desa">
										<label for="alamat_saksi2"  class="col-sm-3 control-label">Alamat / RT / RW</label>
										<div class="col-sm-4">
											<input class="form-control input-sm required" type="text" name="alamat_saksi2" id="alamat_saksi2" placeholder="Alamat" value="<?= $_SESSION['post']['alamat_saksi2']?>">
										</div>
										<div class="col-sm-2">
											<input class="form-control input-sm required" type="text" name="rt_saksi2" id="rt_saksi2" placeholder="RT" value="<?= $_SESSION['post']['rt_saksi2']?>">
										</div>
										<div class="col-sm-2">
											<input class="form-control input-sm required" name="rw_saksi2" id="rw_saksi2"  type="text" placeholder="RW" value="<?= $_SESSION['post']['rw_saksi2']?>">
										</div>
									</div>
									<div class="form-group saksi2_luar_desa">
										<label for="alamat_saksi2"  class="col-sm-3 control-label">Desa / Kecamatan</label>
										<div class="col-sm-4">
											<input class="form-control input-sm required" type="text" name="desasaksi2" id="desasaksi2" placeholder="Desa" value="<?= $_SESSION['post']['desasaksi2']?>">
										</div>
										<div class="col-sm-4">
											<input class="form-control input-sm required" type="text" name="kecsaksi2" id="kecsaksi2" placeholder="Kecamatan" value="<?= $_SESSION['post']['kecsaksi2']?>">
										</div>
									</div>
									<div class="form-group saksi2_luar_desa">
										<label for="alamat_saksi2"  class="col-sm-3 control-label">Kabupaten / Provinsi</label>
										<div class="col-sm-4">
											<input class="form-control input-sm required" type="text" name="kabsaksi2" id="kabsaksi2" placeholder="Kabupaten" value="<?= $_SESSION['post']['kabsaksi2']?>">
										</div>
										<div class="col-sm-4">
											<input class="form-control input-sm required" type="text" name="provinsisaksi2" id="provinsisaksi2" placeholder="Provinsi" value="<?= $_SESSION['post']['provinsisaksi2']?>">
										</div>
									</div>
								<?php endif; ?>
								<div class="form-group">
									<label class="col-xs-12 col-sm-3 col-lg-3 control-label bg-maroon" style="margin-top:10px;padding-top:10px;padding-bottom:10px"><strong>PENANDA TANGAN</strong></label>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">Lokasi Disdukcapil <?= ucwords($this->setting->sebutan_kabupaten)?></label>
									<div class="col-sm-8">
										<input class="form-control input-sm required" type="text" name="lokasi_disdukcapil" id="lokasi_disdukcapil" placeholder="Lokasi Disdukcapil" value="<?= $_SESSION['post']['lokasi_disdukcapil']?>">
									</div>
								</div>
								<?php include("donjo-app/views/surat/form/_pamong.php"); ?>
							</div>
						</form>
					</div>
					<?php include("donjo-app/views/surat/form/tombol_cetak.php"); ?>
				</div>
				<div class='modal fade' id='infoBox' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
					<div class='modal-dialog'>
						<div class='modal-content'>
							<div class='modal-header btn-default'>
								<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
								<h4 class='modal-title' id='myModalLabel'><i class='fa fa-info-circle'></i>&nbsp;&nbsp;Info Isian Surat</h4>
							</div>
							<div class='modal-body small'>
								<h5><strong>Form ini menghasilkan:</strong></h5>
								<ol>
									<li>Surat Keterangan Kematian</li>
									<li>Lampiran F-2.29 SURAT KETERANGAN KEMATIAN bagi warga yang meninggal</li>
								</ol>
								<p>Sebelum membuat Surat Keterangan Kematian, ubah dulu status dasar warga yang meninggal di modul Penduduk.. </p>
								<p>Juga pastikan semua biodata orang tua warga yang meninggal, pelapor dan saksi-saksi sudah lengkap sebelum mencetak surat dan lampiran.</p>
								<p>Untuk melengkapi data itu, ubah data warga yang bersangkutan di form isian penduduk di modul Penduduk.</p>
							</div>
							<div class='modal-footer btn-default'>
								<button type="button" class="btn btn-social btn-flat btn-danger btn-sm" data-dismiss="modal"><i class='fa fa-sign-out'></i> Tutup</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
                                                                                                                                                                                                                                                                                surat/surat_ket_ktp_dalam_proses/surat_ket_ktp_dalam_proses.php                                     0000750 0023632 0023415 00000004445 13526507272 025642  0                                                                                                    ustar   u0_a138                         everybody                                                                                                                                                                                                              <div class="content-wrapper">
	<section class="content-header">
		<h1>Surat Keterangan KTP dalam Proses</h1>
		<?php if($this->admin){ ?>
			<ol class="breadcrumb">
				<li><a href="<?= site_url('hom_desa/about')?>"><i class="fa fa-dashboard"></i> Home</a></li>
				<li><a href="<?= site_url('surat')?>"> Daftar Cetak Surat</a></li>
				<li class="active">Surat Keterangan KTP dalam Proses</li>
			</ol>
		<?php } ?>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-info">
					<div class="box-header with-border">
						<a href="<?=site_url($aksi."surat")?>" class="btn btn-social btn-flat btn-default btn-sm btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"  title="Kembali Ke Daftar Wilayah">
							<i class="fa fa-arrow-circle-left "></i> Kembali Ke Daftar Cetak Surat
						</a>
					</div>
					<div class="box-body">
						<?php if($this->admin){ ?>
							<form action="" id="main" name="main" method="POST" class="form-horizontal">
								<?php include("donjo-app/views/surat/form/_cari_nik.php"); ?>
							</form>
						<?php } ?>
						<form id="validasi" action="<?= $form_action?>" method="POST" target="_blank" class="form-surat form-horizontal">
							<input type="hidden" id="url_surat" name="url_surat" value="<?= $url ?>">
							<input type="hidden" id="url_remote" name="url_remote" value="<?= site_url($aksi.'surat/nomor_surat_duplikat')?>">
							<?php if ($individu): ?>
								<?php include("donjo-app/views/surat/form/konfirmasi_pemohon.php"); ?>
							<?php	endif; ?>
							<div class="form-group">
								<label for="nomor"  class="col-sm-3 control-label">Nomor Surat</label>
								<div class="col-sm-8">
									<input  id="nomor" class="form-control input-sm required" type="text" placeholder="Nomor Surat" name="nomor" value="<?= $surat_terakhir['no_surat_berikutnya'];?>">
									<p class="help-block text-red small"><?= $surat_terakhir['ket_nomor']?><strong><?= $surat_terakhir['no_surat'];?></strong> (tgl: <?= $surat_terakhir['tanggal']?>)</p>
								</div>
							</div>
							<?php include("donjo-app/views/surat/form/_pamong.php"); ?>
						</form>
					</div>
					<?php include("donjo-app/views/surat/form/tombol_cetak.php"); ?>
				</div>
			</div>
		</div>
	</section>
</div>
                                                                                                                                                                                                                           surat/surat_ket_kurang_mampu/surat_ket_kurang_mampu.php                                             0000750 0023632 0023415 00000012475 13526507272 024142  0                                                                                                    ustar   u0_a138                         everybody                                                                                                                                                                                                              	<script>
		$(function()
		{
			$('#showData').click(function()
			{
				$("#kel").removeClass('hide');
				$('#showData').hide();
				$('#hideData').show();
			});

			$('#hideData').click(function()
			{
				$('#kel').addClass('hide');
				$('#hideData').hide();
				$('#showData').show();
			});
			$('#hideData').hide();
		});
	</script>
	<div class="content-wrapper">
		<section class="content-header">
			<h1>Surat Keterangan Tidak Mampu</h1>
			<?php if($this->admin){ ?>
				<ol class="breadcrumb">
					<li><a href="<?= site_url('hom_desa/about')?>"><i class="fa fa-dashboard"></i> Home</a></li>
					<li><a href="<?= site_url('surat')?>"> Daftar Cetak Surat</a></li>
					<li class="active">Surat Keterangan Tidak Mampu</li>
				</ol>
			<?php } ?>
		</section>
		<section class="content">
			<div class="row">
				<div class="col-md-12">
					<div class="box box-info">
						<div class="box-header with-border">
							<a href="<?=site_url($aksi."surat")?>" class="btn btn-social btn-flat btn-default btn-sm btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"  title="Kembali Ke Daftar Wilayah">
								<i class="fa fa-arrow-circle-left "></i> Kembali Ke Daftar Cetak Surat
							</a>
						</div>
						<div class="box-body">
							<?php if($this->admin){ ?>
								<form action="" id="main" name="main" method="POST" class="form-horizontal">
									<?php include("donjo-app/views/surat/form/_cari_nik.php"); ?>
								</form>
							<?php } ?>
							<form id="validasi" action="<?= $form_action?>" method="POST" target="_blank" class="form-surat form-horizontal">
								<input type="hidden" id="url_surat" name="url_surat" value="<?= $url ?>">
								<input type="hidden" id="url_remote" name="url_remote" value="<?= site_url($aksi.'surat/nomor_surat_duplikat')?>">
								<?php if ($individu): ?>
									<?php include("donjo-app/views/surat/form/konfirmasi_pemohon.php"); ?>
									<div class="form-group">
										<label for="keperluan"  class="col-sm-3 control-label">Data Keluarga / KK</label>
										<div class="col-sm-8">
											<a id="showData" class="btn btn-social btn-flat btn-danger btn-sm"><i class="fa fa-search-plus"></i> Tampilkan</a>
											<a id="hideData" class="btn btn-social btn-flat btn-danger btn-sm"><i class="fa fa-search-minus"></i> Sembunyikan</a>
										</div>
									</div>
									<div id="kel" class="form-group hide">
										<label for="pengikut"  class="col-sm-3 control-label">Keluarga</label>
										<div class="col-sm-8">
											<div class="table-responsive">
												<table class="table table-bordered dataTable table-hover nowrap">
													<thead class="bg-gray disabled color-palette">
														<tr>
															<th>No</th>
															<th>NIK</th>
															<th>Nama</th>
															<th>Jenis Kelamin</th>
															<th>Tempat Tanggal Lahir</th>
															<th>Hubungan</th>
															<th>Status Kawin</th>
														</tr>
													</thead>
													<tbody>
														<?php if ($anggota!=NULL):
															$i=0;?>
															<?php foreach ($anggota AS $data): $i++;?>
																<tr>
																	<td><?= $i?></td>
																	<td><?= $data['nik']?></td>
																	<td><?= unpenetration($data['nama'])?></td>
																	<td><?= $data['sex']?></td>
																	<td><?= $data['tempatlahir']?>, <?= tgl_indo($data['tanggallahir'])?></td>
																	<td><?= $data['hubungan']?></td>
																	<td><?= $data['status_kawin']?></td>
																</tr>
															<?php endforeach;?>
														<?php endif; ?>
													</tbody>
												</table>
											</div>
										</div>
									</div>
								<?php	endif; ?>
								<div class="form-group">
									<label for="nomor"  class="col-sm-3 control-label">Nomor Surat</label>
									<div class="col-sm-8">
										<input  id="nomor" class="form-control input-sm required" type="text" placeholder="Nomor Surat" name="nomor" value="<?= $surat_terakhir['no_surat_berikutnya'];?>">
										<p class="help-block text-red small"><?= $surat_terakhir['ket_nomor']?><strong><?= $surat_terakhir['no_surat'];?></strong> (tgl: <?= $surat_terakhir['tanggal']?>)</p>
									</div>
								</div>
								<div class="form-group">
									<label for="keperluan"  class="col-sm-3 control-label">Keperluan</label>
									<div class="col-sm-8">
										<textarea name="keperluan" class="form-control input-sm required" placeholder="Keperluan"></textarea>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">Tertanda Atas Nama</label>
									<div class="col-sm-6 col-lg-4">
										<select class="form-control input-sm" name="atas_nama">
											<option value="">Atas Nama</option>
											<option value="An. Kepala Desa <?= unpenetration($desa['nama_desa'])?>"> An. Kepala Desa <?= unpenetration($desa['nama_desa'])?> </option>
											<option value="Ub. Kepala Desa <?= unpenetration($desa['nama_desa'])?>"> Ub. Kepala Desa <?= unpenetration($desa['nama_desa'])?> </option>
										</select>
									</div>
								</div>
								<?php include("donjo-app/views/surat/form/_pamong.php"); ?>
							</form>
						</div>
						<?php include("donjo-app/views/surat/form/tombol_cetak.php"); ?>
					</div>
				</div>
			</div>
		</section>
	</div>
                                                                                                                                                                                                   surat/surat_ket_lahir_mati/surat_ket_lahir_mati.php                                                 0000750 0023632 0023415 00000010621 13526507272 023177  0                                                                                                    ustar   u0_a138                         everybody                                                                                                                                                                                                              <div class="content-wrapper">
	<section class="content-header">
		<h1>Surat Keterangan Lahir Mati</h1>
		<?php if($this->admin){ ?>
			<ol class="breadcrumb">
				<li><a href="<?= site_url('hom_desa/about')?>"><i class="fa fa-dashboard"></i> Home</a></li>
				<li><a href="<?= site_url('surat')?>"> Daftar Cetak Surat</a></li>
				<li class="active">Surat Keterangan Lahir Mati</li>
			</ol>
		<?php } ?>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-info">
					<div class="box-header with-border">
						<a href="<?=site_url($aksi."surat")?>" class="btn btn-social btn-flat btn-default btn-sm btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"  title="Kembali Ke Daftar Wilayah">
							<i class="fa fa-arrow-circle-left "></i> Kembali Ke Daftar Cetak Surat
						</a>
					</div>
					<div class="box-body">
						<form action="" id="main" name="main" method="POST" class="form-horizontal">
							<?php if($this->admin){ ?>
								<div class="col-md-12">
									<?php include("donjo-app/views/surat/form/_cari_nik.php"); ?>
								</form>
							<?php } ?>
							<form id="validasi" action="<?= $form_action?>" method="POST" target="_blank" class="form-surat form-horizontal">
								<input type="hidden" id="url_surat" name="url_surat" value="<?= $url ?>">
								<input type="hidden" id="url_remote" name="url_remote" value="<?= site_url($aksi.'surat/nomor_surat_duplikat')?>">
								<?php if ($individu): ?>
									<?php include("donjo-app/views/surat/form/konfirmasi_pemohon.php"); ?>
								<?php	endif; ?>
								<div class="form-group">
									<label for="nomor"  class="col-sm-3 control-label">Nomor Surat</label>
									<div class="col-sm-8">
										<input  id="nomor" class="form-control input-sm required" type="text" placeholder="Nomor Surat" name="nomor" value="<?= $surat_terakhir['no_surat_berikutnya'];?>">
										<p class="help-block text-red small"><?= $surat_terakhir['ket_nomor']?><strong><?= $surat_terakhir['no_surat'];?></strong> (tgl: <?= $surat_terakhir['tanggal']?>)</p>
									</div>
								</div>
								<div class="form-group">
									<label for="ttl"  class="col-sm-3 control-label">Hari / Tanggal Mati</label>
									<div class="col-sm-3 col-lg-4">
										<input  id="hari"  class="form-control input-sm" type="text" placeholder="Hari Mati" name="hari">
									</div>
									<div class="col-sm-3 col-lg-2">
										<div class="input-group input-group-sm date">
											<div class="input-group-addon">
												<i class="fa fa-calendar"></i>
											</div>
											<input title="Pilih Tanggal" class="form-control input-sm datepicker required" name="tanggal_mati" type="text"/>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label for="tempat_mati"  class="col-sm-3 control-label">Tempat Mati</label>
									<div class="col-sm-8">
										<input type="text" name="tempat_mati" class="form-control input-sm required" placeholder="Tempat Mati"></input>
									</div>
								</div>
								<div class="form-group">
									<label for="kandungan"  class="col-sm-3 control-label">Lama di Kandungan (Bulan)</label>
									<div class="col-sm-2">
										<input id="input_group" type="text" name="lama_kandungan" class="form-control input-sm required" placeholder="Lama Di Kandungan (Bulan)"></input>
									</div>
								</div>
								<div class="form-group subtitle_head">
									<label class="col-sm-3 text-right"><strong>IDENTITAS PELAPOR :</strong></label>
								</div>
								<div class="form-group">
									<label for="nama_pelapor"  class="col-sm-3 control-label">Nama Pelapor</label>
									<div class="col-sm-8">
										<input type="text"  name="pelapor" class="form-control input-sm required" placeholder="Nama Pelapor"></input>
									</div>
								</div>
								<div class="form-group">
									<label for="hubungan"  class="col-sm-3 control-label">Hubungan dengan yang Lahir Mati</label>
									<div class="col-sm-8">
										<input type="text"  name="hubungan" class="form-control input-sm required" placeholder="Hubungan dengan yang Lahir Mati"></input>
									</div>
								</div>
								<?php include("donjo-app/views/surat/form/_pamong.php"); ?>
							</div>
						</form>
					</div>
					<?php include("donjo-app/views/surat/form/tombol_cetak.php"); ?>
				</div>
			</div>
		</div>
	</section>
</div>
                                                                                                               surat/surat_ket_nikah/surat_ket_nikah.php                                                           0000750 0023632 0023415 00000164551 13526507272 021155  0                                                                                                    ustar   u0_a138                         everybody                                                                                                                                                                                                              <script language="javascript" type="text/javascript">

	$(document).ready(function()
	{
		$('#reset_form').on('click', function()
		{
			$('#nomor').val('');
			$('#calon_pria').val('2');
			$('#calon_wanita').val('2');
		});
	});

	function calon_wanita_asal(asal)
	{
		$('#calon_wanita').val(asal);
		if (asal == 1)
		{
			$('.wanita_desa').show();
			$('.wanita_luar_desa').hide();
			// Mungkin bug di jquery? Terpaksa hapus class radio button
			$('#label_calon_wanita_2').removeClass('active');
		}
		else
		{
			$('.wanita_desa').hide();
			$('.wanita_luar_desa').show();
		 	$('#id_wanita').val('*'); // Hapus $id_wanita
		 	submit_form_ambil_data_pria();
		 }
		}

		function calon_pria_asal(asal)
		{
			$('#calon_pria').val(asal);
			if (asal == 1)
			{
				$('.pria_desa').show();
				$('.pria_luar_desa').hide();
			// Mungkin bug di jquery? Terpaksa hapus class radio button
			$('#label_calon_pria_2').removeClass('active');
		}
		else
		{
			$('.pria_desa').hide();
			$('.pria_luar_desa').show();
			$('#id_wanita_copy').val($('#id_wanita_hidden').val());
			$('#id_wanita_validasi').val($('#id_wanita_hidden').val());
			$('#id_pria').val('*'); // Hapus $id_pria
			submit_form_ambil_data_pria();
		}
	}

	function submit_form_ambil_data_pria(asal)
	{
	 	$('#id_wanita').val('*'); // Hapus $id_wanita
	 	$('#id_wanita_copy').val($('#id_wanita_hidden').val());
	 	$('input').removeClass('required');
	 	$('select').removeClass('required');
	 	$('#'+'validasi').attr('action','')
	 	$('#'+'validasi').attr('target','')
	 	$('#'+'validasi').submit();
	 }

	 function submit_form_ambil_data_wanita()
	 {
	 	$('#id_wanita_validasi').val($('#id_wanita_hidden').val());
	 	$('input').removeClass('required');
	 	$('select').removeClass('required');
	 	$('#'+'validasi').attr('action','')
	 	$('#'+'validasi').attr('target','')
	 	$('#'+'validasi').submit();
	 }

	 function submit_form_doc()
	 {
	 	if (($('#id_pria').val()=='' || $('#id_pria').val()=='*') && ($('#id_wanita').val()=='' || $('#id_wanita').val()=='*'))
	 	{
	 		$('#dialog').modal('show');

	 		return;
	 	}
	 	$('#'+'validasi').attr('action','<?= $form_action2?>');
	 	$('#'+'validasi').submit();
	 }

	 function status_beristri(status)
	 {
	 	if (status.toUpperCase() == 'beristri'.toUpperCase())
	 	{
	 		$('#beristri').show();
	 	}
	 	else
	 	{
	 		$('#beristri').hide();
	 	}
	 }

	 function cerai_mati(status)
	 {
		// Untuk calon wanita luar desa pilihan hanya 'perawan' atau 'janda'
		if (status.toUpperCase() == 'janda'.toUpperCase())
		{
			$('#cerai_mati').show();
		}
		else
		{
			$('#cerai_mati').hide();
		}
	}

</script>
<div class="content-wrapper">
	<section class="content-header">
		<h1>Surat Keterangan Untuk Nikah</h1>
		<?php if($this->admin){ ?>
			<ol class="breadcrumb">
				<li><a href="<?= site_url('hom_desa/about')?>"><i class="fa fa-dashboard"></i> Home</a></li>
				<li><a href="<?= site_url('surat')?>"> Daftar Cetak Surat</a></li>
				<li class="active">Surat Keterangan Untuk Nikah</li>
			</ol>
		<?php } ?>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-info">
					<div class="box-header with-border">
						<a href="<?=site_url($aksi."surat")?>" class="btn btn-social btn-flat btn-default btn-sm btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"  title="Kembali Ke Daftar Wilayah">
							<i class="fa fa-arrow-circle-left "></i> Kembali Ke Daftar Cetak Surat
						</a>
					</div>
					<div class="box-body">
						<form id="validasi" action="<?= $form_action?>" method="POST" target="_blank" class="form-surat form-horizontal">
							<input type="hidden" id="url_surat" name="url_surat" value="<?= $url ?>">
							<input type="hidden" id="url_remote" name="url_remote" value="<?= site_url($aksi.'surat/nomor_surat_duplikat')?>">
							<div class="col-md-12">
								<div class="form-group">
									<label for="nomor"  class="col-sm-3 control-label">Nomor Surat</label>
									<div class="col-sm-8">
										<input  id="nomor" class="form-control input-sm required" type="text" placeholder="Nomor Surat" name="nomor" value="<?= $_SESSION['post']['nomor']; ?>">
										<p class="help-block text-red small"><?= $surat_terakhir['ket_nomor']?><strong><?= $surat_terakhir['no_surat'];?></strong> (tgl: <?= $surat_terakhir['tanggal']?>)</p>
									</div>
								</div>
								<?php $jenis_pasangan = "Istri"; ?>
								<div class="form-group subtitle_head">
									<label class="col-sm-3 control-label" for="status">A. CALON PASANGAN PRIA</label>
									<div class="btn-group col-sm-8" data-toggle="buttons">
										<label for="calon_pria_1" class="btn btn-info btn-flat btn-sm col-sm-4 col-sm-4 col-md-4 col-lg-3 form-check-label <?php if (!empty($pria)): ?>active<?php endif ?>">
											<input id="calon_pria_1" type="radio"  name="calon_pria" class="form-check-input" type="radio" value="1" <?php if (!empty($pria)): ?>checked<?php endif; ?> autocomplete="off" onchange="calon_pria_asal(this.value);"> Warga Desa
										</label>
										<label for="calon_pria_2" class="btn btn-info btn-flat btn-sm col-sm-4 col-md-4 col-lg-3 form-check-label <?php if (empty($pria)): ?>active<?php endif; ?>">
											<input id="calon_pria_2" type="radio"  name="calon_pria" class="form-check-input" type="radio" value="2" <?php if (empty($pria)): ?>checked<?php endif; ?> autocomplete="off" onchange="calon_pria_asal(this.value);"> Warga Luar Desa
										</label>
									</div>
								</div>
								<div class="form-group pria_desa" <?php if (empty($pria)): ?>style="display: none;"<?php endif; ?>>
									<label for="pria_desa"  class="col-xs-12 col-sm-3 col-lg-3 control-label bg-maroon" style="margin-top:-10px;padding-top:10px;padding-bottom:10px"><strong>A.1 DATA CALON PASANGAN PRIA WARGA DESA</strong></label>
								</div>
								<div class="form-group pria_desa" <?php if (empty($pria)): ?>style="display: none;"<?php endif; ?>>
									<input id="calon_pria" name="calon_pria" type="hidden" value=""/>

									<label for="pria_desa" class="col-sm-3 control-label" ><strong>NIK / Nama :</strong></label>
									<div class="col-sm-5">
										<select class="form-control  input-sm select2-nik" id="id_pria" name="id_pria" style ="width:100%;" onchange="submit_form_ambil_data_pria(this.id);">
											<option value="">--  Cari NIK / Nama--</option>
											<?php foreach ($laki as $data): ?>
												<option value="<?= $data['id']?>" <?php selected($pria['nik'], $data['nik']); ?>><?= $data['info_pilihan_penduduk']?></option>
											<?php endforeach;?>
										</select>
									</div>
									<input id="calon_wanita" name="calon_wanita" type="hidden" value=""/>
									<!-- Diisi oleh script flexbox wanita -->
									<input id="id_wanita_copy" name="id_wanita" type="hidden" value="kosong"/>
								</div>
								<?php if ($pria): ?>
									<?php $individu = $pria;?>
									<?php include("donjo-app/views/surat/form/konfirmasi_pemohon.php"); ?>
								<?php	endif; ?>
							</div>
							<div class="col-md-12">
								<input id="id_wanita" name="id_wanita" type="hidden" value="<?= $_SESSION['id_wanita']?>"/>
								<?php if (empty($pria)): ?>
									<div class="form-group pria_luar_desa" >
										<label for="pria_luar_desa"  class="col-xs-12 col-sm-3 col-lg-3 control-label bg-maroon" style="margin-top:-10px;padding-top:10px;padding-bottom:10px"><strong>A.1 DATA CALON PASANGAN PRIA LUAR DESA</strong></label>
									</div>
									<div class="form-group pria_luar_desa">
										<label for="pria_luar_desa" class="col-sm-3 control-label" ><strong>Nama Lengkap</strong></label>
										<div class="col-sm-8">
											<input  name="nama_pria" class="form-control input-sm" type="text" placeholder="Nama Lengkap" value="<?= $_SESSION['post']['nama_pria']?>">
										</div>
									</div>
									<div class="form-group pria_luar_desa">
										<label for="tempatlahir_pria"  class="col-sm-3 control-label">Tempat Tanggal Lahir</label>
										<div class="col-sm-5 col-lg-6">
											<input class="form-control input-sm" type="text" name="tempatlahir_pria" id="tempatlahir_pria" placeholder="Tempat Lahir" value="<?= $_SESSION['post']['tempatlahir_pria']?>">
										</div>
										<div class="col-sm-3 col-lg-2">
											<div class="input-group input-group-sm date">
												<div class="input-group-addon">
													<i class="fa fa-calendar"></i>
												</div>
												<input title="Pilih Tanggal"  class="form-control datepicker input-sm" name="tanggallahir_pria" type="text" placeholder="Tgl. Lahir" value="<?= $_SESSION['post']['tanggallahir_pria']?>"/>
											</div>
										</div>
									</div>
									<div class="form-group pria_luar_desa">
										<label for="tempatlahir_pria"  class="col-sm-3 control-label">Warganegara / Agama / Pekerjaan</label>
										<div class="col-sm-2">
											<select class="form-control input-sm select2" name="wn_pria" id="wn_pria" style ="width:100%;">
												<option value="">-- Pilih warganegara --</option>
												<?php foreach ($warganegara as $data): ?>
													<option value="<?= $data['nama']?>" <?php if ($data['nama']==$_SESSION['post']['wn_pria']): ?>selected<?php endif; ?>><?= $data['nama']?></option>
												<?php endforeach;?>
											</select>
										</div>
										<div class="col-sm-3">
											<select class="form-control input-sm select2" name="agama_pria" id="agama_pria" style ="width:100%;">
												<option value="">-- Pilih Agama --</option>
												<?php foreach ($agama as $data): ?>
													<option value="<?= $data['nama']?>" <?php if ($data['nama']==$_SESSION['post']['agama_pria']): ?>selected<?php endif; ?>><?= $data['nama']?></option>
												<?php endforeach;?>
											</select>
										</div>
										<div class="col-sm-3">
											<select class="form-control input-sm select2" name="pekerjaan_pria" id="pekerjaan_pria" style ="width:100%;">
												<option value="">-- Pekerjaan --</option>
												<?php foreach ($pekerjaan as $data): ?>
													<option value="<?= $data['nama']?>" <?php if ($data['nama']==$_SESSION['post']['pekerjaan_pria']): ?>selected<?php endif; ?>><?= $data['nama']?></option>
												<?php endforeach;?>
											</select>
										</div>
									</div>
									<div class="form-group pria_luar_desa">
										<label for="pria_luar_desa" class="col-sm-3 control-label" ><strong>Tempat Tinggal</strong></label>
										<div class="col-sm-8">
											<input  name="alamat_pria" class="form-control input-sm" type="text" placeholder="Tempat Tinggal" value="<?= $_SESSION['post']['alamat_pria']?>">
										</div>
									</div>
									<div class="form-group pria_luar_desa">
										<label for="pria_luar_desa" class="col-sm-3 control-label" ><strong>Jika pria, terangkan jejaka, duda atau beristri</strong></label>
										<div class="col-sm-4">
											<select class="form-control input-sm select2 required" name="status_kawin_pria" id="status_kawin_pria" style ="width:100%;" onchange="status_beristri($(this).val())">
												<option value="">-- Pilih Status Kawin --</option>
												<?php foreach ($kode['status_kawin_pria'] as $data): ?>
													<option value="<?= $data?>" <?php if ($data['nama']==$_SESSION['post']['status_kawin_pria']): ?>selected<?php endif; ?>><?= ucwords($data)?></option>
												<?php endforeach;?>
											</select>
										</div>
									</div>
									<div id="beristri" class="form-group pria_luar_desa">
										<label for="pria_luar_desa" class="col-sm-3 control-label" ><strong>Jika beristri, berapa istrinya</strong></label>
										<div class="col-sm-4">
											<input  name="jumlah_istri" class="form-control input-sm" type="text" placeholder="Jumlah Istri" value="<?= $_SESSION['post']['jumlah_istri']?>">
										</div>
									</div>
								<?php endif; ?>
								<?php if ($pria): ?>
									<div class="form-group">
										<label for="status_kawin_pria" class="col-sm-3 control-label" ><strong>Jika pria, terangkan jejaka, duda atau beristri</strong></label>
										<div class="col-sm-4">
											<select class="form-control input-sm select2" disabled="disabled" style ="width:100%;">
												<option value="">-- Pilih Status Kawin --</option>
												<?php foreach ($kode['status_kawin_pria'] as $data): ?>
													<option value="<?= $data?>" <?php if ($pria['status_kawin_pria']==$data): ?>selected<?php endif; ?>><?= ucwords($data)?></option>
												<?php endforeach;?>
											</select>
										</div>
										<p class="help-block">(Status kawin: <?= $pria['status_kawin']?>)</p>
										<input type="hidden" name="status_kawin_pria" id="status_kawin_pria" value="<?= $pria['status_kawin_pria']?>">
									</div>
									<?php if ($pria['status_kawin']=="KAWIN"): ?>
										<div class="form-group">
											<label for="jumlah_istri" class="col-sm-3 control-label" ><strong>Jika beristri, berapa istrinya</strong></label>
											<div class="col-sm-4">
												<input  name="jumlah_istri" class="form-control input-sm required" type="text" placeholder="Jumlah Istri" value="1">
											</div>
										</div>
									<?php endif; ?>
								<?php endif; ?>
								<?php if ($ayah_pria): ?>
									<div class="form-group" >
										<label class="col-xs-12 col-sm-3 col-lg-3 control-label bg-maroon" style="padding-top:10px;padding-bottom:10px"><strong>A.2 DATA AYAH PASANGAN PRIA</strong></label>
									</div>
									<div class="form-group">
										<label for="pria_luar_desa" class="col-sm-3 control-label" ><strong>Nama Lengkap</strong></label>
										<div class="col-sm-8">
											<input  class="form-control input-sm" type="text" placeholder="Nama Lengkap" value="<?= $ayah_pria['nama']?>" disabled>
										</div>
									</div>
									<div class="form-group">
										<label for="tempatlahir_pria"  class="col-sm-3 control-label">Tempat Tanggal Lahir</label>
										<div class="col-sm-8">
											<input class="form-control input-sm" type="text" placeholder="Tempat Lahir" value="<?= $ayah_pria['tempatlahir']." / ".tgl_indo_out($ayah_pria['tanggallahir'])?>" disabled>
										</div>
									</div>
									<div class="form-group">
										<label for="tempatlahir_pria"  class="col-sm-3 control-label">Warganegara / Agama / Pekerjaan</label>
										<div class="col-sm-2">
											<input class="form-control input-sm" type="text" placeholder="Warganegara" value="<?= $ayah_pria['wn']?>" disabled>
										</div>
										<div class="col-sm-3">
											<input class="form-control input-sm" type="text" placeholder="Agama" value="<?= $ayah_pria['agama']?>" disabled>
										</div>
										<div class="col-sm-3">
											<input class="form-control input-sm" type="text" placeholder="Pekerjaan" value="<?= $ayah_pria['pek']?>" disabled>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label" ><strong>Tempat Tinggal</strong></label>
										<div class="col-sm-8">
											<input  class="form-control input-sm" type="text" placeholder="Tempat Tinggal" value="<?= $ayah_pria['alamat_wilayah']?>">
										</div>
									</div>
									<?php else: ?>
										<div class="form-group ayah_pria" >
											<label class="col-xs-12 col-sm-3 col-lg-3 control-label bg-maroon" style="margin-top:10px;padding-top:10px;padding-bottom:10px"><strong>A.2 DATA AYAH PASANGAN PRIA (Isi jika ayah bukan warga <?= strtolower($this->setting->sebutan_desa)?> ini ini)</strong></label>
										</div>
										<div class="form-group ayah_pria">
											<label class="col-sm-3 control-label" ><strong>Nama Lengkap</strong></label>
											<div class="col-sm-8">
												<input  name="nama_ayah_pria" class="form-control input-sm" type="text" placeholder="Nama Lengkap" value="<?= $_SESSION['post']['nama_ayah_pria']?>">
											</div>
										</div>
										<div class="form-group ayah_pria">
											<label class="col-sm-3 control-label">Tempat Tanggal Lahir</label>
											<div class="col-sm-5 col-lg-6">
												<input class="form-control input-sm" type="text" name="tempatlahir_ayah_pria" id="tempatlahir_ayah_pria" placeholder="Tempat Lahir" value="<?= $_SESSION['post']['tempatlahir_ayah_pria']?>">
											</div>
											<div class="col-sm-3 col-lg-2">
												<div class="input-group input-group-sm date">
													<div class="input-group-addon">
														<i class="fa fa-calendar"></i>
													</div>
													<input title="Pilih Tanggal"  class="form-control input-sm datepicker" name="tanggallahir_ayah_pria" type="text" placeholder="Tgl. Lahir" value="<?= $_SESSION['post']['tanggallahir_ayah_pria']?>"/>
												</div>
											</div>
										</div>
										<div class="form-group ayah_pria">
											<label class="col-sm-3 control-label">Warganegara / Agama / Pekerjaan</label>
											<div class="col-sm-2">
												<select class="form-control input-sm select2" name="wn_ayah_pria" id="wn_ayah_pria" style ="width:100%;">
													<option value="">-- Pilih warganegara --</option>
													<?php foreach ($warganegara as $data): ?>
														<option value="<?= $data['nama']?>" <?php if ($data['nama']==$_SESSION['post']['wn_ayah_pria']): ?>selected<?php endif; ?>><?= $data['nama']?></option>
													<?php endforeach;?>
												</select>
											</div>
											<div class="col-sm-3">
												<select class="form-control input-sm select2" name="agama_ayah_pria" id="agama_ayah_pria" style ="width:100%;">
													<option value="">-- Pilih Agama --</option>
													<?php foreach ($agama as $data): ?>
														<option value="<?= $data['nama']?>" <?php if ($data['nama']==$_SESSION['post']['agama_ayah_pria']): ?>selected<?php endif; ?>><?= $data['nama']?></option>
													<?php endforeach;?>
												</select>
											</div>
											<div class="col-sm-3">
												<select class="form-control input-sm select2" name="pekerjaan_ayah_pria" id="pekerjaan_ayah_pria" style ="width:100%;">
													<option value="">-- Pekerjaan --</option>
													<?php foreach ($pekerjaan as $data): ?>
														<option value="<?= $data['nama']?>" <?php if ($data['nama']==$_SESSION['post']['pekerjaan_ayah_pria']): ?>selected<?php endif; ?>><?= $data['nama']?></option>
													<?php endforeach;?>
												</select>
											</div>
										</div>
										<div class="form-group ayah_pria">
											<label class="col-sm-3 control-label" ><strong>Tempat Tinggal</strong></label>
											<div class="col-sm-8">
												<input  name="alamat_ayah_pria" class="form-control input-sm" type="text" placeholder="Tempat Tinggal" value="<?= $_SESSION['post']['alamat_ayah_pria']?>">
											</div>
										</div>
									<?php endif; ?>
									<?php if ($ibu_pria): ?>
										<div class="form-group" >
											<label class="col-xs-12 col-sm-3 col-lg-3 control-label bg-maroon" style="padding-top:10px;padding-bottom:10px"><strong>A.3 DATA IBU PASANGAN PRIA</strong></label>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label" ><strong>Nama Lengkap</strong></label>
											<div class="col-sm-8">
												<input  class="form-control input-sm" type="text" placeholder="Nama Lengkap" value="<?= $ibu_pria['nama']?>" disabled>
											</div>
										</div>
										<div class="form-group">
											<label for="tempatlahir_pria"  class="col-sm-3 control-label">Tempat Tanggal Lahir</label>
											<div class="col-sm-8">
												<input class="form-control input-sm" type="text" placeholder="Tempat Lahir" value="<?= $ibu_pria['tempatlahir']." / ".tgl_indo_out($ibu_pria['tanggallahir'])?>" disabled>
											</div>
										</div>
										<div class="form-group">
											<label for="tempatlahir_pria"  class="col-sm-3 control-label">Warganegara / Agama / Pekerjaan</label>
											<div class="col-sm-2">
												<input class="form-control input-sm" type="text" placeholder="Warganegara" value="<?= $ibu_pria['wn']?>" disabled>
											</div>
											<div class="col-sm-3">
												<input class="form-control input-sm" type="text" placeholder="Agama" value="<?= $ibu_pria['agama']?>" disabled>
											</div>
											<div class="col-sm-3">
												<input class="form-control input-sm" type="text" placeholder="Pekerjaan" value="<?= $ibu_pria['pek']?>" disabled>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label" ><strong>Tempat Tinggal</strong></label>
											<div class="col-sm-8">
												<input  class="form-control input-sm" type="text" placeholder="Tempat Tinggal" value="<?= $ibu_pria['alamat_wilayah']?>">
											</div>
										</div>
										<?php else: ?>
											<div class="form-group ibu_pria" >
												<label class="col-xs-12 col-sm-3 col-lg-3 control-label bg-maroon" style="margin-top:10px;padding-top:10px;padding-bottom:10px"><strong>A.3 DATA IBU PASANGAN PRIA (Isi jika ibu bukan warga <?= strtolower($this->setting->sebutan_desa)?> ini)</strong></label>
											</div>
											<div class="form-group ibu_pria">
												<label class="col-sm-3 control-label" ><strong>Nama Lengkap</strong></label>
												<div class="col-sm-8">
													<input  name="nama_ibu_pria" class="form-control input-sm" type="text" placeholder="Nama Lengkap" value="<?= $_SESSION['post']['nama_ibu_pria']?>">
												</div>
											</div>
											<div class="form-group ibu_pria">
												<label class="col-sm-3 control-label">Tempat Tanggal Lahir</label>
												<div class="col-sm-5 col-lg-6">
													<input class="form-control input-sm" type="text" name="tempatlahir_ibu_pria" id="tempatlahir_ibu_pria" placeholder="Tempat Lahir" value="<?= $_SESSION['post']['tempatlahir_ibu_pria']?>">
												</div>
												<div class="col-sm-3 col-lg-2">
													<div class="input-group input-group-sm date">
														<div class="input-group-addon">
															<i class="fa fa-calendar"></i>
														</div>
														<input title="Pilih Tanggal"  class="form-control input-sm datepicker" name="tanggallahir_ibu_pria" type="text" placeholder="Tgl. Lahir" value="<?= $_SESSION['post']['tanggallahir_ibu_pria']?>"/>
													</div>
												</div>
											</div>
											<div class="form-group ibu_pria">
												<label class="col-sm-3 control-label">Warganegara / Agama / Pekerjaan</label>
												<div class="col-sm-2">
													<select class="form-control input-sm select2" name="wn_ibu_pria" id="wn_ibu_pria" style ="width:100%;">
														<option value="">-- Pilih warganegara --</option>
														<?php foreach ($warganegara as $data): ?>
															<option value="<?= $data['nama']?>" <?php if ($data['nama']==$_SESSION['post']['wn_ibu_pria']): ?>selected<?php endif; ?>><?= $data['nama']?></option>
														<?php endforeach;?>
													</select>
												</div>
												<div class="col-sm-3">
													<select class="form-control input-sm select2" name="agama_ibu_pria" id="agama_ibu_pria" style ="width:100%;">
														<option value="">-- Pilih Agama --</option>
														<?php foreach ($agama as $data): ?>
															<option value="<?= $data['nama']?>" <?php if ($data['nama']==$_SESSION['post']['agama_ibu_pria']): ?>selected<?php endif; ?>><?= $data['nama']?></option>
														<?php endforeach;?>
													</select>
												</div>
												<div class="col-sm-3">
													<select class="form-control input-sm select2" name="pekerjaan_ibu_pria" id="pekerjaan_ibu_pria" style ="width:100%;">
														<option value="">-- Pekerjaan --</option>
														<?php foreach ($pekerjaan as $data): ?>
															<option value="<?= $data['nama']?>" <?php if ($data['nama']==$_SESSION['post']['pekerjaan_ibu_pria']): ?>selected<?php endif; ?>><?= $data['nama']?></option>
														<?php endforeach;?>
													</select>
												</div>
											</div>
											<div class="form-group ibu_pria">
												<label class="col-sm-3 control-label" ><strong>Tempat Tinggal</strong></label>
												<div class="col-sm-8">
													<input name="alamat_ibu_pria" class="form-control input-sm" type="text" placeholder="Tempat Tinggal" value="<?= $_SESSION['post']['alamat_ibu_pria']?>">
												</div>
											</div>
										<?php endif; ?>
										<?php if (empty($pria) OR $pria['status_kawin']=="CERAI MATI"): ?>
											<div class="form-group" >
												<label class="col-xs-12 col-sm-3 col-lg-3 control-label bg-maroon" style="margin-top:10px;padding-top:10px;padding-bottom:10px"><strong>A.4 DATA ISTRI TERDAHULU </strong></label>
											</div>
											<div class="form-group istri_dulu">
												<label class="col-sm-3 control-label" ><strong>Nama <?= ucwords($jenis_pasangan)?> Terdahulu / Binti</strong></label>
												<div class="col-sm-3">
													<input name="istri_dulu" class="form-control input-sm" type="text" placeholder="Nama Istri Terdahulu" value="<?= $_SESSION['post']['istri_dulu']?>">
												</div>
												<div class="col-sm-3">
													<input name="binti" class="form-control input-sm" type="text" placeholder="Binti" value="<?= $_SESSION['post']['binti']?>">
												</div>
											</div>
											<div class="form-group istri_dulu">
												<label class="col-sm-3 control-label">Tempat Tanggal Lahir</label>
												<div class="col-sm-5 col-lg-6">
													<input class="form-control input-sm" type="text" name="tempatlahir_istri_dulu" id="tempatlahir_istri_dulu" placeholder="Tempat Lahir" value="<?= $_SESSION['post']['tempatlahir_istri_dulu']?>">
												</div>
												<div class="col-sm-3 col-lg-2">
													<div class="input-group input-group-sm date">
														<div class="input-group-addon">
															<i class="fa fa-calendar"></i>
														</div>
														<input title="Pilih Tanggal"  class="form-control input-sm datepicker" name="tanggallahir_istri_dulu" type="text" placeholder="Tgl. Lahir" value="<?= $_SESSION['post']['tanggallahir_istri_dulu']?>"/>
													</div>
												</div>
											</div>
											<div class="form-group istri_dulu">
												<label class="col-sm-3 control-label">Warganegara / Agama / Pekerjaan</label>
												<div class="col-sm-2">
													<select class="form-control input-sm select2" name="wn_istri_dulu" id="wn_istri_dulu" style ="width:100%;">
														<option value="">-- Pilih warganegara --</option>
														<?php foreach ($warganegara as $data): ?>
															<option value="<?= $data['nama']?>" <?php if ($data['nama']==$_SESSION['post']['wn_istri_dulu']): ?>selected<?php endif; ?>><?= $data['nama']?></option>
														<?php endforeach;?>
													</select>
												</div>
												<div class="col-sm-3">
													<select class="form-control input-sm select2" name="agama_istri_dulu" id="agama_istri_dulu" style ="width:100%;">
														<option value="">-- Pilih Agama --</option>
														<?php foreach ($agama as $data): ?>
															<option value="<?= $data['nama']?>" <?php if ($data['nama']==$_SESSION['post']['agama_istri_dulu']): ?>selected<?php endif; ?>><?= $data['nama']?></option>
														<?php endforeach;?>
													</select>
												</div>
												<div class="col-sm-3">
													<select class="form-control input-sm select2" name="pek_istri_dulu" id="pek_istri_dulu" style ="width:100%;">
														<option value="">-- Pekerjaan --</option>
														<?php foreach ($pekerjaan as $data): ?>
															<option value="<?= $data['nama']?>" <?php if ($data['nama']==$_SESSION['post']['pek_istri_dulu']): ?>selected<?php endif; ?>><?= $data['nama']?></option>
														<?php endforeach;?>
													</select>
												</div>
											</div>
											<div class="form-group istri_dulu">
												<label class="col-sm-3 control-label" ><strong>Tempat Tinggal</strong></label>
												<div class="col-sm-8">
													<input name="alamat_istri_dulu" class="form-control input-sm" type="text" placeholder="Tempat Tinggal" value="<?= $_SESSION['post']['alamat_istri_dulu']?>">
												</div>
											</div>
											<div class="form-group istri_dulu">
												<label class="col-sm-3 control-label" ><strong>Keterangan <?= ucwords($jenis_pasangan)?> Dulu</strong></label>
												<div class="col-sm-8">
													<textarea name="ket_istri_dulu" class="form-control input-sm" placeholder="Keterangan" ><?= $_SESSION['post']['ket_istri_dulu']?></textarea>
												</div>
											</div>
										<?php endif; ?>
										<!-- CALON PASANGAN WANITA -->
										<?php $jenis_pasangan = "Suami"; ?>
										<div class="form-group subtitle_head">
											<label class="col-sm-3 control-label" for="status">B. CALON PASANGAN WANITA</label>
											<div class="btn-group col-sm-8" data-toggle="buttons">
												<label for="calon_wanita_1" class="btn btn-info btn-flat btn-sm col-sm-4 col-sm-4 col-md-4 col-lg-3 form-check-label <?php if (!empty($wanita)): ?>active<?php endif ?>">
													<input id="calon_wanita_1" type="radio"  name="calon_wanita" class="form-check-input" type="radio" value="1" <?php if (!empty($wanita)): ?>checked<?php endif; ?> autocomplete="off" onchange="calon_wanita_asal(this.value);"> Warga Desa
												</label>
												<label id="label_calon_wanita_2" for="calon_wanita_2" class="btn btn-info btn-flat btn-sm col-sm-4 col-md-4 col-lg-3 form-check-label <?php if (empty($wanita)): ?>active<?php endif; ?>">
													<input id="calon_wanita_2" type="radio"  name="calon_wanita" class="form-check-input" type="radio" value="2" <?php if (empty($wanita)): ?>checked<?php endif; ?> autocomplete="off" onchange="calon_wanita_asal(this.value);"> Warga Luar Desa
												</label>
											</div>
										</div>
										<div class="form-group wanita_desa" <?php if (empty($wanita)): ?>style="display: none;"<?php endif; ?>>
											<label for="wanita_desa" class="col-xs-12 col-sm-3 col-lg-3 control-label bg-maroon" style="margin-top:-10px;padding-top:10px;padding-bottom:10px"><strong>B.1 DATA CALON PASANGAN WANITA WARGA DESA</strong></label>
										</div>
										<div class="form-group wanita_desa" <?php if (empty($wanita)): ?>style="display: none;"<?php endif; ?>>
											<label for="$wanita" class="col-sm-3 control-label" ><strong>NIK / Nama :</strong></label>
											<div class="col-sm-5">
												<select class="form-control  input-sm select2-nik" id="id_wanita" name="id_wanita" style ="width:100%;"  onchange="submit_form_ambil_data_wanita(this.id);">
													<option value="">--  Cari NIK / Nama--</option>
													<?php foreach ($perempuan as $data): ?>
														<option value="<?= $data['id']?>" <?php selected($wanita['nik'], $data['nik']); ?>><?= $data['info_pilihan_penduduk']?></option>
													<?php endforeach;?>
												</select>
											</div>
										</div>
										<?php if ($wanita): ?>
									<?php if ($wanita): //bagian info setelah terpilih
									$individu = $wanita;
									include("donjo-app/views/surat/form/konfirmasi_pemohon.php");
								endif; ?>
								<div class="form-group">
									<label for="status_kawin_pria" class="col-sm-3 control-label" ><strong>Jika wanita, terangkan perawan atau janda</strong></label>
									<div class="col-sm-4">
										<select class="form-control input-sm select2 required" style ="width:100%;" disabled="disabled">
											<option value="">-- Pilih Status Kawin --</option>
											<?php foreach ($kode['status_kawin_wanita'] as $data): ?>
												<option value="<?= $data?>" <?php if ($wanita['status_kawin_wanita']==$data): ?>selected<?php endif; ?>><?= ucwords($data)?></option>
											<?php endforeach;?>
										</select>
									</div>
									<p class="help-block">(Status kawin: <?= $wanita['status_kawin']?>)</p>
									<input type="hidden" name="status_kawin_wanita" id="status_kawin_wanita" value="<?= $wanita['status_kawin_wanita']?>">
								</div>
							<?php endif; ?>
							<?php if (empty($wanita)): ?>
								<div class="form-group wanita_luar_desa" >
									<label for="wanita_luar_desa"  class="col-xs-12 col-sm-3 col-lg-3 control-label bg-maroon" style="margin-top:-10px;padding-top:10px;padding-bottom:10px"><strong>B.1 DATA CALON PASANGAN WANITA LUAR DESA</strong></label>
								</div>
								<div class="form-group wanita_luar_desa">
									<label for="wanita_luar_desa" class="col-sm-3 control-label" ><strong>Nama Lengkap</strong></label>
									<div class="col-sm-8">
										<input  name="nama_wanita" class="form-control input-sm" type="text" placeholder="Nama Lengkap" value="<?= $_SESSION['post']['nama_wanita']?>">
									</div>
								</div>
								<div class="form-group wanita_luar_desa">
									<label for="tempatlahir_wanita"  class="col-sm-3 control-label">Tempat Tanggal Lahir</label>
									<div class="col-sm-5 col-lg-6">
										<input class="form-control input-sm" type="text" name="tempatlahir_wanita" id="tempatlahir_wanita" placeholder="Tempat Lahir" value="<?= $_SESSION['post']['tempatlahir_wanita']?>">
									</div>
									<div class="col-sm-3 col-lg-2">
										<div class="input-group input-group-sm date">
											<div class="input-group-addon">
												<i class="fa fa-calendar"></i>
											</div>
											<input title="Pilih Tanggal"  class="form-control input-sm datepicker" name="tanggallahir_wanita" type="text" placeholder="Tgl. Lahir" value="<?= $_SESSION['post']['tanggallahir_wanita']?>"/>
										</div>
									</div>
								</div>
								<div class="form-group wanita_luar_desa">
									<label for="tempatlahir_wanita"  class="col-sm-3 control-label">Warganegara / Agama / Pekerjaan</label>
									<div class="col-sm-2">
										<select class="form-control input-sm select2" name="wn_wanita" id="wn_wanita" style ="width:100%;">
											<option value="">-- Pilih warganegara --</option>
											<?php foreach ($warganegara as $data): ?>
												<option value="<?= $data['nama']?>" <?php if ($data['nama']==$_SESSION['post']['wn_wanita']): ?>selected<?php endif; ?>><?= $data['nama']?></option>
											<?php endforeach;?>
										</select>
									</div>
									<div class="col-sm-3">
										<select class="form-control input-sm select2" name="agama_wanita" id="agama_wanita" style ="width:100%;">
											<option value="">-- Pilih Agama --</option>
											<?php foreach ($agama as $data): ?>
												<option value="<?= $data['nama']?>" <?php if ($data['nama']==$_SESSION['post']['agama_wanita']): ?>selected<?php endif; ?>><?= $data['nama']?></option>
											<?php endforeach;?>
										</select>
									</div>
									<div class="col-sm-3">
										<select class="form-control input-sm select2" name="pekerjaan_wanita" id="pekerjaan_wanita" style ="width:100%;">
											<option value="">-- Pekerjaan --</option>
											<?php foreach ($pekerjaan as $data): ?>
												<option value="<?= $data['nama']?>" <?php if ($data['nama']==$_SESSION['post']['pekerjaan_wanita']): ?>selected<?php endif; ?>><?= $data['nama']?></option>
											<?php endforeach;?>
										</select>
									</div>
								</div>
								<div class="form-group wanita_luar_desa">
									<label for="wanita_luar_desa" class="col-sm-3 control-label" ><strong>Tempat Tinggal</strong></label>
									<div class="col-sm-8">
										<input  name="alamat_wanita" class="form-control input-sm" type="text" placeholder="Tempat Tinggal" value="<?= $_SESSION['post']['alamat_wanita']?>">
									</div>
								</div>
								<div class="form-group wanita_luar_desa">
									<label for="wanita_luar_desa" class="col-sm-3 control-label" ><strong>Jika wanita, terangkan perawan atau janda</strong></label>
									<div class="col-sm-4">
										<select class="form-control input-sm select2" name="status_kawin_wanita" id="status_kawin_wanita" onchange="cerai_mati($(this).val())" style ="width:100%;">
											<option value="">-- Pilih Status Kawin --</option>
											<?php foreach ($kode['status_kawin_wanita'] as $data): ?>
												<option value="<?= $data?>" <?php if ($data['nama']==$_SESSION['post']['status_kawin_wanita']): ?>selected<?php endif; ?>><?= ucwords($data)?></option>
											<?php endforeach;?>
										</select>
									</div>
								</div>
							<?php endif; ?>
							<?php if ($ayah_wanita): ?>
								<div class="form-group" >
									<label class="col-xs-12 col-sm-3 col-lg-3 control-label bg-maroon" style="margin-top:10px;padding-top:10px;padding-bottom:10px"><strong>B.2 DATA AYAH PASANGAN WANITA</strong></label>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label" ><strong>Nama Lengkap</strong></label>
									<div class="col-sm-8">
										<input  class="form-control input-sm" type="text" placeholder="Nama Lengkap" value="<?= $ayah_wanita['nama']?>" disabled>
									</div>
								</div>
								<div class="form-group">
									<label for="tempatlahir_pria"  class="col-sm-3 control-label">Tempat Tanggal Lahir</label>
									<div class="col-sm-8">
										<input class="form-control input-sm" type="text" placeholder="Tempat Lahir" value="<?= $ayah_wanita['tempatlahir']." / ".tgl_indo_out($ayah_wanita['tanggallahir'])?>" disabled>
									</div>
								</div>
								<div class="form-group">
									<label for="tempatlahir_pria"  class="col-sm-3 control-label">Warganegara / Agama / Pekerjaan</label>
									<div class="col-sm-2">
										<input class="form-control input-sm" type="text" placeholder="Warganegara" value="<?= $ayah_wanita['wn']?>" disabled>
									</div>
									<div class="col-sm-3">
										<input class="form-control input-sm" type="text" placeholder="Agama" value="<?= $ayah_wanita['agama']?>" disabled>
									</div>
									<div class="col-sm-3">
										<input class="form-control input-sm" type="text" placeholder="Pekerjaan" value="<?= $ayah_wanita['pek']?>" disabled>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label" ><strong>Tempat Tinggal</strong></label>
									<div class="col-sm-8">
										<input  class="form-control input-sm" type="text" placeholder="Tempat Tinggal" value="<?= $ayah_wanita['alamat_wilayah']?>">
									</div>
								</div>
								<?php else: ?>
									<div class="form-group ayah_wanita" >
										<label class="col-xs-12 col-sm-3 col-lg-3 control-label bg-maroon" style="margin-top:10px;padding-top:10px;padding-bottom:10px"><strong>B.2 DATA AYAH PASANGAN WANITA (Isi jika ayah bukan warga <?= strtolower($this->setting->sebutan_desa)?> ini)</strong></label>
									</div>
									<div class="form-group ayah_wanita">
										<label class="col-sm-3 control-label" ><strong>Nama Lengkap</strong></label>
										<div class="col-sm-8">
											<input  name="nama_ayah_wanita" class="form-control input-sm" type="text" placeholder="Nama Lengkap" value="<?= $_SESSION['post']['nama_ayah_wanita']?>">
										</div>
									</div>
									<div class="form-group ayah_wanita">
										<label class="col-sm-3 control-label">Tempat Tanggal Lahir</label>
										<div class="col-sm-5 col-lg-6">
											<input class="form-control input-sm" type="text" name="tempatlahir_ayah_wanita" id="tempatlahir_ayah_wanita" placeholder="Tempat Lahir" value="<?= $_SESSION['post']['tempatlahir_ayah_wanita']?>">
										</div>
										<div class="col-sm-3 col-lg-2">
											<div class="input-group input-group-sm date">
												<div class="input-group-addon">
													<i class="fa fa-calendar"></i>
												</div>
												<input title="Pilih Tanggal"  class="form-control input-sm datepicker" name="tanggallahir_ayah_wanita" type="text" placeholder="Tgl. Lahir" value="<?= $_SESSION['post']['tanggallahir_ayah_wanita']?>"/>
											</div>
										</div>
									</div>
									<div class="form-group ayah_wanita">
										<label class="col-sm-3 control-label">Warganegara / Agama / Pekerjaan</label>
										<div class="col-sm-2">
											<select class="form-control input-sm select2" name="wn_ayah_wanita" id="wn_ayah_wanita" style ="width:100%;">
												<option value="">-- Pilih warganegara --</option>
												<?php foreach ($warganegara as $data): ?>
													<option value="<?= $data['nama']?>" <?php if ($data['nama']==$_SESSION['post']['wn_ayah_wanita']): ?>selected<?php endif; ?>><?= $data['nama']?></option>
												<?php endforeach;?>
											</select>
										</div>
										<div class="col-sm-3">
											<select class="form-control input-sm select2" name="agama_ayah_wanita" id="agama_ayah_wanita" style ="width:100%;">
												<option value="">-- Pilih Agama --</option>
												<?php foreach ($agama as $data): ?>
													<option value="<?= $data['nama']?>" <?php if ($data['nama']==$_SESSION['post']['agama_ayah_wanita']): ?>selected<?php endif; ?>><?= $data['nama']?></option>
												<?php endforeach;?>
											</select>
										</div>
										<div class="col-sm-3">
											<select class="form-control input-sm select2" name="pekerjaan_ayah_wanita" id="pekerjaan_ayah_wanita" style ="width:100%;">
												<option value="">-- Pekerjaan --</option>
												<?php foreach ($pekerjaan as $data): ?>
													<option value="<?= $data['nama']?>" <?php if ($data['nama']==$_SESSION['post']['pekerjaan_ayah_wanita']): ?>selected<?php endif; ?>><?= $data['nama']?></option>
												<?php endforeach;?>
											</select>
										</div>
									</div>
									<div class="form-group ayah_wanita">
										<label class="col-sm-3 control-label" ><strong>Tempat Tinggal</strong></label>
										<div class="col-sm-8">
											<input  name="alamat_ayah_wanita" class="form-control input-sm" type="text" placeholder="Tempat Tinggal" value="<?= $_SESSION['post']['alamat_ayah_wanita']?>">
										</div>
									</div>
								<?php endif; ?>
								<?php if ($ibu_wanita): ?>
									<div class="form-group" >
										<label class="col-xs-12 col-sm-3 col-lg-3 control-label bg-maroon" style="padding-top:10px;padding-bottom:10px"><strong>B.3 DATA IBU PASANGAN WANITA</strong></label>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label" ><strong>Nama Lengkap</strong></label>
										<div class="col-sm-8">
											<input  class="form-control input-sm" type="text" placeholder="Nama Lengkap" value="<?= $ibu_wanita['nama']?>" disabled>
										</div>
									</div>
									<div class="form-group">
										<label for="tempatlahir_pria"  class="col-sm-3 control-label">Tempat Tanggal Lahir</label>
										<div class="col-sm-8">
											<input class="form-control input-sm" type="text" placeholder="Tempat Lahir" value="<?= $ibu_wanita['tempatlahir']." / ".tgl_indo_out($ibu_pria['tanggallahir'])?>" disabled>
										</div>
									</div>
									<div class="form-group">
										<label for="tempatlahir_pria"  class="col-sm-3 control-label">Warganegara / Agama / Pekerjaan</label>
										<div class="col-sm-2">
											<input class="form-control input-sm" type="text" placeholder="Warganegara" value="<?= $ibu_wanita['wn']?>" disabled>
										</div>
										<div class="col-sm-3">
											<input class="form-control input-sm" type="text" placeholder="Agama" value="<?= $ibu_wanita['agama']?>" disabled>
										</div>
										<div class="col-sm-3">
											<input class="form-control input-sm" type="text" placeholder="Pekerjaan" value="<?= $ibu_wanita['pek']?>" disabled>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label" ><strong>Tempat Tinggal</strong></label>
										<div class="col-sm-8">
											<input  class="form-control input-sm" type="text" placeholder="Tempat Tinggal" value="<?= $ibu_wanita['alamat_wilayah']?>">
										</div>
									</div>
									<?php else: ?>
										<div class="form-group ibu_wanita" >
											<label class="col-xs-12 col-sm-3 col-lg-3 control-label bg-maroon" style="margin-top:10px;padding-top:10px;padding-bottom:10px"><strong>B.3 DATA IBU PASANGAN WANITA (Isi jika ibu bukan warga <?= strtolower($this->setting->sebutan_desa)?> ini)</strong></label>
										</div>
										<div class="form-group ibu_wanita">
											<label class="col-sm-3 control-label" ><strong>Nama Lengkap</strong></label>
											<div class="col-sm-8">
												<input  name="nama_ibu_wanita" class="form-control input-sm" type="text" placeholder="Nama Lengkap" value="<?= $_SESSION['post']['nama_ibu_wanita']?>">
											</div>
										</div>
										<div class="form-group  ibu_wanita">
											<label class="col-sm-3 control-label">Tempat Tanggal Lahir</label>
											<div class="col-sm-5 col-lg-6">
												<input class="form-control input-sm" type="text" name="tempatlahir_ibu_wanita" id="tempatlahir_ibu_wanita" placeholder="Tempat Lahir" value="<?= $_SESSION['post']['tempatlahir_ibu_wanita']?>">
											</div>
											<div class="col-sm-3 col-lg-2">
												<div class="input-group input-group-sm date">
													<div class="input-group-addon">
														<i class="fa fa-calendar"></i>
													</div>
													<input title="Pilih Tanggal"  class="form-control input-sm datepicker" name="tanggallahir_ibu_wanita" type="text" placeholder="Tgl. Lahir" value="<?= $_SESSION['post']['tanggallahir_ibu_wanita']?>"/>
												</div>
											</div>
										</div>
										<div class="form-group ibu_wanita">
											<label class="col-sm-3 control-label">Warganegara / Agama / Pekerjaan</label>
											<div class="col-sm-2">
												<select class="form-control input-sm select2" name="wn_ibu_wanita" id="wn_ibu_wanita" style ="width:100%;">
													<option value="">-- Pilih warganegara --</option>
													<?php foreach ($warganegara as $data): ?>
														<option value="<?= $data['nama']?>" <?php if ($data['nama']==$_SESSION['post']['wn_ibu_wanita']): ?>selected<?php endif; ?>><?= $data['nama']?></option>
													<?php endforeach;?>
												</select>
											</div>
											<div class="col-sm-3">
												<select class="form-control input-sm select2" name="agama_ibu_wanita" id="agama_ibu_wanita" style ="width:100%;">
													<option value="">-- Pilih Agama --</option>
													<?php foreach ($agama as $data): ?>
														<option value="<?= $data['nama']?>" <?php if ($data['nama']==$_SESSION['post']['agama_ibu_wanita']): ?>selected<?php endif; ?>><?= $data['nama']?></option>
													<?php endforeach;?>
												</select>
											</div>
											<div class="col-sm-3">
												<select class="form-control input-sm select2" name="pekerjaan_ibu_wanita" id="pekerjaan_ibu_wanita" style ="width:100%;">
													<option value="">-- Pekerjaan --</option>
													<?php foreach ($pekerjaan as $data): ?>
														<option value="<?= $data['nama']?>" <?php if ($data['nama']==$_SESSION['post']['pekerjaan_ibu_wanita']): ?>selected<?php endif; ?>><?= $data['nama']?></option>
													<?php endforeach;?>
												</select>
											</div>
										</div>
										<div class="form-group ibu_wanita">
											<label class="col-sm-3 control-label" ><strong>Tempat Tinggal</strong></label>
											<div class="col-sm-8">
												<input name="alamat_ibu_wanita" class="form-control input-sm" type="text" placeholder="Tempat Tinggal" value="<?= $_SESSION['post']['alamat_ibu_wanita']?>">
											</div>
										</div>
									<?php endif; ?>
									<?php if (empty($wanita) OR strtolower($wanita['status_kawin'])=="cerai mati"): ?>
									<div id="cerai_mati" class="form-group" >
										<label class="col-xs-12 col-sm-3 col-lg-3 control-label bg-maroon" style="margin-top:10px;padding-top:10px;padding-bottom:10px"><strong>B.4 DATA SUAMI TERDAHULU </strong></label>
									</div>
									<div class="form-group suami_dulu">
										<label class="col-sm-3 control-label" ><strong>Nama <?= ucwords($jenis_pasangan)?> Terdahulu / Bin</strong></label>
										<div class="col-sm-3">
											<input name="nama_suami_dulu" class="form-control input-sm" type="text" placeholder="Nama Suami Terdahulu" value="<?= $_SESSION['post']['nama_suami_dulu']?>">
										</div>
										<div class="col-sm-3">
											<input name="bin_suami_dulu" class="form-control input-sm" type="text" placeholder="Bin" value="<?= $_SESSION['post']['binti_suami_dulu']?>">
										</div>
									</div>
									<div class="form-group suami_dulu">
										<label class="col-sm-3 control-label">Tempat Tanggal Lahir</label>
										<div class="col-sm-5 col-lg-6">
											<input class="form-control input-sm" type="text" name="tempatlahir_suami_dulu" id="tempatlahir_suami_dulu" placeholder="Tempat Lahir" value="<?= $_SESSION['post']['tempatlahir_suami_dulu']?>">
										</div>
										<div class="col-sm-3 col-lg-2">
											<div class="input-group input-group-sm date">
												<div class="input-group-addon">
													<i class="fa fa-calendar"></i>
												</div>
												<input title="Pilih Tanggal"  class="form-control input-sm datepicker" name="tanggallahir_suami_dulu" type="text" placeholder="Tgl. Lahir" value="<?= $_SESSION['post']['tanggallahir_suami_dulu']?>"/>
											</div>
										</div>
									</div>
									<div class="form-group suami_dulu">
										<label class="col-sm-3 control-label">Warganegara / Agama / Pekerjaan</label>
										<div class="col-sm-2">
											<select class="form-control input-sm select2" name="wn_suami_dulu" id="wn_suami_dulu" style ="width:100%;">
												<option value="">-- Pilih warganegara --</option>
												<?php foreach ($warganegara as $data): ?>
													<option value="<?= $data['nama']?>" <?php if ($data['nama']==$_SESSION['post']['wn_suami_dulu']): ?>selected<?php endif; ?>><?= $data['nama']?></option>
												<?php endforeach;?>
											</select>
										</div>
										<div class="col-sm-3">
											<select class="form-control input-sm select2" name="agama_suami_dulu" id="agama_suami_dulu" style ="width:100%;">
												<option value="">-- Pilih Agama --</option>
												<?php foreach ($agama as $data): ?>
													<option value="<?= $data['nama']?>" <?php if ($data['nama']==$_SESSION['post']['agama_suami_dulu']): ?>selected<?php endif; ?>><?= $data['nama']?></option>
												<?php endforeach;?>
											</select>
										</div>
										<div class="col-sm-3">
											<select class="form-control input-sm select2" name="pek_suami_dulu" id="pek_suami_dulu" style ="width:100%;">
												<option value="">-- Pekerjaan --</option>
												<?php foreach ($pekerjaan as $data): ?>
													<option value="<?= $data['nama']?>" <?php if ($data['nama']==$_SESSION['post']['pek_suami_dulu']): ?>selected<?php endif; ?>><?= $data['nama']?></option>
												<?php endforeach;?>
											</select>
										</div>
									</div>
									<div class="form-group suami_dulu">
										<label class="col-sm-3 control-label" ><strong>Tempat Tinggal</strong></label>
										<div class="col-sm-8">
											<input name="alamat_suami_dulu" class="form-control input-sm" type="text" placeholder="Tempat Tinggal" value="<?= $_SESSION['post']['alamat_suami_dulu']?>">
										</div>
									</div>
									<div class="form-group suami_dulu">
										<label class="col-sm-3 control-label" ><strong>Keterangan <?= ucwords($jenis_pasangan)?> Dulu</strong></label>
										<div class="col-sm-8">
											<textarea name="ket_suami_dulu" class="form-control input-sm" placeholder="Keterangan" ><?= $_SESSION['post']['ket_suami_dulu']?></textarea>
										</div>
									</div>
								<?php endif; ?>
								<div class="form-group" >
									<label class="col-xs-12 col-sm-3 col-lg-3 control-label bg-maroon" style="margin-top:10px;padding-top:10px;padding-bottom:10px"><strong>B.5 DATA WALI NIKAH </strong></label>
								</div>
								<div class="form-group wali">
									<label class="col-sm-3 control-label" ><strong>Nama Wali Nikah / Bin</strong></label>
									<div class="col-sm-3">
										<input name="nama_wali" class="form-control input-sm" type="text" placeholder="Nama Wali Nikah" value="<?= $_SESSION['post']['nama_wali']?>">
									</div>
									<div class="col-sm-3">
										<input name="bin_wali" class="form-control input-sm" type="text" placeholder="Bin" value="<?= $_SESSION['post']['bin_wali']?>">
									</div>
								</div>
								<div class="form-group wali">
									<label class="col-sm-3 control-label">Tempat Tanggal Lahir</label>
									<div class="col-sm-5 col-lg-6">
										<input class="form-control input-sm" type="text" name="tempatlahir_wali" id="tempatlahir_wali" placeholder="Tempat Lahir" value="<?= $_SESSION['post']['tempatlahir_wali']?>">
									</div>
									<div class="col-sm-3 col-lg-2">
										<div class="input-group input-group-sm date">
											<div class="input-group-addon">
												<i class="fa fa-calendar"></i>
											</div>
											<input title="Pilih Tanggal"  class="form-control input-sm datepicker" name="tanggallahir_wali" type="text" placeholder="Tgl. Lahir" value="<?= $_SESSION['post']['tanggallahir_wali']?>"/>
										</div>
									</div>
								</div>
								<div class="form-group wali">
									<label class="col-sm-3 control-label">Warganegara / Agama / Pekerjaan</label>
									<div class="col-sm-2">
										<select class="form-control input-sm select2" name="wn_wali" id="wn_wali" style ="width:100%;">
											<option value="">-- Pilih warganegara --</option>
											<?php foreach ($warganegara as $data): ?>
												<option value="<?= $data['nama']?>" <?php if ($data['nama']==$_SESSION['post']['wn_wali']): ?>selected<?php endif; ?>><?= $data['nama']?></option>
											<?php endforeach;?>
										</select>
									</div>
									<div class="col-sm-3">
										<select class="form-control input-sm select2" name="agama_wali" id="agama_wali" style ="width:100%;">
											<option value="">-- Pilih Agama --</option>
											<?php foreach ($agama as $data): ?>
												<option value="<?= $data['nama']?>" <?php if ($data['nama']==$_SESSION['post']['agama_wali']): ?>selected<?php endif; ?>><?= $data['nama']?></option>
											<?php endforeach;?>
										</select>
									</div>
									<div class="col-sm-3">
										<select class="form-control input-sm select2" name="pek_wali" id="pek_wali" style ="width:100%;">
											<option value="">-- Pekerjaan --</option>
											<?php foreach ($pekerjaan as $data): ?>
												<option value="<?= $data['nama']?>" <?php if ($data['nama']==$_SESSION['post']['pek_wali']): ?>selected<?php endif; ?>><?= $data['nama']?></option>
											<?php endforeach;?>
										</select>
									</div>
								</div>
								<div class="form-group wali">
									<label class="col-sm-3 control-label" ><strong>Tempat Tinggal</strong></label>
									<div class="col-sm-8">
										<input name="alamat_wali" class="form-control input-sm" type="text" placeholder="Tempat Tinggal" value="<?= $_SESSION['post']['alamat_wali']?>">
									</div>
								</div>
								<div class="form-group wali">
									<label class="col-sm-3 control-label" ><strong>Hubungan Dengan Wali</strong></label>
									<div class="col-sm-8">
										<input name="hub_wali" class="form-control input-sm" type="text" placeholder="Tempat Tinggal" value="<?= $_SESSION['post']['hub_wali']?>">
									</div>
								</div>
								<div class="form-group" >
									<label class="col-xs-12 col-sm-3 col-lg-3 control-label bg-maroon" style="margin-top:10px;padding-top:10px;padding-bottom:10px"><strong>C. DATA PERNIKAHAN </strong></label>
								</div>
								<div class="form-group wali">
									<label class="col-sm-3 control-label">Hari, Tanggal, Jam</label>
									<div class="col-sm-3 col-lg-4">
										<input class="form-control input-sm required" type="text" name="hari_nikah" id="hari_nikah" placeholder="Hari Nikah" value="<?= $_SESSION['post']['hari_nikah']?>">
									</div>
									<div class="col-sm-3 col-lg-2">
										<div class="input-group input-group-sm date">
											<div class="input-group-addon">
												<i class="fa fa-calendar"></i>
											</div>
											<input title="Pilih Tanggal"  class="form-control input-sm datepicker required" name="tanggal_nikah" type="text" placeholder="Tgl. Nikah" value="<?= $_SESSION['post']['tanggal_nikah']?>"/>
										</div>
									</div>
									<div class="col-sm-2">
										<div class="input-group input-group-sm date">
											<div class="input-group-addon">
												<i class="fa fa-clock-o"></i>
											</div>
											<input class="form-control input-sm required" name="jam_nikah" id="jammenit_1" type="text" placeholder="Jam Nikah" value="<?= $_SESSION['post']['jam_nikah']?>"/>
										</div>
									</div>
								</div>
								<div class="form-group wali">
									<label class="col-sm-3 control-label" ><strong>Mas Kawin</strong></label>
									<div class="col-sm-8">
										<input name="mas_kawin" class="form-control input-sm required" type="text" placeholder="Mas Kawin" value="<?= $_SESSION['post']['mas_kawin']?>">
									</div>
								</div>
								<div class="form-group wali">
									<label class="col-sm-3 control-label" ><strong>Tunai / Hutang</strong></label>
									<div class="col-sm-8">
										<input name="tunai" class="form-control input-sm required" type="text" placeholder="Tunai / Hutang" value="<?= $_SESSION['post']['tunai']?>">
									</div>
								</div>
								<div class="form-group wali">
									<label class="col-sm-3 control-label" ><strong>Tempat</strong></label>
									<div class="col-sm-8">
										<input name="tempat_nikah" class="form-control input-sm required" type="text" placeholder="Tempat" value="<?= $_SESSION['post']['tempat_nikah']?>">
									</div>
								</div>
								<?php include("donjo-app/views/surat/form/_pamong.php"); ?>
							</div>
						</form>
					</div>
					<?php include("donjo-app/views/surat/form/tombol_cetak.php"); ?>
				</div>
				<div class='modal fade' id='dialog' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
					<div class='modal-dialog'>
						<div class='modal-content'>
							<div class='modal-header'>
								<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
								<h4 class='modal-title' id='myModalLabel'><i class='fa fa-text-width text-yellow'></i> Perhatian</h4>
							</div>
							<div class='modal-body btn-info'>
								Salah satu calon pasangan, pria atau wanita, harus warga desa.
							</div>
							<div class='modal-footer'>
								<button type="button" class="btn btn-social btn-flat btn-warning btn-sm" data-dismiss="modal"><i class='fa fa-sign-out'></i> Tutup</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
                                                                                                                                                       surat/surat_ket_penduduk/surat_ket_penduduk.php                                                     0000750 0023632 0023415 00000006277 13526507272 022427  0                                                                                                    ustar   u0_a138                         everybody                                                                                                                                                                                                              <div class="content-wrapper">
	<section class="content-header">
		<h1>Surat Keterangan Penduduk</h1>
		<?php if($this->admin){ ?>
			<ol class="breadcrumb">
				<li><a href="<?= site_url('hom_desa/about')?>"><i class="fa fa-dashboard"></i> Home</a></li>
				<li><a href="<?= site_url('surat')?>"> Daftar Cetak Surat</a></li>
				<li class="active">Surat Keterangan Penduduk</li>
			</ol>
		<?php } ?>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-info">
					<div class="box-header with-border">
						<a href="<?=site_url($aksi."surat")?>" class="btn btn-social btn-flat btn-default btn-sm btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"  title="Kembali Ke Daftar Wilayah">
							<i class="fa fa-arrow-circle-left "></i> Kembali Ke Daftar Cetak Surat
						</a>
					</div>

					<div class="box-body">
						<?php if($this->admin){ ?>
							<form action="" id="main" name="main" method="POST" class="form-horizontal">
								<div class="form-group">
									<label for="nik"  class="col-sm-3 control-label">NIK / Nama</label>
									<div class="col-sm-6 col-lg-4">
										<select class="form-control  input-sm select2-nik" id="cari_nik" name="nik" style ="width:100%;" onchange="formAction('main')">
											<option value="">--  Cari NIK / Nama Penduduk--</option>
											<?php foreach ($penduduk as $data): ?>
												<option value="<?= $data['id']?>" <?php selected($individu['nik'], $data['nik']); ?>><?= $data['info_pilihan_penduduk']?></option>
											<?php endforeach;?>
										</select>
									</div>
								</div>
							</form>
						<?php } ?>
						<form id="validasi" action="<?= $form_action?>" method="POST" target="_blank" class="form-surat form-horizontal">
							<input type="hidden" id="url_surat" name="url_surat" value="<?= $url ?>">
							<input type="hidden" id="url_remote" name="url_remote" value="<?= site_url($aksi.'surat/nomor_surat_duplikat')?>">
							<?php if ($individu): ?>
								<?php include("donjo-app/views/surat/form/konfirmasi_pemohon.php"); ?>
							<?php	endif; ?>
							<div class="form-group">
								<label for="nomor" class="col-sm-3 control-label">Nomor Surat</label>
								<div class="col-sm-8">
									<input  id="nomor" class="form-control input-sm required" type="text" placeholder="Nomor Surat" name="nomor" value="<?= $surat_terakhir['no_surat_berikutnya'];?>">
									<p class="help-block text-red small"><?= $surat_terakhir['ket_nomor']?><strong><?= $surat_terakhir['no_surat'];?></strong> (tgl: <?= $surat_terakhir['tanggal']?>)</p>
								</div>
							</div>
							<div class="form-group">
								<label for="keterangan" class="col-sm-3 control-label">Keterangan</label>
								<div class="col-sm-8">
									<textarea  id="keterangan" class="form-control input-sm required" placeholder="Keterangan" name="keterangan"></textarea>
								</div>
							</div>
							<?php include("donjo-app/views/surat/form/tgl_berlaku.php"); ?>
							<?php include("donjo-app/views/surat/form/_pamong.php"); ?>
						</div>
						<?php include("donjo-app/views/surat/form/tombol_cetak.php"); ?>
					</form>
				</div>
			</div>
		</div>
	</section>
</div>
                                                                                                                                                                                                                                                                                                                                 surat/surat_ket_pengantar/surat_ket_pengantar.php                                                   0000750 0023632 0023415 00000006263 13526507274 022724  0                                                                                                    ustar   u0_a138                         everybody                                                                                                                                                                                                              <style>
.error {
	color: #dd4b39;
}
</style>

<div class="content-wrapper">
	<section class="content-header">
		<h1>Surat Keterangan</h1>
		<?php if($this->admin){ ?>
			<ol class="breadcrumb">
				<li><a href="<?= site_url('hom_desa/about')?>"><i class="fa fa-dashboard"></i> Home</a></li>
				<li><a href="<?= site_url('surat')?>"> Daftar Cetak Surat</a></li>
				<li class="active">Surat Keterangan</li>
			</ol>
		<?php } ?>
	</section>

	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-info">
					<div class="box-header with-border">
						<a href="<?=site_url($aksi.'surat')?>" class="btn btn-social btn-flat btn-default btn-sm btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"  title="Kembali Ke Daftar Wilayah">
							<i class="fa fa-arrow-circle-left "></i> Kembali Ke Daftar Cetak Surat
						</a>
					</div>
					<div class="box-body">
						<?php if($this->admin){ ?>
							<form action="" id="main" name="main" method="POST" class="form-horizontal">
								<?php include("donjo-app/views/surat/form/_cari_nik.php"); ?>
							</form>
						<?php } ?>

						<form id="validasi" action="<?= $form_action?>" method="POST" target="_blank" class="form-surat form-horizontal">
							<input type="hidden" id="url_surat" name="url_surat" value="<?= $url ?>">
							<input type="hidden" id="url_remote" name="url_remote" value="<?= site_url($aksi.'surat/nomor_surat_duplikat')?>">
							<?php if ($individu): ?>
								<?php include("donjo-app/views/surat/form/konfirmasi_pemohon.php"); ?>
							<?php	endif; ?>
							<div class="row jar_form">
								<label for="nomor" class="col-sm-3"></label>
								<div class="col-sm-8">
									<input class="required" type="hidden" name="nik" value="<?= $individu['id']?>">
								</div>
							</div>
							<div class="form-group">
								<label for="nomor"  class="col-sm-3 control-label">Nomor Surat</label>
								<div class="col-sm-8">
									<input  id="nomor" class="form-control input-sm required" type="text" placeholder="Nomor Surat" name="nomor" value="<?= $surat_terakhir['no_surat_berikutnya'];?>">
									<p class="help-block text-red small"><?= $surat_terakhir['ket_nomor']?><strong><?= $surat_terakhir['no_surat'];?></strong> (tgl: <?= $surat_terakhir['tanggal']?>)</p>
								</div>
							</div>
							<div class="form-group">
								<label for="keperluan"  class="col-sm-3 control-label">Keperluan</label>
								<div class="col-sm-8">
									<textarea name="keperluan" class="form-control input-sm required" placeholder="Keperluan"></textarea>
								</div>
							</div>
							<div class="form-group">
								<label for="keterangan"  class="col-sm-3 control-label">Keterangan</label>
								<div class="col-sm-8">
									<textarea  id="keterangan" class="form-control input-sm required" placeholder="Keterangan" name="keterangan"></textarea>
								</div>
							</div>
							<?php include("donjo-app/views/surat/form/tgl_berlaku.php"); ?>
							<?php include("donjo-app/views/surat/form/_pamong.php"); ?>
						</form>
					</div>
					<?php include("donjo-app/views/surat/form/tombol_cetak.php"); ?>
				</div>
			</div>
		</div>
	</section>
</div>
                                                                                                                                                                                                                                                                                                                                             surat/surat_ket_pergi_kawin/surat_ket_pergi_kawin.php                                               0000750 0023632 0023415 00000005643 13526507274 023565  0                                                                                                    ustar   u0_a138                         everybody                                                                                                                                                                                                              <div class="content-wrapper">
	<section class="content-header">
		<h1>Surat Keterangan Pergi Kawin</h1>
		<?php if($this->admin){ ?>
			<ol class="breadcrumb">
				<li><a href="<?= site_url('hom_desa/about')?>"><i class="fa fa-dashboard"></i> Home</a></li>
				<li><a href="<?= site_url('surat')?>"> Daftar Cetak Surat</a></li>
				<li class="active">Surat Keterangan Pergi Kawin</li>
			</ol>
		<?php } ?>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-info">
					<div class="box-header with-border">
						<a href="<?=site_url($aksi."surat")?>" class="btn btn-social btn-flat btn-default btn-sm btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"  title="Kembali Ke Daftar Wilayah">
							<i class="fa fa-arrow-circle-left "></i> Kembali Ke Daftar Cetak Surat
						</a>
					</div>
					<div class="box-body">
						<?php if($this->admin){ ?>
							<form action="" id="main" name="main" method="POST" class="form-horizontal">
								<?php include("donjo-app/views/surat/form/_cari_nik.php"); ?>
							</form>
						<?php } ?>
						<form id="validasi" action="<?= $form_action?>" method="POST" target="_blank" class="form-surat form-horizontal">
							<input type="hidden" id="url_surat" name="url_surat" value="<?= $url ?>">
							<input type="hidden" id="url_remote" name="url_remote" value="<?= site_url($aksi.'surat/nomor_surat_duplikat')?>">
							<?php if ($individu): ?>
								<?php include("donjo-app/views/surat/form/konfirmasi_pemohon.php"); ?>
							<?php	endif; ?>
							<div class="form-group">
								<label for="nomor"  class="col-sm-3 control-label">Nomor Surat</label>
								<div class="col-sm-8">
									<input  id="nomor" class="form-control input-sm required" type="text" placeholder="Nomor Surat" name="nomor" value="<?= $surat_terakhir['no_surat_berikutnya'];?>">
									<p class="help-block text-red small"><?= $surat_terakhir['ket_nomor']?><strong><?= $surat_terakhir['no_surat'];?></strong> (tgl: <?= $surat_terakhir['tanggal']?>)</p>
								</div>
							</div>
							<div class="form-group">
								<label for="keperluan"  class="col-sm-3 control-label">Tujuan</label>
								<div class="col-sm-8">
									<textarea name="tujuan" class="form-control input-sm required" placeholder="Tujuan"></textarea>
								</div>
							</div>
							<div class="form-group">
								<label for="keterangan" class="col-sm-3 control-label">Keperluan</label>
								<div class="col-sm-8">
									<textarea  id="keterangan" class="form-control input-sm required" placeholder="Keperluan" name="keterangan"></textarea>
								</div>
							</div>
							<?php include("donjo-app/views/surat/form/tgl_berlaku.php"); ?>
							<?php include("donjo-app/views/surat/form/_pamong.php"); ?>
						</form>
					</div>
					<?php include("donjo-app/views/surat/form/tombol_cetak.php"); ?>
				</div>
			</div>
		</div>
	</section>
</div>
                                                                                             surat/surat_ket_pindah_penduduk/surat_ket_pindah_penduduk.php                                       0000750 0023632 0023415 00000042552 13526507274 025273  0                                                                                                    ustar   u0_a138                         everybody                                                                                                                                                                                                              <script>
	function pilih_format_surat(kode_format)
	{
		$('#kode_format').val(kode_format);
		if (kode_format == 'f108')
		{
			$('#status_kk_tidak_pindah_f108_show').show();
			$('#status_kk_tidak_pindah_show').hide();
		}
		else
		{
			$('#status_kk_tidak_pindah_f108_show').hide();
			$('#status_kk_tidak_pindah_show').show();
		}
		// Reset klasifikasi pindah
		$('#klasifikasi_pindah_id').val('');
	}
	function get_alasan(alasan)
	{
		if (alasan == 7)
		{
			$('#sebut_alasan').show();
		}
		else
		{
			$('#sebut_alasan').hide();
		}
	}
	function enable_anggota()
	{
		jumlah_anggota = $("#jumlah_anggota").val();
		for (i = 1; i <= jumlah_anggota; i++)
		{
			anggota = $("#anggota_show"+i);
			if (anggota.length > 0)
			{
				anggota.removeAttr('disabled');
			}
		}
	}
	function anggota_pindah(ya_atau_tidak)
	{
		jumlah_anggota = $("#jumlah_anggota").val();
		for (i = 1; i <= jumlah_anggota; i++)
		{
			anggota = $("#anggota_show"+i);
			if (anggota.length > 0)
			{
				anggota.attr("checked", ya_atau_tidak);
				anggota.trigger("onchange");
				anggota.attr('disabled', 'disabled');
			}
		}
	}
	function urus_anggota(jenis_pindah)
	{
		if ($('#kode_format').val() == "f108")
		{
			status_kk_tidak_pindah = "#status_kk_tidak_pindah_f108_show";
		}
		else
		{
			status_kk_tidak_pindah = "#status_kk_tidak_pindah_show";
		}
		// Hanya anggota yang pindah
		if (jenis_pindah == 4)
		{
			$('#kk_show').attr("checked", false);
			$("#kk").attr('disabled', 'disabled');
			if ($('#kode_format').val() == "f108")
			{
				$(status_kk_tidak_pindah).val("4");
			}
			else
			{
				$(status_kk_tidak_pindah).val("3");
			}
			$(status_kk_tidak_pindah).trigger("onchange");
			$(status_kk_tidak_pindah).attr('disabled', 'disabled');
			$("#status_kk_pindah_show").removeAttr('disabled');
			enable_anggota();
		}
		else
		{
			$('#kk_show').attr("checked", true);
			$("#kk").removeAttr('disabled');
			if ($('#klasifikasi_pindah_id').val() < 3)
			{
				// Jika pindah di satu kecamatan, nomor KK tetap.
				// Jika pindah ke luar kecamatan, nomor KK ganti.
				$("#status_kk_pindah_show").val("3");
				$("#status_kk_pindah_show").trigger("onchange");
				$("#status_kk_pindah_show").attr('disabled', 'disabled');
			}
			else
			{
				$("#status_kk_pindah_show").removeAttr('disabled');
			}
			$(status_kk_tidak_pindah).removeAttr('disabled');
			// KK and semua anggota pindah
			if (jenis_pindah == 2)
			{
				if ($('#kode_format').val() == "f108")
				{
					$(status_kk_tidak_pindah).val("3");
				}
				else
				{
					$(status_kk_tidak_pindah).val(" ");
				}
				$(status_kk_tidak_pindah).trigger("onchange");
				$(status_kk_tidak_pindah).attr('disabled', 'disabled');
				anggota_pindah(true);
			}
			// KK dan sebagian anggota pindah
			if (jenis_pindah == 3)
			{
				enable_anggota();
			}
			// Hanya KK yang pindah
			if (jenis_pindah == 1)
			{
				anggota_pindah(false);
			}
		};
		$('#kk_show').trigger("onchange");
	}
	function urus_masa_ktp(centang, urut)
	{
		// ktp_berlaku sekarang selalu 'Seumur Hidup' dan tidak diubah
		if (centang)
		{
			$('#anggota' + urut).attr('disabled', 'disabled');
		}
		else
		{
			$('#anggota' + urut).removeAttr('disabled');
		}
	}
	function set_wilayah(tingkat_wilayah)
	{
		wilayah = $('#' + tingkat_wilayah);
		wilayah_show = $('#' + tingkat_wilayah + '_show');
		wilayah.val(wilayah.attr('data-awal'));
		wilayah_show.val(wilayah.attr('data-awal'));
		wilayah_show.attr('disabled', 'disabled');
	}
	function urus_klasifikasi_pindah(klasifikasi_pindah)
	{
		if (klasifikasi_pindah >= 1)
		{
			set_wilayah('desa_tujuan');
			set_wilayah('kecamatan_tujuan');
			set_wilayah('kabupaten_tujuan');
			set_wilayah('provinsi_tujuan');
		}
		if (klasifikasi_pindah > 1)
		{
			$('#kode_format').val('F-1.25');
			$('#desa_tujuan_show').removeAttr('disabled');
		}
		else
		{
			$('#kode_format').val('F-1.23');
		}
		if (klasifikasi_pindah > 2)
		{
			$('#kode_format').val('F-1.29');
			$('#kecamatan_tujuan_show').removeAttr('disabled');
		}
		if (klasifikasi_pindah > 3)
		{
			$('#kode_format').val('F-1.34');
			$('#kabupaten_tujuan_show').removeAttr('disabled');
		}
		if (klasifikasi_pindah > 4)
		{
			$('#kode_format').val('F-1.34');
			$('#provinsi_tujuan_show').removeAttr('disabled');
		}
		if ($('#pakai_format').val() == 'f108')
		{
			$('#kode_format').val('f108');
		}
		$('#jenis_kepindahan_id').trigger('onchange');
	}
</script>
<div class="content-wrapper">
	<section class="content-header">
		<h1>Surat Keterangan Pindah Penduduk</h1>
		<?php if($this->admin){ ?>
			<ol class="breadcrumb">
				<li><a href="<?= site_url('hom_desa/about')?>"><i class="fa fa-dashboard"></i> Home</a></li>
				<li><a href="<?= site_url('surat')?>"> Daftar Cetak Surat</a></li>
				<li class="active">Surat Keterangan Pindah Penduduk</li>
			</ol>
		<?php } ?>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-info">
					<div class="box-header with-border">
						<a href="<?=site_url($aksi."surat")?>" class="btn btn-social btn-flat btn-default btn-sm btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"  title="Kembali Ke Daftar Wilayah">
							<i class="fa fa-arrow-circle-left "></i> Kembali Ke Daftar Cetak Surat
						</a>
					</div>
					<div class="box-body">
						<?php if($this->admin){ ?>
							<form action="" id="main" name="main" method="POST" class="form-horizontal">
								<?php include("donjo-app/views/surat/form/_cari_nik.php"); ?>
							</form>
						<?php } ?>
						<form id="validasi" action="<?= $form_action?>" method="POST" target="_blank" class="form-surat form-horizontal">
							<input type="hidden" id="url_surat" name="url_surat" value="<?= $url ?>">
							<input type="hidden" id="url_remote" name="url_remote" value="<?= site_url($aksi.'surat/nomor_surat_duplikat')?>">
							<input id="kode_format" type="hidden" name="kode_format" value="bukan_f108">
							<?php if ($individu): ?>
								<?php include("donjo-app/views/surat/form/konfirmasi_pemohon.php"); ?>
							<?php	endif; ?>
							<div class="form-group">
								<label for="telpon"  class="col-sm-3 control-label">Telepon Pemohon</label>
								<div class="col-sm-8">
									<input  name="telepon" id="telepon" class="form-control input-sm required" type="text" placeholder="Nomor Telepon">
								</div>
							</div>
							<div class="form-group">
								<label for="pakai_format" class="col-sm-3 control-label">Gunakan Format</label>
								<div class="col-sm-4">
									<select class="form-control input-sm" id="pakai_format" name="pakai_format" style ="width:100%;" onchange="pilih_format_surat($(this).val());">
										<option value="">Pilih Format Lampiran Surat</option>
										<option value="f108">F-1.08</option>
										<option value="bukan_f108" selected>F-1.23, F-1.25, F-1.29, F-1.34 (sesuai tujuan)</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="nomor"  class="col-sm-3 control-label">Nomor Surat</label>
								<div class="col-sm-8">
									<input  id="nomor" class="form-control input-sm required" type="text" placeholder="Nomor Surat" name="nomor" value="<?= $surat_terakhir['no_surat_berikutnya'];?>">
									<p class="help-block text-red small"><?= $surat_terakhir['ket_nomor']?><strong><?= $surat_terakhir['no_surat'];?></strong> (tgl: <?= $surat_terakhir['tanggal']?>)</p>
								</div>
							</div>
							<div class="form-group">
								<label for="alasan_pindah_id" class="col-sm-3 control-label">Alasan Pindah</label>
								<div class="col-sm-4">
									<select class="form-control input-sm select2 required" style ="width:100%;" id="alasan_pindah_id" name="alasan_pindah_id" onchange=get_alasan(this.value)>
										<option value="">-- Pilih Alasan Pindah--</option>
										<?php foreach ($kode['alasan_pindah'] as $key => $value): ?>
											<option value="<?= $key?>"><?= strtoupper($value)?></option>
										<?php endforeach;?>
									</select>
								</div>
								<div  id="sebut_alasan" class="col-sm-5" style="display:none;">
									<input class="form-control input-sm" type="text" placeholder="Sebut Alasan Lainnya" name="sebut_alasan">
								</div>
							</div>
							<div class="form-group">
								<label for="klasifikasi_pindah_id" class="col-sm-3 control-label">Klasifikasi Pindah</label>
								<div class="col-sm-4">
									<select class="form-control input-sm required" id="klasifikasi_pindah_id" name="klasifikasi_pindah_id" onchange="urus_klasifikasi_pindah($(this).val());">
										<option value="">-- Pilih Klasifikasi Pindah --</option>
										<?php foreach ($kode['klasifikasi_pindah'] as $key => $value): ?>
											<option value="<?= $key?>"><?= strtoupper($value)?></option>
										<?php endforeach;?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="alamat_tujuan"  class="col-sm-3 control-label">Alamat Tujuan</label>
								<div class="col-sm-8">
									<input  id="alamat_tujuan" name="alamat_tujuan" class="form-control input-sm required" type="text" placeholder="Alamat Tujuan">
								</div>
							</div>
							<div class="form-group">
								<label for="rt_tujuan"  class="col-sm-3 control-label">RT/RW/Dusun Tujuan</label>
								<div class="col-sm-2">
									<input  id="rt_tujuan" name="rt_tujuan" class="form-control input-sm required" type="text" placeholder="RT ">
								</div>
								<div class="col-sm-2">
									<input  id="rw_tujuan" name="rw_tujuan" class="form-control input-sm required" type="text" placeholder="RW ">
								</div>
								<div class="col-sm-4">
									<input  id="dusun_tujuan" name="dusun_tujuan" class="form-control input-sm required" type="text" placeholder="Dusun">
								</div>
							</div>
							<div class="form-group">
								<label for="desa_tujuan"  class="col-sm-3 control-label">Desa/Kelurahan Tujuan</label>
								<div class="col-sm-8">
									<input  id="desa_tujuan" name="desa_tujuan" class="form-control input-sm" type="hidden" data-awal="<?= $lokasi['nama_desa'];?>">
									<input  id="desa_tujuan_show" class="form-control input-sm required" type="text" placeholder="Desa/Kelurahan"  onchange="$('#desa_tujuan').val($(this).val());">
								</div>
							</div>
							<div class="form-group">
								<label for="kecamatan_tujuan"  class="col-sm-3 control-label">Kec/Kab/Prop Tujuan</label>
								<div class="col-sm-2">
									<input id="kecamatan_tujuan" name="kecamatan_tujuan" type="hidden" data-awal="<?= $lokasi['nama_kecamatan'];?>"/>
									<input  id="kecamatan_tujuan_show" class="form-control input-sm required" type="text" placeholder="Kecamatan " onchange="$('#kecamatan_tujuan').val($(this).val());">
								</div>
								<div class="col-sm-3">
									<input id="kabupaten_tujuan" name="kabupaten_tujuan" type="hidden" data-awal="<?= $lokasi['nama_kabupaten'];?>"/>
									<input   id="kabupaten_tujuan_show" class="form-control input-sm required" type="text" placeholder="Kabupaten" onchange="$('#kabupaten_tujuan').val($(this).val());">
								</div>
								<div class="col-sm-3">
									<input id="provinsi_tujuan" name="provinsi_tujuan" type="hidden" data-awal="<?= $lokasi['nama_propinsi'];?>"/>
									<input  id="provinsi_tujuan_show" class="form-control input-sm required" type="text" placeholder="Provinsi" onchange="$('#provinsi_tujuan').val($(this).val());">
								</div>
							</div>
							<div class="form-group">
								<label for="kode_pos_tujuan"  class="col-sm-3 control-label">Kode Pos/ Telpon</label>
								<div class="col-sm-2">
									<input  id="kode_pos_tujuan" name="kode_pos_tujuan" class="form-control input-sm" type="text" placeholder="Kode Pos">
								</div>
								<div class="col-sm-3">
									<input  id="telepon_tujuan" name="telepon_tujuan" class="form-control input-sm required" type="text" placeholder="Telpon">
								</div>
							</div>
							<div class="form-group">
								<label for="jenis_kepindahan_id"  class="col-sm-3 control-label">Jenis Kepindahan</label>
								<div class="col-sm-4">
									<select class="form-control input-sm required" id="jenis_kepindahan_id" name="jenis_kepindahan_id" onchange="urus_anggota($(this).val());">
										<option value="">-- Pilih Jenis Kepindahan --</option>
										<?php foreach ($kode['jenis_kepindahan'] as $key => $value): ?>
											<option value="<?= $key?>"><?= strtoupper($value)?></option>
										<?php endforeach;?>
									</select>
								</div>
							</div>
							<input id='status_kk_tidak_pindah' type="hidden" name="status_kk_tidak_pindah_id"/>
							<div class="form-group">
								<label for="status_kk_tidak_pindah"  class="col-sm-3 control-label">Status KK Bagi Yang Tidak Pindah</label>
								<div class="col-sm-4">
									<select id="status_kk_tidak_pindah_show" class="form-control input-sm" onchange="$('#status_kk_tidak_pindah').val($(this).val());">
										<option value=" ">Pilih Status KK Tidak Pindah</option>
										<?php foreach ($kode['status_kk_tidak_pindah'] as $key => $value): ?>
											<option value="<?= $key?>"><?= strtoupper($value)?></option>
										<?php endforeach;?>
									</select>
									<select id="status_kk_tidak_pindah_f108_show" style="display: none" class="form-control input-sm" onchange="$('#status_kk_tidak_pindah').val($(this).val());">
										<option value="">Pilih Status KK Tidak Pindah</option>
										<?php foreach ($kode['status_kk_tidak_pindah_f108'] as $key => $value): ?>
											<option value="<?= $key?>"><?= strtoupper($value)?></option>
										<?php endforeach;?>
									</select>
								</div>
							</div>
							<input id='status_kk_pindah' type="hidden" name="status_kk_pindah_id"/>
							<div class="form-group" >
								<label for="status_kk_pindah_show"  class="col-sm-3 control-label">Status KK Bagi Yang Pindah</label>
								<div class="col-sm-4">
									<select class="form-control input-sm required" id='status_kk_pindah_show' onchange="$('#status_kk_pindah').val($(this).val());">
										<option value="">Pilih Status KK Pindah</option>
										<?php foreach ($kode['status_kk_pindah'] as $key => $value): ?>
											<option value="<?= $key?>"><?= strtoupper($value)?></option>
										<?php endforeach;?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="pengikut"  class="col-sm-3 control-label">Pengikut</label>
								<div class="col-sm-8">
									<div class="table-responsive">
										<table class="table table-bordered dataTable table-hover nowrap">
											<thead class="bg-gray disabled color-palette">
												<tr>
													<th>&nbsp;</th>
													<th>No</th>
													<th>NIK</th>
													<th>KTP Berlaku S/D</th>
													<th>Nama</th>
													<th>Jenis Kelamin</th>
													<th>Umur</th>
													<th>Status Kawin</th>
												</tr>
											</thead>
											<tbody>
												<?php if ($anggota!=NULL): ?>
													<input id='jumlah_anggota' type='hidden' disabled='disabled' value="<?= count($anggota);?>">
													<?php $i=0;?>
													<?php foreach ($anggota AS $data): $i++;?>
														<tr>
															<td>
																<?php if ($data['kk_level']=="1"): ?>
																	<input id='kk' type="hidden" name="id_cb[]" value="'<?= $data['id']?>'"/>
																	<input id='kk_show' disabled='disabled' type="checkbox" onchange="urus_masa_ktp($(this).is(':unchecked'),'<?= $i;?>');"/>
																	<?php else: ?>
																		<input id='anggota<?= $i?>' type="hidden" name="id_cb[]" disabled="disabled" value="'<?= $data['id']?>'"/>
																		<input id='anggota_show<?= $i?>' type="checkbox" value="'<?= $data['nik']?>'" onchange="urus_masa_ktp($(this).is(':unchecked'),'<?= $i;?>');"/>
																	<?php endif; ?>
																</td>
																<td><?= $i?></td>
																<td><?= $data['nik']?></td>
																<td>
																	<input id="ktp_berlaku<?= ($i)?>" type="hidden" name="ktp_berlaku[]" type="text" value="Seumur Hidup"/>
																	<input disabled="disabled" type="text" value="Seumur Hidup" class="inputbox" size="20"/>
																</td>
																<td><?= unpenetration($data['nama'])?></td>
																<td><?= $data['sex']?></td>
																<td><?= $data['umur']?></td>
																<td><?= $data['status_kawin']?></td>
															</tr>
														<?php endforeach;?>
													<?php endif; ?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label for="tanggal_pindah"  class="col-sm-3 control-label">Tanggal Pindah</label>
									<div class="col-sm-3 col-lg-2">
										<div class="input-group input-group-sm date">
											<div class="input-group-addon">
												<i class="fa fa-calendar"></i>
											</div>
											<input title="Pilih Tanggal" class="form-control input-sm datepicker required" name="tanggal_pindah" type="text"/>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label for="keterangan"  class="col-sm-3 control-label">Keterangan</label>
									<div class="col-sm-8">
										<input  id="keterangan" class="form-control input-sm required" type="text" placeholder="Keterangan" name="keterangan" required="">
									</div>
								</div>
								<?php include("donjo-app/views/surat/form/_pamong.php"); ?>
							</form>
						</div>
						<?php include("donjo-app/views/surat/form/tombol_cetak.php"); ?>
					</div>
				</div>
			</div>
		</section>
	</div>
                                                                                                                                                      surat/surat_ket_rujuk_cerai/surat_ket_rujuk_cerai.php                                               0000750 0023632 0023415 00000012237 13526507274 023572  0                                                                                                    ustar   u0_a138                         everybody                                                                                                                                                                                                              <div class="content-wrapper">
	<section class="content-header">
		<h1>Surat Keterangan Pengantar Rujuk/Cerai</h1>
		<?php if($this->admin){ ?>
			<ol class="breadcrumb">
				<li><a href="<?= site_url('hom_desa/about')?>"><i class="fa fa-dashboard"></i> Home</a></li>
				<li><a href="<?= site_url('surat')?>"> Daftar Cetak Surat</a></li>
				<li class="active">Surat Keterangan Pengantar Rujuk/Cerai</li>
			</ol>
		<?php } ?>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-info">
					<div class="box-header with-border">
						<a href="<?=site_url($aksi."surat")?>" class="btn btn-social btn-flat btn-default btn-sm btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"  title="Kembali Ke Daftar Wilayah">
							<i class="fa fa-arrow-circle-left "></i> Kembali Ke Daftar Cetak Surat
						</a>
					</div>
					<div class="box-body">
						<?php if($this->admin){ ?>
							<form action="" id="main" name="main" method="POST" class="form-horizontal">
								<div class="col-md-12">
									<?php include("donjo-app/views/surat/form/_cari_nik.php"); ?>
								</div>
							</form>
						<?php } ?>
						<form id="validasi" action="<?= $form_action?>" method="POST" target="_blank" class="form-surat form-horizontal">
							<input type="hidden" id="url_surat" name="url_surat" value="<?= $url ?>">
							<input type="hidden" id="url_remote" name="url_remote" value="<?= site_url($aksi.'surat/nomor_surat_duplikat')?>">
							<div class="col-md-12">
								<?php if ($individu): ?>
									<?php include("donjo-app/views/surat/form/konfirmasi_pemohon.php"); ?>
								<?php	endif; ?>
								<div class="form-group">
									<label for="nomor"  class="col-sm-3 control-label">Nomor Surat</label>
									<div class="col-sm-8">
										<input  id="nomor" class="form-control input-sm required" type="text" placeholder="Nomor Surat" name="nomor" value="<?= $surat_terakhir['no_surat_berikutnya'];?>">
										<p class="help-block text-red small"><?= $surat_terakhir['ket_nomor']?><strong><?= $surat_terakhir['no_surat'];?></strong> (tgl: <?= $surat_terakhir['tanggal']?>)</p>
									</div>
								</div>
								<div class="form-group subtitle_head">
									<label class="col-sm-3 text-right"><strong>DATA PASANGAN :</strong></label>
								</div>
								<div class="form-group">
									<label for="nama_pasangan"  class="col-sm-3 control-label">Nama Lengkap</label>
									<div class="col-sm-8">
										<input type="text"  name="nama_pasangan" class="form-control input-sm required" placeholder="Nama Lengkap Pasangan"></input>
									</div>
								</div>
								<div class="form-group ibu_luar_desa">
									<label for="tempatlahir_pasangan"  class="col-sm-3 control-label">Tempat  / Tanggal Lahir </label>
									<div class="col-sm-4">
										<input class="form-control input-sm" type="text" name="tempatlahir_pasangan" id="tempatlahir_pasanganu" placeholder="Tempat Lahir Pasangan">
									</div>
									<div class="col-sm-3 col-lg-2">
										<div class="input-group input-group-sm date">
											<div class="input-group-addon">
												<i class="fa fa-calendar"></i>
											</div>
											<input title="Pilih Tanggal" class="form-control input-sm datepicker required" name="tanggallahir_pasangan" type="text" placeholder="Tgl. Lahir">
										</div>
									</div>
								</div>
								<div class="form-group">
									<label for="wn_pasangan"  class="col-sm-3 control-label">Warganegara</label>
									<div class="col-sm-8">
										<input type="text"  name="wn_pasangan" class="form-control input-sm required" placeholder="Warganegara Pasangan"></input>
									</div>
								</div>
								<div class="form-group">
									<label for="nama_ayah_pasangan"  class="col-sm-3 control-label">Nama Ayah</label>
									<div class="col-sm-8">
										<input type="text"  name="nama_ayah_pasangan" class="form-control input-sm required" placeholder="Nama Ayah Pasangan"></input>
									</div>
								</div>
								<div class="form-group">
									<label for="agama_pasangan"  class="col-sm-3 control-label">Agama</label>
									<div class="col-sm-8">
										<input type="text"  name="agama_pasangan" class="form-control input-sm required" placeholder="Agama Pasangan"></input>
									</div>
								</div>
								<div class="form-group">
									<label for="pekerjaan_pasangan"  class="col-sm-3 control-label">Pekerjaan</label>
									<div class="col-sm-8">
										<input type="text"  name="pekerjaan_pasangan" class="form-control input-sm required" placeholder="Pekerjaan Pasangan"></input>
									</div>
								</div>
								<div class="form-group">
									<label for="alamat_pasangan"  class="col-sm-3 control-label">Tempat Tinggal</label>
									<div class="col-sm-8">
										<input type="text" name="alamat_pasangan" class="form-control input-sm required" placeholder="Tempat Tinggal Pasangan"></input>
									</div>
								</div>
								<?php include("donjo-app/views/surat/form/_pamong.php"); ?>
							</div>
						</form>
					</div>
					<?php include("donjo-app/views/surat/form/tombol_cetak.php"); ?>
				</div>
			</div>
		</div>
	</section>
</div>
                                                                                                                                                                                                                                                                                                                                                                 surat/surat_ket_usaha/surat_ket_usaha.php                                                           0000750 0023632 0023415 00000005644 13526507274 021172  0                                                                                                    ustar   u0_a138                         everybody                                                                                                                                                                                                              <div class="content-wrapper">
	<section class="content-header">
		<h1>Surat Keterangan Usaha</h1>
		<?php if($this->admin){ ?>
			<ol class="breadcrumb">
				<li><a href="<?= site_url('hom_desa/about')?>"><i class="fa fa-dashboard"></i> Home</a></li>
				<li><a href="<?= site_url('surat')?>"> Daftar Cetak Surat</a></li>
				<li class="active">Surat Keterangan Usaha</li>
			</ol>
		<?php } ?>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-info">
					<div class="box-header with-border">
						<a href="<?=site_url($aksi."surat")?>" class="btn btn-social btn-flat btn-default btn-sm btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"  title="Kembali Ke Daftar Wilayah">
							<i class="fa fa-arrow-circle-left "></i> Kembali Ke Daftar Cetak Surat
						</a>
					</div>
					<div class="box-body">
						<?php if($this->admin){ ?>
							<form action="" id="main" name="main" method="POST" class="form-horizontal">
								<?php include("donjo-app/views/surat/form/_cari_nik.php"); ?>
							</form>
						<?php } ?>
						<form id="validasi" action="<?= $form_action?>" method="POST" target="_blank" class="form-surat form-horizontal">
							<input type="hidden" id="url_surat" name="url_surat" value="<?= $url ?>">
							<input type="hidden" id="url_remote" name="url_remote" value="<?= site_url($aksi.'surat/nomor_surat_duplikat')?>">
							<?php if ($individu): ?>
								<?php include("donjo-app/views/surat/form/konfirmasi_pemohon.php"); ?>
							<?php	endif; ?>
							<div class="form-group">
								<label for="nomor"  class="col-sm-3 control-label">Nomor Surat</label>
								<div class="col-sm-8">
									<input  id="nomor" class="form-control input-sm required" type="text" placeholder="Nomor Surat" name="nomor" value="<?= $surat_terakhir['no_surat_berikutnya'];?>">
									<p class="help-block text-red small"><?= $surat_terakhir['ket_nomor']?><strong><?= $surat_terakhir['no_surat'];?></strong> (tgl: <?= $surat_terakhir['tanggal']?>)</p>
								</div>
							</div>
							<div class="form-group">
								<label for="usaha"  class="col-sm-3 control-label">Nama/ Jenis Usaha</label>
								<div class="col-sm-8">
									<input  id="usaha" class="form-control input-sm required" type="text" placeholder="Nama/ Jenis Usaha" name="usaha">
								</div>
							</div>
							<div class="form-group">
								<label for="keterangan"  class="col-sm-3 control-label">Keterangan</label>
								<div class="col-sm-8">
									<textarea name="keterangan" class="form-control input-sm required" placeholder="Keterangan"></textarea>
								</div>
							</div>
							<?php include("donjo-app/views/surat/form/tgl_berlaku.php"); ?>
							<?php include("donjo-app/views/surat/form/_pamong.php"); ?>
						</form>
					</div>
					<?php include("donjo-app/views/surat/form/tombol_cetak.php"); ?>
				</div>
			</div>
		</div>
	</section>
</div>
                                                                                            surat/surat_ket_wali_hakim/surat_ket_wali_hakim.php                                                 0000750 0023632 0023415 00000004431 13526507274 023173  0                                                                                                    ustar   u0_a138                         everybody                                                                                                                                                                                                              <div class="content-wrapper">
	<section class="content-header">
		<h1>Surat Keterangan Wali Hakim</h1>
		<?php if($this->admin){ ?>
			<ol class="breadcrumb">
				<li><a href="<?= site_url('hom_desa/about')?>"><i class="fa fa-dashboard"></i> Home</a></li>
				<li><a href="<?= site_url('surat')?>"> Daftar Cetak Surat</a></li>
				<li class="active">Surat Keterangan Wali Hakim</li>
			</ol>
		<?php } ?>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-info">
					<div class="box-header with-border">
						<a href="<?=site_url($aksi."surat")?>" class="btn btn-social btn-flat btn-default btn-sm btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"  title="Kembali Ke Daftar Wilayah">
							<i class="fa fa-arrow-circle-left "></i> Kembali Ke Daftar Cetak Surat
						</a>
					</div>
					<div class="box-body">
						<?php if($this->admin){ ?>
							<form action="" id="main" name="main" method="POST" class="form-horizontal">
								<?php include("donjo-app/views/surat/form/_cari_nik.php"); ?>
							</form>
						<?php } ?>
						<form id="validasi" action="<?= $form_action?>" method="POST" target="_blank" class="form-surat form-horizontal">
							<input type="hidden" id="url_surat" name="url_surat" value="<?= $url ?>">
							<input type="hidden" id="url_remote" name="url_remote" value="<?= site_url($aksi.'surat/nomor_surat_duplikat')?>">
							<?php if ($individu): ?>
								<?php include("donjo-app/views/surat/form/konfirmasi_pemohon.php"); ?>
							<?php	endif; ?>
							<div class="form-group">
								<label for="nomor"  class="col-sm-3 control-label">Nomor Surat</label>
								<div class="col-sm-8">
									<input  id="nomor" class="form-control input-sm required" type="text" placeholder="Nomor Surat" name="nomor" value="<?= $surat_terakhir['no_surat_berikutnya'];?>">
									<p class="help-block text-red small"><?= $surat_terakhir['ket_nomor']?><strong><?= $surat_terakhir['no_surat'];?></strong> (tgl: <?= $surat_terakhir['tanggal']?>)</p>
								</div>
							</div>
							<?php include("donjo-app/views/surat/form/_pamong.php"); ?>
						</form>
					</div>
					<?php include("donjo-app/views/surat/form/tombol_cetak.php"); ?>
				</div>
			</div>
		</div>
	</section>
</div>
                                                                                                                                                                                                                                       surat/surat_permohonan_akta/surat_permohonan_akta.php                                               0000750 0023632 0023415 00000011347 13526507274 023573  0                                                                                                    ustar   u0_a138                         everybody                                                                                                                                                                                                              <div class="content-wrapper">
	<section class="content-header">
		<h1>Surat Permohonan Akta Lahir</h1>
		<?php if($this->admin){ ?>
			<ol class="breadcrumb">
				<li><a href="<?= site_url('hom_desa/about')?>"><i class="fa fa-dashboard"></i> Home</a></li>
				<li><a href="<?= site_url('surat')?>"> Daftar Cetak Surat</a></li>
				<li class="active">Surat Permohonan Akta Lahir</li>
			</ol>
		<?php } ?>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-info">
					<div class="box-header with-border">
						<a href="<?=site_url($aksi."surat")?>" class="btn btn-social btn-flat btn-default btn-sm btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"  title="Kembali Ke Daftar Wilayah">
							<i class="fa fa-arrow-circle-left "></i> Kembali Ke Daftar Cetak Surat
						</a>
					</div>
					<div class="box-body">
						<?php if($this->admin){ ?>
							<form action="" id="main" name="main" method="POST" class="form-horizontal">
								<?php include("donjo-app/views/surat/form/_cari_nik.php"); ?>
							</form>
						<?php } ?>
						<form id="validasi" action="<?= $form_action?>" method="POST" target="_blank" class="form-surat form-horizontal">
							<input type="hidden" id="url_surat" name="url_surat" value="<?= $url ?>">
							<input type="hidden" id="url_remote" name="url_remote" value="<?= site_url($aksi.'surat/nomor_surat_duplikat')?>">
							<?php if ($individu): ?>
								<?php include("donjo-app/views/surat/form/konfirmasi_pemohon.php"); ?>
							<?php	endif; ?>
							<div class="form-group">
								<label for="nomor"  class="col-sm-3 control-label">Nomor Surat</label>
								<div class="col-sm-8">
									<input  id="nomor" class="form-control input-sm required" type="text" placeholder="Nomor Surat" name="nomor" value="<?= $surat_terakhir['no_surat_berikutnya'];?>">
									<p class="help-block text-red small"><?= $surat_terakhir['ket_nomor']?><strong><?= $surat_terakhir['no_surat'];?></strong> (tgl: <?= $surat_terakhir['tanggal']?>)</p>
								</div>
							</div>
							<div class="form-group">
								<label for="nama_anak"  class="col-sm-3 control-label">Nama Anak</label>
								<div class="col-sm-8">
									<input  id="nama_anak" class="form-control input-sm required" type="text" placeholder="Nama Anak" name="nama_anak">
								</div>
							</div>
							<div class="form-group">
								<label for="tempat_lahir"  class="col-sm-3 control-label">Tempat Tanggal lahir</label>
								<div class="col-sm-5 col-lg-6">
									<input  id="tempatlahir_anak" class="form-control input-sm required" type="text" placeholder="Tempat Lahir" name="tempatlahir_anak">
								</div>
								<div class="col-sm-3 col-lg-2">
									<div class="input-group input-group-sm date">
										<div class="input-group-addon">
											<i class="fa fa-calendar"></i>
										</div>
										<input title="Pilih Tanggal" class="form-control input-sm datepicker required" name="tanggallahir_anak" type="text"/>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="harilahir_anak"  class="col-sm-3 control-label">Hari lahir</label>
								<div class="col-sm-5">
									<input  id="harilahir_anak" class="form-control input-sm required" type="text" placeholder="Hari Lahir" name="harilahir_anak">
								</div>
							</div>
							<div class="form-group">
								<label for="alamat"  class="col-sm-3 control-label">Alamat Anak</label>
								<div class="col-sm-8">
									<input  id="alamat_anak" class="form-control input-sm required" type="text" placeholder="Alamat Anak" name="alamat_anak">
								</div>
							</div>
							<div class="form-group">
								<label for="nama_ayah"  class="col-sm-3 control-label">Nama Ayah</label>
								<div class="col-sm-8">
									<input id="nama_ayah" class="form-control input-sm required" type="text" placeholder="Nama Ayah" name="nama_ayah">
								</div>
							</div>
							<div class="form-group">
								<label for="nama_ibu"  class="col-sm-3 control-label">Nama Ibu</label>
								<div class="col-sm-8">
									<input id="nama_ibu" class="form-control input-sm required" type="text" placeholder="Nama Ibu" name="nama_ibu">
								</div>
							</div>
							<div class="form-group">
								<label for="nama_ortu"  class="col-sm-3 control-label">Alamat Orang Tua</label>
								<div class="col-sm-8">
									<input  id="nama_ortu" class="form-control input-sm required" type="text" placeholder="Alamat Orang Tua" name="nama_ortu">
								</div>
							</div>
							<?php include("donjo-app/views/surat/form/_pamong.php"); ?>
						</form>
					</div>
					<?php include("donjo-app/views/surat/form/tombol_cetak.php"); ?>
				</div>
			</div>
		</div>
	</section>
</div>
                                                                                                                                                                                                                                                                                         surat/surat_permohonan_cerai/surat_permohonan_cerai.php                                             0000750 0023632 0023415 00000005053 13526507274 024076  0                                                                                                    ustar   u0_a138                         everybody                                                                                                                                                                                                              <div class="content-wrapper">
	<section class="content-header">
		<h1>Surat Permohonan Cerai</h1>
		<?php if($this->admin){ ?>
			<ol class="breadcrumb">
				<li><a href="<?= site_url('hom_desa/about')?>"><i class="fa fa-dashboard"></i> Home</a></li>
				<li><a href="<?= site_url('surat')?>"> Daftar Cetak Surat</a></li>
				<li class="active">Surat Permohonan Cerai</li>
			</ol>
		<?php } ?>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-info">
					<div class="box-header with-border">
						<a href="<?=site_url($aksi."surat")?>" class="btn btn-social btn-flat btn-default btn-sm btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"  title="Kembali Ke Daftar Wilayah">
							<i class="fa fa-arrow-circle-left "></i> Kembali Ke Daftar Cetak Surat
						</a>
					</div>
					<div class="box-body">
						<?php if($this->admin){ ?>
							<form action="" id="main" name="main" method="POST" class="form-horizontal">
								<?php include("donjo-app/views/surat/form/_cari_nik.php"); ?>
							</form>
						<?php } ?>
						<form id="validasi" action="<?= $form_action?>" method="POST" target="_blank" class="form-surat form-horizontal">
							<input type="hidden" id="url_surat" name="url_surat" value="<?= $url ?>">
							<input type="hidden" id="url_remote" name="url_remote" value="<?= site_url($aksi.'surat/nomor_surat_duplikat')?>">
							<?php if ($individu): ?>
								<?php include("donjo-app/views/surat/form/konfirmasi_pemohon.php"); ?>
							<?php	endif; ?>
							<div class="form-group">
								<label for="nomor"  class="col-sm-3 control-label">Nomor Surat</label>
								<div class="col-sm-8">
									<input  id="nomor" class="form-control input-sm required" type="text" placeholder="Nomor Surat" name="nomor" value="<?= $surat_terakhir['no_surat_berikutnya'];?>">
									<p class="help-block text-red small"><?= $surat_terakhir['ket_nomor']?><strong><?= $surat_terakhir['no_surat'];?></strong> (tgl: <?= $surat_terakhir['tanggal']?>)</p>
								</div>
							</div>
							<div class="form-group">
								<label for="sebab"  class="col-sm-3 control-label">Sebab - Sebab</label>
								<div class="col-sm-8">
									<textarea name="sebab" class="form-control input-sm required" placeholder="Sebab - Sebab"></textarea>
								</div>
							</div>
							<?php include("donjo-app/views/surat/form/_pamong.php"); ?>
						</form>
					</div>
					<?php include("donjo-app/views/surat/form/tombol_cetak.php"); ?>
				</div>
			</div>
		</div>
	</section>
</div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     surat/surat_permohonan_duplikat_kelahiran/surat_permohonan_duplikat_kelahiran.php                   0000750 0023632 0023415 00000013332 13526507276 031417  0                                                                                                    ustar   u0_a138                         everybody                                                                                                                                                                                                              <div class="content-wrapper">
	<section class="content-header">
		<h1>Surat Pengantar Permohonan Duplikat Kelahiran</h1>
		<?php if($this->admin){ ?>
			<ol class="breadcrumb">
				<li><a href="<?= site_url('hom_desa/about')?>"><i class="fa fa-dashboard"></i> Home</a></li>
				<li><a href="<?= site_url('surat')?>"> Daftar Cetak Surat</a></li>
				<li class="active">Surat Pengantar Permohonan Duplikat Kelahiran</li>
			</ol>
		<?php } ?>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-info">
					<div class="box-header with-border">
						<a href="<?=site_url($aksi."surat")?>" class="btn btn-social btn-flat btn-default btn-sm btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"  title="Kembali Ke Daftar Wilayah">
							<i class="fa fa-arrow-circle-left "></i> Kembali Ke Daftar Cetak Surat
						</a>
					</div>
					<div class="box-body">
						<?php if($this->admin){ ?>
							<form action="" id="main" name="main" method="POST" class="form-horizontal">
								<div class="col-md-12">
									<?php include("donjo-app/views/surat/form/_cari_nik.php"); ?>
								</div>
							</form>
						<?php } ?>
						<form id="validasi" action="<?= $form_action?>" method="POST" target="_blank" class="form-surat form-horizontal">
							<input type="hidden" id="url_surat" name="url_surat" value="<?= $url ?>">
							<input type="hidden" id="url_remote" name="url_remote" value="<?= site_url($aksi.'surat/nomor_surat_duplikat')?>">
							<div class="col-md-12">
								<?php if ($individu): ?>
									<?php include("donjo-app/views/surat/form/konfirmasi_pemohon.php"); ?>
								<?php	endif; ?>
								<div class="form-group">
									<label for="nomor"  class="col-sm-3 control-label">Nomor Surat</label>
									<div class="col-sm-8">
										<input  id="nomor" class="form-control input-sm required" type="text" placeholder="Nomor Surat" name="nomor" value="<?= $surat_terakhir['no_surat_berikutnya'];?>">
										<p class="help-block text-red small"><?= $surat_terakhir['ket_nomor']?><strong><?= $surat_terakhir['no_surat'];?></strong> (tgl: <?= $surat_terakhir['tanggal']?>)</p>
									</div>
								</div>
								<div class="form-group">
									<label for="ttl"  class="col-sm-3 control-label">Hari / Jam Lahir</label>
									<div class="col-sm-4">
										<input  id="hari_bayi"  class="form-control input-sm" type="text" placeholder="Hari Lahir" name="hari_bayi">
									</div>
									<div class="col-sm-2">
										<div class="input-group input-group-sm date">
											<div class="input-group-addon">
												<i class="fa fa-clock-o"></i>
											</div>
											<input class="form-control input-sm required" name="jam_bayi" id="jammenit_1" type="text"/>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label for="tempatlahir_bayi"  class="col-sm-3 control-label">Tempat Lahir</label>
									<div class="col-sm-8">
										<input type="text" name="tempatlahir_bayi" class="form-control input-sm required" placeholder="Tempat Lahir"></input>
									</div>
								</div>
								<div class="form-group subtitle_head">
									<label class="col-sm-3 text-right"><strong>IDENTITAS PELAPOR :</strong></label>
								</div>
								<div class="form-group">
									<label for="nama_pelapor"  class="col-sm-3 control-label">Nama Pelapor</label>
									<div class="col-sm-8">
										<input type="text"  name="nama_pelapor" class="form-control input-sm required" placeholder="Nama Pelapor"></input>
									</div>
								</div>
								<div class="form-group">
									<label for="nik_pelapor"  class="col-sm-3 control-label">NIK Pelapor</label>
									<div class="col-sm-8">
										<input type="text"  name="nik_pelapor" class="form-control input-sm required" placeholder="NIK Pelapor"></input>
									</div>
								</div>
								<div class="form-group">
									<label for="sex_pelapor"  class="col-sm-3 control-label">Jenis Kelamin Pelapor</label>
									<div class="col-sm-4">
										<input type="text"  name="sex_pelapor" class="form-control input-sm required" placeholder="Jenis Kelamin Pelapor"></input>
									</div>
								</div>
								<div class="form-group">
									<label for="lahir"  class="col-sm-3 control-label">Tempat / Tanggal Lahir Pelapor</label>
									<div class="col-sm-4">
										<input type="text"  name="tempatlahir_pelapor" class="form-control input-sm required" placeholder="Tempat Lahir Pelapor"></input>
									</div>
									<div class="col-sm-3 col-lg-2">
										<div class="input-group input-group-sm date">
											<div class="input-group-addon">
												<i class="fa fa-calendar"></i>
											</div>
											<input title="Pilih Tanggal" class="form-control input-sm datepicker required" name="tanggallahir_pelapor" type="text"/>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label for="pek_pelapor"  class="col-sm-3 control-label">Pekerjaan Pelapor</label>
									<div class="col-sm-8">
										<input type="text"  name="pek_pelapor" class="form-control input-sm required" placeholder="Pekerjaan Pelapor"></input>
									</div>
								</div>
								<div class="form-group">
									<label for="alamat_pelapor"  class="col-sm-3 control-label">Alamat Pelapor</label>
									<div class="col-sm-8">
										<textarea  id="alamat_pelapor" class="form-control input-sm required"  placeholder="Alamat Pelapor" name="alamat_pelapor"></textarea>
									</div>
								</div>
								<?php include("donjo-app/views/surat/form/_pamong.php"); ?>
							</div>
						</form>
					</div>
					<?php include("donjo-app/views/surat/form/tombol_cetak.php"); ?>
				</div>
			</div>
		</div>
	</section>
</div>
                                                                                                                                                                                                                                                                                                      surat/surat_permohonan_duplikat_surat_nikah/surat_permohonan_duplikat_surat_nikah.php               0000750 0023632 0023415 00000006661 13526507276 032352  0                                                                                                    ustar   u0_a138                         everybody                                                                                                                                                                                                              <div class="content-wrapper">
	<section class="content-header">
		<h1>Surat Pengantar Permohonan Duplikat Surat Nikah</h1>
		<?php if($this->admin){ ?>
			<ol class="breadcrumb">
				<li><a href="<?= site_url('hom_desa/about')?>"><i class="fa fa-dashboard"></i> Home</a></li>
				<li><a href="<?= site_url('surat')?>"> Cetak Surat</a></li>
				<li class="active">Surat Pengantar Permohonan Duplikat Surat Nikah</li>
			</ol>
		<?php } ?>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-info">
					<div class="box-header with-border">
						<a href="<?=site_url($aksi."surat")?>" class="btn btn-social btn-flat btn-default btn-sm btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"  title="Kembali Ke Daftar Wilayah">
							<i class="fa fa-arrow-circle-left "></i> Kembali Ke Daftar Cetak Surat
						</a>
					</div>
					<div class="box-body">
						<?php if($this->admin){ ?>
							<form action="" id="main" name="main" method="POST" class="form-horizontal">
								<?php include("donjo-app/views/surat/form/_cari_nik.php"); ?>
							</form>
						<?php } ?>
						<form id="validasi" action="<?= $form_action?>" method="POST" target="_blank" class="form-surat form-horizontal">
							<input type="hidden" id="url_surat" name="url_surat" value="<?= $url ?>">
							<input type="hidden" id="url_remote" name="url_remote" value="<?= site_url($aksi.'surat/nomor_surat_duplikat')?>">
							<?php if ($individu): ?>
								<?php include("donjo-app/views/surat/form/konfirmasi_pemohon.php"); ?>
							<?php	endif; ?>
							<div class="form-group">
								<label for="nomor"  class="col-sm-3 control-label">Nomor Surat</label>
								<div class="col-sm-8">
									<input  id="nomor" class="form-control input-sm required" type="text" placeholder="Nomor Surat" name="nomor" value="<?= $surat_terakhir['no_surat_berikutnya'];?>">
									<p class="help-block text-red small"><?= $surat_terakhir['ket_nomor']?><strong><?= $surat_terakhir['no_surat'];?></strong> (tgl: <?= $surat_terakhir['tanggal']?>)</p>
								</div>
							</div>
							<div class="form-group">
								<label for="kua"  class="col-sm-3 control-label"><?= ucwords($this->setting->sebutan_kecamatan)?> KUA</label>
								<div class="col-sm-8">
									<input  id="kecamatan_kua" class="form-control input-sm required" type="text" placeholder="Kecamatan KUA" name="kecamatan_kua">
								</div>
							</div>
							<div class="form-group">
								<label for="tgl_nikah"  class="col-sm-3 control-label">Tanggal Nikah</label>
								<div class="col-sm-3 col-lg-2">
									<div class="input-group input-group-sm date">
										<div class="input-group-addon">
											<i class="fa fa-calendar"></i>
										</div>
										<input title="Pilih Tanggal" class="form-control input-sm datepicker required" name="tgl_nikah" type="text"/>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="nama_pasangan"  class="col-sm-3 control-label">Nama Pasangan</label>
								<div class="col-sm-8">
									<input  id="nama_pasangan" class="form-control input-sm required" type="text" placeholder="Nama Pasangan" name="nama_pasangan">
								</div>
							</div>
							<?php include("donjo-app/views/surat/form/_pamong.php"); ?>
						</form>
					</div>
					<?php include("donjo-app/views/surat/form/tombol_cetak.php"); ?>
				</div>
			</div>
		</div>
	</section>
</div>
                                                                               surat/surat_permohonan_kartu_keluarga/surat_permohonan_kartu_keluarga.php                           0000750 0023632 0023415 00000013200 13526507276 027725  0                                                                                                    ustar   u0_a138                         everybody                                                                                                                                                                                                              <div class="content-wrapper">
	<section class="content-header">
		<h1>Surat Permohonan Kartu Keluarga Baru</h1>
		<?php if($this->admin){ ?>
			<ol class="breadcrumb">
				<li><a href="<?= site_url('hom_desa/about')?>"><i class="fa fa-dashboard"></i> Home</a></li>
				<li><a href="<?= site_url('surat')?>"> Daftar Cetak Surat</a></li>
				<li class="active">Surat Permohonan Kartu Keluarga Baru</li>
			</ol>
		<?php } ?>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-info">
					<div class="box-header with-border">
						<a href="<?=site_url($aksi."surat")?>" class="btn btn-social btn-flat btn-default btn-sm btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"  title="Kembali Ke Daftar Wilayah">
							<i class="fa fa-arrow-circle-left "></i> Kembali Ke Daftar Cetak Surat
						</a>
						<a href="#" class="btn btn-social btn-flat btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Lihat Info Isian Surat"  data-toggle="modal" data-target="#infoBox" data-title="Lihat Info Isian Surat">
							<i class="fa fa-info-circle"></i> Info Isian Surat
						</a>
					</div>
					<div class="box-body">
						<?php if($this->admin){ ?>
							<form action="" id="main" name="main" method="POST" class="form-horizontal">
								<div class="form-group">
									<label for="nik"  class="col-sm-3 control-label">NIK / Nama KK</label>
									<div class="col-sm-6 col-lg-4">
										<select class="form-control  input-sm select2-nik" id="nik" name="nik" style ="width:100%;" onchange="formAction('main')">
											<option value="">-- Cari NIK / Nama Kepala Keluarga --</option>
											<?php foreach ($kepala_keluarga as $data): ?>
												<option value="<?= $data['id']?>" <?php selected($individu['nik'], $data['nik']); ?>><?= $data['info_pilihan_penduduk']?></option>
											<?php endforeach;?>
										</select>
									</div>
								</div>
							</form>
						<?php } ?>
						<form id="validasi" action="<?= $form_action?>" method="POST" target="_blank" class="form-surat form-horizontal">
							<input type="hidden" id="url_surat" name="url_surat" value="<?= $url ?>">
							<input type="hidden" id="url_remote" name="url_remote" value="<?= site_url($aksi.'surat/nomor_surat_duplikat')?>">
							<?php if ($individu): ?>
								<?php include("donjo-app/views/surat/form/konfirmasi_pemohon.php"); ?>
							<?php	endif; ?>
							<div class="form-group">
								<label for="nomor"  class="col-sm-3 control-label">Nomor Surat</label>
								<div class="col-sm-8">
									<input  id="nomor" class="form-control input-sm required" type="text" placeholder="Nomor Surat" name="nomor" value="<?= $surat_terakhir['no_surat_berikutnya'];?>">
									<p class="help-block text-red small"><?= $surat_terakhir['ket_nomor']?><strong><?= $surat_terakhir['no_surat'];?></strong> (tgl: <?= $surat_terakhir['tanggal']?>)</p>
								</div>
							</div>
							<div class="form-group">
								<label for="alasan"  class="col-sm-3 control-label">Alasan Permohonan</label>
								<div class="col-sm-6 col-lg-4">
									<select class="form-control input-sm" name="alasan_permohonan_id" >
										<option value="">Pilih Alasan Permohonan</option>
										<?php foreach ($kode['alasan_permohonan'] as $key => $value): ?>
											<option value="<?= $key?>"><?= strtoupper($value)?></option>
										<?php endforeach;?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="nomor"  class="col-sm-3 control-label">Nomor Kartu Keluarga Semula</label>
								<div class="col-sm-8">
									<input  id="no_kk_semula" class="form-control input-sm required" type="text" placeholder="Nomor Kartu Keluarga Semula" name="no_kk_semula">
									<?php if ($individu['no_kk_sebelumnya']): ?>
										&nbsp;(No. KK sebelumnya: <?= $individu['no_kk_sebelumnya']?>)
									<?php endif; ?>
								</div>
							</div>
							<?php include("donjo-app/views/surat/form/_pamong.php"); ?>
						</form>
					</div>
					<?php include("donjo-app/views/surat/form/tombol_cetak.php"); ?>
				</div>
				<div class='modal fade' id='infoBox' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
					<div class='modal-dialog'>
						<div class='modal-content'>
							<div class='modal-header btn-default'>
								<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
								<h4 class='modal-title' id='myModalLabel'><i class='fa fa-info-circle'></i>&nbsp;&nbsp;Info Isian Surat</h4>
							</div>
							<div class='modal-body small'>
								<h5><strong>Form ini menghasilkan:</strong></h5>
								<ol>
									<li>Surat keterangan permohonan kartu keluarga untuk pemohon</li>
									<li>Lampiran F-1.15 FORMULIR PERMOHOHAN KARTU KELUARGA (KK) BARU WARGA NEGARA INDONESIA untuk keluarga pemohon</li>
									<li>Lampiran F-1.01 FORMULIR ISIAN BIODATA PENDUDUK UNTUK WNI (PER KELUARGA) untuk keluarga pemohon</li>
								</ol>
								<p>Pastikan semua biodata pemohon beserta keluarga sudah lengkap sebelum mencetak surat dan lampiran.</p>
								<p>Untuk melengkapi data itu, ubah data pemohon dan anggota keluarganya di form isian penduduk di modul Penduduk.</p>
								<p>Formulir di atas mengacu pada Peraturan Menteri Dalam Negeri Nomor 19 Tahun 2010. </p>
							</div>
							<div class='modal-footer btn-default'>
								<button type="button" class="btn btn-social btn-flat btn-danger btn-sm" data-dismiss="modal"><i class='fa fa-sign-out'></i> Tutup</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
                                                                                                                                                                                                                                                                                                                                                                                                surat/surat_permohonan_perubahan_kartu_keluarga/surat_permohonan_perubahan_kartu_keluarga.php       0000750 0023632 0023415 00000013446 13526507276 034013  0                                                                                                    ustar   u0_a138                         everybody                                                                                                                                                                                                              <div class="content-wrapper">
	<section class="content-header">
		<h1>Surat Permohonan Perubahan Kartu Keluarga (F-1.16 & F-1.01)</h1>
		<?php if($this->admin){ ?>
			<ol class="breadcrumb">
				<li><a href="<?= site_url('hom_desa/about')?>"><i class="fa fa-dashboard"></i> Home</a></li>
				<li><a href="<?= site_url('surat')?>"> Daftar Cetak Surat</a></li>
				<li class="active">Surat Permohonan Perubahan Kartu Keluarga (F-1.16 & F-1.01)</li>
			</ol>
		<?php } ?>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-info">
					<div class="box-header with-border">
						<a href="<?=site_url($aksi."surat")?>" class="btn btn-social btn-flat btn-default btn-sm btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"  title="Kembali Ke Daftar Wilayah">
							<i class="fa fa-arrow-circle-left "></i> Kembali Ke Daftar Cetak Surat
						</a>
						<a href="#" class="btn btn-social btn-flat btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Lihat Info Isian Surat"  data-toggle="modal" data-target="#infoBox" data-title="Lihat Info Isian Surat">
							<i class="fa fa-info-circle"></i> Info Isian Surat
						</a>
					</div>
					<div class="box-body">
						<?php if($this->admin){ ?>
							<form action="" id="main" name="main" method="POST" class="form-horizontal">
								<div class="form-group">
									<label for="nik"  class="col-sm-3 control-label">NIK / Nama KK</label>
									<div class="col-sm-6 col-lg-4">
										<select class="form-control  input-sm select2-nik" id="nik" name="nik" style ="width:100%;" onchange="formAction('main')">
											<option value="">-- Cari NIK / Nama Kepala Keluarga --</option>
											<?php foreach ($kepala_keluarga as $data): ?>
												<option value="<?= $data['id']?>" <?php selected($individu['nik'], $data['nik']); ?>><?= $data['info_pilihan_penduduk']?></option>
											<?php endforeach;?>
										</select>
									</div>
								</div>
							</form>
						<?php } ?>
						<form id="validasi" action="<?= $form_action?>" method="POST" target="_blank" class="form-surat form-horizontal">
							<input type="hidden" id="url_surat" name="url_surat" value="<?= $url ?>">
							<input type="hidden" id="url_remote" name="url_remote" value="<?= site_url($aksi.'surat/nomor_surat_duplikat')?>">
							<?php if ($individu): ?>
								<?php include("donjo-app/views/surat/form/konfirmasi_pemohon.php"); ?>
							<?php	endif; ?>
							<div class="form-group">
								<label for="nomor"  class="col-sm-3 control-label">Nomor Surat</label>
								<div class="col-sm-8">
									<input  id="nomor" class="form-control input-sm required" type="text" placeholder="Nomor Surat" name="nomor" value="<?= $surat_terakhir['no_surat_berikutnya'];?>">
									<p class="help-block text-red small"><?= $surat_terakhir['ket_nomor']?><strong><?= $surat_terakhir['no_surat'];?></strong> (tgl: <?= $surat_terakhir['tanggal']?>)</p>
								</div>
							</div>
							<div class="form-group">
								<input name="sebab_nama" type="hidden">
								<label for="sebab"  class="col-sm-3 control-label">Alasan Permohonan</label>
								<div class="col-sm-6 col-lg-4">
									<select class="form-control input-sm required" name="sebab" onchange="$('input[name=sebab_nama]').val($(this).find(':selected').data('sebabnama'));">
										<option value="">Pilih Alasan Permohonan</option>
										<?php foreach ($sebab as $id => $nama): ?>
											<option value="<?= $id?>" data-sebabnama="<?= $nama; ?>" <?php if ($id==$_SESSION['post']['sebab']): ?>selected<?php endif; ?>><?= $nama; ?></option>
										<?php endforeach;?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="Alasan Lainnya"  class="col-sm-3 control-label">Alasan Lainnya</label>
								<div class="col-sm-8">
									<textarea name="alasan_lainnya" class="form-control input-sm" placeholder="Alasan Lainnya"></textarea>
									<p class="help-block">*)<i>Diisi apabila pilihan alasan permohonan yang dipilih adalah Lainnya.</i>
									</div>
								</div>
								<?php include("donjo-app/views/surat/form/_pamong.php"); ?>
							</form>
						</div>
						<?php include("donjo-app/views/surat/form/tombol_cetak.php"); ?>
					</div>
					<div class='modal fade' id='infoBox' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
						<div class='modal-dialog'>
							<div class='modal-content'>
								<div class='modal-header btn-default'>
									<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
									<h4 class='modal-title' id='myModalLabel'><i class='fa fa-info-circle'></i>&nbsp;&nbsp;Info Isian Surat</h4>
								</div>
								<div class='modal-body small'>
									<h5><strong>Form ini menghasilkan:</strong></h5>
									<ol>
										<li>Surat Permohonan Perubahan Kartu Keluarga</li>
										<li>Lampiran F-1.16 FORMULIR PERMOHOHAN PERUBAHAN KARTU KELUARGA (KK) BARU WARGA NEGARA INDONESIA</li>
										<li>Lampiran F-1.01 FORMULIR ISIAN BIODATA PENDUDUK UNTUK WNI (PER KELUARGA) untuk keluarga pemohon.</li>
									</ol>
									<p>Pastikan semua biodata pemohon beserta keluarga sudah lengkap sebelum mencetak surat dan lampiran.</p>
									<p>Untuk melengkapi data itu, ubah data pemohon dan anggota keluarganya di form isian penduduk di modul Penduduk.</p>
									<p>Formulir di atas mengacu pada Peraturan Menteri Dalam Negeri Nomor 19 Tahun 2010. </p>
								</div>
								<div class='modal-footer btn-default'>
									<button type="button" class="btn btn-social btn-flat btn-danger btn-sm" data-dismiss="modal"><i class='fa fa-sign-out'></i> Tutup</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
                                                                                                                                                                                                                          surat/surat_pernyataan_akta/surat_pernyataan_akta.php                                               0000750 0023632 0023415 00000007431 13526507276 023564  0                                                                                                    ustar   u0_a138                         everybody                                                                                                                                                                                                              <div class="content-wrapper">
	<section class="content-header">
		<h1>Surat Pernyataan Belum Memiliki Akte Lahir</h1>
		<?php if($this->admin){ ?>
			<ol class="breadcrumb">
				<li><a href="<?= site_url('hom_desa/about')?>"><i class="fa fa-dashboard"></i> Home</a></li>
				<li><a href="<?= site_url('surat')?>"> Daftar Cetak Surat</a></li>
				<li class="active">Surat Pernyataan Belum Memiliki Akte Lahir</li>
			</ol>
		<?php } ?>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-info">
					<div class="box-header with-border">
						<a href="<?=site_url($aksi."surat")?>" class="btn btn-social btn-flat btn-default btn-sm btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"  title="Kembali Ke Daftar Wilayah">
							<i class="fa fa-arrow-circle-left "></i> Kembali Ke Daftar Cetak Surat
						</a>
					</div>
					<div class="box-body">
						<?php if($this->admin){ ?>
							<form action="" id="main" name="main" method="POST" class="form-horizontal">
								<div class="col-md-12">
									<?php include("donjo-app/views/surat/form/_cari_nik.php"); ?>
								</div>
							</form>
						<?php } ?>
						<form id="validasi" action="<?= $form_action?>" method="POST" target="_blank" class="form-surat form-horizontal">
							<input type="hidden" id="url_surat" name="url_surat" value="<?= $url ?>">
							<input type="hidden" id="url_remote" name="url_remote" value="<?= site_url($aksi.'surat/nomor_surat_duplikat')?>">
							<div class="col-md-12">
								<?php if ($individu): ?>
									<?php include("donjo-app/views/surat/form/konfirmasi_pemohon.php"); ?>
								<?php	endif; ?>
								<div class="form-group">
									<label for="nomor"  class="col-sm-3 control-label">Nomor Surat</label>
									<div class="col-sm-8">
										<input  id="nomor" class="form-control input-sm required" type="text" placeholder="Nomor Surat" name="nomor" value="<?= $surat_terakhir['no_surat_berikutnya'];?>">
										<p class="help-block text-red small"><?= $surat_terakhir['ket_nomor']?><strong><?= $surat_terakhir['no_surat'];?></strong> (tgl: <?= $surat_terakhir['tanggal']?>)</p>
									</div>
								</div>
								<div class="form-group subtitle_head">
									<label class="col-sm-3 text-right"><strong>DATA KELAHIRAN :</strong></label>
								</div>
								<div class="form-group">
									<label for="nama"  class="col-sm-3 control-label">Nama</label>
									<div class="col-sm-8">
										<input  id="nama" class="form-control input-sm required" type="text" placeholder="Nama" name="nama">
									</div>
								</div>
								<div class="form-group">
									<label for="tempat_lahir"  class="col-sm-3 control-label">Tempat Tanggal lahir</label>
									<div class="col-sm-4">
										<input  id="tempatlahir" class="form-control input-sm required" type="text" placeholder="Tempat Lahir" name="tempatlahir">
									</div>
									<div class="col-sm-3 col-lg-2">
										<div class="input-group input-group-sm date">
											<div class="input-group-addon">
												<i class="fa fa-calendar"></i>
											</div>
											<input title="Pilih Tanggal" class="form-control input-sm datepicker required" name="tanggllahir" type="text"/>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label for="sex" class="col-sm-3 control-label">Jenis Kelamin</label>
									<div class="col-sm-4">
										<input  id="sex" class="form-control input-sm required" type="text" placeholder="Jenis Kelamin" name="sex">
									</div>
								</div>
								<?php include("donjo-app/views/surat/form/_pamong.php"); ?>
							</div>
						</form>
					</div>
					<?php include("donjo-app/views/surat/form/tombol_cetak.php"); ?>
				</div>
			</div>
		</div>
	</section>
</div>
                                                                                                                                                                                                                                       surat/surat_sporadik/surat_sporadik.php                                                             0000750 0023632 0023415 00000055372 13526507276 020717  0                                                                                                    ustar   u0_a138                         everybody                                                                                                                                                                                                              <script>
	function ubah_pelaku(peran, asal)
	{
		$('#'+peran).val(asal);
		if (asal == 1)
		{
			$('.'+peran+'_desa').show();
			$('.'+peran+'_luar_desa').hide();
      // Mungkin bug di jquery? Terpaksa hapus class radio button
      $('#label_'+peran+'_2').removeClass('ui-state-active');
  }
  else
  {
  	$('.'+peran+'_desa').hide();
  	$('.'+peran+'_luar_desa').show();
			$('#nik').val(''); // Hapus id
			submit_form_ambil_data();
		}
		$('input[name=anchor').val(peran);
	}

	function ubah_saksi1(asal)
	{
		$('#saksi1').val(asal);
		if (asal == 1)
		{
			$('.saksi1_desa').show();
			$('.saksi1_luar_desa').hide();
      // Mungkin bug di jquery? Terpaksa hapus class radio button
      $('#label_saksi1_2').removeClass('active');
  }
  else
  {
  	$('.saksi1_desa').hide();
  	$('.saksi1_luar_desa').show();
			$('#id_saksi1').val(''); // Hapus id
			$('#id_saksi1_validasi').val('*'); // Hapus id
			submit_form_ambil_data();
		}
		$('input[name=anchor').val('saksi1');
	}


	function ubah_saksi2(asal)
	{
		$('#saksi2').val(asal);
		if (asal == 1)
		{
			$('.saksi2_desa').show();
			$('.saksi2_luar_desa').hide();
      // Mungkin bug di jquery? Terpaksa hapus class radio button
      $('#label_saksi2_2').removeClass('active');
  }
  else
  {
  	$('.saksi2_desa').hide();
  	$('.saksi2_luar_desa').show();
			$('#id_saksi2').val(''); // Hapus id
      $('#id_saksi2_validasi').val('*'); // Hapus id
      submit_form_ambil_data();
  }
  $('input[name=anchor').val('saksi2');
}
function submit_form_ambil_data()
{
	$('input').removeClass('required');
	$('select').removeClass('required');
	$('#'+'validasi').attr('action','');
	$('#'+'validasi').attr('target','');
	$('#'+'validasi').submit();
}
</script>
<div class="content-wrapper">
	<section class="content-header">
		<h1>Surat SPORADIK Sertifikat</h1>
		<?php if($this->admin){ ?>
			<ol class="breadcrumb">
				<li><a href="<?= site_url('hom_desa/about')?>"><i class="fa fa-dashboard"></i> Home</a></li>
				<li><a href="<?= site_url('surat')?>"> Daftar Cetak Surat</a></li>
				<li class="active">Surat SPORADIK Sertifikat</li>
			</ol>
		<?php } ?>
	</section>
	<section class="content">
		<div class="row">
			<input id="nik_validasi" name="nik" type="hidden" value="<?= $_SESSION['post']['nik']?>">
			<input id="id_pemohon_validasi" name="id_pemohon" type="hidden" value="">
			<input id="id_saksi1_validasi" name="id_saksi1" type="hidden" value="<?= $_SESSION['id_saksi1']?>"/>
			<input id="id_saksi2_validasi" name="id_saksi2" type="hidden" value="<?= $_SESSION['id_saksi2']?>"/>
			<div class="col-md-12">
				<div class="box box-info">
					<div class="box-header with-border">
						<a href="<?=site_url($aksi."surat")?>" class="btn btn-social btn-flat btn-default btn-sm btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"  title="Kembali Ke Daftar Wilayah">
							<i class="fa fa-arrow-circle-left "></i> Kembali Ke Daftar Cetak Surat
						</a>
					</div>
					<div class="box-body">
						<form id="validasi" action="<?= $form_action?>" method="POST" target="_blank" class="form-horizontal">
							<div class="col-md-12">
								<input id="nik_validasi" name="nik" type="hidden" value="<?= $_SESSION['post']['nik']?>">
								<input id="id_pemohon_validasi" name="id_pemohon" type="hidden" value="">
								<input id="id_saksi1_validasi" name="id_saksi1" type="hidden" value="<?= $_SESSION['id_saksi1']?>"/>
								<input id="id_saksi2_validasi" name="id_saksi2" type="hidden" value="<?= $_SESSION['id_saksi2']?>"/>
								<div class="form-group subtitle_head">
									<label class="col-sm-3 control-label" for="status">PEMOHON</label>
									<div class="btn-group col-sm-8" data-toggle="buttons">
										<label id="pemohon_11" class="btn btn-info btn-flat btn-sm col-sm-2 form-check-label <?php if (!empty($individu)): ?>active<?php endif ?>">
											<input id="pemohon_1" type="radio" name="pemohon" class="form-check-input" type="radio" value="1" <?php if (!empty($individu)): ?>checked <?php endif ?> autocomplete="off" onchange="ubah_pelaku('pemohon',this.value);"> Warga Desa
										</label>
										<label id="pemohon_22" class="btn btn-info btn-flat btn-sm col-sm-2 form-check-label <?php if (empty($individu)): ?>active<?php endif; ?>">
											<input id="pemohon_2" type="radio" name="pemohon" class="form-check-input" type="radio" value="2" <?php if (empty($individu)): ?>checked<?php endif; ?> autocomplete="off" onchange="ubah_pelaku('pemohon',this.value);"> Warga Luar Desa
										</label>
									</div>
								</div>
								<div class="form-group pemohon_desa" <?php if (empty($individu)): ?>style="display: none;"<?php endif; ?>>
									<label class="col-xs-12 col-sm-3 col-lg-3 control-label bg-maroon" style="margin-top:-10px;padding-top:10px;padding-bottom:10px"><strong>DATA PEMOHON WARGA DESA</strong></label>
								</div>
								<div class="form-group pemohon_desa" <?php if (empty($individu)): ?>style="display: none;"<?php endif; ?>>
									<label for="nik"  class="col-sm-3 control-label">NIK / Nama</label>
									<div class="col-sm-6 col-lg-4">
										<select class="form-control input-sm select2-nik" id="nik" name="nik" style ="width:100%;" onchange="submit_form_ambil_data();">
											<option value="">--  Cari NIK / Nama Penduduk--</option>
											<?php foreach ($penduduk as $data): ?>
												<option value="<?= $data['id']?>" <?php selected($individu['nik'], $data['nik']); ?>><?= $data['info_pilihan_penduduk']?></option>
											<?php endforeach; ?>
										</select>
									</div>
								</div>
								<?php if ($individu): ?>
									<?php $disabled="" ?>
									<?php include("donjo-app/views/surat/form/konfirmasi_pemohon.php"); ?>
								<?php	endif; ?>
								<?php if (empty($individu)): ?>
									<div class="form-group pemohon_luar_desa" >
										<label class="col-xs-12 col-sm-3 col-lg-3 control-label bg-maroon" style="margin-top:-10px;padding-top:10px;padding-bottom:10px"><strong>DATA PEMOHON LUAR DESA</strong></label>
									</div>
									<div class="form-group pemohon_luar_desa">
										<label for="nomor"  class="col-sm-3 control-label">Nama</label>
										<div class="col-sm-8">
											<input name="nama_non_warga" class="form-control input-sm required" type="text" placeholder="Nama" value="<?= $_SESSION['post']['nama_non_warga']?>">
										</div>
									</div>
									<div class="form-group pemohon_luar_desa">
										<label for="nik_non_warga"  class="col-sm-3 control-label">Nomor KTP</label>
										<div class="col-sm-4">
											<input name="nik_non_warga" class="form-control input-sm required" type="text" placeholder="Nomor KTP" value="<?= $_SESSION['post']['nik_non_warga']?>">
										</div>
									</div>
									<div class="form-group pemohon_luar_desa">
										<label for="tempatlahir_pemohon"  class="col-sm-3 control-label">Tempat Tanggal Lahir</label>
										<div class="col-sm-4">
											<input name="tempatlahir_pemohon" class="form-control input-sm required" type="text" placeholder="Tempat Lahir" value="<?= $_SESSION['post']['tempatlahir_pemohon']?>">
										</div>
										<div class="col-sm-3 col-lg-2">
											<div class="input-group input-group-sm date">
												<div class="input-group-addon">
													<i class="fa fa-calendar"></i>
												</div>
												<input title="Pilih Tanggal" class="form-control input-sm datepicker required" name="tanggallahir_pemohon" type="text" value="<?= $_SESSION['post']['tempatlahir_pemohon']?>"/>
											</div>
										</div>
									</div>
									<div class="form-group pemohon_luar_desa">
										<label for="pekerjaan_pemohon"  class="col-sm-3 control-label">Pekerjaan</label>
										<div class="col-sm-8">
											<input id="pekerjaan_pemohon" class="form-control input-sm required" type="text" placeholder="Pekerjaan" name="pekerjaan_pemohon">
										</div>
									</div>
									<div class="form-group pemohon_luar_desa">
										<label for="alamat_pemohon"  class="col-sm-3 control-label">Tempat Tinggal</label>
										<div class="col-sm-8">
											<input id="alamat_pemohon" class="form-control input-sm required" type="text" placeholder="Tempat Tinggal" name="alamat_pemohon">
										</div>
									</div>
								<?php endif; ?>
								<div class="form-group" >
									<label class="col-xs-12 col-sm-3 col-lg-3 control-label bg-maroon" style="margin-top:10px;padding-top:10px;padding-bottom:10px"><strong>ATAS BIDANG TANAH YANG TERLETAK DI</strong></label>
								</div>
								<div class="form-group">
									<label for="jalan"  class="col-sm-3 control-label">Jalan</label>
									<div class="col-sm-8">
										<input name="jalan" class="form-control input-sm" type="text" placeholder="Jalan" value="<?= $_SESSION['post']['jalan']?>">
									</div>
								</div>
								<div class="form-group">
									<label for="rtrw"  class="col-sm-3 control-label">RT/RW</label>
									<div class="col-sm-2">
										<input name="rtrw" class="form-control input-sm" type="text" placeholder="RT / RW" value="<?= $_SESSION['post']['rtrw']?>">
									</div>
								</div>
								<div class="form-group">
									<label for="desalurah"  class="col-sm-3 control-label">Desa / Kelurahan</label>
									<div class="col-sm-8">
										<input name="desalurah" class="form-control input-sm" type="text" placeholder="Desa / Kelurahan" value="<?= $desa['nama_desa']?>">
									</div>
								</div>
								<div class="form-group">
									<label for="camatt"  class="col-sm-3 control-label">Kecamatan</label>
									<div class="col-sm-8">
										<input name="camatt" class="form-control input-sm" type="text" value="<?= $desa['nama_kecamatan']?>">
									</div>
								</div>
								<div class="form-group">
									<label for="kabb"  class="col-sm-3 control-label">Kabupaten / Kota</label>
									<div class="col-sm-8">
										<input name="kabb" class="form-control input-sm" type="text" value="<?= $desa['nama_kabupaten']?>">
									</div>
								</div>
								<div class="form-group">
									<label for="nib"  class="col-sm-3 control-label">NIB</label>
									<div class="col-sm-8">
										<input name="nib" class="form-control input-sm required" type="text" placeholder="NIB" value="<?= $_SESSION['post']['nib']?>">
									</div>
								</div>
								<div class="form-group">
									<label for="luashak"  class="col-sm-3 control-label">Luas Tanah (m2)</label>
									<div class="col-sm-2">
										<input name="luashak" class="form-control input-sm required" type="text" placeholder="Luas Tanah" value="<?= $_SESSION['post']['luashak']?>">
									</div>
								</div>
								<div class="form-group">
									<label for="statustanah"  class="col-sm-3 control-label">Status Tanah</label>
									<div class="col-sm-8">
										<input name="statustanah" class="form-control input-sm required" type="text" placeholder="Status Tanah" value="<?= $_SESSION['post']['statustanah']?>">
									</div>
								</div>
								<div class="form-group">
									<label for="tanahuntuk"  class="col-sm-3 control-label">Dipergunakan</label>
									<div class="col-sm-8">
										<input name="tanahuntuk" class="form-control input-sm required" type="text" placeholder="Dipergunakan Untuk" value="<?= $_SESSION['post']['tanahuntuk']?>">
									</div>
								</div>
								<div class="form-group" >
									<label class="col-xs-12 col-sm-3 col-lg-3 control-label bg-maroon" style="margin-top:10px;padding-top:10px;padding-bottom:10px"><strong>BATAS-BATAS </strong></label>
								</div>
								<div class="form-group">
									<label for="utara"  class="col-sm-3 control-label">Sebelah Utara</label>
									<div class="col-sm-8">
										<input name="utara" class="form-control input-sm required" type="text" placeholder="Batas Sebelah Utara" value="<?= $_SESSION['post']['utara']?>">
									</div>
								</div>
								<div class="form-group">
									<label for="timur"  class="col-sm-3 control-label">Sebelah Timur</label>
									<div class="col-sm-8">
										<input name="timur" class="form-control input-sm required" type="text" placeholder="Batas Sebelah Timur" value="<?= $_SESSION['post']['timur']?>">
									</div>
								</div>
								<div class="form-group">
									<label for="selatan"  class="col-sm-3 control-label">Sebelah Selatan</label>
									<div class="col-sm-8">
										<input name="selatan" class="form-control input-sm required" type="text" placeholder="Batas Sebelah Selatan" value="<?= $_SESSION['post']['selatan']?>">
									</div>
								</div>
								<div class="form-group">
									<label for="barat"  class="col-sm-3 control-label">Sebelah Barat</label>
									<div class="col-sm-8">
										<input name="barat" class="form-control input-sm required" type="text" placeholder="Batas Sebelah Barat" value="<?= $_SESSION['post']['barat']?>">
									</div>
								</div>
								<div class="form-group" >
									<label class="col-xs-12 col-sm-3 col-lg-3 control-label bg-maroon" style="margin-top:10px;padding-top:10px;padding-bottom:10px"><strong>TANAH DI PEROLEH</strong></label>
								</div>
								<div class="form-group">
									<label for="peroleh"  class="col-sm-3 control-label">Dari </label>
									<div class="col-sm-8">
										<input name="peroleh" class="form-control input-sm required" placeholder="Diperoleh Dari" type="text" value="<?= $_SESSION['post']['peroleh']?>">
									</div>
								</div>
								<div class="form-group">
									<label for="peroleh"  class="col-sm-3 control-label">Sejak Tahun</label>
									<div class="col-sm-2">
										<input name="perolehtahun" class="form-control input-sm required" type="text" placeholder="Tahun Perolehan" value="<?= $_SESSION['post']['perolehtahun']?>">
									</div>
								</div>
								<div class="form-group">
									<label for="peroleh"  class="col-sm-3 control-label">Dengan Jalan</label>
									<div class="col-sm-8">
										<input name="denganjalan" class="form-control input-sm required" type="text" placeholder="Jalan Perolehan" value="<?= $_SESSION['post']['denganjalan']?>">
									</div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group subtitle_head">
									<label class="col-sm-3 control-label" for="status">SAKSI 1</label>
									<div class="btn-group col-sm-8" data-toggle="buttons">
										<label class="btn btn-info btn-flat btn-sm col-sm-2 form-check-label <?php if (!empty($saksi1)): ?>active<?php endif ?>">
											<input id="saksi1_1" type="radio" name="saksi1" class="form-check-input" type="radio" value="1" <?php if (!empty($saksi)): ?>checked<?php endif ?> onchange="ubah_saksi1(this.value);"> Warga Desa
										</label>
										<label id="label_saksi1_2" class="btn btn-info btn-flat btn-sm col-sm-2 form-check-label <?php if (empty($saksi1)): ?>active<?php endif; ?>">
											<input id="saksi1_2" type="radio" name="saksi1" class="form-check-input" type="radio" value="2" <?php if (empty($saksi1)): ?>checked<?php endif; ?> onchange="ubah_saksi1(this.value);"> Warga Luar Desa
										</label>
									</div>
								</div>
								<div class="form-group saksi1_desa" <?php if (empty($saksi1)): ?>style="display: none;"<?php endif; ?>>
									<label class="col-xs-12 col-sm-3 col-lg-3 control-label bg-maroon" style="margin-top:-10px;padding-top:10px;padding-bottom:10px"><strong>DATA SAKSI 1 WARGA DESA</strong></label>
								</div>
								<div class="form-group saksi1_desa" <?php if (empty($saksi1)): ?>style="display: none;"<?php endif; ?>>
									<label for="id_saksi1"  class="col-sm-3 control-label">NIK / Nama</label>
									<div class="col-sm-6 col-lg-4">
										<select class="form-control input-sm select2-nik" id="id_saksi1" name="id_saksi1" style ="width:100%;" onchange="submit_form_ambil_data();">
											<option value="">--  Cari NIK / Nama Penduduk--</option>
											<?php foreach ($penduduk as $data): ?>
												<option value="<?= $data['id']?>" <?php selected($saksi1['nik'], $data['nik']); ?>><?= $data['info_pilihan_penduduk']?></option>
											<?php endforeach; ?>
										</select>
									</div>
								</div>
								<?php if ($saksi1){
									$individu = $saksi1;
									include("donjo-app/views/surat/form/konfirmasi_pemohon.php");
								} ?>

								<?php if (empty($saksi1)): ?>
									<div class="form-group saksi1_luar_desa">
										<label class="col-xs-12 col-sm-3 col-lg-3 control-label bg-maroon" style="margin-top:-10px;padding-top:10px;padding-bottom:10px"><strong>DATA SAKSI 1 LUAR DESA</strong></label>
									</div>
									<div class="form-group saksi1_luar_desa">
										<label for="namasaksii"  class="col-sm-3 control-label">Nama</label>
										<div class="col-sm-8">
											<input name="namasaksii" class="form-control input-sm required" type="text" placeholder="Nama Saksi 1" value="<?= $_SESSION['post']['namasaksii']?>">
										</div>
									</div>
									<div class="form-group saksi1_luar_desa">
										<label for="umursaksii" class="col-sm-3 control-label">Umur</label>
										<div class="col-sm-2">
											<input name="umursaksii" class="form-control input-sm required" type="text" placeholder="Umur Saksi 1 (Tahun)" value="<?= $_SESSION['post']['umursaksii']?>">
										</div>
									</div>
									<div class="form-group saksi1_luar_desa">
										<label for="pekerjaansaksii" class="col-sm-3 control-label">Pekerjaan</label>
										<div class="col-sm-8">
											<input name="pekerjaansaksii" class="form-control input-sm required" type="text" placeholder="Pekerjaan Saksi 1" value="<?= $_SESSION['post']['pekerjaansaksii']?>">
										</div>
									</div>
									<div class="form-group saksi1_luar_desa">
										<label for="alamatsaksii" class="col-sm-3 control-label">Alamat</label>
										<div class="col-sm-8">
											<input name="alamatsaksii" class="form-control input-sm required" type="text" placeholder="Alamat Saksi 1" value="<?= $_SESSION['post']['alamatsaksii']?>">
										</div>
									</div>
								<?php endif; ?>
							</div>
							<div class="col-md-12">
								<div class="form-group subtitle_head">
									<label class="col-sm-3 control-label" for="status">SAKSI 2</label>
									<div class="btn-group col-sm-8" data-toggle="buttons">
										<label class="btn btn-info btn-flat btn-sm col-sm-2 form-check-label <?php if (!empty($saksi2)): ?>active<?php endif ?>">
											<input id="saksi2_1" type="radio" name="saksi2" class="form-check-input" type="radio" value="1" <?php if (!empty($saksi2)): ?>checked <?php endif ?> autocomplete="off" onchange="ubah_saksi2(this.value);"> Warga Desa
										</label>
										<label id="label_saksi2_2" class="btn btn-info btn-flat btn-sm col-sm-2 form-check-label <?php if (empty($saksi2)): ?>active<?php endif; ?>">
											<input id="saksi2_2" type="radio" name="saksi2" class="form-check-input" type="radio" value="2" <?php if (empty($saksi2)): ?>checked<?php endif; ?> autocomplete="off" onchange="ubah_saksi2(this.value);"> Warga Luar Desa
										</label>
									</div>
								</div>
								<div class="form-group saksi2_desa" <?php if (empty($saksi2)): ?>style="display: none;"<?php endif; ?>>
									<label class="col-xs-12 col-sm-3 col-lg-3 control-label bg-maroon" style="margin-top:-10px;padding-top:10px;padding-bottom:10px"><strong>DATA SAKSI 2 WARGA DESA</strong></label>
								</div>
								<div class="form-group saksi2_desa" <?php if (empty($saksi2)): ?>style="display: none;"<?php endif; ?>>
									<label for="id_saksi2"  class="col-sm-3 control-label">NIK / Nama</label>
									<div class="col-sm-6 col-lg-4">
										<select class="form-control input-sm select2-nik" id="id_saksi2" name="id_saksi2" style ="width:100%;" onchange="submit_form_ambil_data();">
											<option value="">--  Cari NIK / Nama Penduduk--</option>
											<?php foreach ($penduduk as $data): ?>
												<option value="<?= $data['id']?>" <?php selected($saksi2['nik'], $data['nik']); ?>><?= $data['info_pilihan_penduduk']?></option>
											<?php endforeach; ?>
										</select>
									</div>
								</div>
								<?php if ($saksi2){
									$individu = $saksi2;
									include("donjo-app/views/surat/form/konfirmasi_pemohon.php");
								} ?>
								<?php if (empty($saksi2)): ?>
									<div class="form-group saksi2_luar_desa">
										<label class="col-xs-12 col-sm-3 col-lg-3 control-label bg-maroon" style="margin-top:-10px;padding-top:10px;padding-bottom:10px"><strong>DATA SAKSI 2 LUAR DESA</strong></label>
									</div>
									<div class="form-group saksi2_luar_desa">
										<label for="namasaksiii"  class="col-sm-3 control-label">Nama</label>
										<div class="col-sm-8">
											<input name="namasaksiii" class="form-control input-sm required" type="text" placeholder="Nama Saksi 2" value="<?= $_SESSION['post']['namasaksii']?>">
										</div>
									</div>
									<div class="form-group saksi2_luar_desa">
										<label for="umursaksiii" class="col-sm-3 control-label">Umur</label>
										<div class="col-sm-2">
											<input name="umursaksiii" class="form-control input-sm required" type="text" placeholder="Umur Saksi 2 (Tahun)" value="<?= $_SESSION['post']['umursaksiii']?>">
										</div>
									</div>
									<div class="form-group saksi2_luar_desa">
										<label for="pekerjaansaksiii" class="col-sm-3 control-label">Pekerjaan</label>
										<div class="col-sm-8">
											<input name="pekerjaansaksiii" class="form-control input-sm required" type="text" placeholder="Pekerjaan Sakasi 2" value="<?= $_SESSION['post']['pekerjaansaksiii']?>">
										</div>
									</div>
									<div class="form-group saksi2_luar_desa">
										<label for="alamatsaksiii" class="col-sm-3 control-label">Alamat</label>
										<div class="col-sm-8">
											<input name="alamatsaksiii" class="form-control input-sm required" type="text" placeholder="Alamat Saksi 2" value="<?= $_SESSION['post']['alamatsaksiii']?>">
										</div>
									</div>
								<?php endif; ?>
							</div>
							<div class="col-md-12">
								<div class="form-group subtitle_head">
									<label class="col-sm-3 control-label"><strong>PENANDA TANGAN</strong></label>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">Atas Nama</label>
									<div class="col-sm-6 col-lg-4">
										<select class="form-control input-sm select2" id="atas_nama" name="atas_nama" <?= $disabled ?>>
											<option value="">-- Atas Nama --</option>
											<?php foreach ($atas_nama as $data): ?>
												<option value="<?= $data?>" <?php if ($data==$_SESSION['post']['atas_nama']): ?>selected<?php endif; ?>>
													<?= $data?>
												</option>
											<?php endforeach; ?>
										</select>
									</div>
								</div>
								<?php include("donjo-app/views/surat/form/_pamong.php"); ?>
							</div>
						</form>
					</div>
					<?php include("donjo-app/views/surat/form/tombol_cetak.php"); ?>
				</div>
			</div>
		</div>
	</section>
</div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      