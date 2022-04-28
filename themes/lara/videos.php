<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>
	
<script>
  jQuery(document).ready(function($) {
    var owl = $('.konten_video');
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
		    autoplay: false,
        autoplayTimeout: 6000,
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
            items:3
          }
        }
      });
    });
</script>


<div class="pengumumanslide">
  <div class="section-head text-center ">
    <h2 class="title" >Konten Video</h2>
		<div class="dlab-separator-outer ">
			<div class="dlab-separator bg-primary style-skew"></div>
		</div>
	</div>

  <div class="konten_video owl-carousel owl-theme">
  <?php foreach ($data_video as $data) { ?>
    <div class="about-cols">
      <div class="about-col">
        <div class="img">
          <a href="<?php echo get_artikel_url($data['id'], $data['id_kategori']); ?>">
            <img src="https://img.youtube.com/vi/<?php echo $data['link_embed']; ?>/hqdefault.jpg" class="img-responsive" alt="<?php echo $data['judul'] ?>">
        </a>
          <div class="icon"><i class="fa fa-youtube-play"></i></div>
        </div>
        <div class="title-youtube">
          <a href="<?php echo get_artikel_url($data['id'], $data['id_kategori']); ?>">
            <?php echo character_limiter($data['judul'], 40); ?>
          </a>
        </div>
      </div>
    </div>
  <?php } ?>
  </div>
</div>