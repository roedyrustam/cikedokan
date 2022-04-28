<div class="content-wrapper">
  <section class="content-header">
		<div class="title-header">Manajemen Sub modul</div>
		<ol class="breadcrumb">
      <li><a href="<?= site_url('hom_sid')?>"><i class="fa fa-home"></i> Home</a></li>
      <li><a href="<?= site_url('modul')?>"> Daftar Modul</a></li>
			<li class="active">Manajemen Sub Modul</li>
		</ol>
	</section>
	<section class="content" id="maincontent">
    <form id="mainform" name="mainform" action="" method="post">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header with-border">
						  <a href="<?= site_url()?>modul" class="btn btn-radius btn-uppercase btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block">Kembali Ke Daftar Modul</a>
					  </div>
            <div class="box-header with-border">
						 <strong> Modul Utama : <?=$modul['modul']?></strong>
					  </div>
            <div class="box-body">
              <div class="row">
                <div class="col-sm-12">
                  <div class="table-responsive">
                    <table class="table table-bordered dataTable table-hover">
                      <thead class="bg-gray disabled color-palette">
                        <tr>
                          <th class="text-center" width="5%"><input type="checkbox" id="checkall"/></th>
                          <th class="text-center uppercase" width="5%">No</th>
                          <th class="text-center uppercase" width="5%">Aksi</th>
                          <th class="text-center uppercase" width="70%">Nama Modul</th>
                          <th class="text-center uppercase" width="5%">Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($submodul as $data): ?>
                          <tr>
                            <td class="text-center"><input type="checkbox" name="id_cb[]" value="<?=$data['id']?>" /></td>
                            <td class="text-center"><?=$data['no']?></td>
                            <td>
                              <a href="<?=site_url("modul/form/$data[id]")?>" class="btn bg-orange btn-radius-sm" title="Ubah Data"><i class="fa fa-edit" style="font-size:12px"></i></a>
                            </td>
                            <td><?=$data['modul']?></td>
                            <td class="text-center">
                              <?php	if ($data['aktif']==1): ?><i class="fa fa-unlock" style="color:green;font-size:14px"></i><?php else: ?><i class="fa fa-lock" style="color:red;font-size:14px"> <?php endif; ?>
                            </td>
                          </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
		</form>
	</section>
</div>
