<?php
require_once "conexion.php";
class ModeloUV
{
    /**=================================================================
     * MOSTRAR DATOS DE UNIDAD COMPRA
     ===================================================================*/
    static public function mdlMostrarUV($tabla, $item, $value)
    {
        if ($item != null) {
            $stmt = Conexion::conectar()->prepare("SELECT*FROM $tabla WHERE $item=:$item");
            $stmt->bindParam(":" . $item, $value, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetchAll();
        } else {
            $stmt = Conexion::conectar()->prepare("SELECT*FROM $tabla ORDER BY id DESC");
            $stmt->execute();
            return $stmt->fetchAll();
        }
        // die();
        $stmt->close();
        $stmt = null;
    }
    /**=================================================================
     * ACTIVAR STAUS DESACTIVAR
     ===================================================================*/
    static public function mdlActualizarStatusUV($tabla, $item1, $value1, $item2, $value2)
    {
        // echo json_encode($value1);
        // return;
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");

        $stmt->bindParam(":" . $item1, $value1, PDO::PARAM_STR);
        $stmt->bindParam(":" . $item2, $value2, PDO::PARAM_STR);

        if ($stmt->execute()) {
            return json_encode("ok");
        } else {
            return json_encode("error");
        }

        $stmt->close();
        $stmt = null;
    }
    /**=================================================================
     * MOSTRAR DATOS PARA EDITAR
     ===================================================================*/
    static public function mdlMostrarUVE($tabla, $item, $value)
    {
        // echo json_encode($value);
        // return;
        if ($item != null) {
            $stmt = Conexion::conectar()->prepare("SELECT* FROM $tabla WHERE $item = :$item");
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
    /**=================================================================
     * GUARDAR DATOS
     ===================================================================*/
    static public function mdlGuardarUV($tabla, $datos)
    {
        $stmt = Conexion::conectar()->prepare(
            "INSERT INTO $tabla 
             (nombre_univent,
             activo)
            VALUES
            (:nombre_univent,
            :activo)"
        );
        $stmt->bindParam(":nombre_univent", $datos["nombreUniV"], PDO::PARAM_STR);
        $stmt->bindParam(":activo", $datos["activo"], PDO::PARAM_INT);
        if ($stmt->execute()) {
            return json_encode("ok");
        } else {
            return json_encode("error");
        }
        $stmt->close();
        $stmt = null;
    }
    /**=================================================================
     * GUARDAR DATOS EDICIÓN
     ===================================================================*/
    static public function mdlGuardarUVE($tabla, $datos)
    {
        $stmt = Conexion::conectar()->prepare(
            "UPDATE $tabla SET
            nombre_univent = :nombre_univent
            WHERE id = :id;"
        );
        $stmt->bindParam(":nombre_univent", $datos["nombreUniVE"], PDO::PARAM_STR);
        $stmt->bindParam(":id", $datos["idUVentaE"], PDO::PARAM_INT);
        if ($stmt->execute()) {
            return json_encode("ok");
        } else {
            return json_encode("error");
        }
        $stmt->close();
        $stmt = null;
    }
    /**=================================================================
     * ELIMINARA DATOS
     ===================================================================*/
    static public function mdlDeleteUV($tabla, $datosDelete)
    {
        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id=:id");
        $stmt->bindParam(":id", $datosDelete, PDO::PARAM_INT);
        if ($stmt->execute()) {
            return json_encode("ok");
        } else {
            return json_encode("error");
        }
        $stmt->close();
        $stmt = null;
    }
}