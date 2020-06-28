<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card  card-tasks">
                <div style="text-align: center;" class="card-body">

                    <form method="post" name="validarPrincipal">
                        <?php if ($_SESSION['TAcceso'] == 'Multiple') { ?>
                            <h4>Area</h4>

                            <a id="Licita" name="Licita" href="<?php echo SERVERURL; ?>menuAdministrador/">
                                <div class="principal">
                                    <img id="ImgPrin" class="imgArea" src="<?= URL_IMG ?>Licitacion.jpg" alt="Logo del Area">
                                    <span id="letraP">Licitaciones</span>

                                </div>
                            </a>
                            <a id="Cert" name="Cert" href="<?php echo SERVERURL; ?>GeneralCertificado/">
                                <div class="principal">
                                    <img id="ImgPrin" class="imgArea" src="<?= URL_IMG ?>CertificacionSao.png" alt="Logo del Area">
                                    <span id="letraP">Certificaciones</span>
                                </div>
                            </a>
                            <a href="#">
                                <div class="principal">

                                    <img id="ImgPrin" class="imgArea" src="<?= URL_IMG ?>Contratacion.jpg" alt="Logo del Area">

                                    <span id="letraP">Contrataciones</span>


                                </div>
                            </a>
                            <a href="#">
                                <div class="principal">


                                    <img id="ImgPrin" class="imgArea" src="<?= URL_IMG ?>FacturacionSao.jpg" alt="Logo del Area">


                                    <span id="letraP">Facturaciones</span>


                                </div>
                            </a>
                            <hr>
                            <h4>Usuarios</h4>
                            <a href="<?php echo SERVERURL; ?>usuarios/">
                                <div class="principal">
                                    <img style="width: 50px;height: 50px;" src="<?= URL_IMG ?>iconos/search.png">
                                    <span id="letraP">Controlar Usuarios</span>
                                </div>
                            </a>
                            <a href="<?php echo SERVERURL; ?>Sesiones/">
                                <div class="principal">
                                    <img style="width: 50px;height: 50px;" src="<?= URL_IMG ?>iconos/record.png">
                                    <span id="letraP">Sesiones</span>
                                </div>
                            </a>
                            <hr>
                            <h4>Ejecutivos</h4>
                            <a href="<?php echo SERVERURL; ?>ejecutivos/">
                                <div class="principal">
                                    <img style="width: 50px;height: 50px;" src="<?= URL_IMG ?>iconos/ceo.png">
                                    <span id="letraP">Consultar Ejecutivos</span>
                                </div>
                            </a>

                        <?php } elseif ($_SESSION['TAcceso'] == 'Licitaciones') { ?>

                            <a id="Licita" name="Licita">
                                <div class="principal">
                                    <img id="ImgPrin" class="imgArea" src="<?= URL_IMG ?>Licitacion.jpg" alt="Logo del Area">
                                    <span id="letraP">Licitaciones</span>

                                </div>
                            </a>

                        <?php } elseif ($_SESSION['TAcceso'] == 'Certificaciones') { ?>

                            <a id="Cert" name="Cert">
                                <div class="principal">
                                    <img id="ImgPrin" class="imgArea" src="<?= URL_IMG ?>CertificacionSao.png" alt="Logo del Area">
                                    <span id="letraP">Certificaciones</span>

                                </div>
                            </a>

                        <?php } ?>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<?php
if ($_SESSION['usuNuevo'] == "1") {
?>
    <script languaje="javascript">
        $(document).ready(function() {
            $('#miModal').css('display', 'block');
            $('#overflow').css('display', 'block');
        });
    </script>
<?php
}
?>

<!-- </body> -->
<!--<script type="text/javascript">
    function mostrarPopup() {
        $('#miModal').css('display', 'block');
        $('#overflow').css('display', 'block');
    }
</script>-->

<!-- </html> -->