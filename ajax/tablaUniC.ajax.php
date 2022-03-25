<?php
require_once "../controladores/unidadCompra.controlador.php";
require_once "../modelos/uniCompra.modelo.php";

class TablaUCompra
{
    /**=================================================================
     * MOSTRAR DATOS PARA TABLA DE UNIDAD COMPRA
     ===================================================================*/
    public function mostrarTablaUC()
    {
        $item = null;
        $value = null;
        $response = ControladorUC::ctrMostrarUC($item, $value);
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
                    $estadoUCom = 1;
                } else {
                    $colorEstado = "btn-outline-success";
                    $textoEstado = "Activo";
                    $estadoUCom = 0;
                }
                $estado = "<center><button type='button' class='btn btn-table-icon btn-pill " . $colorEstado . " btnActivarUcOM' idUniCom='" . $response[$i]["id"] . "' estadoUCom='" . $estadoUCom . "'>" . $textoEstado . "</button></center>";
                /**===================================
                 * TRAER LAS ACCIONES
             ===================================**/
                $id = $response[$i]["id"];
                $acciones = "<center><div class='btn-group'><button type='button' class='btn-primary ms-btn-icon btn-pill btnEditarUC' onclick='idUniComE($id);' data-toggle='modal' data-target='#modal-editUCom'><i class='fa fa-edit'></i></button><button class='btn-danger ms-btn-icon btn-pill btnEliminarUCom' onclick='idElimUCom($id);'><i class='fas fa-trash'></i></button></div></center>";
                /**===================================
                 * CONSTRUiR LOS DATOS JSON
             ===================================**/

                $datosJson .= '[
                    "' . ($i + 1) . '",
                    "' . $response[$i]["nombre_unCompra"] . '",
                    "' . $estado . '",
                    "' . $response[$i]["fecha_altUC"] . '",
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
$unicom = new TablaUCompra();
$unicom->mostrarTablaUC();