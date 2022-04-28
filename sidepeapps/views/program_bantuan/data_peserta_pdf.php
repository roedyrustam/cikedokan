<html><head><style type="text/css">
  body {
    font-family: Arial, sans-serif !important;
  }
  .label-rincian {
    padding: 5px;
    width: 30%;
    font-weight: bold;
  }
  .titik-dua {
    text-align: center;
    width: 2%;
  }
  .data {
    padding: 5px;
  }
  .table {
    width: 100%;
    border-spacing: -2px;
  }
  .table td, .table th {
    border: 1px solid #dee2e6;
  }
  body
{

font-family:Arial,"Times New Roman",sans-serif;
color:black;
background-color:white;
margin-left:24px;
margin-right:20px;
font-size:12px;
line-height:20px;
}
hr{
border-bottom: 4px solid #000000;
height:0px;
}

table, tr, td
{
background-color:white;
line-height:1.3;
vertical-align: center;
}

.page {
margin:18px;}

.kop {
font-size:20px; 
text-align: center; 
line-height:0.1;
margin:20px;
font-weight: bold;
}
.kop3 {
font-size:18px; 
text-align: center; 
line-height:0.1;
margin:22px;}

.kop2 {
font-size:12px; 
font-weight:normal; 
text-align: center; 
line-height:0.1;
margin:10px;}

.header {
padding-top:1px;
text-align: center;
height:110px;
}

.logo {
float: left;
margin-top:8px;
margin-left:5px;
width:90px;
height:90px;
}

#isi {
line-height:0.1;
vertical-align: top;
}

#isi2 {
line-height:0.8;
vertical-align: top;
}
#isi3 {
line-height:1;
vertical-align: top;
}

#isi3 td{
line-height:1.2;
vertical-align: top;
text-align:justify;
}

.indentasi{
text-indent:40px;
line-height:1.2;
text-align:justify;
}

h1{
    font-size:18px;
}
h3{
    font-size:18px;
    margin-top: 10px;
    margin-bottom: 10px;
}
label{
    display:inline-block;
}
.nowrap{
    white-space:nowrap;
}
#body{
    padding:0px;
}
#ktp{
    width:500px;
  margin: 0px;
    border:2px solid #000;
    padding:5px;
}
.header{
    border-bottom:2px solid #000;
    padding-bottom:5px;
    margin:-5px auto;
}
.gambar-kartu-peserta {
  margin: 20px;
}
.img-center {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 50%;
}
</style>
</head><body>



   <img src="data:image/png;base64,<?= base64_encode(file_get_contents(LogoDesa($desa['logo'])));?>" alt="" width="100" height="80" class="logo"><div class="header">
              <div class="kop">PEMERINTAH <?= strtoupper($this->setting->sebutan_kabupaten)?> <?= strtoupper($desa['nama_kabupaten'])?> </div>
              <div class="kop">KECAMATAN <?= strtoupper($desa['nama_kecamatan'])?> </div>
              <div class="kop"><?= strtoupper($this->setting->sebutan_desa)?> <?= strtoupper($desa['nama_desa'])?></div>
              <div class="kop2"><?= ($desa['alamat_kantor'])?> </div>
            </div><table width="100%">
            <tbody><tr>
              
            </tr>
            
          </tbody></table>
  <div class="row" style="margin-top: 120px">
    <div class="col-sm-12">
      <div class="box-header with-border">
        <h3 class="box-title">Rincian Program</h3>
      </div>
      <div class="box-body">
        <table class="table">
          <tbody>
            <tr>
              <td class="label-rincian">Program Bantuan</td>
              <td class="titik-dua">:</td>
              <td class="data"><?= strtoupper($detail["nama"])?></td>
            </tr>
            <tr>
              <td class="label-rincian">Sasaran Peserta</td>
              <td class="titik-dua">:</td>
              <td class="data"> <?= $sasaran[$detail["sasaran"]]?></td>
            </tr>
            <tr>
              <td class="label-rincian">Masa Berlaku</td>
              <td class="titik-dua">:</td>
              <td class="data"><?= fTampilTgl($detail["sdate"],$detail["edate"])?></td>
            </tr>
            <tr>
              <td class="label-rincian">Keterangan</td>
              <td class="titik-dua">:</td>
              <td class="data"><?= $detail["ndesc"]?></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <div class="col-sm-12">
      <div class="box-header with-border">
        <h3 class="box-title">Data Peserta</h3>
      </div>
      <div class="box-body">
        <table class="table">
          <tbody>
            <tr>
             	<td class="label-rincian"><?php if ($detail["sasaran"] == 1): ?>
                  NIK / Nama <?php elseif ($detail["sasaran"] == 2): ?>
                    No. KK / Nama KK <?php elseif ($detail["sasaran"] == 3): ?>
                    No. Rumah Tangga / Nama Kepala Rumah Tangga <?php elseif ($detail["sasaran"] == 4): ?>
                    Nama Kelompok / Nama Ketua Kelompok
                    <?php endif; ?></td>
              <td class="titik-dua">:</td>
              <td class="data"><?= $peserta["peserta_nama"]." / ".$peserta["peserta_info"]?></td>
            </tr>
            <?php if ($individu): ?>
            <?php if ($detail["sasaran"] == 1): ?>
            <tr>
              <td class="label-rincian">Alamat</td>
              <td class="titik-dua">:</td>
              <td class="data"><?= $individu['alamat']; ?> RT<?= $individu['rt']; ?>/RW<?= $individu['rw']; ?> <?= ucwords($this->setting->sebutan_dusun)?> <?= $individu['dusun']; ?>, <?= ucwords($this->setting->sebutan_desa)?> <?= ucwords($desa['nama_desa'])?>. <?= ucwords($this->setting->sebutan_kecamatan)?> <?= ucwords($desa['nama_kecamatan'])?>, <?= ucwords($this->setting->sebutan_kabupaten)?> <?= ucwords($desa['nama_kabupaten'])?></td>
            </tr>
            <tr>
              <td class="label-rincian">Tempat, Tanggal Lahir</td>
              <td class="titik-dua">:</td>
              <td class="data"><?= $individu['tempatlahir']?>, <?= tgl_indo($peserta["kartu_tanggal_lahir"])?></td>
            </tr>
            <tr>
              <td class="label-rincian">Pendidikan</td>
              <td class="titik-dua">:</td>
              <td class="data"><?= $individu['pendidikan_sedang']?></td>
            </tr>
            <tr>
              <td class="label-rincian">Pekerjaan</td>
              <td class="titik-dua">:</td>
              <td class="data"><?= $individu['pekerjaan']?></td>
            </tr>
            <tr>
              <td class="label-rincian">Warganegara / Agama</td>
              <td class="titik-dua">:</td>
              <td class="data"><?= $individu['warganegara']?> / <?= $individu['agama']?></td>
            </tr>


            <?php elseif ($detail["sasaran"] == 2): ?>

              <tr>
              <td class="label-rincian">Alamat Keluarga</td>
              <td class="titik-dua">:</td>
              <td class="data"><?= $individu['alamat']; ?> RT<?= $individu['rt']; ?>/RW<?= $individu['rw']; ?> <?= ucwords($this->setting->sebutan_dusun)?> <?= $individu['dusun']; ?>, <?= ucwords($this->setting->sebutan_desa)?> <?= ucwords($desa['nama_desa'])?>. <?= ucwords($this->setting->sebutan_kecamatan)?> <?= ucwords($desa['nama_kecamatan'])?>, <?= ucwords($this->setting->sebutan_kabupaten)?> <?= ucwords($desa['nama_kabupaten'])?></td>
            </tr><tr>
              <td class="label-rincian">Tempat, Tanggal Lahir KK</td>
              <td class="titik-dua">:</td>
              <td class="data"><?= $individu['tempatlahir']?>, <?= tgl_indo($peserta["kartu_tanggal_lahir"])?></td>
            </tr><tr>
              <td class="label-rincian">Pendidikan KK</td>
              <td class="titik-dua">:</td>
              <td class="data"> <?= $individu['pendidikan_dalam_kk']?></td>
            </tr><tr>
              <td class="label-rincian">Warganegara / Agama KK</td>
              <td class="titik-dua">:</td>
              <td class="data"><?= $individu['warganegara']?> / <?= $individu['agama']?></td>
            </tr>

            <?php elseif ($detail["sasaran"] == 3): ?>

              <tr>
              <td class="label-rincian">Alamat Kepala Rumah Tangga</td>
              <td class="titik-dua">:</td>
              <td class="data"><?= $individu['alamat']; ?> RT<?= $individu['rt']; ?>/RW<?= $individu['rw']; ?> <?= ucwords($this->setting->sebutan_dusun)?> <?= $individu['dusun']; ?>, <?= ucwords($this->setting->sebutan_desa)?> <?= ucwords($desa['nama_desa'])?>. <?= ucwords($this->setting->sebutan_kecamatan)?> <?= ucwords($desa['nama_kecamatan'])?>, <?= ucwords($this->setting->sebutan_kabupaten)?> <?= ucwords($desa['nama_kabupaten'])?></td>
            </tr><tr>
              <td class="label-rincian">Tempat Tanggal Lahir Kepala RTM</td>
              <td class="titik-dua">:</td>
              <td class="data"><?= $individu['tempatlahir']?>, <?= tgl_indo($peserta["kartu_tanggal_lahir"])?></td>
            </tr><tr>
              <td class="label-rincian">Pendidikan Kepala RTM</td>
              <td class="titik-dua">:</td>
              <td class="data"><?= $individu['pendidikan']?></td>
            </tr><tr>
              <td class="label-rincian">Warganegara / Agama Kepala RTM</td>
              <td class="titik-dua">:</td>
              <td class="data"><?= $individu['warganegara']?> / <?= $individu['agama']?></td>
            </tr>
            <?php elseif ($detail["sasaran"] == 4): ?>
            <tr>
              <td class="label-rincian">Alamat Ketua Kelompok</td>
              <td class="titik-dua">:</td>
              <td class="data"><?= $individu['alamat']; ?> RT<?= $individu['rt']; ?>/RW<?= $individu['rw']; ?> <?= ucwords($this->setting->sebutan_dusun)?> <?= $individu['dusun']; ?>, <?= ucwords($this->setting->sebutan_desa)?> <?= ucwords($desa['nama_desa'])?>. <?= ucwords($this->setting->sebutan_kecamatan)?> <?= ucwords($desa['nama_kecamatan'])?>, <?= ucwords($this->setting->sebutan_kabupaten)?> <?= ucwords($desa['nama_kabupaten'])?></td>
            </tr>
            <tr>
              <td class="label-rincian">Tempat Tanggal Lahir (Umur) Ketua Kelompok</td>
              <td class="titik-dua">:</td>
              <td class="data"><?= $individu['tempatlahir']?>, <?= tgl_indo($peserta["kartu_tanggal_lahir"])?></td>
            </tr>
            <tr>
              <td class="label-rincian">Pendidikan Ketua Kelompok</td>
              <td class="titik-dua">:</td>
              <td class="data"><?= $individu['pendidikan']?></td>
            </tr>
            <tr>
              <td class="label-rincian">Warganegara / Agama Ketua Kelompok</td>
              <td class="titik-dua">:</td>
              <td class="data"><?= $individu['warganegara']?> / <?= $individu['agama']?></td>
            </tr>
<?php endif ?>


          </tbody>
        </table>
<?php endif ?>
        <div class="box-header with-border">
          <h3 class="box-title">Identitas Pada Kartu Peserta</h3>
        </div>
        <table class="table">
          <tbody>
            <tr>
              <td class="label-rincian">Nomor Kartu Peserta</td>
              <td class="titik-dua">:</td>
              <td class="data"><?= $peserta["no_id_kartu"]?></td>
            </tr>
            <tr>
              <td class="label-rincian">Nama</td>
              <td class="titik-dua">:</td>
              <td class="data"><?= $peserta["kartu_nama"]?></td>
            </tr>
            <tr>
              <td class="label-rincian">NIK</td>
              <td class="titik-dua">:</td>
              <td class="data"><?= $peserta["kartu_nik"]?></td>
            </tr>
            <tr>
              <td class="label-rincian">Tempat, Tanggal Lahir</td>
              <td class="titik-dua">:</td>
              <td class="data"><?= $peserta["kartu_tempat_lahir"]?>, <?= $individu['tanggallahir']?></td>
            </tr>
            <tr>
              <td class="label-rincian">Alamat</td>
              <td class="titik-dua">:</td>
              <td class="data"><?= $peserta["kartu_alamat"]?></td>
            </tr>
          </tbody>
        </table>
        <div class="gambar-kartu-peserta">
        <?php if (file_exists(LOKASI_DOKUMEN.$peserta['kartu_peserta'])): ?>
          <img src="data:image/png;base64,<?= base64_encode(file_get_contents(LOKASI_DOKUMEN.$peserta['kartu_peserta']));?>" class="img-center" style="width: 300px;height: 200px">
        <?php endif ?>
        </div>
      </div>
    </div>
  </div>
</body></html>