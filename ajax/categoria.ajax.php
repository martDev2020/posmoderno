<?php
require_once "../controladores/categoria.controlador.php";
require_once "../modelos/categoria.modelo.php";

class CategoriaAjax
{
    /**=================================================================
     * VALIDAR NO REPETIR NOMBRE
     ===================================================================*/
    public $nameCli;
    public function ajaxValidarNombre()
    {
        $item = "nombre_cat";
        $value = $this->nameCli;
        // echo json_encode($value);
        // return;
        $response = ControladorCategoria::ctrMostrarCategoria($item, $value);
        echo json_encode($response);
    }
    /**=================================================================
     * GUARDAR DATOS DE CATEGORÍA
     ===================================================================*/
    public $nombrecat;
    public $descripcat;
    public $fotoCat;
    public function ajaxGuardarCat()
    {
        $datos = array(
            'nombrecat' => $this->nombrecat,
            'descripcat' => $this->descripcat,
            'fotoCat' => $this->fotoCat
        );
        // echo json_encode($datos);
        // return;
        $response = ControladorCategoria::ctrGuardarCat($datos);
        echo $response;
    }
    /**=================================================================
     * ACTIVAR STATUS Y DESACTIVAR
     ===================================================================*/
    public $activeIdCat;
    public $activeSCat;
    public function ajaxStatusCat()
    {
        $tabla = "categoria";
        $item1 = "id";
        $value1 = $this->activeIdCat;
        $item2 = "activo";
        $value2 = $this->activeSCat;
        $reponse = ModeloCategoria::mdlMostrarSCat($tabla, $item1, $value1, $item2, $value2);
        echo $reponse;
    }
    /**=================================================================
     * ID PARA MOSTRAR DATOS Y EDITAR
     ===================================================================*/
    public $idCategoria;
    public function ajaxIdcatEdit()
    {
        $item = "id";
        $value = $this->idCategoria;
        $response = ControladorCategoria::ctrMostarCatE($item, $value);
        echo json_encode($response);
    }
    /**=================================================================
     * EDITAR CATEGORIA
     ===================================================================*/
    public $idCategorias;
    public $nombrecatE;
    public $descripcatE;
    public $fotoCatE;
    public $antiguaFotoCatE;
    public function ajaxEditCategoria()
    {
        $datos = array(
            'idCategorias' => $this->idCategorias,
            'nombrecatE' => $this->nombrecatE,
            'descripcatE' => $this->descripcatE,
            'fotoCatE' => $this->fotoCatE,
            'antiguaFotoCatE' => $this->antiguaFotoCatE
        );
        // echo json_encode($datos);
        // return;
        $response = ControladorCategoria::ctrEdicionCat($datos);
        echo $response;
    }
    /**=================================================================
     * ELIMINAR DATOS
     ===================================================================*/
    public $ideliminarCat;
    public $fotoCatD;
    public function ajaxDeleteCat()
    {
        $datos = array(
            'ideliminarCat' => $this->ideliminarCat,
            'fotoCatD' => $this->fotoCatD
        );
        // echo json_encode($datos);
        // return;
        $response = ControladorCategoria::ctrEliminarCat($datos);
        echo $response;
    }
}

/**=================================================================
 * VALIDAR NO REPETIR NOMBRE
 ===================================================================*/
if (isset($_POST["nameCli"])) {
    $valNombre = new CategoriaAjax();
    $valNombre->nameCli = $_POST["nameCli"];
    $valNombre->ajaxValidarNombre();
    // echo json_encode($_POST["nameCli"]);
}
/**=================================================================
 * RECIBIR DATOS PARA GUARDAR
 ===================================================================*/
if (isset($_POST["nombrecat"])) {
    $categ = new CategoriaAjax();
    $categ->nombrecat = $_POST["nombrecat"];
    $categ->descripcat = $_POST["descripcat"];
    if (isset($_FILES["fotoCat"])) {
        // echo json_encode($_FILES["fotoCat"]);
        $categ->fotoCat = $_FILES["fotoCat"];
    } else {
        $categ->fotoCat = null;
    }
    $categ->ajaxGuardarCat();
    // echo json_encode($_POST["nombrecat"]);
}
/**=================================================================
 * ACTIVAR STATUS Y DESACTIVAR
 ===================================================================*/
if (isset($_POST["activeIdCat"])) {
    $statusCat = new CategoriaAjax();
    $statusCat->activeIdCat = $_POST["activeIdCat"];
    $statusCat->activeSCat = $_POST["activeSCat"];
    $statusCat->ajaxStatusCat();
    // echo json_encode($_POST["activeIdCat"]);
}
/**=================================================================
 * OBTNER DATOS CON ID PARA EDICIÓN
 ===================================================================*/
if (isset($_POST["idCategoria"])) {
    // echo json_encode($_POST["idCategoria"]);
    $idCat = new CategoriaAjax();
    $idCat->idCategoria = $_POST["idCategoria"];
    $idCat->ajaxIdcatEdit();
}
/**=================================================================
 * DATOS PARA EDICIÓN
 ===================================================================*/
if (isset($_POST["idCategorias"])) {
    // echo json_encode($_POST["idCategorias"]);
    $editCat = new CategoriaAjax();
    $editCat->idCategorias = $_POST["idCategorias"];
    $editCat->nombrecatE = $_POST["nombrecatE"];
    $editCat->descripcatE = $_POST["descripcatE"];
    if (isset($_FILES["fotoCatE"])) {
        $editCat->fotoCatE = $_FILES["fotoCatE"];
    } else {
        $editCat->fotoCatE = null;
    }
    $editCat->antiguaFotoCatE = $_POST["antiguaFotoCatE"];
    $editCat->ajaxEditCategoria();
}
/**=================================================================
 * ELIMINAR DATOS
 ===================================================================*/
if (isset($_POST["ideliminarCat"])) {
    $deleteCat = new CategoriaAjax();
    $deleteCat->ideliminarCat = $_POST["ideliminarCat"];
    $deleteCat->fotoCatD = $_POST["fotoCatD"];
    $deleteCat->ajaxDeleteCat();
    // echo json_encode($_POST["ideliminarCat"]);
}