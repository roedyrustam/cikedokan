<script type="text/javascript" src="<?= base_url()?>assets/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?= base_url()?>assets/js/validasi.js"></script>
<form action="<?=$form_action?>" method="post" id="validasi">
	<div class='modal-body'>
		<div class="row">
			<div class="col-sm-12">
				<div class="box box-danger">
					<div class="box-body">
						<div class="form-group">
							<label for="nama">Nama Kategori</label>
							<select class="form-control input-sm required"  id="kategori" name="kategori" style="width:100%;">
								<option option value="">-- Pilih Kategori --</option>
								<?php foreach ($list_kategori AS $kategori): ?>
									<option <?php if ($kategori_sekarang['id_kategori']==$kategori['id']): ?>selected<?php endif; ?> value="<?= $kategori['id']?>"><?= $kategori['judul']?></option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="modal-footer">
			<button type="reset" class="btn btn-radius btn-uppercase btn-danger btn-sm" data-dismiss="modal">Tutup</button>
			<button type="submit" class="btn btn-radius btn-uppercase btn-info btn-sm" id="ok">Simpan</button>
		</div>
	</div>
</form>
