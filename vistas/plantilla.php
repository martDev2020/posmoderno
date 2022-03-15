<!DOCTYPE html>
<html lang="es">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>MARS MULTISCUCURSAL</title>
    <!-- Iconic Fonts -->
    <link href="vistas\assets\css\font.css" rel="stylesheet">
    <link href="vistas\vendors\iconic-fonts\font-awesome\css\all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="vistas\vendors\iconic-fonts\flat-icons\flaticon.css">
    <link rel="stylesheet" href="vistas\vendors\iconic-fonts\cryptocoins\cryptocoins.css">
    <link rel="stylesheet" href="vistas\vendors\iconic-fonts\cryptocoins\cryptocoins-colors.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="vistas/assets/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="vistas/assets/datatables.net-bs/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" href="vistas/assets/datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
    <!-- Bootstrap core CSS -->
    <link href="vistas\assets\css\bootstrap.min.css" rel="stylesheet">
    <link href="vistas\css\style.css" rel="stylesheet">
    <!-- jQuery UI -->
    <link href="vistas\assets\css\jquery-ui.min.css" rel="stylesheet">
    <!-- Page Specific CSS (Slick Slider.css) -->
    <link href="vistas\assets\css\slick.css" rel="stylesheet">
    <!-- Mystic styles -->
    <link href="vistas\assets\css\style.css" rel="stylesheet">
    <!-- Page Specific CSS (Toastr.css) -->
    <link href="vistas\assets\css\toastr.min.css" rel="stylesheet">
    <link href="vistas\assets\css\sweetalert2.min.css" rel="stylesheet">
    <!-- Timepicker -->
    <link href="vistas/assets/timepicker/timepicker.css"" rel=" stylesheet">
    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="vistas/img/plantilla/cart.png">

</head>

<body class="ms-body ms-aside-left-open ms-primary-theme ms-has-quickbar">

    <!-- Setting Panel -->
    <div class="ms-toggler ms-settings-toggle ms-d-block-lg">
        <i class="flaticon-paint"></i>
    </div>
    <?php
    /**=================================================================
     * HORA DEL SEVIDOR
===================================================================*/
    date_default_timezone_set('America/Mexico_City');
    $zonahoraria = date_default_timezone_get();

    include "modulos/menu/mode-dark.php";
    // include "modulos/elementos/preloader.php";
    include "modulos/menu/menu.php";
    echo '
        <!-- Main Content -->
        <main class="body-content">
     ';
    include "modulos/header.php";
    echo '
        <!-- Body Content Wrapper -->
        <div class="ms-content-wrapper">';
    if (isset($_GET["ruta"])) {
        if (
            $_GET["ruta"] == "puntoventa" ||
            $_GET["ruta"] == "proveedores" ||
            $_GET["ruta"] == "clientes" ||
            $_GET["ruta"] == "categorias" ||
            $_GET["ruta"] == "subcategorias" ||
            $_GET["ruta"] == "productos" ||
            $_GET["ruta"] == "usuarios" ||
            $_GET["ruta"] == "empleados" ||
            $_GET["ruta"] == "ventas" ||
            $_GET["ruta"] == "compras" ||
            $_GET["ruta"] == "empresa" ||
            $_GET["ruta"] == "departamento" ||
            $_GET["ruta"] == "regfiscal" ||
            $_GET["ruta"] == "restbase" ||
            $_GET["ruta"] == "promcategoria" ||
            $_GET["ruta"] == "promsubcategoria" ||
            $_GET["ruta"] == "promproductos"
        ) {
            include "modulos/" . $_GET["ruta"] . ".php";
        }
    }
    echo '</div>
    </main>
    ';
    ?>
    <!-- SCRIPTS -->
    <!-- Global Required Scripts Start -->
    <script src="vistas\assets\js\jquery-3.5.1.min.js"></script>
    <script src="vistas\assets\js\popper.min.js"></script>
    <script src="vistas\assets\js\bootstrap.min.js"></script>
    <script src="vistas\assets\js\perfect-scrollbar.js"> </script>
    <script src="vistas\assets\js\jquery-ui.min.js"> </script>
    <!-- Global Required Scripts End -->

    <!-- Page Specific Scripts Start -->
    <script src="vistas\assets\js\slick.min.js"> </script>
    <script src="vistas\assets\js\moment.js"> </script>
    <script src="vistas\assets\timepicker\timepicker.js"></script>
    <script src="vistas\assets\js\jquery.webticker.min.js"> </script>
    <script src="vistas\assets\js\Chart.bundle.min.js"> </script>
    <script src="vistas\assets\js\Chart.Financial.js"> </script>
    <script src="vistas\assets\js\cryptocurrency.js"> </script>
    <!-- Page Specific Scripts Finish -->

    <!-- Mystic core JavaScript -->
    <script src="vistas\assets\js\framework.js"></script>

    <!-- Settings -->
    <script src="vistas\assets\js\settings.js"></script>

    <!-- DataTables https://datatables.net/-->
    <!-- <script src="vistas/assets/datatables.net/js/jquery.dataTables.min.js"></script> -->
    <!-- <script src="vistas/assets/datatables.net-bs/js/dataTables.bootstrap.min.js"></script> -->
    <!-- <script src="vistas/assets/datatables.net-bs/js/dataTables.responsive.min.js"></script>
    <script src="vistas/assets/datatables.net-bs/js/responsive.bootstrap.min.js"></script> -->
    <!-- ----------Plugins para botones de datatables -->
    <script src="vistas/assets/datatables/datatables.min.js"></script>
    <script src="vistas/assets/datatables/Buttons-1.5.6/js/dataTables.buttons.min.js"></script>
    <script src="vistas/assets/datatables/JSZip-2.5.0/jszip.min.js"></script>
    <script src="vistas/assets/datatables/pdfmake-0.1.36/pdfmake.min.js"></script>
    <script src="vistas/assets/datatables/pdfmake-0.1.36/vfs_fonts.js"></script>
    <script src="vistas/assets/datatables/Buttons-1.5.6/js/buttons.html5.min.js"></script>
    <!-- Page Specific Scripts Start -->
    <script src="vistas\assets\js\toastr.min.js"> </script>
    <script src="vistas\assets\js\toast.js"> </script>
    <script src="vistas\assets\js\promise.min.js"> </script>
    <script src="vistas\assets\js\sweetalert2.min.js"> </script>

    <!-- <script src="vistas\assets\js\sweet-alerts.js"> </script> -->
    <script src="vistas/js/plantilla.js"></script>
    <script src="vistas/js/gestorProveedor.js"></script>
    <script src="vistas/js/gestorClientes.js"></script>
    <script src="vistas/js/gestorCategoria.js"></script>
    <script src="vistas/js/gestorSubCategoria.js"></script>
    <script src="vistas/js/gestorDep.js"></script>
    <script src="vistas/js/gestorRF.js"></script>
    <script src="vistas/js/gestorPromCat.js"></script>
</body>

</html>