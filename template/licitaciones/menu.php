<!--Div para cambiar el color de la barra del menu-->
<div class="sidebar" data-color="red">
    <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->

    <div class="sidebar-wrapper">

        <nav class="nav">

            <div class="logo">
                <a href="#" class="simple-text logo-normal">
                    <center>
                        <div class="logoprincipal"><img id="logo" src="<?= URL_IMG ?>LogoLetrasBlancas.png"></div>
                    </center>
                </a>

            </div>


            <?php if ($_SESSION['TAcceso'] == 'Multiple') { ?>
                <li class="nav-item">

                    <a class="nav-link collapsed" data-toggle="collapse" href="#user" aria-expanded="false">
                        <i><img id="divImg" class="imgArea" src="<?= URL_IMG ?>Licitacion.jpg" alt="Logo del Area"></i>
                        <p> Licitaciones
                            <b class="caret"></b>
                        </p>
                    </a>

                    <div class="collapse" id="user">
                        <ul class="nav">
                            <li class="nav-item">
                                <a title="Agregar" href="../Certificaciones/GeneralCertificado.php">
                                    <i><img id="divImg" class="imgArea" src="<?= URL_IMG ?>CertificacionSao.png" alt="Logo del Area"></i>
                                    <p> Certificaciones</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="" title="Agregar">
                                    <i><img id="divImg" class="imgArea" src="<?= URL_IMG ?>Contratacion.jpg" alt="Logo del Area"></i>
                                    <p> Contrataciones </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="" title="Agregar">
                                    <i><img id="divImg" class="imgArea" src="<?= URL_IMG ?>FacturacionSao.jpg" alt="Logo del Area"></i>
                                    <p> Facturaciones</p>
                                </a>
                            </li>
                        </ul>
                    </div>

                </li>
            <?php } elseif ($_SESSION['TAcceso'] == 'Licitaciones') { ?>
                <li class="nav-item">

                    <a class="nav-link collapsed" data-toggle="collapse" href="#user" aria-expanded="false">
                        <i><img id="divImg" class="imgArea" src="<?= URL_IMG ?>CertificacionSao.png" alt="Logo del Area"></i>
                        <p> Certificaciónes
                            <b class="caret"></b>
                        </p>
                    </a>

                    <div class="collapse" id="user">
                        <ul class="nav">
                            <li class="nav-item">
                                <a href="" title="Agregar">
                                    <i><img id="divImg" class="imgArea" src="<?= URL_IMG ?>Licitacion.jpg" alt="Logo del Area"></i>
                                    <p> Licitaciones</p>
                                </a>
                            </li>
                        </ul>
                    </div>

                </li>
            <?php } elseif ($_SESSION['TAcceso'] == 'Certificaciones') { ?>
                <li class="nav-item">

                    <a class="nav-link collapsed" data-toggle="collapse" href="#user" aria-expanded="false">
                        <i><img id="divImg" class="imgArea" src="<?= URL_IMG ?>CertificacionSao.png" alt="Logo del Area"></i>
                        <p> Certificaciónes
                        </p>
                    </a>

                </li>
            <?php } ?>

            <div class="logo"></div>

            <li class="nav-item">
                <a href="<?php echo SERVERURL; ?>principal/">
                    <i style="color: white;" class="fas fa-home"></i>
                    <p>Principal</p>
                </a>
            </li>

            <li class="nav-item">

                <a class="nav-link collapsed" data-toggle="collapse" href="#li" aria-expanded="false">
                    <i style="color: white;" class="far fa-handshake"></i>
                    <p> Licitaciones
                        <b class="caret"></b>
                    </p>
                </a>

                <div class="collapse" id="li">
                    <ul class="nav">
                        <li class="nav-item">
                            <a href="<?php echo SERVERURL; ?>agregarLicitacion">
                                <i><img style=" width: 25px; height: 25px;" src="<?= URL_IMG ?>iconos/plus.png"></i>
                                <p> Agregar </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo SERVERURL; ?>consultarLicitaciones">
                                <i><img style=" width: 25px; height: 25px;" src="<?= URL_IMG ?>iconos/investigate.png"></i>
                                <p> Consultar </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo SERVERURL; ?>menuAdministrador/">
                                <i><img style=" width: 25px; height: 25px;" src="<?= URL_IMG ?>iconos/process.png"></i>
                                <p> Licitaciones en Curso</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo SERVERURL; ?>licitacionesTerminadas/">
                                <i><img style=" width: 25px; height: 25px;" src="<?= URL_IMG ?>iconos/pending.png"></i>
                                <p> Pendientes Adjudicación</p>
                            </a>
                        </li>
                    </ul>
                </div>

            </li>

            <li class="nav-item">

                <a class="nav-link collapsed" data-toggle="collapse" href="#oportunidades" aria-expanded="false">
                    <i style="color: white;" class="fas fa-globe"></i>
                    <p> Oportunidades
                        <b class="caret"></b>
                    </p>
                </a>

                <div class="collapse" id="oportunidades">
                    <ul class="nav">
                        <li class="nav-item">
                            <a href="<?php echo SERVERURL; ?>agregarOportunidad">
                                <i><img style=" width: 25px; height: 25px;" src="<?= URL_IMG ?>iconos/plus.png"></i>
                                <p> Agregar Oportunidad</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo SERVERURL; ?>oportunidadesOtros/">
                                <i><img style=" width: 25px; height: 25px;" src="<?= URL_IMG ?>iconos/investigate.png"></i>
                                <p> Consultar Oportunidades</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo SERVERURL; ?>consultaOportunidad/">
                                <i><img style=" width: 25px; height: 25px;" src="<?= URL_IMG ?>iconos/process.png"></i>
                                <p>Oportunidades En Curso</p>
                            </a>
                        </li>
                    </ul>
                </div>

            </li>

            <!-- <li class="nav-item">

                <a class="nav-link collapsed" data-toggle="collapse" href="#eje" aria-expanded="false">
                    <i><img style=" width: 25px; height: 25px;" src="<?= URL_IMG ?>iconos/management.png"></i>
                    <p> Ejecutivos
                        <b class="caret"></b>
                    </p>
                </a>

                <div class="collapse" id="eje">
                    <ul class="nav">
                        <li class="nav-item">
                            <a href="ejecutivos.php">
                                <i><img style=" width: 25px; height: 25px;" src="<?= URL_IMG ?>iconos/case-study.png"></i>
                                <p> Consultar Ejecutivos </p>
                            </a>
                        </li>
                    </ul>
                </div>

            </li> -->
            <li class="nav-item">
                <a href="grafica.php">
                    <i><img style=" width: 25px; height: 25px;" src="<?= URL_IMG ?>iconos/case-study.png"></i>
                    <p>Documentos</p>
                </a>
            </li>


            <li class="nav-item">
                <a href="grafica.php">
                    <i><img style=" width: 25px; height: 25px;" src="<?= URL_IMG ?>iconos/bar-chart.png"></i>
                    <p>Graficos</p>
                </a>
            </li>

        </nav>
    </div>
</div>