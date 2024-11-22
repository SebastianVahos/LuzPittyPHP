<?php
    require_once 'db.php';
    Class contacto{
        private $id;
        private $nombre;
        private $email;
        private $mensaje;
        private $db;

        public function __construct()
        {
            //usa la clase Databse; y con los dos puntos se dice que usa una clase estatica
            $this->db=Database::connect();
        }
        public function getId(){
            return $this->id;
        }
        public function setId($id){
            $this->id = $this-> db->real_escape_string($id);
        }
        public function getNombre(){
            return $this->nombre;
        }
        public function setNombre($nombre){
            $this->nombre = $this-> db->real_escape_string($nombre);
        }
        public function getEmail(){
            return $this->email;
        }
        public function setEmail($email){
            $this->email = $this-> db->real_escape_string($email);
        }
        public function getMensaje(){
            return $this->mensaje;
        }
        public function setMensaje($mensaje){
            $this->mensaje = $this-> db->real_escape_string($mensaje);
        }
        public function guardarContacto(){
            $sql = "INSERT INTO contacto VALUES (null, '{$this->getNombre()}', '{$this->getEmail()}', '{$this->getMensaje()}')";
            //le pasamos al query la conexion y el comando sql
            if(mysqli_query($this->db, $sql)){
                // echo 'Se envio su mensaje correctamente';
                print_r("demasiadas sesiones abiertas");
                //'<script type="text/javascript">alert("demasiadas sesiones abiertas");</script>';
                header("Location: ../index.php");
            }else{
                echo 'Error: ' . mysqli_error($this->db);
            }
            
        }
        public function cerrarConexion(){
            mysqli_close($this->db);
        }
    }
    $objC = new contacto();
    $objC->cerrarConexion();  
?>