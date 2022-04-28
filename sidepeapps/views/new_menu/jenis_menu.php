

<div class="box box-info">
	<div class="box-header with-border">
		<h3 class="box-title">Pilih Jenis Menu</h3>
		<div class="box-tools">
			<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
		</div>
	</div>

	<div class="box-body">
		<ul class="nav nav-pills nav-stacked">
			<li class="<?php echo $tip === '1' ? 'active' : '' ?>">
				<a href="<?php echo site_url('new_menu/form/1'); ?>"> Halaman Statis</a>
			</li>

			<li class="<?php echo $tip === '1' ? 'active' : '' ?>">
				<a href="<?php echo site_url('new_menu/form/2'); ?>"> Artikel Dinamis</a>
			</li>
		</ul>
	</div>
</div>