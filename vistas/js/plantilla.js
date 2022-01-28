/*=============================================
LIMPIA EL FORMULARIO DE INGRESO DE PARQUES MEMORIALES
=============================================*/

$('.modal').on('hidden.bs.modal', function () {

    $(this).find('form')[0].reset(); //para borrar todos los datos que tenga los input, textareas, select.

    // $(".alert").remove(); //lo utilice para borrar la clase alert de mensaje de duplicidad

})
