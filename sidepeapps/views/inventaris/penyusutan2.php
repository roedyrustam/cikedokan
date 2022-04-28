<?php
$nilai_residu               = 0;
$nilai_penyusutan           = 0;
$nilai_akumulasi_penyusutan = 0;
$nilai_buku_aktiva          = 0;

$tahun_pengadaan = date('Y', strtotime($main->tanggal_dokument));
$umur_ekonomis   = isset($_POST['umur_ekonomis']) ? $_POST['umur_ekonomis'] : 10;

// hitung nilai penyusutan
//$nilai_residu = ( ( $main->harga * $this->residu ) / 100 );
$nilai_penyusutan = ($main->harga / $umur_ekonomis);
?>

<div class="box box-info">
    <div class="box-header with-border">
        <form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
            <div class="col-sm-4">
                <div class="form-group">
                    <select name="umur_ekonomis" class="select2 form-control" required="">
                        <option value="">Pilih Periode Masa Manfaat</option>
                        <?php for ($i = 10; $i <= 20; $i++) {?>
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
            Nilai Penyusutan per tahun adalah Rp. <?=number_format($nilai_penyusutan, 2, ',', '.')?><br /><br />

            Perhitungan penyusutan Aktiva Tetap ini menggunakan metode Garis Lurus tanpa nilai residu, dengan rumus => (
            Harga Beli - Umur Ekonomis )
        </div>

        <h4>Rincian Nilai Penyusutan per Tahun</h4>
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
                        <td><?=($tahun_pengadaan + $i)?></td>
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