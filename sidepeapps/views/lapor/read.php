<div class="content-wrapper">
    <section class="content-header">
        <div class="heading-laporan">Periksa Laporan</div>
        <a href="<?=site_url('lapor')?>" class="btn btn-social btn-flat btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Daftar Laporan"><i class="fa fa-list"></i> Daftar Laporan</a>
        <a href="<?=site_url('lapor/proses/' . $laporan['id'])?>" class="btn bg-yellow btn-social btn-flat btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Diproses"><i class="fa fa-spinner"></i> Proses</i></a>
		<a href="<?=site_url('lapor/lanjut/' . $laporan['id'])?>" class="btn bg-blue btn-social btn-flat btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Diteruskan"><i class="fa fa-exchange"></i> Teruskan</i></a>
		<a href="<?=site_url('lapor/pending/' . $laporan['id'])?>" class="btn bg-orange btn-social btn-flat btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Pending"><i class="fa fa-exclamation-triangle"></i> Pending</i></a>
        <a href="<?=site_url('lapor/selesai/' . $laporan['id'])?>" class="btn btn-success btn-social btn-flat btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Pending"><i class="fa fa-check"></i> Selesai</i></a>
		<ol class="breadcrumb">
            <li><a href="<?=site_url('hom_sid')?>"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Periksa Laporan</li>
        </ol>
    </section>
    <div class="body-laporan">
        <div class="row">
            <div class="col-md-8 col-xs-12">
                <div class="box-laporan">
                    <div class="meta-laporan">
                        <div class="nama-laporan">
                            Nama : <?php echo $laporan['owner'] ?><br />
                            NIK : <?php echo $laporan['email'] ?>
                        </div>
                        <span class="tgl-laporan">Tanggal : <?php echo tgl_indo($laporan['tgl_upload']) ?></span>
                    </div>                  
                    <div class="isi-laporan"><?php echo $laporan['komentar'] ?></div>
                    
                    <div class="box-lampiran">
						<div class="head-lampiran">Lampiran: <?php echo count($laporan['gambar']) ?> Gambar.</div>
                        <div class="row">
                            <?php foreach($laporan['gambar'] as $lampiran): ?>
                                <div class="col-md-4 col-xs-12">
                                    <a href="<?= base_url('desa/upload/laporan/'.$lampiran)?>" class="img-responsive cover-album img-fluid" data-lightbox="images" target="_blank">
									<img src="<?= base_url('desa/upload/laporan/'.$lampiran)?>" class="img-responsive img-fluid img-popup" alt="" style="width: 240px; height: 120px;"></a>
                                </div>
							<?php endforeach ?>                        
						</div>
					</div>
                </div>
				<?php foreach($jawaban as $reply): ?>
				<div class="box-laporan">
					<div class="meta-laporan">
						<div class="nama-laporan">
							<?php echo $reply['admin'] ? 'Admin' : $laporan['owner'] ?>
						</div>
						<span class="tgl-balasan"><?php echo tgl_indo2(date('Y-m-d H:i:s', $reply['tgl'])) ?></span>
					</div>
					<div class="isi-laporan">
						<?php echo $reply['pesan'] ?>
					</div>
				</div>
				<?php endforeach ?>
				<div class="balas-laporan">					
                    <form action="<?php echo site_url('lapor/balas/'.$laporan['id']) ?>" method="POST">
						<div class="form-group">
							<textarea type="text" name="isi" class="form-control input-sm" rows="5" placeholder="Balas..." ></textarea>
						</div>
						<div class="form-group text-right">
							<button class="btn btn-sm btn-success" type="sumit">Kirim</button>
						</div>
					</form> 
				</div>
            </div>
            <div class="col-md-4 col-xs-12">
                <div class="head-info-laporan"><i class="fa fa-ticket"></i> Informasi Laporan</div>
                <div class="sidebar-laporan">                   
                    <div class="judul-laporan">
                        <div class="label-info-laporan">Judul</div>
                        <?php echo $laporan['judul'] ?>
                    </div>
                    <div class="judul-laporan" style="border-top: 1px solid #ddd;">
                        <div class="label-info-laporan">Status</div>
                        <?php if($laporan['status']): ?>
                                <span class="bg-<?php 

                                if($laporan['status'] == 'Dalam Proses')
                                {
                                    echo 'yellow';
                                }

                                elseif($laporan['status'] == 'Pending')
                                {
                                    echo 'orange';
                                }

                                elseif($laporan['status'] == 'Selesai')
                                {
                                    echo 'green';
                                }

                                elseif($laporan['status'] == 'Diteruskan')
                                {
                                    echo 'blue';
                                }

                                ?> btn-flat btn btn-sm" style="padding: 2px; font-size: 12px; border-radius: 0px;"><?php echo $laporan['status'] ?></span>
								<?php else: ?>
                            <span class="bg-red btn-flat btn btn-sm" style="padding: 2px;font-size: 12px; border-radius: 0px;">Belum Diverifikasi</span>
                        <?php endif ?>
                    </div>
                    <div class="tgl-info-laporan">
                        <div class="label-info-laporan">Dilaporkan</div>
                        <?php echo tgl_indo2($laporan['tgl_upload']) ?>
                    </div>
                    <div class="nama-info-laporan">
                        <div class="label-info-laporan">Pelapor</div>
                        <?php echo $laporan['owner'] ?>
                    </div>
                    <div class="nama-info-laporan">
                        <div class="label-info-laporan">NIK</div>
                        <?php echo $laporan['email'] ?>
                    </div>
                    <div class="nama-info-laporan">
                        <div class="label-info-laporan">Jenis</div>
                        <?php echo $this->lapor_model->get_jenis($laporan['jenis']) ?>
                    </div>
                </div>
            </div>
        </div>
       
    </div>
    
    
</div>