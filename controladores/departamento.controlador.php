<?php
class ControladorDep
{
    /**=================================================================
     * MOSTRAR DATOS 
     ===================================================================*/
    static public function ctrMostrarDep($item, $value)
    {
        $tabla = "departamento";
        $response = ModeloDep::mdlMostrarDep($tabla, $item, $value);
        return $response;
    }
    /**=================================================================
     * TRAER DATOS CON ID PARA EDITAR
     ===================================================================*/
    static public function ctrMostrarDepE($item, $value)
    {
        $tabla = "departamento";
        $response = ModeloDep::mdlMostrarDepE($tabla, $item, $value);
        return $response;
    }
    /**=================================================================
     * GUARADAR DATOS 
     ===================================================================*/
    static public function ctrCrearDep($datos)
    {
        // echo json_encode($datos);
        // return;
        require_once "../modelos/departamento.modelo.php";
        if (isset($datos["nombredep"])) {
            if (
                preg_match('/^[A-Za-z0-9ÑñÁáÉéÍíÓóÚúÜü\s]{1,250}$/', $datos["nombredep"])
            ) {
                $datos = array(
                    'nombredep' => $datos["nombredep"],
                    'activo' => 0
                );
                // echo json_encode($datos);
                // return;
                $response = ModeloDep::mdlGurardarDep("departamento", $datos);
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
     * GUARADAR DATOS 
     ===================================================================*/
    static public function ctrDepEdit($datos)
    {
        // echo json_encode($datos);
        // return;
        require_once "../modelos/departamento.modelo.php";
        if (isset($datos["idDepE"])) {
            if (
                preg_match('/^[A-Za-z0-9ÑñÁáÉéÍíÓóÚúÜü\s]{1,250}$/', $datos["nombredepE"])
            ) {
                $datos = array(
                    'idDepE' => $datos["idDepE"],
                    'nombredepE' => $datos["nombredepE"]
                );
                // echo json_encode($datos);
                // return;
                $response = ModeloDep::mdlEditarDep("departamento", $datos);
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
}