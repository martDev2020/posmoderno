<?php
require_once "../controladores/regimenf.controlador.php";
require_once "../modelos/regimenF.modelo.php";

class AjaxRegimenF
{
    /**=================================================================
     * VVALIDAR NO REPETIR CLAVE
     ===================================================================*/
    public $clave;
    public function ajaxValidarExisClave()
    {
        $item = "claveRegimenFiscal";
        $value = $this->clave;
        // echo json_encode($value);
        // return;
        $response = ControladorRF::ctrMostrarRF($item, $value);
        echo json_encode($response);
    }
    /**=================================================================
     * ACTIVAR STATUS Y DESACTIVAR
     ===================================================================*/
    public $activeidRF;
    public $activeErf;
    public function ajaxActivarRF()
    {
        $tabla = "regimenfiscal";
        $item1 = "id";
        $value1 = $this->activeidRF;
        $item2 = "activo";
        $value2 = $this->activeErf;
        $reponse = ModeloRF::mdlMostrarSRF($tabla, $item1, $value1, $item2, $value2);
        echo $reponse;
    }
    /**=================================================================
     * GUARDAR DATOS
     ===================================================================*/
    public $claRF;
    public $descripRF;
    public $nomRF;
    public function ajaxGuardarRF()
    {
        $datos = array(
            'claRF' => $this->claRF,
            'descripRF' => $this->descripRF,
            'nomRF' => $this->nomRF
        );
        // echo json_encode($datos);
        // return;
        $response = ControladorRF::ctrGuardarRF($datos);
        echo $response;
    }
}
/**=================================================================
 * NO REPETIR CLAVE DE RÉGIMEN FISCAL
 ===================================================================*/
if (isset($_POST["clave"])) {
    // echo json_encode($_POST["clave"]);
    $valclave = new AjaxRegimenF();
    $valclave->clave = $_POST["clave"];
    $valclave->ajaxValidarExisClave();
}
/**=================================================================
 * DATOS PARA CAMBIAR EL STATUS DE DEAPRTAMENTO
 ===================================================================*/
if (isset($_POST["activeidRF"])) {
    // echo json_encode($_POST["activeidRF"]);
    $statusRF = new AjaxRegimenF();
    $statusRF->activeidRF = $_POST["activeidRF"];
    $statusRF->activeErf = $_POST["activeErf"];
    $statusRF->ajaxActivarRF();
}
/**=================================================================
 * GUARDAR DATOS
 ===================================================================*/
if (isset($_POST["claRF"])) {
    // echo json_encode($_POST["claRF"]);
    $datosRF = new AjaxRegimenF();
    $datosRF->claRF = $_POST["claRF"];
    $datosRF->descripRF = $_POST["descripRF"];
    $datosRF->nomRF = $_POST["nomRF"];
    $datosRF->ajaxGuardarRF();
}