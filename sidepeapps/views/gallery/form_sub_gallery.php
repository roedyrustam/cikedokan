<div class="content-wrapper">
	<section class="content-header">
		<div class="title-header">Pengaturan Gambar Album</div>
		<ol class="breadcrumb">
			<li><a href="<?= site_url('hom_sid')?>"><i class="fa fa-home"></i> Home</a></li>
			<li><a href="<?= site_url('gallery')?>"><i class="fa fa-dashboard"></i> Daftar Album</a></li>
			<li><a href='<?= site_url("gallery/sub_gallery/$album")?>'><i class="fa fa-dashboard"></i> Daftar Gambar Album</a></li>
			<li class="active">Pengaturan Gambar Album</li>
		</ol>
	</section>
	<section class="content" id="maincontent">
		<form id="validasi" action="<?= $form_action?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
			<div class="row">
				<div class="col-md-12">
					<div class="box box-info">
            			<div class="box-header with-border">
							<a href="<?= site_url("gallery/sub_gallery/$album")?>" class="btn btn-radius btn-uppercase btn-info btn-sm btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"  title="Tambah Artikel">Kembali ke Daftar Gambar Album</a>
						</div>
						<div class="box-body">
							<div class="form-group">
								<label class="control-label col-sm-4" for="nama">Nama Gambar</label>
								<div class="col-sm-6">
									<input name="nama" class="form-control input-sm" type="text" value="<?=$gallery['nama']?>"></input>
								</div>
							</div>
							<?php if ($gallery['gambar']): ?>
								<div class="form-group">
									<label class="control-label col-sm-4" for="nama"></label>
									<div class="col-sm-6">
										<input type="hidden" name="old_gambar" value="<?=  $gallery['gambar']?>">
									  <img class="attachment-img img-responsive" src="<?= AmbilGaleri($gallery['gambar'], 'sedang') ?>" alt="Gambar Album">
									</div>
								</div>
							<?php endif; ?>
							<div class="form-group">
									<label class="control-label col-sm-4" for="upload">Unggah Gambar</label>
									<div class="col-sm-6">
										<div class="input-group input-group-sm">
											<input type="text" class="form-control required" id="file_path">
											<input id="file" type="file" class="hidden" name="gambar">
											<span class="input-group-btn">
												<button type="button" class="btn btn-info btn-flat" id="file_browser" style="border-top-left-radius:0;border-bottom-left-radius:0"><i class="fa fa-search"></i> Browse</button>
											</span>
										</div>
										<?php $upload_mb = max_upload();?>
										<p><label class="control-label">Batas maksimal pengunggahan berkas <strong><?=$upload_mb?> MB.</strong></label></p>
									</div>
								</div>
						</div>
						<div class='box-footer'>
							<div class="row">
								<div class='col-xs-12'>
									<button type='reset' class='btn btn-radius btn-uppercase btn-danger btn-sm'>Batal</button>
									<button type='submit' class='btn btn-radius btn-uppercase btn-info btn-sm pull-right confirm'>Simpan</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
	</section>
</div>
