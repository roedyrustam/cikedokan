<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (isset($_GET['cek_nik'])) {
	header('content-type: application/json');

	$nik = $this->db
		->select('nik')
		->from('tweb_penduduk')
		->where('nik', (int) $_GET['cek_nik'])
		->get()->row_array() ? 'kk' : null;

	$kk = $this->db
		->select('no_kk')
		->from('tweb_keluarga')
		->where('no_kk', (int) $_GET['cek_nik'])
		->get()->row_array() ? 'kk' : null;

	if ($nik || $kk) {
		exit(json_encode(['nik' => $nik || $kk, 'type' => $nik ? 'nik' : 'kk']));
	}

	exit(json_encode(['nik' => null]));
}

if (isset($_GET['cek_bantuan'])) {
	header('content-type: application/json');

	$progban = $this->db
		->select('program_peserta.peserta AS kk, program_peserta.kartu_nik AS nik, program.nama AS program')
		->from('program_peserta')
		->join('program', 'program_peserta.program_id = program.id')
		->where('peserta', (int) $_GET['cek_bantuan'])
		->or_where('kartu_nik', (int) $_GET['cek_bantuan'])
		->get()->result_array();

	if ($progban) {
		exit(json_encode(['bantuan' => $progban]));
	}

	exit(json_encode(['bantuan' => $progban]));
}

?>

<?php $this->load->view($folder_themes . '/header'); ?>


<!-- Button trigger modal cari nik -->
<div class="nik-finder">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="caps-cari-nik">
                    Apakah NIK/KK Anda Sudah Terdaftar Pada Cikedokan Digital Service ?<br />
                    Silakan Cek NIK/KK Anda Apakah sudah Terdaftar Atau Terdaftar Sebagai Penerima Bantuan
                </div>
            </div>
            <div class="col-md-6">
                <div class="field-cari-nik">
                    <div class="input-group has-error">
                        <input id="cariNik" type="text" class="form-control cari-nik" placeholder="CARI NIK/KK"
                            autocomplete="off" />
                        <div class="input-group-btn">
                            <button class="btn btn-danger btn-cari-nik" type="button" id="cariNikButton"><i
                                    class="glyphicon glyphicon-search"></i> Cari NIK/KK</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div style="visibility: hidden;">
        <button id="modalNikAdaButton" type="button" data-toggle="modal" data-target="#modalNikAda">Launch
            modal</button>
        <button id="modalNikTidakAdaButton" type="button" data-toggle="modal" data-target="#modalNikTidakAda">Launch
            modal</button>
    </div>
</div>

<!-- Modal Cari Nik -->
<div class="modal fade" id="modalNikTidakAda" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="true">x</button>
                <div class="modal-title-non-nik" id="myModalLabel">{{tipe}} {{nik}} Tidak Terdaftar</div>
            </div>
            <div class="modal-body non-nik">
                <p>Maaf, NIK/KK yang anda cari belum ada pada sistem data kependudukan
                    <?php echo ucwords($this->setting->sebutan_desa) . " " ?><?php echo ucwords($desa['nama_desa']) ?>.
                </p>
                <p>Silakan hubungi Operator atau datang ke Kantor
                    <?php echo ucwords($this->setting->sebutan_desa) . " " ?> atau hubungi nomor telepon
                    <?php echo $desa['telepon'] ?> untuk melakukan pendataan data penduduk. </p>
                Terimakasih
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalNikAda" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="true">x</button>
                <div class="modal-title-nik" id="myModalLabel">{{tipe}} {{nik}} Telah Terdaftar</div>
            </div>
            <div class="modal-body nik-ada">
                <p>Selamat NIK/KK yang anda cari telah terdaftar pada sistem data kependudukan
                    <?php echo ucwords($this->setting->sebutan_desa) . " " ?><?php echo ucwords($desa['nama_desa']) ?>.
                </p>
                <div id="bantuan_list"></div>
                Terimakasih
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
let BASEMODAL1 = document.getElementById('modalNikAda').innerHTML
let BASEMODAL2 = document.getElementById('modalNikTidakAda').innerHTML

function cariNikTombol() {

    const NIK = document.getElementById('cariNik').value
    const modalNikAda = document.getElementById('modalNikAda')
    const modalNikTidakAda = document.getElementById('modalNikTidakAda')

    BASEMODAL1 = BASEMODAL1.replace('{{nik}}', NIK)
    BASEMODAL2 = BASEMODAL2.replace('{{nik}}', NIK)

    window.fetch(`?cek_nik=${NIK}`).then(res => res.json()).then(res => {

        modalNikAda.innerHTML = BASEMODAL1.replace('{{tipe}}', res.type)
        modalNikTidakAda.innerHTML = BASEMODAL2.replace('{{tipe}}', res.type)

        window.fetch(`?cek_bantuan=${NIK}`).then(res => res.json()).then(({
            bantuan
        }) => {
            const bantuan_list = document.getElementById('bantuan_list')
            const unorderedList = document.createElement('ul')

            const pesan = document.createElement('p')
            pesan.innerHTML = 'Maaf, Anda tidak terdata sebagai penerima bantuan.'

            if (bantuan.length) {
                pesan.innerHTML = 'Program bantuan dimiliki:'

                for (let i = 0; i < bantuan.length; i++) {
                    const childElm = document.createElement('li')
                    const {
                        kk,
                        nik,
                        program
                    } = bantuan[i]
                    const showKK = kk && 'KK: ' + kk
                    const showNIK = nik ? ' - NIK: ' + nik : ''

                    childElm.innerHTML = `${program} (${showKK}${showNIK})`
                    console.log(nik !== null);
                    unorderedList.appendChild(childElm)
                }

            }

            bantuan_list.appendChild(pesan)
            bantuan && bantuan_list.appendChild(unorderedList)
        })

        if (res.nik) {
            document.getElementById('modalNikAdaButton').click()
        } else {
            document.getElementById('modalNikTidakAdaButton').click()
        }
    })
}

document.getElementById('cariNikButton').addEventListener('click', cariNikTombol)
</script>

<!-- Pengumuman -->
<?php if ($count_pengumuman != 0) { ?>
<div class="container-default" id="pengumuman">
    <div class="container">
        <div class="heading">
            <div class="row">
                <div class="col-md-5 col-xs-3">
                    <hr style="border: 1px solid #dea80e;">
                </div>
                <div class="col-md-2 col-xs-6 text-center">
                    <div class="heading-pengumuman">
                        <a href="<?php echo get_kategori_url($data_pengumuman[$no]['id_kategori']); ?>"><?php echo ($data_pengumuman[$no = 0]['kategori']) ?>
                            <?php echo ucwords($this->setting->sebutan_desa) . " " ?></a>
                    </div>
                </div>
                <div class="col-md-5 col-xs-3">
                    <hr style="border: 1px solid #dea80e;">
                </div>
            </div>
        </div>
        <?php $this->load->view($folder_themes . '/pengumuman'); ?>
    </div>
</div>
<?php } ?>



<div class="container-default bg-gray" id="index-berita">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="page-content homepage">
                    <?php if ($data_kolom_kades) { ?>
                    <div class="row">
                        <?php foreach ($data_kolom_kades as $data) { ?>
                        <!-- item -->
                        <div class="col-sm-12 col-xs-12">
                            <div class="kolom-kades">
                                <div class="judul"><a
                                        href="<?php echo get_artikel_url($data['id'], $data['id_kategori']); ?>"><?php echo ucwords(character_limiter($data['judul'], 50)); ?></a>
                                </div>
                                <?php echo ucwords(character_limiter($data['isi'], 200)); ?>
                                <?php $sambutan = $this->db->query('select * from sambutan where id_artikel = ?', $data["id"])->row_array();
										if ($sambutan) : ?>
                                <div class="pic">
                                    <img src="<?= site_url('desa/upload/sambutan/' . $sambutan['foto_sambutan']) ?>"
                                        alt="" class="foto-kades">
                                    <div class="pic-body">
                                        <div class="nama-kades"><?php echo $sambutan['pemberi_sambutan']; ?></div>
                                        <p><?php echo $sambutan['jabatan_sambutan']; ?></p>
                                    </div>
                                </div>
                                <?php endif ?>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    <?php } ?>

                    <?php if (file_exists(FCPATH . 'desa/upload/widget/home_banner.jpg')) : ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="web-banner">
                                <a href="<?php echo base_url('desa/upload/widget/home_banner.jpg'); ?>"
                                    data-lightbox="images">
                                    <img src="<?php echo base_url('desa/upload/widget/home_banner.jpg'); ?>"
                                        class="img-fluid">
                                </a>
                            </div>
                        </div>
                    </div>

                    <?php endif ?>

                    <?php if ($data_artikels) { ?>
                    <?php foreach ($data_artikels as $data) { ?>
                    <div class="card login-card article-list-card">
                        <div class="row no-gutters">
                            <div class="col-md-6 col-xs-5">
                                <a href="<?php echo get_artikel_url($data['id'], $data['id_kategori']); ?>">
                                    <img src="<?php echo thumbnail_uri($data['gambar'], 600, 350) ?>"
                                        class="img-responsive img-article-list" alt="<?php echo $data['judul'] ?>">
                                </a>
                            </div>
                            <div class="col-md-6 col-xs-7">
                                <div class="row">
                                    <div class="top-block-article-list">
                                        <div class="brand-wrapper article-list-title">
                                            <a href="<?php echo get_artikel_url($data['id'], $data['id_kategori']); ?>">
                                                <?php echo ucwords(character_limiter($data['judul'], 35)); ?>
                                            </a>
                                        </div>
                                        <div class="top-meta-article-list">
                                            <div class="row">
                                                <div class="col-md-8 col-xs-12">
                                                    <div class="post-date">
                                                        <i class="ti-calendar"></i>
                                                        <?php echo hari($data['tgl_upload']); ?>,
                                                        <?php echo tgl_indo2($data['tgl_upload']); ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-xs-4 hidden-xs">
                                                    <div class="post-hit">
                                                        <i class="ti-eye"></i> <?php echo ucwords($data['hit']); ?>
                                                        Dibaca
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-body artice-list-body hidden-xs">
                                        <p class="description-artice-list">
                                            <?= ucwords(character_limiter($data['isi'], 280)); ?>
                                        </p>
                                    </div>

                                    <div class="bottom-block-article-list hidden-xs">
                                        <div class="bottom-meta-article-list">
                                            <div class="row">
                                                <div class="col-md-6 col-xs-5">
                                                    <div class="post-owner">
                                                        <i class="ti-user"></i> <?php echo ($data['owner']); ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-xs-">
                                                    <div class="post-cat">
                                                        <i class="ti-agenda"></i>
                                                        <?php if (trim($data['kategori']) != '') : ?>
                                                        <a href="<?php echo get_kategori_url($data['id_kategori']); ?>"
                                                            class="cat-label"><?php echo ucwords($data['kategori']); ?></a>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>

                    <div class="clearfix"></div>

                    <div class="loader-button text-center">
                        <a href="<?php echo site_url('berita') ?>" class="btn btn-primary btn-mandiri btn-sm">Tampilkan
                            Semua</span></a>
                    </div>
                    <hr />
                    <?php } ?>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-md-4">
                <div class="widget bg-white p-a20 recent-posts-entry homepage-widget">
                    <div class="widget-title style-1">Peta Wilayah
                        <?php echo ucwords($this->setting->sebutan_desa) . " " ?><?php echo ucwords($desa['nama_desa']) ?>
                    </div>
                    <div class="widget-post-bx">
                        <?php include('widgets/peta_wilayah_desa.php'); ?>
                    </div>
                </div>
                <div class="widget bg-white p-a20 recent-posts-entry homepage-widget">
                    <div class="widget-title style-1">Agenda
                        <?php echo ucwords($this->setting->sebutan_desa) . " " ?><?php echo ucwords($desa['nama_desa']) ?>
                    </div>
                    <div class="widget-post-bx">
                        <?php include('widgets/agenda.php'); ?>
                    </div>
                </div>
                <div class="widget bg-white p-a20 recent-posts-entry homepage-widget">
                    <div class="widget-title style-1">Kategori</div>
                    <div class="widget-post-bx">
                        <?php include('widgets/menu_kategori.php'); ?>
                    </div>
                </div>
                <div class="widget bg-white p-a20 recent-posts-entry homepage-widget">
                    <div class="widget-title style-1">Arsip Publik</div>
                    <div class="widget-post-bx">
                        <?php include('widgets/download.php'); ?>
                    </div>
                </div>
                <div class="widget bg-white p-a20 recent-posts-entry homepage-widget">
                    <div class="widget-title style-1">Polling</div>
                    <div class="widget-post-bx">
                        <?php include('widgets/polling.php'); ?>
                    </div>
                </div>
                <div class="widget bg-white p-a20 recent-posts-entry homepage-widget">
                    <div class="widget-title style-1">Artikel Popular</div>
                    <div class="widget-post-bx">
                        <?php include('widgets/popular_artikel.php'); ?>
                    </div>
                </div>
                <div class="widget bg-white p-a20 recent-posts-entry homepage-widget">
                    <div class="widget-title style-1">Statistik Pengunjung</div>
                    <div class="widget-post-bx">
                        <?php include('widgets/statistik_pengunjung.php'); ?>
                    </div>
                </div>
            </div>
            <!-- Sidebar -->
        </div>
    </div>
</div>

<!-- Perangkat Desa -->
<div class="container-default bg-white">
    <div class="container">
        <?php $this->load->view($folder_themes . '/struktur'); ?>
    </div>
</div>

<!-- Laporan Warga -->
<?php if ($count_panduan != 0) {
	echo '<div class="container-default section-layanan">
				<div class="container">';
	$this->load->view($folder_themes . '/layanan');
	echo '	</div>
			</div>';
}
?>

<!-- Video -->
<?php if ($count_video != 0) {
	echo '<div class="container-default bg-white section-video">
				<div class="container">';
	$this->load->view($folder_themes . '/videos');
	echo '	</div>
			</div>';
}
?>

<!-- Potensi -->
<?php if ($count_potensi != 0) {
	echo '<div class="container-default section-potensi">
				<div class="container">';
	$this->load->view($folder_themes . '/potensi');
	echo '	</div>
			</div>';
}
?>

<!-- Pembangunan -->
<?php if ($count_pembangunan != 0) {
	echo '<div class="container-default bg-white section-pembangunan">
				<div class="container">';
	$this->load->view($folder_themes . '/table-pembangunan');
	echo '	</div>
			</div>';
}
?>

<!-- Gallery Slide -->
<?php if ($count_galeri != 0) {
	echo '<div class="container-default">';
	$this->load->view($folder_themes . '/template-parts/slider/slide-gallery');
	echo '	</div>';
}
?>

<!-- Laporan Warga -->
<?php if ($count_lapor != 0) {
	echo '<div class="container-default section-laporan">
				<div class="container">';
	$this->load->view($folder_themes . '/laporan_ditindak');
	echo '	</div>
			</div>';
}
?>

<!-- Komentar -->
<?php if ($count_komentar != 0) {
	echo '<div class="container-default bg-white">
				<div class="container">';
	$this->load->view($folder_themes . '/testimoni');
	echo '	</div>
			</div>';
}
?>

<!-- end container -->
<div class="container-default section-apbdes">
    <?php $this->load->view($folder_themes . '/apbdes2'); ?>
</div>

<?php $this->load->view($folder_themes . '/template-parts/slider/sinergi-program'); ?>

<?php $this->load->view($folder_themes . '/footer'); ?>