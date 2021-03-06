<script type="text/javascript" src="<?= base_url()?>assets/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?= base_url()?>assets/js/validasi.js"></script>
<script>
	$(function ()
	{
		$('.select2').select2()
	})
</script>
<form action="<?= $form_action?>" method="post" id="validasi">
	<div class='modal-body'>
		<div class="row">
			<div class="col-sm-12">
				<div class="box box-danger">
					<div class="box-body">
						<div class="form-group">
							<label for="nik">Kepala Rumah Tangga</label>
							<select class="form-control input-sm select2 required"  id="nik_kepala" name="nik_kepala" style="width:100%;">
								<option option value="">-- Silakan Cari NIK / Nama Penduduk--</option>
								<?php foreach ($penduduk as $data): ?>
									<option value="<?= $data['id']?>">NIK :<?= $data['nik']." - ".$data['nama']?></option>
								<?php endforeach; ?>
							</select>
						</div>
						<p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
							Silakan cari nama / NIK dari data penduduk yang sudah terinput.
							Penduduk yang dipilih otomatis berstatus sebagai Kepala Rumah Tangga baru tersebut.
						</p>
					</div>
				</div>
			</div>
		</div>
		<div class="modal-footer">
			<button type="reset" class="btn btn-radius btn-danger btn-sm" data-dismiss="modal">Tutup</button>
			<button type="submit" class="btn btn-radius btn-info btn-sm" id="ok">Simpan</button>
		</div>
	</div>
</form>

