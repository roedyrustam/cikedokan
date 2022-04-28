<script type="text/javascript">
	$(function()
	{
		var keyword = <?= $keyword?> ;
		$( "#cari" ).autocomplete(
		{
			source: keyword,
			maxShowItems: 10,
		});
	});
</script>
<div class="content-wrapper">
	<section class="content-header">
		<h1>Balas Kontak</h1>
		<ol class="breadcrumb">
			<li><a href="<?= site_url('hom_sid')?>"><i class="fa fa-home"></i> Home</a></li>
			<li class="active">Balas Kontak</li>
		</ol>
	</section>

	<div class="box-header with-border">
		<a href="<?= base_url(); ?>kontak/kelola" title="Kembali ke Daftar Pesan" class="btn btn-social btn-flat btn-primary btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class='fa fa-arrow-circle-left'></i> Kembali ke daftar pesan</a>
	</div>

	<section class="content" id="maincontent">
			
			<div class="row">
				<div class="col-md-3">
					<div class="box box-info">
						<div class="content">
							<div class="form-group">
								<div class="label-meta-pesan">Pengirim</div>
								<div class="meta-pesan"><?=$chat['nama'] ?></div>
							</div>
							
							<div class="form-group">
								<div class="label-meta-pesan">Email</div>
								<div class="meta-pesan"><?=$chat['email'] ?></div>
							</div>
									
							<div class="form-group">
								<div class="label-meta-pesan">Telepon</div>
								<div class="meta-pesan"><?=$chat['no_hp'] ?></div>
							</div>
							
							<div class="form-group">
								<div class="label-meta-pesan">Perihal</div>
								<div class="meta-pesan"><?=$chat['perihal'] ?></div>
							</div>
							<div class="form-group">
								<div class="label-meta-pesan">Waktu Pesan</div>
								<div class="meta-pesan"><?=tgl_indo2($chat['waktu']) ?></div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-9">
					<div class="box box-info">						
						<div class="content">
							<div class="judul-pesan">
								<?=$chat['judul'] ?>
							</div>
							<div class="body-isi-pesan">
								<?=$chat['isi'] ?>
							</div>
							<div class="balas-pesan">
								<?php foreach ($chat['balasan'] as $balasan){ ?>
								<?php if(empty($balasan['admin'])): ?>
									<?=$balasan['isi'] ?><br/>
								<?php else: ?>
									<?=$balasan['isi'] ?>[*]<br/>
								<?php endif; ?>
							<?php } ?>
							<form method="post" id="replayForm" action="<?=site_url("kontak/replay/$p/$o") ?>/<?=$chat['id'] ?>">
								<div class="form-group">
									<textarea type="text" name="isi" class="form-control input-sm" rows="5" placeholder="Balas..." ></textarea>
								</div>
								<div class="form-group text-right">
									<button class="btn btn-sm btn-success" type="sumit">Balas</button>
								</div>
							</form>
							</div>
						</div>

					</div>

					
				</div>
			</div>
		
	</section>
</div>
