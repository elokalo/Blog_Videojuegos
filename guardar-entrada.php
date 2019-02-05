<?php 
if(isset($_POST)){

    //Conexion a la base de datos
    require_once 'includes/conexion.php';

    $titulo = trim(isset($_POST['titulo']) ? mysqli_real_escape_string($conn, $_POST['titulo']) : '');

    $descripcion = trim(isset($_POST['descripcion']) ? mysqli_real_escape_string($conn, $_POST['descripcion']) : '');

    $categoria = isset($_POST['categoria']) ? (int)mysqli_real_escape_string($conn, $_POST['categoria']) : '';

    $usuario_id = (int)$_SESSION['usuario']['id_usuario'];

    //Array de errores 
    $errores = array();

    //Validar los datos antes de guardar a la base de datos
    if(empty($titulo)){
        $errores['titulo'] = "El titulo no es válido";
    }

    if(empty($descripcion)){
        $errores['descripcion'] = "El descripción no es válida";
    }
    
    if(empty($categoria) && !is_numeric($categoria)){
        $errores['descripcion'] = "La categoría no es valida";
    } 

    if(count($errores) == 0){
        if(isset($_GET['editar'])){
            $id_entrada = $_GET['editar'];
            $sql = "UPDATE entradas SET categoria_id=$categoria, titulo='$titulo', descripcion='$descripcion' WHERE id_entrada=$id_entrada AND usuario_id=$usuario_id";
        } else {
            $sql = "INSERT INTO entradas VALUES(null, $usuario_id, $categoria, '$titulo', '$descripcion', CURDATE());";
        }
        
        $guardar = mysqli_query($conn, $sql);
        header("Location: index.php");

    } else {
        $_SESSION['errores_entrada'] = $errores;

        if(isset($_GET['editar'])){
            header("Location: editar-entrada.php?id=".$_GET['editar']);
        } else{
            header("Location: crear-entrada.php");
        }   
    }
}

?>