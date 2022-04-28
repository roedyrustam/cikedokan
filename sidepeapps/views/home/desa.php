<!-- Perubahan script coding untuk bisa menampilkan SID Home dalam bentuk tampilan bootstrap (AdminLTE)  -->
<style type="text/css">
	.text-white {
		color: white;
	}

	.pengaturan {
		float: left;
		padding-left: 10px;
	}
</style>
<div class="content-wrapper">
	<section class='content-header'>
		<h1 class="dashboard-header">Dashboard SIDePe</h1>
		<ol class='breadcrumb'>
			<li><a href='<? site_url() ?>'><i class='fa fa-home'></i> Home</a></li>
			<li class='active'>Dashboard SIDePe</li>
		</ol>
	</section>
	<section class='content' id="maincontent">
		<div class='row'>
			<div class="col-md-9 col-xs-12">
				<div class="row">
					<div class="col-md-3 col-xs-6">
						<div class="small-box">
							<div class="inner" style="background: rgb(239,158,233);background: linear-gradient(180deg, rgba(239,158,233,1) 0%, rgba(153,73,189,1) 100%);">
								<div class="icon">
									<i class="ion ion-location"></i>
								</div>
								<p class="title-widget"><?= ucwords($this->setting->sebutan_dusun) ?></p>
								<?php foreach ($dusun as $data) : ?>
									<h3 class="jumlah-widget"><?= $data['jumlah'] ?></h3>
								<?php endforeach; ?>
							</div>
							<div class="outer">
								<a href="<?= site_url('sid_core') ?>" class="small-box-footer detail-widget"><i class="ti-arrow-right"></i></a>
							</div>
						</div>
					</div>

					<div class="col-md-3 col-xs-6">
						<div class="small-box">
							<div class="inner" style="background: rgb(137,215,143);background: linear-gradient(180deg, rgba(137,215,143,1) 0%, rgba(96,166,93,1) 100%);">
								<div class="icon">
									<i class="ion ion-person"></i>
								</div>
								<p class="title-widget">Penduduk</p>
								<?php foreach ($penduduk as $data) : ?>
									<h3 class="jumlah-widget"><?= $data['jumlah'] ?></h3>
								<?php endforeach; ?>
							</div>
							<div class="outer">
								<a href="<?= site_url('penduduk/clear') ?>" class="small-box-footer detail-widget"><i class="ti-arrow-right"></i></a>
							</div>


						</div>
					</div>

					<div class="col-md-3 col-xs-6">
						<div class="small-box">
							<div class="inner" style="background: rgb(252,121,5);background: linear-gradient(0deg, rgba(252,121,5,1) 0%, rgba(252,213,174,1) 100%);">
								<div class="icon">
									<i class="ion ion-ios-people"></i>
								</div>
								<p class="title-widget">Keluarga</p>
								<?php foreach ($keluarga as $data) : ?>
									<h3 class="jumlah-widget"><?= $data['jumlah'] ?></h3>
								<?php endforeach; ?>
							</div>
							<div class="outer">
								<a href="<?= site_url('keluarga/clear') ?>" class="small-box-footer detail-widget"><i class="ti-arrow-right"></i></a>
							</div>
						</div>
					</div>

					<div class="col-md-3 col-xs-6">
						<div class="small-box">
							<div class="inner" style="background: rgb(5,222,252);background: linear-gradient(0deg, rgba(5,222,252,1) 0%, rgba(5,147,252,1) 100%);">
								<div class="icon">
									<i class="fa fa-home"></i>
								</div>
								<p class="title-widget">Rumah Tangga</p>
								<?php foreach ($rtm as $data) : ?>
									<h3 class="jumlah-widget"><?= $data['jumlah'] ?></h3>
								<?php endforeach; ?>
							</div>
							<div class="outer">
								<a href="<?= site_url('rtm/clear') ?>" class="small-box-footer detail-widget"><i class="ti-arrow-right"></i></a>
							</div>
						</div>
					</div>

					<div class="col-md-3 col-xs-6">
						<div class="small-box">
							<div class="inner" style="background: rgb(252,5,122);background: linear-gradient(0deg, rgba(252,5,122,1) 0%, rgba(247,200,222,1) 100%);">
								<div class="icon">
									<i class="fa fa-life-buoy" style="font-size:60px;margin-top:10px"></i>
								</div>
								<p class="title-widget"><?= $miskin['nama'] ?></p>
								<h3 class="jumlah-widget"><?= $miskin['jumlah'] ?></h3>
								<div class="setting-bantuan">
									<?php if ($_SESSION['grup'] == 1) : ?>
										<a href="<?= site_url("{$this->controller}/dialog_pengaturan") ?>" class="inner text-white pengaturan" title="Pengaturan Program Bantuan" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Pengaturan Program Bantuan"><i class="fa fa-gear"></i></a>
									<?php endif; ?>
								</div>
							</div>

							<div class="outer">
								<a href="<?= site_url() . $miskin['link_detail'] ?>" class="small-box-footer detail-widget"><i class="ti-arrow-right"></i></a>
							</div>
						</div>
					</div>

					<div class="col-md-3 col-xs-6">
						<div class="small-box">
							<div class="inner" style="background: rgb(252,121,5);background: linear-gradient(0deg, rgba(252,121,5,1) 0%, rgba(252,213,174,1) 100%);">
								<div class="icon">
									<i class="ion ion-android-people"></i>
								</div>
								<p class="title-widget">Kelompok</p>
								<?php foreach ($kelompok as $data) : ?>
									<h3 class="jumlah-widget"><?= $data['jumlah'] ?></h3>
								<?php endforeach; ?>

							</div>
							<div class="outer">
								<a href="<?= site_url('kelompok/clear') ?>" class="small-box-footer detail-widget"><i class="ti-arrow-right"></i></a>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-xs-6">
						<div class="small-box">
							<div class="inner" style="background: rgb(68,166,245);background: linear-gradient(180deg, rgba(68,166,245,1) 0%, rgba(236,130,241,1) 100%);">
								<div class="icon">
									<i class="ion-ios-chatbubble"></i>
								</div>
								<p class="title-widget">Pesan Warga</p>
								<h3 class="jumlah-widget"><?= $kontak ?></h3>
							</div>
							<div class="outer">
								<a href="<?= site_url('kontak/kelola') ?>" class="small-box-footer detail-widget"><i class="ti-arrow-right"></i></a>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-xs-6">
						<div class="small-box">
							<div class="inner" style="background: rgb(2,176,66);background: linear-gradient(0deg, rgba(2,176,66,1) 0%, rgba(124,241,155,1) 100%);">
								<div class="icon">
									<i class="fa fa-comments-o" style="font-size:70px"></i>
								</div>
								<p class="title-widget">Komentar</p>
								<h3 class="jumlah-widget"><?= $komentar ?></h3>
							</div>
							<div class="outer">
								<a href="<?= site_url('komentar') ?>" class="small-box-footer detail-widget"><i class="ti-arrow-right"></i></a>
							</div>
						</div>
					</div>

					<div class="col-md-3 col-xs-6">
						<div class="small-box">
							<div class="inner" style="background: rgb(2,176,66);background: linear-gradient(0deg, rgba(2,176,66,1) 0%, rgba(124,241,155,1) 100%);">
								<div class="icon">
									<i class="fa fa-bullhorn" style="font-size:70px;margin-top:5px"></i>
								</div>
								<p class="title-widget">Laporan Warga</p>
								<h3 class="jumlah-widget"><?= $lapor ?></h3>
							</div>
							<div class="outer">
								<a href="<?= site_url('lapor/clear') ?>" class="small-box-footer detail-widget"><i class="ti-arrow-right"></i></a>
							</div>
						</div>
					</div>

					<div class="col-md-3 col-xs-6">
						<div class="small-box">
							<div class="inner" style="background: rgb(5,222,252);background: linear-gradient(0deg, rgba(5,222,252,1) 0%, rgba(5,147,252,1) 100%);">
								<div class="icon">
									<i class="ion-ios-paper"></i>
								</div>
								<p class="title-widget">Layanan Surat</p>
								<h3 class="jumlah-widget"><?= $jumlah_surat ?></h3>
							</div>
							<div class="outer">
								<a href="<?= site_url('keluar/clear') ?>" class="small-box-footer detail-widget"><i class="ti-arrow-right"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-xs-12">
				<div class="recent-mandiri">
					<div class="header-recent">Terakhir Login Mandiri</div>
					<?php foreach ($last_login as $key => $data) { ?>
						<div class="data-mandiri">
							<div class="foto">
								<?php if ($data['foto']) : ?>
									<img class="profile-user-img img-responsive img-circle" src="<?= AmbilFoto($data['foto']) ?>" alt="Foto">
								<?php else : ?>
									<img class="profile-user-img img-responsive img-circle" src="<?= base_url() ?>assets/files/user_pict/kuser.png" alt="Foto">
								<?php endif; ?>
							</div>
							<div class="last-mandiri-info">
								<div class="nama"><?= $data['nama'] ?></div>
								<div class="uppercase">
									<a href="<?php echo site_url('penduduk/detail/1/0/' . $data['id']); ?>">
										<?= $data['nik'] ?>
									</a>
								</div>
								<div class="dusun"><?= $data['dusun'] ?></div>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>

		<div class="recent-blok">
			<div class="row">
				<div class='col-md-9'>
					<div class='round-box'>
						<?php $this->load->view('home/about.php'); ?>
					</div>
				</div>
				<div class="col-md-3 col-xs-12">
					<div class="recent-operator">
						<div class="header-recent">Admin Terakhir Login</div>
						<?php foreach ($last_login_operator as $key => $data) { ?>
							<div class="data-operator">
								<div class="foto">
									<?php if ($data['foto']) : ?>
										<img class="profile-user-img img-responsive img-circle" src="<?= AmbilFoto($data['foto']) ?>" alt="Foto">
									<?php else : ?>
										<img class="profile-user-img img-responsive img-circle" src="<?= base_url() ?>assets/files/user_pict/kuser.png" alt="Foto">
									<?php endif; ?>
								</div>
								<div class="last-operator-info">
									<div class="nama"><?= $data['nama'] ?></div>
									<div class="uppercase"><?= $data['grup'] ?></div>
									<div class="dusun"><?= tgl_indo2($data['last_login']) ?></div>
								</div>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>