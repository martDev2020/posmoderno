<?php
require_once "../controladores/categoria.controlador.php";
require_once "../modelos/categoria.modelo.php";

class TablaCategoria
{
    /**===================================
     * MOSTRAR LA TABLA CATEGORIA
     ===================================**/
    public function mostrarTablaCategoria()
    {
        $item = null;
        $value = null;

        $categoria = ControladorCategoria::ctrMostrarCategoria($item, $value);
        // var_dump($categoria);

        if (count($categoria) != 0) {
            # code...
            // return;
            $datosJson = '{

            "data":[';

            for ($i = 0; $i < count($categoria); $i++) {
                /**===================================
                 * TRAER IMAGEN CATEGOÍA
             ===================================**/
                if ($categoria[$i]["foto_cat"] != "") {

                    $imgCat = "<center><img class='img-thumbnail imgTablaCat' src='" . $categoria[$i]["foto_cat"] . "' width='40px'></center>";
                } else {

                    $imgCat = "<center><img class='img-thumbnail imgTablaCat' src='vistas/img/categoria/default/anonymous.png' width='40px'></center>";
                }
                /**===================================
                 * AGREGAR ETIQUETAS DE ESTADO
             ===================================**/
                if ($categoria[$i]["activo"] == 0) {
                    $colorEstado = "btn-outline-danger";
                    $textoEstado = "Desactivado";
                    $estadoCategoria = 1;
                } else {
                    $colorEstado = "btn-outline-success";
                    $textoEstado = "Activo";
                    $estadoCategoria = 0;
                }
                $estado = "<button type='button' class='btn btn-table-icon btn-pill " . $colorEstado . " btnActivarCat' idCategoria='" . $categoria[$i]["id"] . "' estadoCategoria='" . $estadoCategoria . "'>" . $textoEstado . "</button>";
                /**===================================
                 * TRAER LAS ACCIONES
             ===================================**/
                $id = $categoria[$i]["id"];
                $acciones = "<center><div class='btn-group'><button type='button' class='btn-primary ms-btn-icon btn-pill btnEditarCategoria' onclick='idCategoria($id);' data-toggle='modal' data-target='#modal-editCat'><i class='fa fa-edit'></i></button><button class='btn-danger ms-btn-icon btn-pill btnEliminarCategoria' onclick='idEliminarCat($id);'><i class='fas fa-trash'></i></button><button type='button' class='btn-primary ms-btn-icon btn-pill btnEditarCategoria' onclick='idCatOferta($id);' data-toggle='modal' data-target='#modal-ofertaCat' data-toggle='tooltip' data-placement='top' title='Generar oferta'><i class='fa fa-percent'></i></button><button class='btn-danger ms-btn-icon btn-pill btnEliminarCategoria' onclick='idEliminarCat($id);'><i class='fas fa-trash'></i></button><button type='button' class='btn-secondary ms-btn-icon btn-pill btnHoraCategoria' onclick='idCatHora($id);' data-toggle='modal' data-target='#modal-hora'><i class='fa fa-clock'></i></button></div></center>";
                /**===================================
                 * CONSTRUiR LOS DATOS JSON
             ===================================**/

                $datosJson .= '[
                    "' . ($i + 1) . '",
                    "' . $categoria[$i]["nombre_cat"] . '",
                    "' . $categoria[$i]["descrip_cat"] . '",
                    "' . $estado . '",
                    "' . $imgCat . '",
                    "' . $categoria[$i]["fecha_altCat"] . '",
                    "' . $acciones . '"
                ],';
            }
            # Se substrae la última coma que cierra el json(es la anaterior).
            $datosJson = substr($datosJson, 0, -1);
            $datosJson .= ']
        }';
            echo $datosJson;
            /**Se recomienda que se copie el resultado en un archivo para mostrar si está correcto el resultado
             * en todos los objetos para descartar el error.
             */
        } else {
            echo '{
                "data":[]
            }';
        }
    }
}
/**===================================
 * MOSTRAR TABLA PRODUCTOS
 ===================================**/
$acitvarProductos = new TablaCategoria();
$acitvarProductos->mostrarTablaCategoria();