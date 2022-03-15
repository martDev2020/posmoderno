<?php
require_once "../controladores/categoria.controlador.php";
require_once "../modelos/categoria.modelo.php";

class TablaPromCat
{
    /**===================================
     * MOSTRAR LA TABLA CATEGORIA
     ===================================**/
    public function mostrarTablaPromCat()
    {
        $item = null;
        $value = null;

        $promcategoria = ControladorCategoria::ctrMostrarCategoria($item, $value);
        // var_dump($promcategoria);

        if (count($promcategoria) != 0) {
            # code...
            // return;
            $datosJson = '{

            "data":[';

            for ($i = 0; $i < count($promcategoria); $i++) {
                /**=================================================================
                 * VALIDACIÓN DESCRIPCIÓN
                 ===================================================================*/
                if ($promcategoria[$i]["descripprom_cat"] != null) {
                    $descrip = $promcategoria[$i]["descripprom_cat"];
                } else {
                    $descrip = "<small>SIN DESCRIPCIÓN</small>";
                }
                /**=================================================================
                 * VALIDACIÓN OFERTA POR DESCUENTO
                 ===================================================================*/
                if ($promcategoria[$i]["descOferta_cat"] != null) {
                    $desc = $promcategoria[$i]["descOferta_cat"];
                } else {
                    $desc = "<small>SIN DESCUENTO %</small>";
                }
                /**=================================================================
                 * VALIDACIÓN POR PRECIO
                 ===================================================================*/
                if ($promcategoria[$i]["preOferta_cat"] != null) {
                    $prec = $promcategoria[$i]["preOferta_cat"];
                } else {
                    $prec = "<small>SIN PRECIO</small>";
                }
                /**=================================================================
                 * VALIDACIÓN POR PRODUCTO *
                 ===================================================================*/
                if ($promcategoria[$i]["prodpor_cat"] != null) {
                    $promprod = $promcategoria[$i]["prodpor_cat"];
                } else {
                    $promprod = "<small>SIN *</small>";
                }

                /**=================================================================
                 * VALIDACIÓN POR PIEZA MÍNIMA
                 ===================================================================*/
                if ($promcategoria[$i]["piezamin_cat"] != null) {
                    $pizminim = $promcategoria[$i]["piezamin_cat"];
                } else {
                    $pizminim = "<small>SIN PIEZA MÍNIMA</small>";
                }
                /**=================================================================
                 * VALIDACIÓN POR PIEZA PROMOCIÓN
                 ===================================================================*/
                if ($promcategoria[$i]["piezaprom_cat"] != null) {
                    $pizprom = $promcategoria[$i]["piezaprom_cat"];
                } else {
                    $pizprom = "<small>SIN PIEZA PROMOCIÓN</small>";
                }
                /**=================================================================
                 * VALIDACIÓN POR PIEZA PROMOCIÓN
                 ===================================================================*/
                if ($promcategoria[$i]["artmixt_cat"] != null && $promcategoria[$i]["artmixt_cat"] == 1) {
                    $pzmix = "Si";
                } else {
                    $pzmix = "<small>SIN PIEZA MIXTA</small>";
                }

                /**=================================================================
                 * VALIDACIÓN POR PIEZA PROMOCIÓN
                 ===================================================================*/
                if ($promcategoria[$i]["iniOferta_cat"] != null) {
                    $iniOfer = $promcategoria[$i]["iniOferta_cat"];
                } else {
                    $iniOfer = "<small>SIN FECHA INICIO</small>";
                }
                /**=================================================================
                 * VALIDACIÓN POR PIEZA PROMOCIÓN
                 ===================================================================*/
                if ($promcategoria[$i]["finOferta_cat"] != null) {
                    $finofer = $promcategoria[$i]["finOferta_cat"];
                } else {
                    $finofer = "<small>SIN FECHA FIN</small>";
                }
                /**===================================
                 * AGREGAR ETIQUETAS DE ESTADO PROMOCIONES
             ===================================**/
                if ($promcategoria[$i]["oferta_cat"] != null && $promcategoria[$i]["iniOferta_cat"] != null && $promcategoria[$i]["finOferta_cat"] != null) {
                    date_default_timezone_set('America/Mexico_City');
                    $fecha = date('Y-m-d');
                    $hora = date('H:i:s');
                    $fechaActual = $fecha . ' ' . $hora;
                    $datetime1 = new DateTime($promcategoria[$i]["finOferta_cat"]);
                    $datetime2 = new DateTime($fechaActual);
                    $interval = date_diff($datetime1, $datetime2);
                    $finOferta = $interval->format('%a');

                    // Para hacer la comparación.
                    $fechaEntrada = strtotime(date($promcategoria[$i]["finOferta_cat"]));
                    $fechaActual2 = strtotime($fechaActual);
                    // var_dump($finOferta);
                    /** ----Método para inicar la oferta */
                    $fechIni = strtotime(date($promcategoria[$i]["iniOferta_cat"]));
                    /**----------Fín método para iniciar la oferta */
                    if ($promcategoria[$i]["oferta_cat"] === "precio-cat") {
                        if ($fechaEntrada < $fechaActual2 && ($fechaActual2 >= $fechIni && $fechaActual2 <= $fechaEntrada)) {
                            $promo = "<center><h3><span class='badge badge-font badge-dark'>Descuento por precio finalizado.</span></h3></center>";
                        } else if ($finOferta == 0 && ($fechaActual2 >= $fechIni && $fechaActual2 <= $fechaEntrada)) {
                            $promo = "<center><h3><span class='badge badge-font badge-success'>Descuento por precio termina hoy.</span></h3></center>";
                        } else if ($finOferta == 1 && ($fechaActual2 >= $fechIni && $fechaActual2 <= $fechaEntrada)) {
                            $promo = "<center><h3><span class='badge badge-font badge-warning'>Descuento por precio termina en " . $finOferta . " día</span></h3></center>";
                        } else if ($fechaActual2 >= $fechIni && $fechaActual2 <= $fechaEntrada) {
                            $promo = "<center><h3><span class='badge badge-font badge-primary'>Descuento por precio termina en " . $finOferta . " días.</span></h3></center>";
                        } else {
                            $promo = "<center><h3><span class='badge badge-font badge-light'>Oferta inactiva</span></h3></center>";
                        }
                    }
                    if ($promcategoria[$i]["oferta_cat"] === "articulo-cat") {
                        if ($fechaEntrada < $fechaActual2 && ($fechaActual2 >= $fechIni && $fechaActual2 <= $fechaEntrada)) {
                            $promo = "<center><h3><span class='badge badge-font badge-dark'>Promoción por producto (x) finalizado.</span></h3></center>";
                        } else if ($finOferta == 0 && ($fechaActual2 >= $fechIni && $fechaActual2 <= $fechaEntrada)) {
                            $promo = "<center><h3><span class='badge badge-font badge-success'>Promoción por producto (x) termina hoy.</span></h3></center>";
                        } else if ($finOferta == 1 && ($fechaActual2 >= $fechIni && $fechaActual2 <= $fechaEntrada)) {
                            $promo = "<center><h3><span class='badge badge-font badge-warning'>Promoción por producto (x) termina en " . $finOferta . " día.</span></h3></center>";
                        } else if ($fechaActual2 >= $fechIni && $fechaActual2 <= $fechaEntrada) {
                            $promo = "<center><h3><span class='badge badge-font badge-primary'>Promoción por producto (x) termina en " . $finOferta . " días</span></h3></center>";
                        } else {
                            $promo = "<center><h3><span class='badge badge-font badge-dark'>Oferta inactiva</span></h3></center>";
                        }
                    }
                    if ($promcategoria[$i]["oferta_cat"] === "descat") {
                        if ($fechaEntrada < $fechaActual2 && ($fechaActual2 >= $fechIni && $fechaActual2 <= $fechaEntrada)) {
                            $promo = "<center><h3><span class='badge badge-font badge-dark'>Promoción por descuento % finalizado.</span></h3></center>";
                        } else if ($finOferta == 0 && ($fechaActual2 >= $fechIni && $fechaActual2 <= $fechaEntrada)) {
                            $promo = "<center><h3><span class='badge badge-font badge-success'>Promoción por descuento % termina hoy.</span></h3></center>";
                        } else if ($finOferta == 1 && ($fechaActual2 >= $fechIni && $fechaActual2 <= $fechaEntrada)) {
                            $promo = "<center><h3><span class='badge badge-font badge-warning'>Promoción por descuento % termina en " . $finOferta . " día.</span></h3></center>";
                        } else if ($fechaActual2 >= $fechIni && $fechaActual2 <= $fechaEntrada) {
                            $promo = "<center><h3><span class='badge badge-primary'>Promoción por descuento % termina en " . $finOferta . " días</span></h3></center>";
                        } else {
                            $promo = "<center><h3><span class='badge badge-font badge-danger'>Oferta inactiva</span></h3></center>";
                        }
                    }
                } else {
                    $promo = "<small>SIN PROMOCIÓN</small>";
                }
                /**===================================
                 * CONSTRUiR LOS DATOS JSON
             ===================================**/

                $datosJson .= '[
                    "' . ($i + 1) . '",
                    "' . $promcategoria[$i]["nombre_cat"] . '",
                    "' . $descrip . '",
                    "' . $promo . '",
                    "' . $desc . '",
                    "' . $prec . '",
                    "' . $promprod . '",
                    "' . $pizminim . '",
                    "' . $pizprom . '",
                    "' . $pzmix . '",
                    "' . $iniOfer . '",
                    "' . $finofer . '"
                ],';
            }
            # Se substrae la última coma que cierra el json(es la anaterior).
            $datosJson = substr($datosJson, 0, -1);
            $datosJson .= ']
        }';
            echo $datosJson;
            /**Se recomienda que se copie el resultado en un archivo para mostrar si está correcto el resultado
             * en todos los objetos para descartar el error.
             */
        } else {
            echo '{
                "data":[]
            }';
        }
    }
}
/**===================================
 * MOSTRAR TABLA PRODUCTOS
 ===================================**/
$acitvarProductos = new TablaPromCat();
$acitvarProductos->mostrarTablaPromCat();