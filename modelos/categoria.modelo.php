<?php
require_once "conexion.php";
class ModeloCategoria
{
    /**=================================================================
     * MOSTRAR CATEGORIA
     ===================================================================*/
    static public function mdlMostrarCategoria($tabla, $item, $value)
    {
        if ($item != null) {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
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
    /**=================================================================
     * ACTIVAR STAUS DESACTIVAR
     ===================================================================*/
    static public function mdlMostrarSCat($tabla, $item1, $value1, $item2, $value2)
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
     * TRAER ID PARA EDICIÓN
     ===================================================================*/
    static public function mdlMostrarCateE($tabla, $item, $value)
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

    /**=================================================================
     * GUARDAR DATOS CATEGORÍA
     ===================================================================*/
    static public function mdlGurardarCat($tabla, $datos)
    {
        // ob_end_clean();
        // echo json_encode($datos);
        // return;
        $stmt = Conexion::conectar()->prepare(
            "INSERT INTO $tabla 
             (nombre_cat,
            descrip_cat,
            activo,
            foto_cat)
            VALUES
            (:nombre_cat,
            :descrip_cat,
            :activo,
            :foto_cat)"
        );
        $stmt->bindParam(":nombre_cat", $datos["nombrecat"], PDO::PARAM_STR);
        $stmt->bindParam(":descrip_cat", $datos["descripcat"], PDO::PARAM_STR);
        $stmt->bindParam(":activo", $datos["activo"], PDO::PARAM_INT);
        $stmt->bindParam(":foto_cat", $datos["fotoCat"], PDO::PARAM_STR);
        if ($stmt->execute()) {
            return json_encode("ok");
        } else {
            return json_encode("error");
        }
        $stmt->close();
        $stmt = null;
    }
    /**=================================================================
     * EDITAR CAETEGORÍA
     ===================================================================*/
    static public function mdlEditarCateg($tabla, $datos)
    {
        // ob_end_clean();
        // echo json_encode($datos);
        // return;
        $stmt = Conexion::conectar()->prepare(
            "UPDATE $tabla SET
            nombre_cat = :nombre_cat,
            descrip_cat = :descrip_cat,
            foto_cat = :foto_cat
            WHERE id = :id"
        );
        $stmt->bindParam(":nombre_cat", $datos["nombrecatE"], PDO::PARAM_STR);
        $stmt->bindParam(":descrip_cat", $datos["descripcatE"], PDO::PARAM_STR);
        $stmt->bindParam(":foto_cat", $datos["fotoCatE"], PDO::PARAM_STR);
        $stmt->bindParam(":id", $datos["idCategorias"], PDO::PARAM_STR);
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
    static public function mdlCategoriaDelete($tabla, $datosDelete)
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