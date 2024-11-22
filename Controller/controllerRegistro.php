<?php
require_once '../Model/registro.php';
class controllerRegistro{
    function Registrarse($nombreUsuario, $email, $contrasenia){
        $registro = new Registro();
        $registro->setNombreUsuario($nombreUsuario);
        $registro->setEmail($email);
        $registro->setContrasenia($contrasenia);
        $registro->GuardarRegistro();
    }
    function validarDatos(){
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            //capturar los datos del formulario
            $NomUsuario = $_POST['usuario'];
            $email = $_POST['email'];
            $contrasenia = $_POST['contrasena'];
            //llamar a la funcion con los datos recibidos
            $this->Registrarse($NomUsuario, $email, $contrasenia);
        }
    }
}
$objC = new controllerRegistro();
$objC->validarDatos();
?>
