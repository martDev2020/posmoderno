<?php
require_once "../controladores/producto.controlador.php";
require_once "../controladores/categoria.controlador.php";
require_once "../controladores/subcategoria.controlador.php";
require_once "../controladores/departamento.controlador.php";
require_once "../controladores/unidadCompra.controlador.php";
require_once "../controladores/unidadVenta.controlador.php";
require_once "../controladores/tasaimpuesto.controlador.php";
require_once "../modelos/producto.modelo.php";
require_once "../modelos/categoria.modelo.php";
require_once "../modelos/subcategoria.modelo.php";
require_once "../modelos/departamento.modelo.php";
require_once "../modelos/uniCompra.modelo.php";
require_once "../modelos/uniVenta.modelo.php";
require_once "../modelos/tasaimpuesto.modelo.php";

class TablaProducto
{
    /**=================================================================
     * MOSTRAR DATOS
     ===================================================================*/
    public function mostrarProducto()
    {
        $item = null;
        $value = null;
        $producto = ControladorProd::ctrMostrarProd($item, $value);
        // var_dump($producto);
        // return;
        if (count($producto) != 0) {
            $datosJson = '{
                "data":[';
            for ($i = 0; $i < count($producto); $i++) {
                /**===================================
                 * TRAER IMAGEN 
             ===================================**/
                if ($producto[$i]["img_prod"] != "") {

                    $imgprod = "<center><img class='img-thumbnail imgTablaCat' src='" . $producto[$i]["img_prod"] . "' width='40px'></center>";
                } else {

                    $imgprod = "<center><img class='img-thumbnail imgTablaCat' src='vistas/img/productos/default/anonymous.png' width='40px'></center>";
                }
                /**===================================
                 * TRAER CATEGORIA
             ===================================**/
                $item = "id";
                $value = $producto[$i]["id_categoria"];
                $rescat = ControladorCategoria::ctrMostarCatE($item, $value);
                if (is_array($rescat)) {
                    $categoria = $rescat["nombre_cat"];
                } else {
                    $categoria = "<small>SIN CATEGORÍA</small>";
                }
                /**===================================
                 * TRAER SUBCATEGORIA
             ===================================**/
                $item = "id";
                $value = $producto[$i]["id_subcategoria"];
                $ressub = ControladorSubCategoria::ctrMostrarEditSub($item, $value);
                if (is_array($ressub)) {
                    $subcategoria = $ressub["nombre_subcat"];
                } else {
                    $subcategoria = "<small>SIN SUBCATEGORÍA</small>";
                }
                /**===================================
                 * TRAER DEPARTAMENTO
             ===================================**/
                $item = "id";
                $value = $producto[$i]["id_departamento"];
                $resdep = ControladorDep::ctrMostrarDepE($item, $value);
                if (is_array($resdep)) {
                    $dep = $resdep["nombre_dep"];
                } else {
                    $dep = "<small>SIN DEPARTAMENTO</small>";
                }
                /**===================================
                 * TRAER UNIDAD COMPRA
             ===================================**/
                $item = "id";
                $value = $producto[$i]["id_uniCompra"];
                $resUniComp = ControladorUC::ctrMostrarUCE($item, $value);
                if (is_array($resUniComp)) {
                    $uniComp = $resUniComp["nombre_unCompra"];
                } else {
                    $uniComp = "<small>SIN UNIDAD COMPRA</small>";
                }
                /**===================================
                 * TRAER UNIDAD COMPRA
             ===================================**/
                $item = "id";
                $value = $producto[$i]["id_uniVenta"];
                $resUniVent = ControladorUV::ctrMostrarUVE($item, $value);
                if (is_array($resUniVent)) {
                    $uniVen = $resUniVent["nombre_univent"];
                } else {
                    $uniVen = "<small>SIN UNIDAD VENTA</small>";
                }
                /**===================================
                 * TRAER TASA IMPUESTO
             ===================================**/
                $item = "id";
                $value = $producto[$i]["tasaImpuestoId"];
                $resTI = ControladorTI::ctrMostrarEditTI($item, $value);
                if (is_array($resTI)) {
                    $tasTI = $resTI["concepto"];
                } else {
                    $tasTI = "<small>SIN TASA IMPUESTO</small>";
                }

                /**===================================
                 * AGREGAR ETIQUETAS DE ESTADO
                ===================================**/
                if ($producto[$i]["activo"] == 0) {
                    $colorEstado = "btn-outline-danger";
                    $textoEstado = "Desactivado";
                    $estadoProd = 1;
                } else {
                    $colorEstado = "btn-outline-success";
                    $textoEstado = "Activo";
                    $estadoProd = 0;
                }
                $estado = "<div><button type='button' class='btn btn-table-icon btn-pill " . $colorEstado . " btnActivarTI' idProd='" . $producto[$i]["id"] . "' estadoProd='" . $estadoProd . "'>" . $textoEstado . "</button></div>";
                /**===================================
                 * TRAER LAS ACCIONES
             ===================================**/
                $id = $producto[$i]["id"];
                $acciones = "<center><div class='btn-group' id='btnAcc'><button type='button' class='btn-primary ms-btn-icon btn-pill btnEdiTI' onclick='idProdE($id);' data-toggle='modal' data-target='#modal-prodE'><i class='fa fa-edit'></i></button><button class='btn-danger ms-btn-icon btn-pill' onclick='idElimProd($id);'><i class='fas fa-trash'></i></button></div></center>";
                /**===================================
                 * CONSTRUiR LOS DATOS JSON
             ===================================**/

                $datosJson .= '[
                    "' . ($i + 1) . '",
                    "' . $producto[$i]["clave"] . '",
                    "' . $producto[$i]["claveAlterna"] . '",
                    "' . $producto[$i]["nombre"] . '",
                    "' . $producto[$i]["descripcion"] . '",
                    "' . $imgprod . '",
                    "' . $estado . '",
                    "' . $producto[$i]["stock"] . '",
                    "' . $categoria . '",
                    "' . $subcategoria . '",
                    "' . $dep . '",
                    "' . $producto[$i]["precio_venta"] . '",
                    "' . $uniComp . '",
                    "' . $uniVen . '",  
                    "' . $producto[$i]["inv_minimo"] . '",
                    "' . $producto[$i]["inv_maximo"] . '",
                    "' . $producto[$i]["receta"] . '",
                    "' . $producto[$i]["granel"] . '",
                    "' . $tasTI . '",
                    "' . $producto[$i]["fecha_altPro"] . '",
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
$prod = new TablaProducto();
$prod->mostrarProducto();