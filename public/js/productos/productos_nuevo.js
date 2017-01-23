$(document).ready(function () {
    var acordesAgregados   = 0,
        notasAgregadas     = 0,
        $formProducto      = $('#formProducto'),
        $formInventario    = $('#formInventario'),
        $divFormInventario = $('#divFormInventario'),
        $divFormProducto   = $('#divFormProducto');

    // validaciones form
    $formProducto.validate({
        highlight: function (input) {
            $(input).parents('.form-line').addClass('error');
        },
        unhighlight: function (input) {
            $(input).parents('.form-line').removeClass('error');
        },
        errorPlacement: function (error, element) {
            $(element).parents('.form-group').append(error);
        }
    });
    agregaValidacionesElementos($formProducto);
    // fin validaciones

    $('#tipoProducto').on('change', function () {
        if ($(this).val() === '1') {
            $('#capturaPerfume').removeClass('hide');
        } else {
            $('#capturaPerfume').addClass('hide');
        }
    });

    $('.selectpicker').selectpicker({
        size: 4
    });

    // agregar nuevo acorde
    $('#agregarAcorde').on('click', function () {
        if ($('#acordes').val() !== '') {
            ++acordesAgregados;
            var acordeId = $('#acordes').val(),
                acorde   = $('#acordes option:selected').text(),
                html     = '<tr id="acorde_' + acordesAgregados + '">' +
                '<td>' + acorde + '<input type="hidden" name="acordes[]" value="' + acordeId + '"></td>' +
                '<td><button class="btn bg-danger btn-xs waves-effect quitarAcorde" type="button" data-toggle="tooltip" title="Quitar acorde" data-numero="' + acordesAgregados + '"><i class="fa fa-times"></i></button></td>' +
                '</tr>';

            $('#tbodyAcordes').append(html);
            $('#leyendaAcordes').addClass('hide');
            $('#tablaAcordes').removeClass('hide');

        }
    });

    // eliminar acorde
    $('#tbodyAcordes').on('click', 'button.quitarAcorde', function () {
        var acordeActual = $(this).data('numero');
        $('#acorde_' + acordeActual).remove();

        acordesAgregados--;

        if (acordesAgregados === 0) {
            $('#leyendaAcordes').removeClass('hide');
            $('#tablaAcordes').addClass('hide');
        }
    });

    // agregar nota
    $('#agregarNota').on('click', function () {
        if ($('#notas').val() !== '') {
            ++notasAgregadas;

            var notaId = $('#notas').val(),
                nota   = $('#notas option:selected').text(),
                html   = '<tr id="nota_' + notasAgregadas + '">' +
                    '<td>' + nota + '<input type="hidden" name="notas[]" value="' + notaId + '"></td>' +
                    '<td><button class="btn bg-danger btn-xs waves-effect quitarNota" type="button" data-toggle="tooltip" title="Quitar nota" data-numero="' + notasAgregadas + '"><i class="fa fa-times"></i></button></td>' +
                    '</tr>';

            $('#tbodyNotas').append(html);
            $('#leyendaNotas').addClass('hide');
            $('#tablaNotas').removeClass('hide');

        }
    });

    // eliminar nota
    $('#tbodyNotas').on('click', 'button.quitarNota', function () {
        var notaActual = $(this).data('numero');
        $('#nota_' + notaActual).remove();

        notasAgregadas--;

        if (notasAgregadas === 0) {
            $('#leyendaNotas').removeClass('hide');
            $('#tablaNotas').addClass('hide');
        }
    });

    // guardar
    $('#guardarProducto').on('click', function () {
        if ($formProducto.valid()) {

            $.ajax({
                url:        $formProducto.attr('action'),
                type:       'post',
                dataType:   'json',
                data:       $formProducto.serialize(),
                beforeSend: function () {
                    $('#loading').removeClass('hide');
                    $('#guardarProducto').attr('disabled', true);
                }

            }).done(function (respuesta) {
                console.log(respuesta.estatus);
                $('#loading').addClass('hide');
                $('#guardarProducto').attr('disabled', false);

                if (respuesta.estatus === 'OK') {
                    swal({
                        title:            '¡Éxito!',
                        text:             'Producto guardado con éxito. Continue con el registro de inventario',
                        type:             'success',
                        showCancelButton: false
                    }, function () {
                        $divFormProducto.addClass('hide');
                        $divFormInventario.removeClass('hide');
                    });
                }

                if (respuesta.estatus === 'fail') {
                    swal('Error', 'Ocurrió un error al guardar el producto. Intente de nuevo.', 'warning');
                }

            }).fail(function (jqXHR, textStatus, errorThrown) {
                console.log(textStatus + ': ' + errorThrown);
                $('#loading').addClass('hide');
                $('#guardarProducto').attr('disabled', false);
                swal('Error', 'Ocurrió un error al guardar el producto. Intente de nuevo.', 'warning');
            });
        }
    });
});