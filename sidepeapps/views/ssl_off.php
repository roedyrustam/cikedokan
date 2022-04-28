<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>
			<?=$this->setting->login_title
				. ' ' . ucwords($this->setting->sebutan_desa)
				. (($desa['nama_desa']) ? ' ' . $desa['nama_desa']: '')
				. get_dynamic_title_page_from_path();
			?>
		</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="shortcut icon" href="<?php echo LogoDesa($desa['logo']);?>" alt="<?php echo $desa['nama_desa']?>"/>
		<link rel="stylesheet" href="<?= base_url()?>assets/css/login-style.css" media="screen" type="text/css" />
		<link rel="stylesheet" href="<?= base_url()?>assets/css/login-form-elements.css" media="screen" type="text/css" />
		<link rel="stylesheet" href="<?= base_url()?>assets/bootstrap/css/bootstrap.bar.css" media="screen" type="text/css" />
		<?php if (is_file("desa/css/siteman.css")): ?>
			<link type='text/css' href="<?= base_url()?>desa/css/siteman.css" rel='Stylesheet' />
		<?php endif; ?>
		<?php if (is_file(LOKASI_LOGO_DESA ."favicon.ico")): ?>
			<link rel="shortcut icon" href="<?=LogoDesa($desa['logo']);?>" />
		<?php else: ?>
			<link rel="shortcut icon" href="<?=LogoDesa($desa['logo']);?>" />
		<?php endif; ?>
	</head>
	<body class="login">
		<div class="top-content">
			<div class="inner-bg">
				<div class="container">
					<div class="row">
						<div class="col-sm-6 col-sm-offset-3 form-box">
							<div class="head-title"><a href="<?=site_url(); ?>"><?=ucwords($this->setting->sebutan_desa)?> <?=$desa['nama_desa']?></a></div>
							<div class="form-top">
								<div class="logo-sec">
								<a href="https://www.portaldesadigital.id" target="_blank"><img src="<?= base_url()?>assets/images/pdd_logo.png" alt="<?=$desa['nama_desa']?>" class="img-responsive" /></a>
								</div>
								<p>
								    Masuk untuk mematikan ssl/https://
								</p>
							</div>
							<div class="form-bottom">
								<form class="login-form" action="<?=site_url('ssl/auth')?>" method="post" >
									<?php if ($_SESSION['siteman_wait']==1): ?>
										<div class="error login-footer-top">
										<p style="color:red; text-transform:uppercase">Gagal 3 kali, silakan coba kembali dalam <?= waktu_ind((time()- $_SESSION['siteman_timeout'])*(-1));?> lagi</p>
										</div>
									<?php else: ?>
										
										<div class="form-group">
											<input name="username" type="text" placeholder="Username" <?php if ($_SESSION['siteman_wait']==1): ?> disabled="disabled"<?php endif ?> value="" required class="form-username form-control input-error">
										</div>
										<div class="form-group">
											<input name="password" type="password" placeholder="Password" <?php if ($_SESSION['siteman_wait']==1): ?>disabled="disabled"<?php endif ?> value="" required class="form-username form-control input-error">
										</div>
										<button type="submit" class="btn btn-success">LOGIN</button>
										<?php if ($_SESSION['siteman']==-1): ?>
											<div class="error">
												<p style="color:red; text-transform:uppercase">Login Gagal.<br />Username atau Password yang Anda masukkan salah!<br />
												<?php if ($_SESSION['siteman_try']): ?>
													Kesempatan mencoba <?= ($_SESSION['siteman_try']-1); ?> kali lagi.</p>
												<?php endif; ?>
											</div>
										<?php elseif ($_SESSION['siteman']==-2): ?>
											<div class="error">
												Redaksi belum boleh login, SID belum memiliki sambungan internet!
											</div>
										<?php endif; ?>
									<?php endif; ?>
								</form>								
							</div>
							<div class="footer-login">&copy; <?php echo date("Y");?> <a href="https://www.portaldesadigital.id" target="_blank">Portal Desa Digital</a></div>
							<div class="bottom-footer">Portal Desa Digital dikembangkan dari Sistem Informasi Desa Open Source bernama <a href="https://github.com/OpenSID/OpenSID/" target="_blank">OpenSID</a></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>

