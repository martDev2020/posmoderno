<!DOCTYPE html>
<html lang="en">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Mystic Dashboard</title>
    <!-- Iconic Fonts -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="vistas\vendors\iconic-fonts\font-awesome\css\all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="vistas\vendors\iconic-fonts\flat-icons\flaticon.css">
    <link rel="stylesheet" href="vistas\vendors\iconic-fonts\cryptocoins\cryptocoins.css">
    <link rel="stylesheet" href="vistas\vendors\iconic-fonts\cryptocoins\cryptocoins-colors.css">
    <!-- Bootstrap core CSS -->
    <link href="vistas\assets\css\bootstrap.min.css" rel="stylesheet">
    <!-- jQuery UI -->
    <link href="vistas\assets\css\jquery-ui.min.css" rel="stylesheet">
    <!-- Page Specific CSS (Slick Slider.css) -->
    <link href="vistas\assets\css\slick.css" rel="stylesheet">
    <!-- Mystic styles -->
    <link href="vistas\assets\css\style.css" rel="stylesheet">
    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="vistas/img/plantilla/cart.png">

</head>

<body class="ms-body ms-aside-left-open ms-primary-theme ms-has-quickbar">

    <!-- Setting Panel -->
    <div class="ms-toggler ms-settings-toggle ms-d-block-lg">
        <i class="flaticon-paint"></i>
    </div>
    <?php
    include "modulos/menu/mode-dark.php";
    include "modulos/elementos/preloader.php";
    ?>
    <?php
    include "modulos/menu/menu.php";
    ?>

    <!-- Main Content -->
    <main class="body-content">
        <?php
        include "modulos/header.php";
        ?>

        <!-- Body Content Wrapper -->
        <div class="ms-content-wrapper">
            <h1>Hola</h1>
        </div>

    </main>
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
    <script src="vistas\assets\js\jquery.webticker.min.js"> </script>
    <script src="vistas\assets\js\Chart.bundle.min.js"> </script>
    <script src="vistas\assets\js\Chart.Financial.js"> </script>
    <script src="vistas\assets\js\cryptocurrency.js"> </script>
    <!-- Page Specific Scripts Finish -->

    <!-- Mystic core JavaScript -->
    <script src="vistas\assets\js\framework.js"></script>

    <!-- Settings -->
    <script src="vistas\assets\js\settings.js"></script>

</body>

</html>