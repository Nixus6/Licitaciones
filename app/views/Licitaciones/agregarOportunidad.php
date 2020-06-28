<style type="text/css">
  #suggesstion-box {
    float: left;
    list-style: none;
    margin-top: -3px;
    padding: 0;
    width: 380px;
    position: absolute;
  }

  #suggesstion-box li {
    padding: 1px;
    background: #f0f0f0;
    border-bottom: #bbb9b9 1px solid;
  }

  #suggesstion-box li:hover {
    background: #405c8c;
    cursor: pointer;
  }
</style>

<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card ">



          <div class="card-header">
            <div class="row justify-content center">

              <div class="col-md-12">
                <center>
                  <h4 class="card-title">Agregar Oportunidad</h4>
                </center>
              </div>

            </div>
          </div>
          <form id="formRegistrarOportunidad" autocomplete="off">
            <div class="card-body">



              <h2 style="font-size: 1.400em;line-height: 1.45em;margin-top: 0px;margin-bottom: 10px;text-align: left;">Fechas</h2>
              <div class="row justify-content-center">
                <!-- Primera columna -->

                <div class="col-md-2">
                  <div class="form-group">
                    <label for="fCreacion"> Fecha de Creación</label>
                    <br>
                    <span style="text-transform: capitalize;color: black;font-size: medium;" id="fCreacion" name="fCreacion"></span>
                    <!-- <input type="date" name="fCreacion" class="form-control" id="fCreacion" tabindex="1"> -->
                  </div>

                  <div class="form-group">
                    <label for="estado"> Estado </label>
                    <select name="estado" class="form-control" tabindex="11" id="estado">
                      <option value="Pendiente">Pendiente</option>
                      <option value="No participamos">No participamos</option>
                      <option value="En gestión comercial">En gestión comercial</option>
                      <option value="Participamos">Participamos</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="row justify-content-center">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="fPublicacion"> Fecha de publicación </label>
                    <input type="date" name="fPublicacion" class="form-control" id="fPublicacion" tabindex="7">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="fcierre"> Fecha Cierre </label>
                    <input type="date" name="fcierre" class="form-control" tabindex="8" id="fcierre">
                  </div>
                </div>
              </div>
              <h2 style="font-size: 1.400em;line-height: 1.45em;margin-top: 0px;margin-bottom: 10px;text-align: left;">Información Oportunidad</h2>

              <div class="row justify-content-center">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="nomEntidad"> Entidad </label>
                    <input type="text" name="nomEntidad" class="form-control" tabindex="2" id="nomEntidad" value="AGENCIA NACIONAL DE SEGURIDAD VIAL">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="numContrato">Número de contrato </label>
                    <input type="text" name="numContrato" class="form-control" tabindex="3" id="numContrato" value="ANSV-COT-004-2020">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="Objeto"> Objeto </label>
                    <textarea name="Objeto" rows="2" class="form-control" tabindex="4" id="Objeto">ADQUISICIÓN E IMPLEMENTACIÓN DE LA SUSCRIPCIÓN DE ANTIVIRUS Y PROTECCIÓN PARA LA HERRAMIENTA DE COLABORACIÓN OFFICE 365 PARA LA AGENCIA NACIONAL DE SEGURIDAD VIAL</textarea>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="Presu"> Presupuesto </label>
                    <input type="" name="Presu" class="form-control" id="Presu" tabindex="5" value="0">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="ubicacion"> Ubicación </label>
                    <input type="text" name="ubicacion" class="form-control" tabindex="6" id="ubicacion" value="BOGOTA D.C">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="link"> Link </label>
                    <input type="text" name=link class="form-control" tabindex="13" id="link" value="https://co.licitaciones.info/detalle-contrato?random=5e41c5a48d9771.96606952">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="obser"> Observaciones </label>
                    <textarea name="obser" class="form-control" tabindex="14" id="obser">Pendiente</textarea>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="MYSE"> Myse </label>
                    <input type="number" name="MYSE" class="form-control" value="0" tabindex="12">
                  </div>
                </div>
              </div>

              <h2 style="font-size: 1.400em;line-height: 1.45em;margin-top: 0px;margin-bottom: 10px;text-align: left;">Información ...</h2>
              <div class="row justify-content-center">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="ejecutivo"> Ejecutivo </label>
                    <input type="text" name="ejecutivo" class="form-control" id="ejecu" tabindex="9">
                    <div id="suggesstion-box" style="margin: 1"></div>
                  </div>
                </div>
              </div>
              <div class="row justify-content-center">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="Consultor"> Consultor </label>
                    <input type="text" name="Consultor" class="form-control" id="consul">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="gerente"> Director </label>
                    <input type="text" name="gerente" class="form-control" tabindex="10" id="gerente">
                  </div>
                </div>
                <div class="col-md-4">

                  <div class="form-group">
                    <label for="sector"> Sector </label>
                    <?php //$sector = $pdo->_comboboxdinamico("sect", "nombre_concepto");
                    //echo $sector; ?>
                  </div>
                </div>
              </div>

            </div>
            <div class="modal-footer">
              <input id="button" name="button" class="btn btn-outline-primary" type="submit" value="Guardar">
            </div>

          </form>

        </div>
      </div>
    </div>
  </div>
</div>