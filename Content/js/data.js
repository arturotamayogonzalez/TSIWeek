$(document).ready(function () {

    $('#tableView').DataTable({
        language: {
            "decimal": "",
            "emptyTable": "No hay información",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
            "infoEmpty": "Mostrando 0 a 0 de 0 Entradas",
            "infoFiltered": "(Filtrado de _MAX_ total entradas)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Mostrar _MENU_ Entradas",
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "search": "Buscar:",
            "zeroRecords": "Sin resultados encontrados",
            "paginate": {
                "first": "Primero",
                "last": "Ultimo",
                "next": "Siguiente",
                "previous": "Anterior"
            }
        }
    });

    //Date picker 
    $('.datepicker').datepicker({
        defaultDate: new Date(),
        autoclose: true,
        format: 'dd-mm-yyyy'
    });

    //Timepicker
    $('.timepicker').timepicker({
        showInputs: false
    });

    //#region 'Usuarios'
    //Alta de Usuarios
    $("#frmAltaUsuario").submit(function (event) {
        event.preventDefault(); //Detenemos evento submit
        var str = $(this).serialize(); //Serilizamos los parametros 
        var url = 'Controller/usuariosController.php';

        $.ajax({
            data: str,
            url: url,
            type: 'post',
            success: function (response) {
                $('#myModalAltaUsuario').modal('hide');
                $('#frmAltaUsuario').trigger("reset");

                if (response == "OK") {
                    alert('Alta de Usuario realizada con éxito.');
                } else {
                    alert(response);
                }
                location.reload();
            }
        });
    });

    $("#frmModUsuario").submit(function (event) {
        event.preventDefault(); //Detenemos evento submit
        var str = {
            Funcion: $('#mFuncion').val(),
            IdUsuario: $('#mIdUsuario').val(),
            Nombre: $('#mNombre').val(),
            Apellido_P: $('#mApellido_P').val(),
            Apellido_M: $('#mApellido_M').val(),
            Email: $('#mEmail').val(),
            Matricula: $('#mMatricula').val(),
            Estatus: $('#mEstatus').val(),
            Rol: $('#mRol').val()
        }; //Serilizamos los parametros 
        var url = 'Controller/usuariosController.php';

        $.ajax({
            data: str,
            url: url,
            type: 'post',
            success: function (response) {
                $('#myModalModUsuario').modal('hide');
                $('#frmModUsuario').trigger("reset");

                if (response == "OK") {
                    alert('Modificación de Usuario realizada con éxito.');
                } else {
                    alert(response);
                }
                location.reload();
            }
        });
    });

    $("#frmPassUsuario").submit(function (event) {
        event.preventDefault(); //Detenemos evento submit

        if ($('#passContrasena1').val() == $('#passContrasena2').val()) {
            var str = {
                Funcion: $('#passFuncion').val(),
                IdUsuario: $('#passIdUsuario').val(),
                Contrasena: $('#passContrasena1').val()
            }; //Serilizamos los parametros 
            var url = 'Controller/usuariosController.php';

            $.ajax({
                data: str,
                url: url,
                type: 'post',
                success: function (response) {
                    $('#myModalPassUsuario').modal('hide');
                    $('#passIdUsuario').trigger("reset");

                    if (response == "OK") {
                        alert('Modificación de Contraseña realizada con éxito.');
                    } else {
                        alert(response);
                    }
                    location.reload();
                }
            });
        } else {
            $('#passResp').html('Contraseñas ingresadas no son iguales, favor de verificar y volver a intentar.');
            document.getElementById("frmPassUsuario").reset();
            setTimeout(function () {
                $('#passResp').html("");
            }, 2000);
        }
    });

    $("body").on("click", "#tableView .PasswordUsuario", function () {
        $('#myModalPassUsuario').modal('show');
        $('#passIdUsuario').val($(this).attr("id"));
    });

    $("body").on("click", "#tableView .ModificarUsuario", function () {
        $('#myModalModUsuario').modal('show');
        $('#mIdUsuario').val($(this).attr("id"));
        $('#mNombre').val($(this).parents("tr").find("td").eq(0).text());
        $('#mApellido_P').val($(this).parents("tr").find("td").eq(1).text());
        $('#mApellido_M').val($(this).parents("tr").find("td").eq(2).text());
        $('#mEmail').val($(this).parents("tr").find("td").eq(3).text());
        $('#mMatricula').val($(this).parents("tr").find("td").eq(4).text());
        $('#mRol').val($(this).parents("tr").find("td").eq(6).text());
        if ($(this).parents("tr").find("td").eq(5).text() == 'Activo') {
            $('#mEstatus').val('A');
        } else {
            $('#mEstatus').val('B');
        }
    });

    $("body").on("click", ".EliminarUsuario", function () {
        if (confirm("¿Está seguro de eliminar el Usuarios?")) {
            var url = 'Controller/usuariosController.php';
            var str = {
                Funcion: 'eliminarUsuario',
                IdUsuario: $(this).attr("id")
            };
            var row = $(this).closest("tr");

            $.ajax({
                type: "post",
                url: url,
                data: str,
                success: function (response) {
                    if (response == "OK") {
                        alert('Eliminación de Usuario realizada con éxito.');
                        row.remove();
                    } else {
                        alert(response);
                    }
                }
            });
        }
    });
    //#endregion

    //#region 'Registro'
    $("body").on("click", ".EliminarRegistro", function () {
        if (confirm("¿Está seguro de eliminar el Registro?")) {
            var url = 'Controller/registrosController.php';
            var str = {
                Funcion: 'eliminarRegistro',
                IdRegistro: $(this).attr("id")
            };
            var row = $(this).closest("tr");

            $.ajax({
                type: "post",
                url: url,
                data: str,
                success: function (response) {
                    if (response == "OK") {
                        alert('Eliminación de Usuario realizada con éxito.');
                        row.remove();
                    } else {
                        alert(response);
                    }
                }
            });
        }
    });

    $("body").on("click", ".VerRegistro", function () {
        var url = 'Controller/registrosController.php';
        var str = {
            Funcion: 'verRegistro',
            IdRegistro: $(this).attr("id")
        };

        $('#myModalVerRegistro').modal('show');

        $.ajax({
            type: "post",
            url: url,
            data: str,
            success: function (response) {
                //console.log(response);
                $('#verRegistroConsultado').empty()
                $('#verRegistroConsultado').append(response);
            }
        });
    });

    $("body").on("click", ".EnviarRegistro", function () {
        var url = 'Controller/registrosController.php';
        var correo = $(this).attr("id");
        var str = {
            Funcion: 'enviarRegistro',
            IdRegistro: $(this).attr("id"),
            Nombre: $(this).parents("tr").find("td").eq(0).text()
        };

        //console.log(str);

        $.ajax({
            type: "post",
            url: url,
            data: str,
            success: function (response) {
                if (response == "OK") {
                    alert("Correo enviado exitosamente a la cuenta " + correo);
                } else {
                    alert(response);
                }
            }
        });
    });
    //#endregion

    //#region 'Eventos'
    $("#frmAltaEvento").submit(function (event) {
        event.preventDefault(); //Detenemos evento submit
        var str = $(this).serialize(); //Serilizamos los parametros 
        var url = 'Controller/eventoController.php';
        //console.log(str);

        $.ajax({
            data: str,
            url: url,
            type: 'post',
            success: function (response) {
                $('#myModalAltaEventos').modal('hide');
                $('#frmAltaEvento').trigger("reset");

                if (response == "OK") {
                    alert('Alta de Evento realizada con éxito.');
                    location.reload();
                } else {
                    alert(response);
                }
            }
        });
    });

    $("#frmModEvento").submit(function (event) {
        event.preventDefault(); //Detenemos evento submit
        var str = {
            Funcion: $('#mFuncion').val(),
            IdEvento: $('#mIdEvento').val(),
            NombreEvento: $('#mNombreEvento').val(),
            fechaIni: $('#mfechaIni').val(),
            fechaFin: $('#mfechaFin').val(),
            horaIni: $('#mhoraIni').val(),
            horaFin: $('#mhoraFin').val(),
            CategoriaEvento: $('#mCategoriaEvento').val(),
            CategoriaUbicacion: $('#mCategoriaUbicacion').val(),
            CategoriaPoniente: $('#mCategoriaPoniente').val()
        }; //Serilizamos los parametros 
        var url = 'Controller/eventoController.php';

        $.ajax({
            data: str,
            url: url,
            type: 'post',
            success: function (response) {
                $('#myModalAltaEventos').modal('hide');
                $('#frmModEvento').trigger("reset");

                if (response == "OK") {
                    alert('Modificación de Usuario realizada con éxito.');
                    location.reload();
                } else {
                    alert(response);
                }
            }
        });
    });

    $("body").on("click", ".EliminarEvento", function () {
        if (confirm("¿Está seguro de eliminar el Evento?")) {
            var url = 'Controller/eventoController.php';
            var str = {
                Funcion: 'eliminarEvento',
                IdEvento: $(this).attr("id")
            };
            var row = $(this).closest("tr");

            $.ajax({
                type: "post",
                url: url,
                data: str,
                success: function (response) {
                    if (response == "OK") {
                        alert('Eliminación de Evento realizada con éxito.');
                        row.remove();
                    } else {
                        alert(response);
                    }
                }
            });
        }
    });

    $("body").on("click", "#tableView .ModificarEvento", function () {
        $('#myModalModEventos').modal('show');
        $('#mIdEvento').val($(this).attr("id"));
        $('#mNombreEvento').val($(this).parents("tr").find("td").eq(0).text());
        $('#mfechaIni').val($(this).parents("tr").find("td").eq(1).text());
        $('#mfechaFin').val($(this).parents("tr").find("td").eq(2).text());
        $('#mhoraIni').val($(this).parents("tr").find("td").eq(3).text());
        $('#mhoraFin').val($(this).parents("tr").find("td").eq(4).text());
        $("#mCategoriaEvento option:contains(" + $(this).parents("tr").find("td").eq(5).text() + ")").attr('selected', true);
        $("#mCategoriaUbicacion option:contains(" + $(this).parents("tr").find("td").eq(6).text() + ")").attr('selected', true);
        $("#mCategoriaPoniente option:contains(" + $(this).parents("tr").find("td").eq(7).text() + ")").attr('selected', true);
    });
    //#endregion

    //#region 'Ponentes'
    $("#frmAltaPonente").submit(function (event) {
        event.preventDefault(); //Detenemos evento submit
        var str = {
            Funcion: $('#Funcion').val(),
            Cedula: $('#Cedula').val(),
            Nombre: $('#Nombre').val(),
            Apellido_P: $('#Apellido_P').val(),
            Apellido_M: $('#Apellido_M').val(),
            Descripcion: $('#Descripcion').val(),
            Tipo: $('#Tipo').val(),
            base64textarea: $('#base64textarea').val()
        }; //Serilizamos los parametros 
        var url = 'Controller/ponenteController.php';
        //console.log(str);

        $.ajax({
            data: str,
            url: url,
            type: 'post',
            success: function (response) {
                $('#myModalAltaPonente').modal('hide');
                $('#frmAltaPonente').trigger("reset");

                if (response == "OK") {
                    alert('Alta de Ponente realizada con éxito.');
                } else {
                    alert(response);
                }
                location.reload();
            }
        });
    });

    $("#frmModPonente").submit(function (event) {
        event.preventDefault(); //Detenemos evento submit
        var str = {
            Funcion: $('#mFuncion').val(),
            IdPonente: $('#mIdPonente').val(),
            Cedula: $('#mCedula').val(),
            Nombre: $('#mNombre').val(),
            Apellido_P: $('#mApellido_P').val(),
            Apellido_M: $('#mApellido_M').val(),
            Descripcion: $('#mDescripcion').val(),
            Tipo: $('#mTipo').val(),
            Estatus: $('#mEstatus').val()
        }; //Serilizamos los parametros 
        var url = 'Controller/ponenteController.php';

        $.ajax({
            data: str,
            url: url,
            type: 'post',
            success: function (response) {
                $('#myModalModPonente').modal('hide');
                $('#frmModPonente').trigger("reset");

                if (response == "OK") {
                    alert('Modificación de Usuario realizada con éxito.');
                } else {
                    alert(response);
                }
                location.reload();
            }
        });
    });

    $("#frmFotoPonente").submit(function (event) {
        event.preventDefault(); //Detenemos evento submit
        var str = {
            Funcion: $('#fotoFuncion').val(),
            IdPonente: $('#fotoIdPonente').val(),
            base64textarea: $('#fotobase64textarea').val()
        }; //Serilizamos los parametros 
        var url = 'Controller/ponenteController.php';
        //console.log(str);

        $.ajax({
            data: str,
            url: url,
            type: 'post',
            success: function (response) {
                $('#myModalFotoPonente').modal('hide');
                $('#frmFotoPonente').trigger("reset");

                if (response == "OK") {
                    alert('Actualización de Fotografía del Ponente realizada con éxito.');
                } else {
                    alert(response);
                }
                location.reload();
            }
        });
    });

    $("body").on("click", "#tableView .ModificarPonente", function () {
        $('#myModalModPonente').modal('show');
        $('#mIdPonente').val($(this).attr("id"));
        $('#mCedula').val($(this).parents("tr").find("td").eq(1).text());
        $('#mNombre').val($(this).parents("tr").find("td").eq(2).text());
        $('#mApellido_P').val($(this).parents("tr").find("td").eq(3).text());
        $('#mApellido_M').val($(this).parents("tr").find("td").eq(4).text());
        $('#mDescripcion').val($(this).parents("tr").find("td").eq(5).text());
        $('#mTipo').val($(this).parents("tr").find("td").eq(6).text());
        if ($(this).parents("tr").find("td").eq(7).text() == 'Activo') {
            $('#mEstatus').val('A');
        } else {
            $('#mEstatus').val('B');
        }
    });

    $("body").on("click", "#tableView .FotoPonente", function () {
        $('#myModalFotoPonente').modal('show');
        $('#fotoIdPonente').val($(this).attr("id"));
    });

    $("body").on("click", ".EliminarPonente", function () {
        if (confirm("¿Está seguro de eliminar el Ponente?")) {
            var url = 'Controller/ponenteController.php';
            var str = {
                Funcion: 'eliminarPonente',
                IdPonente: $(this).attr("id")
            };
            var row = $(this).closest("tr");

            $.ajax({
                type: "post",
                url: url,
                data: str,
                success: function (response) {
                    if (response == "OK") {
                        alert('Eliminación de Ponente realizada con éxito.');
                        row.remove();
                    } else {
                        alert(response);
                    }
                }
            });
        }
    });
    //#endregion

    //#region 'Categoria Evento'
    $("#frmAltaCEventos").submit(function (event) {
        event.preventDefault(); //Detenemos evento submit
        var str = $(this).serialize(); //Serilizamos los parametros 
        var url = 'Controller/cateventoController.php';
        //console.log(str);

        $.ajax({
            data: str,
            url: url,
            type: 'post',
            success: function (response) {
                $('#myModalAltaCEventos').modal('hide');
                $('#frmAltaCEventos').trigger("reset");

                if (response == "OK") {
                    alert('Alta de Categoria Evento realizada con éxito.');
                    location.reload();
                } else {
                    alert(response);
                }
            }
        });
    });

    $("body").on("click", ".EliminarCatEvento", function () {
        if (confirm("¿Está seguro de eliminar la Cetegoria del Evento?")) {
            var url = 'Controller/cateventoController.php';
            var str = {
                Funcion: 'eliminarCatEvento',
                IdCatEvento: $(this).attr("id")
            };
            var row = $(this).closest("tr");

            $.ajax({
                type: "post",
                url: url,
                data: str,
                success: function (response) {
                    if (response == "OK") {
                        alert('Eliminación de Categoria Evento realizada con éxito.');
                        row.remove();
                    } else {
                        alert(response);
                    }
                }
            });
        }
    });
    //#endregion

    //#region 'Asistencia'
    $("body").on("click", ".AsistenciaNoPresente", function () {
        (function ($) {
            $.get = function (key) {
                key = key.replace(/[\[]/, '\\[');
                key = key.replace(/[\]]/, '\\]');
                var pattern = "[\\?&]" + key + "=([^&#]*)";
                var regex = new RegExp(pattern);
                var url = unescape(window.location.href);
                var results = regex.exec(url);
                if (results === null) {
                    return null;
                } else {
                    return results[1];
                }
            }
        })(jQuery);


        var url = '../Controller/paselistaController.php';
        var str = {
            Funcion: 'NoPresente',
            IdLista: $(this).attr("id"),
            Evento: $.get("evento")
        };

        var row = $(this).closest("tr");
        var row0 = $(this).attr("id");
        var row1 = $(this).parents("tr").find("td").eq(0).text();
        var row2 = $(this).parents("tr").find("td").eq(1).text()
        var row3 = $(this).parents("tr").find("td").eq(2).text()

        //console.log(str);

        $.ajax({
            type: "post",
            url: url,
            data: str,
            success: function (response) {
                if (response == "OK") {
                    row.remove();

                    var valorLista =
                        '<tr id=' + row0 + '>' +
                        '<td>' + row1 + '</td>' +
                        '<td>' + row2 + '</td>' +
                        '<td>' + row3 + '</td>' +
                        '<td class="text-center" style="vertical-align:middle"><span class="label label-danger">No Presente</span></td>' +
                        '<td class="text-center" style="vertical-align:middle">' +
                        '<div class="row">' +
                        '<a id="' + row0 + '" class="AsistenciaPresente" href="javascript:;">' +
                        '<i class="fa fa-check" style="color:green"></i>' +
                        '</a>' +
                        '</div>' +
                        '</tr>';
                    $("#listaAsistencia").append(valorLista);
                } else {
                    console.log(response);
                }
            }
        });
    });

    $("body").on("click", ".AsistenciaPresente", function () {
        (function ($) {
            $.get = function (key) {
                key = key.replace(/[\[]/, '\\[');
                key = key.replace(/[\]]/, '\\]');
                var pattern = "[\\?&]" + key + "=([^&#]*)";
                var regex = new RegExp(pattern);
                var url = unescape(window.location.href);
                var results = regex.exec(url);
                if (results === null) {
                    return null;
                } else {
                    return results[1];
                }
            }
        })(jQuery);


        var url = '../Controller/paselistaController.php';
        var str = {
            Funcion: 'Presente',
            IdLista: $(this).attr("id"),
            Evento: $.get("evento")
        };

        var row = $(this).closest("tr");
        var row0 = $(this).attr("id");
        var row1 = $(this).parents("tr").find("td").eq(0).text();
        var row2 = $(this).parents("tr").find("td").eq(1).text()
        var row3 = $(this).parents("tr").find("td").eq(2).text()

        $.ajax({
            type: "post",
            url: url,
            data: str,
            success: function (response) {
                if (response == "OK") {
                    row.remove();

                    var valorLista =
                        '<tr id=' + row0 + '>' +
                        '<td>' + row1 + '</td>' +
                        '<td>' + row2 + '</td>' +
                        '<td>' + row3 + '</td>' +
                        '<td class="text-center" style="vertical-align:middle"><span class="label label-success">Presente</span></td>' +
                        '<td class="text-center" style="vertical-align:middle">' +
                        '<div class="row">' +
                        '<a id="' + row0 + '" class="AsistenciaNoPresente" href="javascript:;">' +
                        '<i class="fa fa-times" style="color:red"></i>' +
                        '</a>' +
                        '</div>' +
                        '</tr>';
                    $("#listaAsistencia").append(valorLista);
                } else {
                    console.log(response);
                }
            }
        });
    });
    //#endregion

    $("body").on("click", ".EnviarConstancia", function () {
        var url = 'Controller/constanciaController.php';
        var correo = $(this).parents("tr").find("td").eq(2).text();
        var str = {
            Funcion: 'envioConstancia',
            Evento: $(this).attr("id"),
            Nombre: $(this).parents("tr").find("td").eq(1).text(),
            Email: $(this).parents("tr").find("td").eq(2).text(),
            Taller: $(this).parents("tr").find("td").eq(0).text()
        };

        //console.log(str);
        var row = $(this).closest("tr");

        $.ajax({
            type: "post",
            url: url,
            data: str,
            success: function (response) {
                if (response == "OK") {
                    row.remove();
                    alert("Correo enviado exitosamente a la cuenta " + correo);
                } else {
                    alert(response);
                }
            }
        });
    });
});