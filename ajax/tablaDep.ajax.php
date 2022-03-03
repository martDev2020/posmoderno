<?php
require_once "../controladores/departamento.controlador.php";
require_once "../modelos/departamento.modelo.php";

class AjaxTablaDep
{
    /**=================================================================
     * MOSTRAR DATOS PARA TABLA
     ===================================================================*/
    public function ajaxDepartamento()
    {
        $item = null;
        $value = null;
        $response = ControladorDep::ctrMostrarDep($item, $value);
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
                    $estadoDep = 1;
                } else {
                    $colorEstado = "btn-outline-success";
                    $textoEstado = "Activo";
                    $estadoDep = 0;
                }
                $estado = "<center><button type='button' class='btn btn-table-icon btn-pill " . $colorEstado . " btnActivarDep' idDep='" . $response[$i]["id"] . "' estadoDep='" . $estadoDep . "'>" . $textoEstado . "</button></center>";
                /**===================================
                 * TRAER LAS ACCIONES
                     ===================================**/
                $id = $response[$i]["id"];
                $acciones = "<center><div class='btn-group'><button type='button' class='btn-primary ms-btn-icon btn-pill btnEditarDep' onclick='idDep($id);' data-toggle='modal' data-target='#modal-editDep'><i class='fa fa-edit'></i></button><button class='btn-danger ms-btn-icon btn-pill btnEliminarDep' onclick='idEliminarDep($id);'><i class='fas fa-trash'></i></div></center>";
                /**=================================================================
                 * CONSTTURIR LOS DATOS JSON
                     ===================================================================*/
                $datosJson .= '[
                            "' . ($i + 1) . '",
                            "' . $response[$i]["nombre_dep"] . '",
                            "' . $estado . '",
                            "' . $response[$i]["fecha_altDep"] . '",
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
$dep = new AjaxTablaDep();
$dep->ajaxDepartamento();