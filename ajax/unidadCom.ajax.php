<?php
require_once "../controladores/unidadCompra.controlador.php";
require_once "../modelos/uniCompra.modelo.php";

class UniComAjax
{
    /**=================================================================
     * NO REPETIR UNIDAD
     ===================================================================*/
    public $nameUCom;
    public function ajaxValidarUCom()
    {
        $item = "nombre_unCompra";
        $value = $this->nameUCom;
        $response = ControladorUC::ctrMostrarUC($item, $value);
        echo json_encode($response);
    }
    /**=================================================================
     * DATOS PARA ACTIVAR EL SATATUS
     ===================================================================*/
    public $activeSUCom;
    public $activeIdUCom;
    public function ajaxActivarUCom()
    {
        $tabla = "unidad_compra";
        $item1 = "activo";
        $value1 = $this->activeSUCom;
        $item2 = "id";
        $value2 = $this->activeIdUCom;
        $response = ModeloUC::mdlActualizarStatusUCom($tabla, $item1, $value1, $item2,  $value2);
        echo $response;
    }
    /**=================================================================
     * GUARDAR DATOS
     ===================================================================*/
    public $nombreUni;
    public function ajaxGuardarUCom()
    {
        $datos = array(
            'nombreUni' => $this->nombreUni
        );
        $response = ControladorUC::ctrGuardarDatos($datos);
        echo $response;
    }
    /**=================================================================
     * TRAER DATOS PARA EDICIÓN
     ===================================================================*/
    public $idUComEdit;
    public function ajaxEditarUniID()
    {
        $item = "id";
        $value = $this->idUComEdit;
        // echo json_encode($value);
        // return;
        $response = ControladorUC::ctrMostrarUCE($item, $value);
        echo json_encode($response);
    }
    /**=================================================================
     * EDICIÓN DE DATOS
     ===================================================================*/
    public $idUCompraE;
    public $nombreUniE;
    public function ajaxGuardarEdit()
    {
        $datos = array(
            'idUCompraE' => $this->idUCompraE,
            'nombreUniE' => $this->nombreUniE
        );
        // echo json_encode($datos);
        // return;
        $response = ControladorUC::ctrGuardarEdit($datos);
        echo $response;
    }
    /**=================================================================
     * ELIMINAR DATOS
     ===================================================================*/
    public $idUComEdelete;
    public function ajaxDeleteUC()
    {
        $datos = array(
            'idUComEdelete' => $this->idUComEdelete
        );
        $response = ControladorUC::ctrDeleteUC($datos);
        echo $response;
    }
}
/**=================================================================
 * VALIDAR NO REPETIR NOMBRE DE UNIDAD
 ===================================================================*/
if (isset($_POST["nameUCom"])) {
    $validNP = new UniComAjax();
    $validNP->nameUCom = $_POST["nameUCom"];
    $validNP->ajaxValidarUCom();
    // echo json_encode($_POST["nameUCom"]);
}
/**=================================================================
 * DATOS PARA CAMBIAR EL STATUS DE UNIDAD COMPRA
 ===================================================================*/
if (isset($_POST["activeSUCom"])) {
    // echo json_encode("Id :" . $_POST["activeIdUCom"]);
    // echo json_encode("Status :" . $_POST["activeSUCom"]);
    $statusUCom = new UniComAjax();
    $statusUCom->activeSUCom = $_POST["activeSUCom"];
    $statusUCom->activeIdUCom = $_POST["activeIdUCom"];
    $statusUCom->ajaxActivarUCom();
}
/**=================================================================
 * GUARDAR DATOS
 ===================================================================*/
if (isset($_POST["nombreUni"])) {
    $guarUCom = new UniComAjax();
    $guarUCom->nombreUni = $_POST["nombreUni"];
    $guarUCom->ajaxGuardarUCom();
}
/**=================================================================
 * TRAER DATOS PARA EDICIÓN
 ===================================================================*/
if (isset($_POST["idUComEdit"])) {
    $editM = new UniComAjax();
    $editM->idUComEdit = $_POST["idUComEdit"];
    $editM->ajaxEditarUniID();
}
/**=================================================================
 * DATOS PARA EDICIÓN
 ===================================================================*/
if (isset($_POST["idUCompraE"])) {
    // echo json_encode("Id :" . $_POST["idUCompraE"]);
    $edit = new UniComAjax();
    $edit->idUCompraE = $_POST["idUCompraE"];
    $edit->nombreUniE = $_POST["nombreUniE"];
    $edit->ajaxGuardarEdit();
}
/**=================================================================
 * ELIMINAR DATOS
 ===================================================================*/
if (isset($_POST["idUComEdelete"])) {
    $delete = new UniComAjax();
    $delete->idUComEdelete = $_POST["idUComEdelete"];
    $delete->ajaxDeleteUC();
}