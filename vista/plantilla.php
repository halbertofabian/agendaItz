<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Itz Agenda</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="vista/img/icon.ico" type="image/x-icon" />

	<!-- Fonts and icons -->
	<script src="vista/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {
				"families": ["Lato:300,400,700,900"]
			},
			custom: {
				"families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"],
				urls: ['vista/css/fonts.min.css']
			},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>
	<!--Aquí los archivos css-->
	<!-- CSS Files -->
	<link rel="stylesheet" href="vista/css/bootstrap.min.css">
	<link rel="stylesheet" href="vista/css/atlantis.min.css">

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="vista/css/demo.css">

	<!--Aquí terminan los archivos css-->


	<!--Aquí los archivos js-->

<!-- Sweet Alert -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

	<!--Aquí terminan los archivos js-->


</head>

<body>
	<div class="wrapper">


		

		<!--Menu cabezera-->

		<?php include_once 'vista/modulos/menu-cabezera.php';  ?>

		<!--Fin de la cabezera-->

		<!-- Sidebar -->
		<?php include_once 'vista/modulos/menu-lateral.php';  ?>
		<!-- End Sidebar -->

		<div class="main-panel">
			<div class="content">

				<div class="container"><br>

					<?php if (isset($_GET["ruta"])) {
						if (
							

							

							$_GET["ruta"] == "evento"  ||

							$_GET["ruta"] == "invitado" ||

							$_GET["ruta"] == "lugar" || 

							$_GET["ruta"] == "persona" ||

							$_GET["ruta"] == "tematica" ||

							$_GET["ruta"] == "actividad" 



						) {

							include_once 'vista/paginas/' . $_GET["ruta"] . '.php';
						} else {
							echo "Error 404";
						}
					} else {
						include_once 'vista/paginas/inicio.php';
					}


					?>



					<!--<?php  ?>-->



				</div>

			</div>




			<!-- Footer -->
			<?php include_once 'vista/modulos/pie-pagina.php';  ?>
			<!-- End Footer -->

		</div>


	</div>
	<!--   Core JS Files   -->
	<script src="vista/js/core/jquery.3.2.1.min.js"></script>
	<script src="vista/js/core/popper.min.js"></script>
	<script src="vista/js/core/bootstrap.min.js"></script>

	<!-- jQuery UI -->
	<script src="vista/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="vista/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

	<!-- Sweet Alert -->


	<!-- jQuery Scrollbar -->
	<script src="vista/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>


	<!-- Chart JS -->
	<script src="vista/js/plugin/chart.js/chart.min.js"></script>

	<!-- jQuery Sparkline -->
	<script src="vista/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

	<!-- Chart Circle -->
	<script src="vista/js/plugin/chart-circle/circles.min.js"></script>

	<!-- Datatables -->
	<script src="vista/js/plugin/datatables/datatables.min.js"></script>

	<!-- Bootstrap Notify -->
	<script src="vista/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

	<!-- jQuery Vector Maps -->
	<script src="vista/js/plugin/jqvmap/jquery.vmap.min.js"></script>
	<script src="vista/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>

	

	<!-- Atlantis JS -->
	<script src="vista/js/atlantis.min.js"></script>

	<!-- Atlantis DEMO methods, don't include it in your project! -->
	<script src="vista/js/setting-demo.js"></script>
	<script src="vista/js/demo.js"></script>
	<script>
		Circles.create({
			id: 'circles-1',
			radius: 45,
			value: 60,
			maxValue: 100,
			width: 7,
			text: 5,
			colors: ['#f1f1f1', '#FF9E27'],
			duration: 400,
			wrpClass: 'circles-wrp',
			textClass: 'circles-text',
			styleWrapper: true,
			styleText: true
		})

		Circles.create({
			id: 'circles-2',
			radius: 45,
			value: 70,
			maxValue: 100,
			width: 7,
			text: 36,
			colors: ['#f1f1f1', '#2BB930'],
			duration: 400,
			wrpClass: 'circles-wrp',
			textClass: 'circles-text',
			styleWrapper: true,
			styleText: true
		})

		Circles.create({
			id: 'circles-3',
			radius: 45,
			value: 40,
			maxValue: 100,
			width: 7,
			text: 12,
			colors: ['#f1f1f1', '#F25961'],
			duration: 400,
			wrpClass: 'circles-wrp',
			textClass: 'circles-text',
			styleWrapper: true,
			styleText: true
		})

		var totalIncomeChart = document.getElementById('totalIncomeChart').getContext('2d');

		var mytotalIncomeChart = new Chart(totalIncomeChart, {
			type: 'bar',
			data: {
				labels: ["S", "M", "T", "W", "T", "F", "S", "S", "M", "T"],
				datasets: [{
					label: "Total Income",
					backgroundColor: '#ff9e27',
					borderColor: 'rgb(23, 125, 255)',
					data: [6, 4, 9, 5, 4, 6, 4, 3, 8, 10],
				}],
			},
			options: {
				responsive: true,
				maintainAspectRatio: false,
				legend: {
					display: false,
				},
				scales: {
					yAxes: [{
						ticks: {
							display: false //this will remove only the label
						},
						gridLines: {
							drawBorder: false,
							display: false
						}
					}],
					xAxes: [{
						gridLines: {
							drawBorder: false,
							display: false
						}
					}]
				},
			}
		});

		$('#lineChart').sparkline([105, 103, 123, 100, 95, 105, 115], {
			type: 'line',
			height: '70',
			width: '100%',
			lineWidth: '2',
			lineColor: '#ffa534',
			fillColor: 'rgba(255, 165, 52, .14)'
		});
	</script>
</body>

</html>