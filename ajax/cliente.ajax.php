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
    /**=================================================================
     * TRAER ID CLIENTE PARA EDICIÓN
     ===================================================================*/
    public $idClientes;
    public function ajaxTraerClienteEdit()
    {
        $item = "id";
        $value = $this->idClientes;
        $response = ControladorClientes::ctrMostrarClienteE($item, $value);
        echo json_encode($response);
    }
    /**=================================================================
     * EDITAR CLIENTES
     ===================================================================*/
    public $idCliente;
    public $nombrecliE;
    public $telcliE;
    public $dircliE;
    public $razoncliE;
    public $rfccliE;
    public $emailcliE;
    public function ajaxEditarCliente()
    {
        $datos = array(
            'idCliente' => $this->idCliente,
            'nombreCliE' => $this->nombrecliE,
            'telclieE' => $this->telcliE,
            'dirclieE' => $this->dircliE,
            'razonclliE' => $this->razoncliE,
            'rfcclieE' => $this->rfccliE,
            'emailcliE' => $this->emailcliE
        );
        // echo json_encode($datos);
        // return;
        $response = ControladorClientes::ctrClintesEdit($datos);
        echo $response;
    }
    /**=================================================================
     * ELIMINARA DATOS
     ===================================================================*/
    public $ideliminarC;
    public function ajaxEliminarC()
    {
        $tabla = "clientes";
        $value = $this->ideliminarC;
        // echo json_encode($value);
        // return;
        $response = ModeloClientes::mdlEdliminarCliente($tabla, $value);
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
/**=================================================================
 * TREAER ID CLIENTE PARA EDICIÓN
 ===================================================================*/
if (isset($_POST["idClientes"])) {
    // echo $_POST["idClientes"];
    $ediC = new AjaxCliente();
    $ediC->idClientes = $_POST["idClientes"];
    $ediC->ajaxTraerClienteEdit();
}

/**=================================================================
 * EDITAR DATOS CLIENTE
 ===================================================================*/
if (isset($_POST["idCliente"])) {
    $editc = new AjaxCliente();
    $editc->idCliente = $_POST["idCliente"];
    $editc->nombrecliE = $_POST["nombrecliE"];
    $editc->telcliE = $_POST["telcliE"];
    $editc->dircliE = $_POST["dircliE"];
    $editc->razoncliE = $_POST["razoncliE"];
    $editc->rfccliE = $_POST["rfccliE"];
    $editc->emailcliE = $_POST["emailcliE"];
    $editc->ajaxEditarCliente();
    // echo json_encode($_POST["idCliente"]);
}
/**=================================================================
 * ELIMINAR DATOS
 ===================================================================*/
if (isset($_POST["ideliminarC"])) {
    $delete = new AjaxCliente();
    $delete->ideliminarC = $_POST["ideliminarC"];
    $delete->ajaxEliminarC();
    // echo json_encode($_POST["ideliminarP"]);
}