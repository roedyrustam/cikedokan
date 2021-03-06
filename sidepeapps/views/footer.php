			<footer class="main-footer">
				<div class="text-center copyright">
					V.<?= AmbilVersi() ?> SIDePe
				</div>
			</footer>
			</div>

			<!-- Jquery UI -->
			<script src="<?= base_url() ?>assets/bootstrap/js/jquery-ui.min.js"></script>
			<script src="<?= base_url() ?>assets/bootstrap/js/jquery.ui.autocomplete.scroll.min.js"></script>

			<script src="<?= base_url() ?>assets/bootstrap/js/moment.min.js"></script>
			<!-- Bootstrap 3.3.7 -->
			<script src="<?= base_url() ?>assets/bootstrap/js/bootstrap.min.js"></script>
			<!-- Select2 -->
			<script src="<?= base_url() ?>assets/bootstrap/js/select2.full.min.js"></script>
			<!-- DataTables -->
			<script src="<?= base_url() ?>assets/bootstrap/js/jquery.dataTables.min.js"></script>
			<script src="<?= base_url() ?>assets/bootstrap/js/dataTables.bootstrap.min.js"></script>
			<!-- bootstrap color picker -->
			<script src="<?= base_url() ?>assets/bootstrap/js/bootstrap-colorpicker.min.js"></script>
			<!-- bootstrap Date time picker -->
			<script src="<?= base_url() ?>assets/bootstrap/js/bootstrap-datetimepicker.min.js"></script>
			<script src="<?= base_url() ?>assets/bootstrap/js/id.js"></script>
			<!-- bootstrap Date picker -->
			<script src="<?= base_url() ?>assets/bootstrap/js/bootstrap-datepicker.min.js"></script>
			<script src="<?= base_url() ?>assets/bootstrap/js/bootstrap-datepicker.id.min.js"></script>
			<!-- Bootstrap WYSIHTML5 -->
			<script src="<?= base_url() ?>assets/bootstrap/js/bootstrap3-wysihtml5.all.min.js"></script>
			<!-- Slimscroll -->
			<script src="<?= base_url() ?>assets/bootstrap/js/jquery.slimscroll.min.js"></script>
			<!-- FastClick -->
			<script src="<?= base_url() ?>assets/bootstrap/js/fastclick.js"></script>
			<!-- AdminLTE App -->
			<script src="<?= base_url() ?>assets/js/adminlte.min.js"></script>
			<script src="<?= base_url() ?>assets/js/validasi.js"></script>
			<script src="<?= base_url() ?>assets/js/jquery.validate.min.js"></script>
			<!-- Script-->
			<script src="<?= base_url() ?>assets/js/script.js"></script>

			<!-- NOTIFICATION-->
			<script type="text/javascript">
				$('document').ready(function() {

					$("#b_artikel").load("<?= site_url() ?>notif/artikel");
					$("#b_komentar").load("<?= site_url() ?>notif/komentar");
					$("#b_lapor").load("<?= site_url() ?>notif/lapor");
					var refreshId = setInterval(function() {
						$("#b_komentar").load("<?= site_url() ?>notif/komentar");
						$("#b_lapor").load("<?= site_url() ?>notif/lapor");
					}, 3000);

					if ($('#success-code').val() == 1) {
						notify = 'success';
						notify_msg = 'Data berhasil disimpan';
					} else if ($('#success-code').val() == -1) {
						notify = 'error';
						notify_msg = 'Data gagal disimpan <?= $_SESSION["error_msg"] ?>';
					} else if ($('#success-code').val() == -2) {
						notify = 'error';
						notify_msg = 'Data gagal diimpan, nama id sudah ada!';
					} else if ($('#success-code').val() == -3) {
						notify = 'error';
						notify_msg = 'Data gagal diimpan, nama id sudah ada!';
					} else if ($('#success-code').val() == 4) {
						notify = 'success';
						notify_msg = 'Data berhasil dihapus';
					} else if ($('#success-code').val() == -4) {
						notify = 'error';
						notify_msg = 'Data gagal dihapus';
					} else {
						notify = '';
						notify_msg = '';
					}
					notification(notify, notify_msg);
					$('#success-code').val('');
				});
			</script>
			<?php $_SESSION['success'] = 0; ?>

			<!-- Notifikasi Ganti Password Login -->
			<?php if ($this->session->admin_warning && !config_item('demo')) : ?>
				<script type="text/javascript">
					<?php if (isset($_SESSION['dari_login'])) : ?>
						$(window).on('load', function() {
							$('#massageBox').modal('show');
							$('#ok').click(function() {
								$('#massageBox').modal('hide');
							});
						});
						<?php unset($_SESSION['dari_login']) ?>
					<?php endif; ?>
				</script>
			<?php endif ?>

			<!-- Notifikasi PIN Warga -->
			<script type="text/javascript">
				<?php if ($_SESSION['pin']) : ?>
					$(window).on('load', function() {
						$('#pinBox').modal('show');
					});
					<?php unset($_SESSION['pin']) ?>
				<?php endif ?>
			</script>
			</body>

			</html>