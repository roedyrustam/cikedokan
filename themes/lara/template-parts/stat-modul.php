<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
$penduduk = $this->db->query('SELECT COUNT(id) AS jumlah FROM tweb_penduduk WHERE status_dasar = 1')->result_array()[0]['jumlah'];
?>

<script>
  jQuery(document).ready(function($) {
    var owl = $('.statistik-widget');
      owl.on('initialize.owl.carousel initialized.owl.carousel ' +
      'initialize.owl.carousel initialize.owl.carousel ' +
      'resize.owl.carousel resized.owl.carousel ' +
      'refresh.owl.carousel refreshed.owl.carousel ' +
      'update.owl.carousel updated.owl.carousel ' +
      'drag.owl.carousel dragged.owl.carousel ' +
      'translate.owl.carousel translated.owl.carousel ' +
      'to.owl.carousel changed.owl.carousel',
      function(e) {
        $('.' + e.type)
        .removeClass('secondary')
        .addClass('success');
        window.setTimeout(function() {
          $('.' + e.type)
            .removeClass('success')
            .addClass('secondary');
          }, 3000);
      });
      owl.owlCarousel({
        loop: true,
        nav: false,
        dots: false,
        lazyLoad: true,
        autoplay: true,
        autoplayTimeout: 4000,
        autoplayHoverPause: true,
        margin: 20,
        video: true,
        responsive:{
          0:{ 
            items:1
          },
                    480:{
            items:2
          },
                    800:{
            items:3
          },
          980:{
            items:4
          },
                    1336:{
            items:4
          }
        }
      });
    });
</script>


<div class="top-widget">
    <div class="container">
        <div class="">
            <div class="statistik-widget owl-carousel">
              <div class="item">
                <div class="stat-box bg-info">
                    <div class="inner">
                        <div class="stat-value">
                            <?= number_format($penduduk,0,'', '.')?>
                        </div>
                        <p class="stat-title">Penduduk</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person"></i>
                    </div>
                </div>
            </div>

            <div class="item">
                <div class="stat-box bg-success">
                    <div class="inner">
                        <div class="stat-value">
                            <?php foreach ($keluarga as $data): ?>
                                <?= number_format($data['jumlah'],0,'', '.')?>
                            <?php endforeach; ?>
                        </div>
                        <p class="stat-title">Keluarga</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-ios-people"></i>
                    </div>
                </div>
            </div>

            <div class="item">
                <div class="stat-box bg-warning">
                    <div class="inner">
                        <div class="stat-value">
                            <?php foreach ($rtm as $data): ?>
                                <?= number_format($data['jumlah'],0,'', '.')?>
                            <?php endforeach; ?>
                        </div>
                        <p class="stat-title">Rumah Tangga</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-ios-home"></i>
                    </div>
                </div>
            </div>

            <div class="item">
                <div class="stat-box bg-danger">
                    <div class="inner">
                        <div class="stat-value">
                            <?php foreach ($dusun as $data): ?>
                                <?= number_format($data['jumlah'],0,'', '.')?>
                            <?php endforeach; ?>
                        </div>
                        <p class="stat-title">Wilayah <?php echo ucwords($this->setting->sebutan_dusun)." "?></p>
                    </div>
                    <div class="icon">
                        <i class="ti-map-alt"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>