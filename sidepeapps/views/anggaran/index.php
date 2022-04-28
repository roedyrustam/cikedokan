<div class="content-wrapper">
	<section class="content-header">
		<h1>Anggaran <?=ucwords($this->setting->sebutan_desa)?> Tahun <?php echo $tahun ?></h1>
		<ol class="breadcrumb">
			<li><a href="<?= site_url('hom_sid')?>"><i class="fa fa-home"></i> Home</a></li>
			<li class="active">Anggaran <?=ucwords($this->setting->sebutan_desa)?></li>
		</ol>
	</section>

	<section class="content" id="maincontent">

		<?php if($this->session->flashdata('message')) echo $this->session->flashdata('message'); ?>

		<div class="box box-primary">
			<div class="box-header with-border">
				<div class="row">
					<div class="col-sm-4">
						<a href="<?php echo site_url('anggaran/tambah?type='.$type.'&tahun='.$tahun) ?>" class="btn btn-social btn-flat btn-sm btn-success"><i class="fa fa-plus"></i> Tambah Anggaran</a>
					</div>

					<div class="col-sm-8 text-right">
						<label>Pilih Tahun: </label>
						<select id="pilih-tahun" name="tahun_sc" class="select2" style="width: 100px" onchange="return filter(this.value)">
							<option value="">Pilih Tahun</option>
							<?php foreach($data_tahun->result() as $d){ ?>
								<option value="<?php echo $d->tahun; ?>" <?php echo $tahun==$d->tahun ? 'selected' : '' ?>><?php echo $d->tahun; ?></option>
							<?php } ?>
						</select>
					</div>
				</div>
			</div>

			<div class="box-body">
				<div class="table-responsive">
					<table id="tabel3" class="table table-striped table-bordered dataTable">
						<thead>
							<tr>
								<th>No</th>
								<th>Aksi</th>
								<th>Nama Anggaran</th>
								<th>Kategori</th>
								<th>Tahun</th>
								<th>Jumlah</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($data_anggaran->result_array() as $no => $data){ ?>
								<tr>
									<td><?php echo $no+1 ?></td>
									<td nowrap>
										<a href="<?php echo site_url('anggaran/edit/'.$data['id'].'?type='.$type.'&tahun='.$tahun); ?>" class="btn btn-social btn-sm btn-flat btn-warning"><i class="fa fa-edit"></i> Edit</a>
										<a href="<?php echo site_url('anggaran/hapus/'.$data['id'].'?type='.$type.'&tahun='.$tahun); ?>" class="btn btn-social btn-flat btn-sm btn-danger"><i class="fa fa-trash"></i> Hapus</a>
									</td>
									<td><?php echo $data['nama_anggaran'] ?></td>
									<td><?php echo $data['kategori']; ?></td>
									<td><?php echo $data['tahun'] ?></td>
									<td><?php echo uang_indo($data['jumlah']) ?></td>
									
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>

	</section>

</div>

<script type="text/javascript">
	function filter(tahun) {
		window.location.href = "<?php echo site_url('anggaran?type='.$type.'&tahun=') ?>" + tahun;
	}
</script>

