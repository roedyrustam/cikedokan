<div class="content-wrapper">
	<section class="content-header">
		<div class="tittle-header">Pengaturan Menu Statis</div>
		<ol class="breadcrumb">
			<li><a href="<?= site_url('hom_sid')?>"><i class="fa fa-home"></i> Home</a></li>
			<li class="active">Pengaturan Menu Statis</li>
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
							<a href="<?=site_url("menu")?>" class="btn btn-radius btn-uppercase btn-info btn-sm btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"  title="Tambah Artikel">Kembali ke Daftar Menu</a>
						</div>
						<div class="box-body">
							<div class="form-group">
								<label class="control-label col-sm-4" for="nama">Nama</label>
								<div class="col-sm-6">
									<input name="nama" class="form-control input-sm" type="text" value="<?=$submenu['nama']?>"></input>
								</div>
							</div>
							<?php if (!empty($submenu['link'])): ?>
								<div class="form-group">
									<label class="control-label col-sm-4" for="link_sebelumnya">Link Sebelumnya</label>
									<div class="col-sm-6">
										<input class="form-control input-sm" type="text" value="<?=$submenu['link']?>" disabled=""></input>
									</div>
								</div>
							<?php endif; ?>

							<div class="form-group">
								<label class="control-label col-sm-4" for="link">Jenis Link</label>
								<div class="col-sm-6">
									<select class="form-control input-sm required" id="link_tipe" name="link_tipe" style="width:100%;" onchange="ganti_jenis_link($(this).val());">
										<option option value="">-- Pilih Jenis Link --</option>
										<option value="1" <?php if ($submenu['link_tipe']=="1"): ?>selected<?php endif; ?>>Artikel Statis</option>
										<option value="2" <?php if ($submenu['link_tipe']=="2"): ?>selected<?php endif; ?>>Statistik Penduduk</option>
										<option value="3" <?php if ($submenu['link_tipe']=="3"): ?>selected<?php endif; ?>>Statistik Keluarga</option>
										<option value="4" <?php if ($submenu['link_tipe']=="4"): ?>selected<?php endif; ?>>Statistik Program Bantuan</option>
										<option value="5" <?php if ($submenu['link_tipe']=="5"): ?>selected<?php endif; ?>>Statistik Lainnya</option>
										<option value="99" <?php if ($submenu['link_tipe']=="99"): ?>selected<?php endif; ?>>Eksternal</option>
										<option value="45" <?php if ($submenu['link_tipe']=="45"): ?>selected<?php endif; ?>>Internal</option>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-sm-4">Link</label>
								<div class="col-sm-6" >
									<select id="link" class="form-control input-sm jenis_link"  name="<?php if ($submenu['link_tipe']==1): ?>link<?php endif; ?>" style="<?php if ($submenu['link_tipe']!=1): ?>display:none<?php endif; ?>" <?php if ($submenu['link_tipe']!=1): ?>disabled="disabled"<?php endif; ?>>
										<option value="">Pilih Artikel Statis</option>
										<?php foreach ($link as $data): ?>
											<option value="<?='page/'.url_title($data['judul'],'-',TRUE);?>" <?php if ($submenu['link']==$id): ?>selected<?php endif; ?>><label>No link : </label><?=$data['judul']?></option>
										<?php endforeach; ?>
									</select>
									<select  id="statistik_penduduk" class="form-control input-sm jenis_link"  name="<?php if ($submenu['link_tipe']==2): ?>link<?php endif; ?>" style="<?php if ($submenu['link_tipe']!=2): ?>display:none;<?php endif; ?>">
										<option value="">Pilih Statistik Penduduk</option>
										<?php foreach ($statistik_penduduk as $id => $nama): ?>
											<option value="<?=$id?>" <?php if ($submenu['link']==$id): ?>selected<?php endif; ?>><?= $nama?></option>
										<?php endforeach; ?>
									</select>
									<select id="statistik_keluarga" class="form-control jenis_link input-sm"  name="<?php if ($submenu['link_tipe']==3): ?>link<?php endif; ?>" style="<?php if ($submenu['link_tipe']!=3): ?>display:none;<?php endif; ?>">
										<option value="">Pilih Statistik Keluarga</option>
										<?php foreach ($statistik_keluarga as $id => $nama): ?>
											<option value="<?= $id?>" <?php if ($submenu['link']==$id): ?>selected<?php endif; ?>><?= $nama?></option>
										<?php endforeach; ?>
									</select>
									<select id="statistik_program_bantuan" class="form-control input-sm jenis_link"  name="<?php if ($submenu['link_tipe']==4): ?>link<?php endif; ?>" style="<?php if ($submenu['link_tipe']!=4): ?>display:none;<?php endif; ?>">
										<option value="">Pilih Statistik Program Bantuan</option>
										<?php foreach ($statistik_program_bantuan as $id => $nama): ?>
											<option value="<?= $id?>" <?php if ($submenu['link']==$id): ?>selected<?php endif; ?>><?= $nama?></option>
										<?php endforeach; ?>
									</select>
									<select id="statistik_lainnya" class="form-control input-sm jenis_link" name="<?php if ($submenu['link_tipe']==5): ?>link<?php endif; ?>" style="<?php if ($submenu['link_tipe']!=5): ?>display:none;<?php endif; ?>">
										<option value="">Pilih Statistik Lainnya</option>
										<?php foreach ($statistik_lainnya as $id => $nama): ?>
											<option value="<?= $id?>" <?php if ($submenu['link']==$id): ?>selected<?php endif; ?>><?= $nama?></option>
										<?php endforeach; ?>
									</select>
									<span id="eksternal" class="jenis_link" style="<?php if ($submenu['link_tipe']!=99): ?>display:none;<?php endif; ?>">
										<input  name="<?php if ($submenu['link_tipe']==99): ?>link<?php endif; ?>" class="form-control input-sm" type="text" value="<?=$submenu['link']?>"></input>
										<span class="text-sm text-red">(misalnya: http://opensid.info)</span>
									</span>
									<span id="internal" class="jenis_link" style="<?php if ($submenu['link_tipe']!=45): ?>display:none;<?php endif; ?>">
										<input  name="<?php if ($submenu['link_tipe']==45): ?>link<?php endif; ?>" class="form-control input-sm" type="text" value="<?=$submenu['link']?>"></input>
										<span class="text-sm text-red">(misalnya: halaman-internal)</span>
									</span>
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
	function ganti_jenis_link(jenis)
	{
		$('.jenis_link').hide();
		$('.jenis_link').removeAttr( "name" );
		$('.jenis_link').attr('disabled','disabled');
		if (jenis == '1')
		{
			$('#link').show();
			$('#link').attr('name', 'link');
			$('#link').removeAttr('disabled');
		} else if (jenis == '2')
		{
			$('#statistik_penduduk').show();
			$('#statistik_penduduk').attr('name', 'link');
			$('#statistik_penduduk').removeAttr('disabled');
		}
		else if (jenis == '3')
		{
			$('#statistik_keluarga').show();
			$('#statistik_keluarga').attr('name', 'link');
			$('#statistik_keluarga').removeAttr('disabled');
		}
		else if (jenis == '4')
		{
			$('#statistik_program_bantuan').show();
			$('#statistik_program_bantuan').attr('name', 'link');
			$('#statistik_program_bantuan').removeAttr('disabled');
		}
		else if (jenis == '5')
		{
			$('#statistik_lainnya').show();
			$('#statistik_lainnya').attr('name', 'link');
			$('#statistik_lainnya').removeAttr('disabled');
		}
		else if (jenis == '99' )
		{
			$('#eksternal').show();
			$('#eksternal > input').show();
			$('#eksternal > input').attr('name', 'link');
			$('#eksternal').removeAttr('disabled');
			$('#eksternal > input').removeAttr('disabled');
		}
		else if (jenis == '45' )
		{
			$('#internal').show();
			$('#internal > input').show();
			$('#internal > input').attr('name', 'link');
			$('#internal').removeAttr('disabled');
			$('#internal > input').removeAttr('disabled');
		}
	}
</script>