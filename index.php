<?php
require_once "controladores/plantilla.controlador.php";
require_once "controladores/proveedor.controlador.php";
require_once "controladores/clientes.controlador.php";
require_once "controladores/categoria.controlador.php";
require_once "controladores/subcategoria.controlador.php";
require_once "controladores/departamento.controlador.php";
require_once "controladores/regimenf.controlador.php";

require_once "modelos/proveedor.modelo.php";
require_once "modelos/clientes.modelo.php";
require_once "modelos/categoria.modelo.php";
require_once "modelos/subcategoria.modelo.php";
require_once "modelos/departamento.modelo.php";
require_once "modelos/regimenF.modelo.php";

$plantilla = new ControladorPlantilla();
$plantilla->plantilla();