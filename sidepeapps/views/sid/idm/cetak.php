<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<link rel="stylesheet" href="<?= base_url()?>assets/css/css/960.css" type="text/css" media="screen">
	<link rel="stylesheet" href="<?= base_url()?>assets/css/css/screen.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?= base_url()?>assets/css/css/print-preview.css" type="text/css" media="screen">
	<link rel="stylesheet" href="<?= base_url()?>assets/css/css/print.css" type="text/css" media="print" />
	<?php if (is_file(LOKASI_LOGO_DESA . "favicon.ico")): ?>
		<link rel="shortcut icon" href="<?=base_url().LOKASI_LOGO_DESA;?>favicon.ico" />
		<?php else: ?>
			<link rel="shortcut icon" href="<?= base_url()?>favicon.ico" />
		<?php endif; ?>
		<script src="<?= base_url()?>assets/js/amcharts/core.js"></script>
		<script src="<?= base_url()?>assets/js/amcharts/charts.js"></script>
		<script src="<?= base_url()?>assets/css/css/jquery.tools.min.js"></script>
				<script src="<?= base_url()?>assets/css/css/jquery.print-preview.js" type="text/javascript" charset="utf-8"></script>

		<script type="text/javascript">
			$(function()
			{
				$("#feature > div").scrollable({interval: 2000}).autoscroll();

				setTimeout(() => $.printPreview.loadPrintPreview(), 1000);

			});
		</script>
	</head>
	<body>
		<div id="content" class="container_12 clearfix">
			<div id="piechart_status">
				
			</div>
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
            				"autoMargins": true,
            				"labels": {
                			"text": "[bold {color}][/]",
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
    					},
    					"piechart_status",
    					"PieChart");
    				});
				</script>

				<table>
					<tr>
						<td>IKS</td><td>: </td><td><?=$idm_skor[0] ?></td>
					</tr>
					<tr>
						<td>IKE</td><td>: </td><td><?=$idm_skor[1] ?></td>
					</tr>
					<tr>
						<td>IKL</td><td>: </td><td><?=$idm_skor[2] ?></td>
					</tr>
					<tr>
						<td>IDM</td><td>:  </td><td><?=$idm_skor[3] ?></td>
					</tr>
					<tr>
						<td>Status</td><td>:  </td><td><span class="badge <?php

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

								?>"><?=$idm_skor[4] ?></span></td>
					</tr>	
				</table>



<?php $row = $idm_data['mapData']['ROW'] ?>
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
			
				<td class="<?php echo empty($baris['NO']) ? 'bg-orange' : '' ?>">
					<?=$baris[$key] ?>
			
				</td>
			
			<?php endforeach ?>
			
		</tr>
		
	<?php endforeach ?>
</table>


		</div>
	</body>

