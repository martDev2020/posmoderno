/**===================================
 * CARGAR TABLA DINÁMICA DE CATEGORÍAS
 ===================================*/
// $.ajax({

//     url: "ajax/tablaDep.ajax.php",
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
tablaDepartamento = $(".tablaDep").DataTable({
    ajax: "ajax/tablaDep.ajax.php",
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
            title: "Datos de departamento",
        },
        {
            extend: "csvHtml5",
            text: '<i class="fas fa-file-excel text-white"></i> ',
            titleAttr: "Desacargar en CSV",
            className: "btn btn-primary mrbtn",
            title: "Datos de departamento",
        },
        {
            extend: "excelHtml5",
            text: '<i class="fas fa-file-excel text-white"></i> ',
            titleAttr: "Exportar a Excel",
            className: "btn btn-primary mrbtn",
            title: "Datos de departamento",
        },
        {
            extend: "pdfHtml5",
            text: '<i class="fas fa-file-pdf text-white"></i> ',
            titleAttr: "Exportar a PDF",
            className: "btn btn-primary mrbtn ",
            orientation: "landscape",
            title: "Datos de departamento",
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
            title: "Datos de departamento",
        },
    ],
});
/**=================================================================
 * VALIDACIÓN DE FORMULARIO
 ===================================================================*/
/**-----Convertir en mayúsculas la entrada en el input */
function contactFormDep() {
    const $formD = d.getElementById("formDep"),
        inputsD = d.querySelectorAll("#formDep input"),
        $nombreDep = d.getElementById("nombredep");

    const $regExpre = {
        nombredep: /^[A-Za-z0-9ÑñÁáÉéÍíÓóÚúÜü\s]{1,250}$/,
    };
    /**------Objeto para validar si los campos estan vacíos. */
    const camposdep = {
        nombredep: false,
    };
    const validarFormDep = (e) => {
        // console.log("Se ejecutó");
        // console.log(e.target.name);
        /**El name es del input, es decir, se ejecuta todos los name */
        switch (e.target.name) {
            case "nombredep":
                validarInputD($regExpre.nombredep, e.target, "nombredep");
                break;
        }
    };
    const validarInputD = (expresion, input, campo) => {
        if (expresion.test(input.value)) {
            d.querySelector(`#val-${campo} .alert-val`).classList.remove(
                "alert-val-activo"
            );
            // Valida que los campos no esten vacíos.
            camposdep[campo] = true;
        } else {
            d.querySelector(`#val-${campo} .alert-val`).classList.add(
                "alert-val-activo"
            );
            setTimeout(() => {
                d.querySelector(`#val-${campo} .alert-val`).classList.remove(
                    "alert-val-activo"
                );
            }, 5000);
            camposdep[campo] = false;
        }
    };

    inputsD.forEach((input) => {
        input.addEventListener("keyup", validarFormDep);
        input.addEventListener("blur", validarFormDep);
    });
    /**=================================================================
      * VALIDAR SI NOMBRE DEPARTAMENTO EXISTE
      ===================================================================*/
    $nombreDep.addEventListener("change", (e) => {
        // console.log(e);
        const $nameD = e.target.value;
        // console.log($nameD);
        let data = new FormData();
        data.append("nameD", $nameD);
        fetch("ajax/departamento.ajax.php", {
            method: "POST",
            body: data,
            mode: "cors",
        })
            .then((res) => (res.ok ? res.json() : Promise.reject(res)))
            .then((json) => {
                // console.log(json);
                if (json.length != 0) {
                    d.querySelector(".alert-val-danger").classList.add("alert-val-activo");
                    setTimeout(() => {
                        d.querySelector(".alert-val-danger").classList.remove("alert-val-activo");
                    }, 5000);
                    // Swal.fire({
                    //     position: "top-end",
                    //     icon: "error",
                    //     text: `¡El nombre ${$nameCli} ya existe en la base de datos!`,
                    //     showConfirmButton: false,
                    //     timer: 3000
                    // })
                    $nombreDep.value = "";
                }
            })
            .catch(function (err) {
                // console.log('error', err);
                let message = err.statusText || "Ocurrió un error";
                $nombreDep.innerHTML = `<p>Error ${err.status}: ${message}</p>`;
            });
    });
    /**------Fin de validación departamento si existe. */
    /**=================================================================
     * ACTIVAR Y DESACTIVAR BOTÓN DE STATUS
     ===================================================================*/
    const $statusDep = d.querySelector(".btnActivarDep");
    // console.log("$statusDep ", $statusDep);
    d.addEventListener("click", (e) => {
        // console.log(e.target);
        let $idDep = e.target.getAttribute("idDep");
        // console.log($idDep);
        let $estadoDep = e.target.getAttribute("estadoDep");
        // console.log($estadoDep);
        let data = new FormData();
        data.append("activeIdDep", $idDep);
        data.append("activeEdep", $estadoDep);
        fetch("ajax/departamento.ajax.php", {
            method: "POST",
            body: data,
            mode: "cors",
        })
            .then((res) => (res.ok ? res.json() : Promise.reject(res)))
            .then((json) => {
                // console.log(json);
                tablaDepartamento.ajax.reload(null, false);
            })
            .catch(function (err) {
                // console.log('error', err);
                let message = err.statusText || "Ocurrió un error";
                $statusDep.innerHTML = `<p>Error ${err.status}: ${message}</p>`;
            });
        if ($estadoDep == 0) {
            $(this).removeClass("btn-outline-success");
            $(this).addClass("btn-outline-danger");
            $(this).html("Desactivado");
            $(this).attr("estadoDep", 1);
            // $status.classList.remove("btn-outline-success");
            // $status.classList.add("btn-outline-danger");
            // $status.innerHTML = `Desactivado`;
            // e.target.getAttribute("estadoDep", 1);
        } else {
            // $status.classList.add("btn-outline-success");
            // $status.classList.remove("btn-outline-danger");
            // $status.innerHTML = `Activado`;
            // e.target.getAttribute("estadoDep", 1);
            $(this).addClass("btn-outline-success");
            $(this).removeClass("btn-outline-danger");
            $(this).html("Activado");
            $(this).attr("estadoDep", 0);
        }
    });
    /**------------Fin de descativar o activar status */
    /**=================================================================
       * CAPTURAR DATOS PARA GUARDAR DEPARTAMENTO
       ===================================================================*/
    $formD.addEventListener("submit", function (e) {
        // /console.log("Excelente");
        e.preventDefault();
        /**-----Validación de datos */
        if (
            camposdep.nombredep
        ) {
            /**------Fin validación de datos */
            let data = new FormData($formD);
            // console.log(data);
            fetch("ajax/departamento.ajax.php", {
                method: "POST",
                body: data,
                mode: "cors",
            })
                .then((res) => (res.ok ? res.json() : Promise.reject(res)))
                .then((json) => {
                    // console.log(data);
                    if (json === "ok") {
                        toastr.success(
                            "Se guardaron los datos de departamento correctamente.",
                            "Datos guardados"
                        );
                        tablaDepartamento.ajax.reload(null, false);
                    }
                    $formD.reset();
                })
                .catch(function (err) {
                    // console.log('error', err);
                    Swal.fire({
                        position: "top-end",
                        icon: "error",
                        text: "¡Datos incorrectos o vacíos, no deben llevar caracteres especiales!",
                        showConfirmButton: false,
                        timer: 2000,
                    });
                });
            // $('#modal-4').modal('hide');
        } else {
            d.getElementById("form-mensajedep").classList.add("alert-val-activo");
            setTimeout(() => {
                d.getElementById("form-mensajedep").classList.remove("alert-val-activo");
            }, 5000);
        }
    });
}
d.addEventListener("DOMContentLoaded", contactFormDep);
/**--------------------Fin para guardar datos de departamento */
/**=================================================================
    * EDICIÓN
    ===================================================================*/
const idDep = (id) => {
    let idDep = id;
    // console.log("idDep ", idDep);
    let url = "ajax/departamento.ajax.php";
    let data = new FormData();
    data.append("idDep", idDep);
    fetch(url, {
        method: "POST",
        body: data,
        mode: "cors",
    })
        .then((res) => (res.ok ? res.json() : Promise.reject(res)))
        .then((json) => {
            // console.log(json);
            idDepE.value = json.id;
            nombredepE.value = json.nombre_dep;
        })
        .catch(function (err) {
            // console.error('Error', err);
            let message = err.statusText || "Ocurrió un error";
            idClientes.innerHTML = `<p>Error ${err.status}: ${message}</p>`;
        });
};
/**-------Fin edición */
/**=================================================================
* VALIDACIÓN DE FORMULARIO EDICIÓN
===================================================================*/
function contactFormEditDep() {
    const $formDE = d.getElementById("formDepE"),
        inputsDE = d.querySelectorAll("#formDepE input"),
        $nombreDepE = d.getElementById("nombredepE");

    const $regExpre = {
        nombredepE: /^[A-Za-z0-9ÑñÁáÉéÍíÓóÚúÜü\s]{1,250}$/,
    };
    /**------Objeto para validar si los campos estan vacíos. */
    const camposdepE = {
        nombredepE: false,
    };
    const validarFormDepE = (e) => {
        // console.log("Se ejecutó");
        // console.log(e.target.name);
        /**El name es del input, es decir, se ejecuta todos los name */
        switch (e.target.name) {
            case "nombredepE":
                validarInputDE($regExpre.nombredepE, e.target, "nombredepE");
                break;
        }
    };
    const validarInputDE = (expresion, input, campo) => {
        if (expresion.test(input.value)) {
            d.querySelector(`#val-${campo} .alert-val`).classList.remove(
                "alert-val-activo"
            );
            // Valida que los campos no esten vacíos.
            camposdepE[campo] = true;
        } else {
            d.querySelector(`#val-${campo} .alert-val`).classList.add(
                "alert-val-activo"
            );
            setTimeout(() => {
                d.querySelector(`#val-${campo} .alert-val`).classList.remove(
                    "alert-val-activo"
                );
            }, 5000);
            camposdepE[campo] = false;
        }
    };

    inputsDE.forEach((input) => {
        input.addEventListener("keyup", validarFormDepE);
        input.addEventListener("blur", validarFormDepE);
    });
    /**=================================================================
      * VALIDAR SI NOMBRE DEPARTAMENTO EXISTE
      ===================================================================*/
    $nombreDepE.addEventListener("change", (e) => {
        // console.log(e);
        const $nameDE = e.target.value;
        // console.log($nameDE);
        let data = new FormData();
        data.append("nameD", $nameDE);
        fetch("ajax/departamento.ajax.php", {
            method: "POST",
            body: data,
            mode: "cors",
        })
            .then((res) => (res.ok ? res.json() : Promise.reject(res)))
            .then((json) => {
                // console.log(json);
                if (json.length != 0) {
                    d.querySelector(".alert-val-danger").classList.add("alert-val-activo");
                    setTimeout(() => {
                        d.querySelector(".alert-val-danger").classList.remove("alert-val-activo");
                    }, 5000);
                    // Swal.fire({
                    //     position: "top-end",
                    //     icon: "error",
                    //     text: `¡El nombre ${$nameCli} ya existe en la base de datos!`,
                    //     showConfirmButton: false,
                    //     timer: 3000
                    // })
                    $nombreDepE.value = "";
                }
            })
            .catch(function (err) {
                // console.log('error', err);
                let message = err.statusText || "Ocurrió un error";
                $nombreDepE.innerHTML = `<p>Error ${err.status}: ${message}</p>`;
            });
    });
    /**=================================================================
       * CAPTURAR DATOS PARA MODIFICAR DAPARTAMENTO
       ===================================================================*/
    $formDE.addEventListener("submit", function (e) {
        // /console.log("Excelente");
        e.preventDefault();
        /**-----Validación de datos */
        if (
            idDepE != 0 && nombredepE != 0
        ) {
            /**------Fin validación de datos */
            let data = new FormData($formDE);
            // console.log(data);
            fetch("ajax/departamento.ajax.php", {
                method: "POST",
                body: data,
                mode: "cors",
            })
                .then((res) => res.json())
                .then((data) => {
                    // console.log(data);
                    if (data === "ok") {
                        toastr.success(
                            "Se actualizaron los datos de departamento correctamente.",
                            "Datos guardados"
                        );
                        tablaDepartamento.ajax.reload(null, false);
                    }
                    // $formcEdit.reset();
                })
                .catch(function (err) {
                    // console.log('error', err);
                    Swal.fire({
                        position: "top-end",
                        icon: "error",
                        text: "<small>¡Datos incorrectos o vacíos, no deben llevar caracteres especiales!</small>",
                        showConfirmButton: false,
                        timer: 2000,
                    });
                });
            // $('#modal-4').modal('hide');
        } else {
            d.getElementById("form-mensajedepE").classList.add("alert-val-activo");
            setTimeout(() => {
                d.getElementById("form-mensajedepE").classList.remove("alert-val-activo");
            }, 5000);
        }
    });
}
d.addEventListener("DOMContentLoaded", contactFormEditDep);
/**-------------Fin edición de formulario */
/**=================================================================
    * ELIMINAR PROVEEDOR
    ===================================================================*/
const idEliminarDep = (id) => {
    let idDepD = id;
    // console.log("idPdelete ", idDepD);
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
            let url = "ajax/departamento.ajax.php";
            let data = new FormData();
            data.append("idDepDelete", idDepD);
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
                    tablaDepartamento.ajax.reload(null, false);
                })
                .catch(function (err) {
                    // console.error('Error', err);
                    let message = err.statusText || "Ocurrió un error";
                    idEliminarC.innerHTML = `<p>Error ${err.status}: ${message}</p>`;
                });
        }
    });
};
/**----------------Eliminar proveedor */
