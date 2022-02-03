/**===================================
 * CARGAR TABLA DINÁMICA DE CATEGORÍAS
 ===================================*/
// $.ajax({

//     url: "ajax/tablaClientes.ajax.php",
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
tablaCliente = $(".tablaClientes").DataTable({
    "ajax": "ajax/tablaClientes.ajax.php",
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

function contactFormC() {
    const $form = d.getElementById("formCli"),
        inputs = d.querySelectorAll("#formCli input");

    const $regExpre = {
        nombrecli: /^[A-Za-z0-9ÑñÁáÉéÍíÓóÚúÜü\s]{1,250}$/,
        dircli: /^[A-Za-zÑñÁáÉéÍíÓóÚúÜü0-9\_\-\.\,\s]{1,250}$/,
        telcli: /^\d{10}$/,
        emailcli: /^[A-Za-z0-9]+(\.[A-Za-z0-9]+|-[A-Za-z0-9]+|_[A-Za-z0-9]+)*@[A-Za-z0-9-]+(\.[A-Za-z0-9-]+)*(\.[A-Za-z]{2,15})$/,
        razoncli: /^[A-Za-zÑñÁáÉéÍíÓóÚúÜü0-9\_\-\.\,\s]{1,250}$/,
        rfccli: /^[A-Za-zÑñÁáÉéÍíÓóÚúÜü0-9\_\-\.\,\s]{1,250}$/,
    }
    /**------Objeto para validar si los campos estan vacíos. */
    const campos = {
        nombrecli: false,
        dircli: false,
        telcli: false,
        emailcli: false,
        razoncli: false,
        rfccli: false
    }
    const validarForm = (e) => {
        // console.log("Se ejecutó");
        // console.log(e.target.name);
        /**El name es del input, es decir, se ejecuta todos los name */
        switch (e.target.name) {
            case "nombrecli":
                validarInput($regExpre.nombrecli, e.target, 'nombrecli');
                break;
            case "dircli":
                validarInput($regExpre.dircli, e.target, 'dircli');
                break;
            case "telcli":
                validarInput($regExpre.telcli, e.target, 'telcli');
                break;
            case "emailcli":
                validarInput($regExpre.emailcli, e.target, 'emailcli');
                break;
            case "razoncli":
                validarInput($regExpre.razoncli, e.target, 'razoncli');
                break;
            case "rfccli":
                validarInput(RegExp.rfccli, e.target, 'rfccli');
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
    /**=================================================================
     * CAPTURAR DATOS PARA GUARDAR PROVEEDOR
     ===================================================================*/
    //     $form.addEventListener("submit", function (e) {
    //         // /console.log("Excelente");
    //         e.preventDefault();
    //         /**-----Validación de datos */
    //         if (campos.nombreprov && campos.dirprov && campos.emailcli && campos.telprov) {


    //             /**------Fin validación de datos */
    //             let data = new FormData($form);
    //             // console.log(data);
    //             fetch('ajax/proveedor.ajax.php', {
    //                 method: 'POST',
    //                 body: data,
    //                 mode: "cors"
    //             })
    //                 .then(res => res.json())
    //                 .then(data => {
    //                     // console.log(data);
    //                     if (data === "ok") {
    //                         toastr.success('Se guardaron los datos de proveedor correctamente.', 'Datos guardados');
    //                         tablaProveedor.ajax.reload(null, false);
    //                     }
    //                     $form.reset();
    //                 })
    //                 .catch(function (err) {
    //                     // console.log('error', err);
    //                     Swal.fire({
    //                         position: "top-end",
    //                         icon: "success",
    //                         title: "<small>¡Datos incorrectos o vacíos, no deben llevar caracteres especiales!</small>",
    //                         showConfirmButton: false,
    //                         timer: 2000
    //                     })
    //                 })
    //             // $('#modal-4').modal('hide');
    //         } else {
    //             d.getElementById('form-mensaje').classList.add('alert-val-activo');
    //             setTimeout(() => {
    //                 d.getElementById("form-mensaje").classList.remove('alert-val-activo');
    //             }, 5000);
    //         }
    //     })
    /**=================================================================
    * ACTIVAR Y DESACTIVAR BOTÓN DE STATUS
    ===================================================================*/
    const $status = d.querySelector(".btnActivarC");
    // console.log("$status ", $status);
    d.addEventListener("click", (e) => {
        // console.log(e.target);
        let $idClientes = e.target.getAttribute("idClientes");
        // console.log($idClientes);
        let $estadoCliente = e.target.getAttribute("estadoCliente");
        // console.log($estadoProveedor);
        let data = new FormData();
        data.append("activeIdC", $idClientes);
        data.append("activeSC", $estadoCliente);
        fetch('ajax/cliente.ajax.php', {
            method: 'POST',
            body: data,
            mode: "cors"
        })
            .then(res => (res.ok ? res.json() : Promise.reject(res)))
            .then(json => {
                // console.log(json);
                tablaCliente.ajax.reload(null, false);
            })
            .catch(function (err) {
                // console.log('error', err);
            })
        if ($estadoProveedor == 0) {
            $(this).removeClass('btn-outline-success');
            $(this).addClass('btn-outline-danger');
            $(this).html('Desactivado');
            $(this).attr('estadoCliente', 1);
            // $status.classList.remove("btn-outline-success");
            // $status.classList.add("btn-outline-danger");
            // $status.innerHTML = `Desactivado`;
            // e.target.getAttribute("estadoCliente", 1);
        } else {
            // $status.classList.add("btn-outline-success");
            // $status.classList.remove("btn-outline-danger");
            // $status.innerHTML = `Activado`;
            // e.target.getAttribute("estadoCliente", 1);
            $(this).addClass('btn-outline-success');
            $(this).removeClass('btn-outline-danger');
            $(this).html('Activado');
            $(this).attr('estadoCliente', 0);
        }
    })
    /**------------Fin de descativar o activar status */
}
d.addEventListener("DOMContentLoaded", contactFormC);
/**--------------------Fin para guardar datos de cliente */
/**=================================================================
    * EDICIÓN DE PROVEEDOR
    ===================================================================*/
// const idClientes = (id) => {
//     let idP = id;
//     // console.log("idP ", idP);
//     let url = "ajax/proveedor.ajax.php";
//     let data = new FormData();
//     data.append('idClientes', idP);
//     fetch(url, {
//         method: 'POST',
//         body: data,
//         mode: 'cors'
//     })
//         .then(res => (res.ok ? res.json() : Promise.reject(res)))
//         .then(json => {
//             // console.log(json);
//             idProv.value = json.id;
//             nombreprovE.value = json.nombre_prov;
//             dirprovE.value = json.direccion_prov;
//             telprovE.value = json.telefono_prov;
//             emailprovE.value = json.email_prov;
//             descripprovE.value = json.descripcion_prov;
//         })
//         .catch(function (err) {
//             // console.error('Error', err);
//             let message = err.statusText || "Ocurrió un error";
//             idClientes.innerHTML = `<p>Error ${err.status}: ${message}</p>`;
//         })
// }
// /**-------Fin edición de proveedor */
// /**=================================================================
// * VALIDACIÓN DE FORMULARIO EDICIÓN
// ===================================================================*/
// function contactFormEdit() {
//     const $formEdit = d.getElementById("formProvEdit"),
//         inputsEdit = d.querySelectorAll("#formProvEdit input"),
//         $textareaEdit = d.querySelectorAll("#formProvEdit textarea");

//     const $regExpreEdit = {
//         nombreprovE: /^[A-Za-z0-9ÑñÁáÉéÍíÓóÚúÜü\s]{1,250}$/,
//         dirprovE: /^[A-Za-zÑñÁáÉéÍíÓóÚúÜü0-9\_\-\.\,\s]{1,250}$/,
//         telprovE: /^\d{10}$/,
//         emailprovE: /^[A-Za-z0-9]+(\.[A-Za-z0-9]+|-[A-Za-z0-9]+|_[A-Za-z0-9]+)*@[A-Za-z0-9-]+(\.[A-Za-z0-9-]+)*(\.[A-Za-z]{2,15})$/,
//         descripprovE: /^[A-Za-zÑñÁáÉéÍíÓóÚúÜü0-9\_\-\.\,\s]{1,250}$/
//     }
//     /**------Objeto para validar si los campos estan vacíos. */
//     const camposE = {
//         nombreprovE: false,
//         dirprovE: false,
//         telprovE: false,
//         emailprovE: false,
//         descripprovE: false
//     }
//     const validarFormE = (e) => {
//         // console.log("Se ejecutó");
//         // console.log(e.target.name);
//         /**El name es del input, es decir, se ejecuta todos los name */
//         switch (e.target.name) {
//             case "nombreprovE":
//                 validarInputE($regExpreEdit.nombreprovE, e.target, 'nombreprovE');
//                 break;
//             case "dirprovE":
//                 validarInputE($regExpreEdit.dirprovE, e.target, 'dirprovE');
//                 break;
//             case "telprovE":
//                 validarInputE($regExpreEdit.telprovE, e.target, 'telprovE');
//                 break;
//             case "emailprovE":
//                 validarInputE($regExpreEdit.emailprovE, e.target, 'emailprovE');
//                 break;
//             case "descripprovE":
//                 validarInputE($regExpreEdit.descripprovE, e.target, 'descripprovE');
//                 break;
//         }
//     }
//     const validarInputE = (expresion, input, campo) => {
//         if (expresion.test(input.value)) {
//             d.querySelector(`#edit-${campo} .alert-val`).classList.remove("alert-val-activo");
//             // Valida que los camposE no esten vacíos.
//             camposE[campo] = true;
//         } else {
//             d.querySelector(`#edit-${campo} .alert-val`).classList.add('alert-val-activo');
//             setTimeout(() => {
//                 d.querySelector(`#edit-${campo} .alert-val`).classList.remove("alert-val-activo");
//             }, 5000);
//             camposE[campo] = false;
//         }
//     }
//     inputsEdit.forEach((input) => {
//         input.addEventListener("keyup", validarFormE);
//         input.addEventListener("blur", validarFormE);
//     })
//     $textareaEdit.forEach(($textareaEdit) => {
//         $textareaEdit.addEventListener("keyup", validarFormE);
//         $textareaEdit.addEventListener("blur", validarFormE);
//     })
//     /**=================================================================
//      * CAPTURAR DATOS PARA GUARDAR PROVEEDOR
//      ===================================================================*/
//     $formEdit.addEventListener("submit", function (e) {
//         // /console.log("Excelente");
//         e.preventDefault();
//         /**-----Validación de datos */
//         if (nombreprovE != 0 && dirprovE != 0 && emailprovE != 0 && telprovE != 0) {
//             /**------Fin validación de datos */
//             let data = new FormData($formEdit);
//             // console.log(data);
//             fetch('ajax/proveedor.ajax.php', {
//                 method: 'POST',
//                 body: data,
//                 mode: "cors"
//             })
//                 .then(res => res.json())
//                 .then(data => {
//                     // console.log(data);
//                     if (data === "ok") {
//                         toastr.success('Se acutalizaron los datos de proveedor correctamente.', 'Datos guardados');
//                         tablaProveedor.ajax.reload(null, false);
//                     }
//                     // $formEdit.reset();
//                 })
//                 .catch(function (err) {
//                     // console.log('error', err);
//                     Swal.fire({
//                         position: "top-end",
//                         icon: "success",
//                         title: "<small>¡Datos incorrectos o vacíos, no deben llevar caracteres especiales!</small>",
//                         showConfirmButton: false,
//                         timer: 2000
//                     })
//                 })
//             // $('#modal-4').modal('hide');
//         } else {
//             d.getElementById('form-mensajeE').classList.add('alert-val-activo');
//             setTimeout(() => {
//                 d.getElementById("form-mensajeE").classList.remove('alert-val-activo');
//             }, 5000);
//         }
//     })
// }
// d.addEventListener("DOMContentLoaded", contactFormEdit);
// /**-------------Fin edición de formulario */
// /**=================================================================
//     * ELIMINAR PROVEEDOR
//     ===================================================================*/
// const idEliminarP = (id) => {
//     let idPdelete = id;
//     // console.log("idPdelete ", idPdelete);
//     Swal.fire({
//         title: "¿Estás seguro de eliminar los datos?",
//         icon: "warning",
//         showCancelButton: true,
//         confirmButtonColor: '#3085d6',
//         cancelButtonColor: '#d33',
//         confirmButtonText: 'Si',
//         cancelButtonText: 'No'
//     }).then((result) => {
//         if (result.value) {
//             let url = "ajax/proveedor.ajax.php";
//             let data = new FormData();
//             data.append('ideliminarP', idPdelete);
//             fetch(url, {
//                 method: 'POST',
//                 body: data,
//                 mode: 'cors'
//             }).then(res => (res.ok ? res.json() : Promise.reject(res)))
//                 .then(json => {
//                     // console.log(json);
//                     if (json == "ok") {
//                         Swal.fire({
//                             icon: 'success',
//                             title: 'Datos eliminados',
//                             showConfirmButton: false,
//                             timer: 1500
//                         })
//                     }
//                     tablaProveedor.ajax.reload(null, false);
//                 })
//                 .catch(function (err) {
//                     // console.error('Error', err);
//                     let message = err.statusText || "Ocurrió un error";
//                     idClientes.innerHTML = `<p>Error ${err.status}: ${message}</p>`;
//                 })
//         }
//     })
// }
// /**----------------Eliminar proveedor */