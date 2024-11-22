<?php
    require_once 'db.php';
    Class Login{
        private $nombreUsuario;
        // private $email;
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
        // public function getEmail(){
        //     return $this->email;
        // }
        // public function setEmail($email){
        //     $this->email = $this-> db->real_escape_string($email);
        // }
        public function getContrasenia(){
            return $this->contrasenia;
        }
        public function setContrasenia($contrasenia){
            $this->contrasenia = $this-> db->real_escape_string($contrasenia);
        }
        public function verficarUsuario(){
            //comando sql para consultar a la base de datos
            $sql = "SELECT * FROM registro WHERE NombreUsuario = '{$this->getNombreUsuario()}' AND Contrasenia = '{$this->getContrasenia()}'";
            //le pasamos al query la conexion y el comando sql
            if(mysqli_query($this->db, $sql)){
                //usa la variable de conexion db y en su metodo query recibe como parametro el comando
                //que nos obtiene unos datos de informacion del comando y lo guarda en una variable result
                $RESULT = $this->db -> query($sql);
                if($RESULT->num_rows > 0){//al result le agrega el metodo num_rows para obtener el numero de datos obtenidos
                    header("Location: ../index.php");
                }else{
                    header("Location: ../Views/login.php");
                }
            }else{
                echo 'Error: ' . mysqli_error($this->db);
            }
            
        }
        public function cerrarConexion(){
            mysqli_close($this->db);
        }
    }
    $objC = new Login();
    $objC->cerrarConexion();  
?>