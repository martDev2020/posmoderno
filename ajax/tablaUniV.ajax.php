<?php
require_once "../controladores/unidadVenta.controlador.php";
require_once "../modelos/uniVenta.modelo.php";

class TablaUVenta
{
    /**=================================================================
     * MOSTRAR DATOS PARA TABLA DE UNIDAD VENTA
     ===================================================================*/
    public function mostrarTablaUV()
    {
        $item = null;
        $value = null;
        $response = ControladorUV::ctrMostrarUV($item, $value);
        // var_dump($response);
        if (count($response) != 0) {
            $datosJson = '{

            "data":[';

            for ($i = 0; $i < count($response); $i++) {
                /**===================================
                 * AGREGAR ETIQUETAS DE ESTADO
             ===================================**/
                if ($response[$i]["activo"] == 0) {
                    $colorEstado = "btn-outline-danger";
                    $textoEstado = "Desactivado";
                    $estadoUVen = 1;
                } else {
                    $colorEstado = "btn-outline-success";
                    $textoEstado = "Activo";
                    $estadoUVen = 0;
                }
                $estado = "<center><button type='button' class='btn btn-table-icon btn-pill " . $colorEstado . " btnActivarUVent' idUniVent='" . $response[$i]["id"] . "' estadoUVent='" . $estadoUVen . "'>" . $textoEstado . "</button></center>";
                /**===================================
                 * TRAER LAS ACCIONES
             ===================================**/
                $id = $response[$i]["id"];
                $acciones = "<center><div class='btn-group'><button type='button' class='btn-primary ms-btn-icon btn-pill btnEditarUV' onclick='idUniVenE($id);' data-toggle='modal' data-target='#modal-editUVen'><i class='fa fa-edit'></i></button><button class='btn-danger ms-btn-icon btn-pill btnEliminarUVent' onclick='idElimUVen($id);'><i class='fas fa-trash'></i></button></div></center>";
                /**===================================
                 * CONSTRUiR LOS DATOS JSON
             ===================================**/

                $datosJson .= '[
                    "' . ($i + 1) . '",
                    "' . $response[$i]["nombre_univent"] . '",
                    "' . $estado . '",
                    "' . $response[$i]["fecha_altUV"] . '",
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
$univent = new TablaUVenta();
$univent->mostrarTablaUV();