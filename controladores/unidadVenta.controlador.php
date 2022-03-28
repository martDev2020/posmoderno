<?php
class ControladorUV
{
    /**=================================================================
     * MOSTRAR DATOS DE UNIDAD VENTA
     ===================================================================*/
    static public function ctrMostrarUV($item, $value)
    {
        $tabla = "unidad_venta";
        $response = ModeloUV::mdlMostrarUV($tabla, $item, $value);
        return $response;
    }
    /**=================================================================
     * MOSTrAR DATOS PARA EDICIÓN
     ===================================================================*/
    static public function ctrMostrarUVE($item, $value)
    {
        // echo json_encode($value);
        // return;
        $tabla = "unidad_venta";
        $response = ModeloUV::mdlMostrarUVE($tabla, $item, $value);
        return $response;
    }
    /**=================================================================
     * GUARDAR DATOS
     ===================================================================*/
    static public function ctrGuardarDatosUV($datos)
    {
        require_once "../modelos/uniVenta.modelo.php";

        if (isset($_POST["nombreUniV"])) {
            if (preg_match('/^[A-Za-z0-9ÑñÁáÉéÍíÓóÚúÜü\s]{1,250}$/', $datos["nombreUniV"])) {
                $datos = array(
                    'nombreUniV' => $datos["nombreUniV"],
                    'activo' => 0
                );
                $response = ModeloUV::mdlGuardarUV("unidad_venta", $datos);
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
    static public function ctrGuardarEditUV($datos)
    {
        require_once "../modelos/uniVenta.modelo.php";

        if (isset($_POST["idUVentaE"])) {
            if (preg_match('/^[A-Za-z0-9ÑñÁáÉéÍíÓóÚúÜü\s]{1,250}$/', $datos["nombreUniVE"])) {
                $datos = array(
                    'idUVentaE' => $datos["idUVentaE"],
                    'nombreUniVE' => $datos["nombreUniVE"]
                );
                $response = ModeloUV::mdlGuardarUVE("unidad_venta", $datos);
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
    static public function ctrDeleteUV($datos)
    {
        // echo json_encode($datos);
        // return;
        require_once "../modelos/uniVenta.modelo.php";
        if (isset($datos["idUVenEdelete"])) {
            $datosDelete = $datos["idUVenEdelete"];
            $response = ModeloUV::mdlDeleteUV("unidad_venta", $datosDelete);
            return $response;
        }
    }
}