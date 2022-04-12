/**=================================================================
 * MOSTRA DATOS DE TASA IMPUESTO
 ===================================================================*/
// $.ajax({

//     url: "ajax/tablaTI.ajax.php",
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
tablaTI = $(".tablaRegTI").DataTable({
    ajax: "ajax/tablaTI.ajax.php",
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
            title: "Datos de tasa impuesto",
        },
        {
            extend: "csvHtml5",
            text: '<i class="fas fa-file-excel text-white"></i> ',
            titleAttr: "Desacargar en CSV",
            className: "btn btn-primary mrbtn",
            title: "Datos de tasa impuesto",
        },
        {
            extend: "excelHtml5",
            text: '<i class="fas fa-file-excel text-white"></i> ',
            titleAttr: "Exportar a Excel",
            className: "btn btn-primary mrbtn",
            title: "Datos de tasa impuesto",
        },
        {
            extend: "pdfHtml5",
            text: '<i class="fas fa-file-pdf text-white"></i> ',
            titleAttr: "Exportar a PDF",
            className: "btn btn-primary mrbtn ",
            orientation: "landscape",
            title: "Datos de tasa impuesto",
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
            title: "Datos de tasa impuesto",
        },
    ],
});
/**=================================================================
 * VALIDACIÓN DE FORMULARIO
 ===================================================================*/
function gestTasaIm() {
    const $formTI = d.getElementById("formTI"),
        inputsTI = d.querySelectorAll("#formTI input"),
        $conceptoTI = d.getElementById("conceptoTI"),
        $claveTI = d.getElementById("claveTI"),
        $valorti = d.getElementById("valorti"),
        $tasacuota = d.getElementById("tasacuota"),
        $modalTI = d.getElementById("modalTI");

    /**---Traer datos de id para incrementar el código */
    $modalTI.addEventListener("click", (e) => {
        // console.log("Hola");
        traerIdTI();
    });
    /**---Fin traer datos de id para incrementar el código */
    /**=================================================================
     * ACTIVAR STATUS
     ===================================================================*/
    const $statusTI = d.querySelector(".btnActivarTI")
    d.addEventListener("click", (e) => {
        let $idTI = e.target.getAttribute("idTI");
        // console.log($idTI);
        let $estadoTI = e.target.getAttribute("estadoTI");
        // console.log($estadoTI);
        let data = new FormData();
        data.append("activeidTI", $idTI);
        data.append("activeEti", $estadoTI);
        fetch("ajax/tasaimpuesto.ajax.php", {
            method: "POST",
            body: data,
            mode: "cors",
        })
            .then((res) => (res.ok ? res.json() : Promise.reject(res)))
            .then((json) => {
                // console.log(json);
                tablaTI.ajax.reload(null, false);
            })
            .catch(function (err) {
                // console.log('error', err);
                let message = err.statusText || "Ocurrió un error";
                $statusTI.innerHTML = `<p>Error ${err.status}: ${message}</p>`;
            });
        if ($estadoTI == 0) {
            $(this).removeClass("btn-outline-success");
            $(this).addClass("btn-outline-danger");
            $(this).html("Desactivado");
            $(this).attr("estadoTI", 1);
            // $status.classList.remove("btn-outline-success");
            // $status.classList.add("btn-outline-danger");
            // $status.innerHTML = `Desactivado`;
            // e.target.getAttribute("estadoTI", 1);
        } else {
            // $status.classList.add("btn-outline-success");
            // $status.classList.remove("btn-outline-danger");
            // $status.innerHTML = `Activado`;
            // e.target.getAttribute("estadoTI", 1);
            $(this).addClass("btn-outline-success");
            $(this).removeClass("btn-outline-danger");
            $(this).html("Activado");
            $(this).attr("estadoTI", 0);
        }
    })
    /**=================================================================
     * VALIDACIONES
     ===================================================================*/
    const $regExpreTI = {
        conceptoTI: /^ [A-Za-z0-9ÑñÁáÉéÍíÓóÚúÜü\s]{1,250}$/,
        // valorti: /^[0-9]*(\.d{1})?\d{0,1}$/,
        valorti: /^\d*(\.\d{1})?\d{0,5}$/,
        tasacuota: /^\d*(\.\d{1})?\d{0,5}$/,
    };
    /**------Objeto para validar si los campos estan vacíos. */
    const camposTI = {
        valorti: false,
        tasacuota: false,
        conceptoTI: false,
    };
    const validarFormTI = (e) => {
        // console.log("Se ejecutó");
        // console.log(e.target.name);
        /**El name es del input, es decir, se ejecuta todos los name */
        switch (e.target.name) {
            case "conceptoTI":
                validarInputTI($regExpreTI.conceptoTI, e.target, "conceptoTI");
                break;
            case "valorti":
                validarInputTI($regExpreTI.valorti, e.target, "valorti");
                break;
            case "tasacuota":
                validarInputTI($regExpreTI.tasacuota, e.target, "tasacuota");
                break;
        }
    };
    const validarInputTI = (expresion, input, campo) => {
        if (expresion.test(input.value)) {
            d.querySelector(`#val-${campo} .alert-val`).classList.remove(
                "alert-val-activo"
            );
            // Valida que los campos no esten vacíos.
            camposTI[ campo ] = true;
        } else {
            d.querySelector(`#val-${campo} .alert-val`).classList.add(
                "alert-val-activo"
            );
            setTimeout(() => {
                d.querySelector(`#val-${campo} .alert-val`).classList.remove(
                    "alert-val-activo"
                );
            }, 5000);
            camposTI[ campo ] = false;
        }
    };

    inputsTI.forEach((input) => {
        input.addEventListener("keyup", validarFormTI);
        input.addEventListener("blur", validarFormTI);
    });
    /**---------Fin de validciones */
    /**=================================================================
     * CAPTURAR DATOS PARA GUARDAR TASA DE IMPUESTO
     ===================================================================*/
    $formTI.addEventListener("submit", function (e) {
        // /console.log("Excelente");
        e.preventDefault();
        /**-----Validación de datos */
        const a = $conceptoTI.value,
            b = $tasacuota.value,
            c = $valorti.value;
        // const f = $regExpreTI.conceptoTI;
        // console.log(f);
        if (a != "" && b != "" && c != "") {
            /**------Fin validación de datos */
            let data = new FormData($formTI);
            // console.log(data);
            fetch("ajax/tasaimpuesto.ajax.php", {
                method: "POST",
                body: data,
                mode: "cors",
            })
                .then((res) => (res.ok ? res.json() : Promise.reject(res)))
                .then((json) => {
                    console.log(json);
                    if (json === "ok") {
                        toastr.success(
                            "Se guardaron los datos de tasa impuesto correctamente.",
                            "Datos guardados"
                        );
                        tablaTI.ajax.reload(null, false);
                    }
                    $formTI.reset();
                    traerIdTI();
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
            d.getElementById("form-mensajeTI").classList.add("alert-val-activo");
            setTimeout(() => {
                d.getElementById("form-mensajeTI").classList.remove("alert-val-activo");
            }, 5000);
        }
    });
    /**---------Fin guardar datos de tasa de impuesto */
}
d.addEventListener("DOMContentLoaded", gestTasaIm);
/**=================================================================
    * EDICIÓN
===================================================================*/
const idTIE = (id) => {
    let idtiE = id;
    // console.log("idtiE ", idtiE);
    let url = "ajax/tasaimpuesto.ajax.php";
    let data = new FormData();
    data.append("idtiE", idtiE);
    fetch(url, {
        method: "POST",
        body: data,
        mode: "cors",
    })
        .then((res) => (res.ok ? res.json() : Promise.reject(res)))
        .then((json) => {
            // console.log(json.id);
            idTimpE.value = json.id;
            conceptoTIE.value = json.concepto;
            claveTIE.value = json.clave_tasaImp;
            valortiE.value = json.valor;
            tasacuotaE.value = json.tasaCuota;
        })
        .catch((err) => {
            // console.error('Error', err);
            let message = err.statusText || "Ocurrió un error";
            idTIE.innerHTML = `<p>Error ${err.status}: ${message}</p>`;
        });
};
/**-------Fin edición */
/**--------Fin de validación de formulario */
/**=================================================================
 * VALIDACIÓN DE FORMULARIO EDICIÓN
 ===================================================================*/
function gestTasaImE() {
    const $formTIE = d.getElementById("formTIE"),
        inputsTIE = d.querySelectorAll("#formTIE input"),
        $conceptoTIE = d.getElementById("conceptoTIE"),
        $claveTIE = d.getElementById("claveTIE"),
        $valortiE = d.getElementById("valortiE"),
        $tasacuotaE = d.getElementById("tasacuotaE");
    /** ================================================================
         * VALIDACIONES
         ===================================================================*/
    const $regExpreTI = {
        conceptoTIE: /^ [A-Za-z0-9ÑñÁáÉéÍíÓóÚúÜü\s]{1,250}$/,
        valortiE: /^[0-9\.\s]{1,10}$/,
        tasacuotaE: /^[0-9\.\s]{1,10}$/,
    };
    /**------Objeto para validar si los campos estan vacíos. */
    const camposTIE = {
        valortiE: false,
        tasacuotaE: false,
        conceptoTIE: false,
    };
    const validarFormTIE = (e) => {
        // console.log("Se ejecutó");
        // console.log(e.target.name);
        /**El name es del input, es decir, se ejecuta todos los name */
        switch (e.target.name) {
            case "conceptoTIE":
                validarInputTIE($regExpreTI.conceptoTIE, e.target, "conceptoTIE");
                break;
            case "valortiE":
                validarInputTIE($regExpreTI.valortiE, e.target, "valortiE");
                break;
            case "tasacuotaE":
                validarInputTIE($regExpreTI.tasacuotaE, e.target, "tasacuotaE");
                break;
        }
    };
    const validarInputTIE = (expresion, input, campo) => {
        if (expresion.test(input.value)) {
            d.querySelector(`#val-${campo} .alert-val`).classList.remove(
                "alert-val-activo"
            );
            // Valida que los campos no esten vacíos.
            camposTIE[ campo ] = true;
        } else {
            d.querySelector(`#val-${campo} .alert-val`).classList.add(
                "alert-val-activo"
            );
            setTimeout(() => {
                d.querySelector(`#val-${campo} .alert-val`).classList.remove(
                    "alert-val-activo"
                );
            }, 5000);
            camposTIE[ campo ] = false;
        }
    };

    inputsTIE.forEach((input) => {
        input.addEventListener("keyup", validarFormTIE);
        input.addEventListener("blur", validarFormTIE);
    });
    /**---------Fin de validciones */
    /**=================================================================
     * CAPTURAR DATOS PARA GUARDAR TASA DE IMPUESTO
     ===================================================================*/
    $formTIE.addEventListener("submit", function (e) {
        // /console.log("Excelente");
        e.preventDefault();
        /**-----Validación de datos */
        const a = $conceptoTIE.value,
            b = $tasacuotaE.value,
            c = $valortiE.value,
            d = idTimpE.value
        // const f = $regExpreTI.conceptoTI;
        // console.log(f);
        if (a != "" && b != "" && c != "" && d != "") {
            /**------Fin validación de datos */
            let data = new FormData($formTIE);
            // console.log(data);
            fetch("ajax/tasaimpuesto.ajax.php", {
                method: "POST",
                body: data,
                mode: "cors",
            })
                .then((res) => (res.ok ? res.json() : Promise.reject(res)))
                .then((json) => {
                    console.log(json);
                    if (json === "ok") {
                        toastr.success(
                            "Se guardaron los datos de tasa impuesto correctamente.",
                            "Datos guardados"
                        );
                        tablaTI.ajax.reload(null, false);
                    }
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
            d.getElementById("form-mensajeTIE").classList.add("alert-val-activo");
            setTimeout(() => {
                d.getElementById("form-mensajeTIE").classList.remove("alert-val-activo");
            }, 5000);
        }
    });
    /**---------Fin guardar datos de tasa de impuesto */
}
d.addEventListener("DOMContentLoaded", gestTasaImE);

function traerIdTI() {
    const $claveTI = d.getElementById("claveTI");
    // console.log("Hola");
    let data = new FormData;
    data.append("traerCodeTI", 'true');
    fetch("ajax/tasaimpuesto.ajax.php", {
        method: "POST",
        body: data,
        cors: "cors",
    }).then((res) => (res.ok ? res.json() : Promise.reject(res)))
        .then((json) => {
            // console.log(json);
            const $codigo = Number((json.clave_tasaImp).substr(-1)) + 1;
            const $codigo2 = Number((json.clave_tasaImp).substr(-2)) + 1;
            if (!json.clave_tasaImp) {
                // console.log(json);
                $claveTI.value = '00' + 1;
            } else if ($codigo2 < 10 && $codigo < 10) {
                $claveTI.value = '00' + $codigo;
            } else if ($codigo == 10) {
                $claveTI.value = '0' + $codigo;
            } else if ($codigo2 > 10) {
                if ($codigo2 > 10 && $codigo2 < 100) {
                    $claveTI.value = '0' + $codigo2;
                } else {
                    $claveTI.value = $codigo2;
                }
            }
        }).catch((err) => {
            // console.log('error', err);
            let message = err.statusText || "Ocurrió un error";
            $claveTI.innerHTML = `<p>Error ${err.status}: ${message}</p>`;
        });
}
/**=================================================================
    * ELIMINAR DATOS
    ===================================================================*/
const idElimTI = (id) => {
    let idElimTI = id;
    // console.log("idPdelete ", idElimTI);
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
            let url = "ajax/tasaimpuesto.ajax.php";
            let data = new FormData();
            data.append("iDTIDelete", idElimTI);
            fetch(url, {
                method: "POST",
                body: data,
                mode: "cors",
            })
                .then((res) => (res.ok ? res.json() : Promise.reject(res)))
                .then((json) => {
                    console.log(json);
                    if (json === "ok") {
                        Swal.fire({
                            icon: "success",
                            title: "Datos eliminados",
                            showConfirmButton: false,
                            timer: 1500,
                        });
                    }
                    tablaTI.ajax.reload(null, false);
                })
                .catch(function (err) {
                    // console.error('Error', err);
                    let message = err.statusText || "Ocurrió un error";
                    idElimTI.innerHTML = `<p>Error ${err.status}: ${message}</p>`;
                });
        }
    });
};
/**----------------Eliminar proveedor */
