<div class="content-wrapper">

	<section class="content-header">
		<div class="title-header">Indeks Desa Membangun Tahun <?php echo isset($_GET['tahun']) ? $_GET['tahun'] : date('Y'); ?></div>
			<ol class="breadcrumb">
				<li><a href="<?= site_url('hom_sid')?>"><i class="fa fa-home"></i> Home</a></li>
				<li class="active">Indeks Desa  Membangun</li>
			</ol>
	</section>

	<section class="content" id="maincontent">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-info">
					<div class="box-header" style="padding:15px 20px 0 20px">
						<div class="row">
						<div class="col-md-10 col-xs-12">
							<a href="<?=site_url() ?>/idm_sid/excel" target="_blank" class="btn btn-radius btn-uppercase btn-sm btn-success" style="margin-right:10px;">Eksport ke Excel</a>
							<a href="<?=site_url() ?>/idm_sid/cetak" target="_blank" class="btn btn-radius btn-uppercase btn-sm btn-primary" style="margin-right: 10px;">Cetak</a>
						</div>
						<div class="col-md-2 col-xs-12"  style="float: right;">
							<form id="main" method="get">							
								<select class="form-control select2 " id="tahun" name="tahun" onchange="formAction('main')">
									<option selected="selected">--- Pilih Tahun ---</option>
								<?php for ($i = date('Y'); $i >= 2019; $i -= 1): ?>
									<option value="<?=$i ?>"><?=$i ?></option>
								<?php endfor; ?>
								</select>							
							</form>
						</div>
					</div>
					</div>
					<div class="box-header with-border" style="padding:15px 20px 0 20px;">
						<div class="row">
							<div class="col-md-6">
								<div class="idm-poin">
									<div class="table-responsive">
										<table class="table table-bordered table-striped">
											<tr>
												<td style="padding: 10px 5px;">Indeks Ketahanan Sosial (IKS)</td>
												<td class="text-center" width="2%">:</td>
												<td class="idm-skor"><?=$idm_skor[0] ?></td>
											</tr>
											<tr>
												<td style="padding: 10px 5px;">Indeks Ketahanan Ekonomi (IKE)</td>
												<td class="text-center" width="2%">:</td>
												<td><?=$idm_skor[1] ?></td>
											</tr>
											<tr>
												<td style="padding: 10px 5px;">Indeks Ketahanan Lingkungan (IKL)</td>
												<td class="text-center" width="2%">:</td>
												<td><?=$idm_skor[2] ?></td>
											</tr>
											<tr>
												<td style="padding: 10px 5px;">Indeks Desa Membangun (IDM)</td>
												<td class="text-center" width="2%">:</td>
												<td><?=$idm_skor[3] ?></td>
											</tr>
											<tr>
												<td style="padding: 10px 5px;">Status</td>
												<td class="text-center" width="2%">:</td>
												<td style="padding-top: 13px;">
													<span class="badge <?php
													if ($idm_skor[4] == 'Tertinggal')
													{
														echo "bg-red";
													}
													else if ($idm_skor[4] == 'Berkembang')
													{
														echo "bg-orange";
													}
													if ($idm_skor[4] == 'Maju')
													{
														echo "bg-green";
													}
													?>" style="font-size: 14px;padding: 10px 15px;border-radius: 5px;text-transform: uppercase;text-align: center;"><?=$idm_skor[4] ?></span>
												</td>
											</tr>										
										</table>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div id="piechart_status"></div>
							</div>
						</div>
					</div>
					<div class="box-body" style="padding:20px">
					<?php $row = $idm_data['mapData']['ROW'] ?>
						<div class="table-responsive">
							<table class="table table-bordered table-striped dataTable table-hover">
								<thead class="bg-gray disabled color-palette">
									<tr>	
									<?php foreach ($row[0] as $key => $value): ?>
										<td>
											<?=$key ?>
										</td>
									<?php endforeach; ?>	
									</tr>
								</thead>	
								<?php foreach ($row as $baris): ?>
								<tr>			
								<?php foreach ($row[0] as $key => $value): ?>
									<td class="<?php echo empty($baris['NO']) ? 'bg-green' : '' ?>" style="padding: 10px 5px">
										<?=$baris[$key] ?>
									</td>
								<?php endforeach ?>								
								</tr>
								<?php endforeach ?>
							</table>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>

<script src="<?= base_url()?>assets/js/amcharts/core.js"></script>
<script src="<?= base_url()?>assets/js/amcharts/charts.js"></script>

              <script>
    am4core.ready(function() {
        am4core.createFromConfig({
        "series": [{
            "type": "PieSeries",
            "dataFields": {
                "value": "point",
                "category": "series"
            },
            "legendSettings": {
                "valueText": "[bold {color}]{value} / {value.percent}%[/]"
            }
        }],
        "legend": {
            "type": "Legend",
            "markerType": "circle",
            "position": "right",
            "autoMargins": false,
            "labels": {
                "text": "[bold {color}]{name}[/]",
            },
            "valueWidth": 80,
            "textClickEnabled": true
        },
        "data": [{
            "series": "IKS",
            "point": <?=$idm_skor[0] ?>      }, {
            "series": "IKE",
            "point": <?=$idm_skor[1] ?>        }, {
            "series": "IKL",
            "point": <?=$idm_skor[2] ?>       }],
    }, "piechart_status", "PieChart");
    });
</script>