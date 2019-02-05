<?php 
require_once 'includes/conexion.php';

if(isset($_SESSION['usuario']) && isset($_GET['id'])){
    $usuario_id = $_SESSION['usuario']['id_usuario'];
    $id_entrada = $_GET['id'];
    $sql = "DELETE FROM entradas WHERE usuario_id=$usuario_id AND id_entrada=$id_entrada";
    mysqli_query($conn, $sql);
}

header('Location: index.php');
?>