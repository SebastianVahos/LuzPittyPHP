<?php
session_start();
require_once '../Model/carrito.php';
$carrito = new Carrito();
if (isset($_GET['action'])) {
    $action = $_GET['action'];
    switch ($action) {
        case 'add':
            if (isset($_GET['id'])) {
                $idProducto = $_GET['id'];
                $carrito->agregarProducto($idProducto);
            }
            break;
        case 'update':
            if (isset($_POST['id']) && isset($_POST['quantity'])) {
                $idProducto = $_POST['id'];
                $cantidad = $_POST['quantity'];
                $carrito->actualizarProducto($idProducto, $cantidad);
            }
            break;
        case 'remove':
            if (isset($_GET['id'])) {
                $idProducto = $_GET['id'];
                $carrito->eliminarProducto($idProducto);
            }
            break;
    }
    header("Location: ../Views/carrito.php");
    exit();
}
?>