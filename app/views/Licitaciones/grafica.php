<?php
session_start();
if (isset($_SESSION['id_login'])){ 
}else{
  header('location: ../../index.php');
}
include("../clases/clases_funciones.php");
include("function/sentencias.php");
$sentencia  = new conexion;
$seguimiento = $sentencia->_conexion();
?>
<meta charset="UTF-8">
<title>Licitaciones</title>
<link rel="icon" type="../assets/imagenes/jpg" href="../assets/imagenes/LOGO.ico"/>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="../assets/librerias/Highcharts/code/highcharts.js"></script>
<script src="../assets/librerias/Highcharts/code/modules/exporting.js"></script>
<script src="../assets/librerias/Highcharts/code/modules/export-data.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<LINK REL=StyleSheet HREF="../estilos/estiloPerfiles2.css" TYPE="text/css" MEDIA=screen>
<div id="wrapper" class="animate">
  <nav class="navbar header-top fixed-top navbar-expand-lg navbar-dark bg-dark">
    <span class="navbar-toggler-icon leftmenutrigger"></span>
    <a href="http://intranet.tigoune.com.co/"><img src="../assets/imagenes/LOGO.png" style="margin-left: 15%; width: 100px; height: 68px;"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText"
    aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <?php 
  if ($_SESSION['rol']=== 'Administrador') {?>
    <div class="collapse navbar-collapse" id="navbarText">
    <?php  
 include_once "lateral/lateral.php";
 ?>
      <ul class="navbar-nav ml-md-auto d-md-flex">
       <li class="nav-item">
        <?php
        $total = $seguimiento->query("SELECT COUNT(*) FROM login where recuperar = '1'");
        foreach ($total as $key) {
          if ($key['COUNT(*)'] > '0') { ?>
           <a class="nav-link" href="../administrador/cambioContrasenas.php"><b><u>Solicitudes(<?php echo $key['COUNT(*)']; ?>)</u></b></a>
         <?php }
       }
       ?>
     </li>
     <li class="nav-item">
      <a class="nav-link" href="cambiarClave.php"><i class="fas fa-unlock-alt"></i>Cambio</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#"><i class="fas fa-user"></i> <?php echo $_SESSION['nombre']; ?></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="../cerrarSesion.php"><i class="fas fa-power-off"></i>Cerrar Sesión</a>
    </li>
  </ul>
</div>
<?php } if ($_SESSION['rol']=== 'Asignar') {?>
  <div class="collapse navbar-collapse" id="navbarText">
  <?php
     include_once "lateral/lateralAsignar.php"
  ?>
    <ul class="navbar-nav ml-md-auto d-md-flex">
     <li class="nav-item">
      <a class="nav-link" href="cambiarClave.php"><i class="fas fa-unlock-alt"></i>Cambio</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#"><i class="fas fa-user"></i> <?php echo $_SESSION['nombre']; ?></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="../cerrarSesion.php"><i class="fas fa-power-off"></i>Cerrar Sesión</a>
    </li>
  </ul>
</div>
<?php } if ($_SESSION['rol']==='Usuario') {?>
  <div class="collapse navbar-collapse" id="navbarText">
  <?php
       include_once "lateral/lateralUsuario.php"
    ?>
    <ul class="navbar-nav ml-md-auto d-md-flex">
     <li class="nav-item">
      <a class="nav-link" href="cambiarClave.php"><i class="fas fa-unlock-alt"></i>Cambio</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#"><i class="fas fa-user"></i> <?php echo $_SESSION['nombre']; ?></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="../cerrarSesion.php"><i class="fas fa-power-off"></i></i>Cerrar Sesión</a>
    </li>
  </ul>
</div>
<?php }elseif ($_SESSION['rol']==='UsuarioCCE') {?>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav animate side-nav">
      <li class="nav-item">
        <a class="nav-link" href="../administrador/menuAdministrador.php" title="Menu"><i class="fas fa-home"></i>Menu<i class="fas fa-home shortmenu animate"></i></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../administrador/agregarLicitacion.php" title="Agregar licitacion"><i class="fas fa-plus-circle"></i>Agregar<i class="fas fa-plus-circle shortmenu animate"></i></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="consultarLicitaciones.php" title="Consultar Licitaciones"><i class="fas fa-search"></i>Licitaciones<i class="fas fa-search shortmenu animate"></i></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../administrador/licitacionesTerminadas.php" title="Licitaciones pendientes de adjudicación"><i class="fas fa-check-circle"></i>Pendientes adjudicación<i class="fas fa-check-circle shortmenu animate"></i></a>
      </li>
    </ul>
    <ul class="navbar-nav ml-md-auto d-md-flex">
     <li class="nav-item">
      <a class="nav-link" href="cambiarClave.php"><i class="fas fa-unlock-alt"></i>Cambio</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#"><i class="fas fa-user"></i> <?php echo $_SESSION['nombre']; ?></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="../cerrarSesion.php"><i class="fas fa-power-off"></i>Cerrar Sesión</a>
    </li>
  </ul>
</div>
<?php }elseif ($_SESSION['rol']==='Govermment' || $_SESSION['rol']==='Corporativo' || $_SESSION['rol']==='ConsultorVP' || $_SESSION['rol'] ==='Pymes' || $_SESSION['rol']==='Whosale') {?>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav animate side-nav">
      <li class="nav-item">
        <a class="nav-link" href="../administrador/menuAdministrador.php" title="Menu"><i class="fas fa-home"></i>Menu<i class="fas fa-home shortmenu animate"></i></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="consultarLicitaciones.php" title="Consultar Licitaciones"><i class="fas fa-search"></i>Licitaciones<i class="fas fa-search shortmenu animate"></i></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../administrador/licitacionesTerminadas.php" title="Licitaciones pendientes de adjudicación"><i class="fas fa-check-circle"></i>Pendientes adjudicación<i class="fas fa-check-circle shortmenu animate"></i></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="consultaOportunidad.php" title="Oportunidades"><i class="fas fa-globe"></i>Oportunidad<i class="fas fa-globe shortmenu animate"></i></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../administrador/grafica.php" title="Graficos"><i class="fas fa-chart-pie"></i>Graficos<i class="fas fa-chart-pie shortmenu animate"></i></a>
      </li>
    </ul>
    <ul class="navbar-nav ml-md-auto d-md-flex">
     <li class="nav-item">
      <a class="nav-link" href="cambiarClave.php"><i class="fas fa-unlock-alt"></i>Cambio</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#"><i class="fas fa-user"></i> <?php echo $_SESSION['nombre']; ?></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="../cerrarSesion.php"><i class="fas fa-power-off"></i>Cerrar Sesión</a>
    </li>
  </ul>
</div>
<?php }?>
</nav>
<div class="loader"></div>
<div class="loader2"></div>
<?php

//GENERALES
$año = date('Y');
$añoAnterior = date("Y", strtotime("-1 year"));
$mes = date('m');
$adjudicado = "1";
$noAdjudicado = "5";
$documentacionEnvi = "4";
$cerradaEntidad = "2";
$pendienteAdjudicacion = "7";
$declaDesierto = "3";
$noParticipamos = "6";

$Prime = reportesAño($año,'1');
$Large = reportesAño($año,'2');
$Govermment = reportesAño($año,'3');
$Whosale = reportesAño($año,'4');
$Pymes = reportesAño($año,'5');

$Prime1 = reportesAño($añoAnterior,'1');
$Large1 = reportesAño($añoAnterior,'2');
$Govermment1 = reportesAño($añoAnterior,'3');
$Whosale1 = reportesAño($añoAnterior,'4');
$Pymes1 = reportesAño($añoAnterior,'5');

$totalAño = totalReportesAño($año);
$totalPasado = totalReportesAño($añoAnterior);
$valorOferta = valorOfertaAño($año);
$valorOfertaPa = valorOfertaAño($añoAnterior);

//Govermment
$gover = "3";
$documentacionEnviadaG = cantidadEStado($año,$mes,$gover,'1');
$noParticipamosG = cantidadEStado($año,$mes,$gover,'3');
$enProcesoG = cantidadEStado($año,$mes,$gover,'2');
$ofertaPresentadaG = cantidadEStado($año,$mes,$gover,'4');
$estudioMercadoG = cantidadEStado($año,$mes,$gover,'7');
$suspendidoGover = suspendido($año,$gover);

$documentacionEnviadaGA = cantidadEStado($añoAnterior,$mes,$gover,'1');
$noParticipamosGA = cantidadEStado($añoAnterior,$mes,$gover,'3');
$enProcesoGA = cantidadEStado($añoAnterior,$mes,$gover,'2');
$estudioMercadoGA = cantidadEStado($añoAnterior,$mes,$gover,'7');
$ofertaPresentadaGA= cantidadEStado($añoAnterior,$mes,$gover,'4');

//Prime y largue
$prime = "1";
$documentacionEnviadaP = cantidadEStado($año,$mes,$prime,'1');
$noParticipamosP = cantidadEStado($año,$mes,$prime,'3');
$ofertaPresentadaP = cantidadEStado($año,$mes,$prime,'4');
$enProcesoP = cantidadEStado($año,$mes,$prime,'2');
$estudioMercadoP = cantidadEStado($año,$mes,$prime,'7');
$suspendidoP = suspendido($año,$prime);

$documentacionEnviadaPA = cantidadEStado($añoAnterior,$mes,$prime,'1');
$noParticipamosPA = cantidadEStado($añoAnterior,$mes,$prime,'3');
$enProcesoPA = cantidadEStado($añoAnterior,$mes,$prime,'2');
$ofertaPresentadaPA = cantidadEStado($añoAnterior,$mes,$prime,'4');
$estudioMercadoPA = cantidadEStado($añoAnterior,$mes,$prime,'7');


$large = "2";
$documentacionEnviadaL = cantidadEStado($año,$mes,$large,'1');
$noParticipamosL = cantidadEStado($año,$mes,$large,'3');
$ofertaPresentadaL = cantidadEStado($año,$mes,$large,'4');
$enProcesoL = cantidadEStado($año,$mes,$large,'2');
$estudioMercadoL = cantidadEStado($año,$mes,$large,'7');
$suspendidoL = suspendido($año,$large);

$documentacionEnviadaLA = cantidadEStado($añoAnterior,$mes,$large,'1');
$noParticipamosLA = cantidadEStado($añoAnterior,$mes,$large,'3');
$ofertaPresentadaLA = cantidadEStado($añoAnterior,$mes,$large,'4');
$enProcesoLA = cantidadEStado($añoAnterior,$mes,$large,'2');
$estudioMercadoLA = cantidadEStado($añoAnterior,$mes,$large,'7');

//Pymes

$pymes = "5";
$documentacionEnviadaE = cantidadEStado($año,$mes,$pymes,'1');
$noParticipamosE = cantidadEStado($año,$mes,$pymes,'3');
$ofertaPresentadaE = cantidadEStado($año,$mes,$pymes,'4');
$enProcesoE = cantidadEStado($año,$mes,$pymes,'2');
$estudioMercadoE = cantidadEStado($año,$mes,$pymes,'7');
$suspendidoE = suspendido($año,$pymes);

$documentacionEnviadaEA = cantidadEStado($añoAnterior,$mes,$pymes,'1');
$noParticipamosEA = cantidadEStado($añoAnterior,$mes,$pymes,'3');
$ofertaPresentadaEA = cantidadEStado($añoAnterior,$mes,$pymes,'4');
$enProcesoEA = cantidadEStado($añoAnterior,$mes,$pymes,'2');
$estudioMercadoEA = cantidadEStado($añoAnterior,$mes,$pymes,'7');
//whosale

$whosale = "4";
$documentacionEnviadaW = cantidadEStado($año,$mes,$whosale,'1');
$noParticipamosW = cantidadEStado($año,$mes,$whosale,'3');
$ofertaPresentadaW = cantidadEStado($año,$mes,$whosale,'4');
$enProcesoW = cantidadEStado($año,$mes,$whosale,'2');
$estudioMercadoW = cantidadEStado($año,$mes,$whosale,'7');
$suspendidoW = suspendido($año,$whosale);

$documentacionEnviadaWA = cantidadEStado($añoAnterior,$mes,$whosale,'1');
$noParticipamosWA = cantidadEStado($añoAnterior,$mes,$whosale,'3');
$ofertaPresentadaWA = cantidadEStado($añoAnterior,$mes,$whosale,'4');
$enProcesoWA = cantidadEStado($añoAnterior,$mes,$whosale,'2');
$estudioMercadoWA = cantidadEStado($añoAnterior,$mes,$whosale,'7');

//Principales adjudicados/No adjudicados/No participamos
$adjudicadosG = principalesAN($año,$gover,$adjudicado);
$noAdjudicadosG = principalesAN($año,$gover,$noAdjudicado);
//Resultado
$adjuCanti = resultados($año,$gover,$adjudicado);
$noAdjuCanti = resultados($año,$gover,$noAdjudicado);
$documenEnviCanti = resultados($año,$gover,$documentacionEnvi);
$cerradoEntiCanti = resultados($año,$gover,$cerradaEntidad);
$pendienAdjCanti = resultados($año,$gover,$pendienteAdjudicacion);
$declaDesierCanti = resultados($año,$gover,$declaDesierto);

$total = sumas($adjuCanti,$noAdjuCanti ,$documenEnviCanti , $cerradoEntiCanti , $pendienAdjCanti , $declaDesierCanti);
$porceadjuCanti = porciento($total, $adjuCanti);
$porcenoAdjuCanti = porciento($total, $noAdjuCanti);
$porcedocumenEnviCanti = porciento($total, $documenEnviCanti);
$porcecerradoEntiCanti = porciento($total, $cerradoEntiCanti);
$porcependienAdjCanti = porciento($total, $pendienAdjCanti);
$porcedeclaDesierCanti = porciento($total, $declaDesierCanti);

$totalPocien = sumas($porceadjuCanti , $porcenoAdjuCanti , $porcedocumenEnviCanti , $porcecerradoEntiCanti , $porcependienAdjCanti ,$porcedeclaDesierCanti);
//VALOR DE LA OFERTA
$valorOferADG = totalValorOferta($año,$gover,$adjudicado);
$valorOferNOADG = totalValorOferta($año,$gover,$noAdjudicado);
$valorOferDOENG = totalValorOferta($año,$gover,$documentacionEnvi);
$valorOferCRREG = totalValorOferta($año,$gover,$cerradaEntidad);
$valorOferPADG = totalValorOferta($año,$gover,$pendienteAdjudicacion);
$valorOferDDG = totalValorOferta($año,$gover,$declaDesierto);

$totalVlofer = totalOferta($año,$gover);

$porcentaje1 = porciento2($totalVlofer,$valorOferADG);
$porcentaje2 = porciento2($totalVlofer,$valorOferNOADG);
$porcentaje3 = porciento2($totalVlofer,$valorOferDOENG);
$porcentaje4 = porciento2($totalVlofer,$valorOferCRREG);
$porcentaje5 = porciento2($totalVlofer,$valorOferPADG);
$porcentaje6 = porciento2($totalVlofer,$valorOferDDG);

$totalPorcenVal = sumas($porcentaje1,$porcentaje2,$porcentaje3,$porcentaje4,$porcentaje5,$porcentaje6);

//MNSUALIDAD
$mensualidad1 = mensualidad($año,$gover,$adjudicado);
$mensualidad2 = mensualidad($año,$gover,$noAdjudicado);
$mensualidad3 = mensualidad($año,$gover,$documentacionEnvi);
$mensualidad4 = mensualidad($año,$gover,$cerradaEntidad);
$mensualidad5 = mensualidad($año,$gover,$pendienteAdjudicacion);
$mensualidad6 = mensualidad($año,$gover,$declaDesierto);
$totalMensualidad =  totalMensualidad($año,$gover);

//Adjudicado
$cantidadtotal=cantidad($año,$gover,$adjudicado);
$proponente = proponentes($año,$gover,$cantidadtotal,$adjudicado);
//No adjudicado
$cantidadtotalNo=cantidad($año,$gover,$noAdjudicado);
$empgana = empgana($año,$gover,$cantidadtotalNo,$noAdjudicado);
$principalesNA = principalesAN($año,$gover,$noAdjudicado);
//Pendientes de adjudicación
$cantidadtotalPen=cantidad($año,$gover,$pendienteAdjudicacion);
$entidadPen = penAdju($año,$gover,$cantidadtotalPen,$pendienteAdjudicacion);
//NoParticipamos
$entidadNoPa = principalesAD3($año,$gover,$noParticipamos);
?>
<style type="text/css">
  .table{
    font-size: 12px;
    width:  200px;
  }
  #tablex{
    font-size: 12px;
    width:  500px;
  }
  .loader {
    position: fixed;
    left: 0px;
    top: 0px;
    width: 100%;
    height: 70%;
    z-index: 9999;
    background: url('../assets/imagenes/logo.jpg') 50% 60% no-repeat rgb(249,249,249);
    opacity: .5;
  }
  .loader2 {
    position: fixed;
    left: 0px;
    top: 0px;
    width: 100%;
    height: 72%;
    z-index: 9999;
    background: url('../assets/imagenes/cargando.gif') 50% 60% no-repeat rgb(249,249,249);
    opacity: .5;
  }
</style>
<div class="container">
  <h2>Graficos</h2>
  <br>
  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <?php if ($_SESSION['rol']==='Govermment') {?>
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#menu1">Govermment</a>
      </li>
    <?php }elseif($_SESSION['rol']==='Corporativo') {?>
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#menu2">Prime y Large</a>
      </li>
    <?php }elseif($_SESSION['rol']==='Pymes') {?>
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#menu3">Pymes</a>
      </li>
    <?php }elseif($_SESSION['rol']==='Whosale') {?>
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#menu4">Whosale</a>
      </li>
    <?php }else{?>
      <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#home">Procesos atendidos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#menu1">Govermment</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#menu2">Prime y Large</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#menu3">Pymes</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#menu4">Whosale</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#menu5">Habilitantes</a>
      </li>
    <?php } ?>
  </ul>
  <!-- Tab panes -->
  <div class="tab-content">
    <div id="home" class="container tab-pane active"><br>
      <h5>Procesos atendidos</h5><br>
      <div class="row">
       <div class="col">
        <div id="graficosT1" style="width: 500px; height: 600px; margin: 0 auto"></div><br>
      </div>
    </div>
    <h6>Total de procesos <?php echo $año?>: <?php echo $totalAño; ?></h6>
    <h6>Total de procesos <?php echo $añoAnterior?>: <?php echo $totalPasado; ?></h6>
    <h6>Vr. Ofertas (Millones de $) <?php echo $año; ?> = <?php echo number_format($valorOferta); ?></h6>
    <h6>Vr. Ofertas (Millones de $) <?php echo $añoAnterior; ?> = <?php echo number_format($valorOfertaPa); ?></h6>

  </div>

  <div id="menu1" class="container tab-pane fade"><br>
    <h5>Sector Govermment - <?php echo $año ?></h5><br>
    <div class="row">

      <!-- SECTOR Govermment------------------------------------------------------------------------------- -->
      <div class="col-md-6"  id="graficosA1" style="width: 400px; height: 600px; margin: 0 auto"></div>
      <div class="col-md-6" >
        <b><label>Hay (<?php echo $suspendidoGover ?>) procesos suspendidos</label></b>
        <table class ="table" id="tablex">    
          <thead class="thead-light">
            <tr>
              <th>Principales clientes adjudicados</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($adjudicadosG as $key) {?> 
              <tr>
                <td  bgcolor="EAEAEA"><?php echo $key['entidad']; ?></td>
              <?php } ?>
            </tbody>    
          </table>
          <table class ="table" >    
            <thead class="thead-light">
              <tr>
                <th>Resultado</th>
                <th>Cantidad</th>
                <th>%</th>
                <th>Vr.oferta</th>
                <th>%</th>
                <th>Vr.mensualidad</th>
              </tr>
            </thead>
            <tbody> 
              <tr>
                <td  bgcolor="EAEAEA">Perdido</td>
                <td  bgcolor="EAEAEA"><?php echo $noAdjuCanti; ?></td>
                <td  bgcolor="EAEAEA"><?php echo substr($porcenoAdjuCanti,0,4); ?>%</td>
                <td  bgcolor="EAEAEA"><?php echo $valorOferNOADG; ?></td>
                <td  bgcolor="EAEAEA"><?php echo substr($porcentaje2, 0,4); ?>%</td>
                <td  bgcolor="EAEAEA"><?php echo $mensualidad2; ?></td>
              </tr>
              <tr>
                <td  bgcolor="EAEAEA">Adjudicado</td>
                <td  bgcolor="EAEAEA"><?php echo $adjuCanti; ?></td>
                <td  bgcolor="EAEAEA"><?php echo substr($porceadjuCanti,0,4); ?>%</td>
                <td  bgcolor="EAEAEA"><?php echo $valorOferADG; ?></td>
                <td  bgcolor="EAEAEA"><?php echo substr($porcentaje1, 0,4); ?>%</td>
                <td  bgcolor="EAEAEA"><?php echo substr($mensualidad1,0,-3); ?></td>
              </tr>
              <tr>
                <td  bgcolor="EAEAEA">Documento enviado</td>
                <td  bgcolor="EAEAEA"><?php echo $documenEnviCanti; ?></td>
                <td  bgcolor="EAEAEA"><?php echo substr($porcedocumenEnviCanti,0,4); ?>%</td>
                <td  bgcolor="EAEAEA"><?php echo $valorOferDOENG; ?></td>
                <td  bgcolor="EAEAEA"><?php echo substr($porcentaje3, 0,4); ?>%</td>
                <td  bgcolor="EAEAEA"><?php echo $mensualidad3; ?></td>
              </tr>
              <tr>
                <td  bgcolor="EAEAEA">Cerrado por la entidad</td>
                <td  bgcolor="EAEAEA"><?php echo $cerradoEntiCanti; ?></td>
                <td  bgcolor="EAEAEA"><?php echo substr($porcecerradoEntiCanti,0,4); ?>%</td>
                <td  bgcolor="EAEAEA"><?php echo $valorOferCRREG; ?></td>
                <td  bgcolor="EAEAEA"><?php echo substr($porcentaje4, 0,4); ?>%</td>
                <td  bgcolor="EAEAEA"><?php echo $mensualidad4; ?></td>
              </tr>
              <tr>
                <td  bgcolor="EAEAEA">Pendiente de adjudicación</td>
                <td  bgcolor="EAEAEA"><?php echo $pendienAdjCanti; ?></td>
                <td  bgcolor="EAEAEA"><?php echo substr($porcependienAdjCanti,0,4); ?>%</td>
                <td  bgcolor="EAEAEA"><?php echo $valorOferPADG; ?></td>
                <td  bgcolor="EAEAEA"><?php echo substr($porcentaje5, 0,4); ?>%</td>
                <td  bgcolor="EAEAEA"><?php echo $mensualidad5; ?></td>
              </tr>
              <tr>
                <td  bgcolor="EAEAEA">Declarado desierto</td>
                <td  bgcolor="EAEAEA"><?php echo $declaDesierCanti; ?></td>
                <td  bgcolor="EAEAEA"><?php echo substr($porcedeclaDesierCanti,0,4);?>%</td>
                <td  bgcolor="EAEAEA"><?php echo $valorOferDDG; ?></td>
                <td  bgcolor="EAEAEA"><?php echo substr($porcentaje6, 0,4); ?>%</td>
                <td  bgcolor="EAEAEA"><?php echo $mensualidad6; ?></td>
              </tr>
            </tbody> 
            <thead class="table-info">
              <tr>
                <th>Total general</th>
                <th><?php echo $total ?></th>
                <th><?php echo $totalPocien?>%</th>
                <th>$<?php echo $totalVlofer?></th>
                <th><?php echo $totalPorcenVal; ?>%</th>
                <th><?php echo $totalMensualidad?></th>
              </tr>
            </thead>   
          </table>
        </div>
        <div class="col-md-6" style="margin: 1%;">
          <table class ="table" id="tablex">   
            <thead class="thead-light">
              <h6>Proponetes - Procesos adjudicados</h6>
              <tr>
                <th>Empresa ganadora del proceso</th>
                <th>Cantidad</th>
                <th>%</th>
                <th>Vr.Mensualidad</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $todo = 0;
              $vltotalMen = 0;
              foreach ($proponente as $key) {
               $todo += substr($key['porcentaje'],0,4);
               $vltotalMen += $key['mensualidad'];
               ?>       
               <tr>
                <td  bgcolor="EAEAEA"><?php echo $key['proponente']; ?></td>
                <td  bgcolor="EAEAEA"><?php echo $key['cantidad']; ?></td>
                <td  bgcolor="EAEAEA"><?php echo substr($key['porcentaje'],0,4)?>%</td>
                <td  bgcolor="EAEAEA"><?php echo number_format($key['mensualidad']) ?></td>
              </tr>
            <?php }?>
          </tbody>
          <thead class="table-info">
            <tr>
              <th>Total general</th>
              <th><?php echo $cantidadtotal?></th>
              <th><?php echo $todo?>%</th>
              <th><?php echo number_format($vltotalMen)?></th>
            </tr>
          </thead>    
        </table>
      </div>
      <div class="col-md-5" style="margin: 1%;">
        <table class ="table" id="tablex">    
          <thead class="thead-light">
            <h6>Pendientes de adjudicación</h6>
            <tr>
              <th>Cliente</th>
              <th>Cantidad</th>
              <th>%</th>
              <th>Vr.Mensualidad</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $todo3 = 0;
            $vltotalMen3 = 0;
            foreach ($entidadPen as $key3) {
             $todo3 += substr($key3['porcentaje'],0,4);
             $vltotalMen3 += $key3['mensualidad'];
             ?>       
             <tr>
              <td  bgcolor="EAEAEA"><?php echo $key3['entidad']; ?></td>
              <td  bgcolor="EAEAEA"><?php echo $key3['cantidad']; ?></td>
              <td  bgcolor="EAEAEA"><?php echo substr($key3['porcentaje'],0,4)?>%</td>
              <td  bgcolor="EAEAEA"><?php echo number_format($key3['mensualidad']) ?></td>
            </tr>
          <?php }?>
        </tbody>
        <thead class="table-info">
          <tr>
            <th>Total general</th>
            <th><?php echo $cantidadtotalPen ?></th>
            <th><?php echo $todo3?>%</th>
            <th><?php echo  number_format($vltotalMen3)?></th>
          </tr>
        </thead>    
      </table>
    </div>
    <div class="col-md-6" style="margin: 1%;">
      <table class ="table" id="tablex">    
        <thead class="thead-light">
          <h6>Perdido</h6>
          <tr>
            <th>Empresa ganadora del proceso</th>
            <th>Causal</th>
            <th>Cantidad</th>
            <th>%</th>
            <th>Vr.Mensualidad</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $todo2 = 0;
          $vltotalMen2 = 0;
          foreach ($empgana as $key2) {
           $todo2 += substr($key2['porcentaje'],0,4);
           $vltotalMen2 += $key2['mensualidad'];
           ?>       
           <tr>
            <td  bgcolor="EAEAEA"><?php echo $key2['proponente']; ?></td>
            <td  bgcolor="EAEAEA"><?php echo $key2['causal']; ?></td>
            <td  bgcolor="EAEAEA"><?php echo $key2['cantidad']; ?></td>
            <td  bgcolor="EAEAEA"><?php echo substr($key2['porcentaje'],0,4)?>%</td>
            <td  bgcolor="EAEAEA"><?php echo number_format($key2['mensualidad']) ?></td>
          </tr>
        <?php }?>
      </tbody>
      <thead class="table-info">
        <tr>
          <th>Total general</th>
          <th></th>
          <th><?php echo $cantidadtotalNo ?></th>
          <th><?php echo $todo2?>%</th>
          <th><?php echo  number_format($vltotalMen2)?></th>
        </tr>
      </thead>    
    </table>
  </div>
  <div class="col-md-5" style="margin: 1%;">
    <table class ="table" id="tablex">  
      <h6>No participamos</h6>  
      <thead class="thead-light">
        <tr>
          <th>Principales clientes no participamos</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($entidadNoPa as $key4) { ?>       
         <tr>
          <td  bgcolor="EAEAEA"><?php echo $key4['entidad']; ?></td>
        </tr>
      <?php }?>
    </tbody>  
  </table>
</div>
<div class="col-md-5" style="margin: 1%;">
  <table class ="table" id="tablex">    
    <thead class="thead-light">
      <h6>Perdidos</h6>
      <tr>
        <th>Principales clientes perdidos</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($principalesNA as $key) {?> 
        <tr>
          <td  bgcolor="EAEAEA"><?php echo $key['entidad']; ?></td>
        <?php } ?>
      </tbody>    
    </table>
  </div>
</div>
</div>
<?php
//Principales adjudicados/No adjudicados/No participamos
$adjudicadosPL = principalesAD2($año,$prime,$large,$adjudicado);

//Resultado Prime

$adjuCantiP = resultados($año,$prime,$adjudicado);
$noAdjuCantiP = resultados($año,$prime,$noAdjudicado);
$documenEnviCantiP = resultados($año,$prime,$documentacionEnvi);
$cerradoEntiCantiP = resultados($año,$prime,$cerradaEntidad);
$pendienAdjCantiP = resultados($año,$prime,$pendienteAdjudicacion);
$declaDesierCantiP = resultados($año,$prime,$declaDesierto);
$totalP = sumas($adjuCantiP,$noAdjuCantiP ,$documenEnviCantiP , $cerradoEntiCantiP , $pendienAdjCantiP , $declaDesierCantiP);

//Resultados large
$adjuCantiL  = resultados($año,$large,$adjudicado);
$noAdjuCantiL = resultados($año,$large,$noAdjudicado);
$documenEnviCantiL = resultados($año,$large,$documentacionEnvi);
$cerradoEntiCantiL = resultados($año,$large,$cerradaEntidad);
$pendienAdjCantiL = resultados($año,$large,$pendienteAdjudicacion);
$declaDesierCantiL = resultados($año,$large,$declaDesierto);
$totalL = sumas($adjuCantiL,$noAdjuCantiL ,$documenEnviCantiL , $cerradoEntiCantiL , $pendienAdjCantiL , $declaDesierCantiL);
$totalGeneralPL = $totalL + $totalP;

//Porcentaje sector prime
$porceadjuCantiP = porciento($totalGeneralPL, $adjuCantiP);
$porcenoAdjuCantiP = porciento($totalGeneralPL, $noAdjuCantiP);
$porcedocumenEnviCantiP = porciento($totalGeneralPL, $documenEnviCantiP);
$porcecerradoEntiCantiP = porciento($totalGeneralPL, $cerradoEntiCantiP);
$porcependienAdjCantiP = porciento($totalGeneralPL, $pendienAdjCantiP);
$porcedeclaDesierCantiP = porciento($totalGeneralPL, $declaDesierCantiP);
//Porcentaje sector large
$porceadjuCantiL = porciento($totalGeneralPL, $adjuCantiL);
$porcenoAdjuCantiL = porciento($totalGeneralPL, $noAdjuCantiL);
$porcedocumenEnviCantiL = porciento($totalGeneralPL, $documenEnviCantiL);
$porcecerradoEntiCantiL = porciento($totalGeneralPL, $cerradoEntiCantiL);
$porcependienAdjCantiL = porciento($totalGeneralPL, $pendienAdjCantiL);
$porcedeclaDesierCantiL = porciento($totalGeneralPL, $declaDesierCantiL);

$totalPocienP = sumas($porceadjuCantiP , $porcenoAdjuCantiP , $porcedocumenEnviCantiP , $porcecerradoEntiCantiP , $porcependienAdjCantiP ,$porcedeclaDesierCantiP);
$totalPocienL = sumas($porceadjuCantiL , $porcenoAdjuCantiL , $porcedocumenEnviCantiL , $porcecerradoEntiCantiL , $porcependienAdjCantiL ,$porcedeclaDesierCantiL);

$totalPorcienGene = $totalPocienP + $totalPocienL;

//VALOR DE LA OFERTA PRIME
$valorOferADP = totalValorOferta($año,$prime,$adjudicado);
$valorOferNOADP = totalValorOferta($año,$prime,$noAdjudicado);
$valorOferDOENP = totalValorOferta($año,$prime,$documentacionEnvi);
$valorOferCRREP = totalValorOferta($año,$prime,$cerradaEntidad);
$valorOferPADP = totalValorOferta($año,$prime,$pendienteAdjudicacion);
$valorOferDDP = totalValorOferta($año,$prime,$declaDesierto);
$totalVloferP = totalOferta($año,$prime);

 //VALOR DE LA OFERTA LARGE

$valorOferADL = totalValorOferta($año,$large,$adjudicado);
$valorOferNOADL = totalValorOferta($año,$large,$noAdjudicado);
$valorOferDOENL = totalValorOferta($año,$large,$documentacionEnvi);
$valorOferCRREL = totalValorOferta($año,$large,$cerradaEntidad);
$valorOferPADL = totalValorOferta($año,$large,$pendienteAdjudicacion);
$valorOferDDL = totalValorOferta($año,$large,$declaDesierto);
$totalVloferL = totalOferta($año,$large);

$totalVloferPL = (double)str_replace(',','', $totalVloferP) + (double)str_replace(',','', $totalVloferL);
$totalVloferPL = number_format($totalVloferPL);

$porcentajeP1 = porciento2($totalVloferPL,$valorOferADP);
$porcentajeP2 = porciento2($totalVloferPL,$valorOferNOADP);
$porcentajeP3 = porciento2($totalVloferPL,$valorOferDOENP);
$porcentajeP4 = porciento2($totalVloferPL,$valorOferCRREP);
$porcentajeP5 = porciento2($totalVloferPL,$valorOferPADP);
$porcentajeP6 = porciento2($totalVloferPL,$valorOferDDP);

$porcentajeL1 = porciento2($totalVloferPL,$valorOferADL);
$porcentajeL2 = porciento2($totalVloferPL,$valorOferNOADL);
$porcentajeL3 = porciento2($totalVloferPL,$valorOferDOENL);
$porcentajeL4 = porciento2($totalVloferPL,$valorOferCRREL);
$porcentajeL5 = porciento2($totalVloferPL,$valorOferPADL);
$porcentajeL6 = porciento2($totalVloferPL,$valorOferDDL);

$totalPorcenValP = sumas($porcentajeP1,$porcentajeP2,$porcentajeP3,$porcentajeP4,$porcentajeP5,$porcentajeP6);
$totalPorcenValL = sumas($porcentajeL1,$porcentajeL2,$porcentajeL3,$porcentajeL4,$porcentajeL5,$porcentajeL6);
$totalPorcenValPL = $totalPorcenValP + $totalPorcenValL;

//MNSUALIDAD
$mensualidadP1 = mensualidad($año,$prime,$adjudicado);
$mensualidadP2 = mensualidad($año,$prime,$noAdjudicado);
$mensualidadP3 = mensualidad($año,$prime,$documentacionEnvi);
$mensualidadP4 = mensualidad($año,$prime,$cerradaEntidad);
$mensualidadP5 = mensualidad($año,$prime,$pendienteAdjudicacion);
$mensualidadP6 = mensualidad($año,$prime,$declaDesierto);

$mensualidadL1 = mensualidad($año,$large,$adjudicado);
$mensualidadL2 = mensualidad($año,$large,$noAdjudicado);
$mensualidadL3 = mensualidad($año,$large,$documentacionEnvi);
$mensualidadL4 = mensualidad($año,$large,$cerradaEntidad);
$mensualidadL5 = mensualidad($año,$large,$pendienteAdjudicacion);
$mensualidadL6 = mensualidad($año,$large,$declaDesierto);

$totalMensualidadP =  totalMensualidad($año,$prime);
$totalMensualidadL =  totalMensualidad($año,$large);
$totalMensualidadPL = (double)str_replace(',','', $totalMensualidadP) + (double)str_replace(',','', $totalMensualidadL);
$totalMensualidadPL = number_format($totalMensualidadPL);

//Adjudicado
$cantidadtotalPL=cantidadPL($año,$prime,$large,$adjudicado);
$proponentesPL = proponentesPL($año,$prime,$large,$cantidadtotalPL,$adjudicado);

//No adjudicados
$cantidadtotalNoPl=cantidadPL($año,$prime,$large,$noAdjudicado);
$empganaPl = empganaPL($año,$prime,$large,$cantidadtotalNoPl,$noAdjudicado);
$principalesPL = principalesAD2($año,$prime,$large,$noAdjudicado);
//Pendientes de adjudicación
$cantidadTotalPlPen=cantidadPL($año,$prime,$large,$pendienteAdjudicacion);
$cantidadtotalPenPl=cantidad($año,$prime,$pendienteAdjudicacion);
$cantidadtotalPenLl=cantidad($año,$large,$pendienteAdjudicacion);

$entidadPenPl = penAdju($año,$prime,$cantidadTotalPlPen,$pendienteAdjudicacion);
$entidadPenLl = penAdju($año,$large,$cantidadTotalPlPen,$pendienteAdjudicacion);

$totalGeneralPenPL = $cantidadtotalPenPl + $cantidadtotalPenLl;

//NoParticipamos
$entidadNoPaPl = principalesAD4($año,$prime,$large,$noParticipamos);
?>

<!-- SECTOR PRIME Y LARGE------------------------------------------------------------------------------------- -->
<div id="menu2" class="container tab-pane fade"><br>
  <h5>Sector Prime y Large -  <?php echo $año ?></h5><br>
  <div class="row">
    <div class="col-md-3" id="graficosA2" style="width: 300px; height: 600px; margin: 0 auto"></div>
    <div class="col-md-3" id="graficosA3" style="width: 300px; height: 600px; margin: 0 auto"></div>
    <div class="col-md-6">
      <b><label>Prime: (<?php echo $suspendidoP ?>) - Largue (<?php echo $suspendidoL ?>) procesos suspendidos</label></b>
      <table class ="table" id="tablex">    
        <thead class="thead-light">
          <tr>
            <th>Principales clientes adjudicados</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($adjudicadosPL as $keyPL) {?> 
            <tr>
              <td  bgcolor="EAEAEA"><?php echo $keyPL['entidad']; ?></td>
            </tr>
          <?php } ?>
        </tbody>    
      </table>
      <table class ="table" >    
        <thead class="thead-light">
          <tr>
            <th>Sector</th>
            <th>Resultado</th>
            <th>Cantidad</th>
            <th>%</th>
            <th>Vr.oferta</th>
            <th>%</th>
            <th>Vr.mensualidad</th>
          </tr>
        </thead>
        <tbody> 
          <tr>
            <td><b>Prime</b></td>
            <td  bgcolor="EAEAEA">Perdido</td>
            <td  bgcolor="EAEAEA"><?php echo $noAdjuCantiP; ?></td>
            <td  bgcolor="EAEAEA"><?php echo substr($porcenoAdjuCantiP,0,4); ?>%</td>
            <td  bgcolor="EAEAEA"><?php echo $valorOferNOADP; ?></td>
            <td  bgcolor="EAEAEA"><?php echo substr($porcentajeP2, 0,4); ?>%</td>
            <td  bgcolor="EAEAEA"><?php echo $mensualidadP2?></td>
          </tr>
          <tr>
            <td></td>
            <td  bgcolor="EAEAEA">Adjudicado</td>
            <td  bgcolor="EAEAEA"><?php echo $adjuCantiP; ?></td>
            <td  bgcolor="EAEAEA"><?php echo  substr($porceadjuCantiP,0,4); ?>%</td>
            <td  bgcolor="EAEAEA"><?php echo $valorOferADP; ?></td>
            <td  bgcolor="EAEAEA"><?php echo substr($porcentajeP1, 0,4); ?>%</td>
            <td  bgcolor="EAEAEA"><?php  echo $mensualidadP1?></td>
          </tr>
          <tr>
            <td></td>
            <td  bgcolor="EAEAEA">Documento enviado</td>
            <td  bgcolor="EAEAEA"><?php echo $documenEnviCantiP; ?></td>
            <td  bgcolor="EAEAEA"><?php echo  substr($porcedocumenEnviCantiP,0,4); ?>%</td>
            <td  bgcolor="EAEAEA"><?php echo $valorOferDOENP; ?></td>
            <td  bgcolor="EAEAEA"><?php echo substr($porcentajeP3, 0,4); ?>%</td>
            <td  bgcolor="EAEAEA"><?php  echo $mensualidadP3?></td>
          </tr>
          <tr>
            <td></td>
            <td  bgcolor="EAEAEA">Cerrado por la entidad</td>
            <td  bgcolor="EAEAEA"><?php echo $cerradoEntiCantiP; ?></td>
            <td  bgcolor="EAEAEA"><?php echo  substr($porcecerradoEntiCantiP,0,4); ?>%</td>
            <td  bgcolor="EAEAEA"><?php echo $valorOferCRREP; ?></td>
            <td  bgcolor="EAEAEA"><?php echo substr($porcentajeP4, 0,4); ?>%</td>
            <td  bgcolor="EAEAEA"><?php  echo $mensualidadP4?></td>
          </tr>
          <tr>
            <td></td>
            <td  bgcolor="EAEAEA">Pendiente de adjudicación</td>
            <td  bgcolor="EAEAEA"><?php echo $pendienAdjCantiP; ?></td>
            <td  bgcolor="EAEAEA"><?php echo  substr($porcependienAdjCantiP,0,4); ?>%</td>
            <td  bgcolor="EAEAEA"><?php echo $valorOferPADP; ?></td>
            <td  bgcolor="EAEAEA"><?php echo substr($porcentajeP5, 0,4); ?>%</td>
            <td  bgcolor="EAEAEA"><?php  echo $mensualidadP5?></td>
          </tr>
          <tr>
            <td></td>
            <td  bgcolor="EAEAEA">Declarado desierto</td>
            <td  bgcolor="EAEAEA"><?php echo $declaDesierCantiP; ?></td>
            <td  bgcolor="EAEAEA"><?php echo  substr($porcedeclaDesierCantiP,0,4);?>%</td>
            <td  bgcolor="EAEAEA"><?php echo $valorOferDDP; ?></td>
            <td  bgcolor="EAEAEA"><?php echo substr($porcentajeP6, 0,4); ?>%</td>
            <td  bgcolor="EAEAEA"><?php echo $mensualidadP6?></td>
          </tr>
        </tbody>
        <thead>
          <tr>
            <th></th>
            <th>Total Prime</th>
            <th><?php echo $totalP ?></th>
            <th><?php echo  substr($totalPocienP, 0,4)?>%</th>
            <th>$<?php echo $totalVloferP?></th>
            <th><?php echo  substr($totalPorcenValP, 0,4); ?>%</th>
            <th><?php echo $totalMensualidadP?></th>
          </tr>
        </thead>  
        <tbody> 
          <tr>
            <td><b>Large</b></td>
            <td  bgcolor="EAEAEA">Perdido</td>
            <td  bgcolor="EAEAEA"><?php echo $noAdjuCantiL; ?></td>
            <td  bgcolor="EAEAEA"><?php echo  substr($porcenoAdjuCantiL, 0,4); ?>%</td>
            <td  bgcolor="EAEAEA"><?php echo $valorOferNOADL; ?></td>
            <td  bgcolor="EAEAEA"><?php echo substr($porcentajeL2, 0,4); ?>%</td>
            <td  bgcolor="EAEAEA"><?php echo $mensualidadL2 ?></td>
          </tr>
          <tr>
            <td></td>
            <td  bgcolor="EAEAEA">Adjudicado</td>
            <td  bgcolor="EAEAEA"><?php echo $adjuCantiL; ?></td>
            <td  bgcolor="EAEAEA"><?php echo  substr($porceadjuCantiL, 0,4); ?>%</td>
            <td  bgcolor="EAEAEA"><?php echo $valorOferADL; ?></td>
            <td  bgcolor="EAEAEA"><?php echo substr($porcentajeL1, 0,4); ?>%</td>
            <td  bgcolor="EAEAEA"><?php echo $mensualidadL1?></td>
          </tr>
          <tr>
            <td></td>
            <td  bgcolor="EAEAEA">Documento enviado</td>
            <td  bgcolor="EAEAEA"><?php echo $documenEnviCantiL; ?></td>
            <td  bgcolor="EAEAEA"><?php echo  substr($porcedocumenEnviCantiL, 0,4); ?>%</td>
            <td  bgcolor="EAEAEA"><?php echo $valorOferDOENL; ?></td>
            <td  bgcolor="EAEAEA"><?php echo substr($porcentajeL3, 0,4); ?>%</td>
            <td  bgcolor="EAEAEA"><?php echo $mensualidadL3?></td>
          </tr>
          <tr>
            <td></td>
            <td  bgcolor="EAEAEA">Cerrado por la entidad</td>
            <td  bgcolor="EAEAEA"><?php echo $cerradoEntiCantiL; ?></td>
            <td  bgcolor="EAEAEA"><?php echo  substr($porcecerradoEntiCantiL, 0,4); ?>%</td>
            <td  bgcolor="EAEAEA"><?php echo $valorOferCRREL; ?></td>
            <td  bgcolor="EAEAEA"><?php echo substr($porcentajeL4, 0,4); ?>%</td>
            <td  bgcolor="EAEAEA"><?php echo $mensualidadL4 ?></td>
          </tr>
          <tr>
            <td></td>
            <td  bgcolor="EAEAEA">Pendiente de adjudicación</td>
            <td  bgcolor="EAEAEA"><?php echo $pendienAdjCantiL; ?></td>
            <td  bgcolor="EAEAEA"><?php echo  substr($porcependienAdjCantiL, 0,4); ?>%</td>
            <td  bgcolor="EAEAEA"><?php echo $valorOferPADL; ?></td>
            <td  bgcolor="EAEAEA"><?php echo substr($porcentajeL5, 0,4); ?>%</td>
            <td  bgcolor="EAEAEA"><?php echo $mensualidadL5?></td>
          </tr>
          <tr>
            <td></td>
            <td  bgcolor="EAEAEA">Declarado desierto</td>
            <td  bgcolor="EAEAEA"><?php echo $declaDesierCantiL; ?></td>
            <td  bgcolor="EAEAEA"><?php echo  substr($porcedeclaDesierCantiL, 0,4);?>%</td>
            <td  bgcolor="EAEAEA"><?php echo $valorOferDDL; ?></td>
            <td  bgcolor="EAEAEA"><?php echo substr($porcentajeL6, 0,4); ?>%</td>
            <td  bgcolor="EAEAEA"><?php echo $mensualidadL6?></td>
          </tr>
        </tbody>
        <thead>
          <tr>
            <th></th>
            <th>Total Large</th>
            <th><?php echo $totalL ?></th>
            <th><?php echo substr($totalPocienL, 0,4)?>%</th>
            <th>$<?php echo $totalVloferL?></th>
            <th><?php echo substr($totalPorcenValL, 0,4); ?>%</th>
            <th><?php echo $totalMensualidadL?></th>
          </tr>
        </thead>
        <thead class="table-info">
          <tr>
            <th></th>
            <th>Total General</th>
            <th><?php echo $totalGeneralPL ?></th>
            <th><?php echo substr($totalPorcienGene, 0,4)?>%</th>
            <th>$<?php echo $totalVloferPL?></th>
            <th><?php echo substr($totalPorcenValPL, 0,4); ?>%</th>
            <th><?php echo $totalMensualidadPL?></th>
          </tr>
        </thead>     
      </table>
    </div>
    <div class="col-md-6" style="margin: 1%;">
      <table class ="table" id="tablex">    
        <thead class="thead-light">
          <h6>Proponetes - Procesos adjudicados</h6>
          <tr>
            <th>Empresa ganadora del proceso</th>
            <th>Cantidad</th>
            <th>%</th>
            <th>Vr.Mensualidad</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $todoPl = 0;
          $vltotalMenPl = 0;
          foreach ($proponentesPL as $keyPl) {
           $todoPl += substr($keyPl['porcentaje'],0,4);
           $vltotalMenPl += $keyPl['mensualidad'];
           ?>       
           <tr>
            <td  bgcolor="EAEAEA"><?php echo $keyPl['proponente']; ?></td>
            <td  bgcolor="EAEAEA"><?php echo $keyPl['cantidad']; ?></td>
            <td  bgcolor="EAEAEA"><?php echo substr($keyPl['porcentaje'],0,4)?>%</td>
            <td  bgcolor="EAEAEA"><?php echo number_format($keyPl['mensualidad']) ?></td>
          </tr>
        <?php }?>
      </tbody>
      <thead class="table-info">
        <tr>
          <th>Total general</th>
          <th><?php echo $cantidadtotalPL?></th>
          <th><?php echo $todoPl?>%</th>
          <th><?php echo number_format($vltotalMenPl)?></th>
        </tr>
      </thead>    
    </table>
  </div>
  <div class="col-md-5" style="margin: 1%;">
    <table class ="table" id="tablex">  
      <h6>No participamos</h6>  
      <thead class="thead-light">
        <tr>
          <th>Principales clientes no participamos</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($entidadNoPaPl as $keyP5) { ?>       
         <tr>
          <td  bgcolor="EAEAEA"><?php echo $keyP5['entidad']; ?></td>
        </tr>
      <?php }?>
    </tbody>  
  </table>
</div>
<div class="col-md-6" style="margin: 1%;">
  <table class ="table" id="tablex">    
    <thead class="thead-light">
      <h6>Perdido</h6>
      <tr>
        <th>Empresa ganadora del proceso</th>
        <th>Causal</th>
        <th>Cantidad</th>
        <th>%</th>
        <th>Vr.Mensualidad</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $todoP2 = 0;
      $vltotalMenP2 = 0;
      foreach ($empganaPl as $keyP2) {
       $todoP2 += substr($keyP2['porcentaje'],0,4);
       $vltotalMenP2 += $keyP2['mensualidad'];
       ?>       
       <tr>
        <td  bgcolor="EAEAEA"><?php echo $keyP2['proponente']; ?></td>
        <td  bgcolor="EAEAEA"><?php echo $keyP2['causal']; ?></td>
        <td  bgcolor="EAEAEA"><?php echo $keyP2['cantidad']; ?></td>
        <td  bgcolor="EAEAEA"><?php echo substr($keyP2['porcentaje'],0,4)?>%</td>
        <td  bgcolor="EAEAEA"><?php echo number_format($keyP2['mensualidad']) ?></td>
      </tr>
    <?php }?>
  </tbody>
  <thead class="table-info">
    <tr>
      <th>Total general</th>
      <th></th>
      <th><?php echo $cantidadtotalNoPl ?></th>
      <th><?php echo $todoP2?>%</th>
      <th><?php echo  number_format($vltotalMenP2)?></th>
    </tr>
  </thead>    
</table>
</div>
<div class="col-md-5" style="margin: 1%;">
  <table class ="table" id="tablex">    
    <thead class="thead-light">
      <h6>Perdidos</h6>
      <tr>
        <th>Principales clientes perdidos</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($principalesPL as $keyP3) {?> 
        <tr>
          <td  bgcolor="EAEAEA"><?php echo $keyP3['entidad']; ?></td>
        <?php } ?>
      </tbody>    
    </table>
  </div>
  <div class="col-md-5" style="margin: 1%;">
    <table class ="table" id="tablex">    
      <thead class="thead-light">
        <h6>Pendientes de adjudicación</h6>
        <tr>
         <th>Prime</th>
         <th>Cliente</th>
         <th>Cantidad</th>
         <th>%</th>
         <th>Vr.Mensualidad</th>
       </tr>
     </thead>
     <tbody>
      <?php
      $todoP3 = 0;
      $vltotalMenP3 = 0;
      foreach ($entidadPenPl as $keyP4) {
       $todoP3 += substr($keyP4['porcentaje'],0,4);
       $vltotalMenP3 += $keyP4['mensualidad'];
       ?>       
       <tr>
        <td></td>
        <td  bgcolor="EAEAEA"><?php echo $keyP4['entidad']; ?></td>
        <td  bgcolor="EAEAEA"><?php echo $keyP4['cantidad']; ?></td>
        <td  bgcolor="EAEAEA"><?php echo substr($keyP4['porcentaje'],0,4)?>%</td>
        <td  bgcolor="EAEAEA"><?php echo number_format($keyP4['mensualidad']) ?></td>
      </tr>
    <?php }?>
  </tbody>
  <thead>
    <tr>
      <th>Total</th>
      <th></th>
      <th><?php echo $cantidadtotalPenPl?></th>
      <th><?php echo $todoP3?>%</th>
      <th><?php echo  number_format($vltotalMenP3)?></th>
    </tr>
  </thead>  
  <thead class="thead-light">
    <tr>
     <th>Large</th>
     <th></th>
     <th></th>
     <th></th>
     <th></th>
   </tr>
 </thead>
 <tbody>
  <?php
  $todoP4 = 0;
  $vltotalMenP4 = 0;
  foreach ($entidadPenLl as $keyP6) {
   $todoP4 += substr($keyP6['porcentaje'],0,4);
   $vltotalMenP4 += $keyP6['mensualidad'];
   ?>       
   <tr>
    <td></td>
    <td  bgcolor="EAEAEA"><?php echo $keyP6['entidad']; ?></td>
    <td  bgcolor="EAEAEA"><?php echo $keyP6['cantidad']; ?></td>
    <td  bgcolor="EAEAEA"><?php echo substr($keyP6['porcentaje'],0,4)?>%</td>
    <td  bgcolor="EAEAEA"><?php echo number_format($keyP6['mensualidad']) ?></td>
  </tr>
<?php }?>
</tbody>
<thead>
  <tr>
    <th>Total</th>
    <th></th>
    <th><?php echo $cantidadtotalPenLl?></th>
    <th><?php echo $todoP4?>%</th>
    <th><?php echo  number_format($vltotalMenP4)?></th>
  </tr>
</thead>  
<thead class="table-info">
  <tr>
    <th>Total general</th>
    <th></th>
    <th><?php echo $totalGeneralPenPL?></th>
    <th><?php echo $todoP3 + $todoP4?>%</th>
    <th><?php echo  number_format($vltotalMenP3 + $vltotalMenP4)?></th>
  </tr>
</thead> 
</table>
</div>
</div>
</div>
<?php

//Principales adjudicados/No adjudicados/No participamos
$adjudicadosE = principalesAN($año,$pymes,$adjudicado);
$noAdjudicadosE = principalesAN($año,$pymes,$noAdjudicado);
//Resultado
$adjuCantiE = resultados($año,$pymes,$adjudicado);
$noAdjuCantiE = resultados($año,$pymes,$noAdjudicado);
$documenEnviCantiE = resultados($año,$pymes,$documentacionEnvi);
$cerradoEntiCantiE = resultados($año,$pymes,$cerradaEntidad);
$pendienAdjCantiE = resultados($año,$pymes,$pendienteAdjudicacion);
$declaDesierCantiE = resultados($año,$pymes,$declaDesierto);

$totalE = sumas($adjuCantiE,$noAdjuCantiE ,$documenEnviCantiE , $cerradoEntiCantiE , $pendienAdjCantiE , $declaDesierCantiE);
$porceadjuCantiE = porciento($totalE, $adjuCantiE);
$porcenoAdjuCantiE = porciento($totalE, $noAdjuCantiE);
$porcedocumenEnviCantiE = porciento($totalE, $documenEnviCantiE);
$porcecerradoEntiCantiE = porciento($totalE, $cerradoEntiCantiE);
$porcependienAdjCantiE = porciento($totalE, $pendienAdjCantiE);
$porcedeclaDesierCantiE = porciento($totalE, $declaDesierCantiE);

$totalPocienE = sumas($porceadjuCantiE , $porcenoAdjuCantiE , $porcedocumenEnviCantiE , $porcecerradoEntiCantiE , $porcependienAdjCantiE ,$porcedeclaDesierCantiE);

//VALOR DE LA OFERTA
$valorOferADGE = totalValorOferta($año,$pymes,$adjudicado);
$valorOferNOADGE = totalValorOferta($año,$pymes,$noAdjudicado);
$valorOferDOENGE = totalValorOferta($año,$pymes,$documentacionEnvi);
$valorOferCRREGE = totalValorOferta($año,$pymes,$cerradaEntidad);
$valorOferPADGE = totalValorOferta($año,$pymes,$pendienteAdjudicacion);
$valorOferDDGE = totalValorOferta($año,$pymes,$declaDesierto);

$totalVloferE = totalOferta($año,$pymes);
$porcentajeE1 = porciento2($totalVloferE,$valorOferADGE);
$porcentajeE2 = porciento2($totalVloferE,$valorOferNOADGE);
$porcentajeE3 = porciento2($totalVloferE,$valorOferDOENGE);
$porcentajeE4 = porciento2($totalVloferE,$valorOferCRREGE);
$porcentajeE5 = porciento2($totalVloferE,$valorOferPADGE);
$porcentajeE6 = porciento2($totalVloferE,$valorOferDDGE);

$totalPorcenValE = sumas($porcentajeE1,$porcentajeE2,$porcentajeE3,$porcentajeE4,$porcentajeE5,$porcentajeE6);

//MNSUALIDAD
$mensualidadE1 = mensualidad($año,$pymes,$adjudicado);
$mensualidadE2 = mensualidad($año,$pymes,$noAdjudicado);
$mensualidadE3 = mensualidad($año,$pymes,$documentacionEnvi);
$mensualidadE4 = mensualidad($año,$pymes,$cerradaEntidad);
$mensualidadE5 = mensualidad($año,$pymes,$pendienteAdjudicacion);
$mensualidadE6 = mensualidad($año,$pymes,$declaDesierto);
$totalMensualidadE =  totalMensualidad($año,$pymes);

$cantidadtotalE=cantidad($año,$pymes,$adjudicado);
$proponenteE = proponentes($año,$pymes,$cantidadtotalE,$adjudicado);
//No adjudicado
$cantidadtotalNoE=cantidad($año,$pymes,$noAdjudicado);
$empganaE = empgana($año,$pymes,$cantidadtotalNoE,$noAdjudicado);
$principalesNAE = principalesAN($año,$pymes,$noAdjudicado);
//Pendientes de adjudicación
$cantidadtotalPenE=cantidad($año,$pymes,$pendienteAdjudicacion);
$entidadPenE = penAdju($año,$pymes,$cantidadtotalPenE,$pendienteAdjudicacion);
//NoParticipamos
$entidadNoPaE = principalesAD3($año,$pymes,$noParticipamos);
?>
<!-- SECTOR PYMES ---------------------------------------------------------------------------------------------- -->

<div id="menu3" class="container tab-pane fade"><br>
  <h5>Sector Pymes - <?php echo $año ?></h5><br>
  <div class="row">
   <div class="col-md-6" id="graficosA4" style="width: 400px; height: 600px; margin: 0 auto"></div>
   <div class="col-md-6" >
    <b><label>Hay (<?php echo $suspendidoE ?>) procesos suspendidos</label></b>
    <table class ="table" id="tablex">    
      <thead class="thead-light">
        <tr>
          <th>Principales clientes adjudicados</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($adjudicadosE as $key) {?> 
          <tr>
            <td  bgcolor="EAEAEA"><?php echo $key['entidad']; ?></td>
          <?php } ?>
        </tbody>    
      </table>
      <table class ="table" >    
        <thead class="thead-light">
          <tr>
            <th>Resultado</th>
            <th>Cantidad</th>
            <th>%</th>
            <th>Vr.oferta</th>
            <th>%</th>
            <th>Vr.mensualidad</th>
          </tr>
        </thead>
        <tbody> 
          <tr>
            <td  bgcolor="EAEAEA">Perdido</td>
            <td  bgcolor="EAEAEA"><?php echo $noAdjuCantiE; ?></td>
            <td  bgcolor="EAEAEA"><?php echo substr($porcenoAdjuCantiE,0,4); ?>%</td>
            <td  bgcolor="EAEAEA"><?php echo $valorOferNOADGE; ?></td>
            <td  bgcolor="EAEAEA"><?php echo substr($porcentajeE2, 0,4); ?>%</td>
            <td  bgcolor="EAEAEA"><?php echo $mensualidadE2; ?></td>
          </tr>
          <tr>
            <td  bgcolor="EAEAEA">Adjudicado</td>
            <td  bgcolor="EAEAEA"><?php echo $adjuCantiE; ?></td>
            <td  bgcolor="EAEAEA"><?php echo substr($porceadjuCantiE,0,4); ?>%</td>
            <td  bgcolor="EAEAEA"><?php echo $valorOferADGE; ?></td>
            <td  bgcolor="EAEAEA"><?php echo substr($porcentajeE1, 0,4); ?>%</td>
            <td  bgcolor="EAEAEA"><?php echo $mensualidadE1; ?></td>
          </tr>
          <tr>
            <td  bgcolor="EAEAEA">Documento enviado</td>
            <td  bgcolor="EAEAEA"><?php echo $documenEnviCantiE; ?></td>
            <td  bgcolor="EAEAEA"><?php echo substr($porcedocumenEnviCantiE,0,4); ?>%</td>
            <td  bgcolor="EAEAEA"><?php echo $valorOferDOENGE; ?></td>
            <td  bgcolor="EAEAEA"><?php echo substr($porcentajeE3, 0,4); ?>%</td>
            <td  bgcolor="EAEAEA"><?php echo $mensualidadE3; ?></td>
          </tr>
          <tr>
            <td  bgcolor="EAEAEA">Cerrado por la entidad</td>
            <td  bgcolor="EAEAEA"><?php echo $cerradoEntiCantiE; ?></td>
            <td  bgcolor="EAEAEA"><?php echo substr($porcecerradoEntiCantiE,0,4); ?>%</td>
            <td  bgcolor="EAEAEA"><?php echo $valorOferCRREGE; ?></td>
            <td  bgcolor="EAEAEA"><?php echo substr($porcentajeE4, 0,4); ?>%</td>
            <td  bgcolor="EAEAEA"><?php echo $mensualidadE4; ?></td>
          </tr>
          <tr>
            <td  bgcolor="EAEAEA">Pendiente de adjudicación</td>
            <td  bgcolor="EAEAEA"><?php echo $pendienAdjCantiE; ?></td>
            <td  bgcolor="EAEAEA"><?php echo substr($porcependienAdjCantiE,0,4); ?>%</td>
            <td  bgcolor="EAEAEA"><?php echo $valorOferPADGE; ?></td>
            <td  bgcolor="EAEAEA"><?php echo substr($porcentajeE5, 0,4); ?>%</td>
            <td  bgcolor="EAEAEA"><?php echo $mensualidadE5; ?></td>
          </tr>
          <tr>
            <td  bgcolor="EAEAEA">Declarado desierto</td>
            <td  bgcolor="EAEAEA"><?php echo $declaDesierCantiE; ?></td>
            <td  bgcolor="EAEAEA"><?php echo substr($porcedeclaDesierCantiE,0,4);?>%</td>
            <td  bgcolor="EAEAEA"><?php echo $valorOferDDGE; ?></td>
            <td  bgcolor="EAEAEA"><?php echo substr($porcentajeE6, 0,4); ?>%</td>
            <td  bgcolor="EAEAEA"><?php echo $mensualidadE6; ?></td>
          </tr>
        </tbody> 
        <thead class="table-info">
          <tr>
            <th>Total general</th>
            <th><?php echo $totalE ?></th>
            <th><?php echo $totalPocienE?>%</th>
            <th>$<?php echo $totalVloferE?></th>
            <th><?php echo $totalPorcenValE; ?>%</th>
            <th><?php echo $totalMensualidadE?></th>
          </tr>
        </thead>   
      </table>
    </div>
    <div class="col-md-6" style="margin: 1%;">
      <table class ="table" id="tablex">   
        <thead class="thead-light">
          <h6>Proponetes - Procesos adjudicados</h6>
          <tr>
            <th>Empresa ganadora del proceso</th>
            <th>Cantidad</th>
            <th>%</th>
            <th>Vr.Mensualidad</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $todoE1 = 0;
          $vltotalMenE1 = 0;
          foreach ($proponenteE as $keyE1) {
           $todoE1 += substr($keyE1['porcentaje'],0,4);
           $vltotalMenE1 += $keyE1['mensualidad'];
           ?>       
           <tr>
            <td  bgcolor="EAEAEA"><?php echo $keyE1['proponente']; ?></td>
            <td  bgcolor="EAEAEA"><?php echo $keyE1['cantidad']; ?></td>
            <td  bgcolor="EAEAEA"><?php echo substr($keyE1['porcentaje'],0,4)?>%</td>
            <td  bgcolor="EAEAEA"><?php echo number_format($keyE1['mensualidad']) ?></td>
          </tr>
        <?php }?>
      </tbody>
      <thead class="table-info">
        <tr>
          <th>Total general</th>
          <th><?php echo $cantidadtotalE?></th>
          <th><?php echo $todoE1?>%</th>
          <th><?php echo number_format($vltotalMenE1)?></th>
        </tr>
      </thead>    
    </table>
  </div>
  <div class="col-md-5" style="margin: 1%;">
    <table class ="table" id="tablex">    
      <thead class="thead-light">
        <h6>Pendientes de adjudicación</h6>
        <tr>
          <th>Cliente</th>
          <th>Cantidad</th>
          <th>%</th>
          <th>Vr.Mensualidad</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $todoE2 = 0;
        $vltotalMenE2 = 0;
        foreach ($entidadPenE as $keyE2) {
         $todoE2 += substr($keyE2['porcentaje'],0,4);
         $vltotalMenE2 += $keyE2['mensualidad'];
         ?>       
         <tr>
          <td  bgcolor="EAEAEA"><?php echo $keyE2['entidad']; ?></td>
          <td  bgcolor="EAEAEA"><?php echo $keyE2['cantidad']; ?></td>
          <td  bgcolor="EAEAEA"><?php echo substr($keyE2['porcentaje'],0,4)?>%</td>
          <td  bgcolor="EAEAEA"><?php echo number_format($keyE2['mensualidad']) ?></td>
        </tr>
      <?php }?>
    </tbody>
    <thead class="table-info">
      <tr>
        <th>Total general</th>
        <th><?php echo $cantidadtotalPenE ?></th>
        <th><?php echo $todoE2?>%</th>
        <th><?php echo  number_format($vltotalMenE2)?></th>
      </tr>
    </thead>    
  </table>
</div>
<div class="col-md-6" style="margin: 1%;">
  <table class ="table" id="tablex">    
    <thead class="thead-light">
      <h6>Perdido</h6>
      <tr>
        <th>Empresa ganadora del proceso</th>
        <th>Causal</th>
        <th>Cantidad</th>
        <th>%</th>
        <th>Vr.Mensualidad</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $todoE3 = 0;
      $vltotalMenE3 = 0;
      foreach ($empganaE as $keyE3) {
       $todoE3 += substr($keyE3['porcentaje'],0,4);
       $vltotalMenE3 += $keyE3['mensualidad'];
       ?>       
       <tr>
        <td  bgcolor="EAEAEA"><?php echo $keyE3['proponente']; ?></td>
        <td  bgcolor="EAEAEA"><?php echo $keyE3['causal']; ?></td>
        <td  bgcolor="EAEAEA"><?php echo $keyE3['cantidad']; ?></td>
        <td  bgcolor="EAEAEA"><?php echo substr($keyE3['porcentaje'],0,4)?>%</td>
        <td  bgcolor="EAEAEA"><?php echo number_format($keyE3['mensualidad']) ?></td>
      </tr>
    <?php }?>
  </tbody>
  <thead class="table-info">
    <tr>
      <th>Total general</th>
      <th></th>
      <th><?php echo $cantidadtotalNoE ?></th>
      <th><?php echo $todoE3?>%</th>
      <th><?php echo  number_format($vltotalMenE3)?></th>
    </tr>
  </thead>    
</table>
</div>
<div class="col-md-5" style="margin: 1%;">
  <table class ="table" id="tablex">  
    <h6>No participamos</h6>  
    <thead class="thead-light">
      <tr>
        <th>Principales clientes no participamos</th>
      </tr>
    </thead>
    <tbody>
      <?php
      foreach ($entidadNoPaE as $keyE4) { ?>       
       <tr>
        <td  bgcolor="EAEAEA"><?php echo $keyE4['entidad']; ?></td>
      </tr>
    <?php }?>
  </tbody>  
</table>
</div>
<div class="col-md-5" style="margin: 1%;">
  <table class ="table" id="tablex">    
    <thead class="thead-light">
      <h6>Perdido</h6>
      <tr>
        <th>Principales clientes perdidos</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($principalesNAE as $keyE5) {?> 
        <tr>
          <td  bgcolor="EAEAEA"><?php echo $keyE5['entidad']; ?></td>
        <?php } ?>
      </tbody>    
    </table>
  </div>
</div>
</div>
<?php
//Principales adjudicados/No adjudicados/No participamos
$adjudicadosW = principalesAN($año,$whosale,$adjudicado);
$noAdjudicadosW = principalesAN($año,$whosale,$noAdjudicado);
//Resultado
$adjuCantiW = resultados($año,$whosale,$adjudicado);
$noAdjuCantiW = resultados($año,$whosale,$noAdjudicado);
$documenEnviCantiW = resultados($año,$whosale,$documentacionEnvi);
$cerradoEntiCantiW = resultados($año,$whosale,$cerradaEntidad);
$pendienAdjCantiW = resultados($año,$whosale,$pendienteAdjudicacion);
$declaDesierCantiW = resultados($año,$whosale,$declaDesierto);

$totalW = sumas($adjuCantiW,$noAdjuCantiW ,$documenEnviCantiW , $cerradoEntiCantiW , $pendienAdjCantiW , $declaDesierCantiW);
$porceadjuCantiW = porciento($totalW, $adjuCantiW);
$porcenoAdjuCantiW = porciento($totalW, $noAdjuCantiW);
$porcedocumenEnviCantiW = porciento($totalW, $documenEnviCantiW);
$porcecerradoEntiCantiW = porciento($totalW, $cerradoEntiCantiW);
$porcependienAdjCantiW = porciento($totalW, $pendienAdjCantiW);
$porcedeclaDesierCantiW = porciento($totalW, $declaDesierCantiW);

$totalPocienW = sumas($porceadjuCantiW , $porcenoAdjuCantiW , $porcedocumenEnviCantiW , $porcecerradoEntiCantiW , $porcependienAdjCantiW ,$porcedeclaDesierCantiW);

//VALOR DE LA OFERTA
$valorOferADGW = totalValorOferta($año,$whosale,$adjudicado);
$valorOferNOADGW = totalValorOferta($año,$whosale,$noAdjudicado);
$valorOferDOENGW = totalValorOferta($año,$whosale,$documentacionEnvi);
$valorOferCRREGW = totalValorOferta($año,$whosale,$cerradaEntidad);
$valorOferPADGW = totalValorOferta($año,$whosale,$pendienteAdjudicacion);
$valorOferDDGW = totalValorOferta($año,$whosale,$declaDesierto);

$totalVloferW = totalOferta($año,$whosale);
$porcentajeW1 = porciento2($totalVloferW,$valorOferADGW);
$porcentajeW2 = porciento2($totalVloferW,$valorOferNOADGW);
$porcentajeW3 = porciento2($totalVloferW,$valorOferDOENGW);
$porcentajeW4 = porciento2($totalVloferW,$valorOferCRREGW);
$porcentajeW5 = porciento2($totalVloferW,$valorOferPADGW);
$porcentajeW6 = porciento2($totalVloferW,$valorOferDDGW);

$totalPorcenValW = sumas($porcentajeW1,$porcentajeW2,$porcentajeW3,$porcentajeW4,$porcentajeW5,$porcentajeW6);

//MNSUALIDAD
$mensualidadW1 = mensualidad($año,$whosale,$adjudicado);
$mensualidadW2 = mensualidad($año,$whosale,$noAdjudicado);
$mensualidadW3 = mensualidad($año,$whosale,$documentacionEnvi);
$mensualidadW4 = mensualidad($año,$whosale,$cerradaEntidad);
$mensualidadW5 = mensualidad($año,$whosale,$pendienteAdjudicacion);
$mensualidadW6 = mensualidad($año,$whosale,$declaDesierto);
$totalMensualidadW =  totalMensualidad($año,$whosale);

$cantidadtotalW=cantidad($año,$whosale,$adjudicado);
$proponenteW = proponentes($año,$whosale,$cantidadtotalW,$adjudicado);
//No adjudicado
$cantidadtotalNoW=cantidad($año,$whosale,$noAdjudicado);
$empganaW = empgana($año,$whosale,$cantidadtotalNoW,$noAdjudicado);
$principalesNAW = principalesAN($año,$whosale,$noAdjudicado);
//Pendientes de adjudicación
$cantidadtotalPenW=cantidad($año,$whosale,$pendienteAdjudicacion);
$entidadPenW = penAdju($año,$whosale,$cantidadtotalPenW,$pendienteAdjudicacion);
//NoParticipamos
$entidadNoPaW = principalesAD3($año,$whosale,$noParticipamos);
?>
<!-- SECTOR Whosale ---------------------------------------------------------------------------------------------- -->
<div id="menu4" class="container tab-pane fade"><br>
  <h5>Sector Whosale - <?php echo $año ?></h5><br>
  <div class="row">
   <div class="col-md-6" id="graficosA5" style="width: 400px; height: 600px; margin: 0 auto"></div>
   <div class="col-md-6" >
    <b><label>Hay (<?php echo $suspendidoW ?>) procesos suspendidos</label></b>
    <table class ="table" id="tablex">    
      <thead class="thead-light">
        <tr>
          <th>Principales clientes adjudicados</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($adjudicadosW as $keyW) {?> 
          <tr>
            <td  bgcolor="EAEAEA"><?php echo $keyW['entidad']; ?></td>
          <?php } ?>
        </tbody>    
      </table>
      <table class ="table" >    
        <thead class="thead-light">
          <tr>
            <th>Resultado</th>
            <th>Cantidad</th>
            <th>%</th>
            <th>Vr.oferta</th>
            <th>%</th>
            <th>Vr.mensualidad</th>
          </tr>
        </thead>
        <tbody> 
          <tr>
            <td  bgcolor="EAEAEA">Perdido</td>
            <td  bgcolor="EAEAEA"><?php echo $noAdjuCantiW; ?></td>
            <td  bgcolor="EAEAEA"><?php echo substr($porcenoAdjuCantiW,0,4); ?>%</td>
            <td  bgcolor="EAEAEA"><?php echo $valorOferNOADGW; ?></td>
            <td  bgcolor="EAEAEA"><?php echo substr($porcentajeW2, 0,4); ?>%</td>
            <td  bgcolor="EAEAEA"><?php echo $mensualidadW2; ?></td>
          </tr>
          <tr>
            <td  bgcolor="EAEAEA">Adjudicado</td>
            <td  bgcolor="EAEAEA"><?php echo $adjuCantiW; ?></td>
            <td  bgcolor="EAEAEA"><?php echo substr($porceadjuCantiW,0,4); ?>%</td>
            <td  bgcolor="EAEAEA"><?php echo $valorOferADGW; ?></td>
            <td  bgcolor="EAEAEA"><?php echo substr($porcentajeW1, 0,4); ?>%</td>
            <td  bgcolor="EAEAEA"><?php echo $mensualidadW1; ?></td>
          </tr>
          <tr>
            <td  bgcolor="EAEAEA">Documento enviado</td>
            <td  bgcolor="EAEAEA"><?php echo $documenEnviCantiW; ?></td>
            <td  bgcolor="EAEAEA"><?php echo substr($porcedocumenEnviCantiW,0,4); ?>%</td>
            <td  bgcolor="EAEAEA"><?php echo $valorOferDOENGW; ?></td>
            <td  bgcolor="EAEAEA"><?php echo substr($porcentajeW3, 0,4); ?>%</td>
            <td  bgcolor="EAEAEA"><?php echo $mensualidadW3; ?></td>
          </tr>
          <tr>
            <td  bgcolor="EAEAEA">Cerrado por la entidad</td>
            <td  bgcolor="EAEAEA"><?php echo $cerradoEntiCantiW; ?></td>
            <td  bgcolor="EAEAEA"><?php echo substr($porcecerradoEntiCantiW,0,4); ?>%</td>
            <td  bgcolor="EAEAEA"><?php echo $valorOferCRREGW; ?></td>
            <td  bgcolor="EAEAEA"><?php echo substr($porcentajeW4, 0,4); ?>%</td>
            <td  bgcolor="EAEAEA"><?php echo $mensualidadW4; ?></td>
          </tr>
          <tr>
            <td  bgcolor="EAEAEA">Pendiente de adjudicación</td>
            <td  bgcolor="EAEAEA"><?php echo $pendienAdjCantiW; ?></td>
            <td  bgcolor="EAEAEA"><?php echo substr($porcependienAdjCantiW,0,4); ?>%</td>
            <td  bgcolor="EAEAEA"><?php echo $valorOferPADGW; ?></td>
            <td  bgcolor="EAEAEA"><?php echo substr($porcentajeW5, 0,4); ?>%</td>
            <td  bgcolor="EAEAEA"><?php echo $mensualidadW5; ?></td>
          </tr>
          <tr>
            <td  bgcolor="EAEAEA">Declarado desierto</td>
            <td  bgcolor="EAEAEA"><?php echo $declaDesierCantiW; ?></td>
            <td  bgcolor="EAEAEA"><?php echo substr($porcedeclaDesierCantiW,0,4);?>%</td>
            <td  bgcolor="EAEAEA"><?php echo $valorOferDDGW; ?></td>
            <td  bgcolor="EAEAEA"><?php echo substr($porcentajeW6, 0,4); ?>%</td>
            <td  bgcolor="EAEAEA"><?php echo $mensualidadW6; ?></td>
          </tr>
        </tbody> 
        <thead class="table-info">
          <tr>
            <th>Total general</th>
            <th><?php echo $totalW ?></th>
            <th><?php echo $totalPocienW?>%</th>
            <th>$<?php echo $totalVloferW?></th>
            <th><?php echo $totalPorcenValW; ?>%</th>
            <th><?php echo $totalMensualidadW?></th>
          </tr>
        </thead>   
      </table>
    </div>
    <div class="col-md-6" style="margin: 1%;">
      <table class ="table" id="tablex">   
        <thead class="thead-light">
          <h6>Proponetes - Procesos adjudicados</h6>
          <tr>
            <th>Empresa ganadora del proceso</th>
            <th>Cantidad</th>
            <th>%</th>
            <th>Vr.Mensualidad</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $todoW1 = 0;
          $vltotalMenW1 = 0;
          foreach ($proponenteW as $keyW1) {
           $todoW1 += substr($keyW1['porcentaje'],0,4);
           $vltotalMenW1 += $keyW1['mensualidad'];
           ?>       
           <tr>
            <td  bgcolor="EAEAEA"><?php echo $keyW1['proponente']; ?></td>
            <td  bgcolor="EAEAEA"><?php echo $keyW1['cantidad']; ?></td>
            <td  bgcolor="EAEAEA"><?php echo substr($keyW1['porcentaje'],0,4)?>%</td>
            <td  bgcolor="EAEAEA"><?php echo number_format($keyW1['mensualidad']) ?></td>
          </tr>
        <?php }?>
      </tbody>
      <thead class="table-info">
        <tr>
          <th>Total general</th>
          <th><?php echo $cantidadtotalW?></th>
          <th><?php echo $todoW1?>%</th>
          <th><?php echo number_format($vltotalMenW1)?></th>
        </tr>
      </thead>    
    </table>
  </div>
  <div class="col-md-5" style="margin: 1%;">
    <table class ="table" id="tablex">    
      <thead class="thead-light">
        <h6>Pendientes de adjudicación</h6>
        <tr>
          <th>Cliente</th>
          <th>Cantidad</th>
          <th>%</th>
          <th>Vr.Mensualidad</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $todoW2 = 0;
        $vltotalMenW2 = 0;
        foreach ($entidadPenW as $keyW2) {
         $todoW2 += substr($keyW2['porcentaje'],0,4);
         $vltotalMenW2 += $keyW2['mensualidad'];
         ?>       
         <tr>
          <td  bgcolor="EAEAEA"><?php echo $keyW2['entidad']; ?></td>
          <td  bgcolor="EAEAEA"><?php echo $keyW2['cantidad']; ?></td>
          <td  bgcolor="EAEAEA"><?php echo substr($keyW2['porcentaje'],0,4)?>%</td>
          <td  bgcolor="EAEAEA"><?php echo number_format($keyW2['mensualidad']) ?></td>
        </tr>
      <?php }?>
    </tbody>
    <thead class="table-info">
      <tr>
        <th>Total general</th>
        <th><?php echo $cantidadtotalPenW ?></th>
        <th><?php echo $todoW2?>%</th>
        <th><?php echo  number_format($vltotalMenW2)?></th>
      </tr>
    </thead>    
  </table>
</div>
<div class="col-md-6" style="margin: 1%;">
  <table class ="table" id="tablex">    
    <thead class="thead-light">
      <h6>Perdidos</h6>
      <tr>
        <th>Empresa ganadora del proceso</th>
        <th>Causal</th>
        <th>Cantidad</th>
        <th>%</th>
        <th>Vr.Mensualidad</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $todoW3 = 0;
      $vltotalMenW3 = 0;
      foreach ($empganaW as $keyW3) {
       $todoW3 += substr($keyW3['porcentaje'],0,4);
       $vltotalMenW3 += $keyW3['mensualidad'];
       ?>       
       <tr>
        <td  bgcolor="EAEAEA"><?php echo $keyW3['proponente']; ?></td>
        <td  bgcolor="EAEAEA"><?php echo $keyW3['causal']; ?></td>
        <td  bgcolor="EAEAEA"><?php echo $keyW3['cantidad']; ?></td>
        <td  bgcolor="EAEAEA"><?php echo substr($keyW3['porcentaje'],0,4)?>%</td>
        <td  bgcolor="EAEAEA"><?php echo number_format($keyW3['mensualidad']) ?></td>
      </tr>
    <?php }?>
  </tbody>
  <thead class="table-info">
    <tr>
      <th>Total general</th>
      <th></th>
      <th><?php echo $cantidadtotalNoW ?></th>
      <th><?php echo $todoW3?>%</th>
      <th><?php echo  number_format($vltotalMenW3)?></th>
    </tr>
  </thead>    
</table>
</div>
<div class="col-md-5" style="margin: 1%;">
  <table class ="table" id="tablex">  
    <h6>No participamos</h6>  
    <thead class="thead-light">
      <tr>
        <th>Principales clientes no participamos</th>
      </tr>
    </thead>
    <tbody>
      <?php
      foreach ($entidadNoPaW as $keyW4) { ?>       
       <tr>
        <td  bgcolor="EAEAEA"><?php echo $keyW4['entidad']; ?></td>
      </tr>
    <?php }?>
  </tbody>  
</table>
</div>
<div class="col-md-5" style="margin: 1%;">
  <table class ="table" id="tablex">    
    <thead class="thead-light">
      <h6>Perdidos</h6>
      <tr>
        <th>Principales clientes Perdidos</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($principalesNAW as $keyW5) {?> 
        <tr>
          <td  bgcolor="EAEAEA"><?php echo $keyW5['entidad']; ?></td>
        <?php } ?>
      </tbody>    
    </table>
  </div>
</div>
</div>

<?php 
 $enero = habilitantes('01',$año);
$febrero = habilitantes('02',$año);
$marzo = habilitantes('03',$año);
$abril = habilitantes('04',$año);
$mayo = habilitantes('05',$año);
$junio = habilitantes('06',$año);
$julio = habilitantes('07',$año);
$agosto = habilitantes('08',$año);
$septiembre = habilitantes('09',$año);
$octubre = habilitantes('10',$año);
$noviembre = habilitantes('11',$año);
$diciembre = habilitantes('12',$año);


?>
<!-- Habilitantes -->
<div id="menu5" class="container tab-pane fade"><br>
  <h5>Habilitantes - <?php echo $año ?></h5><br>
  <div class="row">
   <div class="col-md-12" id="graficosA6" style="width: 1000px; height: 400px; margin: 0 auto"></div>
 </div>
</div>

<script type="text/javascript">
//TODO---------------------------------------------------------------------------------------
Highcharts.chart('graficosT1', {
  chart: {
    type: 'column'
  },
  title: {
    text: ''
  },
  xAxis: {
    categories: [
    '<?php echo $añoAnterior ?>',
    '<?php echo $año ?>'
    ],
    crosshair: true
  },
  yAxis: {
    min: 0,
    title: {
      text: 'Cantidad'
    }
  },
  tooltip: {
    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
    '<td style="padding:0"><b>{point.y}</b></td></tr>',
    footerFormat: '</table>',
    shared: true,
    useHTML: true
  },
  plotOptions: {
    column: {
      pointPadding: 0.2,
      borderWidth: 0
    }
  },
  series: [{
    name: 'Prime',
    data: [<?php echo $Prime1;?>,<?php echo $Prime;?>]
  }, {
    name: 'Large',
    data: [<?php echo $Large1;?>,<?php echo $Large;?>]
  }, {
    name: 'Govermment',
    data: [<?php echo $Govermment1;?>,<?php echo $Govermment;?>]
  }, {
    name: 'Whosale',
    data: [<?php echo $Whosale1;?><?php echo $Whosale;?>]
  }, {
    name: 'Pymes',
    data: [<?php echo $Pymes1;?>,<?php echo $Pymes;?>]
  }]
});

 //Sector Govermment-------------------------------------------------------------------------
 Highcharts.chart('graficosA1', {
  chart: {
    type: 'column'
  },
  title: {
    text: ''
  },
  xAxis: {
    categories: [
    '<?php echo $añoAnterior ?>',
    '<?php echo $año ?>'
    ],
    crosshair: true
  },
  yAxis: {
    min: 0,
    title: {
      text: 'Cantidad'
    }
  },
  tooltip: {
    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
    '<td style="padding:0"><b>{point.y}</b></td></tr>',
    footerFormat: '</table>',
    shared: true,
    useHTML: true
  },
  plotOptions: {
    column: {
      pointPadding: 0.2,
      borderWidth: 0
    }
  },
  series: [{
    name: 'Documentación enviada',
    data: [<?php echo $documentacionEnviadaGA;?>,<?php echo $documentacionEnviadaG;?>]

  }, {
    name: 'No participamos',
    data: [<?php echo $noParticipamosGA;?>,<?php echo $noParticipamosG;?>]

  }, {
    name: 'Oferta presentada',
    data: [<?php echo $ofertaPresentadaGA;?>,<?php echo $noParticipamosG;?>]

  }, {
    name: 'En proceso',
    data: [<?php echo $enProcesoGA;?>,<?php echo $enProcesoG;?>]

  }, {
    name: 'Oferta presentada - Estudio de mercado',
    data: [<?php echo $estudioMercadoGA;?>,<?php echo $estudioMercadoG;?>]
  }]
});

  //Sector Prime----------------------------------------------------------------------------------
  Highcharts.chart('graficosA2', {
    chart: {
      type: 'column'
    },
    title: {
      text: ''
    },
    xAxis: {
      categories: [
      '<?php echo $añoAnterior ?>',
      '<?php echo $año ?>'
      ],
      crosshair: true
    },
    yAxis: {
      min: 0,
      title: {
        text: 'Cantidad'
      }
    },
    tooltip: {
      headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
      pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
      '<td style="padding:0"><b>{point.y}</b></td></tr>',
      footerFormat: '</table>',
      shared: true,
      useHTML: true
    },
    plotOptions: {
      column: {
        pointPadding: 0.2,
        borderWidth: 0
      }
    },
    series: [{
      name: 'Documentación enviada',
      data: [<?php echo $documentacionEnviadaPA;?>,<?php echo $documentacionEnviadaP;?>]

    }, {
      name: 'No participamos',
      data: [<?php echo $noParticipamosPA;?>,<?php echo $noParticipamosP;?>]

    }, {
      name: 'Oferta presentada',
      data: [<?php echo $ofertaPresentadaPA;?>,<?php echo $noParticipamosP;?>]

    }, {
      name: 'En proceso',
      data: [<?php echo $enProcesoPA;?>,<?php echo $enProcesoP;?>]

    }, {
      name: 'Oferta presentada - Estudio de mercado',
      data: [<?php echo $estudioMercadoPA;?>,<?php echo $estudioMercadoP;?>]
    }]
  });

    //Sector Large
    Highcharts.chart('graficosA3', {
      chart: {
        type: 'column'
      },
      title: {
        text: ''
      },
      xAxis: {
        categories: [
        '<?php echo $añoAnterior ?>',
        '<?php echo $año ?>'
        ],
        crosshair: true
      },
      yAxis: {
        min: 0,
        title: {
          text: 'Cantidad'
        }
      },
      tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
        '<td style="padding:0"><b>{point.y}</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
      },
      plotOptions: {
        column: {
          pointPadding: 0.2,
          borderWidth: 0
        }
      },
      series: [{
        name: 'Documentación enviada',
        data: [<?php echo $documentacionEnviadaLA;?>,<?php echo $documentacionEnviadaL;?>]

      }, {
        name: 'No participamos',
        data: [<?php echo $noParticipamosLA;?>,<?php echo $noParticipamosL;?>]

      }, {
        name: 'Oferta presentada',
        data: [<?php echo $ofertaPresentadaLA;?>,<?php echo $noParticipamosL;?>]

      }, {
        name: 'En proceso',
        data: [<?php echo $enProcesoLA;?>,<?php echo $enProcesoL;?>]

      }, {
        name: 'Oferta presentada - Estudio de mercado',
        data: [<?php echo $estudioMercadoLA;?>,<?php echo $estudioMercadoL;?>]
      }]
    });

        //Sector Pymes
        Highcharts.chart('graficosA4', {
          chart: {
            type: 'column'
          },
          title: {
            text: ''
          },
          xAxis: {
            categories: [
            '<?php echo $añoAnterior ?>',
            '<?php echo $año ?>'
            ],
            crosshair: true
          },
          yAxis: {
            min: 0,
            title: {
              text: 'Cantidad'
            }
          },
          tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y}</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
          },
          plotOptions: {
            column: {
              pointPadding: 0.2,
              borderWidth: 0
            }
          },
          series: [{
            name: 'Documentación enviada',
            data: [<?php echo $documentacionEnviadaEA;?>,<?php echo $documentacionEnviadaE;?>]

          }, {
            name: 'No participamos',
            data: [<?php echo $noParticipamosEA;?>,<?php echo $noParticipamosE;?>]

          }, {
            name: 'Oferta presentada',
            data: [<?php echo $ofertaPresentadaEA;?>,<?php echo $ofertaPresentadaE;?>]

          }, {
            name: 'En proceso',
            data: [<?php echo $enProcesoEA;?>,<?php echo $enProcesoE;?>]

          }, {
            name: 'Oferta presentada - Estudio de mercado',
            data: [<?php echo $estudioMercadoEA;?>,<?php echo $estudioMercadoE;?>]
          }]
        });

                //Sector Whosale
                Highcharts.chart('graficosA5', {
                  chart: {
                    type: 'column'
                  },
                  title: {
                    text: ''
                  },
                  xAxis: {
                    categories: [
                    '<?php echo $añoAnterior ?>',
                    '<?php echo $año ?>'
                    ],
                    crosshair: true
                  },
                  yAxis: {
                    min: 0,
                    title: {
                      text: 'Cantidad'
                    }
                  },
                  tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y}</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                  },
                  plotOptions: {
                    column: {
                      pointPadding: 0.2,
                      borderWidth: 0
                    }
                  },
                  series: [{
                    name: 'Documentación enviada',
                    data: [<?php echo $documentacionEnviadaWA;?>,<?php echo $documentacionEnviadaW;?>]

                  }, {
                    name: 'No participamos',
                    data: [<?php echo $noParticipamosWA;?>,<?php echo $noParticipamosW;?>]

                  }, {
                    name: 'Oferta presentada',
                    data: [<?php echo $ofertaPresentadaWA;?>,<?php echo $noParticipamosW;?>]

                  }, {
                    name: 'En proceso',
                    data: [<?php echo $enProcesoWA;?>,<?php echo $enProcesoW;?>]

                  }, {
                    name: 'Oferta presentada - Estudio de mercado',
                    data: [<?php echo $estudioMercadoWA;?>,<?php echo $estudioMercadoW;?>]
                  }]
                });

//Habilitantes
Highcharts.chart('graficosA6', {
  chart: {
    type: 'column'
  },
  title: {
    text: ''
  },
  xAxis: {
    categories: [
    'Enero',
    'Febrero',
    'Marzo',
    'Abril',
    'Mayo',
    'Junio',
    'Julio',
    'Agosto',
    'Septiembre',
    'Octubre',
    'Noviembre',
    'Diciembre',
    ],
    crosshair: true
  },
  yAxis: {
    min: 0,
    title: {
      text: 'Promedio'
    }
  },
  tooltip: {
    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
    '<td style="padding:0"><b>{point.y}</b></td></tr>',
    footerFormat: '</table>',
    shared: true,
    useHTML: true
  },
  plotOptions: {
    column: {
      pointPadding: 0.2,
      borderWidth: 0
    }
  },
  series: [{
    name: '',
    data: [<?php echo $enero;?>,<?php echo $febrero;?>,<?php echo $marzo;?>,<?php echo $abril;?>,<?php echo $mayo;?>,<?php echo $junio;?>,<?php echo $julio;?>,<?php echo $agosto;?>,<?php echo $septiembre;?>,<?php echo $octubre;?>,<?php echo $noviembre;?>,<?php echo $diciembre;?>]
  }]
});

$(window).load(function() {
  $(".loader").fadeOut("slow");
  $(".loader2").fadeOut("slow");
});         
</script>
<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>