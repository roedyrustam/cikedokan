<?php $aksi = $this->admin ? 'surat' : 'layanan_mandiri/surat'; ?>

<div class="box-header with-border">
	<a href="<?=site_url($aksi)?>" class="btn btn-radius btn-uppercase btn-info btn-sm btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"  title="Kembali Ke Daftar Wilayah">
		<i class="fa fa-arrow-circle-left "></i>Kembali Ke Daftar Cetak Surat
	</a>

	<?php if($url === "surat_bio_penduduk"): ?>
		<a href="#" class="btn btn-radius btn-uppercase btn-primary btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Lihat Info Isian Surat"  data-toggle="modal" data-target="#infoBox" data-title="Lihat Info Isian Surat">
			<i class="fa fa-info-circle"></i> Info Isian Surat
		</a>
	<?php endif; ?>
</div>
