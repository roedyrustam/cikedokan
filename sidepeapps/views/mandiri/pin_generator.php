<script type="text/javascript" src="<?= base_url()?>assets/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?= base_url()?>assets/js/validasi.js"></script>
<script>
	$("#btn-pin-generator").on('click', function () {
		generate();
	});

	$('#modalBox').on('hidden.bs.modal', function () {
		window.location.reload();
	});

	function generate() {
		$.ajax({
			url: '<?=$form_action?>',
			beforeSend: function() {
				$('#btn-pin-generator').button('loading');
				$("#js-info").show();
			},
			success: function(res) {
				var data = JSON.parse(res);
				for (var i = 0; i < data.length; i++) {
					var pesan = data[i];
					$("#js-messages").append(pesan);
				}
			},
			error: function() {
				alert('Terjadi kesalahan saat membuat PIN, silahkan coba lagi');
			},
			complete: function() {
				$('#btn-pin-generator').button('reset');
				$("#js-info").hide();
			}
		})
	}
</script>
<form action="" method="post" id="validasi">
	<div class='modal-body'>
		<div class="box-body text-center">
			<div class="form-group">
				<p class="alert alert-info">
					<?php
					echo 'Jumlah semua penduduk yang akan dibuatkan pin adalah '.$jml_penduduk.' orang.';
					?>
				</p>

				<p class="alert alert-warning">
					**) PIN untuk penduduk yang belum terdaftar adalah 6 angka NIK terakhir
				</p>
			</div>

			<div class="form-group">
				<button type="reset" class="btn btn-radius btn-uppercase bg-maroon" data-dismiss="modal"><i class='fa fa-refresh'></i> Tutup & Refresh</button>

				<button <?php echo $jml_penduduk === 0 ? 'disabled' : '' ?> type="button" class="btn btn-radius btn-uppercase btn btn-primary" id="btn-pin-generator" data-loading-text="<i class='fa fa-spinner fa-spin'></i> Sedang membuat PIN, mohon tunggu..."><i class='fa fa-check'></i> Generate PIN</button>
			</div>

			<div class="form-group">
				<p class="alert alert-danger" id="js-info" style="display: none;">
					<i class="fa fa-warning"></i> Semua proses akan di batalkan jika modal ini anda tutup.
				</p>
			</div>

			<div class="form-group" id="js-messages"></div>
		</div>
	</div>
</form>
