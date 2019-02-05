<?php 
//Conexion
$server = "localhost";
$user = "root";
$password = "root11";
$db = "blog_videojuegos";

 $conn = mysqli_connect($server, $user, $password, $db);

 mysqli_query($conn, " SET NAMES 'utf8'");
 
//INICIAR LA SESION
if(!isset($_SESSION)){
    session_start();
}

?>