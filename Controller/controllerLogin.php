<?php
require_once '../Model/login.php';
class controllerLogin{
    function IniciarSesion($usuario, $contrasenia){
        $login = new Login();
        $login->setNombreUsuario($usuario);
        $login->setContrasenia($contrasenia);
        $login->verficarUsuario();
    }
    function validarDatos(){
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            //capturar los datos del formulario
            $usuario = $_POST['usuario'];
            $contrasenia = $_POST['contrasena'];
            //llamar a la funcion con los datos recibidos
            $this->IniciarSesion($usuario, $contrasenia);
        }
    }
}
$objC = new controllerLogin();
$objC->validarDatos();
?>
