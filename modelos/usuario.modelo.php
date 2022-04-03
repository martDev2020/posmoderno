<?php
require_once "conexion.php";
class ModeloUser
{
    /**=================================================================
     * MOSTRAR DATOS CON ID EDICIÓN
     ===================================================================*/
    static public function mdlMostrarUser($tabla, $item, $value)
    {
        // ob_end_clean();
        // echo json_encode($item);
        // return;
        if ($item != null) {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item=:$item");
            $stmt->bindParam(":" . $item, $value, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetchAll();
        } else {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id DESC");
            $stmt->execute();
            return $stmt->fetchAll();
        }
        $stmt->close();
        $stmt = null;
    }
}