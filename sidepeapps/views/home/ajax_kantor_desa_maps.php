<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<script
    async
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAxsKE9ArOZcaNtsfXIMFqr4N-UCsmp-Ng&callback=initMap"
    defer
></script>
<script>
	$(document).ready(function(){
		$('#simpan_kantor').click(function(){
			var lat = $('#lat').val();
			var lng = $('#lng').val();
			var zoom = $('#zoom').val();
			var map_tipe = $('#map_tipe').val();
			$.ajax({
				type: "POST",
				url: "<?=$form_action?>",
				dataType: 'json',
				data: {lat: lat, lng: lng, zoom: zoom, map_tipe: map_tipe},
			});
		});
	});

	function initMap() {
		<?php if (!empty($desa['lat'] && !empty($desa['lng']))): ?>
			var center = { lat: <?=$desa['lat'].", lng: ".$desa['lng']?> };
			var zoom = <?=$desa['zoom'] ?: 4?>;
		<?php else: ?>
			var center = { lat: -1.0546279422758742, lng: 116.71875000000001 };
			var zoom = 4;
		<?php endif; ?>

		var map = new google.maps.Map($('#mapx')[0], { center, zoom })

		map.addListener('zoom_changed', () => {
			$('#zoom').val(map.getZoom())
		})
		
		var kantor_desa = new google.maps.Marker({
			position: center,
			map,
			draggable: true
		})

		kantor_desa.setMap(map)
		kantor_desa.addListener('dragend', (e) => {
			$('#lat').val(e.latLng.lat())
			$('#lng').val(e.latLng.lng())
			$('#map_tipe').val('HYBIRD')
			$('#zoom').val(map.getZoom())
		})
	}
</script>

<style>
	#mapx
	{
    z-index: 1;
    width: 100%;
    height: 450px;
    border: 1px solid #000;
	}
</style>
<!-- Menampilkan OpenStreetMap dalam Box modal bootstrap (AdminLTE)  -->
	<div class='modal-body'>
		<div class="row">
			<div class="col-sm-12">
        <div id="mapx"></div>
        <input type="hidden" name="lat" id="lat" value="<?= $desa['lat']?>"/>
        <input type="hidden" name="lng" id="lng"  value="<?= $desa['lng']?>"/>
        <input type="hidden" name="zoom" id="zoom"  value="<?= $desa['zoom']?>"/>
        <input type="hidden" name="map_tipe" id="map_tipe"  value="<?= $desa['map_tipe']?>"/>
			</div>
		</div>
	</div>
	<div class="modal-footer">
		<button type="reset" class="btn btn-radius btn-uppercase btn-danger btn-sm" data-dismiss="modal">Tutup</button>
		<button type="submit" class="btn btn-radius btn-uppercase btn-info btn-sm" data-dismiss="modal" id="simpan_kantor">Simpan</button>
	</div>

