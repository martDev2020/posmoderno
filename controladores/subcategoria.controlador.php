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
    static public function ctrMostrarEditSub($item, $value)
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
    /**=================================================================
     * EDICIÓN DE SUBCATEGORÍA
     ===================================================================*/
    static public function ctrEdidiconSubC($datos)
    {
        // echo json_encode($datos);
        // return;
        require_once "../modelos/subcategoria.modelo.php";
        if (isset($datos["idSucatE"])) {
            if (
                preg_match('/^[A-Za-z0-9ÑñÁáÉéÍíÓóÚúÜü\s]{1,250}$/', $datos["nombresubcatE"]) &&
                preg_match('/^[A-Za-zÑñÁáÉéÍíÓóÚúÜü0-9\_\-\.\,\s]{1,250}$/', $datos["descripsubcatE"])
            ) {
                $rutaImagen = "../" . $datos["antiguaFotosubCatE"];

                if (isset($datos["fotosubCatE"]["tmp_name"]) && !empty($datos["fotosubCatE"]["tmp_name"])) {
                    /*=============================================
					BORRAMOS ANTIGUA FOTO CATEGORÍAS
					=============================================*/

                    unlink("../" . $datos["antiguaFotosubCatE"]);
                    /*=============================================
					DEFINIMOS LAS MEDIDAS
					=============================================*/
                    list($ancho, $alto) = getimagesize($datos["fotosubCatE"]["tmp_name"]);
                    $nuevoAncho = 500;
                    $nuevoAlto = 500;
                    /*=============================================
    				DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
    				=============================================*/
                    if ($datos["fotosubCatE"]["type"] == "image/jpeg") {
                        /*=============================================
    					GUARDAMOS LA IMAGEN EN EL DIRECTORIO
    					=============================================*/
                        $aleatorio = mt_rand(100, 999);

                        $rutaImagen = "../vistas/img/subcategorias/subcat1/" . $aleatorio . ".jpg";
                        $origen = imagecreatefromjpeg($datos["fotosubCatE"]["tmp_name"]);
                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                        imagejpeg($destino, $rutaImagen);
                    }

                    if ($datos["fotosubCatE"]["type"] == "image/png") {
                        /*=============================================
    					GUARDAMOS LA IMAGEN EN EL DIRECTORIO
    					=============================================*/
                        $aleatorio = mt_rand(100, 999);
                        $rutaImagen = "../vistas/img/subcategorias/subcat1/" . $aleatorio . ".png";
                        $origen = imagecreatefrompng($datos["fotosubCatE"]["tmp_name"]);
                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                        imagealphablending($destino, FALSE);
                        imagesavealpha($destino, TRUE);
                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                        imagepng($destino, $rutaImagen);
                    }
                }
                $datos = array(
                    'idSucatE' => $datos["idSucatE"],
                    'selectcatE' => $_POST["selectcatE"],
                    'nombresubcatE' => $datos["nombresubcatE"],
                    'descripsubcatE' => $datos["descripsubcatE"],
                    'fotosubCatE' => substr($rutaImagen, 3),
                );
                // echo json_encode($datos);
                // return;
                $response = ModeloSubcatgoria::mdlEditarSubCateg("subcategoria", $datos);
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
    /**=================================================================
     * ELIMINAR DATOS
     ===================================================================*/
    static public function ctrEliminarsubCat($datos)
    {
        // echo json_encode($datos);
        // return;
        require_once "../modelos/subcategoria.modelo.php";
        if (isset($datos["ideliminarsubCat"])) {
            $datosDelete = $datos["ideliminarsubCat"];
            if ($datos["fotosubCatD"] != "" && $datos["fotosubCatD"] !=  'vistas/img/subcategorias/default/anonymous.png') {
                unlink("../" . $datos["fotosubCatD"]);
            }
            $response = ModeloSubcatgoria::mdlSubCategoriaDelete("subcategoria", $datosDelete);
            return $response;
        }
    }
}