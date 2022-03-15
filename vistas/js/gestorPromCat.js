/**===================================
 * CARGAR TABLA DINÁMICA DE CATEGORÍAS
 ===================================*/
// $.ajax({

//     url: "ajax/tablaPromCat.ajax.php",
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
tablaPromCategoria = $(".tablaPromCat").DataTable({
    ajax: "ajax/tablaPromCat.ajax.php",
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
            title: "Promociones de categoría",
        },
        {
            extend: "csvHtml5",
            text: '<i class="fas fa-file-excel text-white"></i> ',
            titleAttr: "Desacargar en CSV",
            className: "btn btn-primary mrbtn",
            title: "Promociones de categoría",
        },
        {
            extend: "excelHtml5",
            text: '<i class="fas fa-file-excel text-white"></i> ',
            titleAttr: "Exportar a Excel",
            className: "btn btn-primary mrbtn",
            title: "Promociones de categoría",
        },
        {
            extend: "pdfHtml5",
            text: '<i class="fas fa-file-pdf text-white"></i> ',
            titleAttr: "Exportar a PDF",
            className: "btn btn-primary mrbtn ",
            orientation: "landscape",
            title: "Promociones de categoría",
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
            title: "Promociones de categoría",
        },
    ],
});
/**=================================================================
 * HABILITAR INPUT CON RADIO BUTTON
 ===================================================================*/
const $offer1 = d.getElementById("offer1"),
    $offer2 = d.getElementById("offer2"),
    $offer3 = d.getElementById("offer3"),
    $descCat = d.getElementById("descCat"),
    $precOfCat = d.getElementById("precOfCat"),
    $prodCat = d.getElementById("prodCat"),
    $pzmin = d.getElementById("pzmin"),
    $piezaminCat = d.getElementById("piezaminCat"),
    $pzprom = d.getElementById("pzprom"),
    $piezapromCat = d.getElementById("piezapromCat"),
    $artmixtCat = d.getElementById("artmixtCat"),
    $iniOfCatG = d.getElementById("iniOfCat"),
    $iniHoraCatG = d.getElementById("iniHoraCat"),
    $finFeCatG = d.getElementById("finFeCat"),
    $finHoraCatG = d.getElementById("finHoraCat"),
    $ingrecat = d.getElementById("ingrecat"),
    $formOffer = d.getElementById("formOfC"),
    inputs = d.querySelectorAll("#formOfC input");

function PromCat() {
    const $price = $offer2.checked,
        $price1 = $offer1.checked,
        $price2 = $offer3.checked;

    $precOfCat.disabled = $price ? false : true;
    $descCat.disabled = $price1 ? false : true;
    $pzmin.disabled = $price1 ? false : true;
    // $piezaminCat.disabled = $price1 ? false : true;
    // $piezapromCat.disabled = $price1 ? false : true;
    // $pzprom.disabled = $price1 ? false : true;
    // $artmixtCat.disabled = $price1 ? false : true;
    $prodCat.disabled = $price2 ? false : true;
    /**
     * Habliiatr opciones para promoción por precio.
     */
    if ($price === true) {
        $pzmin.disabled = $price ? false : true;
        // $piezaminCat.disabled = $price ? false : true;
        // $piezapromCat.disabled = $price ? false : true;
        // $pzprom.disabled = $price ? false : true;
        // $artmixtCat.disabled = $price ? false : true;

        if (
            !$precOfCat.disabled &&
            !$pzmin.disabled &&
            !$piezaminCat.disabled &&
            !$piezapromCat.disabled &&
            !$pzprom.disabled &&
            $artmixtCat.disabled
        ) {
            $precOfCat.focus();
            $pzmin.focus();
            // $piezaminCat.focus();
            // $piezapromCat.focus();
            // $pzprom.focus();
            // $artmixtCat.focus();
            $descCat.value = "";
            $piezaminCat.value = "";
            $piezapromCat.value = "";
            $pzprom.disabled = true;
            $artmixtCat.disabled = true;
            $piezaminCat.disabled = true;
            $piezapromCat.disabled = true;
            $pzmin.checked = false;
            $pzprom.checked = false;
            $artmixtCat.checked = false;
        } else {
            $precOfCat.value = "";
            $descCat.value = "";
            $pzmin.value = "";
            $piezaminCat.value = "";
            $piezapromCat.value = "";
            $pzprom.value = "";
            $iniOfCatG.value = "";
            $iniHoraCatG.value = "";
            $finFeCatG.value = "";
            $finHoraCatG.value = "";
            $artmixtCat.value = "";
            $pzprom.disabled = true;
            $artmixtCat.disabled = true;
            $piezaminCat.disabled = true;
            $piezapromCat.disabled = true;
            $prodCat.value = "";
            $pzmin.checked = false;
            $pzprom.checked = false;
            $artmixtCat.checked = false;
        }
    } else if ($price1 === true) {
        /**
         * Habilitar opciones para promoción por descuento.
         */

        if (!$descCat.disabled && !$pzmin.disabled) {
            $descCat.focus();
            $pzmin.focus();
            $precOfCat.value = "";
            // $piezaminCat.focus();
            // $piezapromCat.focus();
            // $pzprom.focus();
            // $artmixtCat.focus();
            $descCat.value = "";
            $piezaminCat.value = "";
            $piezapromCat.value = "";
            $iniOfCatG.value = "";
            $iniHoraCatG.value = "";
            $finFeCatG.value = "";
            $finHoraCatG.value = "";
            $pzprom.disabled = true;
            $artmixtCat.disabled = true;
            $piezaminCat.disabled = true;
            $piezapromCat.disabled = true;
            $pzmin.checked = false;
            $pzprom.checked = false;
            $artmixtCat.checked = false;
        } else {
            $descCat.value = "";
            $precOfCat.value = "";
            $prodCat.value = "";
            $pzmin.value = "";
            $piezaminCat.value = "";
            $piezapromCat.value = "";
            $pzprom.value = "";
            $artmixtCat.value = "";
        }
    } else if ($price2 === true) {
        /**
         * Habilitar opciones para promoción 2 * 1.
         */
        if (!$prodCat.disabled) {
            $prodCat.focus();
            $descCat.value = "";
            $precOfCat.value = "";
            $piezaminCat.value = "";
            $piezapromCat.value = "";
            $iniOfCatG.value = "";
            $iniHoraCatG.value = "";
            $finFeCatG.value = "";
            $finHoraCatG.value = "";
            $pzprom.disabled = true;
            $artmixtCat.disabled = true;
            $piezaminCat.disabled = true;
            $piezapromCat.disabled = true;
            $pzmin.checked = false;
            $pzprom.checked = false;
            $artmixtCat.checked = false;
        } else {
            $prodCat.value = "";
            $pzmin.value = "";
            $piezaminCat.value = "";
            $piezapromCat.value = "";
            $pzprom.value = "";
            $artmixtCat.value = "";
        }
    }
}
/**=================================================================
 * HABILITAR INPUT CON CHECKBOX 
 ===================================================================*/
function HabilitarCheck() {
    const $pzminC = $pzmin.checked;
    $piezaminCat.disabled = $pzminC ? false : true;
    if (!$piezaminCat.disabled) {
        $piezaminCat.focus();
        $pzprom.disabled = false;
    } else {
        $pzprom.disabled = true;
        $piezaminCat.value = "";
    }
    if (!$pzminC) {
        $artmixtCat.disabled = true;
        $piezapromCat.disabled = true;
        $piezapromCat.value = "";
        $pzmin.checked = false;
        $pzprom.checked = false;
        $artmixtCat.checked = false;
    }
}
function HbilitarCheck2() {
    const $pzpromC = $pzprom.checked;
    $piezapromCat.disabled = $pzpromC ? false : true;
    if (!$piezapromCat.disabled) {
        $piezapromCat.focus();
        $artmixtCat.disabled = false;
    } else {
        $artmixtCat.disabled = true;
        $piezapromCat.value = "";
    }
}
/**=================================================================
 * DESHABLITAR LOS INPUT AL CERRAR EL MODAL
 ===================================================================*/
$(".modal").on("hidden.bs.modal", function () {
    $("#formOfC .disabledmodal").each(function (element) {
        $(this).attr("disabled", true);
    });
});
/**---------------Fin hablilitar los input */
/**=================================================================
 * VALIDACIÓN DE 2*1
 ===================================================================*/
const $regExpre = {
    prodCat: /^[0-9]+(\*[0-9])$/,
};
/**------Objeto para validar si los campos estan vacíos. */
const camposProm = {
    prodCat: false,
};
const validarProm = (e) => {
    // console.log("Se ejecutó");
    // console.log(e.target.name);
    /**El name es del input, es decir, se ejecuta todos los name */
    switch (e.target.name) {
        case "prodCat":
            validarInput($regExpre.prodCat, e.target, "prodCat");
            break;
    }
};
const validarInput = (expresion, input, campo) => {
    if (expresion.test(input.value) && $prodCat.disabled === false) {
        d.querySelector(`#val-${campo} .alert-val`).classList.remove(
            "alert-val-activo"
        );
        // Valida que los Car no esten vacíos.
        camposProm[ campo ] = true;
    } else {
        d.querySelector(`#val-${campo} .alert-val`).classList.add(
            "alert-val-activo"
        );
        setTimeout(() => {
            d.querySelector(`#val-${campo} .alert-val`).classList.remove(
                "alert-val-activo"
            );
        }, 5000);
        camposProm[ campo ] = false;
    }
};

inputs.forEach((input) => {
    input.addEventListener("keyup", validarProm);
    input.addEventListener("blur", validarProm);
});
/**=================================================================
 * OBTENER DATOS PARA GUARDAR
 ===================================================================*/
const idCatOferta = (id) => {
    let idcatOf = id;
    // console.log(idcatOf);
    /**=================================================================
       * SE MUESTA DATOA PARA EDICIÓN
       ===================================================================*/
    let url = "ajax/categoria.ajax.php";
    let data = new FormData();
    data.append("idCategoria", idcatOf);
    fetch(url, {
        method: "POST",
        body: data,
        mode: "cors",
    })
        .then((res) => (res.ok ? res.json() : Promise.reject(res)))
        .then((json) => {
            // console.log(json.activo);
            if (json.activo != 0) {
                idPromC.value = json.id;
                descripOfC.value = json.descripprom_cat;
                if (offer1.value === json.oferta_cat) {
                    $offer1.checked = true;
                    $descCat.disabled = false;
                    descCat.value = json.descOferta_cat;
                    $pzmin.checked = true;
                    $pzmin.disabled = false;
                    $piezaminCat.disabled = false;
                    piezaminCat.value = json.piezamin_cat;
                    $pzprom.checked = true;
                    $pzprom.disabled = false;
                    $piezapromCat.disabled = false;
                    piezapromCat.value = json.piezaprom_cat;
                    if (json.artmixt_cat != null) {
                        $artmixtCat.disabled = false;
                        $artmixtCat.checked = true;
                    } else {
                        $artmixtCat.checked = false;
                        $artmixtCat.disabled = false;
                    }
                } else if (offer2.value === json.oferta_cat) {
                    offer2.checked = true;
                    $precOfCat.disabled = false;
                    precOfCat.value = json.preOferta_cat;
                    $pzmin.checked = true;
                    $pzmin.disabled = false;
                    $piezaminCat.disabled = false;
                    piezaminCat.value = json.piezamin_cat;
                    $pzprom.checked = true;
                    $pzprom.disabled = false;
                    $piezapromCat.disabled = false;
                    piezapromCat.value = json.piezaprom_cat;
                    if (json.artmixt_cat != null) {
                        $artmixtCat.disabled = false;
                        $artmixtCat.checked = true;
                    } else {
                        $artmixtCat.checked = false;
                        $artmixtCat.disabled = false;
                    }
                } else if (offer3.value === json.oferta_cat) {
                    offer3.checked = true;
                    $prodCat.disabled = false;
                    prodCat.value = json.prodpor_cat;
                }
                iniOfCat.value = json.iniOferta_cat.slice(0, 10);
                iniHoraCat.value = json.iniOferta_cat.slice(-9);
                finFeCat.value = json.finOferta_cat.slice(0, 10);
                finHoraCat.value = json.finOferta_cat.slice(-9);
            } else {
                // console.log(json.activo);
                Swal.fire({
                    icon: 'info',
                    title: 'La categoría no está activa',
                    showConfirmButton: false,
                    timer: 1500
                })
                offer1.disabled = true;
                offer2.disabled = true;
                offer3.disabled = true;
                $iniOfCatG.disabled = true;
                $iniHoraCatG.disabled = true;
                $finFeCatG.disabled = true;
                $finHoraCatG.disabled = true;
                $ingrecat.disabled = true;
            }
        })
        .catch(function (err) {
            // console.error('Error', err);
            let message = err.statusText || "Ocurrió un error";
            idCategoria.innerHTML = `<p>Error ${err.status}: ${message}</p>`;
        });
    /**----------------Fin de obtención de ID en el input */
    /**Validación de datos */

};


$formOffer.addEventListener("submit", function (e) {
    e.preventDefault();
    const $iniOfCat = $iniOfCatG.value,
        $iniHoraCat = $iniHoraCatG.value,
        $finFeCat = $finFeCatG.value,
        $finHoraCat = $finHoraCatG.value,
        $descCatG = $descCat.value,
        $precOfCatG = $precOfCat.value,
        $prodCatG = $prodCat.value,
        $piezaminCatG = $piezaminCat.value,
        $piezapromCatG = $piezapromCat.value,
        $artmixtCatG = $artmixtCat.value;
    // console.log($piezaminCatG);

    const valid = {
        iniOfCat: $iniOfCat,
        iniHoraCat: $iniHoraCat,
        finFeCat: $finFeCat,
        finHoraCat: $finHoraCat,
    };
    for (let key in valid) {
        // console.log(key, valid[ key ]);
        if (valid[ key ] === "") {
            d.querySelector(`#val-${key} .alert-val`).classList.add(
                "alert-val-activo"
            );
            setTimeout(() => {
                d.querySelector(`#val-${key} .alert-val`).classList.remove(
                    "alert-val-activo"
                );
            }, 5000);
        }
    }

    if (
        (idPromC != "" &&
            $offer1.checked &&
            $descCatG != "" &&
            $pzmin.checked &&
            $piezaminCatG != "" &&
            $pzprom.checked &&
            $piezapromCatG != "" &&
            $iniOfCat != "" &&
            $iniHoraCat != "" &&
            $finFeCat != "" &&
            $finHoraCat != "") ||
        ($offer2.checked &&
            $precOfCatG != "" &&
            $pzmin.checked &&
            $piezaminCatG != "" &&
            $pzprom.checked &&
            $piezapromCatG != "" &&
            $iniOfCat != "" &&
            $iniHoraCat != "" &&
            $finFeCat != "" &&
            $finHoraCat != "") ||
        ($offer3.checked && $prodCatG != "" && $iniOfCat != "" &&
            $iniHoraCat != "" &&
            $finFeCat != "" &&
            $finHoraCat != "")
    ) {
        /**------Fin validación de datos */
        let data = new FormData($formOffer);
        // console.log(data);
        fetch("ajax/promCat.ajax.php", {
            method: "POST",
            body: data,
            mode: "cors",
        })
            .then((res) => (res.ok ? res.json() : Promise.reject(res)))
            .then((data) => {
                // console.log(data);
                if (data === "ok") {
                    toastr.success(
                        "Se guardaron los datos de promoción correctamente.",
                        "Datos guardados"
                    );
                    // tablaCategoria.ajax.reload(null, false);
                }
                // $formOffer.reset();
                // $("#formOfC .disabledmodal").each(function (element) {
                //     $(this).attr("disabled", true);
                // });
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
        // // $('#modal-4').modal('hide');
    } else {
        d.getElementById("form-mensajecatProm").classList.add("alert-val-activo");
        setTimeout(() => {
            d.getElementById("form-mensajecatProm").classList.remove(
                "alert-val-activo"
            );
        }, 5000);
    }
});
/**------------Fin obtención de datos para guardar. */