<?php
class ControladorUC
{
    /**=================================================================
     * MOSTRAR DATOS DE UNIDAD COMPRA
     ===================================================================*/
    static public function ctrMostrarUC($item, $value)
    {
        $tabla = "unidad_compra";
        $response = ModeloUC::mdlMostrarUC($tabla, $item, $value);
        return $response;
    }
    /**=================================================================
     * MOSTrAR DATOS PARA EDICIÓN
     ===================================================================*/
    static public function ctrMostrarUCE($item, $value)
    {
        $tabla = "unidad_compra";
        $response = ModeloUC::mdlMostrarUCE($tabla, $item, $value);
        return $response;
    }
    /**=================================================================
     * GUARDAR DATOS
     ===================================================================*/
    static public function ctrGuardarDatos($datos)
    {
        require_once "../modelos/uniCompra.modelo.php";

        if (isset($_POST["nombreUni"])) {
            if (preg_match('/^[A-Za-z0-9ÑñÁáÉéÍíÓóÚúÜü\s]{1,250}$/', $datos["nombreUni"])) {
                $datos = array(
                    'nombreUni' => $datos["nombreUni"],
                    'activo' => 0
                );
                $response = ModeloUC::mdlGuardarUC("unidad_compra", $datos);
                return $response;
            } else {
                echo '<script>
                Swal.fire({
                    position: "top-end",
                    icon: "error",
                    text: "¡Datos icorrectos o vacíos, no deben tener caracterres especiales!",
                    showConfimButton: false,
                    timer: 1500
                })
                </script>';
            }
        }
    }
    /**=================================================================
     * GUARDAR DATOS DE EDICIÓN
     ===================================================================*/
    static public function ctrGuardarEdit($datos)
    {
        require_once "../modelos/uniCompra.modelo.php";

        if (isset($_POST["idUCompraE"])) {
            if (preg_match('/^[A-Za-z0-9ÑñÁáÉéÍíÓóÚúÜü\s]{1,250}$/', $datos["nombreUniE"])) {
                $datos = array(
                    'idUCompraE' => $datos["idUCompraE"],
                    'nombreUniE' => $datos["nombreUniE"]
                );
                $response = ModeloUC::mdlGuardarUCE("unidad_compra", $datos);
                return $response;
            } else {
                echo '<script>
                Swal.fire({
                    position: "top-end",
                    icon: "error",
                    text: "¡Datos icorrectos o vacíos, no deben tener caracterres especiales!",
                    showConfimButton: false,
                    timer: 1500
                })
                </script>';
            }
        }
    }
    /**=================================================================
     * ELIMINAR DATOS
     ===================================================================*/
    static public function ctrDeleteUC($datos)
    {
        // echo json_encode($datos);
        // return;
        require_once "../modelos/uniCompra.modelo.php";
        if (isset($datos["idUComEdelete"])) {
            $datosDelete = $datos["idUComEdelete"];
            $response = ModeloUC::mdlDeleteUCom("unidad_compra", $datosDelete);
            return $response;
        }
    }
}