<?php
session_start();
if (isset($_SESSION['id_login'])) { } else {

	header('location: ../../iniciarSesion.php');
}
include("../../clases/clases_funciones.php");

$sentencia  = new conexion;

$seguimiento = $sentencia->_conexion();


$SeguiHisto = "Cambios: ";
$id = $_POST["id"];
$fCreacion = $_POST["fCreacion"];
$myse = $_POST["myse"];
$nombre_concepto = $_POST["nombre_concepto"];
$nit = $_POST["nit"];
$entidad = $_POST["entidad"];
$nombre_tiproces = $_POST["nombre_tiproces"];
$segmento = $_POST["segmento"];
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
$mc = $_POST["mc"];
$Mprese = $_POST["Mprese"];
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
if ($_POST['empre'] == '1') {
	$empgana = $_POST["empganaz"];
} elseif ($_POST['empre'] == '0') {
	$empgana = $_POST["empgana"];
}
$cerpre = $_POST["cerpre"];
$nombre_pro = $_POST["nombre_pro"];
$indicador = $_POST["indicador"];
$horaIndicador = $_POST['horaIndicador'];
$nombre_seg = $_POST["nombre_seg"];
$tipoPoliza = $_POST['tipoPoli'];
$porcenP = $_POST['PorcenP'];
$vlofergana = $_POST['vlofergana'];
$vlofer = (float) str_replace(',', '', $vlofer);
$mensualidad = $vlofer / $plzejecu;
$cobertura = $_POST['cobertura'];
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
$indi_Interes = $_POST['indi_Interes'];

$respueta = $_POST['resul'];
$iduser = $_SESSION['id_login'];


if ($_SESSION['rol'] === 'Administrador') {

	$obCalidadProces = $_POST['obCalidadProces'];
	$obFallaProces = $_POST['obFallaProces'];
	$accionPreCor = $_POST['accionPreCor'];
	$imputabilidad = $_POST['imputabilidad'];
}

$fecAreaTec = $_POST['fecAreaTec'];
$horAreaTec = $_POST['horAreaTec'];



//                ------------------------------------- Primera Columna ---------------------------------------           //


//Caso Licitaciones (Myse)
$myseH = $_POST["myseH"];

if ($myseH != $myse) {

	$SeguiHisto = $SeguiHisto . "-myse ";
}

//Tipo de proceso
$nombre_tiprocesH = $_POST["nombre_tiprocesH"];

if ($nombre_tiprocesH != $nombre_tiproces) {

	$SeguiHisto = $SeguiHisto . "-Tipo de Proceso ";
}

//Objeto del Contrato
$objcontraH = $_POST["objcontraH"];

if ($objcontraH != $objcontra) {

	$SeguiHisto = $SeguiHisto . "-Objeto de Contrato ";
}

//Nombre del Ejecutico
$ejecuH = $_POST["ejecuH"];

if ($ejecuH != $ejecu) {

	$SeguiHisto = $SeguiHisto . "-Ejecutivo ";
}


// Sector
$nombre_conceptoH = $_POST["nombre_conceptoH"];

if ($nombre_conceptoH != $nombre_concepto) {

	$SeguiHisto = $SeguiHisto . "-Sector ";
}

//Indices Financieros
$indi_InteresH = $_POST['indi_InteresH'];

if ($indi_InteresH != $indi_Interes) {

	$SeguiHisto = $SeguiHisto . "-Indice Financiero ";
}


//Hora presentacion de observación
$MobsH = $_POST["MobsH"];

if ($MobsH != $Mobs) {

	$SeguiHisto = $SeguiHisto . "-Hora presentacion Oferta ";
}


//Fecha de manifestación de interes
$fmanifestaH = $_POST['FpreseH'];

if ($fmanifestaH != $fmanifesta) {

	$SeguiHisto = $SeguiHisto . "-Fech. Manifestacion Interes ";
}


//Fecha de cierre
$fhcierreH = $_POST["fhcierreH"];

if ($fhcierreH != $fhcierre) {

	$SeguiHisto = $SeguiHisto . "-Fech. de Cierre";
}

//Valor Oferta
$vloferH = $_POST["vloferH"];

if ($vloferH != $vlofer) {

	$SeguiHisto = $SeguiHisto . "-Valor Oferta ";
}


//Proponente
$nombre_proH = $_POST["nombre_proH"];

if ($nombre_proH != $nombre_pro) {

	$SeguiHisto = $SeguiHisto . "-Proponente ";
}


//Poder
$nombre_poderH = $_POST["nombre_poderH"];

if ($nombre_poderH != $nombre_poder) {

	$SeguiHisto = $SeguiHisto . "-Poder ";
}


//Requiere pago estampillas
$estamH = $_POST['estampiH'];

if ($estamH != $estam) {

	$SeguiHisto = $SeguiHisto . "-Pago Estampillas ";
}


//Plataforma
$plataformH = $_POST['platafoH'];

if ($plataformH != $plataform) {

	$SeguiHisto = $SeguiHisto . "-Plataforma ";
}

////////////////////////////////////
//Fecha de legalizacion
$fhlegalH = $_POST["fhlegalH"];

if ($fhlegalH != $fhlegal) {

	$SeguiHisto = $SeguiHisto . "-Fecha de legalizacion ";
}


//Resultado
$nombre_resH = $_POST["nombre_resH"];

if ($nombre_resH != $nombre_res) {

	$SeguiHisto = $SeguiHisto . "-Resultado ";
}
/////////////////////////

//Valor de la oferta ganadora
$vloferganaH = $_POST['vloferganaH'];

if ($vloferganaH != $vlofergana) {

	$SeguiHisto = $SeguiHisto . "-Valor Oferta Ganadora ";
}



//                ------------------------------------- Segunda Columna ---------------------------------------           //

// Nit
$nitH = $_POST["nitH"];
if ($nitH != $nit) {

	$SeguiHisto = $SeguiHisto . "-Nit ";
}


//Estado del proyecto
$nombre_stadproH = $_POST["nombre_stadproH"];
if ($nombre_stadproH != $nombre_stadpro) {

	$SeguiHisto = $SeguiHisto . "-Estado del proyecto ";
}


//Trazabilidad: 
$trazaH = $_POST["trazaH"];
if ($trazaH != $traza) {

	$SeguiHisto = $SeguiHisto . "-Trazabilidad ";
}


//Consultor:  
$consultH = $_POST["consulH"];
if ($consultH != $consult) {

	$SeguiHisto = $SeguiHisto . "-Consultor ";
}


//Numero Proceso:
$numeroH = $_POST["numeroH"];
if ($numeroH != $numero) {

	$SeguiHisto = $SeguiHisto . "-Numero Proceso ";
}


//Medio de presentacion de observación
$MpreseH = $_POST["MpreseH"];
if ($MpreseH != $Mprese) {

	$SeguiHisto = $SeguiHisto . "-Medio presentacion de Observacion ";
}


//Carta de manifestación de interes:
$rfcarmaH = $_POST["rfcarmaH"];
if ($rfcarmaH != $rfcarma) {

	$SeguiHisto = $SeguiHisto . "-Carta de manifestación de interes ";
}


//Hora de manifestación de interes
$HpreseH = $_POST["HpreseH"];
if ($HpreseH != $Hprese) {

	$SeguiHisto = $SeguiHisto . "-Hora de manifestación de interes ";
}

//Hora de presentación de la oferta
$preseH = $_POST["preseH"];
if ($preseH != $prese) {

	$SeguiHisto = $SeguiHisto . "-Hora de presentación de la oferta ";
}


// Plazo de ejecucion (Meses)
$plzejecuH = $_POST["plzejecuH"];
if ($plzejecuH != $plzejecu) {

	$SeguiHisto = $SeguiHisto . "-Plazo de ejecucion (Meses) ";
}


//Soporte Licitaciones
$nombre_spH = $_POST["nombre_spH"];
if ($nombre_spH != $nombre_sp) {

	$SeguiHisto = $SeguiHisto . "-Soporte Licitaciones ";
}


// Cobertura del proyecto
$coberturaH = $_POST['coberturaH'];
if ($coberturaH != $cobertura) {

	$SeguiHisto = $SeguiHisto . "-Cobertura del proyecto ";
}


//Myse experiencia
$MYSExpH = $_POST['mysexpH'];
if ($MYSExpH != $MYSExp) {

	//$SeguiHisto = $SeguiHisto . "-Myse experiencia ";

}


//Usuario
$UsePH = $_POST['UserPH'];
if ($UsePH != $UseP) {

	$SeguiHisto = $SeguiHisto . "-Usuario ";
}


//Fecha Indicador / habilitantes
$indicadorH = $_POST["indicadorH"];
if ($indicadorH != $indicador) {

	$SeguiHisto = $SeguiHisto . "-Fecha Indicador / habilitantes ";
}



//Causales: 
$nombre_causalH = $_POST["nombre_causalH"];
if ($nombre_causalH != $nombre_causal) {

	$SeguiHisto = $SeguiHisto . "-Causales ";
}


/*
//Oferta en seguimiento
$nombre_segH = $_POST["nombre_segH"];
if ($nombre_segH != $nombre_seg) {

	$SeguiHisto = $SeguiHisto . "-Oferta en seguimiento ";
}
*/


//                ------------------------------------- Tercera Columna ---------------------------------------           //



//Entidad: 
$entidadH = $_POST["entidadH"];

if ($entidadH != $entidad) {

	$SeguiHisto = $SeguiHisto . "-Entidad ";
}


/*
//Estado:   
$nombre_estadoH = $_POST["nombre_estadoH"];
if ($nombre_estadoH != $nombre_estado) {

	$SeguiHisto = $SeguiHisto . "-Estado ";
}



//Producto/s: 
$productH = $_POST["productH"];
if ($productH != $product) {

	$SeguiHisto = $SeguiHisto . "-Productos ";
}
*/

//Region: 
$nombre_regH = $_POST["nombre_regH"];
if ($nombre_regH != $nombre_reg) {

	$SeguiHisto = $SeguiHisto . "-Region ";
}



//Abogado Asignado:
$nombre_abogaH = $_POST["nombre_abogaH"];
if ($nombre_abogaH != $nombre_aboga) {

	$SeguiHisto = $SeguiHisto . "-Abogado Asignado ";
}



//Fecha de observación :
$fhobsH = $_POST["fhobsH"];
if ($fhobsH != $fhobs) {

	$SeguiHisto = $SeguiHisto . "-Fecha de Observacion ";
}



// Medio de manifestacion de interes:
$mcH = $_POST["mcH"];
if ($mcH != $mc) {

	$SeguiHisto = $SeguiHisto . "-Medio de manifestacion de interes ";
}


//Medio de presentación de la oferta
$hopreH = $_POST["hopreH"];
if ($hopreH != $hopre) {

	$SeguiHisto = $SeguiHisto . "-Medio de Presentacion de la Oferta ";
}


//Presupuesto: 
$PresuH = $_POST["PresuH"];
if ($PresuH != $Presu) {

	$SeguiHisto = $SeguiHisto . "-Presupuesto ";
}






//Requiere certificados:
$cerpreH = $_POST["cerpreH"];
if ($cerpreH != $cerpre) {

	$SeguiHisto = $SeguiHisto . "-Requerimietno Certificados ";
}


//Ingeniero preventa:
$inPreveH = $_POST['ingPreveH'];
if ($inPreveH != $inPreve) {

	$SeguiHisto = $SeguiHisto . "-Ingeniero preventa ";
}



//Requiere poliza:
$tipoPolizaH = $_POST['tipoPoliH'];
if ($tipoPolizaH != $tipoPoliza) {

	$SeguiHisto = $SeguiHisto . "-Requiere poliza ";
}


// Vigencia de la propuesta en dias
$VigenciPH = $_POST['vigProH'];
if ($VigenciPH != $VigenciP) {

	$SeguiHisto = $SeguiHisto . "-Vigencia Propuesta Dias ";
}



//Contraseña
$contrPH = $_POST['contraPH'];
if ($contrPH != $contrP) {

	$SeguiHisto = $SeguiHisto . "-Contraseña ";
}



//Hora de Indicador
$horaIndicadorH = $_POST['horaIndicadorH'];
if ($horaIndicadorH != $horaIndicador) {

	$SeguiHisto = $SeguiHisto . "-Hora Indicador ";
}

/*
//Empresa Ganadora:
$empganaH = $_POST["empganaH"];
if ($empganaH != $empgana) {

	$SeguiHisto = $SeguiHisto . "-Empresa Ganadora ";
}
*/


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////




if ($_POST['empre'] == '1') {
	$val = $_POST["empganaz"];
	$sentencia01 = $seguimiento->prepare("SELECT id FROM empresag WHERE empgana = ?;");
	$sentencia01->execute([$val]);
	$objetoe = $sentencia01->fetch(PDO::FETCH_OBJ);
	$empgana = $objetoe->id;

	if ($_POST['resul'] === '0') {

		if ($_SESSION['rol'] === 'Administrador') {

			$sentenciaX = $seguimiento->query("UPDATE seguimiento SET obCalidadProces='$obCalidadProces', obFallaProces='$obFallaProces', accionPreCor='$accionPreCor',imputabilidad='$imputabilidad' where id = $id");
		}


		$sentencia = $seguimiento->query("UPDATE seguimiento SET fCreacion='$fCreacion', myse = '$myse', nombre_concepto = '$nombre_concepto', nit = '$nit', entidad = '$entidad',indi_Interes='$indi_Interes',fecAreaTec='$fecAreaTec',horAreaTec='$horAreaTec',nombre_tiproces = '$nombre_tiproces',segmento='$segmento', numero = '$numero' where id = $id");

		$sentencia2 = $seguimiento->query("UPDATE seguimiento set nombre_estado = '$nombre_estado', nombre_stadpro = '$nombre_stadpro', fhcierre = '$fhcierre', prese='$prese', hopre = '$hopre', Presu = '$Presu', fhobs = '$fhobs', Mobs = '$Mobs',
	Hprese = '$Hprese' , mc = '$mc',Mprese = '$Mprese', nombre_reg = '$nombre_reg' where id= $id");

		$sentencia3 = $seguimiento->query("UPDATE seguimiento set consult= '$consult', ejecu= '$ejecu', nombre_aboga = $nombre_aboga, product = '$product', objcontra = '$objcontra', nombre_res = $nombre_res, nombre_causal = $nombre_causal, nombre_poder = $nombre_poder, rfcarma = '$rfcarma', traza = '$traza', vlofer = '$vlofer', plzejecu = '$plzejecu', fhlegal = '$fhlegal', nombre_sp = $nombre_sp, empgana = '$empgana', cerpre = '$cerpre', nombre_pro = $nombre_pro, indicador = '$indicador', nombre_seg = $nombre_seg where id= $id");

		$sentencia4 = $seguimiento->query("UPDATE seguimiento set tipPoli = '$tipoPoliza',porceP = '$porcenP', mensualidad = '$mensualidad', hora = '$horaIndicador', coberturaProy = '$cobertura', vlofergana = '$vlofergana' where id=$id");

		$sentencia5 = $seguimiento->query("UPDATE seguimiento set vigeDia = '$VigenciP' ,ingPropu = '$inPreve',MYSExp = '$MYSExp',estanpi = '$estam',plataforma = '$plataform',plataformaU = '$UseP',plataformaC = '$contrP' ,fechmanifesta = '$fmanifesta' where id=$id");



		if ($SeguiHisto != 'Cambios: ') {

			$sentencia6 = $seguimiento->prepare("INSERT INTO historial (nombre, id_myse, cambiosH) values (?,?,?)");
			$resultado2 = $sentencia6->execute([$iduser, $myse, $SeguiHisto]);

		 }
		

		$sentencia8 = $seguimiento->query("UPDATE ecce SET vtIVA = '$vtIVA', acum = '$acum', obligado = '$obligado',ebitda = '$ebitda',tipoeventu = '$tipoeventu',vpn = '$vpn',ordenc = '$ordenc',fechaoc = '$fechaoc',fechafoc = '$fechafoc',ctari = '$ctari',targetari = '$targetari',tarim = '$tarim',ebitdatm = '$ebitdatm',vpntari = '$vpntari' where myse = '$myse'");

		header("Location: ../../administrador/menuAdministrador.php");
	}
}

if ($_POST['resul'] === '0') {

	if ($_SESSION['rol'] === 'Administrador') {

		$sentenciaX = $seguimiento->query("UPDATE seguimiento SET obCalidadProces='$obCalidadProces', obFallaProces='$obFallaProces', accionPreCor='$accionPreCor',imputabilidad='$imputabilidad' where id = $id");
	}

	$sentencia = $seguimiento->query("UPDATE seguimiento SET fCreacion ='$fCreacion', myse = '$myse', nombre_concepto = '$nombre_concepto', nit = '$nit', entidad = '$entidad',indi_Interes='$indi_Interes',fecAreaTec='$fecAreaTec',horAreaTec='$horAreaTec',nombre_tiproces = '$nombre_tiproces',segmento='$segmento', numero = '$numero' where id = $id");

	$sentencia2 = $seguimiento->query("UPDATE seguimiento set nombre_estado = '$nombre_estado', nombre_stadpro = '$nombre_stadpro', fhcierre = '$fhcierre', prese='$prese', hopre = '$hopre', Presu = '$Presu', fhobs = '$fhobs', Mobs = '$Mobs',
	Hprese = '$Hprese' , mc = '$mc',Mprese = '$Mprese', nombre_reg = '$nombre_reg' where id= $id");

	$sentencia3 = $seguimiento->query("UPDATE seguimiento set consult= '$consult', ejecu= '$ejecu', nombre_aboga = $nombre_aboga, product = '$product', objcontra = '$objcontra', nombre_res = $nombre_res, nombre_causal = $nombre_causal, nombre_poder = $nombre_poder, rfcarma = '$rfcarma', traza = '$traza', vlofer = '$vlofer', plzejecu = '$plzejecu', fhlegal = '$fhlegal', nombre_sp = $nombre_sp, empgana = '$empgana', cerpre = '$cerpre', nombre_pro = $nombre_pro, indicador = '$indicador', nombre_seg = $nombre_seg where id= $id");

	$sentencia4 = $seguimiento->query("UPDATE seguimiento set tipPoli = '$tipoPoliza',porceP = '$porcenP', mensualidad = '$mensualidad', hora = '$horaIndicador', coberturaProy = '$cobertura', vlofergana = '$vlofergana' where id=$id");

	$sentencia5 = $seguimiento->query("UPDATE seguimiento set vigeDia = '$VigenciP' ,ingPropu = '$inPreve',MYSExp = '$MYSExp',estanpi = '$estam',plataforma = '$plataform',plataformaU = '$UseP',plataformaC = '$contrP' ,fechmanifesta = '$fmanifesta' where id=$id");

	$iduser = $_SESSION['id_login'];
	if ($SeguiHisto != 'Cambios: ') {

		$sentencia6 = $seguimiento->prepare("INSERT INTO historial (nombre, id_myse, cambiosH) values (?,?,?)");
		$resultado2 = $sentencia6->execute([$iduser, $myse, $SeguiHisto]);

	 }

	$sentencia8 = $seguimiento->query("UPDATE ecce SET vtIVA = '$vtIVA', acum = '$acum', obligado = '$obligado',ebitda = '$ebitda',tipoeventu = '$tipoeventu',vpn = '$vpn',ordenc = '$ordenc',fechaoc = '$fechaoc',fechafoc = '$fechafoc',ctari = '$ctari',targetari = '$targetari',tarim = '$tarim',ebitdatm = '$ebitdatm',vpntari = '$vpntari' where myse = '$myse'");

	header("Location: ../../administrador/menuAdministrador.php");
} elseif ($_POST['resul'] === '1') {

	if ($_SESSION['rol'] === 'Administrador') {

		$sentenciaX = $seguimiento->query("UPDATE seguimiento SET obCalidadProces='$obCalidadProces', obFallaProces='$obFallaProces', accionPreCor='$accionPreCor',imputabilidad='$imputabilidad' where id = $id");
	}

	$sentencia = $seguimiento->query("UPDATE seguimiento SET fCreacion='$fCreacion', myse = '$myse', nombre_concepto = '$nombre_concepto', nit = '$nit', entidad = '$entidad',indi_Interes='$indi_Interes',fecAreaTec='$fecAreaTec',horAreaTec='$horAreaTec',nombre_tiproces = '$nombre_tiproces',segmento='$segmento', numero = '$numero' where id = $id");

	$sentencia2 = $seguimiento->query("UPDATE seguimiento set nombre_estado = '$nombre_estado', nombre_stadpro = '$nombre_stadpro', fhcierre = '$fhcierre', prese='$prese', hopre = '$hopre', Presu = '$Presu', fhobs = '$fhobs', Mobs = '$Mobs',
		Hprese = '$Hprese' , mc = '$mc',Mprese = '$Mprese', nombre_reg = '$nombre_reg' where id= $id");

	$sentencia3 = $seguimiento->query("UPDATE seguimiento set consult= '$consult', ejecu= '$ejecu', nombre_aboga = $nombre_aboga, product = '$product', objcontra = '$objcontra', nombre_res = $nombre_res, nombre_causal = $nombre_causal, nombre_poder = $nombre_poder, rfcarma = '$rfcarma', traza = '$traza', vlofer = '$vlofer', plzejecu = '$plzejecu', fhlegal = '$fhlegal', nombre_sp = $nombre_sp, empgana = '$empgana', cerpre = '$cerpre', nombre_pro = $nombre_pro, indicador = '$indicador', nombre_seg = $nombre_seg where id= $id");

	$sentencia4 = $seguimiento->query("UPDATE seguimiento set tipPoli = '$tipoPoliza',porceP = '$porcenP', mensualidad = '$mensualidad', hora = '$horaIndicador', coberturaProy = '$cobertura', vlofergana = '$vlofergana' where id=$id");

	$sentencia5 = $seguimiento->query("UPDATE seguimiento set vigeDia = '$VigenciP' ,ingPropu = '$inPreve',MYSExp = '$MYSExp',estanpi = '$estam',plataforma = '$plataform',plataformaU = '$UseP',plataformaC = '$contrP' ,fechmanifesta = '$fmanifesta' where id=$id");
	if ($SeguiHisto != 'Cambios: ') {

		$sentencia6 = $seguimiento->prepare("INSERT INTO historial (nombre, id_myse, cambiosH) values (?,?,?)");
		$resultado2 = $sentencia6->execute([$iduser, $myse, $SeguiHisto]);

	 }

	$sentencia10 = $seguimiento->query("SELECT * FROM ecce WHERE myse = $myse");
	if ($sentencia10 = 0) {
		$sentencia8 = $seguimiento->prepare("INSERT INTO ecce (vtIVA,acum,obligado,ebitda,tipoeventu,vpn,ordenc,fechaoc,fechafoc,ctari,targetari,tarim,ebitdatm,vpntari,myse ) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
		$resultado3 = $sentencia8->execute([$vtIVA, $acum, $obligado, $ebitda, $tipoeventu, $vpn, $ordenc, $fechaoc, $fechafoc, $ctari, $targetari, $tarim, $ebitdatm, $vpntari, $myse]);
	} else {

		$sentencia8 = $seguimiento->query("UPDATE ecce SET vtIVA = '$vtIVA', acum = '$acum', obligado = '$obligado',ebitda = '$ebitda',tipoeventu = '$tipoeventu',vpn = '$vpn',ordenc = '$ordenc',fechaoc = '$fechaoc',fechafoc = '$fechafoc',ctari = '$ctari',targetari = '$targetari',tarim = '$tarim',ebitdatm = '$ebitdatm',vpntari = '$vpntari' where myse = '$myse'");
	}

	header("Location: ../../administrador/menuAdministrador.php");
}
