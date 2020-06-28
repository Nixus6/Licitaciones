<?php
session_start();
if (isset($_SESSION['idUser'])){ 
	include('Conexion/conexion.php');
}else{
	header('location: ../index.php');
}

$conexion  = new conexion;
$execute = $conexion->conectar();

//Total
$sentencia = $execute->prepare("SELECT (SELECT COUNT(*) FROM `certificados` where estado = 'Firmado') as firmados, (SELECT COUNT(*) FROM `certificados` where estado = 'Borrador') as borrador, (SELECT COUNT(*)  FROM `certificados` where estado = 'Documento enviado') as documentoEnviado");
$sentencia->execute();
$objeto = $sentencia->fetch(PDO::FETCH_OBJ);


//Colombia Movil
$sentencia = $execute->prepare("SELECT (SELECT COUNT(*) FROM `certificados` where estado = 'Firmado' and operador = 'COLOMBIA MÓVIL S.A. E.S.P.') as firmados, (SELECT COUNT(*) FROM `certificados` where estado = 'Borrador' and operador = 'COLOMBIA MÓVIL S.A. E.S.P.') as borrador, (SELECT COUNT(*)  FROM `certificados` where estado = 'Documento enviado' and operador = 'COLOMBIA MÓVIL S.A. E.S.P.') as documentoEnviado");
$sentencia->execute();
$colombiaMovil = $sentencia->fetch(PDO::FETCH_OBJ);

//Edatel
$sentencia = $execute->prepare("SELECT (SELECT COUNT(*) FROM `certificados` where estado = 'Firmado' and operador = 'EDATEL S.A.') as firmados, (SELECT COUNT(*) FROM `certificados` where estado = 'Borrador' and operador = 'EDATEL S.A.') as borrador, (SELECT COUNT(*)  FROM `certificados` where estado = 'Documento enviado' and operador = 'EDATEL S.A.') as documentoEnviado");
$sentencia->execute();
$edatel = $sentencia->fetch(PDO::FETCH_OBJ);

//Une Telecomunicaciones
$sentencia = $execute->prepare("SELECT (SELECT COUNT(*) FROM `certificados` where estado = 'Firmado' and operador = 'UNE EPM TELECOMUNICACIONES S.A.') as firmados, (SELECT COUNT(*) FROM `certificados` where estado = 'Borrador' and operador = 'UNE EPM TELECOMUNICACIONES S.A.') as borrador, (SELECT COUNT(*)  FROM `certificados` where estado = 'Documento enviado' and operador = 'UNE EPM TELECOMUNICACIONES S.A.') as documentoEnviado");
$sentencia->execute();
$une = $sentencia->fetch(PDO::FETCH_OBJ);



$sentencia = $execute->prepare("SELECT COUNT(*) AS firmadosConRup FROM `certificados` where estado = 'Firmado' and numeroRegistroRut > 0");
$sentencia->execute();
$objeto3 = $sentencia->fetch(PDO::FETCH_OBJ);

$sentencia = $execute->prepare("SELECT COUNT(*) AS noFirmadosConRup FROM `certificados` where (estado = 'Borrador' || estado = 'Documento enviado' ) and numeroRegistroRut > 0");
$sentencia->execute();
$objeto4 = $sentencia->fetch(PDO::FETCH_OBJ);


?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"/>
	<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
	<link rel="icon" type="image/ico" href="Archivos/imagenes/LOGO.ico">
	<title>Certificaciones Grupo Licitaciones</title>
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
	<link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
	<link href="Archivos/Plantilla/css/bootstrap.min.css" rel="stylesheet" />
	<link href="Archivos/Plantilla/css/now-ui-dashboard.css" rel="stylesheet" />
	<link rel="stylesheet" type="text/css" href="Archivos/Plantilla/css/logo.css">
	<link href="Archivos/Plantilla/demo/demo.css" rel="stylesheet" />
	<link rel="stylesheet" type="text/css" href="Archivos/css/estilosPropios.css">
	<script src="Archivos/highcharts/code/highcharts.js"></script>
	<script src="Archivos/highcharts/code/modules/exporting.js"></script>
	<script src="Archivos/highcharts/code/modules/export-data.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

	<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<script src="Archivos/js/upload.js"></script>
	<script src="Archivos/js/alertify.js"></script>
	<link rel="stylesheet" type="text/css" href="Archivos/css/alertify.core.css">
	<link rel="stylesheet" type="text/css" href="Archivos/css/alertify.default.css">
</head>

<body class="">
	<div class="wrapper ">

		<div class="sidebar" data-color="red">

			<div class="logo">
				<a href="#" class="simple-text logo-normal">
					<center> TIGO UNE </center>
				</a>
				<a href="#" class="simple-text logo-normal">
					<center>Grupo Licitaciones</center>
				</a>
			</div>
			<div class="sidebar-wrapper">
				<ul class="nav">
					<li class="">
						<a href="menuPrincipal.php" title="Buscar">
							<i class="now-ui-icons ui-1_zoom-bold"></i>
							<p>Buscar</p>
						</a>
					</li>
					<li class="">
						<a href="agregarCertificado.php" title="Agregar">
							<i class="now-ui-icons ui-1_simple-add"></i>
							<p>Agregar</p>
						</a>
					</li>
					<li class="">
						<a href="consultaPersonal.php" title="Borradores y enviados">
							<i class="now-ui-icons files_paper"></i>
							<p>Borradores y enviados</p>
						</a>
					</li>
					<?php if ($_SESSION['id_rol'] == '1') { ?>
						<li class="">
							<a href="consultaUsuarios.php" title="Usuarios">
								<i class="now-ui-icons users_single-02"></i>
								<p>Usuarios</p>
							</a>
						</li>
						<li class="">
							<a href="graficoCertificados.php" title="Graficos">
								<i class="now-ui-icons business_chart-pie-36"></i>
								<p>Graficos</p>
							</a>
						</li>
					<?php } ?>
				</ul>
			</div>
		</div>

		<div class="main-panel">
			<!-- Navbar -->
			<nav class="navbar navbar-expand-lg fixed-top navbar-transparent  bg-primary  navbar-absolute">
				<div class="container-fluid">
					<div class="navbar-wrapper">
						<a class="navbar-brand" href="#">Certificaciones</a>
					</div>
					<div class="collapse navbar-collapse justify-content-end" id="navigation">
						<ul class="navbar-nav">
							<li class="nav-item">
								<a class="nav-link" href="#">
									<i class="now-ui-icons users_single-02"></i>
									<p>
										<span class=""><?php echo $_SESSION['nameUser']; ?></span>
									</p>
								</a>
							</li>
						</ul>
						<ul class="navbar-nav">
							<li class="nav-item">
								<a class="nav-link" href="cambioContrasena.php">
									<i class="now-ui-icons ui-1_lock-circle-open"></i>
									<p>
										<span class="">Cambio contraseña</span>
									</p>
								</a>
							</li>
						</ul>
						<ul class="navbar-nav">
							<li class="nav-item">
								<a class="nav-link" href="Funciones/cerrarSesion.php">
									<i class="now-ui-icons media-1_button-power"></i>
									<p>
										<span >Salir</span>
									</p>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</nav>
			<div class="panel-header panel-header-lg" id="panel-header">
			</div>
			<div class="content">
				<div class="row">
					<div class="col-lg-12">
						<div class="card  card-tasks">
							<div class="card-body">
								<div class="form-row">
									<div class="form-group col-md-6">
										<div id="total" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
									</div>
									<div class="form-group col-md-6">
										<div id="conCodigos" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
									</div>
									<div class="form-group col-md-4">
										<div id="colombiaMovil" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
									</div>
									<div class="form-group col-md-4">
										<div id="edatel" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
									</div>
									<div class="form-group col-md-4">
										<div id="une" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
									</div>
								</div>
								
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<footer class="footer">
			<div class="container">
				<div class="copyright" id="copyright">
					&copy;
					<script type="text/javascript">
						document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
					</script>, Designed by Jhoan Sebastian Castro Fino and Juan Sebastian Pérez LLerena
				</div>
			</div>
		</footer>
	</div>
</div>

<script type="text/javascript">

	Highcharts.chart('total', {
		chart: {
			plotBackgroundColor: null,
			plotBorderWidth: null,
			plotShadow: false,
			type: 'pie'
		},
		title: {
			text: 'Cantidades totales'
		},
		tooltip: {
			pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
		},
		plotOptions: {
			pie: {
				allowPointSelect: true,
				cursor: 'pointer',
				dataLabels: {
					enabled: false
				},
				showInLegend: true
			}
		},
		series: [{
			name: 'Porcentaje',
			colorByPoint: true,
			data: [{
				name: 'Firmado(<?php echo $objeto->firmados; ?>)',
				y: <?php echo $objeto->firmados; ?>,
				sliced: true,
				selected: true
			}, {
				name: 'Borradores(<?php echo $objeto->borrador; ?>)',
				y: <?php echo $objeto->borrador; ?>
			}, {
				name: 'Documento enviado(<?php echo $objeto->documentoEnviado; ?>)',
				y: <?php echo $objeto->documentoEnviado; ?>
			}]
		}]
	});

	Highcharts.chart('conCodigos', {
		chart: {
			plotBackgroundColor: null,
			plotBorderWidth: null,
			plotShadow: false,
			type: 'pie'
		},
		title: {
			text: 'Certificados con Rup'
		},
		tooltip: {
			pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
		},
		plotOptions: {
			pie: {
				allowPointSelect: true,
				cursor: 'pointer',
				dataLabels: {
					enabled: false
				},
				showInLegend: true
			}
		},
		series: [{
			name: 'Porcentaje',
			colorByPoint: true,
			data: [{
				name: 'Firmado(<?php echo $objeto3->firmadosConRup; ?>)',
				y: <?php echo $objeto3->firmadosConRup; ?>,
				sliced: true,
				selected: true
			}, {
				name: 'No firmados(<?php echo $objeto4->noFirmadosConRup; ?>)',
				y: <?php echo $objeto4->noFirmadosConRup; ?>
			}]
		}]
	});

	Highcharts.chart('colombiaMovil', {
		chart: {
			plotBackgroundColor: null,
			plotBorderWidth: null,
			plotShadow: false,
			type: 'pie'
		},
		title: {
			text: 'Colombia Móvil S.A E.S.P'
		},
		tooltip: {
			pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
		},
		plotOptions: {
			pie: {
				allowPointSelect: true,
				cursor: 'pointer',
				dataLabels: {
					enabled: false
				},
				showInLegend: true
			}
		},
		series: [{
			name: 'Porcentaje',
			colorByPoint: true,
			data: [{
				name: 'Firmado(<?php echo $colombiaMovil->firmados; ?>)',
				y: <?php echo $colombiaMovil->firmados; ?>,
				sliced: true,
				selected: true
			}, {
				name: 'Borradores(<?php echo $colombiaMovil->borrador; ?>)',
				y: <?php echo $colombiaMovil->borrador; ?>
			}, {
				name: 'Documento enviado(<?php echo $colombiaMovil->documentoEnviado; ?>)',
				y: <?php echo $colombiaMovil->documentoEnviado; ?>
			}]
		}]
	});

	Highcharts.chart('une', {
		chart: {
			plotBackgroundColor: null,
			plotBorderWidth: null,
			plotShadow: false,
			type: 'pie'
		},
		title: {
			text: 'Une EPM Telecomunicaciones S.A.'
		},
		tooltip: {
			pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
		},
		plotOptions: {
			pie: {
				allowPointSelect: true,
				cursor: 'pointer',
				dataLabels: {
					enabled: false
				},
				showInLegend: true
			}
		},
		series: [{
			name: 'Porcentaje',
			colorByPoint: true,
			data: [{
				name: 'Firmado(<?php echo $une->firmados; ?>)',
				y: <?php echo $une->firmados; ?>,
				sliced: true,
				selected: true
			}, {
				name: 'Borradores(<?php echo $une->borrador; ?>)',
				y: <?php echo $une->borrador; ?>
			}, {
				name: 'Documento enviado(<?php echo $une->documentoEnviado; ?>)',
				y: <?php echo $une->documentoEnviado; ?>
			}]
		}]
	});

	Highcharts.chart('edatel', {
		chart: {
			plotBackgroundColor: null,
			plotBorderWidth: null,
			plotShadow: false,
			type: 'pie'
		},
		title: {
			text: 'Edatel S.A'
		},
		tooltip: {
			pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
		},
		plotOptions: {
			pie: {
				allowPointSelect: true,
				cursor: 'pointer',
				dataLabels: {
					enabled: false
				},
				showInLegend: true
			}
		},
		series: [{
			name: 'Porcentaje',
			colorByPoint: true,
			data: [{
				name: 'Firmado(<?php echo $edatel->firmados; ?>)',
				y: <?php echo $edatel->firmados; ?>,
				sliced: true,
				selected: true
			}, {
				name: 'Borradores(<?php echo $edatel->borrador; ?>)',
				y: <?php echo $edatel->borrador; ?>
			}, {
				name: 'Documento enviado(<?php echo $edatel->documentoEnviado; ?>)',
				y: <?php echo $edatel->documentoEnviado; ?>
			}]
		}]
	});
</script>
<!--   Core JS Files   -->
<script src="Archivos/Plantilla/js/core/jquery.min.js"></script>
<script src="Archivos/Plantilla/js/core/popper.min.js"></script>
<script src="Archivos/Plantilla/js/core/bootstrap.min.js"></script>
<script src="Archivos/Plantilla/js/plugins/perfect-scrollbar.jquery.min.js"></script>
<script src="Archivos/Plantilla/js/plugins/bootstrap-notify.js"></script>
<script src="Archivos/Plantilla/js/now-ui-dashboard.min.js?v=1.2.0" type="text/javascript"></script>
</body>
</html>