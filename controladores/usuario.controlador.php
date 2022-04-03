<?php
class ControladorUser
{
    /**=================================================================
     * MOSTRAR DATOS
     ===================================================================*/
    static public function ctrMostrarUser($item, $value)
    {
        $tabla = "usuarios";
        $response = ModeloUser::mdlMostrarUser($tabla, $item, $value);
        return $response;
    }
}