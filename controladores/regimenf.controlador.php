<?php
class ControladorRF
{
    /**=================================================================
     * MOSTRAR DATOS
     ===================================================================*/
    static public function ctrMostrarRF($item, $value)
    {
        $tabla = "regimenfiscal";
        $response = ModeloRF::mdlMostrarRF($tabla, $item, $value);
        return $response;
    }
    /**=================================================================
     * MOSTRAR DATOS PARA EDICIÓN
     ===================================================================*/
    static public function ctrMostrarEdit($item, $value)
    {
        $tabla = "regimenfiscal";
        $response = ModeloRF::mdlMostrarEdit($tabla, $item, $value);
        return $response;
    }
    /**=================================================================
     * GUARADAR DATOS
     ===================================================================*/
    static public function ctrGuardarRF($datos)
    {
        // echo json_encode($datos);
        // return;
        require_once "../modelos/regimenF.modelo.php";
        if (isset($datos["claRF"])) {
            if (
                preg_match('/^\d{8}$/', $datos["claRF"]) &&
                preg_match('/^[A-Za-zÑñÁáÉéÍíÓóÚúÜü0-9\_\-\.\,\s]{1,250}$/', $datos["descripRF"]) &&
                preg_match('/^[A-Za-z0-9ÑñÁáÉéÍíÓóÚúÜü\s]{1,250}$/', $datos["nomRF"])
            ) {
                $datos = array(
                    'claRF' => $datos["claRF"],
                    'descripRF' => $datos["descripRF"],
                    'activo' => 0,
                    'nomRF' => $datos["nomRF"]
                );
                // echo json_encode($datos);
                // return;
                $response = ModeloRF::mdlGurardarRF("regimenfiscal", $datos);
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
     * GUARDAR DATOS EDICIÓN
     ===================================================================*/
    static public function ctrEditarRF($datos)
    {
        // echo json_encode($datos);
        // return;
        require_once "../modelos/regimenF.modelo.php";
        if (isset($datos["idRFedit"])) {
            if (
                preg_match('/^\d{8}$/', $datos["claRFE"]) &&
                preg_match('/^[A-Za-zÑñÁáÉéÍíÓóÚúÜü0-9\_\-\.\,\s]{1,250}$/', $datos["descripRFE"]) &&
                preg_match('/^[A-Za-z0-9ÑñÁáÉéÍíÓóÚúÜü\s]{1,250}$/', $datos["nomRFE"])
            ) {
                $datos = array(
                    'idRFedit' => $datos["idRFedit"],
                    'claRFE' => $datos["claRFE"],
                    'descripRFE' => $datos["descripRFE"],
                    'nomRFE' => $datos["nomRFE"]
                );
                // echo json_encode($datos);
                // return;
                $response = ModeloRF::mdlEditarRF("regimenfiscal", $datos);
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
    static public function ctrEliminarRF($datos)
    {
        require_once "../modelos/regimenF.modelo.php";
        if (isset($datos["iDRFDelete"])) {
            $datosDelete = $datos["iDRFDelete"];
            $response = ModeloRF::mdlEliminarRF("regimenfiscal", $datosDelete);
            return $response;
        }
    }
}