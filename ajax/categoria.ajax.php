<?php
require_once "../controladores/categoria.controlador.php";
require_once "../modelos/categoria.modelo.php";

class CategoriaAjax
{
    /**=================================================================
     * VALIDAR NO REPETIR NOMBRE
     ===================================================================*/
    public $nameCli;
    public function ajaxValidarNombre()
    {
        $item = "nombre_cat";
        $value = $this->nameCli;
        // echo json_encode($value);
        // return;
        $response = ControladorCategoria::ctrMostrarCategoria($item, $value);
        echo json_encode($response);
    }
}
/**=================================================================
 * VALIDAR NO REPETIR NOMBRE
 ===================================================================*/
if (isset($_POST["nameCli"])) {
    $valNombre = new CategoriaAjax();
    $valNombre->nameCli = $_POST["nameCli"];
    $valNombre->ajaxValidarNombre();
    // echo json_encode($_POST["nameCli"]);
}