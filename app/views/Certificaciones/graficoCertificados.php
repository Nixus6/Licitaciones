<?php

include("app/models/conexionCERT.php");
$conexion  = new conexionCert;
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


<?php include FOLDER_TEMPLATE . "scripts.php"; ?>

<!--graficoCertificados-->
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