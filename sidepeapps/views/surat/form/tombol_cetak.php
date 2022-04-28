<div class="box-footer">
	<div class="row">
		<div class="col-xs-12">
			<!-- <button type="reset" class="btn btn-social btn-flat btn-danger btn-sm"><i class="fa fa-times"></i> Batal</button> -->
			<?php if (SuratCetak($url)): ?>
				<button id="cetak-btn" type="button" onclick="$('#'+'validasi').attr('action','<?= $form_action?>');$('#'+'validasi').submit();" class="btn btn-social btn-flat btn-default btn-sm pull-right"><i class="fa fa-print"></i> Cetak</button>
			<?php endif; ?>
			<?php if (SuratExport($url)): ?>
				<script type="text/javascript">
					function rtf_export()
					{
						$('#'+'validasi').attr('action','<?= $form_action2?>');

						validasi.submit();
					}
				</script>
				<button type="button" onclick="rtf_export();" class="btn btn-radius btn-uppercase btn-success btn-sm pull-right" style="margin-right: 5px;">Ekspor Surat</button>
			<?php endif; ?>
		</div>
	</div>
</div>
