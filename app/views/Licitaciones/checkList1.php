<?php
session_start();
if (isset($_SESSION['id_login'])){ 
}else{
  header('location: ../../index.php');
}
include("../clases/clases_funciones.php");
$pdo = new conexion;
$id = $_GET["id"];
$seguimiento = $pdo->_conexion();
$sentencia = $seguimiento->prepare("SELECT SG.id,SG.myse,ST.nombre_concepto,SG.nit,SG.entidad,TP.nombre_tiproces,SG.numero,ES.nombre_estado,sp.nombre_stadpro,SG.fhcierre,SG.hopre,SG.prese,SG.Presu,SG.fhobs,SG.Mobs,SG.Hprese,SG.mc,SG.Mprese,SG.rfcarma,RG.nombre_reg,SG.ejecu,AB.nombre_aboga,SG.product,SG.objcontra,SG.cerpre,
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
  LEFT OUTER JOIN seg SEG ON SG.nombre_seg=SEG.id where SG.id = $id
  ");
$sentencia->execute([$id]);
$objeto = $sentencia->fetch(PDO::FETCH_OBJ);

$sentencia1 = $seguimiento->prepare("SELECT RJ.id,REJ.entregable,RJ.firmarl,RJ.requisitos,RJ.observaciones,RJ.myse
  FROM requejudiricos RJ
  LEFT OUTER JOIN requerimientosj REJ ON RJ.entregable=REJ.id
  ");
$documents = $seguimiento->query("SELECT * FROM requerimientosj");
$documents2 = $seguimiento->query("SELECT * FROM certificadosf");
?>
<meta charset="UTF-8">
<title>Licitaciones</title>
<link rel="icon" type="../assets/imagenes/jpg" href="../assets/imagenes/LOGO.ico"/>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<LINK REL=StyleSheet HREF="../estilos/estiloPerfiles.css" TYPE="text/css" MEDIA=screen>
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
<?php }elseif ($_SESSION['rol'] ==='Govermment' || $_SESSION['rol'] === 'Corporativo' || $_SESSION['rol'] ==='ConsultorVP' || $_SESSION['rol']==='Pymes' || $_SESSION['rol']==='Whosale') {?>
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
<style type="text/css">
  #todo{
    font-size: 12PX;
  }
  #T{
    font-size: 12PX;

  }
</style>
<div class="container-fluid">
  <form method="GET" id="todo">
    <div class="row justify-content center">
      <div class="container-fluid" name="header" >
        <div class="row" style="border: #000000 2px solid">
          <div class="col-md-2" style="margin-top: 0.5%; margin-bottom: 1%;">
           <center><img src="../assets/imagenes/Tigo.png"></center> 
         </div>
         <div class="col-md-7" style="margin-top: 0.5%; margin-bottom: 1%;">
          <center><h3>Gerencia Back Oficce y Soporte a Ventas</h3></center>
          <center><h5>VP. de Negocios, Empresas Y Gobierno</h5></center>
          <center><h7>Requisitos Habilitantes y entregables</h7></center>
        </div>
        <?php
        $llego = false;
        if (!empty($_GET["lugar"])) {
         $lugar = $_GET["lugar"];
         $tabla = $_GET['opcion'];
         $dato = $_GET['dato'];
         $llego = true;
       }else{
        $llego = false;
      }
      if ($llego === true) {?>
        <div class="col-md-3 mt-3">
          <a class="btn btn-outline-primary" href="actualizarLicitacion.php?id=<?php echo $id ?>&&opcion=<?php echo $tabla;?>&&lugar=<?php echo $lugar;?>&&dato=<?php echo $dato ?>"> Regresar <i class="fas fa-share"></i></a>

          <a class="btn btn-outline-primary" href="pdfCheckList.php?id=<?php echo $_GET['id'] ?>" target="_blank"> Imprimir <i class="fas fa-file-pdf"></i></a>
        </div>
      <?php }else{?>
        <div class="col-md-3 mt-3">
          <a class="btn btn-outline-primary" href="actualizarLicitacion.php?id=<?php echo $id ?>"> Regresar <i class="fas fa-share"></i></a>

          <a class="btn btn-outline-primary" href="pdfCheckList.php?id=<?php echo $_GET['id'] ?>" target="_blank"> Imprimir <i class="fas fa-file-pdf"></i></a>
        </div>
      <?php }
      ?>
    </div>
  </div>
  <div class="container-fluid" name="bodyL" style="margin-top: 0.1%;">
    <div class="row"  style="border-bottom: #000000 2px solid; border-right: #000000 2px solid;  border-left: #000000 2px solid;">
      <div class="col-md-1" style="border-right: #000000 2px solid">
        <label><b> Cliente: </b></label>
      </div>
      <div class="col-md-3" style="border-right: #000000 2px solid">
        <label type="text" name="cliente" value=" "><?php echo $objeto->entidad ?></label>
      </div>
      <div class="col-md-1" style="border-right: #000000 2px solid">
        <label><b> Proceso Numero: </b></label>
      </div>
      <div class="col-md-3" style="border-right: #000000 2px solid">
        <label type="text" name="cliente" value=" "><?php echo $objeto->numero ?></label>
      </div>
      <div class="col-md-1" style="border-right: #000000 2px solid">
        <label><b> MYSE: </b></label>
      </div>
      <div class="col-md-3">
        <label type="text" name="cliente" value=" "><?php echo $objeto->myse ?></label>
      </div>
    </div>
    <div class="row"  style="border-bottom: #000000 2px solid; border-right: #000000 2px solid;  border-left: #000000 2px solid;">
      <div class="col-md-4" style="border-right: #000000 2px solid">
        <label><b> Fecha de cierre: </b></label>
      </div>
      <div class="col-md-3" style="border-right: #000000 2px solid">
        <label type="text" name="cliente" value=" "><?php echo $objeto->fhcierre ?></label>
      </div>
      <div class="col-md-1" style="border-right: #000000 2px solid">
        <label><b> Hora de cierre: </b></label>
      </div>
      <div class="col-md-4" style="border-right: #000000 1px solid">
        <label type="text" name="cliente" value=" "><?php echo $objeto->prese ?></label>
      </div>
    </div>
    <style type="text/css">
      #traerTabla{
        font-size: 12PX;
      }
    </style>
    <div class="row"  id="tabla" style="margin-top: 2%;">
      <table class ="table" id="traerTabla" >  
        <thead class="thead-light" >
          <tr>
            <th >Documento Y/O Entregable</th>
            <th >Firma RL</th>
            <th >Requisitos</th>
            <th >Observaciones/Estado</th>
          </tr>
        </thead>
        <tbody id="tbody">
        </tbody>
        <tbody id="tbody2">
        </tbody>
        <tbody id="tbody3">
        </tbody>
        <tbody id="tbody4">
        </tbody>
        <tbody id="tbody5">
        </tbody>
      </table>
    </div>
    <input type="text" name="myse" id="myse" hidden="hidden" value="<?php echo $objeto->myse; ?>">
    <input type="text" name="myseF" id="myseF" hidden="hidden" value="<?php echo $objeto->myse; ?>">
    <input type="text" name="myseCT" id="myseCT" hidden="hidden" value="<?php echo $objeto->myse; ?>">
    <input type="text" name="myseFA" id="myseFA" hidden="hidden" value="<?php echo $objeto->myse; ?>">
    <input type="text" name="myseE" id="myseE" hidden="hidden" value="<?php echo $objeto->myse; ?>">
  </div>
</div>
</form>
</div>
</div>
</body>

<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
<script type="text/javascript">

 $(document).ready(function () {
  $('.leftmenutrigger').on('click', function (e) {
    $('.side-nav').toggleClass("open");
    $('#wrapper').toggleClass("open");
    e.preventDefault();
  });
});

// AJAX Requerimientos Juridicos 
consultarRequeJ();
function consultarRequeJ() {

  var myse = $('#myse').val();

  $.ajax({
    'url': 'function/documentosJuridicos/consultarDocumento.php',
    'type': 'POST',
    'data': {'myse':myse},
    success: function (respuesta) {

      var cuerpo = $('#tbody');
      cuerpo.empty();
      for (var i = 0; i < respuesta.length; i++) {
        var item = respuesta[i];
        var fila = "<tr class='active'>";

        fila += "<td bgcolor='#D9E1FA'>" + item.nombreRJ + "</td>"+"<td bgcolor='#D9E1FA'>" + item.firmarl + "</td>"+"<td bgcolor='#D9E1FA'>" + item.requisitos + "</td>"+"<td bgcolor='#D9E1FA'>" + item.observaciones + "</td>";
        cuerpo.append(fila);
      }

      $('tbody input.btn.btn-primary').on('click', function (e) {
        var data = $(this).attr('data-info');
        var requisito = JSON.parse(data);
        $('#idRequi').val(requisito.id);
        $('#documentos').val(requisito.iddocu);
        $('#requisitos').val(requisito.requisitos);
        $('#firmarl').val(requisito.firmarl);
        $('#observaciones').val(requisito.observaciones);
        $('#btnEditar').prop('hidden',false);
        $('#btnGuardar').prop('hidden',true);
        $('#documentos').focus();


      });

      $('tbody input.btndelete').on('click', function (e) {
        var id = $(this).attr('data-id');
        $.ajax({
         'url': 'function/documentosJuridicos/eliminarDocumento.php',
         'type': 'POST',
         'data': {'id': id},
         success: function (respuesta) {
          console.log(respuesta);
          if (respuesta.codigo === 1) {

          } else {
          }  
          consultarRequeJ();
        }

      });


      });

      $('#btnEditar').on('click', function (e) {
        var id = $('#idRequi').val();
        var requisitos = $('#requisitos').val();
        var firmarl = $('#firmarl').val();
        var observaciones = $('#observaciones').val();
        var documentos = $('#documentos').val();
        $.ajax({
          'url': 'function/documentosJuridicos/editarDocumento.php',
          'type': 'POST',
          'data': {'id': id,'requisitos': requisitos, 'firmarl': firmarl, 'observaciones' :observaciones, 'documentos' :documentos},
          success: function (respuesta) {
            if (respuesta.codigo === 1) {
             $('#requisitos').val('');
             $('#observaciones').val('');
             $('#firmarl').val('Seleccionar');
             $('#documentos').val('0');
             $('#idRequi').val('');
             $('#btnEditar').prop('hidden',true);
             $('#btnGuardar').prop('hidden',false);
           } else {

           }
           consultarRequeJ();
         }

       });
      });

    }


  });
}

$(document).ready(function () {
  $('#btnGuardar').click(function(){
    if (campos == true) {

      var datos = $('#todo').serialize();
      var formulario = new FormData($("#todo")[0]);
      $.ajax({
        url: "function/documentosJuridicos/agregarDocumento.php",
        'type': 'POST',
        dataType: 'JSON',
        data: formulario,
        cache: false,
        contentType: false,
        processData: false,
        success:function(respuesta){
          if (respuesta.codigo === '1') {
           $('#requisitos').val('');
           $('#observaciones').val('');
           $('#firmarl').val('Seleccionar');
           $('#documentos').val('0');

         } else {

         }
         consultarRequeJ();
       }

     });

    }

  });
});


var campos = false;
function camposVacios(){

  var documentos = $('#documentos').val();
  var requisitos = $('#requisitos').val();
  var firmarl = $('#firmarl').val();
  var observaciones= $('#observaciones').val();
  if (documentos == '0' || requisitos == '' || firmarl =='0' || observaciones =='' ) {
   alert('Todos los campos son obligatorios');
   campos = false;

 }else{
  campos = true;

}
return campos;
}
$("#btnGuardar").click(function () {
  camposVacios();
});

// AJAX Requerimientos Financieros

consultarF();
function consultarF() {
  var myse = $('#myse').val();
  $.ajax({
    'url': 'function/documentosFinancieros/consultarDocumento.php',
    'type': 'POST',
    'data': {'myse':myse},
    success: function (respuesta) {

      var cuerpo = $('#tbody2');
      cuerpo.empty();
      for (var i = 0; i < respuesta.length; i++) {
        var item = respuesta[i];
        var fila = "<tr class='active'>";

        fila += "<td  bgcolor='E8B4B4'>" + item.nombre + "</td>"+"<td bgcolor='E8B4B4'>" + item.firmarl + "</td>"+"<td bgcolor='E8B4B4'>" + item.requisitos + "</td>"+"<td bgcolor='E8B4B4'>" + item.observciones + "</td>";



        cuerpo.append(fila);
      }

      $('tbody input.btnEditarF').on('click', function (e) {
        var data = $(this).attr('data-info');
        var requisito = JSON.parse(data);
        $('#idRequiF').val(requisito.id);
        $('#certificadosf').val(requisito.idcerti);
        $('#requisitosF').val(requisito.requisitos);
        $('#firmarlF').val(requisito.firmarl);
        $('#observacionesF').val(requisito.observciones);
        $('#btnEditarF').prop('hidden',false);
        $('#btnGuardarF').prop('hidden',true);
        $('#certificadosf').focus();

      });

      $('tbody input.btndeleteF').on('click', function (e) {
        var id = $(this).attr('data-id2');
        $.ajax({
         'url': 'function/documentosFinancieros/eliminarDocumento.php',
         'type': 'POST',
         'data': {'id': id},
         success: function (respuesta) {
           if (respuesta.codigo === 1) {

           } else {
           }  
           consultarF();
         }

       });


      });

      $('#btnEditarF').on('click', function (e) {
        var id = $('#idRequiF').val();
        var requisitos = $('#requisitosF').val();
        var firmarl = $('#firmarlF').val();
        var observaciones = $('#observacionesF').val();
        var documentos = $('#certificadosf').val();
        $.ajax({
          'url': 'function/documentosFinancieros/editarDocumento.php',
          'type': 'POST',
          'data': {'id': id,'requisitosF': requisitos, 'firmarlF': firmarl, 'observacionesF' :observaciones, 'certificadosf' : documentos},
          success: function (respuesta) {
            if (respuesta.codigo === 1) {
             $('#requisitosF').val('');
             $('#observacionesF').val('');
             $('#firmarlF').val('Seleccionar');
             $('#certificadosf').val('0');
             $('#idRequiF').val('');
             $('#btnEditarF').prop('hidden',true);
             $('#btnGuardarF').prop('hidden',false);
           } else {

           }
           consultarF();
         }

       });
      });

    }


  });
}


$(document).ready(function () {
  $('#btnGuardarF').click(function(){
    if (campos2 === true) {
      var datos = $('#todo').serialize();
      var formulario = new FormData($("#todo")[0]);
      $.ajax({
        url: "function/documentosFinancieros/agregarDocumento.php",
        'type': 'POST',
        dataType: 'JSON',
        data: formulario,
        cache: false,
        contentType: false,
        processData: false,
        success:function(respuesta){
          if (respuesta.codigo === '1') {
           $('#certificadosf').val('0');
           $('#observacionesF').val('');
           $('#firmarlF').val('Seleccionar');
           $('#requisitosF').val('');

         } else {

         }
         consultarF();
       }

     });
    }
  });

});

var campos2 = false;
function camposVacios2(){

  var documentos = $('#certificadosf').val();
  var requisitos = $('#requisitosF').val();
  var firmarl = $('#firmarlF').val();
  var observaciones= $('#observacionesF').val();
  if (documentos == '0' || requisitos == '' || firmarl =='0' || observaciones =='' ) {
   alert('Todos los campos son obligatorios');
   campos2 = false;

 }else{
  campos2 = true;

}
return campos2;
}
$("#btnGuardarF").click(function () {
  camposVacios2();
});



// AJAX Requerimientos Exeperiencia 
consultarExpe();
function consultarExpe() {



  var myse = $('#myseE').val();

  $.ajax({
    'url': 'function/documentosExperiencia/consultarDocumento.php',
    'type': 'POST',
    'data': {'myse':myse},
    success: function (respuesta) {

      var cuerpo = $('#tbody3');
      cuerpo.empty();
      for (var i = 0; i < respuesta.length; i++) {
        var item = respuesta[i];
        var fila = "<tr class='active'>";

        fila += "<td bgcolor='#8DB7F3'>" + item.entregable + "</td>"+"<td bgcolor='#8DB7F3'>" + item.firmarl + "</td>"+"<td bgcolor='#8DB7F3'>" + item.requisitos + "</td>"+"<td bgcolor='#8DB7F3'>" + item.observaciones + "</td>";

        cuerpo.append(fila);
      }

      $('tbody input.btnEditarE').on('click', function (e) {
        var data = $(this).attr('data-info');
        var requisito = JSON.parse(data);
        $('#idRequiE').val(requisito.id);
        $('#nombreREE').val(requisito.entregable);
        $('#requisitosE').val(requisito.requisitos);
        $('#firmarlE').val(requisito.firmarl);
        $('#observacionesE').val(requisito.observaciones);
        $('#btnEditarE').prop('hidden',false);
        $('#btnGuardarE').prop('hidden',true);
        $('#nombreREE').focus();

      });

      $('tbody input.btndeleteE').on('click', function (e) {
        var id = $(this).attr('data-id3');
        $.ajax({
         'url': 'function/documentosExperiencia/eliminarDocumento.php',
         'type': 'POST',
         'data': {'id': id},
         success: function (respuesta) {
          console.log(respuesta);
          if (respuesta.codigo === 1) {

          } else {
          }  
          consultarExpe();
        }

      });


      });

      $('#btnEditarE').on('click', function (e) {
        var id = $('#idRequiE').val();
        var requisitos = $('#requisitosE').val();
        var firmarl = $('#firmarlE').val();
        var observaciones = $('#observacionesE').val();
        var documentos = $('#nombreREE').val();
        $.ajax({
          'url': 'function/documentosExperiencia/editarDocumento.php',
          'type': 'POST',
          'data': {'id': id,'requisitosE': requisitos, 'firmarlE': firmarl, 'observacionesE' :observaciones, 'nombreREE' :documentos},
          success: function (respuesta) {
            if (respuesta.codigo === 1) {
             $('#requisitosE').val('');
             $('#observacionesE').val('');
             $('#firmarlE').val('Seleccionar');
             $('#nombreREE').val('');
             $('#idRequiE').val('');
             $('#btnEditarE').prop('hidden',true);
             $('#btnGuardarE').prop('hidden',false);
           } else {

           }
           consultarExpe();
         }

       });
      });

    }


  });
}

$(document).ready(function () {
  $('#btnGuardarE').click(function(){

    if (campos3 === true) {
      var datos = $('#todo').serialize();
      var formulario = new FormData($("#todo")[0]);
      $.ajax({
        url: "function/documentosExperiencia/agregarDocumento.php",
        'type': 'POST',
        dataType: 'JSON',
        data: formulario,
        cache: false,
        contentType: false,
        processData: false,
        success:function(respuesta){
          console.log(respuesta);
          if (respuesta.codigo === '1') {
           $('#requisitosE').val('');
           $('#observacionesE').val('');
           $('#firmarlE').val('Seleccionar');
           $('#nombreREE').val('');

         } else {

         }
         consultarExpe();
       }

     });
    }
  });
});

var campos3 = false;
function camposVacios3(){

  var documentos = $('#nombreREE').val();
  var requisitos = $('#requisitosE').val();
  var firmarl = $('#firmarlE').val();
  var observaciones= $('#observacionesE').val();
  if (documentos == '0' || requisitos == '' || firmarl =='0' || observaciones =='' ) {
   alert('Todos los campos son obligatorios');
   campos3 = false;

 }else{
  campos3 = true;

}
return campos3;
}
$("#btnGuardarE").click(function () {
  camposVacios3();
});


// AJAX Requerimientos Caracter Tecnico

consultarCT();
function consultarCT() {
  var myse = $('#myse').val();
  $.ajax({
    'url': 'function/documentosCaracterT/consultarDocumento.php',
    'type': 'POST',
    'data': {'myse':myse},
    success: function (respuesta) {

      var cuerpo = $('#tbody4');
      cuerpo.empty();
      for (var i = 0; i < respuesta.length; i++) {
        var item = respuesta[i];
        var fila = "<tr class='active'>";

        fila += "<td  bgcolor='B7DCCC'>" + item.entregable + "</td>"+"<td bgcolor='B7DCCC'>" + item.firmarl + "</td>"+"<td bgcolor='B7DCCC'>" + item.requisitos + "</td>"+"<td bgcolor='B7DCCC'>" + item.observaciones + "</td>";

        cuerpo.append(fila);
      }

      $('tbody input.btnEditarCT').on('click', function (e) {
        var data = $(this).attr('data-info');
        var requisito = JSON.parse(data);
        $('#idRequiCT').val(requisito.id);
        $('#certificadosCT').val(requisito.entregable);
        $('#requisitosCT').val(requisito.requisitos);
        $('#firmarlCT').val(requisito.firmarl);
        $('#observacionesCT').val(requisito.observaciones);
        $('#btnEditarCT').prop('hidden',false);
        $('#btnGuardarCT').prop('hidden',true);
        $('#certificadosCT').focus();


      });

      $('tbody input.btndeleteCT').on('click', function (e) {
        var id = $(this).attr('data-id4');
        $.ajax({
         'url': 'function/documentosCaracterT/eliminarDocumento.php',
         'type': 'POST',
         'data': {'id': id},
         success: function (respuesta) {
           if (respuesta.codigo === 1) {

           } else {
           }  
           consultarCT();
         }

       });


      });

      $('#btnEditarCT').on('click', function (e) {
        var id = $('#idRequiCT').val();
        var requisitos = $('#requisitosCT').val();
        var firmarl = $('#firmarlCT').val();
        var observaciones = $('#observacionesCT').val();
        var documentos = $('#certificadosCT').val();
        $.ajax({
          'url': 'function/documentosCaracterT/editarDocumento.php',
          'type': 'POST',
          'data': {'id': id,'requisitosCT': requisitos, 'firmarlCT': firmarl, 'observacionesCT' :observaciones, 'certificadosCT' : documentos},
          success: function (respuesta) {
            if (respuesta.codigo === 1) {
             $('#requisitosCT').val('');
             $('#observacionesCT').val('');
             $('#firmarlCT').val('Seleccionar');
             $('#certificadosCT').val('');
             $('#idRequiCT').val('');
             $('#btnEditarCT').prop('hidden',true);
             $('#btnGuardarCT').prop('hidden',false);
           } else {

           }
           consultarCT();
         }

       });
      });

    }


  });
}

$(document).ready(function () {
  $('#btnGuardarCT').click(function(){
    if (campos4 === true) {
      var datos = $('#todo').serialize();
      var formulario = new FormData($("#todo")[0]);
      $.ajax({
        url: "function/documentosCaracterT/agregarDocumento.php",
        'type': 'POST',
        dataType: 'JSON',
        data: formulario,
        cache: false,
        contentType: false,
        processData: false,
        success:function(respuesta){
          if (respuesta.codigo === '1') {
           $('#certificadosCT').val('');
           $('#observacionesCT').val('');
           $('#firmarlCT').val('Seleccionar');
           $('#requisitosCT').val('');

         } else {

         }
         consultarCT();
       }

     });
    }
  });
});

var campos4 = false;
function camposVacios4(){

  var documentos = $('#certificadosCT').val();
  var requisitos = $('#requisitosCT').val();
  var firmarl = $('#firmarlCT').val();
  var observaciones= $('#observacionesCT').val();
  if (documentos == '0' || requisitos == '' || firmarl =='0' || observaciones =='' ) {
   alert('Todos los campos son obligatorios');
   campos4 = false;

 }else{
  campos4 = true;

}
return campos3;
}
$("#btnGuardarCT").click(function () {
  camposVacios4();
});






// AJAX Formatos y Anexos
consultarFA();
function consultarFA() {



  var myse = $('#myseFA').val();

  $.ajax({
    'url': 'function/formatosAnexos/consultarDocumento.php',
    'type': 'POST',
    'data': {'myse':myse},
    success: function (respuesta) {

      var cuerpo = $('#tbody5');
      cuerpo.empty();
      for (var i = 0; i < respuesta.length; i++) {
        var item = respuesta[i];
        var fila = "<tr class='active'>";

        fila += "<td bgcolor='DED1AF'>" + item.entregable + "</td>"+"<td bgcolor='DED1AF'>" + item.firmarl + "</td>"+"<td bgcolor='DED1AF'>" + item.requisitos + "</td>"+"<td bgcolor='DED1AF'>" + item.observaciones + "</td>";



        cuerpo.append(fila);
      }

      $('tbody input.btnEditarFA').on('click', function (e) {
        var data = $(this).attr('data-info');
        var requisito = JSON.parse(data);
        $('#idRequiFA').val(requisito.id);
        $('#nombreFA').val(requisito.entregable);
        $('#requisitosFA').val(requisito.requisitos);
        $('#firmarlFA').val(requisito.firmarl);
        $('#observacionesFA').val(requisito.observaciones);
        $('#btnEditarFA').prop('hidden',false);
        $('#btnGuardarFA').prop('hidden',true);
        $('#nombreFA').focus();
      });

      $('tbody input.btndeleteFA').on('click', function (e) {
        var id = $(this).attr('data-id5');
        $.ajax({
         'url': 'function/formatosAnexos/eliminarDocumento.php',
         'type': 'POST',
         'data': {'id': id},
         success: function (respuesta) {
          console.log(respuesta);
          if (respuesta.codigo === 1) {

          } else {
          }  
          consultarFA();
        }

      });


      });

      $('#btnEditarFA').on('click', function (e) {
        var id = $('#idRequiFA').val();
        var requisitos = $('#requisitosFA').val();
        var firmarl = $('#firmarlFA').val();
        var observaciones = $('#observacionesFA').val();
        var documentos = $('#nombreFA').val();
        $.ajax({
          'url': 'function/formatosAnexos/editarDocumento.php',
          'type': 'POST',
          'data': {'id': id,'requisitosFA': requisitos, 'firmarlFA': firmarl, 'observacionesFA' :observaciones, 'nombreFA' :documentos},
          success: function (respuesta) {
            if (respuesta.codigo === 1) {
             $('#requisitosFA').val('');
             $('#observacionesFA').val('');
             $('#firmarlFA').val('Seleccionar');
             $('#nombreFA').val('');
             $('#idRequiFA').val('');
             $('#btnEditarFA').prop('hidden',true);
             $('#btnGuardarFA').prop('hidden',false);
           } else {

           }
           consultarFA();
         }

       });
      });

    }


  });
}

$(document).ready(function () {
  $('#btnGuardarFA').click(function(){
    if (campos5 === true) {
      var datos = $('#todo').serialize();
      var formulario = new FormData($("#todo")[0]);
      $.ajax({
        url: "function/formatosAnexos/agregarDocumento.php",
        'type': 'POST',
        dataType: 'JSON',
        data: formulario,
        cache: false,
        contentType: false,
        processData: false,
        success:function(respuesta){
          console.log(respuesta);
          if (respuesta.codigo === '1') {
           $('#requisitosFA').val('');
           $('#observacionesFA').val('');
           $('#firmarlFA').val('Seleccionar');
           $('#nombreFA').val('');

         } else {

         }
         consultarFA();
       }

     });
    }
  });
});
var campos5 = false;
function camposVacios5(){

  var documentos = $('#nombreFA').val();
  var requisitos = $('#requisitosFA').val();
  var firmarl = $('#firmarlFA').val();
  var observaciones= $('#observacionesFA').val();
  if (documentos == '0' || requisitos == '' || firmarl =='0' || observaciones =='' ) {
   alert('Todos los campos son obligatorios');
   campos5 = false;

 }else{
  campos5= true;

}
return campos5;
}
$("#btnGuardarFA").click(function () {
  camposVacios5();
});

</script> 