/*=============================================
LIMPIA EL FORMULARIO DE INGRESO DE PARQUES MEMORIALES
=============================================*/

$('.modal').on('hidden.bs.modal', function () {

    $(this).find('form')[0].reset(); //para borrar todos los datos que tenga los input, textareas, select.

    // $(".alert").remove(); //lo utilice para borrar la clase alert de mensaje de duplicidad
})
/**-------Convertir en mayúsculas las letras ingresadas en caso de ser minúsculas. */
function mayusP(e) {
    e.value = e.value.toUpperCase();
}
// startDate: '0d' indica que no se puede seleccionar un día anterior al actual.
// $('.datepicker').datepicker({
//     format: 'yyyy-mm-dd 23:59:59',
//     startDate: '0d'
// });
/**=================================================================
 * TIME
 ===================================================================*/
const input = $('#iniHoraCat').clockpicker({
    placement: 'bottom',
    align: 'left',
    autoclose: true,
    'default': 'now'
});
const input2 = $('#finHoraCat').clockpicker({
    placement: 'bottom',
    align: 'left',
    autoclose: true,
    'default': 'now'
});
const input3 = $('#horLunesIni').clockpicker({
    placement: 'bottom',
    align: 'left',
    autoclose: true,
    'default': 'now'
});
const input4 = $('#horLunesFin').clockpicker({
    placement: 'bottom',
    align: 'left',
    autoclose: true,
    'default': 'now'
});
const input5 = $('#horMartesIni').clockpicker({
    placement: 'bottom',
    align: 'left',
    autoclose: true,
    'default': 'now'
});
const input6 = $('#horMartesFin').clockpicker({
    placement: 'bottom',
    align: 'left',
    autoclose: true,
    'default': 'now'
});
const input7 = $('#horMierIni').clockpicker({
    placement: 'bottom',
    align: 'left',
    autoclose: true,
    'default': 'now'
});
const input8 = $('#horMierFin').clockpicker({
    placement: 'bottom',
    align: 'left',
    autoclose: true,
    'default': 'now'
});
const input9 = $('#horJuevIni').clockpicker({
    placement: 'bottom',
    align: 'left',
    autoclose: true,
    'default': 'now'
});
const input10 = $('#horJuevFin').clockpicker({
    placement: 'bottom',
    align: 'left',
    autoclose: true,
    'default': 'now'
});
const input11 = $('#horVierIni').clockpicker({
    placement: 'bottom',
    align: 'left',
    autoclose: true,
    'default': 'now'
});
const input12 = $('#horVierFin').clockpicker({
    placement: 'bottom',
    align: 'left',
    autoclose: true,
    'default': 'now'
});
const input13 = $('#horSabIni').clockpicker({
    placement: 'bottom',
    align: 'left',
    autoclose: true,
    'default': 'now'
});
const input14 = $('#horSabFin').clockpicker({
    placement: 'bottom',
    align: 'left',
    autoclose: true,
    'default': 'now'
});
const input15 = $('#horDomIni').clockpicker({
    placement: 'bottom',
    align: 'left',
    autoclose: true,
    'default': 'now'
});
const input16 = $('#horDomFin').clockpicker({
    placement: 'bottom',
    align: 'left',
    autoclose: true,
    'default': 'now'
});