<?php
session_start();
if (isset($_SESSION['id_login'])) { } else {
	header('location: ../../iniciarSesion.php');
}
include("../../clases/clases_funciones.php");

$sentencia  = new conexion;



$seguimiento = $sentencia->_conexion();



$fCreacion = $_POST["fCreacion"];
$myse = $_POST["myse"];
$nombre_concepto = $_POST["nombre_concepto"];
$nit = $_POST["nit"];
$entidad = $_POST["entidad"];
$nombre_tiproces = $_POST["nombre_tiproces"];
if($nombre_tiproces=== "24"|| $nombre_tiproces ==="25"){
	$segmento = $_POST["segmento"];
}else{
	$segmento="No Aplica";
}
$numero = $_POST["numero"];
$nombre_estado = $_POST["nombre_estado"];
$nombre_stadpro = $_POST["nombre_stadpro"];
$fhcierre = $_POST["fhcierre"];
$hopre = $_POST["hopre"];
$prese = $_POST["prese"];
$Presu = $_POST["Presu"];
$Presu = (float) str_replace(',', '', $Presu);
$fhobs = $_POST["fhobs"];
$Mobs = $_POST["Mobs"];
$Hprese = $_POST["Hprese"];
$Mprese = $_POST["Mprese"];
$mc = $_POST["mc"];
$nombre_reg = $_POST["nombre_reg"];
$consult = $_POST["consul"];
$ejecu = $_POST["ejecu"];
$nombre_aboga = $_POST["nombre_aboga"];
$product = $_POST["product"];
$objcontra = $_POST["objcontra"];
$nombre_res = $_POST["nombre_res"];
$nombre_causal = $_POST["nombre_causal"];
$nombre_poder = $_POST["nombre_poder"];
$rfcarma = $_POST["rfcarma"];
$traza = $_POST["traza"];
$vlofer = $_POST["vlofer"];
$plzejecu = $_POST["plzejecu"];
$fhlegal = $_POST["fhlegal"];
$nombre_sp = $_POST["nombre_sp"];
$empganaP = $_POST["empgana"];
if ($empganaP === 'Pendiente') {
	$empgana = '27';
} else {
	$empgana = 'Pendiente';
}
$nombre_pro = $_POST["nombre_pro"];
$indicador = $_POST["indicador"];
$nombre_seg = $_POST["nombre_seg"];
$hora = $_POST["hora"];
$cobertura = $_POST['cobertura'];
$vlofer = (float) str_replace(',', '', $vlofer);
$mensualidad = $vlofer / $plzejecu;
$tipoPoliza = $_POST['tipoPoli'];
$porcenP = $_POST['PorcenP'];
$valOferGana = $_POST['valOferGana'];

$arrayCepre = $_POST['cerpree'];
$cepreFinal = implode($arrayCepre, ", ");
$cerpre = $cepreFinal;

$VigenciP = $_POST['vigPro'];
$inPreve = $_POST['ingPreve'];
$MYSExp = $_POST['mysexp'];
$estam = $_POST['estampi'];
$plataform = $_POST['platafo'];
$UseP = $_POST['UserP'];
$contrP = $_POST['contraP'];
$fmanifesta = $_POST['Fprese'];

$vtIVA = $_POST['vtIVA'];
$acum = $_POST['acum'];
$obligado = $_POST['obligado'];
$ebitda = $_POST['ebitda'];
$tipoeventu = $_POST['tipoeventu'];
$vpn = $_POST['vpn'];
$ordenc = $_POST['ordenc'];
$fechaoc = $_POST['fechaoc'];
$fechafoc = $_POST['fechafoc'];
$ctari = $_POST['ctari'];
$targetari = $_POST['targetari'];
$tarim = $_POST['tarim'];
$ebitdatm = $_POST['ebitdatm'];
$vpntari = $_POST['vpntari'];

$arrayIndi = $_POST['indis'];
$indiFinal = implode($arrayIndi, ", ");
$indi_Interes = $indiFinal;

$obCalidadProces = $_POST['obCalidadProces'];
$obFallaProces = $_POST['obFallaProces'];
$accionPreCor = $_POST['accionPreCor'];

$imputabilidad = $_POST['imputabilidad'];
$fecAreaTec = $_POST['fecAreaTec'];
$horAreaTec	 = $_POST['horAreaTec'];




if ($_POST["nombre_tiproces"] === "6") {
	try {
		$sentencia = $seguimiento->prepare("INSERT INTO seguimiento (fCreacion,myse,nombre_concepto,nit,entidad,nombre_tiproces,segmento,numero,nombre_estado,nombre_stadpro,fhcierre,hopre,prese,Presu,fhobs,Mobs,Hprese,Mprese,mc,nombre_reg,consult,ejecu,nombre_aboga,product,objcontra,nombre_res,nombre_causal,nombre_poder,rfcarma,traza,vlofer,plzejecu,fhlegal,nombre_sp,empgana,cerpre,nombre_pro,indicador,nombre_seg,hora,coberturaProy,mensualidad,tipPoli,porceP,vlofergana,vigeDia,ingPropu,MYSExp,estanpi,plataforma,plataformaU,plataformaC,fechmanifesta,indi_Interes,obCalidadProces,obFallaProces,accionPreCor,imputabilidad,fecAreaTec,horAreaTec) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);");

		$resultado = $sentencia->execute([$fCreacion, $myse, $nombre_concepto, $nit, $entidad, $nombre_tiproces,$segmento, $numero, $nombre_estado, $nombre_stadpro, $fhcierre, $hopre, $prese, $Presu, $fhobs, $Mobs, $Hprese, $Mprese, $mc, $nombre_reg, $consult, $ejecu, $nombre_aboga, $product, $objcontra, $nombre_res, $nombre_causal, $nombre_poder, $rfcarma, $traza, $vlofer, $plzejecu, $fhlegal, $nombre_sp, $empgana, $cerpre, $nombre_pro, $indicador, $nombre_seg, $hora, $cobertura, $mensualidad, $tipoPoliza, $porcenP, $valOferGana, $VigenciP, $inPreve, $MYSExp, $estam, $plataform, $UseP, $contrP, $fmanifesta, $indi_Interes, $obCalidadProces, $obFallaProces, $accionPreCor,$imputabilidad,$fecAreaTec,$horAreaTec]);

		$iduser = $_SESSION['id_login'];
		$sentencia3 = $seguimiento->prepare("INSERT INTO ecce (vtIVA,acum,obligado,ebitda,tipoeventu,vpn,ordenc,fechaoc,fechafoc,ctari,targetari,tarim,ebitdatm,vpntari,myse) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
		$resultado3 = $sentencia3->execute([$vtIVA, $acum, $obligado, $ebitda, $tipoeventu, $vpn, $ordenc, $fechaoc, $fechafoc, $ctari, $targetari, $tarim, $ebitdatm, $vpntari, $myse]);

		$sentencia2 = $seguimiento->prepare("INSERT INTO historialRegistro (nombre, id_myse) values (?,?)");
		$resultado2 = $sentencia2->execute([$iduser, $myse]);

		header("location: ../../administrador/menuAdministrador.php");
	} catch (Exception $e) {
		echo "Hubo un error:" . $e;
	}
} else {
	try {
		$sentencia = $seguimiento->prepare("INSERT INTO seguimiento (fCreacion,myse,nombre_concepto,nit,entidad,nombre_tiproces,segmento,numero,nombre_estado,nombre_stadpro,fhcierre,hopre,prese,Presu,fhobs,Mobs,Hprese,Mprese,mc,nombre_reg,consult,ejecu,nombre_aboga,product,objcontra,nombre_res,nombre_causal,nombre_poder,rfcarma,traza,vlofer,plzejecu,fhlegal,nombre_sp,empgana,cerpre,nombre_pro,indicador,nombre_seg,hora,coberturaProy,mensualidad,tipPoli,porceP,vlofergana,vigeDia,ingPropu,MYSExp,estanpi,plataforma,plataformaU,plataformaC,fechmanifesta,indi_Interes,obCalidadProces,obFallaProces,accionPreCor,imputabilidad,fecAreaTec,horAreaTec) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);");

		$resultado = $sentencia->execute([$fCreacion, $myse, $nombre_concepto, $nit, $entidad, $nombre_tiproces,$segmento, $numero, $nombre_estado, $nombre_stadpro, $fhcierre, $hopre, $prese, $Presu, $fhobs, $Mobs, $Hprese, $Mprese, $mc, $nombre_reg, $consult, $ejecu, $nombre_aboga, $product, $objcontra, $nombre_res, $nombre_causal, $nombre_poder, $rfcarma, $traza, $vlofer, $plzejecu, $fhlegal, $nombre_sp, $empgana, $cerpre, $nombre_pro, $indicador, $nombre_seg, $hora, $cobertura, $mensualidad, $tipoPoliza, $porcenP, $valOferGana, $VigenciP, $inPreve, $MYSExp, $estam, $plataform, $UseP, $contrP, $fmanifesta, $indi_Interes, $obCalidadProces, $obFallaProces, $accionPreCor,$imputabilidad,$fecAreaTec,$horAreaTec]);


		$iduser = $_SESSION['id_login'];
		$sentencia2 = $seguimiento->prepare("INSERT INTO historialRegistro (nombre, id_myse) values (?,?)");
		$resultado2 = $sentencia2->execute([$iduser, $myse]);

		header("location: ../../administrador/menuAdministrador.php");
	} catch (Exception $e) {
		echo "Hubo un error:" . $e;
	}
}
