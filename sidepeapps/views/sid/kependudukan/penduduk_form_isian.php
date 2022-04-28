<script type="text/javascript">
	$(document).ready(function()
	{
		$("select[name='sex']").change();
		$("select[name='status_kawin']").change();
	});
	$('#mainform').on('reset', function(e)
	{
		setTimeout(function() {
			$("select[name='sex']").change();
			$("select[name='status_kawin']").change();
		});
	});
	function show_hide_hamil(sex)
	{
		if (sex == '2')
		{
			$("#isian_hamil").show();
		}
		else
		{
			$("#isian_hamil").hide();
		}
	};
	function reset_hamil()
	{
		setTimeout(function()
		{
			$('select[name=sex]').change();
		});
	};
	function disable_kawin_cerai(status)
	{
		// Status 1 = belum kawin, 2 = kawin, 3 = cerai hidup, 4 = cerai mati
		switch (status)
		{
			case '1':
			case '4':
			$("#akta_perkawinan").attr('disabled', true);
			$("input[name=tanggalperkawinan]").attr('disabled', true);
			$("#akta_perceraian").attr('disabled', true);
			$("input[name=tanggalperceraian]").attr('disabled', true);
			break;
			case '2':
			$("#akta_perkawinan").attr('disabled', false);
			$("input[name=tanggalperkawinan]").attr('disabled', false);
			$("#akta_perceraian").attr('disabled', true);
			$("input[name=tanggalperceraian]").attr('disabled', true);
			break;
			case '3':
			$("#akta_perkawinan").attr('disabled', true);
			$("input[name=tanggalperkawinan]").attr('disabled', true);
			$("#akta_perceraian").attr('disabled', false);
			$("input[name=tanggalperceraian]").attr('disabled', false);
			break;
		}
	}
</script>

<div class="col-md-3">
	<div class="box box-primary">
		<div class="box-body box-profile">
			<?php if ($penduduk['foto']): ?>
				<img class="profile-user-img img-responsive" id="fotoPreview" src="<?= $fotorigin = AmbilFoto($penduduk['foto'])?>" alt="Foto">
				<?php else: ?>
					<img class="profile-user-img img-responsive" id="fotoPreview" src="<?= $fotorigin = base_url('assets/files/user_pict/kuser.png')?>" alt="Foto">
				<?php endif; ?>
				<br/>
				<p class="text-muted text-center"> (Kosongkan jika tidak ingin mengubah foto)</p>
				<br/>
				<div class="input-group input-group-sm text-center">
					<span class="input-group-btn float-center">
						<input type="hidden" name="foto" id="fotoInput">
						<button data-toggle="modal" data-target="#cameraModal" id="fotoCange" type="button" class="btn btn-uppercase btn-info btn-radius" id="file_browser2" style="border-top-left-radius: 10px;border-bottom-left-radius: 10px"><i class="fa fa-edit"></i> Ganti</button>
						<button id="fotoReset" type="button" class="btn btn-uppercase btn-warning btn-radius" id="file_browser2"><i class="fa fa-times"></i> Reset</button>
					</span>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-9">
		<div class='box box-primary'>
			<div class="box-header with-border">
				<a href="<?=site_url($link_back)?>" class="btn btn-radius btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Kembali Ke Data Penduduk"> <?php echo $this->admin ? 'Kembali Ke Daftar Penduduk' : 'Kembali ke profil' ?></a>
			</div>
			<div class='box-body'>
				<div class="row">
					<div class='col-sm-4'>
						<div class='form-group'>
							<label for="nik">NIK </label>
							<input id="nik"  name="nik" class="form-control input-sm required" type="text" placeholder="Nomor NIK" value="<?= $penduduk['nik']?>"></input>
							<input name="nik_lama" type="hidden" value="<?= $_SESSION['nik_lama']?>"/>
						</div>
					</div>
					<div class='col-sm-8'>
						<div class='form-group'>
							<label for="nama">Nama Lengkap <code> (Tanpa Gelar) </code> </label>
							<input id="nama" name="nama" class="form-control input-sm required" type="text" placeholder="Nama Lengkap" value="<?= strtoupper($penduduk['nama'])?>"></input>
						</div>
					</div>
					<div class='col-sm-12'>
						<div class='form-group'>
							<label for="nama">Status Kepemilikan KTP</label>
							<div class="table-responsive">
								<table class="table table-bordered table-hover">
									<thead class="bg-gray disabled color-palette">
										<tr>
											<th width='33%'>Wajib KTP</th>
											<th>KTP Elektrtonik</th>
											<th>Status Rekam</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td width='33%'><?= strtoupper($penduduk['wajib_ktp'])?></td>
											<td>
												<select name="ktp_el" class="form-control input-sm" required>
													<option value="">Pilih KTP-EL</option>
													<?php foreach ($ktp_el as $id => $nama): ?>
														<option value="<?= $id?>" <?php selected(strtolower($penduduk['ktp_el']), $nama); ?>><?= strtoupper($nama)?></option>
													<?php endforeach;?>
												</select>
											</td>
											<td width='33%'>
												<select name="status_rekam" class="form-control input-sm" required>
													<option value="">Pilih Status Rekam</option>
													<?php foreach ($status_rekam as $id => $nama): ?>
														<option value="<?= $id?>" <?php selected(strtolower($penduduk['status_rekam']), $nama); ?>><?= strtoupper($nama)?></option>
													<?php endforeach;?>
												</select>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<div class='col-sm-4'>
						<div class='form-group'>
							<label for="no_kk_sebelumnya">Nomor KK Sebelumnya</label>
							<input id="no_kk_sebelumnya" name="no_kk_sebelumnya" class="form-control input-sm" type="text" placeholder="No KK Sebelumnya" value="<?= strtoupper(unpenetration($penduduk['no_kk_sebelumnya']))?>"></input>
						</div>
					</div>
					<div class='col-sm-4'>
						<div class='form-group'>
							<?php if (!empty($penduduk)): ?>
								<input type="hidden" name="kk_level_lama" value="<?= $penduduk['kk_level']?>">
							<?php endif; ?>
							<label for="kk_level">Hubungan Dalam Keluarga</label>
							<select class="form-control input-sm" name="kk_level">
								<option value="">Pilih Hubungan Keluarga</option>
								<?php foreach ($hubungan as $data): ?>
									<option value="<?= $data['id']?>"<?php selected($penduduk['kk_level'], $data['id']); ?>><?= strtoupper($data['nama'])?></option>
								<?php endforeach;?>
							</select>
						</div>
					</div>
					<div class='col-sm-4'>
						<div class='form-group'>
							<label for="sex">Jenis Kelamin </label>
							<select class="form-control input-sm required" name="sex" onchange="show_hide_hamil($(this).find(':selected').val());">
								<option value="">Jenis Kelamin</option>
								<option value="1" <?php selected($penduduk['id_sex'], '1'); ?>>Laki-Laki</option>
								<option value="2" <?php selected($penduduk['id_sex'], '2'); ?> >Perempuan</option>
							</select>
						</div>
					</div>
					<div class='col-sm-7'>
						<div class='form-group'>
							<label for="agama_id">Agama</label>
							<select class="form-control input-sm required" name="agama_id">
								<option value="">Pilih Agama</option>
								<?php foreach ($agama as $data): ?>
									<option value="<?= $data['id']?>" <?php selected($penduduk['agama_id'], $data['id']); ?>><?= strtoupper($data['nama'])?></option>
								<?php endforeach;?>
							</select>
						</div>
					</div>
					<div class='col-sm-5'>
						<div class='form-group'>
							<label for="status">Status Penduduk </label>
							<select class="form-control input-sm required" name="status">
								<option value="1" <?php if ($penduduk['status'] == "TETAP" OR $penduduk['status'] == "1" OR $penduduk['status'] == ""): ?>selected<?php endif; ?>>Tetap</option>
								<option value="2" <?php if ($penduduk['status'] == "TIDAK AKTIF" OR $penduduk['status'] == "2"): ?>selected<?php endif; ?>>Tidak Tetap</option>
								<option value="3" <?php if ($penduduk['status'] == "PENDATANG" OR $penduduk['status'] == "3"): ?>selected<?php endif; ?> >Pendatang</option>
							</select>
						</div>
					</div>
					<div class='col-sm-12'>
						<div class="form-group subtitle_head">
							<label class="text-right"><strong>DATA KELAHIRAN :</strong></label>
						</div>
					</div>
					<div class='col-sm-4'>
						<div class='form-group'>
							<label for="akta_lahir">Nomor Akta Kelahiran </label>
							<input id="akta_lahir" name="akta_lahir" class="form-control input-sm" type="text" placeholder="Nomor Akta Kelahiran" value="<?= $penduduk['akta_lahir']?>"></input>
						</div>
					</div>
					<div class='col-sm-8'>
						<div class='form-group'>
							<label for="tempatlahir">Tempat Lahir</label>
							<input id="tempatlahir" name="tempatlahir" class="form-control input-sm" type="text" placeholder="Tempat Lahir" value="<?= strtoupper($penduduk['tempatlahir'])?>"></input>
						</div>
					</div>
					<div class='col-sm-4'>
						<div class='form-group'>
							<label for="tanggallahir">Tanggal Lahir</label>
							<div class="input-group input-group-sm date">
								<div class="input-group-addon" style="border-top-right-radius:0;border-bottom-right-radius:0">
									<i class="fa fa-calendar"></i>
								</div>
								<input class="form-control input-sm pull-right" id="tgl_1" name="tanggallahir" type="text" value="<?= $penduduk['tanggallahir']?>" style="border-top-left-radius:0;border-bottom-left-radius:0">
							</div>
						</div>
					</div>
					<div class='col-sm-4'>
						<div class='form-group'>
							<label for="waktulahir">Waktu Kelahiran </label>
							<div class="input-group input-group-sm date">
								<div class="input-group-addon" style="border-top-right-radius:0;border-bottom-right-radius:0">
									<i class="fa fa-calendar"></i>
								</div>
								<input class="form-control input-sm pull-right" id="jammenit_1" name="waktu_lahir" type="text" value="<?= $penduduk['waktu_lahir']?>" style="border-top-left-radius:0;border-bottom-left-radius:0">
							</div>
						</div>
					</div>
					<div class='col-sm-4'>
						<div class='form-group'>
							<label for="tempat_dilahirkan">Tempat Dilahirkan</label>
							<select class="form-control input-sm" name="tempat_dilahirkan" required>
								<option value="">Pilih Tempat Dilahirkan</option>
								<?php foreach ($tempat_dilahirkan as $id => $nama): ?>
									<option value="<?= $id?>" <?php selected($penduduk['tempat_dilahirkan'], $id); ?>><?= strtoupper($nama)?></option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
					<div class='col-sm-12'>
						<div class='row'>
							<div class='col-sm-4'>
								<div class='form-group'>
									<label for="jenis_kelahiran">Jenis Kelahiran</label>
									<select class="form-control input-sm" name="jenis_kelahiran" required>
										<option value="">Pilih Jenis Kelahiran</option>
										<?php foreach ($jenis_kelahiran as $id => $nama): ?>
											<option value="<?= $id?>" <?php selected($penduduk['jenis_kelahiran'], $id); ?>><?= strtoupper($nama)?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
							<div class='col-sm-4'>
								<div class='form-group'>
									<label for="kelahiran_anak_ke">Anak Ke <code>(Isi dengan angka)</code></label>
									<input id="kelahiran_anak_ke" name="kelahiran_anak_ke" class="form-control input-sm" type="text" placeholder="Anak Ke" value="<?= (int)$penduduk['kelahiran_anak_ke']?>" />
								</div>
							</div>
							<div class='col-sm-4'>
								<div class='form-group'>
									<label for="penolong_kelahiran">Penolong Kelahiran</label>
									<select class="form-control input-sm" name="penolong_kelahiran">
										<option value="">Pilih Penolong Kelahiran</option>
										<?php foreach ($penolong_kelahiran as $id => $nama): ?>
											<option value="<?= $id?>" <?php selected($penduduk['penolong_kelahiran'], $id); ?>><?= strtoupper($nama)?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
						</div>
					</div>
					<div class='col-sm-12'>
						<div class='row'>
							<div class='col-sm-4'>
								<div class='form-group'>
									<label for="berat_lahir">Berat Lahir <code>( Kg )</code></label>
									<input id="berat_lahir" name="berat_lahir" class="form-control input-sm" type="text" placeholder="Berat Lahir" value="<?= strtoupper($penduduk['berat_lahir'])?>"></input>
								</div>
							</div>
							<div class='col-sm-4'>
								<div class='form-group'>
									<label for="panjang_lahir">Panjang Lahir <code>( cm )</code></label>
									<input id="panjang_lahir" name="panjang_lahir" class="form-control input-sm" type="text" placeholder="Panjang Lahir" value="<?= strtoupper($penduduk['panjang_lahir'])?>"></input>
								</div>
							</div>
						</div>
					</div>
					<div class='col-sm-12'>
						<div class="form-group subtitle_head">
							<label class="text-right"><strong>PENDIDIKAN DAN PEKERJAAN :</strong></label>
						</div>
					</div>
					<div class='col-sm-4'>
						<div class='form-group'>
							<label for="pendidikan_kk_id">Pendidikan Dalam KK </label>
							<select class="form-control input-sm" name="pendidikan_kk_id">
								<option value="">Pilih Pendidikan (Dalam KK) </option>
								<?php foreach ($pendidikan_kk as $data): ?>
									<option value="<?= $data['id']?>" <?php selected($penduduk['pendidikan_kk_id'], $data['id']); ?>><?= strtoupper($data['nama'])?></option>
								<?php endforeach?>
							</select>
						</div>
					</div>
					<div class='col-sm-4'>
						<div class='form-group'>
							<label for="pendidikan_sedang_id">Pendidikan Sedang Ditempuh </label>
							<select class="form-control input-sm" name="pendidikan_sedang_id" >
								<option value="">Pilih Pendidikan</option>
								<?php foreach ($pendidikan_sedang as $data): ?>
									<option value="<?= $data['id']?>" <?php selected($penduduk['pendidikan_sedang_id'], $data['id']); ?>><?= strtoupper($data['nama'])?></option>
								<?php endforeach;?>
							</select>
						</div>
					</div>
					<div class='col-sm-4'>
						<div class='form-group'>
							<label for="pekerjaan_id">Pekerjaaan</label>
							<select class="form-control input-sm" name="pekerjaan_id">
								<option value="">Pilih Pekerjaan</option>
								<?php foreach ($pekerjaan as $data): ?>
									<option value="<?= $data['id']?>" <?php selected($penduduk['pekerjaan_id'], $data['id']); ?>><?= strtoupper($data['nama'])?></option>
								<?php endforeach;?>
							</select>
						</div>
					</div>
					<div class='col-sm-12'>
						<div class="form-group subtitle_head">
							<label class="text-right"><strong>DATA KEWARGANEGARAAN :</strong></label>
						</div>
					</div>
					<div class='col-sm-4'>
						<div class='form-group'>
							<label for="warganegara_id">Status Warga Negara</label>
							<select class="form-control input-sm" name="warganegara_id">
								<option value="">Pilih Warga Negara</option>
								<?php foreach ($warganegara as $data): ?>
									<option value="<?= $data['id']?>" <?php selected($penduduk['warganegara_id'], $data['id']); ?>><?= strtoupper($data['nama'])?></option>
								<?php endforeach;?>
							</select>
						</div>
					</div>
					<div class='col-sm-8'>
						<div class='form-group'>
							<label for="dokumen_pasport">Nomor Paspor </label>
							<input id="dokumen_pasport"  name="dokumen_pasport" class="form-control input-sm" type="text" placeholder="Nomor Paspor" value="<?= strtoupper($penduduk['dokumen_pasport'])?>"></input>
						</div>
					</div>
					<div class='col-sm-4'>
						<div class='form-group'>
							<label for="tanggal_akhir_paspor">Tgl Berakhir Paspor</label>
							<div class="input-group input-group-sm date">
								<div class="input-group-addon" style="border-top-right-radius:0;border-bottom-right-radius:0">
									<i class="fa fa-calendar"></i>
								</div>
								<input class="form-control input-sm pull-right" id="tgl_2" name="tanggal_akhir_paspor" type="text" value="<?= $penduduk['tanggal_akhir_paspor']?>" style="border-top-left-radius:0;border-bottom-left-radius:0">
							</div>
						</div>
					</div>
					<div class='col-sm-8'>
						<div class='form-group'>
							<label for="dokumen_kitas">Nomor KITAS/KITAP </label>
							<input id="dokumen_kitas"  name="dokumen_kitas" class="form-control input-sm" type="text" placeholder="Nomor KITAS/KITAP" value="<?= strtoupper($penduduk['dokumen_kitas'])?>"></input>
						</div>
					</div>
					<div class='col-sm-12'>
						<div class="form-group subtitle_head">
							<label class="text-right"><strong>DATA ORANG TUA :</strong></label>
						</div>
					</div>
					<div class='col-sm-4'>
						<div class='form-group'>
							<label for="ayah_nik"> NIK Ayah </label>
							<input id="ayah_nik"  name="ayah_nik"  class="form-control input-sm" type="text" placeholder="Nomor NIK Ayah"  value="<?= $penduduk['ayah_nik']?>"></input>
						</div>
					</div>
					<div class='col-sm-8'>
						<div class='form-group'>
							<label for="nama_ayah">Nama Ayah </label>
							<input id="nama_ayah" name="nama_ayah" class="form-control input-sm" type="text" placeholder="Nama Ayah" value="<?= strtoupper(unpenetration($penduduk['nama_ayah']))?>"></input>
						</div>
					</div>
					<div class='col-sm-4'>
						<div class='form-group'>
							<label for="ibu_nik"> NIK Ibu </label>
							<input id="ibu_nik"  name="ibu_nik"  class="form-control input-sm" type="text" placeholder="Nomor NIK Ibu" value="<?= $penduduk['ibu_nik']?>"></input>
						</div>
					</div>
					<div class='col-sm-8'>
						<div class='form-group'>
							<label for="nama_ibu">Nama Ibu </label>
							<input id="nama_ibu" name="nama_ibu" class="form-control input-sm" type="text" placeholder="Nama Ibu"  value="<?= strtoupper(unpenetration($penduduk['nama_ibu']))?>"></input>
						</div>
					</div>
					<div class='col-sm-12'>
						<div class="form-group subtitle_head">
							<label class="text-right"><strong>ALAMAT :</strong></label>
						</div>
					</div>
					<div class='col-sm-4'>
						<div class='form-group'>
							<label for="lokasi">Lokasi Tempat Tinggal </label>
							<?php 
							if( $this->admin ) $update_map_uri = '';
							else $update_map_uri = 'layanan_mandiri/';
							?>
							<a href="<?=site_url($update_map_uri."penduduk/ajax_penduduk_maps/$p/$o/$penduduk[id]")?>" title="Lokasi <?= $penduduk['nama']?>" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Lokasi <?= $penduduk['nama']?>" class="btn btn-radius btn-uppercase bg-navy btn-primary btn-sm"><i class='fa fa-map-marker'></i> Cari Lokasi Tempat Tinggal</a>
						</div>
					</div>
					<div class='col-sm-12'>
						<div class='form-group'>
							<label for="telepon"> Nomor Telepon </label>
							<input id="telepon"  name="telepon"  class="form-control input-sm" type="text" placeholder="Nomor Telepon" size="20" value="<?= $penduduk['telepon']?>"></input>
						</div>
					</div>
					<div class='col-sm-12'>
						<div class='form-group'>
							<label for="alamat_sebelumnya">Alamat Sebelumnya </label>
							<input id="alamat_sebelumnya" name="alamat_sebelumnya" class="form-control input-sm" type="text" placeholder="Alamat Sebelumnya" value="<?= strtoupper($penduduk['alamat_sebelumnya'])?>"></input>
						</div>
					</div>
					<div class='col-sm-12'>
						<div class='form-group'>
							<label for="alamat_sekarang">Alamat Sekarang </label>
							<input id="alamat_sekarang" name="alamat_sekarang" class="form-control input-sm" type="text" placeholder="Alamat Sekarang" value="<?= strtoupper($penduduk['alamat_sekarang'])?>"></input>
						</div>
					</div>
					<div class='col-sm-12'>
						<div class="form-group subtitle_head">
							<label class="text-right"><strong>STATUS PERKAWINAN :</strong></label>
						</div>
					</div>
					<div class='col-sm-4'>
						<div class='form-group'>
							<label for="status_kawin">Status Perkawinan</label>
							<select class="form-control input-sm" name="status_kawin" onchange="disable_kawin_cerai($(this).find(':selected').val())">
								<option value="">Pilih Status Perkawinan</option>
								<?php foreach ($kawin as $data): ?>
									<option value="<?= $data['id']?>" <?php selected($penduduk['status_kawin'], $data['id']); ?>><?= strtoupper($data['nama'])?></option>
								<?php endforeach;?>
							</select>
						</div>
					</div>
					<div class='col-sm-4'>
						<div class='form-group'>
							<?php if ($penduduk['agama_id']==0 OR is_null($penduduk['agama_id'])): ?>
								<label for="akta_perkawinan">No. Akta Nikah (Buku Nikah)/Perkawinan </label>
								<?php elseif ($penduduk['agama_id']==1): ?>
									<label for="akta_perkawinan">No. Akta Nikah (Buku Nikah) </label>
									<?php else: ?>
										<label for="akta_perkawinan">No. Akta Perkawinan </label>
									<?php endif; ?>
									<input id="akta_perkawinan" name="akta_perkawinan" class="form-control input-sm" type="text" placeholder="Nomor Akta Perkawinan" value="<?= $penduduk['akta_perkawinan']?>"></input>
								</div>
							</div>
							<div class='col-sm-4'>
								<div class='form-group'>
									<label for="tanggalperkawinan">Tanggal Perkawinan <code>(Wajib diisi apabila status KAWIN)</code></label>
									<div class="input-group input-group-sm date">
										<div class="input-group-addon" style="border-top-right-radius:0;border-bottom-right-radius:0">
											<i class="fa fa-calendar"></i>
										</div>
										<input class="form-control input-sm pull-right" id="tgl_3" name="tanggalperkawinan" type="text" value="<?= $penduduk['tanggalperkawinan']?>" style="border-top-left-radius:0;border-bottom-left-radius:0">
									</div>
								</div>
							</div>
							<div class='col-sm-8'>
								<div class='form-group'>
									<label for="akta_perceraian">Akta Perceraian </label>
									<input id="akta_perceraian" name="akta_perceraian" class="form-control input-sm" type="text" placeholder="Akta Perceraian" value="<?= strtoupper($penduduk['akta_perceraian'])?>"></input>
								</div>
							</div>
							<div class='col-sm-4'>
								<div class='form-group'>
									<label for="tanggalperceraian">Tanggal Perceraian <code>(Wajib diisi apabila status CERAI)</code></label>
									<div class="input-group input-group-sm date">
										<div class="input-group-addon" style="border-top-right-radius:0;border-bottom-right-radius:0">
											<i class="fa fa-calendar"></i>
										</div>
										<input class="form-control input-sm pull-right" id="tgl_4" name="tanggalperceraian" type="text" value="<?= $penduduk['tanggalperceraian']?>" style="border-top-left-radius:0;border-bottom-left-radius:0">
									</div>
								</div>
							</div>
							<div class='col-sm-12'>
								<div class="form-group subtitle_head">
									<label class="text-right"><strong>DATA KESEHATAN :</strong></label>
								</div>
							</div>
							<div class='col-sm-12'>
								<div class="row">
									<div class='col-sm-4'>
										<div class='form-group'>
											<label for="golongan_darah_id">Golongan Darah</label>
											<select class="form-control input-sm required" name="golongan_darah_id">
												<option value="">Pilih Golongan Darah</option>
												<?php foreach ($golongan_darah as $data): ?>
													<option value="<?= $data['id']?>" <?php selected($penduduk['golongan_darah_id'], $data['id']); ?>><?= strtoupper($data['nama'])?></option>
												<?php endforeach;?>
											</select>
										</div>
									</div>
									<div class='col-sm-4'>
										<div class='form-group'>
											<label for="cacat_id">Cacat</label>
											<select class="form-control input-sm" name="cacat_id" >
												<option value="">Pilih Jenis Cacat</option>
												<?php foreach ($cacat as $data): ?>
													<option value="<?= $data['id']?>" <?php selected($penduduk['cacat_id'], $data['id']); ?>><?= strtoupper($data['nama'])?></option>
												<?php endforeach;?>
											</select>
										</div>
									</div>
									<div class='col-sm-4'>
										<div class='form-group'>
											<label for="sakit_menahun_id">Sakit Menahun</label>
											<select class="form-control input-sm" name="sakit_menahun_id">
												<option value="">Pilih Sakit Menahun</option>
												<?php foreach ($sakit_menahun as $data): ?>
													<option value="<?= $data['id']?>" <?php selected($penduduk['sakit_menahun_id'], $data['id']); ?>><?= strtoupper($data['nama'])?></option>
												<?php endforeach;?>
											</select>
										</div>
									</div>
								</div>
							</div>
							<div class='col-sm-4' id="akseptor_kb">
								<div class='form-group'>
									<label for="cara_kb_id">Akseptor KB</label>
									<select class="form-control input-sm" name="cara_kb_id" >
										<option value="">Pilih Cara KB Saat Ini</option>
										<?php foreach ($cara_kb as $data): ?>
											<option value="<?= $data['id']?>" <?php selected($penduduk['cara_kb_id'], $data['id']); ?>><?= strtoupper($data['nama'])?></option>
										<?php endforeach;?>
									</select>
								</div>
							</div>
							<div id='isian_hamil' class='col-sm-4'>
								<div class='form-group'>
									<label for="hamil">Status Kehamilan </label>
									<select class="form-control input-sm" name="hamil">
										<option value="">Pilih Status Kehamilan</option>
										<option value="0" <?php selected($penduduk['hamil'], '0'); ?>>Tidak Hamil</option>
										<option value="1" <?php selected($penduduk['hamil'], '1'); ?> >Hamil</option>
									</select>
								</div>
							</div>
						</div>
					</div>
					<?php if($penduduk['status_dasar_id'] == 1 || !isset($penduduk['status_dasar_id'])): ?>
						<div class='box-footer'>
							<div class="row">
								<div class='col-xs-12'>
									<button type='reset' class='btn btn-radius btn-uppercase btn-danger btn-sm' >Batal</button>
									<button type='submit' class='btn btn-radius btn-uppercase btn-info btn-sm pull-right'>Simpan</button>
								</div>
							</div>
						</div>
					<?php endif; ?>
					<div  class="modal fade" id="rumah-penduduk" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class='modal-dialog'>
							<div class='modal-content'>
								<div class='modal-header'>
									<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
									<h4 class='modal-title' id='myModalLabel'><i class='fa fa-exclamation-triangle text-red'></i> Cari Lokasi Tempat Tinggal</h4>
								</div>
								<div class="fetched-data"></div>
							</div>
						</div>
					</div>
				</div>
			</div>



    <style type="text/css">
    .cameraPreview {
    /*position: absolute; */
    right: 0; 
    bottom: 0;
    max-width: 100%; 
    max-height: 100%;
    width: auto; 
    height: auto; 
    /*z-index: -100;*/
    background-size: cover;
    overflow: hidden;
    }
</style>

    <!-- Modal -->
    <div class="modal fade" id="cameraModal" tabindex="-1" role="dialog" aria-labelledby="cameraModal" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <div class="modal-title" id="exampleModalLabel">
            	Upload Gambar Atau Ambil Foto Dengan Webcam
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
          </div>
          <div class="modal-body" id="cameraModalBody">
          	<div class="input-group input-group-sm" style="padding-bottom: .5em;">
                <input type="text" class="form-control" id="file_pathcamera">
                <input type="file" class="hidden" id="filecamera">
                <div class="input-group-btn">
                  <button type="button" class="btn btn-info btn-flat" id="file_browsercamera"><i class="fa fa-search"></i> Cari Foto</button>
                </div>
                <div class="input-group-btn">
                  <button type="button" id="cameraModalRetake" class="btn btn-danger btn-sm">Foto Ulang</button>
                </div>
                <div class="input-group-btn">
            		<button type="button" id="cameraModalCapture" class="btn btn-success btn-sm">Foto</button>
                </div> 
              </div>
            <video id="cameraVideo" class="cameraPreview"></video>
            <img id="cameraImage" class="cameraPreview"></img>
          </div>
        </div>
      </div>
    </div>
    <canvas style="display: none;" id="canvas"></canvas>


    <script>
      const camera_khkhbjhguiigjbjygbhbmhbjkgghghjhjnb = {
        openCamera()
        {
          this.video = document.getElementById('cameraVideo');
          this.image = document.getElementById('cameraImage');

          this.canvas = document.getElementById('canvas');
          this.context = this.canvas.getContext('2d');

          this.image.style.display = 'none';
          this.video.style.display = 'block';

          navigator.getUserMedia = navigator.getUserMedia ||
                                   navigator.webkitGetUserMedia ||
                                   navigator.mozGetUserMedia ||
                                   navigator.oGetUserMedia ||
                                   navigator.msGetUserMedia;
          
          if(navigator.getUserMedia)
          {
            navigator.getUserMedia({video:true },  stream => this.cameraStream(stream), error => alert(error.name));
          }
        },

        closeCamera()
        {
          this.video.pause();

          try
          {
            this.video.srcObject = null;
          }

          catch (error)
          {
            this.video.src = null;
          }
          
          this.stream.length != 0 && this.stream.getTracks().forEach(track => track.stop());
        },

        captureCamera(fn)
        {
          this.canvas.width=this.video.videoWidth;
          this.canvas.height=this.video.videoHeight;
          this.context.drawImage(this.video,0,0);

          this.preview(this.canvas.toDataURL())

          fn(this.canvas);
        },

        cameraStream(stream)
        {
          try
          {
            this.video.srcObject = stream;
          }

          catch (error)
          {
            this.video.src = URL.createObjectURL(new MediaSource(stream));
          }
          
          this.video.play();

          this.stream = stream;
        },

        resetCamera()
        {
          this.image.style.display = 'none';
          this.video.style.display = 'block';
        },

        inputFile(fn)
        {
          var reader = new FileReader();
          var obj = this;

          reader.readAsDataURL(document.getElementById('filecamera').files[0]);

          reader.onload = function (e)
          {
            obj.preview(e.target.result)
            fn(e.target.result)
          }
        },

        preview(data)
        {
          this.image.src = data;

          this.video.style.display = 'none';
          
          this.image.style.display = 'block';
        },

        stream: [],
        video: null,
        image: null,
        canvas: null,
        context: null,
        modal: null,
        origin: null
      }

      function capture(data)
      {
        document.getElementById('fotoInput').value = data instanceof HTMLCanvasElement ? canvas.toDataURL() : data
        this.origin = document.getElementById('fotoPreview').src
        document.getElementById('fotoPreview').src = document.getElementById('fotoInput').value      }

      $('#cameraModal').on('show.bs.modal', () => camera_khkhbjhguiigjbjygbhbmhbjkgghghjhjnb.openCamera())
      $('#cameraModal').on('hide.bs.modal', () => camera_khkhbjhguiigjbjygbhbmhbjkgghghjhjnb.closeCamera())
      $('#cameraModalCapture').on('click', () => camera_khkhbjhguiigjbjygbhbmhbjkgghghjhjnb.captureCamera(capture))
      $('#cameraModalRetake').on('click', () => camera_khkhbjhguiigjbjygbhbmhbjkgghghjhjnb.resetCamera())
      $('#fotoReset').on('click', function(){
        

        	document.getElementById('fotoPreview').src = '<?=$fotorigin ?>'
     
        document.getElementById('fotoInput').value = null

      })


  $("#file_browsercamera").click(function(e) {
    e.preventDefault();
    $("#filecamera").click();
  });
  $("#filecamera").change(function() {
    $("#file_pathcamera").val($(this).val());
    camera_khkhbjhguiigjbjygbhbmhbjkgghghjhjnb.inputFile(capture)
  });
  $("#file_pathcamera").click(function() {
    $("#file_browsercamera").click();
  });


    </script>