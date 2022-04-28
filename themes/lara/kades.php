<div class="row">
<?php foreach ($data_kolom_kades as $data){ ?>
	<div class="col-sm-3 hidden-xs">
		<?php $sambutan = $this->db->query('select * from sambutan where id_artikel = ?', $data["id"])->row_array();
		if($sambutan): ?>
		<img src="<?=site_url('desa/upload/sambutan/'.$sambutan['foto_sambutan']) ?>" alt="" class="foto-kades img-kades-center">
		<?php endif ?>
	</div>
	<div class="col-sm-9">
		<div class="box-content-kolom-kades">
			<div class="judul">
				<a href="<?php echo get_artikel_url( $data['id'], $data['id_kategori'] ); ?>"><?php echo ucwords(character_limiter( $data['judul'], 50 )); ?></a>
			</div>
			<div class="isi">
				<?php echo ucwords(character_limiter( $data['isi'], 800 )); ?>
			</div>
			<div class="nama"><?php echo $sambutan['pemberi_sambutan']; ?></div>
			<p class="jabatan"><?php echo $sambutan['jabatan_sambutan']; ?></p>
		</div>
	</div>
<?php } ?>
</div>