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
    /**=================================================================
     * TRAER ÚLTIMO ID PARA CLAVE
     ===================================================================*/
    static public function ctrTraerUltidPr($item)
    {
        $tabla = "productos";
        $response = ModeloProd::mdlTraerUltimoIdPr($tabla, $item);
        return $response;
    }
}