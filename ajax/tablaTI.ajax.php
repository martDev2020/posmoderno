<?php
require_once "../controladores/tasaimpuesto.controlador.php";
require_once "../controladores/usuario.controlador.php";
require_once "../controladores/empleado.controlador.php";
require_once "../modelos/tasaimpuesto.modelo.php";
require_once "../modelos/usuario.modelo.php";
require_once "../modelos/empleado.modelo.php";


class TablaTi
{
    /**=================================================================
     * MOSTRAR DATOS
     ===================================================================*/
    public function mostrarDatosTI()
    {
        $item = null;
        $value = null;
        $tasaimpuesto = ControladorTI::ctrMostrarTi($item, $value);
        // var_dump($tasaimpuesto);
        if (count($tasaimpuesto) != 0) {
            $datosJson = '{
                "data":[';
            for ($i = 0; $i < count($tasaimpuesto); $i++) {
                /**=================================================================
                 * MOSTRAR USUARIO
                 ===================================================================*/
                $item = "id";
                $value = $tasaimpuesto[$i]["id_usuario"];
                $usuario = ControladorUser::ctrMostrarUser($item, $value);
                /**
                 * La petición de los usuarios se hace eon el llamado con un fetchall existentes en la tabla, en 
                 * la siguiente petición en el caso de los empleados se hace la búsqueda con un un fetch.
                 */
                // var_dump($usuario);
                if (is_array($usuario)) {
                    foreach ($usuario as $key => $value1) {
                        /**=================================================================
                         * TRAER DATOS EMPLAEADO
                         ===================================================================*/
                        // var_dump($value1);
                        $item = "id";
                        $value = $value1["id_empleado"];
                        $empleados = ControladorEmpl::ctrMostrarEmplE($item, $value);
                        $nombreu = $empleados["nombre_cli"];
                    }
                } else {
                    $nombreu = "<small>SIN USUARIO</small>";
                }
                /**===================================
                 * AGREGAR ETIQUETAS DE ESTADO
                ===================================**/
                if ($tasaimpuesto[$i]["activo"] == 0) {
                    $colorEstado = "btn-outline-danger";
                    $textoEstado = "Desactivado";
                    $estadoTI = 1;
                } else {
                    $colorEstado = "btn-outline-success";
                    $textoEstado = "Activo";
                    $estadoTI = 0;
                }
                $estado = "<div><button type='button' class='btn btn-table-icon btn-pill " . $colorEstado . " btnActivarTI' idTI='" . $tasaimpuesto[$i]["id"] . "' estadoTI='" . $estadoTI . "'>" . $textoEstado . "</button></div>";
                /**===================================
                 * TRAER LAS ACCIONES
             ===================================**/
                $id = $tasaimpuesto[$i]["id"];
                $acciones = "<center><div class='btn-group' id='btnAcc'><button type='button' class='btn-primary ms-btn-icon btn-pill btnEdiTI' onclick='idTIE($id);' data-toggle='modal' data-target='#modal-regTIE'><i class='fa fa-edit'></i></button><button class='btn-danger ms-btn-icon btn-pill btnEliMti' onclick='idElimTI($id);'><i class='fas fa-trash'></i></button></div></center>";
                /**===================================
                 * CONSTRUiR LOS DATOS JSON
             ===================================**/

                $datosJson .= '[
                    "' . ($i + 1) . '",
                    "' . $tasaimpuesto[$i]["concepto"] . '",
                    "' . $tasaimpuesto[$i]["clave_tasaImp"] . '",
                    "' . $tasaimpuesto[$i]["valor"] . '",
                    "' . $tasaimpuesto[$i]["tasaCuota"] . '",
                    "' . $estado . '",
                    "' . $nombreu . '",
                    "' . $tasaimpuesto[$i]["fecha_altTimp"] . '",
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
$ti = new TablaTi();
$ti->mostrarDatosTI();