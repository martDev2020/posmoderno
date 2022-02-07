<?php
require_once "../controladores/clientes.controlador.php";
require_once "../modelos/clientes.modelo.php";

class TablaClientes
{
    /**===================================
     * MOSTRAR LA TABLA CLIENTES
     ===================================**/
    public function mostrarTablaClientes()
    {
        $item = null;
        $value = null;

        $clientes = ControladorClientes::ctrMostrarClientes($item, $value);
        // var_dump($clientes);

        if (count($clientes) != 0) {
            # code...
            // return;
            $datosJson = '{

            "data":[';

            for ($i = 0; $i < count($clientes); $i++) {
                /**===================================
                 * AGREGAR ETIQUETAS DE ESTADO
             ===================================**/
                if ($clientes[$i]["status_cli"] == 0) {
                    $colorEstado = "btn-outline-danger";
                    $textoEstado = "Desactivado";
                    $estadoClientes = 1;
                } else {
                    $colorEstado = "btn-outline-success";
                    $textoEstado = "Activo";
                    $estadoClientes = 0;
                }
                $estado = "<button type='button' class='btn btn-table-icon btn-pill " . $colorEstado . " btnActivarC' idClientes='" . $clientes[$i]["id"] . "' estadoCliente='" . $estadoClientes . "'>" . $textoEstado . "</button>";
                /**===================================
                 * TRAER LAS ACCIONES
             ===================================**/
                $id = $clientes[$i]["id"];
                $acciones = "<center><div class='btn-group'><button type='button' class='btn-primary ms-btn-icon btn-pill btnEditarClientes' onclick='idClientes($id);' data-toggle='modal' data-target='#modal-editC'><i class='fa fa-edit'></i></button><button class='btn-danger ms-btn-icon btn-pill btnEliminarCliente' onclick='idEliminarC($id);'><i class='fas fa-trash'></i></button></div></center>";
                /**===================================
                 * CONSTRUiR LOS DATOS JSON
             ===================================**/

                $datosJson .= '[
                    "' . ($i + 1) . '",
                    "' . $clientes[$i]["nombre_cliente"] . '",
                    "' . $clientes[$i]["telefono_cli"] . '",
                    "' . $clientes[$i]["direccion_cli"] . '",
                    "' . $clientes[$i]["razonSocial_cli"] . '",
                    "' . $estado . '",
                    "' . $clientes[$i]["rfc_cli"] . '",
                    "' . $clientes[$i]["email"] . '",
                    "' . $clientes[$i]["fecha_altCli"] . '",
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
$acitvarProductos = new TablaClientes();
$acitvarProductos->mostrarTablaClientes();