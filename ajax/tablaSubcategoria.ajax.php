<?php
require_once "../controladores/subcategoria.controlador.php";
require_once "../controladores/categoria.controlador.php";
require_once "../modelos/subcategoria.modelo.php";
require_once "../modelos/categoria.modelo.php";

class TablaSubCategoria
{
    /**===================================
     * MOSTRAR LA TABLA SUBCATEGORIA
     ===================================**/
    public function mostrarTablasSubCategoria()
    {
        $item = null;
        $value = null;

        $subcategoria = ControladorSubCategoria::ctrMostrarSubCategoria($item, $value);
        // var_dump($subcategoria);

        if (count($subcategoria) != 0) {
            # code...
            // return;
            $datosJson = '{

            "data":[';

            for ($i = 0; $i < count($subcategoria); $i++) {
                /**===================================
                 * TRAER IMAGEN CATEGOÍA
             ===================================**/
                if ($subcategoria[$i]["foto_subcat"] != "") {

                    $imgCat = "<center><img class='img-thumbnail imgTablaCat' src='" . $subcategoria[$i]["foto_subcat"] . "' width='40px'></center>";
                } else {

                    $imgCat = "<center><img class='img-thumbnail imgTablaCat' src='vistas/img/subcategorias/default/anonymous.png' width='40px'></center>";
                }
                /**===================================
                 * TRAER CATEGORIA
             ===================================**/
                $item = "id";
                $value = $subcategoria[$i]["idCateg"];
                $rescat = ControladorCategoria::ctrMostarCatE($item, $value);
                if (is_array($rescat)) {
                    $categoria = $rescat["nombre_cat"];
                } else {
                    $categoria = "SIN CATEGORÍA";
                }
                /**===================================
                 * AGREGAR ETIQUETAS DE ESTADO
             ===================================**/
                if ($subcategoria[$i]["activo"] == 0) {
                    $colorEstado = "btn-outline-danger";
                    $textoEstado = "Desactivado";
                    $estadosubCategoria = 1;
                } else {
                    $colorEstado = "btn-outline-success";
                    $textoEstado = "Activo";
                    $estadosubCategoria = 0;
                }
                $estado = "<button type='button' class='btn btn-table-icon btn-pill " . $colorEstado . " btnActivarsubCat' idsubCategoria='" . $subcategoria[$i]["id"] . "' estadosubCategoria='" . $estadosubCategoria . "'>" . $textoEstado . "</button>";
                /**===================================
                 * TRAER LAS ACCIONES
             ===================================**/
                $id = $subcategoria[$i]["id"];
                $acciones = "<center><div class='btn-group'><button type='button' class='btn-primary ms-btn-icon btn-pill btnEditarsubCategoria' onclick='idsubCategoriaE($id);' data-toggle='modal' data-target='#modal-edsub'><i class='fa fa-edit'></i></button><button class='btn-danger ms-btn-icon btn-pill btnEliminarsubCategoria' onclick='idEliminarsubCat($id);'><i class='fas fa-trash'></i></button></div></center>";
                /**===================================
                 * CONSTRUiR LOS DATOS JSON
             ===================================**/

                $datosJson .= '[
                    "' . ($i + 1) . '",
                    "' . $categoria . '",
                    "' . $subcategoria[$i]["nombre_subcat"] . '",
                    "' . $subcategoria[$i]["descrip_subcat"] . '",
                    "' . $estado . '",
                    "' . $imgCat . '",
                    "' . $subcategoria[$i]["fecha_altSubcat"] . '",
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
$acitvarProductos = new TablaSubCategoria();
$acitvarProductos->mostrarTablasSubCategoria();