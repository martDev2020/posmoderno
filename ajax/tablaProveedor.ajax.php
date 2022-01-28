<?php
require_once "../controladores/proveedor.controlador.php";
require_once "../modelos/proveedor.modelo.php";

class TablaProveedor
{
    /**===================================
     * MOSTRAR LA TABLA PROVEEDOR
     ===================================**/
    public function mostrarTablaProveedor()
    {
        $item = null;
        $value = null;

        $proveedor = ControladorProveedor::ctrMostrarProveedor($item, $value);
        // var_dump($proveedor);

        if (count($proveedor) != 0) {
            # code...
            // return;
            $datosJson = '{

            "data":[';

            for ($i = 0; $i < count($proveedor); $i++) {
                /**===================================
                 * AGREGAR ETIQUETAS DE ESTADO
             ===================================**/
                if ($proveedor[$i]["activo"] == 0) {
                    $colorEstado = "btn-outline-danger";
                    $textoEstado = "Desactivado";
                    $estadoProveedor = 1;
                } else {
                    $colorEstado = "btn-outline-success";
                    $textoEstado = "Activo";
                    $estadoProveedor = 0;
                }
                $estado = "<button type='button' class='btn btn-table-icon btn-pill " . $colorEstado . " btnActivarP' idProveedor='" . $proveedor[$i]["id"] . "' estadoProveedor='" . $estadoProveedor . "'>" . $textoEstado . "</button>";
                /**===================================
                 * TRAER LAS ACCIONES
             ===================================**/
                $acciones = "<center><div class='btn-group'><button class='btn-primary ms-btn-icon btn-pill btnEditarProveedor' idProveedor='" . $proveedor[$i]["id"] . "' data-toggle='modal' data-target='#modalEditarProveedor'><i class='fa fa-edit'></i></button><button class='btn-danger ms-btn-icon btn-pill btnEliminarProveedor' idProveedor='" . $proveedor[$i]["id"] . "'><i class='fas fa-trash'></i></button></div></center>";
                /**===================================
                 * CONSTRUiR LOS DATOS JSON
             ===================================**/

                $datosJson .= '[
                    "' . ($i + 1) . '",
                    "' . $proveedor[$i]["nombre_prov"] . '",
                    "' . $proveedor[$i]["descripcion_prov"] . '",
                    "' . $proveedor[$i]["direccion_prov"] . '",
                    "' . $proveedor[$i]["telefono_prov"] . '",
                    "' . $proveedor[$i]["email_prov"] . '",
                    "' . $estado . '",
                    "' . $proveedor[$i]["fecha_altProv"] . '",
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
$acitvarProductos = new TablaProveedor();
$acitvarProductos->mostrarTablaProveedor();