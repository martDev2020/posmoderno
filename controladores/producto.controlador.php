<?php
class ControladorProd
{
    /**=================================================================
     * MOSTRAR PRODUCTO
     ===================================================================*/
    static public function ctrMostrarProd($item, $value)
    {
        $tabla = "productos";
        $response = ModeloProd::mdlMostrarProd($tabla, $item, $value);
        return $response;
    }
}