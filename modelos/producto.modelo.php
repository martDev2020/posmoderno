<?php
require_once "conexion.php";
class ModeloProd
{
    /**=================================================================
     * MOSTRAR PRDUCTO
     ===================================================================*/
    static public function mdlMostrarProd($tabla, $item, $value)
    {
        if ($item != null) {
            $stmt = Conexion::conectar()->prepare("SELECT*FROM $tabla WHERE $item = :$item");
            $stmt->bindParam(":" . $item, $value, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetchAll();
        } else {
            $stmt = Conexion::conectar()->prepare("SELECT*FROM $tabla ORDER BY id DESC");
            $stmt->execute();
            return $stmt->fetchAll();
        }
        $stmt->close();
        $stmt = null;
    }
    /**=================================================================
     * TRAER ULTIMO ID PARA CLAVE
     ===================================================================*/
    static public function mdlTraerUltimoIdPr($tabla, $item)
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY $item DESC LIMIT 1");
        if ($stmt->execute()) {
            return $stmt->fetch();
        }
        $stmt->close();
        $stmt = null;
    }
}