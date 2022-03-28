<?php
require_once "../controladores/unidadVenta.controlador.php";
require_once "../modelos/uniVenta.modelo.php";

class UniVentAjax
{
    /**=================================================================
     * NO REPETIR UNIDAD
     ===================================================================*/
    public $nameUVent;
    public function ajaxValidarUVent()
    {
        $item = "nombre_univent";
        $value = $this->nameUVent;
        echo json_encode($value);
        return;
        $response = ControladorUV::ctrMostrarUV($item, $value);
        echo json_encode($response);
    }
    /**=================================================================
     * NO REPETIR UNIDAD EDICIÓN
     ===================================================================*/
    public $nameUVentE;
    public function ajaxValidarUVentE()
    {
        $item = "nombre_univent";
        $value = $this->nameUVentE;
        $response = ControladorUV::ctrMostrarUV($item, $value);
        echo json_encode($response);
    }
    /**=================================================================
     * DATOS PARA ACTIVAR EL SATATUS
     ===================================================================*/
    public $activeSUVENT;
    public $activeIdUVENT;
    public function ajaxActivarUVENT()
    {
        $tabla = "unidad_venta";
        $item1 = "activo";
        $value1 = $this->activeSUVENT;
        $item2 = "id";
        $value2 = $this->activeIdUVENT;
        $response = ModeloUV::mdlActualizarStatusUV($tabla, $item1, $value1, $item2,  $value2);
        echo $response;
    }
    /**=================================================================
     * GUARDAR DATOS
     ===================================================================*/
    public $nombreUniV;
    public function ajaxGuardarUVENT()
    {
        $datos = array(
            'nombreUniV' => $this->nombreUniV
        );
        $response = ControladorUV::ctrGuardarDatosUV($datos);
        echo $response;
    }
    /**=================================================================
     * TRAER DATOS PARA EDICIÓN
     ===================================================================*/
    public $idUVentEdit;
    public function ajaxEditarUniID()
    {
        $item = "id";
        $value = $this->idUVentEdit;
        // echo json_encode($value);
        // return;
        $response = ControladorUV::ctrMostrarUVE($item, $value);
        echo json_encode($response);
    }
    /**=================================================================
     * EDICIÓN DE DATOS
     ===================================================================*/
    public $idUVentaE;
    public $nombreUniE;
    public function ajaxGuardarEdit()
    {
        $datos = array(
            'idUVentaE' => $this->idUVentaE,
            'nombreUniVE' => $this->nombreUniVE
        );
        // echo json_encode($datos);
        // return;
        $response = ControladorUV::ctrGuardarEditUV($datos);
        echo $response;
    }
    /**=================================================================
     * ELIMINAR DATOS
     ===================================================================*/
    public $idUVenEdelete;
    public function ajaxDeleteUV()
    {
        $datos = array(
            'idUVenEdelete' => $this->idUVenEdelete
        );
        $response = ControladorUV::ctrDeleteUV($datos);
        echo $response;
    }
}
/**=================================================================
 * VALIDAR NO REPETIR NOMBRE DE UNIDAD
 ===================================================================*/
if (isset($_POST["nameUVent"])) {
    $validNP = new UniVentAjax();
    $validNP->nameUVent = $_POST["nameUVent"];
    $validNP->ajaxValidarUVent();
    // echo json_encode($_POST["nameUVent"]);
}
/**=================================================================
 * VALIDAR NO REPETIR NOMBRE DE UNIDAD EDICIÓN
 ===================================================================*/
if (isset($_POST["nameUVentE"])) {
    $validNPE = new UniVentAjax();
    $validNPE->nameUVentE = $_POST["nameUVentE"];
    $validNPE->ajaxValidarUVentE();
    // echo json_encode($_POST["nameUVent"]);
}
/**=================================================================
 * DATOS PARA CAMBIAR EL STATUS DE UNIDAD COMPRA
 ===================================================================*/
if (isset($_POST["activeSUVENT"])) {
    // echo json_encode("Id :" . $_POST["activeIdUVENT"]);
    // echo json_encode("Status :" . $_POST["activeSUVENT"]);
    $statusUVENT = new UniVentAjax();
    $statusUVENT->activeSUVENT = $_POST["activeSUVENT"];
    $statusUVENT->activeIdUVENT = $_POST["activeIdUVENT"];
    $statusUVENT->ajaxActivarUVENT();
}
/**=================================================================
 * GUARDAR DATOS
 ===================================================================*/
if (isset($_POST["nombreUniV"])) {
    $guarUvent = new UniVentAjax();
    $guarUvent->nombreUniV = $_POST["nombreUniV"];
    $guarUvent->ajaxGuardarUVENT();
}
/**=================================================================
 * TRAER DATOS PARA EDICIÓN
 ===================================================================*/
if (isset($_POST["idUVentEdit"])) {
    $editM = new UniVentAjax();
    $editM->idUVentEdit = $_POST["idUVentEdit"];
    $editM->ajaxEditarUniID();
}
/**=================================================================
 * DATOS PARA EDICIÓN
 ===================================================================*/
if (isset($_POST["idUVentaE"])) {
    // echo json_encode("Id :" . $_POST["idUVentaE"]);
    $edit = new UniVentAjax();
    $edit->idUVentaE = $_POST["idUVentaE"];
    $edit->nombreUniVE = $_POST["nombreUniVE"];
    $edit->ajaxGuardarEdit();
}
/**=================================================================
 * ELIMINAR DATOS
 ===================================================================*/
if (isset($_POST["idUComEdelete"])) {
    $delete = new UniVentAjax();
    $delete->idUComEdelete = $_POST["idUComEdelete"];
    $delete->ajaxDeleteUC();
}
/**=================================================================
 * ELIMINAR DATOS
 ===================================================================*/
if (isset($_POST["idUVenEdelete"])) {
    $delete = new UniVentAjax();
    $delete->idUVenEdelete = $_POST["idUVenEdelete"];
    $delete->ajaxDeleteUV();
}