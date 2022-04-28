<script type="text/javascript" src="<?= base_url()?>assets/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?= base_url()?>assets/js/validasi.js"></script>
<form action="<?= $form_action?>" method="post" id="validasi">
	<div class='modal-body'>
		<div class="row">
			<div class="col-sm-12">
				<div class="box box-danger">
					<div class="box-body">
						<div class="form-group">
							<label for="rtm_level">Hubungan</label>
							<select name="rtm_level" class="form-control input-sm required">
								<?php foreach ($hubungan as $data): ?>
									<option value="<?= $data['id']?>" <?php if ($data['id']==$main['rtm_level']): ?>selected<?php endif; ?>><?= $data['hubungan']?></option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="modal-footer">
		<button type="reset" class="btn btn-radius btn-danger btn-sm" data-dismiss="modal">Tutup</button>
		<button type="submit" class="btn btn-radius btn-info btn-sm" id="ok">Simpan</button>
	</div>
</form>