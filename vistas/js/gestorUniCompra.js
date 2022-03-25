/**===================================
 * CARGAR TABLA DINÁMICA DE UNIDAD COMPRA
 ===================================*/
// $.ajax({

//     url: "ajax/tablaUniC.ajax.php",
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
tablaUniC = $(".tablaUniC").DataTable({
    ajax: "ajax/tablaUniC.ajax.php",
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
            title: "Datos unidad compra",
        },
        {
            extend: "csvHtml5",
            text: '<i class="fas fa-file-excel text-white"></i> ',
            titleAttr: "Desacargar en CSV",
            className: "btn btn-primary mrbtn",
            title: "Datos unidad compra",
        },
        {
            extend: "excelHtml5",
            text: '<i class="fas fa-file-excel text-white"></i> ',
            titleAttr: "Exportar a Excel",
            className: "btn btn-primary mrbtn",
            title: "Datos unidad compra",
        },
        {
            extend: "pdfHtml5",
            text: '<i class="fas fa-file-pdf text-white"></i> ',
            titleAttr: "Exportar a PDF",
            className: "btn btn-primary mrbtn ",
            orientation: "landscape",
            title: "Datos unidad compra",
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
            title: "Datos unidad compra",
        },
    ],
});
/**=================================================================
 * VALIDACIÓN DE FORMULARIO
 ===================================================================*/
function uniCompra() {
    const $formUCom = d.getElementById("formUCom"),
        inputs = d.querySelectorAll("#formUCom input"),
        $nombreUni = d.getElementById("nombreUni");
    /**=================================================================
       * VALIDAR SI NOMBRE DE CATEGORÍA EXISTE
       ===================================================================*/
    $nombreUni.addEventListener("change", (e) => {
        // console.log(e);
        const $nameUCom = e.target.value;
        // console.log($nameUCom);
        let data = new FormData();
        data.append("nameUCom", $nameUCom);
        fetch("ajax/unidadCom.ajax.php", {
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
                    $nombreUni.value = "";
                }
            })
            .catch(function (err) {
                // console.log('error', err);
                let message = err.statusText || "Ocurrió un error";
                $nombreUni.innerHTML = `<p>Error ${err.status}: ${message}</p>`;
            });
    });
    /**------Fin de valición de categoría si existe. */

    const $regExpre = {
        nombreUni: /^[A-Za-z0-9ÑñÁáÉéÍíÓóÚúÜü\s]{1,250}$/,
    };
    /**------Objeto para validar si los campos estan vacíos. */
    const camposUCom = {
        nombreUni: false,
    };
    const validarFormUCom = (e) => {
        // console.log("Se ejecutó");
        // console.log(e.target.name);
        /**El name es del input, es decir, se ejecuta todos los name */
        switch (e.target.name) {
            case "nombreUni":
                validarInput($regExpre.nombreUni, e.target, "nombreUni");
                break;
        }
    };
    const validarInput = (expresion, input, campo) => {
        if (expresion.test(input.value)) {
            d.querySelector(`#val-${campo} .alert-val`).classList.remove(
                "alert-val-activo"
            );
            // Valida que los Car no esten vacíos.
            camposUCom[ campo ] = true;
        } else {
            d.querySelector(`#val-${campo} .alert-val`).classList.add(
                "alert-val-activo"
            );
            setTimeout(() => {
                d.querySelector(`#val-${campo} .alert-val`).classList.remove(
                    "alert-val-activo"
                );
            }, 5000);
            camposUCom[ campo ] = false;
        }
    };

    inputs.forEach((input) => {
        input.addEventListener("keyup", validarFormUCom);
        input.addEventListener("blur", validarFormUCom);
    });
    /**=================================================================
       * CAPTURAR DATOS PARA GUARDAR CATEGORÍA
       ===================================================================*/
    $formUCom.addEventListener("submit", function (e) {
        // console.log("Excelente");
        e.preventDefault();
        /**-----Validación de datos */
        if (camposUCom.nombreUni) {
            /**------Fin validación de datos */
            let data = new FormData($formUCom);
            // console.log(data);
            fetch("ajax/unidadCom.ajax.php", {
                method: "POST",
                body: data,
                mode: "cors",
            })
                .then((res) => (res.ok ? res.json() : Promise.reject(res)))
                .then((data) => {
                    // console.log(data);
                    if (data === "ok") {
                        toastr.success('Se guardaron los datos de unidad compra correctamente.', 'Datos guardados');
                        tablaUniC.ajax.reload(null, false);
                    }
                    $formUCom.reset();
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
    const $statusUCom = d.querySelector(".btnActivarUcOM");
    // console.log("$status ", $status);
    d.addEventListener("click", (e) => {
        // console.log(e.target);
        let $idUniCom = e.target.getAttribute("idUniCom");
        // console.log($idUniCom);
        let $estadoUCom = e.target.getAttribute("estadoUCom");
        // console.log($estadoUCom);
        let data = new FormData();
        data.append("activeIdUCom", $idUniCom);
        data.append("activeSUCom", $estadoUCom);
        fetch('ajax/unidadCom.ajax.php', {
            method: 'POST',
            body: data,
            mode: "cors"
        })
            .then(res => (res.ok ? res.json() : Promise.reject(res)))
            .then(json => {
                // console.log(json);
                tablaUniC.ajax.reload(null, false);
            })
            .catch(function (err) {
                // console.log('error', err);
                let message = err.statusText || "Ocurrió un error";
                $statusUCom.innerHTML = `<p>Error ${err.status}: ${message}</p>`;
            })
        if ($estadoUCom == 0) {
            $(this).removeClass('btn-outline-success');
            $(this).addClass('btn-outline-danger');
            $(this).html('Desactivado');
            $(this).attr('estadoUCom', 1);
            // $status.classList.remove("btn-outline-success");
            // $status.classList.add("btn-outline-danger");
            // $status.innerHTML = `Desactivado`;
            // e.target.getAttribute("estadoUCom", 1);
        } else {
            // $status.classList.add("btn-outline-success");
            // $status.classList.remove("btn-outline-danger");
            // $status.innerHTML = `Activado`;
            // e.target.getAttribute("estadoUCom", 1);
            $(this).addClass('btn-outline-success');
            $(this).removeClass('btn-outline-danger');
            $(this).html('Activado');
            $(this).attr('estadoUCom', 0);
        }
    })
    /**------------Fin de descativar o activar status */
}
d.addEventListener("DOMContentLoaded", uniCompra);
/**=================================================================
    * EDICIÓN DE UNIDAD COMPRA
===================================================================*/
const idUniComE = (id) => {
    let idUComE = id;
    // console.log("idUComE", idUComE);
    let url = "ajax/unidadCom.ajax.php";
    let data = new FormData();
    data.append('idUComEdit', idUComE);
    fetch(url, {
        method: 'POST',
        body: data,
        mode: 'cors'
    })
        .then(res => (res.ok ? res.json() : Promise.reject(res)))
        .then(json => {
            // console.log(json);
            idUCompraE.value = json.id;
            nombreUniE.value = json.nombre_unCompra;
        })
        .catch(function (err) {
            // console.error('Error', err);
            let message = err.statusText || "Ocurrió un error";
            idUniComE.innerHTML = `<p>Error ${err.status}: ${message}</p>`;
        })
}
/**-------Fin edición */
/**=================================================================
 * VALIDACIÓN PARA EDICIÓN
 ===================================================================*/
function contactFormEditUC() {
    const $formUComE = d.getElementById("formUComE"),
        inputs = d.querySelectorAll("#formUComE input"),
        $nombreUniE = d.getElementById("nombreUniE");
    /**=================================================================
       * VALIDAR SI NOMBRE DE CATEGORÍA EXISTE
       ===================================================================*/
    $nombreUniE.addEventListener("change", (e) => {
        // console.log(e);
        const $nameUComE = e.target.value;
        // console.log($nameUComE);
        let data = new FormData();
        data.append("nameUCom", $nameUComE);
        fetch("ajax/unidadCom.ajax.php", {
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
                    $nombreUniE.value = "";
                }
            })
            .catch(function (err) {
                // console.log('error', err);
                let message = err.statusText || "Ocurrió un error";
                $nombreUniE.innerHTML = `<p>Error ${err.status}: ${message}</p>`;
            });
    });
    /**------Fin de valición de datos si existe. */

    const $regExpre = {
        nombreUniE: /^[A-Za-z0-9ÑñÁáÉéÍíÓóÚúÜü\s]{1,250}$/,
    };
    /**------Objeto para validar si los campos estan vacíos. */
    const camposUComE = {
        nombreUniE: false,
    };
    const validarFormUComE = (e) => {
        // console.log("Se ejecutó");
        // console.log(e.target.name);
        /**El name es del input, es decir, se ejecuta todos los name */
        switch (e.target.name) {
            case "nombreUniE":
                validarInput($regExpre.nombreUniE, e.target, "nombreUniE");
                break;
        }
    };
    const validarInput = (expresion, input, campo) => {
        if (expresion.test(input.value)) {
            d.querySelector(`#val-${campo} .alert-val`).classList.remove(
                "alert-val-activo"
            );
            // Valida que los Car no esten vacíos.
            camposUComE[ campo ] = true;
        } else {
            d.querySelector(`#val-${campo} .alert-val`).classList.add(
                "alert-val-activo"
            );
            setTimeout(() => {
                d.querySelector(`#val-${campo} .alert-val`).classList.remove(
                    "alert-val-activo"
                );
            }, 5000);
            camposUComE[ campo ] = false;
        }
    };

    inputs.forEach((input) => {
        input.addEventListener("keyup", validarFormUComE);
        input.addEventListener("blur", validarFormUComE);
    });
    /**=================================================================
       * CAPTURAR DATOS PARA GUARDAR 
       ===================================================================*/
    $formUComE.addEventListener("submit", function (e) {
        // console.log("Excelente");
        e.preventDefault();
        /**-----Validación de datos */
        if (idUCompraE != 0 && camposUComE.nombreUniE) {
            /**------Fin validación de datos */
            let data = new FormData($formUComE);
            // console.log(data);
            fetch("ajax/unidadCom.ajax.php", {
                method: "POST",
                body: data,
                mode: "cors",
            })
                .then((res) => (res.ok ? res.json() : Promise.reject(res)))
                .then((data) => {
                    console.log(data);
                    if (data === "ok") {
                        toastr.success('Se modificaron los datos de unidad compra correctamente.', 'Datos guardados');
                        tablaUniC.ajax.reload(null, false);
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
            d.getElementById("form-mensajeUComE").classList.add("alert-val-activo");
            setTimeout(() => {
                d.getElementById("form-mensajeUComE").classList.remove(
                    "alert-val-activo"
                );
            }, 5000);
        }
    });
}
d.addEventListener("DOMContentLoaded", contactFormEditUC);
/**------------Fin valición para edición */
/**=================================================================
    * ELIMINAR 
===================================================================*/
const idElimUCom = (id) => {
    let idUComEd = id;
    // console.log("idPdelete ", idUComEd);
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
            let url = "ajax/unidadCom.ajax.php";
            let data = new FormData();
            data.append("idUComEdelete", idUComEd);
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
                    tablaUniC.ajax.reload(null, false);
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

