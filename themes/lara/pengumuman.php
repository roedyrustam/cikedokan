<script>
  jQuery(document).ready(function($) {
    var owl = $('.slidepengumuman');
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
        nav: true,
        navText: [
        '<i class="fa fa-angle-left" aria-hidden="true"></i>',
        '<i class="fa fa-angle-right" aria-hidden="true"></i>'
    ],
    navContainer: '.custom-nav',
        dots: false,
        lazyLoad: true,
				autoplay: true,
        autoplayTimeout: 5000,
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
            items:1
          }
        }
      });
    });
</script>

<div class="pengumumanslide box-pengumuman">
    <div class="head-pengumuman hidden-xs">
      <div class="pheading">PENGUMUMAN</div>
        <span class="custom-nav"></span>
    </div> 
    <div class="slidepengumuman owl-carousel owl-theme">
    <?php foreach ($data_pengumuman as $data) { ?>
      <div class="title-pengumuman">
        <a href="<?php echo get_artikel_url($data['id'], $data['id_kategori']); ?>"><?php echo character_limiter($data['judul'], 80); ?></a> - <span class="pmeta"><?php echo hari( $data['tgl_upload'] ); ?>, <?php echo tgl_indo2( $data['tgl_upload'] ); ?></span>
      </div>
    <?php } ?>
    </div>
</div>