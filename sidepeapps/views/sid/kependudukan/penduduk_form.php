<?php $aksi = $this->admin ? 'penduduk/form/' : 'layanan_mandiri/ubah_biodata/'; ?>
<?php $link_back = $this->admin ? 'penduduk/clear' : 'layanan_mandiri/ubah_biodata/clear'; ?>

<div class="content-wrapper">
	<section class="content-header">
		<div class="title-header">Biodata Penduduk</div>
		<?php if ($this->admin) { ?>
			<ol class="breadcrumb">
				<li><a href="<?= site_url('hom_sid') ?>"><i class="fa fa-home"></i> Home</a></li>
				<li><a href="<?= site_url('penduduk/clear') ?>"> Daftar Penduduk</a></li>
				<li class="active">Biodata Penduduk</li>
			</ol>
		<?php } ?>
	</section>

	<section class="content" id="maincontent">

		<?php if ($this->session->flashdata('flash_message')) { ?>
			<?php echo $this->session->flashdata('flash_message'); ?>
		<?php } ?>

		<form id="mainform" name="mainform" action="<?= $form_action ?>" method="POST" enctype="multipart/form-data" onreset="reset_hamil();">
			<div class="row">
				<?php $edit_lokasi = ((empty($penduduk) or $_SESSION['validation_error']) and empty($id)); ?>
				<?php if ($edit_lokasi) : ?>
					<div class="col-md-12">
						<div class='box box-primary'>
							<div class="box-header with-border">
								<a href="<?= site_url($link_back) ?>" class="btn btn-uppercase btn-radius btn-info btn-sm btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Kembali Ke Daftar Penduduk"><?php echo $this->admin ? 'Kembali Ke Daftar Penduduk' : 'Kembali ke profil' ?>
								</a>
							</div>
							<div class='box-body'>
								<div class="row">
									<div class='col-sm-12'>
										<div class="row">
											<div class='form-group col-sm-3'>
												<select name="dusun" class="form-control input-sm <?php if ($dusun) : ?>required<?php endif; ?>" onchange="formAction('mainform','<?= site_url($aksi) ?>')">
													<option value="">Pilih <?= ucwords($this->setting->sebutan_dusun) ?></option>
													<?php foreach ($dusun as $data) : ?>
														<option value="<?= $data['dusun'] ?>" <?php if ($dus_sel == $data['dusun']) : ?>selected<?php endif; ?>><?= unpenetration(ununderscore($data['dusun'])) ?></option>
													<?php endforeach; ?>
												</select>
											</div>
											<div class='form-group col-sm-2'>
												<select class="form-control input-sm <?php if ($rw) : ?>required<?php endif; ?>" name="rw" onchange="formAction('mainform','<?= site_url($aksi) ?>')">
													<option value="">Pilih RW</option>
													<?php foreach ($rw as $data) : ?>
														<option value="<?= $data['rw'] ?>" <?php if ($rw_sel == $data['rw']) : ?>selected<?php endif; ?>><?= $data['rw'] ?></option>
													<?php endforeach; ?>
												</select>
											</div>
											<div class='form-group col-sm-2'>
												<select class="form-control input-sm <?php if ($rt) : ?>required<?php endif; ?>" name="rt" onchange="formAction('mainform','<?= site_url($aksi) ?>')">
													<option value="">Pilih RT</option>
													<?php foreach ($rt as $data) : ?>
														<option value="<?= $data['id'] ?>" <?php if ($rt_sel == $data['id']) : ?>selected<?php endif; ?>><?= $data['rt'] ?></option>
													<?php endforeach; ?>
												</select>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php endif; ?>
				<?php if (!empty($rt_sel) or (!empty($penduduk))) : ?>
					<?php include("sidepeapps/views/sid/kependudukan/penduduk_form_isian.php"); ?>
				<?php endif; ?>
			</div>
		</form>
	</section>
</div>