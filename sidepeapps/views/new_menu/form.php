<div class="content-wrapper">
	<section class="content-header">
		<div class="title-header">Pengaturan Menu Statis</div>
		<ol class="breadcrumb">
			<li><a href="<?= site_url('hom_sid')?>"><i class="fa fa-home"></i> Home</a></li>
			<li class="active">Pengaturan Menu Statis</li>
		</ol>
	</section>
	<section class="content" id="maincontent">
		<form id="validasi" action="<?= $form_action?>" method="POST" class="form-horizontal">
			<div class="row">
				<div class="col-md-3">
					<?php $this->load->view('new_menu/jenis_menu.php')?>
				</div>

				<div class="col-md-9">
					<div class="box box-info">
						<div class="box-header with-border">
							<a href="<?=site_url("new_menu/index/".$tip)?>" class="btn btn-radius btn-uppercase btn-info btn-sm btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"  title="Tambah Artikel">
								<i class="fa fa-arrow-circle-left "></i>Kembali ke Daftar Menu
							</a>
						</div>

						<div class="box-body">
							<div class="form-group">
								<label class="control-label col-sm-3" for="nama">Nama Menu</label>
								<div class="col-sm-6">
									<input required="" name="nama" class="form-control input-sm" type="text" value="<?=$menu['nama']?>"></input>
								</div>
							</div>
							
							<?php if($tip === '1'){ ?>
								<div class="form-group">
									<label class="control-label col-sm-3" for="link">Halaman Statis</label>
									<div class="col-sm-6">
										<select class="form-control input-sm select2" name="link" required="" onchange="set_menu($(this).find(':selected').data('nama'))">
											<option option value="">-- Pilih Halaman Statis --</option>
											<?php foreach($statis as $data){ ?>
												<option data-nama="<?php echo $data['judul'] ?>" value="<?php echo site_url( url_title($data['judul'],'-',TRUE) ); ?>"><?php echo $data['judul'] ?></option>
											<?php } ?>
										</select>
									</div>
								</div>
							<?php } ?>

							<div class="form-group hidden">
								<label class="control-label col-sm-3" for="link_sebelumnya">Link</label>
								<div class="col-sm-6">
									<input class="form-control input-sm" name="link_sebelumnya" type="text" value="<?=$menu['link']?>"></input>
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-sm-3" for="link">Parent</label>
								<div class="col-sm-6">
									<select class="form-control input-sm select2" name="parrent">
										<option option value="0">-- Pilih Parent Menu --</option>
										<?php foreach($main_menu as $data){ ?>
											<option value="<?php echo $data['id'] ?>"><?php echo $data['nama'] ?></option>
										<?php } ?>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-sm-3" for="nama">Target</label>
								<div class="col-sm-6">
									<input id="new_window" type="checkbox" name="new_window" value="1"> 
									<label for="new_window">Buka di Jendela Baru</label>
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

<script type="text/javascript">
	function set_menu(nama) {
		$("[name=nama]").val(nama);
	}
</script>