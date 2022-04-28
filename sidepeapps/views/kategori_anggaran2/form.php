<div class="content-wrapper">
	<section class="content-header">
		<h1>Pengaturan Sumber Anggaran</h1>
		<ol class="breadcrumb">
			<li><a href="<?= site_url('hom_sid')?>"><i class="fa fa-home"></i> Home</a></li>
			<li><a href="<?= site_url('kategori_anggaran')?>"> Daftar Sumber Dana</a></li>
			<li class="active">Pengaturan Sumber Anggaran</li>
		</ol>
	</section>
	<section class="content" id="maincontent">
		<form id="validasi" action="<?= $form_action?>" method="POST" class="form-horizontal">
			<div class="row">
				<div class="col-md-12">
					<div class="box box-info">
						<div class="box-header with-border">
							<a href="<?= site_url("kategori_anggaran")?>" class="btn btn-social btn-flat btn-info btn-sm btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"  title="Tambah Artikel">
								<i class="fa fa-arrow-circle-left "></i>Kembali ke Daftar Sumber Anggaran
							</a>
						</div>
						<div class="box-body">
							<div class="form-group">
								<label class="control-label col-sm-3" for="nama">Nama Sumber Dana</label>
								<div class="col-sm-9">
									<input name="kategori" class="form-control input-sm" type="text" value="<?=$kategori['kategori']?>">
								</div>
							</div>
						</div>
						<div class='box-footer'>
							<button type='reset' class='btn btn-social btn-flat btn-danger btn-sm' ><i class='fa fa-times'></i> Batal</button>
							<button type='submit' class='btn btn-social btn-flat btn-info btn-sm pull-right confirm'><i class='fa fa-check'></i> Simpan</button>
						</div>
					</div>
				</div>
			</div>
		</form>
	</section>
</div>
