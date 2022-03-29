/**===================================
 * CARGAR TABLA DINÁMICA DE CATEGORÍAS
 ===================================*/
// $.ajax({

//     url: "ajax/tablaRF.ajax.php",
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
tablaRF = $(".tablaRegF").DataTable({
  ajax: "ajax/tablaRF.ajax.php",
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
function contactFormRF() {
  const $formRF = d.getElementById("formRF"),
    inputsRF = d.querySelectorAll("#formRF input"),
    $nomRF = d.getElementById("nomRF"),
    $claveRF = d.getElementById("claRF"),
    $modalRF = d.getElementById("modalRF");
  /**---Traer datos de id para incrementar el código */
  $modalRF.addEventListener("click", (e) => {
    // console.log("Hola");
    traerId();
  });
  /**---Fin traer datos de id para incrementar el código */
  const $regExpreRF = {
    claRF: /^\d{8}$/,
    nomRF: /^ [A-Za-z0-9ÑñÁáÉéÍíÓóÚúÜü\s]{1,250}$/,
    descripRF: /^[A-Za-zÑñÁáÉéÍíÓóÚúÜü0-9\_\-\.\,\s]{1,250}$/,
  };
  /**------Objeto para validar si los campos estan vacíos. */
  const camposRF = {
    claRF: false,
    nomRF: false,
    descripRF: false,
  };
  const validarFormRF = (e) => {
    // console.log("Se ejecutó");
    // console.log(e.target.name);
    /**El name es del input, es decir, se ejecuta todos los name */
    switch (e.target.name) {
      case "claRF":
        validarInputRF($regExpreRF.claRF, e.target, "claRF");
        break;
      case "nomRF":
        validarInputRF($regExpreRF.nomRF, e.target, "nomRF");
        break;
    }
  };
  const validarInputRF = (expresion, input, campo) => {
    if (expresion.test(input.value)) {
      d.querySelector(`#val-${campo} .alert-val`).classList.remove(
        "alert-val-activo"
      );
      // Valida que los campos no esten vacíos.
      camposRF[ campo ] = true;
    } else {
      d.querySelector(`#val-${campo} .alert-val`).classList.add(
        "alert-val-activo"
      );
      setTimeout(() => {
        d.querySelector(`#val-${campo} .alert-val`).classList.remove(
          "alert-val-activo"
        );
      }, 5000);
      camposRF[ campo ] = false;
    }
  };

  inputsRF.forEach((input) => {
    input.addEventListener("keyup", validarFormRF);
    input.addEventListener("blur", validarFormRF);
  });
  /**=================================================================
      * VALIDAR SI CLAVE RÉGIMEN FISCAL EXISTE
      ===================================================================*/
  $claveRF.addEventListener("change", (e) => {
    // console.log(e);
    const $clave = e.target.value;
    // console.log($clave);
    let data = new FormData();
    data.append("clave", $clave);
    fetch("ajax/regimenRF.ajax.php", {
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
          $claveRF.value = "";
        }
      })
      .catch(function (err) {
        // console.log('error', err);
        let message = err.statusText || "Ocurrió un error";
        $claveRF.innerHTML = `<p>Error ${err.status}: ${message}</p>`;
      });
  });
  /**------Fin de validación clave régimen fiscal existe. */
  /**=================================================================
     * ACTIVAR Y DESACTIVAR BOTÓN DE STATUS
     ===================================================================*/
  const $statusRF = d.querySelector(".btnActivarRF");
  // console.log("$statusRF ", $statusRF);
  d.addEventListener("click", (e) => {
    // console.log(e.target);
    let $idRF = e.target.getAttribute("idRF");
    // console.log($idRF);
    let $estadoRF = e.target.getAttribute("estadoRF");
    // console.log($estadoRF);
    let data = new FormData();
    data.append("activeidRF", $idRF);
    data.append("activeErf", $estadoRF);
    fetch("ajax/regimenRF.ajax.php", {
      method: "POST",
      body: data,
      mode: "cors",
    })
      .then((res) => (res.ok ? res.json() : Promise.reject(res)))
      .then((json) => {
        // console.log(json);
        tablaRF.ajax.reload(null, false);
      })
      .catch(function (err) {
        // console.log('error', err);
        let message = err.statusText || "Ocurrió un error";
        $statusRF.innerHTML = `<p>Error ${err.status}: ${message}</p>`;
      });
    if ($estadoRF == 0) {
      $(this).removeClass("btn-outline-success");
      $(this).addClass("btn-outline-danger");
      $(this).html("Desactivado");
      $(this).attr("estadoRF", 1);
      // $status.classList.remove("btn-outline-success");
      // $status.classList.add("btn-outline-danger");
      // $status.innerHTML = `Desactivado`;
      // e.target.getAttribute("estadoRF", 1);
    } else {
      // $status.classList.add("btn-outline-success");
      // $status.classList.remove("btn-outline-danger");
      // $status.innerHTML = `Activado`;
      // e.target.getAttribute("estadoRF", 1);
      $(this).addClass("btn-outline-success");
      $(this).removeClass("btn-outline-danger");
      $(this).html("Activado");
      $(this).attr("estadoRF", 0);
    }
  });
  /**------------Fin de descativar o activar status */
  /**=================================================================
       * CAPTURAR DATOS PARA GUARDAR RÉGIMEN FISCAL
       ===================================================================*/
  $formRF.addEventListener("submit", function (e) {
    // /console.log("Excelente");
    e.preventDefault();
    /**-----Validación de datos */
    const a = $nomRF.value,
      b = claRF.value;

    if (a != "" && b != "") {
      /**------Fin validación de datos */
      let data = new FormData($formRF);
      // console.log(data);
      fetch("ajax/regimenRF.ajax.php", {
        method: "POST",
        body: data,
        mode: "cors",
      })
        .then((res) => (res.ok ? res.json() : Promise.reject(res)))
        .then((json) => {
          console.log(json);
          if (json === "ok") {
            toastr.success(
              "Se guardaron los datos de régimen fiscal correctamente.",
              "Datos guardados"
            );
            tablaRF.ajax.reload(null, false);
          }
          $formRF.reset();
          traerId();
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
      d.getElementById("form-mensajeRF").classList.add("alert-val-activo");
      setTimeout(() => {
        d.getElementById("form-mensajeRF").classList.remove("alert-val-activo");
      }, 5000);
    }
  });
}
d.addEventListener("DOMContentLoaded", contactFormRF);
/**--------------------Fin para guardar datos de régimen fiscal */
/**=================================================================
    * EDICIÓN
===================================================================*/
const idEditRF = (id) => {
  let idURFe = id;
  // console.log("idURFe ", idURFe);
  let url = "ajax/regimenRF.ajax.php";
  let data = new FormData();
  data.append("idURFe", idURFe);
  fetch(url, {
    method: "POST",
    body: data,
    mode: "cors",
  })
    .then((res) => (res.ok ? res.json() : Promise.reject(res)))
    .then((json) => {
      // console.log(json);
      idRFedit.value = json.id;
      claRFE.value = json.claveRegimenFiscal;
      descripRFE.value = json.descrip_regFis;
      nomRFE.value = json.nombre_regFis;
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
function formRFedit() {
  const $formRFE = d.getElementById("formRFE"),
    inputsRFE = d.querySelectorAll("#formRFE input"),
    $nombreRFE = d.getElementById("nomRFE"),
    $descRFE = d.getElementById("descripRFE"),
    $claveRFE = d.getElementById("claRFE");

  const $regExpre = {
    claRFE: /^\d{8}$/,
    nomRFE: /^ [A-Za-z0-9ÑñÁáÉéÍíÓóÚúÜü\s]{1,250}$/,
    descripRFE: /^[A-Za-zÑñÁáÉéÍíÓóÚúÜü0-9\_\-\.\,\s]{1,250}$/,
  };
  /**------Objeto para validar si los campos estan vacíos. */
  const camposRF = {
    claRFE: false,
    nomRFE: false,
    descripRFE: false,
  };
  const validarFormRFE = (e) => {
    // console.log("Se ejecutó");
    // console.log(e.target.name);
    /**El name es del input, es decir, se ejecuta todos los name */
    switch (e.target.name) {
      case "claRFE":
        validarInputRF($regExpre.claRFE, e.target, "claRFE");
        break;
      case "nomRFE":
        validarInputRF($regExpre.nomRFE, e.target, "nomRFE");
        break;
    }
  };
  const validarInputRF = (expresion, input, campo) => {
    if (expresion.test(input.value)) {
      d.querySelector(`#val-${campo} .alert-val`).classList.remove(
        "alert-val-activo"
      );
      // Valida que los campos no esten vacíos.
      camposRF[ campo ] = true;
    } else {
      d.querySelector(`#val-${campo} .alert-val`).classList.add(
        "alert-val-activo"
      );
      setTimeout(() => {
        d.querySelector(`#val-${campo} .alert-val`).classList.remove(
          "alert-val-activo"
        );
      }, 5000);
      camposRF[ campo ] = false;
    }
  };

  inputsRFE.forEach((input) => {
    input.addEventListener("keyup", validarFormRFE);
    input.addEventListener("blur", validarFormRFE);
  });
  /**=================================================================
      * VALIDAR SI CLAVE RÉGIMEN FISCAL EXISTE
      ===================================================================*/
  $claveRFE.addEventListener("change", (e) => {
    // console.log(e);
    const $claveRF = e.target.value;
    // console.log($clave);
    let data = new FormData();
    data.append("clave", $claveRF);
    fetch("ajax/regimenRF.ajax.php", {
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
          $claveRFE.value = "";
        }
      })
      .catch(function (err) {
        // console.log('error', err);
        let message = err.statusText || "Ocurrió un error";
        $claveRFE.innerHTML = `<p>Error ${err.status}: ${message}</p>`;
      });
  });
  /**=================================================================
     * CAPTURAR DATOS PARA MODIFICAR
     ===================================================================*/
  $formRFE.addEventListener("submit", function (e) {
    // /console.log("Excelente");
    e.preventDefault();
    /**-----Validación de datos */
    if (idRFedit != "" && claRFE != "" && nomRFE != "") {
      /**------Fin validación de datos */
      let data = new FormData($formRFE);
      // console.log(data);
      fetch("ajax/regimenRF.ajax.php", {
        method: "POST",
        body: data,
        mode: "cors",
      })
        .then((res) => (res.ok ? res.json() : Promise.reject(res)))
        .then((json) => {
          // console.log(json);
          if (json === "ok") {
            toastr.success(
              "Se actualizaron los datos de regimen fiscal correctamente.",
              "Datos guardados"
            );
            tablaRF.ajax.reload(null, false);
          }
          // $formcEdit.reset();
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
      d.getElementById("form-mensajeRF").classList.add("alert-val-activo");
      setTimeout(() => {
        d.getElementById("form-mensajeRF").classList.remove(
          "alert-val-activo"
        );
      }, 5000);
    }
  });
}
d.addEventListener("DOMContentLoaded", formRFedit);

function traerId() {
  $claveRF = d.getElementById("claRF");
  // console.log("Hola");
  let data = new FormData;
  data.append("traerCode", 'true');
  fetch("ajax/regimenRF.ajax.php", {
    method: "POST",
    body: data,
    cors: "cors",
  }).then((res) => (res.ok ? res.json() : Promise.reject(res)))
    .then((json) => {
      // console.log(json);
      const $codigo = Number((json.claveRegimenFiscal).substr(-1)) + 1;
      const $codigo2 = Number((json.claveRegimenFiscal).substr(-2)) + 1;
      if (json === "falso") {
        // console.log(json);
        $claveRF.value = '0000000' + 1;
      } else if ($codigo2 < 10 && $codigo < 10) {
        $claveRF.value = '0000000' + $codigo;
      } else if ($codigo == 10) {
        $claveRF.value = '000000' + $codigo;
      } else if ($codigo2 > 10) {
        if ($codigo2 > 10 && $codigo2 < 100) {
          $claveRF.value = '000000' + $codigo2;
        } else {
          $claveRF.value = '00000' + $codigo2;
        }
      }
    }).catch(function (err) {
      // console.log('error', err);
      let message = err.statusText || "Ocurrió un error";
      $claveRF.innerHTML = `<p>Error ${err.status}: ${message}</p>`;
    });
}
/**-------------Fin edición de formulario */
/**=================================================================
    * ELIMINAR DATOS
    ===================================================================*/
const idEliminarRF = (id) => {
  let idElimRF = id;
  // console.log("idPdelete ", idElimRF);
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
      let url = "ajax/regimenRF.ajax.php";
      let data = new FormData();
      data.append("iDRFDelete", idElimRF);
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
          tablaRF.ajax.reload(null, false);
        })
        .catch(function (err) {
          // console.error('Error', err);
          let message = err.statusText || "Ocurrió un error";
          idEliminarRF.innerHTML = `<p>Error ${err.status}: ${message}</p>`;
        });
    }
  });
};
/**----------------Eliminar proveedor */
