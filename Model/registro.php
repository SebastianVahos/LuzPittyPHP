<?php
    require_once 'db.php';
    Class Registro{
        private $nombreUsuario;
        private $email;
        private $contrasenia;
        private $db;

        public function __construct()
        {
            //usa la clase Databse; y con los dos puntos se dice que usa una clase estatica
            $this->db=Database::connect();
        }
        public function getNombreUsuario(){
            return $this->nombreUsuario;
        }
        public function setNombreUsuario($nombreUsuario){
            $this->nombreUsuario = $this-> db->real_escape_string($nombreUsuario);
        }
        public function getEmail(){
            return $this->email;
        }
        public function setEmail($email){
            $this->email = $this-> db->real_escape_string($email);
        }
        public function getContrasenia(){
            return $this->contrasenia;
        }
        public function setContrasenia($contrasenia){
            $this->contrasenia = $this-> db->real_escape_string($contrasenia);
        }
        public function GuardarRegistro(){
            //comando sql para consultar a la base de datos
            $sql = "INSERT INTO registro VALUES ('{$this->getNombreUsuario()}', '{$this->getEmail()}', '{$this->getContrasenia()}')";
            //le pasamos al query la conexion y el comando sql
            if(mysqli_query($this->db, $sql)){
                // echo 'Se envio su mensaje correctamente';
                //'<script type="text/javascript">alert("demasiadas sesiones abiertas");</script>';
                header("Location: ../Views/login.php");
            }else{
                echo 'Error: ' . mysqli_error($this->db);
            }
            
        }
        public function cerrarConexion(){
            mysqli_close($this->db);
        }
    }
    $objC = new Registro();
    $objC->cerrarConexion();  
?>