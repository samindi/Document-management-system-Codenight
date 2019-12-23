<?php

require_once 'db.php';

$load = $_POST["load"];

if (isset($load)) {
?>
<script>
	var ctx1 = document.getElementById('chartContainer1');
	var chart1 = new Chart(ctx1, {
	    type: 'horizontalBar',
	    data: {
	        labels: ['Students Documents', 'Medical Reports', 'Attendance Reports'],
	        datasets: [{
	            label: 'Documents',
	            backgroundColor: '#b36ffc',
	            data: [12, 17, 6],
	            borderWidth: 1
	        }]
	    },
	    options: {
	    	legend: {
	    		display: false
	    	},
	    	scales: {
				yAxes: [{
					scaleLabel: {
						display: true,
						labelString: 'Document Type'
					},
					ticks: {
	                    beginAtZero: true
	                }
				}],
				xAxes: [{
					scaleLabel: {
						display: true,
						labelString: 'Number of Documents'
					},
					ticks: {
	                    beginAtZero: true
	                },
					borderWidth: 50
				}]
			},
			tooltips: {
	            titleFontSize: 13
			},
	    	plugins: {
	    		labels: false
	    	}
	    }
	});

	var ctx6 = document.getElementById('chartContainer6').getContext('2d');
	var chart6 = new Chart(ctx6, {
	    type: 'line',
	    data: {
	        labels: ['01/01/2019','04/01/2019','07/01/2019','12/01/2019','20/01/2019','26/01/2019','04/02/2019','10/02/2019','12/02/2019','17/02/2019','20/02/2019','28/02/2019','03/03/2019'],
	    	datasets: [{
	    		label: "Documents",
	    		backgroundColor: 'rgba(14, 78, 181, 0.4)',
				borderColor: '#0e4eb5',
				pointBorderWidth: 5,
				pointHoverBorderWidth: 5,
	            data: [2, 3, 6, 4, 8, 3, 4, 9, 3, 4, 1, 6, 5]
	        }]
	    },
	    options: {
	    	title: {
				display: false
			},
	    	legend: {
	    		display: false
	    	},
	    	scales: {
				yAxes: [{
					scaleLabel: {
						display: true,
						labelString: 'Number of Documents'
					},
					ticks: {
		                beginAtZero: true
		            }
				}],
				xAxes: [{
					scaleLabel: {
						display: true,
						labelString: 'Created Date'
					}
				}]
			},
			tooltips:{
				titleFontSize: 14,
				mode: 'index',
				intersect: false
			}
	    }
	});
	Chart.platform.disableCSSInjection = true;
</script>
<div class="dash-graph-content">
	<div class="graph-title"><i class="fas fa-copy fa-lg"></i> Document Types</div>
	<div class="graph-chart" id="graph-chart1"><canvas id="chartContainer1" style="height: 300px; width: 100%;"></canvas></div>
</div>
<br>
<div class="dash-graph-content">
	<div class="graph-title"><i class="fas fa-folder-plus fa-lg"></i> Documents Created</div>
	<div class="graph-chart" id="graph-chart4"><canvas id="chartContainer6" style="height: 300px; width: 100%;"></canvas></div>
</div>
<?php
}

?>