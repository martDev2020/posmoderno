<?php
require_once "../controladores/departamento.controlador.php";
require_once "../modelos/departamento.modelo.php";

class AjaxDeparatmento
{
    /**=================================================================
     * VALIDAR NO REPETIR DEPARTAMENTO
     ===================================================================*/
    public $nameD;
    public function ajaxValidarDep()
    {
        $item = "nombre_dep";
        $value = $this->nameD;
        // echo json_encode($value);
        // return;
        $response = ControladorDep::ctrMostrarDep($item, $value);
        echo json_encode($response);
    }
    /**=================================================================
     * DATOS PARA ACTIVAR EL SATATUS DE DEPARTAMENTO
     ===================================================================*/
    public $activeEdep;
    public $activeIdDep;
    public function ajaxActivarDep()
    {
        $tabla = "departamento";
        $item1 = "activo";
        $value1 = $this->activeEdep;
        $item2 = "id";
        $value2 = $this->activeIdDep;
        // echo json_encode($value1);
        // return;
        $response = ModeloDep::mdlActualizarStatusDep($tabla, $item1, $value1, $item2,  $value2);
        echo $response;
    }
    /**=================================================================
     * DATOS PARA GUARDAR 
     ===================================================================*/
    public $nombredep;
    public function ajaxCrearDep()
    {
        $datos = array(
            'nombredep' => $this->nombredep
        );
        $response = ControladorDep::ctrCrearDep($datos);
        echo $response;
    }
    /**=================================================================
     * TRAER ID DEPARTAMENTO PARA EDICIÓN
     ===================================================================*/
    public $idDep;
    public function ajaxTraerDepEdit()
    {
        $item = "id";
        $value = $this->idDep;
        $response = ControladorDep::ctrMostrarDepE($item, $value);
        echo json_encode($response);
    }
    /**=================================================================
     * EDITAR 
     ===================================================================*/
    public function ajaxEditarDep()
    {
        $datos = array(
            'idDepE' => $this->idDepE,
            'nombredepE' => $this->nombredepE
        );
        // echo json_encode($datos);
        // return;
        $response = ControladorDep::ctrDepEdit($datos);
        echo $response;
    }
    /**=================================================================
     * ELIMINARA DATOS
     ===================================================================*/
    public $idDepDelete;
    public function ajaxEliminarDep()
    {
        $tabla = "departamento";
        $value = $this->idDepDelete;
        // echo json_encode($value);
        // return;
        $response = ModeloDep::mdlEdliminarDep($tabla, $value);
        echo $response;
    }
}
/**=================================================================
 * MOSTRAR NO REPETIR DEPARTAMENTO
 ===================================================================*/
if (isset($_POST["nameD"])) {
    $valdep = new AjaxDeparatmento();
    $valdep->nameD = $_POST["nameD"];
    $valdep->ajaxValidarDep();
    // echo json_encode($_POST["nameD"]);
}
/**=================================================================
 * DATOS PARA CAMBIAR EL STATUS DE DEAPRTAMENTO
 ===================================================================*/
if (isset($_POST["activeIdDep"])) {
    // echo json_encode($_POST["activeIdDep"]);
    $statusD = new AjaxDeparatmento();
    $statusD->activeIdDep = $_POST["activeIdDep"];
    $statusD->activeEdep = $_POST["activeEdep"];
    $statusD->ajaxActivarDep();
}
/**=================================================================
 * GUARDAR DATOS
 ===================================================================*/
if (isset($_POST["nombredep"])) {
    $dep = new AjaxDeparatmento();
    $dep->nombredep = $_POST["nombredep"];
    $dep->ajaxCrearDep();
    // echo json_encode($_POST["nombredep"]);
}
/**=================================================================
 * TRAER ID DEPARTAMENTO PARA EDICIÓN
 ===================================================================*/
if (isset($_POST["idDep"])) {
    // echo $_POST["idDep"];
    $ediC = new AjaxDeparatmento();
    $ediC->idDep = $_POST["idDep"];
    $ediC->ajaxTraerDepEdit();
}
/**=================================================================
 * EDITAR DATOS 
 ===================================================================*/
if (isset($_POST["idDepE"])) {
    $editd = new AjaxDeparatmento();
    $editd->idDepE = $_POST["idDepE"];
    $editd->nombredepE = $_POST["nombredepE"];
    $editd->ajaxEditarDep();
    // echo json_encode($_POST["idCliente"]);
}
/**=================================================================
 * ELIMINAR DATOS
 ===================================================================*/
if (isset($_POST["idDepDelete"])) {
    $delete = new AjaxDeparatmento();
    $delete->idDepDelete = $_POST["idDepDelete"];
    $delete->ajaxEliminarDep();
    // echo json_encode($_POST["idDepDelete"]);
}