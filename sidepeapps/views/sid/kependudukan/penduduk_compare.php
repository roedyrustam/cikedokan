<style>
	.table
	{
    font-size: 12px;
	}
</style>
<div class="content-wrapper">
	<section class="content-header">
		<h1>Biodata Penduduk</h1>
		<ol class="breadcrumb">
			<li><a href="<?= site_url('hom_sid')?>"><i class="fa fa-home"></i> Home</a></li>
			<li class="active">Konfirmasi Biodata Penduduk</li>
		</ol>
	</section>
	<section class="content" id="maincontent">
		<form id="mainform" name="mainform" action="" method="post">
			<div class="row">
				<div class="col-md-12">
					<div class="box box-info">
						<div class="box-header">
							<a href="<?= site_url("penduduk/dokumen/$penduduk[id]")?>" class="btn btn-social btn-flat btn-success btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Manajemen Dokumen Penduduk" ><i class="fa fa-book"></i> Manajemen Dokumen</a>
							<?php if ($penduduk['status_dasar_id']==1): ?>
								<a href="<?= site_url("penduduk/form/$p/$o/$penduduk[id]")?>" class="btn btn-social btn-flat btn-warning btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Ubah Biodata" ><i class="fa fa-edit"></i> Ubah Biodata</a>
							<?php endif; ?>
              <a href="<?= site_url("penduduk/cetak_biodata/$penduduk[id]")?>" class="btn btn-social btn-flat bg-purple btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Cetak Biodata" target="_blank"><i class="fa fa-print"></i>Cetak Biodata</a>
							<a href="<?= site_url("penduduk/clear")?>" class="btn btn-social btn-flat btn-info btn-sm btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"  title="Kembali Ke Daftar Penduduk">
								<i class="fa fa-arrow-circle-left"></i>Kembali Ke Daftar Penduduk
							</a>
						</div>
						<div class="box-body">
							<div class="row">
								<div class="col-md-12">
									<div class="box-header with-border">
										<h3 class="box-title">Biodata Penduduk (NIK : <?= $penduduk['nik']?>)</h3>
									</div>
								</div>
								<div class="col-md-12">
									<div class="table-responsive">
										<table class="table table-bordered table-striped table-hover" >
											<tr>
												<td colspan="4">
													<?php if ($penduduk['foto']): ?>
														 <img class="profile-user-img img-responsive img-circle" src="<?= AmbilFoto($penduduk['foto'])?>" alt="Foto">
													<?php else: ?>
														<img class="profile-user-img img-responsive img-circle" src="<?= base_url()?>assets/files/user_pict/kuser.png" alt="Foto">
													<?php endif; ?>
												</td>
											</tr>
										</table>
									</div>
									<div class="table-responsive">
										<table class="table table-bordered table-striped table-hover" >
											<tbody>
												<tr>
													<td><strong>Data</strong></td>
													<td><strong>:</strong></td>
													<td><strong>BIODATA</strong></td>
													<td><strong>PEMUKTAHIRAN</strong></td>
												</tr>
												<tr>
													<td width="300">Nama</td><td width="1">:</td>
													<td><?= strtoupper($penduduk['nama'])?></td>
													<td><?= strtoupper($penduduk['data_temp']['nama'])?></td>
												</tr>
												<tr>
													<td>Status Kepemilikan KTP</td><td >:</td>
													<td>
														<table id='ektp' class="table table-bordered" style="width:60%">
															<tr>
																<th>Wajib KTP</th>
																<th>KTP-EL</th>
																<th>Status Rekam</th>
															</tr>
															<tr>
																<td><?= strtoupper($penduduk['wajib_ktp'])?></td>
																<td><?= strtoupper($penduduk['ktp_el'])?></td>
																<td><?= strtoupper($penduduk['status_rekam'])?></td>
															</tr>
														</table>
													</td>
				                                    <td>
														<table id='ektp' class="table table-bordered" style="width:60%">
															<tr>
																<th>Wajib KTP</th>
																<th>KTP-EL</th>
																<th>Status Rekam</th>
															</tr>
															<tr>
																<td><?= strtoupper($penduduk['data_temp']['wajib_ktp'])?></td>
																<td><?= strtoupper($penduduk['data_temp']['ktp_el'])?></td>
																<td><?= strtoupper($penduduk['data_temp']['status_rekam'])?></td>
															</tr>
														</table>
													</td>
												</tr>
												<tr>
													<td>Nomor Kartu Keluarga</td><td >:</td>
													<td>
														<?= $penduduk['no_kk']?>
														<?php if ($penduduk['status_dasar_id'] <> '1' AND $penduduk['no_kk'] <> $penduduk['log_no_kk']): ?>
															(waktu peristiwa {<?= $penduduk['status_dasar']?>}: {<?= $penduduk['log_no_kk']?>})
														<?php endif; ?>
													</td>
													<td>
														<?= $penduduk['data_temp']['no_kk']?>
														<?php if ($penduduk['data_temp']['status_dasar_id'] <> '1' AND $penduduk['data_temp']['no_kk'] <> $penduduk['data_temp']['log_no_kk']): ?>
															(waktu peristiwa {<?= $penduduk['data_temp']['status_dasar']?>}: {<?= $penduduk['data_temp']['log_no_kk']?>})
														<?php endif; ?>
													</td>
												</tr>
												<tr>
													<td>Nomor KK Sebelumnya</td><td >:</td><td><?= $penduduk['no_kk_sebelumnya']?></td>
													<td><?= $penduduk['data_temp']['no_kk_sebelumnya']?></td>
												</tr>
												<tr>
													<td>Hubungan Dalam Keluarga</td><td >:</td><td><?= $penduduk['hubungan']?></td>
													<td><?= $penduduk['data_temp']['hubungan']?></td>
												</tr>
												<tr>
													<td>Jenis Kelamin</td><td >:</td><td><?= strtoupper($penduduk['sex'])?></td>
													<td><?= strtoupper($penduduk['data_temp']['sex'])?></td>
												</tr>
												<tr>
													<td>Agama</td><td >:</td><td><?= strtoupper($penduduk['agama'])?></td>
													<td><?= strtoupper($penduduk['data_temp']['agama'])?></td>
												</tr>
												<tr>
													<td>Status Penduduk</td><td >:</td><td><?= strtoupper($penduduk['status'])?></td>
													<td><?= strtoupper($penduduk['data_temp']['status'])?></td>
												</tr>
												<tr>
													<th colspan="4" class="subtitle_head"><strong>DATA KELAHIRAN</strong></th>
												</tr>
												<tr>
													<td>Akta Kelahiran</td><td >:</td><td><?= strtoupper($penduduk['akta_lahir'])?></td>
						                            <td><?= strtoupper($penduduk['data_temp']['akta_lahir'])?></td>
												</tr>
												<tr>
													<td>Tempat / Tanggal Lahir</td><td >:</td><td><?= strtoupper($penduduk['tempatlahir'])?> / <?= strtoupper($penduduk['tanggallahir'])?></td>
													<td><?= strtoupper($penduduk['data_temp']['tempatlahir'])?> / <?= strtoupper($penduduk['data_temp']['tanggallahir'])?></td>
												</tr>
												<tr>
													<td>Tempat Dilahirkan</td><td >:</td><td><?= $penduduk['tempat_dilahirkan_nama'] ?></td>
													<td><?= $penduduk['data_temp']['tempat_dilahirkan_nama'] ?></td>
												</tr>
												<tr>
													<td>Jenis Kelahiran</td><td >:</td><td><?= $penduduk['jenis_kelahiran_nama'] ?></td>
													<td><?= $penduduk['data_temp']['jenis_kelahiran_nama'] ?></td>
												</tr>
												<tr>
													<td>Kelahiran Anak Ke</td><td >:</td><td><?= $penduduk['kelahiran_anak_ke'] ?></td>
													<td><?= $penduduk['data_temp']['kelahiran_anak_ke'] ?></td>
												</tr>
												<tr>
													<td>Penolong Kelahiran</td><td >:</td><td><?= $penduduk['penolong_kelahiran_nama'] ?></td>
													<td><?= $penduduk['data_temp']['penolong_kelahiran_nama'] ?></td>
												</tr>
												<tr>
													<td>Berat Lahir</td><td >:</td><td><?= $penduduk['berat_lahir']?> Kg</td>
													<td><?= $penduduk['data_temp']['berat_lahir']?> Kg</td>
												</tr>
												<tr>
													<td>Panjang Lahir</td><td >:</td><td><?= $penduduk['panjang_lahir']?> cm</td>
													<td><?= $penduduk['data_temp']['panjang_lahir']?> cm</td>
												</tr>
												<tr>
													<th colspan="4" class="subtitle_head"><strong>PENDIDIKAN DAN PEKERJAAN</strong></th>
												</tr>
												<tr>
													<td>Pendidikan dalam KK</td><td >:</td><td><?= strtoupper($penduduk['pendidikan_kk'])?></td>
													<td><?= strtoupper($penduduk['data_temp']['pendidikan_kk'])?></td>
												</tr>
												<tr>
													<td>Pendidikan sedang ditempuh</td><td >:</td><td><?= strtoupper($penduduk['pendidikan_sedang'])?></td>
													<td><?= strtoupper($penduduk['data_temp']['pendidikan_sedang'])?></td>
												</tr>
												<tr>
													<td>Pekerjaan</td><td >:</td><td><?= strtoupper($penduduk['pekerjaan'])?></td>
													<td><?= strtoupper($penduduk['data_temp']['pekerjaan'])?></td>
												</tr>
												<tr>
													<th colspan="4" class="subtitle_head"><strong>DATA KEWARGANEGARAAN</strong></th>
												</tr>
												<tr>
													<td>Warga Negara</td><td >:</td><td><?= strtoupper($penduduk['warganegara'])?></td>
													<td><?= strtoupper($penduduk['data_temp']['warganegara'])?></td>
												</tr>
												<tr>
													<td>Nomor Paspor</td><td >:</td><td><?= strtoupper($penduduk['dokumen_pasport'])?></td>
													<td><?= strtoupper($penduduk['data_temp']['dokumen_pasport'])?></td>
												</tr>
												<tr>
													<td>Tanggal Berakhir Paspor</td><td >:</td><td><?= strtoupper($penduduk['tanggal_akhir_paspor'])?></td>
													<td><?= strtoupper($penduduk['data_temp']['tanggal_akhir_paspor'])?></td>
												</tr>
												<tr>
													<td>Nomor KITAS/KITAP</td><td >:</td><td><?= strtoupper($penduduk['dokumen_kitas'])?></td>
													<td><?= strtoupper($penduduk['data_temp']['dokumen_kitas'])?></td>
												</tr>
												<tr>
													<th colspan="4" class="subtitle_head"><strong>ORANG TUA</strong></th>
												</tr>
												<tr>
													<td>NIK Ayah</td><td >:</td><td><?= strtoupper($penduduk['ayah_nik'])?></td>
													<td><?= strtoupper($penduduk['data_temp']['ayah_nik'])?></td>
												</tr>
												<tr>
													<td>Nama Ayah</td><td >:</td><td><?= strtoupper($penduduk['nama_ayah'])?></td>
													<td><?= strtoupper($penduduk['data_temp']['nama_ayah'])?></td>
												</tr>
												<tr>
													<td>NIK Ibu</td><td >:</td><td><?= strtoupper($penduduk['ibu_nik'])?></td>
													<td><?= strtoupper($penduduk['data_temp']['ibu_nik'])?></td>
												</tr>
												<tr>
													<td>Nama Ibu</td><td >:</td><td><?= strtoupper($penduduk['nama_ibu'])?></td>
													<td><?= strtoupper($penduduk['data_temp']['nama_ibu'])?></td>
												</tr>
												<tr>
													<th colspan="4" class="subtitle_head"><strong>ALAMAT</strong></th>
												</tr>
												<tr>
													<td>Nomor Telepon</td><td >:</td><td><?= strtoupper($penduduk['telepon'])?></td>
													<td><?= strtoupper($penduduk['data_temp']['telepon'])?></td>
												</tr>
												<tr>
													<td>Alamat</td><td >:</td><td><?= strtoupper($penduduk['alamat'])?></td>
													<td><?= strtoupper($penduduk['alamat'])?></td>
												</tr>
												<tr>
													<td>Dusun</td><td >:</td><td><?= strtoupper(ununderscore($penduduk['dusun']))?></td>
													<td><?= strtoupper(ununderscore($penduduk['data_temp']['dusun']))?></td>
												</tr>
												<tr>
													<td>RT/ RW</td><td >:</td><td><?= strtoupper($penduduk['rt'])?> / <?= $penduduk['rw']?></td>
													<td><?= strtoupper($penduduk['data_temp']['rt'])?> / <?= $penduduk['data_temp']['rw']?></td>
												</tr>
												<tr>
													<td>Alamat Sebelumnya</td><td >:</td><td><?= strtoupper($penduduk['alamat_sebelumnya'])?></td>
													<td><?= strtoupper($penduduk['data_temp']['alamat_sebelumnya'])?></td>
												</tr>
												<tr>
													<td>Alamat Sekarang</td><td >:</td><td><?= strtoupper($penduduk['alamat_sekarang'])?></td>
													<td><?= strtoupper($penduduk['data_temp']['alamat_sekarang'])?></td>
												</tr>
												<tr>
													<th colspan="4" class="subtitle_head"><strong>STATUS KAWIN</strong></th>
												</tr>
												<tr>
													<td>Status Kawin</td><td >:</td><td><?= strtoupper($penduduk['kawin'])?></td>
													<td><?= strtoupper($penduduk['data_temp']['kawin'])?></td>
												</tr>
												<?php if ($penduduk['status_kawin'] <> 1 || $penduduk['data_temp']['status_kawin'] <> 1): ?>
													<tr>
														<td>Akta perkawinan</td><td >:</td><td><?= strtoupper($penduduk['akta_perkawinan'])?></td>
														<td><?= strtoupper($penduduk['data_temp']['akta_perkawinan'])?></td>
													</tr>
													<tr>
														<td>Tanggal perkawinan</td><td >:</td><td><?= strtoupper($penduduk['tanggalperkawinan'])?></td>
														<td><?= strtoupper($penduduk['data_temp']['tanggalperkawinan'])?></td>
													</tr>
												<?php endif ?>
												<?php if (($penduduk['status_kawin'] <> 1 and $penduduk['status_kawin'] <> 2) || ($penduduk['data_temp']['status_kawin'] <> 1 and $penduduk['data_temp']['status_kawin'] <> 2)): ?>
													<tr>
														<td>Akta perceraian</td><td >:</td><td><?= strtoupper($penduduk['akta_perceraian'])?></td>
														<td><?= strtoupper($penduduk['data_temp']['akta_perceraian'])?></td>
													</tr>
													<tr>
														<td>Akta perceraian</td><td >:</td><td><?= strtoupper($penduduk['tanggalperceraian'])?></td>
														<td><?= strtoupper($penduduk['data_temp']['tanggalperceraian'])?></td>
													</tr>
												<?php endif ?>
												<tr>
													<th colspan="4" class="subtitle_head"><strong>DATA KESEHATAN</strong></th>
												</tr>
												<tr>
													<td>Golongan Darah</td><td >:</td><td><?= $penduduk['golongan_darah']?></td>
													<td><?= $penduduk['data_temp']['golongan_darah']?></td>
												</tr>
												<tr>
													<td>Cacat</td><td >:</td><td><?= strtoupper($penduduk['cacat'])?></td>
													<td><?= strtoupper($penduduk['data_temp']['cacat'])?></td>
												</tr>
												<tr>
													<td>Sakit Menahun</td><td >:</td><td><?= strtoupper($penduduk['sakit_menahun'])?></td>
													<td><?= strtoupper($penduduk['data_temp']['sakit_menahun'])?></td>
												</tr>
												<?php if ($penduduk['status_kawin'] == 2 || $penduduk['data_temp']['status_kawin'] == 2): ?>
													<tr>
														<td>Akseptor KB</td><td >:</td><td><?= strtoupper($penduduk['cara_kb'])?></td>
														<td><?= strtoupper($penduduk['data_temp']['cara_kb'])?></td>
													</tr>
												<?php endif ?>
												<?php if ($penduduk['id_sex'] == 2 || $penduduk['data_temp']['id_sex'] == 2): ?>
													<tr>
														<td>Status Kehamilan</td><td >:</td><td><?= empty($penduduk['hamil']) ? 'TIDAK HAMIL' : 'HAMIL'?></td>
														</td><td><?= empty($penduduk['data_temp']['hamil']) ? 'TIDAK HAMIL' : 'HAMIL'?></td>
													</tr>
												<?php endif ?>
											</thead>
										</table>
                        				<?php if($penduduk['status_dasar_id'] == 1 || !isset($penduduk['status_dasar_id'])): ?>
                    						<div class='box-footer'>
                    							<div class='col-xs-12'>
                        							<a href="<?=site_url('penduduk/update_reject/'.$penduduk['id']) ?>" class='btn btn-social btn-flat btn-danger btn-sm' ><i class='fa fa-times'></i> Tolak</a>
                        							<a href="<?=site_url('penduduk/update_approve/'.$penduduk['id']) ?>" class='btn btn-social btn-flat btn-info btn-sm pull-right'><i class='fa fa-check'></i> Simpan</a>
                       							</div>
                        					</div>
                        				<?php endif; ?>
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

