<?php
class ControladorClientes
{
    /**=================================================================
     * MOSTRAR CLIENTES
     ===================================================================*/
    static public function ctrMostrarClientes($item, $value)
    {
        $tabla = "clientes";
        $response = ModeloClientes::mdlMostrarClientes($tabla, $item, $value);
        return $response;
    }
}