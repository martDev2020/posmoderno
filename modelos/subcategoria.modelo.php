<?php
require_once "conexion.php";
class ModeloSubcatgoria
{
    /**=================================================================
     * MOSTRAR DATOS PARA TABLA SUBACATEGORIA
     ===================================================================*/
    static public function mdlMostrarSubacategoria($tabla, $item, $value)
    {
        if ($item != null) {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item =:$item");
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
     * TRAER ID PARA EDICIÓN
     ===================================================================*/
    static public function mdlMostrarsubCateE($tabla, $item, $value)
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
     * ACTIVAR STATUS
     ===================================================================*/
    static public function mdlMostrarStasub($tabla, $item1, $value1, $item2, $value2)
    {
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item2=:$item2 WHERE $item1 = :$item1");
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
     * GURDAR DATOS
     ===================================================================*/
    static public function mdlGurardarsubCat($tabla, $datos)
    {
        // ob_end_clean();
        // echo json_encode($datos);
        // return;
        $stmt = Conexion::conectar()->prepare(
            "INSERT INTO $tabla 
            (idCateg,
            nombre_subcat,
            descrip_subcat,
            activo,
            foto_subcat)
            VALUES
            (:idCateg,
            :nombre_subcat,
            :descrip_subcat,
            :activo,
            :foto_subcat)"
        );
        $stmt->bindParam(":idCateg", $datos["selectcat"], PDO::PARAM_INT);
        $stmt->bindParam(":nombre_subcat", $datos["nombresubcat"], PDO::PARAM_STR);
        $stmt->bindParam(":descrip_subcat", $datos["descripsubcat"], PDO::PARAM_STR);
        $stmt->bindParam(":activo", $datos["activo"], PDO::PARAM_INT);
        $stmt->bindParam(":foto_subcat", $datos["fotosubCat"], PDO::PARAM_STR);
        if ($stmt->execute()) {
            return json_encode("ok");
        } else {
            return json_encode("error");
        }
        $stmt->close();
        $stmt = null;
    }
}