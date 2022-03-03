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
    ajax: "ajax/tablaClientes.ajax.php",
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
            title: "Datos de clientes",
        },
        {
            extend: "csvHtml5",
            text: '<i class="fas fa-file-excel text-white"></i> ',
            titleAttr: "Desacargar en CSV",
            className: "btn btn-primary mrbtn",
            title: "Datos de clientes",
        },
        {
            extend: "excelHtml5",
            text: '<i class="fas fa-file-excel text-white"></i> ',
            titleAttr: "Exportar a Excel",
            className: "btn btn-primary mrbtn",
            title: "Datos de clientes",
        },
        {
            extend: "pdfHtml5",
            text: '<i class="fas fa-file-pdf text-white"></i> ',
            titleAttr: "Exportar a PDF",
            className: "btn btn-primary mrbtn ",
            orientation: "landscape",
            title: "Datos de clientes",
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
            title: "Datos de clientes",
        },
    ],
});
/**=================================================================
 * VALIDACIÓN DE FORMULARIO
 ===================================================================*/
/**-----Convertir en mayúsculas la entrada en el input */
function contactFormC() {
    const $formc = d.getElementById("formCli"),
        inputs = d.querySelectorAll("#formCli input"),
        $nombreClie = d.getElementById("nombrecli"),
        $emailClient = d.getElementById("emailcli"),
        $razonS = d.getElementById("razoncli"),
        $RFC = d.getElementById("rfccli");

    const $regExpre = {
        nombrecli: /^[A-Za-z0-9ÑñÁáÉéÍíÓóÚúÜü\s]{1,250}$/,
        dircli: /^[A-Za-zÑñÁáÉéÍíÓóÚúÜü0-9\_\-\.\,\s]{1,250}$/,
        telcli: /^\d{10}$/,
        emailcli:
            /^[A-Za-z0-9]+(\.[A-Za-z0-9]+|-[A-Za-z0-9]+|_[A-Za-z0-9]+)*@[A-Za-z0-9-]+(\.[A-Za-z0-9-]+)*(\.[A-Za-z]{2,15})$/,
        razoncli: /^[A-Za-zÑñÁáÉéÍíÓóÚúÜü0-9\_\-\.\,\s]{1,250}$/,
        rfccli:
            /^([A-ZÑ&]{3,4}) ?(?:- ?)?(\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])) ?(?:- ?)?([A-Z\d]{2})([A\d])$/,
    };
    const $regExpre2 = {
        rfccli:
            /^([A-ZÑ&]{3,4})(?:- )?(\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01]))(?:- )?(([A-Z\d]{2})([A\d]))?$/,
    };
    /**Con homoclave: ^([A-ZÑ&]{3,4})(?:- )?(\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01]))(?:- )?([A-Z\d]{2})([A\d])$
     * sin homoclave: ^([A-ZÑ&]{3,4})(?:- )?(\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01]))(?:- )?(([A-Z\d]{2})([A\d]))?$
     * simplificada: ^([A-Z]{3,4})(\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01]))([A-Z\d]{2}(?:[A\d]))?$
     */
    /**------Objeto para validar si los campos estan vacíos. */
    const campos = {
        nombrecli: false,
        dircli: false,
        telcli: false,
        emailcli: false,
        razoncli: false,
        rfccli: false,
    };
    const validarFormCli = (e) => {
        // console.log("Se ejecutó");
        // console.log(e.target.name);
        /**El name es del input, es decir, se ejecuta todos los name */
        switch (e.target.name) {
            case "nombrecli":
                validarInput($regExpre.nombrecli, e.target, "nombrecli");
                break;
            case "dircli":
                validarInput($regExpre.dircli, e.target, "dircli");
                break;
            case "telcli":
                validarInput($regExpre.telcli, e.target, "telcli");
                break;
            case "emailcli":
                validarInput($regExpre.emailcli, e.target, "emailcli");
                break;
            case "razoncli":
                validarInput($regExpre.razoncli, e.target, "razoncli");
                break;
            case "rfccli":
                validarInput($regExpre.rfccli, e.target, "rfccli") ||
                    validarInput($regExpre2.rfccli, e.target, "rfccli");
                break;
        }
    };
    const validarInput = (expresion, input, campo) => {
        if (expresion.test(input.value)) {
            d.querySelector(`#val-${campo} .alert-val`).classList.remove(
                "alert-val-activo"
            );
            // Valida que los campos no esten vacíos.
            campos[campo] = true;
        } else {
            d.querySelector(`#val-${campo} .alert-val`).classList.add(
                "alert-val-activo"
            );
            setTimeout(() => {
                d.querySelector(`#val-${campo} .alert-val`).classList.remove(
                    "alert-val-activo"
                );
            }, 5000);
            campos[campo] = false;
        }
    };

    inputs.forEach((input) => {
        input.addEventListener("keyup", validarFormCli);
        input.addEventListener("blur", validarFormCli);
    });
    /**=================================================================
      * VALIDAR SI NOMBRE DE CLIENTES EXISTE
      ===================================================================*/
    $nombreClie.addEventListener("change", (e) => {
        // console.log(e);
        const $nameClien = e.target.value;
        // console.log($nameClien);
        let data = new FormData();
        data.append("nameCliente", $nameClien);
        fetch("ajax/cliente.ajax.php", {
            method: "POST",
            body: data,
            mode: "cors",
        })
            .then((res) => (res.ok ? res.json() : Promise.reject(res)))
            .then((json) => {
                // console.log(json);
                if (json.length != 0) {
                    d.querySelector("#nom-cli").classList.add("alert-val-activo");
                    setTimeout(() => {
                        d.querySelector("#nom-cli").classList.remove("alert-val-activo");
                    }, 5000);
                    // Swal.fire({
                    //     position: "top-end",
                    //     icon: "error",
                    //     text: `¡El nombre ${$nameCli} ya existe en la base de datos!`,
                    //     showConfirmButton: false,
                    //     timer: 3000
                    // })
                    $nombreClie.value = "";
                }
            })
            .catch(function (err) {
                // console.log('error', err);
                let message = err.statusText || "Ocurrió un error";
                $nombreClie.innerHTML = `<p>Error ${err.status}: ${message}</p>`;
            });
    });
    /**------Fin de valición de cliente si existe. */
    /**=================================================================
     * VALIDAR SI EMAIL DE CLIENTES EXISTE
     ===================================================================*/
    $emailClient.addEventListener("change", (e) => {
        // console.log(e);
        const $emailClien = e.target.value;
        // console.log($emailClien);
        let data = new FormData();
        data.append("emailCliente", $emailClien);
        fetch("ajax/cliente.ajax.php", {
            method: "POST",
            body: data,
            mode: "cors",
        })
            .then((res) => (res.ok ? res.json() : Promise.reject(res)))
            .then((json) => {
                // console.log(json);
                if (json.length != 0) {
                    d.querySelector("#email-cliente").classList.add("alert-val-activo");
                    setTimeout(() => {
                        d.querySelector("#email-cliente").classList.remove(
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
                    $emailClient.value = "";
                }
            })
            .catch(function (err) {
                // console.log('error', err);
                let message = err.statusText || "Ocurrió un error";
                $emailClient.innerHTML = `<p>Error ${err.status}: ${message}</p>`;
            });
    });
    /**------Fin de valición de email cliente si existe. */
    /**=================================================================
    * VALIDAR SI RAZÓN SOCIAL DE CLIENTES EXISTE
    ===================================================================*/
    $razonS.addEventListener("change", (e) => {
        // console.log(e);
        const $razonSClien = e.target.value;
        // console.log($razonSClien);
        let data = new FormData();
        data.append("razonSCliente", $razonSClien);
        fetch("ajax/cliente.ajax.php", {
            method: "POST",
            body: data,
            mode: "cors",
        })
            .then((res) => (res.ok ? res.json() : Promise.reject(res)))
            .then((json) => {
                // console.log(json);
                if (json.length != 0) {
                    d.querySelector("#rz-cli").classList.add("alert-val-activo");
                    setTimeout(() => {
                        d.querySelector("#rz-cli").classList.remove(
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
                    $razonS.value = "";
                }
            })
            .catch(function (err) {
                // console.log('error', err);
                let message = err.statusText || "Ocurrió un error";
                $razonS.innerHTML = `<p>Error ${err.status}: ${message}</p>`;
            });
    });
    /**------Fin de valición de razón social cliente si existe. */
    /**=================================================================
   * VALIDAR SI RFC DE CLIENTES EXISTE
   ===================================================================*/
    $RFC.addEventListener("change", (e) => {
        // console.log(e);
        const $rfcClien = e.target.value;
        // console.log($rfcClien);
        let data = new FormData();
        data.append("rfcCliente", $rfcClien);
        fetch("ajax/cliente.ajax.php", {
            method: "POST",
            body: data,
            mode: "cors",
        })
            .then((res) => (res.ok ? res.json() : Promise.reject(res)))
            .then((json) => {
                // console.log(json);
                if (json.length != 0) {
                    d.querySelector("#rfc-cli").classList.add("alert-val-activo");
                    setTimeout(() => {
                        d.querySelector("#rfc-cli").classList.remove(
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
                    $RFC.value = "";
                }
            })
            .catch(function (err) {
                // console.log('error', err);
                let message = err.statusText || "Ocurrió un error";
                $RFC.innerHTML = `<p>Error ${err.status}: ${message}</p>`;
            });
    });
    /**------Fin de valición de RFC cliente si existe. */
    /**=================================================================
       * CAPTURAR DATOS PARA GUARDAR PROVEEDOR
       ===================================================================*/
    $formc.addEventListener("submit", function (e) {
        // /console.log("Excelente");
        e.preventDefault();
        /**-----Validación de datos */
        if (
            campos.nombrecli &&
            campos.dircli &&
            campos.emailcli &&
            campos.telcli &&
            campos.razoncli &&
            campos.rfccli
        ) {
            /**------Fin validación de datos */
            let data = new FormData($formc);
            // console.log(data);
            fetch("ajax/cliente.ajax.php", {
                method: "POST",
                body: data,
                mode: "cors",
            })
                .then((res) => res.json())
                .then((data) => {
                    // console.log(data);
                    if (data === "ok") {
                        toastr.success(
                            "Se guardaron los datos de cliente correctamente.",
                            "Datos guardados"
                        );
                        tablaCliente.ajax.reload(null, false);
                    }
                    $formc.reset();
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
            d.getElementById("form-mensaje").classList.add("alert-val-activo");
            setTimeout(() => {
                d.getElementById("form-mensaje").classList.remove("alert-val-activo");
            }, 5000);
        }
    });
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
        fetch("ajax/cliente.ajax.php", {
            method: "POST",
            body: data,
            mode: "cors",
        })
            .then((res) => (res.ok ? res.json() : Promise.reject(res)))
            .then((json) => {
                // console.log(json);
                tablaCliente.ajax.reload(null, false);
            })
            .catch(function (err) {
                // console.log('error', err);
                let message = err.statusText || "Ocurrió un error";
                $status.innerHTML = `<p>Error ${err.status}: ${message}</p>`;
            });
        if ($estadoCliente == 0) {
            $(this).removeClass("btn-outline-success");
            $(this).addClass("btn-outline-danger");
            $(this).html("Desactivado");
            $(this).attr("estadoCliente", 1);
            // $status.classList.remove("btn-outline-success");
            // $status.classList.add("btn-outline-danger");
            // $status.innerHTML = `Desactivado`;
            // e.target.getAttribute("estadoCliente", 1);
        } else {
            // $status.classList.add("btn-outline-success");
            // $status.classList.remove("btn-outline-danger");
            // $status.innerHTML = `Activado`;
            // e.target.getAttribute("estadoCliente", 1);
            $(this).addClass("btn-outline-success");
            $(this).removeClass("btn-outline-danger");
            $(this).html("Activado");
            $(this).attr("estadoCliente", 0);
        }
    });
    /**------------Fin de descativar o activar status */
}
d.addEventListener("DOMContentLoaded", contactFormC);
/**--------------------Fin para guardar datos de cliente */
/**=================================================================
    * EDICIÓN DE CLIENTE
    ===================================================================*/
const idClientes = (id) => {
    let idC = id;
    // console.log("idC ", idC);
    let url = "ajax/cliente.ajax.php";
    let data = new FormData();
    data.append("idClientes", idC);
    fetch(url, {
        method: "POST",
        body: data,
        mode: "cors",
    })
        .then((res) => (res.ok ? res.json() : Promise.reject(res)))
        .then((json) => {
            // console.log(json);
            idCliente.value = json.id;
            nombrecliE.value = json.nombre_cliente;
            telcliE.value = json.telefono_cli;
            dircliE.value = json.direccion_cli;
            razoncliE.value = json.razonSocial_cli;
            rfccliE.value = json.rfc_cli;
            emailcliE.value = json.email;
        })
        .catch(function (err) {
            // console.error('Error', err);
            let message = err.statusText || "Ocurrió un error";
            idClientes.innerHTML = `<p>Error ${err.status}: ${message}</p>`;
        });
};
/**-------Fin edición de proveedor */
/**=================================================================
* VALIDACIÓN DE FORMULARIO EDICIÓN
===================================================================*/
function contactFormEditC() {
    const $formcEdit = d.getElementById("formCliE"),
        inputs = d.querySelectorAll("#formCliE input");

    const $regExpre = {
        nombrecliE: /^[A-Za-z0-9ÑñÁáÉéÍíÓóÚúÜü\s]{1,250}$/,
        dircliE: /^[A-Za-zÑñÁáÉéÍíÓóÚúÜü0-9\_\-\.\,\s]{1,250}$/,
        telcliE: /^\d{10}$/,
        emailcliE:
            /^[A-Za-z0-9]+(\.[A-Za-z0-9]+|-[A-Za-z0-9]+|_[A-Za-z0-9]+)*@[A-Za-z0-9-]+(\.[A-Za-z0-9-]+)*(\.[A-Za-z]{2,15})$/,
        razoncliE: /^[A-Za-zÑñÁáÉéÍíÓóÚúÜü0-9\_\-\.\,\s]{1,250}$/,
        rfccliE:
            /^([A-ZÑ&]{3,4}) ?(?:- ?)?(\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])) ?(?:- ?)?([A-Z\d]{2})([A\d])$/,
    };
    const $regExpre2 = {
        rfccliE:
            /^([A-ZÑ&]{3,4})(?:- )?(\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01]))(?:- )?(([A-Z\d]{2})([A\d]))?$/,
    };
    /**Con homoclave: ^([A-ZÑ&]{3,4})(?:- )?(\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01]))(?:- )?([A-Z\d]{2})([A\d])$
     * sin homoclave: ^([A-ZÑ&]{3,4})(?:- )?(\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01]))(?:- )?(([A-Z\d]{2})([A\d]))?$
     * simplificada: ^([A-Z]{3,4})(\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01]))([A-Z\d]{2}(?:[A\d]))?$
     */
    /**------Objeto para validar si los campos estan vacíos. */
    const camposE = {
        nombrecliE: false,
        dircliE: false,
        telcliE: false,
        emailcliE: false,
        razoncliE: false,
        rfccliE: false,
    };
    const validarFormE = (e) => {
        // console.log("Se ejecutó");
        // console.log(e.target.name);
        /**El name es del input, es decir, se ejecuta todos los name */
        switch (e.target.name) {
            case "nombrecliE":
                validarInput($regExpre.nombrecliE, e.target, "nombrecliE");
                break;
            case "dircliE":
                validarInput($regExpre.dircliE, e.target, "dircliE");
                break;
            case "telcliE":
                validarInput($regExpre.telcliE, e.target, "telcliE");
                break;
            case "emailcliE":
                validarInput($regExpre.emailcliE, e.target, "emailcliE");
                break;
            case "razoncliE":
                validarInput($regExpre.razoncliE, e.target, "razoncliE");
                break;
            case "rfccliE":
                validarInput($regExpre.rfccliE, e.target, "rfccliE") ||
                    validarInput($regExpre2.rfccliE, e.target, "rfccliE");
        }
    };
    const validarInput = (expresion, input, campo) => {
        if (expresion.test(input.value)) {
            d.querySelector(`#val-${campo} .alert-val`).classList.remove(
                "alert-val-activo"
            );
            // Valida que los camposE no esten vacíos.
            camposE[campo] = true;
        } else {
            d.querySelector(`#val-${campo} .alert-val`).classList.add(
                "alert-val-activo"
            );
            setTimeout(() => {
                d.querySelector(`#val-${campo} .alert-val`).classList.remove(
                    "alert-val-activo"
                );
            }, 5000);
            camposE[campo] = false;
        }
    };

    inputs.forEach((input) => {
        input.addEventListener("keyup", validarFormE);
        input.addEventListener("blur", validarFormE);
    });
    /**=================================================================
       * CAPTURAR DATOS PARA GUARDAR PROVEEDOR
       ===================================================================*/
    $formcEdit.addEventListener("submit", function (e) {
        // /console.log("Excelente");
        e.preventDefault();
        /**-----Validación de datos */
        if (
            idCliente != 0 &&
            nombrecliE != 0 &&
            dircliE != 0 &&
            razoncliE != 0 &&
            telcliE != 0 &&
            rfccliE != 0 &&
            emailcliE != 0
        ) {
            /**------Fin validación de datos */
            let data = new FormData($formcEdit);
            // console.log(data);
            fetch("ajax/cliente.ajax.php", {
                method: "POST",
                body: data,
                mode: "cors",
            })
                .then((res) => res.json())
                .then((data) => {
                    // console.log(data);
                    if (data === "ok") {
                        toastr.success(
                            "Se actualizaron los datos de cliente correctamente.",
                            "Datos guardados"
                        );
                        tablaCliente.ajax.reload(null, false);
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
            d.getElementById("form-mensajeE").classList.add("alert-val-activo");
            setTimeout(() => {
                d.getElementById("form-mensajeE").classList.remove("alert-val-activo");
            }, 5000);
        }
    });
}
d.addEventListener("DOMContentLoaded", contactFormEditC);
/**-------------Fin edición de formulario */
/**=================================================================
    * ELIMINAR PROVEEDOR
    ===================================================================*/
const idEliminarC = (id) => {
    let idCdelete = id;
    // console.log("idPdelete ", idPdelete);
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
            let url = "ajax/cliente.ajax.php";
            let data = new FormData();
            data.append("ideliminarC", idCdelete);
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
                    tablaCliente.ajax.reload(null, false);
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
