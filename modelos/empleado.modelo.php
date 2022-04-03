<?php
require_once "conexion.php";
class ModeloEmpl
{
    /**=================================================================
     * MOSTRAR DATOS ID EDICIÓN
     ===================================================================*/
    static public function mdlMostrareEmplE($tabla, $item, $value)
    {
        // ob_end_clean();
        // echo json_encode($item);
        // return;
        if ($item != null) {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item=:$item");
            $stmt->bindParam(":" . $item, $value, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch();
        } else {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id DESC");
            $stmt->execute();
            return $stmt->fetchAll();
        }
        $stmt->close();
        $stmt = null;
    }
}