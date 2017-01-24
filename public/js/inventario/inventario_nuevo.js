$(document).ready(function () {
    var $formInventario    = $('#formInventario'),
        $divFormInventario = $('#divFormInventario'),
        $divFormProducto   = $('#divFormProducto');

    // ocultar form productos
    $divFormProducto.addClass('hide');

    // validaciones form
    $formInventario.validate({
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
    agregaValidacionesElementos($formInventario);
    // fin validaciones

    $('.selectpicker').selectpicker({
        size: 4
    });

    // guardar
    $('#guardarProductoInventario').on('click', function () {
        var url = $(this).data('url');

        if ($formInventario.valid()) {
            $.ajax({
                url:        $formInventario.attr('action'),
                type:       'post',
                dataType:   'json',
                data:       $formInventario.serialize(),
                beforeSend: function () {
                    $('#guardarProductoInventario').attr('disabled', true);
                    $('#loadingInventario').removeClass('hide');
                }

            }).done(function (respuesta) {
                console.log(respuesta.estatus);
                $('#guardarProductoInventario').attr('disabled', false);
                $('#loadingInventario').addClass('hide');

                if (respuesta.estatus === 'OK') {
                    swal({
                        title:            '¡Éxito!',
                        text:             'Producto agregado al inventario con éxito.',
                        type:             'success',
                        showCancelButton: false
                    }, function () {
                        window.location.href = url;
                    });
                }

                if (respuesta.estatus === 'fail') {
                    swal('Error', 'Ocurrió un error al agregar el producto al inventario. Intente de nuevo.', 'warning');
                }

            }).fail(function (jqXHR, textStatus, errorThrown) {
                console.log(textStatus + ': ' + errorThrown);
                $('#guardarProductoInventario').attr('disabled', false);
                $('#loadingInventario').addClass('hide');
                swal('Error', 'Ocurrió un error al agregar el producto al inventario. Intente de nuevo.', 'warning');
            });
        }
    });

    // change para anexar otro producto
    $('#producto').on('change', function () {
        if ($(this).val() === '') {
            return false;
        }

        // si es otro, mostrar el form de captura de producto
        if ($(this).val() === '-1') {
            $divFormInventario.addClass('hide');
            $divFormProducto.removeClass('hide');
        }
    });
});

// recargar combo de producto después de agregar uno nuevo
function recargarComboProductos() {
    $.ajax({
        url:        $('#producto').data('url'),
        type:       'post',
        dataType:   'json',
        data:       {
            _token: $('#formInventario').find('input[name="_token"]').val()
        }

    }).done(function (respuesta) {
        console.log(respuesta.estatus);
        $('#producto').html(respuesta.html);
        $('#producto').selectpicker({
            size: 4
        });

    }).fail(function (jqXHR, textStatus, errorThrown) {
        console.log(textStatus + ': ' + errorThrown);
        swal('Error', 'Ocurrió un error al recargar el combo de productos. Intente de nuevo.', 'warning');
    });
}