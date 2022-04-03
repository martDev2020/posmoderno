<?php
require_once "../controladores/tasaimpuesto.controlador.php";
require_once "../modelos/tasaimpuesto.modelo.php";

class AjaxTasaImpuesto
{
    /**=================================================================
     * ACTIVAR STATUS
     ===================================================================*/
    public $activeidTI;
    public $activeEti;
    public function ajaxActivarTI()
    {
        $tabla = "tasaimpuesto";
        $item1 = "id";
        $value1 = $this->activeidTI;
        $item2 = "activo";
        $value2 = $this->activeEti;
        $reponse = ModeloTI::mdlMostrarSTI($tabla, $item1, $value1, $item2, $value2);
        echo $reponse;
    }
    /**=================================================================
     * TREAR ÚLTIMO ID PARA CÓDIGO
     ===================================================================*/
    public function ajaxCodeTI()
    {
        $item = "clave_tasaImp";
        $response = ControladorTI::ctrTraerUltimoIdTI($item);
        echo json_encode($response);
    }
    /**=================================================================
     * GUARDAR DATOS
     ===================================================================*/
    public $conceptoTI;
    public $claveTI;
    public $valorti;
    public $tasacuota;
    public function ajaxGuardarTI()
    {
        $datos = array(
            'conceptoTI' => $this->conceptoTI,
            'claveTI' => $this->claveTI,
            'valorti' => $this->valorti,
            'tasacuota' => $this->tasacuota
        );
        // echo json_encode($datos);
        // return;
        $response = ControladorTI::ctrGuardarTI($datos);
        echo $response;
    }
    /**=================================================================
     * MOSTRAR DATOS PARA EDICIÓN
     ===================================================================*/
    public $idtiE;
    public function ajaxMostrarEdit()
    {
        $item = "id";
        $value = $this->idtiE;
        $reponse = ControladorTI::ctrMostrarEditTI($item, $value);
        echo json_encode($reponse);
    }
    /**=================================================================
     * EDITAR DATOS
     ===================================================================*/
    public $idTimpE;
    public $conceptoTIE;
    public $valortiE;
    public $tasacuotaE;
    public function ajaxEditarTI()
    {
        $datos = array(
            'idTimpE' => $this->idTimpE,
            'conceptoTIE' => $this->conceptoTIE,
            'valortiE' => $this->valortiE,
            'tasacuotaE' => $this->tasacuotaE
        );
        // echo json_encode($datos);
        // return;
        $response = ControladorTI::ctrEditarTI($datos);
        echo $response;
    }
    /**=================================================================
     * ELIMINAR DATOS
     ===================================================================*/
    public $iDTIDelete;
    public function ajaxEliminarTI()
    {
        $datos = array(
            'iDTIDelete' => $this->iDTIDelete
        );
        // echo json_encode($datos);
        // return;
        $response = ControladorTI::ctrEliminarTI($datos);
        echo $response;
    }
}
/**=================================================================
 * ACTIVAR STATUS
 ===================================================================*/
if (isset($_POST["activeidTI"])) {
    // echo json_encode($_POST["activeidTI"]);
    $statusTI = new AjaxTasaImpuesto();
    $statusTI->activeidTI = $_POST["activeidTI"];
    $statusTI->activeEti = $_POST["activeEti"];
    $statusTI->ajaxActivarTI();
}
/**=================================================================
 * TRAER ÚLTIMO ID PARA CÓDIGO
 ===================================================================*/
if (isset($_POST["traerCodeTI"])) {
    // echo json_encode($_POST["traerCodeTI"]);
    $traerCodeTI = new AjaxTasaImpuesto();
    $traerCodeTI->traerCodeTI = $_POST["traerCodeTI"];
    $traerCodeTI->ajaxCodeTI();
}
/**=================================================================
 * GUARDAR DATOS
 ===================================================================*/
if (isset($_POST["conceptoTI"])) {
    // echo json_encode($_POST["conceptoTI"]);
    $datosTI = new AjaxTasaImpuesto();
    $datosTI->conceptoTI = $_POST["conceptoTI"];
    $datosTI->claveTI = $_POST["claveTI"];
    $datosTI->valorti = $_POST["valorti"];
    $datosTI->tasacuota = $_POST["tasacuota"];
    $datosTI->ajaxGuardarTI();
}
/**=================================================================
 * MOSTRA DATOS PARA EDICIÓN
 ===================================================================*/
if (isset($_POST["idtiE"])) {
    $mostE = new AjaxTasaImpuesto();
    $mostE->idtiE = $_POST["idtiE"];
    $mostE->ajaxMostrarEdit();
}
/**=================================================================
 * GUARDAR DATOS
 ===================================================================*/
if (isset($_POST["idTimpE"])) {
    // echo json_encode($_POST["idTimpE"]);
    $datosTIE = new AjaxTasaImpuesto();
    $datosTIE->idTimpE = $_POST["idTimpE"];
    $datosTIE->conceptoTIE = $_POST["conceptoTIE"];
    $datosTIE->valortiE = $_POST["valortiE"];
    $datosTIE->tasacuotaE = $_POST["tasacuotaE"];
    $datosTIE->ajaxEditarTI();
}
/**=================================================================
 * ELIMNAR DATOS
 ===================================================================*/
if (isset($_POST["iDTIDelete"])) {
    $delete = new AjaxTasaImpuesto();
    $delete->iDTIDelete = $_POST["iDTIDelete"];
    $delete->ajaxEliminarTI();
}