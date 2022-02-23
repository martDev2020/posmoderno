/**===================================
 * CARGAR TABLA DINÁMICA DE SUBCATEGORÍAS
 ===================================*/
// $.ajax({

//     url: "ajax/tablaSubcategoria.ajax.php",
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
tablaSubCategoria = $(".tablaSubcat").DataTable({
    ajax: "ajax/tablaSubcategoria.ajax.php",
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
            title: "Datos de subcategoria",
        },
        {
            extend: "csvHtml5",
            text: '<i class="fas fa-file-excel text-white"></i> ',
            titleAttr: "Desacargar en CSV",
            className: "btn btn-primary mrbtn",
            title: "Datos de subcategoria",
        },
        {
            extend: "excelHtml5",
            text: '<i class="fas fa-file-excel text-white"></i> ',
            titleAttr: "Exportar a Excel",
            className: "btn btn-primary mrbtn",
            title: "Datos de subcategoria",
        },
        {
            extend: "pdfHtml5",
            text: '<i class="fas fa-file-pdf text-white"></i> ',
            titleAttr: "Exportar a PDF",
            className: "btn btn-primary mrbtn ",
            orientation: "landscape",
            title: "Datos de subcategoria",
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
            title: "Datos de subcategoria",
        },
    ],
});
/**-====================Fin tabla subcategoría */
/**=================================================================
 * VALIDACIÓN DE FORMULARIO
 ===================================================================*/

function contactFormCat() {
    const $formsubcat = d.getElementById("formsubCateg"),
        inputssub = d.querySelectorAll("#formsubCateg input"),
        $nombresubCat = d.getElementById("nombresubcat"),
        $textareasubC = d.querySelectorAll("#formsubCateg textarea"),
        $select = d.getElementById("valid-select");

    /**=================================================================
         * PREVISUZLIAR IMAGEN
      ===================================================================*/
    /*=============================================
      VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
      =============================================*/
    let imagensubCat = null;
    $(".fotosubCategoria").change(function () {
        imagensubCat = this.files[0];
        /**Nota: al ejecutar el código y colocar los límites de la cadena de
         * trasferencia de datos en los códigos correspondientes a este apartado,
         * se presentaba un error, el atributo imagensubCat retronaba nulo,
         * el error estaba en declarar la línea anterior con un tipo de variable,
         * en este caso era const.
         */
        // console.log("imagensubCat ", imagensubCat);

        if (imagensubCat["type"] != "image/jpeg" && imagensubCat["type"] != "image/png") {
            // Se deja una vez más el espacio.
            $(".fotosubCategoria").val("");
            Swal.fire({
                position: "top-end",
                icon: "error",
                text: "¡La imagen debe estar en formato JPG o PNG!",
                showConfirmButton: false,
                timer: 3000,
            });
            // return;
        } else if (imagensubCat["size"] > 2000000) {
            $(".fotosubCategoria").val("");
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
            datosImagen.readAsDataURL(imagensubCat);
            $(datosImagen).on("load", function (e) {
                const rutaImagen = e.target.result;
                $(".previsualizarsubCat").attr("src", rutaImagen);
                $(".modal").on("hidden.bs.modal", function () {
                    // $(".alert").remove(); //lo utilice para borrar la clase alert de mensaje de duplicidad
                    $(".previsualizarsubCat").attr(
                        "src",
                        "vistas/img/subcategorias/default/anonymous.png"
                    );
                });
            });
        }
    });
    /**---------Fin dprevisualizar imagen */
    /**=================================================================
       * VALIDAR SI NOMBRE DE SUBCATEGORÍA EXISTE
       ===================================================================*/
    $nombresubCat.addEventListener("change", (e) => {
        // console.log(e);
        const $subcate = e.target.value;
        // console.log($subcate);
        let data = new FormData();
        data.append("subcate", $subcate);
        fetch("ajax/subcategoria.ajax.php", {
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
                    $nombresubCat.value = "";
                }
            })
            .catch(function (err) {
                // console.log('error', err);
                let message = err.statusText || "Ocurrió un error";
                $nombresubCat.innerHTML = `<p>Error ${err.status}: ${message}</p>`;
            });
    });
    /**------Fin de valición de subcategoría si existe. */

    const $regExpre = {
        nombresubcat: /^[A-Za-z0-9ÑñÁáÉéÍíÓóÚúÜü\s]{1,250}$/,
        descripsubcat: /^[A-Za-zÑñÁáÉéÍíÓóÚúÜü0-9\_\-\.\,\s]{1,250}$/,
    };
    /**------Objeto para validar si los campos estan vacíos. */
    const campossubCat = {
        nombresubcat: false,
        descripsubcat: false,
    };
    const validarFormsubCat = (e) => {
        // console.log("Se ejecutó");
        // console.log(e.target.name);
        /**El name es del input, es decir, se ejecuta todos los name */
        switch (e.target.name) {
            case "nombresubcat":
                validarInput($regExpre.nombresubcat, e.target, "nombresubcat");
                break;
            case "descripsubcat":
                validarInput($regExpre.descripsubcat, e.target, "descripsubcat");
                break;
        }
    };
    const validarInput = (expresion, input, campo) => {
        if (expresion.test(input.value)) {
            d.querySelector(`#val-${campo} .alert-val`).classList.remove(
                "alert-val-activo"
            );
            // Valida que los Car no esten vacíos.
            campossubCat[campo] = true;
        } else {
            d.querySelector(`#val-${campo} .alert-val`).classList.add(
                "alert-val-activo"
            );
            setTimeout(() => {
                d.querySelector(`#val-${campo} .alert-val`).classList.remove(
                    "alert-val-activo"
                );
            }, 5000);
            campossubCat[campo] = false;
        }
    };

    inputssub.forEach((input) => {
        input.addEventListener("keyup", validarFormsubCat);
        input.addEventListener("blur", validarFormsubCat);
    });
    $textareasubC.forEach((textarea) => {
        textarea.addEventListener("keyup", validarFormsubCat);
        textarea.addEventListener("blur", validarFormsubCat);
    });
    /**=================================================================
       * CAPTURAR DATOS PARA GUARDAR CATEGORÍA
       ===================================================================*/
    $formsubcat.addEventListener("submit", function (e) {
        // console.log("Excelente");
        e.preventDefault();
        if (imagensubCat === null) {
            d.querySelector('#val-fotosubCat .alert-val').classList.add('alert-val-activo');
            setTimeout(() => {
                d.querySelector('#val-fotosubCat .alert-val').classList.remove('alert-val-activo');
            }, 5000);
        }
        const select = $select.value;
        if (select === "") {
            d.querySelector('#val-selectcat .alert-val').classList.add('alert-val-activo');
            setTimeout(() => {
                d.querySelector('#val-selectcat .alert-val').classList.remove('alert-val-activo');
            }, 5000);
        }
        /**-----Validación de datos */
        if (campossubCat.nombresubcat && imagensubCat != null && descripsubcat.value != 0 && select != "") {
            /**------Fin validación de datos */
            let data = new FormData($formsubcat);
            // console.log(data);
            fetch("ajax/subcategoria.ajax.php", {
                method: "POST",
                body: data,
                mode: "cors",
            })
                .then((res) => res.json())
                .then((data) => {
                    // console.log(data);
                    if (data === "ok") {
                        toastr.success('Se guardaron los datos de subcategoría correctamente.', 'Datos guardados');
                        tablaSubCategoria.ajax.reload(null, false);
                    }
                    $formsubcat.reset();
                    $(".previsualizarsubCat").attr(
                        "src",
                        "vistas/img/subcategorias/default/anonymous.png"
                    );
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
            d.getElementById("form-mensajesubcat").classList.add("alert-val-activo");
            setTimeout(() => {
                d.getElementById("form-mensajesubcat").classList.remove(
                    "alert-val-activo"
                );
            }, 5000);
        }
    });
    /**=================================================================
      * ACTIVAR Y DESACTIVAR BOTÓN DE STATUS
      ===================================================================*/
    const $statussubCat = d.querySelector(".btnActivarsubCat");
    // console.log("$status ", $status);
    d.addEventListener("click", (e) => {
        // console.log(e.target);
        let $idsubCategoria = e.target.getAttribute("idsubCategoria");
        // console.log($idsubCategoria);
        let $estadosubCategoria = e.target.getAttribute("estadosubCategoria");
        // console.log($estadoProveedor);
        let data = new FormData();
        data.append("activeIdSub", $idsubCategoria);
        data.append("activeSsub", $estadosubCategoria);
        fetch('ajax/subcategoria.ajax.php', {
            method: 'POST',
            body: data,
            mode: "cors"
        })
            .then(res => (res.ok ? res.json() : Promise.reject(res)))
            .then(json => {
                // console.log(json);
                tablaSubCategoria.ajax.reload(null, false);
            })
            .catch(function (err) {
                // console.log('error', err);
                let message = err.statusText || "Ocurrió un error";
                $statussubCat.innerHTML = `<p>Error ${err.status}: ${message}</p>`;
            })
        if ($estadosubCategoria == 0) {
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
    * EDICIÓN DE SUBCATEGORÍA
    ===================================================================*/
const idsubCategoriaE = (id) => {
    let idsubCatE = id;
    // console.log("idsubCatE", idsubCatE);
    let url = "ajax/subcategoria.ajax.php";
    let data = new FormData();
    data.append('idsubCategoriaE', idsubCatE);
    fetch(url, {
        method: 'POST',
        body: data,
        mode: 'cors'
    })
        .then(res => (res.ok ? res.json() : Promise.reject(res)))
        .then(json => {
            // console.log(json);
            idSucatE.value = json.id;
            selectE.value = json.idCateg;
            nombresubcatE.value = json.nombre_subcat;
            descripsubcatE.value = json.descrip_subcat;
            if (json.foto_subcat != 0) {
                d.querySelector(".antiguaFotosubCatE").value = json.foto_subcat;
                d.getElementById("img-previewsubcE").src = json.foto_subcat;
            } else {
                d.getElementById("img-previewsubcE").src = 'vistas/img/subcategorias/default/anonymous.png';
            }
        })
        .catch(function (err) {
            // console.error('Error', err);
            let message = err.statusText || "Ocurrió un error";
            idsubCategoriaE.innerHTML = `<p>Error ${err.status}: ${message}</p>`;
        })
}
/**-------Fin edición de subcategoria */
/**=================================================================
* VALIDACIÓN DE FORMULARIO EDICIÓN
===================================================================*/
function contactFormEditsubCE() {
    const $formsubcatE = d.getElementById("formsubCategE"),
        inputssubE = d.querySelectorAll("#formsubCategE input"),
        $nombresubCatE = d.getElementById("nombresubcatE"),
        $textareasubCE = d.querySelectorAll("#formsubCateg textarea"),
        $selectE = d.getElementById("valid-select");
    /**=================================================================
    * PREVISUZLIAR IMAGEN
 ===================================================================*/
    /*=============================================
      VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
      =============================================*/
    let imagensubCatE = null;
    $(".fotosubCategoriaE").change(function () {
        imagensubCatE = this.files[0];
        /**Nota: al ejecutar el código y colocar los límites de la cadena de
         * trasferencia de datos en los códigos correspondientes a este apartado,
         * se presentaba un error, el atributo imagensubCatE retronaba nulo,
         * el error estaba en declarar la línea anterior con un tipo de variable,
         * en este caso era const.
         */
        // console.log("imagensubCatE ", imagensubCatE);

        if (imagensubCatE["type"] != "image/jpeg" && imagensubCatE["type"] != "image/png") {
            // Se deja una vez más el espacio.
            $(".fotosubCategoriaE").val("");
            Swal.fire({
                position: "top-end",
                icon: "error",
                text: "¡La imagen debe estar en formato JPG o PNG!",
                showConfirmButton: false,
                timer: 3000,
            });
            // return;
        } else if (imagensubCatE["size"] > 2000000) {
            $(".fotosubCategoriaE").val("");
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
            datosImagen.readAsDataURL(imagensubCatE);
            $(datosImagen).on("load", function (e) {
                const rutaImagen = e.target.result;
                $(".previsualizarsubCatE").attr("src", rutaImagen);
                $(".modal").on("hidden.bs.modal", function () {
                    // $(".alert").remove(); //lo utilice para borrar la clase alert de mensaje de duplicidad
                    $(".previsualizarsubCatE").attr(
                        "src",
                        "vistas/img/subcategorias/default/anonymous.png"
                    );
                });
            });
        }
    });
    /**---------Fin dprevisualizar imagen */
    /**=================================================================
  * VALIDAR SI NOMBRE DE SUBCATEGORÍA EXISTE
  ===================================================================*/
    $nombresubCatE.addEventListener("change", (e) => {
        // console.log(e);
        const $subcate = e.target.value;
        // console.log($subcate);
        let data = new FormData();
        data.append("subcate", $subcate);
        fetch("ajax/subcategoria.ajax.php", {
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
                    $nombresubCat.value = "";
                }
            })
            .catch(function (err) {
                // console.log('error', err);
                let message = err.statusText || "Ocurrió un error";
                $nombresubCat.innerHTML = `<p>Error ${err.status}: ${message}</p>`;
            });
    });
    /**------Fin de valición de subcategoría si existe. */

    const $regExpre = {
        nombresubcatE: /^[A-Za-z0-9ÑñÁáÉéÍíÓóÚúÜü\s]{1,250}$/,
        descripsubcatE: /^[A-Za-zÑñÁáÉéÍíÓóÚúÜü0-9\_\-\.\,\s]{1,250}$/,
    };
    /**------Objeto para validar si los campos estan vacíos. */
    const campossubCatE = {
        nombresubcatE: false,
        descripsubcatE: false,
    };
    const validarFormsubCatE = (e) => {
        // console.log("Se ejecutó");
        // console.log(e.target.name);
        /**El name es del input, es decir, se ejecuta todos los name */
        switch (e.target.name) {
            case "nombresubcatE":
                validarInput($regExpre.nombresubcatE, e.target, "nombresubcatE");
                break;
            case "descripsubcatE":
                validarInput($regExpre.descripsubcatE, e.target, "descripsubcatE");
                break;
        }
    };
    const validarInput = (expresion, input, campo) => {
        if (expresion.test(input.value)) {
            d.querySelector(`#val-${campo} .alert-val`).classList.remove(
                "alert-val-activo"
            );
            // Valida que los Car no esten vacíos.
            campossubCatE[campo] = true;
        } else {
            d.querySelector(`#val-${campo} .alert-val`).classList.add(
                "alert-val-activo"
            );
            setTimeout(() => {
                d.querySelector(`#val-${campo} .alert-val`).classList.remove(
                    "alert-val-activo"
                );
            }, 5000);
            campossubCatE[campo] = false;
        }
    };

    inputssubE.forEach((input) => {
        input.addEventListener("keyup", validarFormsubCatE);
        input.addEventListener("blur", validarFormsubCatE);
    });
    $textareasubCE.forEach((textarea) => {
        textarea.addEventListener("keyup", validarFormsubCatE);
        textarea.addEventListener("blur", validarFormsubCatE);
    });
    /**=================================================================
* CAPTURAR DATOS PARA GUARDAR EDICIÓN DE SUBCATEGORÍA
===================================================================*/
    $formsubcatE.addEventListener("submit", function (e) {
        // console.log("Excelente");
        e.preventDefault();
        if (imagensubCatE === null) {
            d.querySelector('#val-fotosubCat .alert-val').classList.add('alert-val-activo');
            setTimeout(() => {
                d.querySelector('#val-fotosubCat .alert-val').classList.remove('alert-val-activo');
            }, 5000);
        }
        // const selectE = $selectE.value;
        // if (selectE === "") {
        //     d.querySelector('#val-selectcatE .alert-val').classList.add('alert-val-activo');
        //     setTimeout(() => {
        //         d.querySelector('#val-selectcatE .alert-val').classList.remove('alert-val-activo');
        //     }, 5000);
        // }
        /**-----Validación de datos */
        if (idSucatE != 0 && nombresubcatE != 0 && descripsubcatE.value != 0) {
            /**------Fin validación de datos */
            let data = new FormData($formsubcatE);
            // console.log(data);
            fetch('ajax/subcategoria.ajax.php', {
                method: 'POST',
                body: data,
                mode: "cors"
            })
                .then(res => res.json())
                .then(data => {
                    console.log(data);
                    if (data === "ok") {
                        toastr.success('Se actualizaron los datos de categoria correctamente.', 'Datos guardados');
                        tablaSubCategoria.ajax.reload(null, false);
                    }
                    $formsubcatE.reset();
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
            d.getElementById('form-mensajesubcatE').classList.add('alert-val-activo');
            setTimeout(() => {
                d.getElementById("form-mensajesubcatE").classList.remove('alert-val-activo');
            }, 5000);
        }
    })
}
d.addEventListener("DOMContentLoaded", contactFormEditsubCE);
/**-------------Fin edición de formulario */
/**=================================================================
    * ELIMINAR CATEGORÍA
===================================================================*/
// const idEliminarCat = (id) => {
//     let idCatdelete = id;
//     // console.log("idCat", idCatdelete);
//     let url = "ajax/categoria.ajax.php";
//     let data = new FormData();
//     data.append('idCategoria', idCatdelete);
//     fetch(url, {
//         method: 'POST',
//         body: data,
//         mode: 'cors'
//     })
//         .then(res => (res.ok ? res.json() : Promise.reject(res)))
//         .then(json => {
//             // console.log(json);
//             let $idCatD = json.id;
//             // console.log($idCatD)
//             const $fotoDelete = json.foto_cat;
//             // console.log($fotoDelete);
//             Swal.fire({
//                 title: "¿Estás seguro de eliminar los datos?",
//                 icon: "warning",
//                 showCancelButton: true,
//                 confirmButtonColor: '#3085d6',
//                 cancelButtonColor: '#d33',
//                 confirmButtonText: 'Si',
//                 cancelButtonText: 'No'
//             }).then((result) => {
//                 if (result.value) {
//                     let url = "ajax/categoria.ajax.php";
//                     let data = new FormData();
//                     data.append('ideliminarCat', $idCatD);
//                     data.append('fotoCatD', $fotoDelete);
//                     fetch(url, {
//                         method: 'POST',
//                         body: data,
//                         mode: 'cors'
//                     }).then(res => (res.ok ? res.json() : Promise.reject(res)))
//                         .then(json => {
//                             // console.log(json);
//                             if (json === "ok") {
//                                 Swal.fire({
//                                     icon: 'success',
//                                     title: 'Datos eliminados',
//                                     showConfirmButton: false,
//                                     timer: 1500
//                                 })
//                             }
//                             tablaCategoria.ajax.reload(null, false);
//                         })
//                         .catch(function (err) {
//                             // console.error('Error', err);
//                             let message = err.statusText || "Ocurrió un error";
//                             idEliminarCat.innerHTML = `<p>Error ${err.status}: ${message}</p>`;
//                         })
//                 }
//             })
//         })
//         .catch(function (err) {
//             // console.error('Error', err);
//             let message = err.statusText || "Ocurrió un error";
//             idEliminarCat.innerHTML = `<p>Error ${err.status}: ${message}</p>`;
//         })
// }
// /**-------Fin eliminara categoría */
