<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<!-- Widget Arsip -->
<?php
    $query = 'SELECT * FROM `dokumen` WHERE `kategori` <= 3 ORDER BY tgl_upload DESC LIMIT 5';
    $widgetDownloads = $this->db->query($query)->result_array();
?>
<?php if ($widgetDownloads) : ?>
<script src="<?php echo base_url();?>assets/js/axios.js"></script>
<script>
    function dokumen_download_redirect(satuan) {
        window.location.href = '<?= base_url() . LOKASI_DOKUMEN ?>' + satuan
    }
    function dokumen_download_hit(id) {
        axios.get('<?php echo site_url($this->theme_folder . '/' . $this->theme . '/dokhit.php?id=') ?>'+id).then(data => dokumen_download_redirect(data.data)).catch(e => console.log(e))
    }
</script>

<div class="footer-title"><a href="<?php echo base_url(); ?>downloads">Dokumen Publik</div>

    <div class="widget-arsip">
        <ul class="arsip-footer">
        <?php $kategori_nama = unserialize(KODE_KATEGORI); ?>
        <?php foreach ($widgetDownloads as $data) : ?>
        <?php
            $id_user = $this->db->query('select id_user from artikel where id = ?', $data['id'])->row_array();
            $id_user = $id_user['id_user'];
            $foto = $this->db->query('select foto from user where id = ?', $id_user)->row_array();
            $foto = $foto['foto'];
            echo $fofo;
        ?>
            <li>                                        
                <div class="list">
                    <div class="judul-arsip"><a onclick="dokumen_download_hit(<?php echo $data['id'] ?>)"><?= character_limiter( $data['nama'], 27 ); ?></a></div>
                    <div class="dlab-post-meta">
                        <ul>
                            <li class="post-cat">
                                <?php echo ucwords($kategori_nama[$data['kategori']]); ?>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
<?php endif; ?>