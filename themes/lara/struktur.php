<script>
  jQuery(document).ready(function($) {
    var owl = $('.slide-aparatur');
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
                items:4
          }
        }
      });
    });
</script>

<div class="pengumumanslide">
    <div class="section-head text-center ">
        <h2 class="title">Perangkat <?php echo ucwords($desa['nama_desa'])?></h2>
        <div class="dlab-separator-outer ">
            <div class="dlab-separator bg-primary style-skew"></div>
        </div>
    </div>
    <div class="slide-aparatur owl-carousel owl-theme">
    <?php $this->load->model('pamong_model');
        $pamong_desa = $this->pamong_model->list_data();?>  
    <?php foreach ($pamong_desa as $data): ?>
        <div class="member">
            <div class="pic">
            <?php if ($data['foto']): ?>
                <img src="<?=AmbilFoto($data['foto'], "besar")?>" alt="User Image" class="cimg-fluid"/>
            <?php else: ?>
                <img src="<?= base_url()?>assets/files/user_pict/kuser.png" alt="User Image" class="img-fluid"/>
            <?php endif ?>
            </div>
            <div class="member-info">
                <div class="member-nama"><?= $data['nama']?></div>
                <span><?= $data['jabatan']?></span>
                <div class="member-ttl">
                    <?= $data['tempatlahir'].', '.tgl_indo($data['tanggallahir'])?>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    </div>
</div>