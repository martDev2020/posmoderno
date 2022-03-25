<?php
class ControladorCategoria
{
    /**=================================================================
     * MOSTRAR CATEGORIA
     ===================================================================*/
    static public function ctrMostrarCategoria($item, $value)
    {
        $tabla = "categoria";
        $response = ModeloCategoria::mdlMostrarCategoria($tabla, $item, $value);
        return $response;
    }
    /**=================================================================
     * TRAER ID PARA EDICIÓN
     ===================================================================*/
    static public function ctrMostarCatE($item, $value)
    {
        $tabla = "categoria";
        $response = ModeloCategoria::mdlMostrarCateE($tabla, $item, $value);
        return $response;
    }
    /**=================================================================
     * GUARDAR DATOS DE CATEGORÍA
     ===================================================================*/
    static public function ctrGuardarCat($datos)
    {
        // echo json_encode($datos);
        // return;
        require_once "../modelos/categoria.modelo.php";
        if (isset($datos["nombrecat"])) {
            if (
                preg_match('/^[A-Za-z0-9ÑñÁáÉéÍíÓóÚúÜü\s]{1,250}$/', $datos["nombrecat"]) &&
                preg_match('/^[A-Za-zÑñÁáÉéÍíÓóÚúÜü0-9\_\-\.\,\s]{1,250}$/', $datos["descripcat"])
            ) {
                $ruta = "";

                if (isset($_FILES["fotoCat"]["tmp_name"]) && !empty($_FILES["fotoCat"]["tmp_name"])) {

                    list($ancho, $alto) = getimagesize($_FILES["fotoCat"]["tmp_name"]);
                    $nuevoAncho = 500;
                    $nuevoAlto = 500;
                    /*=============================================
    				DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
    				=============================================*/
                    if ($_FILES["fotoCat"]["type"] == "image/jpeg") {
                        /*=============================================
    					GUARDAMOS LA IMAGEN EN EL DIRECTORIO
    					=============================================*/
                        $aleatorio = mt_rand(100, 999);

                        $ruta = "../vistas/img/categoria/cat1/" . $aleatorio . ".jpg";
                        $origen = imagecreatefromjpeg($_FILES["fotoCat"]["tmp_name"]);
                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                        imagejpeg($destino, $ruta);
                    }

                    if ($_FILES["fotoCat"]["type"] == "image/png") {
                        /*=============================================
    					GUARDAMOS LA IMAGEN EN EL DIRECTORIO
    					=============================================*/
                        $aleatorio = mt_rand(100, 999);
                        $ruta = "../vistas/img/categoria/cat1/" . $aleatorio . ".png";
                        $origen = imagecreatefrompng($_FILES["fotoCat"]["tmp_name"]);
                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                        imagealphablending($destino, FALSE);
                        imagesavealpha($destino, TRUE);
                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                        imagepng($destino, $ruta);
                    }
                }
                $datos = array(
                    'nombrecat' => $datos["nombrecat"],
                    'descripcat' => $datos["descripcat"],
                    'fotoCat' => substr($ruta, 3),
                    'activo' => 0
                );
                // echo json_encode($datos);
                // return;
                $response = ModeloCategoria::mdlGurardarCat("categoria", $datos);
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
     * EDICIÓN DE CATEGORÍA
     ===================================================================*/
    static public function ctrEdicionCat($datos)
    {
        // echo json_encode($datos);
        // return;
        require_once "../modelos/categoria.modelo.php";
        if (isset($datos["idCategorias"])) {
            if (
                preg_match('/^[A-Za-z0-9ÑñÁáÉéÍíÓóÚúÜü\s]{1,250}$/', $datos["nombrecatE"]) &&
                preg_match('/^[A-Za-zÑñÁáÉéÍíÓóÚúÜü0-9\_\-\.\,\s]{1,250}$/', $datos["descripcatE"])
            ) {
                $rutaImagen = "../" . $datos["antiguaFotoCatE"];

                if (isset($datos["fotoCatE"]["tmp_name"]) && !empty($datos["fotoCatE"]["tmp_name"])) {
                    /*=============================================
					BORRAMOS ANTIGUA FOTO CATEGORÍAS
					=============================================*/

                    unlink("../" . $datos["antiguaFotoCatE"]);
                    /*=============================================
					DEFINIMOS LAS MEDIDAS
					=============================================*/
                    list($ancho, $alto) = getimagesize($datos["fotoCatE"]["tmp_name"]);
                    $nuevoAncho = 500;
                    $nuevoAlto = 500;
                    /*=============================================
    				DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
    				=============================================*/
                    if ($datos["fotoCatE"]["type"] == "image/jpeg") {
                        /*=============================================
    					GUARDAMOS LA IMAGEN EN EL DIRECTORIO
    					=============================================*/
                        $aleatorio = mt_rand(100, 999);

                        $rutaImagen = "../vistas/img/categoria/cat1/" . $aleatorio . ".jpg";
                        $origen = imagecreatefromjpeg($datos["fotoCatE"]["tmp_name"]);
                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                        imagejpeg($destino, $rutaImagen);
                    }

                    if ($datos["fotoCatE"]["type"] == "image/png") {
                        /*=============================================
    					GUARDAMOS LA IMAGEN EN EL DIRECTORIO
    					=============================================*/
                        $aleatorio = mt_rand(100, 999);
                        $rutaImagen = "../vistas/img/categoria/cat1/" . $aleatorio . ".png";
                        $origen = imagecreatefrompng($datos["fotoCatE"]["tmp_name"]);
                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                        imagealphablending($destino, FALSE);
                        imagesavealpha($destino, TRUE);
                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                        imagepng($destino, $rutaImagen);
                    }
                }
                $datos = array(
                    'idCategorias' => $datos["idCategorias"],
                    'nombrecatE' => $datos["nombrecatE"],
                    'descripcatE' => $datos["descripcatE"],
                    'fotoCatE' => substr($rutaImagen, 3),
                );
                // echo json_encode($datos);
                // return;
                $response = ModeloCategoria::mdlEditarCateg("categoria", $datos);
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
     * ELIMINARA CATEGORÍA
     ===================================================================*/
    static public function ctrEliminarCat($datos)
    {
        // echo json_encode($datos);
        // return;
        require_once "../modelos/categoria.modelo.php";
        if (isset($datos["ideliminarCat"])) {
            $datosDelete = $datos["ideliminarCat"];
            if ($datos["fotoCatD"] != "" && $datos["fotoCatD"] !=  'vistas/img/categoria/default/anonymous.png') {
                unlink("../" . $datos["fotoCatD"]);
            }
            $response = ModeloCategoria::mdlCategoriaDelete("categoria", $datosDelete);
            return $response;
        }
    }
}