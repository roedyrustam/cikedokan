<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<div class="container-default section-footer">
	<div class="container">
		<div class="footer">
			<div class="footer-top">
				<div class="row">
					<div class="col-md-6">
						<div class="footer-center">
							<div class="row">
								<?php include('template-parts/footer/about-footer.php');?>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="footer-center">
							<div class="row">
								<?php include('template-parts/footer/populer-footer.php');?>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="footer-center">
							<div class="row">
								<?php include('template-parts/footer/download-footer.php');?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="footer-bottom">
				<div class="social-footer">
					<?php foreach ($sosmed As $data): ?>
	                  <?php if (!empty($data["link"])): ?>
						<a href="<?= $data['link']?>" target="_blank" class="scl-btn scl-crcl shadow <?= $data['icon'] ?>"></a>
	                  <?php endif; ?>
	                <?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="container-default section-copyright">
	<div class="container">
		<?php include('template-parts/footer/copyright-footer.php');?>
	</div>
</div>

<!-- Floating IDM -->
<div style="overflow:auto; width:auto">
<?php

		if(!function_exists('idm_desimal'))
		{
			function idm_desimal($str) {

		$data = explode('.', $str);

		if (!empty($data[1])) {

			return implode('.', [$data[0], substr($data[1], 0, 2)]);
		}

		return $data[0];
	}
		}

?>

<div class="idm-float">
    <ul class="sticky">
        <input id='hideshare' type="checkbox" />
        <li class="share iks"><span><i class="fa fa-line-chart" aria-hidden="true"></i> <b>IKS : </b><?=idm_desimal($idm_skor[0]) ?></span></li>
        <li class="share ike"><span><i class="fa fa-pie-chart" aria-hidden="true"></i> <b>IKE : </b><?=idm_desimal($idm_skor[1]) ?></span></li>
      <li class="share ikl"><span><i class="fa fa-area-chart" aria-hidden="true"></i> <b>IKL : </b><?=idm_desimal($idm_skor[2]) ?></span></li>
        <li class="share idm"><span><i class="fa fa-bar-chart" aria-hidden="true"></i> <b>IDM : </b><?=idm_desimal($idm_skor[3]) ?></span></li>
        <label for="hideshare" class="switch"><span class="show"></span></label>
    </ul>
</div>

<!-- /.wrapper -->

<!-- Untuk menampilkan modal -->
<div  class="modal fade" id="modalBox" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class='modal-dialog'>
		<div class='modal-content'>
			<div class='modal-header'>
				<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
				<h4 class='modal-title' id='myModalLabel'> Pengaturan Pengguna</h4>
			</div>

			<div class="fetched-data"></div>
		</div>
	</div>
</div>

<script src="<?php echo base_url().$this->theme_folder.'/'.$this->theme; ?>/assets/js/venobox.min.js"></script>

</body>
</html>

