/**===================================
 * CARGAR TABLA DINÁMICA DE PRODUCTOS
 ===================================*/
// $.ajax({

//     url: "ajax/tablaProducto.ajax.php",
//     success: function (respuesta) {
//         // Sólo se descomenta para mostrar errores.
//         console.log("respuesta", respuesta);

//     }

// })
/**Se usan para una carga rápid de datos.
 * "deferRender": true,
     "retrieve": true,
     "processing": true,

 */
tablaProducto = $(".tablaProd").DataTable({
    ajax: "ajax/tablaProducto.ajax.php",
    deferRender: true,
    retrieve: true,
    processing: true,
    language: {
        sProcessing: "Procesando...",
        sLengthMenu: "Mostrar _MENU_ registros",
        sZeroRecords: "No se encontraron resultados",
        sEmptyTable: "Ningún dato disponible en esta tabla",
        sInfo: "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
        sInfoEmpty: "Mostrando registros del 0 al 0 de un total de 0",
        sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
        sInfoPostFix: "",
        sSearch: "Buscar:",
        sUrl: "",
        sInfoThousands: ",",
        sLoadingRecords: "Cargando...",
        oPaginate: {
            sFirst: "Primero",
            sLast: "Último",
            sNext: "Siguiente",
            sPrevious: "Anterior",
        },
        oAria: {
            sSortAscending: ": Activar para ordenar la columna de manera ascendente",
            sSortDescending:
                ": Activar para ordenar la columna de manera descendente",
        },
    },
    //para usar los botones
    responsive: "true",
    dom:
        "<'row'<'col-sm-12 col-md-4'l><'col-sm-12 col-md-4'B><'col-sm-12 col-md-4'f>>" +
        "<'row'<'col-sm-12'tr>>" +
        "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
    buttons: [
        {
            extend: "copyHtml5",
            text: '<i class="fas fa-copy text-white"></i>',
            titleAttr: "Copiar al portapapeles",
            className: "btn btn-primary mrbtn",
            title: "Datos de productos",
        },
        {
            extend: "csvHtml5",
            text: '<i class="fas fa-file-excel text-white"></i> ',
            titleAttr: "Desacargar en CSV",
            className: "btn btn-primary mrbtn",
            title: "Datos de productos",
        },
        {
            extend: "excelHtml5",
            text: '<i class="fas fa-file-excel text-white"></i> ',
            titleAttr: "Exportar a Excel",
            className: "btn btn-primary mrbtn",
            title: "Datos de productos",
        },
        {
            extend: "pdfHtml5",
            text: '<i class="fas fa-file-pdf text-white"></i> ',
            titleAttr: "Exportar a PDF",
            className: "btn btn-primary mrbtn ",
            orientation: "landscape",
            title: "Datos de productos",
            pageSize: "LEGAL",
            customize: function (doc) {
                doc.defaultStyle.fontSize = 8;
            },
        },
        {
            extend: "print",
            text: '<i class="fa fa-print text-white"></i> ',
            titleAttr: "Imprimir",
            className: "btn btn-primary mrbtn",
            title: "Datos de productos",
        },
    ],
});
/**-====================Fin tabla productos */
function gestProducto() {
    const $formPr = d.getElementById("formPr"),
        inputsPr = d.querySelectorAll("#formPr input"),
        $claveArt = d.getElementById("claveArt"),
        $claveAltA = d.getElementById("claveAltA"),
        $nombreArt = d.getElementById("nombreArt"),
        $descrArt = d.getElementById("descrArt"),
        $fotoArt = d.getElementById("fotoArt"),
        $selectCat = d.getElementById("selectCat"),
        $selectsubcat = d.getElementById("selectsubcat"),
        $selectdep = d.getElementById("selectdep"),
        $selectUC = d.getElementById("selectUC"),
        $selectUV = d.getElementById("selectUV"),
        $precv = d.getElementById("precv"),
        $invmin = d.getElementById("invmin"),
        $invmax = d.getElementById("invmax"),
        $selectUImp = d.getElementById("selectUImp"),
        $recArt = d.getElementById("recArt"),
        $granArt = d.getElementById("granArt"),
        $modalPr = d.getElementById("modalPr"),
        $offer1 = d.getElementById("offer1"),
        $offer2 = d.getElementById("offer2");
    /**------Incremento de clave */
    $modalPr.addEventListener("click", (e) => {
        // console.log("Hola");
        traerIdPr();
    });
    /**-------Fin incremento de clave. */
}
d.addEventListener("DOMContentLoaded", gestProducto);
function traerIdPr() {
    const $claveAltA = d.getElementById("claveAltA");
    // console.log("Hola");
    let data = new FormData;
    data.append("traerCodePr", 'true');
    fetch("ajax/producto.ajax.php", {
        method: "POST",
        body: data,
        cors: "cors",
    }).then((res) => (res.ok ? res.json() : Promise.reject(res)))
        .then((json) => {
            // console.log(json);
            const $codigo = Number((json.claveAlterna).substr(-1)) + 1;
            const $codigo2 = Number((json.claveAlterna).substr(-2)) + 1;
            if (!json.claveAlterna) {
                // console.log(json);
                $claveAltA.value = '00' + 1;
            } else if ($codigo2 < 10 && $codigo < 10) {
                $claveAltA.value = '00' + $codigo;
            } else if ($codigo == 10) {
                $claveAltA.value = '0' + $codigo;
            } else if ($codigo2 > 10) {
                if ($codigo2 > 10 && $codigo2 < 100) {
                    $claveAltA.value = '0' + $codigo2;
                } else {
                    $claveAltA.value = $codigo2;
                }
            }
        }).catch((err) => {
            // console.log('error', err);
            let message = err.statusText || "Ocurrió un error";
            $claveAltA.innerHTML = `<p>Error ${err.status}: ${message}</p>`;
        });
}