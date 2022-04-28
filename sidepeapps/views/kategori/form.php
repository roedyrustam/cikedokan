<div class="content-wrapper">
	<section class="content-header">
		<div class="title-header">Pengaturan Menu Dinamis / Kategori</div>
		<ol class="breadcrumb">
			<li><a href="<?= site_url('hom_sid')?>"><i class="fa fa-home"></i> Home</a></li>
			<li><a href="<?= site_url('kategori')?>"> Daftar Kategori</a></li>
			<li class="active">Pengaturan Menu</li>
		</ol>
	</section>
	<section class="content" id="maincontent">
		<form id="validasi" action="<?= $form_action?>" method="POST" class="form-horizontal">
			<div class="row">
				<div class="col-md-3">
					<?php $this->load->view('kategori/menu_kiri.php')?>
				</div>
				<div class="col-md-9">
					<div class="box box-info">
						<div class="box-header with-border">
							<a href="<?= site_url("kategori")?>" class="btn btn-radius btn-uppercase btn-info btn-sm btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"  title="Tambah Artikel">Kembali ke Daftar Kategori</a>
						</div>
						<div class="box-body">
							<div class="form-group">
								<label class="control-label col-sm-4" for="nama">Nama Kategori</label>
								<div class="col-sm-6">
									<input name="kategori" class="form-control input-sm" type="text" value="<?=$kategori['kategori']?>">
								</div>
							</div>
						</div>
						<div class='box-footer'>
							<div class="row">
								<div class='col-xs-12'>
									<button type='reset' class='btn btn-radius btn-uppercase btn-danger btn-sm' >Batal</button>
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
