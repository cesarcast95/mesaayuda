$(document).ready(function () {
    Insidencias.validacionGeneral('form-general');
    $('#nombre').on('change',function(){
        $('#slug').val($(this).val().toLowerCase().replace(/ /g, '-'))
    })
});
