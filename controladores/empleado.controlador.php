<?php
class ControladorEmpl
{
    /**=================================================================
     * MOSTRAR DATOS ID EDICIÓN
     ===================================================================*/
    static public function ctrMostrarEmplE($item, $value)
    {
        $tabla = "empleados";
        $response = ModeloEmpl::mdlMostrareEmplE($tabla, $item, $value);
        return $response;
    }
}