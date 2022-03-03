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
                preg_match('/^[A-Za-zÑñÁáÉéÍíÓóÚúÜü0-9\_\-\.\,\s]{1,250}$/', $datos["descripcat"]) && 
                preg_match('/^[A-Za-z0-9ÑñÁáÉéÍíÓóÚúÜü\s]{1,250}$/', $datos["nomRF"])
            ) {
                $datos = array(
                    'claRF' => $datos["claRF"],
                    'descripcat' => $datos["descripcat"],
                    'fotoCat' => substr($ruta, 3),
                    'activo' => 0
                );
                // echo json_encode($datos);
                // return;
                $response = ModeloCategoria::mdlGurardarCat("categoria", $datos);
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

// $datos = array(
//     'claRF' => $this->claRF,
//     'descripRF' => $this->descripRF,
//     'nomRF' => $this->nomRF
// );