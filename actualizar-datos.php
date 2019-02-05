<?php ?><?php 

if(isset($_POST)){

    require_once 'includes/conexion.php';
    
    //Recoger los valores del formulario del registro
    $nombre = trim(isset($_POST['nombre']) ? filter_var($_POST['nombre'], FILTER_SANITIZE_STRING) : false);
    $apellidos = trim(isset($_POST['apellidos']) ? filter_var($_POST['apellidos'], FILTER_SANITIZE_STRING) : false);
    $email = trim(isset($_POST['email']) ? filter_var($_POST['email'], FILTER_SANITIZE_EMAIL) : false);

    //Array de errores 
    $errores = array();

    //Validar los datos antes de guardar a la base de datos
    if(empty($nombre) && is_numeric($nombre) && preg_match("/[0-9]/", $nombre)){
        $errores['nombre'] = "El nombre no es valido";
    }

    if(empty($apellidos) && is_numeric($apellidos) && preg_match("/[0-9]/", $apellidos)){
        $errores['apellidos'] = "Los apellidos no son validos";
    }

    if(empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errores['email'] = "El email no es valido";
    }

    //Comprobamos que el arreglo de errores no exista
    if(count($errores) == 0){
        //Obtenemos el id_usuario de la SESSION iniciada
        $id_usuario = $_SESSION['usuario']['id_usuario'];

        //COMPROBAR SI EL MAIL YA EXISTE
        $sql = "SELECT id_usuario, email FROM usuarios WHERE email='$email'";
        $consulta = mysqli_query($conn, $sql);
        $usuario_unico = mysqli_fetch_assoc($consulta);

        if($usuario_unico['id_usuario'] === $id_usuario || empty($usuario_unico)){
            //ACTUALIZAR USUARIO EN LA BASE DE DATOS

            $sql = "UPDATE usuarios SET nombre='$nombre', apellidos='$apellidos', email='$email' WHERE id_usuario=$id_usuario;";

            $actualizar = mysqli_query($conn, $sql);

            if($actualizar){
                $_SESSION['usuario']['nombre']=$nombre;
                $_SESSION['usuario']['apellidos']=$apellidos;
                $_SESSION['usuario']['email']=$email;

                $_SESSION['completado'] = "Actualización Exitosa";
            } else {
                $_SESSION['errores']['general'] = "Fallo al actualizar el usuario";
            }
        } else {
            $_SESSION['errores']['general'] = "El email ya existe, coloca uno diferente";
        }
    } else {
        $_SESSION['errores'] = $errores;
    }

}

header('Location: mis-datos.php');

?>