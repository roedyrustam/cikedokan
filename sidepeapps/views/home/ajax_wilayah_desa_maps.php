<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<script
    async
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAxsKE9ArOZcaNtsfXIMFqr4N-UCsmp-Ng&callback=initMap"
    defer
></script>
<script>
  $(document).ready(function()
  {
    $('#simpan_wilayah').click(function()
    {
      var path = $('#path').val();
      $.ajax(
      {
        type: "POST",
        url: "<?=$form_action?>",
        dataType: 'json',
        data: {path},
      });
    });
  });

  var batasWilayah
  var map
  var gmaps

  var daerah_desa = <?=$desa['path'] ?: 'null' ?>

  daerah_desa && daerah_desa[0].map((arr, i) => {
    daerah_desa[i] = { lat: arr[0], lng: arr[1] }
  })

  function initMap() {
    gmaps = google.maps

    <?php if (!empty($desa['lat']) && !empty($desa['lng'])): ?>
      var center = { lat: <?=$desa['lat'].", lng: ".$desa['lng']?> };
    <?php else: ?>
      var center = { lat: -1.0546279422758742, lng: 116.71875000000001 };
    <?php endif; ?>
    
    var zoom = 15;
    map = new gmaps.Map($('#map')[0], {
      center,
      zoom,
      streetViewControl: false
    })
    
    <?php if (!empty($desa['path'])): ?>
      //Style polygon
      batasWilayah = new gmaps.Polygon({
        paths: daerah_desa,
        strokeColor: '#555555',
        strokeOpacity: 0.5,
        strokeWeight: 3,
        fillColor: '#8888dd',
        fillOpacity: 0.15,
        editable: true,
        draggable: true
      });

      batasWilayah.setMap(map)
      batasWilayah.addListener('mouseup', editPath)
      batasWilayah.addListener('dragend', editPath)
    <?php endif; ?>
  }

  function editPath() {
    const PATHS = this.getPath()
    const NEWPATH = []
    
    for (var i = 0; i < PATHS.getLength(); i++) {
      const { lat, lng } = PATHS.getAt(i)
      NEWPATH.push([lat(), lng()])
    }

    $('#path').val(JSON.stringify([NEWPATH]))
  }

  function polygonDelete() {
    batasWilayah.setMap(null)
    batasWilayah = null
    $('#path').val(null);
  }

  function polygonAdd() {
    const { lat, lng } = map.getCenter()

    // Clear existing polygon
    if (batasWilayah) polygonDelete()

    // Re new polygon in new position
    batasWilayah = new gmaps.Polygon({
      paths: [
        { lat: lat() - 0.001,   lng: lng() - 0.002 }, // Left
        { lat: lat() + 0.001, lng: lng() - 0.002 }, // Right
        { lat: lat() + 0.001, lng: lng() },         // Top
      ],
      strokeColor: '#555555',
      strokeOpacity: 0.5,
      strokeWeight: 3,
      fillColor: '#8888dd',
      fillOpacity: 0.15,
      editable: true,
      draggable: true
    });

    batasWilayah.setMap(map)
    batasWilayah.addListener('mouseup', editPath)
    batasWilayah.addListener('dragend', editPath)
  }

  function polygonReset() {
    // Clear existing polygon
    polygonDelete()

    // Create initial / last saved polygon
    batasWilayah = new gmaps.Polygon({
      paths: daerah_desa,
      strokeColor: '#555555',
      strokeOpacity: 0.5,
      strokeWeight: 3,
      fillColor: '#8888dd',
      fillOpacity: 0.15,
      editable: true,
      draggable: true
    });

    batasWilayah.setMap(map)
    batasWilayah.addListener('mouseup', editPath)
    batasWilayah.addListener('dragend', editPath)
  }
</script>
<style>
  #float-btn
  {
    position: absolute;
    top: 10px;
    right: 15%;
    z-index: 5;
    font-family: 'Roboto','sans-serif';
  }
  #float-btn button
  {
    line-height: 20px;
    margin: 1px 0;
    margin-right: -5px;
    padding: 10px 15px;
    background: #ffffff;
    border: none;
    border-radius: 2px;
    font-size: initial;
    box-shadow: 1px 1px 4px 0px silver;
  }
  #float-btn button:hover { background: #ddd }
  #map
  {
    width: 100%;
    height: 450px;
    border: 1px solid #000;
  }
</style>

<div class='modal-body'>
  <div class="row">
    <div class="col-sm-12">
      <div id="float-btn">
        <button type="button" onclick="polygonAdd()">Tambah</button>
        <button type="button" onclick="polygonDelete()">Hapus</button>
        <button type="button" onclick="polygonReset()">Reset</button>
      </div>
      <div id="map"></div>
      <input type="hidden" id="path" name="path" value="<?= $desa['path']?>">
    </div>
  </div>
</div>
<div class="modal-footer">
  <button type="reset" class="btn btn-radius btn-uppercase btn-danger btn-sm" data-dismiss="modal">Tutup</button>
  <button type="submit" class="btn btn-radius btn-uppercase btn-info btn-sm" data-dismiss="modal" id="simpan_wilayah">Simpan</button>
</div>
