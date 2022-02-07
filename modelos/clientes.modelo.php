<?php
require_once "conexion.php";
class ModeloClientes
{
    /**=================================================================
     * MOSTRAR CLIENTES 
     ===================================================================*/
    static public function mdlMostrarClientes($tabla, $item, $value)
    {
        if ($item != null) {
            $stmt = Conexion::conectar()->prepare("SELECT*FROM $tabla WHERE $item=:$item");
            $stmt->bindParam(":", $item, $value, PDO::PARAM_STR);
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
     * MOSTRAR DATOS DE CLIENTE PARA EDICIÓN
     ===================================================================*/
    static public function mdlMostrarCientesE($tabla, $item, $value)
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
     * ACTIVAR ESTADO DE CLIENTE
     ===================================================================*/
    static public function mdlActualizarStatusC($tabla, $item1, $valor1, $item2,  $valor2)
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
     * GUARDAR DATOS CLIENTES
     ===================================================================*/
    static public function mldCrearCliente($tabla, $datos)
    {
        // ob_end_clean();
        // echo json_encode($datos);
        // return;
        $stmt = Conexion::conectar()->prepare(
            "INSERT INTO $tabla (
            nombre_cliente,
            telefono_cli,
            direccion_cli,
            razonSocial_cli,
            status_cli,
            rfc_cli,
            email)
            VALUES
            (:nombre_cliente,
            :telefono_cli,
            :direccion_cli,
            :razonSocial_cli,
            :status_cli,
            :rfc_cli,
            :email)"
        );
        $stmt->bindParam(":nombre_cliente", $datos["nombrecli"], PDO::PARAM_STR);
        $stmt->bindParam(":telefono_cli", $datos["telcli"], PDO::PARAM_STR);
        $stmt->bindParam(":direccion_cli", $datos["dircli"], PDO::PARAM_STR);
        $stmt->bindParam(":razonSocial_cli", $datos["razoncli"], PDO::PARAM_STR);
        $stmt->bindParam(":status_cli", $datos["activo"], PDO::PARAM_INT);
        $stmt->bindParam(":rfc_cli", $datos["rfccli"], PDO::PARAM_STR);
        $stmt->bindParam(":email", $datos["emailcli"], PDO::PARAM_STR);
        if ($stmt->execute()) {
            return json_encode("ok");
        } else {
            return json_encode("error");
        }
        $stmt->close();
        $stmt = null;
    }
    /**=================================================================
     * EDICIÓN DE CLIENTES
     ===================================================================*/
    static public function mdlEditarCliente($tabla, $datos)
    {
        // ob_end_clean();
        // echo json_encode($datos);
        // return;
        $stmt = Conexion::conectar()->prepare(
            "UPDATE $tabla SET
            nombre_cliente = :nombre_cliente,
            telefono_cli = :telefono_cli,
            direccion_cli = :direccion_cli,
            razonSocial_cli = :razonSocial_cli,
            rfc_cli = :rfc_cli,
            email = :email
            WHERE id = :id"
        );
        $stmt->bindParam(":nombre_cliente", $datos["nombreCliE"], PDO::PARAM_STR);
        $stmt->bindParam(":telefono_cli", $datos["telcliE"], PDO::PARAM_STR);
        $stmt->bindParam(":direccion_cli", $datos["dircliE"], PDO::PARAM_STR);
        $stmt->bindParam(":razonSocial_cli", $datos["razoncliE"], PDO::PARAM_STR);
        $stmt->bindParam(":rfc_cli", $datos["rfcclieE"], PDO::PARAM_STR);
        $stmt->bindParam(":email", $datos["emailcliE"], PDO::PARAM_STR);
        $stmt->bindParam(":id", $datos["idCliente"], PDO::PARAM_INT);
        if ($stmt->execute()) {
            return json_encode("ok");
        } else {
            return json_encode("error");
        }
        $stmt->close();
        $stmt = null;
    }
    /**=================================================================
     * ELIMNAR CLIENTE
     ===================================================================*/
    static public function mdlEdliminarCliente($tabla, $value)
    {
        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
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