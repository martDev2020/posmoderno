<?php
require_once "conexion.php";
class ModeloRF
{
    /**=================================================================
     * MOSTRAR DATOS
     ===================================================================*/
    static public function mdlMostrarRF($tabla, $item, $value)
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
    }
    /**=================================================================
     * MOSTRAR DATOS PARA EDICIÓN
     ===================================================================*/
    static public function mdlMostrarEdit($tabla, $item, $value)
    {
        if ($item != null) {
            $stmt = Conexion::conectar()->prepare("SELECT*FROM $tabla WHERE $item=:$item");
            $stmt->bindParam(":" . $item, $value, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch();
        } else {
            $stmt = Conexion::conectar()->prepare("SELECT*FROM $tabla ORDER BY id DESC");
            $stmt->execute();
            return $stmt->fetchAll();
        }
    }
    /**=================================================================
     * ACTIVAR STAUS DESACTIVAR
     ===================================================================*/
    static public function mdlMostrarSRF($tabla, $item1, $value1, $item2, $value2)
    {
        // echo json_encode($value1);
        // return;
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item2 = :$item2 WHERE $item1 = :$item1");

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
    static public function mdlGurardarRF($tabla, $datos)
    {
        $stmt = Conexion::conectar()->prepare(
            "INSERT INTO $tabla (
            claveRegimenFiscal,
            descrip_regFis,
            nombre_regFis,
            activo)
            VALUES
            (:claveRegimenFiscal,
            :descrip_regFis,
            :nombre_regFis,
            :activo)"
        );
        $stmt->bindParam(":claveRegimenFiscal", $datos["claRF"], PDO::PARAM_STR);
        $stmt->bindParam(":descrip_regFis", $datos["descripRF"], PDO::PARAM_STR);
        $stmt->bindParam(":nombre_regFis", $datos["nomRF"], PDO::PARAM_STR);
        $stmt->bindParam(":activo", $datos["activo"], PDO::PARAM_STR);
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
    static function mdlEditarRF($tabla, $datos)
    {
        $stmt = Conexion::conectar()->prepare(
            "UPDATE $tabla SET
            claveRegimenFiscal = :claveRegimenFiscal,
            descrip_regFis = :descrip_regFis,
            nombre_regFis = :nombre_regFis
            WHERE id = :id"
        );
        $stmt->bindParam(":claveRegimenFiscal", $datos["claRFE"], PDO::PARAM_STR);
        $stmt->bindParam(":descrip_regFis", $datos["descripRFE"], PDO::PARAM_STR);
        $stmt->bindParam(":nombre_regFis", $datos["nomRFE"], PDO::PARAM_STR);
        $stmt->bindParam(":id", $datos["idRFedit"], PDO::PARAM_INT);
        if ($stmt->execute()) {
            return json_encode("ok");
        } else {
            return json_encode("error");
        }
        $stmt->close();
        $stmt = null;
    }
    /**=================================================================
     * ELIMINAR DATOS
     ===================================================================*/
    static public function mdlEliminarRF($tabla, $datos)
    {
        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
        $stmt->bindParam(":id", $datos, PDO::PARAM_INT);
        if ($stmt->execute()) {
            return json_encode("ok");
        } else {
            return json_encode("error");
        }
        $stmt->close();
        $stmt = null;
    }
}