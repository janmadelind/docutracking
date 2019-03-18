<!DOCTYPE html>

<head>
    <link rel='stylesheet' type='text/css' href="<?php echo base_url('assets/PR_assets/css/print.css');?>" media="print" />
</head>

<body>
    <section class="content">    	
        <div class="container-fluid">

		<script type="text/javascript">
			$(function () {  
			    new Chart(document.getElementById("mpr").getContext("2d"), getChartJs('month'));
			    new Chart(document.getElementById("qpr").getContext("2d"), getChartJs('quarter'));
			    new Chart(document.getElementById("tpc").getContext("2d"), getChartJs('college')); 
			    new Chart(document.getElementById("mpc").getContext("2d"), getChartJs('monthcol'));
			    new Chart(document.getElementById("tpd").getContext("2d"), getChartJs('dept'));
			    new Chart(document.getElementById("tpmp").getContext("2d"), getChartJs('mode'));
			    new Chart(document.getElementById("mpmp").getContext("2d"), getChartJs('monthmode'));
			});
			var js_obj_data = JSON.parse(js_data );
			function getChartJs(type) {
			    var config = null;
				// alert( <?php echo json_encode($monthly_report, JSON_NUMERIC_CHECK); ?>);
			    if (type === 'month') {
			        config = {
			            type: 'line',
			             data: {
			                labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
			                datasets: [{
			                    label: "Total Submitted PRs",
			                    data: <?php echo json_encode($monthly_report, JSON_NUMERIC_CHECK); ?>,
			                    backgroundColor: 'rgb(153, 0, 0, 0.8)'
			                }]
			            },
			            options: {
			                responsive: true,
			                legend: false
			            }
			        }
			    }
			    else if (type === 'quarter') {
			        config = {
			            type: 'line',
			             data: {
			                labels: ["1st Quarter", "2nd Quarter", "3rd Quarter", "4th Quarter"],
			                datasets: [{
			                    label: "Total Submitted PRs",
			                    data: <?php echo json_encode($quarterly_report, JSON_NUMERIC_CHECK); ?>,
			                    backgroundColor: 'rgb(153, 0, 0, 0.8)'
			                }]
			            },
			            options: {
			                responsive: true,
			                legend: false
			            }
			        }
			    }
			    else if (type === 'college') {
			        config = {
			            type: 'bar',
			            data: {
			                labels: ["COS", "CLA", "CIE", "CIT", "COE", "CAFA"],
			                datasets: [{
			                    label: "Total Submitted PRs",
			                    data: <?php echo json_encode($per_college_report, JSON_NUMERIC_CHECK); ?> , //$dataPoints4
			                    backgroundColor: 'rgb(64, 64, 64, 0.8)'
			                }]
			            },
			            options: {
			                responsive: true,
			                legend: false
			            }
			        }
			    }
			    else if (type === 'monthcol') {
			        config = {
			            type: 'bar',
			            data: {
			                labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
			                datasets: [{
			                    label: "COS",
			                    data:  <?php echo json_encode($cos_month_report, JSON_NUMERIC_CHECK); ?>,	//$moncol1
			                    backgroundColor: 'rgb(153, 0, 0, 0.8)'
			                },{
			                	 label: "CLA",
			                    data:  <?php echo json_encode($cla_month_report, JSON_NUMERIC_CHECK); ?>,	//$moncol2
			                    backgroundColor: 'rgb(255, 77, 103, 0.8)'
			                },{
			                	 label: "CIE",
			                    data:  <?php echo json_encode($cie_month_report, JSON_NUMERIC_CHECK); ?> ,	//$moncol3
			                    backgroundColor: 'rgb(0, 102, 255, 0.8)'
			                },{
			                	 label: "CIT",
			                    data:  <?php echo json_encode($cit_month_report, JSON_NUMERIC_CHECK); ?>,	//$moncol4
			                    backgroundColor: 'rgb(0, 128, 43, 0.8)'
			                },{
			                	 label: "COE",
			                    data:  <?php echo json_encode($coe_month_report, JSON_NUMERIC_CHECK); ?> ,	//$moncol5
			                    backgroundColor: 'rgb(230, 92, 0, 0.8)'
			                },{
			                	 label: "CAFA",
			                    data:  <?php echo json_encode($cafa_month_report, JSON_NUMERIC_CHECK); ?>,	//$moncol6
			                    backgroundColor: 'rgb(230, 230, 0, 0.8)'
			                }]
			            },
			            options: {
			                responsive: true,
			                legend: false
			            }
			        }
			    }
			    else if (type === 'dept') {
			        config = {
			            type: 'bar',
			            data: {
			                labels: ["Math", "Physics", "Chem", "SS", "English", "Filipino", "PE", "ME", "Electrical Eng", "CE", "Electronics Eng", "CET", "Electrical ET", "Electronics ET", "FAT", "GAPT", "MET", "PPET", "BIT", "TA", "HE", "PIE", "ST", "FA", "Graphics", "Archi"],
			                datasets: [{
			                    label: "Total Submitted PRs",
			                    data: <?php echo json_encode($per_dept_report, JSON_NUMERIC_CHECK); ?>,
			                    backgroundColor: 'rgb(64, 64, 64, 0.8)'
			                }]
			            },
			            options: {
			                responsive: true,
			                legend: false
			            }
			        }
			    }
			    else if (type === 'mode') {
			        config = {
			            type: 'bar',
			            data: {
			                labels: ["Small Value", "Shopping", "Negotiated", "Direct Contracting"],
			                datasets: [{
			                    label: "Total Submitted PRs",
			                    data: <?php echo json_encode($per_mode_report, JSON_NUMERIC_CHECK); ?>,
			                    backgroundColor: 'rgb(64, 64, 64, 0.8)'
			                }]
			            },
			            options: {
			                responsive: true,
			                legend: false
			            }
			        }
			    }
			    else if (type === 'monthmode') {
			        config = {
			            type: 'bar',
			            data: {
			                labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
			                datasets: [{
			                    label: "Small Value",
			                    data: <?php echo json_encode($svp_month_report, JSON_NUMERIC_CHECK); ?>,	
			                    backgroundColor: 'rgb(255, 77, 103, 0.8)'
			                },{
			                	label: "Shopping",
			                    data: <?php echo json_encode($s_month_report, JSON_NUMERIC_CHECK); ?>,	
			                    backgroundColor: 'rgb(0, 102, 255, 0.8)'
			                },{
			                	label: "Negotiated",
			                    data: <?php echo json_encode($np_month_report, JSON_NUMERIC_CHECK); ?>,	
			                    backgroundColor: 'rgb(0, 128, 43, 0.8)'
			                },{
			                	label: "Direct Contracting",
			                    data: <?php echo json_encode($dc_month_report, JSON_NUMERIC_CHECK); ?>,	
			                    backgroundColor: 'rgb(230, 230, 0, 0.8)'
			                }]
			            },
			            options: {
			                responsive: true,
			                legend: false
			            }
			        }
			    }
				return config;
			}
		</script>


	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	    <div class="card">
	        <div class="header">
	            <h2>Monthly PR Report</h2>
	        </div>
	   		<div class="body">
	        	<canvas id="mpr" height="100"></canvas>
	    	</div>
	    </div>
	</div>

	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	    <div class="card">
	        <div class="header">
	            <h2>Quarterly PR Report</h2>
	        </div>
	   		<div class="body">
	        	<canvas id="qpr" height="100"></canvas>
	    	</div>
	    </div>
	</div>

	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	    <div class="card">
	        <div class="header">
	            <h2>Total PR Report per College</h2>
	        </div>
	   		<div class="body">
	        	<canvas id="tpc" height="100"></canvas>
	    	</div>
	    </div>
	</div>

	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	    <div class="card">
	        <div class="header">
	            <h2>Monthly Report per Colleges</h2>
	        </div>
	   		<div class="body">
	        	<canvas id="mpc" height="100"></canvas>
	    	</div>
	    </div>
	</div>

	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	    <div class="card">
	        <div class="header">
	            <h2>Total PR Report per Departments</h2>
	        </div>
	   		<div class="body">
	        	<canvas id="tpd" height="100"></canvas>
	    	</div>
	    </div>
	</div>

	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	    <div class="card">
	        <div class="header">
	            <h2>Total PR Report per Mode of Procurement</h2>
	        </div>
	   		<div class="body">
	        	<canvas id="tpmp" height="100"></canvas>
	    	</div>
	    </div>
	</div>

	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	    <div class="card">
	        <div class="header">
	            <h2>Monthly Report per Mode of Procurement</h2>
	        </div>
	   		<div class="body">
	        	<canvas id="mpmp" height="100"></canvas>
	    	</div>
	    </div>
	</div>



		
	<div class="icon-button-demo m-t-15 m-b-25 align-center noprint">
	    <button type="button" class="btn bg-red btn-circle-lg waves-effect waves-circle waves-float" onclick="window.print();">
	      	<i class="material-icons">print</i>
	    </button>
	 </div>

	 <!-- Chart Plugins Js -->
	    <script src="<?php echo base_url('assets/plugins/chartjs/Chart.bundle.js');?>"></script>

</body>
</html>