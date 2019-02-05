<?php 
session_start();

if(isset($_SESSION['usuario'])){
    session_destroy();
}

if(isset($_SESSION['error_categoria'])){
    session_destroy();
}

if(isset($_SESSION['errores_entrada'])){
    session_destroy();
}

header('Location: index.php');

?>