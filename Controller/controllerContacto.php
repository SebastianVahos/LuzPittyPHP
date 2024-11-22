<?php
require_once '../Model/contacto.php';
class controllerContacto{
    function guardarContacto($nombre, $email, $mensaje){
        $contacto = new contacto();
        $contacto->setNombre($nombre);
        $contacto->setEmail($email);
        $contacto->setMensaje($mensaje);
        $contacto->guardarContacto();
    }
    function validarDatos(){
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            //capturar los datos del formulario
            $nombre = $_POST['nombre'];
            $email = $_POST['email'];
            $mensaje = $_POST['mensaje'];
            //llamar a la funcion con los datos recibidos
            $this->guardarContacto($nombre, $email, $mensaje);
        }
    }
}
$objC = new controllerContacto();
$objC->validarDatos();
?>
