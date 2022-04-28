<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<script src="<?php echo base_url()?>assets/js/highcharts/highcharts.js"></script>
<script src="<?php echo base_url()?>assets/js/highcharts/highcharts-more.js"></script>
<script src="<?php echo base_url()?>assets/js/highcharts/exporting.js"></script>
<script type="text/javascript">
	$(document).ready(function() {hiRes ();});
	var chart;
	function hiRes () {
		chart = new Highcharts.Chart({
			chart: {
				renderTo: 'chart',
				border:0,
				defaultSeriesType: 'column'
			},
			title: {
				text: ''
			},
			xAxis: {
				title: {
					text:''
				},
				categories: [
				<?php $i=0;foreach($list_jawab as $data){$i++;?>
					<?php if($data['nilai'] != "-"){echo "'$data[jawaban]',";}?>
				<?php }?>
				]
			},
			yAxis: {
				title: {
					text: 'Jumlah Populasi'
				}
			},
			legend: {
				layout: 'vertical',
				enabled:false
			},
			plotOptions: {
				series: {
					colorByPoint: true
				},
				column: {
					pointPadding: 0,
					borderWidth: 0
				}
			},
			series: [{
				shadow:1,
				border:0,
				name: 'Jumlah',
				data: [
				<?php foreach($list_jawab as $data){?>
					<?php if($data['jawaban'] != "TOTAL"){?>
						<?php if($data['nilai'] != "-"){?>
							<?php echo $data['nilai']?>,
						<?php }?>
					<?php }?>
					<?php }?>]

				}]
			});
	};

</script>
<style>
tr#total{
	background:#fffdc5;
	font-size:12px;
	white-space:nowrap;
	font-weight:bold;
}
h3{ margin-left: 10px; }
</style>

<div class="box-header">
	<h3><?php echo ucwords($indikator)?></h3>
</div>

<div id="box-body" class="box-body">
	<div class="ui-layout-center" id="chart" style="padding: 5px;"></div>
	<table class="table table-striped">
		<thead>
			<tr>
				<th width="30">No</th>
				<th>Jawaban</th>
				<th>Jumlah Responden</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($list_jawab as $data): ?>
				<tr>
					<td><?php echo $data['no']?></td>
					<td><?php echo $data['jawaban']?></td>
					<td><?php echo $data['nilai']?></td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>

<div class="box-footer text-right">
	<a href="<?php echo site_url()?>analisis" class="btn btn-default btn-xs">< Kembali</a>
</div>