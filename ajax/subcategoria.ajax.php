<?php
require_once "../controladores/subcategoria.controlador.php";
require_once "../modelos/subcategoria.modelo.php";

class AjaxSubcategorias
{
    /**=================================================================
     * NO REPETIR SUBCATEGORÍA
     ===================================================================*/
    public $subcate;
    public function ajaxValidarRepetirSub()
    {
        $item = "nombre_subcat";
        $value = $this->subcate;
        // echo json_encode($value);
        // return;
        $response = ControladorSubCategoria::ctrMostrarSubCategoria($item, $value);
        echo json_encode($response);
    }
    /**=================================================================
     * ACTIVAR Y DESACTIVAR STATUS
    ===================================================================*/
    public $activeIdSub;
    public $activeSsub;
    public function ajaxStatusSub()
    {
        $tabla = "subcategoria";
        $item1 = "id";
        $value1 = $this->activeIdSub;
        $item2 = "activo";
        $value2 = $this->activeSsub;
        $response = ModeloSubcatgoria::mdlMostrarStasub($tabla, $item1, $value1, $item2, $value2);
        echo $response;
    }
    /**=================================================================
     * ENVIAR DATOS PARA GUARDAR
     ===================================================================*/
    public $selectcat;
    public $nombresubcat;
    public $descripsubcat;
    public $fotosubCat;
    public function ajaxGurdarSubCat()
    {
        $datos = array(
            'selectcat' => $this->selectcat,
            'nombresubcat' => $this->nombresubcat,
            'descripsubcat' => $this->descripsubcat,
            'fotosubCat' => $this->fotosubCat
        );
        // echo json_encode($datos);
        // return;
        $response = ControladorSubCategoria::ctrGuardarSubcat($datos);
        echo $response;
    }
    /**=================================================================
     * ID PARA MOSTRAR DATOS Y EDITAR
     ===================================================================*/
    public $idsubCategoriaE;
    public function ajaxTrerEdit()
    {
        $item = "id";
        $value = $this->idsubCategoriaE;
        $response = ControladorSubCategoria::ctrMostrarEditSub($item, $value);
        echo json_encode($response);
    }
    /**=================================================================
     * GUARDAR EDICIÓN
     ===================================================================*/
    public $idSucatE;
    public $selectcatE;
    public $nombresubcatE;
    public $descripsubcatE;
    public $fotosubCatE;
    public $antiguaFotosubCatE;
    public function ajaxGurdarSubCatE()
    {
        $datos = array(
            'idSucatE' => $this->idSucatE,
            'selectcatE' => $this->selectcatE,
            'nombresubcatE' => $this->nombresubcatE,
            'descripsubcatE' => $this->descripsubcatE,
            'fotosubCatE' => $this->fotosubCatE,
            'antiguaFotosubCatE' => $this->antiguaFotosubCatE
        );
        // echo json_encode($datos);
        // return;
        $response = ControladorSubCategoria::ctrEdidiconSubC($datos);
        echo $response;
    }
    /**=================================================================
     * ELIMINARA DATOS
     ===================================================================*/
    public $ideliminarsubCat;
    public $fotosubCatD;
    public function ajaxDeletesubCat()
    {
        $datos = array(
            'ideliminarsubCat' => $this->ideliminarsubCat,
            'fotosubCatD' => $this->fotosubCatD
        );
        // echo json_encode($datos);
        // return;
        $response = ControladorSubCategoria::ctrEliminarsubCat($datos);
        echo $response;
    }
}
/**=================================================================
 * VALIDAR NO REPETIR SUBACTEGORÍA
 ===================================================================*/
if (isset($_POST["subcate"])) {
    // echo json_encode($_POST["subcate"]);
    $validsub = new AjaxSubcategorias();
    $validsub->subcate = $_POST["subcate"];
    $validsub->ajaxValidarRepetirSub();
}
/**=================================================================
 * ACTIVAR Y DESACTIVAR STATUS
 ===================================================================*/
if (isset($_POST["activeIdSub"])) {
    $status = new AjaxSubcategorias();
    $status->activeIdSub = $_POST["activeIdSub"];
    $status->activeSsub = $_POST["activeSsub"];
    $status->ajaxStatusSub();
}
/**=================================================================
 * ENVIAR DATOS PARA GUARDAR
 ===================================================================*/
if (isset($_POST["nombresubcat"])) {
    $sub = new AjaxSubcategorias();
    $sub->selectcat = $_POST["selectcat"];
    $sub->nombresubcat = $_POST["nombresubcat"];
    $sub->descripsubcat = $_POST["descripsubcat"];
    if (isset($_FILES["fotosubCat"])) {
        $sub->fotosubCat = $_FILES["fotosubCat"];
    } else {
        $sub->fotosubCat = null;
    }
    $sub->ajaxGurdarSubCat();

    // echo json_encode($_POST["nombresubcat"]);
}
/**=================================================================
 * TRAER DATOS EDICIÓN
 ===================================================================*/
if (isset($_POST["idsubCategoriaE"])) {
    $trerdatos = new AjaxSubcategorias();
    $trerdatos->idsubCategoriaE = $_POST["idsubCategoriaE"];
    $trerdatos->ajaxTrerEdit();
}
/**=================================================================
 * GUARDAR DATOS EDICIÓN
 ===================================================================*/
if (isset($_POST["idSucatE"])) {
    // echo json_encode($_POST["idSucatE"]);
    $subE = new AjaxSubcategorias();
    $subE->idSucatE = $_POST["idSucatE"];
    $subE->selectcatE = $_POST["selectcatE"];
    $subE->nombresubcatE = $_POST["nombresubcatE"];
    $subE->descripsubcatE = $_POST["descripsubcatE"];
    if (isset($_FILES["fotosubCatE"])) {
        $subE->fotosubCatE = $_FILES["fotosubCatE"];
    } else {
        $subE->fotosubCatE = null;
    }
    $subE->antiguaFotosubCatE = $_POST["antiguaFotosubCatE"];
    $subE->ajaxGurdarSubCatE();
}
/**=================================================================
 * ELIMINAR DATOS
 ===================================================================*/
if (isset($_POST["ideliminarsubCat"])) {
    $deletesubCat = new AjaxSubcategorias();
    $deletesubCat->ideliminarsubCat = $_POST["ideliminarsubCat"];
    $deletesubCat->fotosubCatD = $_POST["fotosubCatD"];
    $deletesubCat->ajaxDeletesubCat();
    // echo json_encode($_POST["ideliminarCat"]);
}