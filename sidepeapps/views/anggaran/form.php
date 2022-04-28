
<div class="content-wrapper">
	<section class="content-header">
		<h1>Anggaran <?=ucwords($this->setting->sebutan_desa)?></h1>
		<ol class="breadcrumb">
			<li><a href="<?= site_url('hom_sid')?>"><i class="fa fa-home"></i> Home</a></li>
			<li class="active">Form anggaran <?=$this->setting->sebutan_desa?></li>
		</ol>
	</section>
	
	<section class="content" id="maincontent">
		<form id="validasi" class="form-horizontal" action="<?php echo site_url('anggaran/simpan/'.$aksi) ?>" method="POST" accept-charset="utf-8">
			<div class="row">
				<div class="col-md-9">
					<div class="box box-primary">
						<div class="box-header with-border">
							<a href="<?= site_url("anggaran?type=".$type.'&tahun='.$tahun)?>" class="btn btn-social btn-flat btn-info btn-sm btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"  title="Tambah Artikel">
								<i class="fa fa-arrow-circle-left "></i>Kembali ke Daftar Anggaran
							</a>
						</div>

						<div class="box-body">
							<input name="type" class="form-control input-sm" type="hidden" value="<?=(is_null($_GET['type'])) ? '1' : $_GET['type']?>" />
							<input name="id" class="form-control input-sm" type="hidden" value="<?=$anggaran['id']?>" />

							<div class="form-group">
								<label class="control-label col-sm-3" for="id_kategori">Kategori Anggaran</label>
								<div class="col-sm-4" class="">
									<input name="id_kategori" class="form-control input-sm" type="hidden" value="<?=$anggaran['id_kategori']?>" />
									<select name="id_kategori" class="select2 form-control input-sm" required>
										<option value="">-- Pilih Kategori Anggaran --</option>
										<?php foreach( $kategori_anggaran as $kat ){ ?>
											<option value="<?php echo $kat['id']; ?>" <?php echo $kat['id']==$id_kat || $kat['id']==$id_kat ? 'selected' : '' ?>><?php echo $kat['kategori']; ?></option>
										<?php } ?>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-sm-3" for="nama_anggaran">Nama Kegiatan / Perencanaan</label>
								<div class="col-sm-9">
									<?php if( $type==2 ){ ?>
										<select name="nama_anggaran" class="select2" required>
											<option data-koordinator="0" data-id_artikel="0" data-tahap="" value="">Pilih Nama Anggaran / Kegiatan</option>
											<?php foreach( $data_anggaran_apbdes->result_array() as $data ) { ?>
												<option data-koordinator="<?=$data['koordinator']?>" data-id_artikel="<?=$data['id_artikel']?>" data-tahap="<?=$data['tahap']?>" value="<?=$data['nama_anggaran']?>" <?php echo $data['nama_anggaran']==$anggaran['nama_anggaran'] ? 'selected' : '' ?>><?=$data['nama_anggaran']?></option>
											<?php } ?>
										</select>
										<a target="_BLANK" href="<?php echo site_url('anggaran/tambah?type=1&tahun='.$tahun) ?>" class="btn btn-social btn-flat btn-success btn-sm btn-sm"><i class="fa fa-plus"></i> Tambah data APBDes</a>
										<p class="help-block">
											Jika belum ada data APBDes tersedia, silahkan tambah data menggunakan tombol "Tambah data APBDes diatas"
										</p>
									<?php }else{ ?>
										<input name="nama_anggaran" class="form-control input-sm" type="text" value="<?=$anggaran['nama_anggaran']?>"  required />
									<?php } ?>
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-sm-3" for="nama_anggaran">Periode</label>
								<div class="col-sm-2">
									<input name="tahun" class="form-control input-sm" type="hidden" value="<?=$tahun?>" />
									<select required <?php echo ( $type==2 ) ? 'disabled' : '' ?> name="tahun" class="form-control input-sm" <?php echo $aksi == 'update' ? 'disabled' : '' ?>>
										<option value="">-- Pilih Tahun --</option>
										<?php for( $i = date('Y'); $i >=  ( date('Y') - 2 ); $i-- ){ ?>
											<option value="<?php echo $i; ?>" <?php echo $i==$anggaran['tahun'] || $i==$tahun ? 'selected' : '' ?>><?php echo $i; ?></option>
										<?php } ?>
									</select>
								</div>
							</div><hr />

							<div class="form-group">
								<label class="control-label col-sm-3" for="jumlah">Jumlah Anggaran (Rp)</label>
								<div class="col-sm-4">
									<input name="jumlah" class="form-control input-sm" type="number" min="0" value="<?=$anggaran['jumlah']?>" required />
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-sm-3" for="koordinator">Pelaksana Kegiatan Anggaran (PKA)</label>
								<div class="col-sm-4">
									<select name="koordinator" class="select2">
										<option value="0">Pelaksana Kegiatan Anggaran (PKA) </option>
										<?php foreach( $data_pamong as $data ) { ?>
											<option value="<?=$data['nama']?>" <?php echo $data['nama']==$anggaran['koordinator'] ? 'selected' : '' ?>><?=$data['nama'].' ('.$data['jabatan'].')'?></option>
										<?php } ?>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-sm-3" for="id_kategori">Artikel Anggaran</label>
								<div class="col-sm-4">
									<select name="id_artikel" class="select2 form-control input-sm">
										<option value="0">-- Pilih Artikel Anggaran --</option>
										<?php foreach( $artikel_anggaran as $row ){ ?>
											<option value="<?php echo $row['id']; ?>" <?php echo $row['id']==$anggaran['id_artikel'] ? 'selected' : '' ?>><?php echo $row['judul']; ?></option>
										<?php } ?>
									</select>
								</div>
								<div class="col-sm-4" class="">
									<a target="_BLANK" href="<?php echo site_url('web/form/25') ?>" class="btn btn-social btn-flat btn-success btn-sm btn-sm"><i class="fa fa-plus"></i> Tambah artikel anggaran</a>
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-sm-3" for="warna_bar">Warna Bar</label>
								<div class="col-sm-2" class="">
									<select name="warna_bar" class="form-control input-sm">
										<option value="primary" <?php echo $anggaran['warna_bar']=='primary' ? 'selected' : '' ?>>Biru Tua</option>
										<option value="info" <?php echo $anggaran['warna_bar']=='info' ? 'selected' : '' ?>>Biru</option>
										<option value="success" <?php echo $anggaran['warna_bar']=='success' ? 'selected' : '' ?>>Hijau</option>
										<option value="warning" <?php echo $anggaran['warna_bar']=='warning' ? 'selected' : '' ?>>Orange</option>
										<option value="danger" <?php echo $anggaran['warna_bar']=='danger' ? 'selected' : '' ?>>Merah</option>
									</select>
								</div>
							</div>
						</div>

						<div class="box-footer text-right">
							<button type="submit" class="btn btn-sm btn-flat btn-social btn-primary"><i class="fa fa-save"></i> Simpan Anggaran</button>
						</div>
					</div>
				</div>
			</div>
		</form>

	</section>

</div>

<script>
	var type = "<?=$type?>";

	if( type === '2' ) {

		$("select[name=id_kategori]").on( 'change', function() {
			var aksi = "<?=$aksi?>";
			var type = "<?=$type?>";
			if( type === '2' ) {
				if( aksi=='update' )
					window.location.href = "<?=base_url()?>anggaran/edit/<?=$anggaran['id']?>?type=2&tahun=<?=$tahun?>&id_kat=" + this.value;
				else
					window.location.href = "<?=base_url()?>anggaran/tambah?type=2&tahun=<?=$tahun?>&id_kat=" + this.value;
			}
		} );

		$("select[name=nama_anggaran]").on( 'change', function() {
			var tahap = $(this).find(':selected').data('tahap');
			var id_artikel = $(this).find(':selected').data('id_artikel');
			var koordinator = $(this).find(':selected').data('koordinator');
			$('select[name=tahap]').val( tahap );
			$('input[name=tahap]').val( tahap );
			$('select[name=id_artikel]').val( id_artikel );
			$('select[name=id_artikel]').select2().trigger('change');
			$('select[name=koordinator]').val( koordinator );
			$('select[name=koordinator]').select2().trigger('change');
		});

		var tahap = $("select[name=nama_anggaran]").find(':selected').data('tahap');
		var id_artikel = $("select[name=nama_anggaran]").find(':selected').data('id_artikel');
		var koordinator = $("select[name=nama_anggaran]").find(':selected').data('koordinator');
		$('select[name=tahap]').val( tahap );
		$('input[name=tahap]').val( tahap );
		$('select[name=id_artikel]').val( id_artikel );
		$('select[name=id_artikel]').select2().trigger('change');
		$('select[name=koordinator]').val( koordinator );
		$('select[name=koordinator]').select2().trigger('change');
	}
</script>
