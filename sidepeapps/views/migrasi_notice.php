<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Migrasi Database</title>
	<style type="text/css">
	.notice {
		position: fixed;
		bottom: 0;
		left: 0;
		width: 100%;
		z-index: 9999;
		background: #212121;
		color: #fafafa;
		text-align: text-center;
		text-decoration: none;
	}
	.notice a {
		text-decoration: none!important;
	}
</style>
</head>

<body>
	
	<div class="notice">
		<div class="text-center alert alert-danger">
			<p><strong>Tabel <?=$tb?></strong> belum tersedia di database, silahkan migrasi database terlebih dahulu. <a class="btn btn-sm btn-flat btn-social btn-primary" href="<?=APP_URL.'database/migrasi_cri'?>"><i class="fa fa-database"></i> Migrasi Sekarang</a></p>
			<p>Setelah berada dihalaman migrasi, silahkan klik tombol migrasi database berwarna merah</p>
		</div>
	</div>

</body>
</html>
