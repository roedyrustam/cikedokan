<div class="content-wrapper">
	<section class="content-header">
		<div class="title-header">Setting Aplikasi</div>
		<ol class="breadcrumb">
			<li><a href="<?=site_url('hom_sid')?>"><i class="fa fa-home"></i> Home</a></li>
			<li class="active">Setting Aplikasi</li>
		</ol>
	</section>
	<section class="content" id="maincontent">
		<div class="row">
			<form id="validasi" action="<?=site_url('setting/update')?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
				<div class="col-md-4">
					<div class="box box-primary">
						<div class="box-body box-profile">
						    <?php if(file_exists(FCPATH.'themes/'.$this->setting->web_theme.'/assets/images/bg_i.png')): ?>
    							<img class="img-responsive" src="<?= base_url()?>themes/<?=$this->setting->web_theme ?>/assets/images/bg_i.png" alt="Latar I">
    						<?php else: ?>
    							<img class="img-responsive" src="<?= base_url()?>assets/images/no_image_available.png" alt="Latar I">
    						<?php endif; ?>
							<br/>
							<p class="text-center text-bold">Latar I (Index)</p>
							<p class="text-muted text-center text-red">(Kosongkan, jika latar tidak berubah)</p>
							<br/>
							<div class="input-group input-group-sm">
								<input type="text" class="form-control" id="file_path" >
								<input type="file" class="hidden" id="file" name="bg_i">
								<span class="input-group-btn">
									<button type="button" class="btn btn-info btn-flat"  id="file_browser" style="border-top-left-radius:0;border-bottom-left-radius:0"><i class="fa fa-search"></i> Browse</button>
								</span>
							</div>
						</div>
					</div>
					<div class="box box-primary">
						<div class="box-body box-profile">
						    <?php if(file_exists(FCPATH.'themes/'.$this->setting->web_theme.'/assets/images/bg_ii.png')): ?>
    							<img class="img-responsive" src="<?= base_url()?>themes/<?=$this->setting->web_theme ?>/assets/images/bg_ii.png" alt="Latar I">
    						<?php else: ?>
    							<img class="img-responsive" src="<?= base_url()?>assets/images/no_image_available.png" alt="Latar I">
    						<?php endif; ?>
							<br/>
							<p class="text-center text-bold">Latar II (Header)</p>
							<p class="text-muted text-center text-red">(Kosongkan, jika latar tidak berubah)</p>
							<br/>
							<div class="input-group input-group-sm">
								<input type="text" class="form-control" id="file_path2" >
								<input type="file" class="hidden" id="file2" name="bg_ii">
								<span class="input-group-btn">
									<button type="button" class="btn btn-info btn-flat"  id="file_browser2" style="border-top-left-radius:0;border-bottom-left-radius:0"><i class="fa fa-search"></i> Browse</button>
								</span>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-8">
					<div class="box box-primary">
						<div class="box-body">
							<?php foreach ($this->list_setting as $setting): ?>
								<?php if ($setting->kategori != 'development' OR ($this->config->item("environment") == 'development' )): ?>
									<div class="form-group">
										<label class="col-sm-12 col-md-3" for="nama"><?= $setting->key?></label>
										<?php if ($setting->key == 'offline_mode'): ?>
											<div class="col-sm-12 col-md-4">
												<select class="form-control input-sm" id="<?= $setting->key?>" name="<?= $setting->key?>">
													<option value="0" <?php if ($setting->value==0): ?>selected<?php endif; ?>>Web bisa diakses publik</option>
													<option value="1" <?php if ($setting->value==1): ?>selected<?php endif; ?>>Web dan peta hanya bisa diakses admin/operator/redaksi</option>
													<option value="2" <?php if ($setting->value==2): ?>selected<?php endif; ?>>Web dan peta non-aktif sama sekali</option>
												</select>
											</div>
										<?php elseif ($setting->jenis == 'option'): ?>
											<div class="col-sm-12 col-md-4">
												<select class="form-control input-sm" id="<?= $setting->key ?>" name="<?= $setting->key?>">
													<?php foreach ($setting->options as $key => $label): ?>
													<option value="<?= $key ?>" <?php ($setting->value == $key) and print('selected') ?>><?= $label ?></option>
													<?php endforeach ?>
												</select>
											</div>
										<?php elseif ($setting->key == 'timezone'): ?>
											<div class="col-sm-12 col-md-4">
												<select class="form-control input-sm" name="<?= $setting->key?>" >
													<option value="Asia/Jakarta" <?php if ($setting->value=='Asia/Jakarta'): ?>selected<?php endif; ?>>Asia/Jakarta</option>
													<option value="Asia/Makassar" <?php if ($setting->value=='Asia/Makassar'): ?>selected<?php endif; ?>>Asia/Makassar</option>
													<option value="Asia/Jayapura" <?php if ($setting->value=='Asia/Jayapura'): ?>selected<?php endif; ?>>Asia/Jayapura</option>
												</select>
											</div>
										<?php elseif ($setting->key == 'sumber_gambar_slider'): ?>
											<div class="col-sm-12 col-md-4">
												<select class="form-control input-sm" id="<?= $setting->key?>" name="<?= $setting->key?>">
													<option value="1" <?php if ($setting->value==1): ?>selected<?php endif; ?>>Gambar utama artikel terbaru</option>
													<option value="2" <?php if ($setting->value==2): ?>selected<?php endif; ?>>Gambar utama artikel terbaru yang masuk ke slider atas</option>
													<option value="3" <?php if ($setting->value==3): ?>selected<?php endif; ?>>Gambar dalam album galeri yang dimasukkan ke slider</option>
												</select>
											</div>
										<?php elseif ($setting->jenis == 'boolean'): ?>
											<div class="col-sm-12 col-md-4">
												<select class="form-control input-sm" id="<?= $setting->key?>" name="<?= $setting->key?>">
												<option value="1" <?php if ($setting->value==1): ?>selected<?php endif; ?>>Ya</option>
													<option value="0" <?php if ($setting->value==0): ?>selected<?php endif; ?>>Tidak</option>
												</select>
											</div>
										<?php elseif ($setting->key == 'web_theme'): ?>
											<div class="col-sm-12 col-md-4">
												<select class="form-control input-sm" name="<?= $setting->key?>" >
													<?php foreach ($list_tema as $tema): ?>
														<option value="<?= $tema?>" <?php if ($setting->value==$tema): ?>selected<?php endif; ?>><?= $tema?></option>
													<?php endforeach;?>
												</select>
											</div>
										<?php else : ?>
											<div class="col-sm-12 col-md-4">
												<input id="<?= $setting->key?>" name="<?= $setting->key?>" class="form-control input-sm <?php ($setting->jenis != 'int') or print 'digits'?>" type="text"  value="<?= $setting->value?>"></input>
											</div>
										<?php endif; ?>
										<label class="col-sm-12 col-md-5 pull-left" for="nama"><?= $setting->keterangan?></label>
									</div>
								<?php endif; ?>
							<?php endforeach; ?>
						</div>
						<div class='box-footer'>
							<div class="row">
								<div class='col-xs-12'>
									<button type='reset' class='btn btn-radius btn-uppercase btn-danger btn-sm'>Batal</button>
									<button type='submit' class='btn btn-radius btn-uppercase btn-info btn-sm pull-right'>Simpan</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</section>
</div>
