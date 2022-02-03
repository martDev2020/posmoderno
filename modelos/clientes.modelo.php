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
}