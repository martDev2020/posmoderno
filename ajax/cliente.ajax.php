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
    /**=================================================================
     * DATOS PARA GUARDAR CLIENTE
     ===================================================================*/
    public $nombrecli;
    public $dircli;
    public $telcli;
    public $emailcli;
    public $razoncli;
    public $rfccli;
    public function ajaxCrearCliente()
    {
        $datos = array(
            'nombrecli' => $this->nombrecli,
            'dircli' => $this->dircli,
            'telcli' => $this->telcli,
            'emailcli' => $this->emailcli,
            'razoncli' => $this->razoncli,
            'rfccli' => $this->rfccli
        );
        $response = ControladorClientes::ctrCrearCliente($datos);
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
/**=================================================================
 * RECIBIR DATOS DE CLIENTE PARA GUARDAR
 ===================================================================*/
if (isset($_POST["nombrecli"])) {
    $cliente = new AjaxCliente();
    $cliente->nombrecli = $_POST["nombrecli"];
    $cliente->dircli = $_POST["dircli"];
    $cliente->telcli = $_POST["telcli"];
    $cliente->emailcli = $_POST["emailcli"];
    $cliente->razoncli = $_POST["razoncli"];
    $cliente->rfccli = $_POST["rfccli"];
    $cliente->ajaxCrearCliente();
    // echo json_encode($_POST["nombrecli"]);
}