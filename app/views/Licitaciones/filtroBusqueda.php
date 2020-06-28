<?php include "../../../config.php"; ?>
<?php
session_start();
if (isset($_SESSION['id'])) {
	$_SESSION['rol'] = $_SESSION['rollicita'];
} else {
	header('location: ../index.php');
}
include("../../models/clases_funciones.php");
$sentencia	= new conexion;
$seguimiento = $sentencia->_conexion();
?>


<div id="wrapper" class="animate">
	<div id="contenedor">
		<div id="carga"></div>

	</div>


	<style>
		#contenedor {
			background-color: rgb(140, 161, 189, 0.9);
			height: 100%;
			width: 100%;
			position: fixed;
			-webkit-transition: all 1s ease;
			-o-transition: all 1s ease;
			transition: all 1s ease;
			z-index: 10000;
		}

		#carga {
			border: 15px solid #ccc;
			border-top-color: #0060c4;
			border-top-style: groove;
			height: 100px;
			width: 100px;
			border-radius: 100%;
			position: absolute;
			top: 0;
			left: 0;
			right: 0;
			bottom: 0;
			margin: auto;
			-webkit-animation: girar 1.5s linear infinite;
			-o-animation: girar 1.5s linear infinite;
			animation: girar 1.5s linear infinite;

		}

		@keyframes girar {
			from {
				transform: rotate(0deg);
			}

			to {
				transform: rotate(360deg);
			}
		}
	</style>


	<script>
		window.onload = function() {
			var contenedor = document.getElementById('contenedor');

			contenedor.style.visibility = 'hidden';
			contenedor.style.opacity = '0';
		}
	</script>

	<!DOCTYPE html>
	<html lang="es">


	<?php include FOLDER_TEMPLATE . "head.php"; ?>



	<body class="">

		<div class="wrapper ">


			<?php include FOLDER_TEMPLATE . "licitaciones/menu.php"; ?>

			<div class="main-panel">

				<?php include FOLDER_TEMPLATE . "licitaciones/top.php"; ?>

				<div class="content">
					<div class="container-fluid">
						<div class="row">
							<div class="col-md-12">
								<div class="card ">
									<div class="card-body">


										<?php
										if (!empty($_POST['opciones'])) {
											$tabla = $_POST['opciones'];
											$dato = $_POST['datoB'];
										} else {
											$tabla = $_GET['opciones'];
											$dato = $_GET['datoB'];
										}
										if ($tabla === "todo") {
											header('location: consultarLicitaciones.php');
										}
										if ($_SESSION['rol'] === "Govermment") {
											$filtro = $seguimiento->query("SELECT SG.id,SG.myse,ST.nombre_concepto,SG.nit,SG.entidad,TP.nombre_tiproces,SG.numero,ES.nombre_estado,sp.nombre_stadpro,SG.fhcierre,SG.hopre,SG.prese,SG.Presu,SG.fhobs,SG.Mobs,SG.Hprese,SG.mc,SG.Mprese,SG.rfcarma,RG.nombre_reg,SG.ejecu,AB.nombre_aboga,SG.product,SG.objcontra,SG.cerpre,
		PP.nombre_pro,SG.vlofer,SG.plzejecu,RS.nombre_res,CS.nombre_causal,SG.traza,PD.nombre_poder,TL.nombre_sp,EG.empgana,SG.fhlegal,SG.indicador,SEG.nombre_seg,SG.hora
		FROM seguimiento SG
		LEFT OUTER JOIN sect ST ON SG.nombre_concepto=ST.id
		LEFT OUTER JOIN tiproces TP ON SG.nombre_tiproces=TP.id
		LEFT OUTER JOIN estado ES ON SG.nombre_estado=ES.id
		LEFT OUTER JOIN stadpro SP ON SG.nombre_stadpro=SP.id
		LEFT OUTER JOIN region RG ON SG.nombre_reg=RG.id
		LEFT OUTER JOIN aboga AB ON SG.nombre_aboga=AB.id
		LEFT OUTER JOIN result RS ON SG.nombre_res=RS.id
		LEFT OUTER JOIN causal CS ON SG.nombre_causal=CS.id
		LEFT OUTER JOIN poder PD ON SG.nombre_poder=PD.id
		LEFT OUTER JOIN sptli TL ON SG.nombre_sp=TL.id
		LEFT OUTER JOIN propo PP ON SG.nombre_pro=PP.id
		LEFT OUTER JOIN empresag EG ON SG.empgana=EG.id
		LEFT OUTER JOIN seg SEG ON SG.nombre_seg=SEG.id where $tabla LIKE '%$dato%' and ST.id = '3'");
										} elseif ($_SESSION['rol'] === 'Corporativo') {
											$filtro = $seguimiento->query("SELECT SG.id,SG.myse,ST.nombre_concepto,SG.nit,SG.entidad,TP.nombre_tiproces,SG.numero,ES.nombre_estado,sp.nombre_stadpro,SG.fhcierre,SG.hopre,SG.prese,SG.Presu,SG.fhobs,SG.Mobs,SG.Hprese,SG.mc,SG.Mprese,SG.rfcarma,RG.nombre_reg,SG.ejecu,AB.nombre_aboga,SG.product,SG.objcontra,SG.cerpre,
		PP.nombre_pro,SG.vlofer,SG.plzejecu,RS.nombre_res,CS.nombre_causal,SG.traza,PD.nombre_poder,TL.nombre_sp,EG.empgana,SG.fhlegal,SG.indicador,SEG.nombre_seg,SG.hora
		FROM seguimiento SG
		LEFT OUTER JOIN sect ST ON SG.nombre_concepto=ST.id
		LEFT OUTER JOIN tiproces TP ON SG.nombre_tiproces=TP.id
		LEFT OUTER JOIN estado ES ON SG.nombre_estado=ES.id
		LEFT OUTER JOIN stadpro SP ON SG.nombre_stadpro=SP.id
		LEFT OUTER JOIN region RG ON SG.nombre_reg=RG.id
		LEFT OUTER JOIN aboga AB ON SG.nombre_aboga=AB.id
		LEFT OUTER JOIN result RS ON SG.nombre_res=RS.id
		LEFT OUTER JOIN causal CS ON SG.nombre_causal=CS.id
		LEFT OUTER JOIN poder PD ON SG.nombre_poder=PD.id
		LEFT OUTER JOIN sptli TL ON SG.nombre_sp=TL.id
		LEFT OUTER JOIN propo PP ON SG.nombre_pro=PP.id
		LEFT OUTER JOIN empresag EG ON SG.empgana=EG.id
		LEFT OUTER JOIN seg SEG ON SG.nombre_seg=SEG.id where (ST.id = '1' || St.id = '2') and $tabla LIKE '%$dato%'");
										} elseif ($_SESSION['rol'] === 'Pymes') {
											$filtro = $seguimiento->query("SELECT SG.id,SG.myse,ST.nombre_concepto,SG.nit,SG.entidad,TP.nombre_tiproces,SG.numero,ES.nombre_estado,sp.nombre_stadpro,SG.fhcierre,SG.hopre,SG.prese,SG.Presu,SG.fhobs,SG.Mobs,SG.Hprese,SG.mc,SG.Mprese,SG.rfcarma,RG.nombre_reg,SG.ejecu,AB.nombre_aboga,SG.product,SG.objcontra,SG.cerpre,
		PP.nombre_pro,SG.vlofer,SG.plzejecu,RS.nombre_res,CS.nombre_causal,SG.traza,PD.nombre_poder,TL.nombre_sp,EG.empgana,SG.fhlegal,SG.indicador,SEG.nombre_seg,SG.hora
		FROM seguimiento SG
		LEFT OUTER JOIN sect ST ON SG.nombre_concepto=ST.id
		LEFT OUTER JOIN tiproces TP ON SG.nombre_tiproces=TP.id
		LEFT OUTER JOIN estado ES ON SG.nombre_estado=ES.id
		LEFT OUTER JOIN stadpro SP ON SG.nombre_stadpro=SP.id
		LEFT OUTER JOIN region RG ON SG.nombre_reg=RG.id
		LEFT OUTER JOIN aboga AB ON SG.nombre_aboga=AB.id
		LEFT OUTER JOIN result RS ON SG.nombre_res=RS.id
		LEFT OUTER JOIN causal CS ON SG.nombre_causal=CS.id
		LEFT OUTER JOIN poder PD ON SG.nombre_poder=PD.id
		LEFT OUTER JOIN sptli TL ON SG.nombre_sp=TL.id
		LEFT OUTER JOIN propo PP ON SG.nombre_pro=PP.id
		LEFT OUTER JOIN empresag EG ON SG.empgana=EG.id
		LEFT OUTER JOIN seg SEG ON SG.nombre_seg=SEG.id where ST.id = '5' and $tabla LIKE '%$dato%'");
										} elseif ($_SESSION['rol'] === 'Whosale') {
											$filtro = $seguimiento->query("SELECT SG.id,SG.myse,ST.nombre_concepto,SG.nit,SG.entidad,TP.nombre_tiproces,SG.numero,ES.nombre_estado,sp.nombre_stadpro,SG.fhcierre,SG.hopre,SG.prese,SG.Presu,SG.fhobs,SG.Mobs,SG.Hprese,SG.mc,SG.Mprese,SG.rfcarma,RG.nombre_reg,SG.ejecu,AB.nombre_aboga,SG.product,SG.objcontra,SG.cerpre,
		PP.nombre_pro,SG.vlofer,SG.plzejecu,RS.nombre_res,CS.nombre_causal,SG.traza,PD.nombre_poder,TL.nombre_sp,EG.empgana,SG.fhlegal,SG.indicador,SEG.nombre_seg,SG.hora
		FROM seguimiento SG
		LEFT OUTER JOIN sect ST ON SG.nombre_concepto=ST.id
		LEFT OUTER JOIN tiproces TP ON SG.nombre_tiproces=TP.id
		LEFT OUTER JOIN estado ES ON SG.nombre_estado=ES.id
		LEFT OUTER JOIN stadpro SP ON SG.nombre_stadpro=SP.id
		LEFT OUTER JOIN region RG ON SG.nombre_reg=RG.id
		LEFT OUTER JOIN aboga AB ON SG.nombre_aboga=AB.id
		LEFT OUTER JOIN result RS ON SG.nombre_res=RS.id
		LEFT OUTER JOIN causal CS ON SG.nombre_causal=CS.id
		LEFT OUTER JOIN poder PD ON SG.nombre_poder=PD.id
		LEFT OUTER JOIN sptli TL ON SG.nombre_sp=TL.id
		LEFT OUTER JOIN propo PP ON SG.nombre_pro=PP.id
		LEFT OUTER JOIN empresag EG ON SG.empgana=EG.id
		LEFT OUTER JOIN seg SEG ON SG.nombre_seg=SEG.id where ST.id = '4' and $tabla LIKE '%$dato%'");
										} else {
											$filtro = $seguimiento->query("SELECT SG.id,SG.myse,ST.nombre_concepto,SG.nit,SG.entidad,TP.nombre_tiproces,SG.numero,ES.nombre_estado,sp.nombre_stadpro,SG.fhcierre,SG.hopre,SG.prese,SG.Presu,SG.fhobs,SG.Mobs,SG.Hprese,SG.mc,SG.Mprese,SG.rfcarma,RG.nombre_reg,SG.ejecu,AB.nombre_aboga,SG.product,SG.objcontra,SG.cerpre,
		PP.nombre_pro,SG.vlofer,SG.plzejecu,RS.nombre_res,CS.nombre_causal,SG.traza,PD.nombre_poder,TL.nombre_sp,EG.empgana,SG.fhlegal,SG.indicador,SEG.nombre_seg,SG.hora
		FROM seguimiento SG
		LEFT OUTER JOIN sect ST ON SG.nombre_concepto=ST.id
		LEFT OUTER JOIN tiproces TP ON SG.nombre_tiproces=TP.id
		LEFT OUTER JOIN estado ES ON SG.nombre_estado=ES.id
		LEFT OUTER JOIN stadpro SP ON SG.nombre_stadpro=SP.id
		LEFT OUTER JOIN region RG ON SG.nombre_reg=RG.id
		LEFT OUTER JOIN aboga AB ON SG.nombre_aboga=AB.id
		LEFT OUTER JOIN result RS ON SG.nombre_res=RS.id
		LEFT OUTER JOIN causal CS ON SG.nombre_causal=CS.id
		LEFT OUTER JOIN poder PD ON SG.nombre_poder=PD.id
		LEFT OUTER JOIN sptli TL ON SG.nombre_sp=TL.id
		LEFT OUTER JOIN propo PP ON SG.nombre_pro=PP.id
		LEFT OUTER JOIN empresag EG ON SG.empgana=EG.id
		LEFT OUTER JOIN seg SEG ON SG.nombre_seg=SEG.id where $tabla LIKE '%$dato%'");
										}
										?>
										<style type="text/css">
											.table {
												font-size: 12px;
												width: 1250px;
											}
										</style>
										<div class="container-fluid"><br>
											<div class="col-md-12">
												<div class="form-group">
													<center>
														<h2>Consulta licitaciones</h2>
													</center><br>
												</div>
											</div>
											<form method="post" action="filtroBusqueda.php">
												<div class="row justify-content">
													<div class="col-md-2">
														<select class="form-control" name="opciones" id="opcioness">
															<option value="myse">Myse</option>
															<option value="nit">Nit</option>
															<option value="numero">Numero proceso</option>
															<option value="entidad">Entidad</option>
															<option value="TL.nombre_sp">Soporte de licitaciones</option>
															<option value="ES.nombre_estado">estado</option>
															<option value="RS.nombre_res">Resultado</option>
														</select>
													</div>
													<div class="col-md-3">
														<input class="form-control" type="text" name="datoB">
													</div>
													<div class="col-md-1">
														<input type="submit" name="Buscar" class="btn btn-outline-primary" value="Consultar">
													</div>
											</form>
											<div class="col-md-1">
												<label>General:</label>
											</div>
											<div class="col-md-3">
												<input class="form-control" type="text" id="search" />
											</div>
											<?php
											if ($_SESSION['rol'] === 'Administrador') { ?>
												<div class="col-md-1">
													<a href="<?php echo "../assets/librerias/excel/exportarE.php?dato=" . $dato . "&" . "opciones=" . $tabla ?>" class="btn btn-outline-primary" value="Exportar"><i class="fas fa-file-excel"></i> Exportar</a>
												</div>
											<?php } ?>
										</div>
									</div>
									<div class="table">
										<table class="table">
											<thead class="thead-light">
												<tr>
													<th>Myse</th>
													<th>Sector</th>
													<th>Nit</th>
													<th>Entidad</th>
													<th>Tipo de proceso</th>
													<th>Numero</th>
													<th>Estado</th>
													<th>Estado del proyecto</th>
													<th>Fecha de cierre</th>
													<th> Hora de presentacion</th>
													<th>Medio de presentacion</th>
													<th>Presupuesto</th>
													<th>Fecha de observacion</th>
													<th> Hora de presentacion observacion</th>
													<th>Medio de presentacion observacion</th>
													<th>Carta de manifestacion</th>
													<th>Hora de manifestacion d einteres</th>
													<th>Medio de manifestacion de interes</th>
													<th>Region</th>
													<th>Ejecutivo</th>
													<th>Abogado Asignado</th>
													<th>Producto</th>
													<th>Objeto del contrato</th>
													<th>Certificados Presentados</th>
													<th>Proponente </th>
													<th>Valor oferta</th>
													<th>Plaza de ejecucion (Meses)</th>
													<th>Resultado </th>
													<th>Causales </th>
													<th>Trazabilidad</th>
													<th>Poder</th>
													<th>Soporte a licitaciones</th>
													<th>Empresa Ganadora</th>
													<th>Fecha de legalizacion</th>
													<th> Fecha Indicador / habilitantes</th>
													<th> Hora Indicador </th>
													<th>Ofertas en Seguimiento</th>
													<th colspan="4">Opciones</th>
												</tr>
											</thead>
											<tbody>
												<?php foreach ($filtro as $key) { ?>

													<td bgcolor="EAEAEA"><?php echo $key['myse'] ?></td>
													<td bgcolor="EAEAEA"><?php echo $key['nombre_concepto'] ?></td>
													<td bgcolor="EAEAEA"><?php echo $key['nit'] ?></td>
													<td bgcolor="EAEAEA"><?php echo $key['entidad'] ?></td>
													<td bgcolor="EAEAEA"><?php echo $key['nombre_tiproces'] ?></td>
													<td bgcolor="EAEAEA"><?php echo $key['numero'] ?></td>
													<td bgcolor="EAEAEA"><?php echo $key['nombre_estado'] ?></td>
													<td bgcolor="EAEAEA"><?php echo $key['nombre_stadpro'] ?></td>
													<td bgcolor="EAEAEA"><?php echo $key['fhcierre'] ?></td>
													<td bgcolor="EAEAEA"><?php echo $key['hopre'] ?></td>
													<td bgcolor="EAEAEA"><?php echo $key['prese'] ?></td>
													<td bgcolor="EAEAEA"><?php echo number_format($key['Presu']) ?></td>
													<td bgcolor="EAEAEA"><?php echo $key['fhobs'] ?></td>
													<td bgcolor="EAEAEA"><?php echo $key['Mobs'] ?></td>
													<td bgcolor="EAEAEA"><?php echo $key['Mprese'] ?></td>
													<td bgcolor="EAEAEA"><?php echo $key['rfcarma'] ?></td>
													<td bgcolor="EAEAEA"><?php echo $key['Hprese'] ?></td>
													<td bgcolor="EAEAEA"><?php echo $key['mc'] ?></td>
													<td bgcolor="EAEAEA"><?php echo $key['nombre_reg']  ?></td>
													<td bgcolor="EAEAEA"><?php echo $key['ejecu'] ?></td>
													<td bgcolor="EAEAEA"><?php echo $key['nombre_aboga'] ?></td>
													<td bgcolor="EAEAEA"><?php echo $key['product'] ?></td>
													<td bgcolor="EAEAEA"><?php echo $key['objcontra'] ?></td>
													<td bgcolor="EAEAEA"><?php echo $key['cerpre'] ?></td>
													<td bgcolor="EAEAEA"><?php echo $key['nombre_pro'] ?></td>
													<td bgcolor="EAEAEA"><?php echo number_format($key['vlofer']) ?></td>
													<td bgcolor="EAEAEA"><?php echo $key['plzejecu'] ?></td>
													<td bgcolor="EAEAEA"><?php echo $key['nombre_res'] ?></td>
													<td bgcolor="EAEAEA"><?php echo $key['nombre_causal'] ?></td>
													<td bgcolor="EAEAEA"><?php echo $key['traza'] ?></td>
													<td bgcolor="EAEAEA"><?php echo $key['nombre_poder'] ?></td>
													<td bgcolor="EAEAEA"><?php echo $key['nombre_sp'] ?></td>
													<td bgcolor="EAEAEA"><?php echo $key['empgana'] ?></td>
													<td bgcolor="EAEAEA"><?php echo $key['fhlegal'] ?></td>
													<td bgcolor="EAEAEA"><?php echo $key['indicador'] ?></td>
													<td bgcolor="EAEAEA"><?php echo $key['hora'] ?></td>
													<td bgcolor="EAEAEA"><?php echo $key['nombre_seg'] ?></td>

													<?php if ($_SESSION['rol'] == 'Administrador') { ?>
														<td bgcolor="EAEAEA"><a href="<?php echo "actualizarLicitacion.php?id=" . $key['id'] ?>&&opcion=<?php echo $tabla; ?>&&lugar= filtroBusqueda&&dato=<?php echo $dato; ?>"><i class="fas fa-edit"></i></a></td>
														<td bgcolor="EAEAEA"><a href="<?php echo "../administrador/function/borrarLicitacion.php?id=" . $key['id'] ?>&myse=<?php echo $key['myse'] ?>"><i class="fas fa-trash-alt"></i></a></td>
														<td bgcolor="EAEAEA"><a href="<?php echo "pdf.php?id=" . $key['myse'] ?>" target="_blank"><i class="fas fa-file-pdf"></i></a></td>
													<?php } elseif ($_SESSION['rol'] == 'Asignar') { ?>
														<td bgcolor="EAEAEA"><a href="<?php echo "actualizarLicitacion.php?id=" . $key['id'] ?>&&opcion=<?php echo $tabla; ?>&&lugar= filtroBusqueda&&dato=<?php echo $dato; ?>"><i class="fas fa-edit"></i></a></td>
														<td bgcolor="EAEAEA"><a href="<?php echo "pdf.php?id=" . $key['myse'] ?>" target="_blank"><i class="fas fa-file-pdf"></i></a></td>
													<?php } elseif ($_SESSION['rol'] == 'Usuario') { ?>
														<td bgcolor="EAEAEA"><a href="<?php echo "actualizarLicitacion.php?id=" . $key['id'] ?>&&opcion=<?php echo $tabla; ?>&&lugar= filtroBusqueda&&dato=<?php echo $dato; ?>"><i class="fas fa-edit"></i></a></td>
														<td bgcolor="EAEAEA"><a href="<?php echo "pdf.php?id=" . $key['myse'] ?>" target="_blank"><i class="fas fa-file-pdf"></i></a></td>
													<?php  } elseif ($_SESSION['rol'] == 'UsuarioCCE') { ?>
														<td bgcolor="EAEAEA"><a href="<?php echo "actualizarLicitacion.php?id=" . $key['id'] ?>&&opcion=<?php echo $tabla; ?>&&lugar= filtroBusqueda&&dato=<?php echo $dato; ?>"><i class="fas fa-edit"></i></a></td>
														<td bgcolor="EAEAEA"><a href="<?php echo "pdf.php?id=" . $key['myse'] ?>" target="_blank"><i class="fas fa-file-pdf"></i></a></td>
													<?php } elseif ($_SESSION['rol'] == 'Govermment' || $_SESSION['rol'] == 'Corporativo' || $_SESSION['rol'] === 'ConsultorVP' || $_SESSION['rol'] === 'Pymes' || $_SESSION['rol'] === 'Whosale') { ?>
														<td bgcolor="EAEAEA"><a href="<?php echo "actualizarLicitacion.php?id=" . $key['id'] ?>&&opcion=<?php echo $tabla; ?>&&lugar= filtroBusqueda&&dato=<?php echo $dato; ?>"><i class="fas fa-edit"></i></a></td>
														<td bgcolor="EAEAEA"><a href="<?php echo "pdf.php?id=" . $key['myse'] ?>" target="_blank"><i class="fas fa-file-pdf"></i></a></td>
													<?php } ?>
													</tr>
												<?php } ?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>

						<?php

						if (isset($key['myse'])) {
						} else {
							echo '<center><h1 style="background:#f75f00; font-family:sans serif; color: black ;"   >
	No existen resultados asociados a esta consulta.<h1></center>';
						}

						?>


					</div>
				</div>
			</div>
		</div>
</div>
</div>





</div>
</div>
<?php include FOLDER_TEMPLATE . "licitaciones/scripts.php"; ?>
</body>

</html>


<script type="text/javascript">
	$(document).ready(function() {
		$('.leftmenutrigger').on('click', function(e) {
			$('.side-nav').toggleClass("open");
			$('#wrapper').toggleClass("open");
			e.preventDefault();
		});
	});
	$(function() {

		$('#search').quicksearch('table tbody tr');
	});
</script>