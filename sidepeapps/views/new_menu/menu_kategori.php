<select class="form-control" name="filter" onchange="location.href = this.value">
	<?php foreach($list_kategori_menu as $menu){ ?>
		<option value="<?php echo site_url('new_menu/index/'.$menu['id']) ?>" <?php echo $tip == $menu['id'] ? 'selected' : '' ?>><?php echo $menu['menu']; ?></option>
	<?php } ?>
</select><hr/>

<form id="validasi" action="<?= $form_action?>" method="POST" class="form-horizontal">
	<div class="box box-info">
		<div class="box-header with-border">
			<h3 class="box-title">Form Tambah Menu</h3>
			<div class="box-tools">
				<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
			</div>
		</div>

		<div class="box-body">
			<div class="form-group">
				<input required="" placeholder="Nama Menu" name="nama" class="form-control input-sm" type="text" value="<?=$menu['nama']?>"></input>
			</div>

			<?php if($tip === '1'){ ?>
				<div class="form-group">
					<select class="form-control input-sm select2" name="link" required="" onchange="set_menu($(this).find(':selected').data('nama'))">
						<?php foreach($statis as $data){ ?>
							<option data-nama="<?php echo $data['judul'] ?>" value="<?php echo site_url( url_title($data['judul'],'-',TRUE) ); ?>"><?php echo $data['judul'] ?></option>
						<?php } ?>
					</select>
				</div>
			<?php } ?>

			<div class="form-group hidden">
				<input class="form-control input-sm" name="link_sebelumnya" type="text" value="<?=$menu['link']?>"></input>
			</div>

			<div class="form-group">
				<label for="link">Parent</label>
				<select class="form-control input-sm select2" name="parrent">
					<option option value="0">-- Pilih Parent Menu --</option>
					<?php foreach($main_menu as $data){ ?>
						<option value="<?php echo $data['id'] ?>"><?php echo $data['nama'] ?></option>
					<?php } ?>
				</select>
			</div>

			<div class="form-group">
				<input id="new_window" type="checkbox" name="new_window" value="1"> 
				<label for="new_window">Buka di Jendela Baru</label>
			</div>
		</div>

		<div class='box-footer'>
			<button type='reset' class='btn btn-social btn-flat btn-danger btn-sm' ><i class='fa fa-times'></i> Batal</button>
			<button type='submit' class='btn btn-social btn-flat btn-info btn-sm pull-right confirm'><i class='fa fa-check'></i> Simpan</button>
		</div>
	</div>
</form>