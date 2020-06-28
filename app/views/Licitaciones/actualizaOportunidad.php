<?php
session_start();
if (isset($_SESSION['id_login'])){ 
}else{
  header('location: ../../index.php');
}
if ($_SESSION['rol']==='Usuario' || $_SESSION['rol'] === 'Asignar' || $_SESSION['rol']==='CCE') {
  header("Location: menuAdministrador.php");  
}
include("../clases/clases_funciones.php");
$pdo = new conexion;
$id = $_GET["id"];
$oportunidades = $pdo->_conexion();
$sentencia = $oportunidades->prepare("SELECT * FROM oportunidades WHERE id = ?;");
$sentencia->execute([$id]);
$objeto = $sentencia->fetch(PDO::FETCH_OBJ);
?>
<meta charset="UTF-8">
<title>Licitaciones</title>
<link rel="icon" type="../assets/imagenes/jpg" href="../assets/imagenes/LOGO.ico"/>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" type="text/css" href="../estilos/estiloPerfiles2.css">
<style type="text/css">
  #suggesstion-box{float:left;list-style:none;margin-top:-3px;padding:0;width:585px;position: absolute;}
  #suggesstion-box li{padding: 1px; background: #f0f0f0; border-bottom: #bbb9b9 1px solid;}
  #suggesstion-box li:hover{background:#405c8c;cursor: pointer;}
</style>
<div id="wrapper" class="animate">
  <nav class="navbar header-top fixed-top navbar-expand-lg navbar-dark bg-dark">
    <span class="navbar-toggler-icon leftmenutrigger"></span>
    <a href="http://intranet.tigoune.com.co/"><img src="../assets/imagenes/LOGO.png" style="margin-left: 15%; width: 100px; height: 67px;"></a>
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
        $total = $oportunidades->query("SELECT COUNT(*) FROM login where recuperar = '1'");
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
    <<?php
     include_once "lateral/lateralAsignar.php"
  ?>

</div>
<?php } if ($_SESSION['rol']==='Usuario') {?>
  <div class="collapse navbar-collapse" id="navbarText">
  <?php
       include_once "lateral/lateralUsuario.php"
    ?>
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
<?php }elseif ($_SESSION['rol']==='Govermment') {?>
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
<?php }elseif ($_SESSION['rol']==='Corporativo') {?>
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
<?php }elseif ($_SESSION['rol']==='ConsultorVP') {?>
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
<?php }elseif ($_SESSION['rol']==='Pymes') {?>
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
<?php }elseif ($_SESSION['rol']==='Whosale') {?>
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
<div class="col-12 col-md-12">
	<div class="container-fluid">
		<form  action="../administrador/function/editarOportunidad.php" method="post"  autocomplete="off">
			<div class="row justify-content center">

				<div class="col-md-12 m-3 mb-3">
					<center><h2>Actualizar Oportunidad</h2></center>
				</div>
        <input type="hidden" name="id" value="<?php echo $objeto->id; ?>">

        <!-- Primera columna -->

        <div class="col-md-4">
         <div class="form-group">
          <label for="fCreacion"> Fecha </label>
          <input value="<?php echo $objeto->fCreacion ?>" type="date" name="fCreacion" tabindex="1" class="form-control" required> 
        </div>
        <div class="form-group">
          <label for="Objeto"> Objeto	</label><br>
          <textarea name="Objeto" rows="2" tabindex="4" class="form-control"><?php echo $objeto->Objeto ?></textarea>
        </div>     
        <div class="form-group">
          <label for="fPublicacion"> Fecha de publicación </label>
          <input value="<?php echo $objeto->fPublicacion ?>" type="date" name="fPublicacion" tabindex="7" class="form-control"required> 
        </div>
        <div class="form-group">
          <label for="Consultor"> Consultor </label>
          <input value="<?php echo $objeto->Consultor ?>" type="text" name="Consultor" id="consul" class="form-control" required> 
        </div>
        <div class="form-group">
          <label for="estado"> Estado </label>
          <select name="estado" tabindex="10" class="form-control" required>
            <option value="<?php echo $objeto->estado ?>"><?php echo $objeto->estado ?></option>
            <option value="Pendiente">Pendiente</option>
            <option value="No participamos">No participamos</option>
            <option value="En gestión comercial">En gestión comercial</option>
            <option value="Participamos">Participamos</option>      
          </select>
        </div>
      </div>

      <!-- Segunda columna -->

      <div class="col-md-4">
        <div class="form-group">
          <label for="nomEntidad"> Entidad </label>
          <input value="<?php echo $objeto->nomEntidad ?>" type="text" name="nomEntidad" tabindex="2" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="Presu"> Presupuesto </label>
          <input value="<?php echo $objeto->Presu ?>" type="" name="Presu" class="form-control" tabindex="5" id="Presupuesto" requiered>
        </div>
        <div class="form-group" style="margin-top: 42">
          <label for="fcierre"> Fecha Cierre </label>
          <input value="<?php echo $objeto->fcierre ?>" type="date" name="fcierre" tabindex="7" class="form-control" required> 
        </div>
        <div class="form-group">
          <label for="first-name"> Sector </label>       
          <?php
          $idConcepto = $objeto->nombre_concepto;
          $sect  =   $pdo->_comboboxdinamic_camposO("sect","nombre_concepto",$id,"nombre_concepto",$idConcepto);echo $sect;?>  
        </div>
        <div class="form-group">
          <label for="MYSE"> Myse </label>
          <input value="<?php echo $objeto->MYSE ?>" type="number" name="MYSE" tabindex="11" class="form-control" required> 
        </div>	
      </div>

      <!-- Tercera columna -->

      <div class="col-md-4">
        <div class="form-group">
          <label for="numContrato">Número de contrato </label>
          <input value="<?php echo $objeto->numContrato ?>" type="text" name="numContrato" tabindex="3" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="ubicacion"> Ubicación </label>
          <input value="<?php echo $objeto->ubicacion ?>" type="text" name="ubicacion" tabindex="6" class="form-control" required>  
        </div>
        <div class="form-group" style="margin-top: 42">
          <label for="ejecutivo"> Ejecutivo </label>
          <input value="<?php echo $objeto->ejecutivo ?>" type="text" name="ejecutivo" tabindex="8" id="ejecu" class="form-control" required> 
          <div id="suggesstion-box" style="margin: 1"></div>
        </div>
        <div class="form-group">
          <label for="gerente"> Gerente </label>
          <input value="<?php echo $objeto->gerente ?>" type="text" name="gerente" tabindex="9" class="form-control" required>    
        </div>
        <div class="form-group">
          <label for="link"> Link </label>
          <input value="<?php echo $objeto->link ?>" type="text" name="link" tabindex="12" class="form-control" required>
        </div>
      </div>

      <div class="col-md-12">
        <div class="form-group">
          <label for="obser"> Observaciones </label>
          <textarea name="obser" class="form-control" cols="2" tabindex="13" required><?php echo $objeto->obser ?></textarea>
        </div>
      </div>


      <div id="registerLE" class="col-md-12">
       <center><input id="button" class="btn btn-outline-primary" type="submit" value="Guardar"></center>
     </div>
   </div>
 </form>
</div>
</div>
</div>

<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
<script type="text/javascript">
	$(document).ready(function () {
    $('#nombre_concepto').css('pointer-events','none');
    $('#consul').css('pointer-events','none');
  });
	$(document).ready(function(){
   $("#button").click(function(){
     $("#button").prop("disabled", false);
   });
 });
	$("#Presupuesto").on({
		"focus": function(event) {
			$(event.target).select();
		},
		"keyup": function(event) {
			$(event.target).val(function(index, value) {
				return value.replace(/\D/g, "")
				.replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",");
			});
		}
	});
  $(document).ready(function(){
    $('#ejecu').on("keyup input", function(){
      var filtro = $('#ejecu').val();
      $.ajax({
        type: "POST",
        url: "function/relacionEjecutivos.php",
        data: {'filtro':filtro},
        beforeSend: function(){
          $("#search-box").css("background","#FFF url(assets/imagenes/LoaderIcon.gif) no-repeat 165px");
        },
        success: function(data){
          if (filtro === "") {
            $("#suggesstion-box").hide();
            $("#suggesstion-box").html('');
            $("#search-box").css("background","#FFF");
          }else{
            $("#suggesstion-box").show();
            $("#suggesstion-box").html(data);
            $("#search-box").css("background","#FFF");
          }
        }
      });
    })
  });
  function selectCountry(ejecutivo,consultor,regional,sector) {
    $('#nombre_reg').val(regional);
    $('#ejecu').val(ejecutivo);
    $('#consul').val(consultor);
    $('#nombre_concepto').val(sector);
    $("#suggesstion-box").hide();
  }
</script>