<?php
require_once "../controladores/proveedor.controlador.php";
require_once "../modelos/proveedor.modelo.php";

class ProveedorAjax
{
    public $nombreprov;
    public $dirprov;
    public $telprov;
    public $emailprov;
    public $descripprov;

    public function ajaxCrearProveedor()
    {
        $datos = array(
            "nombreprov" => $this->nombreprov,
            "dirprov" => $this->dirprov,
            "telprov" => $this->telprov,
            "emailprov" => $this->emailprov,
            "descripprov" => $this->descripprov
        );
        // echo json_encode($datos);
        // return;
        $response = ControladorProveedor::ctrCrearProveedor($datos);
        // echo json_encode($response);
        echo $response;
    }
    /**=================================================================
     * DATOS PARA ACTIVAR EL SATATUS DE PROVEEDOR
     ===================================================================*/
    public $activeSP;
    public $activeIdP;
    public function ajaxActivarProveedor()
    {
        $tabla = "proveedores";
        $item1 = "activo";
        $valor1 = $this->activeSP;
        $item2 = "id";
        $valor2 = $this->activeIdP;
        $response = ModeloProveedor::mdlActualizarStatusP($tabla, $item1, $valor1, $item2,  $valor2);
        echo $response;
    }
}
/**=================================================================
 * RECIBIR DATOS DE PROVEEDOR PARA GUARDAR
 ===================================================================*/
if (isset($_POST["nombreprov"])) {
    $proveedor = new ProveedorAjax();
    $proveedor->nombreprov = $_POST["nombreprov"];
    $proveedor->dirprov = $_POST["dirprov"];
    $proveedor->telprov = $_POST["telprov"];
    $proveedor->emailprov = $_POST["emailprov"];
    $proveedor->descripprov = $_POST["descripprov"];
    $proveedor->ajaxCrearProveedor();
    // echo json_encode($response);
}
/**=================================================================
 * DATOS PARA CAMBIAR EL STATUS DE PROVEEDOR
 ===================================================================*/
if (isset($_POST["activeSP"])) {
    // echo json_encode("Id :" . $_POST["activeIdP"]);
    // echo json_encode("Status :" . $_POST["activeSP"]);
    $statusP = new ProveedorAjax();
    $statusP->activeSP = $_POST["activeSP"];
    $statusP->activeIdP = $_POST["activeIdP"];
    $statusP->ajaxActivarProveedor();
}