<?php 
if(isset($_POST)){
    //Conexion a la base de datos
    require_once 'includes/conexion.php';

    $nombre = trim(isset($_POST['nombre']) ? mysqli_real_escape_string($conn, $_POST['nombre']) : false);

    //Array de errores 
    $errores = array();

    //Validar los datos antes de guardar a la base de datos
    if(empty($nombre)){
        $errores['nombre'] = "El nombre de la categría no es válido";
    }

    if(count($errores) == 0){
        $sql = "INSERT INTO categorias VALUES(null, '$nombre')";
        $guardar = mysqli_query($conn, $sql);
        header("Location: index.php");

    } else {
        $_SESSION['error_categoria'] = $errores;
        header("Location: crear-categoria.php");
    }
}
?>