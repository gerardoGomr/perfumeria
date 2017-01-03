$(document).ready(function () {
    $('#acordes, #notas').multiSelect();

    $('#tipoProducto').on('change', function () {
        if ($(this).val() === '1') {
            $('#capturaPerfume').removeClass('hide');
        } else {
            $('#capturaPerfume').addClass('hide');
        }
    })
});