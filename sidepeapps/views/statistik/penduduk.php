<style type="text/css">
  .disabled
	{
     pointer-events: none;
     cursor: default;
  }
</style>
<div class="content-wrapper">
	<section class="content-header">
		<div class="title-header">Statistik Kependudukan</div>
		<ol class="breadcrumb">
			<li><a href="<?=site_url('hom_sid')?>"><i class="fa fa-home"></i> Home</a></li>
			<li class="active">Statistik Kependudukan</li>
		</ol>
	</section>
	<section class="content" id="maincontent">
		<form id="mainform" name="mainform" action="" method="post">
			<div class="row">
				<div class="col-md-4">
          		<?php $this->load->view('statistik/laporan/side-menu.php')?>
				</div>
				<div class="col-md-8">
					<div class="box box-info">
            			<div class="box-header with-border">
							<a href="<?=site_url("statistik/cetak/$lap")?>" class="btn btn-radius btn-uppercase bg-purple btn-sm btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" target="_blank" title="Cetak Data">Cetak</a>
							<a href="<?=site_url("statistik/excel/$lap")?>" class="btn btn-radius btn-uppercase bg-green btn-sm btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" target="_blank" title="Download Data">Unduh</a>
							<a href="<?=site_url("statistik/graph/$lap")?>" class="btn btn-radius btn-uppercase bg-orange btn-sm btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Grafik Data">Grafik Data</a>
							<a href="<?=site_url("statistik/pie/$lap")?>" class="btn btn-radius btn-uppercase btn-primary btn-sm btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Pie Data">Pie Data</a>
							<?php if ($lap=='13'): ?>
								<a href="<?=site_url("statistik/rentang_umur")?>" class="btn btn-radius btn-uppercase bg-olive btn-sm btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Rentang Umur">Rentang Umur</a>
							<?php endif; ?>
						</div>
						<div class="box-body">
							<div class="col-sm-12">
								<?php if ($lap == 'rumah_tangga'): ?>
									<h4 class="box-title"><b>Data Statistik Rumah Tangga</b></h4>
								<?php elseif ($lap < 50): ?>
									<h4 class="box-title"><b>Data Kependudukan menurut <?= ($stat);?></b></h4>
								<?php else: ?>
									<h4 class="box-title"><b>Data Peserta Program <?= ($program['nama'])?></b></h4>
								<?php endif; ?>
								<div class="table-responsive">
									<table class="table table-bordered dataTable table-striped table-hover nowrap">
										<thead class="bg-gray color-palette">
											<tr>
												<th width='5%'>No</th>
												<?php if ($o==2): ?>
						                        <th><a href="<?= site_url("statistik/index/$lap/1")?>"><?= $judul_kelompok ?> <i class='fa fa-sort-asc fa-sm'></i></a></th>
						                        <?php elseif ($o==1): ?>
						                        <th><a href="<?= site_url("statistik/index/$lap/2")?>"><?= $judul_kelompok ?> <i class='fa fa-sort-desc fa-sm'></i></a></th>
						                        <?php else: ?>
						                        <th><a href="<?= site_url("statistik/index/$lap/1")?>"><?= $judul_kelompok ?> <i class='fa fa-sort fa-sm'></i></a></th>
						                        <?php endif; ?>
						                        <?php if ($o==6): ?>
						                        <th nowrap colspan="2"><a href="<?= site_url("statistik/index/$lap/5")?>">Jumlah <i class='fa fa-sort-asc fa-sm'></i></a></th>
						                        <?php elseif ($o==5): ?>
						                        <th nowrap colspan="2"><a href="<?= site_url("statistik/index/$lap/6")?>">Jumlah <i class='fa fa-sort-desc fa-sm'></i></a></th>
						                        <?php else: ?>
						                        <th nowrap colspan="2"><a href="<?= site_url("statistik/index/$lap/5")?>">Jumlah <i class='fa fa-sort fa-sm'></i></a></th>
						                        <?php endif; ?>

												<?php if ($lap<20 OR ($lap>50 AND $program['sasaran']==1)): ?>
													<?php if ($o==4): ?>
						                            <th nowrap colspan="2"><a href="<?= site_url("statistik/index/$lap/3")?>">Laki-Laki <i class='fa fa-sort-asc fa-sm'></i></a></th>
						                          <?php elseif ($o==3): ?>
						                            <th nowrap colspan="2"><a href="<?= site_url("statistik/index/$lap/4")?>">Laki-Laki <i class='fa fa-sort-desc fa-sm'></i></a></th>
						                          <?php else: ?>
						                            <th nowrap colspan="2"><a href="<?= site_url("statistik/index/$lap/3")?>">Laki-Laki <i class='fa fa-sort fa-sm'></i></a></th>
						                          <?php endif; ?>
																			<?php if ($o==8): ?>
						                            <th nowrap colspan="2"><a href="<?= site_url("statistik/index/$lap/7")?>">Perempuan <i class='fa fa-sort-asc fa-sm'></i></a></th>
						                          <?php elseif ($o==7): ?>
						                            <th nowrap colspan="2"><a href="<?= site_url("statistik/index/$lap/8")?>">Perempuan <i class='fa fa-sort-desc fa-sm'></i></a></th>
						                          <?php else: ?>
						                            <th nowrap colspan="2"><a href="<?= site_url("statistik/index/$lap/7")?>">Perempuan <i class='fa fa-sort fa-sm'></i></a></th>
						                          <?php endif; ?>
												<?php endif; ?>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($main as $data): ?>
												<?php if ($lap>50) $tautan_jumlah = site_url("program_bantuan/detail/1/$lap"); ?>
												<tr>
													<td><?= $data['no']?></td>
													<td><?= strtoupper($data['nama']);?></td>
													<td>
														<?php if ($lap==21 OR $lap==22 OR $lap==23 OR $lap==24 OR $lap==25 OR $lap==26 OR $lap==27 OR "$lap"=='kelas_sosial' OR "$lap"=='rumah_tangga'): ?>					<?php
															$aa11a01 = site_url("keluarga/statistik/$lap/$data[id]");
															if ($lap == 'rumah_tangga') {
																$aa11a01 = site_url("rtm/statistik/$data[id]");
															}
															?>
															<a href="<?= $aa11a01 ?>/0" <?php if ($data['id']=='JUMLAH'): ?>class="disabled"<?php endif; ?>><?= $data['jumlah']?></a>
														<?php else: ?>
															<?php if ($lap<50) $tautan_jumlah = site_url("penduduk/statistik/$lap/$data[id]"); ?>
															<a href="<?= $tautan_jumlah ?>/0" <?php if ($data['id']=='JUMLAH'): ?> class="disabled"<?php endif; ?>><?= $data['jumlah']?></a>
														<?php endif; ?>
													</td>
													<td><?= $data['persen'];?></td>
													<?php if ($lap==21 OR $lap==22 OR $lap==23 OR $lap==24 OR $lap==25 OR $lap==26 OR $lap==27 OR "$lap"=='kelas_sosial' OR "$lap"=='rumah_tangga'):
															$tautan_jumlah = site_url("keluarga/statistik/$lap/$data[id]");
															elseif ($lap<50): $tautan_jumlah = site_url("penduduk/statistik/$lap/$data[id]");endif;
													?>
													<?php

													if ($lap == 'rumah_tangga') {
														$tautan_jumlah = site_url("rtm/statistik/$data[id]");
													}

													?>													
													<?php if ($lap<20 OR ($lap>50 AND $program['sasaran']==1)): ?>
														<td>
															<a href="<?= $tautan_jumlah?>/1" <?php if ($data['id']=='JUMLAH'): ?>class="disabled"<?php endif; ?>><?= $data['laki']?></a>
														</td>
														<td><?= $data['persen1'];?></td>
														<td>
															<a href="<?= $tautan_jumlah?>/2" <?php if ($data['id']=='JUMLAH'): ?>class="disabled"<?php endif; ?>><?= $data['perempuan']?></a>
														</td>
														<td><?= $data['persen2'];?></td>
													<?php endif; ?>
												</tr>
											<?php endforeach; ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
	</section>
</div>

