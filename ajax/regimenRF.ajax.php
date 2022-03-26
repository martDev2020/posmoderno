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
    /**=================================================================
     * MOSTRAR DATOS PARA EDICIÓN
     ===================================================================*/
    public $idURFe;
    public function ajaxMostrarEdit()
    {
        $item = "id";
        $value = $this->idURFe;
        $reponse = ControladorRF::ctrMostrarEdit($item, $value);
        echo json_encode($reponse);
    }
    /**=================================================================
     * GUARDAR DATOS PARA MODIFICAR
     ===================================================================*/
    public $idRFedit;
    public $claRFE;
    public $descripRFE;
    public $nomRFE;
    public function ajaxEditarRF()
    {
        $datos = array(
            'idRFedit' => $this->idRFedit,
            'claRFE' => $this->claRFE,
            'descripRFE' => $this->descripRFE,
            'nomRFE' => $this->nomRFE
        );
        // echo json_encode($datos);
        // return;
        $response = ControladorRF::ctrEditarRF($datos);
        echo $response;
    }
    /**=================================================================
     * ELIMINAR DATOS
     ===================================================================*/
    public $idRFeliminar;
    public function ajaxEliminarRF()
    {
        $datos = array(
            'idRFeliminar' => $this->idRFeliminar
        );
        // echo json_encode($datos);
        // return;
        $response = ControladorRF::ctrEliminarRF($datos);
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
/**=================================================================
 * MOSTRA DATOS PARA EDICIÓN
 ===================================================================*/
if (isset($_POST["idURFe"])) {
    $mostE = new AjaxRegimenF();
    $mostE->idURFe = $_POST["idURFe"];
    $mostE->ajaxMostrarEdit();
}
/**=================================================================
 * GUARDAR DATOS PARA EDICIÓN
 ===================================================================*/
if (isset($_POST["idRFedit"])) {
    // echo json_encode($_POST["idRFedit"]);
    $edit = new AjaxRegimenF();
    $edit->idRFedit = $_POST["idRFedit"];
    $edit->claRFE = $_POST["claRFE"];
    $edit->descripRFE = $_POST["descripRFE"];
    $edit->nomRFE = $_POST["nomRFE"];
    $edit->ajaxEditarRF();
}
/**=================================================================
 * ELIMNAR DATOS
 ===================================================================*/
if (isset($_POST["idRFdelete"])) {
    $delete = new AjaxRegimenF();
    $delete->idRFdelete = $_POST["idRFdelete"];
    $delete->ajaxEliminarRF();
}