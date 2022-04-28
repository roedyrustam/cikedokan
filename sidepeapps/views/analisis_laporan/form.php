<div class="content-wrapper">
	<section class="content-header">
		<h1>Laporan Hasil Analisis</h1>
		<ol class="breadcrumb">
			<li><a href="<?= site_url('hom_sid') ?>"><i class="fa fa-home"></i> Home</a></li>
			<li><a href="<?= site_url('analisis_master') ?>"> Master Analisis</a></li>
			<li><a href="<?= site_url() ?>analisis_laporan/leave"><?= $analisis_master['nama']?></a></li>
			<li class="active">Laporan Hasil Klasifikasi</li>
		</ol>
	</section>
	</section>
	<section class="content" id="maincontent">
		<form id="mainform" name="mainform" action="" method="post">
			<div class="row">
				<div class="col-md-4 col-lg-3">
					<?php $this->load->view('analisis_master/left',$data);?>
				</div>
				<div class="col-md-8 col-lg-9">
					<div class="box box-info">
						<div class="box-header with-border">
							<div class="table-responsive">
								<table class="table table-bordered table-striped table-hover" >
									<tr>
										<td nowrap width="150" class="uppercase">Hasil Pendataan</td>
										<td width="1">:</td>
										<td><a href="<?= site_url() ?>analisis_master/menu/<?= $_SESSION['analisis_master']?>"><?= $analisis_master['nama']?></a></td>
									</tr>
									<tr>
										<td class="uppercase">Nomor Identitas</td>
										<td>:</td>
										<td><?= $subjek['nid']?></td>
									</tr>
									<tr>
										<td class="uppercase">Nama Subjek</td>
										<td>:</td>
										<td><?= $subjek['nama']?></td>
									</tr>
								</table>
							</div>
						</div>
						<div class="box-body">
							<div class="row">
								<div class="col-sm-12">
									<h5 class="box-title">DAFTAR ANGGOTA</h5>
									<div class="table-responsive">
										<table class="table table-bordered table-striped table-hover ">
											<thead class="bg-gray color-palette">
												<tr>
													<th class="text-center uppercase" width="2%">NO</th>
													<th class="text-center uppercase">NIK</th>
													<th class="text-center uppercase">NAMA</th>
													<th class="text-center uppercase">TANGGAL LAHIR</th>
													<th class="text-center uppercase">JENIS KELAMIN</th>
												</tr>
											</thead>
											<tbody>
												<?php $i=1; foreach ($list_anggota AS $ang): ?>
													<tr>
														<td class="text-center uppercase" width="2%"><?= $i?></td>
														<td><?= $ang['nik']?></td>
														<td width="45%"><?= $ang['nama']?></td>
														<td><?= tgl_indo($ang['tanggallahir']) ?></td>
														<td><?php if ($ang['sex'] == 1): ?>LAKI-LAKI<?php endif; ?><?php if ($ang['sex'] == 2): ?>PEREMPUAN<?php endif; ?></td>
													</tr>
												<?php $i++; endforeach; ?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="table-responsive">
										<table class="table table-bordered table-striped table-hover ">
											<thead class="bg-gray color-palette">
												<tr>
													<th class="text-center uppercase" width="2%">No</th>
													<th class="text-center uppercase" width="45%">Pertanyaan/Indikator</th>
													<th class="text-center uppercase" width="5%">Bobot</td>
													<th class="text-center uppercase">Jawaban</th>
													<th class="text-center uppercase" width="5%">Nilai</th>
													<th class="text-center uppercase" width="10%">Poin</th>
												</tr>
											</thead>
											<tbody>
												<?php foreach ($list_jawab AS $data): ?>
													<?php if ($data['cek'] >= 1):$bg = "class='bg'";else:$bg ="";endif; ?>
													<tr>
														<td class="text-center uppercase"><?= $data['no']?></td>
														<td><?= $data['pertanyaan']?></td>
														<td class="text-center uppercase"><?= $data['bobot']?></td>
														<td><?= $data['jawaban']?></td>
														<td class="text-center uppercase"><?= $data['nilai']?></td>
														<td class="text-center uppercase"><?= $data['poin']?></td>
													</tr>
												<?php endforeach; ?>
											</tbody>
											<tfoot  class="bg-info olor-palette">
												<tr class="total">
													<td colspan='5' class="text-center uppercase"><strong>TOTAL</strong></td>
													<td class="text-center uppercase"><strong><?= $total?></strong></td>
												</tr>
											</tfoot>
										</table>
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

