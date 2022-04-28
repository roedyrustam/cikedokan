
<div class="content-wrapper">
	<section class="content-header">
		<div class="title-header">Pengaturan Widget</div>
		<ol class="breadcrumb">
			<li><a href="<?= site_url('hom_sid')?>"><i class="fa fa-home"></i> Home</a></li>
			<li><a href="<?= site_url('web_widget')?>"> Daftar Widget</a></li>
			<li class="active">Pengaturan Widget</li>
		</ol>
	</section>
	<section class="content" id="maincontent">
		<form id="validasi" action="<?= $form_action?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
			<div class="row">
				<div class="col-md-12">
					<div class="box box-info">
						<div class="box-header with-border">
             			<a href="<?= site_url("web_widget")?>" class="btn btn-radius btn-uppercase btn-info btn-sm btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Tambah Artikel">Kembali ke Daftar Widget</a>
						</div>
						<div class="box-body">
							<div class="form-group">
								<label class="col-sm-4 control-label" for="judul">Judul Widget</label>
								<div class="col-sm-6">
									<input id="judul" name="judul" class="form-control input-sm required" type="text" placeholder="Judul Widget" value="<?= $widget['judul']?>"></input>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label" for="jenis">Jenis Widget</label>
								<div class="col-sm-6">
									<select id="jenis_widget" name="jenis_widget" class="form-control input-sm">
										<option value="">-- Pilih Jenis Widget --</option>
										<option value="2" <?php if ($widget['jenis_widget'] == 2): ?>selected<?php endif; ?>>Statis</option>
										<option value="3" <?php if ($widget['jenis_widget'] == 3): ?>selected<?php endif; ?>>Dinamis</option>
									 </select>
								</div>
							</div>
							<?php if ($widget['jenis_widget'] AND $widget['jenis_widget'] != 1 AND $widget['jenis_widget'] !=2) $dinamis = true; ?>
								<div id="dinamis" class="form-group" <?php if (!$dinamis): ?>style="display:none;"<?php endif; ?>>
								<label class="col-sm-4 control-label" for="alamat_kantor">Kode Widget</label>
								<div class="col-sm-6">
									<textarea id="isi-dinamis" name="isi-dinamis" class="form-control input-sm"><?=$widget['isi']?></textarea>
								</div>
							</div>
							<?php if ($widget['jenis_widget'] AND $widget['jenis_widget'] ==2) $statis = true; ?>
								<div id="statis" class="form-group" <?php if (!$statis): ?>style="display:none;"<?php endif; ?>>
								<label class="col-sm-4 control-label" for="isi-statis">Nama File Widget (.php)</label>
								<div class="col-sm-6">
									<input id="isi-statis" name="isi-statis" class="form-control input-sm" type="text" placeholder="Judul Widget" value="<?= $widget['isi']?>"></input>
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
<script>
  var elem = document.getElementById("jenis_widget");
	elem.onchange = function()
	{
    var dinamis = document.getElementById("dinamis");
    var statis = document.getElementById("statis");
    dinamis.style.display = (this.value == "3") ? "block":"none";
    statis.style.display = (this.value == "2") ? "block":"none";
  };
</script>