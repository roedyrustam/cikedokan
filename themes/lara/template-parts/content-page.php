<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>


<div class="panel panel-default">
	<div class="panel-title">
		<div class="single-title"><?php echo ($content['judul']); ?></div>
	</div>
	<div class="panel-body">
		<a href="<?php echo base_url().LOKASI_FOTO_ARTIKEL.'sedang_'.$content['gambar']; ?>" data-lightbox="images" data-title="<?php echo $page_header; ?>">
		<?php if(is_file(LOKASI_FOTO_ARTIKEL.'sedang_'.$content['gambar'])) { ?>
			<img width="100%" class="img-responsive gambar-utama" src="<?php echo base_url().LOKASI_FOTO_ARTIKEL.'sedang_'.$content['gambar']; ?>" alt="<?php echo $content['judul']; ?>">
		<?php } ?>
		</a>
		
		<div class="artikel-single">
			<?php echo htmlspecialchars_decode( $content['isi'] ); ?>
			
			<?php if($content['gambar1']!='' and is_file(LOKASI_FOTO_ARTIKEL."sedang_".$content['gambar1'])): ?>
				<div class="gambar-sampul2"><a class="img-responsive" href="<?php echo base_url().LOKASI_FOTO_ARTIKEL.'sedang_'.$content['gambar1']; ?>" title=""><img src="<?php echo base_url().LOKASI_FOTO_ARTIKEL.'sedang_'.$content['gambar1']; ?>" class="img-responsive"/></a>
				</div>
			<?php endif; ?>
			<?php if($content['gambar2']!='' and is_file(LOKASI_FOTO_ARTIKEL."sedang_".$content['gambar2'])): ?>
				<div class="gambar-sampul2"><a class="img-responsive" href="<?php echo base_url().LOKASI_FOTO_ARTIKEL.'sedang_'.$content['gambar2']; ?>" title=""><img src="<?php echo base_url().LOKASI_FOTO_ARTIKEL.'sedang_'.$content['gambar2']; ?>" class="img-responsive"/></a>
				</div>
			<?php endif; ?>
			<?php if($content['gambar3']!='' and is_file(LOKASI_FOTO_ARTIKEL."sedang_".$content['gambar3'])): ?>
				<div class="gambar-sampul2"><a class="img-responsive" href="<?php echo base_url().LOKASI_FOTO_ARTIKEL.'sedang_'.$content['gambar3']; ?>" title=""><img src="<?php echo base_url().LOKASI_FOTO_ARTIKEL.'sedang_'.$content['gambar2']; ?>" class="img-responsive"/></a>
				</div>
			<?php endif; ?>
			
			<?php if($content['dokumen']!='' and is_file(LOKASI_DOKUMEN.$content['dokumen'])): ?>
				<hr/><p>Dokumen Lampiran : <a href="<?= base_url().LOKASI_DOKUMEN.$content['dokumen']?>" title=""><?= $content['link_dokumen']?></a></p>
				<br/>
			<?php endif; ?>
		</div>
		<!-- Social Media Share Section Start -->	
		<div class="sosmed-share">
			<div class="social-share">
				<a name="fb_share" href="http://www.facebook.com/sharer.php?u=<?= site_url().'berita/detail/'.$content['kategori_slug'].'/'. $content['slug']?>" target="_blank" class="fa fa-facebook"></a>
				<a href="http://twitter.com/share?url=<?= site_url().'berita/detail/'.$content['kategori_slug'].'/'. $content['slug']?>" target="_blank" class="fa fa-twitter"></a>
				<a href="https://api.whatsapp.com/send?text=<?= site_url().'berita/detail/'.$content['kategori_slug'].'/'. $content['slug']?>" target="_blank" class="fa fa-whatsapp"></a>
				<a href="https://t.me/share/url?url=<?= site_url().'berita/detail/'.$content['kategori_slug'].'/'. $content['slug']?>" target="_blank" class="fa fa-telegram"></a>
			</div>
		</div>

		<!-- Social Media Share Section End -->		
	</div>
</div>