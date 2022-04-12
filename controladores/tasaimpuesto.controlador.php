<?php
class ControladorTI
{
    /**=================================================================
     * MOSTRAR DATOS
     ===================================================================*/
    static public function ctrMostrarTi($item, $value)
    {
        $tabla = "tasaimpuesto";
        $response = ModeloTI::mdlMostrarTi($tabla, $item, $value);
        return $response;
    }
    /**=================================================================
     * TRAER ÚLTIMO ID PARA CÓDIGO
     ===================================================================*/
    static public function ctrTraerUltimoIdTI($item)
    {
        $tabla = "tasaimpuesto";
        $response = ModeloTI::mdlTraerUltimoIdTI($tabla, $item);
        return $response;
    }
    /**=================================================================
     * MOSTRAR DATOS PARA EDICIÓN
     ===================================================================*/
    static public function ctrMostrarEditTI($item, $value)
    {
        $tabla = "tasaimpuesto";
        $response = ModeloTI::mdlMostrarEdit($tabla, $item, $value);
        return $response;
    }
    /**=================================================================
     * GUARDAR DATOS
     ===================================================================*/
    static public function ctrGuardarTI($datos)
    {
        // echo json_encode($datos);
        // return;
        require_once "../modelos/tasaimpuesto.modelo.php";
        if (isset($datos["conceptoTI"])) {
            if (
                preg_match('/^[A-Za-z0-9ÑñÁáÉéÍíÓóÚúÜü\s]{1,250}$/', $datos["conceptoTI"]) &&
                preg_match('/^\d*(\.\d{1})?\d{0,5}$/', $datos["valorti"]) &&
                preg_match('/^\d*(\.\d{1})?\d{0,5}$/', $datos["tasacuota"])
            ) {
                $datos = array(
                    'conceptoTI' => $datos["conceptoTI"],
                    'claveTI' => $datos["claveTI"],
                    'activo' => 0,
                    'valorti' => $datos["valorti"],
                    'tasacuota' => $datos["tasacuota"],
                    'id_usuario' => 1
                );
                // echo json_encode($datos);
                // return;
                $response = ModeloTI::mdlGurardarTI("tasaimpuesto", $datos);
                return $response;
            } else {
                return '<script>
                Swal.fire({
                    position: "top-end",
                    icon: "error",
                    text: "¡Datos incorrectos o vacíos, no deben tener caracterres especiales!",
                    showConfimButton: false,
                    timer: 1500
                })
                </script>';
            }
        }
    }
    /**=================================================================
     * EDITAR DATOS
     ===================================================================*/
    static public function ctrEditarTI($datos)
    {
        // echo json_encode($datos);
        // return;
        require_once "../modelos/tasaimpuesto.modelo.php";
        if (isset($datos["idTimpE"])) {
            if (
                preg_match('/^[A-Za-z0-9ÑñÁáÉéÍíÓóÚúÜü\s]{1,250}$/', $datos["conceptoTIE"]) &&
                preg_match('/^[0-9\.\s]{1,10}$/', $datos["valortiE"]) &&
                preg_match('/^[0-9\.\s]{1,10}$/', $datos["tasacuotaE"])
            ) {
                $datos = array(
                    'idTimpE' => $datos["idTimpE"],
                    'conceptoTIE' => $datos["conceptoTIE"],
                    'valortiE' => $datos["valortiE"],
                    'tasacuotaE' => $datos["tasacuotaE"]
                );
                // echo json_encode($datos);
                // return;
                $response = ModeloTI::mdlEditarTI("tasaimpuesto", $datos);
                return $response;
            } else {
                return '<script>
                Swal.fire({
                    position: "top-end",
                    icon: "error",
                    text: "¡Datos incorrectos o vacíos, no deben tener caracterres especiales!",
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
    static public function ctrEliminarTI($datos)
    {
        require_once "../modelos/tasaimpuesto.modelo.php";
        if (isset($datos["iDTIDelete"])) {
            $datosDelete = $datos["iDTIDelete"];
            $response = ModeloTI::mdlEliminarTI("tasaimpuesto", $datosDelete);
            return $response;
        }
    }
}