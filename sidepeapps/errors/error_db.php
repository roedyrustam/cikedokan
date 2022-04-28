<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Database Error</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/bootstrap/css/bootstrap.bar.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/AdminLTE.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/error-max.css" />
</head>
<body>
		<div class="code-error"> 500</div>
		<div class="title-error"><?= strip_tags($heading); ?></div>
		
		<div class="col-md-1">
		</div>
		
		<div class="col-md-5">
			<div class="info-warning">
				<p>
					<?= $message; ?>
					Harap laporkan masalah ini, agar kami dapat mencarikan solusinya.
					Untuk sementara Anda dapat kembali ke halaman <a href="<?= APP_URL ?>">awal</a>.
				</p>		
			</div>
		</div>
		<div class="col-md-1">
			<div class="bubble">&nbsp;</div>
		</div>
		<div class="col-md-4"><img class="team" src="<?php echo base_url()?>assets/css/images/team.png" />
		</div>
		<div class="col-md-1"></div>
</body>
</html>