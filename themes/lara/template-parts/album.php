<?php
	if(!defined('BASEPATH')) exit('No direct script access allowed');

	$gambar = $gallery;
	if (isset($_GET['album_id'])) {
		$gambar = $this->web_gallery_model->list_sub_gallery($_GET['album_id'], 0, $paging->offset, $paging->per_page);
	}
?>

<ul class="albums" style="padding-left:0;">
	<?php foreach ($albums as $album): ?>
	<li class="album-item" style="display:inline-block;list-style:none;"><a href="?album_id=<?=$album['id']?>"><?=$album['nama']?></a></li>
	<?php endforeach; ?>
</ul>

<div class="row">
<?php foreach ($gambar as $data): ?>
	<?php if (is_file(LOKASI_GALERI . "sedang_" . $data['gambar'])): ?>	
	<div class="col-sm-4">
		<div class="photo-wrap">
			<a href="<?= site_url('galeri/'.$data['id'].'/1'); ?>"><img src="<?= AmbilGaleri($data['gambar'],'kecil')?>" class="img-responsive cover-album" style="width:400px; height:200px"/></a>
			<div class="photo-info">
                <p><?php echo ucwords(character_limiter( $data['nama'], 30 ));?></p>
                <div class="portfolio-links">
                  	<a href="<?= AmbilGaleri($data['gambar'],'sedang')?>" data-lightbox="images" title="<?php echo ($data['nama']);?>"><i class="ti-eye"></i></a>
                </div>
            </div>
		</div>
	</div>	
	<?php endif; ?>
<?php endforeach; ?>
</div>