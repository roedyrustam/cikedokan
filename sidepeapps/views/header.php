<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="id" class="notranslate" translate="no">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="google" content="notranslate">
	<title>
		<?=$this->setting->admin_title
		. ' ' . ucwords($this->setting->sebutan_desa)
		. (($desa['nama_desa']) ? ' ' . unpenetration($desa['nama_desa']):  '')
		. get_dynamic_title_page_from_path();
		?>
	</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<?php if (is_file(LOKASI_LOGO_DESA . "pdd_icon.png")): ?>
		<link rel="shortcut icon" href="<?php echo base_url().'desa/logo/'.$desa['logo']; ?>" />
		<?php else: ?>
			<link rel="shortcut icon" href="<?php echo base_url().'desa/logo/'.$desa['logo']; ?>" />
		<?php endif; ?>
		<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?= base_url()?>rss.xml" />

		<!-- Bootstrap 3.3.7 -->
		<link rel="stylesheet" href="<?= base_url()?>assets/bootstrap/css/bootstrap.min.css">
		<!-- Jquery UI -->
		<link rel="stylesheet" href="<?= base_url()?>assets/bootstrap/css/jquery-ui.min.css">
		<!-- Font Awesome -->
		<link rel="stylesheet" href="<?= base_url()?>assets/bootstrap/css/font-awesome.min.css">
		<!-- Ionicons -->
		<link rel="stylesheet" href="<?= base_url()?>assets/bootstrap/css/ionicons.min.css">
		<!-- DataTables -->
		<link rel="stylesheet" href="<?= base_url()?>assets/bootstrap/css/dataTables.bootstrap.min.css">
		<!-- bootstrap wysihtml5 - text editor -->
		<link rel="stylesheet" href="<?= base_url()?>assets/bootstrap/css/bootstrap3-wysihtml5.min.css">
		<!-- Select2 -->
		<link rel="stylesheet" href="<?= base_url()?>assets/bootstrap/css/select2.min.css">
		<!-- Bootstrap Color Picker -->
		<link rel="stylesheet" href="<?= base_url()?>assets/bootstrap/css/bootstrap-colorpicker.min.css">
		<!-- Bootstrap Date time Picker -->
		<link rel="stylesheet" href="<?= base_url()?>assets/bootstrap/css/bootstrap-datetimepicker.min.css">
		<!-- bootstrap datepicker -->
		<link rel="stylesheet" href="<?= base_url()?>assets/bootstrap/css/bootstrap-datepicker.min.css">
		<!-- Theme style -->
		<link rel="stylesheet" href="<?= base_url()?>assets/css/AdminLTE.min.css">
		<!-- AdminLTE Skins. -->
		<link rel="stylesheet" href="<?= base_url()?>assets/css/skins/_all-skins.min.css">
		<!-- Style Admin Custom Css -->
		<link rel="stylesheet" href="<?= base_url()?>assets/css/custom.css">
		<!-- Style Admin Modification Css -->
		<link rel="stylesheet" href="<?= base_url()?>assets/css/admin-style.css">
		<!-- Quicksand Google Font Css -->
		<link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
		<!-- OpenStreetMap Css -->
		<link rel="stylesheet" href="<?= base_url()?>assets/css/leaflet.css" />
		<link rel="stylesheet" href="<?= base_url()?>assets/css/leaflet.pm.css" />
		<!-- Fonts Icons -->
		<link rel="stylesheet" href="<?= base_url()?>assets/css/themify-icons.css">
		<!-- Quicksand Google Fonts -->
        <link rel="stylesheet" href="<?php echo base_url()?>/assets/css/font.css">
		<!-- OpenStreetMap Js-->
		<script src="<?= base_url()?>assets/js/leaflet.js"></script>
		<script src="<?= base_url()?>assets/js/turf.min.js"></script>
		<script src="<?= base_url()?>assets/js/leaflet.pm.min.js"></script>
		<!-- Diperlukan untuk script jquery khusus halaman -->
		<script src="<?= base_url() ?>assets/bootstrap/js/jquery.min.js"></script>
	</head>
	<body class="skin-purple sidebar-mini fixed <?php if ($minsidebar==1): ?>sidebar-collapse<?php endif ?>">
		<div class="wrapper">
			<header class="main-header">
				<a href="<?=site_url()?>"  target="_blank" class="logo">
					<span class="logo-mini logo-text"><b>SIDePe</b></span>
					<span class="logo-lg logo-text"><b>SIDePe</b></span>
				</a>
				<nav class="navbar navbar-static-top">
					<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
						<span class="sr-only">Toggle navigation</span>
					</a>
					<div class="navbar-custom-menu">
						<ul class="nav navbar-nav">
							<?php if (in_array($this->session->grup, array('1', '2', '3'))): ?>
								<li>
									<a href="<?=site_url()?>web/warga">
										<i class="fa fa-newspaper-o" style="font-size: 16px;" title="Artikel Warga"></i><span class="badge" id="b_artikel"></span>
									</a>
								</li>
								<li>
									<a href="<?=site_url()?>komentar">
										<i class="fa fa-commenting" style="font-size: 16px;" title="Komentar baru"></i><span class="badge" id="b_komentar"></span>
									</a>
								</li>
								<li>
									<a href="<?=site_url()?>lapor">
										<i class="fa fa-bullhorn" style="font-size: 16px;" title="Laporan Warga"></i><span class="badge" id="b_lapor"></span>
									</a>
								</li>
							<?php endif; ?>
							<li class="dropdown user user-menu">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<?php if ($foto): ?>
										<img src="<?= AmbilFoto($foto)?>" class="user-image" alt="User Image"/>
										<?php else :?>
											<img src="<?= base_url()?>assets/files/user_pict/kuser.png" class="user-image" alt="User Image"/>
										<?php endif; ?>
										<span class="hidden-xs nama-user"><?=$nama?> </span>
									</a>
									<ul class="dropdown-menu">
										<li class="user-header">
											<?php if ($foto): ?>
												<img src="<?=AmbilFoto($foto)?>" class="img-circle" alt="User Image"/>
												<?php else :?>
													<img src="<?= base_url()?>assets/files/user_pict/kuser.png" class="img-circle" alt="User Image"/>
												<?php endif; ?>
												<p>Anda Login Sebagai</p>
												<p><strong><?=$nama?></strong></p>
											</li>
											<li class="user-footer">
												<div class="pull-left">
													<a href="<?=site_url()?>user_setting/" data-remote="false" data-toggle="modal" data-tittle="Pengaturan Pengguna" data-target="#modalBox">
														<button  data-toggle="modal"  class="btn bg-green btn-radius btn-sm">Profil</button>
													</a>
												</div>
												<div class="pull-right">
													<a href="<?=site_url()?>siteman" class="btn bg-red btn-radius btn-sm">Keluar</a>
												</div>
											</li>
										</ul>
									</li>
								</ul>
							</div>
						</nav>
					</header>
					<input id="success-code" type="hidden" value="<?= $_SESSION['success']?>">
					<!-- Untuk menampilkan modal bootstrap info pengguna login  -->
					<div  class="modal fade" id="modalBox" role="dialog" data-backdrop="static" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class='modal-dialog'>
							<div class='modal-content'>
								<div class='modal-header'>
									<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
									<h4 class='modal-title' id='myModalLabel'>Pengaturan Pengguna</h4>
								</div>
								<div class="fetched-data"></div>
							</div>
						</div>
					</div>
					<!-- Untuk menampilkan modal / pemberitahuan perubahan password default  -->
					<div  class="modal fade" id="massageBox" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class='modal-dialog'>
							<div class='modal-content'>
								<div class='modal-header btn-info'>
									<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
									<h4 class='modal-title' id='myModalLabel'><i class='fa fa-exclamation-triangle text-red'></i> &nbsp;<?= $_SESSION['admin_warning'][0]; ?></h4>
								</div>
								<div class='modal-body'>
									<?= $_SESSION['admin_warning'][1]; ?>
								</div>
								<div class='modal-footer'>
									<button type="button" class="btn btn-social btn-radius btn-warning btn-sm" data-dismiss="modal"><i class='fa fa-arrow-circle-o-left'></i> Lain Kali</button>
									<a href="<?= site_url()?>user_setting/" data-remote="false" data-tittle="Pengaturan Pengguna" data-toggle="modal" data-target="#modalBox" id="ok">
										<button type="button" class="btn btn-social btn-radius btn-success btn-sm"><i class='fa fa-edit'></i> Ubah</button>
									</a>
								</div>
							</div>
						</div>
					</div>
