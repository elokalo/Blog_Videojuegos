<?php 
//Iniciar conexion y sesion a la BD
require_once 'includes/conexion.php';

//Recoger datos del formulario
if(isset($_POST)){
    //Borrar error antiguo
    if(isset($_SESSION['error_login'])){
        unset($_SESSION['error_login']);
    }

    //Obtener datos del formulario
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    
    //Consulta a la BD para comprobar las credenciales del usuario
    $sql = "SELECT * FROM usuarios WHERE email='$email'";
    $login = mysqli_query($conn, $sql);

    if($login && mysqli_num_rows($login)==1){
        $usuario = mysqli_fetch_assoc($login);
        
        //Comprobar la contraseña
        $verify = password_verify($password, $usuario['password']);

        if($verify){
            //Utilizar una sesion para guardar los datos del usuario logeado
            $_SESSION['usuario'] = $usuario;
            
        } else {
            //Si algo falla enviar una sesion con el fallo
            $_SESSION['error_login'] = "Login incorrecto";
        }

    } else {
        //Mensaje de error
    }
}

header('Location: index.php');

?>