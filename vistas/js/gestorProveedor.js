/**===================================
 * CARGAR TABLA DINÁMICA DE CATEGORÍAS
 ===================================*/
// $.ajax({

//     url: "ajax/tablaProveedor.ajax.php",
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
tablaProveedor = $(".tablaProveedor").DataTable({
    "ajax": "ajax/tablaProveedor.ajax.php",
    "deferRender": true,
    "retrieve": true,
    "processing": true,
    "language": {

        "sProcessing": "Procesando...",
        "sLengthMenu": "Mostrar _MENU_ registros",
        "sZeroRecords": "No se encontraron resultados",
        "sEmptyTable": "Ningún dato disponible en esta tabla",
        "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
        "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0",
        "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix": "",
        "sSearch": "Buscar:",
        "sUrl": "",
        "sInfoThousands": ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
            "sFirst": "Primero",
            "sLast": "Último",
            "sNext": "Siguiente",
            "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }
    },
    //para usar los botones   
    responsive: "true",
    dom: "<'row'<'col-sm-12 col-md-4'l><'col-sm-12 col-md-4'B><'col-sm-12 col-md-4'f>>" +
        "<'row'<'col-sm-12'tr>>" +
        "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
    buttons: [
        {
            extend: 'copyHtml5',
            text: '<i class="fas fa-copy text-white"></i>',
            titleAttr: 'Copiar al portapapeles',
            className: 'btn btn-primary mrbtn',
            title: 'Datos de alumnos'
        },
        {
            extend: 'csvHtml5',
            text: '<i class="fas fa-file-excel text-white"></i> ',
            titleAttr: 'Desacargar en CSV',
            className: 'btn btn-primary mrbtn',
            title: 'Datos de alumnos'
        },
        {
            extend: 'excelHtml5',
            text: '<i class="fas fa-file-excel text-white"></i> ',
            titleAttr: 'Exportar a Excel',
            className: 'btn btn-primary mrbtn',
            title: 'Datos de alumnos'
        },
        {
            extend: 'pdfHtml5',
            text: '<i class="fas fa-file-pdf text-white"></i> ',
            titleAttr: 'Exportar a PDF',
            className: 'btn btn-primary mrbtn ',
            orientation: 'landscape',
            title: 'Datos de alumnos',
            pageSize: 'LEGAL',
            customize: function (doc) {
                doc.defaultStyle.fontSize = 8;
            }
        },
        {
            extend: 'print',
            text: '<i class="fa fa-print text-white"></i> ',
            titleAttr: 'Imprimir',
            className: 'btn btn-primary mrbtn',
            title: 'Datos de alumnos'
        },
    ]
});
/**=================================================================
 * VALIDACIÓN DE FORMULARIO
 ===================================================================*/
const d = document;
function contactForm() {
    const $form = d.getElementById("formProv"),
        inputs = d.querySelectorAll("#formProv input"),
        $textarea = d.querySelectorAll("#formProv textarea");

    const $regExpre = {
        nombreprov: /^[A-Za-z0-9ÑñÁáÉéÍíÓóÚúÜü\s]{1,250}$/,
        dirprov: /^[A-Za-zÑñÁáÉéÍíÓóÚúÜü0-9\_\-\.\,\s]{1,250}$/,
        telprov: /^\d{10}$/,
        emailprov: /^[A-Za-z0-9]+(\.[A-Za-z0-9]+|-[A-Za-z0-9]+|_[A-Za-z0-9]+)*@[A-Za-z0-9-]+(\.[A-Za-z0-9-]+)*(\.[A-Za-z]{2,15})$/,
        descripprov: /^[A-Za-zÑñÁáÉéÍíÓóÚúÜü0-9\_\-\.\,\s]{1,250}$/
    }
    /**------Objeto para validar si los campos estan vacíos. */
    const campos = {
        nombreprov: false,
        dirprov: false,
        telprov: false,
        emailprov: false,
        descripprov: false
    }
    const validarForm = (e) => {
        // console.log("Se ejecutó");
        // console.log(e.target.name);
        /**El name es del input, es decir, se ejecuta todos los name */
        switch (e.target.name) {
            case "nombreprov":
                validarInput($regExpre.nombreprov, e.target, 'nombreprov');
                break;
            case "dirprov":
                validarInput($regExpre.dirprov, e.target, 'dirprov');
                break;
            case "telprov":
                validarInput($regExpre.telprov, e.target, 'telprov');
                break;
            case "emailprov":
                validarInput($regExpre.emailprov, e.target, 'emailprov');
                break;
            case "descripprov":
                validarInput($regExpre.descripprov, e.target, 'descripprov');
                break;
        }
    }
    const validarInput = (expresion, input, campo) => {
        if (expresion.test(input.value)) {
            d.querySelector(`#val-${campo} .alert-val`).classList.remove("alert-val-activo");
            // Valida que los campos no esten vacíos.
            campos[campo] = true;
        } else {
            d.querySelector(`#val-${campo} .alert-val`).classList.add('alert-val-activo');
            setTimeout(() => {
                d.querySelector(`#val-${campo} .alert-val`).classList.remove("alert-val-activo");
            }, 5000);
            campos[campo] = false;
        }
    }

    inputs.forEach((input) => {
        input.addEventListener("keyup", validarForm);
        input.addEventListener("blur", validarForm);
    })
    $textarea.forEach(($textarea) => {
        $textarea.addEventListener("keyup", validarForm);
        $textarea.addEventListener("blur", validarForm);
    })
    /**=================================================================
     * CAPTURAR DATOS PARA GUARDAR PROVEEDOR
     ===================================================================*/
    $form.addEventListener("submit", function (e) {
        // /console.log("Excelente");
        e.preventDefault();
        /**-----Validación de datos */
        if (campos.nombreprov && campos.dirprov && campos.emailprov && campos.telprov) {


            /**------Fin validación de datos */
            let data = new FormData($form);
            // console.log(data);
            fetch('ajax/proveedor.ajax.php', {
                method: 'POST',
                body: data,
                mode: "cors"
            })
                .then(res => res.json())
                .then(data => {
                    // console.log(data);
                    if (data === "ok") {
                        toastr.success('Se guardaron los datos de proveedor correctamente.', 'Datos guardados');
                        tablaProveedor.ajax.reload(null, false);
                    }
                    $form.reset();
                })
                .catch(function (err) {
                    // console.log('error', err);
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: "<small>¡Datos incorrectos o vacíos, no deben llevar caracteres especiales!</small>",
                        showConfirmButton: false,
                        timer: 2000
                    })
                })
            // $('#modal-4').modal('hide');
        } else {
            d.getElementById('form-mensaje').classList.add('alert-val-activo');
            setTimeout(() => {
                d.getElementById("form-mensaje").classList.remove('alert-val-activo');
            }, 5000);
        }
    })
    /**=================================================================
    * ACTIVAR Y DESACTIVAR BOTÓN DE STATUS
    ===================================================================*/
    const $status = d.querySelector(".btnActivarP");
    // console.log("$status ", $status);
    d.addEventListener("click", (e) => {
        // console.log(e.target);
        let $idProveedor = e.target.getAttribute("idProveedor");
        // console.log($idProveedor);
        let $estadoProveedor = e.target.getAttribute("estadoProveedor");
        // console.log($estadoProveedor);
        let data = new FormData();
        data.append("activeIdP", $idProveedor);
        data.append("activeSP", $estadoProveedor);
        fetch('ajax/proveedor.ajax.php', {
            method: 'POST',
            body: data,
            mode: "cors"
        })
            .then(res => res.json())
            .then(data => {
                // console.log(data);
                tablaProveedor.ajax.reload(null, false);
            })
            .catch(function (err) {
                // console.log('error', err);
            })
        if ($estadoProveedor == 0) {
            $(this).removeClass('btn-outline-success');
            $(this).addClass('btn-outline-danger');
            $(this).html('Desactivado');
            $(this).attr('estadoProveedor', 1);
            // $status.classList.remove("btn-outline-success");
            // $status.classList.add("btn-outline-danger");
            // $status.innerHTML = `Desactivado`;
            // e.target.getAttribute("estadoProveedor", 1);
        } else {
            // $status.classList.add("btn-outline-success");
            // $status.classList.remove("btn-outline-danger");
            // $status.innerHTML = `Activado`;
            // e.target.getAttribute("estadoProveedor", 1);
            $(this).addClass('btn-outline-success');
            $(this).removeClass('btn-outline-danger');
            $(this).html('Activado');
            $(this).attr('estadoProveedor', 0);
        }
    })
    /**------------Fin de descativar o activar status */
}
d.addEventListener("DOMContentLoaded", contactForm);
/**--------------------Fin para guardar datos de proveedor */
