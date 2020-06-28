<script>
    $(document).ready(function() {
        // $('.js-example-basic-single').select2();
        $('.js-example-basic-single').select2();

    });
    // Validacion Campos Vacios

    $("#formRegistrarUsuario").submit(function() {

        if ($('#myse' && '#nit' && '#entidad' && '#objcontra' && '#traza' && 'ejecu' && 'numero' && 'nombre_aboga' &&
                '#nombre_aboga' && '#hopre' && '#plazoEjecucion' && '#nombre_pro').val() === "") {
            return false;
        } else if ($('#Abogado').val() === '1') {
            return false;
        } else {
            return true;
        }

    })



    $("#btnRegistrar").click(function() {
        let formulario = $("form").serialize()
        console.log(formulario)
        $("#formRegistrarUsuario").submit()
        $("#formRegistrarUsuario").validate({

            rules: {

                myse: {
                    required: true

                },
                nit: {
                    required: true
                },
                entidad: {
                    required: true
                },
                nombre_tiproces: {
                    required: true
                },

                objcontra: {
                    required: true
                },
                nombre_stadpro: {
                    required: true
                },
                nombre_estado: {
                    required: true
                },

                traza: {
                    required: true
                },
                nombre_reg: {
                    required: false
                },
                nombre_concepto: {
                    required: false
                },
                nombre_aboga: {
                    required: false
                },
                nombre_pro: {
                    required: true
                },
                nombre_sp: {
                    required: true
                },
                numero: {
                    required: true
                },
                Mprese: {
                    required: true
                },
                hopre: {
                    required: true
                },
                ejecu: {
                    required: true
                },
                Presu: {
                    required: true
                },
                plzejecu: {
                    required: true
                }




            },

            messages: {

                myse: {
                    required: "campo obligatorio"
                },
                nit: {
                    required: "campo obligatorio"
                },
                entidad: {
                    required: "campo obligatorio"
                },
                nombre_tiproces: {
                    required: "campo obligatorio"
                },

                objcontra: {
                    required: "campo obligatorio"
                },
                nombre_stadpro: {
                    required: "campo obligatorio"
                },
                nombre_estado: {
                    required: "campo obligatorio"
                },

                traza: {
                    required: "campo obligatorio"
                },
                nombre_aboga: {
                    required: "campo obligatorio"
                },
                nombre_pro: {
                    required: "campo obligatorio"

                },
                nombre_sp: {
                    required: "campo obligatorio"
                },

                numero: {
                    required: "campo obligatorio"
                },
                Mprese: {
                    required: "campo obligatorio"
                },
                hopre: {
                    required: "campo obligatorio"
                },
                ejecu: {
                    required: "campo obligatorio"
                },
                Presu: {
                    required: "campo obligatorio"
                },
                plzejecu: {
                    required: "campo obligatorio"
                }





            },

        })


    })

    // Validaciones Campos

    $(document).ready(function() {
        $('#product1').css('pointer-events', 'none');
        // $('#nombre_concepto').css('pointer-events', 'none');
        $('#nombre_reg').css('pointer-events', 'none');
        $('#nombre_concepto').val('0');
        $('#nombre_reg').val('0');
        $('#consul').prop('readonly', true);


        // Wizard Animación
        let panelancho = $('#navbarOpciones').width();

        console.log(panelancho);

        var i = 0;

        $('ul#navbarOpciones li ').each(function() {
            i++;
        });
        console.log(i);

        var val1 = panelancho / i;

        console.log(val1);

        $('.panel').css('width', val1 + 'px');
        $('.panel').css('left', '0px');

        $('ul li:nth-child(1)').on('click', function() {
            $('.panel').animate({
                left: '0px'
            })
        });
        $('ul li:nth-child(2)').on('click', function() {
            $('.panel').animate({
                left: val1 - 10 + 'px'
            })
        });
        $('ul li:nth-child(3)').on('click', function() {
            $('.panel').animate({
                left: val1 + val1 + 'px'
            })

        });

    });

    $("#porcentajePOO").on({
        "focus": function(event) {
            $(event.target).select();
        },
        "keyup": function(event) {
            $(event.target).val(function(index, value) {
                return value.replace(/\[^A-Za-z]/g, "")
                    .replace(/[^0-9-,]/g, '') + '%';
            });
        }
    });

    $("#ebitda1").on({
        "focus": function(event) {
            $(event.target).select();
        },
        "keyup": function(event) {
            $(event.target).val(function(index, value) {
                return value.replace(/\[^A-Za-z]/g, "")
                    .replace(/[^0-9-,]/g, '') + '%';
            });
        }
    });
    $("#ebitdatm1").on({
        "focus": function(event) {
            $(event.target).select();
        },
        "keyup": function(event) {
            $(event.target).val(function(index, value) {
                return value.replace(/\[^A-Za-z]/g, "")
                    .replace(/[^0-9-,]/g, '') + '%';
            });
        }
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
    $("#valorOferta").on({
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
    $("#valOferGana").on({
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
    $("#vtIVA1").on({
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


    $(document).ready(function() {
        $('#probando').click(function() {
            $('#id01').css('display', 'block');
        });
    });
    $(document).ready(function() {
        $('#probando2').click(function() {
            $('#id01').css('display', 'none');
        });
    });

    $(document).ready(function() {
        $('#probando21').click(function() {
            $('#id03').css('display', 'block');
        });
    });

    $(document).ready(function() {
        $('#probando22').click(function() {
            $('#id03').css('display', 'none');
        });
    });



    $(document).ready(function() {
        $('#probando4').click(function() {
            $('#id02').css('display', 'block');
        });
    });

    $(document).ready(function() {
        $('#probando3').click(function() {
            $('#id02').css('display', 'none');
        });
    });

    $(document).ready(function() {
        $('#tipoPoliza').change(function(e) {
            if ($(this).val() === "0" || $(this).val() === "No") {
                $('#porcentajePOO').prop("value", '0');
                $('#porcentajePO').prop("hidden", true);
                $('#ofertaEnSeguimiento2').html('');
                $('#ofertaEnSeguimiento').html('<label for="seg"> Oferta en Seguimiento </label><br><?php
                                                                                                    $seg = $pdo->_comboboxdinamicoSC("seg", "nombre_seg");
                                                                                                    echo $seg;
                                                                                                    ?> ');
            } else {
                $('#porcentajePOO').prop("value", '0');
                $('#porcentajePO').prop("hidden", false);
                $('#ofertaEnSeguimiento').html('');
                $('#ofertaEnSeguimiento2').html('<label for="seg"> Oferta en Seguimiento </label><br><?php
                                                                                                        $seg = $pdo->_comboboxdinamicoSC("seg", "nombre_seg");
                                                                                                        echo $seg;
                                                                                                        ?> ');
            }
        })
    });

    $(document).ready(function() {
        $('#cerpree').change(function(e) {
            if ($(this).val() === "0" || $(this).val() === "2") {
                $('#id01').css('display', 'none');
            } else {
                $('#id01').css('display', 'block');
            }
        })
    });

    $(document).ready(function() {
        $('#indis').change(function(e) {
            if ($(this).val() === "0" || $(this).val() === "2") {
                $('#id03').css('display', 'none');
            } else {
                $('#id03').css('display', 'block');
            }
        })
    });
    $(document).ready(function() {
        $('#indis').change(function(e) {
            if ($(this).val() === "0" || $(this).val() === "3") {
                $('#id03').css('display', 'none');
            } else {
                $('#id03').css('display', 'block');
            }
        })
    });



    $(document).ready(function() {
        $('#cerpree').change(function(e) {
            if ($(this).val() === "0") {
                $('#probando').prop("hidden", false);
                $('#certificados1').prop("class", 'col-md-10');
                $('#valCepre').val("Pendiente");

            }
            if ($(this).val() === "1") {
                $('#probando').prop("hidden", false);
                $('#certificados1').prop("class", 'col-md-10');
                $('#valCepre').val("");
            }
            if ($(this).val() === "2") {
                $('#probando').prop("hidden", true);
                $('#certificados1').prop("class", 'col-md-12');
                $('#valCepre').val("No");
            }
        })
    });

    $(document).ready(function() {
        $('#indis').change(function(e) {
            if ($(this).val() === "0") {
                $('#probando21').prop("hidden", false);
                $('#certificados22').prop("class", 'col-md-10');
                $('#valIndi').val("Pendiente");

            }
            if ($(this).val() === "1") {
                $('#probando21').prop("hidden", false);
                $('#certificados22').prop("class", 'col-md-10');
                $('#valIndi').val("");
            }
            if ($(this).val() === "2") {
                $('#probando21').prop("hidden", true);
                $('#certificados22').prop("class", 'col-md-12');
                $('#valIndi').val("Si");
            }
            if ($(this).val() === "3") {
                $('#probando21').prop("hidden", true);
                $('#certificados22').prop("class", 'col-md-12');
                $('#valIndi').val("N/A");
            }
        })
    });


    $(document).ready(function() {
        $('#probando8').click(function() {
            $('#product1').val('');
        });
    });


    $(document).ready(function() {
        $('#nombre_tiproces').change(function(e) {

            $('#nombre_res').change(function(e) {

                if ($(this).val() === "5") {

                    $('#nombre_causal').html('<label for="causal"> Causales </label><select class="form-control" name="nombre_causal" id="nombre_causal" required><option value>Seleccione</option><option value="16">Por Definir</option></select>');
                }

            })

            if ($(this).val() === "1" || $(this).val() === "4" || $(this).val() === "12" || $(this).val() === "13" || $(this).val() === "23") {
                $('#estado').html('<label>Estado</label><br><select class="form-control" id="nombre_estado" name="nombre_estado"><option value="2">En Proceso</option><option value="1">Documentación enviada</option><option value="3">No participamos</option><option value="5">Suspendido</option></select>');
                $('#nombre_res').val('9');
                $('#nombre_causal').val('14');
                $('#errorCausal').html('');

            } else {
                $('#estado').html('<label>Estado</label><br><select class="form-control" id="nombre_estado" name="nombre_estado"><option value="2">En Proceso</option><option value="1">Documentación enviada</option><option value="3">No participamos</option><option value="4">Oferta presentada</option><option value="5">Suspendido</option></select>');
                $('#nombre_res').val('9');
                $('#nombre_causal').val('14');
                $('#errorCausal').html('');
            }

            if ($(this).val() === "5") {
                $('#estado').html('<label>Estado</label><br><select class="form-control" id="nombre_estado" name="nombre_estado"><option value="2">En Proceso</option><option value="5">Suspendido</option><option value="7">Oferta presentada - Estudio Mercado</option></select>');
                $('#nombre_res').val('9');
                $('#nombre_causal').val('14');
                $('#errorCausal').html('');
            }
            if ($(this).val() === "24") {
                $('#estado').html('<label>Estado</label><br><select class="form-control" id="nombre_estado" name="nombre_estado" required><option value> Seleccione </option><option value="1">Documentación enviada</option><option value="2">En Proceso</option><option value="3">No participamos</option></select>');
                $('#nombre_res').val('9');
                $('#nombre_causal').val('14');
                $('#nombre_estado').change(function(e) {

                    if ($(this).val() === "1") {
                        $('#nombre_res').html('<label for="result">Resultado </label><select class="form-control" name="nombre_res" id="nombre_res" required><option value>Seleccione</option><option value="1">Documentación Enviada</option></select>');

                    }
                })
            }
            if ($(this).val() === "28") {
                $('#estado').html('<label>Estado</label><br><select class="form-control" id="nombre_estado" name="nombre_estado"><option value="7">Oferta presentada - Estudio Mercado</option> <option value="3">No participamos</option></select>');
            }
            if ($(this).val() === "5") {
                $('#estado').html('<label>Estado</label><br><select class="form-control" id="nombre_estado" name="nombre_estado" required><option value>Seleccione</option></option><option value="5">Suspendido</option><option value="2">En Proceso</option><option value="7">Oferta presentada - Estudio Mercado</option> <option value="3">No participamos</select>');

                $('#nombre_estado').change(function(e) {

                    if ($(this).val() === "7") {
                        $('#nombre_res').html('<label for="result">Resultado </label><select class="form-control" name="nombre_res" id="nombre_res" required><option value>Seleccione</option><option value="1">Adjudicado</option><option value="5">Perdido</option></select>');
                    }
                })
                $('#nombre_estado').change(function(e) {
                    if ($(this).val() === "3") {
                        $('#nombre_res').html('<label for="result">Resultado </label><select class="form-control" name="nombre_res" id="nombre_res" required><option value>Seleccione</option><option value="6">No Participamos</option></select>');
                    }

                })
                $('#nombre_estado').change(function(e) {
                    if ($(this).val() === "2") {
                        $('#nombre_res').html('<label for="result">Resultado</label><select class="form-control" name="nombre_res" id="nombre_res" required> <option value>Seleccione</option> <option value="9">Por Definir</option> </select>');
                    }
                    $('#nombre_res').change(function(e) {

                        if ($(this).val() === "9") {
                            $('#nombre_causal').html('<label for="causal"> Causales </label><select class="form-control" name="nombre_causal" id="nombre_causal" required><option value>Seleccione</option><option value="16">Por Definir</option></select>');
                        }

                    })


                })
            }
            if ($(this).val() === "25") {
                $('#estado').html('<label>Estado</label><br><select class="form-control" id="nombre_estado" name="nombre_estado" required><option value>Seleccione</option></option><option value="2">En Proceso</option><option value="7">Oferta presentada - Estudio Mercado</option> <option value="3">No participamos</select>');

                $('#nombre_estado').change(function(e) {

                    if ($(this).val() === "7") {
                        $('#nombre_res').html('<label for="result">Resultado </label><select class="form-control" name="nombre_res" id="nombre_res" required><option value>Seleccione</option><option value="1">Adjudicado</option><option value="5">Perdido</option></select>');
                    }
                })
                $('#nombre_estado').change(function(e) {
                    if ($(this).val() === "3") {
                        $('#nombre_res').html('<label for="result">Resultado </label><select class="form-control" name="nombre_res" id="nombre_res" required><option value>Seleccione</option><option value="6">No Participamos</option></select>');
                    }

                })
                $('#nombre_estado').change(function(e) {
                    if ($(this).val() === "2") {
                        $('#nombre_res').html('<label for="result">Resultado </label><select class="form-control" name="nombre_res" id="nombre_res" required> <option value>Seleccione</option> <option value="9">Por Definir</option> </select>');
                    }
                    $('#nombre_res').change(function(e) {

                        if ($(this).val() === "9") {
                            $('#nombre_causal').html('<label for="causal"> Causales </label><select class="form-control" name="nombre_causal" id="nombre_causal" required><option value>Seleccione</option><option value="16">Por Definir</option></select>');
                        }

                    })


                })
            }
            if ($(this).val() === "2" || $(this).val() === "3" || $(this).val() === "6" || $(this).val() === "16" || $(this).val() === "7" || $(this).val() === "8" || $(this).val() === "26" || $(this).val() === "9" || $(this).val() === "10" || $(this).val() === "27" || $(this).val() === "11" || $(this).val() === "17" || $(this).val() === "22" || $(this).val() === "19" || $(this).val() === "20") {

                $('#estado').html('<label>Estado</label><br><select class="form-control" id="nombre_estado" name="nombre_estado"><option value="2">En Proceso</option><option value="3">No participamos</option><option value="7">Oferta presentada - Estudio Mercado</option><option value="5">Suspendido</option></select>');

            }
            if ($(this).val() === "6" || $(this).val() === "24" || $(this).val() === "25") {
                $('#product2').html('<div style="margin 1;"><label>Producto</label><br></div><select class="form-control" name="product" ><option value="">Seleccione</option><option value="Certificado digital">Certificado digital</option><option value="Colocation">Colocation</option><option value="Horas experto">Horas experto</option><option value="Laas procesamiento, almacenamiento">Laas procesamiento, almacenamiento</option><option value="Laas procesamiento, almacenamiento,pass">Laas procesamiento, almacenamiento,pass</option><option value="Pass">Pass</option></select><br>');
                $('#ofertaEnSeguimiento').html('');
                $('#ofertaEnSeguimiento2').html('<label for="seg"> Oferta en Seguimiento </label><br><?php
                                                                                                        $seg = $pdo->_comboboxdinamicoSC("seg", "nombre_seg");
                                                                                                        echo $seg;
                                                                                                        ?> ');
                $('#nombre_stadpro').val('8');
                $('#nombre_res').val('9');
                $('#nombre_causal').val('14');
                $('#errorCausal').html('');
                $('#vtIVA').css('display', 'block');
                $('#acum').css('display', 'block');
                $('#obligado').css('display', 'block');
                $('#ebitda').css('display', 'block');
                $('#tipoeventu').css('display', 'block');
                $('#vpn').css('display', 'block');
                $('#ordenc').css('display', 'block');
                $('#fechaoc').css('display', 'block');
                $('#fechafoc').css('display', 'block');
                $('#ctari').css('display', 'block');
                $('#targetari').css('display', 'block');
                $('#tarim').css('display', 'block');
                $('#ebitdatm').css('display', 'block');
                $('#vpntari').css('display', 'block');
                $('#vtIVA1').prop("value", 'Pendiente');
                $('#acum1').prop("value", 'Nube Privada II');
                $('#obligado1').prop("value", 'Pendiente');
                $('#ebitda1').prop("value", '0%');
                $('#tipoeventu1').prop("value", 'Pendiente');
                $('#vpn1').prop("value", 'Pendiente');
                $('#ordenc1').prop("value", 'Pendiente');
                $('#fechaoc1').prop("value", '1000-01-01');
                $('#fechafoc1').prop("value", '1000-01-01');
                $('#ctari1').prop("value", 'Pendiente');
                $('#targetari1').prop("value", 'Pendiente');
                $('#tarim1').prop("value", 'Pendiente');
                $('#ebitdatm1').prop("value", '0%');
                $('#vpntari1').prop("value", 'Pendiente');
            } else {
                $('#product2').html('<div class="row justify-content center"><div class="col-md-12"><label for="product">Producto</label></div><div class="col-md-10"><textarea class="form-control" type="product1" name="product" id="product1"></textarea></div><div class="col-md-1"><input class="btn btn-primary" type="button" id="probando5" value="+" style="color: #fff!important;background-color: #092e6e!important;"></div></div>');
                $('#product1').css('pointer-events', 'none');
                $('#nombre_res').val('9');
                $('#nombre_causal').val('14');
                $('#errorCausal').html('');
                $('#ebitda').css('display', 'none');
                $('#tipoeventu').css('display', 'none');
                $('#vpn').css('display', 'none');
                $('#ordenc').css('display', 'none');
                $('#fechaoc').css('display', 'none');
                $('#fechafoc').css('display', 'none');
                $('#ctari').css('display', 'none');
                $('#targetari').css('display', 'none');
                $('#tarim').css('display', 'none');
                $('#ebitdatm').css('display', 'none');
                $('#vpntari').css('display', 'none');
                $('#vtIVA1').prop("value", 'Pendiente');
                $('#acum1').prop("value", 'Nube Privada II');
                $('#obligado1').prop("value", 'Pendiente');
                $('#ebitda1').prop("value", '0%');
                $('#tipoeventu1').prop("value", 'Pendiente');
                $('#vpn1').prop("value", 'Pendiente');
                $('#ordenc1').prop("value", 'Pendiente');
                $('#fechaoc1').prop("value", '1000-01-01');
                $('#fechafoc1').prop("value", '1000-01-01');
                $('#ctari1').prop("value", 'Pendiente');
                $('#targetari1').prop("value", 'Pendiente');
                $('#tarim1').prop("value", 'Pendiente');
                $('#ebitdatm1').prop("value", '0%');
                $('#vpntari1').prop("value", 'Pendiente');
            }

            $(document).ready(function() {
                $('#probando5').click(function() {
                    $('#id02').css('display', 'block');
                });
            });

            $('#nombre_estado').change(function(e) {


                if ($(this).val() === "4") {
                    $('#nombre_res').val('7');
                }
                if ($(this).val() === "3") {
                    $('#nombre_res').val('6');
                    $('#nombre_causal').focus();
                    $('#nombre_causal').val('');
                    $('#errorCausal').html('Es obligatorio este campo, el estado de la licitación es no participamos.');

                    $('#nombre_causal').change(function(e) {
                        $('#errorCausal').html('');
                    })
                }
                if ($(this).val() === "1" || $(this).val() === "2" || $(this).val() === "5") {
                    $('#nombre_res').val('9');
                    $('#nombre_causal').val('14');
                    $('#errorCausal').html('');
                }

            })


        })
    });

    $(document).ready(function() {
        $('#nombre_tiproces').change(function(e) {
            if ($(this).val() === "5") {
                $('#nombre_aboga').html('<label for="aboga">Abogado Asignado</label><br><select class="form-control" id="nombre_aboga" name="nombre_aboga"><option value="6">N/A</option>');

            }
            if ($(this).val() === "1" || $(this).val() === "2" || $(this).val() === "3" || $(this).val() === "4" || $(this).val() === "28" || $(this).val() === "7" ||
                $(this).val() === "8" || $(this).val() === "9" || $(this).val() === "10" || $(this).val() === "11" || $(this).val() === "12" || $(this).val() === "13" || $(this).val() === "14" ||
                $(this).val() === "15" || $(this).val() === "16" || $(this).val() === "17" || $(this).val() === "18" || $(this).val() === "19" || $(this).val() === "20" || $(this).val() === "21" ||
                $(this).val() === "23") {
                $('#nombre_aboga').html('<label for="aboga">Abogado Asignado</label><?php
                                                                                    $aboga = $pdo->_comboboxdinamico("aboga", "nombre_aboga");
                                                                                    echo $aboga;
                                                                                    ?> ');

            }

            if ($(this).val() === '24' || $(this).val() === '25') {
                $('#segmento').html('<div class="form-group"><label for="segmento"> Segmento NP </label> <select name="segmento" id="segmento" class ="form-control"><option value =""> </option><option value ="Google"> Google </option> <option value ="Microsoft Azure" > Microsoft Azure </option> <option value ="Amazon aws" > Amazon aws </option> <option value ="IBM" > IBM </option> <option value ="Oracle" > Oracle </option> </select></div>');
            } else {
                $('#segmento').html('');
            }




        })
    });


    $(document).ready(function() {
        $('#nombre_tiproces').change(function(e) {
            if ($(this).val() === "5") {
                $('#nombre_aboga').html('<label for="aboga">Abogado Asignado</label><br><select class="form-control" id="nombre_aboga" name="nombre_aboga"><option value="6">N/A</option></select>');
                $('#nombre_stadpro').html('<label for=  "stadpro">Estado del proyecto</label><br><select class="form-control" name="nombre_stadpro" id="nombre_stadpro"><option value="2">Pliegos</option></select>');
                $('#errorAbogado').html('');
            } else if ($(this).val() == "28") {
                $('#nombre_aboga').html('<label for="aboga">Abogado Asignado</label><br><select class="form-control" id="nombre_aboga" name="nombre_aboga"><option value="6">N/A</option></select>');
                $('#nombre_stadpro').html('<label for=  "stadpro">Estado del proyecto</label><br><select class="form-control" name="nombre_stadpro" id="nombre_stadpro"><option value="8">Evento CCE</option></select>');
                $('#estado').html('<label>Estado</label><br><select class="form-control" id="nombre_estado" name="nombre_estado"><option value="2">En Proceso</option><option value="4">Oferta presentada</option></select>');
                $('#cartaManifestacion').html('<label for="rfcarma"> Carta de manifestación de interes </label><input type="text" name="rfcarma" class="form-control" value="N/A">');
                $('#certi').html('<div class="row justify-content center"><div class="col-md-12"><label for="cerpree">Requiere certificados</label></div><div class="col-md-10" id="certificados1"><select id="cerpree" class="form-control"><option value="2">No</option><option value="1">Si</option><option value="2">No</option></select></div><div class="col-md-1"><input class="btn btn-primary" type="button" id="probando" value="+" style="color: #fff!important;background-color: #092e6e!important;"></div></div>');
                $('#otro').html('<label>Otro:</label><input type="text" name="cerpree[]" id="valCepre" value="No">');
                $('#poliza').html('<label for="tipoPoliza">Requiere poliza</label><select name="tipoPoli" id="tipoPoliza" class="form-control"><option value="No">No</option></select>');
            }
            if ($(this).val() === "1" || $(this).val() === "2" || $(this).val() === "3" || $(this).val() === "4" || $(this).val() === "7" ||
                $(this).val() === "8" || $(this).val() === "9" || $(this).val() === "10" || $(this).val() === "11" || $(this).val() === "12" || $(this).val() === "13" || $(this).val() === "14" ||
                $(this).val() === "15" || $(this).val() === "16" || $(this).val() === "17" || $(this).val() === "18" || $(this).val() === "19" || $(this).val() === "20" || $(this).val() === "21" ||
                $(this).val() === "23") {
                $('#nombre_aboga').html('<label for="aboga">Abogado Asignado</label><?php
                                                                                    $aboga = $pdo->_comboboxdinamico("aboga", "nombre_aboga");
                                                                                    echo $aboga;
                                                                                    ?> ');

                $('#nombre_stadpro').html('<label for="stadpro">Estado del proyecto</label><br><select class="form-control" name="nombre_stadpro" id="nombre_stadpro"><option value> Seleccione </option><option value="1">Prepliegos</option><option value="2">Pliegos</option><option value="8">Evento CCE</option></select>');
                //$('#certi').html('<div class="col-md-12"><label for="cerpree">Requiere certificados</label></div><div class="col-md-10" id="certificados1"><select id="cerpree" class="form-control"><option value="0">Pendiente</option><option value="1">Si</option><option value="2">No</option></select></div><div class="col-md-1"><input class="btn btn-primary" type="button" id="probando" value="+" style="color: #fff!important;background-color: #092e6e!important;"></div>');
                //$('#otro').html('<label>Otro:</label><input type="text" name="cerpree[]" id="valCepre" value="Pendiente">');
                $('#poliza').html(' <label for="tipoPoliza">Requiere poliza</label><select name="tipoPoli" id="tipoPoliza" class="form-control"><option value="Pendiente">Pendiente</option><option value="Garantia de seriedad de la oferta">Garantia de seriedad de la oferta</option><option value="No">No</option></select>');
            }



        })
    });



    function nitBuscar(str) {
        if (str.length == 0) {
            document.getElementById("entidad").value = "";
            return;
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("entidad").value = this.responseText;
                }
            };
            xmlhttp.open("GET", "function/opcionesNit.php?q=" + str, true);
            xmlhttp.send();
        }
    }

    $(document).ready(function() {
        $('#ejecu').on("keyup input", function() {
            var filtro = $('#ejecu').val();
            $.ajax({
                type: "POST",
                url: "function/relacionEjecutivos.php",
                data: {
                    'filtro': filtro
                },
                beforeSend: function() {
                    $("#search-box").css("background", "#FFF url(assets/imagenes/LoaderIcon.gif) no-repeat 165px");
                },
                success: function(data) {
                    if (filtro === "") {
                        $("#suggesstion-box").hide();
                        $("#suggesstion-box").html('');
                        $("#search-box").css("background", "#FFF");
                    } else {
                        $("#suggesstion-box").show();
                        $("#suggesstion-box").html(data);
                        $("#search-box").css("background", "#FFF");
                    }
                }
            });
        })
    });


    $(document).ready(function() {
        $('#plazoEjecucion,#Presupuesto').on("keyup input", function() {
            var valorOferta1 = $('#Presupuesto').val();
            var plazoEjecucion = $('#plazoEjecucion').val();
            var valorOferta = valorOferta1.replace(/,/g, "");
            var calculo = valorOferta / plazoEjecucion;
            var mensualidad = number_format(calculo);
            $('#mensualidad').val(mensualidad);
        })
    });


    function selectCountry(ejecutivo, consultor, regional, sector) {
        $('#nombre_reg').val(regional);
        $('#ejecu').val(ejecutivo);
        $('#consul').val(consultor);
        $('#nombre_concepto').val(sector);
        $("#suggesstion-box").hide();
    }

    $('#nombre_stadpro').change(function(e) {
        if ($(this).val() === '1') {
            $('#nombre_estado option[value="1"]').hide();
            $('#nombre_estado option[value="4"]').hide();
            $('#nombre_estado option[value="7"]').hide();
            $('#nombre_res option[value="1"]').hide();
            $('#nombre_res option[value="2"]').hide();
            $('#nombre_res option[value="3"]').hide();
            $('#nombre_res option[value="4"]').hide();
            $('#nombre_res option[value="5"]').hide();
            $('#nombre_res option[value="7"]').hide();
        } else {
            $('#nombre_res option[value="1"]').show();
            $('#nombre_res option[value="2"]').show();
            $('#nombre_res option[value="3"]').show();
            $('#nombre_res option[value="4"]').show();
            $('#nombre_res option[value="5"]').show();
            $('#nombre_res option[value="7"]').show();
            $('#nombre_estado option[value="1"]').show();
            $('#nombre_estado option[value="4"]').show();
            $('#nombre_estado option[value="7"]').show();
        }
    })

    $(document).on("click", "input[id='checkboxx1']", function() {

        var principal = $("#product1").val();
        var nuevo = $("#checkboxx1").val();
        $('#product1').prop("value", principal + ',' + nuevo);

    });
    $(document).on("click", "input[id='checkboxx2']", function() {

        var principal = $("#product1").val();
        var nuevo = $("#checkboxx2").val();
        $('#product1').prop("value", principal + ',' + nuevo);
    });
    $(document).on("click", "input[id='checkboxx3']", function() {

        var principal = $("#product1").val();
        var nuevo = $("#checkboxx3").val();
        $('#product1').prop("value", principal + ',' + nuevo);
    });
    $(document).on("click", "input[id='checkboxx4']", function() {
        var principal = $("#product1").val();
        var nuevo = $("#checkboxx4").val();
        $('#product1').prop("value", principal + ',' + nuevo);
    });
    $(document).on("click", "input[id='checkboxx5']", function() {
        var principal = $("#product1").val();
        var nuevo = $("#checkboxx5").val();
        $('#product1').prop("value", principal + ',' + nuevo);
    });
    $(document).on("click", "input[id='checkboxx6']", function() {
        var principal = $("#product1").val();
        var nuevo = $("#checkboxx6").val();
        $('#product1').prop("value", principal + ',' + nuevo);
    });
    $(document).on("click", "input[id='checkboxx7']", function() {

        var principal = $("#product1").val();
        var nuevo = $("#checkboxx7").val();
        $('#product1').prop("value", principal + ',' + nuevo);
    });
    $(document).on("click", "input[id='checkboxx8']", function() {

        var principal = $("#product1").val();
        var nuevo = $("#checkboxx8").val();
        $('#product1').prop("value", principal + ',' + nuevo);
    });
    $(document).on("click", "input[id='checkboxx9']", function() {
        var principal = $("#product1").val();
        var nuevo = $("#checkboxx9").val();
        $('#product1').prop("value", principal + ',' + nuevo);
    });
    $(document).on("click", "input[id='checkboxx10']", function() {
        var principal = $("#product1").val();
        var nuevo = $("#checkboxx10").val();
        $('#product1').prop("value", principal + ',' + nuevo);
    });
    $(document).on("click", "input[id='checkboxx11']", function() {
        var principal = $("#product1").val();
        var nuevo = $("#checkboxx11").val();
        $('#product1').prop("value", principal + ',' + nuevo);
    });
    $(document).on("click", "input[id='checkboxx12']", function() {

        var principal = $("#product1").val();
        var nuevo = $("#checkboxx12").val();
        $('#product1').prop("value", principal + ',' + nuevo);
    });
    $(document).on("click", "input[id='checkboxx13']", function() {

        var principal = $("#product1").val();
        var nuevo = $("#checkboxx13").val();
        $('#product1').prop("value", principal + ',' + nuevo);
    });
    $(document).on("click", "input[id='checkboxx14']", function() {
        var principal = $("#product1").val();
        var nuevo = $("#checkboxx14").val();
        $('#product1').prop("value", principal + ',' + nuevo);
    });
    $(document).on("click", "input[id='checkboxx15']", function() {
        var principal = $("#product1").val();
        var nuevo = $("#checkboxx15").val();
        $('#product1').prop("value", principal + ',' + nuevo);
    });
    $(document).on("click", "input[id='checkboxx16']", function() {
        var principal = $("#product1").val();
        var nuevo = $("#checkboxx16").val();
        $('#product1').prop("value", principal + ',' + nuevo);
    });
    $(document).on("click", "input[id='checkboxx17']", function() {

        var principal = $("#product1").val();
        var nuevo = $("#checkboxx17").val();
        $('#product1').prop("value", principal + ',' + nuevo);
    });
    $(document).on("click", "input[id='checkboxx18']", function() {

        var principal = $("#product1").val();
        var nuevo = $("#checkboxx18").val();
        $('#product1').prop("value", principal + ',' + nuevo);
    });




    function number_format(nStr) {
        nStr += '';
        x = nStr.split('.');
        x1 = x[0];
        x2 = x.length > 1 ? '.' + x[1] : '';
        var rgx = /(\d+)(\d{3})/;
        while (rgx.test(x1)) {
            x1 = x1.replace(rgx, '$1' + ',' + '$2');
        }
        return x1 + x2;
    }

    /*
            window.onload = function() {
                var fecha = new Date(); //Fecha actual
                var mes = fecha.getMonth() + 1; //obteniendo mes
                var dia = fecha.getDate(); //obteniendo dia
                var ano = fecha.getFullYear(); //obteniendo año
                if (dia < 10)
                    dia = '0' + dia; //agrega cero si el menor de 10
                if (mes < 10)
                    mes = '0' + mes //agrega cero si el menor de 10
                document.getElementById('fCreacion').value = ano + "-" + mes + "-" + dia;
            }
            */
</script>