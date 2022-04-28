<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<script
    async
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAxsKE9ArOZcaNtsfXIMFqr4N-UCsmp-Ng&callback=initMap"
    defer
></script>
<script>
	$(document).ready(function()
	{
		$('#simpan_penduduk').click(function()
		{
			var lat = $('#lat').val();
			var lng = $('#lng').val();
			$.ajax(
			{
				type: "POST",
				url: "<?=$form_action?>",
				dataType: 'json',
				data: { lat, lng },
			});
		});
	});

	function initMap() {
		<?php if (!empty($penduduk['lat'])):	?>
			var center = { lat: <?= $penduduk['lat'].", lng: ".$penduduk['lng']; ?> };
			var zoom = <?= $desa['zoom'] ?: 10; ?>;
		<?php else: ?>
			var center = { lat: -7.885619783139936, lng: 110.39893195996092 };
			var zoom = 10;
		<?php	endif; ?>

		var map = new google.maps.Map($('#map')[0], { center, zoom })

		var marker = new google.maps.Marker({
        position: center,
				map: map,
				draggable: true
    });

		marker.addListener('dragend', (e) => {
			$('#lat').val(e.latLng.lat())
			$('#lng').val(e.latLng.lng())
		})
	}
</script>

<style>
	#map
	{
		width: 100%;
		height: 320px;
		border: 1px solid #000;
	}
</style>
	<div class='modal-body'>
		<div class="row">
			<div class="col-sm-12">
        <div id="map"></div>
        <input type="hidden" name="lat" id="lat" value="<?= $penduduk['lat']; ?>" />
        <input type="hidden" name="lng" id="lng" value="<?= $penduduk['lng']; ?>"/>
			</div>
		</div>
	</div>
	<div class="modal-footer">
		<button type="reset" class="btn btn-radius btn-danger btn-sm" data-dismiss="modal">Tutup</button>
    <?php if($penduduk['status_dasar'] == 1 || !isset($penduduk['status_dasar'])): ?>
		  <button type="submit" class="btn btn-radius btn-info btn-sm" id="simpan_penduduk" data-dismiss="modal">Simpan</button>
	  <?php endif; ?>
  </div>

