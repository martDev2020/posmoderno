<?php
class ControladorClientes
{
    /**=================================================================
     * MOSTRAR CLIENTES
     ===================================================================*/
    static public function ctrMostrarClientes($item, $value)
    {
        $tabla = "clientes";
        $response = ModeloClientes::mdlMostrarClientes($tabla, $item, $value);
        return $response;
    }
    /**=================================================================
     * TRAER DATOS PARA EDICIÓN DE CLIENTE
     ===================================================================*/
    static public function ctrMostrarClienteE($item, $value)
    {
        $tabla = "clientes";
        $response = ModeloClientes::mdlMostrarCientesE($tabla, $item, $value);
        return $response;
    }
    /**=================================================================
     * CREAR CLIENTES
     ===================================================================*/
    static public function ctrCrearCliente($datos)
    {
        // echo json_encode($datos);
        // return;
        require_once "../modelos/clientes.modelo.php";
        if (isset($datos["nombrecli"])) {
            if (
                preg_match('/^[A-Za-z0-9ÑñÁáÉéÍíÓóÚúÜü\s]{1,250}$/', $datos["nombrecli"]) &&
                preg_match('/^[A-Za-zÑñÁáÉéÍíÓóÚúÜü0-9\_\-\.\,\s]{1,250}$/', $datos["dircli"]) &&
                preg_match('/^\d{10}$/', $datos["telcli"]) &&
                preg_match('/^[A-Za-z0-9]+(\.[A-Za-z0-9]+|-[A-Za-z0-9]+|_[A-Za-z0-9]+)*@[A-Za-z0-9-]+(\.[A-Za-z0-9-]+)*(\.[A-Za-z]{2,15})$/', $datos["emailcli"]) &&
                preg_match('/^[A-Za-zÑñÁáÉéÍíÓóÚúÜü0-9\_\-\.\,\s]{1,250}$/', $datos["razoncli"])  &&
                preg_match('/^([A-ZÑ&]{3,4}) ?(?:- ?)?(\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])) ?(?:- ?)?([A-Z\d]{2})([A\d])$/', $datos["rfccli"]) ||
                preg_match('/^([A-ZÑ&]{3,4})(?:- )?(\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01]))(?:- )?(([A-Z\d]{2})([A\d]))?$/', $datos["rfccli"])
            ) {
                $datos = array(
                    "nombrecli" => $datos["nombrecli"],
                    "dircli" => $datos["dircli"],
                    "telcli" => $datos["telcli"],
                    "emailcli" => $datos["emailcli"],
                    "razoncli" => $datos["razoncli"],
                    "rfccli" => $datos["rfccli"],
                    "activo" => 0
                );
                // echo json_encode($datos);
                // return;
                $response = ModeloClientes::mldCrearCliente("clientes", $datos);
                return $response;
            } else {
                echo '<script>
                Swal.fire({
                position: "top-end",
                icon: "error",
                text: "¡Datos incorrectos o vacíos, no deben llevar caracteres especiales!",
                showConfirmButton: false,
                timer: 1500
                })        
    		  	</script>';
            }
        }
    }
    /**=================================================================
     * EDICIÓN CLIENTE
     ===================================================================*/
    static public function ctrClintesEdit($datos)
    {
        // echo json_encode($datos);
        // return;
        require_once "../modelos/clientes.modelo.php";
        if (isset($_POST["idCliente"])) {
            if (
                preg_match('/^[A-Za-z0-9ÑñÁáÉéÍíÓóÚúÜü\s]{1,250}$/', $datos["nombreCliE"]) &&
                preg_match('/^[A-Za-zÑñÁáÉéÍíÓóÚúÜü0-9\_\-\.\,\s]{1,250}$/', $datos["dirclieE"]) &&
                preg_match('/^\d{10}$/', $datos["telclieE"]) &&
                preg_match('/^[A-Za-z0-9]+(\.[A-Za-z0-9]+|-[A-Za-z0-9]+|_[A-Za-z0-9]+)*@[A-Za-z0-9-]+(\.[A-Za-z0-9-]+)*(\.[A-Za-z]{2,15})$/', $datos["emailcliE"]) &&
                preg_match('/^[A-Za-zÑñÁáÉéÍíÓóÚúÜü0-9\_\-\.\,\s]{1,250}$/', $datos["razonclliE"])  &&
                preg_match('/^([A-ZÑ&]{3,4}) ?(?:- ?)?(\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])) ?(?:- ?)?([A-Z\d]{2})([A\d])$/', $datos["rfcclieE"]) ||
                preg_match('/^([A-ZÑ&]{3,4})(?:- )?(\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01]))(?:- )?(([A-Z\d]{2})([A\d]))?$/', $datos["rfcclieE"])
            ) {
                $datos = array(
                    'idCliente' => $datos["idCliente"],
                    "nombreCliE" => $datos["nombreCliE"],
                    "dircliE" => $datos["dirclieE"],
                    "telcliE" => $datos["telclieE"],
                    "emailcliE" => $datos["emailcliE"],
                    "razoncliE" => $datos["razonclliE"],
                    "rfcclieE" => $datos["rfcclieE"],
                );
                // echo json_encode($datos);
                // return;
                $response = ModeloClientes::mdlEditarCliente("clientes", $datos);
                return $response;
            } else {
                echo '<script>
                Swal.fire({
                position: "top-end",
                icon: "error",
                text: "¡Datos incorrectos o vacíos, no deben llevar caracteres especiales!",
                showConfirmButton: false,
                timer: 2000
                })
                       
    		  	</script>';
            }
        }
    }
}