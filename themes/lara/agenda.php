<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<script>
  jQuery(document).ready(function($) {
    var owl = $('.slideagenda');
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
            items:3
          }
        }
      });
    });
</script>

<div class="agendaslide">
	<div class="section-head text-center ">
		<h2 class="title"><span class="ftitle">Agenda</span> <span class="stitle"><?php echo ucwords($desa['nama_desa'])?></span></h2>
		<div class="dlab-separator-outer ">
			<div class="dlab-separator bg-primary style-skew"></div>
		</div>
	</div>

  	<div class="slideagenda owl-carousel owl-theme">
  	<?php foreach ($data_agenda as $data) { ?>
  		<div class="blog-image">
  			<div class="row">
  				<div class="col-md-3">
  					<div class="meta-list-agenda">
  						<div class="bln-list-agenda">
			        		<?php echo bln_short($data['tgl_agenda']); ?>-<?php echo thn($data['tgl_agenda']); ?>
			    		</div>
			        	<div class="tgl-list-agenda">
			          		<?php echo tgl($data['tgl_agenda']); ?>
			        	</div>			        
  					</div>
  				</div>
				<div class="col-md-9">
					<div class="row">      
			    		<div class="body-list-agenda">
			        		<div class="judul-list-agenda">
			        			<a href="<?php echo get_artikel_url($data['id'], $data['id_kategori']); ?>"><?php echo character_limiter($data['judul'], 40); ?></a>
			        		</div>
			        		<div class="lokasi-list-agenda">
			        			<span class="iconlokasi"><i class="fa fa-map-marker"></i></span> <?php echo ($data['lokasi_kegiatan']); ?>
			        		</div>
			    		</div>
			  		</div>
		  		</div>
	  		</div>
    	</div>
  	<?php } ?>
  	</div>
</div>