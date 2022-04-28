<?php
$nilai_residu               = 0;
$nilai_penyusutan           = 0;
$nilai_akumulasi_penyusutan = 0;
$nilai_buku_aktiva          = 0;

$umur_ekonomis = isset($_POST['umur_ekonomis']) ? $_POST['umur_ekonomis'] : 5;

// hitung nilai penyusutan
$nilai_residu     = (($main->harga * $this->residu) / 100);
$nilai_penyusutan = ($main->harga - $nilai_residu) / $umur_ekonomis;
?>

<div class="box box-info">
    <div class="box-header with-border">
        <form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
            <div class="col-sm-4">
                <div class="form-group">
                    <select name="umur_ekonomis" class="select2 form-control" required="">
                        <option value="">Pilih Umur Ekonomis</option>
                        <?php for ($i = 1; $i <= 20; $i++) {?>
                        <option value="<?=$i?>" <?=($umur_ekonomis == $i) ? 'selected' : ''?>><?=$i?> Tahun</option>
                        <?php }?>
                    </select>
                </div>
            </div>

            <div class="col-sm-2">
                <button type="submit" class="btn btn-sm btn-primary btn-flat btn-social"><i class="fa fa-search"></i>
                    Tampilkan</button>
            </div>
        </form>
    </div>

    <div class="box-body">
        <div class="alert alert-info">
            Persentase nilai residu per tahun adalah 10% dari harga beli. ( <?=$main->harga?> * 10% )<br />
            Umur Ekonomis = <?=$umur_ekonomis?> tahun<br />
            Jumlah Residu = Rp. <?=number_format($nilai_residu, 2, ',', '.')?> / <?=$umur_ekonomis?> tahun<br />
            Nilai Penyusutan = Rp. <?=number_format($nilai_penyusutan, 2, ',', '.')?> / tahun<br /><br />

            Perhitungan penyusutan Aktiva Tetap ini menggunakan metode Garis Lurus dengan rumus => ( Harga Beli - Total
            Residu ) / Umur Ekonomis.
        </div>

        <h4>Rincian Nilai Penyusutan dari Tahun</h4>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="bg-primary">
                    <tr>
                        <th>Tahun</th>
                        <th>Nilai Penyusutan</th>
                        <th>Akumulasi Penyusutan</th>
                        <th>Nilai Aktiva</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
for ($i = 1; $i <= $umur_ekonomis; $i++) {
 $nilai_akumulasi_penyusutan += $nilai_penyusutan;
 $nilai_buku_aktiva = $main->harga - $nilai_akumulasi_penyusutan;
 ?>
                    <tr>
                        <td><?=($main->tahun_pengadaan + $i)?></td>
                        <td>Rp. <?=number_format($nilai_penyusutan, 2, ',', '.')?></td>
                        <td>Rp. <?=number_format($nilai_akumulasi_penyusutan, 2, ',', '.')?></td>
                        <td>Rp. <?=number_format($nilai_buku_aktiva, 2, ',', '.')?></td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</div>