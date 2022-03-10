<?php
require_once "../controladores/promcat.controlador.php";
require_once "../modelos/promcat.modelo.php";

class AjaxPromCategoria
{
    /**=================================================================
     * GUARDAR DATOS
     ===================================================================*/
    public $idPromC;
    public $descripOfC;
    public $offer1;
    public $descCat;
    public $precOfCat;
    public $prodCat;
    public $piezaminCat;
    public $piezapromCat;
    public $artmixtCat;
    public $iniOfCat;
    public $iniHoraCat;
    public $finFeCat;
    public $finHoraCat;
    public function ajaxGuardarDPromC()
    {
        $datos = array(
            'idPromC' => $this->idPromC,
            'descripOfC' => $this->descripOfC,
            'offer1' => $this->offer1,
            'descCat' => $this->descCat,
            'precOfCat' => $this->precOfCat,
            'prodCat' => $this->prodCat,
            'piezaminCat' => $this->piezaminCat,
            'piezapromCat' => $this->piezapromCat,
            'artmixtCat' => $this->artmixtCat,
            'iniOfCat' => $this->iniOfCat,
            'iniHoraCat' => $this->iniHoraCat,
            'finFeCat' => $this->finFeCat,
            'finHoraCat' => $this->finHoraCat
        );
        // echo json_encode($datos);
        // return;
        $response = ControladorPromC::ctrGuardarProm($datos);
        echo $response;
    }
}
/**=================================================================
 * GUARDAR DATOS
 ===================================================================*/
if (isset($_POST["idPromC"])) {
    // echo json_encode("HOLA: " . $_POST["iniOfCat"]);
    $prom = new AjaxPromCategoria();
    $prom->idPromC = $_POST["idPromC"];
    if (isset($_POST["descripOfC"])) {
        $prom->descripOfC = $_POST["descripOfC"];
    } else {
        $prom->descripOfC = null;
    }

    if (isset($_POST["offer1"])) {
        $prom->offer1 = $_POST["offer1"];
    } else {
        $prom->offer1 = null;
    }
    if (isset($_POST["descCat"])) {
        $prom->descCat = $_POST["descCat"];
    } else {
        $prom->descCat = null;
    }
    if (isset($_POST["precOfCat"])) {
        $prom->precOfCat = $_POST["precOfCat"];
    } else {
        $prom->precOfCat = null;
    }
    if (isset($_POST["prodCat"])) {
        $prom->prodCat = $_POST["prodCat"];
    } else {
        $prom->prodCat = null;
    }
    if (isset($_POST["piezaminCat"])) {
        $prom->piezaminCat = $_POST["piezaminCat"];
    } else {
        $prom->piezaminCat = null;
    }

    if (isset($_POST["piezapromCat"])) {
        $prom->piezapromCat = $_POST["piezapromCat"];
    } else {
        $prom->piezapromCat = null;
    }

    if (isset($_POST["artmixtCat"])) {
        $prom->artmixtCat = $_POST["artmixtCat"];
    } else {
        $prom->artmixtCat = null;
    }
    $prom->iniOfCat = $_POST["iniOfCat"];
    $prom->iniHoraCat = $_POST["iniHoraCat"];
    $prom->finFeCat = $_POST["finFeCat"];
    $prom->finHoraCat = $_POST["finHoraCat"];
    $prom->ajaxGuardarDPromC();
}