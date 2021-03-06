<script type="text/javascript" src="<?= base_url()?>assets/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?= base_url()?>assets/js/validasi.js"></script>
<script>
	$('#file_browser').click(function(e)
	{
			e.preventDefault();
			$('#file').click();
	});
	$('#file').change(function()
	{
			$('#file_path').val($(this).val());
	});
	$('#file_path').click(function()
	{
			$('#file_browser').click();
	});
</script>
<form action="<?= $form_action?>" method="POST" id="validasi" enctype="multipart/form-data">
	<div class='modal-body'>
		<div class="row">
			<div class="col-sm-12">
				<div class="box box-danger">
					<div class="box-body">
						<label class="control-label" for="nama">Unggah Template Format Surat</label>
						<div class="input-group input-group-sm">
							<input type="text" class="form-control input-sm required" id="file_path">
							<input type="file" class="hidden" id="file" name="foto">
							<span class="input-group-btn">
								<button type="button" class="btn btn-info btn-flat" id="file_browser" style="border-bottom-left-radius:0;border-top-left-radius:0"><i class="fa fa-search"></i> Browse</button>
							</span>
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
