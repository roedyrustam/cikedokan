<script type="text/javascript" src="<?=base_url()?>assets/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
    tinymce.init({
        selector: 'textarea',
        height: 500,
        theme: 'modern',
        plugins: [
        "advlist autolink link image lists charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
        "table contextmenu directionality emoticons paste textcolor responsivefilemanager code"
        ],
        toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
        toolbar2: "| responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code | fontselect fontsizeselect",
        image_advtab: true,
        external_filemanager_path: "<?=base_url()?>assets/filemanager/",
        filemanager_title: "Responsive Filemanager",
        filemanager_access_key: "<?=config_item('file_manager')?>",
        external_plugins: {
            "filemanager": "<?=base_url()?>assets/filemanager/plugin.min.js"
        },
        templates: [{
            title: 'Test template 1',
            content: 'Test 1'
        },
        {
            title: 'Test template 2',
            content: 'Test 2'
        }
        ],
        content_css: [
        '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
        ],
        relative_urls : false,
        remove_script_host : false
    });

    $(document).ready(function() {
       $(".tgl_kegiatan").datetimepicker({
        format: "DD-MM-YYYY HH:mm:ss",
        locale: "id"
    });
       $(".tgl_posting").datetimepicker({
        format: "DD-MM-YYYY HH:mm:ss",
        locale: "id"
    });
   });
</script>
<div class="content-wrapper">
    <section class="content-header">
        <div class="title-header">Form Artikel : <?php if ($kategori): ?><?=$kategori['kategori'];?><?php else: ?>Artikel Statis<?php endif;?>
    </div>
    <ol class="breadcrumb">
        <li><a href="<?=site_url('hom_sid')?>"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="<?=site_url("web/index/$cat")?>"> Daftar Artikel</a></li>
        <li class="active">Form Artikel</li>
    </ol>
</section>
<section class="content" id="maincontent">
    <form id="validasi" action="<?=$form_action?>" method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-8">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <a href="<?=site_url("web/index/$cat")?>" class="btn btn-radius btn-uppercase btn-info btn-sm btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"
                            title="Tambah Artikel">Kembali ke Daftar Artikel</a>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label class="control-label" for="judul">Judul Artikel</label>
                            <input id="judul" name="judul" class="form-control input-sm required" type="text"
                            placeholder="Judul Artikel" value="<?=$artikel['judul']?>"></input>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="kode_desa">Isi Artikel</label>
                            <textarea name="isi" class="form-control input-sm" style="height:350px;">
                                <?=$artikel['isi']?>
                            </textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="box box-info collapsed-box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Unggah Gambar</h3>
                        <div class="box-tools">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                class="fa fa-plus"></i></button>
                            </div>
                        </div>
                        <div class="box-body no-padding">
                            <div class="col-sm-12">
                                <div class="form-group">
                                <?php if ($artikel['gambar']): ?>
                                    <input type="hidden" name="old_gambar" value="<?=$artikel['gambar']?>">
                                    <img class="profile-user-img img-responsive img-circle" src="<?=AmbilFotoArtikel($artikel['gambar'], 'kecil')?>" alt="Gambar Utama">
                                    <p class="text-center"><label class="control-label"><input type="checkbox" name="gambar_hapus" value="<?=$artikel['gambar']?>" /> Hapus Gambar</label></p>
                                <?php else: ?>
                                    <img class="profile-user-img img-responsive img-circle" src="<?=base_url()?>assets/files/logo/home.png" alt="Tidak Ada Gambar">
                                <?php endif;?>
                                    <label class="control-label" for="gambar">Gambar Utama</label>
                                    <div class="input-group input-group-sm">
                                        <input type="text" class="form-control" id="file_path">
                                        <input type="file" class="hidden" id="file" name="gambar">
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-info btn-flat" id="file_browser" style="border-top-left-radius:0;border-bottom-left-radius:0"><i class="fa fa-search"></i> Browse</button>
                                        </span>
                                    </div>
                                    <div class="form-group" style="padding-top: 5px;">
                                        <label class="control-label" for="caption">Caption Gambar Utama</label>
                                        <input id="caption" name="caption" class="form-control input-sm" type="text" placeholder="Masukan Caption Gambar Utama" value="<?=$artikel['caption']?>"></input>
                                    </div>
                                </div>                                        
                            </div>
                            
                            <div class="col-sm-12">
                                <div class="form-group">
                                <?php if ($artikel['gambar1']): ?>
                                    <input type="hidden" name="old_gambar1" value="<?=$artikel['gambar1']?>">
                                    <img class="profile-user-img img-responsive img-circle" src="<?=AmbilFotoArtikel($artikel['gambar1'], 'kecil')?>" alt="Gambar Utama">
                                    <p class="text-center"><label class="control-label"><input type="checkbox" name="gambar1_hapus" value="<?=$artikel['gambar1']?>" /> Hapus Gambar</label></p>
                                <?php else: ?>
                                    <img class="profile-user-img img-responsive img-circle" src="<?=base_url()?>assets/files/logo/home.png" alt="Tidak Ada Gambar">
                                <?php endif;?>
                                    <label class="control-label" for="gambar1">Gambar Tambahan</label>
                                    <div class="input-group input-group-sm">
                                        <input type="text" class="form-control" id="file_path1">
                                        <input type="file" class="hidden" id="file1" name="gambar1">
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-info btn-flat" id="file_browser1" style="border-top-left-radius:0;border-bottom-left-radius:0"><i class="fa fa-search"></i> Browse</button>
                                        </span>
                                    </div>
                                    <div class="form-group" style="padding-top: 5px;">
                                        <label class="control-label" for="caption1">Caption Gambar Tambahan</label>
                                        <input id="caption1" name="caption1" class="form-control input-sm" type="text" placeholder="Masukan Caption Gambar Utama" value="<?=$artikel['caption1']?>"></input>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-sm-12">                                
                                <div class="form-group">
                                <?php if ($artikel['gambar2']): ?>
                                    <input type="hidden" name="old_gambar2" value="<?=$artikel['gambar2']?>">
                                    <img class="profile-user-img img-responsive img-circle" src="<?=AmbilFotoArtikel($artikel['gambar2'], 'kecil')?>" alt="Gambar Utama">
                                    <p class="text-center"><label class="control-label"><input type="checkbox" name="gambar2_hapus" value="<?=$artikel['gambar2']?>" /> Hapus Gambar</label></p>
                                <?php else: ?>
                                    <img class="profile-user-img img-responsive img-circle" src="<?=base_url()?>assets/files/logo/home.png" alt="Tidak Ada Gambar">
                                <?php endif;?>
                                    <label class="control-label" for="gambar2">Gambar Tambahan</label>
                                    <div class="input-group input-group-sm">
                                        <input type="text" class="form-control" id="file_path2">
                                        <input type="file" class="hidden" id="file2" name="gambar2">
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-info btn-flat" id="file_browser2" style="border-top-left-radius:0;border-bottom-left-radius:0"><i class="fa fa-search"></i> Browse</button>
                                        </span>
                                    </div>
                                    <div class="form-group" style="padding-top: 5px;">
                                        <label class="control-label" for="caption2">Caption Gambar Tambahan</label>
                                        <input id="caption2" name="caption2" class="form-control input-sm" type="text" placeholder="Masukan Caption Gambar Utama" value="<?=$artikel['caption2']?>"></input>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-sm-12">
                                <div class="form-group">
                                <?php if ($artikel['gambar3']): ?>
                                    <input type="hidden" name="old_gambar3" value="<?=$artikel['gambar3']?>">
                                    <img class="profile-user-img img-responsive img-circle" src="<?=AmbilFotoArtikel($artikel['gambar3'], 'kecil')?>" alt="Gambar Utama">
                                    <p class="text-center"><label class="control-label"><input type="checkbox" name="gambar3_hapus" value="<?=$artikel['gambar3']?>" /> Hapus Gambar</label></p>
                                <?php else: ?>
                                    <img class="profile-user-img img-responsive img-circle" src="<?=base_url()?>assets/files/logo/home.png" alt="Tidak Ada Gambar">
                                <?php endif;?>
                                    <label class="control-label" for="gambar3">Gambar Tambahan</label>
                                    <div class="input-group input-group-sm">
                                        <input type="text" class="form-control" id="file_path3">
                                        <input type="file" class="hidden" id="file3" name="gambar3">
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-info btn-flat" id="file_browser3" style="border-top-left-radius:0;border-bottom-left-radius:0"><i class="fa fa-search"></i> Browse</button>
                                        </span>
                                    </div>
                                    <div class="form-group" style="padding-top: 5px;">
                                        <label class="control-label" for="caption3">Caption Gambar Tambahan</label>
                                        <input id="caption3" name="caption3" class="form-control input-sm" type="text" placeholder="Masukan Caption Gambar Utama" value="<?=$artikel['caption3']?>"></input>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <?php if ($cat == 987): ?>
                    <input name="id_sambutan" type="hidden" value="<?=$artikel['id_sambutan']?>">
                        <div class="box box-info">
                            <div class="box-header with-border">
                                <h3 class="box-title">Pengaturan Sambutan / Himbauan</h3>
                                <div class="box-tools">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                </div>
                            </div>
                        <div class="box-body no-padding">
                            <div class="col-sm-12">
                                <div class="form-group">                                                                                
                                    <label class="control-label" for="pemberi_sambutan">Pemberi Sambutan / Himbauan</label>
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-addon" style="border-bottom-right-radius: 0;border-top-right-radius: 0;"><i class="fa fa-user"></i></div>
                                        <input class="form-control input-sm pull-right" name="pemberi_sambutan" type="text" required placeholder="Masukan Nama Pemberi Sambutan / Himbauan" value="<?=$artikel['pemberi_sambutan']?>">
                                    </div>
                                    <span class="help-block"><code>(Isikan Nama Pemberi Sambutan / Himbauan)</code></span>

                                    <label class="control-label" for="jabatan_sambutan">Jabatan Pemberi Sambutan / Himbauan</label>
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-addon" style="border-bottom-right-radius: 0;border-top-right-radius: 0;"><i class="fa fa-bookmark"></i></div>
                                        <input class="form-control input-sm pull-right" name="jabatan_sambutan" type="text" required placeholder="Masukan Jabatan Pemberi Sambutan / Himbauan" value="<?=$artikel['jabatan_sambutan']?>">
                                    </div>
                                    <span class="help-block"><code>(Isikan Jabatan Pemberi Sambutan / Himbauan)</code></span>

                                     <div class="form-group">
                                                                                <label class="control-label" for="foto_sambutan">Foto Pemberi Sambutan / Himbauan</label>
                                                                                <div class="input-group input-group-sm">
                                                                                    <input type="text" class="form-control" id="file_path5">
                                                                                    <input type="file" class="hidden" id="file5" name="foto_sambutan">
                                                                                    <span class="input-group-btn">
                                                                                        <button type="button" class="btn btn-info btn-flat" id="file_browser5"><i class="fa fa-search"></i> Browse</button>
                                                                                    </span>
                                                                                </div>
                                                                                <div class="foto-sambutan">
                                                                                    <img class="pic-pemberi-sambutan img-responsive img-circle" src="<?=site_url('desa/upload/sambutan/'.$artikel['foto_sambutan']) ?>" alt="Foto Pemberi Sambutan">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php endif;?>

                                                    <?php if ($cat == 1000): ?>
                                                        <div class="box box-info">
                                                            <div class="box-header with-border">
                                                                <h3 class="box-title">Pengaturan Agenda Desa</h3>
                                                                <div class="box-tools">
                                                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                                                        class="fa fa-minus"></i></button>
                                                                    </div>
                                                                </div>
                                                                <div class="box-body no-padding">
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group">
                                                                            <input class="form-control input-sm pull-right" name="id_agenda" type="hidden" value="<?=$artikel['id_agenda']?>">
                                                                            <label class="control-label" for="tgl_agenda">Tanggal Kegiatan</label>
                                                                            <div class="input-group input-group-sm date">
                                                                                <div class="input-group-addon" style="border-bottom-right-radius: 0;border-top-right-radius: 0;"><i class="fa fa-calendar-check-o"></i></div>
                                                                                <input class="form-control input-sm pull-right tgl_kegiatan" name="tgl_agenda" type="text" value="<?=$artikel['tgl_agenda']?>" required>
                                                                            </div>
                                                                            <span class="help-block"><code>(Isikan Tanggal Kegiatan)</code></span>
                                                                            <label class="control-label" for="lokasi_kegiatan">Lokasi Kegiatan</label>
                                                                            <div class="input-group input-group-sm">
                                                                                <div class="input-group-addon" style="border-bottom-right-radius: 0;border-top-right-radius: 0;"><i class="fa fa-map-marker"></i></div>
                                                                                <input class="form-control input-sm pull-right" name="lokasi_kegiatan"
                                                                                type="text" placeholder="Masukan lokasi tempat dilakukan kegiatan"
                                                                                value="<?=$artikel['lokasi_kegiatan']?>">
                                                                            </div>
                                                                            <span
                                                                            class="help-block"><code>(Isikan Lokasi Tempat Dilakukan Kegiatan)</code></span>
                                                                            <label class="control-label" for="koordinator_kegiatan">Koordinator Kegiatan</label>
                                                                            <div class="input-group input-group-sm">
                                                                                <div class="input-group-addon" style="border-bottom-right-radius: 0;border-top-right-radius: 0;"><i class="fa fa-user"></i></div>
                                                                                <input class="form-control input-sm pull-right" name="koordinator_kegiatan"
                                                                                type="text" placeholder="Masukan nama koordinator"
                                                                                value="<?=$artikel['koordinator_kegiatan']?>">
                                                                            </div>
                                                                            <span class="help-block"><code>(Isikan Koordinator Kegiatan)</code></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php endif;?>

                                                        <?php if ($cat == 1001): ?>
                                                            <input name="id_potensi" type="hidden" value="<?=$artikel['id_potensi']?>">
                                                            <div class="box box-info">
                                                                <div class="box-header with-border">
                                                                    <h3 class="box-title">Pengaturan Produk & Potensi <?php echo ucwords($this->setting->sebutan_desa)." "?></h3>
                                                                    <div class="box-tools">
                                                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                                                    </div>
                                                                </div>
                                                                <div class="box-body no-padding">
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group">                                                                                
                                                                            <label class="control-label" for="nama_produk">Nama Produk/Usaha</label>
                                                                            <div class="input-group input-group-sm">
                                                                                <div class="input-group-addon" style="border-bottom-right-radius: 0;border-top-right-radius: 0;"><i class="fa fa-bookmark"></i></div>
                                                                                <input class="form-control input-sm pull-right" name="nama_produk"
                                                                                    type="text" required placeholder="Masukan Nama Produk/Usaha"
                                                                                    value="<?=$artikel['nama_produk']?>">
                                                                            </div>
                                                                            <span class="help-block"><code>(Isikan Nama Produk/Usaha)</code></span>
                                                                                
                                                                            <label class="control-label" for="pengelola_produk">Pengelola Produk/Usaha</label>
                                                                            <div class="input-group input-group-sm">
                                                                                <div class="input-group-addon" style="border-bottom-right-radius: 0;border-top-right-radius: 0;"><i class="fa fa-user"></i></div>
                                                                                <input class="form-control input-sm pull-right" name="pengelola_produk"
                                                                                    type="text" required placeholder="Masukan Nama Pengelola Produk"
                                                                                    value="<?=$artikel['pengelola_produk']?>">
                                                                            </div>
                                                                            <span class="help-block"><code>(Isikan Pengelola Produk/Usaha)</code></span>
                                                                                
                                                                            <label class="control-label" for="kontak_pengelola">Nomor Kontak Pengelola</label>
                                                                            <div class="input-group input-group-sm">
                                                                                <div class="input-group-addon" style="border-bottom-right-radius: 0;border-top-right-radius: 0;"><i class="fa fa-phone-square"></i></div>
                                                                                <input class="form-control input-sm pull-right" name="kontak_pengelola"
                                                                                    type="text" required placeholder="Masukan Nomor Kontak Pengelola"
                                                                                    value="<?=$artikel['kontak_pengelola']?>">
                                                                            </div>
                                                                            <span class="help-block"><code>(Isikan Nomor Kontak Pengelola)</code></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php endif;?>
                                                        
                                                        <?php if ($cat == 1003): ?>
                                                            <input name="id_pembangunan" type="hidden" value="<?=$artikel['id_pembangunan']?>">
                                                            <div class="box box-info">
                                                                <div class="box-header with-border">
                                                                    <h3 class="box-title">Pengaturan Pembangunan <?php echo ucwords($this->setting->sebutan_desa)." "?></h3>
                                                                    <div class="box-tools">
                                                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                                                    </div>
                                                                </div>
                                                                <div class="box-body no-padding">
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group">
                                                                            <label class="control-label" for="bidang_pembangunan">Bidang</label>
                                                                            <div class="input-group input-group-sm">
                                                                                <div class="input-group-addon" style="border-bottom-right-radius: 0;border-top-right-radius: 0;"><i class="fa fa-folder"></i></div>
                                                                                <input class="form-control input-sm pull-right" name="bidang_pembangunan"
                                                                                    type="text" required placeholder="Masukan Nama Bidang Pembangunan"
                                                                                    value="<?=$artikel['bidang_pembangunan']?>">
                                                                            </div>
                                                                            <span class="help-block"><code>(Isikan Nama Bidang Pembangunan)</code></span>

                                                                            <label class="control-label" for="sub_bidang_pembangunan">Sub Bidang</label>
                                                                            <div class="input-group input-group-sm">
                                                                                <div class="input-group-addon" style="border-bottom-right-radius: 0;border-top-right-radius: 0;"><i class="fa fa-sitemap"></i></div>
                                                                                <input class="form-control input-sm pull-right" name="sub_bidang_pembangunan"
                                                                                    type="text" required placeholder="Masukan Nama Sub Bidang Pembangunan"
                                                                                    value="<?=$artikel['sub_bidang_pembangunan']?>">
                                                                            </div>
                                                                            <span class="help-block"><code>(Isikan Nama Sub Bidang Pembangunan)</code></span>

                                                                            <label class="control-label" for="nama_kegiatan_pembangunan">Nama Kegiatan Pembangunan</label>
                                                                            <div class="input-group input-group-sm">
                                                                                <div class="input-group-addon" style="border-bottom-right-radius: 0;border-top-right-radius: 0;"><i class="fa fa-folder"></i></div>
                                                                                <input class="form-control input-sm pull-right" name="nama_kegiatan_pembangunan"
                                                                                    type="text" required placeholder="Masukan Nama Kegiatan Pembangunan"
                                                                                    value="<?=$artikel['nama_kegiatan_pembangunan']?>">
                                                                            </div>
                                                                            <span class="help-block"><code>(Isikan Nama Kegiatan Pembangunan)</code></span>

                                                                            <label class="control-label" for="volume_kegiatan_pembangunan">Volume Kegiatan Pembangunan</label>
                                                                            <div class="input-group input-group-sm">
                                                                                <div class="input-group-addon" style="border-bottom-right-radius: 0;border-top-right-radius: 0;"><i class="fa fa-pie-chart"></i></div>
                                                                                <input class="form-control input-sm pull-right" name="volume_kegiatan_pembangunan"
                                                                                    type="text" required placeholder="Masukan Volume Kegiatan Pembangunan"
                                                                                    value="<?=$artikel['volume_kegiatan_pembangunan']?>">
                                                                            </div>
                                                                            <span class="help-block"><code>(Isikan Volume Pembangunan)</code></span>

                                                                            <label class="control-label" for="nilai_pembangunan">Nilai Kegiatan Anggaran</label>
                                                                            <div class="input-group input-group-sm">
                                                                                <div class="input-group-addon" style="border-bottom-right-radius: 0;border-top-right-radius: 0;"><i class="fa fa-usd"></i></div>
                                                                                <input class="form-control input-sm pull-right" name="nilai_pembangunan"
                                                                                    type="text" required placeholder="Masukan Nilai Pembangunan"
                                                                                    value="<?=$artikel['nilai_pembangunan']?>">
                                                                            </div>
                                                                            <span class="help-block"><code>(Isikan Nilai Kegiatan Anggaran)</code></span>

                                                                            <label class="control-label" for="sumber_dana_pembangunan">Sumber Dana Pembangunan</label>
                                                                            <div class="input-group input-group-sm">
                                                                                <div class="input-group-addon" style="border-bottom-right-radius: 0;border-top-right-radius: 0;"><i class="fa fa-random"></i></div>
                                                                                <input class="form-control input-sm pull-right" name="sumber_dana_pembangunan"
                                                                                    type="text" required placeholder="Masukan Sumber Dana Pembangunan"
                                                                                    value="<?=$artikel['sumber_dana_pembangunan']?>">
                                                                            </div>
                                                                            <span class="help-block"><code>(Isikan Sumber Dana Kegiatan Pembangunan)</code></span>

                                                                            <label class="control-label" for="lokasi_pembangunan">Lokasi Kegiatan Pembangunan</label>
                                                                            <div class="input-group input-group-sm">
                                                                                <div class="input-group-addon" style="border-bottom-right-radius: 0;border-top-right-radius: 0;"><i class="fa fa-map-marker"></i></div>
                                                                                <input class="form-control input-sm pull-right" name="lokasi_pembangunan"
                                                                                    type="text" required placeholder="Masukan lokasi tempat dilakukan pembangunan"
                                                                                    value="<?=$artikel['lokasi_pembangunan']?>">
                                                                            </div>
                                                                            <span class="help-block"><code>(Isikan Lokasi Tempat Dilakukan Kegiatan Pembangunan)</code></span>
                                                                                
                                                                            <label class="control-label" for="koordinator_pembangunan">Pelaksana Kegiatan Anggara (PKA)</label>
                                                                            <div class="input-group input-group-sm">
                                                                                <div class="input-group-addon" style="border-bottom-right-radius: 0;border-top-right-radius: 0;"><i class="fa fa-user"></i></div>
                                                                                <input class="form-control input-sm pull-right" name="koordinator_pembangunan"
                                                                                    type="text" required placeholder="Masukan nama koordinator pembangunan"
                                                                                    value="<?=$artikel['koordinator_pembangunan']?>">
                                                                            </div>
                                                                            <span class="help-block"><code>(Pelaksana Kegiatan Anggaran)</code></span>                                                                      
                                                                            <label class="control-label" for="waktu_pelaksanaan_pembangunan">Waktu Pelaksanaan</label>
                                                                            <div class="input-group input-group-sm">
                                                                                <div class="input-group-addon" style="border-bottom-right-radius: 0;border-top-right-radius: 0;"><i class="fa fa-usd"></i></div>
                                                                                <input class="form-control input-sm pull-right" name="waktu_pelaksanaan_pembangunan"
                                                                                    type="text" required placeholder="Masukan Jumlah Hari Kegiatan Pembangunan"
                                                                                    value="<?=$artikel['waktu_pelaksanaan_pembangunan']?>">
                                                                            </div>
                                                                            <span class="help-block"><code>(Isikan Jumlah Hari Kegiatan Pembangunan)</code></span>

                                                                            
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php endif;?>
                                                    
                                                    <div class="box box-info">
                                                        <div class="box-header with-border">
                                                            <h3 class="box-title">Pengaturan Lainnya</h3>
                                                            <div class="box-tools">
                                                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                                            </div>
                                                        </div>
                                                        <div class="box-body no-padding">
                                                            <div class="col-sm-12">
                                                                <?php if ($artikel['dokumen']): ?>
                                                                <div class="form-group">
                                                                    <div class="mailbox-attachment-info">
                                                                        <a href="<?=base_url() . LOKASI_DOKUMEN . $artikel['dokumen']?>" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i> Unduh Dokumen</a>
                                                                    </div>
                                                                </div>
                                                                <?php endif;?>
                                                                <div class="form-group">                                                                                
                                                                    <label class="control-label" for="link_embed">ID Video Youtube<br /> Contoh : https://www.youtube.com/watch?v=<span style="color:red">2uPLZNR81JA</span>
																	<br />Masukan seperti yang tertera di contoh kode berwarna merah saja</label>
                                                                    <div class="input-group input-group-sm">
                                                                        <div class="input-group-addon" style="border-bottom-right-radius: 0;border-top-right-radius: 0;">
                                                                            <i class="fa fa-youtube-play"></i>
                                                                        </div>
                                                                        <input class="form-control input-sm pull-right" name="link_embed" type="text" placeholder="Masukan ID Youtube Disini" value="<?=$artikel['link_embed']?>">
                                                                    </div>
                                                                    <span class="help-block"><code>(Isikan ID Video Youtube)</code></span>																	
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label" for="dokumen">Dokumen Lampiran</label>
                                                                    <div class="input-group input-group-sm">
                                                                        <input type="text" class="form-control" id="file_path4">
                                                                        <input type="file" class="hidden" id="file4" name="dokumen">
                                                                        <span class="input-group-btn">
                                                                            <button type="button" class="btn btn-info btn-flat" id="file_browser4" style="border-top-left-radius:0;border-bottom-left-radius:0"><i class="fa fa-search"></i> Browse</button>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label" for="nama_dokumen">Nama Dokumen</label>
                                                                    <input id="link_dokumen" name="link_dokumen" class="form-control input-sm" type="text" value="<?=$artikel['link_dokumen']?>"></input>
                                                                    <span class="help-block"><code>(Nantinya akan menjadi link unduh/download)</code></span>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label" for="sumber_berita">Sumber Berita</label>
                                                                    <input id="sumber_berita" name="sumber_berita" class="form-control input-sm" type="text" value="<?=$artikel['sumber_berita']?>"></input>
                                                                    <span class="help-block"><code>(Masukan Nama sumber berita misal "Portal Desa Digital")</code></span>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label" for="link_sumber_berita">Link Sumber Berita</label>
                                                                    <input id="link_sumber_berita" name="link_sumber_berita" class="form-control input-sm url" type="text" value="<?=$artikel['link_sumber_berita']?>"></input>
                                                                    <span class="help-block"><code>(Masukan link sumber berita)</code></span>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label" for="tgl_post">Tanggal Posting</label>
                                                                    <div class="input-group input-group-sm date">
                                                                        <div class="input-group-addon" style="border-bottom-right-radius: 0;border-top-right-radius: 0;">
                                                                            <i class="fa fa-calendar"></i>
                                                                        </div>
                                                                        <input class="form-control input-sm pull-right tgl_posting" id="tgl_jam" name="tgl_upload" type="text" value="<?=$artikel['tgl_upload']?>">
                                                                    </div>
                                                                    <span class="help-block"><code>(Kosongkan jika ingin langsung di post, bisa digunakan untuk artikel terjadwal)</code></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="box box-info">
                                                        <div class="box-body no-padding">
                                                            <div class='box-footer'>
                                                                <button type='reset' class='btn btn-radius btn-uppercase btn-danger btn-sm'><i class='fa fa-times'></i> Batal</button>
                                                                <button type='submit' class='btn btn-radius btn-uppercase btn-info btn-sm pull-right'><i class='fa fa-check'></i> Simpan</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            </form>
                                        </section>
                                    </div>