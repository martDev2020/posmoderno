<?php
class ControladorPromC
{
    /**=================================================================
     * GUARDAR DATOS
     ===================================================================*/
    static public function ctrGuardarProm($datos)
    {
        // echo json_encode($datos);
        // return;
        require_once "../modelos/categoria.modelo.php";
        if (isset($_POST["idPromC"])) {
            date_default_timezone_set('America/Mexico_City');
            $seg = date('s');
            $fechHoraIn = $datos["iniOfCat"] . " " . $datos["iniHoraCat"] . ":" . $seg;
            // echo json_encode($fechHoraIn);
            // return;
            $fechHoraFin = $datos["finFeCat"] . " " . $datos["finHoraCat"] . ":" . $seg;
            if ($datos["offer1"] === "descat") {

                $datos1 = array(
                    'idPromC' => $datos["idPromC"],
                    'descripOfC' => $datos["descripOfC"],
                    'offer1' => $datos["offer1"],
                    'descCat' => $datos["descCat"],
                    'precOfCat' => null,
                    'prodCat' => null,
                    'piezaminCat' => $datos["piezaminCat"],
                    'piezapromCat' => $datos["piezapromCat"],
                    'artmixtCat' => $datos["artmixtCat"],
                    'fechHoraIni' => $fechHoraIn,
                    'fechHoraFin' => $fechHoraFin
                );
            } else if ($datos["offer1"] === "precio-cat") {
                $datos1 = array(
                    'idPromC' => $datos["idPromC"],
                    'descripOfC' => $datos["descripOfC"],
                    'offer1' => $datos["offer1"],
                    'descCat' => null,
                    'precOfCat' => $datos["precOfCat"],
                    'prodCat' => null,
                    'piezaminCat' => $datos["piezaminCat"],
                    'piezapromCat' => $datos["piezapromCat"],
                    'artmixtCat' => $datos["artmixtCat"],
                    'fechHoraIni' => $fechHoraIn,
                    'fechHoraFin' => $fechHoraFin
                );
            } else if ($datos["offer1"] === "articulo-cat") {
                $datos1 = array(
                    'idPromC' => $datos["idPromC"],
                    'descripOfC' => $datos["descripOfC"],
                    'offer1' => $datos["offer1"],
                    'descCat' => null,
                    'precOfCat' => null,
                    'prodCat' => $datos["prodCat"],
                    'piezaminCat' => null,
                    'piezapromCat' => null,
                    'artmixtCat' => null,
                    'fechHoraIni' => $fechHoraIn,
                    'fechHoraFin' => $fechHoraFin
                );
            }
            // echo json_encode($datos1);
            // return;
            $response = ModeloCategoria::mdlGuardarProm("categoria", $datos1);
            return $response;
        }
    }
}