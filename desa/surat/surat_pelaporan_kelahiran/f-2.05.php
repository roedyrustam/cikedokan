<?php if (!defined('BASEPATH')) exit('No direct script access allowed');?>
<style type="text/css">
.text-center {
	text-align: center;
}
. {
	border-top: 1px solid #000;
	border-left: 1px solid #000;
}
</style>

<page orientation="portrait" format="210x330" style="font-size: 7pt">
	<table id="kode" align="right">
		<tr><td><strong>Kode . F-2.05</strong></td></tr>
	</table>
	<p>&nbsp;</p>
	<table style="width:500px;">
		<tbody>
			<tr>
				<td style="width:500px">
					Terlampir persyaratan-persyaratan sebagai berikut :
					<ol>
						<li>Surat Kelahiran dari Dokter/Bidan Penolong Kelahiran</li>
						<li>Foto Copy KTP dan Kartu Keluarga Orang Tua</li>
						<li>Buku Nikah/Akta Perkawinan Orang Tua</li>
						<li>Foto Copy Ijazah yang bersangkutan (bila ada)</li>
						<li>Foto Copy Pajak Bumi dan Bangunan (PBB)</li>
					</ol>
				</td>
				<td style="width:100px">
					<table style="width:100px;" boder="0.5" cellpadding="0" cellspacing="0">
						<tbody>
							<p>&nbsp;</p>
							<tr>
								<td class="text-center " style="width:60px">Tanggal</td>
								<td class="text-center " style="width:60px">No. Agenda</td>
								<td class="text-center " style="width:60px; border-right:1px solid #000;">Petugas</td>
							</tr>
							<tr>
								<td class="" style="border-bottom:1px solid #000;">
									<p>&nbsp;</p>
									<p>&nbsp;</p>
								</td>
								<td class="" style="border-bottom:1px solid #000;">
									<p>&nbsp;</p>
									<p>&nbsp;</p>
								</td>
								<td class="" style="border-right:1px solid #000; border-bottom:1px solid #000;">
									<p>&nbsp;</p>
									<p>&nbsp;</p>
								</td>
							</tr>						
						</tbody>
					</table>
				</td>
			</tr>
		</tbody>
	</table>
	
	<p style="text-align: center; margin: 0px; padding: 0px;">
		<strong style="font-size: 9pt;">SURAT PELAPORAN KELAHIRAN</strong>
	</p>

<p>&nbsp;</p>

<table style="width:100%" border="0.5" cellspacing="0" cellpadding="0">
  <tr>
    <th style="width:4%" scope="col">No.</th>
    <th style="width:30%" colspan="3" scope="col">Nama Lengkap Bayi<br />
    (Huruf Cetak)</th>
    <th colspan="4" scope="col">Tempat, Hari dan Tanggal Lahir</th>
    <th colspan="2" scope="col">Jenis<br />
    Kelamin</th>
    <th style="width:16%" scope="col">Berat dan <br />
      Panjang Bayi</th>
  </tr>
  <tr>
    <td rowspan="12" align="center" valign="top">1<br />
      Data <br />
      Bayi</td>
    <td colspan="3" rowspan="3" valign="top" align="center"><?= $input['nama_bayi']?></td>
    <td colspan="4">
		<p>Tempat Lahir :</p>
		<p>&nbsp;&nbsp;<?= $input['tempatlahir']?></p>
	</td>
    <td colspan="2">
    	<ol>
        	<li>Laki-laki</li>
            <li>Perempuan</li>
        </ol>
    </td>
    <td>
		<p>&nbsp;&nbsp;<?= $input['berat_lahir']?> Kg &nbsp;&nbsp;<?= $input['berat_ons']?> Ons<br />
		&nbsp;&nbsp;<?= $input['panjang_lahir']?> Cm
		</p>
	</td>
  </tr>
  <tr>
    <td align="center">Hari</td>
    <td colspan="3" align="center"> Tanggal</td>
    <td colspan="3">Kelahiran Ke : <?= $input['kelahiran_anak_ke'];?></td>
  </tr>
  <tr>
    <td align="center"><?= $input['hari'];?></td>
    <td colspan="3" align="center"><?= $input['tanggallahir'];?></td>
    <td colspan="3">Anak Ke : <?= $input['kelahiran_anak_ke'];?></td>
  </tr>
  <tr>
    <td colspan="10">Jenis Kelahiran : a. Tunggal b. Kembar 2 c. Kembar 3. d. Kembar 4. e. Lainnya</td>
  </tr>
  <tr>
    <td colspan="7" align="center">Tempat Kelahiran</td>
    <td colspan="3" align="center">Nama Rumah Sakit dan Alamat Lainnya</td>
  </tr>
  <tr>
    <td colspan="3" align="center">a. Rumah Sakit</td>
    <td align="center">b. Rumah</td>
    <td colspan="3" align="center">c. Lainnya</td>
    <td colspan="3" rowspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="7" align="center">Nomor dan Tanggal Surat Kelahiran dari Rumah Sakit</td>
  </tr>
  <tr>
    <td colspan="7" align="center">Isi Nomor dan Tanggal Surat Kelahiran dari Rumah Sakit</td>
  </tr>
  <tr>
    <td colspan="10" align="center">Bukti Pencatatan Kelahiran</td>
  </tr>
  <tr>
    <td colspan="3" align="center">Nomor Bukti Pencatatan</td>
    <td colspan="4" align="center">Tanggal Penerbitan</td>
    <td colspan="3" align="center">Diterbitkan Oleh</td>
  </tr>
  <tr>
    <td colspan="3" align="center">Nomo Bukti Pencatatab</td>
    <td colspan="4" align="center">Tanggal Penerbitan Pencatatan</td>
    <td colspan="3" align="center">Pencatatan Diterbitkan Oleh</td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
    <td colspan="4">&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td rowspan="10" align="center" valign="top"><p>2<br />
      Data <br />
      Ibu <br />
    </p></td>
    <td colspan="4" align="center">NIK dan Nama Lengkap Ibu<br />
      (Huruf Cetak)</td>
    <td colspan="4" align="center">Tanggal Lahir dan Umur</td>
    <td colspan="2" align="center">Pekerjaan</td>
  </tr>
  <tr>
    <td colspan="4" rowspan="2"><?= $input['nik_ibu'];?><br/><?= $input['nama_ibu'];?></td>
    <td colspan="3" align="center">Tanggal Lahir</td>
    <td style="width:8%" align="center">Umur</td>
    <td colspan="2" rowspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3"><?= $input['tanggal_lahir_ibu'];?></td>
    <td><?= $input['umur_ibu'];?></td>
  </tr>
  <tr>
    <td colspan="5" align="center">Alamat Tempat Tinggal dan Nomor Telepon<br />
      (di Indonesia)</td>
    <td colspan="5" align="center">Alamat Tempat Tinggal dan Nomor Telepon<br />
(di Negara Ybs)</td>
  </tr>
  <tr>
    <td colspan="5">&nbsp;</td>
    <td colspan="5">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" align="center">Nomor Paspor</td>
    <td colspan="4" align="center">Kewarganegaraan</td>
    <td colspan="3" align="center">Agama</td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
    <td colspan="4">&nbsp;</td>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" align="center">Tanggal Pencatatan Perkawinan</td>
    <td colspan="4" align="center">Nomor Akta</td>
    <td colspan="3" align="center">Instansi/Lembaga Yang Mengeluarkan</td>
  </tr>
  <tr>
    <td align="center">Tgl</td>
    <td align="center">Bln</td>
    <td align="center">Thn</td>
    <td colspan="4" rowspan="2">&nbsp;</td>
    <td colspan="3" rowspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td rowspan="11" align="center" valign="top">3<br />
      Data <br />
      Ayah</td>
    <td colspan="4" align="center">NIK dan Nama Lengkap Ayah<br />
      (Huruf Cetak)</td>
    <td colspan="4" align="center">Tanggal Lahir dan Umur</td>
    <td colspan="2" align="center">Pekerjaan</td>
  </tr>
  <tr>
    <td colspan="4" rowspan="2"><?= $input['nik_ayah'];?><br/><?= $input['nama_ayah'];?></td>
    <td colspan="3" align="center">Tanggal Lahir</td>
    <td style="width:8%" align="center">Umur</td>
    <td colspan="2" rowspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3"><?= $input['tanggal_lahir_ayah'];?></td>
    <td><?= $input['umur_ayah'];?></td>
  </tr>
  <tr>
    <td colspan="5" align="center">Alamat Tempat Tinggal dan Nomor Telepon<br />
(di Indonesia)</td>
    <td colspan="5" align="center">Alamat Tempat Tinggal dan Nomor Telepon<br />
(di Negara Ybs)</td>
  </tr>
  <tr>
    <td colspan="5">&nbsp;</td>
    <td colspan="5">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" align="center">Nomor Paspor</td>
    <td colspan="4" align="center">Kewarganegaraan</td>
    <td colspan="3" align="center">Agama</td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
    <td colspan="4">&nbsp;</td>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" align="center">Tanggal Pencacatan Perkawinan</td>
    <td colspan="4" align="center">Nomor Akta</td>
    <td colspan="3" align="center">Institusi/Lembaga Yang Mengeluarkan</td>
  </tr>
  <tr>
    <td align="center">Tgl</td>
    <td align="center">Bln</td>
    <td align="center">Thn</td>
    <td colspan="4" rowspan="2">&nbsp;</td>
    <td colspan="3" rowspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
    <td colspan="4">&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td rowspan="2" align="center" valign="top">4<br />
    Data<br />
    Pelapor</td>
    <td colspan="3">Nik dan Nama Lengkap Pelapor<br />
      (Huruf Cetak)</td>
    <td colspan="4">Hubungan Dengan Bayi</td>
    <td colspan="3">Tanda Tangan Pelapor</td>
  </tr>
  <tr>
    <td height="109" colspan="3">&nbsp;</td>
    <td colspan="4">&nbsp;</td>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td rowspan="2" align="center" valign="top">5<br />
      Data<br />
      Saksi</td>
    <td colspan="3" align="center">Nik dan Nama Lengkap<br />
    Saksi I</td>
    <td colspan="3" align="center">Tanda Tangan<br />
    Saksi I</td>
    <td colspan="2" align="center">Nik dan Nama Lengkap<br />
      Saksi II</td>
    <td colspan="2" align="center">Tanda Tangan<br />
    Saksi II</td>
  </tr>
</table>

</page>