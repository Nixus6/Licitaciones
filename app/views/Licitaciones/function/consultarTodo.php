<?php
session_start();
if (isset($_SESSION['id'])){ 
	$_SESSION['rol']=$_SESSION['rollicita'];
}else{

	header('location: ../../iniciarSesion.php');
}
include("../../../models/clases_funciones.php");
$sentencia	= new conexion;
$seguimiento = $sentencia->_conexion();

if($_SESSION['rol'] === "Govermment"){
	$sql =  $seguimiento->query("SELECT SG.id,SG.myse,ST.nombre_concepto,SG.nit,SG.entidad,TP.nombre_tiproces,SG.numero,ES.nombre_estado,sp.nombre_stadpro,SG.fhcierre,SG.hopre,SG.prese,SG.Presu,SG.fhobs,SG.Mobs,SG.Hprese,SG.mc,SG.Mprese,SG.rfcarma,RG.nombre_reg,SG.ejecu,AB.nombre_aboga,SG.product,SG.objcontra,SG.cerpre,
		PP.nombre_pro,SG.vlofer,SG.plzejecu,RS.nombre_res,CS.nombre_causal,SG.traza,PD.nombre_poder,TL.nombre_sp,EG.empgana,SG.fhlegal,SG.indicador,SG.hora,SEG.nombre_seg
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
		LEFT OUTER JOIN seg SEG ON SG.nombre_seg=SEG.id where ST.id = '3' order by SG.id DESC
		");
}elseif($_SESSION['rol'] === "Corporativo"){
	$sql =  $seguimiento->query("SELECT SG.id,SG.myse,ST.nombre_concepto,SG.nit,SG.entidad,TP.nombre_tiproces,SG.numero,ES.nombre_estado,sp.nombre_stadpro,SG.fhcierre,SG.hopre,SG.prese,SG.Presu,SG.fhobs,SG.Mobs,SG.Hprese,SG.mc,SG.Mprese,SG.rfcarma,RG.nombre_reg,SG.ejecu,AB.nombre_aboga,SG.product,SG.objcontra,SG.cerpre,
		PP.nombre_pro,SG.vlofer,SG.plzejecu,RS.nombre_res,CS.nombre_causal,SG.traza,PD.nombre_poder,TL.nombre_sp,SG.empgana,SG.fhlegal,SG.indicador,SG.hora,SEG.nombre_seg
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
		LEFT OUTER JOIN seg SEG ON SG.nombre_seg=SEG.id where ST.id = '1' || ST.id = '2' order by SG.id DESC
		");
}elseif($_SESSION['rol'] === "Pymes"){
	$sql =  $seguimiento->query("SELECT SG.id,SG.myse,ST.nombre_concepto,SG.nit,SG.entidad,TP.nombre_tiproces,SG.numero,ES.nombre_estado,sp.nombre_stadpro,SG.fhcierre,SG.hopre,SG.prese,SG.Presu,SG.fhobs,SG.Mobs,SG.Hprese,SG.mc,SG.Mprese,SG.rfcarma,RG.nombre_reg,SG.ejecu,AB.nombre_aboga,SG.product,SG.objcontra,SG.cerpre,
		PP.nombre_pro,SG.vlofer,SG.plzejecu,RS.nombre_res,CS.nombre_causal,SG.traza,PD.nombre_poder,TL.nombre_sp,EG.empgana,SG.fhlegal,SG.indicador,SG.hora,SEG.nombre_seg
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
		LEFT OUTER JOIN seg SEG ON SG.nombre_seg=SEG.id where ST.id = '5' order by SG.id DESC
		");
}elseif($_SESSION['rol'] === "Whosale"){
	$sql =  $seguimiento->query("SELECT SG.id,SG.myse,ST.nombre_concepto,SG.nit,SG.entidad,TP.nombre_tiproces,SG.numero,ES.nombre_estado,sp.nombre_stadpro,SG.fhcierre,SG.hopre,SG.prese,SG.Presu,SG.fhobs,SG.Mobs,SG.Hprese,SG.mc,SG.Mprese,SG.rfcarma,RG.nombre_reg,SG.ejecu,AB.nombre_aboga,SG.product,SG.objcontra,SG.cerpre,
		PP.nombre_pro,SG.vlofer,SG.plzejecu,RS.nombre_res,CS.nombre_causal,SG.traza,PD.nombre_poder,TL.nombre_sp,EG.empgana,SG.fhlegal,SG.indicador,SG.hora,SEG.nombre_seg
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
		LEFT OUTER JOIN seg SEG ON SG.nombre_seg=SEG.id where ST.id = '4' order by SG.id DESC
		");
}else{
	$sql =  $seguimiento->query("SELECT SG.id,SG.myse,ST.nombre_concepto,SG.nit,SG.entidad,TP.nombre_tiproces,SG.numero,ES.nombre_estado,sp.nombre_stadpro,SG.fhcierre,SG.hopre,SG.prese,SG.Presu,SG.fhobs,SG.Mobs,SG.Hprese,SG.mc,SG.Mprese,SG.rfcarma,RG.nombre_reg,SG.ejecu,AB.nombre_aboga,SG.product,SG.objcontra,SG.cerpre,
		PP.nombre_pro,SG.vlofer,SG.plzejecu,RS.nombre_res,CS.nombre_causal,SG.traza,PD.nombre_poder,TL.nombre_sp,EG.empgana,SG.fhlegal,SG.indicador,SG.hora,SEG.nombre_seg
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
		LEFT OUTER JOIN seg SEG ON SG.nombre_seg=SEG.id where SG.id = '2'
		");
}
echo "<tr>";
echo "<thead class='thead-light'>
<tr>
<th >Myse</th>
<th >Sector</th>
<th >Nit</th>
<th >Entidad</th>
<th >Tipo de proceso</th>
<th >Numero</th>
<th >Estado</th>
<th >Estado del proyecto</th>
<th >Fecha de cierre</th>
<th> Hora de presentacion</th>
<th >Medio de presentacion</th>
<th >Presupuesto</th>
<th >Fecha de observacion</th>
<th> Hora de presentacion observacion</th>
<th>Medio de presentacion observacion</th>
<th >Carta de manifestacion</th>
<th >Hora de manifestacion d einteres</th>
<th >Medio de manifestacion de interes</th>
<th >Region</th>
<th >Ejecutivo</th>
<th >Abogado Asignado</th>
<th >Producto</th>
<th >Objeto del contrato</th>
<th >Certificados Presentados</th>
<th >Proponente </th>
<th >Valor oferta</th>
<th >Plaza de ejecucion (Meses)</th>
<th >Resultado </th>
<th >Causales </th>
<th >Trazabilidad</th>
<th >Poder</th>
<th >Soporte a licitaciones</th>
<th >Empresa Ganadora</th>
<th >Fecha de legalizacion</th>
<th> Fecha Indicador / habilitantes</th>
<th> Hora Indicador </th>
<th>Ofertas en Seguimiento</th>
<th colspan='4'>Opciones</th>
</tr>
</thead>";
echo "<tbody>";

foreach($sql as $key){
	echo 
"	<td bgcolor='EAEAEA'>".$key['myse']."</td>
	<td bgcolor='EAEAEA'>".$key['nombre_concepto']."</td>
	<td bgcolor='EAEAEA'>".$key['nit']."</td>
	<td bgcolor='EAEAEA'>".$key['entidad']."</td>
	<td bgcolor='EAEAEA'>".$key['nombre_tiproces']."</td>
	<td bgcolor='EAEAEA'>".$key['numero']."</td>
	<td bgcolor='EAEAEA'>".$key['nombre_estado']."</td>
	<td bgcolor='EAEAEA'>".$key['nombre_stadpro']."</td>
	<td bgcolor='EAEAEA'>".$key['fhcierre']."</td>
	<td bgcolor='EAEAEA'>".$key['hopre']."</td>
	<td bgcolor='EAEAEA'>".$key['prese']."</td>
	<td bgcolor='EAEAEA'>".number_format($key['Presu'])."</td>
	<td bgcolor='EAEAEA'>".$key['fhobs']."</td>
	<td bgcolor='EAEAEA'>".$key['Mobs']."</td>
	<td bgcolor='EAEAEA'>".$key['Mprese']."</td>
	<td bgcolor='EAEAEA'>".$key['rfcarma']."</td>
	<td bgcolor='EAEAEA'>".$key['Hprese']."</td>
	<td bgcolor='EAEAEA'>".$key['mc']."</td>
	<td bgcolor='EAEAEA'>".$key['nombre_reg']."</td>
	<td bgcolor='EAEAEA'>".$key['ejecu']."</td>
	<td bgcolor='EAEAEA'>".$key['nombre_aboga']."</td>
	<td bgcolor='EAEAEA'>".$key['product']."</td>
	<td bgcolor='EAEAEA'>".$key['objcontra']." </td>
	<td bgcolor='EAEAEA'>".$key['cerpre']."</td>
	<td bgcolor='EAEAEA'>".$key['nombre_pro']."</td>
	<td bgcolor='EAEAEA'>".number_format($key['vlofer'])." </td>
	<td bgcolor='EAEAEA'>".$key['plzejecu']." </td>
	<td bgcolor='EAEAEA'>".$key['nombre_res']." </td>
	<td bgcolor='EAEAEA'>".$key['nombre_causal']." </td>
	<td bgcolor='EAEAEA'>".$key['traza']." </td>
	<td bgcolor='EAEAEA'>".$key['nombre_poder']." </td>
	<td bgcolor='EAEAEA'>".$key['nombre_sp']." </td>
	<td bgcolor='EAEAEA'>".$key['empgana']." </td>
	<td bgcolor='EAEAEA'>".$key['fhlegal']." </td>
	<td bgcolor='EAEAEA'>".$key['indicador']." </td>
	<td bgcolor='EAEAEA'>".$key['hora']." </td>
	<td bgcolor='EAEAEA'>".$key['nombre_seg']." </td>";

	if ($_SESSION['rol']== 'Administrador') {
		echo "<td bgcolor='EAEAEA'><a href='actualizarLicitacion.php?id=". $key['id']."'><i class='fas fa-edit'></i></a></td>
		<td bgcolor='EAEAEA'><a href='pdf.php?id=".$key['myse']."'target='_blank'><i class='fas fa-file-pdf'></i></a></td>
		<td bgcolor='EAEAEA'><a href='../administrador/function/borrarLicitacion.php?id=" .$key['id']."&myse=".$key['myse']."'><i class='fas fa-trash-alt'></i></a></td>";
	} elseif ($_SESSION['rol']== 'Asignar') {
		echo "	<td bgcolor='EAEAEA'><a href='actualizarLicitacion.php?id=".$key['id']."'><i class='fas fa-edit'></i></a></td>
		<td bgcolor='EAEAEA'><a href='pdf.php?id=".$key['myse']."' target='_blank'><i class='fas fa-file-pdf'></i></a></td>";
	} elseif ($_SESSION['rol']== 'Usuario') {
		echo "<td bgcolor='EAEAEA'><a href='actualizarLicitacion.php?id=".$key['id']."'><i class='fas fa-edit'></i></a></td>
		<td bgcolor='EAEAEA'><a href='pdf.php?id=".$key['myse']."' target='_blank'><i class='fas fa-file-pdf'></i></a></td>";
	}elseif ($_SESSION['rol']== 'UsuarioCCE'){
		echo "<td bgcolor='EAEAEA'><a href='actualizarLicitacion.php?id=".$key['id']."'><i class='fas fa-edit'></i></a></td>
		<td bgcolor='EAEAEA'><a href='pdf.php?id=".$key['myse']."' target='_blank'><i class='fas fa-file-pdf'></i></a></td>";
	}elseif ($_SESSION['rol'] ==='Govermment' || $_SESSION['rol'] === 'Corporativo' || $_SESSION['rol'] ==='ConsultorVP' || $_SESSION['rol'] ==='Pymes' || $_SESSION['rol']==='Whosale'){
		echo "<td bgcolor='EAEAEA'><a href='actualizarLicitacion.php?id=".$key['id']."'><i class='fas fa-edit'></i></a></td>
		<td bgcolor='EAEAEA'><a href='pdf.php?id=".$key['myse']."' target='_blank'><i class='fas fa-file-pdf'></i></a></td>";
	};
	echo "</tbody>";
}

