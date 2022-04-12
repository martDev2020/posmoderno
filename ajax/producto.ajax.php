<?php
require_once "../controladores/producto.controlador.php";
require_once "../modelos/producto.modelo.php";

class AjaxProducto
{
    /**=================================================================
     * Add custom image sizes
     ===================================================================*/
    public function ajaxCodePr()
    {
        $item = "claveAlterna";
        $response = ControladorProd::ctrTraerUltidPr($item);
        echo json_encode($response);
    }
}
/**=================================================================
 * TRAER ÚLTIMO ID PARA CÓDIGO
 ===================================================================*/
if (isset($_POST["traerCodePr"])) {
    // echo json_encode($_POST["traerCodePr"]);
    $traerCodePr = new AjaxProducto();
    $traerCodePr->traerCodePr = $_POST["traerCodePr"];
    $traerCodePr->ajaxCodePr();
}