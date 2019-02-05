<?php 

if(isset($_POST['submit'])){

    require_once 'includes/conexion.php';

    //Iniciar sesion
    if(!isset($_SESSION)){
        session_start();
    }
    
    //Recoger los valores del formulario del registro
    $nombre = trim(isset($_POST['nombre']) ? filter_var($_POST['nombre'], FILTER_SANITIZE_STRING) : false);
    $apellidos = trim(isset($_POST['apellidos']) ? filter_var($_POST['apellidos'], FILTER_SANITIZE_STRING) : false);
    $email = trim(isset($_POST['email']) ? filter_var($_POST['email'], FILTER_SANITIZE_EMAIL) : false);
    $password = trim(isset($_POST['password']) ? filter_var($_POST['password'], FILTER_SANITIZE_STRING) : false);

    //Array de errores 
    $errores = array();

    //Validar los datos antes de guardar a la base de datos
    if(!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)){
        $nombre_validado = true;
    } else {
        $nombre_validado = false;
        $errores['nombre'] = "El nombre no es valido";
    }

    if(!empty($apellidos) && !is_numeric($apellidos) && !preg_match("/[0-9]/", $apellidos)){
        $apellidos_validado = true;
    } else {
        $apellidos_validado = false;
        $errores['apellidos'] = "Los apellidos no son validos";
    }

    if(!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)){
        $email_validado = true;
    } else {
        $email_validado = false;
        $errores['email'] = "El email no es valido";
    }

    if(!empty($password)){
        $password_validado = true;
    } else {
        $password_validado = false;
        $errores['password'] = "El password esta vacio";
    }

    $guardar_usuario = false;
    //Comprobamos que el arreglo de errores no exista
    if(count($errores) == 0){
        $guardar_usuario = true;

        //CIFRAR PASSWORD
        $opciones = array (
            'cost' => 12
        );

        $password_segura = password_hash($password, PASSWORD_BCRYPT, $opciones);

        //INSERTAR USUARIO EN LA BASE DE DATOS
        $sql = "INSERT INTO usuarios VALUES(null, '$nombre', '$apellidos', '$email', '$password_segura', CURDATE())";

        $guardar = mysqli_query($conn, $sql);

        if($guardar){
            $_SESSION['completado'] = "Registro Exitoso";
        } else {
            $_SESSION['errores']['general'] = "Fallo al guardar el usuario";
        }
        
    } else {
        $_SESSION['errores'] = $errores;
        
    }

}

header('Location:index.php');

?>