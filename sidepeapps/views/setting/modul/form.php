<div class="content-wrapper">
	<section class="content-header">
		<?php if ($modul['parent']!='0'): ?>
		<div class="title-header">Pengaturan Sub Modul</div>
		<?php else: ?>
			<div class="title-header">Pengaturan Modul</div>
		<?php endif; ?>
		<ol class="breadcrumb">
			<li><a href="<?= site_url('hom_sid')?>"><i class="fa fa-home"></i> Home</a></li>
			<li><a href="<?= site_url('modul')?>"> Daftar Modul</a></li>
			<?php if ($modul['parent']!='0'): ?>
			<li><a href="<?= site_url()?>modul/sub_modul/<?=($modul['parent'])?>"> Daftar Sub Modul</a></li>
			<?php endif ?>
			<li class="active">Pengaturan Modul</li>
		</ol>
	</section>
	<section class="content" id="maincontent">
		<div class="row" >
			<form id="validasi" action="<?=$form_action?>" method="POST" enctype="multipart/form-data"  class="form-horizontal">
				<div class="col-md-12">
					<div class="box box-primary">
						<div class="box-header with-border">
							<a href="<?= site_url()?>modul" class="btn btn-radius btn-uppercase btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block">Kembali Ke Daftar Modul</a>
							<?php if ($modul['parent']!='0'): ?>
								<a href="<?= site_url()?>modul/sub_modul/<?=($modul['parent'])?>" class="btn btn-radius btn-uppercase btn-primary btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block">Kembali Ke Daftar Sub Modul</a>
							<?php endif ?>
						</div>
						<div class="box-body">
							<div class="form-group">
								<label class="col-sm-4 control-label" for="pamong_nama"><?php if ($modul['parent']!='0'): ?>Nama Sub Modul<?php else: ?>Nama Modul<?php endif ?></label>
								<div class="col-sm-6">
									<input type="hidden" name="modul" value="1">
									<input type="hidden" name="parent" value="<?=($modul['parent'])?>">
									<input id="modul" name="modul" class="form-control input-sm required" type="text" placeholder="Nama Modul/Sub Modul" value="<?=($modul['modul'])?>"></input>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label" for="ikon">Ikon</label>
								<div class="col-sm-6">
									<input id="ikon" name="ikon" class="form-control input-sm" type="text" placeholder="Ikon" value="<?=($modul['ikon'])?>" ></input>
								</div>
							</div>
							<div class="form-group">
								<label class="col-xs-12 col-sm-4 col-lg-4 control-label" for="status">Status</label>
								<div class="btn-group col-xs-12 col-sm-7" data-toggle="buttons">
									<label id="sx3" class="btn btn-info btn-radius col-xs-6 col-sm-4 col-lg-2 form-check-label <?php if ($modul['aktif'] =='1' OR $modul['aktif'] == NULL): ?>active<?php endif ?>">
										<input id="g1" type="radio" name="aktif" class="form-check-input" type="radio" value="1" <?php if ($modul['aktif'] =='1' OR $modul['aktif'] == NULL): ?>checked <?php endif ?> autocomplete="off"> Aktif
									</label>
									<label id="sx4" class="btn btn-info btn-radius col-xs-6 col-sm-4 col-lg-2 form-check-label <?php if ($modul['aktif'] == '2' ): ?>active<?php endif ?>">
										<input id="g2" type="radio" name="aktif" class="form-check-input" type="radio" value="2" <?php if ($modul['aktif'] == '2' ): ?>checked<?php endif ?> autocomplete="off"> Tidak Aktif
									</label>
								</div>
							</div>

						</div>
						<div class='box-footer'>
							<div class="row">
								<div class='col-xs-12'>
									<button type='reset' class='btn btn-radius btn-uppercase btn-danger btn-sm' onclick="reset_form($(this).val());">Batal</button>
									<button type='submit' class='btn btn-radius btn-uppercase btn-info btn-sm pull-right confirm'>Simpan</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</section>
</div>
<script>
	function reset_form()
	{
		<?php if ($modul['aktif'] =='1' OR $modul['aktif'] == NULL): ?>
			$("#sx3").addClass('active');
			$("#sx4").removeClass("active");
		<?php endif; ?>
		<?php if ($modul['aktif'] =='2'): ?>
			$("#sx4").addClass('active');
			$("#sx3").removeClass("active");
		<?php endif; ?>
	};
</script>
