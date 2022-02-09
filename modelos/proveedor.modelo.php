<?php
require_once "conexion.php";
class ModeloProveedor
{
    /**=================================================================
     * MOSTRAR PROVEEDOR
     ===================================================================*/
    static public function mdlMostrarProveedor($tabla, $item, $value)
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
        $stmt->close();
        $stmt = null;
    }
    /**=================================================================
     * MOSTRAR PROVEEDOR EDICIÓN
     ===================================================================*/
    static public function mdlMostrarProveedorE($tabla, $item, $value)
    {
        // echo json_encode($value);
        // return;
        if ($item != null) {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
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
     * ACTIVAR STATUS DE PROVEEDOR
     ===================================================================*/
    static public function mdlActualizarStatusP($tabla, $item1, $valor1, $item2, $valor2)
    {
        // echo json_encode($item2);
        // return;
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");

        $stmt->bindParam(":" . $item1, $valor1, PDO::PARAM_STR);
        $stmt->bindParam(":" . $item2, $valor2, PDO::PARAM_STR);

        if ($stmt->execute()) {
            return json_encode("ok");
        } else {
            return json_encode("error");
        }

        $stmt->close();
        $stmt = null;
    }
    /**=================================================================
     * MOSTRAR DATOS PARA EDITAR PROVEEDOR
    ===================================================================*/
    static public function mdlTraerProvEdit($tabla, $valor)
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id = :id ORDER BY id DESC");
        $stmt->bindParam(":id", $valor, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();

        $stmt->close();
        $stmt = null;
    }
    /**=================================================================
     * GUARDAR DATOS PROVEEDORES
     ===================================================================*/
    static public function mldCrearProveedor($tabla, $datosProveedor)
    {
        // ob_end_clean();
        // echo json_encode($datosProveedor);
        // return;
        $stmt = Conexion::conectar()->prepare(
            "INSERT INTO $tabla
            (nombre_prov,
            descripcion_prov,
            direccion_prov,
            telefono_prov,
            email_prov,
            activo)
            VALUES
            (:nombre_prov,
            :descripcion_prov,
            :direccion_prov,
            :telefono_prov,
            :email_prov,
            :activo)"
        );
        $stmt->bindParam(":nombre_prov", $datosProveedor["nombreprov"], PDO::PARAM_STR);
        $stmt->bindParam(":descripcion_prov", $datosProveedor["descripprov"], PDO::PARAM_STR);
        $stmt->bindParam(":direccion_prov", $datosProveedor["dirprov"], PDO::PARAM_STR);
        $stmt->bindParam(":telefono_prov", $datosProveedor["telprov"], PDO::PARAM_STR);
        $stmt->bindParam(":email_prov", $datosProveedor["emailprov"], PDO::PARAM_STR);
        $stmt->bindParam(":activo", $datosProveedor["activo"], PDO::PARAM_INT);
        if ($stmt->execute()) {
            return json_encode("ok");
        } else {
            return json_encode("error");
        }
        $stmt->close();
        $stmt = null;
    }
    /**=================================================================
     * EDICIÓN DE DATOS
     ===================================================================*/
    static public function mldEditarProveedor($tabla, $datosProveedor)
    {
        // ob_end_clean();
        // echo json_encode($datosProveedor);
        // return;
        $stmt = Conexion::conectar()->prepare(
            "UPDATE $tabla SET
            nombre_prov = :nombre_prov,
            descripcion_prov = :descripcion_prov,
            direccion_prov = :direccion_prov,
            telefono_prov = :telefono_prov,
            email_prov = :email_prov
            WHERE id = :id"
        );
        $stmt->bindParam(":nombre_prov", $datosProveedor["nombreprovE"], PDO::PARAM_STR);
        $stmt->bindParam(":descripcion_prov", $datosProveedor["descripprovE"], PDO::PARAM_STR);
        $stmt->bindParam(":direccion_prov", $datosProveedor["dirprovE"], PDO::PARAM_STR);
        $stmt->bindParam(":telefono_prov", $datosProveedor["telprovE"], PDO::PARAM_STR);
        $stmt->bindParam(":email_prov", $datosProveedor["emailprovE"], PDO::PARAM_STR);
        $stmt->bindParam(":id", $datosProveedor["idProv"], PDO::PARAM_INT);
        if ($stmt->execute()) {
            return json_encode("ok");
        } else {
            return json_encode("error");
        }
        $stmt->close();
        $stmt = null;
    }
    /**=================================================================
     * ELIMNAR PROVEEDOR
     ===================================================================*/
    static public function mdlEliminarP($tabla, $valor)
    {
        // echo json_encode($valor);
        // return;
        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
        $stmt->bindParam(":id", $valor, PDO::PARAM_INT);
        if ($stmt->execute()) {
            return json_encode("ok");
        } else {
            return json_encode("error");
        }
        $stmt->close();
        $stmt = null;
    }
}