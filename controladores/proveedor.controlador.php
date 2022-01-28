<?php
class ControladorProveedor
{
    /**=================================================================
     * MOSTRAR PROVEEDOR
     ===================================================================*/
    static public function ctrMostrarProveedor($item, $value)
    {
        $tabla = "proveedores";
        $response = ModeloProveedor::mdlMostrarProveedor($tabla, $item, $value);
        return $response;
    }
    /**=================================================================
     * CREAR PROVEEDOR
     ===================================================================*/
    static public function ctrCrearProveedor($datos)
    {
        // echo json_encode($datos);
        // return;
        require_once "../modelos/proveedor.modelo.php";


        if (isset($datos["nombreprov"])) {
            if (
                preg_match('/^[A-Za-z0-9ÑñÁáÉéÍíÓóÚúÜü\s]{1,250}$/', $datos["nombreprov"]) &&
                preg_match('/^[A-Za-zÑñÁáÉéÍíÓóÚúÜü0-9\_\-\.\,\s]{1,250}$/', $datos["dirprov"]) &&
                preg_match('/^\d{10}$/', $datos["telprov"]) &&
                preg_match('/^[A-Za-z0-9]+(\.[A-Za-z0-9]+|-[A-Za-z0-9]+|_[A-Za-z0-9]+)*@[A-Za-z0-9-]+(\.[A-Za-z0-9-]+)*(\.[A-Za-z]{2,15})$/', $datos["emailprov"]) &&
                preg_match('/^[A-Za-zÑñÁáÉéÍíÓóÚúÜü0-9\_\-\.\,\s]{1,250}$/', $datos["descripprov"]  && isset($datos["descripprov"]))
            ) {
                $datosProveedor = array(
                    "nombreprov" => $datos["nombreprov"],
                    "dirprov" => $datos["dirprov"],
                    "telprov" => $datos["telprov"],
                    "emailprov" => $datos["emailprov"],
                    "descripprov" => $datos["descripprov"],
                    "activo" => 0
                );
                // echo json_encode($datosProveedor);
                // return;
                $response = ModeloProveedor::mldCrearProveedor("proveedores", $datosProveedor);
                return $response;
            } else {
                echo '<script>
                Swal.fire({
                position: "top-end",
                icon: "error",
                title: "¡Datos incorrectos o vacíos, no deben llevar caracteres especiales!",
                showConfirmButton: false,
                timer: 1500
                })
                       
    		  	</script>';
            }
        }
    }
}