<?php
require_once "conexion.php";
class ModeloDep
{
    /**=================================================================
     * MOSTRAR DATOS
     ===================================================================*/
    static public function mdlMostrarDep($tabla, $item, $value)
    {
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
        // exit;
        $stmt->close();
        $stmt = null;
    }
    /**=================================================================
     * MOSTRAR DATOS CON ID PARA EDICIÓN
     ===================================================================*/
    static public function mdlMostrarDepE($tabla, $item, $value)
    {
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
        // exit;
        $stmt->close();
        $stmt = null;
    }
    /**=================================================================
     * ACTIVAR STAUS DESACTIVAR
     ===================================================================*/
    static public function mdlActualizarStatusDep($tabla, $item1, $value1, $item2,  $value2)
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
     * GUARDAR DATOS
     ===================================================================*/
    static public function mdlGurardarDep($tabla, $datos)
    {
        // ob_end_clean();
        // echo json_encode($datos);
        // return;
        $stmt = Conexion::conectar()->prepare(
            "INSERT INTO $tabla
            (nombre_dep,
            activo)
            VALUES
            (:nombre_dep,
            :activo)"
        );
        $stmt->bindParam(":nombre_dep", $datos["nombredep"], PDO::PARAM_STR);
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
     * EDICIÓN
     ===================================================================*/
    static public function mdlEditarDep($tabla, $datos)
    {
        // ob_end_clean();
        // echo json_encode($datos);
        // return;
        $stmt = Conexion::conectar()->prepare(
            "UPDATE $tabla SET
            nombre_dep = :nombre_dep
            WHERE id = :id"
        );
        $stmt->bindParam(":nombre_dep", $datos["nombredepE"], PDO::PARAM_STR);
        $stmt->bindParam(":id", $datos["idDepE"], PDO::PARAM_STR);
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
    static public function mdlEdliminarDep($tabla, $value)
    {
        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id=:id");
        $stmt->bindParam(":id", $value, PDO::PARAM_INT);
        if ($stmt->execute()) {
            return json_encode("ok");
        } else {
            return json_encode("error");
        }
        $stmt->close();
        $stmt = null;
    }
}