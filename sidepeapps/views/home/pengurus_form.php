<style type="text/css">
	.kiri { padding-left: 0px; }
</style>
<div class="content-wrapper">
	<section class="content-header">
		<div class="title-header">Staf Pemerintahan <?= ucwords($this->setting->sebutan_desa)?></div>
		<ol class="breadcrumb">
			<li><a href="<?= site_url('hom_sid')?>"><i class="fa fa-home"></i> Home</a></li>
			<li><a href="<?= site_url('pengurus')?>"> Daftar Staf Pemerintahan</a></li>
			<li class="active">Staf Pemerintahan <?= ucwords($this->setting->sebutan_desa)?></li>
		</ol>
	</section>
	<section class="content">
		<div class="row" >
			<div class="col-sm-12">
				<div class="box box-info">
					<div class="box-header with-border">
						<a href="<?= site_url()?>pengurus" class="btn btn-radius btn-uppercase btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block">Kembali Ke Daftar Staf</a>
					</div>
					<div class="box-body">
						<div class="form-group col-sm-12 form-horizontal">
							<label class="col-sm-4 col-lg-2 control-label kiri" for="status">DATA STAF</label>
							<div class="btn-group col-sm-8 kiri" data-toggle="buttons">
								<label for="pengurus_1" class="btn btn-info btn-radius col-sm-3 form-check-label <?php if (empty($pamong) or !empty($individu)): ?>active<?php endif ?>">
									<input id="pengurus_1" type="radio"  name="pengurus" class="form-check-input" type="radio" value="1" <?php if (empty($pamong) or !empty($individu)): ?>checked<?php endif; ?> autocomplete="off" onchange="pengurus_asal(this.value);"> Data Penduduk
								</label>
								<label for="pengurus_2" class="btn btn-info btn-radius col-sm-3 form-check-label <?php if (!empty($pamong) and empty($individu)): ?>active<?php endif; ?>">
									<input id="pengurus_2" type="radio"  name="pengurus" class="form-check-input" type="radio" value="2" <?php if (!empty($pamong) and empty($individu)): ?>checked<?php endif; ?> autocomplete="off" onchange="pengurus_asal(this.value);"> Bukan Penduduk
								</label>
							</div>
						</div>
						<form action="" id="main" name="main" method="POST"  class="form-horizontal">
							<div class="form-group col-sm-12" >
				  			<label class="col-sm-4 col-lg-2 control-label" for="id_pend">NIK / Nama Penduduk </label>
								<div class="col-sm-7">
									<select class="form-contr	ol select2 input-sm" id="id_pend" name="id_pend"  onchange="formAction('main')" style="width:100%" >
										<option selected="selected">-- Silakan Masukan NIK / Nama--</option>
										<?php foreach ($penduduk as $data): ?>
											<option value="<?= $data['id']?>" <?php if ($individu['id']==$data['id']): ?>selected<?php endif; ?>>NIK : <?= $data['nik']." - ".$data['nama']?></option>
										<?php endforeach;?>
									</select>
								</div>
							</div>
	          </form>
					</div>
				</div>
			</div>
			<form id="validasi" action="<?=$form_action?>" method="POST" enctype="multipart/form-data"  class="form-horizontal">
				<input type="hidden" name="id_pend" value="<?= $individu['id']?>">
				<div class="col-md-3">
					<div class="box box-primary">
						<div class="box-body box-profile">
							<?php if ($pamong['foto']): ?>
								<img class="profile-user-img img-responsive" id="fotoPreview" src="<?= $fotorigin = AmbilFoto($pamong['foto'])?>" alt="Foto">
							<?php else: ?>
								<img class="profile-user-img img-responsive" id="fotoPreview" src="<?= $fotorigin = base_url('assets/files/user_pict/kuser.png')?>" alt="Foto">
							<?php endif; ?>
							<br/>
							<p class="text-muted text-center"><code>(Kosongkan jika tidak ingin mengubah foto)</code></p>
							<br/>
							<div class="input-group input-group-sm text-center">
								<span class="input-group-btn float-center">
									<input type="hidden" name="foto" id="fotoInput">
									<button data-toggle="modal" data-target="#cameraModal" id="fotoCange" type="button" class="btn btn-info btn-flat" id="file_browser2" style="border-top-left-radius: 10px;border-bottom-left-radius: 10px"><i class="fa fa-edit"></i> Ganti</button>
									<button id="fotoReset" type="button" class="btn btn-warning btn-flat"  id="file_browser2"><i class="fa fa-times"></i> Reset</button>
								</span>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-9">
					<div class="box box-primary">
						<div class="box-body">
							<div class="form-group">
								<label class="col-sm-4 control-label" for="pamong_nama">Nama Pegawai <?= ucwords($this->setting->sebutan_desa)?></label>
								<div class="col-sm-7">
									<input type="hidden" name="pamong_status" value="1">
									<input name="pamong_desa" class="form-control input-sm pengurus-desa" type="text" placeholder="Nama" value="<?= ($individu['nama'])?>" disabled="disabled"></input>
									<input id="pamong_nama" name="pamong_nama" class="form-control input-sm pengurus-luar-desa <?= !empty($individu) ?: 'required'?>" type="text" placeholder="Nama" value="<?= ($pamong['pamong_nama'])?>" style="display: none;"></input>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label" for="pamong_nik">Nomor Induk Kependudukan</label>
								<div class="col-sm-7">
									<input class="form-control input-sm pengurus-desa" type="text" placeholder="Nomor Induk Kependudukan" value="<?=$individu['nik']?>" disabled="disabled"></input>
									<input id="pamong_nik" name="pamong_nik" class="form-control input-sm pengurus-luar-desa" type="text" placeholder="Nomor Induk Kependudukan" value="<?=$pamong['pamong_nik']?>" style="display: none;"></input>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label" for="pamong_niap">NIAP</label>
								<div class="col-sm-7">
									<input id="pamong_niap" name="pamong_niap" class="form-control input-sm" type="text" placeholder="NIAP" value="<?=$pamong['pamong_niap']?>" ></input>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label" for="pamong_nip">NIP</label>
								<div class="col-sm-7">
									<input id="pamong_nip" name="pamong_nip" class="form-control input-sm" type="text" placeholder="NIP" value="<?=$pamong['pamong_nip']?>" ></input>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label" for="pamong_tempatlahir">Tempat Lahir</label>
								<div class="col-sm-7">
									<input class="form-control input-sm pengurus-desa" type="text" placeholder="Tempat Lahir" value="<?= strtoupper($individu['tempatlahir'])?>" disabled="disabled"></input>
									<input name="pamong_tempatlahir" class="form-control input-sm pengurus-luar-desa" type="text" placeholder="Tempat Lahir" value="<?= empty($pamong['pamong_tempatlahir']) ? strtoupper($get_penduduk['tempatlahir']) : strtoupper($pamong['pamong_tempatlahir'])?>" style="display: none;"></input>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label" for="pamong_tanggallahir">Tanggal Lahir</label>
								<div class="col-sm-7">
									<input class="form-control input-sm pengurus-desa" type="text" placeholder="Tanggal Lahir" value="<?= strtoupper($individu['tanggallahir'])?>" disabled="disabled"></input>
									<div class="input-group input-group-sm date pengurus-luar-desa" style="display: none;">
										<div class="input-group-addon" style="border-top-right-radius:0;border-bottom-right-radius:0">
											<i class="fa fa-calendar"></i>
										</div>
										<input class="form-control input-sm pull-right tgl_1" name="pamong_tanggallahir" type="text" value="<?= empty($pamong['pamong_tanggallahir']) ? $get_penduduk['tanggallahir'] : tgl_indo_out($pamong['pamong_tanggallahir'])?>" style="border-top-left-radius:0;border-bottom-left-radius:0">
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label" for="pamong_sex">Jenis Kelamin</label>
								<div class="col-sm-7">
									<input class="form-control input-sm pengurus-desa" type="text" placeholder="Jenis Kelamin" value="<?= $individu['sex']?>" disabled="disabled"></input>
									<select class="form-control input-sm pengurus-luar-desa" name="pamong_sex" onchange="show_hide_hamil($(this).find(':selected').val());" style="display: none;">
										<option value="">Pilih Jenis Kelamin</option>
										<option value="1" <?php empty($pamong['pamong_sex']) ? selected($get_penduduk['sex'], '1') : selected($pamong['pamong_sex'], '1'); ?>>Laki-Laki</option>
										<option value="2" <?php empty($pamong['pamong_sex']) ? selected($get_penduduk['sex'], '2') : selected($pamong['pamong_sex'], '2'); ?> >Perempuan</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label" for="pamong_pendidikan">Pendidikan</label>
								<div class="col-sm-7">
									<input class="form-control input-sm pengurus-desa" type="text" placeholder="Pendidikan" value="<?= $individu['pendidikan_kk']?>" disabled="disabled"></input>
									<select class="form-control input-sm pengurus-luar-desa" name="pamong_pendidikan" style="display: none;">
										<option value="">Pilih Pendidikan (Dalam KK) </option>
										<?php foreach ($pendidikan_kk as $data): ?>
											<option value="<?= $data['id']?>" <?php empty($pamong['pamong_pendidikan']) ? selected($get_penduduk['pendidikan_kk_id'], $data['id']) : selected($pamong['pamong_pendidikan'], $data['id']); ?>><?= strtoupper($data['nama'])?></option>
										<?php endforeach?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label" for="pamong_agama">Agama</label>
								<div class="col-sm-7">
									<input class="form-control input-sm pengurus-desa" type="text" placeholder="Agama" value="<?= $individu['agama']?>" disabled="disabled"></input>
									<select class="form-control input-sm pengurus-luar-desa" name="pamong_agama" style="display: none;" requried>
										<option value="">Pilih Agama</option>
										<?php foreach ($agama as $data): ?>
											<option value="<?= $data['id']?>" <?php empty($pamong['pamong_agama']) ? selected($get_penduduk['agama_id'], $data['id']) : selected($pamong['pamong_agama'], $data['id']); ?>><?= strtoupper($data['nama'])?></option>
										<?php endforeach;?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label" for="pamong_pangkat">Pangkat / Golongan</label>
								<div class="col-sm-7">
									<input name="pamong_pangkat" class="form-control input-sm" type="text" placeholder="Pangkat / Golongan" value="<?= $pamong['pamong_pangkat']?>" ></input>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label" for="pamong_nosk">Nomor SK Pengangkatan</label>
								<div class="col-sm-7">
									<input name="pamong_nosk" class="form-control input-sm" type="text" placeholder="Nomor SK Pengangkatan" value="<?= $pamong['pamong_nosk']?>" ></input>
								</div>
							</div>
							<div class='form-group'>
								<label class="col-sm-4 control-label" for="pamong_tglsk">Tanggal SK Pengangkatan</label>
								<div class="col-sm-7">
									<div class="input-group input-group-sm date">
										<div class="input-group-addon" style="border-top-right-radius:0;border-bottom-right-radius:0">
											<i class="fa fa-calendar"></i>
										</div>
										<input class="form-control input-sm pull-right tgl_1" name="pamong_tglsk" type="text" value="<?= tgl_indo_out($pamong['pamong_tglsk'])?>" required style="border-top-left-radius:0;border-bottom-left-radius:0">
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label" for="pamong_nohenti">Nomor SK Pemberhentian</label>
								<div class="col-sm-7">
									<input name="pamong_nohenti" class="form-control input-sm" type="text" placeholder="Nomor SK Pemberhentian" value="<?= $pamong['pamong_nohenti']?>" ></input>
								</div>
							</div>
							<div class='form-group'>
								<label class="col-sm-4 control-label" for="pamong_tglhenti">Tanggal SK Pemberhentian</label>
								<div class="col-sm-7">
									<div class="input-group input-group-sm date">
										<div class="input-group-addon" style="border-top-right-radius:0;border-bottom-right-radius:0">
											<i class="fa fa-calendar"></i>
										</div>
										<input class="form-control input-sm pull-right tgl_1" name="pamong_tglhenti" type="text" value="<?= tgl_indo_out($pamong['pamong_tglhenti'])?>" style="border-top-left-radius:0;border-bottom-left-radius:0">
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label" for="pamong_masajab">Masa Jabatan (Usia/Periode)</label>
								<div class="col-sm-7">
									<input name="pamong_masajab" class="form-control input-sm" type="text" placeholder="Contoh: 6 Tahun Periode Pertama (2015 s/d 2021)" value="<?= $pamong['pamong_masajab']?>" ></input>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label" for="jabatan">Jabatan</label>
								<div class="col-sm-7">
									<input id="jabatan" name="jabatan" class="form-control input-sm required" type="text" placeholder="Jabatan" value="<?= $pamong['jabatan']?>" ></input>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label" for="tupoksi">Tupoksi</label>
								<div class="col-sm-7">
									<textarea id="tupoksi" name="tupoksi" class="form-control input-sm required"><?= $pamong['tupoksi']?></textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="col-xs-12 col-sm-4 col-lg-4 control-label" for="status">Status Pegawai Desa</label>
								<div class="btn-group col-xs-12 col-sm-8" data-toggle="buttons">
									<label id="sx3" class="btn btn-info btn-radius col-xs-6 col-sm-5 col-lg-3 form-check-label <?php if ($pamong['pamong_status'] == '1' OR $pamong['pamong_status'] == NULL): ?>active<?php endif ?>">
										<input id="group1" type="radio" name="pamong_status" class="form-check-input" type="radio" value="1" <?php if ($pamong['pamong_status'] == '1' OR $pamong['pamong_status'] == NULL): ?>checked <?php endif ?> autocomplete="off"> Aktif
									</label>
									<label id="sx4" class="btn btn-info btn-radius col-xs-6 col-sm-5 col-lg-3 form-check-label <?php if ($pamong['pamong_status'] == '2'): ?>active<?php endif ?>">
										<input id="group2" type="radio" name="pamong_status" class="form-check-input" type="radio" value="2" <?php if ($pamong['pamong_status'] == '2'): ?>checked<?php endif ?> autocomplete="off"> Tidak Aktif
									</label>
								</div>
							</div>
						</div>
						<div class='box-footer'>
							<div class="row">
								<div class='col-xs-12'>
									<button type='reset' class='btn btn-radius btn-uppercase btn-danger btn-sm'  onclick="reset_form($(this).val());">Batal</button>
									<button type='submit' class='btn btn-radius btn-uppercase btn-info btn-sm pull-right confirm'>Simpan</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</section>
</div>

    <style type="text/css">
    .cameraPreview {
    /*position: absolute; */
    right: 0; 
    bottom: 0;
    max-width: 100%; 
    max-height: 100%;
    width: auto; 
    height: auto; 
    /*z-index: -100;*/
    background-size: cover;
    overflow: hidden;
    }
</style>

    <!-- Modal -->
    <div class="modal fade" id="cameraModal" tabindex="-1" role="dialog" aria-labelledby="cameraModal" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <div class="modal-title" id="exampleModalLabel">
            	Upload Gambar Atau Ambil Foto Dengan Webcam
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
          </div>
          <div class="modal-body" id="cameraModalBody">
          	<div class="input-group input-group-sm" style="padding-bottom: .5em;">
                <input type="text" class="form-control" id="file_pathcamera">
                <input type="file" class="hidden" id="filecamera">
                <div class="input-group-btn">
                  <button type="button" class="btn btn-info btn-flat" id="file_browsercamera"><i class="fa fa-search"></i> Cari Foto</button>
                </div>
                <div class="input-group-btn">
                  <button type="button" id="cameraModalRetake" class="btn btn-danger btn-sm">Foto Ulang</button>
                </div>
                <div class="input-group-btn">
            		<button type="button" id="cameraModalCapture" class="btn btn-success btn-sm">Foto</button>
                </div>
              </div>
            <video id="cameraVideo" class="cameraPreview"></video>
            <img id="cameraImage" class="cameraPreview"></img>
          </div>
        </div>
      </div>
    </div>
    <canvas style="display: none;" id="canvas"></canvas>
<script>
	$('document').ready(function()
	{
		$("input[name='pengurus']:checked").change();
		if ($("#validasi input[name='id_pend']").val() != '')
		{
			$('#pamong_nama').removeClass('required');
		}
	});

	function reset_form()
	{
		<?php if ($pamong['pamong_status'] =='1' OR $pamong['pamong_status'] == NULL): ?>
			$("#sx3").addClass('active');
			$("#sx4").removeClass("active");
		<?php endif ?>
		<?php if ($pamong['pamong_status'] =='2'): ?>
			$("#sx4").addClass('active');
			$("#sx3").removeClass("active");
		<?php endif ?>
	};

	function pengurus_asal(asal)
	{
		if (asal == 1)
		{
			$('#main').show();
			$('.pengurus-luar-desa').hide();
			$('.pengurus-desa').show();
			$('#pamong_nama').val('');
		}
		else
		{
			$('#main').hide();
			$("input[name='id_pend']").val('');
			$('.pengurus-luar-desa').show();
			$('.pengurus-desa').hide();
			$('#pamong_nama').addClass('required');
		}
	}
</script>
<script type="text/javascript" src="<?=base_url()?>assets/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
    tinymce.init({
        selector: 'textarea',
        height: 300,
        theme: 'modern',
        plugins: [
        "advlist autolink link image lists charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
        "table contextmenu directionality emoticons paste textcolor responsivefilemanager code"
        ],
        toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify",
        toolbar2: "| bullist numlist outdent indent | styleselect | link unlink | forecolor",
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
        '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i'
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
    <script>
      const camera_khkhbjhguiigjbjygbhbmhbjkgghghjhjnb = {
        openCamera()
        {
          this.video = document.getElementById('cameraVideo');
          this.image = document.getElementById('cameraImage');

          this.canvas = document.getElementById('canvas');
          this.context = this.canvas.getContext('2d');

          this.image.style.display = 'none';
          this.video.style.display = 'block';

          navigator.getUserMedia = navigator.getUserMedia ||
                                   navigator.webkitGetUserMedia ||
                                   navigator.mozGetUserMedia ||
                                   navigator.oGetUserMedia ||
                                   navigator.msGetUserMedia;
          
          if(navigator.getUserMedia)
          {
            navigator.getUserMedia({video:true },  stream => this.cameraStream(stream), error => alert(error.name));
          }
        },

        closeCamera()
        {
          this.video.pause();

          try
          {
            this.video.srcObject = null;
          }

          catch (error)
          {
            this.video.src = null;
          }
          
          this.stream.length != 0 && this.stream.getTracks().forEach(track => track.stop());
        },

        captureCamera(fn)
        {
          this.canvas.width=this.video.videoWidth;
          this.canvas.height=this.video.videoHeight;
          this.context.drawImage(this.video,0,0);

          this.preview(this.canvas.toDataURL())

          fn(this.canvas);
        },

        cameraStream(stream)
        {
          try
          {
            this.video.srcObject = stream;
          }

          catch (error)
          {
            this.video.src = URL.createObjectURL(new MediaSource(stream));
          }
          
          this.video.play();
          
          this.stream = stream;
        },

        resetCamera()
        {
          this.image.style.display = 'none';
          this.video.style.display = 'block';
        },

        inputFile(fn)
        {
          var reader = new FileReader();
          var obj = this;

          reader.readAsDataURL(document.getElementById('filecamera').files[0]);

          reader.onload = function (e)
          {
            obj.preview(e.target.result)
            fn(e.target.result)
          }
        },

        preview(data)
        {
          this.image.src = data;

          this.video.style.display = 'none';
          
          this.image.style.display = 'block';
        },

        stream: [],
        video: null,
        image: null,
        canvas: null,
        context: null,
        modal: null,
        origin: null
      }

      function capture(data)
      {
        document.getElementById('fotoInput').value = data instanceof HTMLCanvasElement ? canvas.toDataURL() : data
        this.origin = document.getElementById('fotoPreview').src
        document.getElementById('fotoPreview').src = document.getElementById('fotoInput').value      }

      $('#cameraModal').on('show.bs.modal', () => camera_khkhbjhguiigjbjygbhbmhbjkgghghjhjnb.openCamera())
      $('#cameraModal').on('hide.bs.modal', () => camera_khkhbjhguiigjbjygbhbmhbjkgghghjhjnb.closeCamera())
      $('#cameraModalCapture').on('click', () => camera_khkhbjhguiigjbjygbhbmhbjkgghghjhjnb.captureCamera(capture))
      $('#cameraModalRetake').on('click', () => camera_khkhbjhguiigjbjygbhbmhbjkgghghjhjnb.resetCamera())
      $('#fotoReset').on('click', function(){
        

        	document.getElementById('fotoPreview').src = '<?=$fotorigin ?>'
     
        document.getElementById('fotoInput').value = null

      })


  $("#file_browsercamera").click(function(e) {
    e.preventDefault();
    $("#filecamera").click();
  });
  $("#filecamera").change(function() {
    $("#file_pathcamera").val($(this).val());
    camera_khkhbjhguiigjbjygbhbmhbjkgghghjhjnb.inputFile(capture)
  });
  $("#file_pathcamera").click(function() {
    $("#file_browsercamera").click();
  });


    </script>