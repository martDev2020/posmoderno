<?php
class ControladorCategoria
{
    /**=================================================================
     * MOSTRAR CATEGORIA
     ===================================================================*/
    static public function ctrMostrarCategoria($item, $value)
    {
        $tabla = "categoria";
        $response = ModeloCategoria::mdlMostrarCategoria($tabla, $item, $value);
        return $response;
    }
}