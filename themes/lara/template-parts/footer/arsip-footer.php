<div class="footer-title">Arsip Artikel</div>
<?php if ($arsip): ?>
<div class="widget-arsip">
    <ul class="arsip-footer">
    <?php foreach ($arsip as $data): ?>
        <li>                                        
            <div class="list">
                <div class="judul-arsip"><a href="<?php echo get_artikel_url( $data['id'], $data['id_kategori'] ); ?>"><?= character_limiter( $data['judul'], 27 ); ?></a></div>
                <div class="dlab-post-meta">
                    <ul>
                        <li class="post-date"><?php echo tgl_indo( $data['tgl_upload'] ); ?></li>
                        <li class="post-cat">
                        <?php if ( trim($data['kategori'] ) != ''): ?>
                            <a href="<?php echo get_kategori_url( $data['id_kategori'] ); ?>" class="cat-label"><?php echo ucwords( $data['kategori'] ); ?></a>
                        <?php endif; ?>
                        </li>
                    </ul>
                </div>
            </div>
        </li>
    <?php endforeach; ?>
    </ul>
</div>
<?php endif; ?>