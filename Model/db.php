<?php
Class Database{
    //metodo estatica que no crea objetos
    public static function connect(){
        $servername = "127.0.0.1";
        $database = "dbLuzPitty";
        $username = "root";
        $password = "";
        //le pasamos al constructor de mysqli los parametros de la coneccion
        $conn = new mysqli($servername, $username, $password, $database, 3306);
        if(!$conn){
            die("Conexion fallida: " . mysqli_connect_error());
        }

        //permite que la base de datos venga con caracteres especiales
        $conn -> query("SET NAMEs 'utf8'");
        return $conn;
    }
}
?>