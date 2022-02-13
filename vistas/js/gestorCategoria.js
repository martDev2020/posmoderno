/**===================================
 * CARGAR TABLA DINÁMICA DE CATEGORÍAS
 ===================================*/
// $.ajax({

//     url: "ajax/tablaCategoria.ajax.php",
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
tablaCategoria = $(".tablaCategoria").DataTable({
    ajax: "ajax/tablaCategoria.ajax.php",
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
            title: "Datos de categoria",
        },
        {
            extend: "csvHtml5",
            text: '<i class="fas fa-file-excel text-white"></i> ',
            titleAttr: "Desacargar en CSV",
            className: "btn btn-primary mrbtn",
            title: "Datos de categoria",
        },
        {
            extend: "excelHtml5",
            text: '<i class="fas fa-file-excel text-white"></i> ',
            titleAttr: "Exportar a Excel",
            className: "btn btn-primary mrbtn",
            title: "Datos de categoria",
        },
        {
            extend: "pdfHtml5",
            text: '<i class="fas fa-file-pdf text-white"></i> ',
            titleAttr: "Exportar a PDF",
            className: "btn btn-primary mrbtn ",
            orientation: "landscape",
            title: "Datos de categoria",
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
            title: "Datos de categoria",
        },
    ],
});
/**=================================================================
 * VALIDACIÓN DE FORMULARIO
 ===================================================================*/

function contactFormCat() {
    const $formcat = d.getElementById("formCateg"),
        inputs = d.querySelectorAll("#formCateg input"),
        $nombreCat = d.getElementById("nombrecat"),
        $textareaC = d.querySelectorAll("#formCateg textarea");

    /**=================================================================
         * PREVISUZLIARA IMAGEN
      ===================================================================*/
    /*=============================================
      VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
      =============================================*/
    let imagenCat = null;
    $(".fotoCategoria").change(function () {
        imagenCat = this.files[0];
        /**Nota: al ejecutar el código y colocar los límites de la cadena de
         * trasferencia de datos en los códigos correspondientes a este apartado,
         * se presentaba un error, el atributo imagenCat retronaba nulo,
         * el error estaba en declarar la línea anterior con un tipo de variable,
         * en este caso era const.
         */
        // console.log("imagenCat ", imagenCat);

        if (imagenCat["type"] != "image/jpeg" && imagenCat["type"] != "image/png") {
            // Se deja una vez más el espacio.
            $(".fotoCategoria").val("");
            Swal.fire({
                position: "top-end",
                icon: "error",
                text: "¡La imagen debe estar en formato JPG o PNG!",
                showConfirmButton: false,
                timer: 3000,
            });
            // return;
        } else if (imagenCat["size"] > 2000000) {
            $(".fotoCategoria").val("");
            Swal.fire({
                position: "top-end",
                icon: "error",
                text: "¡La imagen no debe pesar más de 2MB!",
                showConfirmButton: false,
                timer: 3000,
            });
            // return;
        } else {
            // Esa imagen se convierte en un archivo.
            const datosImagen = new FileReader();
            datosImagen.readAsDataURL(imagenCat);
            $(datosImagen).on("load", function (e) {
                const rutaImagen = e.target.result;
                $(".previsualizarCat").attr("src", rutaImagen);
                $(".modal").on("hidden.bs.modal", function () {
                    // $(".alert").remove(); //lo utilice para borrar la clase alert de mensaje de duplicidad
                    $(".previsualizarCat").attr(
                        "src",
                        "vistas/img/categoria/default/anonymous.png"
                    );
                });
            });
        }
    });
    /**---------Fin dprevisualizar imagen */
    /**=================================================================
       * VALIDAR SI NOMBRE DE CATEGORÍA EXISTE
       ===================================================================*/
    $nombreCat.addEventListener("change", (e) => {
        // console.log(e);
        const $nameCli = e.target.value;
        // console.log($nameCli);
        let data = new FormData();
        data.append("nameCli", $nameCli);
        fetch("ajax/categoria.ajax.php", {
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
                    $nombreCat.value = "";
                }
            })
            .catch(function (err) {
                // console.log('error', err);
                let message = err.statusText || "Ocurrió un error";
                $nombreCat.innerHTML = `<p>Error ${err.status}: ${message}</p>`;
            });
    });
    /**------Fin de valición de categoría si existe. */

    const $regExpre = {
        nombrecat: /^[A-Za-z0-9ÑñÁáÉéÍíÓóÚúÜü\s]{1,250}$/,
        descripcat: /^[A-Za-zÑñÁáÉéÍíÓóÚúÜü0-9\_\-\.\,\s]{1,250}$/,
    };
    /**------Objeto para validar si los campos estan vacíos. */
    const camposCat = {
        nombrecat: false,
        descripcat: false,
    };
    const validarFormCat = (e) => {
        // console.log("Se ejecutó");
        // console.log(e.target.name);
        /**El name es del input, es decir, se ejecuta todos los name */
        switch (e.target.name) {
            case "nombrecat":
                validarInput($regExpre.nombrecat, e.target, "nombrecat");
                break;
            case "descripcat":
                validarInput($regExpre.descripcat, e.target, "descripcat");
                break;
        }
    };
    const validarInput = (expresion, input, campo) => {
        if (expresion.test(input.value)) {
            d.querySelector(`#val-${campo} .alert-val`).classList.remove(
                "alert-val-activo"
            );
            // Valida que los Car no esten vacíos.
            camposCat[campo] = true;
        } else {
            d.querySelector(`#val-${campo} .alert-val`).classList.add(
                "alert-val-activo"
            );
            setTimeout(() => {
                d.querySelector(`#val-${campo} .alert-val`).classList.remove(
                    "alert-val-activo"
                );
            }, 5000);
            camposCat[campo] = false;
        }
    };

    inputs.forEach((input) => {
        input.addEventListener("keyup", validarFormCat);
        input.addEventListener("blur", validarFormCat);
    });
    $textareaC.forEach((textarea) => {
        textarea.addEventListener("keyup", validarFormCat);
        textarea.addEventListener("blur", validarFormCat);
    });
    /**=================================================================
       * CAPTURAR DATOS PARA GUARDAR CATEGORÍA
       ===================================================================*/
    $formcat.addEventListener("submit", function (e) {
        // console.log("Excelente");
        e.preventDefault();
        if (imagenCat === null) {
            d.querySelector('#val-fotoCat .alert-val').classList.add('alert-val-activo');
            setTimeout(() => {
                d.querySelector('#val-fotoCat .alert-val').classList.remove('alert-val-activo');
            }, 5000);
        }
        /**-----Validación de datos */
        if (camposCat.nombrecat && imagenCat != null && descripcat.value != 0) {
            /**------Fin validación de datos */
            let data = new FormData($formcat);
            // console.log(data);
            fetch("ajax/categoria.ajax.php", {
                method: "POST",
                body: data,
                mode: "cors",
            })
                .then((res) => res.json())
                .then((data) => {
                    // console.log(data);
                    if (data === "ok") {
                        toastr.success('Se guardaron los datos de cliente correctamente.', 'Datos guardados');
                        tablaCategoria.ajax.reload(null, false);
                    }
                    $formcat.reset();
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
            d.getElementById("form-mensajecat").classList.add("alert-val-activo");
            setTimeout(() => {
                d.getElementById("form-mensajecat").classList.remove(
                    "alert-val-activo"
                );
            }, 5000);
        }
    });
    /**=================================================================
      * ACTIVAR Y DESACTIVAR BOTÓN DE STATUS
      ===================================================================*/
    const $statusCat = d.querySelector(".btnActivarCat");
    // console.log("$status ", $status);
    d.addEventListener("click", (e) => {
        // console.log(e.target);
        let $idCategoria = e.target.getAttribute("idCategoria");
        // console.log($idCategoria);
        let $estadoCategoria = e.target.getAttribute("estadoCategoria");
        // console.log($estadoProveedor);
        let data = new FormData();
        data.append("activeIdCat", $idCategoria);
        data.append("activeSCat", $estadoCategoria);
        fetch('ajax/categoria.ajax.php', {
            method: 'POST',
            body: data,
            mode: "cors"
        })
            .then(res => (res.ok ? res.json() : Promise.reject(res)))
            .then(json => {
                // console.log(json);
                tablaCategoria.ajax.reload(null, false);
            })
            .catch(function (err) {
                // console.log('error', err);
                let message = err.statusText || "Ocurrió un error";
                $statusCat.innerHTML = `<p>Error ${err.status}: ${message}</p>`;
            })
        if ($estadoCategoria == 0) {
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
d.addEventListener("DOMContentLoaded", contactFormCat);
/**--------------------Fin para guardar datos de cliente */
/**=================================================================
    * EDICIÓN DE CLIENTE
    ===================================================================*/
const idCategoria = (id) => {
    let idCat = id;
    // console.log("idCat", idCat);
    let url = "ajax/categoria.ajax.php";
    let data = new FormData();
    data.append('idCategoria', idCat);
    fetch(url, {
        method: 'POST',
        body: data,
        mode: 'cors'
    })
        .then(res => (res.ok ? res.json() : Promise.reject(res)))
        .then(json => {
            // console.log(json);
            idCategorias.value = json.id;
            nombrecatE.value = json.nombre_cat;
            descripcatE.value = json.descrip_cat;
            if (json.foto_cat != 0) {
                d.querySelector(".antiguaFotoCatE").value = json.foto_cat;
                d.getElementById("previsualizarCat").src = json.foto_cat;
            } else {
                d.getElementById("previsualizarCat").src = 'vistas/img/categoria/default/anonymous.png';
            }
        })
        .catch(function (err) {
            // console.error('Error', err);
            let message = err.statusText || "Ocurrió un error";
            idCategoria.innerHTML = `<p>Error ${err.status}: ${message}</p>`;
        })
}
/**-------Fin edición de proveedor */
/**=================================================================
* VALIDACIÓN DE FORMULARIO EDICIÓN
===================================================================*/
function contactFormEditC() {
    const $formcatEdit = d.getElementById("formCategE"),
        inputs = d.querySelectorAll("#formCategE input")
    $textareaCE = d.querySelectorAll("#formCateg textarea");

    const $regExpre = {
        nombrecatE: /^[A-Za-z0-9ÑñÁáÉéÍíÓóÚúÜü\s]{1,250}$/,
        descripcatE: /^[A-Za-zÑñÁáÉéÍíÓóÚúÜü0-9\_\-\.\,\s]{1,250}$/,
    };
    /**------Objeto para validar si los campos estan vacíos. */
    const camposCatE = {
        nombrecatE: false,
        descripcatE: false,
    };
    const validarFormCatE = (e) => {
        // console.log("Se ejecutó");
        // console.log(e.target.name);
        /**El name es del input, es decir, se ejecuta todos los name */
        switch (e.target.name) {
            case "nombrecatE":
                validarInput($regExpre.nombrecatE, e.target, "nombrecatE");
                break;
            case "descripcatE":
                validarInput($regExpre.descripcatE, e.target, "descripcatE");
                break;
        }
    };
    const validarInput = (expresion, input, campo) => {
        if (expresion.test(input.value)) {
            d.querySelector(`#val-${campo} .alert-val`).classList.remove(
                "alert-val-activo"
            );
            // Valida que los Car no esten vacíos.
            camposCatE[campo] = true;
        } else {
            d.querySelector(`#val-${campo} .alert-val`).classList.add(
                "alert-val-activo"
            );
            setTimeout(() => {
                d.querySelector(`#val-${campo} .alert-val`).classList.remove(
                    "alert-val-activo"
                );
            }, 5000);
            camposCatE[campo] = false;
        }
    };

    inputs.forEach((input) => {
        input.addEventListener("keyup", validarFormCatE);
        input.addEventListener("blur", validarFormCatE);
    });
    $textareaCE.forEach((textarea) => {
        textarea.addEventListener("keyup", validarFormCatE);
        textarea.addEventListener("blur", validarFormCatE);
    });
    /**=================================================================
* CAPTURAR DATOS PARA GUARDAR EDICIÓN DE CATEGORÍA
===================================================================*/
    $formcatEdit.addEventListener("submit", function (e) {
        // console.log("Excelente");
        e.preventDefault();
        if (imagenCat === null) {
            d.querySelector('#val-fotoCatE .alert-val').classList.add('alert-val-activo');
            setTimeout(() => {
                d.querySelector('#val-fotoCatE .alert-val').classList.remove('alert-val-activo');
            }, 5000);
        }
        /**-----Validación de datos */
        if (idCategorias != 0 && nombrecatE != 0 && imagenCat != null && descripcatE.value != 0) {
            /**------Fin validación de datos */
            let data = new FormData($formcatEdit);
            // console.log(data);
            fetch('ajax/categoria.ajax.php', {
                method: 'POST',
                body: data,
                mode: "cors"
            })
                .then(res => res.json())
                .then(data => {
                    console.log(data);
                    if (data === "ok") {
                        toastr.success('Se actualizaron los datos de categoria correctamente.', 'Datos guardados');
                        tablaCategoria.ajax.reload(null, false);
                    }
                    // $formcEdit.reset();
                })
                .catch(function (err) {
                    // console.log('error', err);
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        text: "<small>¡Datos incorrectos o vacíos, no deben llevar caracteres especiales!</small>",
                        showConfirmButton: false,
                        timer: 2000
                    })
                })
            // $('#modal-4').modal('hide');
        } else {
            d.getElementById('form-mensajecatE').classList.add('alert-val-activo');
            setTimeout(() => {
                d.getElementById("form-mensajecatE").classList.remove('alert-val-activo');
            }, 5000);
        }
    })
}
d.addEventListener("DOMContentLoaded", contactFormEditC);
/**-------------Fin edición de formulario */
// /**=================================================================
//     * ELIMINAR PROVEEDOR
//     ===================================================================*/
// const idEliminarC = (id) => {
//     let idCdelete = id;
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
//             let url = "ajax/cliente.ajax.php";
//             let data = new FormData();
//             data.append('ideliminarC', idCdelete);
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
//                     tablaCliente.ajax.reload(null, false);
//                 })
//                 .catch(function (err) {
//                     // console.error('Error', err);
//                     let message = err.statusText || "Ocurrió un error";
//                     idEliminarC.innerHTML = `<p>Error ${err.status}: ${message}</p>`;
//                 })
//         }
//     })
// }
// /**----------------Eliminar proveedor */
