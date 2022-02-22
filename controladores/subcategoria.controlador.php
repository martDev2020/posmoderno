<?php
class ControladorSubCategoria
{
    /**=================================================================
     * MOSTRAR DATOS EN TABLA
     ===================================================================*/
    static public function ctrMostrarSubCategoria($item, $value)
    {
        $tabla = "subcategoria";
        $response = ModeloSubcatgoria::mdlMostrarSubacategoria($tabla, $item, $value);
        return $response;
    }
    /**=================================================================
     * TRAER ID PARA EDICIÓN
     ===================================================================*/
    static public function ctrMostrarEdit($item, $value)
    {
        $tabla = "subcategoria";
        $response = ModeloSubcatgoria::mdlMostrarsubCateE($tabla, $item, $value);
        return $response;
    }
    /**=================================================================
     * GUARDAR DATOS SUBCATEGORIA
     ===================================================================*/
    static public function ctrGuardarSubcat($datos)
    {
        // echo json_encode($datos);
        // return;
        require_once "../modelos/subcategoria.modelo.php";
        if (isset($datos["nombresubcat"])) {
            if (
                preg_match('/^[A-Za-z0-9ÑñÁáÉéÍíÓóÚúÜü\s]{1,250}$/', $datos["nombresubcat"]) &&
                preg_match('/^[A-Za-zÑñÁáÉéÍíÓóÚúÜü0-9\_\-\.\,\s]{1,250}$/', $datos["descripsubcat"])
            ) {
                $ruta = "";

                if (isset($_FILES["fotosubCat"]["tmp_name"]) && !empty($_FILES["fotosubCat"]["tmp_name"])) {

                    list($ancho, $alto) = getimagesize($_FILES["fotosubCat"]["tmp_name"]);
                    $nuevoAncho = 500;
                    $nuevoAlto = 500;
                    /*=============================================
    				DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
    				=============================================*/
                    if ($_FILES["fotosubCat"]["type"] == "image/jpeg") {
                        /*=============================================
    					GUARDAMOS LA IMAGEN EN EL DIRECTORIO
    					=============================================*/
                        $aleatorio = mt_rand(100, 999);

                        $ruta = "../vistas/img/subcategorias/subcat1/" . $aleatorio . ".jpg";
                        $origen = imagecreatefromjpeg($_FILES["fotosubCat"]["tmp_name"]);
                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                        imagejpeg($destino, $ruta);
                    }

                    if ($_FILES["fotosubCat"]["type"] == "image/png") {
                        /*=============================================
    					GUARDAMOS LA IMAGEN EN EL DIRECTORIO
    					=============================================*/
                        $aleatorio = mt_rand(100, 999);
                        $ruta = "../vistas/img/subcategorias/subcat1/" . $aleatorio . ".png";
                        $origen = imagecreatefrompng($_FILES["fotosubCat"]["tmp_name"]);
                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                        imagealphablending($destino, FALSE);
                        imagesavealpha($destino, TRUE);
                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                        imagepng($destino, $ruta);
                    }
                }
                $datos = array(
                    'selectcat' => $datos["selectcat"],
                    'nombresubcat' => $datos["nombresubcat"],
                    'descripsubcat' => $datos["descripsubcat"],
                    'fotosubCat' => substr($ruta, 3),
                    'activo' => 0
                );
                // echo json_encode($datos);
                // return;
                $response = ModeloSubcatgoria::mdlGurardarsubCat("subcategoria", $datos);
                return $response;
            } else {
                echo '<script>
                Swal.fire({
                    position: "top-end",
                    icon: "error",
                    text: "¡Datos icorrectos o vacíos, no deben tener caracterres especiales!",
                    showConfimButton: false,
                    timer: 1500
                })
                </script>';
            }
        }
    }
}