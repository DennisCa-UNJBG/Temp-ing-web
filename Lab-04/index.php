<?php
require_once("controlador/index.php");
$controlador = new Controlador();
if (isset($_GET['accion'])) {
$accion = $_GET['accion'];
$controlador->$accion();
} else {
$controlador->index();
}
?>