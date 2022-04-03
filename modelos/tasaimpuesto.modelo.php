<?php
require_once "conexion.php";
class ModeloTI
{
    /**=================================================================
     * MOSTRAR DATOS
     ===================================================================*/
    static public function mdlMostrarTi($tabla, $item, $value)
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
     * MOSTRAR STATUS
     ===================================================================*/
    static public function mdlMostrarSTI($tabla, $item1, $value1, $item2, $value2)
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
     * TRAER ULTIMO ID PARA CÓDIGO
     ===================================================================*/
    static public function mdlTraerUltimoIdTI($tabla, $item)
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY $item DESC LIMIT 1");
        if ($stmt->execute()) {
            return $stmt->fetch();
        }
        $stmt->close();
        $stmt = null;
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
        $stmt->close();
        $stmt = null;
    }
    /**=================================================================
     * GUARADAR DATOS
     ===================================================================*/
    static public function mdlGurardarTI($tabla, $datos)
    {
        // ob_end_clean();
        // echo json_encode($datos);
        // return;
        $stmt = Conexion::conectar()->prepare(
            "INSERT INTO $tabla (
            concepto,
            clave_tasaImp,
            valor,
            tasaCuota,
            activo,
            id_usuario)
            VALUES
            (:concepto,
            :clave_tasaImp,
            :valor,
            :tasaCuota,
            :activo,
            :id_usuario)"
        );
        $stmt->bindParam(":concepto", $datos["conceptoTI"], PDO::PARAM_STR);
        $stmt->bindParam(":clave_tasaImp", $datos["claveTI"], PDO::PARAM_STR);
        $stmt->bindParam(":valor", $datos["valorti"], PDO::PARAM_STR);
        $stmt->bindParam(":tasaCuota", $datos["tasacuota"], PDO::PARAM_STR);
        $stmt->bindParam(":activo", $datos["activo"], PDO::PARAM_STR);
        $stmt->bindParam(":id_usuario", $datos["id_usuario"], PDO::PARAM_INT);
        if ($stmt->execute()) {
            return json_encode("ok");
        } else {
            return json_encode("error");
        }
        $stmt->close();
        $stmt = null;
    }
    /**=================================================================
     * EDITAR DATOS
     ===================================================================*/
    static public function mdlEditarTI($tabla, $datos)
    {
        // ob_end_clean();
        // echo json_encode($datos);
        // return;
        $stmt = Conexion::conectar()->prepare(
            "UPDATE $tabla SET
            concepto = :concepto,
            valor = :valor,
            tasaCuota = :tasaCuota
            WHERE id = :id"
        );
        $stmt->bindParam(":concepto", $datos["conceptoTIE"], PDO::PARAM_STR);
        $stmt->bindParam(":valor", $datos["valortiE"], PDO::PARAM_STR);
        $stmt->bindParam(":tasaCuota", $datos["tasacuotaE"], PDO::PARAM_STR);
        $stmt->bindParam(":id", $datos["idTimpE"], PDO::PARAM_INT);
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
    static public function mdlEliminarTI($tabla, $datosDelete)
    {
        // ob_end_clean();
        // echo json_encode($tabla);
        // return;
        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
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