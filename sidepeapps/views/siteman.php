<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>
		<?= $this->setting->login_title
			. ' ' . ucwords($this->setting->sebutan_desa)
			. (($desa['nama_desa']) ? ' ' . $desa['nama_desa'] : '')
			. get_dynamic_title_page_from_path();
		?>
	</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">

	<link rel="shortcut icon" href="<?php echo LogoDesa($desa['logo']); ?>" alt="<?php echo $desa['nama_desa'] ?>" />

	<link rel="stylesheet" href="<?= base_url() ?>assets/css/login.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/materialdesignicons.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">

	<!-- <link rel="stylesheet" href="<?= base_url() ?>assets/css/login-style.css" media="screen" type="text/css" />
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/login-form-elements.css" media="screen" type="text/css" />
	<link rel="stylesheet" href="<?= base_url() ?>assets/bootstrap/css/bootstrap.bar.css" media="screen" type="text/css" /> -->
	<?php if (is_file("desa/css/siteman.css")) : ?>
		<link type='text/css' href="<?= base_url() ?>desa/css/siteman.css" rel='Stylesheet' />
	<?php endif; ?>
	<?php if (is_file(LOKASI_LOGO_DESA . "pdd_icon.png")) : ?>
		<link rel="shortcut icon" href="<?= LogoDesa($desa['logo']); ?>" />
	<?php else : ?>
		<link rel="shortcut icon" href="<?= LogoDesa($desa['logo']); ?>" />
	<?php endif; ?>
</head>

<body>
	<main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
		<div class="container">
			<div class="card login-card">
				<div class="row no-gutters">
					<div class="col-md-8">
						<img src="<?= base_url() ?>desa/css/images/background.jpg" alt="login" class="login-card-img">
					</div>
					<div class="col-md-4">
						<div class="card-body">
							<div class="brand-wrapper">
								<img src="<?= base_url() ?>assets/images/logo_sidepe.png" alt="<?= $desa['nama_desa'] ?>" class="logo">
							</div>
							<p class="login-card-description"><a href="<?= site_url(); ?>"><?= ucwords($this->setting->sebutan_desa) ?> <?= $desa['nama_desa'] ?></a></p>
							<form class="login-form" action="<?= site_url('siteman/auth') ?>" method="post">
								<?php if ($_SESSION['siteman_wait'] == 1) : ?>
									<script type="text/javascript">
										function start_countdown() {
											var times = eval(<?= json_encode($_SESSION['siteman_timeout']) ?>) - eval(<?= json_encode(time()) ?>);
											var menit = Math.floor(times / 60);
											var detik = times % 60;
											timer = setInterval(function() {
												detik--;
												if (detik <= 0 && menit >= 1) {
													detik = 60;
													menit--;
												}
												if (menit <= 0 && detik <= 0) {
													clearInterval(timer);
													location.reload();
												}
												document.getElementById("countdown").innerHTML = "<b>Gagal 3 kali silakan coba kembali dalam " + menit + " MENIT " + detik + " DETIK </b>";
											}, 1000)
										}
									</script>
									<div class="error login-footer-top">
										<script>
											start_countdown();
										</script>
										<p id="countdown" style="color:red; text-transform:uppercase"></p>
									</div>
								<?php else : ?>
									<div class="form-group">
										<label for="username" class="sr-only">Email</label>
										<input type="text" name="username" id="username" autocomplete="off" placeholder="Username" <?php if ($_SESSION['siteman_wait'] == 1) : ?> disabled="disabled" <?php endif ?> value="" required class="form-username form-control input-error">
									</div>
									<div class="form-group mb-4">
										<label for="password" class="sr-only">Password</label>
										<input type="password" name="password" autocomplete="off" placeholder="*********" id="password" <?php if ($_SESSION['siteman_wait'] == 1) : ?>disabled="disabled" <?php endif ?> value="" required class="form-username form-control input-error">
									</div>
									<input name="login" id="login" class="btn btn-block login-btn mb-4" type="submit" value="Login">
									<?php if ($_SESSION['siteman'] == -1) : ?>
										<div class="error">
											<p style="color:red; text-transform:uppercase"><b>Login Gagal.<br />Username atau Password yang Anda masukkan salah!<br /></b>
												<?php if ($_SESSION['siteman_try']) : ?>
													Kesempatan mencoba <?= ($_SESSION['siteman_try'] - 1); ?> kali lagi.</p>
										<?php endif; ?>
										</div>
									<?php endif; ?>
								<?php endif; ?>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="credit">
				SIDePe versi <?= AmbilVersi() ?><br />
				&copy; 2021 - <?php echo date("Y"); ?> <a href="https://sidepe.com/" target="_blank" style="color: #fff;">SIDePe</a>
			</div>
		</div>
	</main>
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>

</html>