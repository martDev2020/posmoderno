<?php
require_once "../controladores/clientes.controlador.php";
require_once "../modelos/clientes.modelo.php";

class AjaxCliente
{
    /**=================================================================
     * DATOS PARA ACTIVAR EL SATATUS DE CLIENTE
     ===================================================================*/
    public $activeSC;
    public $activeIdC;
    public function ajaxActivarClientes()
    {
        $tabla = "clientes";
        $item1 = "status_cli";
        $valor1 = $this->activeSC;
        $item2 = "id";
        $valor2 = $this->activeIdC;
        $response = ModeloClientes::mdlActualizarStatusC($tabla, $item1, $valor1, $item2,  $valor2);
        echo $response;
    }
}
/**=================================================================
 * DATOS PARA CAMBIAR EL STATUS DE CLIENTE
 ===================================================================*/
if (isset($_POST["activeSC"])) {
    // echo json_encode("Id :" . $_POST["activeIdC"]);
    // echo json_encode("Status :" . $_POST["activeSC"]);
    $statusP = new AjaxCliente();
    $statusP->activeSC = $_POST["activeSC"];
    $statusP->activeIdC = $_POST["activeIdC"];
    $statusP->ajaxActivarClientes();
}