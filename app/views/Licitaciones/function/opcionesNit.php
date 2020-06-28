<?php
session_start();
if (isset($_SESSION['id_login'])){ 
}else{

	header('location: ../../iniciarSesion.php');
}
include("../../clases/clases_funciones.php");
$sentencia	= new conexion;
$seguimiento = $sentencia->_conexion();
$q = $_REQUEST["q"];
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
	LEFT OUTER JOIN seg SEG ON SG.nombre_seg=SEG.id where SG.nit = '$q' ");


$hint = '';


foreach ($sql as $key) {
	$hint = $key['entidad'];
}

echo $hint;