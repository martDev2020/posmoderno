/**===================================
 * CARGAR TABLA DINÁMICA DE UNIDAD VENTA
 ===================================*/
// $.ajax({

//     url: "ajax/tablaUniV.ajax.php",
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
tablaUniV = $(".tablaUniV").DataTable({
    ajax: "ajax/tablaUniV.ajax.php",
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
            title: "Datos unidad venta",
        },
        {
            extend: "csvHtml5",
            text: '<i class="fas fa-file-excel text-white"></i> ',
            titleAttr: "Desacargar en CSV",
            className: "btn btn-primary mrbtn",
            title: "Datos unidad venta",
        },
        {
            extend: "excelHtml5",
            text: '<i class="fas fa-file-excel text-white"></i> ',
            titleAttr: "Exportar a Excel",
            className: "btn btn-primary mrbtn",
            title: "Datos unidad venta",
        },
        {
            extend: "pdfHtml5",
            text: '<i class="fas fa-file-pdf text-white"></i> ',
            titleAttr: "Exportar a PDF",
            className: "btn btn-primary mrbtn ",
            orientation: "landscape",
            title: "Datos unidad venta",
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
            title: "Datos unidad venta",
        },
    ],
});
/**=================================================================
 * VALIDACIÓN DE FORMULARIO
 ===================================================================*/
function uniVenta() {
    const $formUVen = d.getElementById("formUVen"),
        inputs = d.querySelectorAll("#formUVen input"),
        $nombreUniV = d.getElementById("nombreUniV");
    /**=================================================================
       * VALIDAR SI NOMBRE EXISTE
       ===================================================================*/
    $nombreUniV.addEventListener("change", (e) => {
        // console.log(e);
        const $nameUVent = e.target.value;
        // console.log($nameUVent);
        let data = new FormData();
        data.append("nameUVent", $nameUVent);
        fetch("ajax/unidadVent.ajax.php", {
            method: "POST",
            body: data,
            mode: "cors",
        })
            .then((res) => (res.ok ? res.json() : Promise.reject(res)))
            .then((json) => {
                // console.log(json);
                if (json.length != 0) {
                    d.querySelector(".alert-val-danger").classList.add(
                        "alert-val-activo"
                    );
                    setTimeout(() => {
                        d.querySelector(".alert-val-danger").classList.remove(
                            "alert-val-activo"
                        );
                    }, 5000);
                    // Swal.fire({
                    //     position: "top-end",
                    //     icon: "error",
                    //     text: `¡El nombre ${$nameCli} ya existe en la base de datos!`,
                    //     showConfirmButton: false,
                    //     timer: 3000
                    // })
                    $nombreUniV.value = "";
                }
            })
            .catch(function (err) {
                // console.log('error', err);
                let message = err.statusText || "Ocurrió un error";
                $nombreUniV.innerHTML = `<p>Error ${err.status}: ${message}</p>`;
            });
    });
    /**------Fin de valición de categoría si existe. */

    const $regExpre = {
        nombreUniV: /^[A-Za-z0-9ÑñÁáÉéÍíÓóÚúÜü\s]{1,250}$/,
    };
    /**------Objeto para validar si los campos estan vacíos. */
    const camposUVent = {
        nombreUniV: false,
    };
    const validarformUVen = (e) => {
        // console.log("Se ejecutó");
        // console.log(e.target.name);
        /**El name es del input, es decir, se ejecuta todos los name */
        switch (e.target.name) {
            case "nombreUniV":
                validarInput($regExpre.nombreUniV, e.target, "nombreUniV");
                break;
        }
    };
    const validarInput = (expresion, input, campo) => {
        if (expresion.test(input.value)) {
            d.querySelector(`#val-${campo} .alert-val`).classList.remove(
                "alert-val-activo"
            );
            // Valida que los Car no esten vacíos.
            camposUVent[ campo ] = true;
        } else {
            d.querySelector(`#val-${campo} .alert-val`).classList.add(
                "alert-val-activo"
            );
            setTimeout(() => {
                d.querySelector(`#val-${campo} .alert-val`).classList.remove(
                    "alert-val-activo"
                );
            }, 5000);
            camposUVent[ campo ] = false;
        }
    };

    inputs.forEach((input) => {
        input.addEventListener("keyup", validarformUVen);
        input.addEventListener("blur", validarformUVen);
    });
    /**=================================================================
       * CAPTURAR DATOS PARA GUARDAR VENTA
       ===================================================================*/
    $formUVen.addEventListener("submit", function (e) {
        // console.log("Excelente");
        e.preventDefault();
        /**-----Validación de datos */
        if (camposUVent.nombreUniV) {
            /**------Fin validación de datos */
            let data = new FormData($formUVen);
            // console.log(data);
            fetch("ajax/unidadVent.ajax.php", {
                method: "POST",
                body: data,
                mode: "cors",
            })
                .then((res) => (res.ok ? res.json() : Promise.reject(res)))
                .then((data) => {
                    // console.log(data);
                    if (data === "ok") {
                        toastr.success('Se guardaron los datos de unidad compra correctamente.', 'Datos guardados');
                        tablaUniV.ajax.reload(null, false);
                    }
                    $formUVen.reset();
                })
                .catch(function (err) {
                    // console.log('error', err);
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title:
                            "<small>¡Datos incorrectos o vacíos, no deben llevar caracteres especiales!</small>",
                        showConfirmButton: false,
                        timer: 2000,
                    });
                });
            // $('#modal-4').modal('hide');
        } else {
            d.getElementById("form-mensajeUCom").classList.add("alert-val-activo");
            setTimeout(() => {
                d.getElementById("form-mensajeUCom").classList.remove(
                    "alert-val-activo"
                );
            }, 5000);
        }
    });
    /**=================================================================
      * ACTIVAR Y DESACTIVAR BOTÓN DE STATUS
      ===================================================================*/
    const $statusUVent = d.querySelector(".btnActivarUVent");
    // console.log("$status ", $status);
    d.addEventListener("click", (e) => {
        // console.log(e.target);
        let $idUniVent = e.target.getAttribute("idUniVent");
        // console.log($idUniVent);
        let $estadoUVent = e.target.getAttribute("estadoUVent");
        // console.log($estadoUVent);
        let data = new FormData();
        data.append("activeIdUVENT", $idUniVent);
        data.append("activeSUVENT", $estadoUVent);
        fetch('ajax/unidadVent.ajax.php', {
            method: 'POST',
            body: data,
            mode: "cors"
        })
            .then(res => (res.ok ? res.json() : Promise.reject(res)))
            .then(json => {
                // console.log(json);
                tablaUniV.ajax.reload(null, false);
            })
            .catch(function (err) {
                // console.log('error', err);
                let message = err.statusText || "Ocurrió un error";
                $statusUVent.innerHTML = `<p>Error ${err.status}: ${message}</p>`;
            })
        if ($estadoUVent == 0) {
            $(this).removeClass('btn-outline-success');
            $(this).addClass('btn-outline-danger');
            $(this).html('Desactivado');
            $(this).attr('estadoUVent', 1);
            // $status.classList.remove("btn-outline-success");
            // $status.classList.add("btn-outline-danger");
            // $status.innerHTML = `Desactivado`;
            // e.target.getAttribute("estadoUVent", 1);
        } else {
            // $status.classList.add("btn-outline-success");
            // $status.classList.remove("btn-outline-danger");
            // $status.innerHTML = `Activado`;
            // e.target.getAttribute("estadoUVent", 1);
            $(this).addClass('btn-outline-success');
            $(this).removeClass('btn-outline-danger');
            $(this).html('Activado');
            $(this).attr('estadoUVent', 0);
        }
    })
    /**------------Fin de descativar o activar status */
}
d.addEventListener("DOMContentLoaded", uniVenta);
/**=================================================================
    * EDICIÓN DE UNIDAD VENTA
===================================================================*/
const idUniVenE = (id) => {
    let idUVentE = id;
    // console.log("idUVentE", idUVentE);
    let url = "ajax/unidadVent.ajax.php";
    let data = new FormData();
    data.append('idUVentEdit', idUVentE);
    fetch(url, {
        method: 'POST',
        body: data,
        mode: 'cors'
    })
        .then(res => (res.ok ? res.json() : Promise.reject(res)))
        .then(json => {
            // console.log(json);
            idUVentaE.value = json.id;
            nombreUniVE.value = json.nombre_univent;
        })
        .catch(function (err) {
            // console.error('Error', err);
            let message = err.statusText || "Ocurrió un error";
            idUniVenE.innerHTML = `<p>Error ${err.status}: ${message}</p>`;
        })
}
// /**-------Fin edición */
/**=================================================================
 * VALIDACIÓN PARA EDICIÓN
 ===================================================================*/
function contactFormEditUV() {
    const $formUVenE = d.getElementById("formUVenE"),
        inputs = d.querySelectorAll("#formUVenE input"),
        $nombreUniVE = d.getElementById("nombreUniVE");
    /**=================================================================
       * VALIDAR SI NOMBRE DE CATEGORÍA EXISTE
       ===================================================================*/
    $nombreUniVE.addEventListener("change", (e) => {
        // console.log(e);
        const $nameUVentE = e.target.value;
        // console.log($nameUVentE);
        let data = new FormData();
        data.append("nameUVentE", $nameUVentE);
        fetch("ajax/unidadVent.ajax.php", {
            method: "POST",
            body: data,
            mode: "cors",
        })
            .then((res) => (res.ok ? res.json() : Promise.reject(res)))
            .then((json) => {
                // console.log(json);
                if (json.length != 0) {
                    d.querySelector(".alert-val-dangered").classList.add(
                        "alert-val-activo"
                    );
                    setTimeout(() => {
                        d.querySelector(".alert-val-dangered").classList.remove(
                            "alert-val-activo"
                        );
                    }, 5000);
                    // Swal.fire({
                    //     position: "top-end",
                    //     icon: "error",
                    //     text: `¡El nombre ${$nameCli} ya existe en la base de datos!`,
                    //     showConfirmButton: false,
                    //     timer: 3000
                    // })
                    $nombreUniVE.value = "";
                }
            })
            .catch(function (err) {
                // console.log('error', err);
                let message = err.statusText || "Ocurrió un error";
                $nombreUniVE.innerHTML = `<p>Error ${err.status}: ${message}</p>`;
            });
    });
    /**------Fin de valición de datos si existe. */

    const $regExpre = {
        nombreUniVE: /^[A-Za-z0-9ÑñÁáÉéÍíÓóÚúÜü\s]{1,250}$/,
    };
    /**------Objeto para validar si los campos estan vacíos. */
    const camposUVentE = {
        nombreUniVE: false,
    };
    const validarformUVenE = (e) => {
        // console.log("Se ejecutó");
        // console.log(e.target.name);
        /**El name es del input, es decir, se ejecuta todos los name */
        switch (e.target.name) {
            case "nombreUniVE":
                validarInput($regExpre.nombreUniVE, e.target, "nombreUniVE");
                break;
        }
    };
    const validarInput = (expresion, input, campo) => {
        if (expresion.test(input.value)) {
            d.querySelector(`#val-${campo} .alert-val`).classList.remove(
                "alert-val-activo"
            );
            // Valida que los Car no esten vacíos.
            camposUVentE[ campo ] = true;
        } else {
            d.querySelector(`#val-${campo} .alert-val`).classList.add(
                "alert-val-activo"
            );
            setTimeout(() => {
                d.querySelector(`#val-${campo} .alert-val`).classList.remove(
                    "alert-val-activo"
                );
            }, 5000);
            camposUVentE[ campo ] = false;
        }
    };

    inputs.forEach((input) => {
        input.addEventListener("keyup", validarformUVenE);
        input.addEventListener("blur", validarformUVenE);
    });
    /**=================================================================
       * CAPTURAR DATOS PARA GUARDAR
       ===================================================================*/
    $formUVenE.addEventListener("submit", function (e) {
        // console.log("Excelente");
        e.preventDefault();
        /**-----Validación de datos */
        if (idUVentaE != 0 && nombreUniVE != "") {
            /**------Fin validación de datos */
            let data = new FormData($formUVenE);
            // console.log(data);
            fetch("ajax/unidadVent.ajax.php", {
                method: "POST",
                body: data,
                mode: "cors",
            })
                .then((res) => (res.ok ? res.json() : Promise.reject(res)))
                .then((json) => {
                    // console.log(json);
                    if (json === "ok") {
                        toastr.success('Se modificaron los datos de unidad compra correctamente.', 'Datos guardados');
                        tablaUniV.ajax.reload(null, false);
                    }
                })
                .catch(function (err) {
                    // console.log('error', err);
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title:
                            "<small>¡Datos incorrectos o vacíos, no deben llevar caracteres especiales!</small>",
                        showConfirmButton: false,
                        timer: 2000,
                    });
                });
            // $('#modal-4').modal('hide');
        } else {
            d.getElementById("form-mensajeUVE").classList.add("alert-val-activo");
            setTimeout(() => {
                d.getElementById("form-mensajeUVE").classList.remove(
                    "alert-val-activo"
                );
            }, 5000);
        }
    });
}
d.addEventListener("DOMContentLoaded", contactFormEditUV);
/**------------Fin valición para edición */
/**=================================================================
    * ELIMINAR
===================================================================*/
const idElimUVen = (id) => {
    let idUVenEd = id;
    // console.log("idPdelete ", idUVenEd);
    Swal.fire({
        title: "¿Estás seguro de eliminar los datos?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Si",
        cancelButtonText: "No",
    }).then((result) => {
        if (result.value) {
            let url = "ajax/unidadVent.ajax.php";
            let data = new FormData();
            data.append("idUVenEdelete", idUVenEd);
            fetch(url, {
                method: "POST",
                body: data,
                mode: "cors",
            })
                .then((res) => (res.ok ? res.json() : Promise.reject(res)))
                .then((json) => {
                    // console.log(json);
                    if (json === "ok") {
                        Swal.fire({
                            icon: "success",
                            title: "Datos eliminados",
                            showConfirmButton: false,
                            timer: 1500,
                        });
                    }
                    tablaUniV.ajax.reload(null, false);
                })
                .catch(function (err) {
                    // console.error('Error', err);
                    let message = err.statusText || "Ocurrió un error";
                    idElimUCom.innerHTML = `<p>Error ${err.status}: ${message}</p>`;
                });
        }
    });
};
/**----------------Fin eliminar*/


