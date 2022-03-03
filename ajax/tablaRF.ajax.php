<?php
require_once "../controladores/regimenF.controlador.php";
require_once "../modelos/regimenF.modelo.php";

class AjaxTablaRF
{
    /**=================================================================
     * MOSTRAR DATOS PARA TABLA
     ===================================================================*/
    public function ajaxRF()
    {
        $item = null;
        $value = null;
        $response = ControladorRF::ctrMostrarRF($item, $value);
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
                    $estadoRF = 1;
                } else {
                    $colorEstado = "btn-outline-success";
                    $textoEstado = "Activo";
                    $estadoRF = 0;
                }
                $estado = "<center><button type='button' class='btn btn-table-icon btn-pill " . $colorEstado . " btnActivarRF' idRF='" . $response[$i]["id"] . "' estadoRF='" . $estadoRF . "'>" . $textoEstado . "</button></center>";
                /**===================================
                 * TRAER LAS ACCIONES
                     ===================================**/
                $id = $response[$i]["id"];
                $acciones = "<center><div class='btn-group'><button type='button' class='btn-primary ms-btn-icon btn-pill btnEditarRF' onclick='idRF($id);' data-toggle='modal' data-target='#modal-editRF'><i class='fa fa-edit'></i></button><button class='btn-danger ms-btn-icon btn-pill btnEliminarRRF' onclick='idEliminarRF($id);'><i class='fas fa-trash'></i></div></center>";
                /**=================================================================
                 * CONSTTURIR LOS DATOS JSON
                     ===================================================================*/
                $datosJson .= '[
                            "' . ($i + 1) . '",
                            "' . $response[$i]["claveRegimenFiscal"] . '",
                            "' . $response[$i]["descrip_regFis"] . '",
                            "' . $response[$i]["nombre_regFis"] . '",
                            "' . $estado . '",
                            "' . $response[$i]["fecha_altRegF"] . '",
                            "' . $acciones . '"
                        ],';
            }
            # Se substrae la última coma que cierra el json(es la anaterior).
            $datosJson = substr($datosJson, 0, -1);
            $datosJson .= ']
            }';
            echo $datosJson;
        } else {
            echo '{
                "data":[]
            }';
        }
    }
}
$dep = new AjaxTablaRF();
$dep->ajaxRF();