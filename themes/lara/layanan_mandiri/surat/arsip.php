<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<div class="layanan cetak-surat">
	<div class="block-header-arsip">
		<div class="page-header">
			<div class="title">Arsip Surat</div>			
		</div>
		<div class="sub-text-title">Daftar surat yang telah dibuat</div>
	</div>

	<div class="list-surat">
			<div class="col-md-12">
			<?php foreach ($data_surat as $data) {
				if ($data['nama_surat']) {
					$berkas = $data['nama_surat'];
				}else {
					$berkas = $data["berkas"]."_".$data["nik"]."_".date("Y-m-d").".rtf";
				}
				$theFile = FCPATH.LOKASI_ARSIP.$berkas;
				$lampiran = FCPATH.LOKASI_ARSIP.$data['lampiran'];
			?>
				<div class="item">
					<div class="row">
						<?php if (is_file($theFile)){ ?>		
						<div class="col-md-2 col-xs-1">
							<div class="download-surat">
								<a href="<?= base_url(LOKASI_ARSIP.$berkas)?>" class="btn btn-primary btn-sm" title="Unduh Surat" target="_blank"><i class="fa fa-download"></i></a>												
							</div>								
						</div>
						<?php } ?>

						<?php if (is_file($lampiran)){ ?>
						<div class="col-md-2 col-xs-1">
							<div class="download-lampiran">
								<a href="<?= base_url(LOKASI_ARSIP.$data['lampiran'])?>" target="_blank" class="btn btn-secondary btn-sm" title="Unduh Lampiran"><i class="fa fa-paperclip"></i></a>		
							</div>
						</div>

						<?php } ?>
						<div class="col-md-8 col-xs-10">
							<div class="nama-surat">
								<?= $data['nama_surat']?>									
							</div>
						</div>						
					</div>
				</div>
			<?php } ?>
			</div>
	</div>
</div>