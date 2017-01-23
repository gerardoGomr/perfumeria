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
        if ($formInventario.valid()) {

            $.ajax({
                url:        $formInventario.attr('action'),
                type:       'post',
                dataType:   'json',
                data:       $formInventario.serialize(),
                beforeSend: function () {
                    $('#loading').modal('show');
                }

            }).done(function (respuesta) {
                console.log(respuesta.estatus);
                $('#loading').modal('hide');

            }).fail(function (jqXHR, textStatus, errorThrown) {
                console.log(textStatus + ': ' + errorThrown);
                $('#loading').modal('hide');
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